<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role = new Rol();
        $role->name = 'Super administrador';
        $role->guard_name = 'web';
        $role->save();

        $role = new Rol();
        $role->name = 'Biomedico';
        $role->guard_name = 'web';
        $role->save();

        $role = new Rol();
        $role->name = 'Interventor';
        $role->guard_name = 'web';
        $role->save();

        $role = new Rol();
        $role->name = 'Verificadora';
        $role->guard_name = 'web';
        $role->save();
    }
}
