<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['role'];

    /**
     * Get the Users associated with the Role.
     * 
     * @return Illuminate\Database\Eloquent\Collection<User>
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
