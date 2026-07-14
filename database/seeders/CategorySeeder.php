<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $categories = ['Teknologi', 'Kuliner', 'Pendidikan', 'Kesehatan', 'Traveling'];

        foreach ($categories as $name) {
            Category::create([
                'user_id' => $user->id,
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => 'Kumpulan artikel seputar ' . strtolower($name),
            ]);
        }
    }
}
