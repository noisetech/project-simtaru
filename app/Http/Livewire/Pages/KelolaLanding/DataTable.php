<?php

namespace App\Http\Livewire\Pages\KelolaLanding;

use App\Models\User;
use App\Models\Setting_landing;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataTable extends DataTableComponent
{
    protected $listeners = ['refreshTableKelolaLanding' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make('Aksi'),
            Column::make('Bagian', 'key')
                ->sortable()
                ->searchable(),
            Column::make('Judul', 'judul')
                ->sortable()
                ->searchable(),
            Column::make('Teks', 'value')
                ->sortable()
                ->searchable(),
             Column::make('Gambar', 'gambar')
                ->sortable()
                ->searchable(),
            // ->searchable(),
           
            
        ];
    }

    public function query(): Builder
    {
        return Setting_landing::query();
    }

    public function rowView(): string
    {
        return 'livewire.pages.kelola-landing.data-table';
    }

    public function editLanding($id)
    {
        $this->emit('handleOpenModalEditLanding', $id);
    }
}
