<?php

namespace App\Http\Livewire\Pages\UploadScanSuratRekomendasi;

use App\Models\Pengajuan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $scan_surat_hasil_rekomendasi;
    public $openModalUploadScanSuratRekomendasi = false;

    protected $listeners = ['handleOpenModalUploadScanSuratRekomendasi'];

    // upload scan surat rekomendasi
    public function handleOpenModalUploadScanSuratRekomendasi($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalUploadScanSuratRekomendasi = true;
    }

    public function handleCloseModalUploadScanSuratRekomendasi()
    {
        $this->scan_surat_hasil_rekomendasi = null;
        $this->resetValidation();
        $this->openModalUploadScanSuratRekomendasi = false;
    }

    protected $rules = [
        'scan_surat_hasil_rekomendasi' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ];

    public function uploadScanSuratRekomendasi()
    {
        $this->validate($this->rules);
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $path = 'pengajuan/' . $pengajuan->id;
            $pengajuan->scan_surat_hasil_rekomendasi = $this->scan_surat_hasil_rekomendasi->store($path);
            $pengajuan->status_id = 12;
            $pengajuan->update();

            $this->handleCloseModalUploadScanSuratRekomendasi();
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil meng-upload scan surat hasil rekomendasi', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal meng-upload scan surat hasil rekomendasi', [
                'timerProgressBar' => true,
            ]);
        }
    }



    public function render()
    {
        return view('livewire.pages.upload-scan-surat-rekomendasi.index');
    }
}
