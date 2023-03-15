<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiManajemenInformatikaS6Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_master_data_prodis')->insert([
            [
                'id' => 37,
                'nama' => 'Praktik Kerja Lapang (PKL)',
                'prodi_id' => 1,
                'semester' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 38,
                'nama' => 'Tugas Akhir',
                'prodi_id' => 1,
                'semester' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
