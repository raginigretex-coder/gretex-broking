<?php
/**
 * Calculators - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Calculators - Gretex Financial';
$additionalCSS = [
    '../../css/calculators.css',
];

$pageScripts = "// Enhanced Search and Filter Functionality
        document.addEventListener(''DOMContentLoaded'', function() {
            const searchInput = document.getElementById(''calculatorSearch'');
            const filterChips = document.querySelectorAll(''.filter-chip'');
            const calcCards = document.querySelectorAll(''.calc-card'');
            const noResults = document.getElementById(''noResults'');
            const calculatorsGrid = document.getElementById(''calculatorsGrid'');
            
            let currentCategory = ''all'';
            let currentSearch = '''';
            
            // Search functionality
            if (searchInput) {
                searchInput.addEventListener(''input'', function(e) {
                    currentSearch = e.target.value.toLowerCase().trim();
                    filterCalculators();
                });
            }
            
            // Filter functionality
            filterChips.forEach(chip => {
                chip.addEventListener(''click'', function() {
                    // Remove active class from all chips
                    filterChips.forEach(c => c.classList.remove(''active''));
                    // Add active class to clicked chip
                    this.classList.add(''active'');
                    currentCategory = this.getAttribute(''data-category'');
                    filterCalculators();
                });
            });
            
            function filterCalculators() {
                let visibleCount = 0;
                
                calcCards.forEach(card => {
                    const category = card.getAttribute(''data-category'');
                    const searchText = card.getAttribute(''data-search'') || '''';
                    const title = card.querySelector(''.calc-title'')?.textContent.toLowerCase() || '''';
                    const description = card.querySelector(''.calc-description'')?.textContent.toLowerCase() || '''';
                    
                    const matchesCategory = currentCategory === ''all'' || category === currentCategory;
                    const matchesSearch = !currentSearch || 
                        searchText.toLowerCase().includes(currentSearch) ||
                        title.includes(currentSearch) ||
                        description.includes(currentSearch);
                    
                    if (matchesCategory && matchesSearch) {
                        card.style.display = '''';
                        visibleCount++;
                    } else {
                        card.style.display = ''none'';
                    }
                });
                
                // Show/hide no results message
                if (visibleCount === 0) {
                    noResults.style.display = ''block'';
                    calculatorsGrid.style.display = ''none'';
                } else {
                    noResults.style.display = ''none'';
                    calculatorsGrid.style.display = ''grid'';
                }
            }
        });
";

// Include header
require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>


    
    <!-- Navigation -->

    <!-- Calculators Page Content -->
    <main class="calculators-page">
        <!-- Hero Section -->
        <section class="calculators-hero" aria-labelledby="calculators-hero-title">
            <div class="hero-panel">
                <div class="hero-panel-decor" aria-hidden="true"></div>
                <div class="container hero-panel-inner">
                    <div class="hero-copy">
                        <span class="hero-badge">
                            <i data-lucide="sparkles" aria-hidden="true"></i>
                            Smart Money Tools
                        </span>
                        <h1 class="page-title" id="calculators-hero-title">Financial Calculators for Better Decisions</h1>
                        <p class="page-subtitle hero-subtitle">Plan your investments, estimate returns, and compare scenarios with modern, easy-to-use calculators designed for Indian investors.</p>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="calculators-browse" aria-labelledby="browse-calculators-title">
            <div class="container calculators-tools">
            <header class="calculators-section-head">
                <div class="calculators-section-intro">
                    <!-- <h2 class="calculators-section-title" id="browse-calculators-title">Browse calculators</h2> -->
                    <!-- <p class="calculators-section-lead">Search or filter by category, then open any tool to run the numbers.</p> -->
                </div>
                <!-- <p class="calculators-section-hint" aria-hidden="true">Click a card to open</p> -->
            </header>
            
            <!-- Search and Filter Controls -->
            <div class="calculators-controls" role="search" aria-label="Search and filter calculators">
                <div class="calculators-search-wrap">
                    <label class="visually-hidden" for="calculatorSearch">Search calculators</label>
                    <div class="search-box">
                        <i data-lucide="search" class="search-icon" aria-hidden="true"></i>
                        <input type="search" id="calculatorSearch" placeholder="Search calculators..." autocomplete="off" enterkeyhint="search">
                    </div>
                </div>
                <div class="category-filters" role="group" aria-label="Filter by category">
                    <button type="button" class="filter-chip active" data-category="all">All</button>
                    <button type="button" class="filter-chip" data-category="investment">Investment</button>
                    <button type="button" class="filter-chip" data-category="retirement">Retirement</button>
                    <button type="button" class="filter-chip" data-category="tax">Tax</button>
                    <button type="button" class="filter-chip" data-category="trading">Trading</button>
                    <button type="button" class="filter-chip" data-category="interest">Interest</button>
                </div>
            </div>
            
            <div class="calculators-grid" id="calculatorsGrid">
                <!-- SIP Calculator -->
                <div class="calc-card" data-type="sip" data-category="investment" data-search="sip systematic investment plan monthly">
                    <div class="calc-content">
                        <span class="calc-category">Investment</span>
                        <h2 class="calc-title">SIP</h2>
                        <p class="calc-description">Calculate how much you need to save or how much you will accumulate with your Systematic Investment Plan</p>
                    </div>
                    <div class="calc-icon sip-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="25" fill="#FFD700" opacity="0.3"/>
                            <rect x="20" y="15" width="20" height="8" rx="2" fill="#FFD700"/>
                            <rect x="20" y="25" width="20" height="8" rx="2" fill="#FFA500"/>
                            <rect x="20" y="35" width="20" height="8" rx="2" fill="#FFD700"/>
                            <path d="M25 20 L25 10 L30 5 L35 10 L35 20" stroke="#00A855" stroke-width="2" fill="none"/>
                            <circle cx="30" cy="8" r="3" fill="#00A855"/>
                        </svg>
                    </div>
                </div>

                <!-- Lumpsum Calculator -->
                <div class="calc-card" data-type="lumpsum" data-category="investment" data-search="lumpsum one-time investment">
                    <div class="calc-content">
                        <span class="calc-category">Investment</span>
                        <h2 class="calc-title">Lumpsum</h2>
                        <p class="calc-description">Calculate returns for lumpsum investments to achieve your financial goals</p>
                    </div>
                    <div class="calc-icon lumpsum-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="20" width="30" height="20" rx="3" fill="#8B4513" opacity="0.8"/>
                            <rect x="18" y="23" width="24" height="14" rx="2" fill="#654321"/>
                            <rect x="20" y="10" width="20" height="12" rx="2" fill="#8B4513"/>
                            <rect x="22" y="12" width="6" height="8" rx="1" fill="#00A855"/>
                            <rect x="30" y="12" width="6" height="8" rx="1" fill="#00A855"/>
                            <rect x="38" y="12" width="6" height="8" rx="1" fill="#00A855"/>
                        </svg>
                    </div>
                </div>

                <!-- SWP Calculator -->
                <div class="calc-card" data-type="swp" data-category="retirement" data-search="swp systematic withdrawal plan retirement income">
                    <div class="calc-content">
                        <span class="calc-category">Retirement</span>
                        <h2 class="calc-title">SWP</h2>
                        <p class="calc-description">Calculate your final amount with Systematic Withdrawal Plans (SWP)</p>
                    </div>
                    <div class="calc-icon swp-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="30" cy="40" rx="18" ry="12" fill="#DC143C" opacity="0.8"/>
                            <ellipse cx="30" cy="38" rx="15" ry="10" fill="#FF6347"/>
                            <circle cx="30" cy="35" r="8" fill="#FFD700"/>
                            <rect x="28" y="20" width="4" height="15" fill="#8B4513"/>
                            <circle cx="30" cy="18" r="4" fill="#FFD700"/>
                        </svg>
                    </div>
                </div>

                <!-- Mutual Fund Calculator -->
                <div class="calc-card" data-type="mutual-fund" data-category="investment" data-search="mutual fund mf expense ratio tax">
                    <div class="calc-content">
                        <span class="calc-category">Investment</span>
                        <h2 class="calc-title">Mutual Fund</h2>
                        <p class="calc-description">Calculate the returns on your mutual fund investments with expense ratio and tax considerations</p>
                    </div>
                    <div class="calc-icon mf-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="20" r="8" fill="#4169E1" opacity="0.3"/>
                            <rect x="10" y="35" width="8" height="15" rx="1" fill="#00A855"/>
                            <rect x="20" y="30" width="8" height="20" rx="1" fill="#00A855"/>
                            <rect x="30" y="25" width="8" height="25" rx="1" fill="#00A855"/>
                            <rect x="40" y="20" width="8" height="30" rx="1" fill="#00A855"/>
                            <circle cx="30" cy="15" r="6" fill="#4169E1"/>
                        </svg>
                    </div>
                </div>

                <!-- SSY Calculator -->
                <div class="calc-card" data-type="ssy" data-category="retirement" data-search="ssy sukanya samriddhi yojana girl child">
                    <div class="calc-content">
                        <span class="calc-category">Retirement</span>
                        <h2 class="calc-title">SSY</h2>
                        <p class="calc-description">Calculate returns for Sukanya Samriddhi Yojana (SSY) as per your investment</p>
                    </div>
                    <div class="calc-icon ssy-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="25" width="20" height="25" rx="2" fill="#4A90E2" opacity="0.3"/>
                            <rect x="22" y="27" width="16" height="21" rx="1" fill="#4A90E2"/>
                            <circle cx="30" cy="15" r="5" fill="#FFD700"/>
                            <path d="M25 20 L30 15 L35 20" stroke="#FFD700" stroke-width="2" fill="none"/>
                            <text x="30" y="42" font-size="12" fill="#FFD700" text-anchor="middle" font-weight="bold">?</text>
                        </svg>
                    </div>
                </div>

                <!-- PPF Calculator -->
                <div class="calc-card" data-type="po-ppf" data-category="retirement" data-search="ppf public provident fund">
                    <div class="calc-content">
                        <span class="calc-category">Retirement</span>
                        <h2 class="calc-title">PPF</h2>
                        <p class="calc-description">Calculate your returns on Public Provident Fund (PPF)</p>
                    </div>
                    <div class="calc-icon ppf-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="20" width="30" height="25" rx="2" fill="#00A855" opacity="0.3"/>
                            <rect x="17" y="22" width="26" height="21" rx="1" fill="#00A855"/>
                            <rect x="10" y="35" width="8" height="12" rx="1" fill="#00A855"/>
                            <rect x="20" y="30" width="8" height="17" rx="1" fill="#00A855"/>
                            <rect x="30" y="25" width="8" height="22" rx="1" fill="#00A855"/>
                            <rect x="40" y="20" width="8" height="27" rx="1" fill="#00A855"/>
                        </svg>
                    </div>
                </div>

                <!-- EPF Calculator -->
                <div class="calc-card" data-type="epf" data-category="retirement" data-search="epf employee provident fund">
                    <div class="calc-content">
                        <span class="calc-category">Retirement</span>
                        <h2 class="calc-title">EPF</h2>
                        <p class="calc-description">Calculate returns for your Employee's Provident Fund (EPF)</p>
                    </div>
                    <div class="calc-icon epf-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="15" width="20" height="25" rx="2" fill="#FFD700" opacity="0.3"/>
                            <rect x="22" y="17" width="16" height="21" rx="1" fill="#FFD700"/>
                            <circle cx="30" cy="12" r="4" fill="#8B4513"/>
                            <rect x="15" y="42" width="30" height="8" rx="1" fill="#654321"/>
                            <circle cx="30" cy="8" r="2" fill="#4169E1"/>
                        </svg>
                    </div>
                </div>

                <!-- FD Calculator -->
                <div class="calc-card" data-type="fd" data-category="interest" data-search="fd fixed deposit">
                    <div class="calc-content">
                        <span class="calc-category">Interest</span>
                        <h2 class="calc-title">Fixed Deposit</h2>
                        <p class="calc-description">Check returns on your fixed deposits (FDs) without any hassle</p>
                    </div>
                    <div class="calc-icon fd-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="20" fill="#FFD700" opacity="0.3"/>
                            <circle cx="30" cy="30" r="18" fill="#FFD700"/>
                            <text x="30" y="36" font-size="16" fill="#1a1a1a" text-anchor="middle" font-weight="bold">?</text>
                        </svg>
                    </div>
                </div>

                <!-- Brokerage Calculator -->
                <div class="calc-card" data-type="brokerage" data-category="trading" data-search="brokerage trading charges stt fees">
                    <div class="calc-content">
                        <span class="calc-category">Trading</span>
                        <h2 class="calc-title">Brokerage</h2>
                        <p class="calc-description">Calculate trading charges including brokerage, STT, and other fees</p>
                    </div>
                    <div class="calc-icon brokerage-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="20" width="30" height="25" rx="2" fill="#4169E1" opacity="0.3"/>
                            <rect x="17" y="22" width="26" height="21" rx="1" fill="#4169E1"/>
                            <path d="M20 30 L25 25 L30 30 L35 25 L40 30" stroke="#FFD700" stroke-width="2" fill="none"/>
                        </svg>
                    </div>
                </div>

                <!-- Margin Calculator -->
                <div class="calc-card" data-type="margin" data-category="trading" data-search="margin trading requirements">
                    <div class="calc-content">
                        <span class="calc-category">Trading</span>
                        <h2 class="calc-title">Margin</h2>
                        <p class="calc-description">Determine margin requirements for equity and derivative trading positions</p>
                    </div>
                    <div class="calc-icon margin-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="25" width="30" height="20" rx="2" fill="#00A855" opacity="0.3"/>
                            <rect x="17" y="27" width="26" height="16" rx="1" fill="#00A855"/>
                            <rect x="20" y="15" width="20" height="8" rx="1" fill="#FFD700"/>
                        </svg>
                    </div>
                </div>

                <!-- MTF Calculator -->
                <div class="calc-card" data-type="mtf" data-category="trading" data-search="mtf margin trading facility leverage">
                    <div class="calc-content">
                        <span class="calc-category">Trading</span>
                        <h2 class="calc-title">MTF</h2>
                        <p class="calc-description">Calculate Margin Trading Facility costs and potential returns on leveraged positions</p>
                    </div>
                    <div class="calc-icon mtf-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="20" width="20" height="25" rx="2" fill="#FF6347" opacity="0.3"/>
                            <rect x="22" y="22" width="16" height="21" rx="1" fill="#FF6347"/>
                            <rect x="15" y="15" width="30" height="5" rx="1" fill="#4169E1"/>
                        </svg>
                    </div>
                </div>

                <!-- CAGR Calculator -->
                <div class="calc-card" data-type="cagr" data-category="investment" data-search="cagr compound annual growth rate performance">
                    <div class="calc-content">
                        <span class="calc-category">Investment</span>
                        <h2 class="calc-title">CAGR</h2>
                        <p class="calc-description">Calculate Compound Annual Growth Rate for your investment performance analysis</p>
                    </div>
                    <div class="calc-icon cagr-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="35" width="30" height="10" rx="2" fill="#00A855" opacity="0.3"/>
                            <path d="M20 40 L25 30 L30 25 L35 20 L40 15" stroke="#00A855" stroke-width="3" fill="none"/>
                            <circle cx="20" cy="40" r="2" fill="#00A855"/>
                            <circle cx="40" cy="15" r="2" fill="#00A855"/>
                        </svg>
                    </div>
                </div>

                <!-- ELSS Calculator -->
                <div class="calc-card" data-type="elss" data-category="tax" data-search="elss equity linked savings scheme tax saving">
                    <div class="calc-content">
                        <span class="calc-category">Tax</span>
                        <h2 class="calc-title">ELSS</h2>
                        <p class="calc-description">Calculate returns on Equity Linked Savings Scheme with tax benefits</p>
                    </div>
                    <div class="calc-icon elss-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="20" width="20" height="25" rx="2" fill="#4169E1" opacity="0.3"/>
                            <rect x="22" y="22" width="16" height="21" rx="1" fill="#4169E1"/>
                            <path d="M25 15 L30 10 L35 15" stroke="#FFD700" stroke-width="2" fill="none"/>
                            <circle cx="30" cy="8" r="3" fill="#FFD700"/>
                        </svg>
                    </div>
                </div>

                <!-- Step Up SIP Calculator -->
                <div class="calc-card" data-type="step-up-sip" data-category="investment" data-search="step up sip increment">
                    <div class="calc-content">
                        <span class="calc-category">Investment</span>
                        <h2 class="calc-title">Step Up SIP</h2>
                        <p class="calc-description">Calculate returns on SIP with annual increment in investment amount</p>
                    </div>
                    <div class="calc-icon stepup-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="25" width="8" height="20" rx="1" fill="#FFD700"/>
                            <rect x="30" y="20" width="8" height="25" rx="1" fill="#FFD700"/>
                            <rect x="40" y="15" width="8" height="30" rx="1" fill="#FFD700"/>
                            <path d="M24 30 L28 25 L32 30" stroke="#00A855" stroke-width="2" fill="none"/>
                        </svg>
                    </div>
                </div>

                <!-- RD Calculator -->
                <div class="calc-card" data-type="rd" data-category="interest" data-search="rd recurring deposit">
                    <div class="calc-content">
                        <span class="calc-category">Interest</span>
                        <h2 class="calc-title">Recurring Deposit</h2>
                        <p class="calc-description">Calculate Recurring Deposit maturity value with monthly contributions</p>
                    </div>
                    <div class="calc-icon rd-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="20" width="20" height="25" rx="2" fill="#8B4513" opacity="0.3"/>
                            <rect x="22" y="22" width="16" height="21" rx="1" fill="#8B4513"/>
                            <circle cx="30" cy="15" r="4" fill="#FFD700"/>
                        </svg>
                    </div>
                </div>

                <!-- Post Office FD Calculator -->
                <div class="calc-card" data-type="po-fd" data-category="interest" data-search="post office fd fixed deposit government">
                    <div class="calc-content">
                        <span class="calc-category">Interest</span>
                        <h2 class="calc-title">Post Office FD</h2>
                        <p class="calc-description">Calculate returns on Post Office Fixed Deposit schemes with government rates</p>
                    </div>
                    <div class="calc-icon pofd-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="20" width="30" height="25" rx="2" fill="#4169E1" opacity="0.3"/>
                            <rect x="17" y="22" width="26" height="21" rx="1" fill="#4169E1"/>
                            <rect x="20" y="10" width="20" height="8" rx="1" fill="#FFD700"/>
                        </svg>
                    </div>
                </div>

                <!-- Post Office RD Calculator -->
                <div class="calc-card" data-type="po-rd" data-category="interest" data-search="post office rd recurring deposit government">
                    <div class="calc-content">
                        <span class="calc-category">Interest</span>
                        <h2 class="calc-title">Post Office RD</h2>
                        <p class="calc-description">Calculate Post Office Recurring Deposit returns with government interest rates</p>
                    </div>
                    <div class="calc-icon pord-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="20" width="20" height="25" rx="2" fill="#4169E1" opacity="0.3"/>
                            <rect x="22" y="22" width="16" height="21" rx="1" fill="#4169E1"/>
                            <circle cx="30" cy="15" r="4" fill="#FFD700"/>
                            <rect x="15" y="10" width="30" height="5" rx="1" fill="#8B4513"/>
                        </svg>
                    </div>
                </div>

                <!-- NSC Calculator -->
                <div class="calc-card" data-type="nsc" data-category="tax" data-search="nsc national savings certificate tax saving">
                    <div class="calc-content">
                        <span class="calc-category">Tax</span>
                        <h2 class="calc-title">NSC</h2>
                        <p class="calc-description">Calculate National Savings Certificate returns with tax saving benefits</p>
                    </div>
                    <div class="calc-icon nsc-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="15" width="20" height="30" rx="2" fill="#FFD700" opacity="0.3"/>
                            <rect x="22" y="17" width="16" height="26" rx="1" fill="#FFD700"/>
                            <circle cx="30" cy="12" r="3" fill="#4169E1"/>
                        </svg>
                    </div>
                </div>

                <!-- ETF Calculator -->
                <div class="calc-card" data-type="etf" data-category="investment" data-search="etf exchange traded fund">
                    <div class="calc-content">
                        <span class="calc-category">Investment</span>
                        <h2 class="calc-title">ETF</h2>
                        <p class="calc-description">Calculate Exchange Traded Fund returns with expense ratio considerations</p>
                    </div>
                    <div class="calc-icon etf-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="15" y="30" width="30" height="15" rx="2" fill="#00A855" opacity="0.3"/>
                            <rect x="17" y="32" width="26" height="11" rx="1" fill="#00A855"/>
                            <circle cx="30" cy="20" r="8" fill="#4169E1" opacity="0.5"/>
                        </svg>
                    </div>
                </div>

                <!-- Simple Interest Calculator -->
                <div class="calc-card" data-type="simple-interest" data-category="interest" data-search="simple interest loan deposit">
                    <div class="calc-content">
                        <span class="calc-category">Interest</span>
                        <h2 class="calc-title">Simple Interest</h2>
                        <p class="calc-description">Calculate simple interest on loans and deposits with straightforward calculations</p>
                    </div>
                    <div class="calc-icon simple-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="20" width="20" height="25" rx="2" fill="#4A90E2" opacity="0.3"/>
                            <rect x="22" y="22" width="16" height="21" rx="1" fill="#4A90E2"/>
                            <circle cx="30" cy="15" r="5" fill="#FFD700"/>
                        </svg>
                    </div>
                </div>

                <!-- Compound Interest Calculator -->
                <div class="calc-card" data-type="compound-interest" data-category="interest" data-search="compound interest compounding frequency">
                    <div class="calc-content">
                        <span class="calc-category">Interest</span>
                        <h2 class="calc-title">Compound Interest</h2>
                        <p class="calc-description">Calculate compound interest with different compounding frequencies and time periods</p>
                    </div>
                    <div class="calc-icon compound-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="25" width="20" height="20" rx="2" fill="#00A855" opacity="0.3"/>
                            <rect x="22" y="27" width="16" height="16" rx="1" fill="#00A855"/>
                            <circle cx="30" cy="20" r="6" fill="#FFD700"/>
                            <circle cx="30" cy="20" r="3" fill="#4169E1"/>
                        </svg>
                    </div>
                </div>

                <!-- Short Term Capital Gain Calculator -->
                <div class="calc-card" data-type="stcg" data-category="tax" data-search="stcg short term capital gains tax">
                    <div class="calc-content">
                        <span class="calc-category">Tax</span>
                        <h2 class="calc-title">STCG</h2>
                        <p class="calc-description">Calculate tax implications on short-term capital gains from investments</p>
                    </div>
                    <div class="calc-icon stcg-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="20" width="20" height="25" rx="2" fill="#DC143C" opacity="0.3"/>
                            <rect x="22" y="22" width="16" height="21" rx="1" fill="#DC143C"/>
                            <path d="M25 15 L30 10 L35 15" stroke="#FFD700" stroke-width="2" fill="none"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- No Results Message -->
            <div class="no-results" id="noResults" style="display: none;">
                <div class="no-results-icon">-</div>
                <h3>No calculators found</h3>
                <p>Try adjusting your search or filter criteria</p>
            </div>
            </div>
        </section>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script src="../../js/calculator-functions.js"></script>
    <script src="../../js/calculators.js"></script>

    <script>
        // Enhanced Search and Filter Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('calculatorSearch');
            const filterChips = document.querySelectorAll('.filter-chip');
            const calcCards = document.querySelectorAll('.calc-card');
            const noResults = document.getElementById('noResults');
            const calculatorsGrid = document.getElementById('calculatorsGrid');
            
            let currentCategory = 'all';
            let currentSearch = '';
            
            // Search functionality
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    currentSearch = e.target.value.toLowerCase().trim();
                    filterCalculators();
                });
            }
            
            // Filter functionality
            filterChips.forEach(chip => {
                chip.addEventListener('click', function() {
                    // Remove active class from all chips
                    filterChips.forEach(c => c.classList.remove('active'));
                    // Add active class to clicked chip
                    this.classList.add('active');
                    currentCategory = this.getAttribute('data-category');
                    filterCalculators();
                });
            });
            
            function filterCalculators() {
                let visibleCount = 0;
                
                calcCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    const searchText = card.getAttribute('data-search') || '';
                    const title = card.querySelector('.calc-title')?.textContent.toLowerCase() || '';
                    const description = card.querySelector('.calc-description')?.textContent.toLowerCase() || '';
                    
                    const matchesCategory = currentCategory === 'all' || category === currentCategory;
                    const matchesSearch = !currentSearch || 
                        searchText.toLowerCase().includes(currentSearch) ||
                        title.includes(currentSearch) ||
                        description.includes(currentSearch);
                    
                    if (matchesCategory && matchesSearch) {
                        card.style.display = '';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Show/hide no results message
                if (visibleCount === 0) {
                    noResults.style.display = 'block';
                    calculatorsGrid.style.display = 'none';
                } else {
                    noResults.style.display = 'none';
                    calculatorsGrid.style.display = 'grid';
                }
            }
        });
    </script>

    <script src="../../js/search.js"></script>
    <script src="../../js/mobile-menu.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>


<?php
// Include footer
require_once '../../includes/footer.php';
?>

