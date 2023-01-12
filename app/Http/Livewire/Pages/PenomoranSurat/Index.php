<?php

namespace App\Http\Livewire\Pages\PenomoranSurat;

use App\Helpers\SuratGenerator;
use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $no_surat_rekomendasi, $tanggal_turun_surat_rekomendasi;
    public $openModalBeriNomorSuratDanTanggal = false;

    protected $listeners = ['handleOpenModalBeriNomorSuratDanTanggal'];

    // beri nomor surat dan tanggal
    public function handleOpenModalBeriNomorSuratDanTanggal($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalBeriNomorSuratDanTanggal = true;
    }

    public function handleCloseModalBeriNomorSuratDanTanggal()
    {
        $this->no_surat_rekomendasi = null;
        $this->tanggal_turun_surat_rekomendasi = null;
        $this->openModalBeriNomorSuratDanTanggal = false;
    }

    public function beriNomorSuratDanTanggal()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->no_surat_rekomendasi = $this->no_surat_rekomendasi;
            $pengajuan->tanggal_turun_surat_rekomendasi = $this->tanggal_turun_surat_rekomendasi;
            $pengajuan->update();

            $path = 'pengajuan/' . $this->pengajuan_id;
            SuratGenerator::generateSuratRekomendasi($this->pengajuan_id, $path);

            $pengajuan->status_id = 11;
            $pengajuan->update();

            $this->handleCloseModalBeriNomorSuratDanTanggal();
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil memperbarui nomor surat dan tanggal', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal memperbarui nomor surat dan tanggal', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.penomoran-surat.index');
    }
}
