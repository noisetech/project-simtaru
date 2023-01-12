@slot('title', 'Kelola Pegawai Dinas')

<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        @livewire('pages.kelola-pegawai-dinas.data-table')
    </div>

    <!-- Modal Edit Pegawai Dinas -->
    @if ($openModalEditPegawaiDinas)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <button wire:click="hendleCloseModalEditPegawaiDinas" type="button" class="modal-close-button">
                            @include('components.icon-x-close-modal')
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('components.icon-edituser-modal')
                        <h3 class="text-center modal-text">
                            Edit untuk jabatan <span wire:ignore class="font-bold">{{ $jabatan }}</span>
                        </h3>
                        <form wire:submit.prevent="updatePegawaiDinas" class="flex flex-col justify-start text-left">
                            <div class="mb-5">
                                <label class="text-left input-label">Nama</label>
                                <input wire:model="nama" type="text" class="input" required>
                                @error('nama')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">Jabatan Lain</label>
                                <input wire:model="jabatan_lain" type="text" class="input" required>
                                @error('jabatan_lain')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">NIP</label>
                                <input wire:model="nip" type="text" class="input" required>
                                @error('nip')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-5 text-center">
                                <button wire:click="hendleCloseModalEditPegawaiDinas" type="button"
                                    class="mr-3 btn-secondary">
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
