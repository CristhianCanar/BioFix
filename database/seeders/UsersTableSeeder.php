<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->identificacion   = '0123456789';
        $user->nombre           = 'Admin';
        $user->apellido         = 'Admin';
        $user->email            = 'admin@gmail.com';
        $user->password         = Hash::make('biofix2024');
        $user->empresa_id       = 1;
        $user->save();

        $user = new User();
        $user->empresa_id       = 1;
        $user->nombre           = 'Empresa';
        $user->apellido         = 'Prueba';
        $user->email            = 'empresa@gmail.com';
        $user->password         = Hash::make('biofix2024');
        $user->save();
    }
}
