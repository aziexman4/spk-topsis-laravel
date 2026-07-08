<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TopsisController extends Controller
{
    public function hitungTopsis()
    {
        $kriterias = Kriteria::orderBy('id')->get();
        $alternatifs = Alternatif::with('penilaians')->get();

        if ($kriterias->isEmpty() || $alternatifs->isEmpty()) {
            return null;
        }

        $totalBobot = $kriterias->sum('bobot');
        if ($totalBobot != 100) {
            return ['error' => 'Total bobot kriteria (' . $totalBobot . ') tidak sama dengan 100. Harap sesuaikan bobot di menu Kriteria.'];
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
                
                $vij = $rij * $kriteria->bobot;
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

            $hasilAkhir[] = [
                'alternatif' => $alternatif,
                'nama' => $alternatif->nama_pelamar,
                'nilai' => $vi,
                'd_plus' => $d_plus,
                'd_min' => $d_min,
            ];
        }

        usort($hasilAkhir, function($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        return compact(
            'kriterias', 'alternatifs', 'matriks', 'normalisasi', 
            'terbobot', 'idealPositif', 'idealNegatif', 
            'jarakPositif', 'jarakNegatif', 'hasilAkhir'
        );
    }

    public function index()
    {
        $data = $this->hitungTopsis();
        
        if ($data === null) {
            return redirect()->route('dashboard')->with('error', 'Data kriteria atau alternatif belum lengkap!');
        }

        if (isset($data['error'])) {
            return redirect()->route('kriteria.index')->with('error', $data['error']);
        }

        return view('topsis.hasil', $data);
    }

    public function cetakPdf()
    {
        $data = $this->hitungTopsis();
        
        if ($data === null) {
            return redirect()->route('topsis.hasil')->with('error', 'Data tidak tersedia.');
        }

        if (isset($data['error'])) {
            return redirect()->route('kriteria.index')->with('error', $data['error']);
        }

        $pdf = Pdf::loadView('topsis.laporan_pdf', $data);
        return $pdf->download('Hasil_Seleksi_Karyawan_TOPSIS.pdf');
    }
}
