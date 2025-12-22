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
        Schema::create('riwayat_teknisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teknisi_id')->constrained('teknisi');
            $table->foreignId('tugas_instalasi_id')->constrained('tugas_instalasi');
            $table->enum('aksi', ['mulai','selesai','gagal']);
            $table->timestamp('waktu');
            $table->text('keterangan')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_teknisi');
    }
};
