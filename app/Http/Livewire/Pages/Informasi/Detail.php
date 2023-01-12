<?php

namespace App\Http\Livewire\Pages\Informasi;

use App\Models\Pengajuan;
use Livewire\Component;

class Detail extends Component
{
    public function mount($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);


        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->titik_polygon = $pengajuan->titik_polygon;
        $this->titik_koordinat = $pengajuan->titik_koordinat;
        $this->alamat = $pengajuan->alamat;
        $this->no_identitas = $pengajuan->no_identitas;
        $this->luas_tanah_yang_disetujui = $pengajuan->luas_tanah_yang_disetujui;
        $this->luas_bangunan = $pengajuan->luas_bangunan;
        $this->kdb = $pengajuan->kdb;
        $this->klb = $pengajuan->klb;
        $this->kdh = $pengajuan->kdh;
        $this->gsb = $pengajuan->gsb;
        $this->tinggi_bangunan = $pengajuan->tinggi_bangunan;
        $this->rencana_jalan = $pengajuan->rencana_jalan;
        // $this->pengajuan = $pengajuan;
    }

    public function render()
    {
        $pengajuan = Pengajuan::where('id', '=',  $this->pengajuan_id)
        ->get();

        return view('livewire.pages.informasi.detail', compact('pengajuan'))->layout('layouts.main');

    }
}
