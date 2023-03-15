<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiManajemenInformatikaS4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_master_data_prodis')->insert([
            [
                'id' => 25,
                'nama' => 'Teknik Penulisan Karya Ilmiah',
                'prodi_id' => 1,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 26,
                'nama' => 'Rancang Bangun Jaringan Komputer',
                'prodi_id' => 1,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 27,
                'nama' => 'Pemrograman Web Framework',
                'prodi_id' => 1,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 28,
                'nama' => 'Pemrograman SQL Lanjut',
                'prodi_id' => 1,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 29,
                'nama' => 'Pemrograman Basis Data',
                'prodi_id' => 1,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 30,
                'nama' => 'Kecakapan Antar Personal',
                'prodi_id' => 1,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
