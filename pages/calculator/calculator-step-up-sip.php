<?php
/**
 * Step Up SIP Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Step Up SIP Calculator - Gretex Financial';
$additionalCSS = [
    '../../css/calculator-page.css',
    '../../css/chatbot.css',
];

$additionalScripts = [
    'https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js',
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
                    <h1 class="calculator-page-title">Step Up SIP Calculator</h1>
                    <p class="calculator-page-description">SIP with annual increment - Match investments with salary growth</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Step Up SIP Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Step Up SIP Calculator</strong> shows the impact of increasing your SIP by a fixed % each year � typically aligned with salary increments � leading to much larger wealth than a flat SIP.</p>
                                <p>Increasing SIP by just 10% annually can create 40�50% more wealth vs regular SIP with the same starting amount. Ideal for salaried professionals whose income grows over time.</p>
                                <h3>How Step Up SIP Works</h3>
                                <p>Year 1: &#8377;5,000/month to Year 2: &#8377;5,500 (+10%) to Year 3: &#8377;6,050... Annual increment 5-20% (you choose; 10% typical). Aligns with salary hikes; compound interest on rising amounts.</p>
                                <p><strong>Impact:</strong> Regular SIP &#8377;5K for 20yr @12% = &#8377;50L. Step Up &#8377;5K +10%/yr @12% = &#8377;75L. Extra &#8377;25L (50% more!).</p>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>Aligns with income growth; creates 40�60% more wealth than regular SIP</li>
                                    <li>Small increases feel manageable; accelerates goal achievement</li>
                                    <li>Especially powerful for young investors (long compounding)</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>Young professionals (25�35), salaried with regular increments, 15+ year horizon. Step-up % should match realistic income growth. Rule: Step-up � half of expected salary increment (e.g. 12% hike ? 6% step-up). Not for unstable income or short horizon.</p>
                                <h3>Important Considerations</h3>
                                <p>Requires discipline�must increase annually. Step-up: Conservative 5�7%; Moderate 8�12%; Aggressive 15�20%. Can skip a year if needed; most AMCs allow. Common pitfall: too aggressive % becomes unaffordable.</p>
                                <h3>Example</h3>
                                <p>Age 25, &#8377;5K/month +10% step-up, 35yr @12%: Year 10 portfolio &#8377;23.5L, Year 20 &#8377;1.35 Cr, Year 35 &#8377;10.29 Cr. Total invested &#8377;2.16 Cr. Regular SIP (&#8377;5K flat): &#8377;6.48 Cr. Step Up advantage: &#8377;3.81 Cr extra! Last 15 years contribute 80% of final corpus.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Can't increase SIP in a year?</p><p>Most AMCs allow skip and continue with previous amount. Resume next year. One year doesn't derail plan.</p></div>
                                <div class="faq-item"><p class="faq-q">Is 10% increase realistic?</p><p>Yes for salaried. Avg increments 8�12%. Half for step-up (5�6%) is manageable. 10% needs ~20% salary growth.</p></div>
                                <div class="faq-item"><p class="faq-q">Decrease SIP if needed?</p><p>Yes but defeats purpose. In hardship (job loss, emergency) can reduce/pause. Better to have emergency fund.</p></div>
                                <div class="faq-item"><p class="faq-q">Higher amount or higher step-up %?</p><p>Start affordable with moderate step-up (10%). &#8377;3K +15% step-up &gt; &#8377;8K +5% over 20+ years.</p></div>
                                <div class="faq-item"><p class="faq-q">Step Up vs Regular SIP?</p><p>Step Up: long horizon 15+yr, rising income, young. Regular: short horizon, stable income, can start higher.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - compare with regular SIP returns</li>
                                    <li><a href="calculator-lumpsum.php">Lumpsum Calculator</a> - lump sum vs systematic approach</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - track actual returns achieved</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Step Up SIP</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcStepUpResult(event)">
                                <div class="calculator-field">
                                    <label for="stepup-sip">Starting Monthly SIP (&#8377;)</label>
                                    <input type="number" id="stepup-sip" required min="500" value="10000">
                                </div>
                                <div class="calculator-field">
                                    <label for="stepup-period">Period (Years)</label>
                                    <input type="number" id="stepup-period" required min="5" max="40" value="15">
                                </div>
                                <div class="calculator-field">
                                    <label for="stepup-rate">Expected Return (%)</label>
                                    <input type="number" id="stepup-rate" value="12" min="8" max="20">
                                </div>
                                <div class="calculator-field">
                                    <label for="stepup-pct">Annual Step-up (%)</label>
                                    <input type="number" id="stepup-pct" value="10" min="5" max="20">
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('stepupResults').style.display='none';document.getElementById('stepupResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section results-only" id="stepupResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">Step Up SIP Results</h2>
                        <div id="stepupResultsContent"></div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        function calcStepUpResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const stepupResultsContent = document.getElementById('stepupResultsContent');
            if (stepupResultsContent) stepupResultsContent.innerHTML = '';
            
            const sip=parseFloat(document.getElementById('stepup-sip').value);
            const period=parseFloat(document.getElementById('stepup-period').value);
            const rate=parseFloat(document.getElementById('stepup-rate').value)||12;
            const stepUp=parseFloat(document.getElementById('stepup-pct').value)||10;
            const r=calcStepUpSIP(sip,period,rate,stepUp);
            document.getElementById('stepupResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Total Investment:</span><span class="result-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="result-item"><span class="result-label">Maturity Value:</span><span class="result-value">${formatCurrency(r.maturityValue)}</span></div>
                    <div class="result-item"><span class="result-label">Expected Returns:</span><span class="result-value">${formatCurrency(r.expectedReturns)}</span></div>
                    <div class="result-item"><span class="result-label">Regular SIP (no step-up) would give:</span><span class="result-value">${formatCurrency(r.regularSIPValue)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Additional Wealth (Step-up benefit):</span><span class="result-value">${formatCurrency(r.additionalWealth)}</span></div>
                </div>
            </div>`;
            document.getElementById('stepupResults').style.display='block';document.getElementById('stepupResults').setAttribute('aria-hidden','false');document.getElementById('stepupResults').scrollIntoView({behavior:'smooth',block:'start'});
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

