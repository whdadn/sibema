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
            $table->char('nim', 10)->index();
            $table->char('id_pegawai', 10)->index();
            $table->binary('dokumen_perpus');
            $table->string('keterangan');
            $table->string('status_perpus');
            $table->timestamps();
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
