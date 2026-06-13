<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Toko Komputer',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'address' => 'Jl. Gatot Subroto No. 7, Jakarta Selatan',
        ]);

        User::create([
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'user',
            'address' => 'Jl. Merdeka No. 10, Jakarta Timur',
        ]);
    }
}
