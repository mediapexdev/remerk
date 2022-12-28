<?php

namespace App\Http\Controllers;

use App\Core\PayTech;
use App\Models\EtatExpedition;
use App\Models\Expediteur;
use App\Models\Expedition;
use App\Models\ExpeditionsMatiere;
use App\Models\ExpeditionsTracking;
use App\Models\User;
use App\Models\Facture;
use App\Models\Matiere;
use App\Models\PoidsMatiere;
use App\Models\Transporteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Twilio\Rest\Client;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Facture = Facture::where('expedition_id', $request->expedition_id);

        if ($Facture->exists()) {
            return $this->show(new Request(['id' => $Facture->first()->id]));
        }
        else {
            $Facture = Facture::create([
                'expedition_id'    => $request->expedition_id,
                'montant'          => $request->montant,
                'date_facturation' => date("Y-m-d"),
                'etat'             => '1'
            ]);
            return $this->show(new Request(['facture_id' => $Facture->id]));
            //return view('facturation.paiement', compact('id'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        $facture_id         = $request['facture_id'];
        $facture            = Facture::find($facture_id);

        $user               = Auth::user();
        if(USER::EXPEDITEUR === $user->role_id) {
            $expediteur     = Expediteur::where('user_id', $user->id)->first();
            $expedition     = Expedition::where('id', $facture->expedition_id)->first();
            $transporteur   = Transporteur::find($expedition->transporteur_id);

            return view(
                'expediteur.pages.facturation.paiement',
                compact(
                    'facture',
                    'expedition',
                    'expediteur',
                    'transporteur',
                )
            );
        }
        else if (USER::TRANSPORTEUR === $user->role_id) {
            $transporteur   = Transporteur::where('user_id', $user->id)->first();
            $expedition     = Expedition::where('id', $facture->expedition_id)->first();
            $expediteur     = Expediteur::find($expedition->expediteur_id);

            return view(
                'transporteur.pages.facturation.paiement',
                compact(
                    'facture',
                    'expedition',
                    'expediteur',
                    'transporteur',
                )
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
    }

    /**
     * specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function payer(Request $request)
    {
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $comb2 = [];
        $alphaLen = strlen($alpha) - 1;
        $comb1 = [];
        for ($i = 0; $i < 5; $i++) {
            $comb1[] = rand(0, 9);
        }
        for ($i = 0; $i < 3; $i++) {
            $n = rand(0, $alphaLen);
            $comb2[] = $alpha[$n];
        }
        // $code = implode($comb1) . implode($comb2);
        $code='123456';
        $facture       = Facture::find($request->facture_id);
        // $facture->etat = 2;
        // $facture->save();
        $expedition    = Expedition::find($request->expedition_id);
        $expedition->etat_expedition_id = 3;
        $expedition->code = $code;
        $expedition->save();

        $expedition_tracking = ExpeditionsTracking::where('expedition_id', $expedition->id)->first();
        $expedition_tracking->etat_expedition_id = EtatExpedition::EN_ATTENTE_DE_CHARGEMENT;
        $expedition_tracking->date_paiement = now(new \DateTimeZone('UTC'));
        $expedition_tracking->save();
        
        $response=$this->sendPayment($expedition,$facture);
        return response()->json($response);

        // $expediteur = Auth::user();
        // $basic  = new \Vonage\Client\Credentials\Basic("c646d54f", "g7awZbAl6S7L4uT4");
        // $client = new \Vonage\Client($basic);
        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS("221".$expediteur->phone, "Remerk", 'Votre code est: '.$code)
        // );
        // $message = $response->current();

        

        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }
        // return redirect('/factures')->with([
        //     'success' => "Paiement approuvé! Le code vous a été envoyé",
        //     'expedition-acknowledgment-of-receipt' => true
        // ]);
    }

    /**
     * 
     */
    public function sendPayment($expedition,$facture)
    {
        $base_url  = 'http://127.0.0.1:8000/';
        $jsonResponse = (new PayTech(env('PAY_TECH_API_KEY'), env('PAY_TECH_API_SECRET')))
        ->setQuery([
            'item_name'    => $expedition->string_id,
            'item_price'   => $facture->montant,
            'command_name' => "Paiement de l expedition {$expedition->string_id} Gold via PayTech",
        ])
        ->setCustomeField([
            'item_id'      => $expedition->id,
            'time_command' => time(),
            'ip_user'      => $_SERVER['REMOTE_ADDR'],
            'lang'         => $_SERVER['HTTP_ACCEPT_LANGUAGE']
        ])
        ->setTestMode(true)
        ->setRefCommand(uniqid())
        ->setNotificationUrl([
                'ipn_url'     => 'https://www.mediapex.net', //only https
                'success_url' => $base_url.'factures',
                'cancel_url'  => $base_url.'factures/'
        ])
        ->send();
        return $jsonResponse;
        //test
    }
}
