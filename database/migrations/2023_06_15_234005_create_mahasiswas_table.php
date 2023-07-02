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
            $table->unsignedBigInteger('id_mahasiswa')->autoIncrement();
            $table->char('nim', 10)->nullable();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->unsignedBigInteger('id_jurusan')->nullable();
            $table->string('nama_mhs')->nullable();
            $table->char('no_telpon_mhs', 13)->nullable();
            $table->string('alamat_mhs')->nullable();
            $table->year('tahun_lulus')->nullable();
            $table->string('status_umum')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusans')->onDelete('cascade');
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
