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
            $table->char('id_ta', 10)->primary();
            $table->char('nim', 10);
            $table->char('id_pegawai', 10);
            $table->binary('lembar_persetujuan');
            $table->binary('lembar_pengesahan');
            $table->binary('lembar_konsul_pemb_1');
            $table->binary('lembar_konsul_pemb_2');
            $table->binary('lembar_revisi');
            $table->string('status_ta');
            $table->text('rincian_ta');
            $table->timestamps();


            $table->foreign('nim')->references('nim')->on('mahasiswas');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais');
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
