<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\ExpediteurController;
use App\Http\Controllers\ExpeditionController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\TransporteurController;
use App\Http\Controllers\PostulantController;
use App\Http\Controllers\FCMController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExpeditionsTrackingController;
use App\Http\Controllers\SuiviExpeditionController;
use App\Models\Camion;
use App\Models\Expediteur;
use App\Models\Expedition;
use App\Models\Matiere;
use App\Models\Transporteur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 **/

/**
 * 
 */
Route::get('/', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::ADMIN:
                return view('admin.dashboard');
                break;
            case User::EXPEDITEUR:
                return view('expediteur.dashboard');
                break;
            case User::TRANSPORTEUR:
                return view('transporteur.dashboard');
                break;
            default:
                return view('auth.login');
                break;
        }
    } else {
        return redirect()->route('login');
    }
});

/**
 * 
 */
Route::get('/dashboard', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::ADMIN:
                return view('admin.dashboard');
                break;
            case User::EXPEDITEUR:
                return view('expediteur.dashboard');
                break;
            case User::TRANSPORTEUR:
                return view('transporteur.dashboard');
                break;
            default:
                return view('auth.login');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('dashboard');

/**
 * 
 */
Route::get('/account', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::ADMIN:
                return view('admin.account.profile');
                break;
            case User::EXPEDITEUR:
                return view('expediteur.account.index');
                break;
            case User::TRANSPORTEUR:
                return view('transporteur.account.index');
                break;
            default:
                return view('auth.login');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('account');

/**
 * 
 */
Route::get('/expeditions', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::ADMIN:
                return view('admin.pages.expeditions.index');
                break;
            case User::EXPEDITEUR:
                return view('expediteur.pages.expeditions.expeditions');
                break;
            case User::TRANSPORTEUR:
                return view('transporteur.pages.expeditions.expeditions');
                break;
            default:
                return redirect()->back()->withErrors('404 not found');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('expeditions');

/**
 * 
 */
Route::get('nos-expeditions', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::EXPEDITEUR:
            case User::TRANSPORTEUR:
            default:
                return redirect()->route('dashboard')->withErrors('404 not found');
                break;
            case User::ADMIN:
                return view('admin.expeditions');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('nos-expeditions');

/**
 * 
 */
Route::get('/vehicules', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::EXPEDITEUR:
            default:
                return redirect()->back()->withErrors('404 not found');
                break;
            case User::ADMIN:           // Seul admin & transporteur peuvent voir les camions
            case User::TRANSPORTEUR:
                return view('transporteur.pages.vehicules.vehicules');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('vehicules');

/**
 * 
 */
Route::get('/factures', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::ADMIN:
            default:
                return redirect()->back()->withErrors('404 not found');
                break;
            case User::EXPEDITEUR:
                return view('expediteur.pages.facturation.facture');
                break;
            case User::TRANSPORTEUR:
                return view('transporteur.pages.facturation.facture');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('facturation');

/*
 **/

Route::get('/messagerie', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::EXPEDITEUR:
            case User::TRANSPORTEUR:
            default:
                return redirect()->back()->withErrors('404 not found');
                break;
            case User::ADMIN:
                return view('admin/pages/messagerie/messagerie');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('messagerie');

/*
 **/

Route::get('/messagerie/reçus', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::EXPEDITEUR:
            case User::TRANSPORTEUR:
            default:
                return redirect()->back()->withErrors('404 not found');
                break;
            case User::ADMIN:
                return view('admin/pages/messagerie/components/recu');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('messagerie/reçus');

/*
 **/

Route::get('/messagerie/envoyes', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::EXPEDITEUR:
            case User::TRANSPORTEUR:
            default:
                return redirect()->back()->withErrors('404 not found');
                break;
            case User::ADMIN:
                return view('admin/pages/messagerie/components/send');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('messagerie/envoyes');

/*
 **/

Route::get('/messagerie/contacts', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::EXPEDITEUR:
            case User::TRANSPORTEUR:
            default:
                return redirect()->back()->withErrors('404 not found');
                break;
            case User::ADMIN:
                return view('admin/pages/messagerie/components/contact');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('messagerie/contacts');

/**
 * 
 */
Route::get('/admin/messagerie/reply', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::EXPEDITEUR:
            case User::TRANSPORTEUR:
            default:
                return redirect()->back()->withErrors('404 not found');
                break;
            case User::ADMIN:                       // Seul admin peut voir
                return view('admin/pages/inbox/reply');
                break;
        }
    } else {
        return redirect()->route('login');
    }
})->middleware(['auth'])->name('reply');

/*
 **/

Route::middleware(['auth'])->group(function () {
    /**
     * 
     */
    Route::post('update-password', [RegisteredUserController::class, 'updatePassword'])
        ->name('user.updatePassword');

    Route::post('update-phone-number', [RegisteredUserController::class, 'updatePhoneNumber'])
        ->name('admin.updatePhoneNumber');

    Route::post('update-profile-details', [RegisteredUserController::class, 'updateProfileDetails'])
        ->name('user.updateProfileDetails');

    /**
     * 
     */
    Route::get('expeditions/{id}/infos', function ($id) {
        if (null !== ($user = Auth::user())) {
            $expedition = Expedition::find($id);
            if ($expedition) {
                switch ($user->role_id) {
                    case User::EXPEDITEUR:
                        return view('expediteur.components.expeditions.infos.view', compact('expedition'));
                        break;
                    case User::TRANSPORTEUR:
                        return view('transporteur.components.expeditions.infos.view', compact('expedition'));
                        break;
                    case User::ADMIN:
                        return view('admin.components.expeditions.infos.view', compact('expedition'));
                        break;
                    default:
                        return redirect()->back()->withErrors('404 not found');
                        break;
                }
            } else {
                return redirect()->back()->withErrors('404 not found');
            }
        } else {
            return redirect()->route('login');
        }
    })->name('expedition.infos');

    /**
     * 
     */
    Route::get('expeditions/{id}/suivi', function ($id) {
        if (null !== ($user = Auth::user())) {
            switch ($user->role_id) {
                case User::ADMIN:
                case User::EXPEDITEUR:
                default:
                    return redirect()->back()->withErrors('404 not found');
                    break;
                case User::TRANSPORTEUR:
                    $expedition = Expedition::find($id);
                    return (!$expedition) ?
                        redirect()->back()->withErrors('404 not found') :
                        view('transporteur.components.expeditions.tracking.view', compact('expedition'));
                        break;
            }
        } else {
            return redirect()->route('login');
        }
    })->name('expedition.suivi');

    /**
     * 
     */
    Route::get('expeditions/postulants', function () {
        if (null !== ($user = Auth::user())) {
            switch ($user->role_id) {
                case User::EXPEDITEUR:
                    return view('expediteur.pages.expeditions.postulants.postulants');
                    break;
                case User::ADMIN:
                case User::TRANSPORTEUR:
                default:
                    return redirect()->back()->withErrors('404 not found');
                    break;
            }
        }
        else {
            return redirect()->route('login');
        }
    })->name('expeditions.postulants');

    /**
     * 
     */
    Route::get('expediteur/{id}/details', function ($id) {
        if (null !== ($user = Auth::user())) {
            switch ($user->role_id) {
                case User::ADMIN:
                case User::EXPEDITEUR:
                case User::TRANSPORTEUR:
                    $expediteur = Expediteur::find($id);
                    return (!$expediteur) ?
                        redirect()->back()->withErrors('404 not found') :
                        view('expediteur.components.modals.details-expediteur', compact('expediteur'));
                break;
                default:
                    return redirect()->back()->withErrors('404 not found');
                break;
            }
        }
        else {
            return redirect()->route('login');
        }
    })->name('expediteur.details');

    /**
     * 
     */
    Route::get('transporteur/{id}/details', function ($id) {
        if (null !== ($user = Auth::user())) {
            switch ($user->role_id) {
                case User::ADMIN:
                case User::EXPEDITEUR:
                case User::TRANSPORTEUR:
                    $transporteur = Transporteur::find($id);
                    return (!$transporteur) ?
                        redirect()->back()->withErrors('404 not found') :
                        view('transporteur.components.modals.details-transporteur', compact('transporteur'));
                break;
                default:
                    return redirect()->back()->withErrors('404 not found');
                break;
            }
        }
        else {
            return redirect()->route('login');
        }
    })->name('transporteur.details');

    /**
     * 
     */

    Route::post('admin-annuler-expedition', [AdminController::class, 'delete'])
        ->name('admin.expedition.delete');

    Route::post('choisir-transporteur', [AdminController::class, 'choisirTransporteur'])
        ->name('admin.choixTransporteur');

    /**
     * 
     */
    Route::post('nouvelle-expedition', [ExpeditionController::class, 'store'])
        ->name('expedition.store');

    Route::post('annuler-expedition', [ExpeditionController::class, 'delete'])
        ->name('expedition.delete');

    Route::get('getCommunes', [ExpeditionController::class, 'getCommunes'])
        ->name('localites.getCommunes');

    Route::get('getTypesCamion', [ExpeditionController::class, 'getTypesCamion'])
        ->name('matieres.getTypesCamion');

    /**
     * 
     */
    Route::post('annuler-postulat', [PostulantController::class, 'delete'])
        ->name('postulant.delete');

    Route::post('postuler-expedition', [PostulantController::class, 'store'])
        ->name('postulant.store');

    Route::post('postulant-update', [PostulantController::class, 'update'])
        ->name('postulant.update');

    Route::post('details-facture', [PostulantController::class, 'choisirPostulant'])
        ->name('choixPostulant');

    Route::get('postulant/{id}/details', [PostulantController::class, 'detailsPostulant'])
        ->name('postulant.details');

    /**
     * 
     */

    Route::post('creer-suivi', [ExpeditionsTrackingController::class, 'store'])
        ->name('tracking.store');

    Route::post('mettre-a-jour-suivi', [ExpeditionsTrackingController::class, 'update'])
        ->name('tracking.update');

    Route::post('finaliser-suivi', [ExpeditionsTrackingController::class, 'finalize'])
        ->name('tracking.finaliser');

    /**
     * 
     */
    Route::get('facturation/{id}/detail', [DevisController::class, 'details'])
        ->name('devis.detail');

    Route::post('facturation', [FactureController::class, 'store'])
        ->name('facture.store');

    Route::post('ma-facture', [FactureController::class, 'show'])
        ->name('facture.show');

    Route::post('transporteur/facture/{id}', [FactureController::class, 'show'])
        ->name('transporteur.facture.show');

    Route::post('payer-facture', [FactureController::class, 'payer'])
        ->name('payerFacture');

    Route::post('redirect-ipn',[FactureController::class,'redirect'])->name('redirect.ipn');

    /*
    **/

    Route::get('testNotif', [FCMController::class, 'test'])
        ->name('test');

    Route::post('save-fcm-token', [FCMController::class, 'save_fcm_token'])
        ->name('token.store');


    /*
    **/

    Route::resource('messages', MessageController::class);
    Route::resource('reponses', ReponseController::class);

    /**
     * 
     */
    Route::post('ajouter-vehicule', [CamionController::class, 'store'])
        ->name('vehicules.store');

    Route::post('supprimer-vehicule', [CamionController::class, 'delete'])
        ->name('vehicules.delete');

    Route::post('modifier-vehicule', [CamionController::class, 'update'])
        ->name('vehicules.update');

    /**
     * 
     */

    Route::get('/all-transporteurs', function () {
        if (null !== ($user = Auth::user())) {
            if (User::ADMIN == $user->role_id)
                return view('admin.pages.tranporteurs.liste_transporteurs');
            else
                return redirect()->route('dashboard')->withErrors('404 not found');
        } else {
            return redirect()->route('login');
        }
    })->name('admin.transporteurs.all');

    /**
     * 
     */
    Route::get('/all-expediteurs', function () {
        if (null !== ($user = Auth::user())) {
            if (User::ADMIN == $user->role_id)
                return view('admin.pages.expediteurs.liste');
            else
                return redirect()->route('dashboard')->withErrors('404 not found');
        } else {
            return redirect()->route('login');
        }
    })->name('admin.expediteurs.all');

    /**
     * 
     */
    Route::get('/transporteur/{id}', function ($id) {
        if (null !== ($user = Auth::user())) {
            if (User::ADMIN == $user->role_id) {
                $transporteur = Transporteur::find($id);
                return view('admin.pages.tranporteurs.detail_transporteur', compact('transporteur'));
            } else
                return redirect()->route('dashboard')->withErrors('404 not found');
        } else {
            return redirect()->route('login');
        }
    })->name('admin.transporteur.detail');

    /**
     * 
     */
    Route::get('/expediteur/{id}', function ($id) {
        if (null !== ($user = Auth::user())) {
            if (User::ADMIN == $user->role_id) {
                $expediteur = Expediteur::find($id);
                return view('admin.pages.expediteurs.detail', compact('expediteur'));
            } else
                return redirect()->route('dashboard')->withErrors('404 not found');
        } else {
            return redirect()->route('login');
        }
    })->name('admin.expediteur.detail');

    /**
     * 
     */
    Route::post('/aprouver-camion', function (Request $request) {
        if (null !== ($user = Auth::user())) {
            if (User::ADMIN == $user->role_id) {
                $camion = Camion::find($request->id);
                $camion->est_approuve = true;
                $camion->save();
                $message = "Vous avez approuver ce camion avec succes";
                $message_type = 'success';
                return redirect()->back()->with(['message' => $message, 'message_type' => $message_type]);
            } else
                return redirect()->route('dashboard')->withErrors('404 not found');
        } else {
            return redirect()->route('login');
        }
    })->name('admin.transporteur.approuver-camion');
});

/**
 * 
 */
Route::get('/noscript', function () {
    if (null !== ($user = Auth::user())) {
        switch ($user->role_id) {
            case User::ADMIN:
            case User::EXPEDITEUR:
            case User::TRANSPORTEUR:
                return view('notFound');
                break;
            default:
                return redirect()->route('login');
                break;
        }
    }
    else {
        return redirect()->route('login');
    }

})->middleware(['auth'])->name('noscript');
Route::get('/getMatieres',function(){
    if (null !== ($user = Auth::user())) {
        if($user->role_id==User::TRANSPORTEUR){
            // $transporteur=Transporteur::where('user_id',$user->id)->first();
            $matieres=Matiere::with('expeditions')->get();

            return $matieres;
        }
        else{
            return view('notFound');
        }
    }
    else {
        return redirect()->route('login');
    }
});

require __DIR__ . '/auth.php';
