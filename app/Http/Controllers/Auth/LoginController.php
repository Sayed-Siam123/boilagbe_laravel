<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite as Socialite;
use Illuminate\Support\Facades\Auth;
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

    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user,$provider);
        Auth::login($authUser,true);
        return redirect($this->redirectTo);
        //return $user->token;

    }

    public function findOrCreateUser($user,$provider){

        $authUser = User::where('provider_id',$user->id)->first();
        if($authUser){
            return $authUser;
        }
        return User::create([
            'name'   => $user->name,
            'email'   => $user->email,
//            'location' => 'Enter your location',
//            'phone' => '0',
            'provider'   => strtoupper($provider),
            'provider_id'   => $user->id,
        ]);

    }

}
