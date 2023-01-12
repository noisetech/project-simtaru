<?php

namespace App\Http\Livewire\Pages\KelolaUser;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    protected $listeners = ['handleOpenModalEditUser'];

    public $nama_lengkap, $no_ktp, $email;
    public $openModalTambahUser = false;
    public $openModalEditUser = false;


    // tambah user
    protected $rulesTambahUser = [
        'nama_lengkap' => 'required',
        'no_ktp' => 'required|numeric|digits:16|unique:users',
        'email' => 'required|email|unique:users',
    ];

    public function handleOpenModalTambahUser()
    {
        $this->openModalTambahUser = true;
    }

    public function handleCloseModalTambahUser()
    {
        $this->reset();
        $this->resetValidation();
        $this->openModalTambahUser = false;
    }

    public function tambahUser()
    {
        $this->validate($this->rulesTambahUser);
        try {
            $user = new User;
            $user->name = $this->nama_lengkap;
            $user->no_ktp = $this->no_ktp;
            $user->email = $this->email;
            $user->password = bcrypt('12345678');
            $user->is_active = true;
            $user->email_verified_at = now();
            $user->assignRole('Pemohon');
            $user->save();

            $this->handleCloseModalTambahUser();
            $this->emit('refreshTableKelolaUser');
            $this->alert('success', 'Berhasil menambah user', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->handleCloseModalTambahUser();
            $this->alert('warning', 'Gaggal menambah user', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // edit user
    public $user_id, $aktif, $reset_password;

    public function rulesEditUser($id)
    {
        return [
            'nama_lengkap' => 'required',
            'no_ktp' => 'required|numeric|digits:16|unique:users,no_ktp,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ];
    }

    public function handleOpenModalEditUser($id)
    {
        $user = User::find($id);
        $this->user_id = $id;
        $this->nama_lengkap = $user->name;
        $this->no_ktp = $user->no_ktp;
        $this->email = $user->email;
        $this->aktif = $user->is_active;
        $this->openModalEditUser = true;
    }

    public function hendleCloseModalEditUser()
    {
        $this->reset();
        $this->resetValidation();
        $this->openModalEditUser = false;
    }

    public function updateUser()
    {
        $this->validate($this->rulesEditUser($this->user_id));
        try {
            $user = User::find($this->user_id);
            $user->name = $this->nama_lengkap;
            $user->no_ktp = $this->no_ktp;
            $user->email = $this->email;
            $user->is_active = $this->aktif;
            if ($this->reset_password) {
                $user->password = bcrypt('12345678');
            }
            $user->save();

            $this->emit('refreshTableKelolaUser');
            $this->hendleCloseModalEditUser();
            $this->alert('success', 'Berhasil mengubah user', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->hendleCloseModalEditUser();
            $this->alert('warning', 'Gaggal mengubah user', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.kelola-user.index');
    }
}
