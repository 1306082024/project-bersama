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
            Schema::create('tugas_instalasi', function (Blueprint $table) {
                $table->id();

                $table->foreignId('tamu_id')
                    ->constrained('tamu')
                    ->cascadeOnDelete();

                $table->foreignId('teknisi_id')
                    ->constrained('teknisi')
                    ->cascadeOnDelete();

                $table->enum('status', [
                    'Menunggu Instalasi',
                    'Proses',
                    'Menunggu Verifikasi',
                    'Terpasang',
                    'Gagal'
                ])->default('Menunggu Instalasi');

                $table->string('foto_bukti')->nullable();
                $table->text('catatan_teknisi')->nullable();

                $table->timestamp('tanggal_mulai')->nullable();
                $table->timestamp('tanggal_selesai')->nullable();

                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_instalasi');
    }
};
