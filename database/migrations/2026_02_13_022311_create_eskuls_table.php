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
        Schema::create('eskuls', function (Blueprint $table) {
            $table->id('id_eskul');
            $table->foreignId('id_pemegang')->constrained('Users', 'id_user');
            $table->string('nama_eskul');
            $table->string('kategori');
            $table->string('slogan');
            $table->string('deskripsi');
            $table->string('nama_pembina');
            $table->string('jadwal');
            $table->string('tempat');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eskuls');
    }
};
