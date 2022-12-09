<?php

namespace Database\Seeders;

use App\Models\Camion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CamionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camions = [
            [
                "immatriculation" =>'AA-2154-AS',
                "types_vehicule_id"    => 1,
                "marque_camion_id"  => 2,
                "poids_a_vide"   => 1000,
                "capacite"  => 3000,
                'modele'=> '',
                "date_mis_en_circulation"=>Carbon::createFromFormat('d-m-Y','21-02-2014'),
                "transporteur_id"=>1,
            ],
            [
                "immatriculation" =>'BJ-2154-AG',
                "types_vehicule_id"    => 3,
                "marque_camion_id"  => 3,
                "poids_a_vide"   => 2000,
                "capacite"  => 4000,
                'modele'=> '',
                "date_mis_en_circulation"=>Carbon::createFromFormat('d-m-Y','21-02-2015'),
                "transporteur_id"=>2,
            ],
            [
                "immatriculation" =>'DK-296-AG',
                "types_vehicule_id"    => 3,
                "marque_camion_id"  => 2,
                "poids_a_vide"   => 1200,
                "capacite"  => 2000,
                'modele'=> '',
                "date_mis_en_circulation"=>Carbon::createFromFormat('d-m-Y','15-10-2014'),
                "transporteur_id"=>1,
            ],
            [
                "immatriculation" =>'AA-296-AS',
                "types_vehicule_id"    => 4,
                "marque_camion_id"  => 1,
                "poids_a_vide"   => 1500,
                "capacite"  => 2500,
                'modele'=> '',
                "date_mis_en_circulation"=>Carbon::createFromFormat('d-m-Y','15-10-2010'),
                "transporteur_id"=>1,
            ],
            [
                "immatriculation" =>'AA-345-AG',
                "types_vehicule_id"    => 2,
                "marque_camion_id"  => 3,
                "poids_a_vide"   => 1000,
                "capacite"  => 2000,
                'modele'=> '',
                "date_mis_en_circulation"=>Carbon::createFromFormat('d-m-Y','15-10-2008'),
                "transporteur_id"=>2,
            ],
            [
                "immatriculation" =>'AA-128-AG',
                "types_vehicule_id"    => 4,
                "marque_camion_id"  => 4,
                "poids_a_vide"   => 2500,
                "capacite"  => 10000,
                'modele'=> '',
                "date_mis_en_circulation"=>Carbon::createFromFormat('d-m-Y','15-09-2011'),
                "transporteur_id"=>1,
            ],
            [
                "immatriculation" =>'DK-1234-AS',
                "types_vehicule_id"    => 1,
                "marque_camion_id"  => 2,
                "poids_a_vide"   => 2000,
                'modele'=> '',
                "capacite"  => 5000,
                "date_mis_en_circulation"=>Carbon::createFromFormat('d-m-Y','15-10-2009'),
                "transporteur_id"=>2,
            ]
        ];
        foreach ($camions as $camion) {
            Camion::create($camion);
        }
    }
}
