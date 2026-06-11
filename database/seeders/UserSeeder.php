<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Rakhadzaky Firdaus',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('budi123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Siti Rahayu',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('siti123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Ahmad Fauzi',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('ahmad123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Dewi Lestari',
            'email' => 'dewi@gmail.com',
            'password' => Hash::make('dewi123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Riko Pratama',
            'email' => 'riko@gmail.com',
            'password' => Hash::make('riko123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Radit',
            'email' => 'radit123@gmail.com',
            'password' => Hash::make('radit123'),
            'role' => 'user',
        ]);
    }
}