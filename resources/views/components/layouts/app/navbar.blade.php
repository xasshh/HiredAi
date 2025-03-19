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
  <!-- Custom JavaScript -->
  <script src="{{ asset('frontend/js/login.js') }}"></script>

</body>
</html>