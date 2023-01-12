<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Permohonan TKPRD - {{ $pemohon->nama_lengkap }}</title>
    <style>
        @page {
            margin: 0.5cm 0.5cm 0cm 0.5cm;
        }

        body {
            margin: 0.5cm 0.5cm 0cm 0.5cm;
        }

    </style>
</head>

<body style="text-align:justify; font-size: 10pt; font-family: Arial, Helvetica, sans-serif;">
    <table style="width: 100%;">
        <thead>

        </thead>
        <tbody>
            <tr>
                <td style="width: 65%"></td>
                <td>Kotabumi, {{ $pemohon->created_at->isoFormat(' D MMMM Y') }}</td>
            </tr>
            <tr>
                <td>Nomor &nbsp;&nbsp;&nbsp;&nbsp;: </td>
                <td>Kepada Yth</td>
            </tr>
            <tr>
                <td>Lampiran : 1 (satu) berkas</td>
                <td>Bupati Lampung Utara</td>
            </tr>
            <tr>
                <td>Perihal &nbsp;&nbsp;&nbsp;&nbsp;: Permohonan Rekomendasi
                </td>
                <td>c.q. Ketua TKPRD Kab. Lampung Utara</td>
            </tr>
            <tr>
                <td></td>
                <td>u.b. Sekretaris TKPRD Kab. Lampung Utara</td>
            </tr>
            <tr>
                <td></td>
                <td>di - </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-indent: 2cm;">KOTABUMI</td>
            </tr>
        </tbody>
    </table>
    <br />
    <div style="padding-left: 1.5cm">
        <p>Dengan Hormat,</p>
        <p style="text-align: justify">Berdasarkan Peraturan Daerah Kabupaten Lampung Utara Nomor 4 Tahun 2014 tentang
            Rencana Tata Ruang Wilayah
            Kabupaten Lampung Utara Tahun 2014 - 2034, bersama ini kami mengajukan rekomendasi izin pemanfaatan ruang
            dengan
            keterangan sebagai berikut :</p>

        <table style="width: 100%;">
            <thead>
            </thead>
            <tbody>
                <tr>
                    <td style="font-weight: bold;  width: 29%;">Keterangan Pemohon:</td>
                    <td style="width: 1%;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Nama</td>
                    <td style="vertical-align:top; width: 1%;">: </td>
                    <td style="vertical-align:top">{{ $pemohon->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Alamat</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->alamat }}</td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Pekerjaan</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->pekerjaan }}</td>
                </tr>
                <tr>
                    <td style="vertical-align:top">No. Identitas</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->no_identitas }}</td>
                </tr>
                <tr>
                    <td style="vertical-align:top">No. Telepon/HP</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->no_hp }}</td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Bertindak untuk dan atas nama</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->bertindak_atas_nama }}</td>
                </tr>
            </tbody>
        </table>
        <br />
        <table style="width: 100%; vertical-align:top">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <td style="font-weight: bold; width:28%;">Keterangan tentang Tanah:</td>
                    <td style="width: 1%;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Luas tanah seluruhnya</td>
                    <td style="vertical-align:top; width: 1%;">: </td>
                    <td style="vertical-align:top">{{ $pemohon->luas_tanah_seluruhnya }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Luas tanah yang dimohon</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->luas_tanah_yang_dimohon }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Bukti penguasaan tanah</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->bukti_penguasaan_tanah }}</td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Letak tanah</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->letak_tanah }}</td>
                </tr>
                <tr>
                    <td style="vertical-align:top">Peruntukan Tanah</td>
                    <td style="vertical-align:top">: </td>
                    <td style="vertical-align:top">{{ $pemohon->rencana_penggunaan_tanah }}</td>
                </tr>
            </tbody>
        </table>

        <p>Untuk melengkapi permohonan tersebut, bersama ini kami lampirkan :</p>
        <ol style="text-align: justify">
            <li>Fotocopy Kartu Tanda Penduduk (KTP)</li>
            <li>Fotocopy tanda bukti penguasaan hak atas tanah (Sertipikat sesuai peruntukan)</li>
            <li>Fotocopy SPPT PBB tanah yang dimohon tahun terakhir</li>
            <li>Fotocopy akte pendirian perusahaan (untuk badan hukum)</li>
            <li>Fotocopy Kartu Nomor Pokok Wajib Pajak (NPWP)</li>
            <li>Persetujuan Tetangga dilampirkan fotocopy KTP yang menandatangani lembar persetujuan dan diketahui oleh
                Kepala Desa/Lurah serta Camat
            </li>
            <li>Gambar rencana bangunan</li>
            <li>Set lokasi bangunan</li>
            <li>Surat pernyataan dari pemohon (pemilik) jika terjadi force majeur</li>
            <li>Uraian rencana proyek (proposal)</li>
        </ol>
        <p style="text-align: justify">Apabila permohonan rekomendasi tersebut dikabulkan, maka kami sanggup dan
            bersedia
            memenuhi segala persyaratan-persyaratan yang ditentukan.</p>
        <p style="text-align: justify">Demikian permohonan ini kami buat dengan sebenarnya dan atas perhatian serta
            bantuannya disampaikan terima kasih.
        </p>
    </div>
    <br />
    <table style="width: 100%; text-align:center;">
        <tr>
            <td style="width: 50%"></td>
            <td>Pemohon</td>
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
            <td>{{ $pemohon->nama_lengkap }}</td>
        </tr>
    </table>



    <div style="page-break-after: always;"></div>
    {{-- second sheet --}}
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
    <p style="text-align: justify; text-indent: 1cm;">Dengan ini menyatakan bahwa apabila permohonan Rekomendasi
        Izin
        Pemanfaatan Ruang
        dikabulkan, maka saya berjanji
        untuk melaksanakan pembangunan sesuai dengan permohonan ini selambat-lambatnya 1(satu) tahun setelah surat
        rekomendasi tentang Izin Pemanfaatan Ruang ini diterbitkan</p>
    <p style="text-align: justify; text-indent: 1cm;">Apabila saya tidak mengindahkan/melaksanakan atau menyimpang
        dari
        ketentuan diatas, maka
        saya bersedia
        mengembalikan fungsi ruang seperti semula, serta saya sadar bahwa Rekomendasi Izin Pemanfaatan Ruang yang
        saya
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
    <div style="page-break-after: always;"></div>


    {{-- third sheet --}}
    <h3 style="text-align: center; margin-bottom: 0.5cm; text-decoration: underline;">SKETSA LOKASI
        TANAH YANG DIMOHON
    </h3>
    <table style="width: 100%">
        <thead>
        </thead>
        <tbody>
            <tr>
                <td style="vertical-align:top; width: 24%">Nama Pemohon</td>
                <td style="vertical-align:top; width: 1%">: </td>
                <td>{{ $pemohon->nama_lengkap }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">Luas tanah yang dimohon</td>
                <td style="vertical-align:top">: </td>
                <td>{{ $pemohon->luas_tanah_yang_dimohon }} m<sup>2</sup></td>
            </tr>
            <tr>
                <td style="vertical-align:top">Letak tanah yang dimohon</td>
                <td style="vertical-align:top">: </td>
                <td>{{ $pemohon->letak_tanah }}</td>
            </tr>
        </tbody>
    </table>
    <br />
    <br />
    <br />
    <table style="width:100%; border:1px solid; padding:0.5cm 0.5cm 0cm 0.5cm">
        <thead>
        </thead>
        <tbody>
            @if (isset($pemohon->gambar_rencana_pembangunan))
                @foreach ($gambar_rencana_pembangunan as $item)
                    <tr style="width: 96%;">
                        <td style="padding-bottom: 0.5cm">
                            <img src="{{ $item }}" alt="" style="width: 96%">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr style="width: 96%;">
                    <td style="padding-bottom: 0.5cm; text-align: center">
                        Tidak ada
                    </td>
                </tr>
            @endif
    </table>
</body>

</html>
