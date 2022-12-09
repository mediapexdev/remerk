<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Camion extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = [
        'types_vehicule_id',
        'marque_camion_id',
        'modele',
        'immatriculation',
        'poids_a_vide',
        'capacite',
        'date_mis_en_circulation',
        'transporteur_id',
        'localite_camion_id',
        'est_approuve'
    ];
    public function type(){
        return $this->belongsTo(TypesVehicule::class,'types_vehicule_id');
    }
    public function marque(){
        return $this->belongsTo(MarqueCamion::class,'marque_camion_id');
    }
}
