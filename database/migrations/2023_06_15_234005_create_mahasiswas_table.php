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
            $table->string('username', 10);
            $table->char('id_pegawai', 10);
            $table->char('id_prodi', 10);
            $table->string('nama_mhs');
            $table->char('no_telpon_mhs', 13);
            $table->string('alamat_mhs');
            $table->year('tahun_lulus');
            $table->string('status_umum');
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis');
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
