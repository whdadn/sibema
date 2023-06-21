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
            $table->char('id_perpus', 10)->primary();
            $table->char('nim', 10);
            $table->char('id_pegawai', 10);
            $table->binary('dokumen_perpus');
            $table->string('keterangan');
            $table->string('status_perpus');
            $table->text('rincian_perpus');
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
        Schema::dropIfExists('perpustakaans');
    }
};
