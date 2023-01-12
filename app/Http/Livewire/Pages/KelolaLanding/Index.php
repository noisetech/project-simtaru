<?php

namespace App\Http\Livewire\Pages\KelolaLanding;

use App\Models\User;
use App\Models\Setting_landing;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Index extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    protected $listeners = ['handleOpenModalEditLanding'];

    public $nama_lengkap, $no_ktp, $email, $role; 
    public $key, $value, $gambar, $judul, $landing_id; 
    public $openModalEditLanding = false;

    
   

    // edit Landing
 

    public function rulesEditLanding($id)
    {
        return [
            'key' => 'required',  
            'value' => 'required', 
        ];
    }

  

    public function handleOpenModalEditLanding($id)
    {
        $Setting_landing = Setting_landing::find($id);
        $this->landing_id = $id;
        $this->key = $Setting_landing->key;
        $this->judul = $Setting_landing->judul;
        $this->value = $Setting_landing->value; 
        $this->gambar = $Setting_landing->gambar;
        $this->openModalEditLanding = true;
    } 

    public function hendleCloseModalEditLanding()
    {
        $this->reset();
        $this->resetValidation();
        $this->openModalEditLanding = false;
    }

    public function updateLanding()
    {
        $this->validate($this->rulesEditLanding($this->landing_id));

        try {
            $Setting_landing = Setting_landing::find($this->landing_id); 
            $Setting_landing->judul = $this->judul;
            $Setting_landing->value = $this->value; 
            if($this->landing_id!= 2 && $this->landing_id!= 3 && $this->landing_id!= 4){
                $path = 'public/landing';
                $Setting_landing->gambar = $this->gambar->store($path);
            }
            else{
                $Setting_landing->gambar='-';
            }
          
              
            $Setting_landing->save(); 

            $this->emit('refreshTableKelolaLanding');
            $this->hendleCloseModalEditLanding();
            $this->alert('success', 'Berhasil mengubah admin', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->hendleCloseModalEditLanding();
            $this->alert('warning', 'Gaggal mengubah admin', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.kelola-landing.index');
    }
}
