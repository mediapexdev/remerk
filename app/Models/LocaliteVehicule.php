<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocaliteVehicule extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = [
        'camion_id',
        'region_id',
        'departement_id',
        'arrondissement_id',
        'commune_id'
    ];
}
