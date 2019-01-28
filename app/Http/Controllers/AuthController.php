<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    //separate controller for auth maybe?
    protected $spotify;

    public function redirectToProvider()
    {
        return Socialite::driver('spotify')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('spotify')->user();

        // dd($user);
        return redirect()->action('SpotifyController@fetchProfile', ['token' => $user->token]);
        return response()->json($user);
    }

    
}
