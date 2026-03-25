<?php
/**
 * Gretex - Indian Equity Market Leader
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Gretex - Indian Equity Market Leader';$additionalCSS = ['../css/calculators.css'];

$additionalScripts = [
    'https://cdn.jsdelivr.net/npm/chart.js',
];

$pageStyles = "/* Services cards - same style as services.php */
        :root {
            --svc-card-border: rgba(15, 23, 42, 0.08);
        }

        .services-grid {
            position: relative;
            z-index: 1;
            display: grid !important;
            width: 100%;
            grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            gap: clamp(1.25rem, 2.5vw, 1.75rem) !important;
            align-items: stretch;
            max-width: none;
            margin: 0;
        }

        .services-carousel-shell {
            margin-top: 1.5rem;
            padding: 0.65rem 0 0.8rem;
        }

        .services-section .services-grid {
            display: flex !important;
            gap: 1.25rem !important;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            padding: 0.95rem 0.125rem 1.35rem;
            scrollbar-width: none;
            -ms-overflow-style: none;
            align-items: stretch;
        }

        .services-section .services-grid::-webkit-scrollbar {
            display: none;
        }

        .services-section .service-card-link {
            flex: 0 0 clamp(300px, 34vw, 380px);
            width: clamp(300px, 34vw, 380px);
            scroll-snap-align: start;
        }

        .services-scroll-controls {
            margin-top: 0.35rem;
        }

        .service-card-link {
            display: block !important;
            height: 100%;
            text-decoration: none;
            color: inherit;
            outline: none;
            border-radius: 22px;
        }

        .service-card-link:focus-visible {
            outline: 2px solid #7c3aed;
            outline-offset: 3px;
        }

        .service-card-link:focus-visible .service-card {
            box-shadow: 0 0 0 3px rgba(var(--accent-rgb), 0.25), 0 12px 40px rgba(15, 23, 42, 0.1) !important;
            border-color: rgba(var(--accent-rgb), 0.35) !important;
        }

        .service-card {
            display: flex !important;
            flex-direction: column !important;
            align-items: stretch !important;
            text-align: left !important;
            justify-content: space-between !important;
            min-height: clamp(248px, 32vw, 308px) !important;
            visibility: visible !important;
            opacity: 1 !important;
            background: linear-gradient(165deg, #ffffff 0%, #f8fafc 55%, #ffffff 100%) !important;
            border: 1px solid var(--svc-card-border) !important;
            border-radius: 22px !important;
            padding: clamp(1.55rem, 2.2vw, 1.95rem) !important;
            padding-bottom: clamp(1.8rem, 3vw, 2.35rem) !important;
            position: relative !important;
            overflow: hidden !important;
            isolation: isolate !important;
            box-shadow:
                0 1px 0 rgba(255, 255, 255, 0.9) inset,
                0 4px 24px rgba(15, 23, 42, 0.06),
                0 1px 3px rgba(15, 23, 42, 0.04) !important;
            transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            border-radius: 22px 22px 0 0;
            background: linear-gradient(90deg, var(--accent), rgba(var(--accent-rgb), 0.45));
            z-index: 4;
            opacity: 0.92;
            transform-origin: left;
            transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.3s ease;
        }

        .service-card::after {
            content: '';
            position: absolute;
            top: -35%;
            right: -25%;
            width: min(78%, 220px);
            aspect-ratio: 1;
            border-radius: 50%;
            background: radial-gradient(circle at 40% 40%, rgba(var(--accent-rgb), 0.14) 0%, rgba(var(--accent-rgb), 0.04) 42%, transparent 68%);
            pointer-events: none;
            z-index: 0;
            transition: opacity 0.4s ease, transform 0.45s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .service-card-inner {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            flex: 1;
            min-height: 0;
            max-width: min(100%, 22rem);
        }

        .service-card-link:hover .service-card::before {
            transform: scaleX(1.02);
            opacity: 1;
        }

        .service-card-link:hover .service-card::after {
            opacity: 1;
            transform: scale(1.06);
        }

        .service-card:hover {
            transform: translateY(-8px);
            border-color: rgba(var(--accent-rgb), 0.22) !important;
            box-shadow:
                0 1px 0 rgba(255, 255, 255, 0.95) inset,
                0 20px 50px rgba(15, 23, 42, 0.1),
                0 8px 24px rgba(var(--accent-rgb), 0.12),
                0 0 0 1px rgba(var(--accent-rgb), 0.08) !important;
        }

        .service-card h3 {
            font-family: 'Inter', sans-serif;
            margin: 0 0 0.75rem;
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #0f172a;
            line-height: 1.25;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .service-card-link:hover .service-card h3 {
            color: var(--accent);
            transform: translateX(2px);
        }

        .service-card p {
            margin: 0;
            color: #64748b;
            font-size: 0.9375rem;
            line-height: 1.6;
            flex: 1;
            transition: color 0.3s ease;
        }

        .service-card-link:hover .service-card p {
            color: #475569;
        }

        .service-card-read {
            margin-top: auto;
            padding-top: 1.35rem;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.875rem;
            color: #94a3b8;
            font-weight: 600;
            transition: color 0.25s ease;
        }

        .service-card-link:hover .service-card-read {
            color: var(--accent);
        }

        .service-card-read-btn {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #ffffff;
            border: 1px solid rgba(var(--accent-rgb), 0.2);
            box-shadow: 0 2px 12px rgba(var(--accent-rgb), 0.12);
            color: var(--accent);
            transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease, transform 0.3s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.3s ease;
        }

        .service-card-read-btn svg {
            width: 16px;
            height: 16px;
        }

        .service-card-link:hover .service-card-read-btn {
            background: var(--accent);
            border-color: var(--accent);
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(var(--accent-rgb), 0.35);
            transform: translateX(4px);
        }

        .service-card-deco {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 48%;
            max-width: 200px;
            aspect-ratio: 1;
            pointer-events: none;
            z-index: 1;
        }

        .service-card-deco-circle {
            position: absolute;
            right: -12%;
            bottom: -18%;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, rgba(var(--accent-rgb), 0.22) 0%, rgba(var(--accent-rgb), 0.08) 42%, rgba(241, 245, 249, 0.95) 100%);
            transition: transform 0.45s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.35s ease;
        }

        .service-card-link:hover .service-card-deco-circle {
            transform: scale(1.05);
        }

        .service-card-deco-icon {
            position: absolute;
            right: clamp(10px, 6%, 26px);
            bottom: clamp(10px, 6%, 22px);
            width: clamp(36px, 5.5vw, 58px);
            height: clamp(36px, 5.5vw, 58px);
            z-index: 2;
            color: var(--accent);
            opacity: 0.9;
            filter: drop-shadow(0 2px 10px rgba(var(--accent-rgb), 0.28));
            transition: transform 0.45s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.35s ease, filter 0.35s ease;
        }

        .service-card-link:hover .service-card-deco-icon {
            opacity: 1;
            transform: translateY(-3px) scale(1.06);
            filter: drop-shadow(0 8px 20px rgba(var(--accent-rgb), 0.38));
        }

        .service-card-deco-icon svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .service-card--equity { --accent: #6d28d9; --accent-rgb: 109,40,217; }
        .service-card--trading { --accent: #34A853; --accent-rgb: 52,168,83; }
        .service-card--aif { --accent: #AA16C4; --accent-rgb: 170,22,196; }
        .service-card--market-making { --accent: #F39C12; --accent-rgb: 243,156,18; }
        .service-card--futures { --accent: #1873E0; --accent-rgb: 24,115,224; }
        .service-card--mutual { --accent: #059669; --accent-rgb: 5,150,105; }

        /* Calculators cards - aligned to calculators page card layout */
        .calculators-section .section-header .section-header-content {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .calculators-carousel-shell {
            margin-top: 1.75rem;
            padding: 0.65rem 0 0.8rem;
        }

        .calculators-section .calculators-grid {
            display: flex;
            gap: 1.25rem;
            margin-top: 0;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            padding: 0.95rem 0.125rem 1.35rem;
            scrollbar-width: none;
            -ms-overflow-style: none;
            align-items: stretch;
        }

        .calculators-section .calculators-grid::-webkit-scrollbar {
            display: none;
        }

        .calculators-section .calc-card {
            cursor: pointer;
            min-height: 300px;
            height: 300px;
            flex: 0 0 clamp(340px, 40vw, 460px);
            width: clamp(340px, 40vw, 460px);
            scroll-snap-align: start;
            position: relative;
            z-index: 1;
            transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.3s ease;
            will-change: transform;
        }

        .calculators-section .calc-card:hover {
            transform: translateY(-6px);
            z-index: 3;
        }

        .calc-scroll-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.9rem;
            margin-top: 5rem;
            position: relative;
            z-index: 25;
            pointer-events: auto;
        }

        .calc-scroll-btn {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            border: 1px solid rgba(15, 23, 42, 0.08);
            background: rgba(255, 255, 255, 0.88);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.08);
            color: #0f172a;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .calc-scroll-btn i {
            width: 20px;
            height: 20px;
        }

        .calc-scroll-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.14);
        }

        .calc-scroll-btn:disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }

        .calc-scroll-dots {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            min-width: 100px;
            justify-content: center;
        }

        .calc-scroll-dot {
            width: 11px;
            height: 11px;
            border-radius: 999px;
            border: 0;
            background: rgba(52, 168, 83, 0.3);
            padding: 0;
            transition: transform 0.2s ease, background-color 0.2s ease;
            cursor: pointer;
        }

        .calculators-section .see-all-btn {
            cursor: pointer;
        }

        .calc-scroll-dot.is-active {
            background: #11a84b;
            transform: scale(1.05);
        }

        @media (max-width: 1024px) {
            .services-section .services-grid {
                gap: 1rem !important;
            }

            .services-section .service-card-link {
                flex-basis: min(82vw, 420px);
                width: min(82vw, 420px);
            }

            .calculators-section .calculators-grid {
                gap: 1rem;
            }

            .calculators-section .calc-card {
                flex-basis: min(82vw, 420px);
                width: min(82vw, 420px);
            }
        }

        @media (max-width: 768px) {
            .services-section .services-grid {
                gap: 0.875rem !important;
            }

            .services-section .service-card-link {
                flex-basis: min(86vw, 340px);
                width: min(86vw, 340px);
            }

            .calculators-section .calculators-grid {
                gap: 0.875rem;
            }

            .calc-scroll-btn {
                width: 52px;
                height: 52px;
            }

            .calculators-section .calc-card {
                flex-basis: min(86vw, 340px);
                width: min(86vw, 340px);
            }
        }";

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



    <!-- Scroll Progress Bar -->
    <div class="scroll-progress-bar"></div>

    <!-- Parallax Orbs Container (Fixed Background) -->
    <div class="parallax-bg-container">
        <div class="floating-orb floating-orb-1"></div>
        <div class="floating-orb floating-orb-2"></div>
        <div class="floating-orb floating-orb-3"></div>
        <div class="floating-orb floating-orb-4"></div>
    </div>

    <!-- Navigation -->

    <!-- Hero Section -->
    <main class="hero" id="home">
        <div class="grid-background"></div>
        <div class="hero-content">
            <div class="trust-badge">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2L3 7V12C3 16.55 6.84 20.74 9.91 21.79C11.04 22.26 12.96 22.26 14.09 21.79C17.16 20.74 21 16.55 21 12V7L12 2Z"
                        stroke="currentColor" stroke-width="2" />
                    <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>TRUSTED BY OVER 1000 BUSINESSES WORLDWIDE</span>
            </div>

            <h1 class="hero-title">
                INDIAN EQUITY<br>
                <span class="highlight-purple">MARKET LEADER</span>
            </h1>

            <p class="hero-description">
                Gretex is a leading financial services group. Discover our reliable &<br>
                secure trading platform designed for high-performance execution.
            </p>

            <div class="cta-buttons">
                <button type="button" class="btn-primary"
                    onclick="window.open('https://onboarding.gretexbroking.com:8080/OnBoarding/', '_blank'); return false;">OPEN
                    NEW ACCOUNT</button>
                <button type="button" class="btn-secondary">DISCOVER MORE</button>
            </div>
        </div>
    </main>

    <!-- Associated Section -->
    <section class="associated-section scroll-reveal">
        <div class="container">
            <h2 class="section-title scroll-fade-up">
                <!-- <span class="section-title-icon"></span> -->
                <span class="section-title-text">WE ARE <span class="highlight">ASSOCIATED</span> WITH</span>
            </h2>

            <div class="partners-grid stagger-container">
                <div class="partner-card stagger-item scroll-zoom-in">
                    <div class="partner-logo">
                        <img src="https://www.bseindia.com/include/images/spbse.png" alt="BSE Logo" class="bse-logo">
                    </div>
                    <p>BSE Limited, incorporated in 1875, is Asia's first & the world's fastest stock exchange with a
                        speed of 6 microseconds. BSE is a corporatized and demutualized entity.</p>
                </div>

                <div class="partner-card stagger-item scroll-zoom-in">
                    <div class="partner-logo">
                        <img src="https://www.nseindia.com/next-assets/images/NSE_Logo.svg" alt="NSE Logo"
                            class="nse-logo">
                    </div>
                    <p>National Stock Exchange of India (NSE) is the leading stock exchange of India, located in the
                        financial capital Mumbai.</p>
                </div>
            </div>

            <div class="demat-section">
                <h3 class="demat-title">OPEN YOUR DEMAT ACCOUNT WITH GRETEX BROKING AT</h3>

                <div class="demat-card">
                    <div class="demat-logo">
                        <img src="https://nsdl.co.in/images/logo.jpg" alt="NSDL Logo" class="nsdl-logo">
                    </div>
                    <p>National Securities Depository Limited (NSDL) is an Indian central securities depository, based
                        in Mumbai. It was established in August 1996 as the first electronic securities depository in
                        India with national coverage. It was established based on a suggestion by a national institution
                        responsible for the economic development of India. It's demat accounts now hold assets worth $4
                        trillion.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header">
                <h2>OUR <span class="highlight">SERVICES</span></h2>
                <p>Comprehensive financial products tailored for your success in the Indian markets</p>
            </div>

            <div class="services-carousel-shell">
                <div class="services-grid" id="servicesGrid">
                    <a href="services/service-equity.php" class="service-card-link">
                    <div class="service-card service-card--equity">
                        <div class="service-card-inner">
                            <h3>Equity</h3>
                            <p>Cash-market trading on a single screen—built for fast execution and straightforward order flow in Indian equities.</p>
                            <span class="service-card-read">
                                <span class="service-card-read-btn" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                Read more
                            </span>
                        </div>
                        <div class="service-card-deco" aria-hidden="true">
                            <div class="service-card-deco-circle"></div>
                            <div class="service-card-deco-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 3V21H21" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7 14L10 11L13 14L20 7" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="20" cy="7" r="2" fill="currentColor" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="services/trading.php" class="service-card-link">
                    <div class="service-card service-card--trading">
                        <div class="service-card-inner">
                            <h3>Trading</h3>
                            <p>Derivatives across exchanges—participate in F&amp;O with tools suited to active strategies and risk-managed positions.</p>
                            <span class="service-card-read">
                                <span class="service-card-read-btn" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                Read more
                            </span>
                        </div>
                        <div class="service-card-deco" aria-hidden="true">
                            <div class="service-card-deco-circle"></div>
                            <div class="service-card-deco-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.75" />
                                    <path d="M3 9H21" stroke="currentColor" stroke-width="1.75" />
                                    <path d="M7 13H10" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <path d="M7 16H13" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="services/service-aif.php" class="service-card-link">
                    <div class="service-card service-card--aif">
                        <div class="service-card-inner">
                            <h3>AIF</h3>
                            <p>Alternative investment funds for structured portfolios—aligned to mandates, reporting, and long-term outcomes.</p>
                            <span class="service-card-read">
                                <span class="service-card-read-btn" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                Read more
                            </span>
                        </div>
                        <div class="service-card-deco" aria-hidden="true">
                            <div class="service-card-deco-circle"></div>
                            <div class="service-card-deco-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.75" />
                                    <path d="M12 2V6" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <path d="M12 18V22" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <path d="M4.93 4.93L7.76 7.76" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <path d="M16.24 16.24L19.07 19.07" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <path d="M2 12H6" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <path d="M18 12H22" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    </a>

                    <a href="services/service-market-making.php" class="service-card-link">
                    <div class="service-card service-card--market-making">
                        <div class="service-card-inner">
                            <h3>Market making</h3>
                            <p>Liquidity and competitive spreads—supporting orderly markets and institutional execution when depth matters.</p>
                            <span class="service-card-read">
                                <span class="service-card-read-btn" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                Read more
                            </span>
                        </div>
                        <div class="service-card-deco" aria-hidden="true">
                            <div class="service-card-deco-circle"></div>
                            <div class="service-card-deco-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 7H4C2.89543 7 2 7.89543 2 9V19C2 20.1046 2.89543 21 4 21H20C21.1046 21 22 20.1046 22 19V9C22 7.89543 21.1046 7 20 7Z" stroke="currentColor" stroke-width="1.75" />
                                    <path d="M16 7V5C16 3.89543 15.1046 3 14 3H10C8.89543 3 8 3.89543 8 5V7" stroke="currentColor" stroke-width="1.75" />
                                    <path d="M12 11V17" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <path d="M9 14H15" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    </a>

                    <!-- <a href="services/service-mutual-funds.php" class="service-card-link">
                    <div class="service-card service-card--mutual">
                        <div class="service-card-inner">
                            <h3>Mutual fund</h3>
                            <p>SIP, SWP, and STP—stay invested across cycles with distribution support and clear fund choices.</p>
                            <span class="service-card-read">
                                <span class="service-card-read-btn" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                Read more
                            </span>
                        </div>
                        <div class="service-card-deco" aria-hidden="true">
                            <div class="service-card-deco-circle"></div>
                            <div class="service-card-deco-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="6" width="20" height="12" rx="2" stroke="currentColor" stroke-width="1.75" />
                                    <path d="M6 10H10" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <path d="M6 14H8" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                    <circle cx="16" cy="12" r="2" stroke="currentColor" stroke-width="1.75" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    </a> -->
                </div>

                <div class="calc-scroll-controls services-scroll-controls" aria-label="Services carousel controls">
                    <button type="button" class="calc-scroll-btn" id="servicesPrevBtn" aria-label="Previous services">
                        <i data-lucide="chevron-left"></i>
                    </button>
                    <div class="calc-scroll-dots" id="servicesScrollDots" aria-hidden="true"></div>
                    <button type="button" class="calc-scroll-btn" id="servicesNextBtn" aria-label="Next services">
                        <i data-lucide="chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Calculators Section -->
    <section class="calculators-section" id="calculators">
        <div class="container">
            <div class="section-header">
                <div class="section-header-content">
                    <div class="section-title-group">
                        <h2>FINANCIAL <span class="highlight">CALCULATORS</span></h2>
                        <p>Powerful financial planning tools to help you make informed investment decisions</p>
                    </div>
                    <a href="calculator/calculators.php" class="see-all-btn">
                        <span>See All</span>
                        <i data-lucide="arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="calculators-carousel-shell">
                <div class="calculators-grid" id="calculatorsGrid">
                    <div class="calc-card" data-type="sip" data-category="investment">
                        <div class="calc-content">
                            <span class="calc-category">Investment</span>
                            <h2 class="calc-title">SIP</h2>
                            <p class="calc-description">Calculate how much you need to save or how much you will accumulate with your Systematic Investment Plan.</p>
                        </div>
                        <div class="calc-icon"><i data-lucide="trending-up"></i></div>
                    </div>

                    <div class="calc-card" data-type="lumpsum" data-category="investment">
                        <div class="calc-content">
                            <span class="calc-category">Investment</span>
                            <h2 class="calc-title">Lumpsum</h2>
                            <p class="calc-description">Calculate returns for lumpsum investments to achieve your financial goals.</p>
                        </div>
                        <div class="calc-icon"><i data-lucide="piggy-bank"></i></div>
                    </div>

                    <div class="calc-card" data-type="brokerage" data-category="trading">
                        <div class="calc-content">
                            <span class="calc-category">Trading</span>
                            <h2 class="calc-title">Brokerage</h2>
                            <p class="calc-description">Calculate trading charges including brokerage, STT, and other fees.</p>
                        </div>
                        <div class="calc-icon"><i data-lucide="activity"></i></div>
                    </div>

                    <div class="calc-card" data-type="margin" data-category="trading">
                        <div class="calc-content">
                            <span class="calc-category">Trading</span>
                            <h2 class="calc-title">Margin</h2>
                            <p class="calc-description">Determine margin requirements for equity and derivative trading positions.</p>
                        </div>
                        <div class="calc-icon"><i data-lucide="bar-chart-3"></i></div>
                    </div>

                    <div class="calc-card" data-type="fd" data-category="interest">
                        <div class="calc-content">
                            <span class="calc-category">Interest</span>
                            <h2 class="calc-title">Fixed Deposit</h2>
                            <p class="calc-description">Check returns on your fixed deposits (FDs) without any hassle.</p>
                        </div>
                        <div class="calc-icon"><i data-lucide="landmark"></i></div>
                    </div>

                    <div class="calc-card" data-type="stcg" data-category="tax">
                        <div class="calc-content">
                            <span class="calc-category">Tax</span>
                            <h2 class="calc-title">STCG</h2>
                            <p class="calc-description">Calculate tax implications on short-term capital gains from investments.</p>
                        </div>
                        <div class="calc-icon"><i data-lucide="percent"></i></div>
                    </div>
                </div>

                <div class="calc-scroll-controls" aria-label="Calculator carousel controls">
                    <button type="button" class="calc-scroll-btn" id="calcPrevBtn" aria-label="Previous calculators">
                        <i data-lucide="chevron-left"></i>
                    </button>
                    <div class="calc-scroll-dots" id="calcScrollDots" aria-hidden="true"></div>
                    <button type="button" class="calc-scroll-btn" id="calcNextBtn" aria-label="Next calculators">
                        <i data-lucide="chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Downloads Section -->
    <section class="downloads-section" id="downloads">
        <div class="container">
            <div class="section-header">
                <h2>Download Our Apps</h2>
                <p>Trade on the go with our powerful mobile and desktop applications</p>
            </div>

            <div class="downloads-grid">
                <div class="download-card">
                    <div class="download-icon"><i data-lucide="smartphone"></i></div>
                    <h3>Mobile Trading App</h3>
                    <p>Advanced mobile trading platform with real-time market data and instant order execution.</p>
                    <div class="download-buttons">
                        <a href="https://play.google.com/store/apps/details?id=com.gretexmutualfunds.mobile.app&hl=en"
                            target="_blank" rel="noopener noreferrer" class="download-btn">Android</a>
                        <a href="https://apps.apple.com/in/app/gretex-mutual-fund/id6504186053" target="_blank"
                            rel="noopener noreferrer" class="download-btn">iOS</a>
                    </div>
                </div>

                <div class="download-card">
                    <div class="download-icon"><i data-lucide="monitor"></i></div>
                    <h3>Desktop Terminal</h3>
                    <p>Professional desktop trading terminal with advanced charting and analysis tools.</p>
                    <div class="download-buttons">
                            <button type="button" class="download-btn">Windows</button>
                            <button type="button" class="download-btn">Mac</button>
                    </div>
                </div>

                <div class="download-card">
                    <div class="download-icon"><i data-lucide="globe"></i></div>
                    <h3>Web Trading</h3>
                    <p>Browser-based trading platform accessible from anywhere without any downloads.</p>
                    <div class="download-buttons">
                            <button type="button" class="download-btn">Launch Web</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="section-header">
                <h2>Get in <span class="highlight">Touch</span></h2>
                <p>Ready to start your investment journey? Contact our expert team today</p>
            </div>

            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon"><i data-lucide="mail"></i></div>
                        <h3>Email Us</h3>
                        <p><a href="mailto:support@gretexbroking.com">support@gretexbroking.com</a></p>
                        <p><a
                                href="mailto:investor.grievances@gretexbroking.com">investor.grievances@gretexbroking.com</a>
                        </p>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon"><i data-lucide="phone"></i></div>
                        <h3>Call Us</h3>
                        <p>02269006500 / 501</p>
                        <p>Monday to Friday: 9:00 AM - 6:00 PM</p>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon"><i data-lucide="map-pin"></i></div>
                        <h3>Visit Us</h3>
                        <p>Mumbai: Naman Midtown, A wing<br>
                            Unit 401, Fl No. 616, Tulsi Pipe Road<br>
                            Dadar West, Mumbai-400013</p>
                    </div>
                </div>

                <div class="contact-form-container">
                    <form class="contact-form">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" placeholder="Your Phone Number" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Your Message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Stock Market Ticker -->
    <!-- <section class="stock-ticker-section">
        <div class="ticker-container">
            <div class="ticker-wrapper">
                Ticker content will be populated by JavaScript
            </div>
        </div>
    </section> -->

    <!-- Footer -->

    <script src="../js/scroll-animations.js"></script>

    <script src="../js/gretex-financial.js"></script>
    <script src="../js/calculator-functions.js"></script>
    <script src="../js/calculators.js"></script>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const initHorizontalCarousel = function(config) {
                const grid = document.getElementById(config.gridId);
                const prevBtn = document.getElementById(config.prevBtnId);
                const nextBtn = document.getElementById(config.nextBtnId);
                const dotsWrap = document.getElementById(config.dotsId);

                if (!grid || !prevBtn || !nextBtn || !dotsWrap) {
                    return;
                }

                const cards = Array.from(grid.querySelectorAll(config.cardSelector));
                if (cards.length === 0) {
                    return;
                }

                let currentPage = 0;
                let totalPages = 1;
                let pageWidth = 1;
                let maxScroll = 0;

                const getGap = function() {
                    const styles = window.getComputedStyle(grid);
                    const gap = parseFloat(styles.columnGap || styles.gap || '0');
                    return Number.isFinite(gap) ? gap : 0;
                };

                const updateMetrics = function() {
                    const firstCard = cards[0];
                    if (!firstCard) {
                        return;
                    }
                    const gap = getGap();
                    const cardSpan = firstCard.offsetWidth + gap;
                    pageWidth = Math.max(1, grid.clientWidth);
                    maxScroll = Math.max(0, grid.scrollWidth - grid.clientWidth);
                    if (maxScroll === 0) {
                        totalPages = 1;
                        return;
                    }
                    const estimatedPagesByViewport = Math.round(maxScroll / pageWidth) + 1;
                    const estimatedPagesByCards = Math.ceil((cards.length * cardSpan) / pageWidth);
                    totalPages = Math.max(1, Math.max(estimatedPagesByViewport, estimatedPagesByCards));
                };

                const getScrollStep = function() {
                    const firstCard = cards[0];
                    if (!firstCard) {
                        return pageWidth;
                    }
                    return firstCard.offsetWidth + getGap();
                };

                const renderDots = function() {
                    dotsWrap.innerHTML = '';
                    for (let i = 0; i < totalPages; i += 1) {
                        const dot = document.createElement('button');
                        dot.type = 'button';
                        dot.className = 'calc-scroll-dot' + (i === currentPage ? ' is-active' : '');
                        dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                        dot.addEventListener('click', function() {
                            scrollToPage(i);
                        });
                        dotsWrap.appendChild(dot);
                    }
                };

                const refreshControls = function() {
                    const dots = dotsWrap.querySelectorAll('.calc-scroll-dot');
                    dots.forEach(function(dot, index) {
                        dot.classList.toggle('is-active', index === currentPage);
                    });
                    const atStart = grid.scrollLeft <= 1;
                    const atEnd = grid.scrollLeft >= (maxScroll - 1);
                    prevBtn.disabled = atStart;
                    nextBtn.disabled = atEnd;
                };

                const scrollToPage = function(pageIndex) {
                    updateMetrics();
                    currentPage = Math.max(0, Math.min(pageIndex, totalPages - 1));
                    const scrollLeft = Math.max(0, Math.min(currentPage * pageWidth, maxScroll));
                    grid.scrollTo({
                        left: scrollLeft,
                        behavior: 'smooth'
                    });
                    refreshControls();
                };

                const syncFromScroll = function() {
                    if (pageWidth <= 0) {
                        return;
                    }
                    const detectedPage = Math.round(grid.scrollLeft / pageWidth);
                    const nextPage = Math.max(0, Math.min(detectedPage, totalPages - 1));
                    if (nextPage !== currentPage) {
                        currentPage = nextPage;
                        refreshControls();
                    }
                };

                prevBtn.addEventListener('click', function() {
                    updateMetrics();
                    grid.scrollBy({
                        left: -getScrollStep(),
                        behavior: 'smooth'
                    });
                });

                nextBtn.addEventListener('click', function() {
                    updateMetrics();
                    grid.scrollBy({
                        left: getScrollStep(),
                        behavior: 'smooth'
                    });
                });

                let scrollTicking = false;
                grid.addEventListener('scroll', function() {
                    if (scrollTicking) {
                        return;
                    }
                    scrollTicking = true;
                    window.requestAnimationFrame(function() {
                        syncFromScroll();
                        updateMetrics();
                        refreshControls();
                        scrollTicking = false;
                    });
                });

                window.addEventListener('resize', function() {
                    const oldPages = totalPages;
                    updateMetrics();
                    if (oldPages !== totalPages) {
                        currentPage = Math.min(currentPage, totalPages - 1);
                        renderDots();
                    }
                    scrollToPage(currentPage);
                });

                updateMetrics();
                renderDots();
                refreshControls();
            };

            initHorizontalCarousel({
                gridId: 'servicesGrid',
                prevBtnId: 'servicesPrevBtn',
                nextBtnId: 'servicesNextBtn',
                dotsId: 'servicesScrollDots',
                cardSelector: '.service-card-link'
            });

            initHorizontalCarousel({
                gridId: 'calculatorsGrid',
                prevBtnId: 'calcPrevBtn',
                nextBtnId: 'calcNextBtn',
                dotsId: 'calcScrollDots',
                cardSelector: '.calc-card'
            });
        });
    </script>


<?php
// Include footer
require_once '../includes/footer.php';
?>

