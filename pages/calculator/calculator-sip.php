<?php
/**
 * SIP Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'SIP Calculator - Gretex Financial';
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


    
    <!-- Navigation -->

    <!-- Calculator Page Content -->
    <main class="calculator-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link">
                        <i data-lucide="arrow-left"></i>
                        <span>Back to Calculators</span>
                    </a>
                    <h1 class="calculator-page-title">SIP Calculator</h1>
                    <p class="calculator-page-description">Calculate how much you need to save or how much you will accumulate with your Systematic Investment Plan</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <!-- Sidebar: Calculator Navigation -->
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <!-- Left Section: Calculator Information -->
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About SIP Calculator</h2>
                            <div class="calculator-info-content">
                                <p>A Systematic Investment Plan (SIP) is an investment strategy where you invest a fixed amount regularly in mutual funds. This calculator helps you understand how your SIP investments can grow over time.</p>
                                
                                <h3>How SIP Works</h3>
                                <ul>
                                    <li><strong>Regular Investment:</strong> You invest a fixed amount every month</li>
                                    <li><strong>Power of Compounding:</strong> Your returns generate more returns over time</li>
                                    <li><strong>Rupee Cost Averaging:</strong> You buy more units when prices are low and fewer when prices are high</li>
                                    <li><strong>Disciplined Saving:</strong> Helps build a habit of regular investing</li>
                                </ul>
                                
                                <h3>Benefits of SIP</h3>
                                <ul>
                                    <li>Start with as little as &#8377;500 per month</li>
                                    <li>No need to time the market</li>
                                    <li>Reduces the impact of market volatility</li>
                                    <li>Flexible - increase, decrease, or pause anytime</li>
                                    <li>Long-term wealth creation through compounding</li>
                                </ul>
                                
                                <h3>Algorithm & Formula</h3>
                                <div class="formula-box">FV = P � ({[1 + r]^n - 1} / r) � (1 + r)<br>Where: P = Monthly amount, r = Monthly return rate, n = Months</div>
                                
                                <h3>Who Should Use?</h3>
                                <p>Long-term investors, salaried individuals, and first-time mutual fund investors seeking disciplined wealth creation through regular investments.</p>
                                
                                <h3>Key Factors</h3>
                                <p><strong>Monthly SIP Amount:</strong> The fixed amount you invest every month (&#8377;500 - &#8377;1,00,000)</p>
                                <p><strong>Expected Return:</strong> The annualized return you expect (typically 10-15% for equity funds)</p>
                                <p><strong>Investment Period:</strong> Duration for which you plan to invest (1-40 years)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section: Calculator Form -->
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Your SIP</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calculateSIPResult(event)">
                                <div class="calculator-field">
                                    <label for="sip-amount">Monthly SIP Amount (&#8377;)</label>
                                    <input type="number" id="sip-amount" placeholder="5000" required min="500" max="10000000" step="500" value="5000">
                                    <small class="field-hint">Min: &#8377;500 | Max: &#8377;1,00,00,000</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="sip-rate">Expected Annual Return Rate (%)</label>
                                    <input type="number" id="sip-rate" placeholder="12" required min="1" max="30" step="0.5" value="12">
                                    <small class="field-hint">Range: 1% to 30% | Typical: 10-15% for equity funds</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="sip-years">Investment Period (Years)</label>
                                    <input type="number" id="sip-years" placeholder="10" required min="1" max="40" step="1" value="10">
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
                        <h2 class="calculator-section-title">SIP Calculation Results</h2>
                        
                        <!-- Primary Results Card -->
                        <div class="results-primary-card" id="primaryResults"></div>
                        
                        <!-- Visualizations -->
                        <div class="visualizations-section">
                            <h3 class="visualizations-title">Visualizations</h3>
                            
                            <!-- Growth Chart -->
                            <div class="chart-container-full">
                                <h4 class="chart-title">Growth Projection Chart</h4>
                                <div id="sipGrowthChart"></div>
                            </div>
                            
                            <div class="charts-grid">
                                <!-- Donut Chart -->
                                <div class="chart-container">
                                    <h4 class="chart-title">Investment Breakdown</h4>
                                    <div id="sipDonutChart"></div>
                                </div>
                                
                                <!-- Bar Chart -->
                                <div class="chart-container">
                                    <h4 class="chart-title">Monthly Accumulation</h4>
                                    <div id="sipBarChart"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Year-wise Breakdown Table -->
                        <div id="yearlyBreakdownSection"></div>
                        
                        <!-- Additional Metrics -->
                        <div class="results-breakdown-card" id="additionalMetrics"></div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- Footer -->

    <script src="../../js/gretex-financial.js"></script>
    <script>
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        let sipCharts = null;

        // Local formatCurrency function (fallback if global not available)
        function formatCurrencyLocal(num) {
            if (num === null || num === undefined || isNaN(num)) return '₹0';
            if (typeof formatCurrency === 'function') {
                return formatCurrency(num);
            }
            return '₹' + num.toLocaleString('en-IN', { maximumFractionDigits: 2 });
        }

        // Calculate SIP results with detailed breakdown
        function calculateSIPDetailed(monthlyInvestment, annualRate, years) {
            const monthlyRate = annualRate / 12 / 100;
            const totalMonths = years * 12;
            
            // Future Value of SIP
            const futureValue = monthlyInvestment * 
                (((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * 
                (1 + monthlyRate));
            
            // Total investment
            const totalInvestment = monthlyInvestment * totalMonths;
            
            // Total returns
            const totalReturns = futureValue - totalInvestment;
            
            // Return percentage
            const returnPercentage = (totalReturns / totalInvestment) * 100;
            
            // Additional metrics
            const effectiveAnnualReturn = annualRate;
            const wealthMultiplier = futureValue / totalInvestment;
            const investmentToReturnsRatio = totalReturns / totalInvestment;
            const avgMonthlyReturn = totalReturns / totalMonths;
            
            // Year-wise breakdown
            const yearlyData = [];
            for (let year = 1; year <= years; year++) {
                const months = year * 12;
                const invested = monthlyInvestment * months;
                const value = monthlyInvestment * 
                    (((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * 
                    (1 + monthlyRate));
                const returns = value - invested;
                
                // Calculate year-on-year growth
                let yoyGrowth = '-';
                if (year > 1) {
                    const prevValue = yearlyData[year - 2].value;
                    yoyGrowth = ((value - prevValue) / prevValue * 100).toFixed(2) + '%';
                }
                
                yearlyData.push({
                    year: year,
                    invested: invested,
                    value: value,
                    returns: returns,
                    yoyGrowth: yoyGrowth
                });
            }
            
            return {
                monthlyInvestment,
                annualRate,
                years,
                totalMonths,
                totalInvestment,
                futureValue,
                totalReturns,
                returnPercentage,
                effectiveAnnualReturn,
                wealthMultiplier,
                investmentToReturnsRatio,
                avgMonthlyReturn,
                yearlyData
            };
        }

        // Generate year-wise breakdown table HTML
        function generateYearlyBreakdownTable(yearlyData) {
            let html = `
                <div class="yearly-breakdown-table-container">
                    <h4 class="breakdown-table-title">Year-wise Breakdown</h4>
                    <div class="table-wrapper">
                        <table class="yearly-breakdown-table">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Invested Amount</th>
                                    <th>Interest Earned</th>
                                    <th>Total Value</th>
                                    <th>Year-on-Year Growth</th>
                                </tr>
                            </thead>
                            <tbody>
            `;
            
            yearlyData.forEach(data => {
                html += `
                    <tr>
                        <td>${data.year}</td>
                        <td>${formatCurrencyLocal(data.invested)}</td>
                        <td>${formatCurrencyLocal(data.returns)}</td>
                        <td><strong>${formatCurrencyLocal(data.value)}</strong></td>
                        <td>${data.yoyGrowth}</td>
                    </tr>
                `;
            });
            
            html += `
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
            
            return html;
        }

        // Initialize ApexCharts for SIP calculator
        function initializeSIPCharts(data) {
            const charts = {};
            
            // Wait for DOM elements to be ready
            setTimeout(() => {
                // Chart 1: Growth Chart (Line + Area Chart)
                const growthChartEl = document.getElementById('sipGrowthChart');
                if (growthChartEl && typeof ApexCharts !== 'undefined') {
                    charts.growthChart = new ApexCharts(growthChartEl, {
                        series: [{
                            name: 'Investment Value',
                            data: data.yearlyData.map(d => parseFloat(d.value.toFixed(2)))
                        }],
                        chart: {
                            type: 'area',
                            height: 300,
                            toolbar: { show: false }
                        },
                        colors: ['#1873E0'],
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.7,
                                opacityTo: 0.3
                            }
                        },
                        xaxis: {
                            categories: data.yearlyData.map(d => `Year ${d.year}`)
                        },
                        yaxis: {
                            labels: {
                                formatter: function(val) {
                                    return '₹' + (val / 100000).toFixed(1) + 'L';
                                }
                            }
                        }
                    });
                    charts.growthChart.render();
                }

                // Chart 2: Donut Chart (Investment vs Returns)
                const donutChartEl = document.getElementById('sipDonutChart');
                if (donutChartEl && typeof ApexCharts !== 'undefined') {
                    charts.donutChart = new ApexCharts(donutChartEl, {
                        series: [data.totalInvestment, data.totalReturns],
                        chart: {
                            type: 'donut',
                            height: 300
                        },
                        labels: ['Total Investment', 'Returns'],
                        colors: ['#1873E0', '#00A855'],
                        legend: {
                            position: 'bottom'
                        }
                    });
                    charts.donutChart.render();
                }

                // Chart 3: Bar Chart (Yearly Returns)
                const barChartEl = document.getElementById('sipBarChart');
                if (barChartEl && typeof ApexCharts !== 'undefined') {
                    charts.barChart = new ApexCharts(barChartEl, {
                        series: [{
                            name: 'Returns',
                            data: data.yearlyData.map(d => parseFloat(d.returns.toFixed(2)))
                        }],
                        chart: {
                            type: 'bar',
                            height: 300,
                            toolbar: { show: false }
                        },
                        colors: ['#00A855'],
                        xaxis: {
                            categories: data.yearlyData.map(d => `Year ${d.year}`)
                        },
                        yaxis: {
                            labels: {
                                formatter: function(val) {
                                    return '\u20B9' + (val / 1000).toFixed(0) + 'K';
                                }
                            }
                        }
                    });
                    charts.barChart.render();
                }
            }, 100);
            
            return charts;
        }

        // Enhanced SIP Calculator
        function calculateSIPResult(event) {
            event.preventDefault();
            
            // Reset previous reading first - clear results and destroy charts before calculating
            const primaryResults = document.getElementById('primaryResults');
            const yearlyBreakdownSection = document.getElementById('yearlyBreakdownSection');
            const additionalMetrics = document.getElementById('additionalMetrics');
            if (primaryResults) primaryResults.innerHTML = '';
            if (yearlyBreakdownSection) yearlyBreakdownSection.innerHTML = '';
            if (additionalMetrics) additionalMetrics.innerHTML = '';
            if (sipCharts) {
                if (sipCharts.growthChart) { sipCharts.growthChart.destroy(); sipCharts.growthChart = null; }
                if (sipCharts.donutChart) { sipCharts.donutChart.destroy(); sipCharts.donutChart = null; }
                if (sipCharts.barChart) { sipCharts.barChart.destroy(); sipCharts.barChart = null; }
                sipCharts = null;
            }
            // Clear chart container divs to prevent overlapping - ApexCharts can leave DOM behind
            const sipGrowthChartEl = document.getElementById('sipGrowthChart');
            const sipDonutChartEl = document.getElementById('sipDonutChart');
            const sipBarChartEl = document.getElementById('sipBarChart');
            if (sipGrowthChartEl) sipGrowthChartEl.innerHTML = '';
            if (sipDonutChartEl) sipDonutChartEl.innerHTML = '';
            if (sipBarChartEl) sipBarChartEl.innerHTML = '';
            
            const amount = parseFloat(document.getElementById('sip-amount').value);
            const rate = parseFloat(document.getElementById('sip-rate').value);
            const years = parseFloat(document.getElementById('sip-years').value);
            
            if (!amount || !rate || !years) {
                alert('Please fill all fields');
                return;
            }
            
            // Calculate detailed results
            try {
                const data = calculateSIPDetailed(amount, rate, years);
                
                if (!data) {
                    console.error('Calculation returned no data');
                    alert('Error calculating results. Please try again.');
                    return;
                }
                
                // Display primary results
                displayPrimaryResults(data);
                
                // Display year-wise breakdown
                displayYearlyBreakdown(data);
                
                // Display additional metrics
                displayAdditionalMetrics(data);
                
                // Initialize charts (previous charts already destroyed at start)
                sipCharts = initializeSIPCharts(data);
                
                // Show results card
                const resultsCard = document.getElementById('resultsCard');
                if (resultsCard) {
                    lucide.createIcons();
                    resultsCard.style.display = 'block';
                    resultsCard.style.visibility = 'visible';
                    resultsCard.setAttribute('aria-hidden', 'false');
                    // Force display with !important via style
                    resultsCard.setAttribute('style', 'display: block !important; visibility: visible !important;');
                    setTimeout(() => {
                        resultsCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 100);
                } else {
                    console.error('Results card element not found');
                }
            } catch (error) {
                console.error('Error in calculateSIPResult:', error);
                alert('An error occurred while calculating. Please check the console for details.');
            }
        }
        
        function displayPrimaryResults(data) {
            const primaryResults = document.getElementById('primaryResults');
            if (!primaryResults) {
                console.error('primaryResults element not found');
                return;
            }
            if (!data) {
                console.error('No data provided to displayPrimaryResults');
                return;
            }
            primaryResults.innerHTML = `
                <h3 class="results-card-title">SIP Calculation Results</h3>
                <div class="results-summary">
                    <div class="summary-row">
                        <span class="summary-label">Monthly Investment:</span>
                        <span class="summary-value">${formatCurrencyLocal(data.monthlyInvestment)}</span>
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
                            <span class="result-label">Total Investment</span>
                            <span class="result-value">${formatCurrencyLocal(data.totalInvestment)}</span>
                        </div>
                    </div>
                    <div class="result-item">
                        <span class="result-icon"><i data-lucide="trending-up"></i></span>
                        <div class="result-content">
                            <span class="result-label">Estimated Returns</span>
                            <span class="result-value">${formatCurrencyLocal(data.totalReturns)}</span>
                        </div>
                    </div>
                    <div class="result-item highlight">
                        <span class="result-icon"><i data-lucide="target"></i></span>
                        <div class="result-content">
                            <span class="result-label">Maturity Value</span>
                            <span class="result-value">${formatCurrencyLocal(data.futureValue)}</span>
                        </div>
                    </div>
                </div>
                <div class="results-divider"></div>
                <div class="results-metrics">
                    <div class="metric-item">
                        <span class="metric-label">Return on Investment:</span>
                        <span class="metric-value">${data.returnPercentage.toFixed(2)}%</span>
                    </div>
                    <div class="metric-item">
                        <span class="metric-label">Effective Annual Return:</span>
                        <span class="metric-value">${data.effectiveAnnualReturn.toFixed(2)}%</span>
                    </div>
                    <div class="metric-item">
                        <span class="metric-label">Wealth Multiplier:</span>
                        <span class="metric-value">${data.wealthMultiplier.toFixed(2)}x</span>
                    </div>
                    <div class="metric-item">
                        <span class="metric-label">Investment to Returns Ratio:</span>
                        <span class="metric-value">1:${data.investmentToReturnsRatio.toFixed(2)}</span>
                    </div>
                </div>
            `;
        }
        
        function displayYearlyBreakdown(data) {
            const breakdownSection = document.getElementById('yearlyBreakdownSection');
            if (!breakdownSection) {
                console.error('yearlyBreakdownSection element not found');
                return;
            }
            if (!data || !data.yearlyData) {
                console.error('No yearlyData provided');
                return;
            }
            breakdownSection.innerHTML = generateYearlyBreakdownTable(data.yearlyData);
        }
        
        function displayAdditionalMetrics(data) {
            const additionalMetrics = document.getElementById('additionalMetrics');
            if (!additionalMetrics) {
                console.error('additionalMetrics element not found');
                return;
            }
            if (!data) {
                console.error('No data provided to displayAdditionalMetrics');
                return;
            }
            additionalMetrics.innerHTML = `
                <h4 class="breakdown-title">Additional Metrics</h4>
                <div class="breakdown-grid">
                    <div class="breakdown-item">
                        <span class="breakdown-label">Monthly Contribution:</span>
                        <span class="breakdown-value">${formatCurrencyLocal(data.monthlyInvestment)}</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">Total Months:</span>
                        <span class="breakdown-value">${data.totalMonths}</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">Average Monthly Return:</span>
                        <span class="breakdown-value">${formatCurrencyLocal(data.avgMonthlyReturn)}</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">Compounding Benefit:</span>
                        <span class="breakdown-value">${formatCurrencyLocal(data.totalReturns)}</span>
                    </div>
                </div>
            `;
        }
        
        function resetCalculator() {
            document.getElementById('calculatorForm').reset();
            document.getElementById('resultsCard').style.display = 'none';
            document.getElementById('resultsCard').setAttribute('aria-hidden', 'true');
            if (sipCharts) {
                if (sipCharts.growthChart) sipCharts.growthChart.destroy();
                if (sipCharts.donutChart) sipCharts.donutChart.destroy();
                if (sipCharts.barChart) sipCharts.barChart.destroy();
                sipCharts = null;
            }
        }
    </script>


<?php
// Include footer
require_once '../../includes/footer.php';
?>

