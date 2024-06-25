<?php

namespace Database\Seeders;

use App\Models\Mantenimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MantenimientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mantenimiento = new Mantenimiento();
        $mantenimiento->nombre = 'mantenimiento de prueba';
        $mantenimiento->save();
    }
}
