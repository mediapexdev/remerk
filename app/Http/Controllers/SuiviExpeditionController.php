<?php

namespace App\Http\Controllers;

use App\Models\EtatExpedition;
use App\Models\Expedition;
use App\Models\SuiviExpedition;
use Illuminate\Http\Request;

class SuiviExpeditionController extends Controller
{
    public function update_suivi(Request $request)
    {
        $expedition = Expedition::find($request->id_expedition);
        $expedition->etat_expedition_id = $request->etape;
        $expedition->save();
        SuiviExpedition::create(
            [
                'expedition_id'   => $request->id_expedition,
                'etat_expedition_id' => $request->etape,
                'date_modification' => now()
            ]
        );
        $suivi_charge = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::CHARGE]])->first();
        $suivi_transit = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::EN_TRANSIT]])->first();
        $suivi_decharge = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::DECHARGE]])->first();
        $suivi_termine = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::TERMINEE]])->first();
        $html = view('transporteur.components.expeditionDetail.steps', compact('suivi_charge', 'suivi_transit', 'suivi_decharge', 'suivi_termine', 'expedition'))->render();
        return response()->json([
            'success' => 'true',
            'message' => 'Progression enrégistrée',
            'result' => compact('html')
        ]);
    }

    public function finaliser_expedition(Request $request)
    {
        $expedition = Expedition::find($request->id_expedition);
        if ($expedition->code == $request->code) {
            $expedition->etat_expedition_id = EtatExpedition::TERMINEE;
            $expedition->save();
            SuiviExpedition::create([
                'expedition_id'   => $request->id_expedition,
                'etat_expedition_id' => EtatExpedition::TERMINEE,
                'date_modification' => now()
            ]);
            $suivi_charge = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::CHARGE]])->first();
            $suivi_transit = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::EN_TRANSIT]])->first();
            $suivi_decharge = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::DECHARGE]])->first();
            $suivi_termine = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::TERMINEE]])->first();
            $html = view('transporteur.components.expeditionDetail.steps', compact('suivi_charge', 'suivi_transit', 'suivi_decharge', 'suivi_termine', 'expedition'))->render();
            return response()->json([
                'success' => 'true',
                'message' => 'Expédition terminée',
                'result' => compact('html')
            ]);
        }

        return response()->json([
            'success' => 'false',
            'message' => 'Progression non enrégistrée. code invalide'
        ]);
    }
    // public function updateData($id_expedition)
    // {
    //     $expedition = Expedition::find($id_expedition);
    //     $suivi_charge = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::CHARGE]])->first();
    //     $suivi_transit = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::EN_TRANSIT]])->first();
    //     $suivi_decharge = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::DECHARGE]])->first();
    //     $suivi_termine = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::TERMINEE]])->first();
    //     $html = view('transporteur.components.expeditionDetail.suivi', compact('suivi_charge', 'suivi_transit', 'suivi_decharge', 'suivi_termine', 'expedition'))->render();

    //     return response()->json(compact('html'));
    // }
}
