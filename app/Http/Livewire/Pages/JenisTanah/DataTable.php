<?php

namespace App\Http\Livewire\Pages\JenisTanah;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\JenisTanah;

class DataTable extends DataTableComponent
{

    protected $listeners = ['refreshTableJenisTanah' => '$refresh'];
    public function columns(): array
    {
        return [
            Column::make("Jenis tanah", "jenis_tanah")
                ->sortable(),
            Column::make("Kode Warna", "warna")
                ->sortable(),
            Column::make("Aksi")
        ];
    }

    public function query(): Builder
    {
        return JenisTanah::query();
    }

    public function rowView(): string
    {
        return 'livewire.pages.jenis-tanah.data-table';
    }
}
