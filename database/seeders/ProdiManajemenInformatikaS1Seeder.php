<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiManajemenInformatikaS1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_master_data_prodis')->insert([
            [
                'id' => 1,
                'nama' => 'Manajemen Informatika',
                'prodi_id' => null,
                'semester' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama' => 'Pendidikan Kewarganegaraan',
                'prodi_id' => 1,
                'semester' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama' => 'Bahasa Indonesia',
                'prodi_id' => 1,
                'semester' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama' => 'Dasar-Dasar Ilmu Manajemen',
                'prodi_id' => 1,
                'semester' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nama' => 'Logika Informatika',
                'prodi_id' => 1,
                'semester' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nama' => 'Paket Program Niaga',
                'prodi_id' => 1,
                'semester' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nama' => 'Pengantar Teknologi Informasi',
                'prodi_id' => 1,
                'semester' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nama' => 'Komputer Grafis',
                'prodi_id' => 1,
                'semester' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'nama' => 'Algoritma dan Pemrograman',
                'prodi_id' => 1,
                'semester' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
