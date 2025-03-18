<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ShieldSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'Shop Owner',
            'email' => 'shopowner@gmail.com',
            'password' => Hash::make('shopowner123'),
        ]);

        $this->call(ShieldSeeder::class);
    }
}
