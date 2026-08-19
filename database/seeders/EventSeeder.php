<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'name' => 'Elección Reina 2025',
            'status' => 'activo',
            'created_by' => 1 // ID del usuario administrador
        ]);

        Event::create([
            'name' => 'Festival de la Primavera',
            'status' => 'activo',
            'created_by' => 1
        ]);

        Event::create([
            'name' => 'Carnaval Estudiantil',
            'status' => 'inactivo',
            'created_by' => 2 // ID del usuario carga
        ]);

        $this->command->info('Eventos de prueba creados exitosamente!');
    }
}