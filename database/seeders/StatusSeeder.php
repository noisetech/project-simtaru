<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'jenis_status' => 'Pengajuan Ditolak',
            'posisi_berkas' => 'Sekretariat TKPRD'
        ]);
        Status::create([
            'jenis_status' => 'Verifikasi Berkas',
            'posisi_berkas' => 'Sekretariat TKPRD'
        ]);
        Status::create([
            'jenis_status' => 'Verifikasi Lapangan',
            'posisi_berkas' => 'Pokja PRPPR'
        ]);
        Status::create([
            'jenis_status' => 'Revisi Berita Acara Pokja',
            'posisi_berkas' => 'Pokja PRPPR'
        ]);
        Status::create([
            'jenis_status' => 'Proses Penerbitan Surat',
            'posisi_berkas' => 'Sekretariat TKPRD'
        ]);
        Status::create([
            'jenis_status' => 'Persetujuan Surat oleh Ketua TKPRD',
            'posisi_berkas' => 'Ketua TKPRD'
        ]);
        Status::create([
            'jenis_status' => 'Revisi Nota Dinas',
            'posisi_berkas' => 'Sekretariat TKPRD'
        ]);
        Status::create([
            'jenis_status' => 'Persetujuan Surat oleh Kepala Dinas PUPR',
            'posisi_berkas' => 'Dinas PUPR'
        ]);
        Status::create([
            'jenis_status' => 'Revisi Surat Rekomendasi',
            'posisi_berkas' => 'Sekretariat TKPRD'
        ]);
        Status::create([
            'jenis_status' => 'Penomoran Surat',
            'posisi_berkas' => 'Sekretariat TKPRD'
        ]);
        Status::create([
            'jenis_status' => 'Upload Scan Surat Hasil Rekomendasi',
            'posisi_berkas' => 'Sekretariat TKPRD'
        ]);
        Status::create([
            'jenis_status' => 'Selesai, Surat Dapat Diunduh',
            'posisi_berkas' => 'Pemohon'
        ]);
    }
}
