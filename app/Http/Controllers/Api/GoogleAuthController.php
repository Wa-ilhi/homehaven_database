<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    // test google api

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);

                Auth::login($new_user);

                return redirect()->intended('/dashboard');
            } else {
                Auth::login($user);

                return redirect()->intended('/dashboard');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong ' . $th->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login'); // Redirect to the home page or any desired URL after logout
    }
}
