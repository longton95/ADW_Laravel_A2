<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }
    public function findOrCreateUser($user, $provider)
    {
         $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        if ($provider === 'google') {
            return User::create([
           'firstName'=> $user->user['name']['givenName'],
           'lastName'=> $user->user['name']['familyName'],
           'email'    => $user->email,
           'provider' => $provider,
           'role' => 'user',
           'provider_id' => $user->id
       ]);
        } else {
            return User::create([
            'firstName'=> $user->name,
            'lastName'=> '',
            'email'    => $user->email,
            'provider' => $provider,
            'role' => 'user',
            'provider_id' => $user->id
         ]);
        }
    }
}
