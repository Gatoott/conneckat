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
            $table->foreignId('id_eskul')->constrained('eskuls','id_eskul');
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->integer('no_wa');
            $table->string('alasan');
            $table->string('kesiapan');
            $table->string('pengalaman');
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
