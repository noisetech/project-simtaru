<?php

namespace App\Http\Livewire\Pages\Manualbook;

use App\Models\Manual_book;
use App\Models\Setting_Mbook;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataTable extends DataTableComponent
{
    protected $listeners = ['refreshTableKelolaMbook' => '$refresh'];

    public function columns(): array
    {
        return [
           
           
            Column::make('Judul', 'judul')
                ->sortable()
                ->searchable(),
           
             Column::make('File', 'gambar')
                ->sortable()
                ->searchable(),
            // ->searchable(),
            Column::make('Aksi'),
            
        ];
    }

    public function query(): Builder
    {
        return Manual_book::query();
    }

    public function rowView(): string
    {
        return 'livewire.pages.manual-book.data-table';
    }

    public function editMbook($id)
    {
        $this->emit('handleOpenModalEditMbook', $id);
    }
}
