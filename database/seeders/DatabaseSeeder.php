<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Periode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Data Users
        $hrd = \App\Models\User::factory()->create([
            'name' => 'HRD Admin',
            'email' => 'hrd@spk.com',
            'password' => Hash::make('password'),
            'role' => 'hrd',
        ]);

        $pelamar1 = \App\Models\User::factory()->create([
            'name' => 'Andi Susanto',
            'email' => 'andi@example.com',
            'password' => Hash::make('password'),
            'role' => 'pelamar',
        ]);

        $pelamar2 = \App\Models\User::factory()->create([
            'name' => 'Budi Raharjo',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'pelamar',
        ]);

        $pelamar3 = \App\Models\User::factory()->create([
            'name' => 'Citra Kirana',
            'email' => 'citra@example.com',
            'password' => Hash::make('password'),
            'role' => 'pelamar',
        ]);

        $pelamar4 = \App\Models\User::factory()->create([
            'name' => 'Dina Mariana',
            'email' => 'dina@example.com',
            'password' => Hash::make('password'),
            'role' => 'pelamar',
        ]);

        // 1. Data Periode
        $periode = Periode::create([
            'nama_periode' => 'Rekrutmen Gelombang 1 - 2026',
            'is_active' => true
        ]);

        // 2. Data Kriteria
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

        // 3. Data Alternatif
        $alternatifs = [
            ['nama_pelamar' => 'Andi Susanto', 'user_id' => $pelamar1->id, 'periode_id' => $periode->id, 'status' => 'lolos_administrasi'],
            ['nama_pelamar' => 'Budi Raharjo', 'user_id' => $pelamar2->id, 'periode_id' => $periode->id, 'status' => 'lolos_administrasi'],
            ['nama_pelamar' => 'Citra Kirana', 'user_id' => $pelamar3->id, 'periode_id' => $periode->id, 'status' => 'lolos_administrasi'],
            ['nama_pelamar' => 'Dina Mariana', 'user_id' => $pelamar4->id, 'periode_id' => $periode->id, 'status' => 'lolos_administrasi'],
        ];

        foreach ($alternatifs as $a) {
            Alternatif::create($a);
        }

        // 4. Matriks Penilaian
        $penilaians = [
            // Andi
            ['alternatif_id' => 1, 'kriteria_id' => 1, 'nilai' => 5],
            ['alternatif_id' => 1, 'kriteria_id' => 2, 'nilai' => 80],
            ['alternatif_id' => 1, 'kriteria_id' => 3, 'nilai' => 75],
            ['alternatif_id' => 1, 'kriteria_id' => 4, 'nilai' => 28],
            ['alternatif_id' => 1, 'kriteria_id' => 5, 'nilai' => 8],
            
            // Budi
            ['alternatif_id' => 2, 'kriteria_id' => 1, 'nilai' => 3],
            ['alternatif_id' => 2, 'kriteria_id' => 2, 'nilai' => 90],
            ['alternatif_id' => 2, 'kriteria_id' => 3, 'nilai' => 85],
            ['alternatif_id' => 2, 'kriteria_id' => 4, 'nilai' => 25],
            ['alternatif_id' => 2, 'kriteria_id' => 5, 'nilai' => 7],

            // Citra
            ['alternatif_id' => 3, 'kriteria_id' => 1, 'nilai' => 7],
            ['alternatif_id' => 3, 'kriteria_id' => 2, 'nilai' => 70],
            ['alternatif_id' => 3, 'kriteria_id' => 3, 'nilai' => 80],
            ['alternatif_id' => 3, 'kriteria_id' => 4, 'nilai' => 32],
            ['alternatif_id' => 3, 'kriteria_id' => 5, 'nilai' => 10],

            // Dina
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
