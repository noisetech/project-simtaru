<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    protected $fillable = [
        'user_id',

        // status
        'status_id',
        'alasan_ditolak',
        'revisi_berkas',

        // input pemohon
        'nama_lengkap',
        'alamat',
        'tempat_tanggal_lahir',
        'pekerjaan',
        'no_identitas',
        'no_hp',
        'bertindak_atas_nama',
        'penggunaan_tanah_saat_dimohon',

        'luas_tanah_seluruhnya',
        'luas_tanah_yang_dimohon',
        'bukti_penguasaan_tanah',
        'letak_tanah',
        'rencana_penggunaan_tanah',
        'batas_sebelah_utara',
        'batas_sebelah_timur',
        'batas_sebelah_selatan',
        'batas_sebelah_barat',
        'titik_koordinat',
        'titik_polygon',

        // input admin
        'desa',
        'kecamatan',
        'topografi_tanah',
        'kesuburan_tanah',
        'sarana_irigasi_atau_sumurbor',
        'jarak_bangunan_dengan_sungai',
        'jarak_bangunan_dengan_jalan',
        'status_kepemilikan',
        'luas_tanah_yang_disetujui',

        'kesesuaian_rencana',
        'hubungan_pemohon_dengan_tanah',
        'kesesuaian_dengan_keadaan_fisik_tanah',
        'tanah_yang_dimohon_fisiknya',
        'jarak_dari_pemukiman_terdekat',
        'pertimbangan',

        'tanggal_peninjauan_lokasi',
        'tanggal_turun_nota_dinas',
        'tanggal_turun_surat_rekomendasi',

        'no_ba',
        'no_nota_dinas',
        'no_surat_rekomendasi',

        // file upload
        'fotocopy_ktp',
        'fotocopy_sertifikat',
        'fotocopy_sppt_pbb',
        'fotocopy_npwp',
        'surat_persetujuan_tetangga',
        'gambar_rencana_pembangunan',
        'fotocopy_akte_pendirian_perusahaan',
        'set_lokasi_bangunan',
        'surat_pernyataan_force_majeur',
        'proposal',
        'foto_dokumentasi',

        // file hasil generate
        'surat_pernyataan',
        'surat_permohonan_skpr',
        'surat_permohonan_tkprd',
        'berita_acara',
        'file_dokumentasi',
        'nota_dinas',
        'surat_hasil_rekomendasi',

        //file hasil generate scan
        'scan_surat_hasil_rekomendasi',

        // jenis tanah
        'jenis_tanah_id'
    ];

    protected $dates = [
        'tanggal_peninjauan_lokasi',
        'tanggal_turun_nota_dinas',
        'tanggal_turun_surat_rekomendasi',
        'created_at',
        'updated_at',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function jenis_tanah()
    {
        return $this->belongsTo(JenisTanah::class, 'jenis_tanah_id', 'id');
    }
}
