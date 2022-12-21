<?php

namespace App\Http\Controllers;

use App\Models\Expedition;
use App\Models\EtatExpedition;
use App\Models\ExpeditionsTracking;
use Illuminate\Http\Request;


class ExpeditionsTrackingController extends Controller
{
    /**
     * 
     */
    public function finalize(Request $request)
    {
        $request->validate([
            'expedition_id'     => ['required', 'exists:expeditions,id'],
            // 'code_confirmation' => ['required', 'exists:expeditions,code'],
            'code_confirmation' => ['required']
        ]);
        $expedition = Expedition::find($request->expedition_id);

        if (0 == \strcmp($expedition->code, $request->code_confirmation)) {
            $expedition->etat_expedition_id = EtatExpedition::TERMINEE;
            $expedition->save();

            $expedition_tracking = ExpeditionsTracking::where('expedition_id', $expedition->id)->first();
            $expedition_tracking->etat_expedition_id = EtatExpedition::TERMINEE;
            $expedition_tracking->date_livraison = now(new \DateTimeZone('UTC'));
            $expedition_tracking->save();

            $html = view('transporteur.components.expeditions.tracking.steps.index', compact('expedition', 'expedition_tracking'))->render();
            return response()->json([
                'success'   => 'true',
                'message'   => 'Expédition achevée',
                'result'    => compact('html')
            ]);
        }
        return response()->json([
            'success' => 'false',
            'message' => 'Progression non enrégistrée. Code invalide !'
        ]);
    }

    /**
     * Store a newly created expedition tracking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'expedition_id'         => ['required', 'exists:expeditions,id']
        ]);
        $expedition_tracking = ExpeditionsTracking::create([
            'expedition_id'         => $request->expedition_id,
            'etat_expedition_id'    => EtatExpedition::EN_ATTENTE
        ]);
        $html = view('transporteur.components.expeditions.tracking.steps.index', compact('expedition_tracking'))->render();
        return response()->json([
            'success' => 'true',
            'message' => 'Suivi créée',
            'result' => compact('html')
        ]);
    }
 
    /**
     * Update the specified expedition tracking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'expedition_id'         => ['required', 'exists:expeditions,id'],
            'etat_expedition_id'    => ['required', 'exists:etat_expeditions,id']
        ]);
        $expedition = Expedition::find($request->expedition_id);
        $expedition->etat_expedition_id = $request->etat_expedition_id;
        $expedition->save();
        
        $expedition_tracking = ExpeditionsTracking::where('expedition_id', $request->expedition_id)->first();
        $expedition_tracking->etat_expedition_id = $request->etat_expedition_id;

        switch($request->etat_expedition_id){
            case EtatExpedition::EN_ATTENTE_DE_PAIEMENT:
                $expedition_tracking->date_select_postulant = now(new \DateTimeZone('UTC'));
                break;
            case EtatExpedition::EN_ATTENTE_DE_CHARGEMENT:
                $expedition_tracking->date_paiement = now(new \DateTimeZone('UTC'));
                break;
            case EtatExpedition::CHARGE:
                $expedition_tracking->date_chargement = now(new \DateTimeZone('UTC'));
                break;
            case EtatExpedition::EN_TRANSIT:
                $expedition_tracking->date_depart = now(new \DateTimeZone('UTC'));
                break;
            case EtatExpedition::EN_ATTENTE_DE_DECHARGEMENT:
                $expedition_tracking->date_arrivee = now(new \DateTimeZone('UTC'));
                break;
            case EtatExpedition::DECHARGE:
                $expedition_tracking->date_dechargement = now(new \DateTimeZone('UTC'));
                break;
            case EtatExpedition::TERMINEE:
                $expedition_tracking->date_livraison = now(new \DateTimeZone('UTC'));
                break;
                default:
                break;
        }
        $expedition_tracking->save();
        $html = view('transporteur.components.expeditions.tracking.steps.index', compact('expedition', 'expedition_tracking'))->render();
        return response()->json([
            'success'   => 'true',
            'message'   => 'Progression enrégistrée',
            'result'    => compact('html')
        ]);
    }
}
