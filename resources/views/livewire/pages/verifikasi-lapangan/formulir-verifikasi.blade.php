@slot('title', 'Formulir Verifikasi Lapangan')
<div class="px-4 py-3">
    <div class="py-4 px-4 md:px-16 md:py-6 my-4 bg-white border rounded-lg shadow">
        <label class="input-label text-center text-xl font-medium rounded-lg mb-4 mt-2">
            {{ $status_id === 4 ? 'Revisi' : '' }}
            Penerbitan
            Berita Acara
            atas Nama
            {{ $nama_lengkap }}</label>
        <form wire:submit.prevent="save" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label class="input-label">No Surat Berita Acara</label>
                <input wire:model="no_ba" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Tanggal Peninjauan Lokasi</label>
                <input wire:model="tanggal_peninjauan_lokasi" type="date" class="input" required>
            </div>
            <div class="">
                <label
                    class="input-label text-center text-base font-medium bg-primary rounded-lg py-2 mb-2 text-white">Letak
                    Tanah</label>
            </div>
            <div class="mb-6">
                <label class="input-label">Desa</label>
                <input wire:model="desa" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Kecamatan</label>
                <input wire:model="kecamatan" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Batas Sebelah Utara</label>
                <input wire:model="batas_sebelah_utara" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Batas Sebelah Timur</label>
                <input wire:model="batas_sebelah_timur" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Batas Sebelah Selatan</label>
                <input wire:model="batas_sebelah_selatan" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Batas Sebelah Barat</label>
                <input wire:model="batas_sebelah_barat" type="text" class="input" required>
            </div>

            <div class="">
                <label
                    class="input-label text-center text-base font-medium bg-primary rounded-lg py-2 mb-2 text-white">Letak
                    Dimohon</label>
            </div>
            <div class="mb-6">
                <label class="input-label">Letak Tanah Eksisting</label>
                <input wire:model="penggunaan_tanah_saat_dimohon" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Topografi Tanah</label>
                <input wire:model="topografi_tanah" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Rencana Penggunaan Tanah</label>
                <input wire:model="rencana_penggunaan_tanah" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Kesuburan Tanah</label>
                <input wire:model="kesuburan_tanah" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Sarana Irigasi atau Sumurbor</label>
                <input wire:model="sarana_irigasi_atau_sumurbor" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Jarak Bangunan Dengan Sungai</label>
                <input wire:model="jarak_bangunan_dengan_sungai" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Jarak Bangunan Dengan Jalan</label>
                <input wire:model="jarak_bangunan_dengan_jalan" type="text" class="input" required>
            </div>

            <div class="">
                <label
                    class="input-label text-center text-base font-medium bg-primary rounded-lg py-2 mb-2 text-white">Status
                    Tanah</label>
            </div>
            <div class="mb-6">
                <label class="input-label">Status Kepemilikan</label>
                <input wire:model="status_kepemilikan" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Bukti Penguasaan Tanah</label>
                <input wire:model="bukti_penguasaan_tanah" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Luas Tanah Seluruhnya</label>
                <input wire:model="luas_tanah_seluruhnya" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Luas Tanah Yang Dimohon</label>
                <input wire:model="luas_tanah_yang_dimohon" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Luas Tanah Yang Disetujui</label>
                <input wire:model="luas_tanah_yang_disetujui" type="text" class="input" required>
            </div>

            <div class="">
                <label
                    class="input-label text-center text-base font-medium bg-primary rounded-lg py-2 mb-2 text-white">Keputusan</label>
            </div>
            <div class="mb-6">
                <label class="input-label">Kesesuaian Dengan Rencana Tata Ruang Wilayah</label>
                <input wire:model="kesesuaian_rencana" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Hubungan Pemohon Dengan Tanah Tersebut</label>
                <input wire:model="hubungan_pemohon_dengan_tanah" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Kesesuaian Dengan Keadaan Fisik Tanah</label>
                <input wire:model="kesesuaian_dengan_keadaan_fisik_tanah" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Tanah Yang Dimohon Fisiknya Berupa</label>
                <input wire:model="tanah_yang_dimohon_fisiknya" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Jarak Dari Permukiman Terdekat</label>
                <input wire:model="jarak_dari_pemukiman_terdekat" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label">Pertimbangan/Analisis Lainnya</label>
                <input wire:model="pertimbangan" type="text" class="input" required>
            </div>

            <div class="">
                <label
                    class="input-label text-center text-base font-medium bg-primary rounded-lg py-2 mb-2 text-white"> Intensitas Pemanfaatan Ruang</label>
            </div>
            <div class="mb-6">
                <label class="input-label">Luas Bangunan </label>
                <input wire:model="luas_bangunan" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label"> Tinggi Bangunan </label>
                <input wire:model="tinggi_bangunan" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label"> Koefisien Dasar Bangunan </label>
                <input wire:model="kdb" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label"> Koefisien Lantai Bangunan </label>
                <input wire:model="klb" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label"> Koefisien Dasar Hijau </label>
                <input wire:model="kdh" type="text" class="input" required>
            </div>
            <div class="mb-6">
                <label class="input-label"> Garis Sempadan Bangunan </label>
                <input wire:model="gsb" type="text" class="input" required>
            </div>
           

            <!-- <div class="mb-6">
                <label class="input-label">Set Titik Kordinat Lokasi 
                    </label>
                
                 
                    <div   id="latlong" >
                    <buttton onclick='mulai()'  class='ml-2 btn-primary' >Mulai</buttton>
                    </div> 
                
        
            </div> -->


                <!-- <div class="mb-6">
                    <label class="input-label">  poli<span class="font-bold text-danger">*</span></label>
                    <input wire:model="titik_polygon" type="text" id="titik_polygon"  class="input"   required>
                
                </div> -->

                        
                        

            <!-- <div class="mb-6">
                <label class="input-label">Titik Koordinat Buka Maps</label>
                <input wire:model="titik_koordinat" type="text" class="input" required>
            </div> -->

            <div class="mb-6">
                <label class="input-label">
                    @if ($status_id === 3)
                        Dokumentasi
                    @elseif($status_id === 4)
                        Dokumentasi (kosongkan jika tidak ada perubahan)
                    @endif
                </label>
                <div class="flex">
                    <input wire:model="foto_dokumentasi" type="file" class="input-file" multiple
                        {{ $file_dokumentasi ? '' : 'required' }}>
                    @if ($foto_dokumentasi != null)
                        <button wire:click="deleteFotoDokumentasi" type="button" class="ml-2 btn-danger">Batal</button>
                    @endif
                </div>
                @error('foto_dokumentasi')
                    <div class="validation-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit"  t  class="btn-primary">Simpan</button>
            </div>

            
            @if ($openModal)
                <div class="modal-wrapper">
                    <div class="modal-layout">
                        <div class="modal">
                            <div class="modal-header">
                                <a href="/verifikasi-lapangan" class="modal-close-button">
                                    @include('components.icon-x-close-modal')
                                </a>
                            </div>
                            <div class="modal-body">
                                @include('components.icon-warning-modal')
                                <h3 class="modal-text">
                                    Berhasil menerbitkan Berita Acara
                                </h3>

                                <a href="/verifikasi-lapangan" class="mb-2 btn-primary">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>
