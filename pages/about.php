<?php
/**
 * About Us - Gretex | Indian Equity Market Leader
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'About Us - Gretex | Indian Equity Market Leader';
$additionalCSS = [
    '../css/team-section.css',
];

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>


    
    <!-- Navigation -->

    <!-- About Us Hero Banner -->
    <section class="about-hero-banner">
        <div class="container">
            <h1 class="about-hero-title">ABOUT US</h1>
            <p class="about-hero-subtitle">Leading the Future of Financial Services in India through excellence,
                integrity, and innovation.</p>
        </div>
    </section>

    <!-- Our Logo Section - Overlapping Banner -->
    <div class="logo-section-wrapper">
        <section class="our-logo-section scroll-reveal">
        <div class="container">
            <div class="ghost-text" style="top: 0; left: 50%; transform: translateX(-50%); opacity: 0.03;">IDENTITY</div>
            <div class="logo-description-wrapper">
                <div class="logo-visual">
                    <div class="logo-symbol-container">
                        <img src="../images/Gretex.png" alt="Gretex Logo Symbol" class="logo-accent-image">
                        <div class="logo-glow"></div>
                    </div>
                </div>
                <div class="logo-text-content">
                    <div class="section-tag">OUR IDENTITY</div>
                    <h2 class="section-title">A Journey of Financial Excellence</h2>
                    <p class="logo-description">Gretex Share Broking Limited (Formerly known as Gretex Share Broking Private Limited) was incorporated on 29 April 2010. Since its inception, we have strived to create maximum liquidity in the market as well as facilitate buy and sell of securities, in place of investors. <span class="text-accent">Gretex</span> is the abbreviation for the word "greatest" which inspires us to become the leader in our field.</p>
                    <div class="identity-badges">
                        <div class="badge"><i data-lucide="trending-up"></i> Growth</div>
                        <div class="badge"><i data-lucide="anchor"></i> Stability</div>
                        <div class="badge"><i data-lucide="heart"></i> Commitment</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    <div class="section-divider"></div>

    <!-- Board of Directors Section - Leadership Team Slider -->
    <section class="board-directors-section team-slider-section">
        <div class="container">
            <div class="team-section-header">
                <h2 class="board-directors-title">Our Leadership Team</h2>
                <p class="team-section-description">At Gretex, our leadership team brings decades of combined experience in financial services, capital markets, and regulatory compliance. Each member is committed to driving innovation, maintaining the highest standards of integrity, and delivering exceptional value to our clients and stakeholders.</p>
            </div>

            <div class="team-slider-wrapper">
                <button type="button" class="team-slider-btn team-slider-prev" aria-label="Previous team members">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                </button>
                <button type="button" class="team-slider-btn team-slider-next" aria-label="Next team members">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                </button>

                <div class="team-slider-track-container">
                    <div class="team-slider-track" id="leadershipSliderTrack">
                        <!-- Director 1 -->
                        <div class="director-card team-slider-card">
                            <div class="director-image">
                                <img src="../images/alok-harlalkar.jpg" alt="Mr. Alok Harlalka" class="director-photo" width="320" height="427">
                            </div>
                            <div class="director-info">
                                <h3>Mr. Alok Harlalka</h3>
                                <p class="director-title">JOINT MANAGING DIRECTOR</p>
                                <p class="director-description">With more than 25 years of experience in Capital Market and
                                    securities market services, Mr. Alok Harlalka serves as a Director at the Association of
                                    Investment Bankers of India (AIBI). His dynamic leadership has accelerated the company's
                                    growth, enabling Gretex to emerge as a significant player in the industry.</p>
                            </div>
                        </div>

                        <!-- Director 2 -->
                        <div class="director-card team-slider-card">
                            <div class="director-image">
                                <img src="../images/arvind-harlalka.jpg" alt="Mr. Arvind Harlalka" class="director-photo" width="320" height="427">
                            </div>
                            <div class="director-info">
                                <h3>Mr. Arvind Harlalka</h3>
                                <p class="director-title">CHAIRMAN, MANAGING DIRECTOR & CFO</p>
                                <p class="director-description">With over 30 years of experience in accounts, finance,
                                    marketing, and manufacturing, Mr. Arvind Harlalka has been instrumental in setting up
                                    businesses and driving strategic initiatives for the Group. He oversees Human Resources,
                                    Strategy, and Business development, bringing a wealth of expertise to the organization.</p>
                            </div>
                        </div>

                        <!-- Director 3 -->
                        <div class="director-card team-slider-card">
                            <div class="director-image">
                                <img src="../images/Khusbhu Agarwal.png" alt="Ms. Khusbhu Agarwal" class="director-photo" width="320" height="427">
                            </div>
                            <div class="director-info">
                                <h3>Ms. Khusbhu Agarwal</h3>
                                <p class="director-title">INDEPENDENT DIRECTOR</p>
                                <p class="director-description">Ms. Khusbhu Agarwal, aged 36 years, is an Independent Director
                                    and a Practicing Company Secretary, Registered Valuer (Security and Financial Asset),
                                    Independent Director, and Social Auditor. She holds advanced degrees including Masters in
                                    Commerce, Masters in Journalism & Mass Communication, and LLB. With 9 years of experience in
                                    Company Law, NCLT, Capital Market, NBFC & FEMA Related matters, and as an IBBI Registered
                                    Valuer, she brings comprehensive expertise to the board.</p>
                            </div>
                        </div>

                        <!-- Director 4 -->
                        <div class="director-card team-slider-card">
                            <div class="director-image">
                                <img src="../images/Rajeev Kanotra.png" alt="Mr. Rajeev Kanotra" class="director-photo" width="320" height="427">
                            </div>
                            <div class="director-info">
                                <h3>Mr. Rajeev Kanotra</h3>
                                <p class="director-title">NON-EXECUTIVE DIRECTOR</p>
                                <p class="director-description">With over 30 years of experience in the Indian capital market,
                                    Mr. Rajeev Kanotra specializes in equity investment and hedging strategies. He has a proven
                                    track record of understanding market trends and has been actively involved in M&A, fund
                                    raising, and value delivery to HNI investors. He holds a B.Com from University of Delhi and
                                    PGDBM from IMT Ghaziabad. His expertise in portfolio management and investment analysis
                                    makes him a valuable addition to the board.</p>
                            </div>
                        </div>

                        <!-- Director 5 -->
                        <div class="director-card team-slider-card">
                            <div class="director-image">
                                <img src="../images/Anjali Sapkal.jpg" alt="Mrs. Anjali Sapkal" class="director-photo" width="320" height="427">
                            </div>
                            <div class="director-info">
                                <h3>Mrs. Anjali Sapkal</h3>
                                <p class="director-title">DIRECTOR</p>
                                <p class="director-description">Mrs. Anjali Sapkal brings valuable expertise and perspective to
                                    the board of directors, contributing to the strategic direction and governance of the
                                    company.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="team-slider-dots" id="leadershipSliderDots" aria-label="Slider pagination"></div>
            </div>
        </div>
    </section>

    <!-- Key Managerial Personnel Section - Slider -->
    <section class="key-personnel-section team-slider-section">
        <div class="container">
            <div class="team-section-header">
                <h2 class="key-personnel-title">Key managerial personnel</h2>
                <p class="team-section-description">Our key managerial personnel ensure seamless operations, regulatory compliance, and strategic execution. With deep expertise in corporate governance and financial management, they form the backbone of our organizational excellence.</p>
            </div>
            <div class="team-slider-wrapper">
                <button type="button" class="team-slider-btn team-slider-prev" aria-label="Previous team members" data-slider="personnel"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>
                <button type="button" class="team-slider-btn team-slider-next" aria-label="Next team members" data-slider="personnel"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>
                <div class="team-slider-track-container">
                    <div class="team-slider-track" id="personnelSliderTrack">
                        <div class="personnel-card team-slider-card">
                            <div class="personnel-image">
                                <img src="../images/rashmi-vyas-min.png" alt="Ms. Rashmi Vyas" class="personnel-photo" width="320" height="427">
                            </div>
                            <div class="personnel-info">
                                <h3>Ms. Rashmi Vyas</h3>
                                <p class="personnel-title">COMPANY SECRETARY</p>
                                <p class="personnel-description">Ms. Rashmi Vyas is an Associate Member of the Institute of
                                    Company Secretaries of India (ACS 72915). She brings extensive expertise in corporate
                                    secretarial practices and regulatory compliance, including Companies Act, 2013 and SEBI
                                    Regulations. Her responsibilities include coordinating board and committee meetings,
                                    overseeing statutory filings, and ensuring adherence to governance standards. With a
                                    compliance-focused and process-driven approach, she plays a crucial role in maintaining the
                                    company's regulatory integrity.</p>
                            </div>
                        </div>
                        <div class="personnel-card team-slider-card">
                            <div class="personnel-image">
                                <img src="../images/harikrishana.jpeg" alt="Premkumar HariKrishnan" class="personnel-photo" width="320" height="427">
                            </div>
                            <div class="personnel-info">
                                <h3>Premkumar HariKrishnan</h3>
                                <p class="personnel-title">COMPLIANCE OFFICER</p>
                                <p class="personnel-description">Premkumar HariKrishnan is a seasoned professional specializing
                                    in Compliance, Legal, and Operations within the capital markets sector. With extensive
                                    experience in stockbroking, depository participant services, and custodial operations, he
                                    brings a deep understanding of regulatory frameworks, risk management, and operational
                                    efficiency. His expertise ensures the company maintains the highest standards of compliance
                                    and operational excellence.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-slider-dots" id="personnelSliderDots" aria-label="Slider pagination"></div>
            </div>
        </div>
    </section>

    <!-- Senior Management Section - Slider -->
    <section class="senior-management-section team-slider-section">
        <div class="container">
            <div class="team-section-header">
                <h2 class="senior-management-title">Senior management</h2>
                <p class="team-section-description">Our senior management team drives day-to-day operations with precision and expertise. They ensure that every aspect of our business runs smoothly, from risk management to client relations, maintaining the high standards that define Gretex.</p>
            </div>
            <div class="team-slider-wrapper">
                <button type="button" class="team-slider-btn team-slider-prev" aria-label="Previous team members" data-slider="senior"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>
                <button type="button" class="team-slider-btn team-slider-next" aria-label="Next team members" data-slider="senior"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>
                <div class="team-slider-track-container">
                    <div class="team-slider-track" id="seniorSliderTrack">
                        <div class="senior-management-card team-slider-card">
                            <div class="senior-management-image">
                                <img src="../images/Abhinav Chauhan.jpg" alt="Mr. Jignesh Jayantilal Lathigra" class="senior-management-photo" width="320" height="427">
                            </div>
                            <div class="senior-management-info">
                                <h3>Mr. Jignesh Jayantilal Lathigra</h3>
                                <p class="senior-management-title-text">RMS & OPERATION HEAD</p>
                                <p class="senior-management-description">He was appointed as the RMS & Operation Head of the
                                    Company w.e.f December 01, 2022. He holds a degree in Bachelor of Commerce (Three Year
                                    Integrated Course) from University of Mumbai. He was appointed as RMS Manager in Choice
                                    Broking Private Limited from February 2013 till August, 2016. He was working as RMS Manager
                                    in Pentagon Stock Brokers Pvt. Ltd from September 01, 2016 to November 30, 2022. He has
                                    approximately over 11 years of experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-slider-dots" id="seniorSliderDots" aria-label="Slider pagination"></div>
            </div>
        </div>
    </section>

    <!-- Company Timeline Section -->
    <section class="company-timeline-section">
        <div class="container">
            <h2 class="timeline-title">Company Timeline</h2>
            <div class="timeline-container">
                <div class="timeline-item timeline-right">
                    <div class="timeline-marker blue"></div>
                    <div class="timeline-content">
                        <div class="timeline-date blue">April 2010</div>
                        <div class="timeline-description">Incorporated as 'Sherwood Securities Private Limited.'</div>
                    </div>
                </div>
                <div class="timeline-item timeline-right">
                    <div class="timeline-marker green"></div>
                    <div class="timeline-content">
                        <div class="timeline-date green">January 2017</div>
                        <div class="timeline-description">Registered office changed from Kolkata to Mumbai, Maharashtra.
                        </div>
                    </div>
                </div>
                <div class="timeline-item timeline-left">
                    <div class="timeline-marker blue"></div>
                    <div class="timeline-content">
                        <div class="timeline-date blue">September 2017</div>
                        <div class="timeline-description">Name changed to Gretex Share Broking Private Limited.</div>
                    </div>
                </div>
                <div class="timeline-item timeline-left">
                    <div class="timeline-marker green"></div>
                    <div class="timeline-content">
                        <div class="timeline-date green">September 2021</div>
                        <div class="timeline-description">Achieved Market Making milestone for 20+ companies.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Office Visit Section -->
    <section class="office-visit-section scroll-reveal">
        <div class="container">
            <div class="office-visit-header">
                <h1>Come and visit one of our offices</h1>
            </div>
            <div class="office-visit-grid">
                <div class="office-carousel-wrapper">
                    <div class="office-carousel">
                        <div class="carousel-track">
                            <div class="carousel-slide active">
                                <img src="../images/IMG20260216130857.jpg.jpeg" alt="Gretex Office View" class="office-carousel-image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="office-info-content">
                    <h3>Mumbai, MH</h3>
                    <p class="office-tagline">Our primary headquarters and strategic hub for financial innovation.</p>
                    
                    <div class="info-group">
                        <h4>Address</h4>
                        <p>Naman Midtown, A wing, Unit 401, Fl No. 616,<br>
                           Tulsi Pipe Road, Dr. Ambedkar Nagar,<br>
                           Santacruz Bapat Marg, Dadar West,<br>
                           Mumbai-400013</p>
                    </div>

                    <div class="info-group">
                        <h4>Phone</h4>
                        <p>02269006500 / 501</p>
                    </div>

                    <div class="info-group">
                        <h4>Email</h4>
                        <p><a href="mailto:support@gretexbroking.com">support@gretexbroking.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Simple Lucide icon initialization for the new section
        document.addEventListener('DOMContentLoaded', function() {
            if (window.lucide) {
                window.lucide.createIcons();
            }
        });
    </script>

    <script src="../js/scroll-animations.js"></script>
    <script src="../js/gretex-financial.js"></script>

    <script src="../js/search.js"></script>
    <script src="../js/mobile-menu.js"></script>
    <script src="../js/team-section.js"></script>
    <script src="../js/team-slider.js"></script>
    <script src="../js/team-modal.js"></script>
    <script src="../js/chatbot-knowledge.js"></script>
    <script src="../js/chatbot-config.js"></script>
    <script src="../js/chatbot.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>


<?php
// Include footer
require_once '../includes/footer.php';
?>

