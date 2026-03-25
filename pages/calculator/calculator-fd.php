<?php
/**
 * Fixed Deposit Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Fixed Deposit Calculator - Gretex Financial';
$additionalCSS = [
    '../../css/calculator-page.css',
    '../../css/chatbot.css',
];

$additionalScripts = [
    'https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js',
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
                    <a href="calculators.php" class="back-link">
                        <i data-lucide="arrow-left"></i>
                        <span>Back to Calculators</span>
                    </a>
                    <h1 class="calculator-page-title">Fixed Deposit Calculator</h1>
                    <p class="calculator-page-description">Check returns on your fixed deposits (FDs) without any hassle</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Fixed Deposit Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Fixed Deposit (FD) Calculator</strong> helps you calculate maturity amount and interest on bank or corporate FDs�one of India's most popular investments. FDs offer guaranteed returns with capital protection, ideal for risk-averse investors, senior citizens, and stable income planning.</p>
                                <p>This calculator factors in compounding frequency (monthly, quarterly, half-yearly, yearly), senior citizen rates, and tenure options for accurate projections. Compare FD rates across banks and plan short-term savings with instant, accurate results.</p>
                                <h3>How FD Works</h3>
                                <p><strong>Deposit:</strong> Min typically &#8377;1,000-&#8377;10,000; no max. Tenure: 7 days-10 years. Rates: 3-9.5% by bank/tenure. Senior citizens get 0.25-0.75% extra.</p>
                                <p><strong>Interest:</strong> Compounded monthly/quarterly/half-yearly/yearly. TDS 10% if interest &gt;&#8377;40,000/yr (&#8377;50,000 for seniors). Submit Form 15G/15H to avoid TDS if below taxable limit.</p>
                                <p><strong>Withdrawal:</strong> Premature allowed (0.5�2% penalty). Loan against FD up to 90%. Auto-renewal at maturity.</p>
                                <h3>Benefits & Features</h3>
                                <ul>
                                    <li>Guaranteed returns, capital protection, DICGC up to &#8377;5L per bank</li>
                                    <li>2�3x higher interest than savings; senior citizen bonus</li>
                                    <li>Flexible tenure; loan facility; TDS exemption via 15G/15H</li>
                                    <li>Tax: Interest fully taxable. Tax-saver FD (5yr lock-in) offers 80C up to &#8377;1.5L</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>Risk-averse investors, senior citizens, short-term goals (6mo�5yr), emergency fund parking, FD laddering, rate comparison across banks.</p>
                                <h3>Important Considerations</h3>
                                <p><strong>Limitations:</strong> Returns often lower than inflation post-tax; interest fully taxable; premature penalties; opportunity cost vs equity.</p>
                                <div class="callout-box">
                                    <strong>Tips:</strong> Compare rates; FD ladder for liquidity; senior citizens check special rates; split &gt;&#8377;5L across banks for DICGC; quarterly compounding &gt; annual; Form 15G/15H if below taxable limit.
                                </div>
                                <h3>Example</h3>
                                <p><strong>&#8377;5L, 3yr @7%, quarterly compounding:</strong> Maturity &#8377;6,15,562. Interest &#8377;1,15,562. Effective rate 7.19%. Post-tax (30%): TDS &#8377;34,668, net ~&#8377;5,80,894 (5.12% effective). <strong>Senior citizen (7.5%):</strong> Maturity &#8377;6,20,405; post-tax (20%): ~&#8377;5,96,324.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Which compounding is better?</p><p>Quarterly &gt; yearly. Monthly is better but rarely offered. More frequent = higher effective returns.</p></div>
                                <div class="faq-item"><p class="faq-q">Should I break FD if rates increase?</p><p>Only if new rate minus penalty is still higher. E.g. current 6%, new 7.5%, penalty 1% = 0.5% effective gain�may not be worth it unless significant amount.</p></div>
                                <div class="faq-item"><p class="faq-q">Is FD rate fixed for tenure?</p><p>Yes, locked at booking. Market rate changes don't affect existing FD.</p></div>
                                <div class="faq-item"><p class="faq-q">Monthly income from FD?</p><p>Choose non-cumulative, interest paid monthly/quarterly. Lower total returns than cumulative FD.</p></div>
                                <div class="faq-item"><p class="faq-q">FDs better than savings accounts?</p><p>For amounts not needed immediately, yes. FDs give 2�3x higher interest (7% vs 3%). But FDs have lock-in; savings offer instant liquidity.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-rd.php">RD Calculator</a> - Monthly deposit savings with similar guaranteed returns</li>
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - Compare tax-free PPF (7.1%) vs taxable FD</li>
                                    <li><a href="calculator-po-fd.php">Post Office FD</a> - Government FD alternative with higher rates</li>
                                    <li><a href="calculator-nsc.php">NSC Calculator</a> - Tax-saving alternative with 5-year lock-in</li>
                                    <li><a href="calculator-compound-interest.php">Compound Interest</a> - Understand compounding mathematics</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section: Calculator Form -->
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Your FD</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calculateFDResult(event)">
                                <div class="calculator-field">
                                    <label for="fd-amount">Principal Amount (&#8377;)</label>
                                    <input type="number" id="fd-amount" placeholder="100000" required min="0" step="0.01">
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="fd-rate">Interest Rate (% p.a.)</label>
                                    <input type="number" id="fd-rate" placeholder="6.5" required min="0" max="100" step="0.1">
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="fd-years">Tenure (Years)</label>
                                    <input type="number" id="fd-years" placeholder="5" required min="0.1" step="0.1">
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="fd-compounding">Compounding Frequency</label>
                                    <select id="fd-compounding" required>
                                        <option value="">Select...</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="half-yearly">Half-Yearly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>
                                
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate">
                                        <i data-lucide="calculator"></i>
                                        Calculate
                                    </button>
                                    <button type="button" class="calculator-btn-reset" onclick="resetCalculator()">
                                        <i data-lucide="refresh-cw"></i>
                                        Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section" id="resultsCard" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">Results</h2>
                        <div class="calculator-results-grid">
                            <div id="calculatorResults" class="calculator-results-content"></div>
                            <div class="calculator-results-chart">
                                <div class="calculator-chart-container">
                                    <canvas id="fdChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        let fdChartInstance = null;

        function calculateFDResult(event) {
            event.preventDefault();
            
            // Reset previous reading first - clear results and destroy chart before calculating
            const resultsDiv = document.getElementById('calculatorResults');
            if (resultsDiv) resultsDiv.innerHTML = '';
            if (fdChartInstance) {
                fdChartInstance.destroy();
                fdChartInstance = null;
            }
            
            const amount = parseFloat(document.getElementById('fd-amount').value);
            const rate = parseFloat(document.getElementById('fd-rate').value);
            const years = parseFloat(document.getElementById('fd-years').value);
            const compounding = document.getElementById('fd-compounding').value;
            
            if (!amount || !rate || !years || !compounding) {
                alert('Please fill all fields');
                return;
            }
            
            const compoundingFreq = {
                'yearly': 1,
                'half-yearly': 2,
                'quarterly': 4,
                'monthly': 12
            };
            
            const n = compoundingFreq[compounding];
            const futureValue = amount * Math.pow(1 + (rate / 100) / n, n * years);
            const returns = futureValue - amount;
            const returnPercentage = (returns / amount) * 100;
            
            const resultsCard = document.getElementById('resultsCard');
            // const resultsDiv = document.getElementById('calculatorResults');
            
            // Display new results (previous content already cleared at start)
            resultsDiv.innerHTML = `
                <div class="result-item">
                    <span class="result-label">Principal Amount</span>
                    <span class="result-value">?${formatNumber(amount)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Maturity Value</span>
                    <span class="result-value">?${formatNumber(futureValue)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Interest Earned</span>
                    <span class="result-value">?${formatNumber(returns)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Return Percentage</span>
                    <span class="result-value">${returnPercentage.toFixed(2)}%</span>
                </div>
            `;
            
            // Create Donut Chart (previous chart already destroyed at start)
            const ctx = document.getElementById('fdChart');
            fdChartInstance = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Principal Amount', 'Interest Earned'],
                    datasets: [{
                        data: [amount, returns],
                        backgroundColor: ['#1a4d7a', '#00a855'],
                        borderColor: ['#ffffff', '#ffffff'],
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                font: { family: "'Inter', sans-serif", size: 13, weight: '600' },
                                color: '#1a1a1a'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = formatNumber(context.parsed);
                                    const percentage = ((context.parsed / futureValue) * 100).toFixed(2);
                                    return `${label}: ?${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
            
            resultsCard.style.display = 'block';
            resultsCard.setAttribute('aria-hidden', 'false');
            resultsCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        
        function resetCalculator() {
            document.getElementById('calculatorForm').reset();
            document.getElementById('resultsCard').style.display = 'none';
            document.getElementById('resultsCard').setAttribute('aria-hidden', 'true');
            if (fdChartInstance) {
                fdChartInstance.destroy();
                fdChartInstance = null;
            }
        }
        
        function formatNumber(num) {
            return num.toLocaleString('en-IN', { maximumFractionDigits: 2 });
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

