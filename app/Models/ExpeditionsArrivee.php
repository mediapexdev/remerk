<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpeditionsArrivee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = [
        'expedition_id',
        'region_id',
        'departement_id',
        'commune_id',
        'adresse_reelle',
        'date_arrivee',
        'nom_contact_sur_place',
        'phone_contact_sur_place'
    ];

    /**
     * Get the full address of this expedition arrival.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function adresseComplet()
    {
        return ($this->adresse_reelle . ', ' . $this->region->nom);
    }

    /**
     * Get the commune associated with this expedition arrival.
     * 
     * 
     * @return \App\Models\Commune
     */
    public function commune()
    {
        return $this->hasOne(Commune::class, 'id', 'commune_id');
    }

    /**
     * Get the departement associated with this expedition arrival.
     *
     * @return \App\Models\Departement
     */

    public function departement()
    {
        return $this->hasOne(Departement::class, 'id', 'departement_id');
    }

    /**
     * Get the expedition associated with this expedition arrival.
     *
     * @return \App\Models\Expedition
     */

    public function expedition()
    {
        return $this->hasOne(Expedition::class, 'id', 'expedition_id');
    }

    /**
     * Checks if the expedition associated with this expedition arrival has a contact.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return boolean
     */
    public function hasContact() : bool
    {
        return ((isset($this->nom_contact_sur_place) && !empty($this->nom_contact_sur_place)) &&
                (isset($this->phone_contact_sur_place) && !empty($this->phone_contact_sur_place)));
    }

    /**
     * Get the region associated with this expedition arrival.
     *
     * @return \App\Models\Region
     */
    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
