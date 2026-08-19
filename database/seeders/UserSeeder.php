<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Usuario Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@votacion.com',
            'password' => Hash::make('password'),
            'rol' => 'ADMIN'
        ]);

        // Usuario Editor/Carga
        User::create([
            'name' => 'Editor Carga',
            'email' => 'carga@votacion.com',
            'password' => Hash::make('password'),
            'rol' => 'CARGA'
        ]);

        // Usuarios Jurados
        User::create([
            'name' => 'Jurado 1',
            'email' => 'jurado1@votacion.com',
            'password' => Hash::make('password'),
            'rol' => 'JURADO'
        ]);

        User::create([
            'name' => 'Jurado 2',
            'email' => 'jurado2@votacion.com',
            'password' => Hash::make('password'),
            'rol' => 'JURADO'
        ]);

        User::create([
            'name' => 'Jurado 3',
            'email' => 'jurado3@votacion.com',
            'password' => Hash::make('password'),
            'rol' => 'JURADO'
        ]);

        $this->command->info('Usuarios de prueba creados exitosamente!');
        $this->command->info('Admin: admin@votacion.com / password');
        $this->command->info('Carga: carga@votacion.com / password');
        $this->command->info('Jurados: jurado1@votacion.com, jurado2@votacion.com, etc. / password');
    }
}