@slot('title', 'Penomoran Surat')
<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        @livewire('components.pengajuan-table-dashboard', ['status_id' => 10])

        <!-- Modal Beri Nomor Surat Dan Tanggal -->
        @if ($openModalBeriNomorSuratDanTanggal)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalBeriNomorSuratDanTanggal" type="button"
                                class="modal-close-button" data-modal-toggle="popup-modal">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Pengisian nomor surat dan tanggaln atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>.
                            </h3>
                            <form wire:submit.prevent="beriNomorSuratDanTanggal">
                                <label class="text-left input-label">No Surat Rekomendasi</label>
                                <input wire:model="no_surat_rekomendasi" type="text" class="mb-5 input" required>
                                <label class="text-left input-label">Tanggal Turun Surat Rekomendasi</label>
                                <input wire:model="tanggal_turun_surat_rekomendasi" type="date" class="mb-5 input"
                                    required>

                                <button wire:click="handleCloseModalBeriNomorSuratDanTanggal" type="button"
                                    class="mr-3 btn-secondary">
                                    Batal
                                </button>
                                <button type="submit" class="btn-primary">
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
