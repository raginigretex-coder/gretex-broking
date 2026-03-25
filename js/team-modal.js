/**
 * Gretex Financial - Team Member Modal
 * Handles click events on team cards to show detailed information
 */

(function() {
    'use strict';

    // Create modal HTML structure
    function createModal() {
        const modalHTML = `
            <div class="team-modal-overlay" id="teamModalOverlay"></div>
            <div class="team-modal" id="teamModal">
                <div class="team-modal-content">
                    <div class="team-modal-image">
                        <img id="teamModalImage" src="" alt="">
                    </div>
                    <div class="team-modal-info">
                        <button class="team-modal-close" id="teamModalClose" aria-label="Close"></button>
                        <div class="team-modal-header">
                            <h3 class="team-modal-name" id="teamModalName"></h3>
                            <span class="team-modal-role" id="teamModalRole"></span>
                        </div>
                        <div class="team-modal-body" id="teamModalBody"></div>
                    </div>
                </div>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', modalHTML);
    }

    // Open modal with team member data
    function openModal(memberData, clickedCard) {
        const modal = document.getElementById('teamModal');
        const overlay = document.getElementById('teamModalOverlay');
        const modalImage = document.getElementById('teamModalImage');
        const modalName = document.getElementById('teamModalName');
        const modalRole = document.getElementById('teamModalRole');
        const modalBody = document.getElementById('teamModalBody');

        // Get the position of the clicked card
        const cardRect = clickedCard.getBoundingClientRect();
        
        // Calculate the initial position and scale
        const modalWidth = 900; // max-width of modal
        const modalHeight = window.innerHeight * 0.85; // max-height
        const scaleX = cardRect.width / modalWidth;
        const scaleY = cardRect.height / modalHeight;
        const scale = Math.min(scaleX, scaleY);
        
        // Calculate translation from card position to center
        const cardCenterX = cardRect.left + cardRect.width / 2;
        const cardCenterY = cardRect.top + cardRect.height / 2;
        const viewportCenterX = window.innerWidth / 2;
        const viewportCenterY = window.innerHeight / 2;
        const translateX = cardCenterX - viewportCenterX;
        const translateY = cardCenterY - viewportCenterY;

        // Populate modal with data
        modalImage.src = memberData.image;
        modalImage.alt = memberData.name;
        modalName.textContent = memberData.name;
        modalRole.textContent = memberData.role;
        modalBody.innerHTML = `<p>${memberData.description}</p>`;

        // Show modal and overlay first (display: block)
        modal.style.display = 'block';
        overlay.style.display = 'block';

        // Set initial transform to match card position
        modal.style.transform = `translate(calc(-50% + ${translateX}px), calc(-50% + ${translateY}px)) scale(${scale})`;
        modal.style.opacity = '1';

        // Force a reflow
        void modal.offsetWidth;
        void overlay.offsetWidth;

        // Then add active class to trigger animations
        requestAnimationFrame(() => {
            overlay.classList.add('active');
            requestAnimationFrame(() => {
                modal.classList.add('active');
                // Reset transform to center position
                modal.style.transform = '';
            });
        });

        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }

    // Close modal
    function closeModal() {
        const modal = document.getElementById('teamModal');
        const overlay = document.getElementById('teamModalOverlay');

        // Remove active class to trigger exit animations
        modal.classList.remove('active');
        
        // Wait for modal animation to complete before hiding overlay
        setTimeout(() => {
            overlay.classList.remove('active');
            
            // Wait for overlay animation to complete before hiding elements
            setTimeout(() => {
                modal.style.display = 'none';
                overlay.style.display = 'none';
                modal.style.transform = '';
            }, 500);
        }, 100);

        // Restore body scroll
        document.body.style.overflow = '';
    }

    // Extract member data from card
    function getMemberDataFromCard(card) {
        const image = card.querySelector('.director-photo, .personnel-photo, .senior-management-photo');
        const name = card.querySelector('h3');
        const role = card.querySelector('.director-title, .personnel-title, .senior-management-title-text');
        const description = card.querySelector('.director-description, .personnel-description, .senior-management-description');

        return {
            image: image ? image.src : '',
            name: name ? name.textContent : '',
            role: role ? role.textContent : '',
            description: description ? description.textContent : 'No additional information available.'
        };
    }

    // Initialize modal functionality
    function initTeamModal() {
        // Create modal structure
        createModal();

        // Get all team member cards
        const teamCards = document.querySelectorAll('.director-card, .personnel-card, .senior-management-card');

        // Add click event to each card
        teamCards.forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                const memberData = getMemberDataFromCard(this);
                openModal(memberData, this);
            });

            // Add keyboard accessibility
            card.setAttribute('tabindex', '0');
            card.setAttribute('role', 'button');
            card.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    const memberData = getMemberDataFromCard(this);
                    openModal(memberData, this);
                }
            });
        });

        // Close modal on close button click
        document.addEventListener('click', function(e) {
            if (e.target.id === 'teamModalClose') {
                closeModal();
            }
        });

        // Close modal on overlay click
        document.addEventListener('click', function(e) {
            if (e.target.id === 'teamModalOverlay') {
                closeModal();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('teamModal');
                if (modal && modal.classList.contains('active')) {
                    closeModal();
                }
            }
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTeamModal);
    } else {
        initTeamModal();
    }

})();
