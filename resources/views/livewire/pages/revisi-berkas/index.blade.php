@slot('title', 'Revisi Berkas')
<div class="px-4 pt-3">
    @php
        $roleUser = auth()
            ->user()
            ->getRoleNames()
            ->first();
    @endphp
    @if ($roleUser == 'Pokja-PRPPR' || $roleUser == 'Superadmin')
        <div class="p-4 my-4 bg-white border rounded-lg shadow">
            <span class="font-medium">Revisi Berita Acara Pokja</span>
            <div class="mt-4">
                @livewire('components.pengajuan-table-dashboard', ['status_id' => 4])
            </div>
        </div>
    @endif
    @if ($roleUser == 'Sekretariat-TKPRD' || $roleUser == 'Superadmin')
        <div class="p-4 my-4 bg-white border rounded-lg shadow">
            <span class="font-medium">Revisi Nota Dinas</span>
            <div class="mt-4">
                @livewire('components.pengajuan-table-dashboard', ['status_id' => 7])
            </div>
        </div>
        <div class="p-4 my-4 bg-white border rounded-lg shadow">
            <span class="font-medium">Revisi Surat Rekomendasi</span>
            <div class="mt-4">
                @livewire('components.pengajuan-table-dashboard', ['status_id' => 9])
            </div>
        </div>
    @endif

    <!-- Modal Revisi Nota Dinas -->
    @if ($openModalRevisiNotaDinas)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <button wire:click="handleCloseModalRevisiNotaDinas" type="button" class="modal-close-button">
                            @include('components.icon-x-close-modal')
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('components.icon-warning-modal')
                        <h3 class="modal-text">
                            Revisi nota dinas pengajuan atas nama <span
                                class="font-bold">{{ $nama_lengkap }}</span>?
                        </h3>
                        <form wire:submit.prevent="revisiNotaDinas">
                            <label class="text-left input-label">No Nota Dinas</label>
                            <input wire:model="no_nota_dinas" type="text" class="mb-5 input" required>
                            <label class="text-left input-label">Tanggal Turun Nota Dinas</label>
                            <input wire:model="tanggal_turun_nota_dinas" type="date" class="mb-5 input" required>

                            <button wire:click="handleCloseModalRevisiNotaDinas" type="button"
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

    <!-- Modal Revisi Surat Rekomendasi -->
    @if ($openModalRevisiSuratRekomendasi)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <button wire:click="handleCloseModalRevisiSuratRekomendasi" type="button"
                            class="modal-close-button">
                            @include('components.icon-x-close-modal')
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('components.icon-warning-modal')
                        <h3 class="modal-text">
                            Anda sudah merevisi surat rekomendasi atas nama <span
                                class="font-bold">{{ $nama_lengkap }}</span>?
                        </h3>

                        <button wire:click="handleCloseModalRevisiSuratRekomendasi" type="button"
                            class="mr-3 btn-secondary">
                            Batal
                        </button>
                        <button wire:click="revisiSuratRekomendasi" type="button" class="btn-primary">
                            Ya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
