@slot('title', 'Verifikasi Berkas')
<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        @livewire('components.pengajuan-table-dashboard', ['status_id' => 2])

        <!-- Modal Setuju Verifikasi Berkas -->
        @if ($openModalSetujuVerifikasiBerkas)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalSetujuVerifikasiBerkas" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span class="font-bold">{{ $nama_lengkap }}</span>,
                                lolos verifikasi
                                berkas?
                            </h3>
                            <button wire:click="handleCloseModalSetujuVerifikasiBerkas" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="setujuVerifikasiBerkas" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Modal Tolak Verifikasi Berkas -->
        @if ($openModalTolakVerifikasiBerkas)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalTolakVerifikasiBerkas" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>,
                                gagal verifikasi
                                berkas?
                            </h3>
                            <form wire:submit.prevent="tolakVerifikasiBerkas">
                                <label class="text-left input-label">Alasan Ditolak</label>
                                <input wire:model="alasan_ditolak" type="text" class="mb-5 input" required>
                                <button wire:click="handleCloseModalTolakVerifikasiBerkas" type="button"
                                    class="mr-3 btn-secondary">
                                    Batal
                                </button>
                                <button type="submit" class="btn-danger">
                                    Ya
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
