@slot('title', 'Persetujuan Ketua TKPRD')
<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        @livewire('components.pengajuan-table-dashboard', ['status_id' => 8])

        <!-- Modal Tolak Persetujuan Kadis PUPR -->
        @if ($openModalTolakPersetujuanKadisPUPR)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalTolakPersetujuanKadisPUPR" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin menolak pengajuan atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <form wire:submit.prevent="tolakPersetujuanKadisPUPR">
                                <label class="text-left input-label">Alasan Ditolak</label>
                                <input wire:model="alasan_ditolak" type="text" class="mb-5 input" required>
                                <button wire:click="handleCloseModalTolakPersetujuanKadisPUPR" type="button"
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

        <!-- Modal Revisi Persetujuan Kadis PUPR -->
        @if ($openModalRevisiPersetujuanKadisPUPR)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalRevisiPersetujuanKadisPUPR" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>,
                                harus direvisi?
                            </h3>
                            <form wire:submit.prevent="revisiPersetujuanKadisPUPR">
                                <label class="text-left input-label">Revisi Ke Bagian</label>
                                <select wire:model="revisi_ke_bagian" class="mb-5 input" required>
                                    <option value="">Pilih Bagian</option>
                                    <option value="2">Sekretariat TKPRD (revisi surat rekomendasi)</option>
                                    <option value="3">Pokja PRPPR (revisi berita acara)</option>
                                </select>
                                <label class="text-left input-label">Bagian/Keterangan Revisi</label>
                                <input wire:model="revisi_berkas" type="text" class="mb-5 input" required>
                                <button wire:click="handleCloseModalRevisiPersetujuanKadisPUPR" type="button"
                                    class="mr-3 btn-secondary">
                                    Batal
                                </button>
                                <button type="submit" class="btn-warning">
                                    Ya
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Modal Setuju Persetujuan Kadis PUPR -->
        @if ($openModalSetujuPersetujuanKadisPUPR)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalSetujuPersetujuanKadisPUPR" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span class="font-bold">{{ $nama_lengkap }}</span>
                                disetujui dan akan diberi nomor surat?
                            </h3>

                            <button wire:click="handleCloseModalSetujuPersetujuanKadisPUPR" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="setujuPersetujuanKadisPUPR" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
