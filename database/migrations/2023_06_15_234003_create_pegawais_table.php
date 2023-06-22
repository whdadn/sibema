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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pegawai')->autoIncrement();
            $table->unsignedBigInteger('id_user');
            $table->string('nama_pegawai');
            $table->char('no_telepon_pegawai');
            $table->string('alamat_pegawai');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
