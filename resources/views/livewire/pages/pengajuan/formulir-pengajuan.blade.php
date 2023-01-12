<form wire:submit.prevent="save" enctype="multipart/form-data" class="px-4 md:px-0">
    @csrf
    <div id="alert-additional-content-1" class="p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <h3 class="text-lg font-medium text-blue-700 dark:text-blue-800">Info</h3>
        </div>
        <div class="mt-2 text-base text-blue-700 dark:text-blue-800">
            Bertanda (<span class="font-bold text-danger">*</span>) Wajib Diisi
        </div>
    </div>

    <div class="mb-6">
        <label class="input-label">Nama Lengkap<span class="font-bold text-danger">*</span></label>
        <input wire:model="nama_lengkap" type="text" class="input" placeholder="Nama Lengkap" required>
        @error('nama_lengkap')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Tempat, Tanggal Lahir<span class="font-bold text-danger">*</span></label>
        <input wire:model="tempat_tanggal_lahir" type="text" class="input" placeholder="Tempat, Tanggal Lahir"
            required>
        @error('tempat_tanggal_lahir')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Alamat<span class="font-bold text-danger">*</span></label>
        <input wire:model="alamat" type="text" class="input" placeholder="Alamat" required>
        @error('alamat')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Pekerjaan<span class="font-bold text-danger">*</span></label>
        <input wire:model="pekerjaan" type="text" class="input" placeholder="Pekerjaan" required>
        @error('pekerjaan')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">No Identitas<span class="font-bold text-danger">*</span></label>
        <input wire:model="no_identitas" type="text" class="input" placeholder="No Identitas"
            @error('no_identitas') autofocus @enderror required>
        @error('no_identitas')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">No Hp/Telepon<span class="font-bold text-danger">*</span></label>
        <input wire:model="no_hp" type="text" class="input" placeholder="No Hp/Telepon"
            @error('no_identitas') autofocus @enderror required>
        @error('no_hp')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Bertindak Atas Nama<span class="font-bold text-danger">*</span></label>
        <input wire:model="bertindak_atas_nama" type="text" class="input" placeholder="Bertindak Atas Nama"
            required>
        @error('bertindak_atas_nama')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Penggunaan Tanah Saat Dimohon<span class="font-bold text-danger">*</span></label>
        <input wire:model="penggunaan_tanah_saat_dimohon" type="text" class="input"
            placeholder="Penggunaan Tanah Saat Dimohon" required>
        @error('penggunaan_tanah_saat_dimohon')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Luas Tanah Seluruhnya dalam m<sup>2</sup><span
                class="font-bold text-danger">*</span></label>
        <input wire:model="luas_tanah_seluruhnya" type="text" class="input" placeholder="Luas Tanah Seluruhnya"
            required>
        @error('luas_tanah_seluruhnya')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Luas Tanah Yang Dimohon dalam m<sup>2</sup><span
                class="font-bold text-danger">*</span></label>
        <input wire:model="luas_tanah_yang_dimohon" type="text" class="input"
            placeholder="Luas Tanah Yang Dimohon" required>
        @error('luas_tanah_yang_dimohon')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Bukti Penguasaan Tanah<span class="font-bold text-danger">*</span></label>
        <input wire:model="bukti_penguasaan_tanah" type="text" class="input"
            placeholder="Bukti Penguasaan Tanah" required>
        @error('bukti_penguasaan_tanah')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Letak Tanah<span class="font-bold text-danger">*</span></label>
        <input wire:model="letak_tanah" type="text" class="input" placeholder="Letak Tanah" required>
        @error('letak_tanah')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Rencana Penggunaan Tanah<span class="font-bold text-danger">*</span></label>
        <input wire:model="rencana_penggunaan_tanah" type="text" class="input" placeholder="Peruntukan Tanah"
            required>
        @error('rencana_penggunaan_tanah')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Batas Sebelah Utara<span class="font-bold text-danger">*</span></label>
        <input wire:model="batas_sebelah_utara" type="text" class="input" placeholder="Batas Sebelah Utara"
            required>
        @error('batas_sebelah_utara')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Batas Sebelah Timur<span class="font-bold text-danger">*</span></label>
        <input wire:model="batas_sebelah_timur" type="text" class="input" placeholder="Batas Sebelah Timur"
            required>
        @error('batas_sebelah_timur')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Batas Sebelah Selatan<span class="font-bold text-danger">*</span></label>
        <input wire:model="batas_sebelah_selatan" type="text" class="input" placeholder="Batas Sebelah Selatan"
            required>
        @error('batas_sebelah_selatan')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Batas Sebelah Barat<span class="font-bold text-danger">*</span></label>
        <input wire:model="batas_sebelah_barat" type="text" class="input" placeholder="Batas Sebelah Barat"
            required>
        @error('batas_sebelah_barat')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label">Koordinat <a
                href="https://www.google.com/maps/place/Kabupaten+Lampung+Utara,+Lampung/@-4.7990705,104.7234026,11z/data=!4m5!3m4!1s0x2e38a669d3006841:0x3039d80b220cfd0!8m2!3d-4.8133905!4d104.7520939"
                target="_blank" class="italic text-primary hover:underline">Buka
                Maps</a></label>
        <input wire:model="titik_koordinat" type="text" class="input" placeholder="Koordinat">
        @error('titik_koordinat')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div class="p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <h3 class="text-lg font-medium text-blue-700 dark:text-blue-800">
                {{ $status_id ? 'Upload kembali jika sebelumnya salah, jika tidak kosongkan' : 'Info' }}
            </h3>
        </div>
        <div class="mt-2 text-base text-blue-700 dark:text-blue-800">
            Upload file dibawah ini dengan format pdf, docx, docx, doc, png, jpeg atau jpg
            <br>
            Sedangkan untuk <span class="font-semibold underline">Gambar Rencana Pembangunan</span> wajib file foto
            dengan format png, jpeg atau jpg
        </div>
    </div>

    <div class="mb-6">
        <label class="input-label" for="user_avatar">Fotocopy KTP<span
                class="font-bold text-danger">{{ $status_id ? '' : '*' }}</span></label>
        <div class="flex">
            <input wire:model="fotocopy_ktp" class="input-file" type="file" {{ $status_id ? '' : 'required' }}>
            @if ($fotocopy_ktp != null)
                <button wire:click="deleteFile('fotocopy_ktp')" type="button" class="ml-2 btn-danger">Batal</button>
            @endif
        </div>
        @error('fotocopy_ktp')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Fotocopy Sertifikat/Surat Tanah<span
                class="font-bold text-danger">{{ $status_id ? '' : '*' }}</span></label>
        <div class="flex">
            <input wire:model="fotocopy_sertifikat" class="input-file" type="file"
                {{ $status_id ? '' : 'required' }}>
            @if ($fotocopy_sertifikat != null)
                <button wire:click="deleteFile('fotocopy_sertifikat')" type="button"
                    class="ml-2 btn-danger">Batal</button>
            @endif
        </div>
        @error('fotocopy_sertifikat')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Fotocopy SPPT PBB<span
                class="font-bold text-danger">{{ $status_id ? '' : '*' }}</span></label>
        <div class="flex">
            <input wire:model="fotocopy_sppt_pbb" class="input-file" type="file"
                {{ $status_id ? '' : 'required' }}>
            @if ($fotocopy_sppt_pbb != null)
                <button wire:click="deleteFile('fotocopy_sppt_pbb')" type="button"
                    class="ml-2 btn-danger">Batal</button>
            @endif
        </div>
        @error('fotocopy_sppt_pbb')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Fotocopy NPWP<span
                class="font-bold text-danger">{{ $status_id ? '' : '*' }}</span></label>
        <div class="flex">
            <input wire:model="fotocopy_npwp" class="input-file" type="file" {{ $status_id ? '' : 'required' }}>
            @if ($fotocopy_npwp != null)
                <button wire:click="deleteFile('fotocopy_npwp')" type="button" class="ml-2 btn-danger">Batal</button>
            @endif
        </div>
        @error('fotocopy_npwp')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Surat Persetujuan Tetengga Dilampirkan FC KTP Diketahui
            Oleh
            Kades/Lurah & Camat<span class="font-bold text-danger">{{ $status_id ? '' : '*' }}</span></label>
        <div class="flex">
            <input wire:model="surat_persetujuan_tetangga" class="input-file" type="file"
                {{ $status_id ? '' : 'required' }}>
            @if ($surat_persetujuan_tetangga != null)
                <button wire:click="deleteFile('surat_persetujuan_tetangga')" type="button"
                    class="ml-2 btn-danger">Batal</button>
            @endif
        </div>
        @error('surat_persetujuan_tetangga')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Gambar Rencana Bangunan<span
                class="font-bold text-danger">{{ $status_id ? '' : '*' }}</span> (bisa lebih dari 1 gambar)</label>
        <div class="flex">
            <input wire:model="gambar_rencana_pembangunan" class="input-file" type="file" multiple
                {{ $status_id ? '' : 'required' }}>
            @if ($gambar_rencana_pembangunan != null)
                <button wire:click="deleteFile('gambar_rencana_pembangunan')" type="button"
                    class="ml-2 btn-danger">Batal</button>
            @endif
        </div>
        @error('gambar_rencana_pembangunan')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Fotocopy Akte Pendirian Perusahaan</label>
        <input wire:model="fotocopy_akte_pendirian_perusahaan" class="input-file" type="file">
        @error('fotocopy_akte_pendirian_perusahaan')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Set Lokasi Bangunan</label>
        <input wire:model="set_lokasi_bangunan" class="input-file" type="file">
        @error('set_lokasi_bangunan')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Surat Pernyataan Dari Pemohon (Pemilik) Jika Terjadi Force
            Majeur</label>
        <input wire:model="surat_pernyataan_force_majeur" class="input-file" type="file">
        @error('surat_pernyataan_force_majeur')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label class="input-label" for="user_avatar">Uraian Rencana Proyek (Proposal)</label>
        <input wire:model="proposal" class="input-file" type="file">
        @error('proposal')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div class="flex justify-end">
        <button type="submit" class="btn-primary">Kirim</button>
    </div>

    <!-- Modal Success -->
    @if ($openModalSuccess)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <a href="/verifikasi-berkas" class="modal-close-button">
                            @include('components.icon-x-close-modal')
                        </a>
                    </div>
                    <div class="modal-body">
                        @include('components.icon-warning-modal')
                        <h3 class="modal-text">
                            Berhasil menguba pengajuan atas nama <span
                                class="font-bold">{{ $nama_lengkap }}</span>,
                        </h3>

                        <a href="/verifikasi-berkas" class="btn-primary">
                            Ok
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</form>

