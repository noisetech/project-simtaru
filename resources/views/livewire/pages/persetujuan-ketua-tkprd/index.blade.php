@slot('title', 'Persetujuan Ketua TKPRD')
<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        @livewire('components.pengajuan-table-dashboard', ['status_id' => 6])

        <!-- Modal Revisi Persetujuan Ketua TKPRD -->
        @if ($openModalRevisiPersetujuanKetuaTKPRD)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalRevisiPersetujuanKetuaTKPRD" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span class="font-bold">{{ $nama_lengkap }}</span>,
                                harus direvisi?
                            </h3>
                            <form wire:submit.prevent="revisiPersetujuanKetuaTKPRD">
                                <label class="text-left input-label">Revisi Ke Bagian</label>
                                <select wire:model="revisi_ke_bagian" class="mb-5 input" required>
                                    <option value="">Pilih Bagian</option>
                                    <option value="2">Sekretariat TKPRD</option>
                                    <option value="3">Pokja PRPPR</option>
                                </select>
                                <label class="text-left input-label">Bagian/Keterangan Revisi</label>
                                <input wire:model="revisi_berkas" type="text" class="mb-5 input" required>
                                <button wire:click="handleCloseModalRevisiPersetujuanKetuaTKPRD" type="button"
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

        <!-- Modal Setuju Persetujuan Ketua TKPRD -->
        @if ($openModalSetujuPersetujuanKetuaTKPRD)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalSetujuPersetujuanKetuaTKPRD" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>,
                                akan diteruskan ke Kepala Dinas PUPR?
                            </h3>

                            <button wire:click="handleCloseModalSetujuPersetujuanKetuaTKPRD" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="setujuPersetujuanKetuaTKPRD" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
