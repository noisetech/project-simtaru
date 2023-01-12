<?php

namespace App\Http\Livewire\Pages\KelolaUser;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataTable extends DataTableComponent
{
    protected $listeners = ['refreshTableKelolaUser' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make('Nama', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Role', 'role'),
            Column::make('Active', 'is_active')
                ->sortable()
                ->searchable(),
            Column::make('Foto'),
            Column::make('Aksi'),
        ];
    }

    public function query(): Builder
    {
        return User::query()->role(['Pemohon']);
    }

    public function rowView(): string
    {
        return 'livewire.pages.kelola-user.data-table';
    }

    public function editUser($id)
    {
        $this->emit('handleOpenModalEditUser', $id);
    }
}
