<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = ['type', 'types_vehicule_ids'];

    /**
     * Get the truck types associated with the material.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return Illuminate\Database\Eloquent\Collection<TypesVehicule>
     */

    public function typesVehicule()
    {
        $types_vehicule_ids = \explode(',', \preg_replace('/\s+/', '', \trim($this->types_vehicule_ids, " []\n\r\t\v\x00")));

        return ((1 >= \count($types_vehicule_ids)) ?
                TypesVehicule::where('id', $types_vehicule_ids)->get() :
                TypesVehicule::whereIn('id', $types_vehicule_ids)->get());
    }

    public function expeditions(){
        return $this->hasMany(ExpeditionsMatiere::class);
    }

    // public function type()
    // {
    //     return $this->belongsTo(ExpeditionsMatiere::class,'matiere_id');
    // }
}
