<?php

/**
 * Post Office FD Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Post Office FD Calculator - Gretex Financial';
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
                <h1 class="calculator-page-title">Post Office FD Calculator</h1>
                <p class="calculator-page-description">Government-backed fixed deposit with quarterly compounding</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <div class="calculator-wrapper">
                <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                <div class="calculator-info-section">
                    <div class="calculator-info-card">
                        <h3 class="calculator-info-title">Post Office FD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>Post Office Fixed Deposit (FD), also known as Post Office Time Deposit, is a government-backed savings instrument that offers fixed returns over a specified tenure. It is considered a low-risk investment option suitable for capital preservation and stable income generation.</p>
                            <p>A Post Office FD Calculator is a financial tool used to estimate the maturity value and interest earned on deposits made under this scheme.</p>
                        </div>

                        <h3 class="calculator-info-title">What is a Post Office FD Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>A Post Office FD Calculator is an online utility that helps investors estimate the returns on their fixed deposit investments with India Post.</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Deposit amount</li>
                                <li>Investment tenure</li>
                                <li>Applicable interest rate</li>
                            </ul>
                            <p>the calculator computes:</p>
                            <ul style="margin-left: 14px;">
                                <li>Total interest earned</li>
                                <li>Maturity value at the end of the tenure</li>
                            </ul>
                            <p>The results are indicative and based on the prevailing interest rates notified periodically.</p>

                        </div>

                        <h3 class="calculator-info-title">What is a Post Office FD?</h3>
                        <div class="calculator-info-content">
                            <p>A Post Office Fixed Deposit is a government-supported term deposit scheme with predefined tenure options and fixed interest rates.</p>
                            <p>Key characteristics include:</p>
                            <ul style="margin-left: 14px;">
                                <li>Backed by the Government of India</li>
                                <li>Fixed tenure options (typically 1, 2, 3, and 5 years)</li>
                                <li>Interest rates revised periodically</li>
                                <li>Interest compounded at regular intervals</li>
                                <li>Suitable for low-risk investors</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of a Post Office FD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The calculator assists investors in understanding the potential returns from their fixed deposit investments.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate maturity value for different tenures</li>
                                <li>Compare returns under varying interest rates</li>
                                <li>Plan fixed-income investments</li>
                                <li>Support goal-based financial planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does a Post Office FD Calculator Work?</h3>
                        <div class="calculator-info-content">
                            <p>The Post Office FD calculator uses the compound interest formula to estimate the maturity value of the investment:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                
                                A = P 
                                <span style="font-size:28px; vertical-align:middle;">(</span>
                                
                                1 + 
                                <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                    <span style="display:block; border-bottom:2px solid #000; padding:0 4px;">
                                    r
                                    </span>
                                    <span style="display:block; font-size:14px;">n</span>
                                </span>
                                
                                <span style="font-size:28px; vertical-align:middle;">)</span>
                                <sup>nt</sup>
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>A</strong> = Maturity amount</li>
                                <li><strong>P</strong> = Principal amount</li>
                                <li><strong>r</strong> = Annual rate of interest</li>
                                <li><strong>n</strong> = Compounding frequency</li>
                                <li><strong>t</strong> = Investment tenure</li>
                            </ul>
                            <p>In Post Office FDs, interest is typically compounded periodically (e.g., quarterly), which enhances the effective return.</p>

                            <p><strong>Example</strong></p>
                            <p>Assume:</p>
                            <ul style="margin-left: 14px;">
                                <li>Investment amount: &#8377;1,00,000</li>
                                <li>Tenure: 3 years</li>
                                <li>Interest rate: 6.9%</li>
                                <li>Compounding: Annual</li>
                            </ul>
                            <p>Estimated maturity value:</p>
                            <p><strong>&#8377;1,22,781 (approx.)</strong></p>
                            <p>This includes both the principal and accumulated interest.</p>
                        </div>

                        <h3 class="calculator-info-title">How to Use the Post Office FD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate returns:</p>
                            <ol>
                                <li>Enter the deposit amount</li>
                                <li>Select the investment tenure</li>
                                <li>Input the applicable interest rate</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Total interest earned</li>
                                        <li>Maturity value</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides quick and accurate estimates</li>
                                <li>Eliminates manual calculation complexity</li>
                                <li>Helps compare different tenure options</li>
                                <li>Supports structured financial planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Features of Post Office FD</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Government-backed investment</li>
                                <li>Fixed and predictable returns</li>
                                <li>Flexible tenure options</li>
                                <li>Quarterly compounding of interest</li>
                                <li>Minimum investment requirement (typically &#8377;1,000)</li>
                                <li>Tax benefits available for 5-year deposits under Section 80C (subject to applicable provisions)</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Factors Affecting Returns</h3>
                        <div class="calculator-info-content">
                            <p>The maturity value of a Post Office FD depends on:</p>
                            <ul style="margin-left: 14px;">
                                <li>Investment amount</li>
                                <li>Tenure</li>
                                <li>Interest rate applicable at the time of investment</li>
                                <li>Compounding frequency</li>
                                <li>Premature withdrawal conditions</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Interest rates are revised periodically</li>
                                <li>Premature withdrawal may attract penalties</li>
                                <li>Interest earned is taxable as per applicable laws</li>
                                <li>The calculator provides indicative values and does not account for:
                                    <ul style="margin-left: 20px;">
                                        <li>Taxes</li>
                                        <li>Penalties</li>
                                        <li>Changes in interest rates</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="Post Office FD calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">Is Post Office FD a safe investment?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                Yes, it is backed by the Government of India.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">What is the tenure of Post Office FD?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                Typically available for 1, 2, 3, and 5 years.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Is interest compounded?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                Yes, interest is compounded periodically.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Are there tax benefits?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                5-year Post Office FD may qualify for deduction under Section 80C, subject to applicable limits.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Does the calculator include tax calculations?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                No, it provides pre-tax estimates only.
                            </div>
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

    function calcPOFDResult(e) {
        e.preventDefault();
        // Reset previous reading first - clear results before calculating
        const pofdResultsContent = document.getElementById('pofdResultsContent');
        if (pofdResultsContent) pofdResultsContent.innerHTML = '';

        const amt = parseFloat(document.getElementById('pofd-amount').value);
        const tenure = parseInt(document.getElementById('pofd-tenure').value);
        const r = calcPOFD(amt, tenure);
        document.getElementById('pofdResultsContent').innerHTML = `<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Principal:</span><span class="result-value">${formatCurrency(r.principal)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Rate:</span><span class="result-value">${r.interestRate}%</span></div>
                    <div class="result-item"><span class="result-label">Interest Earned:</span><span class="result-value">${formatCurrency(r.interestEarned)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Maturity Amount:</span><span class="result-value">${formatCurrency(r.maturityAmount)}</span></div>
                </div>
            </div>`;
        document.getElementById('pofdInlineWrap').classList.remove('is-hidden');
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
