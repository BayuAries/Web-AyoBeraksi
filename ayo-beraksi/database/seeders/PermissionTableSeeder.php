<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permission = [
            ['kode' => 'P001', 'nama' => 'akses penyuapan', 'keterangan' => 'Hak Akses Laporan Penyuapan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => 'P002', 'nama' => 'akses pengaduan', 'keterangan' => 'Hak Akses Laporan Pengaduan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => 'P003', 'nama' => 'akses gratifikasi', 'keterangan' => 'Hak Akses Laporan Gratifikasi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => 'P004', 'nama' => 'akses feedback', 'keterangan' => 'Hak Akses Feedback', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => 'P005', 'nama' => 'akses role', 'keterangan' => 'Hak Akses Role', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        \App\Models\Permission::truncate();
        \App\Models\Permission::insert($permission);

        $role =  Role::create(
            ['kode' => 'R000', 'nama' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        $role->permissions()->sync([1, 2, 3, 4, 5]);

        $role1 =  Role::create(
            ['kode' => 'R001', 'nama' => 'Ketua Tim Kepatuhan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        $role1->permissions()->sync([1, 2, 3, 4, 5]);

        $role2 =  Role::create(
            ['kode' => 'R002', 'nama' => 'Tim Kepatuhan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        $role2->permissions()->sync([1, 2, 3, 4, 5]);

        $role3 =  Role::create(
            ['kode' => 'R003', 'nama' => 'Kepala Balai', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        $role3->permissions()->sync([1, 2, 3, 4, 5]);

        $role4 =  Role::create(
            ['kode' => 'R004', 'nama' => 'Pegawai BBKP Belawan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        $role4->permissions()->sync([1, 2, 3, 4, 5]);

        $role5 =  Role::create(
            ['kode' => 'R005', 'nama' => 'Pengguna Jasa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        $role5->permissions()->sync([1, 2, 3, 4]);

        $role6 =  Role::create(
            ['kode' => 'R006', 'nama' => 'Masyarakat Umum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        $role6->permissions()->sync([1, 2, 3, 4]);

        $user = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'no_telp' => '081234567890', 'nip' => '000000', 'password' => bcrypt('password'), 'role_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bagas', 'email' => 'bagas@gmail.com', 'no_telp' => '081234567891', 'nip' => '000001', 'password' => bcrypt('password'), 'role_id' => '2', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lala', 'email' => 'lala@gmail.com', 'no_telp' => '081234567892', 'nip' => '000002', 'password' => bcrypt('password'), 'role_id' => '3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bagus', 'email' => 'bagus@gmail.com', 'no_telp' => '081234567893', 'nip' => '000003', 'password' => bcrypt('password'), 'role_id' => '3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Indra', 'email' => 'indra@gmail.com', 'no_telp' => '081234567894', 'nip' => '000004', 'password' => bcrypt('password'), 'role_id' => '3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Jaja', 'email' => 'jaja@gmail.com', 'no_telp' => '081234567895', 'nip' => '000005', 'password' => bcrypt('password'), 'role_id' => '4', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pegawai', 'email' => 'pegawai@gmail.com', 'no_telp' => '081234567896', 'nip' => '000006', 'password' => bcrypt('password'), 'role_id' => '5', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengguna Jasa', 'email' => 'pengguna@gmail.com', 'no_telp' => '081234567897', 'nip' => '', 'password' => bcrypt('password'), 'role_id' => '6', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Masyarakat Umum', 'email' => 'masyarakat@gmail.com', 'no_telp' => '081234567898', 'nip' => '', 'password' => bcrypt('password'), 'role_id' => '7', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        \App\Models\User::truncate();
        \App\Models\User::insert($user);
    }
}
