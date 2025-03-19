
<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
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
        
        <link href="{{ asset('frontend/css/signup.css') }}" rel="stylesheet">     
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

    <section class="signup-section">
        <div class="signup-container">
            <div class="signup-header">
                <h2>Create Your Account</h2>
                <p>Join Hired AI and start your career journey</p>
            </div>

            <form wire:submit.prevent="register" class="signup-form">
                <!-- Full Name -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" id="name" wire:model="name" placeholder="Enter your full name" required>
                    </div>
                    @error('name') 
                        <span class="error-message">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" wire:model="email" placeholder="Enter your email" required>
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
                        <input type="password" id="password" wire:model="password" placeholder="Create a password" required>
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password') 
                        <span class="error-message">{{ $message }}</span> 
                    @enderror
                </div>
                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password_confirmation" wire:model="password_confirmation" placeholder="Confirm your password" required>
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password_confirmation') 
                        <span class="error-message">{{ $message }}</span> 
                    @enderror
                </div>
                <!-- Terms & Conditions -->
                <div class="form-group terms-group">
                    <label class="terms-label">
                        <input type="checkbox" wire:model="terms" required>
                        <span>I agree to the <a href="#terms">Terms of Service</a> and <a href="#privacy">Privacy Policy</a></span>
                    </label>
                    @error('terms') 
                        <span class="error-message">{{ $message }}</span> 
                    @enderror
                </div>
                <!-- Submit Button -->
                <button type="submit" class="signup-btn">Create Account</button>

                <!-- Social Signup -->
                <div class="social-signup">
                    <p>Or sign up with</p>
                    <div class="social-buttons">
                        <a href="{{ url('/auth/google/redirect') }}" class="social-btn google">
                            <i class="fab fa-google"></i> Google
                        </a>
                        <a href="{{ url('/auth/linkedin/redirect') }}" class="social-btn linkedin">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </a>
                    </div>
                </div>
                <!-- Login Link -->
                <div class="login-link">
                    <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                </div>
                
@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session('error') }}
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
  <script src="{{ asset('frontend/js/signup.js') }}"></script>
  <script src="{{ asset('frontend/js/script.js') }}"></script>

</body>
</html>