<?php

namespace App\Http\Livewire\Pages\KelolaAdmin;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    protected $listeners = ['handleOpenModalEditAdmin'];

    public $nama_lengkap, $no_ktp, $email, $role;
    public $openModalTambahAdmin = false;
    public $openModalEditAdmin = false;

    // tambah admin
    protected $rulesTambahAdmin = [
        'nama_lengkap' => 'required',
        'no_ktp' => 'required|numeric|digits:16|unique:users',
        'email' => 'required|email|unique:users',
    ];

    public function handleOpenModalTambahAdmin()
    {
        $this->openModalTambahAdmin = true;
    }

    public function handleCloseModalTambahAdmin()
    {
        $this->reset();
        $this->resetValidation();
        $this->openModalTambahAdmin = false;
    }

    public function tambahAdmin()
    {
        $this->validate($this->rulesTambahAdmin);
        try {
            $admin = new User;
            $admin->name = $this->nama_lengkap;
            $admin->no_ktp = $this->no_ktp;
            $admin->email = $this->email;
            $admin->password = bcrypt('12345678');
            $admin->is_active = true;
            $admin->email_verified_at = now();
            $admin->assignRole($this->role);
            $admin->save();

            $this->handleCloseModalTambahAdmin();
            $this->emit('refreshTableKelolaAdmin');
            $this->alert('success', 'Berhasil menambah admin', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->handleCloseModalTambahAdmin();
            $this->alert('warning', 'Gaggal menambah admin', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // edit admin
    public $admin_id, $aktif, $reset_password;

    public function rulesEditAdmin($id)
    {
        return [
            'nama_lengkap' => 'required',
            'no_ktp' => 'required|numeric|digits:16|unique:users,no_ktp,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ];
    }

    public function handleOpenModalEditAdmin($id)
    {
        $admin = User::find($id);
        $this->admin_id = $id;
        $this->nama_lengkap = $admin->name;
        $this->no_ktp = $admin->no_ktp;
        $this->email = $admin->email;
        $this->role = $admin->getRoleNames()->first();
        $this->aktif = $admin->is_active;
        $this->openModalEditAdmin = true;
    }

    public function hendleCloseModalEditAdmin()
    {
        $this->reset();
        $this->resetValidation();
        $this->openModalEditAdmin = false;
    }

    public function updateAdmin()
    {
        $this->validate($this->rulesEditAdmin($this->admin_id));
        try {
            $admin = User::find($this->admin_id);
            $admin->name = $this->nama_lengkap;
            $admin->no_ktp = $this->no_ktp;
            $admin->email = $this->email;
            $admin->is_active = $this->aktif;
            if ($this->reset_password) {
                $admin->password = bcrypt('12345678');
            }
            $admin->save();
            $admin->syncRoles($this->role);

            $this->emit('refreshTableKelolaAdmin');
            $this->hendleCloseModalEditAdmin();
            $this->alert('success', 'Berhasil mengubah admin', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->hendleCloseModalEditAdmin();
            $this->alert('warning', 'Gaggal mengubah admin', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.kelola-admin.index');
    }
}
