<?php

namespace App\Http\Livewire\Pages\PersetujuanKadisPupr;

use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $alasan_ditolak, $revisi_berkas, $revisi_ke_bagian;
    public $openModalTolakPersetujuanKadisPUPR = false;
    public $openModalRevisiPersetujuanKadisPUPR = false;
    public $openModalSetujuPersetujuanKadisPUPR = false;

    protected $listeners = ['handleOpenModalTolakPersetujuanKadisPUPR', 'handleOpenModalRevisiPersetujuanKadisPUPR', 'handleOpenModalSetujuPersetujuanKadisPUPR'];

    // tolak
    public function handleOpenModalTolakPersetujuanKadisPUPR($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalTolakPersetujuanKadisPUPR = true;
    }

    public function handleCloseModalTolakPersetujuanKadisPUPR()
    {
        $this->openModalTolakPersetujuanKadisPUPR = false;
    }

    public function tolakPersetujuanKadisPUPR()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->alasan_ditolak = $this->alasan_ditolak;
            $pengajuan->status_id = 1;
            $pengajuan->update();

            $this->handleCloseModalTolakPersetujuanKadisPUPR();
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil menolak pengajuan', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal menolak pengajuan', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // revisi
    public function handleOpenModalRevisiPersetujuanKadisPUPR($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalRevisiPersetujuanKadisPUPR = true;
    }

    public function handleCloseModalRevisiPersetujuanKadisPUPR()
    {
        $this->revisi_berkas = null;
        $this->revisi_ke_bagian = null;
        $this->openModalRevisiPersetujuanKadisPUPR = false;
    }

    public function revisiPersetujuanKadisPUPR()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->revisi_berkas = $this->revisi_berkas;
            if ($this->revisi_ke_bagian == 2) {
                $pengajuan->status_id = 9;
            } else {
                $pengajuan->status_id = 4;
            }
            $pengajuan->update();

            $this->handleCloseModalRevisiPersetujuanKadisPUPR();
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
    public function handleOpenModalSetujuPersetujuanKadisPUPR($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalSetujuPersetujuanKadisPUPR = true;
    }

    public function handleCloseModalSetujuPersetujuanKadisPUPR()
    {
        $this->openModalSetujuPersetujuanKadisPUPR = false;
    }

    public function setujuPersetujuanKadisPUPR()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->status_id = 10;
            $pengajuan->update();

            $this->handleCloseModalSetujuPersetujuanKadisPUPR();
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil menyetujui pengajuan', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal menyetujui pengajuan', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.persetujuan-kadis-pupr.index');
    }
}
