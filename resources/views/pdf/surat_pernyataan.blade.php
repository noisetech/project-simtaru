<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan - {{ $pemohon->nama_lengkap }}</title>

    <style>
        @page {
            margin: 0.5cm 0.5cm 0cm 0.5cm;
        }

        body {
            margin: 0.5cm 0.5cm 0cm 0.5cm;
        }

    </style>
</head>

<body style="text-align:justify; font-size: 11pt; font-family: Arial, Helvetica, sans-serif;">
    <h2 style="text-align: center; margin-bottom: 0.5cm;">SURAT PERNYATAAN</h2>
    <br />
    <p>Yang bertanda tangan di bawah ini saya:</p>

    <table style="width: 100%;">
        <thead>

        </thead>
        <tbody>
            <tr>
                <td style="vertical-align: top; width: 35%">Nama</td>
                <td style="vertical-align: top; width: 1%"> : </td>
                <td style="vertical-align: top;">{{ $pemohon->nama_lengkap }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top">Tempat / Tanggal Lahir</td>
                <td style="vertical-align: top"> : </td>
                <td style="vertical-align: top">{{ $pemohon->tempat_tanggal_lahir }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top">Pekerjaan / Jabatan</td>
                <td style="vertical-align: top"> : </td>
                <td style="vertical-align: top">{{ $pemohon->pekerjaan }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top">Bertindak untuk dan atas nama</td>
                <td style="vertical-align: top"> : </td>
                <td style="vertical-align: top">{{ $pemohon->bertindak_atas_nama }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top">Alamat</td>
                <td style="vertical-align: top"> : </td>
                <td style="vertical-align: top">{{ $pemohon->alamat }}</td>
            </tr>
        </tbody>
    </table>

    <p>Letak tanah dan tujuan penggunaan/peruntukan ruang adalah sebagai berikut :</p>

    <table style="width: 100%;">
        <thead>

        </thead>
        <tbody>
            <tr>
                <td style="vertical-align: top; width: 35%">Penggunaan tanah saat dimohon</td>
                <td style="vertical-align: top; width: 1%"> : </td>
                <td style="vertical-align: top">{{ $pemohon->penggunaan_tanah_saat_dimohon }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top">Luas tanah</td>
                <td style="vertical-align: top"> : </td>
                <td style="vertical-align: top">{{ $pemohon->luas_tanah_seluruhnya }} m<sup>2</sup></td>
            </tr>
            <tr>
                <td style="vertical-align: top">Rencana penggunaan tanah</td>
                <td style="vertical-align: top"> : </td>
                <td style="vertical-align: top">{{ $pemohon->rencana_penggunaan_tanah }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top">Luas tanah yang dimohon</td>
                <td style="vertical-align: top"> : </td>
                <td style="vertical-align: top">{{ $pemohon->luas_tanah_yang_dimohon }} m<sup>2</sup></td>
            </tr>
            <tr>
                <td style="vertical-align: top">Letak tanah yang dimohon</td>
                <td style="vertical-align: top"> : </td>
                <td style="vertical-align: top">{{ $pemohon->letak_tanah }}</td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: justify; text-indent: 1cm;">Dengan ini menyatakan bahwa apabila permohonan Rekomendasi Izin
        Pemanfaatan Ruang
        dikabulkan, maka saya berjanji
        untuk melaksanakan pembangunan sesuai dengan permohonan ini selambat-lambatnya 1(satu) tahun setelah surat
        rekomendasi tentang Izin Pemanfaatan Ruang ini diterbitkan</p>
    <p style="text-align: justify; text-indent: 1cm;">Apabila saya tidak mengindahkan/melaksanakan atau menyimpang dari
        ketentuan diatas, maka
        saya bersedia
        mengembalikan fungsi ruang seperti semula, serta saya sadar bahwa Rekomendasi Izin Pemanfaatan Ruang yang saya
        terima tersebut batal demi hukum.</p>
    <p style="text-align: justify; text-indent: 1cm;">Demikian Surat Pernyataan ini dibuat dengan penuh tanggung
        jawab,untuk dipergunakan
        sebaik-baiknya dan
        ditanda-tangani di atas materai yang cukup.</p>

    <br />

    <table style="width: 100%; text-align:center; margin-top:1cm">
        <tr>
            <td style="width: 50%"></td>
            <td>Kotabumi, {{ $pemohon->created_at->isoFormat(' D MMMM Y') }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Yang membuat pernyataan</td>
        </tr>
        <tr>
            <td></td>
            <td><br /></td>
        </tr>
        <tr>
            <td></td>
            <td><br /></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: left">Materai 10000</td>
        </tr>
        <tr>
            <td></td>
            <td><br /></td>
        </tr>
        <tr>
            <td></td>
            <td><br /></td>
        </tr>
        <tr>
            <td></td>
            <td>{{ $pemohon->nama_lengkap }}</td>
        </tr>
    </table>
</body>

</html>
