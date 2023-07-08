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
        Schema::create('akademiks', function (Blueprint $table) {
            $table->unsignedBigInteger('id_akademik')->autoIncrement();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_pegawai',)->nullable();
            $table->string('status_akademik')->default('Bermasalah');
            $table->string('khs_semester_1')->nullable();
            $table->string('khs_semester_2')->nullable();
            $table->string('khs_semester_3')->nullable();
            $table->string('khs_semester_4')->nullable();
            $table->string('khs_semester_5')->nullable();
            $table->string('khs_semester_6')->nullable();
            $table->string('lembar_sp')->nullable();
            $table->text('rincian_akademik')->nullable();
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
        Schema::dropIfExists('akademiks');
    }
};
