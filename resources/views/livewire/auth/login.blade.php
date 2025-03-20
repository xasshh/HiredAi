
<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hired AI - AI-Powered Job Matching Platform</title>
        <!-- Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('frontend/css/login.css') }}" rel="stylesheet">    
        <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet">  
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar">
            <div class="logo">
                <h1>Hired AI</h1>
            </div>
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li class="dropdown">
                    <a href="#features">Features <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-content">
                        <li><a href="#resume-parsing">Resume Parsing</a></li>
                        <li><a href="#ai-scoring">AI Scoring</a></li>
                        <li><a href="#job-matching">Job Matching</a></li>
                        <li><a href="#application-tracker">Application Tracker</a></li>
                        <li><a href="#community">Community</a></li>
                        <li><a href="#admin-dashboard">Admin Dashboard</a></li>
                    </ul>
                </li>
                <li><a href="#jobs">Jobs</a></li>
                <li><a href="#community">Community</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#login" class="login-btn">Login</a></li>
            </ul>
        </nav>
    <section class="login-section">
        <div class="login-container">
            <div class="login-header">
                <h2>Hired AI</h2>
                <p>Sign in to continue to your account</p>
            </div>
            
            <form wire:submit="login" class="login-form">
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" wire:model="email" placeholder="Enter your email" required autofocus autocomplete="email">
                    </div>
                    @error('email') 
                        <span class="error-message">{{ $message }}</span> 
                    @enderror
                </div>
                
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" wire:model="password" placeholder="Enter your password" required autocomplete="current-password">
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password') 
                        <span class="error-message">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" wire:model="remember">
                        <span>Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                    @endif
                </div>
                @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                
                <!-- Submit Button -->
                <button type="submit" class="login-btn">Sign In</button>
                
                <!-- Social Login -->
                <div class="social-login">
                    <p>Or continue with</p>
                    <div class="social-buttons">
                        <a href="{{ url('/auth/google') }}" class="social-btn google">
                            <i class="fab fa-google"></i> Google
                        </a>
                        <a href="{{ url('/auth/linkedin/redirect') }}" class="social-btn linkedin">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </a>
                    </div>
                </div>
                
                <!-- Sign Up Link -->
                @if (Route::has('register'))
                    <div class="signup-link">
                        <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                @endif
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Hired AI</h3>
                <p>Revolutionizing job search with AI technology</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#jobs">Jobs</a></li>
                    <li><a href="#community">Community</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <ul>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#privacy">Privacy Policy</a></li>
                    <li><a href="#terms">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 X.OTECH Web Solutions. All rights reserved.</p>
        </div>
    </footer>
</div>
  <!-- Custom JavaScript -->
  <script src="{{ asset('frontend/js/login.js') }}"></script>
  <script src="{{ asset('frontend/js/script.js') }}"></script>

</body>
</html>