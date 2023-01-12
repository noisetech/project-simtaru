<?php

namespace App\Http\Livewire\Pages\Informasi;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class Table extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';

    public function filters(): array
    {
        return [
            'from_date' => Filter::make('Dari Tanggal')
                ->date([
                    'max' => now()->format('Y-m-d'),
                ]),
            'to_date' => Filter::make('Sampai Tanggal')
                ->date([
                    'min' => isset($this->filters['from_date']) && $this->filters['from_date'] ? $this->filters['from_date'] : '',
                    'max' => now()->format('Y-m-d'),
                ])
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Nama', 'nama_lengkap')
                ->searchable()
                ->sortable(),
            Column::make('Tanggal Pengajuan', 'pengajuan.created_at')
                ->sortable(),
            Column::make('Rencana Penggunaan Tanah', 'rencana_penggunaan_tanah')
                ->searchable()
                ->sortable(),
            Column::make('Status', 'status.jenis_status')
                ->searchable()
                ->sortable(),
            Column::make('Lihat Polygon', 'pengajuan.id')
                ->searchable()
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Pengajuan::query()->join('status', 'status.id', '=', 'pengajuan.status_id')
            ->select('pengajuan.*', 'status.jenis_status as jenis_status', 'status.posisi_berkas as posisi_berkas')
            ->when($this->getFilter('from_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '>=', $created_at))
            ->when($this->getFilter('to_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '<=', $created_at));
    }

    public function rowView(): string
    {
        return 'livewire.pages.informasi.table';
    }
}
