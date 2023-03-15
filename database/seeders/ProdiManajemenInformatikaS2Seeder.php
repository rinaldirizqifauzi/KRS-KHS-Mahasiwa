<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiManajemenInformatikaS2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_master_data_prodis')->insert([
            [
                'id' => 10,
                'nama' => 'Bahasa Inggris I',
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'nama' => 'Pendidikan Agama',
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'nama' => 'Pendidikan Pancasila',
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'nama' => 'Pemrograman Dasar',
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'nama' => 'Sistem Basis Data',
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'nama' => 'Sistem Operasi',
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'nama' => 'Pemrograman Web',
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'nama' => 'Sistem Informasi Manajemen',
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
