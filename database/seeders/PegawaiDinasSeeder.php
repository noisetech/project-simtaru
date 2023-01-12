<?php

namespace Database\Seeders;

use App\Models\PegawaiDinas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiDinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PegawaiDinas::create([
            'jabatan' => 'Kepala Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Lampung Utara',
            'nama' => 'SYAHRIZAL ADHAR, SH.,MM',
            'jabatan_lain' => 'Pembina Utama Muda',
            'nip' => '19640220 199103 1 010'
        ]);
        PegawaiDinas::create([
            'jabatan' => 'Kabid. Penataan Ruang',
            'nama' => 'JOHANSYAH.AT, S.Sos, M.Si',
            'jabatan_lain' => 'Pembina',
            'nip' => '19770828 199603 1 001'
        ]);
        PegawaiDinas::create([
            'jabatan' => 'Kasi Pemanfaatan Ruang',
            'nama' => 'FERY MULYAWAN, ST, MM',
            'jabatan_lain' => 'Pembina',
            'nip' => '19720611 200604 1 008'
        ]);
        PegawaiDinas::create([
            'jabatan' => 'Staf Pemanfaatan Ruang',
            'nama' => 'ANDIKA JOHDI, ST',
            'jabatan_lain' => 'Penata Muda',
            'nip' => '19950909 201903 1001'
        ]);
    }
}
