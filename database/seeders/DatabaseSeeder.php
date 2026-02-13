<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
 User::create([
            'name' => 'Luis Villa',
            'area' => 'Ciencias de la Salud',
            'institucion' => 'Universidad Nacional de Colombia',
            'email' => 'admin@gmail.com',
            'tipo' => 1,
            'password' => Hash::make('qazqazqaz9')
        ]);
        // UserSeeder::class;
    }
}
