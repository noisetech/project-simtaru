<?php

namespace App\Http\Livewire\Pages\VerifikasiLapangan;

use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $nama_lengkap, $pengajuan_id, $alasan_ditolak;
    public $openModalTolakVerifikasiLapangan = false;

    protected $listeners = ['handleOpenModalTolakVerifikasiLapangan'];

    // tolak
    public function handleOpenModalTolakVerifikasiLapangan($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalTolakVerifikasiLapangan = true;
    }

    public function handleCloseModalTolakVerifikasiLapangan()
    {
        $this->alasan_ditolak = null;
        $this->openModalTolakVerifikasiLapangan = false;
    }

    public function tolakVerifikasiLapangan()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->status_id = 1;
            $pengajuan->alasan_ditolak = 'Pokja PRPPR: ' . $this->alasan_ditolak;
            $pengajuan->save();
            $this->openModalTolakVerifikasiLapangan = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->openModalTolakVerifikasiLapangan = false;
            $this->alert('warning', 'Gagal', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.verifikasi-lapangan.index');
    }
}
