<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $periodeAktif = \App\Models\Periode::where('is_active', true)->first();
        $alternatifs = Alternatif::with('penilaians')
            ->where('periode_id', $periodeAktif?->id)
            ->where('status', 'lolos_administrasi')
            ->get();
        $kriterias = Kriteria::all();
        return view('penilaian.index', compact('alternatifs', 'kriterias'));
    }

    public function edit($alternatif_id)
    {
        $alternatif = Alternatif::with('penilaians')->findOrFail($alternatif_id);
        $kriterias = Kriteria::all();
        
        // Map existing penilaian for easy access in view
        $penilaian_data = [];
        foreach($alternatif->penilaians as $p) {
            $penilaian_data[$p->kriteria_id] = $p->nilai;
        }

        return view('penilaian.edit', compact('alternatif', 'kriterias', 'penilaian_data'));
    }

    public function update(Request $request, $alternatif_id)
    {
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric'
        ]);

        foreach ($request->nilai as $kriteria_id => $nilai) {
            Penilaian::updateOrCreate(
                ['alternatif_id' => $alternatif_id, 'kriteria_id' => $kriteria_id],
                ['nilai' => $nilai]
            );
        }

        return redirect()->route('penilaian.index')->with('success', 'Nilai berhasil disimpan.');
    }
}
