<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $fillable = ['nom', 'region_id', 'departement_id', 'arrondissement_id'];

    /**
     * Get the arrivals of shipments associated with the communes.
     *
     * @return Illuminate\Database\Eloquent\Collection<ExpeditionsArrivee>
     */

    public function arrivees()
    {
        return $this->hasMany(ExpeditionsArrivee::class, 'commune_id');
    }

    /**
     * Get the arrondissement associated with the commune or
     * NULL if the commune is not associated with a arrondissement.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * Note : The hasArrondissement() method can be called before this one to check if the commune is associated with a arrondissement or not.
     *
     * @see hasArrondissement()
     *
     * @return \App\Models\Arrondissement|NULL
     */

    public function arrondissement()
    {
        return Arrondissement::find($this->arrondissement_id);
    }

    /**
     * Get the departement associated with the commune.
     *
     * @return \App\Models\Departement
     */

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    /**
     * Get the departures of shipments associated with the commune.
     *
     * @return Illuminate\Database\Eloquent\Collection<ExpeditionsDepart>
     */

    public function departs()
    {
        return $this->hasMany(ExpeditionsDepart::class, 'commune_id');
    }

    /**
     * Checks whether the commune is associated with a arrondissement or not.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @see arrondissement()
     *
     * @return boolean
     */

    public function hasArrondissement()
    {
        return ($this->arrondissement_id > 0);
    }

    /**
     * Get the region associated with the commune.
     *
     * @return \App\Models\Region
     */

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
