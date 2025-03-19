<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/auth/{provider}/redirect', function ($provider) {
    return Socialite::driver($provider)->redirect();
});

Route::get('/auth/{provider}/callback', function ($provider) {
    $socialUser = Socialite::driver($provider)->user();

    $user = User::updateOrCreate([
        'email' => $socialUser->getEmail(),
    ], [
        'name' => $socialUser->getName(),
        'provider_id' => $socialUser->getId(),
        'provider' => $provider,
        'password' => bcrypt(str()->random(24)), // Random password
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});
use App\Http\Controllers\AuthController;

Route::get('auth/linkedin', [AuthController::class, 'redirectToLinkedIn'])->name('linkedin.login');
Route::get('auth/linkedin/callback', [AuthController::class, 'handleLinkedInCallback']);


use App\Http\Controllers\Auth\SocialAuthController;

Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::get('/auth/linkedin', [SocialAuthController::class, 'redirectToLinkedIn']);
Route::get('/auth/linkedin/callback', [SocialAuthController::class, 'handleLinkedInCallback']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
