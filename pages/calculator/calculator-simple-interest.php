<?php
/**
 * Simple Interest Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Simple Interest Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Simple Interest Calculator</h1>
                    <p class="calculator-page-description">Calculate simple interest on loans and deposits</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Simple Interest Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Simple Interest Calculator</strong> calculates interest on the principal only � no compounding. Interest is computed on the original amount throughout the tenure. It is common in short-term loans, certain deposits, and quick estimations.</p>
                                <p>While most modern banking uses compound interest, understanding simple interest is essential for comparing loan offers, some government schemes, and the fundamentals of interest math.</p>
                                <h3>Formula</h3>
                                <div class="formula-box">SI = (P � R � T) / 100<br>Total Amount = P + SI<br>P = Principal, R = Rate (% p.a.), T = Time (years)</div>
                                <p><strong>Key:</strong> Interest applies only to principal each period - linear growth, not exponential. Example: &#8377;1,00,000 at 10% for 3 years gives interest &#8377;30,000; total &#8377;1,30,000.</p>
                                <h3>Common Uses</h3>
                                <p>Short-term personal loans (6�12 months), some auto loans, informal lending, certificates of deposit, quick estimates, educational examples.</p>
                                <h3>Simple vs Compound</h3>
                                <p><strong>Same &#8377;1,00,000 @10% for 5 years:</strong> Simple = &#8377;1,50,000 total (&#8377;50,000 interest). Compound = &#8377;1,61,000 (&#8377;61,000 interest). Compound gives ~&#8377;11,000 more. Use SI for short tenures and quick estimates; use compound for FDs, PPF, and investments.</p>
                                <h3>Example</h3>
                                <p><strong>Personal loan:</strong> &#8377;2,00,000 @15% for 6 months -> SI = &#8377;15,000; total = &#8377;2,15,000. <strong>Find rate:</strong> P = &#8377;3,00,000, T = 2 years, interest = &#8377;72,000 -> R = 12%. <strong>Find time:</strong> P = &#8377;1,50,000, R = 10%, interest target = &#8377;45,000 -> T = 3 years.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Simple vs compound?</p><p>Simple: interest only on principal. Compound: interest on principal + accumulated interest. Compound grows faster.</p></div>
                                <div class="faq-item"><p class="faq-q">Do banks use simple interest?</p><p>Rarely for deposits (mostly compound). Some short-term loans under 1 year may use simple � always confirm.</p></div>
                                <div class="faq-item"><p class="faq-q">Time in months/days?</p><p>Months: divide by 12 (8 months = 0.667 years). Days: divide by 365 (90 days = 0.247 years). Then apply the formula.</p></div>
                                <div class="faq-item"><p class="faq-q">Simple better for borrowers?</p><p>Yes � for the same P, R, T, simple total is less than compound. But most loans use compound or reducing balance.</p></div>
                                <div class="faq-item"><p class="faq-q">Reducing balance method?</p><p>Interest on remaining principal (not the full original). Most EMI loans use this � different from pure simple or compound.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-compound-interest.php">Compound Interest</a> - compare compounding effect</li>
                                    <li><a href="calculator-fd.php">FD Calculator</a> - actual compounding in FDs</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Simple Interest</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcSIResult(event)">
                                <div class="calculator-field">
                                    <label for="si-principal">Principal Amount (&#8377;)</label>
                                    <input type="number" id="si-principal" required min="1000" value="100000">
                                </div>
                                <div class="calculator-field">
                                    <label for="si-rate">Interest Rate (% p.a.)</label>
                                    <input type="number" id="si-rate" required min="1" max="36" step="0.1" value="8">
                                </div>
                                <div class="calculator-field">
                                    <label for="si-time">Time Period</label>
                                    <div class="calculator-time-input">
                                        <input type="number" id="si-time" required min="1" max="600" value="5">
                                        <select id="si-unit">
                                            <option value="years">Years</option>
                                            <option value="months">Months</option>
                                        </select>
                                    </div>
                                    <small class="field-hint">Enter duration (1 month to 30 years)</small>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('siResults').style.display='none';document.getElementById('siResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section" id="siResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">Results</h2>
                        <div class="calculator-results-grid">
                            <div id="siResultsContent"></div>
                            <div class="calculator-results-chart">
                                <div id="siChart" style="height:300px"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        let siChart=null;
        function calcSIResult(e){e.preventDefault();
            // Reset previous reading first - clear results and destroy chart before calculating
            const siResultsContent = document.getElementById('siResultsContent');
            if (siResultsContent) siResultsContent.innerHTML = '';
            if (siChart) { siChart.destroy(); siChart = null; }
            
            const p=parseFloat(document.getElementById('si-principal').value);
            const r=parseFloat(document.getElementById('si-rate').value);
            const timeVal=parseFloat(document.getElementById('si-time').value);
            const unit=document.getElementById('si-unit').value;
            const t=unit==='months'?timeVal/12:timeVal;
            const res=calcSimpleInterest(p,r,t);
            const timeLabel=unit==='months'?`${timeVal} months`:`${timeVal} years`;
            document.getElementById('siResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-icon"><i data-lucide="wallet"></i></span><div class="result-content"><span class="result-label">Principal:</span><span class="result-value">${formatCurrency(res.principal)}</span></div></div>
                    <div class="result-item"><span class="result-icon"><i data-lucide="calendar"></i></span><div class="result-content"><span class="result-label">Time Period:</span><span class="result-value">${timeLabel}</span></div></div>
                    <div class="result-item"><span class="result-icon"><i data-lucide="bar-chart-2"></i></span><div class="result-content"><span class="result-label">Simple Interest:</span><span class="result-value">${formatCurrency(res.simpleInterest)}</span></div></div>
                    <div class="result-item highlight"><span class="result-icon"><i data-lucide="target"></i></span><div class="result-content"><span class="result-label">Total Amount:</span><span class="result-value">${formatCurrency(res.totalAmount)}</span></div></div>
                </div>
            </div>`;
            if(siChart)siChart.destroy();
            setTimeout(()=>{
                siChart=new ApexCharts(document.querySelector('#siChart'),{series:[res.principal,res.simpleInterest],chart:{type:'donut',height:300},labels:['Principal','Interest'],colors:['#1e5a7d','#2d9c8f']});
                siChart.render();
            },50);
            lucide.createIcons();
            document.getElementById('siResults').style.display='block';document.getElementById('siResults').setAttribute('aria-hidden','false');document.getElementById('siResults').scrollIntoView({behavior:'smooth',block:'start'});
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

