<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemporaryUserData extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'entreprise',
        'siteweb',
        'email',
        'phone',
        'password',
        'role_id',
        'token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'token',
    ];

    /**
     * Get the Role associated with the TemporaryUserData.
     * 
     * @return \App\Models\Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
