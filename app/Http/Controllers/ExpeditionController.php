<?php

namespace App\Http\Controllers;

use App\Models\EtatExpedition;
use App\Models\Expediteur;
use App\Models\Expedition;
use App\Models\ExpeditionsArrivee;
use App\Models\ExpeditionsDepart;
use App\Models\ExpeditionsMatiere;
use App\Models\ExpeditionsTracking;
use Illuminate\Http\Request;
use App\Models\Devis;
use App\Models\Region;
use App\Models\Commune;
use App\Models\Matiere;
use App\Models\PoidsMatiere;
use App\Models\Postulants;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExpeditionController extends Controller
{
    /**
     * Get communes by region.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    function getCommunes(Request $request)
    {
        $request->validate([
            'region_id'        => ['required', 'exists:regions,id']
        ]);
        $region_id = $request['region_id'];
        $communes = Region::find($region_id)->communes;
        return view('expediteur.components.modals.create-expedition', compact('communes'));
    }

    /**
     * Get types of truck by material.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    function getTypesCamion(Request $request)
    {
        $request->validate([
            'matiere_id'        => ['required', 'exists:matieres,id'],
            'poids_matiere_id'  => ['required', 'exists:poids_matieres,id']
        ]);
        $matiere_id = $request['matiere_id'];
        $poids_matiere_id = $request['poids_matiere_id'];

        $types_camion_of_matiere = Matiere::find($matiere_id)->typesVehicule();
        $types_camion_of_poids_matiere = PoidsMatiere::find($poids_matiere_id)->typesVehicule();
        $types_vehicule = $types_camion_of_matiere->intersect($types_camion_of_poids_matiere);

        return view('expediteur.components.modals.create-expedition', compact('types_vehicule'));
    }

    /**
     * Store a newly created expedition in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $date_start = new \DateTime("yesterday", new \DateTimeZone('UTC'));
        $date_end = (new \DateTime('now', new \DateTimeZone('UTC')))->add(new \DateInterval('P1M1D'));

        $request->validate([
            'expediteur_id'     => ['required', 'exists:expediteurs,id'],
            'region_depart'     => ['required', 'exists:regions,id'],
            'commune_depart'    => ['required', 'exists:communes,id'],
            'adresse_depart'    => ['required', 'string', 'max:255'],
            'date_depart'       => [
                'required', 'date', 'date_format:Y-m-d',
                ('after:' . $date_start->format('Y-m-d')),
                ('before:' . $date_end->format('Y-m-d'))
            ],
            'matiere'           => ['required', 'exists:matieres,id'],
            'poids_matiere'     => ['required', 'exists:poids_matieres,id'],
            'type_vehicule'     => ['required', 'exists:types_vehicules,id'],
            'nombre_vehicules'  => ['required', 'integer', 'between:1,10'],

            'region_arrivee'    => ['required', 'exists:regions,id'],
            'commune_arrivee'   => ['required', 'exists:communes,id'],
            'adresse_arrivee'   => ['required', 'string', 'max:255']
        ]);
        $expedition = Expedition::create([
            'expediteur_id'         => $request->expediteur_id,
            'etat_expedition_id'    => EtatExpedition::EN_ATTENTE,
        ]);

        $code = $this->generateCode($expedition->id);
        $expedition->string_id = $code;
        $expedition->save();

        try {
            ExpeditionsDepart::create([
                'expedition_id'             => $expedition->id,
                'region_id'                 => $request->region_depart,
                'departement_id'            => Commune::find($request->commune_depart)->departement->id,
                'commune_id'                => $request->commune_depart,
                'adresse_reelle'            => $request->adresse_depart,
                'date_depart'               => $request->date_depart,
                'nom_contact_sur_place'     => $request->nom_contact_depart,
                'phone_contact_sur_place'   => $request->phone_contact_depart,
            ]);
        }
        catch(\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        ExpeditionsMatiere::create([
            'expedition_id'     => $expedition->id,
            'matiere_id'        => $request->matiere,
            'poids_matiere_id'  => $request->poids_matiere,
            'types_vehicule_id' => $request->type_vehicule,
            'nombre_vehicules'  => $request->nombre_vehicules,
        ]);
        try {
            ExpeditionsArrivee::create([
                'expedition_id'             => $expedition->id,
                'region_id'                 => $request->region_arrivee,
                'departement_id'            => Commune::find($request->commune_arrivee)->departement->id,
                'commune_id'                => $request->commune_arrivee,
                'adresse_reelle'            => $request->adresse_arrivee,
                'nom_contact_sur_place'     => $request->nom_contact_arrivee,
                'phone_contact_sur_place'   => $request->phone_contact_arrivee
            ]);
        }
        catch(\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        ExpeditionsTracking::create([
            'expedition_id'         => $expedition->id,
            'etat_expedition_id'    => EtatExpedition::EN_ATTENTE
        ]);
        $notif=$this->sendNotification();
        return redirect()->back()->with([
            'success' => "L'expédition a été ajoutée avec succès !",
            'expedition-acknowledgment-of-receipt' => true
        ]);
    }

    /**
     * Update the specified expedition in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expedition  $expedition
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Expedition $expedition)
    {
        // return redirect()->back()->with('message', "Les données de l'expédition ont été mises à jour avec succes.");
        return redirect()->back();
    }

    /**
     * Remove the specified expedition from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    {
        $request->validate([
            'expedition_id' => ['required', 'exists:expeditions,id']
        ]);
        $expedition = Expedition::find($request->expedition_id);

        try{
            return $this->destroy($expedition);

            // Envoyer une notification au postulants

            Postulants::where('expedition_id', $expedition->id)->delete();
        }
        catch(\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified expedition from storage.
     *
     * @param  \App\Models\Expedition  $expedition
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy(Expedition $expedition)
    {
        ExpeditionsDepart::where('expedition_id', $expedition->id)->delete();
        ExpeditionsArrivee::where('expedition_id', $expedition->id)->delete();
        ExpeditionsMatiere::where('expedition_id', $expedition->id)->delete();
        $expedition->delete();

        return redirect()->back()->with('success', "L'expédition a été supprimé avec succès.");
    }

    /**
     * Generate a code for the specified expedition and returns it.
     *
     * @param  integer  $id     the ID of the specified expedition
     *
     * @return string
     */
    public function generateCode($id) : string
    {
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $comb2 = [];
        $alphaLen = strlen($alpha) - 1;
        $comb1 = [];

        for ($i = 0; $i < 3; $i++) {
            $comb1[] = \rand(0, 9);
        }
        for ($i = 0; $i < 3; $i++) {
            $n = \rand(0, $alphaLen);
            $comb2[] = $alpha[$n];
        }
        $code = 'RK-'.implode($comb1).implode($comb2).'-'.$id;
        return $code;
    }
    function sendNotification(){

        $firebaseToken = User::whereNotNull('fcm_token')->where('role_id',3)->pluck('fcm_token')->all();
        $SERVER_API_KEY = 'AAAAbQlH7Qw:APA91bEx9nC01HGG8Ao-tQ8ZYKExsRYxXE34nKHGI9b9oWEQWqQYAh3H1WaRW0-yD_QlMfs4UTqvoN1HxXXz1bsncnNhpIrtcHQ9rknkJTey0sE6a3dKbYxwiiaPDSRrd4AMLjOa1I3W';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'expédition en cours',
                "body" => 'Une nouvelle expédition en cours. Veuillez vérifier',
                // "icon" => "images/Fitting_piece.gif"
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        return $response;
    }
    public function lastFive(){
        $expeditions=Expedition::get();
        return $expeditions;
    }
}
