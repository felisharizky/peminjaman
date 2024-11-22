<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'first_name' => 'Melisa',
            'last_name' => 'Roblox',
            'kelas' => 'admin_pc',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admincakep'), // Ganti dengan password yang lebih aman
            'role' => 'admin',
        ]);
    }
}
