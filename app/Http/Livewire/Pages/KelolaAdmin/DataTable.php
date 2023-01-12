<?php

namespace App\Http\Livewire\Pages\KelolaAdmin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataTable extends DataTableComponent
{
    protected $listeners = ['refreshTableKelolaAdmin' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make('Nama', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Role', 'role')
                ->sortable(),
            // ->searchable(),
            Column::make('Active', 'is_active')
                ->sortable()
                ->searchable(),
            Column::make('Foto'),
            Column::make('Aksi'),
        ];
    }

    public function query(): Builder
    {
        return User::query()->role(['Sekretariat-TKPRD', 'Pokja-PRPPR', 'Kepala-Dinas-PUPR', 'Ketua-TKPRD']);
    }

    public function rowView(): string
    {
        return 'livewire.pages.kelola-admin.data-table';
    }

    public function editAdmin($id)
    {
        $this->emit('handleOpenModalEditAdmin', $id);
    }
}
