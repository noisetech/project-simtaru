<tr>
    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->jabatan }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->nama }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        {{ empty($row->jabatan_lain) ? '-' : $row->jabatan_lain }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        {{ empty($row->nip) ? '-' : $row->nip }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="text-center">
        <button wire:click="editPegawaiDinas({{ $row->id }})" class="btn-primary-small">
            Edit
        </button>
    </x-livewire-tables::table.cell>
</tr>
