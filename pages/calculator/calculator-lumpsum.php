<?php
/**
 * Lumpsum Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Lumpsum Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Lumpsum Calculator</h1>
                    <p class="calculator-page-description">Calculate returns for lumpsum investments to achieve your financial goals</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Lumpsum Calculator</h2>
                            <div class="calculator-info-content">
                                <p>A Lumpsum investment is a one-time investment where you invest a large amount at once. This calculator helps you estimate the future value of your lumpsum investment based on expected returns.</p>
                                
                                <h3>How Lumpsum Investment Works</h3>
                                <ul>
                                    <li><strong>One-Time Investment:</strong> Invest a large amount in a single transaction</li>
                                    <li><strong>Compound Growth:</strong> Your investment grows through the power of compounding</li>
                                    <li><strong>Market Timing:</strong> Returns depend on when you enter the market</li>
                                    <li><strong>Long-Term Benefits:</strong> Ideal for long-term wealth creation</li>
                                </ul>
                                
                                <h3>When to Choose Lumpsum</h3>
                                <ul>
                                    <li>When you have a large amount available at once</li>
                                    <li>For specific financial goals with fixed timelines</li>
                                    <li>When you're confident about market entry timing</li>
                                    <li>For tax-saving investments like ELSS</li>
                                </ul>
                                
                                <h3>Key Factors</h3>
                                <p><strong>Investment Amount:</strong> The total amount you invest at once</p>
                                <p><strong>Expected Return:</strong> The annualized return you expect (typically 10-15% for equity, 6-8% for debt)</p>
                                <p><strong>Investment Period:</strong> The duration you plan to stay invested (longer periods show better compounding)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section: Calculator Form -->
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Your Lumpsum</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calculateLumpsumResult(event)">
                                <div class="calculator-field">
                                    <label for="lumpsum-amount">Investment Amount (&#8377;)</label>
                                    <input type="number" id="lumpsum-amount" placeholder="100000" required min="1000" max="10000000" step="1000" value="100000">
                                    <small class="field-hint">Min: &#8377;1,000 | Max: &#8377;10,00,00,000</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="lumpsum-rate">Expected Annual Return Rate (%)</label>
                                    <input type="number" id="lumpsum-rate" placeholder="12" required min="1" max="30" step="0.5" value="12">
                                    <small class="field-hint">Range: 1% to 30%</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="lumpsum-years">Investment Period (Years)</label>
                                    <input type="number" id="lumpsum-years" placeholder="10" required min="1" max="40" step="1" value="10">
                                    <small class="field-hint">Range: 1 to 40 years</small>
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
                        <h2 class="calculator-section-title">Lumpsum Investment Results</h2>
                        <div id="lumpsumResults"></div>
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

        let lumpsumCharts = null;

        function formatNumber(num) {
            if (num === null || num === undefined || isNaN(num)) return '0';
            return num.toLocaleString('en-IN', { maximumFractionDigits: 2 });
        }

        function formatCurrency(num) {
            return '\u20B9' + formatNumber(num);
        }

        function calculateLumpsumResult(event) {
            event.preventDefault();
            
            // Reset previous reading first - clear results and destroy charts before calculating
            const lumpsumResults = document.getElementById('lumpsumResults');
            if (lumpsumResults) lumpsumResults.innerHTML = '';
            if (lumpsumCharts) {
                if (lumpsumCharts.growthChart) lumpsumCharts.growthChart.destroy();
                if (lumpsumCharts.donutChart) lumpsumCharts.donutChart.destroy();
                if (lumpsumCharts.columnChart) lumpsumCharts.columnChart.destroy();
                lumpsumCharts = null;
            }
            
            const amount = parseFloat(document.getElementById('lumpsum-amount').value);
            const rate = parseFloat(document.getElementById('lumpsum-rate').value);
            const years = parseFloat(document.getElementById('lumpsum-years').value);
            
            if (!amount || !rate || !years) {
                alert('Please fill all fields');
                return;
            }
            
            const futureValue = amount * Math.pow(1 + rate / 100, years);
            const returns = futureValue - amount;
            const returnPercentage = (returns / amount) * 100;
            const cagr = (Math.pow(futureValue / amount, 1/years) - 1) * 100;
            const wealthMultiplier = futureValue / amount;
            
            // Year-wise breakdown
            const yearlyData = [];
            for (let year = 1; year <= years; year++) {
                const value = amount * Math.pow(1 + (rate/100), year);
                const returns = value - amount;
                const yearlyReturn = year === 1 ? 
                    value - amount : 
                    value - (amount * Math.pow(1 + (rate/100), year - 1));
                
                yearlyData.push({
                    year: year,
                    openingBalance: year === 1 ? amount : amount * Math.pow(1 + (rate/100), year - 1),
                    interestEarned: yearlyReturn,
                    closingBalance: value,
                    cumulativeReturns: returns
                });
            }
            
            displayLumpsumResults({
                amount,
                rate,
                years,
                futureValue,
                returns,
                returnPercentage,
                cagr,
                wealthMultiplier,
                yearlyData
            });
            
            createLumpsumCharts(yearlyData, amount, futureValue);
            
            lucide.createIcons();
            document.getElementById('resultsCard').style.display = 'block';
            document.getElementById('resultsCard').setAttribute('aria-hidden', 'false');
            document.getElementById('resultsCard').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        
        function displayLumpsumResults(data) {
            const resultsDiv = document.getElementById('lumpsumResults');
            
            resultsDiv.innerHTML = `
                <div class="results-primary-card">
                    <h3 class="results-card-title">Lumpsum Investment Results</h3>
                    <div class="results-summary">
                        <div class="summary-row">
                            <span class="summary-label">One-time Investment:</span>
                            <span class="summary-value">${formatCurrency(data.amount)}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Investment Period:</span>
                            <span class="summary-value">${data.years} Years</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Expected Return Rate:</span>
                            <span class="summary-value">${data.rate}% p.a.</span>
                        </div>
                    </div>
                    <div class="results-divider"></div>
                    <div class="results-main">
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="wallet"></i></span>
                            <div class="result-content">
                                <span class="result-label">Principal Amount</span>
                                <span class="result-value">${formatCurrency(data.amount)}</span>
                            </div>
                        </div>
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="trending-up"></i></span>
                            <div class="result-content">
                                <span class="result-label">Estimated Returns</span>
                                <span class="result-value">${formatCurrency(data.returns)}</span>
                            </div>
                        </div>
                        <div class="result-item highlight">
                            <span class="result-icon"><i data-lucide="target"></i></span>
                            <div class="result-content">
                                <span class="result-label">Maturity Value</span>
                                <span class="result-value">${formatCurrency(data.futureValue)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="results-divider"></div>
                    <div class="results-metrics">
                        <div class="metric-item">
                            <span class="metric-label">Absolute Returns:</span>
                            <span class="metric-value">${data.returnPercentage.toFixed(2)}%</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">CAGR:</span>
                            <span class="metric-value">${data.cagr.toFixed(2)}%</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">Wealth Multiplier:</span>
                            <span class="metric-value">${data.wealthMultiplier.toFixed(2)}x</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">Average Annual Return:</span>
                            <span class="metric-value">${formatCurrency(data.returns / data.years)}</span>
                        </div>
                    </div>
                </div>
                
                <div class="visualizations-section">
                    <h3 class="visualizations-title">Visualizations</h3>
                    <div class="chart-container-full">
                        <h4 class="chart-title">Growth Projection Chart</h4>
                        <div id="lumpsumGrowthChart"></div>
                    </div>
                    <div class="charts-grid">
                        <div class="chart-container">
                            <h4 class="chart-title">Returns Breakdown</h4>
                            <div id="lumpsumDonutChart"></div>
                        </div>
                        <div class="chart-container">
                            <h4 class="chart-title">Year-over-Year Growth</h4>
                            <div id="lumpsumColumnChart"></div>
                        </div>
                    </div>
                </div>
                
                <div class="yearly-breakdown-table-container">
                    <h4 class="breakdown-table-title">Year-wise Breakdown</h4>
                    <div class="table-wrapper">
                        <table class="yearly-breakdown-table">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Opening Balance</th>
                                    <th>Interest Earned</th>
                                    <th>Closing Balance</th>
                                    <th>Cumulative Returns</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${data.yearlyData.map(d => `
                                    <tr>
                                        <td>${d.year}</td>
                                        <td>${formatCurrency(d.openingBalance)}</td>
                                        <td>${formatCurrency(d.interestEarned)}</td>
                                        <td><strong>${formatCurrency(d.closingBalance)}</strong></td>
                                        <td>${formatCurrency(d.cumulativeReturns)}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
        }
        
        function createLumpsumCharts(yearlyData, principal, futureValue) {
            setTimeout(() => {
                // Growth Chart
                const growthChart = new ApexCharts(document.querySelector('#lumpsumGrowthChart'), {
                    series: [{
                        name: 'Investment Value',
                        data: [principal, ...yearlyData.map(d => d.closingBalance)]
                    }],
                    chart: {
                        type: 'area',
                        height: 400,
                        toolbar: { show: true }
                    },
                    colors: ['#6366F1'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.6,
                            opacityTo: 0.1
                        }
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    markers: {
                        size: 6
                    },
                    xaxis: {
                        categories: ['Year 0', ...yearlyData.map(d => `Year ${d.year}`)]
                    },
                    yaxis: {
                        title: { text: 'Amount (\u20B9)' },
                        labels: {
                            formatter: function(val) {
                                return formatCurrency(val);
                            }
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return formatCurrency(val);
                            }
                        }
                    },
                    annotations: {
                        yaxis: [{
                            y: principal,
                            borderColor: '#94A3B8',
                            borderWidth: 2,
                            strokeDashArray: 5,
                            label: {
                                text: 'Initial Investment',
                                style: {
                                    color: '#94A3B8'
                                }
                            }
                        }]
                    }
                });
                growthChart.render();
                
                // Donut Chart
                const donutChart = new ApexCharts(document.querySelector('#lumpsumDonutChart'), {
                    series: [principal, futureValue - principal],
                    chart: {
                        type: 'donut',
                        height: 350
                    },
                    labels: ['Principal', 'Returns'],
                    colors: ['#1e5a7d', '#2d9c8f'],
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                labels: {
                                    show: true,
                                    total: {
                                        show: true,
                                        label: 'Maturity Value',
                                        formatter: function() {
                                            return formatCurrency(futureValue);
                                        }
                                    }
                                }
                            }
                        }
                    },
                    legend: {
                        position: 'bottom'
                    }
                });
                donutChart.render();
                
                // Column Chart
                const columnChart = new ApexCharts(document.querySelector('#lumpsumColumnChart'), {
                    series: [{
                        name: 'Annual Interest',
                        data: yearlyData.map(d => d.interestEarned)
                    }],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    colors: ['#2d9c8f'],
                    plotOptions: {
                        bar: {
                            columnWidth: '60%',
                            borderRadius: 4
                        }
                    },
                    xaxis: {
                        categories: yearlyData.map(d => `Year ${d.year}`)
                    },
                    yaxis: {
                        title: { text: 'Interest (\u20B9)' },
                        labels: {
                            formatter: function(val) {
                                return formatCurrency(val);
                            }
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return formatCurrency(val);
                            }
                        }
                    }
                });
                columnChart.render();
                
                lumpsumCharts = { growthChart, donutChart, columnChart };
            }, 100);
        }
        
        function resetCalculator() {
            document.getElementById('calculatorForm').reset();
            document.getElementById('resultsCard').style.display = 'none';
            document.getElementById('resultsCard').setAttribute('aria-hidden', 'true');
            if (lumpsumCharts) {
                if (lumpsumCharts.growthChart) lumpsumCharts.growthChart.destroy();
                if (lumpsumCharts.donutChart) lumpsumCharts.donutChart.destroy();
                if (lumpsumCharts.columnChart) lumpsumCharts.columnChart.destroy();
                lumpsumCharts = null;
            }
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

