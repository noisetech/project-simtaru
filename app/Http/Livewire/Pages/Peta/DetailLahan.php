<?php

namespace App\Http\Livewire\Pages\Peta;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DetailLahan extends Component
{



    public function mount($id)
    {
        $pengajuan = Pengajuan::find($id);

        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->titik_polygon = $pengajuan->titik_polygon;
        $this->alamat = $pengajuan->alamat;
        $this->pekerjaan = $pengajuan->pekerjaan;
        $this->luas_tanah_yang_disetujui = $pengajuan->luas_tanah_yang_disetujui;
        $this->luas_tanah_yang_dimohon = $pengajuan->luas_tanah_yang_dimohon;
        $this->letak_tanah = $pengajuan->letak_tanah;
        $this->rencana_penggunaan_tanah = $pengajuan->rencana_penggunaan_tanah;
        $this->desa = $pengajuan->desa;
        $this->kecamatan = $pengajuan->kecamatan;
    }

    public function render()
    {
        $pengajuan  = Pengajuan::where('id', '=', $this->pengajuan_id)->first();
        $bahan_peta =   DB::table('pengajuan')
            ->join('jenis_tanah', 'jenis_tanah.id', '=', 'pengajuan.jenis_tanah_id')
            ->where('pengajuan.id', $this->pengajuan_id)
            ->get();
        $kecamatan = DB::table('kecamatan')->get();
        return view('livewire.pages.peta.detail-lahan', [
            'pengajuan' => $pengajuan,
            'bahan_peta' => $bahan_peta,
            'kecamatan' => $kecamatan
        ])->layout('layouts.main');;
    }
}
