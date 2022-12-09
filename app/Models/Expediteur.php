<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expediteur extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $fillable = ['user_id', 'adresse', 'entreprise', 'siteweb'];

    /**
     * Get the user's avatar associated with the sender.
     *
     * Note : This method must be called as a method with the () because it is different from the methods of Eloquent.
     *
     * @return string
     */

    public function avatar() : ?string
    {
        return (($this->hasAvatar()) ? $this->user->avatar : null);
    }

    /**
     * Get the name of the user's avatar file associated with the sender.
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
     * Get the path to the user's avatar folder associated with the sender.
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
     * Get the email address of the user associated with the sender.
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
     * Get the path of the user's folder associated with the sender.
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
     * Returns the full name of the user associated with the sender.
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
     * Checks if the user associated with the sender has an avatar.
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
     * Checks if the sender has a company.
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
     * Checks if the user associated with the sender has an email address.
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
     * Checks if the sender has a website.
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
     * Get the last name of the user associated with the sender.
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
     * Get the user's phone number associated with the sender.
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
     * Get the first name of the user associated with the sender.
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
     * Get the user associated with the sender.
     *
     * @return \App\Models\User
     */

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function expeditionsEndedCount(){
        return Expedition::where([
            'expediteur_id'       => $this->id,
            'etat_expedition_id'    => EtatExpedition::TERMINEE
        ])->count();
    }
}
