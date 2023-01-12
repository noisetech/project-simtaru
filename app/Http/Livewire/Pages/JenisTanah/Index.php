<?php

namespace App\Http\Livewire\Pages\JenisTanah;

use App\Models\JenisTanah;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{

    use LivewireAlert;

    public $jenis_tanah, $warna;
    public $openModalTambahJenisTanah = false;



    // tambah jenis tanah
    protected $rulesTambahJenisTanah = [
        'jenis_tanah' => 'required',
        'warna' => 'required',
    ];

    public function handleopenModalTambahJenisTanah()
    {
        $this->openModalTambahJenisTanah = true;
    }

    public function handleCloseModalJenisTanah()
    {
        $this->reset();
        $this->resetValidation();
        $this->openModalTambahJenisTanah = false;
    }

    public function tambah_jenis_tanah()
    {
        try {
            $jenis_tanah = new JenisTanah();
            $jenis_tanah->jenis_tanah = ucfirst($this->jenis_tanah);
            $jenis_tanah->warna = $this->warna;

            // dd($jenis_tanah);
            $jenis_tanah->save();


            $this->handleCloseModalJenisTanah();
            $this->emit('refreshTableJenisTanah');
            $this->alert('success', 'Berhasil menambah jenis tanah', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->handleCloseModalJenisTanah();
            $this->alert('warning', 'Gaggal menambah jenis tanah', [
                'timerProgressBar' => true,
            ]);
        }
    }


    public function render()
    {
        return view('livewire.pages.jenis-tanah.index');
    }
}
