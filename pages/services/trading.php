<?php
/**
 * Equity Trading - Gretex Corporate Services
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Equity Trading - Gretex Corporate Services';
$additionalCSS = [
    '../../css/service-pages.css',
];

// Include header
require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>



    <section class="service-hero equity-hero equity-hero-modern" style="--hero-bg-image: url('<?php echo gt_asset_url('images/trading.jpg'); ?>');">
        <div class="hero-overlay"></div>
        <div class="hero-content equity-hero-content">
            <div class="hero-badge">Trading</div>
            <h1>Multi-Asset Trading Access Across Regulated Financial Markets</h1>
            <p>Enabling participation across equity and commodity markets through structured platforms designed for efficient execution, transparency, and compliance with applicable regulatory requirements.</p>
            <!-- <div class="hero-cta">
                <a href="../contact.php" class="btn-primary">Start Trading</a>
                <a href="#offers" class="btn-secondary">Learn More</a>
            </div> -->
            
        </div>
    </section>

    <section class="service-overview equity-overview-section" id="overview" aria-label="Equity Trading Overview">
        <div class="container">
            <div class="overview-grid equity-overview-grid">
                <div class="overview-content">
                    <span class="equity-offers-kicker">Trading Overview</span>
                    <h2>Accessing financial markets through integrated multi-asset trading platforms</h2>
                    <p>Trading services provide access to financial markets across multiple asset classes, enabling participants to execute transactions in accordance with their investment or hedging requirements. </p>
                    <p>The framework supports electronic order placement, real-time execution, and transaction monitoring, all within a regulated and structured environment designed to ensure operational consistency.</p>
                    <!-- <p> It ensures efficient handling of trades while maintaining confidentiality, accuracy, and alignment with institutional mandates across permitted market segments.</p>     -->
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
                    <h2 class="equity-offers-title">A complete trading experience</h2>
                    
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
                        <h3>Multi-Asset Trading Access</h3>
                        <p></p>
                        <ul>
                            <li>Participation across equity and commodity segments through a unified framework.</li>

                        </ul>
                    </article>

                    <article class="equity-quad-card equity-quad-card--light">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Electronic Order Execution Systems</h3>
                        <ul>
                            <li>Placement and execution of trades through structured digital platforms.</li>
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
                        <h3>Real-Time Market Access</h3>
                        <ul>
                            <li>Availability of live market data and execution capabilities.</li>
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
                        <h3>Transaction Monitoring and Reporting</h3>
                        <ul>
                            <li>Systematic tracking of trades with clear confirmation mechanisms.</li>
                            
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
                        <h2 class="section-title">Why Choose for Trading?</h2>
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
                                <span class="equity-benefit-tag">Integrated Trading</span>
                                <h3>Integrated Trading Infrastructure</h3>
                                <p>Unified systems supporting participation across multiple asset classes.</p>
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
                                <span class="equity-benefit-tag">Consistency and Reliability</span>
                                <h3>Execution Consistency and Reliability</h3>
                                <p>Structured processes ensuring dependable trade handling.</p>
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
                                <span class="equity-benefit-tag">Compliance-Oriented</span>
                                <h3>Compliance-Oriented Operations</h3>
                                <p>Alignment with regulatory requirements and internal controls.</p>
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
                                <span class="equity-benefit-tag">Dealing Support</span>
                                <h3>Accessible and Structured Trading Framework</h3>
                                <p>Simplified participation supported by organized systems and processes.</p>
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
                <span class="equity-cta-kicker">Open Your Trading Account</span>
                <h2>Participate in financial markets with reliable operational support</h2>
                <p>Our framework is built to facilitate market participation through dependable systems and well-defined processes. With a focus on execution accuracy, compliance alignment, and operational transparency, we support clients in navigating financial instruments with consistency and structured access mechanisms.</p>
                <div class="equity-cta-actions">
                    <a href="../contact.php" class="btn-primary-large"> Contact us</a>
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
                            <summary>What is the process to start trading?</summary>
                            <p>Starting trading involves completing account opening formalities, fulfilling regulatory requirements, and gaining access to trading platforms to begin participation in financial markets.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>What documents are required for account opening?</summary>
                            <p>Account opening requires submission of identity, address, and financial documents as per regulatory norms, along with completion of verification procedures.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>What is the difference between equity and commodity trading?</summary>
                            <p>Equity trading involves buying and selling company shares, whereas commodity trading deals with physical goods or derivatives such as metals, energy products, and agricultural commodities.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>What trading platforms are available?</summary>
                            <p>Trading can be conducted through web-based and mobile platforms designed to provide access to market data, order placement, and transaction monitoring functionalities.</p>
                        </details>
                    </div>
                </div>

                <div class="equity-faq-group">
                    <!-- <h3 class="equity-faq-group-title">Account & Charges</h3> -->
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>How are trades executed and confirmed?</summary>
                            <p>Trades are executed electronically through exchange systems and confirmations are generated post-execution, ensuring transparency and record-keeping of transactions.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary> What risk factors should be considered while trading?</summary>
                            <p>Trading involves market risk, price volatility, and liquidity considerations, requiring informed decision-making and adherence to individual risk management practices.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary> Are there any restrictions on trading volumes or instruments?</summary>
                            <p>Trading is subject to regulatory guidelines, exchange rules, and internal risk policies, which may define permissible instruments and applicable limits.</p>
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


