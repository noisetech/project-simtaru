<?php

namespace App\Http\Livewire\Pages\PenerbitanSurat;

use App\Helpers\SuratGenerator;
use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $revisi_berkas, $no_nota_dinas, $tanggal_turun_nota_dinas;
    public $openModalRevisiPenerbitanSurat = false;
    public $openModalSetujuPenerbitanSurat = false;

    protected $listeners = ['handleOpenModalRevisiPenerbitanSurat', 'handleOpenModalSetujuPenerbitanSurat'];

    // revisi penerbitan surat
    public function handleOpenModalRevisiPenerbitanSurat($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalRevisiPenerbitanSurat = true;
    }

    public function handleCloseModalRevisiPenerbitanSurat()
    {
        $this->revisi_berkas = null;
        $this->openModalRevisiPenerbitanSurat = false;
    }

    public function revisiPenerbitanSurat()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->status_id = 4;
            $pengajuan->revisi_berkas = 'Sekretariat: ' . $this->revisi_berkas;
            $pengajuan->save();
            $this->openModalRevisiPenerbitanSurat = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil mengirim revisi ke Pokja PRPPR', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->openModalRevisiPenerbitanSurat = false;
            $this->alert('warning', 'Gagal mengirim revisi ke Pokja PRPPR', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // setujui penerbitan surat
    public function handleOpenModalSetujuPenerbitanSurat($id)
    {
        $pengajuan = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->no_nota_dinas = $pengajuan->no_nota_dinas;
        if ($pengajuan->no_nota_dinas) {
            $this->tanggal_turun_nota_dinas = $pengajuan->tanggal_turun_nota_dinas->isoFormat('YYYY-MM-DD');
        }
        $this->openModalSetujuPenerbitanSurat = true;
    }

    public function handleCloseModalSetujuPenerbitanSurat()
    {
        $this->no_nota_dinas = null;
        $this->tanggal_turun_nota_dinas = null;
        $this->openModalSetujuPenerbitanSurat = false;
    }

    public function setujuPenerbitanSurat()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->no_nota_dinas = $this->no_nota_dinas;
            $pengajuan->tanggal_turun_nota_dinas = $this->tanggal_turun_nota_dinas;
            $pengajuan->update();

            $path = 'pengajuan/' . $this->pengajuan_id;
            SuratGenerator::generateSuratRekomendasi($this->pengajuan_id, $path);
            SuratGenerator::generateNotaDinas($this->pengajuan_id, $path);

            $pengajuan->status_id = 6;
            $pengajuan->update();

            $this->openModalSetujuPenerbitanSurat = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil menyetujui penerbitan surat', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            // dd($e);
            $this->alert('warning', 'Gagal menyetujui penerbitan surat', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.penerbitan-surat.index'); 
    }
}
