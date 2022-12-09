<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocaliteExpedition extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = [
        'expedition_id',
        'region_id',
        'departement_id',
        'commune_id',
        'arrondissement_id',
        'is_depart'
    ];
}
