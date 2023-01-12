<?php

namespace App\Http\Livewire\Pages\KelolaPegawaiDinas;

use App\Models\PegawaiDinas;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataTable extends DataTableComponent
{

    protected $listeners = ['refreshTableKelolaPegawaiDinas' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make('Jabatan', 'jabatan')
                ->sortable()
                ->searchable(),
            Column::make('Nama', 'nama')
                ->sortable()
                ->searchable(),
            Column::make('Jabatan Lain', 'jabatan_lain')
                ->sortable()
                ->searchable(),
            Column::make('NIP', 'nip')
                ->sortable()
                ->searchable(),
            Column::make('Aksi'),
        ];
    }

    public function query(): Builder
    {
        return PegawaiDinas::query();
    }

    public function rowView(): string
    {
        return 'livewire.pages.kelola-pegawai-dinas.data-table';
    }

    public function editPegawaiDinas($id)
    {
        $this->emit('handleOpenModalEditPegawaiDinas', $id);
    }
}
