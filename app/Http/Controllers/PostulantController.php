<?php

namespace App\Http\Controllers;

use App\Models\Expedition;
use App\Models\Postulants;
use App\Models\EtatExpedition;
use App\Models\ExpeditionsTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PostulantController extends Controller
{
    /**
     * 
     */
    public function choisirPostulant(Request $request)
    {
        $request->validate([
            'postulant_id' => ['required', 'exists:postulants,id']
        ]);
        $postulant  = Postulants::where('id', $request->postulant_id)->first();
        
        $expedition = Expedition::where('id', $postulant->expedition_id)->first();
        $expedition->etat_expedition_id = EtatExpedition::EN_ATTENTE_DE_PAIEMENT;
        $expedition->transporteur_id = $postulant->transporteur_id;
        $expedition->save();
        
        $postulant->is_choosen = 1;
        $postulant->save();

        Postulants::where([
            'expedition_id' => $expedition->id, 
            'is_choosen'    => 0
        ])->delete();

        $expedition_tracking = ExpeditionsTracking::where('expedition_id', $expedition->id)->first();
        $expedition_tracking->etat_expedition_id = EtatExpedition::EN_ATTENTE_DE_PAIEMENT;
        $expedition_tracking->date_select_postulant = now(new \DateTimeZone('UTC'));
        $expedition_tracking->save();

        return (new FactureController())->store(new Request([
            'expedition_id' => $expedition->id,
            'montant'       => $postulant->montant_propose
        ]));
    }

    /**
     * 
     */
    public function detailsPostulant($id)
    {
        $postulant = Postulants::find($id);
        $transporteur = $postulant->transporteur;
        return view('transporteur.components.modals.details-transporteur', compact('transporteur'));
        // return view('expediteur.components.modals.details-postulant', compact('postulant'));
    }

    /**
     * Remove the specified postulant from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    {
        $request->validate([
            'postulant_id' => ['required', 'exists:postulants,id']
        ]);
        $postulant = Postulants::find($request->postulant_id);
        $postulant->delete();

        return redirect()->back()->with([
            'success' => 'Votre postulat à cette expédition a été annulé avec succès !'
        ]);
    }

    /**
     * Store a newly created postulant in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'expedition_id'   => ['required', 'exists:expeditions,id'],
            'transporteur_id' => ['required', 'exists:transporteurs,id'],
            'montant_propose' => ['required', 'numeric']
        ]);
        Postulants::create([
            'transporteur_id'   => $request->transporteur_id,
            'expedition_id'     => $request->expedition_id,
            'montant_propose'   => $request->montant_propose,
            'is_choosen'        => 0
        ]);
        return redirect()->back()->with([
            'success' => 'Vous avez postulé pour cette expédition. Nous vous reviendrons bientot.'
        ]);
    }

    /**
     * 
     */
    public function update(Request $request)
    {
        $request->validate([
            'montant_postulat_update' => ['required'],
            'postulant_id'            => ['required']
        ]);
        $postulant = Postulants::find($request->postulant_id);
        $postulant->montant_propose = $request->montant_postulat_update;
        $postulant->save();
        $message = "Vous avez modifié avec succès le montant";
        $message_type = 'success';
        return redirect()->back()->with(['message' => $message, 'message_type' => $message_type]);
    }
}
