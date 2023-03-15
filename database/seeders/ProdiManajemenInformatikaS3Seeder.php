<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiManajemenInformatikaS3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_master_data_prodis')->insert([
            [
                'id' => 18,
                'nama' => 'Bahasa Inggris II',
                'prodi_id' => 1,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'nama' => 'Pemrograman SQL	',
                'prodi_id' => 1,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'nama' => 'Pemrograman Web Dinamis',
                'prodi_id' => 1,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'nama' => 'Jaringan dan Komunikasi Data',
                'prodi_id' => 1,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 23,
                'nama' => 'Pemrograman Lanjut',
                'prodi_id' => 1,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 24,
                'nama' => 'Analisis dan Perancangan Sistem Informasi',
                'prodi_id' => 1,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
