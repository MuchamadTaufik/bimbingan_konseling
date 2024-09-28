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
        Schema::create('bimbingan_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->string('semester');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('topik');
            $table->string('tujuan');
            $table->string('pemateri');
            $table->string('tempat_select');
            $table->string('tempat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingan_siswas');
    }
};
