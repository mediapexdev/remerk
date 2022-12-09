<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Devis extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = ['expedition_id','montant_propose'];

}
