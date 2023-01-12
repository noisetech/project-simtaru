<tr>
    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->jenis_tanah }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->warna }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="text-center">
        <button wire:click="editJenisTanah({{ $row->id }})" class="btn-warning-small">
            Edit
        </button>

        <button wire:click="hapusJenisTanah({{ $row->id }})" class="btn-danger-small">
            Hapus
        </button>
    </x-livewire-tables::table.cell>

</tr>
