<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Commune;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commune::truncate();

        $csvFile = fopen(base_path("database/csv_files/communes.csv"), "r");

        while (false !== ($data = fgetcsv($csvFile, 2000, ","))) {
            Commune::create([
                "nom"               => Str::ucfirst(Str::lower($data['0'])),
                "region_id"         => $data['3'],
                "departement_id"    => $data['2'],
                "arrondissement_id" => $data['1']
            ]);
        }
        fclose($csvFile);
    }
}
