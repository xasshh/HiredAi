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

            // Check if user exists
            $existingUser = User::where('google_id', $user->id)->first();
            
            if (!$existingUser) {
                // If user does not exist, create a new one
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id, // Store Google ID as a string, not JSON
                    'password' => bcrypt(Str::random(16)), // Generate a random password
                ]);
            
                Auth::login($newUser);
            } else {
                Auth::login($existingUser);
            }
            
            return redirect('/dashboard'); // Redirect user after login
                  
    }
}
