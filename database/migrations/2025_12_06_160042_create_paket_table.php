<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketTable extends Migration {
    public function up(){
        Schema::create('paket', function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->decimal('harga', 12, 2);
            $table->text('deskripsi')->nullable();
            $table->json('wilayah_id')->nullable(); 
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('paket');
    }
}
