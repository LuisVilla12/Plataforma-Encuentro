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

        User::create([
            'name' => 'Luis Villa',
            'area' => 'Ciencias de la Salud',
            'institucion' => 'Universidad Nacional de Colombia',
            'email' => 'admin@gmail.com',
            'tipo' => 1,
            'password' => Hash::make('qazqazqaz9')
        ]);
        //Revisor
        User::create([
            'name' => 'Jonathan Tavira',
            'area' => 'Mecatronica',
            'institucion' => 'cenidet',
            'email' => 'tavira@gmail.com',
            'tipo' => 2,
            'password' => Hash::make('qazqazqaz9')
        ]);
        //Revisor
        User::create([
            'name' => 'Miguel Angel Hidalgo',
            'area' => 'Mineria de datos',
            'institucion' => 'Inecol',
            'email' => 'hidalgo@gmail.com',
            'tipo' => 2,
            'password' => Hash::make('qazqazqaz9')
        ]);
        User::create([
            'name' => 'Jorge Fuentes',
            'area' => 'Inteligencia Artificial',
            'institucion' => 'CENIDEt',
            'email' => 'jorge@gmail.com',
            'tipo' => 2,
            'password' => Hash::make('qazqazqaz9')
        ]);
    }
}
