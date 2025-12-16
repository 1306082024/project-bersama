<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wilayah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WilayahSeeder extends Seeder
{
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Wilayah::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $wilayah = [
            [
                'nama' => 'Klayan Tahap 1',
                'keterangan' => 'Perumahan Klayan Tahap 1',
            ],
            [
                'nama' => 'Klayan Tahap 2',
                'keterangan' => 'Perumahan Klayan Tahap 2',
            ],
            [
                'nama' => 'Klayan Tahap 3',
                'keterangan' => 'Perumahan Klayan Tahap 3',
            ],
            [
                'nama' => 'Klayan Tahap 4',
                'keterangan' => 'Perumahan Klayan Tahap 4',
            ],
            [
                'nama' => 'Klayan Tahap 5',
                'keterangan' => 'Perumahan Klayan Tahap 5',
            ],
        ];

        foreach ($wilayah as $w) {
            Wilayah::create([
                'nama'       => $w['nama'],
                'slug'       => Str::slug($w['nama']),
                'keterangan' => $w['keterangan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
