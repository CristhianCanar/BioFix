<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/departaments.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Departamento::create([
                    "id_departamento" => "$data[0]",
                    "nombre" => "$data[1]"
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
