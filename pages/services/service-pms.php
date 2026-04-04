<?php
/**
 * Portfolio Management Services (PMS) - Gretex Share Broking Limited
 */

$pageTitle = 'Portfolio Management Services (PMS) - Gretex Corporate Services';
$additionalCSS = [
    '../../css/service-pages.css',
];

require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>

    <section class="service-hero equity-hero equity-hero-modern" style="--hero-bg-image: url('<?php echo gt_asset_url('images/equity.jpg'); ?>');">
        <div class="hero-overlay"></div>
        <div class="hero-content equity-hero-content">
            <div class="hero-badge">Portfolio Management Services</div>
            <h1>Discretionary portfolio management aligned to your mandate and risk profile</h1>
            <p>Professional management of securities portfolios under SEBI-registered PMS frameworks—with reporting, compliance, and investment processes suited to qualified investors.</p>
        </div>
    </section>

    <section class="service-overview equity-overview-section" id="overview" aria-label="PMS overview">
        <div class="container">
            <div class="overview-grid equity-overview-grid">
                <div class="overview-content">
                    <span class="equity-offers-kicker">PMS overview</span>
                    <h2>Structured portfolio solutions beyond conventional retail investing</h2>
                    <p>Portfolio Management Services allow investors to delegate investment decisions to a professional manager within an agreed strategy, benchmark, and risk framework.</p>
                    <p>Offerings are tailored to eligible investors under applicable regulations, with clear segregation of portfolios, periodic reporting, and adherence to stated investment objectives.</p>
                </div>
                <div class="overview-image" aria-hidden="true">
                    <div class="image-placeholder equity-placeholder equity-overview-media">
                        <img src="<?php echo gt_asset_url('images/equity-choose-us.jpg'); ?>" alt="" loading="lazy" decoding="async" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="offers-section equity-offers-section" id="offers">
        <div class="container">
            <div class="equity-offers-layout">
                <div class="equity-offers-intro">
                    <span class="equity-offers-kicker">What we offer</span>
                    <h2 class="equity-offers-title">PMS building blocks</h2>
                </div>
                <div class="equity-offers-card-grid" aria-label="PMS offerings">
                    <article class="equity-quad-card equity-quad-card--dark">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 19h4V9H4v10Z" fill="currentColor"/>
                                <path d="M10 19h4V5h-4v14Z" fill="currentColor"/>
                                <path d="M16 19h4v-7h-4v7Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3>Strategy-led mandates</h3>
                        <ul>
                            <li>Portfolio construction and rebalancing guided by a documented investment approach and approved mandate.</li>
                        </ul>
                    </article>
                    <article class="equity-quad-card equity-quad-card--light">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 3h10v18H7V3Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M9 8h6M9 12h6M10 16h4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Reporting &amp; transparency</h3>
                        <ul>
                            <li>Periodic statements and disclosures to help you track holdings, performance, and portfolio activity.</li>
                        </ul>
                    </article>
                    <article class="equity-quad-card equity-quad-card--dark">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12a8 8 0 0 1 16 0v6a2 2 0 0 1-2 2h-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M6 18v2h6v-2M20 18v2h-6v-2" fill="currentColor" opacity="0.95"/>
                            </svg>
                        </div>
                        <h3>Regulatory alignment</h3>
                        <ul>
                            <li>Processes designed around applicable SEBI norms for portfolio managers, including onboarding and ongoing compliance.</li>
                        </ul>
                    </article>
                    <article class="equity-quad-card equity-quad-card--light">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3v18M3 12h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3>Qualified investor focus</h3>
                        <ul>
                            <li>Solutions oriented toward investors who meet eligibility criteria prescribed for PMS participation.</li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="benefits-section equity-benefits-section equity-benefits-section--steps" id="features">
        <div class="container">
            <div class="equity-whychoose-layout">
                <div class="equity-whychoose-image" aria-hidden="true">
                    <img src="../../images/equity-choose-us.jpg" alt="">
                </div>
                <div class="equity-whychoose-content">
                    <div class="equity-benefits-header equity-benefits-header--left-align">
                        <span class="equity-benefits-kicker">Why PMS with us</span>
                        <h2 class="section-title">Discipline, disclosure, and dealing support</h2>
                    </div>
                    <div class="equity-whychoose-steps" role="list">
                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c0 1 6 4 6 4s6-3 6-4v-5"/></svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Process</span>
                                <h3>Documented investment workflow</h3>
                                <p>Clear steps from mandate definition to execution and review.</p>
                            </div>
                        </article>
                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19V5"/><path d="M7 16l4-5 3 3 5-8"/><path d="M4 19h16"/></svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Risk</span>
                                <h3>Mandate-appropriate risk controls</h3>
                                <p>Portfolio activity aligned to the agreed strategy and limits.</p>
                            </div>
                        </article>
                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Support</span>
                                <h3>Relationship-led servicing</h3>
                                <p>Access to teams that can guide onboarding and ongoing queries.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section equity-cta-section">
        <div class="container">
            <div class="cta-content equity-cta-card">
                <span class="equity-cta-kicker">Portfolio Management Services</span>
                <h2>Discuss eligibility and mandate options</h2>
                <p>Share your requirements and we will outline the next steps under applicable regulations.</p>
                <div class="equity-cta-actions">
                    <a href="../contact.php" class="btn-primary-large">Contact us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="equity-faq-section" id="pms-faq" aria-label="PMS frequently asked questions">
        <div class="container">
            <div class="equity-faq-header">
                <span class="equity-faq-kicker">FAQ</span>
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="equity-faq-layout">
                <div class="equity-faq-group">
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>What is Portfolio Management Services (PMS)?</summary>
                            <p>PMS is a regulated offering where a portfolio manager manages securities and funds on a discretionary or non-discretionary basis, within an agreed investment mandate, for clients who meet applicable eligibility criteria under SEBI regulations.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Who can invest in PMS?</summary>
                            <p>Typically, investors who satisfy minimum investment thresholds and other eligibility requirements prescribed for portfolio management services. Specific criteria are confirmed at onboarding based on current regulations and internal policies.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>How is PMS different from mutual funds?</summary>
                            <p>PMS generally involves a segregated portfolio tailored to the client (or a defined structure per the agreement), whereas mutual funds are pooled vehicles with standard scheme documents. Fees, minimums, and regulatory treatment also differ.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>What documents are usually required to start?</summary>
                            <p>KYC, agreement with the portfolio manager, risk profiling, and declarations as per SEBI and internal requirements. Our team will share the exact checklist once you express interest.</p>
                        </details>
                    </div>
                </div>
                <div class="equity-faq-group">
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>How will I track performance and holdings?</summary>
                            <p>Clients receive periodic reports and statements as per regulatory requirements and the terms of the portfolio management agreement, covering positions, valuations, and relevant disclosures.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>What are the risks involved?</summary>
                            <p>PMS returns depend on market conditions and the chosen strategy. Capital is subject to market risk, liquidity risk, and strategy-specific risks. You should read all offer-related documents carefully before investing.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Can I change or exit my mandate?</summary>
                            <p>Changes and exit terms are governed by your agreement with the portfolio manager and applicable regulations. Contact us for the process, notice periods, and any charges that may apply.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once '../../includes/footer.php'; ?>
