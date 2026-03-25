<?php
/**
 * CAGR Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'CAGR Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">CAGR Calculator</h1>
                    <p class="calculator-page-description">Calculate Compound Annual Growth Rate for investment performance analysis</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About CAGR Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>CAGR (Compound Annual Growth Rate) Calculator</strong> calculates annualized return for any investment over a time period. Unlike simple returns, CAGR smooths volatility and gives a single rate representing consistent year-over-year growth�perfect for comparing investments across different periods.</p>
                                <p>CAGR is the standard metric for investors, mutual funds, and professionals. Evaluate stock portfolios, compare mutual funds, analyze real estate�CAGR gives a clear, standardized growth measure.</p>
                                <h3>How CAGR Works</h3>
                                <div class="formula-box">CAGR = [(Ending Value / Beginning Value)^(1/n) - 1] � 100<br>Where: n = Number of years</div>
                                <p><strong>Example:</strong> &#8377;1L (2020) to &#8377;1,61,051 (2025) in 5 years = 10% CAGR. Absolute return 61%; CAGR 10%/year.</p>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>Compare investments with different time horizons</li>
                                    <li>Standardize returns; smooth volatility; evaluate fund performance</li>
                                    <li>Calculate time to reach goals; compare with benchmarks (Nifty, Sensex)</li>
                                </ul>
                                <h3>Limitations</h3>
                                <p>Doesn't show volatility; assumes reinvestment; ignores intermediate cash flows (use XIRR for SIPs); past CAGR doesn't guarantee future returns. Doesn't tell: year-by-year variation, risk taken, max drawdown, dividends, tax impact.</p>
                                <h3>Example</h3>
                                <p><strong>Stock:</strong> &#8377;50K to &#8377;1.15L in 5yr = 18.1% CAGR (vs Nifty ~12%). <strong>MF:</strong> &#8377;2L to &#8377;3.2L in 7yr = 6.9% (slightly under FD @7%). <strong>Real estate:</strong> &#8377;30L to &#8377;65L in 12yr = 6.8%. <strong>Goal:</strong> &#8377;10L to &#8377;50L in 10yr needs 17.5% CAGR (aggressive equity).</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">CAGR vs average return?</p><p>CAGR uses geometric mean (compounding); average uses arithmetic. +50% then -50% = 0% CAGR (actual), 0% average (misleading).</p></div>
                                <div class="faq-item"><p class="faq-q">Good CAGR by asset class?</p><p>Large-cap 10�12%; mid/small 13�16%; FD 6�8%; Gold 8�10%; Real estate 7�10%.</p></div>
                                <div class="faq-item"><p class="faq-q">Can CAGR be negative?</p><p>Yes. &#8377;1L to &#8377;81K in 3yr = -7% CAGR.</p></div>
                                <div class="faq-item"><p class="faq-q">CAGR vs XIRR?</p><p>CAGR for lump sum (single in/out). XIRR for multiple cash flows (SIPs, STPs).</p></div>
                                <div class="faq-item"><p class="faq-q">CAGR and dividends?</p><p>Only if you add dividends to ending value. Include dividends reinvested or received in total value.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - Systematic investments (different calc than CAGR)</li>
                                    <li><a href="calculator-lumpsum.php">Lumpsum Calculator</a> - Project future value at different CAGR rates</li>
                                    <li><a href="calculator-mutual-fund.php">Mutual Fund Calculator</a> - Compare fund performance using CAGR</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate CAGR</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calculateCAGRResult(event)">
                                <div class="calculator-field">
                                    <label for="cagr-initial">Initial Investment (&#8377;)</label>
                                    <input type="number" id="cagr-initial" placeholder="100000" required min="1000" max="100000000" value="100000">
                                    <small class="field-hint">Min: &#8377;1,000 | Max: &#8377;10,00,00,000</small>
                                </div>
                                <div class="calculator-field">
                                    <label for="cagr-final">Final Value (&#8377;)</label>
                                    <input type="number" id="cagr-final" placeholder="200000" required min="1000" value="200000">
                                </div>
                                <div class="calculator-field">
                                    <label for="cagr-years">Investment Duration (Years)</label>
                                    <input type="number" id="cagr-years" placeholder="5" required min="1" max="50" value="5">
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('resultsCard').style.display='none';document.getElementById('resultsCard').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section" id="resultsCard" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">CAGR Results</h2>
                        <div class="calculator-results-grid">
                            <div id="cagrResults"></div>
                            <div class="calculator-results-chart">
                                <div id="cagrChart" style="height:350px"></div>
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
        let cagrChartInstance=null;
        function calculateCAGRResult(e){e.preventDefault();
            // Reset previous reading first - clear results and destroy chart before calculating
            const cagrResults = document.getElementById('cagrResults');
            if (cagrResults) cagrResults.innerHTML = '';
            if (cagrChartInstance) { cagrChartInstance.destroy(); cagrChartInstance = null; }
            
            const initial=parseFloat(document.getElementById('cagr-initial').value);
            const finalVal=parseFloat(document.getElementById('cagr-final').value);
            const years=parseFloat(document.getElementById('cagr-years').value);
            if(!initial||!finalVal||!years||initial<=0){alert('Please fill all fields with valid values');return;}
            const r=calcCAGR(initial,finalVal,years);
            document.getElementById('cagrResults').innerHTML=`<div class="results-primary-card">
                <h3 class="results-card-title">CAGR Calculation Results</h3>
                <div class="results-summary">
                    <div class="summary-row"><span class="summary-label">Total Investment:</span><span class="summary-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="summary-row"><span class="summary-label">Current Value:</span><span class="summary-value">${formatCurrency(r.currentValue)}</span></div>
                    <div class="summary-row"><span class="summary-label">Absolute Returns:</span><span class="summary-value">${r.absoluteReturnsPct.toFixed(2)}%</span></div>
                </div>
                <div class="results-divider"></div>
                <div class="results-main">
                    <div class="result-item highlight"><span class="result-icon"><i data-lucide="trending-up"></i></span><div class="result-content"><span class="result-label">CAGR</span><span class="result-value">${r.cagr.toFixed(2)}%</span></div></div>
                    <div class="result-item"><span class="result-icon"><i data-lucide="wallet"></i></span><div class="result-content"><span class="result-label">Total Gain</span><span class="result-value">${formatCurrency(r.totalGain)}</span></div></div>
                </div>
            </div>`;
            const yearlyData=[];
            for(let y=0;y<=years;y++){yearlyData.push({year:y,value:initial*Math.pow(finalVal/initial,y/years)});}
            if(cagrChartInstance)cagrChartInstance.destroy();
            setTimeout(()=>{
                cagrChartInstance=new ApexCharts(document.querySelector('#cagrChart'),{series:[{name:'Investment Value',data:yearlyData.map(d=>d.value)}],chart:{type:'line',height:350},colors:['#2d9c8f'],stroke:{curve:'smooth',width:3},xaxis:{categories:yearlyData.map(d=>`Year ${d.year}`)},yaxis:{labels:{formatter:v=>'?'+Number(v).toLocaleString('en-IN')}},tooltip:{y:{formatter:v=>'?'+Number(v).toLocaleString('en-IN')}}});
                cagrChartInstance.render();
            },100);
            lucide.createIcons();
            document.getElementById('resultsCard').style.display='block';document.getElementById('resultsCard').setAttribute('aria-hidden','false');document.getElementById('resultsCard').scrollIntoView({behavior:'smooth',block:'start'});
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

