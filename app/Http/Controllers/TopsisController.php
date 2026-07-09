<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Periode;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TopsisController extends Controller
{
    public function hitungTopsis(Request $request = null)
    {
        $kriterias = Kriteria::orderBy('id')->get();
        $periodeAktif = Periode::where('is_active', true)->first();

        // Hanya hitung alternatif pada periode aktif dan status lolos administrasi
        $alternatifs = Alternatif::with('penilaians')
            ->where('periode_id', $periodeAktif?->id)
            ->where('status', 'lolos_administrasi')
            ->get();

        if ($kriterias->isEmpty() || $alternatifs->isEmpty()) {
            return null;
        }

        $totalBobot = 0;
        
        // Override bobot if what-if simulation is active
        $customBobot = $request ? $request->input('bobot') : null;
        
        foreach ($kriterias as $k) {
            if ($customBobot && isset($customBobot[$k->id])) {
                $k->bobot = floatval($customBobot[$k->id]);
            }
            $totalBobot += $k->bobot;
        }
        
        // Normalisasi Bobot Relatif (Bypass limit 100%)
        foreach ($kriterias as $k) {
            $k->bobot_relatif = ($totalBobot > 0) ? ($k->bobot / $totalBobot) : 0;
        }

        $matriks = [];
        $pembagi = [];

        foreach ($kriterias as $kriteria) {
            $pembagi[$kriteria->id] = 0;
        }

        foreach ($alternatifs as $alternatif) {
            foreach ($alternatif->penilaians as $penilaian) {
                $matriks[$alternatif->id][$penilaian->kriteria_id] = $penilaian->nilai;
                $pembagi[$penilaian->kriteria_id] += pow($penilaian->nilai, 2);
            }
        }

        foreach ($pembagi as $id => $val) {
            $pembagi[$id] = sqrt($val);
        }

        $normalisasi = [];
        $terbobot = [];
        $idealPositif = [];
        $idealNegatif = [];

        // Langkah 1 & 2
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $nilai_asli = $matriks[$alternatif->id][$kriteria->id] ?? 0;
                
                $rij = $pembagi[$kriteria->id] > 0 ? ($nilai_asli / $pembagi[$kriteria->id]) : 0;
                $normalisasi[$alternatif->id][$kriteria->id] = $rij;
                
                // Gunakan bobot relatif, bukan bobot mentah
                $vij = $rij * $kriteria->bobot_relatif;
                $terbobot[$alternatif->id][$kriteria->id] = $vij;
            }
        }

        // Langkah 3
        foreach ($kriterias as $kriteria) {
            $nilai_kriteria = array_column($terbobot, $kriteria->id);
            if(empty($nilai_kriteria)) {
                $idealPositif[$kriteria->id] = 0;
                $idealNegatif[$kriteria->id] = 0;
                continue;
            }
            if ($kriteria->tipe == 'benefit') {
                $idealPositif[$kriteria->id] = max($nilai_kriteria);
                $idealNegatif[$kriteria->id] = min($nilai_kriteria);
            } else { 
                $idealPositif[$kriteria->id] = min($nilai_kriteria);
                $idealNegatif[$kriteria->id] = max($nilai_kriteria);
            }
        }

        $jarakPositif = [];
        $jarakNegatif = [];
        $hasilAkhir = [];

        // Langkah 4 & 5
        foreach ($alternatifs as $alternatif) {
            $d_plus = 0;
            $d_min = 0;
            
            foreach ($kriterias as $kriteria) {
                $vij = $terbobot[$alternatif->id][$kriteria->id] ?? 0;
                $d_plus += pow($vij - ($idealPositif[$kriteria->id] ?? 0), 2);
                $d_min += pow($vij - ($idealNegatif[$kriteria->id] ?? 0), 2);
            }
            
            $d_plus = sqrt($d_plus);
            $d_min = sqrt($d_min);
            
            $jarakPositif[$alternatif->id] = $d_plus;
            $jarakNegatif[$alternatif->id] = $d_min;
            
            $vi = ($d_plus + $d_min) > 0 ? ($d_min / ($d_plus + $d_min)) : 0;

            // Passing Grade Threshold: 0.600
            $is_recommended = $vi >= 0.600;

            $hasilAkhir[] = [
                'alternatif' => $alternatif,
                'nama' => $alternatif->nama_pelamar,
                'nilai' => $vi,
                'd_plus' => $d_plus,
                'd_min' => $d_min,
                'is_recommended' => $is_recommended
            ];
        }

        usort($hasilAkhir, function($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        return compact(
            'periodeAktif', 'kriterias', 'alternatifs', 'matriks', 'normalisasi', 
            'terbobot', 'idealPositif', 'idealNegatif', 
            'jarakPositif', 'jarakNegatif', 'hasilAkhir', 'customBobot'
        );
    }

    public function index(Request $request)
    {
        $data = $this->hitungTopsis($request);
        
        if ($data === null) {
            return redirect()->route('dashboard')->with('error', 'Data kriteria atau kandidat lolos administrasi belum lengkap!');
        }

        return view('topsis.hasil', $data);
    }

    public function cetakPdf()
    {
        $data = $this->hitungTopsis();
        
        if ($data === null) {
            return redirect()->route('topsis.hasil')->with('error', 'Data tidak tersedia.');
        }

        $pdf = Pdf::loadView('topsis.laporan_pdf', $data);
        return $pdf->download('Laporan_Evaluasi_Karyawan.pdf');
    }
}
