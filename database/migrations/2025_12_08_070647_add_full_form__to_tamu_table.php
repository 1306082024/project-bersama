<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::table('tamu', function(Blueprint $table){
            $table->string('nik')->nullable();
            $table->string('ttl')->nullable();

            $table->string('alamat_jalan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('no_rumah')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();

            $table->text('full_alamat')->nullable();
            $table->string('email')->nullable();
        });
    }

    public function down(){
        Schema::table('tamu', function(Blueprint $table){
            $table->dropColumn([
                'nik','ttl','alamat_jalan','rt','rw','no_rumah',
                'desa','kecamatan','kabupaten','full_alamat','email'
            ]);
        });
    }
};
