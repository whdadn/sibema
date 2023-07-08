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
        Schema::create('tugas_akhirs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ta')->autoIncrement();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->string('lembar_persetujuan')->nullable();
            $table->string('lembar_pengesahan')->nullable();
            $table->string('lembar_konsul_pemb_1')->nullable();
            $table->string('lembar_konsul_pemb_2')->nullable();
            $table->string('lembar_revisi')->nullable();
            $table->string('status_ta')->default('Bermasalah');
            $table->text('rincian_ta')->nullable();
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
        Schema::dropIfExists('tugas_akhirs');
    }
};
