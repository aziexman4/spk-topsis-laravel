<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Seleksi Karyawan (TOPSIS)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.5;
        }
        h1, h2 {
            text-align: center;
            color: #2c3e50;
            margin: 5px 0;
        }
        .header {
            margin-bottom: 20px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #bdc3c7;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ecf0f1;
            color: #2c3e50;
        }
        .text-center {
            text-align: center;
        }
        .rank-1 {
            background-color: #f1c40f;
            font-weight: bold;
        }
        .footer {
            position: fixed;
            bottom: -30px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
            font-size: 11px;
            font-style: italic;
            color: #7f8c8d;
            border-top: 1px solid #bdc3c7;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sistem Informasi Seleksi Penerimaan Karyawan Baru</h1>
        <h2>Hasil Perhitungan Menggunakan Metode TOPSIS</h2>
    </div>

    <h3>Peringkat Akhir (Nilai Preferensi)</h3>
    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 15%">Peringkat</th>
                <th style="width: 50%">Nama Pelamar</th>
                <th class="text-center" style="width: 35%">Nilai Preferensi (Vi)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilAkhir as $index => $hasil)
                <tr class="{{ $index === 0 ? 'rank-1' : '' }}">
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $hasil['nama'] }}</strong></td>
                    <td class="text-center">{{ number_format($hasil['nilai'], 5) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Sistem ini dikembangkan oleh: Muhammad Aulia Aziz (NPM: 2310020119)
    </div>
</body>
</html>
