<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Expediteur;
use App\Models\Transporteur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = \bcrypt(12345678);
        $date_time = new \DateTime('now', new \DateTimeZone('UTC'));
        
        try {
            if(Storage::exists('user-folders') && !Storage::deleteDirectory('user-folders')){
                throw new \RuntimeException("Failed to delete directory user-folders : " . \var_export(\error_get_last(), true));
            }
        }
        catch(\Exception $exception) {
            throw $exception;
        }
        try {
            if(!Storage::makeDirectory('user-folders')){
                throw new \RuntimeException("Failed to make directory user-folders : " . \var_export(\error_get_last(), true));
            }
        }
        catch(\Exception $exception) {
            throw $exception;
        }
        $users = [
            [
                "prenom"            => "Djielani",
                "nom"               => "Bodian",
                "phone"             => "784427272",
                "phone_verified_at" => $date_time,
                "password"          => $password,
                "role_id"           => 2,
                "folder_path"       => ('user-folders' . DIRECTORY_SEPARATOR . \sha1('rmk_user_784427272_dir'))
            ],
            [
                "prenom"            => "Abdou Khadre",
                "nom"               => "Bodian",
                "phone"             => "705038676",
                "phone_verified_at" => $date_time,
                "password"          => $password,
                "role_id"           => 3,
                "folder_path"       => ('user-folders' . DIRECTORY_SEPARATOR . \sha1('rmk_user_705038676_dir'))
            ],
            [
                "prenom"            => "Samath",
                "nom"               => "Diop",
                "phone"             => "772299928",
                "phone_verified_at" => $date_time,
                "password"          => $password,
                "role_id"           => 3,
                "folder_path"       => ('user-folders' . DIRECTORY_SEPARATOR . \sha1('rmk_user_772299928_dir'))
            ],
            [
                "prenom"            => "Médone T.",
                "nom"               => "Sène",
                "phone"             => "772761112",
                "phone_verified_at" => $date_time,
                "password"          => $password,
                "role_id"           => 2,
                "folder_path"       => ('user-folders' . DIRECTORY_SEPARATOR . \sha1('rmk_user_772761112_dir'))
            ],
            [
                "prenom"            => "Aziz",
                "nom"               => "Thioye",
                "phone"             => "765025252",
                "phone_verified_at" => $date_time,
                'email'             => 'zizdev22@gmail.com',
                "password"          => $password,
                "role_id"           => 2,
                "folder_path"       => ('user-folders' . DIRECTORY_SEPARATOR . \sha1('rmk_user_765025252_dir'))
            ],
            [
                "prenom"            => "Médoune",
                "nom"               => "Sène",
                "phone"             => "701021501",
                "phone_verified_at" => $date_time,
                "password"          => $password,
                "role_id"           => 1,
                "folder_path"       => ('user-folders' . DIRECTORY_SEPARATOR . \sha1('rmk_user_701021501_dir'))
            ],
            [
                "prenom"            => "Yoro",
                "nom"               => "Diop",
                "phone"             => "775151656",
                "phone_verified_at" => $date_time,
                'email'             => 'info@mediapex.net',
                "password"          => $password,
                "role_id"           => 2,
                "folder_path"       => ('user-folders' . DIRECTORY_SEPARATOR . \sha1('rmk_user_775151656_dir'))
            ]
        ];
        foreach ($users as $user) {
            $created_user = User::create($user);
            $siteweb = $entreprise = null;

            if(0 == \strcmp('Yoro', $created_user->prenom)){
                $siteweb = 'mediapex.net';
                $entreprise = 'Médiapex';
            }
            switch($user['role_id']) {
                case User::EXPEDITEUR:
                    Expediteur::create([
                        'user_id'       => $created_user->id,
                        'adresse'       => 'S15 Hann Maristes, Dakar, Sénégal',
                        'entreprise'    => $siteweb,
                        'siteweb'       => $entreprise
                    ]);
                    break;
                case User::TRANSPORTEUR:
                    Transporteur::create([
                        'user_id'           => $created_user->id,
                        'adresse'           => 'S15 Hann Maristes, Dakar, Sénégal',
                        'entreprise'        => $siteweb,
                        'siteweb'           => $entreprise,
                        'nombre_vehicules'  => 1,
                        'note'              => 0
                    ]);
                    break;
                default:
                    break;
            }
            try {
                if(!Storage::makeDirectory($created_user->folder_path .DIRECTORY_SEPARATOR .
                    'media' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'avatars')){
                    throw new \RuntimeException("Failed to make directory {$created_user->folder_path} : " . \var_export(\error_get_last(), true));
                }
            }
            catch(\Exception $exception) {
                throw $exception;
            }
        }
    }
}
