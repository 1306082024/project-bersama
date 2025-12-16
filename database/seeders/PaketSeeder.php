<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;
use App\Models\Wilayah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaketSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Matikan foreign key checks
         * karena tabel paket direferensikan oleh tabel tamu
         */
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Paket::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ambil ID wilayah (PASTIKAN NAMANYA SESUAI)
        $wilayah = Wilayah::pluck('id', 'nama')->toArray();

        $data = [
            [
                'nama' => 'Paket Hemat',
                'harga' => 170000,
                'wilayah' => ['Kelayan Tahap 1'],
                'deskripsi' =>
                    "Kecepatan Download & Upload hingga ekstra speed 60 Mbps\n".
                    "Kuota Unlimited\n".
                    "Full Support 24 jam",
            ],
            [
                'nama' => 'Paket Puas',
                'harga' => 220000,
                'wilayah' => ['Kelayan Tahap 2'],
                'deskripsi' =>
                    "Kecepatan Download & Upload hingga ekstra speed 120 Mbps\n".
                    "Kuota Unlimited\n".
                    "Full Support 24 jam",
            ],
            [
                'nama' => 'Paket Mantap',
                'harga' => 310000,
                'wilayah' => ['Kelayan Tahap 3'],
                'deskripsi' =>
                    "Kecepatan Download & Upload hingga ekstra speed 180 Mbps\n".
                    "Kuota Unlimited\n".
                    "Full Support 24 jam",
            ],
            [
                'nama' => 'Paket Ganas',
                'harga' => 350000,
                'wilayah' => ['Kelayan Tahap 4'],
                'deskripsi' =>
                    "Kecepatan Download & Upload hingga ekstra speed 300 Mbps\n".
                    "Kuota Unlimited\n".
                    "Full Support 24 jam",
            ],
            [
                'nama' => 'Paket Sultan',
                'harga' => 1000000,
                'wilayah' => ['Kelayan Tahap 5'],
                'deskripsi' =>
                    "Speed hingga 600 Mbps\n".
                    "Kuota Unlimited\n".
                    "Full Support 24 jam",
            ],
        ];

        foreach ($data as $item) {

            // mapping wilayah ke ID
            $wilayahId = [];
            foreach ($item['wilayah'] as $w) {
                if (isset($wilayah[$w])) {
                    $wilayahId[] = $wilayah[$w];
                }
            }

            Paket::create([
                'nama'       => $item['nama'],
                'slug'       => Str::slug($item['nama']),
                'harga'      => $item['harga'],
                'deskripsi'  => $item['deskripsi'],
                'wilayah_id' => $wilayahId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
