@slot('title', 'Upload Scan Surat Rekomendasi')
<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        @livewire('components.pengajuan-table-dashboard', ['status_id' => 11])

        <!-- Modal Upload Scan Surat Rekomendasi -->
        @if ($openModalUploadScanSuratRekomendasi)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalUploadScanSuratRekomendasi" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Upload scan surat hasil rekomendasi yang sudah ditandatangani atas nama pengajuan <span
                                    class="font-bold">{{ $nama_lengkap }}</span>.
                            </h3>
                            <form wire:submit.prevent="uploadScanSuratRekomendasi">
                                <div class="flex flex-col">
                                    <label class="text-left input-label">Scan Surat Hasil Rekomendasi</label>
                                    <input wire:model="scan_surat_hasil_rekomendasi" type="file" class="input-file"
                                        required>
                                    @error('scan_surat_hasil_rekomendasi')
                                        <span class="text-left validation-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button wire:click="handleCloseModalUploadScanSuratRekomendasi" type="button"
                                    class="mt-5 mr-3 btn-secondary">
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
