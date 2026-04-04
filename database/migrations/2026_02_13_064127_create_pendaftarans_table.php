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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id("id_Pendaftaran");
            $table->string('nama_siswa');
            $table->foreignId('id_kelas')->constrained('kelas', 'id_kelas');
            $table->foreignId('id_eskul')->constrained('eskuls','id_eskul');
            $table->string('alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
