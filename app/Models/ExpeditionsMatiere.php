<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TypesVehicule;

class ExpeditionsMatiere extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = [
        'expedition_id',
        'matiere_id',
        'poids_matiere_id',
        'types_vehicule_id',
        'nombre_vehicules'
    ];

    /**
     * Get the expedition associated with the material expedition.
     *
     * @return \App\Models\Expedition
     */

    public function expedition()
    {
        return $this->hasOne(Expedition::class, 'id', 'expedition_id');
    }

    /**
     * Get the material associated with the material expedition.
     *
     * @return \App\Models\Matiere
     */

    public function matiere()
    {
        return $this->hasOne(Matiere::class, 'id', 'matiere_id');
    }

    /**
     * Get the material weight associated with the material expedition.
     *
     * @return \App\Models\PoidsMatiere
     */

    public function poidsMatiere()
    {
        return $this->hasOne(PoidsMatiere::class, 'id', 'poids_matiere_id');
    }

    /**
     * Get the truck type associated with the material expedition.
     *
     * @return \App\Models\TypesVehicule
     */

    public function typeVehicule()
    {
        return $this->hasOne(TypesVehicule::class, 'id', 'types_vehicule_id');
    }

    /**
     * Get the truck name associated with the truck.
     *
     * @return \App\Models\TypesVehicule
     */

    public function marqueVehicule()
    {
        return $this->hasOne(Camion::class, 'id', 'marque');
    }
}
