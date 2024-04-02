<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk admin
        User::create([
            'username' => 'admin',
            'fullname' => 'administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'admin',
            'address' => '-'
        ]);

        // Seeder untuk petugas
        User::create([
            'username' => 'petugas',
            'fullname' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'petugas',
            'address' => '-'
        ]);
    }
}
