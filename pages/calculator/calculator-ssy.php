<?php
/**
 * SSY Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'SSY Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">SSY Calculator</h1>
                    <p class="calculator-page-description">Sukanya Samriddhi Yojana - Government scheme for girl child's future</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About SSY Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Sukanya Samriddhi Yojana (SSY) Calculator</strong> is a specialized financial planning tool designed to help parents of girl children understand and plan for their daughter's future financial security. Launched as part of the "Beti Bachao, Beti Padhao" campaign by the Government of India, this scheme offers one of the highest interest rates among all government-backed small savings schemes.</p>
                                <p>This calculator helps you visualize how your regular annual contributions will grow over the 21-year period, taking into account the current interest rate and the power of compounding. With the SSY calculator, you can experiment with different investment amounts, understand the tax benefits under Section 80C, and see exactly how much wealth you'll accumulate by the time your daughter turns 21.</p>
                                <h3>How SSY Works</h3>
                                <p><strong>Eligibility & Account Opening:</strong></p>
                                <ul>
                                    <li>Account can be opened for a girl child from birth until she attains 10 years of age</li>
                                    <li>Maximum two SSY accounts per family (three for twins/triplets)</li>
                                    <li>Can be opened at any post office or authorized bank branches</li>
                                    <li>Only parent or legal guardian can operate until the girl turns 18</li>
                                </ul>
                                <p><strong>Deposit Requirements:</strong> Min &#8377;250, max &#8377;1,50,000 per year. Deposits allowed for 15 years; after that, interest continues until maturity.</p>
                                <p><strong>Interest:</strong> Calculated on lowest balance between 5th and month-end; compounded annually. Current rate: 8.2% p.a. (Q4 FY 2024-25).</p>
                                <p><strong>Maturity:</strong> Account matures when the girl turns 21. Partial withdrawal (50%) allowed after 18 for education/marriage.</p>
                                <h3>Benefits & Features</h3>
                                <ul>
                                    <li>Highest interest among government small savings (8.2% p.a.)</li>
                                    <li>100% government-backed, zero risk</li>
                                <li>Section 80C deduction up to &#8377;1.5L; interest & maturity tax-free (EEE status)</li>
                                    <li>Power of compounding over 21 years</li>
                                    <li>Transferable across India</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>Parents of girl children (0-10 years), expecting parents, grandparents, and guardians planning for daughter's education, marriage, or financial independence with tax-efficient, government-backed returns.</p>
                                <h3>Important Considerations</h3>
                                <div class="callout-box">
                                    <strong>Key Points:</strong> Account becomes inactive if minimum &#8377;250 is not deposited in a year (&#8377;50 penalty per default year to reactivate). Only one account per girl. Starting at birth vs age 5 can create &#8377;7.6L+ additional wealth with the same investment.
                                </div>
                                <h3>Example</h3>
                                <p><strong>Scenario:</strong> Daughter age 5, &#8377;1L annual deposit for 15 years @ 8.2%. Total investment: &#8377;15L. Maturity at 21: ~&#8377;34.75L. Interest earned: ~&#8377;19.75L. Tax saved @ 30% slab: ~&#8377;10.42L (80C + interest exemption).</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Can I open SSY if my daughter is already 10?</p><p>No. Accounts can only be opened before the girl turns 10.</p></div>
                                <div class="faq-item"><p class="faq-q">What if I miss a year's deposit?</p><p>Account becomes irregular. Pay &#8377;50 penalty per default year + minimum deposits to reactivate.</p></div>
                                <div class="faq-item"><p class="faq-q">When can I withdraw?</p><p>Partial (50%) after 18 for education/marriage. Full withdrawal at 21 or marriage after 18.</p></div>
                                <div class="faq-item"><p class="faq-q">Is SSY better than PPF for my daughter?</p><p>Yes � higher rate (8.2% vs 7.1%), same tax benefits, focused on the girl child's future.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - compare for family planning</li>
                                    <li><a href="calculator-elss.php">ELSS Calculator</a> - balance with market-linked 80C</li>
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - complement with equity investments</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - compare returns over time</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate SSY</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcSSYResult(event)">
                                <div class="calculator-field">
                                    <label for="ssy-deposit">Annual Deposit (&#8377;)</label>
                                    <input type="number" id="ssy-deposit" required min="250" max="150000" value="50000">
                                    <small class="field-hint">Min: &#8377;250 | Max: &#8377;1,50,000</small>
                                </div>
                                <div class="calculator-field">
                                    <label for="ssy-age">Girl Child's Current Age (Years)</label>
                                    <input type="number" id="ssy-age" required min="0" max="10" value="0">
                                </div>
                                <div class="calculator-field">
                                    <label for="ssy-rate">Interest Rate (% p.a.)</label>
                                    <input type="number" id="ssy-rate" value="8.2" step="0.1" readonly style="background:#f0f0f0">
                                    <small class="field-hint">Govt. notified rate (Oct 2024)</small>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('ssyResults').style.display='none';document.getElementById('ssyResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section" id="ssyResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">SSY Results</h2>
                        <div class="calculator-results-grid">
                            <div id="ssyResultsContent"></div>
                            <div class="calculator-results-chart">
                                <div id="ssyDonutChart" style="height:240px"></div>
                            </div>
                        </div>
                        <div class="calculator-chart-full">
                            <h3 class="chart-section-title">Yearly Accumulation</h3>
                            <div id="ssyStackedAreaChart" style="height:320px"></div>
                        </div>
                        <div class="calculator-timeline-row">
                            <div class="timeline-milestone"><div class="timeline-icon"><i data-lucide="baby"></i></div><span class="timeline-label">Year 0</span><span class="timeline-desc">Birth</span></div>
                            <div class="timeline-connector"></div>
                            <div class="timeline-milestone"><div class="timeline-icon"><i data-lucide="calendar"></i></div><span class="timeline-label">Year 15</span><span class="timeline-desc">Deposits Complete</span></div>
                            <div class="timeline-connector"></div>
                            <div class="timeline-milestone"><div class="timeline-icon"><i data-lucide="target"></i></div><span class="timeline-label">Year 21</span><span class="timeline-desc">Maturity - Girl turns 21</span></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        let ssyDonutChart=null, ssyAreaChart=null;
        function calcSSYResult(e){e.preventDefault();
            // Reset previous reading first - clear results and destroy charts before calculating
            const ssyResultsContent = document.getElementById('ssyResultsContent');
            if (ssyResultsContent) ssyResultsContent.innerHTML = '';
            if (ssyDonutChart) { ssyDonutChart.destroy(); ssyDonutChart = null; }
            if (ssyAreaChart) { ssyAreaChart.destroy(); ssyAreaChart = null; }
            
            const deposit=parseFloat(document.getElementById('ssy-deposit').value);
            const age=parseFloat(document.getElementById('ssy-age').value);
            const rate=parseFloat(document.getElementById('ssy-rate').value)||8.2;
            const r=calcSSY(deposit,age,rate);
            document.getElementById('ssyResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Total Investment (15 yrs):</span><span class="result-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Earned:</span><span class="result-value">${formatCurrency(r.interestEarned)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Maturity Value (at 21):</span><span class="result-value">${formatCurrency(r.maturityValue)}</span></div>
                    <div class="result-item"><span class="result-label">Maturity Year:</span><span class="result-value">${r.maturityYear}</span></div>
                </div>
            </div>`;
            if(ssyDonutChart){ssyDonutChart.destroy();ssyDonutChart=null;}
            if(ssyAreaChart){ssyAreaChart.destroy();ssyAreaChart=null;}
            setTimeout(()=>{
                ssyDonutChart=new ApexCharts(document.querySelector('#ssyDonutChart'),{
                    series:[r.totalInvestment,r.interestEarned],
                    chart:{type:'donut',height:240},
                    labels:['Your Investment','Interest Earned'],
                    colors:['#1e5a7d','#2d9c8f'],
                    plotOptions:{pie:{donut:{labels:{show:true,name:{show:true,formatter:()=>'Maturity Value'},value:{show:true,formatter:v=>'?'+Number(v).toLocaleString('en-IN')}}}}},
                    legend:{position:'bottom'}
                });
                ssyDonutChart.render();
                const yd=r.yearlyData||[];
                const invData=yd.map(d=>d.cumulativeInvestment);
                const intData=yd.map(d=>d.cumulativeInterest);
                const cats=yd.map(d=>'Year '+d.year);
                const ann=[]; if(yd.length>=15) ann.push({x:'Year 15',borderColor:'#f4b942',label:{text:'Deposits Complete',style:{color:'#f4b942'}}}); if(yd.length>=21) ann.push({x:'Year 21',borderColor:'#2d9c8f',label:{text:'Maturity',style:{color:'#2d9c8f'}}});
                ssyAreaChart=new ApexCharts(document.querySelector('#ssyStackedAreaChart'),{
                    series:[{name:'Investment',data:invData},{name:'Interest',data:intData}],
                    chart:{type:'area',height:320,stacked:true,animations:{enabled:true}},
                    colors:['#1e5a7d','#2d9c8f'],
                    fill:{type:'gradient',gradient:{opacityFrom:0.7,opacityTo:0.3}},
                    xaxis:{categories:cats},
                    yaxis:{labels:{formatter:v=>'?'+Number(v/1000).toFixed(0)+'K'}},
                    grid:{yaxis:{lines:{dashArray:4}}},
                    tooltip:{y:{formatter:v=>'?'+Number(v).toLocaleString('en-IN')}},
                    annotations:{xaxis:ann},
                    legend:{position:'top'}
                });
                ssyAreaChart.render();
                lucide.createIcons();
            },50);
            document.getElementById('ssyResults').style.display='block';document.getElementById('ssyResults').setAttribute('aria-hidden','false');document.getElementById('ssyResults').scrollIntoView({behavior:'smooth',block:'start'});
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

