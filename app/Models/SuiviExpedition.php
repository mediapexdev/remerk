<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiviExpedition extends Model
{
    use HasFactory;
    protected $guarded  = [];

    protected $fillable = [
        'expedition_id',
        'etat_expedition_id',
        'date_modification',
        'comment',
    ];

    public function etat(){
        return $this->hasOne(EtatExpedition::class, 'id','etat_expedition_id');
    }
}
