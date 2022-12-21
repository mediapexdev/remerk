<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EtatExpedition extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The different stages of an expedition.
     */

    const EN_ATTENTE                    = 1;
    const EN_ATTENTE_DE_PAIEMENT        = 2;
    const EN_ATTENTE_DE_CHARGEMENT      = 3;
    const CHARGE                        = 4;
    const EN_TRANSIT                    = 5;
    const EN_ATTENTE_DE_DECHARGEMENT    = 6;
    const DECHARGE                      = 7;
    const TERMINEE                      = 8;
    const ANNULEE                       = 9;

    protected $guarded  = [];

    protected $fillable = ['nom', 'comment'];
}
