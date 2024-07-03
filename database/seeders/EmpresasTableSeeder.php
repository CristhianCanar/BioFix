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
        $empresa->razon_social    = 'Prueba 1';
        $empresa->numero_contrato = 'Prueba';
        $empresa->direccion       = 'Prueba';
        $empresa->telefono        = '3121234567';
        $empresa->save();
        $empresa = new Empresa();
        $empresa->municipio_id    = 703;
        $empresa->nit             = '1234567-9';
        $empresa->razon_social    = 'Prueba 2';
        $empresa->numero_contrato = 'Prueba';
        $empresa->direccion       = 'Prueba';
        $empresa->telefono        = '3121234567';
        $empresa->save();
        $empresa = new Empresa();
        $empresa->municipio_id    = 703;
        $empresa->nit             = '1234567-9';
        $empresa->razon_social    = 'Prueba 3';
        $empresa->numero_contrato = 'Prueba';
        $empresa->direccion       = 'Prueba';
        $empresa->telefono        = '3121234567';
        $empresa->save();
    }
}
