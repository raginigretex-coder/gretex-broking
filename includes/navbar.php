<?php
require_once __DIR__ . '/../config/app.php';

// Determine active page
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$activeClass = function($page) use ($currentPage) {
    return ($currentPage === $page) ? 'class="active"' : '';
};
?>
<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
            <div class="logo">
                <a href="<?php echo gt_page_url('gretex-financial.php'); ?>">
                    <img src="<?php echo gt_asset_url('images/Gretex.png'); ?>" alt="Gretex Logo" class="logo-image">
                </a>
            </div>

        <div class="search-container">
            <div class="search-wrapper">
                <i data-lucide="search" class="search-icon"></i>
                <input type="text" class="search-input" placeholder="click / to search" id="navSearchInput">
                <kbd class="search-kbd">/</kbd>
            </div>
        </div>

        <ul class="nav-menu">
            <li><a href="<?php echo gt_page_url('about.php'); ?>" <?php echo $activeClass('about'); ?>>About</a></li>
            <li><a href="<?php echo gt_page_url('calculator/calculators.php'); ?>" <?php echo $activeClass('calculators'); ?>>Calculators</a></li>
            <li><a href="<?php echo gt_page_url('services/services.php'); ?>" <?php echo $activeClass('services'); ?>>Services</a></li>
            <li><a href="<?php echo gt_page_url('downloads.php'); ?>" <?php echo $activeClass('downloads'); ?>>Downloads</a></li>
            <li><a href="<?php echo gt_page_url('contact.php'); ?>" <?php echo $activeClass('contact'); ?>>Contact</a></li>
            <li class="dropdown">
                <a href="#investor" class="dropdown-toggle">Investor <span class="dropdown-arrow"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo gt_page_url('Regulation46_LODR.php'); ?>">Disclosures under Regulation 46 of the LODR</a></li>
                    <li><a href="<?php echo gt_page_url('Regulation62_LODR.php'); ?>">Group Companies Financials and Annual Returns</a></li>
                    <li><a href="<?php echo gt_page_url('OtherInvestor.php'); ?>">Other Investor Information</a></li>
                    <li><a href="<?php echo gt_page_url('SubTab_CodeandPolicies.php'); ?>">Investor Contacts</a></li>
                    <li><a href="<?php echo gt_page_url('SubTab_CorpSocialRespons.php'); ?>">Corporate Social Responsibility</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#client-corner" class="dropdown-toggle">Client Corner <span class="dropdown-arrow"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo gt_asset_url('assets/client-corner/upi-qr-code-payments-for-dp-clients.png'); ?>" target="_blank" rel="noopener noreferrer">QR Code Payments for DP clients</a></li>
                    <li><a href="<?php echo gt_asset_url('assets/client-corner/upi-QR-code-for-broking.png'); ?>" target="_blank" rel="noopener noreferrer">QR Code Payments for Broking clients</a></li>
                    <li><a href="<?php echo gt_asset_url('assets/client-corner/Attention Investors.pdf'); ?>" target="_blank" rel="noopener noreferrer">Attention Investors</a></li>
                    <li><a href="<?php echo gt_asset_url('assets/client-corner/Investor Charter Broking SEBI 21-Feb-2025.pdf'); ?>" target="_blank" rel="noopener noreferrer">Investor Charter of Broking</a></li>
                    <li><a href="<?php echo gt_asset_url('assets/client-corner/2024-0089-NSDL.pdf'); ?>" target="_blank" rel="noopener noreferrer">Investor Charter of DP</a></li>
                    <li><a href="<?php echo gt_asset_url('assets/documents/2026-03-02 Annexure B& C- Investor Complaints Broking+DP.pdf'); ?>" target="_blank" rel="noopener noreferrer">Investor Complaints</a></li>
                    <li><a href="#bank-details">Details of Bank</a></li>
                    <li><a href="<?php echo gt_page_url('escalation.php'); ?>">Escalation Matrix</a></li>
                    <li><a href="https://www.nseindia.com/trade/members-client-registration-documents" target="_blank" rel="noopener noreferrer">Advice to Client in regional language</a></li>
                    <li><a href="<?php echo gt_asset_url('assets/documents/Dos-Donts.pdf'); ?>" target="_blank" rel="noopener noreferrer">Do's and Don'ts to Safe Investing</a></li>
                    <li><a href="<?php echo gt_asset_url('assets/documents/Risk_Disclosure_on_Derivatives.pdf'); ?>" target="_blank" rel="noopener noreferrer">Risk Disclosure on Derivatives</a></li>
                    <li><a href="https://smartodr.in/intermediary/login" target="_blank" rel="noopener noreferrer">Online Dispute Resolution</a></li>
                    <li><a href="https://gretexbroking.com/policies.html" target="_blank" rel="noopener noreferrer">Policies</a></li>
                    <li><a href="https://kra.ndml.in/kra/ckyc/#/initiate" target="_blank" rel="noopener noreferrer">Know you KRA validation status</a></li>
                    <li><a href="https://gretexbroking.com/img/validate-KRA-status-2.2.pdf" target="_blank" rel="noopener noreferrer">KRA Validation Process</a></li>
                </ul>
            </li>
        </ul>

        <div class="nav-buttons">
            <div class="login-dropdown">
                <button class="login-btn dropdown-toggle">Login <span class="dropdown-arrow"></span></button>
                <ul class="login-dropdown-menu">
                    <li><a href="#" onclick="window.open('https://gtx-dx.finspot.in/investor-entry-level/login', '_blank'); return false;">Click for Web trading</a></li>
                    <li><a href="#" onclick="window.open('https://onboarding.gretexbroking.com:8080/ReKYC/', '_blank'); return false;">Branch Login</a></li>
                    <li><a href="#" onclick="window.open('https://backoffice.gretexbroking.com/shrdbms/userlogin.ss', '_blank'); return false;">Client Backoffice Login</a></li>
                    <li><a href="#" onclick="window.open('https://onboarding.gretexbroking.com:8080/ReKYC/ipvLink', '_blank'); return false;">Re-KYC/ Modification/Closure</a></li>
                </ul>
            </div>
            <button class="register-btn" onclick="window.open('https://onboarding.gretexbroking.com:8080/OnBoarding/', '_blank'); return false;">Register</button>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-content">
            <div class="mobile-search">
                <div class="search-wrapper">
                    <i data-lucide="search" class="search-icon"></i>
                    <input type="text" class="search-input" placeholder="Search..." id="mobileSearchInput">
                </div>
            </div>

                <ul class="mobile-nav-links">
                    <li><a href="<?php echo gt_page_url('about.php'); ?>">About</a></li>
                    <li><a href="<?php echo gt_page_url('calculator/calculators.php'); ?>">Calculators</a></li>
                    <li><a href="<?php echo gt_page_url('services/services.php'); ?>">Services</a></li>
                    <li><a href="<?php echo gt_page_url('downloads.php'); ?>">Downloads</a></li>
                    <li><a href="<?php echo gt_page_url('contact.php'); ?>" <?php echo $activeClass('contact'); ?>>Contact</a></li>
                
                <li class="mobile-dropdown">
                    <button class="mobile-dropdown-toggle">
                        Investor
                        <i data-lucide="chevron-down" class="mobile-dropdown-icon"></i>
                    </button>
                        <ul class="mobile-dropdown-menu">
                            <li><a href="<?php echo gt_page_url('Regulation46_LODR.php'); ?>">Disclosures under Regulation 46 of the LODR</a></li>
                            <li><a href="<?php echo gt_page_url('Regulation62_LODR.php'); ?>">Group Companies Financials and Annual Returns</a></li>
                            <li><a href="<?php echo gt_page_url('OtherInvestor.php'); ?>">Other Investor Information</a></li>
                            <li><a href="<?php echo gt_page_url('SubTab_CodeandPolicies.php'); ?>">Investor Contacts</a></li>
                            <li><a href="<?php echo gt_page_url('SubTab_CorpSocialRespons.php'); ?>">Corporate Social Responsibility</a></li>
                        </ul>
                </li>

                <li class="mobile-dropdown">
                    <button class="mobile-dropdown-toggle">
                        Client Corner
                        <i data-lucide="chevron-down" class="mobile-dropdown-icon"></i>
                    </button>
                    <ul class="mobile-dropdown-menu">
                        <li><a href="<?php echo gt_asset_url('assets/client-corner/upi-qr-code-payments-for-dp-clients.png'); ?>" target="_blank" rel="noopener noreferrer">QR Code Payments for DP clients</a></li>
                        <li><a href="<?php echo gt_asset_url('assets/client-corner/upi-QR-code-for-broking.png'); ?>" target="_blank" rel="noopener noreferrer">QR Code Payments for Broking clients</a></li>
                        <li><a href="<?php echo gt_asset_url('assets/client-corner/Attention Investors.pdf'); ?>" target="_blank" rel="noopener noreferrer">Attention Investors</a></li>
                        <li><a href="<?php echo gt_asset_url('assets/client-corner/Investor Charter Broking SEBI 21-Feb-2025.pdf'); ?>" target="_blank" rel="noopener noreferrer">Investor Charter of Broking</a></li>
                        <li><a href="<?php echo gt_asset_url('assets/client-corner/2024-0089-NSDL.pdf'); ?>" target="_blank" rel="noopener noreferrer">Investor Charter of DP</a></li>
                        <li><a href="<?php echo gt_asset_url('assets/documents/2026-03-02 Annexure B& C- Investor Complaints Broking+DP.pdf'); ?>" target="_blank" rel="noopener noreferrer">Investor Complaints</a></li>
                        <li><a href="#bank-details">Details of Bank</a></li>
                        <li><a href="<?php echo gt_page_url('escalation.php'); ?>">Escalation Matrix</a></li>
                        <li><a href="https://www.nseindia.com/trade/members-client-registration-documents" target="_blank" rel="noopener noreferrer">Advice to Client in regional language</a></li>
                        <li><a href="<?php echo gt_asset_url('assets/documents/Dos-Donts.pdf'); ?>" target="_blank" rel="noopener noreferrer">Do's and Don'ts to Safe Investing</a></li>
                        <li><a href="<?php echo gt_asset_url('assets/documents/Risk_Disclosure_on_Derivatives.pdf'); ?>" target="_blank" rel="noopener noreferrer">Risk Disclosure on Derivatives</a></li>
                        <li><a href="https://smartodr.in/intermediary/login" target="_blank" rel="noopener noreferrer">Online Dispute Resolution</a></li>
                        <li><a href="https://gretexbroking.com/policies.html" target="_blank" rel="noopener noreferrer">Policies</a></li>
                        <li><a href="https://kra.ndml.in/kra/ckyc/#/initiate" target="_blank" rel="noopener noreferrer">Know you KRA validation status</a></li>
                        <li><a href="https://gretexbroking.com/img/validate-KRA-status-2.2.pdf" target="_blank" rel="noopener noreferrer">KRA Validation Process</a></li>
                    </ul>
                </li>

                <li class="mobile-dropdown">
                    <button class="mobile-dropdown-toggle">
                        Login
                        <i data-lucide="chevron-down" class="mobile-dropdown-icon"></i>
                    </button>
                    <ul class="mobile-dropdown-menu">
                        <li><a href="#" onclick="window.open('https://gtx-dx.finspot.in/investor-entry-level/login', '_blank'); return false;">Click for Web trading</a></li>
                        <li><a href="#" onclick="window.open('https://onboarding.gretexbroking.com:8080/ReKYC/', '_blank'); return false;">Branch Login</a></li>
                        <li><a href="#" onclick="window.open('https://backoffice.gretexbroking.com/shrdbms/userlogin.ss', '_blank'); return false;">Client Backoffice Login</a></li>
                        <li><a href="#" onclick="window.open('https://onboarding.gretexbroking.com:8080/ReKYC/ipvLink', '_blank'); return false;">Re-KYC/ Modification/Closure</a></li>
                    </ul>
                </li>
            </ul>

            <div class="mobile-cta">
                <button class="register-btn-mobile" onclick="window.open('https://onboarding.gretexbroking.com:8080/OnBoarding/', '_blank'); return false;">Register Now</button>
            </div>
        </div>
    </div>
</nav>
