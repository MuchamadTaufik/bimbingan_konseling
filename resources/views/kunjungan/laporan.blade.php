<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kunjungan</title>
    <style>
        @page {
            size: A4 landscape; /* Mengatur ukuran halaman menjadi A4 landscape */
            margin: 20mm; /* Mengatur margin */
        }

        body {
            font-family: Arial, sans-serif; /* Mengatur font */
            line-height: 1.5; /* Mengatur tinggi baris */
            margin: 0; /* Menghilangkan margin default */
        }

        h1 {
            text-align: center; /* Mengatur judul agar berada di tengah */
            margin-bottom: 20px; /* Margin bawah untuk judul */
        }

        table {
            width: 100%; /* Mengatur lebar tabel 100% */
            border-collapse: collapse; /* Menghapus spasi antara border tabel */
        }

        th, td {
            border: 1px solid black; /* Mengatur border untuk sel */
            padding: 8px; /* Menambah ruang dalam sel */
            text-align: left; /* Mengatur teks ke kiri */
            font-size: 10px; /* Mengatur ukuran font */
        }

        th {
            background-color: #f2f2f2; /* Mengatur warna latar belakang untuk header tabel */
        }

        /* Menambahkan sedikit styling untuk footer */
        footer {
            position: fixed;
            bottom: 10px;
            left: 20px;
            right: 20px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Laporan Kunjungan Seluruh Siswa</h1>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Alamat</th>
                <th>Pihak Terlibat</th>
                <th>Bidang Layanan</th>
                <th>Permasalahan</th>
                <th>Fungsi</th>
                <th>Tujuan</th>
                <th>Anggota Keluarga</th>
                <th>Ringkasan</th>
                <th>Evaluasi</th>
                <th>Rencana Tindak Lanjut</th>
                <th>Catatan Khusus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kunjungan as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->siswa->name }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->pihak_terlibat }}</td>
                    <td>{{ $data->bidang_layanan }}</td>
                    <td>{{ $data->permasalahan }}</td>
                    <td>{{ $data->fungsi }}</td>
                    <td>{{ $data->tujuan }}</td>
                    <td>{{ $data->anggota_keluarga }}</td>
                    <td>{{ $data->ringkasan }}</td>
                    <td>{{ $data->evaluasi }}</td>
                    <td>{{ $data->rencana_tindak_lanjut }}</td>
                    <td>{{ $data->catatan_khusus }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        <p>Dicetak pada: {{ date('d M Y') }}</p>
    </footer>
</body>
</html>
