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
        Schema::create('perpustakaans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_perpus')->autoIncrement();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->string('dokumen_perpus')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status_perpus')->default('Bermasalah');
            $table->text('rincian_perpus')->nullable();
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpustakaans');
    }
};
