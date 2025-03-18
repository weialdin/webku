<?php

namespace Database\Seeders;

use App\Models\User; // Ganti dengan path model User Anda
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Aldin', // Ganti dengan nama yang diinginkan
            'email' => 'aldin.jobs@gmail.com', // Ganti dengan email admin
            'password' => Hash::make('Akupastikaya07'), // Ganti dengan password yang diinginkan
        ]);

        // Atau jika ingin membuat lebih dari satu user:
        // User::factory(10)->create(); // Membuat 10 user acak
    }
}