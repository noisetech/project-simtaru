<?php

namespace App\Http\Controllers;

use App\Models\JenisTanah;
use App\Models\Pengajuan;
use App\Models\Manual_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class SurveyController extends Controller
{

    public function viewManualBook()
    {
        $manual_book = Manual_book::find(1);

        $path = storage_path('app/' . $manual_book->dokumen);
        return response()->file($path);
    }



    public function Edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        $file_dokumentasi = $pengajuan->file_dokumentasi;
        $pengajuan_id = $id;
        $status_id = $pengajuan->status_id;
        $nama_lengkap = $pengajuan->nama_lengkap;
        $no_ba = $pengajuan->no_ba;
        if ($pengajuan->tanggal_peninjauan_lokasi !== null) {
            $tanggal_peninjauan_lokasi = $pengajuan->tanggal_peninjauan_lokasi->isoFormat('YYYY-MM-DD');
        } else {
            $tanggal_peninjauan_lokasi = null;
        }
        $jenis_tanah = JenisTanah::all();
        $desa = $pengajuan->desa;
        $kecamatan = $pengajuan->kecamatan;
        $batas_sebelah_utara = $pengajuan->batas_sebelah_utara;
        $batas_sebelah_timur = $pengajuan->batas_sebelah_timur;
        $batas_sebelah_selatan = $pengajuan->batas_sebelah_selatan;
        $batas_sebelah_barat = $pengajuan->batas_sebelah_barat;
        $penggunaan_tanah_saat_dimohon = $pengajuan->penggunaan_tanah_saat_dimohon;
        $topografi_tanah = $pengajuan->topografi_tanah;
        $rencana_penggunaan_tanah = $pengajuan->rencana_penggunaan_tanah;
        $kesuburan_tanah = $pengajuan->kesuburan_tanah;
        $sarana_irigasi_atau_sumurbor = $pengajuan->sarana_irigasi_atau_sumurbor;
        $jarak_bangunan_dengan_sungai = $pengajuan->jarak_bangunan_dengan_sungai;
        $jarak_bangunan_dengan_jalan = $pengajuan->jarak_bangunan_dengan_jalan;
        $status_kepemilikan = $pengajuan->status_kepemilikan;
        $bukti_penguasaan_tanah = $pengajuan->bukti_penguasaan_tanah;
        $luas_tanah_seluruhnya = $pengajuan->luas_tanah_seluruhnya;
        $luas_tanah_yang_dimohon = $pengajuan->luas_tanah_yang_dimohon;
        $luas_tanah_yang_disetujui = $pengajuan->luas_tanah_yang_disetujui;
        $kesesuaian_rencana = $pengajuan->kesesuaian_rencana;
        $hubungan_pemohon_dengan_tanah = $pengajuan->hubungan_pemohon_dengan_tanah;
        $kesesuaian_dengan_keadaan_fisik_tanah = $pengajuan->kesesuaian_dengan_keadaan_fisik_tanah;
        $tanah_yang_dimohon_fisiknya = $pengajuan->tanah_yang_dimohon_fisiknya;
        $jarak_dari_pemukiman_terdekat = $pengajuan->jarak_dari_pemukiman_terdekat;
        $pertimbangan = $pengajuan->pertimbangan;
        $titik_koordinat = $pengajuan->titik_koordinat;
        $titik_polygon = $pengajuan->titik_polygon;
        $foto_dokumentasi = $pengajuan->foto_dokumentasi;
        return view('livewire.pages.verifikasi-lapangan.survey', compact(
            'pengajuan',
            'status_id',
            'pengajuan_id',
            'nama_lengkap',
            'file_dokumentasi',
            'foto_dokumentasi',
            'no_ba',
            'tanggal_peninjauan_lokasi',
            'desa',
            'kecamatan',
            'batas_sebelah_utara',
            'batas_sebelah_timur',
            'batas_sebelah_selatan',
            'batas_sebelah_barat',
            'penggunaan_tanah_saat_dimohon',
            'topografi_tanah',
            'rencana_penggunaan_tanah',
            'kesuburan_tanah',
            'sarana_irigasi_atau_sumurbor',
            'jarak_bangunan_dengan_sungai',
            'jarak_bangunan_dengan_jalan',
            'status_kepemilikan',
            'bukti_penguasaan_tanah',
            'luas_tanah_seluruhnya',
            'luas_tanah_yang_dimohon',
            'luas_tanah_yang_disetujui',
            'kesesuaian_rencana',
            'hubungan_pemohon_dengan_tanah',
            'kesesuaian_dengan_keadaan_fisik_tanah',
            'tanah_yang_dimohon_fisiknya',
            'jarak_dari_pemukiman_terdekat',
            'pertimbangan',
            'titik_koordinat',
            'titik_polygon',
            'jenis_tanah'
        ));
    }


    public function update(Request $request)
    {

        $pengajuan = Pengajuan::findOrFail($request->pengajuan_id);

        $pengajuan->update([
            'titik_polygon' => $request->titik_polygon,
            'jenis_tanah_id' => $request->jenis_tanah_id
        ]);

        return redirect('/verifikasi-lapangan');
    }
}
