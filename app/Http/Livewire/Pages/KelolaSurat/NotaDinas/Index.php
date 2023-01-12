<?php

namespace App\Http\Livewire\Pages\KelolaSurat\NotaDinas;

use App\Models\SettingSurat;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{ 
    use LivewireAlert;

    public $dasar_nota_dinas, $validation = false;

    protected $listeners = [
        'saveDasarNotaDinas','saveDasarNotaDinas2','saveDasarNotaDinas3','savePerihalNotaDinas','saveSifatNotaDinas','saveTujuanNotaDinas'
    ];

    public function mount()
    {
        $this->dasar_nota_dinas = SettingSurat::where('key', 'dasar_notadinas')->first()->value;
        $this->dasar_nota_dinas2 = SettingSurat::where('key', 'dasar_notadinas2')->first()->value;
        $this->dasar_nota_dinas3 = SettingSurat::where('key', 'dasar_notadinas3')->first()->value;
        $this->Perihal_nota = SettingSurat::where('key', 'Perihal_nota')->first()->value;
        $this->Sifat_nota = SettingSurat::where('key', 'Sifat_nota')->first()->value;
        $this->Tujuan_nota = SettingSurat::where('key', 'Tujuan_nota')->first()->value;
    }

    public function render()
    {
        return view('livewire.pages.kelola-surat.nota-dinas.index');
    }

    public function saveDasarNotaDinas($data)
    {
        if ($data === '<p class="ql-align-justify"><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $dasar_nota_dinas = SettingSurat::where('key', 'dasar_notadinas')->first();
            $dasar_nota_dinas->value = $data;
            $dasar_nota_dinas->save();

            $this->alert('success', 'Berhasil mengubah dasar nota dinas part 1', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah dasar nota dinas part 1', [
                'timerProgressBar' => true,
            ]);
        }
    }



    public function saveDasarNotaDinas2($data)
    {
        if ($data === '<p class="ql-align-justify"><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $dasar_nota_dinas2 = SettingSurat::where('key', 'dasar_notadinas2')->first();
            $dasar_nota_dinas2->value = $data;
            $dasar_nota_dinas2->save();

            $this->alert('success', 'Berhasil mengubah dasar nota dinas part 2', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah dasar nota dinas part 2', [
                'timerProgressBar' => true,
            ]);
        }
    }


    public function saveDasarNotaDinas3($data)
    {
        if ($data === '<p class="ql-align-justify"><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $dasar_nota_dinas3 = SettingSurat::where('key', 'dasar_notadinas3')->first();
            $dasar_nota_dinas3->value = $data;
            $dasar_nota_dinas3->save();

            $this->alert('success', 'Berhasil mengubah dasar nota dinas part 3', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah dasar nota dinas part 3', [
                'timerProgressBar' => true,
            ]);
        }
    }



    public function saveTujuanNotaDinas($data)
    {
        if ($data === '<p class="ql-align-justify"><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $Tujuan_nota = SettingSurat::where('key', 'Tujuan_nota')->first();
            $Tujuan_nota->value = $data;
            $Tujuan_nota->save();

            $this->alert('success', 'Berhasil mengubah tujuan nota dinas ', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah tujuan nota dinas ', [
                'timerProgressBar' => true,
            ]);
        }
    }



    public function saveSifatNotaDinas($data)
    {
        if ($data === '<p class="ql-align-justify"><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $Sifat_nota = SettingSurat::where('key', 'Sifat_nota')->first();
            $Sifat_nota->value = $data;
            $Sifat_nota->save();

            $this->alert('success', 'Berhasil mengubah  nota dinas part 3', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah  nota dinas part 3', [
                'timerProgressBar' => true,
            ]);
        }
    }


    public function savePerihalNotaDinas($data)
    {
        if ($data === '<p class="ql-align-justify"><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $Perihal_nota = SettingSurat::where('key', 'Perihal_nota')->first();
            $Perihal_nota->value = $data;
            $Perihal_nota->save();

            $this->alert('success', 'Berhasil mengubah perihal nota dinas part 3', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah perihal  nota dinas part 3', [
                'timerProgressBar' => true,
            ]);
        }
    }
}
