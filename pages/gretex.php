<?php
/**
 * Gretex - Unbreakable Security
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Gretex - Unbreakable Security';
$additionalCSS = [
    '../css/gretex.css',
];

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



<!-- Navigation -->

    <!-- Hero Section -->
    <main class="hero" id="home">
        <div class="grid-background"></div>
        <div class="hero-content">
            <div class="trust-badge">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L3 7V12C3 16.55 6.84 20.74 9.91 21.79C11.04 22.26 12.96 22.26 14.09 21.79C17.16 20.74 21 16.55 21 12V7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Trusted by over 1000 businesses worldwide</span>
            </div>
            
            <h1 class="hero-title">
                Unbreakable security<br>
                <span class="subtitle">for a connected world</span>
            </h1>
            
            <p class="hero-description">
                Even the smallest threat leaves a trace.<br>
                Gretex follows the signals others miss.
            </p>
            
            <div class="cta-buttons">
                <button class="btn-primary">Request demo</button>
                <button class="btn-secondary">Discover more</button>
            </div>
        </div>
    </main>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header">
                <h2>Our Services</h2>
                <p>Comprehensive security solutions for modern businesses</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <h3>Threat Detection</h3>
                    <p>Advanced AI-powered threat detection that identifies and neutralizes risks before they impact your business.</p>
                    <ul>
                        <li>Real-time monitoring</li>
                        <li>Behavioral analysis</li>
                        <li>Automated response</li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3>Data Protection</h3>
                    <p>Enterprise-grade encryption and data loss prevention to keep your sensitive information secure.</p>
                    <ul>
                        <li>End-to-end encryption</li>
                        <li>Access control</li>
                        <li>Compliance management</li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3>Network Security</h3>
                    <p>Comprehensive network protection with advanced firewalls and intrusion prevention systems.</p>
                    <ul>
                        <li>Firewall management</li>
                        <li>VPN solutions</li>
                        <li>Network monitoring</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Downloads Section -->
    <section class="downloads-section" id="downloads">
        <div class="container">
            <div class="section-header">
                <h2>Downloads</h2>
                <p>Get the tools and resources you need</p>
            </div>
            <div class="downloads-grid">
                <div class="download-card">
                    <div class="download-icon"><i data-lucide="smartphone"></i></div>
                    <h3>Mobile App</h3>
                    <p>Monitor your security on the go with our mobile application.</p>
                    <button class="download-btn">Download</button>
                </div>
                <div class="download-card">
                    <div class="download-icon"><i data-lucide="monitor"></i></div>
                    <h3>Desktop Client</h3>
                    <p>Full-featured desktop application for comprehensive security management.</p>
                    <button class="download-btn">Download</button>
                </div>
                <div class="download-card">
                    <div class="download-icon"><i data-lucide="file-text"></i></div>
                    <h3>Documentation</h3>
                    <p>Complete guides and API documentation for developers and administrators.</p>
                    <button class="download-btn">Download</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p>Ready to secure your business? Contact our team of experts.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon"><i data-lucide="mail"></i></div>
                            <div>
                                <h4>Email</h4>
                                <p>contact@gretex.com</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><i data-lucide="phone"></i></div>
                            <div>
                                <h4>Phone</h4>
                                <p>+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><i data-lucide="map-pin"></i></div>
                            <div>
                                <h4>Address</h4>
                                <p>123 Security Street<br>Tech City, TC 12345</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Your Message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->

    <script src="../js/gretex.js"></script>

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

