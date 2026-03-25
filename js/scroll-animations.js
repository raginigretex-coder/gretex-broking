/**
 * Gretex Financial - Premium Scroll Animations Engine
 * Handles scroll-driven reveals, parallax effects, and interactive elements.
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Scroll Progress Bar
    const progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress-bar';
    document.body.prepend(progressBar);

    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        progressBar.style.width = `${scrollPercent}%`;
    }, { passive: true });


    // 2. Intersection Observer for Scroll Reveals
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -100px 0px', // Trigger slightly before element enters viewport
        threshold: 0.15
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                
                // Trigger counter animation if it's a stat item
                if (entry.target.classList.contains('stat-item') || entry.target.querySelector('.stat-number')) {
                    const stats = entry.target.querySelectorAll('h3, .stat-number');
                    stats.forEach(stat => animateCounter(stat));
                }

                // Unobserve after revealing to active only once (optional, keep if you want re-trigger)
                observer.unobserve(entry.target); 
            }
        });
    }, observerOptions);

    // Select elements to animate
    const revealElements = document.querySelectorAll(
        '.scroll-reveal, .scroll-zoom-in, .scroll-rotate-in, .scroll-slide-left, .scroll-slide-right, .scroll-bounce-up, .scroll-flip-in'
    );
    revealElements.forEach(el => revealObserver.observe(el));


    // 3. Parallax & Scroll Transform Effects with RAF for smooth animation
    const heroSection = document.querySelector('.hero');
    const heroContent = document.querySelector('.hero-content');
    const parallaxOrbs = document.querySelectorAll('.floating-orb');

    let ticking = false;
    let lastScrollY = 0;

    function updateParallax() {
        const scrolled = lastScrollY;

        // Hero Fade & Shrink Effect
        if (heroSection && heroContent && scrolled < window.innerHeight) {
            const opacity = 1 - (scrolled / 700);
            const scale = 1 - (scrolled / 2000);
            const translateY = scrolled * 0.3;

            heroContent.style.opacity = Math.max(opacity, 0);
            heroContent.style.transform = `translateY(${translateY}px) scale(${Math.max(scale, 0.9)})`;
        }

        // Parallax Orbs Movement
        parallaxOrbs.forEach((orb, index) => {
            const speed = (index + 1) * 0.05;
            const yPos = scrolled * speed;
            orb.style.transform = `translateY(${yPos}px)`;
        });

        ticking = false;
    }

    window.addEventListener('scroll', () => {
        lastScrollY = window.scrollY;

        if (!ticking) {
            window.requestAnimationFrame(updateParallax);
            ticking = true;
        }
    }, { passive: true });


    // 4. Number Counter Animation
    function animateCounter(el) {
        if (el.dataset.animated) return; // Prevent re-animation
        
        const originalText = el.innerText;
        // Extract number from text (e.g. "1000+" -> 1000)
        const targetValue = parseInt(originalText.replace(/[^0-9]/g, ''));
        
        if (isNaN(targetValue)) return;

        el.dataset.animated = 'true';
        el.classList.add('stat-counting', 'counting-active');
        
        // Determine prefix/suffix
        const prefix = originalText.match(/^[^\d]*/) ? originalText.match(/^[^\d]*/)[0] : '';
        const suffix = originalText.match(/[^\d]*$/) ? originalText.match(/[^\d]*$/)[0] : '';

        let startTimestamp = null;
        const duration = 2000; // 2 seconds

        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            
            // Ease out quart
            const easeProgress = 1 - Math.pow(1 - progress, 4);
            
            const currentValue = Math.floor(easeProgress * targetValue);
            el.innerText = prefix + currentValue + suffix;

            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                el.innerText = originalText; // Ensure exact final value
                el.classList.remove('counting-active');
            }
        };

        window.requestAnimationFrame(step);
    }

    // 5. 3D Tilt Effect for Cards
    const tiltCards = document.querySelectorAll('.tilt-card, .service-card, .calculator-card, .partner-card, .download-card');
    
    tiltCards.forEach(card => {
        card.addEventListener('mousemove', handleTilt);
        card.addEventListener('mouseleave', resetTilt);
    });

    function handleTilt(e) {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        const card = this;
        const cardRect = card.getBoundingClientRect();
        const cardWidth = cardRect.width;
        const cardHeight = cardRect.height;
        const centerX = cardRect.left + cardWidth / 2;
        const centerY = cardRect.top + cardHeight / 2;
        const mouseX = e.clientX - centerX;
        const mouseY = e.clientY - centerY;
        
        // Calculate rotation (max 5 degrees)
        const rotateX = (mouseY / (cardHeight / 2)) * -5;
        const rotateY = (mouseX / (cardWidth / 2)) * 5;

        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
    }

    function resetTilt(e) {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
    }

});
