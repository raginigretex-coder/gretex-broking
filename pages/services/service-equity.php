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



    <section class="service-hero equity-hero equity-hero-modern" style="--hero-bg-image: url('<?php echo gt_asset_url('images/equity.jpg'); ?>');">
        <div class="hero-overlay"></div>
        <div class="hero-content equity-hero-content">
            <div class="hero-badge">Equity Trading</div>
            <h1>Institutional Broking with Structured Execution and Market Access</h1>
            <p>Facilitating efficient execution of large-value transactions through dedicated dealing support, operational precision, and access to regulated financial markets for institutional participants.</p>
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
                    <span class="equity-offers-kicker">Equity Trading Overview</span>
                    <h2>Facilitating institutional participation through structured market access frameworks</h2>
                    <p>Institutional broking involves enabling large and regulated entities to access financial markets through structured execution mechanisms. </p>
                    <p>The service is designed to support high-volume transactions with operational precision, adherence to regulatory requirements, and coordinated dealing processes.</p>
                    <p> It ensures efficient handling of trades while maintaining confidentiality, accuracy, and alignment with institutional mandates across permitted market segments.</p>

                    
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
                    <h2 class="equity-offers-title">A complete equity trading experience</h2>
                    
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
                        <h3>Structured Trade Execution </h3>
                        <p></p>
                        <ul>
                            <li>Execution of high-value transactions through coordinated dealing processes designed to ensure accuracy and minimal market impact.</li>

                        </ul>
                    </article>

                    <article class="equity-quad-card equity-quad-card--light">
                        <div class="equity-quad-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Dedicated Dealing Support</h3>
                        <ul>
                            <li>Assigned dealing personnel to manage order placement, coordination, and communication throughout the transaction lifecycle.</li>
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
                        <h3>Multi-Market Access</h3>
                        <ul>
                            <li>Access to relevant exchanges and permitted financial instruments aligned with institutional trading requirements.</li>
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
                        <h3>High-Volume Transaction Handling </h3>
                        <ul>
                            <li>Operational capability to manage large order sizes with structured execution strategies and controlled processes.</li>
                            
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
                        <h2 class="section-title">Why Choose for Equity Trading?</h2>
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
                                <span class="equity-benefit-tag">Execution Framework</span>
                                <h3>Process-Driven Execution Framework</h3>
                                <p>Defined workflows ensuring consistency, accuracy, and operational discipline.</p>
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
                                <span class="equity-benefit-tag">Compliance First</span>
                                <h3>Compliance-Aligned Operations</h3>
                                <p>Adherence to regulatory requirements and internal control standards.</p>
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
                                <span class="equity-benefit-tag">Confidential Handling</span>
                                <h3>Confidential Transaction Handling</h3>
                                <p>Controlled processes designed to safeguard sensitive institutional activity.</p>
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
                                <h3>Responsive Dealing Support Structure</h3>
                                <p>Timely coordination and communication aligned with institutional expectations.</p>
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
                <h2>Begin your market participation through a structured platform</h2>
                <p>Begin your journey across financial markets with a framework focused on execution efficiency and operational reliability. Our systems and processes are designed to support seamless access, transparent handling, and consistent service delivery across all supported investment segments</p>
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
                            <summary>What is institutional broking and how does it function?</summary>
                            <p>Institutional broking facilitates execution of large-value transactions on behalf of institutions, ensuring efficient order handling, market access, and compliance with regulatory requirements while maintaining confidentiality and operational accuracy throughout the transaction lifecycle.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Who is eligible to access institutional broking services?</summary>
                            <p>Institutional broking services are typically availed by entities such as mutual funds, insurance companies, corporate treasuries, portfolio managers, and other regulated institutions requiring structured execution capabilities and access to financial markets.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>How are high-volume transactions managed?</summary>
                            <p>High-volume transactions are managed through structured execution strategies, ensuring minimal market impact, timely order placement, and coordination through dedicated dealing teams to maintain efficiency and transaction integrity.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Is dedicated dealing support provided to clients?</summary>
                            <p>Clients are generally supported by dedicated dealing personnel who assist in order execution, coordination, and communication, ensuring clarity in transaction handling and responsiveness aligned with client requirements.</p>
                        </details>
                    </div>
                </div>

                <div class="equity-faq-group">
                    <!-- <h3 class="equity-faq-group-title">Account & Charges</h3> -->
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>What markets and instruments are accessible?</summary>
                            <p>Institutional clients are provided access to multiple financial markets and instruments, including equities and other permitted segments, subject to applicable regulations and internal operational capabilities.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>How is transaction confidentiality maintained? </summary>
                            <p>Confidentiality is maintained through controlled processes, restricted access protocols, and adherence to regulatory guidelines, ensuring that sensitive transaction-related information is handled with appropriate safeguards at all stages.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>What onboarding process is followed for institutional clients?</summary>
                            <p>The onboarding process involves documentation verification, regulatory compliance checks, and account setup procedures designed to ensure alignment with applicable norms before enabling access to trading and execution services.</p>
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


