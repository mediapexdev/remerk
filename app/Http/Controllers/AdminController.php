<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Expedition;
use App\Models\Postulants;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function detailExpedition($id)
    {
        $expedition = Expedition::find($id);
        return view('admin.components.expeditions.infos.details',compact('expedition'));
    }

    public function listeExpedition()
    {
        return view('admin.components.expeditions.liste_expeditions');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'expedition_id' => ['required', 'exists:expeditions,id']
        ]);
        $expedition = Expedition::find($request->expedition_id);

        try{
            $this->destroy($expedition);
            Postulants::where('expedition_id', $expedition->id)->delete();
            return redirect()->back();
        }
        catch(\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function choisirTransporteur(Request $request){
        $expedition=Expedition::find($request->expedition_id);
        $expedition->transporteur_id=$request->transporteur_id;
        $expedition->etat_expedition_id=2;
        $expedition->save();
        Devis::create([
            'expedition_id'     => $request->expedition_id,
            'montant_propose'   => $request->montant_propose
        ]);
        $message="Vous venez d'attribuer avec succès une expédition à ce transporteur";
        $message_type = 'success';
        return redirect()->back()->with([$message_type => $message]);
    }
}
