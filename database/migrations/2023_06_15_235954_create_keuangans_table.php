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
        Schema::create('keuangans', function (Blueprint $table) {
            $table->char('id_keuangan', 10)->primary();
            $table->char('nim', 10);
            $table->char('id_pegawai', 10);
            $table->binary('dokumen_keuangan');
            $table->string('status_keuangan');
            $table->text('rincian_keuangan');
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
        Schema::dropIfExists('keuangans');
    }
};
