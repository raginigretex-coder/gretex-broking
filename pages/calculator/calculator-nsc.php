<?php
/**
 * NSC Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'NSC Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">NSC Calculator</h1>
                    <p class="calculator-page-description">National Savings Certificate - 5-year tax-saving scheme</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About NSC Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>National Savings Certificate (NSC) Calculator</strong> helps you plan tax-saving investments in a government-backed scheme. NSC offers guaranteed returns, capital safety, and Section 80C benefits � ideal for risk-averse investors and those seeking stable, sovereign-guaranteed returns.</p>
                                <p>This calculator shows maturity value, year-by-year interest accumulation, and the complete tax picture � including the unique <strong>deemed reinvestment</strong> benefit where accrued interest (Years 1�4) also qualifies for 80C in subsequent years, creating compounding tax benefits many investors overlook.</p>
                                <h3>How NSC Works</h3>
                                <p><strong>Structure:</strong> Post offices; 5-year fixed tenure; 7.7% p.a. (revised quarterly); min &#8377;1,000, no max. Lump sum only; annual compounding. <strong>Deemed reinvestment:</strong> Year 1-4 interest qualifies for 80C in next year's ITR. Only Year 5 interest taxable at maturity.</p>
                                <p><strong>Example:</strong> &#8377;1L earning &#8377;7,700 Year 1 - claim &#8377;7,700 under 80C in Year 2 ITR. No premature withdrawal except death/court order. Can be used as loan collateral.</p>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>100% government guaranteed; fixed returns; predictable maturity</li>
                                <li>80C on investment + deemed reinvestment (Years 1�4)</li>
                                    <li>Better tax treatment than bank FDs; available at 1.5L+ post offices</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>Risk-averse, senior citizens, first-time investors, those maximizing 80C with zero risk. Perfect if: want predictability, don't need money 5 years, prefer government schemes. NOT if: need liquidity, want higher returns (equity), want SIP option.</p>
                                <h3>Important Considerations</h3>
                                <p><strong>Limitations:</strong> 5-year lock-in; 7.7% may not beat inflation; last year interest taxable. <strong>Tips:</strong> Claim deemed reinvestment 80C; compare with PPF; ladder strategy (buy yearly for staggered maturity). Buy only from post office.</p>
                                <h3>Example</h3>
                                <p>&#8377;1L NSC @7.7%, 30% slab. Maturity &#8377;1,44,900. Tax saved: Year 1 &#8377;30K + deemed reinvestment ~&#8377;10.4K = &#8377;40.4K. Year 5 tax ~&#8377;3.1K. Net benefit &#8377;37.3K. Effective return ~12.8% considering tax arbitrage. vs FD: NSC wins ~&#8377;11K more.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Withdraw before 5 years?</p><p>No. Only death of holder or court order allows premature encashment.</p></div>
                                <div class="faq-item"><p class="faq-q">Deemed reinvestment?</p><p>Year 1�4 accrued interest qualifies for 80C in next year's ITR. Unique to NSC.</p></div>
                                <div class="faq-item"><p class="faq-q">NSC vs PPF?</p><p>NSC: 5yr, 7.7%, last year taxable. PPF: 15yr, 7.1%, fully tax-free. Use both for balanced 80C.</p></div>
                                <div class="faq-item"><p class="faq-q">Lost certificate?</p><p>Visit post office; indemnity bond + FIR; duplicate issued (&#8377;50-100 fee).</p></div>
                                <div class="faq-item"><p class="faq-q">NSC for minor?</p><p>Yes � guardian operates; 80C to guardian; matures in minor's name.</p></div>
                                <div class="faq-item"><p class="faq-q">NSC vs ELSS?</p><p>NSC: zero risk, 5yr. ELSS: higher potential, 3yr, market risk. Balanced: &#8377;75K each.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - compare long-term tax-free alternative</li>
                                    <li><a href="calculator-fd.php">Fixed Deposit Calculator</a> - compare with bank FD</li>
                                    <li><a href="calculator-ssy.php">SSY Calculator</a> - girl child government scheme</li>
                                    <li><a href="calculator-elss.php">ELSS Calculator</a> - market-linked tax-saving</li>
                                    <li><a href="calculator-po-fd.php">Post Office FD</a> - other post office schemes</li>
                                    <li><a href="calculator-compound-interest.php">Compound Interest</a> - understand compounding</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate NSC</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcNSCResult(event)">
                                <div class="calculator-field">
                                    <label for="nsc-amount">Investment Amount (&#8377;)</label>
                                    <input type="number" id="nsc-amount" required min="1000" value="100000">
                                </div>
                                <div class="calculator-field">
                                    <label for="nsc-slab">Tax Slab (%)</label>
                                    <select id="nsc-slab">
                                        <option value="5">5%</option>
                                        <option value="20">20%</option>
                                        <option value="30" selected>30%</option>
                                    </select>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('nscResults').style.display='none';document.getElementById('nscResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section results-only" id="nscResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">NSC Results</h2>
                        <div id="nscResultsContent"></div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        function calcNSCResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const nscResultsContent = document.getElementById('nscResultsContent');
            if (nscResultsContent) nscResultsContent.innerHTML = '';
            
            const amt=parseFloat(document.getElementById('nsc-amount').value);
            const slab=parseFloat(document.getElementById('nsc-slab').value)||30;
            const r=calcNSC(amt,slab);
            document.getElementById('nscResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Investment:</span><span class="result-value">${formatCurrency(r.investmentAmount)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Earned:</span><span class="result-value">${formatCurrency(r.interestEarned)}</span></div>
                    <div class="result-item"><span class="result-label">Maturity Value:</span><span class="result-value">${formatCurrency(r.maturityValue)}</span></div>
                    <div class="result-item"><span class="result-label">Tax Saved (80C):</span><span class="result-value">${formatCurrency(r.taxSaved)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Total Benefit:</span><span class="result-value">${formatCurrency(r.totalBenefit)}</span></div>
                    <div class="result-item"><span class="result-label">Effective Return:</span><span class="result-value">${r.effectiveReturn.toFixed(2)}%</span></div>
                </div>
            </div>`;
            document.getElementById('nscResults').style.display='block';document.getElementById('nscResults').setAttribute('aria-hidden','false');document.getElementById('nscResults').scrollIntoView({behavior:'smooth',block:'start'});
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

