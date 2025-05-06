<?php

namespace Database\Seeders;

use App\Models\Type;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Type::insert([
            'name' => 'Test Categoria 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Type::insert([
            'name' => 'Test Categoria 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
