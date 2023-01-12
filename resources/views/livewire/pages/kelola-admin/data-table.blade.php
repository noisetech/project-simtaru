<tr>
    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->name }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->email }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->roles->first()->name }}
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        @if ($row->is_active)
            <span class="badge-success">Aktif</span>
        @else
            <span class="badge-danger">Tidak Aktif</span>
        @endif
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="font-semibold">
        <div class="flex justify-center">
            @if ($row->foto)
                <img class="object-cover rounded-full w-9 h-9" src="{{ asset('storage/' . $row->foto) }}"
                    alt="{{ $row->name }}">
            @else
                <img class="object-cover rounded-full w-9 h-9"
                    src="https://ui-avatars.com/api/?name={{ $row->name }}&color=0891b2&background=cffafe"
                    alt="{{ $row->name }}">
            @endif
        </div>
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="text-center">
        <button wire:click="editAdmin({{ $row->id }})" class="btn-primary-small">
            Edit
        </button>
    </x-livewire-tables::table.cell>
</tr>
