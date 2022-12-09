<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transporteur extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = [
        'user_id',
        'adresse',
        'entreprise',
        'siteweb',
        'nombre_vehicules',
        'note'
    ];

    /**
     * Get the user's avatar associated with the carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string|NULL
     */

    public function avatar() : ?string
    {
        return (($this->hasAvatar()) ? $this->user->avatar : null);
    }

    /**
     * Get the name of the user's avatar file associated with the carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function avatarFileName() : string
    {
        return (string)$this->user->avatar_file_name;
    }

    /**
     * Get path to user's avatar folder associated with carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function avatarFolderPath() : string
    {
        return $this->user->avatarFolderPath();
    }

    /**
     * Get the user's email address associated with the carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string|NULL
     */

    public function email() : ?string
    {
        return $this->user->email;
    }

    /**
     * Get the path to the user's folder associated with the carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function folderPath() : string
    {
        return (string)$this->user->folder_path;
    }
    
    /**
     * Returns the full name of the user associated with the carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function fullName() : string
    {
        return $this->user->fullName();
    }

    /**
     * Checks if the user associated with the carrier has an avatar.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return boolean
     */
    public function hasAvatar() : bool
    {
        return $this->user->hasAvatar();
    }

    /**
     * Checks if the carrier has a company.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return boolean
     */
    public function hasCompany() : bool
    {
        return (isset($this->entreprise) && !empty($this->entreprise));
    }

    /**
     * Checks if the user associated with the carrier has an email address.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return boolean
     */
    public function hasEmail() : bool
    {
        return $this->user->hasEmail();
    }

    /**
     * Checks if the carrier has a website.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return boolean
     */
    public function hasWebsite() : bool
    {
        return (isset($this->siteweb) && !empty($this->siteweb));
    }

    /**
     * Get the user's last name associated with the carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function nom() : string
    {
        return (string)$this->user->nom;
    }

    /**
     * Get the user's phone number associated with the carrier.
     *
     *  @param boolean [$format]    a boolean that indicates whether the phone number
     *                              must be formatted or not, by default its value is false.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function phoneNumber(bool $format = false) : string
    {
        return ((!$format) ? (string)$this->user->phone : $this->user->formattedPhoneNumber());
    }

    /**
     * Get the user's first name associated with the carrier.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function prenom() : string
    {
        return (string)$this->user->prenom;
    }

    /**
     * Get user associated with carrier.
     *
     * @return \App\Models\User
     */

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    /**
     * Get trucks associated with carrier.
     *
     * @return \App\Models\User
     */

    public function vehicules(){
        return $this->hasMany(Camion::class);
    }

    public function expeditions(){
        return $this->hasMany(Expedition::class);
    }
    public function expeditionsEndedCount(){
        return Expedition::where([
            'transporteur_id'       => $this->id,
            'etat_expedition_id'    => EtatExpedition::TERMINEE
        ])->count();
    }

}
