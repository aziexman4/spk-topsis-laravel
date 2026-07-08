<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Hasil Seleksi Karyawan Baru - SPK TOPSIS</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            color: #1e3a8a;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header p {
            margin: 5px 0 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .subtitle {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #1e293b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #cbd5e1;
            padding: 10px 12px;
            text-align: left;
        }

        th {
            background-color: #f1f5f9;
            color: #0f172a;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
        }

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }

        .badge-1 {
            background-color: #dbeafe;
            color: #1e40af;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding-top: 10px;
            border-top: 1px solid #e2e8f0;
            font-size: 10px;
            color: #64748b;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Sistem Informasi Seleksi Penerimaan Karyawan Baru</h1>
        <p>Laporan Hasil Perhitungan Sistem Pendukung Keputusan (SPK) Metode TOPSIS</p>
    </div>

    <div class="subtitle">
        Peringkat Hasil Akhir Seleksi
    </div>

    <table>
        <thead>
            <tr>
                <th width="10%" class="text-center">Peringkat</th>
                <th width="40%">Nama Pelamar</th>
                <th width="25%" class="text-center">Nilai Preferensi (Vi)</th>
                <th width="25%">Status Rekomendasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasilAkhir as $index => $hasil)
                <tr>
                    <td class="text-center">
                        @if($index === 0)
                            <span class="badge-1">1</span>
                        @else
                            {{ $index + 1 }}
                        @endif
                    </td>
                    <td><strong>{{ $hasil['nama'] }}</strong></td>
                    <td class="text-center">{{ number_format($hasil['nilai'], 4) }}</td>
                    <td>
                        @if($index === 0)
                            Sangat Direkomendasikan
                        @elseif($index < 3)
                            Direkomendasikan
                        @else
                            Dipertimbangkan
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Sistem ini dikembangkan oleh: Muhammad Aulia Aziz (NPM: 2310020119) &copy; {{ date('Y') }}</p>
    </div>

</body>
</html>
