<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MarqueCamion;
use Illuminate\Database\Seeder;
use Database\Seeders\MessageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'phone' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(RegionSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(ArrondissementSeeder::class);
        $this->call(CommuneSeeder::class);

        $this->call(EtatExpeditionSeeder::class);

        $this->call(MatiereSeeder::class);
        $this->call(PoidsMatiereSeeder::class);
        $this->call(TypesVehiculeSeeder::class);
        $this->call(CamionSeeder::class);
        $this->call(MessageSeeder::class);

        $marques = ["Mercedes", "Renault", "Man", "Iveco", "Volvo", "Scania", "Daf", "Ford"];
        foreach ($marques as $marque) {
            MarqueCamion::create([
                'nom' => $marque
            ]);
        }
    }
}
