<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamuTable extends Migration {
    public function up(){
        Schema::create('tamu', function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('kontak')->nullable();
            $table->unsignedBigInteger('wilayah_id')->nullable();
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->text('pesan');
            $table->string('lokasi')->nullable();
            $table->timestamps();

            $table->foreign('wilayah_id')->references('id')->on('wilayah')->onDelete('set null');
            $table->foreign('paket_id')->references('id')->on('paket')->onDelete('set null');
        });
    }

    public function down(){
        Schema::dropIfExists('tamu');
    }
}
