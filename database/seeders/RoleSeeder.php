<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $superadmin = Role::create(['name' => 'Superadmin']);
        Permission::create(['name' => 'ubah-status-pengajuan']);
        Permission::create(['name' => 'kelola-admin']);
        Permission::create(['name' => 'kelola-user']);

        $sekretariat = Role::create(['name' => 'Sekretariat-TKPRD']);
        Permission::create(['name' => 'revisi-berkas']);
        Permission::create(['name' => 'verifikasi-berkas']);
        Permission::create(['name' => 'penerbitan-surat']);
        Permission::create(['name' => 'penomoran-surat']);
        Permission::create(['name' => 'upload-scan-surat-rekomendasi']);
        Permission::create(['name' => 'kelola-pegawai-dinas']);
        Permission::create(['name' => 'kelola-surat']);
        $sekretariat->givePermissionTo('revisi-berkas', 'verifikasi-berkas', 'penerbitan-surat', 'penomoran-surat', 'upload-scan-surat-rekomendasi', 'kelola-pegawai-dinas', 'kelola-surat');

        $pokja = Role::create(['name' => 'Pokja-PRPPR']);
        Permission::create(['name' => 'verifikasi-lapangan']);
        $pokja->givePermissionTo('revisi-berkas', 'verifikasi-lapangan', 'kelola-pegawai-dinas', 'kelola-surat');

        $ketua = Role::create(['name' => 'Ketua-TKPRD']);
        Permission::create(['name' => 'persetujuan-tkprd']);
        $ketua->givePermissionTo('persetujuan-tkprd');

        $kepalaDinas = Role::create(['name' => 'Kepala-Dinas-PUPR']);
        Permission::create(['name' => 'persetujuan-pupr']);
        $kepalaDinas->givePermissionTo('persetujuan-pupr');

        $pemohon = Role::create(['name' => 'Pemohon']);
        Permission::create(['name' => 'create-pengajuan']);
        $pemohon->givePermissionTo('create-pengajuan');

        $user = User::factory()->create([
            'no_ktp' => '1231231231231231',
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);
        $user->assignRole($superadmin);

        $user = User::factory()->create([
            'no_ktp' => '1231231231231232',
            'name' => 'Sekretariat TKPRD',
            'email' => 'sekretariat@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);
        $user->assignRole($sekretariat);

        $user = User::factory()->create([
            'no_ktp' => '1231231231231233',
            'name' => 'Pokja PRPPR',
            'email' => 'pokja@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);
        $user->assignRole($pokja);

        $user = User::factory()->create([
            'no_ktp' => '1231231231231234',
            'name' => 'Ketua TKPRD',
            'email' => 'ketua@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);
        $user->assignRole($ketua);

        $user = User::factory()->create([
            'no_ktp' => '1231231231231235',
            'name' => 'Kepala Dinas PUPR',
            'email' => 'kepaladinas@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);
        $user->assignRole($kepalaDinas);

        $user = User::factory()->create([
            'no_ktp' => '1231231231231236',
            'name' => 'Pemohon',
            'email' => 'pemohon@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);
        $user->assignRole($pemohon);

        $user = User::factory()->create([
            'no_ktp' => '1231231231231237',
            'name' => 'Pemohon',
            'email' => 'pemohon1@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);
        $user->assignRole($pemohon);
    }
}
