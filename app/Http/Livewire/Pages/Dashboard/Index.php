<?php

namespace App\Http\Livewire\Pages\Dashboard;

use App\Models\Pengajuan;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $pengajuan = Pengajuan::where('status_id', '=', '11')
            ->orWhere('status_id', '=', '12')
            ->get();

        $data_total_pengajuan_per_bulan = DB::table('pengajuan')
            ->addSelect(DB::raw('count(*) as total_pengajuan_perbulan'))
            ->addSelect(DB::raw('MONTHNAME(created_at) as bulan'))
            ->groupBy('bulan')
            ->orderByRaw('bulan ASC')
            ->pluck('total_pengajuan_perbulan');



        $data_total_pengajuan_per_tahun = DB::table('pengajuan')
            ->addSelect(DB::raw('count(*) as total_pengajuan_per_tahun'))
            ->addSelect(DB::raw('YEAR(created_at) as tahun'))
            ->groupBy('tahun')
            ->orderByRaw('tahun ASC')
            ->pluck('total_pengajuan_per_tahun');

        $data_bulan =  DB::table('pengajuan')
            ->addSelect(DB::raw('MONTHNAME(created_at) as bulan'))
            ->groupBy('bulan')
            ->get()
            ->pluck('bulan');


        $data_tahun =  DB::table('pengajuan')
            ->addSelect(DB::raw('YEAR(created_at) as tahun'))
            ->groupBy('tahun')
            ->get()
            ->pluck('tahun');

        // dd($data_tahun);



        return view('livewire.pages.dashboard.index', [
            'pengajuan' => $pengajuan,
            'data_total_pengajuan_per_bulan' => $data_total_pengajuan_per_bulan,
            'data_bulan' => $data_bulan,
            'data_tahun' => $data_tahun,
            'data_total_pengajuan_per_tahun' => $data_total_pengajuan_per_tahun
        ]);
    }
}
