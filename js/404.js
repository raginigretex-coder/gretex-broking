// 404 Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Log the attempted URL
    const attemptedUrl = window.location.href;
    console.log('404 Error - Attempted URL:', attemptedUrl);
    
    // Add keyboard navigation
    document.addEventListener('keydown', function(e) {
        // Press 'H' to go home
        if (e.key === 'h' || e.key === 'H') {
            window.location.href = 'gretex-financial.php';
        }
        
        // Press 'B' or Backspace to go back
        if (e.key === 'b' || e.key === 'B') {
            history.back();
        }
        
        // Press Escape to go home
        if (e.key === 'Escape') {
            window.location.href = 'gretex-financial.php';
        }
    });
    
    // Add hover effect to warning graphic
    const warningSvg = document.querySelector('.warning-svg');
    if (warningSvg) {
        warningSvg.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        warningSvg.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    }
    
    // Add click animation to buttons
    const buttons = document.querySelectorAll('.btn-home, .btn-back');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // Track 404 errors (you can send this to analytics)
    function track404Error() {
        const errorData = {
            url: attemptedUrl,
            referrer: document.referrer,
            timestamp: new Date().toISOString(),
            userAgent: navigator.userAgent
        };
        
        console.log('404 Error Data:', errorData);
        
        // You can send this to your analytics service
        // Example: sendToAnalytics(errorData);
    }
    
    track404Error();
    
    // Auto-redirect after 30 seconds (optional)
    let redirectTimer = null;
    const autoRedirectDelay = 30000; // 30 seconds
    
    function startAutoRedirect() {
        redirectTimer = setTimeout(() => {
            console.log('Auto-redirecting to homepage...');
            window.location.href = 'gretex-financial.php';
        }, autoRedirectDelay);
    }
    
    // Uncomment to enable auto-redirect
    // startAutoRedirect();
    
    // Cancel auto-redirect if user interacts with the page
    document.addEventListener('click', function() {
        if (redirectTimer) {
            clearTimeout(redirectTimer);
            redirectTimer = null;
        }
    });
    
    // Add particle effect on mouse move (optional enhancement)
    let particles = [];
    const maxParticles = 20;
    
    document.addEventListener('mousemove', function(e) {
        if (particles.length < maxParticles && Math.random() > 0.95) {
            createParticle(e.clientX, e.clientY);
        }
    });
    
    function createParticle(x, y) {
        const particle = document.createElement('div');
        particle.style.position = 'fixed';
        particle.style.left = x + 'px';
        particle.style.top = y + 'px';
        particle.style.width = '4px';
        particle.style.height = '4px';
        particle.style.backgroundColor = '#FDC221';
        particle.style.borderRadius = '50%';
        particle.style.pointerEvents = 'none';
        particle.style.zIndex = '9999';
        particle.style.opacity = '0.8';
        particle.style.boxShadow = '0 0 10px rgba(253, 194, 33, 0.8)';
        
        document.body.appendChild(particle);
        particles.push(particle);
        
        // Animate particle
        let opacity = 0.8;
        let yPos = y;
        const animationInterval = setInterval(() => {
            opacity -= 0.02;
            yPos -= 2;
            particle.style.opacity = opacity;
            particle.style.top = yPos + 'px';
            
            if (opacity <= 0) {
                clearInterval(animationInterval);
                document.body.removeChild(particle);
                particles = particles.filter(p => p !== particle);
            }
        }, 30);
    }
    
    // Add glitch effect to error code on hover
    const errorCode = document.querySelector('.error-code');
    if (errorCode) {
        errorCode.addEventListener('mouseenter', function() {
            let glitchCount = 0;
            const originalText = this.textContent;
            
            const glitchInterval = setInterval(() => {
                if (glitchCount < 5) {
                    this.textContent = Math.random() > 0.5 ? '4Ø4' : '4O4';
                    glitchCount++;
                } else {
                    this.textContent = originalText;
                    clearInterval(glitchInterval);
                }
            }, 100);
        });
    }
    
    // Console easter egg
    console.log('%c⚠ 404 ERROR ⚠', 'font-size: 24px; color: #FDC221; font-weight: bold;');
    console.log('%cLooks like you found a page that doesn\'t exist!', 'font-size: 14px; color: #a3a3a3;');
    console.log('%cKeyboard shortcuts:', 'font-size: 12px; color: #ffffff; font-weight: bold;');
    console.log('%c  H - Go to Homepage', 'font-size: 12px; color: #a3a3a3;');
    console.log('%c  B - Go Back', 'font-size: 12px; color: #a3a3a3;');
    console.log('%c  ESC - Go to Homepage', 'font-size: 12px; color: #a3a3a3;');
});
// Initialize Lucide icons
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});