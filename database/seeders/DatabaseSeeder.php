<?php

namespace Database\Seeders;

use App\Models\FormularioCursos;
use App\Models\Instituto;
use App\Models\User;
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
        Instituto::create([
            'nombre' => 'Asociación Cool Planet'
        ]);
        Instituto::create([
            'nombre' => 'Colegio de Postgraduados'
        ]);
        Instituto::create([
            'nombre' => 'Instituto Tecnológico de Boca del Río'
        ]);
        Instituto::create([
            'nombre' => 'Instituto Tecnológico de Cerro Azul'
        ]);
        Instituto::create([
            'nombre' => 'Instituto Tecnológico de Huejutla '
        ]);
        Instituto::create([
            'nombre' => 'Instituto Tecnológico Superior de Misantla'
        ]);
        Instituto::create([
            'nombre' => 'Instituto Tecnológico de Tuxtepec'
        ]);
Instituto::create([
            'nombre' => 'Instituto Tecnológico de Úrsulo Galván'
        ]);
        Instituto::create([
            'nombre' => 'Instituto Tecnológico de Veracruz'
        ]);
         Instituto::create([
            'nombre' => 'Instituto Tecnológico Superior de Perote'
        ]);
            Instituto::create([
                'nombre' => 'Instituto Tecnológico Superior de Xalapa'
            ]);
        Instituto::create([
            'nombre' => 'Universidad del Caribe '
        ]);
        Instituto::create([
            'nombre' => 'Universidad Politécnica de Huatusco'
        ]);
        Instituto::create([
            'nombre' => 'Universidad Veracruzana'
        ]);
        Instituto::create([
            'nombre' => 'Legión de Paz, Medio Ambiente y Justicia Social A.C.'
        ]);
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
        // Registro de cursos
        // FormularioCursos::create([
        //     'nombre' => 'Alberto Villa',
        //     'institucion' => 'Instituto Tecnológico de Veracruz',
        //     'correo' => 'luis@gmail.com',
        //     'curso' => 1,
        // ]);
    }
}
