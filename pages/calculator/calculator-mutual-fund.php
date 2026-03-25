<?php
/**
 * Mutual Fund Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Mutual Fund Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Mutual Fund Calculator</h1>
                    <p class="calculator-page-description">Calculate the returns on your mutual fund investments with expense ratio and tax considerations</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Mutual Fund Calculator</h2>
                            <div class="calculator-info-content">
                                <p>This calculator helps you estimate the returns on your mutual fund investments, taking into account expense ratios, exit loads, and tax implications.</p>
                                
                                <h3>Key Components</h3>
                                <ul>
                                    <li><strong>Expense Ratio:</strong> Annual fund management charges (typically 0.5-2.5%)</li>
                                    <li><strong>Exit Load:</strong> Charges for early redemption (usually 0-1%)</li>
                                    <li><strong>Tax on Gains:</strong> LTCG (10% after &#8377;1L exemption) or STCG (15%)</li>
                                    <li><strong>Net Returns:</strong> Returns after deducting all costs and taxes</li>
                                </ul>
                                
                                <h3>Fund Categories</h3>
                                <ul>
                                    <li><strong>Equity Funds:</strong> 12-15% expected returns, higher risk</li>
                                    <li><strong>Debt Funds:</strong> 6-8% expected returns, lower risk</li>
                                    <li><strong>Hybrid Funds:</strong> 9-11% expected returns, moderate risk</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Your MF Returns</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calculateMFResult(event)">
                                <div class="calculator-field">
                                    <label for="mf-type">Investment Type</label>
                                    <select id="mf-type" required onchange="updateMFDefaults()">
                                        <option value="sip">SIP</option>
                                        <option value="lumpsum">Lumpsum</option>
                                    </select>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="mf-amount" id="mf-amount-label">Monthly Investment Amount (&#8377;)</label>
                                    <input type="number" id="mf-amount" placeholder="5000" required min="500" max="10000000" step="500" value="5000">
                                    <small class="field-hint" id="mf-amount-hint">Min: &#8377;500 | Max: &#8377;1,00,00,000</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="mf-rate">Expected Annual Return Rate (%)</label>
                                    <input type="number" id="mf-rate" placeholder="12" required min="1" max="30" step="0.5" value="12">
                                    <small class="field-hint">Range: 1% to 30% | Typical: 10-15% for equity funds</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="mf-years">Investment Period (Years)</label>
                                    <input type="number" id="mf-years" placeholder="10" required min="1" max="40" step="1" value="10">
                                    <small class="field-hint">Range: 1 to 40 years</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="mf-category">Fund Category (Optional)</label>
                                    <select id="mf-category" onchange="updateRateFromCategory()">
                                        <option value="">Select Category</option>
                                        <option value="large-cap">Large Cap Equity</option>
                                        <option value="mid-cap">Mid Cap Equity</option>
                                        <option value="small-cap">Small Cap Equity</option>
                                        <option value="multi-cap">Multi Cap Equity</option>
                                        <option value="debt">Debt Fund</option>
                                        <option value="hybrid">Hybrid Fund</option>
                                        <option value="elss">ELSS (Tax Saver)</option>
                                        <option value="index">Index Fund</option>
                                        <option value="liquid">Liquid Fund</option>
                                    </select>
                                    <small class="field-hint">Auto-fills expected return rate</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="mf-expense">Expense Ratio (%)</label>
                                    <input type="number" id="mf-expense" placeholder="1.5" required min="0.1" max="3" step="0.1" value="1.5">
                                    <small class="field-hint">Range: 0.1% to 3% | Annual fund management charges</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="mf-exit-load">Exit Load (%)</label>
                                    <input type="number" id="mf-exit-load" placeholder="1" required min="0" max="5" step="0.25" value="1">
                                    <small class="field-hint">Range: 0% to 5% | If redeeming within 1 year</small>
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
                        <h2 class="calculator-section-title">Mutual Fund Calculation Results</h2>
                        <div id="mfResults"></div>
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

        let mfCharts = null;
        const categoryRates = {
            'large-cap': 12,
            'mid-cap': 15,
            'small-cap': 18,
            'multi-cap': 13,
            'debt': 7,
            'hybrid': 10,
            'elss': 12,
            'index': 11,
            'liquid': 5
        };

        function formatNumber(num) {
            if (num === null || num === undefined || isNaN(num)) return '0';
            return num.toLocaleString('en-IN', { maximumFractionDigits: 2 });
        }

        function formatCurrency(num) {
            return '\u20B9' + formatNumber(num);
        }

        function updateMFDefaults() {
            const type = document.getElementById('mf-type').value;
            const amountLabel = document.getElementById('mf-amount-label');
            const amountHint = document.getElementById('mf-amount-hint');
            
            if (type === 'lumpsum') {
                amountLabel.textContent = 'Investment Amount (\u20B9)';
                amountHint.textContent = 'Min: \u20B95,000 | Max: \u20B91,00,00,000';
                document.getElementById('mf-amount').value = '100000';
                document.getElementById('mf-amount').min = '5000';
            } else {
                amountLabel.textContent = 'Monthly Investment Amount (\u20B9)';
                amountHint.textContent = 'Min: \u20B9500 | Max: \u20B91,00,00,000';
                document.getElementById('mf-amount').value = '5000';
                document.getElementById('mf-amount').min = '500';
            }
        }

        function updateRateFromCategory() {
            const category = document.getElementById('mf-category').value;
            if (category && categoryRates[category]) {
                document.getElementById('mf-rate').value = categoryRates[category];
            }
        }

        function calculateMFResult(event) {
            event.preventDefault();
            
            // Reset previous reading first - clear results and destroy charts before calculating
            const mfResults = document.getElementById('mfResults');
            if (mfResults) mfResults.innerHTML = '';
            if (mfCharts) {
                if (mfCharts.growthChart) mfCharts.growthChart.destroy();
                if (mfCharts.costChart) mfCharts.costChart.destroy();
                if (mfCharts.taxChart) mfCharts.taxChart.destroy();
                mfCharts = null;
            }
            
            const investmentType = document.getElementById('mf-type').value;
            const amount = parseFloat(document.getElementById('mf-amount').value);
            const annualReturn = parseFloat(document.getElementById('mf-rate').value);
            const years = parseFloat(document.getElementById('mf-years').value);
            const expenseRatio = parseFloat(document.getElementById('mf-expense').value);
            const exitLoad = parseFloat(document.getElementById('mf-exit-load').value);
            
            if (!amount || !annualReturn || !years || !expenseRatio || exitLoad === null) {
                alert('Please fill all fields');
                return;
            }
            
            // Calculate gross returns
            let grossMaturityValue, totalInvestment;
            const netAnnualReturn = annualReturn - expenseRatio;
            const netMonthlyRate = netAnnualReturn / 12 / 100;
            const months = years * 12;
            
            if (investmentType === 'sip') {
                totalInvestment = amount * months;
                grossMaturityValue = amount * 
                    (((Math.pow(1 + netMonthlyRate, months) - 1) / netMonthlyRate) * 
                    (1 + netMonthlyRate));
            } else {
                totalInvestment = amount;
                grossMaturityValue = amount * Math.pow(1 + (netAnnualReturn/100), years);
            }
            
            const grossReturns = grossMaturityValue - totalInvestment;
            
            // Calculate expense cost (difference between gross and net)
            const grossWithExpense = investmentType === 'sip' ?
                amount * (((Math.pow(1 + (annualReturn/12/100), months) - 1) / (annualReturn/12/100)) * (1 + (annualReturn/12/100))) :
                amount * Math.pow(1 + (annualReturn/100), years);
            
            const expenseCost = grossWithExpense - grossMaturityValue;
            
            // Exit load (if applicable - assuming redemption within 1 year)
            let exitLoadAmount = 0;
            if (years < 1) {
                exitLoadAmount = grossMaturityValue * (exitLoad / 100);
            }
            
            const netMaturityValue = grossMaturityValue - exitLoadAmount;
            
            // Tax calculation
            const capitalGain = netMaturityValue - totalInvestment;
            let taxAmount = 0;
            const exemptionLimit = 100000; // Rs 1 lakh exempt
            
            if (years >= 1) {
                // Long Term Capital Gains
                const taxableGain = Math.max(0, capitalGain - exemptionLimit);
                taxAmount = taxableGain * 0.10; // 10% tax
            } else {
                // Short Term Capital Gains
                taxAmount = capitalGain * 0.15; // 15% tax
            }
            
            const postTaxAmount = netMaturityValue - taxAmount;
            const netReturns = postTaxAmount - totalInvestment;
            const netCAGR = (Math.pow(postTaxAmount / totalInvestment, 1/years) - 1) * 100;
            
            // Year-wise breakdown
            const yearlyData = [];
            for (let year = 1; year <= years; year++) {
                let yearValue, yearInvested;
                
                if (investmentType === 'sip') {
                    const monthsCompleted = year * 12;
                    yearInvested = amount * monthsCompleted;
                    yearValue = amount * 
                        (((Math.pow(1 + netMonthlyRate, monthsCompleted) - 1) / netMonthlyRate) * 
                        (1 + netMonthlyRate));
                } else {
                    yearInvested = amount;
                    yearValue = amount * Math.pow(1 + (netAnnualReturn/100), year);
                }
                
                yearlyData.push({
                    year: year,
                    invested: yearInvested,
                    value: yearValue,
                    returns: yearValue - yearInvested,
                    expensePaid: yearValue * (expenseRatio/100)
                });
            }
            
            displayMFResults({
                investmentType,
                amount,
                annualReturn,
                years,
                totalInvestment,
                grossMaturityValue,
                grossReturns,
                expenseCost,
                exitLoadAmount,
                netMaturityValue,
                taxAmount,
                postTaxAmount,
                netReturns,
                netCAGR,
                expenseRatio,
                yearlyData
            });
            
            createMFCharts(yearlyData, totalInvestment, grossMaturityValue, expenseCost, taxAmount, postTaxAmount);
            
            lucide.createIcons();
            document.getElementById('resultsCard').style.display = 'block';
            document.getElementById('resultsCard').setAttribute('aria-hidden', 'false');
            document.getElementById('resultsCard').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        
        function displayMFResults(data) {
            const resultsDiv = document.getElementById('mfResults');
            
            resultsDiv.innerHTML = `
                <div class="results-primary-card">
                    <h3 class="results-card-title">Mutual Fund Investment Calculator</h3>
                    <div class="results-summary">
                        <div class="summary-row">
                            <span class="summary-label">Investment Type:</span>
                            <span class="summary-value">${data.investmentType.toUpperCase()}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">${data.investmentType === 'sip' ? 'Monthly' : 'One-time'} Investment:</span>
                            <span class="summary-value">${formatCurrency(data.amount)}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Investment Period:</span>
                            <span class="summary-value">${data.years} Years</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Expected Annual Return:</span>
                            <span class="summary-value">${data.annualReturn}% p.a.</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Expense Ratio:</span>
                            <span class="summary-value">${data.expenseRatio}% p.a.</span>
                        </div>
                    </div>
                    <div class="results-divider"></div>
                    <div class="results-main">
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="wallet"></i></span>
                            <div class="result-content">
                                <span class="result-label">Total Investment</span>
                                <span class="result-value">${formatCurrency(data.totalInvestment)}</span>
                            </div>
                        </div>
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="bar-chart-2"></i></span>
                            <div class="result-content">
                                <span class="result-label">Gross Returns</span>
                                <span class="result-value">${formatCurrency(data.grossReturns)}</span>
                            </div>
                        </div>
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="trending-down"></i></span>
                            <div class="result-content">
                                <span class="result-label">Expense Cost</span>
                                <span class="result-value">-${formatCurrency(data.expenseCost)}</span>
                            </div>
                        </div>
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="trending-up"></i></span>
                            <div class="result-content">
                                <span class="result-label">Net Returns</span>
                                <span class="result-value">${formatCurrency(data.netReturns)}</span>
                            </div>
                        </div>
                        <div class="result-item">
                            <span class="result-icon"><i data-lucide="receipt"></i></span>
                            <div class="result-content">
                                <span class="result-label">Tax on Gains (${data.years >= 1 ? 'LTCG 10%' : 'STCG 15%'})</span>
                                <span class="result-value">-${formatCurrency(data.taxAmount)}</span>
                            </div>
                        </div>
                        <div class="result-item highlight">
                            <span class="result-icon"><i data-lucide="target"></i></span>
                            <div class="result-content">
                                <span class="result-label">Post-Tax Value</span>
                                <span class="result-value">${formatCurrency(data.postTaxAmount)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="results-divider"></div>
                    <div class="results-metrics">
                        <div class="metric-item">
                            <span class="metric-label">Absolute Returns:</span>
                            <span class="metric-value">${((data.netReturns / data.totalInvestment) * 100).toFixed(2)}%</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">Net CAGR:</span>
                            <span class="metric-value">${data.netCAGR.toFixed(2)}%</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">Gross CAGR:</span>
                            <span class="metric-value">${data.annualReturn.toFixed(2)}%</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-label">Total Costs:</span>
                            <span class="metric-value">${formatCurrency(data.expenseCost + data.taxAmount)}</span>
                        </div>
                    </div>
                </div>
                
                <div class="visualizations-section">
                    <h3 class="visualizations-title">Visualizations</h3>
                    <div class="chart-container-full">
                        <h4 class="chart-title">Growth Projection Chart</h4>
                        <div id="mfGrowthChart"></div>
                    </div>
                    <div class="charts-grid">
                        <div class="chart-container">
                            <h4 class="chart-title">Cost Breakdown</h4>
                            <div id="mfCostChart"></div>
                        </div>
                        <div class="chart-container">
                            <h4 class="chart-title">Tax Comparison</h4>
                            <div id="mfTaxChart"></div>
                        </div>
                    </div>
                </div>
                
                <div class="yearly-breakdown-table-container">
                    <h4 class="breakdown-table-title">Year-wise Performance</h4>
                    <div class="table-wrapper">
                        <table class="yearly-breakdown-table">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Invested</th>
                                    <th>Gross Value</th>
                                    <th>Expense Paid</th>
                                    <th>Net Value</th>
                                    <th>Returns</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${data.yearlyData.map(d => `
                                    <tr>
                                        <td>${d.year}</td>
                                        <td>${formatCurrency(d.invested)}</td>
                                        <td>${formatCurrency(d.value + d.expensePaid)}</td>
                                        <td>${formatCurrency(d.expensePaid)}</td>
                                        <td>${formatCurrency(d.value)}</td>
                                        <td><strong>${formatCurrency(d.returns)}</strong></td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
        }
        
        function createMFCharts(yearlyData, totalInvestment, grossValue, expenseCost, taxAmount, postTaxAmount) {
            setTimeout(() => {
                // Growth Chart
                const growthChart = new ApexCharts(document.querySelector('#mfGrowthChart'), {
                    series: [
                        {
                            name: 'Invested Amount',
                            type: 'area',
                            data: yearlyData.map(d => d.invested)
                        },
                        {
                            name: 'Gross Returns',
                            type: 'area',
                            data: yearlyData.map(d => d.returns)
                        },
                        {
                            name: 'Net Value',
                            type: 'line',
                            data: yearlyData.map(d => d.value)
                        }
                    ],
                    chart: {
                        height: 400,
                        type: 'line',
                        toolbar: { show: true }
                    },
                    colors: ['#3B82F6', '#10B981', '#6366F1'],
                    stroke: {
                        curve: 'smooth',
                        width: [0, 0, 3]
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            opacityFrom: 0.3,
                            opacityTo: 0.1
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
                growthChart.render();
                
                // Cost Breakdown Donut
                const costChart = new ApexCharts(document.querySelector('#mfCostChart'), {
                    series: [totalInvestment, expenseCost, taxAmount],
                    chart: {
                        type: 'donut',
                        height: 350
                    },
                    labels: ['Net Investment', 'Expense Cost', 'Tax'],
                    colors: ['#3B82F6', '#EF4444', '#F59E0B'],
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                labels: {
                                    show: true,
                                    total: {
                                        show: true,
                                        label: 'Post-Tax Value',
                                        formatter: function() {
                                            return formatCurrency(postTaxAmount);
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
                costChart.render();
                
                // Tax Comparison
                const taxChart = new ApexCharts(document.querySelector('#mfTaxChart'), {
                    series: [
                        {
                            name: 'LTCG (>1 year)',
                            data: [totalInvestment, grossValue - totalInvestment - 100000, 100000, (grossValue - totalInvestment - 100000) * 0.10]
                        },
                        {
                            name: 'STCG (<1 year)',
                            data: [totalInvestment, grossValue - totalInvestment, 0, (grossValue - totalInvestment) * 0.15]
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 350,
                        stacked: true
                    },
                    colors: ['#3B82F6', '#10B981', '#FFD700', '#EF4444'],
                    xaxis: {
                        categories: ['Principal', 'Taxable Gain', 'Exemption', 'Tax']
                    },
                    yaxis: {
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
                taxChart.render();
                
                mfCharts = { growthChart, costChart, taxChart };
            }, 100);
        }
        
        function resetCalculator() {
            document.getElementById('calculatorForm').reset();
            document.getElementById('resultsCard').style.display = 'none';
            document.getElementById('resultsCard').setAttribute('aria-hidden', 'true');
            if (mfCharts) {
                if (mfCharts.growthChart) mfCharts.growthChart.destroy();
                if (mfCharts.costChart) mfCharts.costChart.destroy();
                if (mfCharts.taxChart) mfCharts.taxChart.destroy();
                mfCharts = null;
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

