<?php
/**
 * Recurring Deposit Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Recurring Deposit Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Recurring Deposit Calculator</h1>
                    <p class="calculator-page-description">Calculate Recurring Deposit maturity value with monthly contributions</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Recurring Deposit Calculator</h2>
                            <div class="calculator-info-content">
                                <p>A Recurring Deposit (RD) is a type of term deposit where you invest a fixed amount every month for a predetermined period. This calculator helps you estimate the maturity value of your RD investment.</p>
                                
                                <h3>How Recurring Deposits Work</h3>
                                <ul>
                                    <li><strong>Monthly Deposits:</strong> You deposit a fixed amount every month</li>
                                    <li><strong>Fixed Tenure:</strong> Choose a tenure ranging from 6 months to 10 years</li>
                                    <li><strong>Interest Compounding:</strong> Interest is compounded quarterly</li>
                                    <li><strong>Guaranteed Returns:</strong> Safe investment with predictable returns</li>
                                </ul>
                                
                                <h3>Benefits of Recurring Deposits</h3>
                                <ul>
                                    <li>Start with as little as &#8377;100 per month</li>
                                    <li>Builds a habit of regular saving</li>
                                    <li>Guaranteed returns with capital protection</li>
                                    <li>Loan facility available against RD</li>
                                    <li>Premature closure option (with penalty)</li>
                                </ul>
                                
                                <h3>Key Factors</h3>
                                <p><strong>Monthly Deposit:</strong> The fixed amount you deposit every month</p>
                                <p><strong>Interest Rate:</strong> Annual interest rate offered by the bank (typically 6-7%)</p>
                                <p><strong>Tenure:</strong> The duration for which you maintain the RD (longer tenures offer better returns)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section: Calculator Form -->
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Your RD</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calculateRDResult(event)">
                                <div class="calculator-field">
                                    <label for="rd-amount">Monthly Deposit (&#8377;)</label>
                                    <input type="number" id="rd-amount" placeholder="5000" required min="0" step="0.01">
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="rd-rate">Interest Rate (% p.a.)</label>
                                    <input type="number" id="rd-rate" placeholder="6.5" required min="0" max="100" step="0.1">
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="rd-years">Tenure (Years)</label>
                                    <input type="number" id="rd-years" placeholder="5" required min="0.5" step="0.5">
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
                                    <canvas id="rdChart"></canvas>
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

        let rdChartInstance = null;

        function calculateRDResult(event) {
            event.preventDefault();
            
            // Reset previous reading first - clear results and destroy chart before calculating
            const resultsDiv = document.getElementById('calculatorResults');
            if (resultsDiv) resultsDiv.innerHTML = '';
            if (rdChartInstance) {
                rdChartInstance.destroy();
                rdChartInstance = null;
            }
            
            const amount = parseFloat(document.getElementById('rd-amount').value);
            const rate = parseFloat(document.getElementById('rd-rate').value);
            const years = parseFloat(document.getElementById('rd-years').value);
            
            if (!amount || !rate || !years) {
                alert('Please fill all fields');
                return;
            }
            
            const months = years * 12;
            const monthlyRate = rate / 100 / 12;
            const totalInvested = amount * months;
            const futureValue = amount * (((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate));
            const returns = futureValue - totalInvested;
            const returnPercentage = (returns / totalInvested) * 100;
            
            const resultsCard = document.getElementById('resultsCard');
            // const resultsDiv = document.getElementById('calculatorResults');
            
            resultsDiv.innerHTML = `
                <div class="result-item">
                    <span class="result-label">Total Invested</span>
                    <span class="result-value">?${formatNumber(totalInvested)}</span>
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
            const ctx = document.getElementById('rdChart');
            rdChartInstance = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Total Invested', 'Interest Earned'],
                    datasets: [{
                        data: [totalInvested, returns],
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
            if (rdChartInstance) {
                rdChartInstance.destroy();
                rdChartInstance = null;
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

