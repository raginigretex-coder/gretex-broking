<?php
/**
 * ELSS Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'ELSS Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">ELSS Calculator</h1>
                    <p class="calculator-page-description">Equity Linked Savings Scheme - Tax saving with market-linked returns</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About ELSS Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>ELSS (Equity Linked Savings Scheme) Calculator</strong> combines Section 80C tax deductions with equity growth potential. ELSS is the only mutual fund eligible for 80C and has the shortest lock-in (3 years) among 80C options.</p>
                                <p>Understand potential returns, immediate tax savings on contributions, tax-free growth during holding, and LTCG implications at redemption. Essential for allocating your &#8377;1.5L 80C limit between ELSS, PPF, insurance, and others.</p>
                                <h3>How ELSS Works</h3>
                                <p>Equity fund (min 80% stocks); 3-year lock-in; lump sum or SIP. Max 80C: &#8377;1.5L. <strong>Triple benefit:</strong> (1) 80C deduction = tax saved immediately; (2) Tax-free growth during lock-in; (3) LTCG: first &#8377;1.25L gains tax-free, above that 12.5%.</p>
                                <p>Historical returns: 10�15% CAGR. Better than debt 80C options post-tax for higher brackets.</p>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>Dual benefit: Tax saving + wealth creation; shortest 80C lock-in</li>
                                    <li>Higher return potential than PPF/NSC; professional management</li>
                                    <li>Full liquidity after 3 years; SIP option; effective returns highest among 80C for 30% bracket</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>Salaried in 20�30% brackets, young investors (25�45), those comfortable with equity volatility. NOT for risk-averse, near-retirement, or funds needed within 3 years.</p>
                                <h3>Important Considerations</h3>
                                <p><strong>Risks:</strong> Market risk, volatility, 3-year lock-in (no emergency access), fund-dependent returns. <strong>Choose ELSS if:</strong> Young (25�45), emergency fund in place, comfortable with equity. <strong>Choose PPF/NSC if:</strong> Risk-averse, near retirement, want guaranteed returns.</p>
                                <div class="callout-box">
                                    <strong>Tips:</strong> Prefer SIP; invest before March 31; choose funds with 10+ year track record; diversify across 2-3 ELSS if investing &#8377;1.5L; don't withdraw at 3 years unless needed; let it compound.
                                </div>
                                <h3>Example</h3>
                                <p>&#8377;1.5L/year SIP, 12% return, 30% slab. 3-year tax saved: &#8377;1.35L. Corpus ~&#8377;5.35L. Gains &lt; &#8377;1.25L = no LTCG tax. Effective return 69.8% on net outflow. vs FD @7% taxable: ELSS wins &#8377;13,600 + upfront &#8377;1.35L benefit. Continue 10yr more: &#8377;19.5L invested -> corpus &#8377;42.5L.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Withdraw ELSS before 3 years?</p><p>No. Mandatory 3-year lock-in, no premature withdrawal even for emergencies.</p></div>
                                <div class="faq-item"><p class="faq-q">SIP or lump sum better?</p><p>SIP: rupee cost averaging, less timing risk, spreads lock-in (each SIP has own 3-year).</p></div>
                                <div class="faq-item"><p class="faq-q">Withdraw after 3 years?</p><p>Can withdraw but if you don't need money, let it grow. ELSS becomes regular equity fund after lock-in.</p></div>
                                <div class="faq-item"><p class="faq-q">LTCG tax?</p><p>First &#8377;1.25L gains/year tax-free. Above: 12.5%. E.g. &#8377;3L profit = &#8377;21,875 tax.</p></div>
                                <div class="faq-item"><p class="faq-q">ELSS vs PPF?</p><p>ELSS: growth, 3yr lock-in. PPF: safety, 15yr. Ideal: use both - &#8377;1.5L each = &#8377;3L tax-saving balanced.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - Systematic investment growth</li>
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - Compare safer alternative</li>
                                    <li><a href="calculator-stcg.php">STCG/LTCG Tax Calculator</a> - Tax on redemption</li>
                                    <li><a href="calculator-nsc.php">NSC Calculator</a> - Compare fixed-return 80C</li>
                                    <li><a href="calculator-mutual-fund.php">Mutual Fund Calculator</a> - Non-ELSS equity funds</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate ELSS</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcELSSResult(event)">
                                <div class="calculator-field">
                                    <label for="elss-type">Investment Type</label>
                                    <select id="elss-type">
                                        <option value="lumpsum">Lumpsum</option>
                                        <option value="sip">SIP</option>
                                    </select>
                                </div>
                                <div class="calculator-field">
                                    <label for="elss-amount">Amount (&#8377;) - Max &#8377;1,50,000/yr for 80C</label>
                                    <input type="number" id="elss-amount" required min="500" max="150000" value="150000">
                                </div>
                                <div class="calculator-field">
                                    <label for="elss-period">Period (Years)</label>
                                    <input type="number" id="elss-period" required min="3" max="30" value="10">
                                </div>
                                <div class="calculator-field">
                                    <label for="elss-rate">Expected Return (%)</label>
                                    <input type="number" id="elss-rate" value="12" min="10" max="20">
                                </div>
                                <div class="calculator-field">
                                    <label for="elss-slab">Tax Slab (%)</label>
                                    <select id="elss-slab">
                                        <option value="5">5% (New regime)</option>
                                        <option value="20">20%</option>
                                        <option value="30" selected>30%</option>
                                    </select>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('elssResults').style.display='none';document.getElementById('elssResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section results-only" id="elssResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">ELSS Results</h2>
                        <div id="elssResultsContent"></div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        function calcELSSResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const elssResultsContent = document.getElementById('elssResultsContent');
            if (elssResultsContent) elssResultsContent.innerHTML = '';
            
            const type=document.getElementById('elss-type').value;
            const amount=parseFloat(document.getElementById('elss-amount').value);
            const period=parseFloat(document.getElementById('elss-period').value);
            const rate=parseFloat(document.getElementById('elss-rate').value)||12;
            const slab=parseFloat(document.getElementById('elss-slab').value)||30;
            const r=calcELSS(type,amount,period,rate,slab);
            document.getElementById('elssResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Total Investment:</span><span class="result-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="result-item"><span class="result-label">Tax Saved (80C):</span><span class="result-value">${formatCurrency(r.taxSaved)}</span></div>
                    <div class="result-item"><span class="result-label">Maturity Value:</span><span class="result-value">${formatCurrency(r.maturityValue)}</span></div>
                    <div class="result-item"><span class="result-label">LTCG Tax:</span><span class="result-value">${formatCurrency(r.ltcgTax)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Net Returns:</span><span class="result-value">${formatCurrency(r.netReturns)}</span></div>
                    <div class="result-item"><span class="result-label">Effective ROI:</span><span class="result-value">${r.effectiveROI.toFixed(2)}%</span></div>
                </div>
            </div>`;
            document.getElementById('elssResults').style.display='block';document.getElementById('elssResults').setAttribute('aria-hidden','false');document.getElementById('elssResults').scrollIntoView({behavior:'smooth',block:'start'});
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

