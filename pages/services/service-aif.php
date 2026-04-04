<?php
/**
 * AIF — Coming Soon - Gretex Share Broking Limited
 */

$pageTitle = 'AIF — Coming Soon - Gretex Corporate Services';
$additionalCSS = [
    '../../css/service-pages.css',
];

require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>

    <section class="service-hero equity-hero equity-hero-modern service-coming-soon-hero" style="--hero-bg-image: url('<?php echo gt_asset_url('images/aif.jpg'); ?>');">
        <div class="hero-overlay"></div>
        <div class="hero-content equity-hero-content">
            <div class="hero-badge">Alternative Investment Funds (AIF)</div>
            <h1>Alternative Investment Funds</h1>
            <p>We are preparing our dedicated AIF section—structured access to alternative strategies, regulatory disclosures, and onboarding will appear here shortly.</p>
        </div>
    </section>

    <section class="service-overview equity-overview-section service-coming-soon-section" aria-label="AIF coming soon">
        <div class="container">
            <div class="service-coming-soon-panel">
                <span class="service-coming-soon-label">Status</span>
                <h2 class="service-coming-soon-title">Coming soon</h2>
                <p class="service-coming-soon-text">Our AIF offering and detailed web content are under development. For early enquiries, mandates, or to be notified when this section goes live, please contact our team.</p>
                <div class="service-coming-soon-actions">
                    <a href="../contact.php" class="btn-primary-large">Contact us</a>
                    <a href="services.php" class="equity-btn-outline">All services</a>
                </div>
            </div>
        </div>
    </section>

    <section class="equity-faq-section" id="aif-faq" aria-label="AIF frequently asked questions">
        <div class="container">
            <div class="equity-faq-header">
                <span class="equity-faq-kicker">FAQ</span>
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="equity-faq-layout">
                <div class="equity-faq-group">
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>Why does this page say "Coming soon"?</summary>
                            <p>We are finalising detailed AIF web content, disclosures, and onboarding flows so visitors receive accurate, compliant information. The full section will be published here when ready.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>What is an Alternative Investment Fund (AIF)?</summary>
                            <p>An AIF is a privately pooled investment vehicle, typically regulated under SEBI (Alternative Investment Funds) Regulations, that invests in assets or strategies outside routine retail products. Categories and rules vary by fund type.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Can I still enquire about AIFs today?</summary>
                            <p>Yes. Use our contact page to share your interest. Our team can guide you on eligibility, documentation, and next steps in line with current regulations and internal processes.</p>
                        </details>
                    </div>
                </div>
                <div class="equity-faq-group">
                    <div class="equity-faq-accordion">
                        <details class="equity-faq-item">
                            <summary>Is AIF distribution listed elsewhere on the site?</summary>
                            <p>Our distribution overview covers mutual funds, AIFs, and PMS at a high level. This dedicated AIF page will add deeper product-specific detail when launched.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Who can invest in an AIF?</summary>
                            <p>Generally, investors who meet regulatory thresholds for commitment size and qualify as eligible investors under the fund’s documents. Each scheme defines its target investor base and minimums.</p>
                        </details>
                        <details class="equity-faq-item">
                            <summary>Will FAQs be updated when the section goes live?</summary>
                            <p>Yes. We will expand this section alongside full AIF content so common questions on categories, risks, liquidity, and onboarding are answered in one place.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once '../../includes/footer.php'; ?>
