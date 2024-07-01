<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa = new Empresa();
        $empresa->municipio_id    = 703;
        $empresa->nit             = '1234567-9';
        $empresa->razon_social    = 'Prueba';
        $empresa->numero_contrato = 'Prueba';
        $empresa->direccion       = 'Prueba';
        $empresa->telefono        = '3121234567';
        $empresa->save();
    }
}
