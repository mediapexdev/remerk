<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matiere;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matiere::truncate();

        $csvFile = fopen(base_path("database/csv_files/matieres.csv"), "r");

        while (false !== ($data = fgetcsv($csvFile, 2000, ";"))) {
            Matiere::create([
                "type"              => $data['0'],
                "types_vehicule_ids"  => ('[' . $data['1'] . ']')
            ]);
        }
        fclose($csvFile);
    }
}
