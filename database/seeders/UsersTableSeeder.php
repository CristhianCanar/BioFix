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
        //$user->rol_id           = '1';
        //$user->identification   = '1061819001';
        //$user->username         = 'admin0000';
        $user->name             = 'Admin';
        $user->email            = 'admin@gmail.com';
        $user->password         = Hash::make('biofix2024');
        $user->save();
    }
}
