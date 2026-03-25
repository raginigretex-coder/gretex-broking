/**
 * Gretex - Leadership Team Slider
 * Handles carousel navigation for Board, Key Personnel, and Senior Management sections
 */
(function() {
    'use strict';

    const BREAKPOINTS = { desktop: 969, tablet: 641 };
    const DESKTOP_CARDS = 2;  /* 2 large cards per view */
    const TABLET_CARDS = 2;
    const MOBILE_CARDS = 1;

    function getCardsPerView() {
        const w = window.innerWidth;
        if (w >= BREAKPOINTS.desktop) return DESKTOP_CARDS;
        if (w >= BREAKPOINTS.tablet) return TABLET_CARDS;
        return MOBILE_CARDS;
    }

    function initSlider(section) {
        const wrapper = section.querySelector('.team-slider-wrapper');
        const track = section.querySelector('.team-slider-track');
        const dotsContainer = section.querySelector('.team-slider-dots');
        const prevBtn = section.querySelector('.team-slider-prev');
        const nextBtn = section.querySelector('.team-slider-next');

        if (!wrapper || !track || !dotsContainer) return;

        const cards = Array.from(track.querySelectorAll('.team-slider-card'));
        if (cards.length === 0) return;

        let currentIndex = 0;
        let cardsPerView = getCardsPerView();
        let totalSlides = Math.max(1, Math.ceil(cards.length / cardsPerView));

        const GAP = 28; /* matches CSS gap: 1.75rem */

        function getSlideStep() {
            if (cards.length === 0) return 0;
            const card = cards[0];
            const cardWidth = card.getBoundingClientRect().width;
            return (cardWidth + GAP) * cardsPerView;
        }

        function updateDots() {
            dotsContainer.innerHTML = '';
            if (totalSlides <= 1) {
                wrapper.classList.add('single-page');
                dotsContainer.classList.add('hidden');
                return;
            }
            dotsContainer.classList.remove('hidden');
            wrapper.classList.remove('single-page');
            for (let i = 0; i < totalSlides; i++) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                btn.classList.toggle('active', i === currentIndex);
                btn.addEventListener('click', () => goTo(i));
                dotsContainer.appendChild(btn);
            }
        }

        function goTo(index) {
            currentIndex = Math.max(0, Math.min(index, totalSlides - 1));
            const step = getSlideStep();
            const offset = currentIndex * step;
            track.style.transform = 'translate3d(-' + offset + 'px, 0, 0)';
            dotsContainer.querySelectorAll('button').forEach((b, i) => b.classList.toggle('active', i === currentIndex));
        }

        function next() {
            goTo(currentIndex + 1);
        }

        function prev() {
            goTo(currentIndex - 1);
        }

        function refresh() {
            cardsPerView = getCardsPerView();
            totalSlides = Math.max(1, Math.ceil(cards.length / cardsPerView));
            currentIndex = Math.min(currentIndex, totalSlides - 1);
            updateDots();
            goTo(currentIndex);
        }

        prevBtn.addEventListener('click', prev);
        nextBtn.addEventListener('click', next);

        window.addEventListener('resize', function onResize() {
            const nextCards = getCardsPerView();
            if (nextCards !== cardsPerView) refresh();
        });

        // Initial position after layout is ready
        requestAnimationFrame(function() {
            requestAnimationFrame(function() {
                refresh();
            });
        });
    }

    function init() {
        document.querySelectorAll('.team-slider-section').forEach(initSlider);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
