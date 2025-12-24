<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Seeder
{
    public function run()
    {
        User::create([
            'name'     => 'Administrator Gintara',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), 
            'role'     => 'admin',
        ]);

        User::create([
            'name'     => 'Budi Santoso',
            'email' => 'teknisi@gmail.com',
            'password' => Hash::make('teknisi123'), 
            'role'     => 'teknisi',
        ]);
    }
}