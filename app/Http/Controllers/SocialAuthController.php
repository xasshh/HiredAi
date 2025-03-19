<?php


namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google Callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'email' => $googleUser->getEmail(),
            ], [
                'name' => $googleUser->getName(),
                'password' => bcrypt('defaultpassword'), // Default password (optional)
            ]);

            Auth::login($user);
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong.');
        }
    }

    // Redirect to LinkedIn
    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    // Handle LinkedIn Callback
    public function handleLinkedInCallback()
    {
        try {
            $linkedinUser = Socialite::driver('linkedin')->user();

            $user = User::updateOrCreate([
                'email' => $linkedinUser->getEmail(),
            ], [
                'name' => $linkedinUser->getName(),
                'password' => bcrypt('defaultpassword'), // Default password (optional)
            ]);

            Auth::login($user);
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong.');
        }
    }
}
