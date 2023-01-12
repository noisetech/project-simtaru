<?php

namespace App\Http\Livewire\Pages\PersetujuanKetuaTkprd;

use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $revisi_berkas, $revisi_ke_bagian;
    public $openModalRevisiPersetujuanKetuaTKPRD = false;
    public $openModalSetujuPersetujuanKetuaTKPRD = false;

    protected $listeners = ['handleOpenModalRevisiPersetujuanKetuaTKPRD', 'handleOpenModalSetujuPersetujuanKetuaTKPRD'];

    // revisi
    public function handleOpenModalRevisiPersetujuanKetuaTKPRD($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalRevisiPersetujuanKetuaTKPRD = true;
    }

    public function handleCloseModalRevisiPersetujuanKetuaTKPRD()
    {
        $this->revisi_berkas = null;
        $this->revisi_ke_bagian = null;
        $this->openModalRevisiPersetujuanKetuaTKPRD = false;
    }

    public function revisiPersetujuanKetuaTKPRD()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->revisi_berkas = $this->revisi_berkas;
            if ($this->revisi_ke_bagian == 2) {
                $pengajuan->status_id = 7;
            } else {
                $pengajuan->status_id = 4;
            }
            $pengajuan->update();

            $this->handleCloseModalRevisiPersetujuanKetuaTKPRD();
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil mengirim revisi', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal mengirim revisi', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // setujui
    public function handleOpenModalSetujuPersetujuanKetuaTKPRD($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalSetujuPersetujuanKetuaTKPRD = true;
    }

    public function handleCloseModalSetujuPersetujuanKetuaTKPRD()
    {
        $this->openModalSetujuPersetujuanKetuaTKPRD = false;
    }

    public function setujuPersetujuanKetuaTKPRD()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->status_id = 8;
            $pengajuan->update();

            $this->handleCloseModalSetujuPersetujuanKetuaTKPRD();
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil diteruskan ke Kepala Dinas PUPR', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal diteruskan ke Kepala Dinas PUPR', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.persetujuan-ketua-tkprd.index');
    }
}
