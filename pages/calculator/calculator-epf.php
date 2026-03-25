<?php
/**
 * EPF Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'EPF Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">EPF Calculator</h1>
                    <p class="calculator-page-description">Employee Provident Fund - Retirement corpus for salaried employees</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About EPF Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Employee Provident Fund (EPF) Calculator</strong> is a retirement planning tool for salaried employees to project their corpus from mandatory PF contributions. EPF, established under the EPF Act 1952 and managed by EPFO, covers over 6 crore members�India's largest social security scheme.</p>
                                <p>This calculator visualizes wealth through your 12% contribution, employer's 3.67% EPF share (8.33% goes to EPS pension), and EPFO-declared interest compounding over your career. Model salary increments, VPF, and early withdrawals to understand their impact on your final corpus. EPF enjoys EEE tax status�often becoming the largest asset by retirement.</p>
                                <h3>How EPF Works</h3>
                                <p><strong>Eligibility:</strong> Mandatory for establishments with 20+ employees. Applicable to basic salary up to &#8377;15,000 (voluntary above). UAN follows you across employers.</p>
                                <p><strong>Contribution:</strong> Employee 12% of Basic+DA (pre-tax, 80C eligible). Employer 12% split: 3.67% to EPF, 8.33% to EPS, 0.5% to EDLI. EPS capped at &#8377;1,250/month for wages above &#8377;15,000.</p>
                                <p><strong>Example (Basic &#8377;40,000):</strong> Your share &#8377;4,800 + Employer EPF &#8377;1,468 = &#8377;6,268/month to EPF.</p>
                                <p><strong>Interest:</strong> Declared annually by EPFO (currently 8.25%). Compounded yearly, credited March 31. Completely tax-free if withdrawn after 5 years continuous service.</p>
                                <p><strong>Withdrawal:</strong> Full on retirement/resignation (after 2 months unemployment). Partial allowed for medical, education, marriage, home purchase (service tenure rules apply). Tax-free after 5 years continuous service.</p>
                                <h3>Benefits & Features</h3>
                                <ul>
                                    <li>Guaranteed 8.25% returns�no market risk</li>
                                    <li>Dual contribution: Your 12% + Employer 3.67% = rapid growth</li>
                                    <li>EEE tax: Exempt on contribution, interest, and withdrawal</li>
                                    <li>EDLI insurance; EPS pension for post-retirement income</li>
                                    <li>Partial withdrawal for education, medical, housing</li>
                                    <li>UAN enables seamless transfer between jobs</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>All salaried EPF members�fresh graduates, mid-career professionals, job switchers, VPF considerers, pre-retirees�anyone wanting to project retirement corpus, compare job offers, or plan withdrawals.</p>
                                <h3>Important Considerations</h3>
                                <div class="callout-box">
                                    <strong>Critical:</strong> Never withdraw on job change-transfer via UAN to preserve 5-year continuity and tax-free status. Withdrawing &#8377;5L at 30 loses ~&#8377;42L by 58. Employer contribution &gt;&#8377;7.5L/year is taxable. Verify employer deposits monthly.
                                </div>
                                <h3>Example</h3>
                                <p><strong>Scenario:</strong> Age 25, Basic &#8377;30,000, 8% annual increment, retire at 58. Your total contribution ~&#8377;1.05 Cr + Employer ~&#8377;32L. Interest earned ~&#8377;1.6 Cr. <strong>Final corpus: ~&#8377;2.97 Crore.</strong> Tax saved @30%: ~&#8377;79.5L. Starting at 22 vs 25 creates ~&#8377;49L more!</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">What happens when I change jobs?</p><p>Transfer EPF via UAN (recommended)�maintains continuity, no tax. Withdrawal breaks 5-year rule and attracts tax if service &lt;5 years.</p></div>
                                <div class="faq-item"><p class="faq-q">When is EPF withdrawal tax-free?</p><p>After 5 years continuous service. Transfer counts as continuous. Withdrawal resets the clock.</p></div>
                                <div class="faq-item"><p class="faq-q">EPF vs VPF?</p><p>VPF = voluntary extra contribution beyond 12%. Same rate (8.25%), same tax benefits. Employer doesn't match. Ideal for conservative tax-free savings.</p></div>
                                <div class="faq-item"><p class="faq-q">Is EPF enough for retirement?</p><p>Usually not alone. Combine with PPF (stability), equity SIP (growth), NPS (extra tax benefit) for diversified corpus.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - Additional tax-free voluntary savings</li>
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - Equity for inflation-beating growth</li>
                                    <li><a href="calculator-elss.php">ELSS Calculator</a> - 80C diversification</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - Track actual returns</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate EPF</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcEPFResult(event)">
                                <div class="calculator-field">
                                    <label for="epf-basic">Monthly Basic Salary (&#8377;)</label>
                                    <input type="number" id="epf-basic" required min="10000" value="50000">
                                </div>
                                <div class="calculator-field">
                                    <label for="epf-age">Current Age (Years)</label>
                                    <input type="number" id="epf-age" required min="18" max="58" value="30">
                                </div>
                                <div class="calculator-field">
                                    <label for="epf-retire">Retirement Age (Years)</label>
                                    <input type="number" id="epf-retire" value="58" min="58" max="65">
                                </div>
                                <div class="calculator-field">
                                    <label for="epf-balance">Current EPF Balance (&#8377;)</label>
                                    <input type="number" id="epf-balance" value="0" min="0">
                                </div>
                                <div class="calculator-field">
                                    <label for="epf-increment">Annual Salary Increment (%)</label>
                                    <input type="number" id="epf-increment" value="5" min="0" max="15" step="0.5">
                                </div>
                                <div class="calculator-field">
                                    <label for="epf-rate">EPF Interest Rate (%)</label>
                                    <input type="number" id="epf-rate" value="8.15" step="0.01">
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('epfResults').style.display='none';document.getElementById('epfResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section" id="epfResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">EPF Results</h2>
                        <div class="calculator-results-grid">
                            <div id="epfResultsContent"></div>
                            <div class="calculator-results-chart">
                                <h3 class="chart-section-title">Corpus Breakdown</h3>
                                <div id="epfDonutChart" style="height:220px"></div>
                            </div>
                        </div>
                        <div class="calculator-chart-full">
                            <h3 class="chart-section-title">Year-wise Contribution Breakdown</h3>
                            <div id="epfStackedChart" style="height:320px"></div>
                        </div>
                        <div class="epf-comparison-table">
                            <h3 class="chart-section-title">Annual vs Total</h3>
                            <div class="epf-table-grid" id="epfTableContent"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        let epfDonutChart=null, epfStackedChart=null;
        function calcEPFResult(e){e.preventDefault();
            // Reset previous reading first - clear results and destroy charts before calculating
            const epfResultsContent = document.getElementById('epfResultsContent');
            if (epfResultsContent) epfResultsContent.innerHTML = '';
            if (epfDonutChart) { epfDonutChart.destroy(); epfDonutChart = null; }
            if (epfStackedChart) { epfStackedChart.destroy(); epfStackedChart = null; }
            
            const basic=parseFloat(document.getElementById('epf-basic').value);
            const age=parseFloat(document.getElementById('epf-age').value);
            const retire=parseFloat(document.getElementById('epf-retire').value);
            const balance=parseFloat(document.getElementById('epf-balance').value)||0;
            const increment=parseFloat(document.getElementById('epf-increment').value)||5;
            const rate=parseFloat(document.getElementById('epf-rate').value)||8.15;
            const r=calcEPF(basic,age,retire,balance,increment,rate);
            document.getElementById('epfResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Your Contribution:</span><span class="result-value">${formatCurrency(r.yourContribution)}</span></div>
                    <div class="result-item"><span class="result-label">Employer Contribution:</span><span class="result-value">${formatCurrency(r.employerContribution)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Earned:</span><span class="result-value">${formatCurrency(r.interestEarned)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Maturity Value:</span><span class="result-value">${formatCurrency(r.maturityValue)}</span></div>
                </div>
            </div>`;
            const yd=r.yearlyData||[];
            const sampleYrs=yd.length>15?yd.filter((_,i)=>i%Math.ceil(yd.length/12)===0||i===yd.length-1):yd;
            if(epfDonutChart){epfDonutChart.destroy();epfDonutChart=null;}
            if(epfStackedChart){epfStackedChart.destroy();epfStackedChart=null;}
            setTimeout(()=>{
                epfDonutChart=new ApexCharts(document.querySelector('#epfDonutChart'),{
                    series:[r.yourContribution,r.employerContribution,r.interestEarned],
                    chart:{type:'donut',height:220},
                    labels:['Your Contribution','Employer Share','Interest Magic'],
                    colors:['#1e5a7d','#42a5f5','#2d9c8f'],
                    plotOptions:{pie:{donut:{size:'70%',labels:{show:true,value:{formatter:v=>'?'+Number(v/100000).toFixed(1)+'L'}}}}}
                });
                epfDonutChart.render();
                const cats=sampleYrs.map(d=>'Year '+d.year);
                epfStackedChart=new ApexCharts(document.querySelector('#epfStackedChart'),{
                    series:[{name:'Your Contribution',data:sampleYrs.map(d=>d.empContrib)},{name:"Employer's",data:sampleYrs.map(d=>d.employerContrib)},{name:'Interest',data:sampleYrs.map(d=>d.interest)}],
                    chart:{type:'bar',height:320,stacked:true},
                    colors:['#1e5a7d','#42a5f5','#2d9c8f'],
                    xaxis:{categories:cats},
                    yaxis:{labels:{formatter:v=>'?'+Number(v/1000).toFixed(0)+'K'}},
                    plotOptions:{bar:{columnWidth:'60%'}},
                    legend:{position:'top'}
                });
                epfStackedChart.render();
                document.getElementById('epfTableContent').innerHTML=`<div class="epf-table-row"><span>Annual (You)</span><span>${formatCurrency(yd.length?yd[yd.length-1].empContrib:0)}</span></div><div class="epf-table-row"><span>Annual (Employer)</span><span>${formatCurrency(yd.length?yd[yd.length-1].employerContrib:0)}</span></div><div class="epf-table-row"><span>Total (You)</span><span>${formatCurrency(r.yourContribution)}</span></div><div class="epf-table-row"><span>Total (Employer)</span><span>${formatCurrency(r.employerContribution)}</span></div><div class="epf-table-row highlight"><span>Total Interest</span><span>${formatCurrency(r.interestEarned)}</span></div>`;
            },50);
            document.getElementById('epfResults').style.display='block';document.getElementById('epfResults').setAttribute('aria-hidden','false');document.getElementById('epfResults').scrollIntoView({behavior:'smooth',block:'start'});
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

