<?php

namespace App\Http\Livewire\Pages\UbahStatusPengajuan;

use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $status_pengajuan;
    public $openModalUbahStatusPengajuan = false;

    protected $listeners = ['handleOpenModalUbahStatusPengajuan'];

    //ubah status pengajuan
    public function handleOpenModalUbahStatusPengajuan($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->status_pengajuan = $pengajuan->status_id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalUbahStatusPengajuan = true;
    }

    public function handleCloseModalUbahStatusPengajuan()
    {
        $this->status_pengajuan = null;
        $this->openModalUbahStatusPengajuan = false;
    }

    public function ubahStatusPengajuan()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->status_id = $this->status_pengajuan;
            $pengajuan->update();

            $this->handleCloseModalUbahStatusPengajuan();
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil mengubah status pengajuan', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal mengubah status pengajuan', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.ubah-status-pengajuan.index');
    }
}
