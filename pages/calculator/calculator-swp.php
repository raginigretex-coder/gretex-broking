<?php
/**
 * SWP Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'SWP Calculator - Gretex Financial';
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
                    <a href="calculators.php" class="back-link">
                        <i data-lucide="arrow-left"></i>
                        <span>Back to Calculators</span>
                    </a>
                    <h1 class="calculator-page-title">SWP Calculator</h1>
                    <p class="calculator-page-description">Calculate your final amount with Systematic Withdrawal Plans (SWP)</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About SWP Calculator</h2>
                            <div class="calculator-info-content">
                                <p>A Systematic Withdrawal Plan (SWP) allows you to withdraw a fixed amount regularly from your mutual fund investment. This calculator helps you understand how your corpus will deplete over time with regular withdrawals.</p>
                                
                                <h3>How SWP Works</h3>
                                <ul>
                                    <li><strong>Regular Withdrawals:</strong> You withdraw a fixed amount every month</li>
                                    <li><strong>Passive Income:</strong> Generate regular income from your investments</li>
                                    <li><strong>Corpus Management:</strong> Balance between withdrawals and growth</li>
                                    <li><strong>Tax Efficiency:</strong> Only capital gains are taxed, not the principal</li>
                                </ul>
                                
                                <h3>Benefits of SWP</h3>
                                <ul>
                                    <li>Regular income stream during retirement</li>
                                    <li>Flexible withdrawal amounts</li>
                                    <li>Tax-efficient compared to fixed deposits</li>
                                    <li>Potential for corpus growth if returns exceed withdrawals</li>
                                </ul>
                                
                                <h3>Key Factors</h3>
                                <p><strong>Total Investment:</strong> The corpus you start with</p>
                                <p><strong>Monthly Withdrawal:</strong> The fixed amount you withdraw every month</p>
                                <p><strong>Expected Return:</strong> The annualized return you expect (typically 8-12% for balanced funds)</p>
                                <p><strong>Time Period:</strong> The duration for which you plan to withdraw</p>
                            </div>
                        </div>
                    </div>

                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Your SWP</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calculateSWPResult(event)">
                                <div class="calculator-field">
                                    <label for="swp-investment">Total Investment (&#8377;)</label>
                                    <input type="number" id="swp-investment" placeholder="1000000" required min="50000" max="100000000" step="10000" value="1000000">
                                    <small class="field-hint">Min: &#8377;50,000 | Max: &#8377;10,00,00,000</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="swp-withdrawal">Monthly Withdrawal Amount (&#8377;)</label>
                                    <input type="number" id="swp-withdrawal" placeholder="10000" required min="1000" max="500000" step="1000" value="10000">
                                    <small class="field-hint">Min: &#8377;1,000 | Max: &#8377;5,00,000</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="swp-rate">Expected Annual Return Rate (%)</label>
                                    <input type="number" id="swp-rate" placeholder="10" required min="1" max="25" step="0.5" value="10">
                                    <small class="field-hint">Range: 1% to 25%</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="swp-years">Time Period (Years)</label>
                                    <input type="number" id="swp-years" placeholder="15" required min="1" max="40" step="1" value="15">
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
                        <h2 class="calculator-section-title">SWP Calculation Results</h2>
                        <div id="swpResults"></div>
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

        let swpCharts = null;

        function formatNumber(num) {
            if (num === null || num === undefined || isNaN(num)) return '0';
            return num.toLocaleString('en-IN', { maximumFractionDigits: 2 });
        }

        function formatCurrency(num) {
            return '\u20B9' + formatNumber(num);
        }

        function calculateSWPResult(event) {
            event.preventDefault();
            
            // Reset previous reading first - clear results and destroy charts before calculating
            const swpResults = document.getElementById('swpResults');
            if (swpResults) swpResults.innerHTML = '';
            if (swpCharts) {
                if (swpCharts.balanceChart) swpCharts.balanceChart.destroy();
                if (swpCharts.comparisonChart) swpCharts.comparisonChart.destroy();
                swpCharts = null;
            }
            
            const totalInvestment = parseFloat(document.getElementById('swp-investment').value);
            const monthlyWithdrawal = parseFloat(document.getElementById('swp-withdrawal').value);
            const annualRate = parseFloat(document.getElementById('swp-rate').value);
            const years = parseFloat(document.getElementById('swp-years').value);
            
            if (!totalInvestment || !monthlyWithdrawal || !annualRate || !years) {
                alert('Please fill all fields');
                return;
            }
            
            // Validate withdrawal amount
            const monthlyReturn = totalInvestment * (annualRate / 100 / 12);
            if (monthlyWithdrawal > monthlyReturn * 1.2) {
                if (!confirm('Your withdrawal amount exceeds expected monthly returns. The corpus may deplete faster. Continue?')) {
                    return;
                }
            }
            
            // Calculate SWP
            const monthlyRate = annualRate / 12 / 100;
            let balance = totalInvestment;
            const monthlyData = [];
            const yearlyData = [];
            
            let totalWithdrawn = 0;
            let totalInterest = 0;
            let monthsUntilDepletion = 0;
            const totalMonths = years * 12;
            
            for (let month = 1; month <= totalMonths; month++) {
                const openingBalance = balance;
                const monthlyInterest = balance * monthlyRate;
                totalInterest += monthlyInterest;
                
                balance += monthlyInterest;
                
                if (balance >= monthlyWithdrawal) {
                    balance -= monthlyWithdrawal;
                    totalWithdrawn += monthlyWithdrawal;
                } else {
                    totalWithdrawn += balance;
                    balance = 0;
                    monthsUntilDepletion = month;
                    break;
                }
                
                monthlyData.push({
                    month: month,
                    openingBalance: openingBalance,
                    interest: monthlyInterest,
                    withdrawal: monthlyWithdrawal,
                    closingBalance: balance
                });
                
                if (month % 12 === 0) {
                    const year = month / 12;
                    const yearData = monthlyData.slice(-12);
                    const yearInterest = yearData.reduce((sum, m) => sum + m.interest, 0);
                    const yearWithdrawal = yearData.reduce((sum, m) => sum + m.withdrawal, 0);
                    
                    yearlyData.push({
                        year: year,
                        openingBalance: yearData[0].openingBalance,
                        totalInterest: yearInterest,
                        totalWithdrawal: yearWithdrawal,
                        closingBalance: balance,
                        balanceChange: ((balance - yearData[0].openingBalance) / yearData[0].openingBalance * 100).toFixed(2) + '%'
                    });
                }
            }
            
            const finalBalance = balance;
            const netGain = totalInterest - (totalWithdrawn - totalInvestment);
            const sustainability = monthsUntilDepletion > 0 ? 
                `${Math.floor(monthsUntilDepletion / 12)} years ${monthsUntilDepletion % 12} months` : 
                `${years}+ years`;
            
            // Display results
            displaySWPResults({
                totalInvestment,
                monthlyWithdrawal,
                annualRate,
                years,
                totalWithdrawn,
                totalInterest,
                finalBalance,
                netGain,
                sustainability,
                monthsUntilDepletion,
                yearlyData
            });
            
            // Create charts
            createSWPCharts(yearlyData, totalInvestment);
            
            lucide.createIcons();
            document.getElementById('resultsCard').style.display = 'block';
            document.getElementById('resultsCard').setAttribute('aria-hidden', 'false');
            document.getElementById('resultsCard').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        
        function displaySWPResults(data) {
            const resultsDiv = document.getElementById('swpResults');
            
            resultsDiv.innerHTML = `
                <div class="results-primary-card">
                    <h3 class="results-card-title">Systematic Withdrawal Plan Results</h3>
                    <div class="results-summary">
                        <div class="summary-row">
                            <span class="summary-label">Total Investment:</span>
                            <span class="summary-value">${formatCurrency(data.totalInvestment)}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Monthly Withdrawal:</span>
                            <span class="summary-value">${formatCurrency(data.monthlyWithdrawal)}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Investment Period:</span>
                            <span class="summary-value">${data.years} Years</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Expected Return Rate:</span>
                            <span class="summary-value">${data.annualRate}% p.a.</span>
                        </div>
                    </div>
                    <div class="results-divider"></div>
                    <div class="results-main">
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="wallet"></i></span>
                            <div class="result-content">
                                <span class="result-label">Total Withdrawn</span>
                                <span class="result-value">${formatCurrency(data.totalWithdrawn)}</span>
                            </div>
                        </div>
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="trending-up"></i></span>
                            <div class="result-content">
                                <span class="result-label">Total Interest Earned</span>
                                <span class="result-value">${formatCurrency(data.totalInterest)}</span>
                            </div>
                        </div>
                        <div class="result-item highlight">
                            <span class="result-icon"><i data-lucide="target"></i></span>
                            <div class="result-content">
                                <span class="result-label">Final Balance</span>
                                <span class="result-value">${formatCurrency(data.finalBalance)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="results-divider"></div>
                    <div class="results-metrics">
                        <div class="metric-item">
                            <span class="metric-label">Plan Sustainability:</span>
                            <span class="metric-value">${data.sustainability}</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">Monthly Passive Income:</span>
                            <span class="metric-value">${formatCurrency(data.monthlyWithdrawal)}</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">Withdrawal Coverage:</span>
                            <span class="metric-value">${((data.totalWithdrawn / data.totalInvestment) * 100).toFixed(2)}%</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">Net Gain/Loss:</span>
                            <span class="metric-value">${formatCurrency(data.netGain)}</span>
                        </div>
                    </div>
                </div>
                
                <div class="visualizations-section">
                    <h3 class="visualizations-title">Visualizations</h3>
                    <div class="chart-container-full">
                        <h4 class="chart-title">Balance Depletion Chart</h4>
                        <div id="swpBalanceChart"></div>
                    </div>
                    <div class="chart-container-full">
                        <h4 class="chart-title">Withdrawal vs Interest Comparison</h4>
                        <div id="swpComparisonChart"></div>
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
                                    <th>Total Withdrawn</th>
                                    <th>Closing Balance</th>
                                    <th>Balance Change</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${data.yearlyData.map(d => `
                                    <tr>
                                        <td>${d.year}</td>
                                        <td>${formatCurrency(d.openingBalance)}</td>
                                        <td>${formatCurrency(d.totalInterest)}</td>
                                        <td>${formatCurrency(d.totalWithdrawal)}</td>
                                        <td><strong>${formatCurrency(d.closingBalance)}</strong></td>
                                        <td>${d.balanceChange}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
        }
        
        function createSWPCharts(yearlyData, initialInvestment) {
            setTimeout(() => {
                // Balance Depletion Chart
                const balanceChart = new ApexCharts(document.querySelector('#swpBalanceChart'), {
                    series: [{
                        name: 'Corpus Balance',
                        data: yearlyData.map(d => d.closingBalance)
                    }],
                    chart: {
                        type: 'area',
                        height: 400,
                        toolbar: { show: true }
                    },
                    colors: ['#10B981'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.3
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
                        categories: yearlyData.map(d => `Year ${d.year}`)
                    },
                    yaxis: {
                        title: { text: 'Balance (\u20B9)' },
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
                            y: initialInvestment,
                            borderColor: '#3B82F6',
                            borderWidth: 2,
                            strokeDashArray: 5,
                            label: {
                                text: 'Initial Investment',
                                style: {
                                    color: '#3B82F6'
                                }
                            }
                        }]
                    }
                });
                balanceChart.render();
                
                // Comparison Chart
                const comparisonChart = new ApexCharts(document.querySelector('#swpComparisonChart'), {
                    series: [
                        {
                            name: 'Annual Withdrawals',
                            type: 'column',
                            data: yearlyData.map(d => d.totalWithdrawal)
                        },
                        {
                            name: 'Annual Interest',
                            type: 'line',
                            data: yearlyData.map(d => d.totalInterest)
                        }
                    ],
                    chart: {
                        height: 400,
                        type: 'line',
                        toolbar: { show: true }
                    },
                    colors: ['#EF4444', '#10B981'],
                    stroke: {
                        width: [0, 3]
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '60%'
                        }
                    },
                    xaxis: {
                        categories: yearlyData.map(d => `Year ${d.year}`)
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
                    legend: {
                        position: 'bottom'
                    }
                });
                comparisonChart.render();
                
                swpCharts = { balanceChart, comparisonChart };
            }, 100);
        }
        
        function resetCalculator() {
            document.getElementById('calculatorForm').reset();
            document.getElementById('resultsCard').style.display = 'none';
            document.getElementById('resultsCard').setAttribute('aria-hidden', 'true');
            if (swpCharts) {
                if (swpCharts.balanceChart) swpCharts.balanceChart.destroy();
                if (swpCharts.comparisonChart) swpCharts.comparisonChart.destroy();
                swpCharts = null;
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

