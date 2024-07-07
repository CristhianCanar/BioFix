<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')
            ->insert(
                array(
                    array('name' => 'tablero', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'mantenimiento_ver', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'mantenimiento_registrar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                    array('name' => 'responsable_mantenimiento_gestionar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'responsable_mantenimiento_ver', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'responsable_mantenimiento_registrar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'responsable_mantenimiento_editar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'responsable_mantenimiento_eliminar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                    array('name' => 'equipo_registrar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'equipo_gestionar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'equipo_ver', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'equipo_editar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'equipo_eliminar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                    array('name' => 'responsable_equipo_gestionar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'responsable_equipo_ver', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'responsable_equipo_registrar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'responsable_equipo_editar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'responsable_equipo_eliminar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                    array('name' => 'observacion_dar_baja_registrar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'observacion_dar_baja_gestionar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                    array('name' => 'dar_baja_registrar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'dar_baja_gestionar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                    array('name' => 'empresa_gestionar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'empresa_ver', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'empresa_registrar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'empresa_editar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'empresa_eliminar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                    array('name' => 'users_gestionar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'users_ver', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'users_registrar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'users_editar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'users_eliminar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                    array('name' => 'dar_baja_ver', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),
                    array('name' => 'mantenimiento_gestionar', 'guard_name' => 'web', 'created_at' => '2024-07-06 18:46:29', 'updated_at' => '2024-07-06 18:46:29'),

                )
            );
    }
}
