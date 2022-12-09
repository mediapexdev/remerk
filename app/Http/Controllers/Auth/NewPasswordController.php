<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function recreate(Request $request)
    {
        $request->validate([
            'phone'         => ['required', 'regex:#(^3[3]|^7[5-80])[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#', 'exists:users']
        ]);
        $user = User::where('phone', $request['phone'])->first();
        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'phone' => $request->phone,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        return view('auth.reset-password', compact('request', 'token'));
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'token'         => 'required',
            'phone'         => ['required', 'regex:#(^3[3]|^7[5-80])[ ]?[0-9]{3}([ ]?[0-9]{2}){2}$#', 'exists:users'],
            'password'      => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        // Nouveau model de réinitialisation du mot de passe

        $updated_password = DB::table('password_resets')->where([
            'phone' => $request->phone,
            'token' => $request->token
        ])->first();

        if(!$updated_password) {
            return back()->withInput($request->only('phone'))
                ->withErrors(['phone' => 'Invalid token !']);
        }
        $user = User::where('phone', $request->phone)->first();

        $user->update([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);
        DB::table('password_resets')->where(['phone' => $request->phone])->delete();

        // Toastr::success('We have e-mailed your password reset link! :)','Success');

        $message = "Votre mot de passe a été changé avec succès !";
        $message_type = 'success';

        return redirect()->route('login')->with(['message' => $message, 'message_type' => $message_type]);
    }
}
