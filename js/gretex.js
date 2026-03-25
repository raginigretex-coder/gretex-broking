// Enhanced interactions and animations for Gretex website
document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('.nav-menu a, .footer-section a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Button click handlers
    const requestDemoButtons = document.querySelectorAll('.register-btn, .btn-primary');
    const discoverMoreButton = document.querySelector('.btn-secondary');
    const downloadButtons = document.querySelectorAll('.download-btn');
    const loginButton = document.querySelector('.login-btn');

    // Request demo functionality
    requestDemoButtons.forEach(button => {
        button.addEventListener('click', function() {
            addClickAnimation(this);
            showNotification('Demo request sent! We\'ll contact you soon.', 'success');
        });
    });

    // Discover more functionality
    if (discoverMoreButton) {
        discoverMoreButton.addEventListener('click', function() {
            addClickAnimation(this);
            const aboutSection = document.querySelector('#about');
            if (aboutSection) {
                const offsetTop = aboutSection.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    }

    // Download functionality
    downloadButtons.forEach(button => {
        button.addEventListener('click', function() {
            addClickAnimation(this);
            const cardTitle = this.parentElement.querySelector('h3').textContent;
            showNotification(`${cardTitle} download started!`, 'success');
        });
    });

    // Login functionality
    if (loginButton) {
        loginButton.addEventListener('click', function() {
            addClickAnimation(this);
            showNotification('Login functionality coming soon!', 'info');
        });
    }

    // Contact form submission
    const contactForm = document.querySelector('.contact-form form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const name = this.querySelector('input[type="text"]').value;
            const email = this.querySelector('input[type="email"]').value;
            const subject = this.querySelectorAll('input[type="text"]')[1].value;
            const message = this.querySelector('textarea').value;
            
            // Validate form
            if (!name || !email || !subject || !message) {
                showNotification('Please fill in all fields.', 'error');
                return;
            }
            
            // Simulate form submission
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                this.reset();
                showNotification('Message sent successfully! We\'ll get back to you soon.', 'success');
            }, 2000);
        });
    }

    // Parallax effect for grid background
    let ticking = false;
    
    function updateParallax() {
        const scrolled = window.pageYOffset;
        const gridBackground = document.querySelector('.grid-background');
        
        if (gridBackground) {
            const speed = scrolled * 0.1;
            gridBackground.style.transform = `translate(${speed}px, ${speed}px)`;
        }
        
        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateParallax);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick);

    // Navbar background opacity on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        const scrolled = window.pageYOffset;
        
        if (scrolled > 50) {
            navbar.style.backgroundColor = 'rgba(10, 15, 10, 0.98)';
        } else {
            navbar.style.backgroundColor = 'rgba(10, 15, 10, 0.95)';
        }
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                
                // Stagger animations for cards
                if (entry.target.classList.contains('about-grid') || 
                    entry.target.classList.contains('services-grid') || 
                    entry.target.classList.contains('downloads-grid')) {
                    
                    const cards = entry.target.children;
                    Array.from(cards).forEach((card, index) => {
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, index * 200);
                    });
                }
            }
        });
    }, observerOptions);

    // Observe animated elements
    const animatedElements = document.querySelectorAll(
        '.section-header, .about-grid, .services-grid, .downloads-grid, .contact-grid'
    );
    animatedElements.forEach(el => observer.observe(el));

    // Initialize card animations
    const cards = document.querySelectorAll('.about-card, .service-card, .download-card');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });

    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll(
        'button, .about-card, .service-card, .download-card, .contact-item'
    );
    
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            if (this.classList.contains('about-card') || 
                this.classList.contains('service-card') || 
                this.classList.contains('download-card')) {
                this.style.transform = 'translateY(-10px)';
            }
        });
        
        element.addEventListener('mouseleave', function() {
            if (this.classList.contains('about-card') || 
                this.classList.contains('service-card') || 
                this.classList.contains('download-card')) {
                this.style.transform = 'translateY(-5px)';
            }
        });
    });

    // Add glow effect to trust badge
    const trustBadge = document.querySelector('.trust-badge');
    if (trustBadge) {
        setInterval(() => {
            trustBadge.style.boxShadow = '0 0 20px rgba(34, 197, 94, 0.3)';
            setTimeout(() => {
                trustBadge.style.boxShadow = '';
            }, 1000);
        }, 5000);
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
        
        // ESC key to close notifications
        if (e.key === 'Escape') {
            const notifications = document.querySelectorAll('.notification');
            notifications.forEach(notification => {
                notification.remove();
            });
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });

    // Utility functions
    function addClickAnimation(element) {
        element.style.transform = 'scale(0.95)';
        setTimeout(() => {
            element.style.transform = '';
        }, 150);
    }

    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notification => {
            notification.remove();
        });

        // Create notification
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        // Style based on type
        const colors = {
            success: { bg: '#22c55e', text: '#0a0f0a' },
            error: { bg: '#ef4444', text: '#ffffff' },
            info: { bg: '#3b82f6', text: '#ffffff' }
        };
        
        const color = colors[type] || colors.info;
        
        // Style the notification
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            backgroundColor: color.bg,
            color: color.text,
            padding: '1rem 1.5rem',
            borderRadius: '6px',
            fontWeight: '500',
            fontSize: '0.9rem',
            zIndex: '10000',
            transform: 'translateX(100%)',
            transition: 'transform 0.3s ease',
            boxShadow: `0 10px 25px ${color.bg}30`,
            cursor: 'pointer',
            maxWidth: '300px'
        });

        // Add close functionality
        notification.addEventListener('click', function() {
            this.style.transform = 'translateX(100%)';
            setTimeout(() => {
                this.remove();
            }, 300);
        });

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }
        }, 5000);
    }

    // Form input animations
    const formInputs = document.querySelectorAll('input, textarea');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // Loading animation for the page
    window.addEventListener('load', function() {
        document.body.classList.add('loaded');
    });
});

// Add CSS for enhanced animations
const style = document.createElement('style');
style.textContent = `
    .keyboard-navigation button:focus,
    .keyboard-navigation a:focus,
    .keyboard-navigation input:focus,
    .keyboard-navigation textarea:focus {
        outline: 2px solid #22c55e;
        outline-offset: 2px;
    }
    
    .notification {
        cursor: pointer;
    }
    
    .notification:hover {
        transform: translateX(-5px) !important;
    }
    
    .loaded .hero-content > * {
        animation-play-state: running;
    }
    
    .animate-in {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
`;
document.head.appendChild(style);
// Initialize Lucide icons
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
// Register Button Handler
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, setting up register button handlers for gretex.js...');
    
    // Handle Register button clicks
    const registerButtons = document.querySelectorAll('.register-btn');
    console.log('Found register buttons:', registerButtons.length);
    
    registerButtons.forEach((button, index) => {
        console.log(`Setting up handler for register button ${index + 1}:`, button);
        button.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Register button clicked!');
            
            // Add loading state
            const originalText = this.textContent;
            this.textContent = 'Opening...';
            this.style.opacity = '0.7';
            
            // Open the onboarding page
            console.log('Opening onboarding page...');
            window.open('https://onboarding.gretexbroking.com:8080/OnBoarding/', '_blank');
            
            // Reset button after a short delay
            setTimeout(() => {
                this.textContent = originalText;
                this.style.opacity = '1';
                console.log('Button reset to original state');
            }, 1000);
        });
    });
});