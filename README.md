# SPK TOPSIS Laravel 🏆

Aplikasi Sistem Pendukung Keputusan (SPK) menggunakan metode **TOPSIS (Technique for Order of Preference by Similarity to Ideal Solution)**, dibangun menggunakan framework Laravel.

Aplikasi ini dapat digunakan untuk membantu pengambilan keputusan dalam proses pemilihan alternatif terbaik (misalnya seleksi rekrutmen pegawai, pemilihan penerima bantuan, dll) berdasarkan beberapa kriteria yang telah ditentukan.

## 🚀 Fitur Utama
- **Manajemen Kriteria:** Mengelola data kriteria beserta bobot dan jenis atribut (Benefit/Cost).
- **Manajemen Alternatif:** Mengelola data kandidat/alternatif beserta nilai atau berkasnya.
- **Proses Perhitungan TOPSIS:** Melakukan perhitungan metode TOPSIS secara otomatis (Matriks Keputusan, Matriks Ternormalisasi, Matriks Ternormalisasi Terbobot, Solusi Ideal Positif/Negatif, Jarak Solusi Ideal, dan Nilai Preferensi).
- **Laporan & Hasil Akhir:** Menampilkan hasil perankingan dari nilai tertinggi hingga terendah dan ekspor hasil ke file PDF.
- **Autentikasi & Role:** Dilengkapi sistem login (menggunakan Laravel Breeze) dengan manajemen hak akses berbasis *role* (seperti Admin dan Pelamar).

## 🛠️ Persyaratan Sistem
Pastikan komputer/laptop Anda telah terinstal:
- [PHP](https://www.php.net/) (Minimal versi 8.2)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/en/) & NPM
- [MySQL](https://www.mysql.com/) / MariaDB (atau bisa menggunakan bundel seperti XAMPP / Laragon)

## 📖 Instruksi Instalasi & Penggunaan

Ikuti langkah-langkah berikut untuk mengatur dan menjalankan proyek ini di komputer lokal Anda:

**1. Clone Repositori**
Buka terminal (Command Prompt / PowerShell / Git Bash) dan jalankan perintah:
```bash
git clone https://github.com/aziexman4/spk-topsis-laravel.git
cd spk-topsis-laravel
```

**2. Instal Dependensi PHP (Composer)**
Jalankan composer untuk menginstal semua library PHP yang dibutuhkan:
```bash
composer install
```

**3. Instal Dependensi Frontend (NPM)**
Jalankan NPM untuk menginstal library Javascript/CSS (Tailwind, dll) dan melakukan build/kompilasi:
```bash
npm install
npm run build
```

**4. Konfigurasi Environment & Database**
Salin file `.env.example` dan ubah namanya menjadi `.env`:
```bash
cp .env.example .env
```
*(Catatan untuk pengguna Windows: Anda bisa juga melakukan copy-paste file `.env.example` secara manual melalui File Explorer, lalu mengubah nama kopiannya menjadi `.env`)*

Buka file `.env` di text editor (seperti VS Code), dan cari bagian koneksi database. Sesuaikan dengan pengaturan MySQL lokal Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```
*(Pastikan Anda telah membuat database kosong di MySQL / phpMyAdmin terlebih dahulu dengan nama yang sama seperti di `DB_DATABASE`)*

**5. Generate Application Key**
Jalankan perintah ini untuk membuat key enkripsi keamanan aplikasi:
```bash
php artisan key:generate
```

**6. Jalankan Migrasi & Seeder Database**
Langkah ini akan menjalankan struktur tabel ke dalam database Anda dan mengisi data *dummy* awal (contohnya akun admin default, kriteria awal, dll).
```bash
php artisan migrate --seed
```

**7. Menjalankan Server Lokal**
Terakhir, jalankan server bawaan Laravel:
```bash
php artisan serve
```

Aplikasi sekarang sudah berjalan! Silakan buka browser dan akses alamat:
👉 **http://localhost:8000**

**Akun Default untuk Login (Hasil dari Seeder):**
- **Admin (HRD):**
  - Email: `hrd@example.com`
  - Password: `password`
- **Pelamar:**
  - Email: `pelamar@example.com`
  - Password: `password`

---
*Dibuat dengan ❤️ menggunakan Laravel.*
