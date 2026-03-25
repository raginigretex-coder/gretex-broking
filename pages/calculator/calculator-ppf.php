<?php
/**
 * PPF Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'PPF Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">PPF Calculator</h1>
                    <p class="calculator-page-description">Public Provident Fund - Long-term savings with EEE tax benefits</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About PPF Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Public Provident Fund (PPF) Calculator</strong> is a comprehensive financial planning tool for India's most trusted long-term investment scheme. Launched in 1968 by the National Savings Organization, PPF offers a unique combination of guaranteed returns, complete tax exemption, and government-backed security.</p>
                                <p>This calculator shows how your contributions grow over the 15-year mandatory period and potential extensions. Experiment with different scenarios from &#8377;500 to &#8377;1.5L annual deposits and visualize the impact of consistent investing over decades with triple tax benefit (EEE status).</p>
                                <h3>How PPF Works</h3>
                                <p><strong>Eligibility:</strong> All Indian residents. One account per person. Minor accounts allowed (convert to adult at 18). Open at post offices or authorized banks.</p>
                                <p><strong>Deposits:</strong> Min &#8377;500, max &#8377;1,50,000/year. Lump sum or up to 12 installments. Deposit before 5th of month for full-month interest. 15-year mandatory period.</p>
                                <p><strong>Interest:</strong> Calculated on lowest balance between 5th and month-end. Compounded annually. Current rate: 7.1% p.a. (Q4 FY 2024-25). Completely tax-free.</p>
                                <p><strong>Maturity:</strong> After 15 years - close, extend with deposits (max &#8377;1.5L/yr), or extend without deposits. Partial withdrawal from year 7 (50% limit). Loan facility year 3-6.</p>
                                <h3>Benefits & Features</h3>
                                <ul>
                                    <li>7.1% p.a. guaranteed returns � beats inflation over long term</li>
                                    <li>EEE status: Tax-free on deposit, interest, and maturity</li>
                                    <li>100% government-backed, zero credit risk</li>
                                    <li>Partial withdrawal from year 7; loan from year 3�6</li>
                                    <li>Extension in 5-year blocks; no maximum age to open</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>Salaried employees, self-employed professionals, conservative investors, first-time investors, retirees, and parents planning children's education � anyone seeking stable, tax-efficient, risk-free long-term wealth building.</p>
                                <h3>Important Considerations</h3>
                                <div class="callout-box">
                                    <strong>Key Points:</strong> Deposit before April 5th for maximum interest. Account becomes inactive if minimum &#8377;500 is not deposited (&#8377;50 penalty to reactivate). NRIs cannot open new accounts. Premature closure reduces interest to ~4%.
                                </div>
                                <h3>Example</h3>
                                <p><strong>Scenario:</strong> Age 30, &#8377;1.5L/year for 15 years @ 7.1%. Total investment: &#8377;22.5L. Maturity at 45: ~&#8377;40.68L. Extend without deposits to 58: ~&#8377;98.66L. Tax saved @ 30%: ~&#8377;29.6L. Starting at 20 instead of 30 creates ~&#8377;83L more!</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Can I open PPF at 50?</p><p>Yes, no maximum age. But 15-year lock-in applies.</p></div>
                                <div class="faq-item"><p class="faq-q">What if I miss a year's deposit?</p><p>Account becomes inactive. Pay &#8377;50 penalty per default year + &#8377;500 for each missed year to reactivate.</p></div>
                                <div class="faq-item"><p class="faq-q">Best time to deposit?</p><p>Before April 5th � deposits after 5th lose that month's interest.</p></div>
                                <div class="faq-item"><p class="faq-q">PPF vs ELSS for tax saving?</p><p>Combine both: PPF for stability (7.1% guaranteed), ELSS for growth (12�15% potential).</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-epf.php">EPF Calculator</a> - compare with employer provident fund</li>
                                    <li><a href="calculator-elss.php">ELSS Calculator</a> - balance safe + growth for 80C</li>
                                    <li><a href="calculator-ssy.php">SSY Calculator</a> - if you have a girl child (higher returns)</li>
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - supplement with equity for inflation-beating returns</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - track actual returns over time</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate PPF</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcPPFResult(event)">
                                <div class="calculator-field">
                                    <label for="ppf-amount">Annual Investment (&#8377;)</label>
                                    <input type="number" id="ppf-amount" required min="500" max="150000" value="150000">
                                    <small class="field-hint">Min: &#8377;500 | Max: &#8377;1,50,000</small>
                                </div>
                                <div class="calculator-field">
                                    <label for="ppf-years">Investment Period (Years)</label>
                                    <input type="number" id="ppf-years" required min="15" max="50" value="15">
                                    <small class="field-hint">Min 15 years</small>
                                </div>
                                <div class="calculator-field">
                                    <label for="ppf-rate">Interest Rate (% p.a.)</label>
                                    <input type="number" id="ppf-rate" value="7.1" step="0.1">
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('ppfResults').style.display='none';document.getElementById('ppfResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section" id="ppfResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">PPF Results</h2>
                        <div class="calculator-results-grid">
                            <div id="ppfResultsContent"></div>
                            <div class="calculator-results-chart">
                                <h3 class="chart-section-title">Maturity Breakdown</h3>
                                <div class="ppf-progress-bar">
                                    <div class="ppf-bar-segments">
                                        <div class="ppf-segment ppf-inv" id="ppfInvSegment" style="width:0%"></div>
                                        <div class="ppf-segment ppf-int" id="ppfIntSegment" style="width:0%"></div>
                                    </div>
                                    <div class="ppf-bar-labels">
                                        <span><i data-lucide="wallet" class="icon-inline"></i> Principal</span><span><i data-lucide="trending-up" class="icon-inline"></i> Interest</span><span><i data-lucide="gem" class="icon-inline"></i> Maturity</span>
                                    </div>
                                </div>
                                <div id="ppfDonutChart" style="height:200px;margin-top:1rem"></div>
                            </div>
                        </div>
                        <div class="calculator-chart-full">
                            <h3 class="chart-section-title">Annual Contribution vs Year-end Balance</h3>
                            <div id="ppfColumnChart" style="height:320px"></div>
                        </div>
                        <div class="calculator-chart-full">
                            <h3 class="chart-section-title">Interest Accumulation</h3>
                            <div id="ppfLineChart" style="height:280px"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        let ppfDonutChart=null, ppfColumnChart=null, ppfLineChart=null;
        function calcPPFResult(e){e.preventDefault();
            // Reset previous reading first - clear results and destroy charts before calculating
            const ppfResultsContent = document.getElementById('ppfResultsContent');
            if (ppfResultsContent) ppfResultsContent.innerHTML = '';
            if (ppfDonutChart) { ppfDonutChart.destroy(); ppfDonutChart = null; }
            if (ppfColumnChart) { ppfColumnChart.destroy(); ppfColumnChart = null; }
            if (ppfLineChart) { ppfLineChart.destroy(); ppfLineChart = null; }
            
            const amt=parseFloat(document.getElementById('ppf-amount').value);
            const yrs=parseFloat(document.getElementById('ppf-years').value);
            const rate=parseFloat(document.getElementById('ppf-rate').value)||7.1;
            const r=calcPPF(amt,yrs,rate);
            document.getElementById('ppfResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Total Investment:</span><span class="result-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Earned:</span><span class="result-value">${formatCurrency(r.interestEarned)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Maturity Value:</span><span class="result-value">${formatCurrency(r.maturityValue)}</span></div>
                    <div class="result-item"><span class="result-label">Maturity Year:</span><span class="result-value">${r.maturityYear}</span></div>
                </div>
            </div>`;
            const invPct=r.maturityValue>0?((r.totalInvestment/r.maturityValue)*100):0;
            const intPct=r.maturityValue>0?((r.interestEarned/r.maturityValue)*100):0;
            document.getElementById('ppfInvSegment').style.width=invPct+'%';
            document.getElementById('ppfIntSegment').style.width=intPct+'%';
            if(ppfDonutChart){ppfDonutChart.destroy();ppfDonutChart=null;}
            if(ppfColumnChart){ppfColumnChart.destroy();ppfColumnChart=null;}
            if(ppfLineChart){ppfLineChart.destroy();ppfLineChart=null;}
            setTimeout(()=>{
                ppfDonutChart=new ApexCharts(document.querySelector('#ppfDonutChart'),{
                    series:[r.totalInvestment,r.interestEarned],
                    chart:{type:'donut',height:200},
                    labels:['Your Investment','Interest Earned'],
                    colors:['#1e5a7d','#2d9c8f'],
                    legend:{position:'bottom'}
                });
                ppfDonutChart.render();
                const yd=r.yearlyData||[];
                const fyLabels=yd.map(d=>d.fy||'Y'+d.year);
                ppfColumnChart=new ApexCharts(document.querySelector('#ppfColumnChart'),{
                    series:[{name:'Annual Investment',data:yd.map(d=>d.annualInvestment)},{name:'Year-end Balance',data:yd.map(d=>d.yearEndBalance)}],
                    chart:{type:'bar',height:320,stacked:false},
                    colors:['#1e5a7d','#2d9c8f'],
                    plotOptions:{bar:{columnWidth:'40%',borderRadius:4}},
                    xaxis:{categories:fyLabels},
                    yaxis:{labels:{formatter:v=>'?'+Number(v/1000).toFixed(0)+'K'}},
                    dataLabels:{enabled:false},
                    legend:{position:'top'}
                });
                ppfColumnChart.render();
                const cumInt=[]; let c=0; yd.forEach(d=>{c+=d.interestEarned; cumInt.push(c);});
                ppfLineChart=new ApexCharts(document.querySelector('#ppfLineChart'),{
                    series:[{name:'Yearly Interest',data:yd.map(d=>d.interestEarned)},{name:'Cumulative Interest',data:cumInt}],
                    chart:{type:'line',height:280},
                    colors:['#f4b942','#2d9c8f'],
                    stroke:{curve:'smooth',width:2},
                    xaxis:{categories:fyLabels},
                    yaxis:{labels:{formatter:v=>'?'+Number(v/1000).toFixed(0)+'K'}},
                    grid:{yaxis:{lines:{dashArray:4}}}
                });
                ppfLineChart.render();
                lucide.createIcons();
            },50);
            document.getElementById('ppfResults').style.display='block';document.getElementById('ppfResults').setAttribute('aria-hidden','false');document.getElementById('ppfResults').scrollIntoView({behavior:'smooth',block:'start'});
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

