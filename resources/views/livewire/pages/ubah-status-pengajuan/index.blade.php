@slot('title', 'Ubah Status Pengajuan')
<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <div class="p-4 mb-4 bg-rose-100 rounded-lg" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-danger" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <h3 class="text-lg font-medium text-danger">Peringatan</h3>
            </div>
            <div class="mt-2 text-base text-danger">
                Halaman ini hanya digunakan jika ingin mengubah status saat terjadi kesalahan. Salah satu contohnya jika
                status tertera <span class="badge-success">Selesai, Surat Dapat Diunduh</span>, namun salah mengupload
                scan surat hasil rekomendasi, maka klik tombol <span class="btn-warning-small">Ubah
                    status</span>
                dan pilih status menjadi upload scan surat rekomendasi kemudian upload kembali hasil scan suratnya.
            </div>
        </div>
        @livewire('components.pengajuan-table-dashboard', ['status_id' => 14])

        <!-- Modal Ubah Status Pengajuan -->
        @if ($openModalUbahStatusPengajuan)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalUbahStatusPengajuan" type="button"
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
                            <form wire:submit.prevent="ubahStatusPengajuan">
                                <div class="flex flex-col">
                                    <label class="text-left input-label">Ubah Pengajuan ke Status</label>
                                    <select wire:model="status_pengajuan" class="mb-5 input" required>
                                        <option value="">Pilih Status</option>
                                        <option value="2">Verifikasi Berkas (Sekretariat TKPRD)</option>
                                        <option value="3">Verifikasi Lapangan (Pokja PRPPR)</option>
                                        <option value="4">Revisi berita Acara Pokja (Pokja PRPPR)</option>
                                        <option value="5">Proses Penerbitan Surat (Sekretariat TKPRD)</option>
                                        <option value="6">Persetujuan Surat oleh Ketua TKPRD (Ketua TKPRD)</option>
                                        <option value="7">Revisi Nota Dinas (Sekretariat TKPRD)</option>
                                        <option value="8">Persetujuan Surat oleh Kepala Dinas PUPR (Dinas PUPR)</option>
                                        <option value="9">Revisi Surat Rekomendasi (Sekretariat TKPRD)</option>
                                        <option value="10">Penomoran Surat (Sekretariat TKPRD)</option>
                                        <option value="11">Upload Scan Surat Hasil Rekomendasi (Sekretariat TKPRD)
                                        </option>
                                    </select>
                                </div>

                                <button wire:click="handleCloseModalUbahStatusPengajuan" type="button"
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
