<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = ['expedition_id', 'montant', 'date_facturation', 'etat'];

    /**
     * Get the expedition associated with the facture.
     *
     * @return \App\Models\Expedition
     */

    public function expedition()
    {
        return $this->hasOne(Expedition::class, 'id', 'expedition_id');
    }
}
