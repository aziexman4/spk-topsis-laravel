<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PelamarController extends Controller
{
    public function storeProfil(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|mimes:pdf|max:5120', // Max 5MB
        ]);

        $user = Auth::user();

        // Handle file upload
        $cvPath = null;
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->store('cv_pelamar', 'public');
        }

        // Create or Update Alternatif profile
        Alternatif::updateOrCreate(
            ['user_id' => $user->id],
            [
                'nama_pelamar' => $user->name,
                'cv_path' => $cvPath
            ]
        );

        return redirect()->back()->with('success', 'Profil dan CV berhasil diunggah! Mohon tunggu informasi selanjutnya dari tim HRD.');
    }
}
