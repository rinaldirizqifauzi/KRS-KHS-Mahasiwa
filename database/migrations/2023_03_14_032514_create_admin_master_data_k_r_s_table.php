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
        Schema::create('admin_master_data_k_r_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->nullable();
            $table->foreignId('user_id')->index();
            $table->foreignId('prodi_id')->index();
            $table->date('tanggal_aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_master_data_k_r_s');
    }
};
