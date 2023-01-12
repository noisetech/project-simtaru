<?php

namespace Database\Seeders;
use App\Models\setting_landing;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingLandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        setting_landing::create([
            'key' => 'gambar_utama',
            'judul' => 'Sistem Informasi Tata Ruang',
            'value' => 'Kabupaten Lampung Utara',
            'gambar' => 'img/bg/bg.jpg',
        ]);
        setting_landing::create([
            'key' => 'title_ringkasan',
            'judul' => 'SIMTARU LAMPURA',
            'value' => 'Sistem Informasi Tata Ruang Kabupaten Lampung Utara',
            'gambar' => '-',
        ]);
        
        setting_landing::create([
            'key' => 'ringkasan',
            'judul' => '.',
            'value' => 'Merupakan sebuah aplikasi yang digunakan untuk pemerintah daerah untuk menampilkan informasi aktifitas perencanaan, pemanfaatan dan pengendalian tata ruang wilayah. Aplikasi simtaru dapat dimanfaatkan oleh masyarakat dan para pelaku usaha untuk meningkatkan kegiatan dengan rencana tata ruang. Aplikasi ini juga sebagai bagian keterbukaan informasi publik yang dilakukan oleh pemerintah daerah.',
            'gambar' => '-',
        ]);
        setting_landing::create([
            'key' => 'judul_alur',
            'judul' => 'Alur',
            'value' => 'Proses Pengajuan',
            'gambar' => '-',
        ]);
        setting_landing::create([
            'key' => 'alur1',
            'judul' => '1. PENGAJUAN',
            'value' => 'Isi form pengajuan sesuai dengan ketentuan yang sudah di tetapkan',
            'gambar' => 'tambah.jpg',
        ]);
        setting_landing::create([
            'key' => 'alur2',
            'judul' => '2. verifikasi berkas',
            'value' => 'Sekeretariat TKPRD akan memverifikasi file yang telah diajukan oleh pemohon',
            'gambar' => 'verifikasi.png',
        ]);
        setting_landing::create([
            'key' => 'alur3',
            'judul' => ' 3. verifikasi lapangan',
            'value' => 'Pokja PRPPR akan melakukan verifikasi lapangan guna menyesuaikan dengan pengajuan yang telah diajukan',
            'gambar' => 'verif_lapangan.png',
        ]);
        setting_landing::create([
            'key' => 'alur4',
            'judul' => ' 4. PERSETUJUAN KETUA DINAS PUPR',
            'value' => 'Ketua Dinas PUPR menyetujui pengajuan',
            'gambar' => 'verified.png',
        ]);
        setting_landing::create([
            'key' => 'alur5',
            'judul' => ' 5. PERSETUJUAN KEPALA POKJA',
            'value' => 'Kepala Pokja TKPRD menyetujui pengajuan',
            'gambar' => 'verified.png',
        ]);
        setting_landing::create([
            'key' => 'alur6',
            'judul' => '6. SURAT REKOMENDASI',
            'value' => 'Kepala Pokja TKPRD menyetujui pengajuan',
            'gambar' => 'verified.png',
        ]);


        setting_landing::create([
            'key' => 'deskripsi',
            'judul' => 'Deskripsi',
            'value' => 'Menu',
            'gambar' => '-',
        ]);
        setting_landing::create([
            'key' => 'menu1',
            'judul' => 'Pengajuan',
            'value' => 'Menu pengajuan ditujukan pada masnyarakat yang akan melakukan pengajuan izin memdirikan bangunan pada suatu lahan dengan ketentuan yang sudah ada pada form pengajuan.',
            'gambar' => 'pengajuan.svg',
        ]);
        setting_landing::create([
            'key' => 'menu2',
            'judul' => 'Informasi',
            'value' => 'Menu informasi pengajuan berguna untuk melihat status dari berkas yang telah diajukan oleh masyarakat.',
            'gambar' => 'informasi-pengajuan.svg',
        ]);
        setting_landing::create([
            'key' => 'menu3',
            'judul' => 'Peta',
            'value' => 'Menu peta bertujuan untuk menampilkan lokasi pengajuan yang telah disetujui.',
            'gambar' => 'peta.svg',
        ]);
        setting_landing::create([
            'key' => 'menu4',
            'judul' => 'Manual Book',
            'value' => 'Menu manual book bertujuan untuk memandu pengguna tentang penggunaan website Sistem Informasi Tata Ruang Lampung Utara.',
            'gambar' => 'manual-book.svg',
        ]);
    }
}
