<?php
/**
 * Trading-cum-clearing membership - Gretex Share Broking Limited
 */

$pageTitle = 'Trading-cum-Clearing Membership - Gretex Corporate Services';
$additionalCSS = [
    '../../css/service-pages.css',
];

require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>

    <section class="service-hero equity-hero equity-hero-modern" style="--hero-bg-image: url('<?php echo gt_asset_url('images/trading.jpg'); ?>');">
        <div class="hero-overlay"></div>
        <div class="hero-content equity-hero-content">
            <div class="hero-badge">Trading-cum-clearing</div>
            <h1>Trading and clearing membership for integrated market access</h1>
            <p>Participation across trading and clearing segments as permitted—supporting execution, settlement discipline, and risk-managed post-trade workflows on recognised exchanges.</p>
        </div>
    </section>

    <section class="service-overview equity-overview-section" id="overview" aria-label="Trading and clearing overview">
        <div class="container">
            <div class="overview-grid equity-overview-grid">
                <div class="overview-content">
                    <span class="equity-offers-kicker">Membership overview</span>
                    <h2>Combined trading and clearing capabilities where regulations permit</h2>
                    <p>Trading-cum-clearing membership reflects the ability to operate across order execution and clearing functions within the exchange ecosystem, subject to approvals and segment eligibility.</p>
                    <p>This structure can support streamlined hand-offs between trade capture, margining, and settlement processes for permitted products and client categories.</p>
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
                    <h2 class="equity-offers-title">Integrated membership themes</h2>
                </div>
                <div class="equity-offers-card-grid" aria-label="Membership offerings">
                    <article class="equity-quad-card equity-quad-card--dark">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 19h4V9H4v10Z" fill="currentColor"/>
                                <path d="M10 19h4V5h-4v14Z" fill="currentColor"/>
                                <path d="M16 19h4v-7h-4v7Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3>Market access</h3>
                        <ul>
                            <li>Connectivity to permitted trading segments with processes aligned to exchange and clearing corporation rules.</li>
                        </ul>
                    </article>
                    <article class="equity-quad-card equity-quad-card--light">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/>
                                <path d="M3 9h18" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3>Clearing &amp; settlement discipline</h3>
                        <ul>
                            <li>Frameworks for margins, pay-ins, and settlement obligations as prescribed for clearing members.</li>
                        </ul>
                    </article>
                    <article class="equity-quad-card equity-quad-card--dark">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z" stroke="currentColor" stroke-width="2"/>
                                <path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Risk &amp; compliance</h3>
                        <ul>
                            <li>Monitoring and controls designed around regulatory expectations for trading and clearing operations.</li>
                        </ul>
                    </article>
                    <article class="equity-quad-card equity-quad-card--light">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2"/>
                                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3>Institutional servicing</h3>
                        <ul>
                            <li>Support for professional and institutional clients requiring robust execution and post-trade handling.</li>
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
                        <span class="equity-benefits-kicker">Why it matters</span>
                        <h2 class="section-title">One membership narrative, multiple touchpoints</h2>
                    </div>
                    <div class="equity-whychoose-steps" role="list">
                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2 3 14h9l-1 8 10-12h-9l1-8Z"/></svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Speed</span>
                                <h3>Faster internal coordination</h3>
                                <p>Trading and clearing teams aligned on processes and timelines.</p>
                            </div>
                        </article>
                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19V5"/><path d="M7 16l4-5 3 3 5-8"/><path d="M4 19h16"/></svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Governance</span>
                                <h3>Regulatory-first design</h3>
                                <p>Membership obligations mapped to SEBI, exchange, and clearing corporation directives.</p>
                            </div>
                        </article>
                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Clarity</span>
                                <h3>Transparent workflows</h3>
                                <p>Clients benefit from defined escalation and support paths.</p>
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
                <span class="equity-cta-kicker">Trading-cum-clearing</span>
                <h2>Engage with us on institutional access</h2>
                <p>For eligibility, segments, and documentation, reach out to our team.</p>
                <div class="equity-cta-actions">
                    <a href="../contact.php" class="btn-primary-large">Contact us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="equity-faq-section" id="clearing-faq" aria-label="Trading and clearing membership frequently asked questions">
        <div class="container">
            <div class="equity-faq-header">
                <span class="equity-faq-kicker">FAQ</span>
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="equity-faq-layout">
                <div class="equity-faq-group">
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>What is trading-cum-clearing membership?</summary>
                            <p>It refers to membership on stock exchanges that includes both trading access and clearing membership obligations (such as margins and settlement) on permitted segments, as approved by the exchange and clearing corporation under applicable regulations.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>How does clearing differ from trading?</summary>
                            <p>Trading is order execution in the market; clearing covers confirmation, netting, margin collection, and settlement of trades. Clearing members have defined responsibilities toward the clearing corporation and clients, as per rules.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Who typically uses these services?</summary>
                            <p>Professional and institutional participants who require integrated execution and post-trade infrastructure, subject to eligibility, documentation, and risk management norms set by regulators and exchanges.</p>
                        </details>
                    </div>
                </div>
                <div class="equity-faq-group">
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>What are margins?</summary>
                            <p>Margins are collateral or funds required by the clearing corporation to cover potential losses until settlement completes. Margin types and rates are prescribed and may change with market conditions and circulars.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Are all exchange segments covered?</summary>
                            <p>Access depends on memberships, approvals, and internal policies. Specific segments and products are confirmed during institutional onboarding and in relevant agreements.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>How do I get more detail for my organisation?</summary>
                            <p>Contact our team with your entity type, intended segments, and volumes. We will outline documentation, compliance steps, and operational interfaces appropriate to your case.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once '../../includes/footer.php'; ?>
