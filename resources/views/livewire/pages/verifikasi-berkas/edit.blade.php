@slot('title', 'Verifikasi Berkas')
<div class="px-4 py-3">
    <div class="py-4 px-4 md:px-16 md:py-6 my-4 bg-white border rounded-lg shadow">
        <label class="input-label text-center text-xl font-medium rounded-lg mb-4 mt-2">
            Edit Pengajuan atas Nama
            {{ $nama_lengkap }}</label>
        @livewire('pages.pengajuan.formulir-pengajuan', ['pengajuan_id' => $pengajuan_id])
    </div>
</div>
