<?php

namespace App\Http\Livewire\Pages\VerifikasiBerkas;

use App\Models\Pengajuan;
use Livewire\Component;

class Edit extends Component
{
    public function mount($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        // if ($pengajuan->status_id !== 2) {
        //     abort(404);
        // }

        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
    }

    public function render()
    {
        return view('livewire.pages.verifikasi-berkas.edit');
    }
}
