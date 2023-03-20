<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_master_data_dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->nullable();
            $table->foreignId('mahasiswa_id')->nullable();
            $table->foreignId('prodi_id')->nullable();
            $table->string('nama');
            $table->string('nip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_master_data_dosens');
    }
};
