<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\SocialProvider;
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


    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try
        {
            $socialUser = Socialite::driver('facebook')->user();
            $email = $socialUser->getEMail();
            if(is_null($email))
                $email = $socialUser->getName().'@facebook.com';

        }
        catch(Exception $e){
            return redirect('/');
        }

        $socialProvider=SocialProvider::where('provider_id',$socialUser->getId())->first();


        if(!$socialProvider)
        {
            $user=User::firstOrCreate([

                'email'=>$email,
                'name'=>$socialUser->getName(),
                'profile_image'=> $socialUser->getAvatar(),

            ]);

            $provider = socialProvider::Create([
                'provider_id'=>$socialUser->getId(),
                'provider'=>'facebook',
                'user_id'=>$user->id,

            ]);
        }
        else
        {
            $user=$socialProvider->user;
        }

        auth()->login($user);

        if(Auth::user()->type == 'student')
            return redirect()->route('student');
        else
            return redirect()->route('institution');

    }
}
