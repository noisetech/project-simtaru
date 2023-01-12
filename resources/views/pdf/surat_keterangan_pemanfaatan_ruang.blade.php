<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @page {
            margin: 0cm 0.5cm 0cm 0.5cm;
        }

        body {
            margin: 0cm 0.5cm 0cm 0.5cm;
        }

    </style>
    <title>Surat Keterangan Pemanfaatan Ruang - {{ $pemohon->nama_lengkap }}</title>
</head>

<body style="text-align:justify; font-size: 10pt; font-family: Arial, Helvetica, sans-serif;">
    <div style="margin-top: -0.2cm">
        <table style="width: 100%">
            <tr>
                <td style="text-align: center; width: 15%">
                    <img src="{{ asset('img/logo/logo-lampura.png') }}" alt="Logo" style="width: 70px; height:auto;">
                </td>

                <td style="text-align: center; padding-left: 0.2cm;">
                    <p style="font-size: 15pt; letter-spacing: 2px;">PEMERINTAH KABUPATEN LAMPUNG UTARA</p><br />
                    <p style="font-size: 15pt; letter-spacing: 2px; margin-top: -0.9cm"><strong>DINAS PEKERJAAN UMUM DAN
                            PENATAAN
                            RUANG</strong></p><br />
                    <P style="margin-top: -0.9cm; letter-spacing: 1px;">Jl. Soekarno-Hatta Nomor 74 Kotabumi - Lampung
                        Utara</P><br />
                    <p style="margin-top: -0.9cm; letter-spacing: 1px;">Telp. (0724) 21011 Fax (0724) 21011 </p>
                </td>
            </tr>
        </table>
    </div>

    <hr style="border-top: 0.5px solid; margin-top: -0.3cm">
    <hr style="margin-top: -0.12cm; border-top: 3px solid">

    <p style="font-size: 13pt; text-align: center; letter-spacing: 1px; font-weight: bold;">SURAT
        KETERANGAN PEMANFAATAN
        RUANG</p>
    <p style="text-align: center; margin-top: -0.4cm;">NOMOR :
        @if ($pemohon->id > 244)
            {{ $pemohon->no_surat_rekomendasi ?? '-' }}
        @else
            {!! $pemohon->no_surat_rekomendasi !!}
        @endif
    </P>
    <!-- <span class="margin-top: -0.2cm"><strong>Dasar :</strong></span> -->
    <div style="text-align: justify; margin-left:-0.5cm; margin-top: -0.2cm">
        {!! $dasar_surat_rekomendasi->value !!} , {{ $pemohon->nama_lengkap }} tanggal {{ $pemohon->created_at->isoFormat('D MMMM Y') }}
            perihal permohonan Rekomendasi Pemanfaatan Ruang Bangunan {{ $pemohon->rencana_penggunaan_tanah }} di
            {{ $pemohon->letak_tanah }}
    </div>
    

    {!! $penghubung_surat_pemanfaatan->value !!}

    <table style="width: 100%; margin-left: -0.05cm; margin-top: -0.2cm">
        <tr style="vertical-align: text-top">
            <td style="width:30%">Nama</td>
            <td style="width:1%">:</td>
            <td>{{ $pemohon->nama_lengkap }}</td>
        </tr>
        <tr style="vertical-align: text-top">
            <td>Bertindak Untuk dan Atas Nama </td>
            <td>:</td>
            <td>{{ $pemohon->bertindak_atas_nama }}</td>
        </tr>
        <tr style="vertical-align: text-top">
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $pemohon->pekerjaan }}</td>
        <tr style="vertical-align: text-top">
            <td>Alamat Pemohon</td>
            <td>:</td>
            <td>{{ $pemohon->alamat }}</td>
        </tr>
        <tr style="vertical-align: text-top">
            <td>Letak Tanah dimohon</td>
            <td>:</td>
            <td>{{ $pemohon->letak_tanah }}</td>
        </tr>
        <tr style="vertical-align: text-top">
            <td>Luas Tanah dimohon</td>
            <td>:</td>
            <td>{{ $pemohon->luas_tanah_yang_dimohon }} m<sup>2</sup></td>
        </tr>
        <tr style="vertical-align: text-top">
            <td>Rencana Pemafaatan</td>
            <td>:</td>
            <td>{{ $pemohon->rencana_penggunaan_tanah }}</td>
        </tr>
        <tr style="vertical-align: text-top">
            <td>Bukti Penguasaan Lahan</td>
            <td>:</td>
            <td>{{ $pemohon->bukti_penguasaan_tanah }}</td>
        </tr>
        <tr style="vertical-align: text-top">
            <td>Titik Koordinat </td>
            <td>:</td>
            <td>{{ $pemohon->titik_koordinat }}</td>
        </tr>
    </table>
    <br />
 
    <div style="margin-top: -0.2cm; ">
        {!! $ketentuan_surat_rekomendasi->value !!}
    </div>
 
    <table style="width:100%">
        <tr>
            <td rowspan="3" style="width: 55%; padding-left:2cm"> {!! DNS2D::getBarcodeHTML("https://www.google.co.id/maps/search/$titik_koordinat", 'QRCODE', 3.5, 3.5) !!}</td>
            <td colspan="2" style="text-align: center">Kotabumi,
                @if ($pemohon->id > 244)
                    {{ $pemohon->tanggal_turun_surat_rekomendasi ? $pemohon->tanggal_turun_surat_rekomendasi->isoFormat(' D MMMM Y') : '-' }}
                @else
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pemohon->tanggal_turun_surat_rekomendasi->isoFormat('  MMMM Y') }}
                @endif
                <br />
                KEPALA DINAS PEKERJAAN UMUM<br />
                DAN PENATAAN RUANG<br />
                KABUPATEN LAMPUNG UTARA,<br />
            </td>
        </tr>
        <tr>
            <td style="height: 2cm"></td>
            <td></td>
        </tr>
        <tr>
            {{-- <td></td> --}}
            <td colspan="2" style="text-align: center">
                <u><strong>{{ $kepala_dinas_pupr->nama }}</strong></u>
                <br />{{ $kepala_dinas_pupr->jabatan_lain }}<br />NIP. {{ $kepala_dinas_pupr->nip }}
            </td>
        </tr>

    </table>

    <p style="font-size: 9pt"> <strong> <u> Tembusan :</u></strong></p>
    <ol style="margin-left: -0.5cm; font-size: 9pt; margin-top:-0.2cm">
    {!! $tembusan_surat_pemanfaatan->value !!}
    </ol>


</body>

</html>
