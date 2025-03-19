document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    const dropdowns = document.querySelectorAll('.dropdown');

    // Toggle mobile menu
    mobileMenuBtn.addEventListener('click', function() {
        navLinks.classList.toggle('active');
        // Change menu icon
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
    });

    // Handle dropdowns in mobile view
    dropdowns.forEach(dropdown => {
        const link = dropdown.querySelector('a');
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                dropdown.classList.toggle('active');
            }
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!navLinks.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
            navLinks.classList.remove('active');
            const icon = mobileMenuBtn.querySelector('i');
            icon.classList.add('fa-bars');
            icon.classList.remove('fa-times');
            // Close all dropdowns
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        }
    });

    // Close mobile menu when clicking a link
    const navLinksItems = document.querySelectorAll('.nav-links a');
    navLinksItems.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                navLinks.classList.remove('active');
                const icon = mobileMenuBtn.querySelector('i');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            }
        });
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            navLinks.classList.remove('active');
            const icon = mobileMenuBtn.querySelector('i');
            icon.classList.add('fa-bars');
            icon.classList.remove('fa-times');
            // Reset dropdowns
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.signup-form');
    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="confirm_password"]');
    const strengthBar = document.querySelector('.strength-bar');
    const strengthText = document.querySelector('.strength-text span');
    const togglePasswordBtn = document.querySelector('.toggle-password');
    const toggleConfirmPasswordBtn = document.querySelector('.toggle-confirm-password');

    // Password visibility toggle
    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    toggleConfirmPasswordBtn.addEventListener('click', function() {
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // Password strength checker
    function checkPasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength++;
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
        if (password.match(/\d/)) strength++;
        if (password.match(/[^a-zA-Z\d]/)) strength++;

        return strength;
    }

    function updatePasswordStrength(password) {
        const strength = checkPasswordStrength(password);
        strengthBar.className = 'strength-bar';
        strengthText.textContent = '';

        if (password.length === 0) {
            strengthText.textContent = 'Enter a password';
            return;
        }

        switch (strength) {
            case 0:
            case 1:
                strengthBar.classList.add('weak');
                strengthText.textContent = 'Weak';
                strengthText.style.color = '#ef4444';
                break;
            case 2:
            case 3:
                strengthBar.classList.add('medium');
                strengthText.textContent = 'Medium';
                strengthText.style.color = '#f59e0b';
                break;
            case 4:
                strengthBar.classList.add('strong');
                strengthText.textContent = 'Strong';
                strengthText.style.color = '#10b981';
                break;
        }
    }

    passwordInput.addEventListener('input', function() {
        updatePasswordStrength(this.value);
    });

    // Form validation
    function validateForm() {
        const fullName = document.querySelector('input[name="full_name"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const terms = document.querySelector('input[name="terms"]').checked;

        let isValid = true;
        let errorMessage = '';

        // Full name validation
        if (fullName.trim().length < 2) {
            isValid = false;
            errorMessage += 'Please enter a valid full name\n';
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            isValid = false;
            errorMessage += 'Please enter a valid email address\n';
        }

        // Password validation
        if (checkPasswordStrength(password) < 3) {
            isValid = false;
            errorMessage += 'Password is too weak. Please use a stronger password\n';
        }

        // Confirm password validation
        if (password !== confirmPassword) {
            isValid = false;
            errorMessage += 'Passwords do not match\n';
        }

        // Terms validation
        if (!terms) {
            isValid = false;
            errorMessage += 'Please agree to the Terms and Conditions\n';
        }

        if (!isValid) {
            alert(errorMessage);
        }

        return isValid;
    }

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        if (!validateForm()) {
            return;
        }

        // Get form data
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        // Here you would typically send the data to your backend
        console.log('Form submitted:', data);

        // Show success message (replace with actual API call)
        alert('Account created successfully! Please check your email to verify your account.');
        window.location.href = 'login.html';
    });

    // Social sign up handlers
    document.querySelector('.google-btn').addEventListener('click', function() {
        console.log('Google sign up clicked');
        // Implement Google sign up
    });

    document.querySelector('.linkedin-btn').addEventListener('click', function() {
        console.log('LinkedIn sign up clicked');
        // Implement LinkedIn sign up
    });
}); 