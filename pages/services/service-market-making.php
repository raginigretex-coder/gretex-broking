<?php
/**
 * Equity Trading - Gretex Corporate Services
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Alternative Investment Funds (AIF) - Gretex Corporate Services';
$additionalCSS = [
    '../../css/service-pages.css',
];

// Include header
require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>



    <section class="service-hero equity-hero equity-hero-modern" style="--hero-bg-image: url('<?php echo gt_asset_url('images/equity.jpg'); ?>');">
        <div class="hero-overlay"></div>
        <div class="hero-content equity-hero-content">
            <div class="hero-badge">Market Making</div>
            <h1>Market Making Services Supporting Liquidity and Price Stability</h1>
            <p>Providing continuous market participation through bid and ask quotes to enhance liquidity, improve price discovery, and support orderly trading conditions in securities.</p>
            <!-- <div class="hero-cta">
                <a href="../contact.php" class="btn-primary">Start Trading</a>
                <a href="#offers" class="btn-secondary">Learn More</a>
            </div> -->
            
        </div>
    </section>

    <section class="service-overview equity-overview-section" id="overview" aria-label="Alternative Investment Funds (AIF) Overview">
        <div class="container">
            <div class="overview-grid equity-overview-grid">
                <div class="overview-content">
                    <span class="equity-offers-kicker">Market Making Overview</span>
                    <h2>Supporting liquidity and price discovery through continuous market participation</h2>
                    <p>Market making involves the provision of continuous bid and ask quotes for designated securities to enhance liquidity and facilitate orderly trading. </p>
                    <p>This function contributes to improved price discovery, reduced volatility, and increased market efficiency.</p>
                    <p> It is conducted within regulatory frameworks and is typically aligned with exchange requirements and issuer objectives.</p>

                    
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
                    <h2 class="equity-offers-title">Regulated market making services designed for liquidity</h2>
                    
                </div>

                <div class="equity-offers-card-grid" aria-label="What we offer">
                    <article class="equity-quad-card equity-quad-card--dark">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 19h4V9H4v10Z" fill="currentColor"/>
                                <path d="M10 19h4V5h-4v14Z" fill="currentColor"/>
                                <path d="M16 19h4v-7h-4v7Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3>Continuous Bid and Ask Quoting</h3>
                        <ul>
                            <li>Provision of two-way quotes to support active trading and market participation</li>

                        </ul>
                    </article>

                    <article class="equity-quad-card equity-quad-card--light">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Liquidity Enhancement Mechanisms</h3>
                        <ul>
                            <li>Structured participation aimed at improving trading volumes and market depth.</li>
                        </ul>
                    </article>

                    <article class="equity-quad-card equity-quad-card--dark">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12a8 8 0 0 1 16 0v6a2 2 0 0 1-2 2h-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M6 18v2h6v-2" fill="currentColor" opacity="0.95"/>
                                <path d="M20 18v2h-6v-2" fill="currentColor" opacity="0.95"/>
                            </svg>
                        </div>
                        <h3>Spread Management Practices</h3>
                        <ul>
                            <li>Maintaining competitive bid-ask spreads to facilitate efficient transactions.</li>
                        </ul>
                    </article>

                    <article class="equity-quad-card equity-quad-card--light">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 3h10v18H7V3Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M9 8h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M9 12h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M10 16h4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Exchange-Aligned Operations</h3>
                        <ul>
                            <li>Activities conducted in accordance with exchange requirements and regulatory guidelines.</li>
                            
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
                        <span class="equity-benefits-kicker">Why choose us </span>
                        <h2 class="section-title">Why Choose for AIF Participation?</h2>
                        <!-- <p class="equity-whychoose-subtitle">Everything you need to trade with confidence, speed, and professional support.</p> -->
                    </div>

                    <div class="equity-whychoose-steps" role="list" aria-label="Why choose Gretex">
                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M3 7h18v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"></path>
                                    <path d="M3 7l2-3h14l2 3"></path>
                                    <path d="M12 12a3 3 0 1 0 0.01 0Z"></path>
                                </svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Consistent Market Participation</span>
                                <h3>Consistent Market Participation Approach</h3>
                                <p>Structured engagement ensuring continuity in quoting and liquidity support.</p>
                            </div>
                        </article>

                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M4 19V5"></path>
                                    <path d="M7 16l4-5 3 3 5-8"></path>
                                    <path d="M4 19h16"></path>
                                </svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Regulatory and Exchange Compliance</span>
                                <h3>Regulatory and Exchange Compliance Focus</h3>
                                <p>Operations aligned with defined obligations and reporting standards. </p>
                            </div>
                        </article>

                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M22 16.5v2a1.5 1.5 0 0 1-1.5 1.5H20a8 8 0 0 1-8-8V11a8 8 0 0 1 8-8h.5A1.5 1.5 0 0 1 21 4.5v2"></path>
                                    <path d="M18 11a6 6 0 0 0-6 6"></path>
                                    <path d="M9 18H7a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h2"></path>
                                </svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Stability-Oriented Execution</span>
                                <h3>Stability-Oriented Execution Practices</h3>
                                <p>Participation designed to support orderly market conditions.</p>
                            </div>
                        </article>

                        <article class="equity-whychoose-step" role="listitem">
                            <div class="step-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M22 10 12 5 2 10l10 5 10-5Z"></path>
                                    <path d="M6 12v5c0 1 6 4 6 4s6-3 6-4v-5"></path>
                                </svg>
                            </div>
                            <div class="step-content">
                                <span class="equity-benefit-tag">Operational Reliability</span>
                                <h3>Operational Reliability in Quoting Mechanisms</h3>
                                <p>Dependable systems supporting continuous bid and ask presence.</p>
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
                <span class="equity-cta-kicker">Services Market Making</span>
                <h2>Engage with markets through a structured execution environment</h2>
                <p>Access financial markets through an environment designed for operational efficiency and process-driven execution. Our platform supports secure transactions, consistent handling, and adherence to regulatory standards, enabling clients to participate across asset classes with clarity and disciplined execution practices.</p>
                <div class="equity-cta-actions">
                    <a href="../contact.php" class="btn-primary-large">Contact us</a>
                    <!-- <a href="../contact.php" class="equity-btn-outline">Talk to Advisor</a> -->
                </div>
            </div>
        </div>
    </section>

    <section class="equity-faq-section" id="equity-faq">
        <div class="container">
            <div class="equity-faq-header">
                <span class="equity-faq-kicker">FAQ</span>
                <h2>Frequently Asked Questions</h2>
                <!-- <p>Find quick answers about account opening, pricing, and trading support.</p> -->
            </div>

            <div class="equity-faq-layout">
                <div class="equity-faq-group">
                    <!-- <h3 class="equity-faq-group-title">Trading Basics</h3> -->
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary> What is market making in financial markets?</summary>
                            <p>Market making involves continuously providing buy and sell quotes for securities to enhance liquidity, enabling smoother price discovery and facilitating active participation in the market.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>How does market making support liquidity?</summary>
                            <p>By maintaining continuous bid and ask quotes, market makers ensure availability of counterparties, reducing price gaps and improving trading efficiency across the security.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Which entities typically require market making services?</summary>
                            <p>Market making services are generally utilized by listed companies, issuers, and exchanges aiming to improve liquidity, trading activity, and investor participation in their securities.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>How are bid and ask prices determined?</summary>
                            <p>Bid and ask prices are determined based on prevailing market conditions, demand-supply dynamics, and pricing models to maintain competitive spreads and trading activity.</p>
                        </details>
                    </div>
                </div>

                <div class="equity-faq-group">
                    <!-- <h3 class="equity-faq-group-title">Account & Charges</h3> -->
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>What are the regulatory considerations in market making?</summary>
                            <p>Market making activities are governed by exchange guidelines and regulatory frameworks, requiring adherence to defined obligations, reporting standards, and compliance protocols.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>How does market making impact price stability?</summary>
                            <p>Consistent quoting and participation help reduce volatility by minimizing large price swings, thereby contributing to more stable and orderly market behavior.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>What instruments are covered under market making services?</summary>
                            <p>Market making is typically conducted in specified securities or instruments as permitted by exchanges and regulations, based on the scope of the mandate.</p>
                        </details>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
// Include footer
require_once '../../includes/footer.php';
?>


