<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Wilayah;
use App\Models\Paket;

class InitialSeeder extends Seeder {
    public function run(){
        $w1 = Wilayah::create(['nama'=>'Klayan Tahap 1','slug'=>'tahap-1']);
        $w2 = Wilayah::create(['nama'=>'Klayan Tahap 2','slug'=>'tahap-2']);
        $w3 = Wilayah::create(['nama'=>'Klayan Tahap 3','slug'=>'tahap-3']);

        Paket::create([
            'nama'=>'Hemat',
            'slug'=>'hemat',
            'harga'=>149000,
            'deskripsi'=>'Paket Hemat - cocok untuk browsing',
            'wilayah_id'=>[$w1->id, $w2->id]
        ]);
        Paket::create([
            'nama'=>'Puas',
            'slug'=>'puas',
            'harga'=>249000,
            'deskripsi'=>'Puas - stabil untuk banyak device',
            'wilayah_id'=>[$w2->id, $w3->id]
        ]);
        Paket::create([
            'nama'=>'Mantap',
            'slug'=>'mantap',
            'harga'=>399000,
            'deskripsi'=>'Mantap - kecepatan tinggi',
            'wilayah_id'=>[$w1->id, $w2->id, $w3->id]
        ]);
    }
}
