/**
 * Gretex Financial - Mobile Menu Functionality
 * Handles mobile navigation menu toggle and interactions
 */

function initMobileMenu() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const body = document.body;

    if (!mobileMenuToggle || !mobileMenu) return;

    // Prevent double-init
    if (mobileMenuToggle.dataset.initialized) return;
    mobileMenuToggle.dataset.initialized = 'true';

    const mobileDropdowns = mobileMenu.querySelectorAll('.mobile-dropdown');

    function openMobileMenu() {
        mobileMenu.classList.add('active');
        mobileMenuToggle.classList.add('active');
        body.style.overflow = 'hidden';
        if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    function closeMobileMenu() {
        mobileMenu.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
        body.style.overflow = '';
        mobileDropdowns.forEach(d => d.classList.remove('active'));
    }

    mobileMenuToggle.addEventListener('click', () => {
        mobileMenu.classList.contains('active') ? closeMobileMenu() : openMobileMenu();
    });

    // Mobile dropdown toggles
    mobileDropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.mobile-dropdown-toggle');
        if (toggle) {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                mobileDropdowns.forEach(d => { if (d !== dropdown) d.classList.remove('active'); });
                dropdown.classList.toggle('active');
                if (typeof lucide !== 'undefined') lucide.createIcons();
            });
        }
    });

    // Close on link click
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // Close on resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth > 768 && mobileMenu.classList.contains('active')) closeMobileMenu();
        }, 250);
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileMenu.classList.contains('active')) closeMobileMenu();
    });

    mobileMenu.addEventListener('touchmove', (e) => {
        if (mobileMenu.classList.contains('active')) e.stopPropagation();
    }, { passive: false });

    // Desktop dropdowns
    const desktopDropdowns = document.querySelectorAll('.nav-menu .dropdown');
    const loginDropdown = document.querySelector('.login-dropdown');

    desktopDropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        if (toggle) {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                desktopDropdowns.forEach(d => { if (d !== dropdown) d.classList.remove('active'); });
                dropdown.classList.toggle('active');
            });
        }
    });

    if (loginDropdown) {
        const loginBtn = loginDropdown.querySelector('.login-btn');
        if (loginBtn) {
            loginBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                desktopDropdowns.forEach(d => d.classList.remove('active'));
                loginDropdown.classList.toggle('active');
            });
        }
    }

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.dropdown') && !e.target.closest('.login-dropdown')) {
            desktopDropdowns.forEach(d => d.classList.remove('active'));
            if (loginDropdown) loginDropdown.classList.remove('active');
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            desktopDropdowns.forEach(d => d.classList.remove('active'));
            if (loginDropdown) loginDropdown.classList.remove('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', initMobileMenu);
