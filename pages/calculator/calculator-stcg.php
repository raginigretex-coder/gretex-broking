<?php
/**
 * STCG Tax Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'STCG Tax Calculator - Gretex Financial';
$additionalCSS = [
    '../../css/calculator-page.css',
    '../../css/chatbot.css',
];

// Include header
require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>



    <main class="calculator-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link"><i data-lucide="arrow-left"></i><span>Back to Calculators</span></a>
                    <h1 class="calculator-page-title">STCG Tax Calculator</h1>
                    <p class="calculator-page-description">Short Term Capital Gains - Tax on investments held &lt; 12 months (equity)</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">

                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                  <div class="calculator-info-section">
                        <div class="calculator-info-card">
                        <h3 class="calculator-info-title">STCG Calculator (Short-Term Capital Gains)</h3>
                        <div class="calculator-info-content">
                            <p>Short-term capital gains (STCG) arise when a capital asset is sold within a short holding period as defined under the Income Tax Act. For listed equity shares and equity-oriented mutual funds, gains from assets held for <strong>12 months or less</strong> are classified as short-term capital gains.</p>
                            <p>An STCG Calculator is a financial tool used to estimate the taxable gains and corresponding tax liability on such transactions.</p>
                        </div>

                        <h3 class="calculator-info-title">What is an STCG Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>An STCG Calculator is an online utility that helps investors determine:</p>
                            <ul style="margin-left: 14px;">
                                <li>Short-term capital gains from a transaction</li>
                                <li>Applicable tax on those gains</li>
                            </ul>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Purchase value</li>
                                <li>Sale value</li>
                                <li>Transaction-related expenses</li>
                            </ul>
                            <p>the calculator computes:</p>
                            <ul style="margin-left: 14px;">
                                <li>Net capital gains</li>
                                <li>Estimated tax liability based on applicable tax rates</li>
                            </ul>
                            <p>The results are indicative and subject to prevailing tax regulations.</p>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of an STCG Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The calculator is designed to assist investors and traders in understanding their tax obligations arising from short-term investments.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate tax liability on equity trades and mutual fund redemptions</li>
                                <li>Plan buy/sell decisions more efficiently</li>
                                <li>Evaluate post-tax returns</li>
                                <li>Ensure compliance with applicable tax provisions</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">What are Short-Term Capital Gains?</h3>
                            <div class="calculator-info-content">
                                <p>Short-term capital gains refer to profits earned from the sale of capital assets within a specified holding period.</p>
                                <p>For example:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Listed equity shares and equity mutual funds: &le; 12 months</li>
                                    <li>Other assets (e.g., real estate, unlisted shares): As per applicable holding period definitions</li>
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">How to Calculate Short-Term Capital Gains?</h3>
                        <div class="calculator-info-content">
                            <p>Short-term capital gains are calculated using the following formula:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                <span style="font-style:italic;">STCG</span> = <span style="font-style:italic;">Net Sale Consideration</span> - <span style="font-style:italic;">Cost of Acquisition</span>
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>Net Sale Consideration</strong> = Sale price - transaction expenses (brokerage, etc.)</li>
                                <li><strong>Cost of Acquisition</strong> = Purchase price of the asset</li>
                            </ul>

                            <p><strong>Example</strong></p>
                            <p>Assume:</p>
                            <ul style="margin-left: 14px;">
                                <li>Purchase value: Rs.1,00,000</li>
                                <li>Sale value: Rs.1,40,000</li>
                                <li>Brokerage: Rs.1,000</li>
                            </ul>
                            <p>Net Sale Consideration = Rs.1,39,000</p>
                            <p>Short-Term Capital Gain:</p>
                            <p><strong>Rs.39,000</strong></p>
                            <p>If applicable tax rate is 20%, then:</p>
                            <p>Tax payable:</p>
                            <p><strong>Rs.7,800 (approx.)</strong></p>
                        </div>

                        <h3 class="calculator-info-title">Applicable Tax Rates</h3>
                        <div class="calculator-info-content">
                            <p>The tax treatment depends on the type of asset:</p>
                            <p><strong>1. Under Section 111A (Equity-related assets)</strong></p>
                            <ul style="margin-left:20px">
                                <li>Applicable to listed shares, equity mutual funds, and units of business trusts</li>
                                <li>Tax rate: <strong>20%</strong> (for applicable transactions post recent amendments)</li>
                            </ul>
                            <p><strong>2. Other Assets</strong></p>
                            <ul style="margin-left: 20px;">
                                <li>Includes real estate, unlisted shares, etc.</li>
                                <li>Taxed as per the investor's applicable income tax slab</li>

                            </ul>
                            <p>Additional surcharge and cess may apply based on total income.</p>
                        </div>

                        <h3 class="calculator-info-title">How to Use the STCG Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate short-term capital gains tax:</p>
                            <ol>
                                <li>Enter the purchase value of the asset</li>
                                <li>Enter the sale value</li>
                                <li>Input transaction expenses (if applicable)</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Short-term capital gain</li>
                                        <li>Estimated tax payable</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides accurate and quick tax estimates</li>
                                <li>Helps in evaluating post-tax returns</li>
                                <li>Supports tax-efficient investment decisions</li>
                                <li>Eliminates manual calculation complexity</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Tax rates depend on asset type and applicable laws</li>
                                <li>STCG is generally taxable without indexation benefit</li>
                                <li>Basic exemption limit may be adjusted for eligible taxpayers (subject to conditions)</li>
                                <li>The calculator provides indicative values and does not account for:
                                    <ul style="margin-left: 20px;">
                                        <li>Surcharge</li>
                                        <li>Cess</li>
                                        <li>Set-off of losses</li>
                                    </ul>
                                    
                                </li>
                            </ul>
                        </div>


                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="STCG calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">What qualifies as short-term capital gain?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                Gains from assets sold within the defined short-term holding period.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">What is the tax rate on STCG for equities?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                Typically taxed at 20% under Section 111A, subject to prevailing regulations.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Is indexation allowed for STCG?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                No, indexation benefits are generally not available for short-term capital gains.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Can STCG be adjusted against losses?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                Yes, it can be set off against capital losses as per tax rules.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Does the calculator include surcharge and cess?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                No, it provides base tax estimates only.
                            </div>
                        </div>


                    </div>
                   
                </div>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
          if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        
        }
    </script>

<script src="../../js/search.js"></script>
    <script src="../../js/mobile-menu.js"></script>

<script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>


<?php
// Include footer
require_once '../../includes/footer.php';
?>



