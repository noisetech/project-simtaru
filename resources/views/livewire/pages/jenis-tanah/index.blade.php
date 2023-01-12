@slot('title', 'Jenis Tanah')

<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <div class="flex justify-end mb-4">
            <button wire:click="handleopenModalTambahJenisTanah" class="btn-primary">Tambah Jenis Tanah</button>
        </div>
        @livewire('pages.jenis-tanah.data-table')
    </div>

    <!-- Modal Tambah User -->
    @if ($openModalTambahJenisTanah)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <button wire:click="handleCloseModalJenisTanah" type="button" class="modal-close-button"
                            data-modal-toggle="popup-modal">
                            @include('components.icon-x-close-modal')
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- @include('components.icon-adduser-modal') --}}

                        <form wire:submit.prevent="tambah_jenis_tanah" class="flex flex-col justify-start text-left">
                            <div class="mb-5">
                                <label class="text-left input-label">Jenis Tanah</label>
                                <input wire:model="jenis_tanah" type="text" class="input" required>
                                @error('jenis_tanah ')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">Kode Warna</label>
                                <input wire:model="warna" type="text" class="input" required>
                                @error('warna')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-5 text-center">
                                <button wire:click="handleCloseModalJenisTanah" type="button"
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
