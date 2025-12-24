<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Teknisi; // Pastikan Model Teknisi di-import
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUser extends Seeder
{
    public function run()
    {
        User::create([
            'name'     => 'Administrator Gintara',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123'), 
            'role'     => 'admin',
        ]);

        $userTeknisi = User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'teknisi@gmail.com',
            'password' => Hash::make('teknisi123'), 
            'role'     => 'teknisi',
        ]);

        DB::table('teknisi')->insert([
            'user_id'    => $userTeknisi->id, 
            'nama'       => 'Budi Santoso',
            'no_hp'      => '08123456789',
            'wilayah_id' => 1, 
            'status'     => 'Aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}