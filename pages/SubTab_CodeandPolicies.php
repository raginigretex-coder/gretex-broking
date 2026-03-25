<?php
/**
 * Investor Contacts - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Investor Contacts - Gretex Financial';
$additionalCSS = [
    '../css/calculator-page.css',
];

$pageStyles = ".investor-contacts-page {
            min-height: 100vh;
            background: linear-gradient(180deg, #f5f7fa 0%, #e8f0f5 100%);
            padding: 90px 0 4rem 0;
        }

        .investor-contacts-hero {
            background: linear-gradient(135deg, #1e5a7d 0%, #2d9c8f 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .investor-contacts-hero::before {
            content: '''';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.3;
        }

        .investor-contacts-hero::after {
            content: '''';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-30px, -30px) rotate(180deg); }
        }

        .investor-contacts-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #ffffff;
        }

        .investor-contacts-title {
            font-family: ''Inter'', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            margin: 0;
            color: #ffffff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            letter-spacing: -0.02em;
        }

        .investor-contacts-content {
            padding: 5rem 0;
            background: transparent;
        }

        .investor-contacts-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .investor-contacts-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 3rem;
        }

        .investor-contact-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .investor-contact-card::before {
            content: '''';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--calc-primary-blue), var(--calc-primary-teal));
        }

        .investor-contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12), 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .investor-contact-card-header {
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #e8f4f8;
        }

        .investor-contact-card-title {
            font-family: ''Inter'', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--calc-primary-blue);
            margin: 0 0 0.5rem 0;
            line-height: 1.3;
        }

        .investor-contact-info {
            margin-bottom: 2rem;
        }

        .investor-contact-info-item {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
            position: relative;
        }

        .investor-contact-info-item:last-child {
            margin-bottom: 0;
        }

        .investor-contact-info-item::before {
            content: '''';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 8px;
            height: 8px;
            background: linear-gradient(135deg, var(--calc-primary-blue), var(--calc-primary-teal));
            border-radius: 50%;
        }

        .investor-contact-label {
            font-family: ''Inter'', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--calc-primary-blue);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .investor-contact-value {
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 1rem;
            color: var(--calc-text-dark);
            line-height: 1.7;
        }

        .investor-contact-value a {
            color: var(--calc-primary-teal);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .investor-contact-value a:hover {
            color: var(--calc-primary-blue);
            text-decoration: underline;
        }

        .investor-contact-highlight {
            background: linear-gradient(135deg, rgba(30, 90, 125, 0.05) 0%, rgba(45, 156, 143, 0.05) 100%);
            padding: 1.25rem 1.5rem;
            border-radius: 12px;
            border-left: 4px solid var(--calc-primary-teal);
            margin-top: 1.5rem;
        }

        .investor-contact-highlight-text {
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 0.9375rem;
            color: var(--calc-text-dark);
            line-height: 1.7;
            margin: 0;
        }

        .investor-contact-highlight-text strong {
            color: var(--calc-primary-blue);
            font-weight: 700;
        }

        .investor-contact-highlight-text a {
            color: var(--calc-primary-teal);
            text-decoration: none;
            font-weight: 600;
        }

        .investor-contact-highlight-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 968px) {
            .investor-contacts-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .investor-contacts-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .investor-contacts-hero {
                padding: 3rem 0;
            }

            .investor-contacts-title {
                font-size: 2rem;
            }

            .investor-contacts-content {
                padding: 3rem 0;
            }

            .investor-contact-card {
                padding: 2rem;
            }

            .investor-contact-card-title {
                font-size: 1.25rem;
            }
        }";

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



<!-- Navigation -->

    <main class="investor-contacts-page">
        <div class="investor-contacts-hero">
            <div class="container">
                <div class="investor-contacts-hero-content">
                    <h1 class="investor-contacts-title">Investor Contacts</h1>
                </div>
            </div>
        </div>

        <div class="investor-contacts-content">
            <div class="investor-contacts-container">
                <div class="investor-contacts-grid">
                    <!-- Left Card: Company Secretary and Compliance Officer -->
                    <div class="investor-contact-card">
                        <div class="investor-contact-card-header">
                            <h2 class="investor-contact-card-title">Company Secretary and Compliance Officer and Officer to handle Investor Grievance</h2>
                        </div>
                        
                        <div class="investor-contact-info">
                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Compliance Officer</div>
                                <div class="investor-contact-value">Mr. Premkumar HariKishnan</div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Company Secretary & Compliance Officer</div>
                                <div class="investor-contact-value">Ms. Rashmi Vyas</div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Company Name</div>
                                <div class="investor-contact-value">Gretex Share Broking Ltd.</div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Registered Office Address</div>
                                <div class="investor-contact-value">
                                    Naman Midtown, A wing<br>
                                    Unit 401 FP No. 616, Tulsi Pipe Road,<br>
                                    Dr. Ambedkar Nagar Senapati Bapat Marg<br>
                                    Behind Kamgar Kala Kendra Prabhadevi<br>
                                    Mumbai- 400013
                                </div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Corporate Identification Number (CIN)</div>
                                <div class="investor-contact-value">U65900MH2010PLC289361</div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Website</div>
                                <div class="investor-contact-value">
                                    <a href="https://www.gretexbroking.com" target="_blank">www.gretexbroking.com</a>
                                </div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Telephone</div>
                                <div class="investor-contact-value">
                                    <a href="tel:02269308513">(022) 69308513</a> / <a href="tel:02269308514">(022) 69308514</a>
                                </div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Email ID (Compliance)</div>
                                <div class="investor-contact-value">
                                    <a href="mailto:compliance@gretexbroking.com">compliance@gretexbroking.com</a>
                                </div>
                            </div>
                        </div>

                        <div class="investor-contact-highlight">
                            <p class="investor-contact-highlight-text">
                                <strong>Grievance Email:</strong> In case of any grievances please write to <a href="mailto:investor.grievances@gretexbroking.com">investor.grievances@gretexbroking.com</a>
                            </p>
                        </div>
                    </div>

                    <!-- Right Card: Registrar and Share Transfer Agent -->
                    <div class="investor-contact-card">
                        <div class="investor-contact-card-header">
                            <h2 class="investor-contact-card-title">Registrar and Share Transfer Agent</h2>
                        </div>
                        
                        <div class="investor-contact-info">
                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Company Name</div>
                                <div class="investor-contact-value">Bigshare Services Private Limited</div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Office Address</div>
                                <div class="investor-contact-value">
                                    Office No. S6-2, 6th Floor,<br>
                                    Pinnacle Business Park,<br>
                                    Next to Ahura Center,<br>
                                    Mahakali Caves Road,<br>
                                    Andheri East, Mumbai-400093
                                </div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Telephone</div>
                                <div class="investor-contact-value">
                                    <a href="tel:02262638200">(022) 62638200</a>
                                </div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Fax</div>
                                <div class="investor-contact-value">(022) 62638299</div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">E-Mail ID</div>
                                <div class="investor-contact-value">
                                    <a href="mailto:investor@bigshareonline.com">investor@bigshareonline.com</a>
                                </div>
                            </div>

                            <div class="investor-contact-info-item">
                                <div class="investor-contact-label">Website</div>
                                <div class="investor-contact-value">
                                    <a href="http://www.bigshareonline.com/" target="_blank">http://www.bigshareonline.com/</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->

    <script src="../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
    </script>

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


<?php
// Include footer
require_once '../includes/footer.php';
?>

