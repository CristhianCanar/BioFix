<?php

namespace Database\Seeders;

use App\Models\ResponsableMantenimiento;
use Illuminate\Database\Seeder;

class ResponsablesMantenimientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responsable_equipo = new ResponsableMantenimiento();
        $responsable_equipo->identificacion = '0123456789';
        $responsable_equipo->nombre = 'Responsable Mantenimiento';
        $responsable_equipo->apellido = 'Prueba';
        $responsable_equipo->telefono = '3121234546';
        $responsable_equipo->cargo = 'Mantenimiento';
        $responsable_equipo->save();
    }
}
