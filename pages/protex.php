<?php
/**
 * Protex - Unbreakable Security
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Protex - Unbreakable Security';
$additionalCSS = [
    '../css/protex.css',
];

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



<!-- Navigation -->

    <!-- Hero Section -->
    <main class="hero">
        <div class="grid-background"></div>
        <div class="hero-content">
            <div class="trust-badge">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L3 7V12C3 16.55 6.84 20.74 9.91 21.79C11.04 22.26 12.96 22.26 14.09 21.79C17.16 20.74 21 16.55 21 12V7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Trusted by over 1000 businesses worldwide</span>
            </div>
            
            <h1 class="hero-title">
                Unbreakable security<br>
                <span class="subtitle">for a connected world</span>
            </h1>
            
            <p class="hero-description">
                Even the smallest threat leaves a trace.<br>
                Protex follows the signals others miss.
            </p>
            
            <div class="cta-buttons">
                <button class="btn-primary">Request demo</button>
                <button class="btn-secondary">Discover more</button>
            </div>
        </div>
    </main>

    <script src="../js/protex.js"></script>

    <script src="../js/search.js"></script>
    <script src="../js/mobile-menu.js"></script>
    <script src="../js/chatbot-knowledge.js"></script>
    <script src="../js/chatbot-config.js"></script>
    <script src="../js/chatbot.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>


<?php
// Include footer
require_once '../includes/footer.php';
?>

