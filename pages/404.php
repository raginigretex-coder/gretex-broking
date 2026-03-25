<?php
/**
 * 404 - Page Not Found | Gretex
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = '404 - Page Not Found | Gretex';
$additionalCSS = [
    '../css/404.css',
];

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



<div class="error-container">
        <div class="logo-section">
            <i data-lucide="alert-triangle" class="error-logo"></i>
        </div>
        
        <div class="warning-graphic">
            <svg xmlns="http://www.w3.org/2000/svg" width="600" height="270" viewBox="0 0 176.958 57.531" class="warning-svg">
                <g>
                    <!-- Corner rectangles -->
                    <rect class="corner-rect" y="25.128" width="0.538" height="0.538" transform="translate(-25.128 25.666) rotate(-90)" fill="#FDC221"/>
                    <rect class="corner-rect" y="22.449" width="0.538" height="0.538" transform="translate(-22.449 22.987) rotate(-90)" fill="#FDC221"/>
                    <rect class="corner-rect" x="176.42" y="25.128" width="0.538" height="0.538" transform="translate(151.292 202.086) rotate(-90)" fill="#FDC221"/>
                    <rect class="corner-rect" x="176.42" y="22.449" width="0.538" height="0.538" transform="translate(153.971 199.408) rotate(-90)" fill="#FDC221"/>
                    
                    <!-- Background path lines -->
                    <g class="path-lines">
                        <path class="path-line" d="M25.949,24.432H5.565a.375.375,0,0,1,0-.75H25.52l8.068-13.7H59.015a.375.375,0,0,1,0,.75h-25Z" fill="none" stroke="#FDC221" stroke-width="0.5" stroke-linecap="round"/>
                        <path class="path-line" d="M171.393,24.432H151.009l-8.068-13.7h-25a.375.375,0,0,1,0-.75H143.37l8.068,13.7h19.955a.375.375,0,0,1,0,.75Z" fill="none" stroke="#FDC221" stroke-width="0.5" stroke-linecap="round"/>
                        <path class="path-line" d="M57.3,57.531a.375.375,0,0,1-.321-.182L47.147,41.043H18.507l-7.71-7.71H7.66a.375.375,0,1,1,0-.75h3.448l7.709,7.71H47.571L57.623,56.962a.376.376,0,0,1-.127.515A.382.382,0,0,1,57.3,57.531Z" fill="none" stroke="#FDC221" stroke-width="0.5" stroke-linecap="round"/>
                        <path class="path-line" d="M119.656,57.531a.376.376,0,0,1-.321-.569l10.052-16.669h28.754l7.709-7.71H169.3a.375.375,0,0,1,0,.75h-3.137l-7.71,7.71h-28.64l-9.833,16.306A.377.377,0,0,1,119.656,57.531Z" fill="none" stroke="#FDC221" stroke-width="0.5" stroke-linecap="round"/>
                    </g>
                    
                    <!-- Triangle outline -->
                    <path class="triangle-outline" d="M93.582,1l26.746,46.327-5.1,8.828H61.737L56.63,47.326,83.377,1h10.2m.577-1H82.8L55.475,47.327l5.685,9.828h54.648l5.675-9.828L94.159,0Z" fill="#FDC221"/>
                    
                    <!-- Interior stripes -->
                    <g class="stripes-container">
                        <polygon class="stripe-left" points="51.838 37.309 61.852 37.309 75.448 13.85 65.434 13.85 51.838 37.309" fill="#FDC221"/>
                        <polygon class="stripe-left" points="37.422 37.309 47.436 37.309 61.033 13.85 51.019 13.85 37.422 37.309" fill="#FDC221"/>
                        <polygon class="stripe-left" points="23.007 37.309 33.021 37.309 46.617 13.85 36.603 13.85 23.007 37.309" fill="#FDC221"/>
                        <polygon class="stripe-right" points="125.121 37.309 115.107 37.309 101.51 13.85 111.524 13.85 125.121 37.309" fill="#FDC221"/>
                        <polygon class="stripe-right" points="139.536 37.309 129.522 37.309 115.926 13.85 125.94 13.85 139.536 37.309" fill="#FDC221"/>
                        <polygon class="stripe-right" points="153.951 37.309 143.937 37.309 130.341 13.85 140.355 13.85 153.951 37.309" fill="#FDC221"/>
                    </g>
                    
                    <!-- Exclamation mark -->
                    <path class="exclamation" d="M88.469,38.939a3.158,3.158,0,0,1,2.29.838,3.058,3.058,0,0,1,0,4.269,3.521,3.521,0,0,1-4.56,0,2.827,2.827,0,0,1-.868-2.125,2.858,2.858,0,0,1,.868-2.134A3.11,3.11,0,0,1,88.469,38.939Zm2.339-3.079H86.13l-.662-19.666h6Z" fill="#FDC221"/>
                </g>
            </svg>
        </div>
        
        <div class="error-content">
            <h1 class="error-code">404</h1>
            <h2 class="error-title">Page Not Found</h2>
            <p class="error-message">
                The page you are looking for doesn't exist or has been moved.
            </p>
            <div class="error-actions">
                <a href="gretex-financial.php" class="btn-home">Go to Homepage</a>
                <button onclick="history.back()" class="btn-back">Go Back</button>
            </div>
        </div>
        
        <div class="error-footer">
            <p>If you believe this is an error, please contact our support team at <a href="mailto:support@gretexbroking.com">support@gretexbroking.com</a></p>
        </div>
    </div>
    
    <script src="../js/404.js"></script>

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

