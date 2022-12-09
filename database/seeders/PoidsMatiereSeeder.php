<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PoidsMatiere;

class PoidsMatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PoidsMatiere::truncate();

        $csvFile = fopen(base_path("database/csv_files/poids_matieres.csv"), "r");

        while (false !== ($data = fgetcsv($csvFile, 2000, ";"))) {
            PoidsMatiere::create([
                "poids"             => $data['0'],
                "types_vehicule_ids"  => ('[' . $data['1'] . ']')
            ]);
        }
        fclose($csvFile);
    }
}
