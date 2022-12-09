<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Core\Util;
use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The different roles according to the user.
     */

    const ADMIN         = 1;
    const EXPEDITEUR	= 2;
    const TRANSPORTEUR  = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'phone',
        'phone_verified_at',
        'email',
        'password',
        'role_id',
        'avatar',
        'avatar_file_name',
        'folder_path',
        'fcm_token',
        'last_login_ip_address',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];

    /**
     * Get the user's avatar folder path.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function avatarFolderPath() : string
    {
        return ((empty($this->folder_path)) ? $this->folder_path :
            (string)($this->folder_path . DIRECTORY_SEPARATOR .
            'media' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'avatars'));
    }

    /**
     * Returns The user's full name.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function fullName() : string
    {
        return (string)($this->prenom . ' ' . $this->nom);
    }

    /**
     * Returns the user's formatted phone number.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function formattedPhoneNumber() : string
    {
        return Util::formatPhoneNumber($this->phone);
    }

    /**
     * Checks if this user has an avatar.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return boolean
     */

    public function hasAvatar() : bool
    {
        return (isset($this->avatar) && !empty($this->avatar));
    }

    /**
     * Checks if this user has an email address.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return boolean
     */
    public function hasEmail() : bool
    {
        return (isset($this->email) && !empty($this->email));
    }

    /**
     * Checks if this user is an admin.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return boolean
     */
    public function isAdmin() : bool
    {
        return (self::ADMIN == $this->role_id);
    }

    /**
     * Checks if this user is a sender.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     * 
     * @return boolean
     */
    public function isExpediteur() : bool
    {
        return (self::EXPEDITEUR == $this->role_id);
    }

    /**
     * Checks if this user is a carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     * 
     * @return boolean
     */
    public function isTransporteur() : bool
    {
        return (self::TRANSPORTEUR == $this->role_id);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Returns the profile completion percentage.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     * 
     * @return integer
     */
    public function profileCompletion() : int
    {
        $percentage = 0;

        if(isset($this->nom))
            $percentage += 20;
        if(isset($this->prenom))
            $percentage += 20;
        if(isset($this->phone))
            $percentage += 20;
        if($this->hasEmail())
            $percentage += 20;
        if($this->hasAvatar())
            $percentage += 20;

        return $percentage;
    }

    /**
     * Get the Role associated with the User.
     * 
     * @return \App\Models\Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
