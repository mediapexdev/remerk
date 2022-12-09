<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Expediteur;
use App\Models\Transporteur;
use App\Models\TemporaryUserData;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Intervention\Image\Facades\Image;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function phoneNumberVerification(Request $request)
    {
        $request->validate([
            'account_type'  => ['required', 'regex:#(Expediteur|Transporteur){1}#'],
            'prenom'        => ['required', 'regex:#^[\p{L}]+[\p{L} ]*$|^[\p{L} ]+[\p{L}]+[\p{L} ]*$#u', 'max:255'],
            'nom'           => ['required', 'regex:#^[\p{L}]+[\p{L} ]*$|^[\p{L} ]+[\p{L}]+[\p{L} ]*$#u', 'max:255'],
            'adresse'       => ['required', 'string', 'max:255'],
            'entreprise'    => ['nullable', 'string', 'max:255'],
            'siteweb'       => ['nullable', 'regex:#^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$#', 'max:255'],
            'email'         => ['nullable', 'regex:#^[^\s@]+@[^\s@]+\.[^\s@]+$#', 'unique:users'],
            'phone'         => ['required', 'regex:#(^3[3]|^7[5-80])[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#', 'unique:users'],
            'password'      => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        $token = Str::random(60);
        $phone_number = \preg_replace('#\s+#', '', \trim($request->phone));
        $tmp_user_data = TemporaryUserData::where('phone', $phone_number)->first();

        if($tmp_user_data){             // A revoir
            $tmp_user_data->delete();
        }
        $tmp_user_data = TemporaryUserData::create([
            'prenom'        => \trim($request->prenom),
            'nom'           => \trim($request->nom),
            'adresse'       => \trim($request->adresse),
            'entreprise'    => (!empty($entreprise = \trim($request->entreprise)) ? $entreprise : null),
            'siteweb'       => (!empty($siteweb = \trim($request->siteweb)) ? $siteweb : null),
            'email'         => (!empty($email = \trim($request->email)) ? $email : null),
            'phone'         => $phone_number,
            'password'      => \trim($request->password),
            'role_id'       => ((0 == \strcmp('Transporteur', \trim($request->account_type))) ? 3 : 2),
            'token'         => $token
        ]);
        return view('auth.phone-verification.register', compact('phone_number', 'token'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'phone' => ['required', 'regex:#(^3[3]|^7[5-80])[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#', 'unique:users']
        ]);
        $tmp_user_data = TemporaryUserData::where([
            'phone' => \preg_replace('#\s+#', '', \trim($request->phone)),
            'token' => $request->token
        ])->first();

        if(!$tmp_user_data) {
            return back()->withInput($request->only('phone'))
                ->withErrors(['phone' => 'Invalid token !']);
        }
        $phone_number = \preg_replace('#\s+#', '', \trim($tmp_user_data->phone));
        $folder_path = ('user-folders'. DIRECTORY_SEPARATOR . \sha1('rmk_user_' . $phone_number . '_dir'));

        try {
            if(Storage::exists($folder_path) && !Storage::deleteDirectory($folder_path)){
                throw new \RuntimeException("Failed to delete directory {$folder_path} : " . \var_export(\error_get_last(), true));
            }
        }
        catch(\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
        try {
            if(!Storage::makeDirectory($folder_path . DIRECTORY_SEPARATOR .
                'media' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'avatars')){
                throw new \RuntimeException("Failed to make directory {$folder_path} : " . \var_export(\error_get_last(), true));
            }
        }
        catch(\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
        $user = User::create([
            'prenom'            => \trim($tmp_user_data->prenom),
            'nom'               => \trim($tmp_user_data->nom),
            'phone'             => $phone_number,
            'phone_verified_at' => new \DateTime('now', new \DateTimeZone('UTC')),
            'email'             => (!empty($email = \trim($tmp_user_data->email)) ? $email : null),
            'password'          => Hash::make(\trim($tmp_user_data->password)),
            'role_id'           => $tmp_user_data->role_id,
            'folder_path'       => $folder_path,
            'remember_token'    => Str::random(60),
            'fcm_token'         => null
        ]);
        $data = [
            'user_id'       => $user->id,
            'adresse'       => $tmp_user_data->adresse,
            'entreprise'    => (!empty($entreprise = \trim($tmp_user_data->entreprise)) ? $entreprise : null),
            'siteweb'       => (!empty($siteweb = \trim($tmp_user_data->siteweb)) ? $siteweb : null)
        ];
        switch($tmp_user_data->role_id) {
            case User::EXPEDITEUR:
                Expediteur::create($data);
                break;
            case User::TRANSPORTEUR:
                $data['nombre_vehicules'] = 0;
                $data['note'] = 0;
                Transporteur::create($data);
                break;
                default:
                break;
        }
        $tmp_user_data->delete();
        event(new Registered($user));

        $message = "Votre compte à été créé avec succès !";
        $message_type = 'success';

        return redirect()->route('login')->with(['message' => $message, 'message_type' => $message_type]);
    }

    /**
     * Update a user's profile details.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \ErrorException
     * @throws \RuntimeException
     * @throws \RuntimeException
     */
    public function updateProfileDetails(Request $request)
    {
        $request->validate([
            'avatar'                => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:1024', 'dimensions:min_width=200,min_height=200'],
            'avatar_input_action'   => ['required', 'regex:#(none|changed|removed){1}#'],
            'prenom'                => ['required', 'regex:#^[\p{L}]+[\p{L} ]*$|^[\p{L} ]+[\p{L}]+[\p{L} ]*$#u', 'max:255'],
            'nom'                   => ['required', 'regex:#^[\p{L}]+[\p{L} ]*$|^[\p{L} ]+[\p{L}]+[\p{L} ]*$#u', 'max:255'],
            'adresse'               => ['required', 'string', 'max:255'],
            'entreprise'            => ['nullable', 'string', 'max:255'],
            'siteweb'               => ['nullable', 'regex:#^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$#', 'max:255'],
            'email'                 => ['nullable', 'regex:#^[^\s@]+@[^\s@]+\.[^\s@]+$#'],
            'phone'                 => ['required', 'regex:#(^3[3]|^7[5-80])[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#', 'exists:users']
            // 'password_confirmation' => ['required', Rules\Password::defaults()]
        ]);
        $phone_number = \preg_replace('#\s+#', '', \trim($request->phone));
        $user = User::where('phone', $phone_number)->first();

        if(User::ADMIN != Auth::user()->role_id) {
            $request->validate([
                'password_confirmation' => ['required', Rules\Password::defaults()]
            ]);
            if(!Hash::check($request['password_confirmation'], $user->password)){
                return redirect()->back()->withErrors(['Le mot de passe saisi est incorrect !']);
            }
        }
        if(isset($request->email) && 0 != \strcmp($user->email, $request->email)) {
            $request->validate([
                'email' => ['unique:users']
            ]);
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar_file_name = (\sha1('rmk_user_' . $phone_number . '_avatar') . '.' . $avatar->getClientOriginalExtension());
            $img = Image::make($avatar);

            // Combiner le recadrage et le redimensionnement pour formater l'image de manière intelligente.

            $img->fit(300, 300, function ($constraint) {
                $constraint->upsize();  //  la contrainte pour empêcher le surdimensionnement indésirable de l'image.
            }, 'center');

            // Conversion de l'image en base64 pour l'enregistrer dans la bd
            
            $image_to_base64 = (string)$img->encode("data-url");

            // Encode l'image actuelle dans un format et une qualité d'image donnés et crée un nouveau flux PSR-7 basé sur les données d'image.
            
            $img->stream($avatar->getClientOriginalExtension());

            // Suppression de l'ancien avatar du dossier.

            $this->deleteAvatarFile($user);

            // Enregistrer dans le dossier en tant que image.

            try {
                if(!Storage::put(($user->avatarFolderPath() . DIRECTORY_SEPARATOR . $avatar_file_name), $img, 'public')){
                    throw new \RuntimeException("Failed to save image {$avatar->getClientOriginalName()} : " . \var_export(\error_get_last(), true));
                }
            }
            catch(\Exception $exception) {
                return redirect()->back()->withErrors([$exception->getMessage()]);
            }
            $user->avatar = $image_to_base64;
            $user->avatar_file_name = $avatar_file_name;
        }
        else if(0 == \strcmp('removed', $request->avatar_input_action)) {
            // Suppression de l'avatar du dossier.

            $this->deleteAvatarFile($user);
            $user->avatar = null;
            $user->avatar_file_name = null;
        }
        // Mis à jour des données de l'utilisateur.
        
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->save();

        // Mis à jour des données de l'utilisateur selon son role.

        switch($user->role_id) {
            default:
            case User::ADMIN:
                break;
            case User::EXPEDITEUR:
            case User::TRANSPORTEUR:
                $user_by_role = (($user->isExpediteur()) ?
                    Expediteur::where('user_id', $user->id)->first() :
                    Transporteur::where('user_id', $user->id)->first());
                $user_by_role->update([
                        'adresse'       => $request->adresse,
                        'entreprise'    => $request->entreprise,
                        'siteweb'       => $request->siteweb
                    ]);
                break;
        }
        return redirect()->back()->with(['success' => 'profil mis à jour avec succès !']);
    }

    /**
     * Update a user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'phone'             => ['required', 'regex:#(^3[3]|^7[5-80])[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#', 'exists:users'],
            'current_password'  => ['required', Rules\Password::defaults()],
            'new_password'      => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        $phone_number = \preg_replace('#\s+#', '', \trim($request->phone));
        $user = User::where('phone', $phone_number)->first();

        // Vérification du mot de passe actuel.
        
        if(!Hash::check($request['current_password'], $user->password)){
            return redirect()->back()->withErrors(['Le mot de passe saisi est incorrect !']);
        }
        // Vérification de la ressemblance du mot de passe actuel avec le nouveau mot de passe.

        if(0 == \strcmp($request->new_password, $request->current_password)) {
            return redirect()->back()->withInput($request->only(['current_password', 'new_password']))
                    ->withErrors(['Le nouveau mot de passe doit être différent du mot de passe actuel !']);
        }
        // Mis à jour du mot de passe.

        $user->password = Hash::make(\trim($request->new_password));
        $user->save();

        return redirect()->back()->with(['success' => 'Votre mot de passe à été mis à jour avec succès !']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Models\User  $user
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \ErrorException
     * @throws \RuntimeException
     */
    protected function deleteAvatarFile(User $user)
    {
        if(isset($user->avatar_file_name)) {
            try {
                $file_path = ($user->avatarFolderPath() . DIRECTORY_SEPARATOR . $user->avatar_file_name);

                if(Storage::exists($file_path) && !Storage::delete($file_path)){
                    throw new \RuntimeException("Failed to delete file {$file_path} : " . \var_export(\error_get_last(), true));
                }
            }
            catch(\Exception $exception) {
                return redirect()->back()->withErrors([$exception->getMessage()]);
            }
        }
    }
    public function updatePhoneNumber(Request $request){
        $user=User::where('phone',$request->old_phone)->first();
        $user->phone=$request->profile_phone;
        $user->save();
        return redirect()->back()->with(['success' => 'Votre mot de passe à été mis à jour avec succès !']);
    }
}
