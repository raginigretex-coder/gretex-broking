// Enhanced interactions and animations for Protex website
document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('.nav-menu a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Button click handlers
    const requestDemoButtons = document.querySelectorAll('.request-demo-btn, .btn-primary');
    const discoverMoreButton = document.querySelector('.btn-secondary');

    requestDemoButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
            
            // Demo request logic would go here
            console.log('Demo requested');
            
            // Show a subtle notification (you can customize this)
            showNotification('Demo request sent! We\'ll contact you soon.');
        });
    });

    if (discoverMoreButton) {
        discoverMoreButton.addEventListener('click', function() {
            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
            
            // Scroll to more content or show modal
            console.log('Discover more clicked');
            showNotification('More information coming soon!');
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

    // Add hover effects to buttons
    const allButtons = document.querySelectorAll('button');
    allButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe animated elements
    const animatedElements = document.querySelectorAll('.trust-badge, .hero-title, .hero-description, .cta-buttons');
    animatedElements.forEach(el => observer.observe(el));

    // Simple notification system
    function showNotification(message) {
        // Remove existing notification
        const existingNotification = document.querySelector('.notification');
        if (existingNotification) {
            existingNotification.remove();
        }

        // Create notification
        const notification = document.createElement('div');
        notification.className = 'notification';
        notification.textContent = message;
        
        // Style the notification
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            backgroundColor: '#22c55e',
            color: '#0a0f0a',
            padding: '1rem 1.5rem',
            borderRadius: '6px',
            fontWeight: '500',
            fontSize: '0.9rem',
            zIndex: '10000',
            transform: 'translateX(100%)',
            transition: 'transform 0.3s ease',
            boxShadow: '0 10px 25px rgba(34, 197, 94, 0.3)'
        });

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        // Animate out and remove
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }

    // Add subtle glow effect to trust badge
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
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });
});

// Add CSS for keyboard navigation
const style = document.createElement('style');
style.textContent = `
    .keyboard-navigation button:focus,
    .keyboard-navigation a:focus {
        outline: 2px solid #22c55e;
        outline-offset: 2px;
    }
    
    .notification {
        cursor: pointer;
    }
    
    .notification:hover {
        transform: translateX(-5px) !important;
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
    console.log('DOM loaded, setting up register button handlers for protex.js...');
    
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