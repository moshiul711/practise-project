<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
class PractiseController extends Controller
{
    public function index()
    {
        return view('practise.index');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $social_user = Socialite::driver($provider)->user();

        $user = User::updateOrCreate([
            'provider_id' => $social_user->id,
            'provider' => $provider
        ], [
            'name' => $social_user->name,
            'email' => $social_user->email,
            'provider_token' => $social_user->token,
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
