<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpeditionsTracking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = [
        'expedition_id',
        'etat_expedition_id',
        'date_select_postulant',
        'date_paiement',
        'date_chargement',
        'date_depart',
        'date_arrivee',
        'date_dechargement',
        'date_livraison'
    ];

    /**
     * Get the current state of the expedition.
     *
     * @return \App\Models\EtatExpedition
     */
    public function etat()
    {
        return $this->hasOne(EtatExpedition::class, 'id', 'etat_expedition_id');
    }
}
