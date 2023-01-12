<?php

namespace App\Http\Livewire\Pages\Peta;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        // bahan semua pemetaan semua polygon
        $pengajuan = DB::table('pengajuan')
            ->join('jenis_tanah', 'jenis_tanah.id', '=', 'pengajuan.jenis_tanah_id')
            ->where('status_id', '>=', '10')
            ->whereNotNull('titik_polygon')
            ->get();




        return view('livewire.pages.peta.index', [
            'pengajuan' => $pengajuan,

        ])->layout('layouts.main');
    }
}
