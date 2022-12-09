<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postulants extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $fillable = [
        'transporteur_id',
        'expedition_id',
        'montant_propose',
        'is_choosen'
    ];

    public function transporteur(){
        return $this->hasOne(Transporteur::class,'id','transporteur_id');
    }
    public function expedition(){
        return $this->hasOne(Expedition::class,'id', 'expedition_id');
    }
}
