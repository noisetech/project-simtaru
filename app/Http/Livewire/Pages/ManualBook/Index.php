<?php

namespace App\Http\Livewire\Pages\ManualBook;

use App\Models\Manual_book;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Index extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    protected $listeners = ['handleOpenModalEditMbook'];

    public $nama_lengkap, $no_ktp, $email, $role;
    public $key, $value, $dokumen, $judul, $Mbook_id;
    public $openModalEditMbook = false;




    // edit Mbook


    public function rulesEditMbook($id)
    {
        return [
            'judul' => 'required',
            'dokumen' => 'required',
        ];
    }



    public function handleOpenModalEditMbook($id)
    {
        $Manual_book = Manual_book::find($id);
        $this->Mbook_id = $id;
        $this->judul = $Manual_book->judul;
        $this->dokumen = $Manual_book->dokumen;
        $this->openModalEditMbook = true;
    }

    public function hendleCloseModalEditMbook()
    {
        $this->reset();
        $this->resetValidation();
        $this->openModalEditMbook = false;
    }

    public function updateMbook()
    {
        $this->validate($this->rulesEditMbook($this->Mbook_id));

        try {
            $Manual_book = Manual_book::find($this->Mbook_id);
            $Manual_book->judul = $this->judul;
               $path = 'public/manualbook';
                $Manual_book->dokumen = $this->dokumen->store($path);



            $Manual_book->save();

            $this->emit('refreshTableKelolaMbook');
            $this->hendleCloseModalEditMbook();
            $this->alert('success', 'Berhasil mengubah manual book', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->hendleCloseModalEditMbook();
            $this->alert('warning', 'Gaggal mengubah manual book', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.manual-book.index');
    }
}
