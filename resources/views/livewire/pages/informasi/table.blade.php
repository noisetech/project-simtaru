<x-livewire-tables::table.cell class="font-semibold">
    {{ $row->nama_lengkap }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="font-semibold">
    {{ Carbon\Carbon::parse($row->created_at)->isoFormat('D MMMM Y') }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="font-semibold">
    {{ $row->rencana_penggunaan_tanah }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="font-semibold">
    @if ($row->status_id == 1)
        <span class="badge-danger">
            {{ $row->jenis_status }}
        </span>
    @else
        <span class="badge-success">
            {{ $row->jenis_status }}
        </span>
    @endif 
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="font-semibold">
@if ($row->status_id >= 10)
  <a href="{{ url('informasi',$row->id) }}" class="btn-warning-small">
                               <i class="mdi mdi-pencil"></i>  Show Polygon  </a> 
@else 
@endif                              
</x-livewire-tables::table.cell>
