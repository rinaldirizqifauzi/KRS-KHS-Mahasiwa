<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // ProdiManajemenInformatikaS1Seeder::class,
            ProdiManajemenInformatikaS2Seeder::class,
            ProdiManajemenInformatikaS3Seeder::class,
            ProdiManajemenInformatikaS4Seeder::class,
            ProdiManajemenInformatikaS5Seeder::class,
            ProdiManajemenInformatikaS6Seeder::class,
        ]);
    }
}
