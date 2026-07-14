<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Diva Nadya Putri',
            'email' => 'divanadyaputri19@gmail.com',
            'password' => Hash::make('11223344'),
        ]);
    }
}
