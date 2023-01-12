<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita Acara - {{ $pemohon->nama_lengkap }}</title>
    <style>
        @page {
            margin: 0.8cm 0.8cm 0.5cm 0.8cm;
        }

        body {
            margin: 0.8cm 0.8cm 0.5cm 0.8cm;
        }
 
        .table {
            border: 1px solid black;
            border-collapse: collapse;
        }

    </style>
</head>

<body style="text-align:justify; font-size: 11pt; font-family: Arial, Helvetica, sans-serif;">

    <h1 style="text-align: center; margin-top: -0.5cm">BERITA ACARA</h1>
    <p style="text-align: center; font-weight: bold;">PENINJAUAN LOKASI PEMANFAATAN RUANG</p>
    <p style="text-align: center; margin-top:-0.3cm;">Nomor: {{ $pemohon->no_ba }}</p>

    <p style="text-align: justify">{{strip_tags(str_replace('</p>', ' ', $setting_pengantar_ba->value))}} maka pada <span style="text-transform: capitalize;">tanggal
            {{ Terbilang::generate($tanggal_peninjauan) }}, bulan {{ Terbilang::generate($bulan_peninjauan) }} tahun
            {{ Terbilang::generate($tahun_peninjauan) }}</span> {{strip_tags(str_replace('</p>', ' ', $setting_pengantar_ba2->value))}}
        berdasarkan surat permohonan tanggal {{ $pemohon->created_at->isoFormat('D MMMM Y') }} bertempat di
        {{ $pemohon->letak_tanah }}</p>

    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="font-weight: bold;  width:35%;">Biodata Pemohon</td>
                <td></td>
            </tr>
            <tr>
                <td style="vertical-align:top">Nama</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->nama_lengkap }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Pekerjaan</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->pekerjaan }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Bertindak untuk dan atas nama</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->bertindak_atas_nama }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Alamat</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->alamat }}</td>
            </tr>
        </tbody>
    </table>
    <br />
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="font-weight: bold; width:35%;">Letak dimohon</td>
                <td></td>
            </tr>
            <tr>
                <td style="vertical-align:top">Desa</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->desa }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Kecamatan</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->kecamatan }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Batas sebelah Utara</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->batas_sebelah_utara }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Batas sebelah Timur</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->batas_sebelah_timur }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Batas sebelah Selatan</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->batas_sebelah_selatan }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Batas sebelah Barat</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->batas_sebelah_barat }}</td>
            </tr>
        </tbody>
    </table>
    <br />
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="font-weight: bold; width:35%;">Kondisi fisik tanah</td>
                <td></td>
            </tr>
            <tr>
                <td style="vertical-align:top">Penggunaan tanah eksisting</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->penggunaan_tanah_saat_dimohon }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Topografi tanah</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->topografi_tanah }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Rencana penggunaan tanah</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->rencana_penggunaan_tanah }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Kesuburan tanah</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->kesuburan_tanah }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Sarana irigasi/sumurbor</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->sarana_irigasi_atau_sumurbor }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Jarak sungai/drainase</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->jarak_bangunan_dengan_sungai }} m</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Jarak jarak bangunan dengan jalan</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->jarak_bangunan_dengan_jalan }} m</td>
            </tr>
        </tbody>
    </table>
    <br />
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="font-weight: bold; width:35%;">Status tanah</td>
                <td></td>
            </tr>
            <tr>
                <td style="vertical-align:top">Status kepemilikan</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->status_kepemilikan }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Bukti penguasaan tanah</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->bukti_penguasaan_tanah }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Luas tanah seluruhnya</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->luas_tanah_seluruhnya }} m<sup>2</sup></td>
            </tr>
            <tr>
                <td style="vertical-align:top">Luas tanah yang dimohon</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->luas_tanah_yang_dimohon }} m<sup>2</sup></td>
            </tr>
            <tr>
                <td style="vertical-align:top">Luas tanah yang disetujui</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->luas_tanah_yang_disetujui }} m<sup>2</sup></td>
            </tr>

        </tbody>
    </table>
    <p style="text-align: justify">
    {!! $setting_penghubung_ba->value !!}
    </p>
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="vertical-align:top; width: 50%">Kesesuaian dengan rencana tata ruang wilayah</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->kesesuaian_rencana }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Hubungan pemohon dengan tanah tersebut</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->hubungan_pemohon_dengan_tanah }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Kesesuaian dengan keadaan fisik tanah</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->kesesuaian_dengan_keadaan_fisik_tanah }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Tanah yang dimohon fisiknya berupa</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->tanah_yang_dimohon_fisiknya }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Jarak dari permukiman terdekat</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->jarak_dari_pemukiman_terdekat }} m</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Pertimbangan/analisis lainnya</td>
                <td style="vertical-align:top; width: 1%;">: </td>
                <td style="vertical-align:top">{{ $pemohon->pertimbangan }}</td>
            </tr>

        </tbody>
    </table>
     
    <div style="text-align: justify">
    <!-- uraian/penutup -->
        {!! $setting_ba->value !!}
    </div> 

  
    <table class="table" style="width: 100%">
        <tr>
            <td class="table" style="width: 7%; height:3%; text-align:center">NO</td>
            <td class="table" style="text-align:center">NAMA</td>
            <td class="table" style="width: 30%;text-align:center">JABATAN</td>
            <td class="table" style="width: 20%;text-align:center">TANDA TANGAN</td>
        </tr>
        <tr>
            <td class="table" style="text-align:center; height:7%;">1</td>
            <td class="table" style="padding-left: 0.5cm">{{ $kabid->nama }}</td>
            </td>
            <td class="table" style="padding-left: 0.5cm">Kabid. Penataan Ruang</td>
            <td class="table" style="padding-left: 0.2cm">1. .........................</td>
        </tr>
        <tr>
            <td class="table" style="text-align:center; height:7%;">2</td>
            <td class="table" style="padding-left: 0.5cm">{{ $kasi->nama }}</td>
            <td class="table" style="padding-left: 0.5cm">Kasi Pemanfaatan Ruang</td>
            <td class="table" style="padding-left: 0.2cm">2. .........................</td>
        </tr>
        <tr>
            <td class="table" style="text-align:center; height:7%;">3</td>
            <td class="table" style="padding-left: 0.5cm">{{ $staf->nama }}</td>
            <td class="table" style="padding-left: 0.5cm">Staf Pemanfaatan Ruang</td>
            <td class="table" style="padding-left: 0.2cm">3 .........................</td>
        </tr>
        <tr>
            <td class="table" style="text-align:center; height:7%;">4</td>
            <td class="table" style="padding-left: 0.5cm">{{ $pemohon->nama_lengkap }}</td>
            <td class="table" style="padding-left: 0.5cm">Pemohon</td>
            <td class="table" style="padding-left: 0.2cm">4. .........................</td>
        </tr>
    </table>
</body>

</html>
