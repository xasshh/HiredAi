{{-- <x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
    </div>
</x-layouts.app> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet">    
    <link href="{{ asset('frontend/css/profile.css') }}" rel="stylesheet">    
</head>
<body>

     <!-- Add menu toggle button -->
     <button class="menu-toggle" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="container">
        <!-- Left Sidebar -->
        <aside class="sidebar" id="sidebar">
            <h4>Hired AI</h4>
            <nav>
                <ul class="nav-list">
                    <li><a href="#" class="active">Dashboard</a></li>
                    <li><a href="#">My Resume</a></li>
                    <li><a href="#">Job Matches</a></li>
                    <li><a href="#">Saved Jobs</a></li>
                    <li><a href="#">Application Tracker</a></li>
                    <li><a href="#">Community & Networking</a></li>
                    <li>
                        <a href="{{ route('settings.profile') }}" class="px-4 py-2 flex items-center">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button  class="w-full text-left px-4 py-2 text-red-500 hover:text-red-700">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                    
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Intro Section -->
            <section class="intro-section">
                <div class="profile-image">
                    <img src="images/profile.jpg" alt="Profile Image">
                </div>
                <h2>Welcome, <span class="truncate font-semibold">{{ auth()->user()->name }}</span></h2>
                <h2>{{ auth()->user()->email }}</span></h2>
                <div class="card">
                    <h5>Profile Progress</h5>
                    <div class="progress-container">
                        <div class="progress-bar" data-progress="75"></div>
                    </div>
                    <small>Complete your profile to boost job matches</small>
                </div>
            </section>

            <!-- Resume Overview Section -->
            <section class="resume-section">
                <h3>Resume Overview</h3>
                <div class="card">
                    <div class="resume-grid">
                        <div class="score-box">
                            <h4>AI Score</h4>
                            <h2 class="score">85/100</h2>
                        </div>
                        <div class="feedback-box">
                            <h4>Feedback</h4>
                            <p>Strong technical skills, needs more project details</p>
                        </div>
                        <div class="action-box">
                            <button class="btn primary">Update Resume</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Job Recommendations Section -->
            <section class="jobs-section">
                <h3>Job Recommendations</h3>
                <div class="jobs-grid">
                    <div class="card">
                        <h5>Software Engineer</h5>
                        <p class="company">Google</p>
                        <button class="btn secondary">View Details</button>
                    </div>
                </div>
            </section>

            <!-- Application Tracker Section -->
            <section class="tracker-section">
                <h3>Application Tracker</h3>
                <div class="tracker-grid">
                    <div class="card">
                        <div class="header success">Interview Scheduled</div>
                        <div class="content">
                            <p>Job at Microsoft</p>
                            <p>Job at Amazon</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header warning">Under Review</div>
                        <div class="content">
                            <p>Job at Apple</p>
                            <p>Job at Meta</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header danger">Rejected</div>
                        <div class="content">
                            <p>Job at Netflix</p>
                            <p>Job at Twitter</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Community Section -->
            <section class="community-section">
                <h3>Community & Networking</h3>
                <div class="community-grid">
                    <div class="card">
                        <h5>Tech Interview Prep</h5>
                        <p class="members">1.2k members</p>
                        <a href="#" class="btn secondary">View Discussion</a>
                    </div>
                    <div class="card">
                        <h5>Resume Review</h5>
                        <p class="members">856 members</p>
                        <a href="#" class="btn secondary">View Discussion</a>
                    </div>
                    <div class="card">
                        <h5>Career Switch</h5>
                        <p class="members">2.3k members</p>
                        <a href="#" class="btn secondary">View Discussion</a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    
    <script src="{{ asset('frontend/js/chart.js') }}"></script>
</body>
</html>