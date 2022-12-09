<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypesVehicule;

class TypesVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypesVehicule::truncate();

        $csvFile = fopen(base_path("database/csv_files/types_vehicule.csv"), "r");

        while (false !== ($data = fgetcsv($csvFile, 2000, ";"))) {
            TypesVehicule::create([
                "nom"   => $data['0']
            ]);
        }
        fclose($csvFile);
    }
}
