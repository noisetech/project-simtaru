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
    <title>Nota Dinas - {{ $pemohon->nama_lengkap }}</title>
</head>

<body style="text-align:justify; font-size: 11pt; font-family: Arial, Helvetica, sans-serif;">
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

    <p style="font-size: 14pt; text-align: center; letter-spacing: 1px; font-weight: bold;">NOTA DINAS</p>

    <table style="width: 100%">
        <tr> 
            <td style="width:20%">Kepada Yth</td>
            <td style="width: 5%; text-align: center">:</td>
            <td>{{strip_tags(str_replace('</p>', ' ', $Tujuan_nota->value))}}</td>
        </tr>
        <tr>
            <td>Dari</td>
            <td style="text-align: center">:</td>
            <td>Kepala Bidang Penataan Ruang Dinas PUPR Kab.LU</td>
        </tr>
        <tr>
            <td>Nomor</td>
            <td style="text-align: center">:</td>
            <td>
                @if ($pemohon->id > 244)
                    {{ $pemohon->no_nota_dinas }}
                @else
                    {!! $pemohon->no_nota_dinas !!}
                @endif
            </td>
        <tr>
            <td>Sifat</td>
            <td style="text-align: center">:</td>
            <td>{{strip_tags(str_replace('</p>', ' ', $Sifat_nota->value))}}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td style="text-align: center">:</td>
            <td>
                @if ($pemohon->id > 244)
                    {{ $pemohon->tanggal_turun_nota_dinas->isoFormat('D MMMM Y') }}
                @else
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pemohon->tanggal_turun_nota_dinas->isoFormat(' MMMM Y') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td style="text-align: center">:</td>
            <td>{{strip_tags(str_replace('</p>', ' ', $Perihal_nota->value))}} An. {{ $pemohon->nama_lengkap }}</td>
        </tr>
    </table>
    <hr style="border-top: 0.5px solid"> 
    <table style="text-align: justify">
        <tr style="vertical-align: text-top"> 
            <td style="padding-top: 0.4cm">I.</td>
            <td style="padding-top: 0.4cm">Dasar</td>
            <td style="padding-top: 0.4cm">:</td>
            <td style="vertical-align: text-top">
                {!! $dasar_nota_dinas->value !!}
            </td>
        </tr>
        <tr style="vertical-align: text-top">
            <!-- <td>II.</td> -->
            <td colspan="4"> {{strip_tags(str_replace('</p>', ' ', $dasar_nota_dinas2->value))}}
                 An.
                {{ $pemohon->nama_lengkap }}
                di {{ $pemohon->letak_tanah }}.</td>
        </tr>
        <tr style="vertical-align: text-top">
             <td colspan="4"> {{strip_tags(str_replace('</p>', ' ', $dasar_nota_dinas3->value))}}</td>
            <!-- <td>III.</td> -->
            <!-- <td colspan="3">Kiranya bapak berkenan memohon untuk dindatangani. Demikian disampaikan terimakasih.</td> -->
        </tr>
    </table>

    <br />
    <br />
    <table style="width:100%; text-align: center">
        <tr>
            <td style="width: 60%"></td>
            <td>KEPALA BIDANG<br />PENATAAN RUANG</td>
        </tr>
        <tr>
            <td style="height: 2cm"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><u><strong>{{ $kabid->nama }}</strong></u></td>
        </tr>
        <tr>
            <td></td>
            <td>NIP. {{ $kabid->nip }}</td>
        </tr>
    </table>
</body>

</html>
