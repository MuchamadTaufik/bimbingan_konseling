<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan</title>

    <style>
        @page {
            size: 5.7in 6.5in;
        }

        #judul{
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }
    </style>
</head>
<body>
    <div id="halaman">
        <table width="300">
            <center>
                <font size="4">LAPORAN PELAKSANAAN LAYANAN KUNJUNGAN SISWA</font> <br>
            </center>
            <hr style="width: 100%; margin-top: 20px; margin-bottom: 20px;">
        </table>

        <table width="300">
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td>{{ $kunjungan->siswa->name}}</td>
            </tr>
            <tr>
                <td>Alamat Kunjungan</td>
                <td>:</td>
                <td>{{ $kunjungan->alamat }}</td>
            </tr>
            <tr>
                <td>Tanggal Kunjungan</td>
                <td>:</td>
                <td>{{ $kunjungan->tanggal}}</td>
            </tr>
            <tr>
                <td>Anggota Keluarga</td>
                <td>:</td>
                <td>{{ $kunjungan->anggota_keluarga }}</td>
            </tr>
            <tr>
                <td>Bidang Layanan</td>
                <td>:</td>
                <td>{{ $kunjungan->bidang_layanan }}</td>
            </tr>
            <tr>
                <td>Permasalahan</td>
                <td>:</td>
                <td>{{ $kunjungan->permasalahan }}</td>
            </tr>
            <tr>
                <td>Fungsi Kunjungan</td>
                <td>:</td>
                <td>{{ $kunjungan->fungsi }}</td>
            </tr>
            <tr>
                <td>Tujuan Kunjungan</td>
                <td>:</td>
                <td>{{ $kunjungan->tujuan }}</td>
            </tr>
            <tr>
                <td>Pihak Yang Terlibat</td>
                <td>:</td>
                <td>{{ $kunjungan->pihak_terlibat }}</td>
            </tr>
            <tr>
                <td>Ringkas Masalah</td>
                <td>:</td>
                <td>{{ $kunjungan->ringkasan}}</td>
            </tr>
            <tr>
                <td>Evaluasi</td>
                <td>:</td>
                <td>{{ $kunjungan->evaluasi}}</td>
            </tr>
            <tr>
                <td>Rencana Tindak Lanjut</td>
                <td>:</td>
                <td>{{ $kunjungan->rencana_tindak_lanjut}}</td>
            </tr>
            <tr>
                <td>Catatan Khusus</td>
                <td>:</td>
                <td>{{ $kunjungan->catatan_khusus}}</td>
            </tr>
        </table>
    </div>
</body>
</html>