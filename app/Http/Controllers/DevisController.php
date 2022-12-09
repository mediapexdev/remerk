<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Departement;
use App\Models\Devis;
use App\Models\Expediteur;
use App\Models\Expedition;
use App\Models\ExpeditionsArrivee;
use App\Models\ExpeditionsDepart;
use App\Models\ExpeditionsMatiere;
use App\Models\Matiere;
use App\Models\PoidsMatiere;
use App\Models\Region;
use App\Models\Transporteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevisController extends Controller
{
    public function details($id_expedition)
    {
        $expedition             = Expedition::where('id', $id_expedition)->first();
        $devis                  = Devis::where('expedition_id',$expedition->id)->first();
        $transporteur           = User::find(Transporteur::find($expedition->transporteur_id)->user_id);
        /* details itinairaire depart */
        $expedition_depart      = ExpeditionsDepart::where('expedition_id', $expedition->id)->first();
        $region_depart          = Region::where('id', $expedition_depart->region_id)->first();
        $departement_depart     = Departement::where('region_id', $region_depart->id)->first();
        $commune_depart         = Commune::where('id', $expedition_depart->commune_id)->first();
        $adresse_reelle_depart  = ExpeditionsDepart::where(ExpeditionsDepart::where('id', $expedition)->first())->first()->adresse_reelle;
        /* details itinairaire arrivée */
        $expedition_arrivee     = ExpeditionsArrivee::where('expedition_id', $expedition->id)->first();
        $region_arrivee         = Region::where('id', $expedition_arrivee->region_id)->first();
        $departement_arrivee    = Departement::where('region_id', $region_arrivee->id)->first();
        $commune_arrivee        = Commune::where('id', $expedition_arrivee->commune_id)->first();
        $adresse_reelle_arrivee = ExpeditionsArrivee::where(ExpeditionsArrivee::where('id', $expedition)->first())->first()->adresse_reelle;
        /* details marchandise */
        $expedition_matiere     = ExpeditionsMatiere::where('expedition_id', $expedition->id)->first();
        $type_matiere           = Matiere::find($expedition_matiere->id)->type;
        $poids_matiere          = PoidsMatiere::find($expedition_matiere->poids_matiere_id)->poids;
        /* details vehicule */
        $nbre_camion            = $expedition_matiere->nombre_vehicules;
        /* details montant */
        $montant_devis          = $devis->montant_propose;
        return
        view('facturation.components.modals.details', 
        compact(
            'expedition',
            'devis',
            'transporteur',
            'region_depart',
            'departement_depart',
            'commune_depart',
            'adresse_reelle_depart',
            'expedition_arrivee',
            'region_arrivee',
            'departement_arrivee',
            'commune_arrivee',
            'adresse_reelle_arrivee',
            'expedition_matiere',
            'type_matiere',
            'poids_matiere',
            'nbre_camion',
            'montant_devis'
        ));
    }
}