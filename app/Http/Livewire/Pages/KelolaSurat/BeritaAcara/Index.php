<?php

namespace App\Http\Livewire\Pages\KelolaSurat\BeritaAcara;

use App\Models\SettingSurat;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{ 
    use LivewireAlert;

    public $persyaratan_berita_acara, $pengantar_berita_acara, $penghubung_hasil_survey_berita_acara,$pengantar_berita_acara2,  $validation = false;

    protected $listeners = [
        'savePersyaratanBeritaAcara','savePengantarBeritaAcara','savePenghubungBeritaAcara','savePengantarBeritaAcara2'
    ];

    public function mount()
    {
        $this->persyaratan_berita_acara = SettingSurat::where('key', 'persyaratan_berita_acara')->first()->value;
        $this->pengantar_berita_acara = SettingSurat::where('key', 'pengantar_berita_acara')->first()->value; 
        $this->pengantar_berita_acara2 = SettingSurat::where('key', 'pengantar_berita_acara2')->first()->value; 
        $this->penghubung_hasil_survey_berita_acara = SettingSurat::where('key', 'penghubung_hasil_survey_berita_acara')->first()->value; 
    }

    public function render()
    {
        return view('livewire.pages.kelola-surat.berita-acara.index');
    }

    public function savePersyaratanBeritaAcara($data)
    {
        if ($data === '<p><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $persyaratan_berita_acara = SettingSurat::where('key', 'persyaratan_berita_acara')->first();
            $persyaratan_berita_acara->value = $data;
            $persyaratan_berita_acara->save();

            $this->alert('success', 'Berhasil mengubah persyaratan berita acara', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah persyaratan berita acara', [
                'timerProgressBar' => true,
            ]);
        }
    }



    public function savePengantarBeritaAcara($data)
    {
        if ($data === '<p><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $pengantar_berita_acara = SettingSurat::where('key', 'pengantar_berita_acara')->first();
            $pengantar_berita_acara->value = $data;
            $pengantar_berita_acara->save();

            $this->alert('success', 'Berhasil mengubah Pengantar berita acara', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah Pengantar berita acara', [
                'timerProgressBar' => true,
            ]);
        }
    }


    public function savePengantarBeritaAcara2($data)
    {
        if ($data === '<p><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $pengantar_berita_acara2 = SettingSurat::where('key', 'pengantar_berita_acara2')->first();
            $pengantar_berita_acara2->value = $data;
            $pengantar_berita_acara2->save();

            $this->alert('success', 'Berhasil mengubah Pengantar berita acara', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah Pengantar berita acara', [
                'timerProgressBar' => true,
            ]);
        }
    }

    

    public function savePenghubungBeritaAcara($data)
    {
        if ($data === '<p><br></p>') {
            return $this->validation = true;
        } else {
            $this->validation = false;
        }

        try {
            $penghubung_hasil_survey_berita_acara = SettingSurat::where('key', 'penghubung_hasil_survey_berita_acara')->first();
            $penghubung_hasil_survey_berita_acara->value = $data;
            $penghubung_hasil_survey_berita_acara->save();

            $this->alert('success', 'Berhasil mengubah paragraf penghubung berita acara', [
                'timerProgressBar' => true,
            ]);
        } catch (\Throwable $th) {
            $this->alert('warning', 'Gagal mengubah paragraf penghubung  berita acara', [
                'timerProgressBar' => true,
            ]);
        }
    }

}
