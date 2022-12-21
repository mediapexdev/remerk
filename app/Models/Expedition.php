<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Expediteur;
use App\Models\Transporteur;
use App\Models\Devis;
use App\Models\ExpeditionsMatiere;

class Expedition extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = [
        'expediteur_id',
        'transporteur_id',
        'etat_expedition_id',
        'code'
    ];

    public function facture()
    {
        return Facture::where('expedition_id', $this->id)->first();
    }

    public function montant_devis()
    {
        return ((NULL !== ($devis = $this->devis())) ? $devis->montant_propose : 0);
    }

    /**
     * Get the complete address of the departure of the expedition.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function adresseDepartComplet()
    {
        return $this->depart->adresseComplet();
    }

    /**
     * Get the complete address of the arrival of the expedition.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function adresseArriveeComplet()
    {
        return $this->arrivee->adresseComplet();
    }

    /**
     * Get the arrival associated with the expedition.
     *
     * @return \App\Models\ExpeditionsArrivee
     */

    public function arrivee()
    {
        return $this->hasOne(ExpeditionsArrivee::class);
    }

    /**
     * Returns the scheduled departure date for the expedition.
     *
     * @param boolean [$to_datetime_object]     A boolean that is used to indicate whether the date
     *                                          should be returned as a DateTime object, by default its value is false.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string|\DateTime
     */

    public function scheduledDate(bool $to_datetime_object = false)
    {
        return ((!$to_datetime_object) ? $this->depart->date_depart :
            new \DateTime($this->depart->date_depart, new \DateTimeZone('UTC')));
    }

    /**
     * Get the departure associated with the expedition.
     *
     * @return \App\Models\ExpeditionsDepart
     */

    public function depart()
    {
        return $this->hasOne(ExpeditionsDepart::class);
    }

    /**
     * Get the current state of the expedition.
     *
     * @return \App\Models\EtatExpedition
     */

    public function etat()
    {
        return $this->hasOne(EtatExpedition::class, 'id', 'etat_expedition_id');
    }

    /**
     * Get the expediteur associated with the expedition.
     *
     * @return \App\Models\Expediteur
     */

    public function expediteur()
    {
        return $this->hasOne(Expediteur::class, 'id', 'expediteur_id');
    }

    /**
     * Get the material expedition associated with the expedition.
     *
     * @return \App\Models\ExpeditionsMatiere
     */

    public function expeditionMatiere()
    {
        return $this->hasOne(ExpeditionsMatiere::class, 'expedition_id');
    }

    public function getPostulant($id_transporteur)
    {
        foreach ($this->postulants as $postulant) {
            if($id_transporteur === $postulant->transporteur->id)
                return $postulant;
        }
        return null;
    }

    /**
     * Get the material associated with the expedition.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return \App\Models\Matiere
     */

    public function matiere()
    {
        return $this->expeditionsMatiere->matiere;
    }

    /**
     * Get the material type associated with the expedition.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function matiereType() : string
    {
        return (string)$this->expeditionMatiere->matiere->type;
    }

    /**
     * Get the material weight associated with the expedition.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function matiereWeight() : string
    {
        return (string)$this->expeditionMatiere->poidsMatiere->poids;
    }
    
    /**
     * Get the number of vehicles associated with the expedition.
     *
     * @return int
     */
    
    public function numberOfVehicles() : int
    {
        return $this->expeditionMatiere->nombre_vehicules;
    }

    /**
     * Get the postulants associated with the expedition.
     *
     * @return \App\Models\Postulants
     */

    public function postulants()
    {
        return $this->hasMany(Postulants::class,'expedition_id');
    }

    public function suivi_expedition()
    {
        return $this->hasMany(SuiviExpedition::class);
    }

    /**
     * Get the transporteur associated with the expedition.
     *
     * @return \App\Models\Transporteur
     */

    public function transporteur()
    {
        // return Transporteur::find($this->transporteur_id);
        return $this->hasOne(Transporteur::class, 'id', 'transporteur_id');
    }

    /**
     * Get the vehicle type associated with the expedition.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return \App\Models\TypesVehicule
     */

    public function typeVehicule()
    {
        return $this->expeditionMatiere->typeVehicule;
    }

    /**
     * Get the vehicle type name associated with the expedition.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function typeVehiculeName() : string
    {
        return (string)$this->expeditionMatiere->typeVehicule->nom;
    }

    // public function facture(){
    //     return $this->hasOne(Facture::class);
    // }
}
