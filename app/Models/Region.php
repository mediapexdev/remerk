<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = ['nom'];

    /**
     * Get the arrondissements associated with the region.
     * 
     * @return Illuminate\Database\Eloquent\Collection<Arrondissement>
     */

    public function arrondissements()
    {
        return $this->hasMany(Arrondissement::class);
    }

    /**
     * Get the communes associated with the region.
     * 
     * @return Illuminate\Database\Eloquent\Collection<Commune>
     */

    public function communes()
    {
        return $this->hasMany(Commune::class);
    }

    /**
     * Get the departements associated with the region.
     * 
     * @return Illuminate\Database\Eloquent\Collection<Departement>
     */

    public function departements()
    {
        return $this->hasMany(Departement::class);
    }
}
