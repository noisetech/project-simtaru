@slot('title', 'Verifikasi Lapangan')
<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        @livewire('components.pengajuan-table-dashboard', ['status_id' => 3])

        <!-- Modal Tolak Verifikasi Lapangan -->
        @if ($openModalTolakVerifikasiLapangan)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalTolakVerifikasiLapangan" type="button"
                                class="modal-close-button" data-modal-toggle="popup-modal">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span class="font-bold">{{ $nama_lengkap }}</span>,
                                gagal verifikasi
                                lapangan?
                            </h3>
                            <form wire:submit.prevent="tolakVerifikasiLapangan">
                                <label class="text-left input-label">Alasan Ditolak</label>
                                <input wire:model="alasan_ditolak" type="text" class="mb-5 input" required>
                                <button wire:click="handleCloseModalTolakVerifikasiLapangan" type="button"
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
