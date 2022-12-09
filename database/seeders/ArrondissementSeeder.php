<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Arrondissement;

class ArrondissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Arrondissement::truncate();

        $csvFile = fopen(base_path("database/csv_files/arrondissements.csv"), "r");

        while (false !== ($data = fgetcsv($csvFile, 2000, ","))) {
            Arrondissement::create([
                "nom"               => Str::ucfirst(Str::lower($data['0'])),
                "region_id"         => $data['2'],
                "departement_id"    => $data['1']
            ]);
        }
        fclose($csvFile);
    }
}
