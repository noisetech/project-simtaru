<tr>
   
    

    <x-livewire-tables::table.cell class="font-semibold">
        {{ $row->judul }}
        </x-livewire-tables::table.cell>

       

    <x-livewire-tables::table.cell class="font-semibold">
             <a href="{{ url('manualbooks') }}" target="_blank" class="btn-primary-small">
                                Lihat
                            </a>
       
    </x-livewire-tables::table.cell>

    <x-livewire-tables::table.cell class="text-center">
        <button wire:click="editMbook({{ $row->id }})" class="btn-primary-small">
            Edit
        </button>
    </x-livewire-tables::table.cell>
    

   

  
</tr>
