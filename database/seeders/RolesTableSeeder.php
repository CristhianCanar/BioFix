<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role = new Rol();
        $role->rol         = 'Admin';
        $role->description = 'Se encarga de la administracion de la plataforma, implicando modificaciones y configuraciones en el sistema';
        $role->save();

        $role = new Rol();
        $role->rol         = 'Biomedico';
        $role->description = '';
        $role->save();

        $role = new Rol();
        $role->rol         = 'Interventor';
        $role->description = '';
        $role->save();

        $role = new Rol();
        $role->rol         = 'Verificadora';
        $role->description = '';
        $role->save();
    }
}
