<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use Illuminate\Http\Request;


class CamionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type_camion'      => 'required',
            'marque_camion'    => 'required',
            'immatriculation1' => 'required',
            'immatriculation2' => 'required',
            'immatriculation3' => 'required',
            'transporteur_id'  => 'required',
            'poids_a_vide'     => 'required',
            'capacite'         => 'required',
            'modele_vehicule'  => 'required',
            'date_mise_en_circulation' => 'required'
        ]);
        $immatriculation = $request->immatriculation1 .'-'. $request->immatriculation2 .'-'.$request->immatriculation3;
        Camion::create(
            [
                'marque_camion_id'  => $request->marque_camion,
                'types_vehicule_id' => $request->type_camion,
                'modele'            => $request->modele_vehicule,
                'immatriculation'   => $immatriculation,
                'transporteur_id'   => $request->transporteur_id,
                'poids_a_vide'      => $request->poids_a_vide,
                'capacite'          => $request->capacite,
                'date_mis_en_circulation' => $request->date_mise_en_circulation
            ]
        );
        $message      = "Véhicule ajouté avec succès";
        $message_type = 'success';
        return redirect()->back()->with(['message' => $message, 'message_type' => $message_type]);
    }

    public function update(Request $request)
    {
        $immatriculation = $request->immatriculation1 .'-'. $request->immatriculation2 .'-'.$request->immatriculation3;
        Camion::find($request->camion_id)->update(
            [
                'marque_camion_id'  => $request->marque_camion,
                'types_vehicule_id' => $request->type_camion,
                'modele'            => $request->modele_vehicule,
                'immatriculation'   => $immatriculation,
                'camion_id'         => $request->transporteur_id,
                'poids_a_vide'      => $request->poids_a_vide,
                'capacite'          => $request->capacite,
                'date_mis_en_circulation' => $request->date_mise_en_circulation
            ]
        );
        $message = "Véhicule modifié avec succès";
        $message_type = 'success';
        return redirect()->back()->with(['message' => $message, 'message_type' => $message_type]);
    }

    public function delete(Request $request){
        Camion::find($request->id_camion)->delete();
        $message      = "Véhicule supprimé avec succès";
        $message_type = 'success';
        return redirect()->back()->with(['message' => $message, 'message_type' => $message_type]);
    }
    public function getCamion($id){
        $camion = Camion::find($id);
        return $camion;
    }
}
