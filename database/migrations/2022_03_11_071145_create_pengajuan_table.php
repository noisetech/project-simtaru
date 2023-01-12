<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();

            // status
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->string('alasan_ditolak')->nullable();
            $table->string('revisi_berkas')->nullable();

            // input pemohon
            $table->string('nama_lengkap')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('bertindak_atas_nama')->nullable();
            $table->string('penggunaan_tanah_saat_dimohon')->nullable();

            $table->string('luas_tanah_seluruhnya')->nullable();
            $table->string('luas_tanah_yang_dimohon')->nullable();
            $table->longText('bukti_penguasaan_tanah')->nullable();
            $table->longText('letak_tanah')->nullable();
            $table->string('rencana_penggunaan_tanah')->nullable();
            $table->string('batas_sebelah_utara')->nullable();
            $table->string('batas_sebelah_timur')->nullable();
            $table->string('batas_sebelah_selatan')->nullable();
            $table->string('batas_sebelah_barat')->nullable();
            $table->string('titik_koordinat')->nullable();

            // input admin
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('topografi_tanah')->nullable();
            $table->string('kesuburan_tanah')->nullable();
            $table->string('sarana_irigasi_atau_sumurbor')->nullable();
            $table->string('jarak_bangunan_dengan_sungai')->nullable();
            $table->string('jarak_bangunan_dengan_jalan')->nullable();
            $table->longText('status_kepemilikan')->nullable();
            $table->string('luas_tanah_yang_disetujui')->nullable();

            $table->string('kesesuaian_rencana')->nullable();
            $table->string('hubungan_pemohon_dengan_tanah')->nullable();
            $table->string('kesesuaian_dengan_keadaan_fisik_tanah')->nullable();
            $table->string('tanah_yang_dimohon_fisiknya')->nullable();
            $table->string('jarak_dari_pemukiman_terdekat')->nullable();
            $table->longText('pertimbangan')->nullable();

            $table->date('tanggal_peninjauan_lokasi')->nullable();
            $table->date('tanggal_turun_nota_dinas')->nullable();
            $table->date('tanggal_turun_surat_rekomendasi')->nullable();

            $table->string('no_ba')->nullable();
            $table->string('no_nota_dinas')->nullable();
            $table->string('no_surat_rekomendasi')->nullable();

            // file upload
            $table->mediumText('fotocopy_ktp')->nullable();
            $table->mediumText('fotocopy_sertifikat')->nullable();
            $table->mediumText('fotocopy_sppt_pbb')->nullable();
            $table->mediumText('fotocopy_npwp')->nullable();
            $table->mediumText('surat_persetujuan_tetangga')->nullable();
            $table->mediumText('gambar_rencana_pembangunan')->nullable();
            $table->mediumText('fotocopy_akte_pendirian_perusahaan')->nullable();
            $table->mediumText('set_lokasi_bangunan')->nullable();
            $table->mediumText('surat_pernyataan_force_majeur')->nullable();
            $table->mediumText('proposal')->nullable();
            $table->mediumText('foto_dokumentasi')->nullable();

            // file hasil generate
            $table->mediumText('surat_pernyataan')->nullable();
            $table->mediumText('surat_permohonan_skpr')->nullable();
            $table->mediumText('surat_permohonan_tkprd')->nullable();
            $table->mediumText('berita_acara')->nullable();
            $table->mediumText('file_dokumentasi')->nullable();
            $table->mediumText('nota_dinas')->nullable();
            $table->mediumText('surat_hasil_rekomendasi')->nullable();

            //file hasil generate scan
            $table->mediumText('scan_surat_hasil_rekomendasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
};
