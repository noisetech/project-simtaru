<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dokumentasi - {{ $pemohon->nama_lengkap }}</title>
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
    <h1 style="text-align: center; margin-top: -0.5cm">DOKUMENTASI</h1>
    <table class="table" style="width: 100%">
        @if ($pemohon->gambar_rencana_pembangunan != null)
            @foreach ($foto_dokumentasi as $foto_dokumentasi)
                <tr>
                    <td class="table" style="width: 70%; padding: 0.1cm">
                        <img src="{{ $foto_dokumentasi }}" alt="" style="width: 100%">
                    </td>
                    <td class="table"
                        style="text-align: center; vertical-align:middle; padding-left: 0.2cm; padding-right: 0.2cm">
                        Lokasi Izin Bangunan di {{ $pemohon->letak_tanah }}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="table" style="width: 70%; height: 30px; text-align: center">
                    Tidak ada
                </td>
                <td class="table"
                    style="text-align: center; vertical-align:middle; padding: 1cm 0.2cm 1cm 0.2cm;">
                    Lokasi Izin Bangunan di {{ $pemohon->letak_tanah }}
                </td>
            </tr>
        @endif
    </table>
</body>

</html>
