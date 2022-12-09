<?php

namespace Database\Seeders;

use App\Models\EtatExpedition;
use Illuminate\Database\Seeder;

class EtatExpeditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etats = [["etat"=>"En attente","comment"=>"En attente de postulat"], ["etat"=>"En attente de paiement","comment"=>"Postulant choisi"],["etat"=>"En attente de chargement","comment"=>"Paiement effectuée"], ["etat"=>"Chargée","comment"=>"Chargement effectuée"], ["etat"=>"En transit","comment"=>"En cours d'expédition"], ["etat"=>"Déchargée","comment"=>"Marchandise déchargée"], ["etat"=>"Terminée","comment"=>"Expédition finalisée"], ["etat"=>"Annulée","comment"=>"Expédition annulée"]];
        foreach ($etats as $etat) {
            EtatExpedition::create([
                'nom' => $etat["etat"],
                'comment' =>$etat["comment"]
            ]);
        }
    }
}
