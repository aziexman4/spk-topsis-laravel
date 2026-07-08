<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopsisController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PenilaianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalKriteria = \App\Models\Kriteria::count();
    $totalAlternatif = \App\Models\Alternatif::count();
    
    $topsisController = new App\Http\Controllers\TopsisController();
    $topsisData = $topsisController->hitungTopsis();
    
    $kandidatTerbaik = null;
    $nilaiTerbaik = 0;
    
    if ($topsisData && !empty($topsisData['hasilAkhir'])) {
        $kandidatTerbaik = $topsisData['hasilAkhir'][0]['nama'];
        $nilaiTerbaik = $topsisData['hasilAkhir'][0]['nilai'];
    }

    $pelamarData = null;
    if (Auth::check() && Auth::user()->role === 'pelamar') {
        $pelamarData = \App\Models\Alternatif::where('user_id', Auth::id())->first();
    }

    return view('dashboard', compact('totalKriteria', 'totalAlternatif', 'kandidatTerbaik', 'nilaiTerbaik', 'pelamarData'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/panduan', function () {
    return view('panduan');
})->middleware(['auth', 'verified'])->name('panduan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:pelamar')->group(function () {
        Route::post('/pelamar/profil', [\App\Http\Controllers\PelamarController::class, 'storeProfil'])->name('pelamar.profil.store');
    });

    Route::middleware('role:hrd')->group(function () {
        Route::resource('kriteria', KriteriaController::class);
        Route::resource('alternatif', AlternatifController::class);
        
        Route::get('penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
        Route::get('penilaian/{alternatif}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
        Route::put('penilaian/{alternatif}', [PenilaianController::class, 'update'])->name('penilaian.update');

        Route::get('/topsis', [TopsisController::class, 'index'])->name('topsis.hasil');
        Route::get('/topsis/pdf', [TopsisController::class, 'cetakPdf'])->name('topsis.pdf');
    });
});

require __DIR__.'/auth.php';
