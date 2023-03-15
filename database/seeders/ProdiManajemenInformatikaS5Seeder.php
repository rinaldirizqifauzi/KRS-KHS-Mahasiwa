<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiManajemenInformatikaS5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_master_data_prodis')->insert([
            [
                'id' => 31,
                'nama' => 'Proyek Mandiri',
                'prodi_id' => 1,
                'semester' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 32,
                'nama' => 'Keamanan Sistem Informasi',
                'prodi_id' => 1,
                'semester' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 33,
                'nama' => 'Kewirausahaan Informatika',
                'prodi_id' => 1,
                'semester' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 34,
                'nama' => 'Proyek Sistem Informasi',
                'prodi_id' => 1,
                'semester' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 35,
                'nama' => 'Etika dan Hukum Teknologi Informasi',
                'prodi_id' => 1,
                'semester' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 36,
                'nama' => 'Infrastruktur Sistem Informasi',
                'prodi_id' => 1,
                'semester' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
