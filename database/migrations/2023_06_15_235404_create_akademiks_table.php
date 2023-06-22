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
            $table->unsignedBigInteger('id_pegawai',);
            $table->string('status_akademik');
            $table->binary('khs_semester_1');
            $table->binary('khs_semester_2');
            $table->binary('khs_semester_3');
            $table->binary('khs_semester_4');
            $table->binary('khs_semester_5');
            $table->binary('khs_semester_6');
            $table->binary('lembar_sp');
            $table->text('rincian_akademik');
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais');
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
