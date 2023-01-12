<?php

namespace App\Http\Livewire\Pages\RevisiBerkas;

use App\Helpers\SuratGenerator;
use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $openModalRevisiNotaDinas = false;
    public $openModalRevisiSuratRekomendasi = false;

    protected $listeners = ['handleOpenModalRevisiNotaDinas', 'handleOpenModalRevisiSuratRekomendasi'];

    // revisi nota dinas
    public function handleOpenModalRevisiNotaDinas($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->no_nota_dinas = $pengajuan->no_nota_dinas;
        if ($pengajuan->no_nota_dinas) {
            $this->tanggal_turun_nota_dinas = $pengajuan->tanggal_turun_nota_dinas->isoFormat('YYYY-MM-DD');
        }
        $this->openModalRevisiNotaDinas = true;
    }

    public function handleCloseModalRevisiNotaDinas()
    {
        $this->no_nota_dinas = null;
        $this->tanggal_turun_nota_dinas = null;
        $this->openModalRevisiNotaDinas = false;
    }

    public function revisiNotaDinas()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->no_nota_dinas = $this->no_nota_dinas;
            $pengajuan->tanggal_turun_nota_dinas = $this->tanggal_turun_nota_dinas;
            $pengajuan->update();

            $path = 'pengajuan/' . $this->pengajuan_id;
            SuratGenerator::generateNotaDinas($this->pengajuan_id, $path);

            $pengajuan->status_id = 6;
            $pengajuan->update();

            $this->openModalRevisiNotaDinas = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil revisi nota dinas', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            // dd($e);
            $this->alert('warning', 'Gagal revisi nota dinas', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // revisi surat rekomendasi
    public function handleOpenModalRevisiSuratRekomendasi($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalRevisiSuratRekomendasi = true;
    }

    public function handleCloseModalRevisiSuratRekomendasi()
    {
        $this->openModalRevisiSuratRekomendasi = false;
    }

    public function revisiSuratRekomendasi()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->update();

            $path = 'pengajuan/' . $this->pengajuan_id;
            SuratGenerator::generateSuratRekomendasi($this->pengajuan_id, $path);

            $pengajuan->status_id = 6;
            $pengajuan->update();

            $this->openModalRevisiSuratRekomendasi = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil revisi surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            // dd($e);
            $this->alert('warning', 'Gagal revisi surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.revisi-berkas.index');
    } 
}
