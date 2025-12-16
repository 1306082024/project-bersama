<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tamu;
use App\Models\Paket;
use App\Models\Wilayah;

class PendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        $paket   = Paket::pluck('id')->toArray();
        $wilayah = Wilayah::pluck('id')->toArray();

        if (empty($paket) || empty($wilayah)) {
            $this->command->warn('Seeder dibatalkan: paket / wilayah kosong');
            return;
        }

        // ============================
        // DATA NAMA RANDOM
        // ============================
        $namaDepan = [
            'Ahmad','Muhammad','Rizky','Dedi','Bayu','Andi','Budi',
            'Agus','Fajar','Ilham','Rian','Hendra','Yoga','Rafi',
            'Siti','Aisyah','Nur','Dewi','Putri','Rina','Lestari',
            'Fitri','Intan','Nabila','Aulia'
        ];

        $namaBelakang = [
            'Santoso','Pratama','Wijaya','Saputra','Setiawan',
            'Hidayat','Maulana','Firmansyah','Ramadhan',
            'Permata','Utami','Wulandari','Rahmawati'
        ];

        $statuses = [
            'Baru',
            'Proses',
            'Disurvey',
            'Survey OK',
            'Menunggu Instalasi',
            'Terpasang',
            'Batal'
        ];

        for ($i = 1; $i <= 20; $i++) {

            $nama = 
                $namaDepan[array_rand($namaDepan)] . ' ' .
                $namaBelakang[array_rand($namaBelakang)];

            $status = $statuses[array_rand($statuses)];

            Tamu::create([
                'nama' => $nama,
                'nik'  => '32760'.rand(100000000,999999999),
                'ttl'  => '199'.rand(0,9).'-0'.rand(1,9).'-'.rand(10,28),

                'kontak' => '08'.rand(1111111111,9999999999),
                'email'  => strtolower(str_replace(' ', '', $nama)).$i.'@email.com',

                'wilayah_id' => $wilayah[array_rand($wilayah)],

                // 🔥 WAJIB ADA PAKET
                'paket_id' => $paket[array_rand($paket)],

                // FORMAT ALAMAT SESUAI HTML
                'alamat_jalan' => 'Trusmiland Klayan – Tahap '.rand(1,5),
                'no_rumah'     => 'Blok '.chr(rand(65,71)).' No.'.rand(1,30),
                'rt'           => '0'.rand(1,5),
                'rw'           => '0'.rand(1,5),
                'desa'         => 'Klayan',
                'kecamatan'    => 'Gunungjati',
                'kabupaten'    => 'Cirebon',

                'full_alamat' =>
                    'Trusmiland Klayan – Tahap '.rand(1,5).', '.
                    'Blok '.chr(rand(65,71)).' No.'.rand(1,30).', '.
                    'RT 0'.rand(1,5).' / RW 0'.rand(1,5).', '.
                    'Desa Klayan, Kec. Gunungjati, Kab. Cirebon',

                'pesan'  => 'Pendaftaran via website',
                'lokasi' => '-6.73'.rand(10,99).',108.55'.rand(10,99),

                'status' => $status,

                // sebar tanggal biar grafik hidup
                'created_at' => now()->subDays(rand(0,40)),
                'updated_at' => now(),
            ]);
        }
    }
}
