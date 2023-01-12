<?php

namespace App\Http\Livewire\Pages\VerifikasiBerkas;

use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $nama_lengkap, $pengajuan_id, $alasan_ditolak;
    public $openModalSetujuVerifikasiBerkas = false;
    public $openModalTolakVerifikasiBerkas = false;

    protected $listeners = ['handleOpenModalSetujuVerifikasiBerkas', 'handleOpenModalTolakVerifikasiBerkas'];

    // setujui
    public function handleOpenModalSetujuVerifikasiBerkas($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalSetujuVerifikasiBerkas = true;
    }

    public function handleCloseModalSetujuVerifikasiBerkas()
    {
        $this->openModalSetujuVerifikasiBerkas = false;
    }

    public function setujuVerifikasiBerkas()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->status_id = 3;
            $pengajuan->save();
            $this->openModalSetujuVerifikasiBerkas = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->openModalSetujuVerifikasiBerkas = false;
            $this->alert('warning', 'Gagal', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // tolak
    public function handleOpenModalTolakVerifikasiBerkas($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalTolakVerifikasiBerkas = true;
    }

    public function handleCloseModalTolakVerifikasiBerkas()
    {
        $this->alasan_ditolak = null;
        $this->openModalTolakVerifikasiBerkas = false;
    }

    public function tolakVerifikasiBerkas()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->status_id = 1;
            $pengajuan->alasan_ditolak = 'Sekretariat TKPRD: ' . $this->alasan_ditolak;
            $pengajuan->save();
            $this->openModalTolakVerifikasiBerkas = false;
            $this->alasan_ditolak = null;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->openModalTolakVerifikasiBerkas = false;
            $this->alert('warning', 'Gagal', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render() 
    {
        return view('livewire.pages.verifikasi-berkas.index');
    }
}
