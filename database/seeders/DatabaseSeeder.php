<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DepartamentosTableSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesHasPermissionsTableSeeder::class);

        $this->call(ResponsablesEquiposTableSeeder::class);
        $this->call(EquiposTableSeeder::class);
        $this->call(ResponsablesMantenimientosTableSeeder::class);
        //$this->call(MantenimientosTableSeeder::class);
    }
}
