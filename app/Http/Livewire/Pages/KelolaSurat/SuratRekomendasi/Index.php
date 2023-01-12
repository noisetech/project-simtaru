<?php

namespace App\Http\Livewire\Pages\KelolaSurat\SuratRekomendasi;

use App\Models\SettingSurat;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert; 

    public $dasar_surat_rekomendasi, $ketentuan_surat_rekomendasi, $tembusan_surat_pemanfaatan, $penghubung_surat_pemanfaatan;
    public $validation_dasar_surat_rekomendasi = false, $validation_ketentuan_surat_rekomendasi = false;

    protected $listeners = [
        'saveDasarSuratRekomendasi',
        'saveKetentuanSuratRekomendasi',
        'savePenghubungSuratRekomendasi',
        'saveTembusanSuratRekomendasi'
    ];

    public function mount()
    {
        $this->dasar_surat_rekomendasi = SettingSurat::where('key', 'dasar_surat_rekomendasi')->first()->value;
        $this->ketentuan_surat_rekomendasi = SettingSurat::where('key', 'ketentuan_surat_rekomendasi')->first()->value;
        $this->penghubung_surat_pemanfaatan = SettingSurat::where('key', 'penghubung_surat_pemanfaatan')->first()->value;
        $this->tembusan_surat_pemanfaatan = SettingSurat::where('key', 'tembusan_surat_pemanfaatan')->first()->value;
    }

    public function render()
    {
        return view('livewire.pages.kelola-surat.surat-rekomendasi.index');
    }

    public function saveDasarSuratRekomendasi($data)
    {
        if ($data === '<p class="ql-align-justify"><br></p>') {
            return $this->validation_dasar_surat_rekomendasi = true;
        } else {
            $this->validation_dasar_surat_rekomendasi = false;
        }

        try {
            $dasar_surat_rekomendasi = SettingSurat::where('key', 'dasar_surat_rekomendasi')->first();
            $dasar_surat_rekomendasi->value = $data;
            $dasar_surat_rekomendasi->save();

            $this->alert('success', 'Berhasil mengubah dasar surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah dasar surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function saveKetentuanSuratRekomendasi($data)
    {
        if ($data === '<p class="ql-align-justify"><br></p>') {
            return $this->validation_ketentuan_surat_rekomendasi = true;
        } else {
            $this->validation_ketentuan_surat_rekomendasi = false;
        }

        try {
            $ketentuan_surat_rekomendasi = SettingSurat::where('key', 'ketentuan_surat_rekomendasi')->first();
            $ketentuan_surat_rekomendasi->value = $data;
            $ketentuan_surat_rekomendasi->save();

            $this->alert('success', 'Berhasil mengubah ketentuan surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah ketentuan surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        }
    }



    public function savePenghubungSuratRekomendasi($data)
    {
        

        try {
            $penghubung_surat_pemanfaatan = SettingSurat::where('key', 'penghubung_surat_pemanfaatan')->first();
            $penghubung_surat_pemanfaatan->value = $data;
            $penghubung_surat_pemanfaatan->save();

            $this->alert('success', 'Berhasil mengubah penghubung surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah penghubung surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        }
    }



    public function saveTembusanSuratRekomendasi($data)
    {
        

        try {
            $tembusan_surat_pemanfaatan = SettingSurat::where('key', 'tembusan_surat_pemanfaatan')->first();
            $tembusan_surat_pemanfaatan->value = $data;
            $tembusan_surat_pemanfaatan->save();

            $this->alert('success', 'Berhasil mengubah tembusan surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah tembusan surat rekomendasi', [
                'timerProgressBar' => true,
            ]);
        }
    }
}
