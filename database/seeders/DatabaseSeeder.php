<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Data Users
        \App\Models\User::factory()->create([
            'name' => 'HRD Admin',
            'email' => 'hrd@example.com',
            'role' => 'hrd',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Calon Pelamar',
            'email' => 'pelamar@example.com',
            'role' => 'pelamar',
        ]);

        // 1. Data Kriteria
        $kriterias = [
            ['kode' => 'C1', 'nama' => 'Pengalaman Kerja', 'bobot' => 30, 'tipe' => 'benefit'],
            ['kode' => 'C2', 'nama' => 'Nilai Tes Tertulis', 'bobot' => 25, 'tipe' => 'benefit'],
            ['kode' => 'C3', 'nama' => 'Nilai Wawancara', 'bobot' => 20, 'tipe' => 'benefit'],
            ['kode' => 'C4', 'nama' => 'Usia', 'bobot' => 10, 'tipe' => 'cost'],
            ['kode' => 'C5', 'nama' => 'Ekspektasi Gaji', 'bobot' => 15, 'tipe' => 'cost'],
        ];

        foreach ($kriterias as $k) {
            Kriteria::create($k);
        }

        // 2. Data Alternatif
        $alternatifs = [
            ['nama_pelamar' => 'Andi'],
            ['nama_pelamar' => 'Budi'],
            ['nama_pelamar' => 'Citra'],
            ['nama_pelamar' => 'Dina'],
        ];

        foreach ($alternatifs as $a) {
            Alternatif::create($a);
        }

        // 3. Matriks Penilaian
        // Kriteria ID otomatis: C1=1, C2=2, C3=3, C4=4, C5=5
        // Alternatif ID otomatis: A1=1, A2=2, A3=3, A4=4
        $penilaians = [
            // Andi (A1)
            ['alternatif_id' => 1, 'kriteria_id' => 1, 'nilai' => 5],
            ['alternatif_id' => 1, 'kriteria_id' => 2, 'nilai' => 80],
            ['alternatif_id' => 1, 'kriteria_id' => 3, 'nilai' => 75],
            ['alternatif_id' => 1, 'kriteria_id' => 4, 'nilai' => 28],
            ['alternatif_id' => 1, 'kriteria_id' => 5, 'nilai' => 8],
            
            // Budi (A2)
            ['alternatif_id' => 2, 'kriteria_id' => 1, 'nilai' => 3],
            ['alternatif_id' => 2, 'kriteria_id' => 2, 'nilai' => 90],
            ['alternatif_id' => 2, 'kriteria_id' => 3, 'nilai' => 85],
            ['alternatif_id' => 2, 'kriteria_id' => 4, 'nilai' => 25],
            ['alternatif_id' => 2, 'kriteria_id' => 5, 'nilai' => 7],

            // Citra (A3)
            ['alternatif_id' => 3, 'kriteria_id' => 1, 'nilai' => 7],
            ['alternatif_id' => 3, 'kriteria_id' => 2, 'nilai' => 70],
            ['alternatif_id' => 3, 'kriteria_id' => 3, 'nilai' => 80],
            ['alternatif_id' => 3, 'kriteria_id' => 4, 'nilai' => 32],
            ['alternatif_id' => 3, 'kriteria_id' => 5, 'nilai' => 10],

            // Dina (A4)
            ['alternatif_id' => 4, 'kriteria_id' => 1, 'nilai' => 4],
            ['alternatif_id' => 4, 'kriteria_id' => 2, 'nilai' => 85],
            ['alternatif_id' => 4, 'kriteria_id' => 3, 'nilai' => 90],
            ['alternatif_id' => 4, 'kriteria_id' => 4, 'nilai' => 27],
            ['alternatif_id' => 4, 'kriteria_id' => 5, 'nilai' => 9],
        ];

        foreach ($penilaians as $p) {
            Penilaian::create($p);
        }
    }
}
