<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SocialUser;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function socialLogin($provider)
    {
        // return Socialite::driver($provider)->scopes(['email', 'public_profile', 'user_friends'])->redirect();
        return Socialite::driver($provider)->redirect();
    }


    public function loginCallback($provider)
    {
        // user data from social network
        $callbackUser = Socialite::driver($provider)->user();
        if ($callbackUser->getEmail() == null){
            return redirect('login')->with('warning', "Your $provider do not have email address!");
        }

        // find associated info
        $socialUser = SocialUser::whereSocialId($callbackUser->getId())
            ->whereSocial($provider)
            ->first();
        if (empty($socialUser)){
            // find exists user
            $user = User::whereEmail($callbackUser->getEmail())->first();
            if (empty($user)){
                // create new user if not exists
                $user = User::create([
                    'name' => $callbackUser->getName(),
                    'nickname' => $callbackUser->getNickname(),
                    'email' => $callbackUser->getEmail(),
                    'avatar' => $callbackUser->getAvatar(),
                    // 'gender' => $callbackUser->getGender()
                ]);
            }
            $socialUser = SocialUser::create([
                'user_id' => $user->id,
                'social_id' => $callbackUser->getId(),
                'social' => $provider
            ]);
        }
        Auth::loginUsingId($socialUser->user_id, true);
        return redirect('home');
    }



}
