<tr>
    <x-livewire-tables::table.cell class="text-center">
        <button wire:click="editLanding({{ $row->id }})" class="btn-primary-small">
            Edit
        </button>
    </x-livewire-tables::table.cell>
    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->key }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->judul }}
        </x-livewire-tables::table.cell>

        <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->value }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->gambar }}
    </x-livewire-tables::table.cell>

    

   

  
</tr>
