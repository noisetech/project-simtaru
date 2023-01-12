@slot('title', 'Penerbitan Surat')
<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        @livewire('components.pengajuan-table-dashboard', ['status_id' => 5])

        <!-- Modal Revisi Penerbitan Surat -->
        @if ($openModalRevisiPenerbitanSurat)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalRevisiPenerbitanSurat" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span class="font-bold">{{ $nama_lengkap }}</span>,
                                harus direvisi oleh Pokja PRPPR?
                            </h3>
                            <form wire:submit.prevent="revisiPenerbitanSurat">
                                <label class="text-left input-label">Bagian/Keterangan Revisi</label>
                                <input wire:model="revisi_berkas" type="text" class="mb-5 input" required>
                                <button wire:click="handleCloseModalRevisiPenerbitanSurat" type="button"
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

        <!-- Modal Setuju Penerbitan Surat -->
        @if ($openModalSetujuPenerbitanSurat)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalSetujuPenerbitanSurat" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin pengajuan atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>,
                                akan diterbitkan surat?
                            </h3>
                            <form wire:submit.prevent="setujuPenerbitanSurat">
                                <label class="text-left input-label">No Nota Dinas</label>
                                <input wire:model="no_nota_dinas" type="text" class="mb-5 input" required>
                                <label class="text-left input-label">Tanggal Turun Nota Dinas</label>
                                <input wire:model="tanggal_turun_nota_dinas" type="date" class="mb-5 input"
                                    required>

                                <button wire:click="handleCloseModalSetujuPenerbitanSurat" type="button"
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
