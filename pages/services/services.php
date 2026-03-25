<?php
/**
 * Services - Gretex Financial
 * Gretex Share Broking Limited
 */

require_once __DIR__ . '/../../config/app.php';

// Page configuration
$pageTitle = 'Services - Gretex Financial';
$servicesPatternUrl = htmlspecialchars(gt_asset_url('images/pattern.png'), ENT_QUOTES, 'UTF-8');
$additionalCSS = [
    '../../css/chatbot.css',
];

$additionalScripts = [
    gt_asset_url('js/scroll-animations.js'),
];

$pageStyles = "        :root {
            --svc-hero-violet: #7c3aed;
            --svc-hero-plum: #86198f;
            --svc-card-border: rgba(15, 23, 42, 0.08);
        }

        .services-page-hero {
            padding: clamp(5.5rem, 12vw, 8.5rem) 0 clamp(4rem, 8vw, 6rem);
            position: relative;
            overflow: hidden;
            margin-top: 80px;
            min-height: min(52vh, 460px);
            isolation: isolate;
        }

        .services-page-hero-media {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .services-page-hero-photo {
            position: absolute;
            inset: -4px;
            background-size: cover;
            background-position: center 38%;
            background-repeat: no-repeat;
            animation: svcKenBurns 22s ease-in-out infinite alternate;
            will-change: transform;
        }

        @keyframes svcKenBurns {
            0% { transform: scale(1.02); }
            100% { transform: scale(1.08); }
        }

        .services-page-hero-scrim {
            position: absolute;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background:
                radial-gradient(ellipse 90% 70% at 50% 100%, rgba(15, 23, 42, 0.58) 0%, transparent 55%),
                radial-gradient(circle at 18% 35%, rgba(52, 211, 153, 0.18) 0%, transparent 42%),
                radial-gradient(circle at 82% 65%, rgba(251, 207, 232, 0.24) 0%, transparent 48%),
                linear-gradient(145deg, rgba(28, 25, 23, 0.91) 0%, rgba(67, 20, 90, 0.84) 44%, rgba(124, 45, 145, 0.9) 100%);
        }

        .services-page-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.07) 1px, transparent 1px);
            background-size: 48px 48px;
            animation: svcGridMove 40s linear infinite;
            mask-image: radial-gradient(ellipse 90% 70% at 50% 40%, black 20%, transparent 72%);
            pointer-events: none;
        }

        @keyframes svcGridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(48px, 48px); }
        }

        @media (prefers-reduced-motion: reduce) {
            .services-page-hero::before {
                animation: none;
            }
            .services-page-hero-photo {
                animation: none;
                transform: scale(1.04);
            }
            .services-page-title {
                animation: none;
                opacity: 1;
                transform: none;
            }
            .service-card:hover {
                transform: translateY(-3px);
            }
            .service-card-link:hover .service-card::before,
            .service-card-link:hover .service-card::after {
                transform: none;
            }
            .service-card-link:hover .service-card h3,
            .service-card-link:hover .service-card-read-btn {
                transform: none;
            }
        }

        @keyframes svcHeroTitleIn {
            from {
                opacity: 0;
                transform: translateY(18px);
                letter-spacing: 0.08em;
            }
            to {
                opacity: 1;
                transform: translateY(0);
                letter-spacing: 0.01em;
            }
        }

        .services-page-hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            color: #ffffff;
            max-width: 42rem;
            margin: 0 auto;
        }

        .services-page-eyebrow {
            display: inline-block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.88);
            margin-bottom: 1rem;
            padding: 0.4rem 0.95rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
        }

        .services-page-title {
            font-family: 'Inter', sans-serif;
            font-size: clamp(2.75rem, 6vw, 4.25rem);
            font-weight: 800;
            margin: 0 0 1rem;
            color: #ffffff;
            letter-spacing: 0.01em;
            line-height: 1.08;
            text-shadow: 0 2px 24px rgba(0, 0, 0, 0.15);
            text-transform: uppercase;
            animation: svcHeroTitleIn 0.85s cubic-bezier(0.22, 1, 0.36, 1) forwards;
            opacity: 0;
        }

        .services-page-hero-subtitle {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: clamp(1rem, 2vw, 1.125rem);
            font-weight: 500;
            line-height: 1.65;
            color: rgba(255, 255, 255, 0.92);
            margin: 0;
            max-width: 36rem;
            margin-left: auto;
            margin-right: auto;
        }

        .services-page-content {
            padding: clamp(3.5rem, 8vw, 5.5rem) 0;
            background: radial-gradient(ellipse 80% 50% at 50% 0%, rgba(124, 58, 237, 0.07) 0%, transparent 55%),
                linear-gradient(180deg, #f1f5f9 0%, #e8edf3 100%);
            border-top: 1px solid rgba(15, 23, 42, 0.06);
            position: relative;
        }

        .services-page-content::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url('$servicesPatternUrl');
            background-repeat: repeat;
            background-size: 400px auto;
            opacity: 0.045;
            pointer-events: none;
        }

        .services-page-content > .container {
            position: relative;
            z-index: 1;
            max-width: min(1320px, 100%);
            padding-left: clamp(1.25rem, 4vw, 2rem);
            padding-right: clamp(1.25rem, 4vw, 2rem);
        }

        .section-header {
            text-align: center;
            margin-bottom: clamp(1.5rem, 3vw, 2.25rem);
        }

        .section-eyebrow {
            display: inline-block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #7c3aed;
            margin-bottom: 0.75rem;
        }

        .section-header h2 {
            font-family: 'Inter', sans-serif;
            font-size: clamp(1.85rem, 4vw, 2.5rem);
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 1rem;
            letter-spacing: -0.02em;
        }

        .section-header .highlight {
            background: linear-gradient(135deg, #059669 0%, #a21caf 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-header-divider {
            width: 3rem;
            height: 4px;
            border-radius: 999px;
            margin: 0 auto 1.25rem;
            background: linear-gradient(90deg, #059669, #a21caf);
            opacity: 0.95;
        }

        .section-header p {
            font-size: 1.0625rem;
            color: #475569;
            max-width: 34rem;
            margin: 0 auto;
            line-height: 1.65;
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
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #0f172a;
            line-height: 1.25;
            margin: 0 0 0.75rem;
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
            line-height: 1.65;
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
            font-weight: 600;
            color: #94a3b8;
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
            background: radial-gradient(
                circle at 35% 35%,
                rgba(var(--accent-rgb), 0.22) 0%,
                rgba(var(--accent-rgb), 0.08) 42%,
                rgba(241, 245, 249, 0.95) 100%
            );
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
            transition:
                transform 0.45s cubic-bezier(0.22, 1, 0.36, 1),
                opacity 0.35s ease,
                filter 0.35s ease;
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

        @media (max-width: 1024px) {
            .services-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }
        }

        @media (max-width: 640px) {
            .services-page-hero {
                padding: 5rem 0 3.25rem;
            }

            .services-grid {
                grid-template-columns: 1fr !important;
            }

            .service-card {
                min-height: 0 !important;
            }

            .service-card-inner {
                max-width: 100%;
            }

            .service-card p {
                font-size: 0.9rem;
            }

            .service-card-deco {
                width: 42%;
                max-width: 160px;
            }
        }";

// Include header
require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>



    <!-- Navigation -->

    <!-- Services Hero Section -->
    <section class="services-page-hero">
        <div class="services-page-hero-media" aria-hidden="true">
            <div class="services-page-hero-photo" style="background-image: url('<?php echo htmlspecialchars(gt_asset_url('images/equity.jpg'), ENT_QUOTES, 'UTF-8'); ?>');"></div>
            <div class="services-page-hero-scrim"></div>
        </div>
        <div class="container">
            <div class="services-page-hero-content"><br><br>
                <!-- <p class="services-page-eyebrow">Gretex Financial</p> -->
                <h1 class="services-page-title">Services</h1><br><br><br><br>
                <!-- <p class="services-page-hero-subtitle">Equity, derivatives, and institutional solutions designed for clarity and speed in Indian markets.</p> -->
            </div>
        </div>
    </section>

    <!-- Services Content Section -->
    <section class="services-page-content">
        <div class="container">
            <div class="section-header scroll-reveal">
                <h2>Our <span class="highlight">services</span></h2>
                <div class="section-header-divider" aria-hidden="true"></div>
                <p>Equity, derivatives, AIF, and distribution—clear offerings for investors and institutions in Indian markets.</p>
            </div>
            
            <div class="services-grid">
                <a href="Institutional-broking.php" class="service-card-link scroll-reveal stagger-1">
                    <div class="service-card service-card--equity">
                        <div class="service-card-inner">
                            <h3>Institutional Broking</h3>
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

                <a href="trading.php" class="service-card-link scroll-reveal stagger-2">
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

                <a href="service-aif.php" class="service-card-link scroll-reveal stagger-3">
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

                <a href="service-market-making.php" class="service-card-link scroll-reveal stagger-4">
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

                <!-- <a href="service-futures-options.php" class="service-card-link scroll-reveal stagger-5">
                    <div class="service-card service-card--futures">
                        <div class="service-card-inner">
                            <h3>Futures &amp; options</h3>
                            <p>Index and currency futures with transparent pricing—hedge or express a view with disciplined execution.</p>
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
                                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8 8L10 10" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a> -->

                <!-- <a href="service-mutual-funds.php" class="service-card-link scroll-reveal stagger-6">
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
        </div>
    </section>

    <!-- Footer -->
<?php
// Include footer
require_once '../../includes/footer.php';
?>

