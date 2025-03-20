<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function googlepage()
    {
        return socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        $user = Socialite::driver('google')->user();
    
        // Update user if exists, otherwise create a new one
        $existingUser = User::where('email', $user->email)->first();
        if (!$existingUser) {
            User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => bcrypt(Str::random(16)),
            ]);
        } else {
            // Update Google ID if it's missing
            if (!$existingUser->google_id) {
                $existingUser->update(['google_id' => $user->id]);
            }
        }
        Auth::login($existingUser);
        return redirect('/dashboard');
    }
    
}
