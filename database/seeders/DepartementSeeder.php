<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Departement;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departement::truncate();

        $csvFile = fopen(base_path("database/csv_files/departements.csv"), "r");

        while (false !== ($data = fgetcsv($csvFile, 2000, ","))) {
            Departement::create([
                "nom"       => Str::ucfirst(Str::lower($data['0'])),
                "region_id" => $data['1']
            ]);
        }
        fclose($csvFile);
    }
}
