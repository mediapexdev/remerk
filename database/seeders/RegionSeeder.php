<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::truncate();

        $csvFile = fopen(base_path("database/csv_files/regions.csv"), "r");

        while (false !== ($data = fgetcsv($csvFile, 2000, ","))) {
            Region::create([
                "nom" => Str::ucfirst(Str::lower($data['0']))
            ]);
        }
        fclose($csvFile);
    }
}
