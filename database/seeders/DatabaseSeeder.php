<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(VariosSeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@canal.com',
            'password' => bcrypt('12345678'),
            'status' => true
        ])->assignRole('Admin');
    }
}
