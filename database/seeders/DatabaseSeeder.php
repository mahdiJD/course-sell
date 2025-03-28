<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(20)->create();

        User::factory()->create([
            'name' => 'Mahdi',
            'email' => 'admin@gmail.com',
            'role' => Role::Root->value,
        ]);
    }
}
