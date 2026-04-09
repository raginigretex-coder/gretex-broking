<?php
/**
 * ETF Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'ETF Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">ETF Calculator</h1>
                    <p class="calculator-page-description">Exchange Traded Fund - Index investing with low expense ratios</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
               

                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                          <h3 class="calculator-info-title">ETF Calculator (Exchange-Traded Fund)</h3>
                            <div class="calculator-info-content">
                                <p>Exchange-Traded Funds (ETFs) are investment instruments that provide exposure to a basket of securities such as equities, bonds, or commodities. ETFs are traded on stock exchanges similar to individual stocks and typically track an index, sector, or asset class.</p>
                                <p>An ETF Calculator is a financial tool used to estimate the potential growth of investments made in ETFs over a specified period.</p>
                            </div>

                            <h3 class="calculator-info-title">What is an ETF Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>An ETF Calculator is an online utility that helps investors estimate the future value of their ETF investments.</p>
                                <p>By entering:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Investment amount (lumpsum or SIP)</li>
                                    <li>Expected rate of return</li>
                                    <li>Investment duration</li>
                                </ul>
                                <p>the calculator computes:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Estimated investment value over time</li>
                                    <li>Total returns generated</li>
                                </ul>
                                <p>The results are indicative and depend on assumptions related to returns and investment horizon.</p>
                            </div>


                             <h3 class="calculator-info-title">What are ETFs?</h3>
                                <div class="calculator-info-content">
                                    <p>ETFs are pooled investment vehicles that hold a diversified portfolio of assets. They are designed to track the performance of an underlying index, commodity, or sector.</p>
                                    <p>Key characteristics include:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Traded on stock exchanges like equities</li>
                                        <li>Provide diversification through a single instrument</li>
                                        <li>Prices fluctuate based on underlying asset values</li>
                                        <li>Can be bought and sold during market hours</li>
                                       
                                    </ul>
                                    
                                </div>
                            
                            <h3 class="calculator-info-title">Purpose and Use of an ETF Calculator</h3>
                                <div class="calculator-info-content">
                                    <p>The ETF calculator assists investors in evaluating the growth potential of their investments.</p>
                                    <p>It can be used to:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Estimate long-term investment growth</li>
                                        <li>Compare different return assumptions</li>
                                        <li>Plan investments for financial goals</li>
                                        <li>Evaluate lump sum and SIP-based ETF investments</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">How Does an ETF Calculator Work?</h3>
                                <div class="calculator-info-content">
                                    <p>An ETF calculator uses the concept of compound growth to project returns over time.</p>
                                    <p><strong style="margin-left: 10px;"> 1. Lump Sum Investment</strong></p>
                                    <p>For one-time investments, the future value is calculated as:</p>
                                    <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                        FV = P (1 + r)<sup>n</sup>
                                    </p>
                                    <p>Where:</p>
                                    <ul style="margin-left: 14px;">
                                        <li><strong>FV</strong> = Future value</li>
                                        <li><strong>P</strong> = Initial investment</li>
                                        <li><strong>r</strong> = Expected annual return</li>
                                        <li><strong>n</strong> = Investment duration</li>
                                    </ul>
                                    <p><strong style="margin-left: 10px;">2. SIP Investment</strong></p>
                                    <p>For periodic investments, the future value is calculated as:</p>
                                    <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                         FV = P × 
                                        <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                            <span style="display:block; border-bottom:2px solid #000; padding:0 6px;">
                                            (1 + r)<sup>n</sup> − 1
                                            </span>
                                            <span style="display:block; font-size:14px;">r</span>
                                        </span>
                                        × (1 + r)
                                    </p>
                                    <p>Where:</p>
                                    <ul style="margin-left: 14px;">
                                        <li><strong>FV</strong> = Future value</li>
                                        <li><strong>P</strong> = Periodic investment</li>
                                        <li><strong>r</strong> = Rate of return</li>
                                        <li><strong>n</strong> = Number of contributions</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">Illustrative Example</h3>
                                <div class="calculator-info-content">
                                    <h3 >Lump Sum Example</h3>
                                    <ul style="margin-left: 14px;">
                                        <li>Investment: ₹10,000</li>
                                        <li>Duration: 10 years</li>
                                        <li>Expected return: 7%</li>
                                        
                                    </ul>
                                    <p>Estimated maturity value:</p>
                                    <p><strong style="margin-left: 10px;">₹19,672 (approx.)</strong></p>

                                    <h3 >SIP Example</h3>
                                    <ul style="margin-left: 14px;">
                                        <li>Monthly investment: ₹5,000</li>
                                        <li>Duration: 5 years</li>
                                        <li>Expected return: 8%</li>
                                        
                                    </ul>
                                    <p>The calculator estimates:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Total invested amount</li>
                                        <li>Returns generated</li>
                                        <li>Final investment value</li>
                                        
                                    </ul>
                                    
                                </div>

                            <h3 class="calculator-info-title">How to Use the ETF Calculator?</h3>
                                <div class="calculator-info-content">
                                    <p>To calculate ETF returns:</p>
                                    <ol>
                                        <li>Select investment type (lump sum or SIP)</li>
                                        <li>Enter the investment amount</li>
                                        <li>Input the expected rate of return</li>
                                        <li>Specify the investment duration</li>
                                        <li>The calculator will display:
                                            <ul>
                                                <li>Total investment</li>
                                                <li>Estimated returns</li>
                                                <li>Projected value</li>
                                            </ul>
                                        </li>
                                    </ol>
                                </div>

                            <h3 class="calculator-info-title">How the Calculator Assists Investors?</h3>
                                <div class="calculator-info-content">
                                    <ul style="margin-left: 14px;">
                                        <li>Provides a structured estimate of investment growth</li>
                                        <li>Helps compare different ETFs and return scenarios</li>
                                        <li>Supports goal-based investment planning</li>
                                        <li>Simplifies complex calculations</li>
                                    </ul>
                                </div>

                             <h3 class="calculator-info-title">Factors Affecting ETF Returns</h3>
                                <div class="calculator-info-content">
                                    <p>ETF returns depend on several factors, including:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Performance of underlying assets</li>
                                        <li>Tracking error relative to the benchmark</li>
                                        <li>Expense ratios and fees</li>
                                        <li>Market conditions and volatility</li>
                                        <li>Premium or discount to Net Asset Value (NAV)</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">Key Considerations</h3>
                                <div class="calculator-info-content">
                                    <ul style="margin-left: 14px;">
                                        <li>ETF returns are market-linked and not guaranteed</li>
                                        <li>Prices may deviate from underlying NAV</li>
                                        <li>Taxation depends on holding period and asset type</li>
                                        <li>The calculator provides indicative values and does not account for:
                                            <ul style="margin-left: 14px;">
                                                <li>Brokerage</li>
                                                <li>Taxes</li>
                                                <li>Expense ratios</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">FAQs</h3>
                                <div class="stepup-faq-accordion" aria-label="ETF calculator frequently asked questions">
                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                        <span class="stepup-faq-question">What is an ETF?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                        An ETF is a market-traded investment fund that tracks an index, commodity, or asset basket.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                        <span class="stepup-faq-question">Is an ETF calculator accurate?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                        It provides estimates based on assumed inputs. Actual returns may vary.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                        <span class="stepup-faq-question">Can ETFs be invested through SIP?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                        Yes, many platforms allow SIP-based ETF investing.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                        <span class="stepup-faq-question">What affects ETF returns?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                        Returns depend on underlying asset performance, fees, and market conditions.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                        <span class="stepup-faq-question">Does the calculator include charges and taxes?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                        No, it provides pre-cost and pre-tax estimates.
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
        function calcETFResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const etfResultsContent = document.getElementById('etfResultsContent');
            if (etfResultsContent) etfResultsContent.innerHTML = '';
            
            const type=document.getElementById('etf-type').value;
            const amt=parseFloat(document.getElementById('etf-amount').value);
            const period=parseFloat(document.getElementById('etf-period').value);
            const rate=parseFloat(document.getElementById('etf-rate').value)||11;
            const er=parseFloat(document.getElementById('etf-er').value)||0.1;
            const trading=document.getElementById('etf-trading').checked;
            const r=calcETF(type,amt,period,rate,er,trading);
            document.getElementById('etfResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Total Investment:</span><span class="result-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="result-item"><span class="result-label">Gross Returns:</span><span class="result-value">${formatCurrency(r.grossReturns)}</span></div>
                    <div class="result-item"><span class="result-label">Expense Impact:</span><span class="result-value">${formatCurrency(r.expenseImpact)}</span></div>
                    <div class="result-item"><span class="result-label">Trading Costs:</span><span class="result-value">${formatCurrency(r.tradingCosts)}</span></div>
                    <div class="result-item"><span class="result-label">LTCG Tax:</span><span class="result-value">${formatCurrency(r.ltcgTax)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Net Returns:</span><span class="result-value">${formatCurrency(r.netReturns)}</span></div>
                    <div class="result-item"><span class="result-label">Effective CAGR:</span><span class="result-value">${r.effectiveCAGR.toFixed(2)}%</span></div>
                </div>
            </div>`;
            document.getElementById('etfInlineWrap').classList.remove('is-hidden');
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


