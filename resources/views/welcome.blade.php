<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <!-- Styles / Scripts -->
        
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hired AI - AI-Powered Job Matching Platform</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
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
            <li><a href="#home">Home</a></li>
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
            <li><a href="{{ route('login') }}" class="login-btn">Login</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="hero-content">
            <h1>Transform Your Job Search with AI</h1>
            <p>Experience the future of job matching with our AI-powered platform that connects you with your perfect career opportunity.</p>
            <div class="cta-buttons">
                <a href="#upload" class="primary-btn">Upload Resume & Get Matched</a>
                <a href="#review" class="secondary-btn">Try AI Resume Review</a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="how-it-works">
        <h2>How It Works</h2>
        <div class="steps-container">
            <div class="step">
                <i class="fas fa-file-upload"></i>
                <h3>Upload Resume</h3>
                <p>Upload your resume in PDF or DOCX format</p>
            </div>
            <div class="step">
                <i class="fas fa-robot"></i>
                <h3>AI Analysis</h3>
                <p>Get instant feedback and optimization tips</p>
            </div>
            <div class="step">
                <i class="fas fa-search"></i>
                <h3>Job Matching</h3>
                <p>Find jobs that match your profile</p>
            </div>
            <div class="step">
                <i class="fas fa-tasks"></i>
                <h3>Track Applications</h3>
                <p>Monitor your application status</p>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section id="features" class="features">
        <h2>Our Key Features</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-file-alt"></i>
                <h3>Resume Parsing</h3>
                <p>Automatically extract key details from your resume</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-star"></i>
                <h3>AI Scoring</h3>
                <p>Get instant feedback on your resume strength</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-handshake"></i>
                <h3>Job Matching</h3>
                <p>Find the perfect job matches based on your profile</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-calendar-check"></i>
                <h3>Application Tracker</h3>
                <p>Keep track of all your job applications</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-users"></i>
                <h3>Community</h3>
                <p>Connect with professionals and mentors</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-chart-line"></i>
                <h3>Admin Dashboard</h3>
                <p>Employer tools for job posting and candidate filtering</p>
            </div>
        </div>
    </section>

    <!-- Success Stories Section -->
    <section id="testimonials" class="testimonials">
        <h2>Success Stories</h2>
        <div class="testimonials-container">
            <div class="testimonial-card">
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>"I landed my dream job at Google thanks to JobSync AI's intelligent matching system!"</p>
                <div class="testimonial-author">
                    <img src="https://via.placeholder.com/50" alt="User">
                    <div>
                        <h4>Sarah Johnson</h4>
                        <p>Software Engineer at Google</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>"The AI feedback helped me optimize my resume and stand out to employers."</p>
                <div class="testimonial-author">
                    <img src="https://via.placeholder.com/50" alt="User">
                    <div>
                        <h4>Michael Chen</h4>
                        <p>Product Manager at Microsoft</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Section -->
    <section id="community" class="community">
        <h2>Join Our Professional Community</h2>
        <div class="community-content">
            <div class="community-text">
                <p>Connect with industry professionals, share experiences, and grow your network.</p>
                <ul class="community-features">
                    <li><i class="fas fa-check"></i> Professional networking</li>
                    <li><i class="fas fa-check"></i> Mentor matching</li>
                    <li><i class="fas fa-check"></i> Industry insights</li>
                    <li><i class="fas fa-check"></i> Career guidance</li>
                </ul>
            </div>
            <div class="community-preview">
                <div class="preview-card">
                    <h4>Featured Discussion</h4>
                    <p>How to ace technical interviews</p>
                    <span>2.5k members discussing</span>
                </div>
                <div class="preview-card">
                    <h4>Top Mentor</h4>
                    <p>David Smith - Tech Lead at Amazon</p>
                    <span>Helped 500+ professionals</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section id="cta" class="cta-section">
        <h2>Ready to Transform Your Career?</h2>
        <p>Join thousands of professionals who found their dream jobs with JobSync AI</p>
        <div class="cta-form">
            <input type="email" placeholder="Enter your email">
            <button class="primary-btn">Get Started for Free</button>
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
    <!-- Custom JavaScript -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>

</body>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
