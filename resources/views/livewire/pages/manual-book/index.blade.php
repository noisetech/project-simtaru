@slot('title', 'Kelola Manual Book')

<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <div class="flex justify-end mb-4">
            
        </div>
        @livewire('pages.manualbook.data-table')
    </div>

  
    <!-- Modal Edit Mbook -->
    @if ($openModalEditMbook)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <button wire:click="hendleCloseModalEditMbook" type="button" class="modal-close-button">
                            @include('components.icon-x-close-modal')
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('components.icon-edituser-modal')
                        <h3 class="text-center modal-text">
                            Edit  <span wire:ignore class="font-bold">{{ $key }}</span>
                        </h3>
                        <form wire:submit.prevent="updateMbook">
                         <div class="mb-5">
                                <label class="text-left input-label">Judul</label>
                                <input wire:model="judul" type="text" class="input" required>
                                @error('judul')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                             <div class="mb-5">
                                <label class="text-left input-label">Dokumen </label>
                                <input wire:model="dokumen" type="file" class="input-file"  required>

                               
                            </div>
                           
                           
                            <div class="mt-5 text-center">
                                <button wire:click="hendleCloseModalEditMbook" type="button" class="mr-3 btn-secondary">
                                    Batal
                                </button>
                                <button type="submit" class="btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
