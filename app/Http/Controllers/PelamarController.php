<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Periode;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PelamarController extends Controller
{
    public function storeProfil(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|mimes:pdf|max:5120', // Max 5MB
            'pengalaman' => 'required|numeric',
            'pendidikan' => 'required|numeric',
            'gaji' => 'required|numeric',
        ]);

        $user = Auth::user();
        $periodeAktif = Periode::where('is_active', true)->first();

        if (!$periodeAktif) {
            return redirect()->back()->withErrors(['error' => 'Tidak ada gelombang rekrutmen yang aktif saat ini.']);
        }

        // Handle file upload
        $cvPath = null;
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->store('cv_pelamar', 'public');
        }

        // Create or Update Alternatif profile
        $alternatif = Alternatif::updateOrCreate(
            ['user_id' => $user->id, 'periode_id' => $periodeAktif->id],
            [
                'nama_pelamar' => $user->name,
                'cv_path' => $cvPath,
                'status' => 'menunggu' // Status awal
            ]
        );

        // Self-Assessment Mapping to Penilaian
        // Kriteria C1 = Pengalaman, C2 = Tes Tertulis (diisi HRD), C3 = Wawancara (diisi HRD), C4 = Usia (Pendidikan), C5 = Ekspektasi Gaji
        
        $penilaians = [
            1 => $request->pengalaman, // Asumsi C1 = Pengalaman
            4 => $request->pendidikan, // Asumsi C4 = Usia/Pendidikan
            5 => $request->gaji, // Asumsi C5 = Ekspektasi Gaji
        ];

        foreach ($penilaians as $kriteria_id => $nilai) {
            Penilaian::updateOrCreate(
                ['alternatif_id' => $alternatif->id, 'kriteria_id' => $kriteria_id],
                ['nilai' => $nilai]
            );
        }

        return redirect()->back()->with('success', 'Profil, Assessment, dan CV berhasil diunggah! Mohon tunggu informasi selanjutnya dari tim HRD.');
    }
}
