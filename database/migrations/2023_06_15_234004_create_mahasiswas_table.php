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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->char('nim', 10)->primary();
            $table->char('id_prodi', 10)->index();
            $table->char('id_pegawai', 10)->index();
            $table->string('nama_mhs');
            $table->char('no_telpon_mhs', 13);
            $table->string('alamat_mhs');
            $table->year('tahun_lulus');
            $table->string('status_umum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
