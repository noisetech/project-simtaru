<?php

namespace App\Http\Livewire\Pages\KelolaPegawaiDinas;

use App\Models\PegawaiDinas;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    protected $listeners = ['handleOpenModalEditPegawaiDinas'];

    public $jabatan, $nama, $jabatan_lain, $nip;
    public $pegawai_dinas_id;
    public $openModalEditPegawaiDinas = false;

    public function handleOpenModalEditPegawaiDinas($id)
    {
        $pegawai_dinas = PegawaiDinas::find($id);
        $this->pegawai_dinas_id = $id;
        $this->jabatan = $pegawai_dinas->jabatan;
        $this->nama = $pegawai_dinas->nama;
        $this->jabatan_lain = $pegawai_dinas->jabatan_lain;
        $this->nip = $pegawai_dinas->nip;
        $this->openModalEditPegawaiDinas = true;
    }

    public function hendleCloseModalEditPegawaiDinas()
    {
        $this->reset();
        $this->resetValidation();
        $this->openModalEditPegawaiDinas = false;
    }

    public function updatePegawaiDinas()
    {
        try {
            $pegawai_dinas = PegawaiDinas::find($this->pegawai_dinas_id);
            $pegawai_dinas->nama = $this->nama;
            $pegawai_dinas->jabatan_lain = $this->jabatan_lain;
            $pegawai_dinas->nip = $this->nip;
            $pegawai_dinas->save();

            $this->emit('refreshTableKelolaPegawaiDinas');
            $this->hendleCloseModalEditPegawaiDinas();
            $this->alert('success', 'Berhasil mengubah pegawai dinas', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->hendleCloseModalEditPegawaiDinas();
            $this->alert('warning', 'Gaggal mengubah pegawai dinas', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.kelola-pegawai-dinas.index');
    }
}
