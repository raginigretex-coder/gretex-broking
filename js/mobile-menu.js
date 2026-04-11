/**
 * Gretex Financial - Mobile Menu Functionality
 * Handles mobile navigation menu toggle and interactions
 */

function initMobileMenu() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const navbar = document.querySelector('.navbar');
    const mobileSearchInput = document.getElementById('mobileSearchInput');
    const body = document.body;

    if (!mobileMenuToggle || !mobileMenu || !navbar) return;

    // Prevent double-init
    if (mobileMenuToggle.dataset.initialized) return;
    mobileMenuToggle.dataset.initialized = 'true';

    // Keep the full-screen mobile panel outside the filtered fixed navbar.
    // Some mobile browsers clip or fail to paint fixed descendants correctly
    // when they live inside a parent with backdrop-filter.
    if (mobileMenu.parentElement !== body) {
        body.appendChild(mobileMenu);
    }

    const mobileDropdowns = mobileMenu.querySelectorAll('.mobile-dropdown');
    const mobileNavItems = mobileMenu.querySelectorAll('.mobile-nav-links > li');

    mobileMenuToggle.setAttribute('aria-expanded', 'false');
    mobileMenu.setAttribute('aria-hidden', 'true');

    function syncMobileMenuOffset() {
        const navHeight = Math.ceil(navbar.getBoundingClientRect().height || navbar.offsetHeight || 65);
        document.documentElement.style.setProperty('--mobile-menu-top', `${navHeight}px`);
        mobileMenu.style.top = `${navHeight}px`;
        mobileMenu.style.minHeight = `calc(100dvh - ${navHeight}px)`;
    }

    function openMobileMenu() {
        syncMobileMenuOffset();
        mobileMenu.classList.add('active');
        mobileMenuToggle.classList.add('active');
        body.classList.add('mobile-menu-open');
        body.style.overflow = 'hidden';
        mobileMenuToggle.setAttribute('aria-expanded', 'true');
        mobileMenu.setAttribute('aria-hidden', 'false');
        if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    function closeMobileMenu() {
        mobileMenu.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
        body.classList.remove('mobile-menu-open');
        body.style.overflow = '';
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
        mobileDropdowns.forEach(d => d.classList.remove('active'));
        resetMobileMenuFilter();
        if (mobileSearchInput) mobileSearchInput.value = '';
    }

    function resetMobileMenuFilter() {
        mobileNavItems.forEach(item => {
            item.style.display = '';
            const subItems = item.querySelectorAll('.mobile-dropdown-menu li');
            subItems.forEach(subItem => {
                subItem.style.display = '';
            });
        });
    }

    function filterMobileMenu(query) {
        const normalizedQuery = String(query || '').trim().toLowerCase();

        if (!normalizedQuery) {
            resetMobileMenuFilter();
            mobileDropdowns.forEach(dropdown => dropdown.classList.remove('active'));
            return;
        }

        mobileNavItems.forEach(item => {
            const link = item.querySelector(':scope > a');
            const dropdownToggle = item.querySelector(':scope > .mobile-dropdown-toggle');
            const subItems = item.querySelectorAll('.mobile-dropdown-menu li');

            if (link) {
                const linkText = (link.textContent || '').trim().toLowerCase();
                item.style.display = linkText.includes(normalizedQuery) ? '' : 'none';
                return;
            }

            if (dropdownToggle) {
                const toggleText = (dropdownToggle.textContent || '').trim().toLowerCase();
                let hasSubMatch = false;

                subItems.forEach(subItem => {
                    const subLink = subItem.querySelector('a');
                    const subText = (subLink ? subLink.textContent : subItem.textContent || '').trim().toLowerCase();
                    const subMatch = subText.includes(normalizedQuery);
                    subItem.style.display = subMatch ? '' : 'none';
                    hasSubMatch = hasSubMatch || subMatch;
                });

                const shouldShow = toggleText.includes(normalizedQuery) || hasSubMatch;
                item.style.display = shouldShow ? '' : 'none';

                if (shouldShow && hasSubMatch) {
                    item.classList.add('active');
                } else if (!toggleText.includes(normalizedQuery)) {
                    item.classList.remove('active');
                }
            }
        });
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

    if (mobileSearchInput) {
        mobileSearchInput.addEventListener('input', e => {
            filterMobileMenu(e.target.value);
        });
    }

    // Close on resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            syncMobileMenuOffset();
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

    syncMobileMenuOffset();

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
