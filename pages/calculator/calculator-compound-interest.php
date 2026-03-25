<?php
/**
 * Compound Interest Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Compound Interest Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Compound Interest Calculator</h1>
                    <p class="calculator-page-description">Calculate compound interest with different compounding frequencies</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Compound Interest Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Compound Interest Calculator</strong> demonstrates exponential growth when interest earns interest. Unlike simple interest�s linear returns, compound interest creates accelerating wealth � the foundation of long-term investing and retirement planning.</p>
                                <p>See how compounding frequency (monthly, quarterly, yearly) affects returns and why starting early is the most important investment decision. Used for FDs, PPF, SIPs, loans, and education planning.</p>
                                <h3>Formula</h3>
                                <div class="formula-box">A = P (1 + r/n)^(n � t)<br>CI = A - P<br>P = Principal, r = rate (decimal), n = compounding per year, t = time in years</div>
                                <p><strong>Frequency:</strong> Yearly (n=1), quarterly (n=4), monthly (n=12), daily (n=365). More frequent = higher returns. &#8377;1,00,000 @10% for 5 years: yearly = &#8377;1,61,000; quarterly = &#8377;1,64,000; monthly = &#8377;1,65,000.</p>
                                <h3>Rule of 72</h3>
                                <p>Years to double = 72 / Rate. At 8%: 9yr; 12%: 6yr; 18%: 4yr.</p>
                                <h3>Key Insight: Time &gt; Amount</h3>
                                <p><strong>Start at 25:</strong> Invest &#8377;5,000/month for 10 years, then stop. At 60 @12%: ~&#8377;3.78 Cr. <strong>Start at 35:</strong> Invest &#8377;5,000/month for 25 years. At 60: ~&#8377;3.53 Cr. Starting 10 years earlier beats investing 15 more years later. Delaying costs massively.</p>
                                <h3>Example</h3>
                                <p><strong>Retirement:</strong> &#8377;15,000/month from age 30 to 60 @11% -> corpus ~&#8377;5.28 Cr. <strong>Credit card debt:</strong> &#8377;1,00,000 @36% monthly compounding: in 3 years ~&#8377;2.9L - dangerous. <strong>Education:</strong> &#8377;20L needed in 13 years @8% inflation -> ~&#8377;54.4L required; invest ~&#8377;17,900/month @12%.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Best compounding frequency?</p><p>More frequent is better, but the practical difference is small (yearly vs daily ~&#8377;12K on &#8377;1L over 10 years). Focus on rate and time.</p></div>
                                <div class="faq-item"><p class="faq-q">Lump sum or SIP?</p><p>Lump sum if market timing confidence. SIP for discipline, rupee cost averaging. Best: lump sum in PPF + SIP in equity.</p></div>
                                <div class="faq-item"><p class="faq-q">Compound on loans?</p><p>Yes - it works against borrowers. Credit card ~3%/month: &#8377;1L becomes ~&#8377;1.43L in 1 year. Pay high-interest debt first.</p></div>
                                <div class="faq-item"><p class="faq-q">10% compound vs 15% simple?</p><p>Long term: compound wins. &#8377;1L: 10% compound for 20 years = &#8377;6.73L; 15% simple for 20 years = &#8377;4L. Compound adds ~&#8377;2.73L more.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-simple-interest.php">Simple Interest</a> - compare compound vs simple</li>
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - monthly investment compounding</li>
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - PPF compounding</li>
                                    <li><a href="calculator-fd.php">FD Calculator</a> - FD compounding</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - annualized compound growth</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Compound Interest</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcCIResult(event)">
                                <div class="calculator-field">
                                    <label for="ci-principal">Principal (&#8377;)</label>
                                    <input type="number" id="ci-principal" required min="1000" value="100000">
                                </div>
                                <div class="calculator-field">
                                    <label for="ci-rate">Interest Rate (% p.a.)</label>
                                    <input type="number" id="ci-rate" required min="1" max="30" step="0.1" value="10">
                                </div>
                                <div class="calculator-field">
                                    <label for="ci-years">Time (Years)</label>
                                    <input type="number" id="ci-years" required min="1" max="50" value="10">
                                </div>
                                <div class="calculator-field">
                                    <label for="ci-freq">Compounding</label>
                                    <select id="ci-freq">
                                        <option value="yearly">Yearly</option>
                                        <option value="half-yearly">Half-yearly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="daily">Daily</option>
                                    </select>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('ciResults').style.display='none';document.getElementById('ciResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section" id="ciResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">Results</h2>
                        <div class="calculator-results-grid">
                            <div id="ciResultsContent"></div>
                            <div class="calculator-results-chart">
                                <div id="ciChart" style="height:300px"></div>
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
        let ciChart=null;
        function calcCIResult(e){e.preventDefault();
            // Reset previous reading first - clear results and destroy chart before calculating
            const ciResultsContent = document.getElementById('ciResultsContent');
            if (ciResultsContent) ciResultsContent.innerHTML = '';
            if (ciChart) { ciChart.destroy(); ciChart = null; }
            
            const p=parseFloat(document.getElementById('ci-principal').value);
            const r=parseFloat(document.getElementById('ci-rate').value);
            const t=parseFloat(document.getElementById('ci-years').value);
            const freq=document.getElementById('ci-freq').value;
            const res=calcCompoundInterest(p,r,t,freq);
            document.getElementById('ciResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Principal:</span><span class="result-value">${formatCurrency(res.principal)}</span></div>
                    <div class="result-item"><span class="result-label">Total Interest:</span><span class="result-value">${formatCurrency(res.totalInterest)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Final Amount:</span><span class="result-value">${formatCurrency(res.finalAmount)}</span></div>
                    <div class="result-item"><span class="result-label">Effective Annual Rate:</span><span class="result-value">${res.effectiveRate.toFixed(2)}%</span></div>
                </div>
            </div>`;
            const n={yearly:1,'half-yearly':2,quarterly:4,monthly:12,daily:365}[freq];
            const yearlyData=[];
            for(let y=0;y<=t;y++){yearlyData.push(p*Math.pow(1+(r/100)/n,n*y));}
            if(ciChart)ciChart.destroy();
            setTimeout(()=>{
                ciChart=new ApexCharts(document.querySelector('#ciChart'),{series:[{name:'Amount',data:yearlyData}],chart:{type:'area',height:300},colors:['#2d9c8f'],fill:{type:'gradient',gradient:{opacityFrom:0.6,opacityTo:0.1}},stroke:{curve:'smooth',width:2},xaxis:{categories:yearlyData.map((_,i)=>`Year ${i}`)},yaxis:{labels:{formatter:v=>'?'+Number(v).toLocaleString('en-IN')}}});ciChart.render();
            },50);
            document.getElementById('ciResults').style.display='block';document.getElementById('ciResults').setAttribute('aria-hidden','false');document.getElementById('ciResults').scrollIntoView({behavior:'smooth',block:'start'});
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

