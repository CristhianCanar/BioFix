<?php

namespace Database\Seeders;

use App\Models\ResponsableEquipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponsablesEquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responsable_equipo = new ResponsableEquipo();
        $responsable_equipo->empresa_id = 1;
        $responsable_equipo->nombre = 'Responsable de';
        $responsable_equipo->apellido = 'Prueba';
        $responsable_equipo->telefono = '3121234546';
        $responsable_equipo->save();
    }
}
