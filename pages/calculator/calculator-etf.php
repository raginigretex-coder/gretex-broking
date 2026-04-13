<?php
/**
 * ETF Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'ETF Calculator - Gretex Financial';
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



    <main class="calculator-page investment-modern-calc-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link"><i data-lucide="arrow-left"></i><span>Back to Calculators</span></a>
                    <h1 class="calculator-page-title">ETF Calculator</h1>
                    <p class="calculator-page-description">Exchange Traded Fund - Index investing with low expense ratios</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc investment-modern-calc--etf" aria-label="ETF calculator">
                    <div class="investment-tabs" role="tablist" aria-label="Investment type">
                        <button type="button" class="investment-tab is-active" data-mode="sip" aria-selected="true">SIP</button>
                        <button type="button" class="investment-tab" data-mode="lumpsum" aria-selected="false">Lumpsum</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="Inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" id="etfAmountLabel" for="etfAmountRange">Monthly investment (&#8377;)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="etfAmountErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">&#8377;</span>
                                            <input type="text" class="pill-input" id="etfAmountInput" value="5000" inputmode="numeric" aria-label="ETF investment amount" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="etfAmountRange" min="100" max="10000000" step="100" value="5000" aria-labelledby="etfAmountLabel" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="etfRateRange">Expected return rate (p.a)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="etfRateErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="etfRateInput" min="1" max="30" step="0.1" value="12" inputmode="decimal" aria-label="ETF expected return rate" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="etfRateRange" min="1" max="30" step="0.1" value="12" aria-label="ETF expected return rate slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="etfYearsRange">Time period</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="etfYearsErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="etfYearsInput" min="1" max="40" step="1" value="10" inputmode="numeric" aria-label="ETF time period years" />
                                            <span class="pill-unit">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="etfYearsRange" min="1" max="40" step="1" value="10" aria-label="ETF time period slider" />
                            </div>
                        </div>

                        <div class="investment-visual" aria-label="Visualization">
                            <div class="investment-donut-card">
                                <div class="investment-graph-quickbar" aria-hidden="false">
                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-invested"></span>
                                            <span class="quickbar-label">Invested amount</span>
                                        </div>
                                        <div class="quickbar-value" id="etfSummaryInvested">&#8377;0</div>
                                    </div>

                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-returns"></span>
                                            <span class="quickbar-label">Est. returns</span>
                                        </div>
                                        <div class="quickbar-value quickbar-returns-value" id="etfSummaryReturns">&#8377;0</div>
                                    </div>

                                    <div class="quickbar-total">
                                        <div class="quickbar-total-label">Total value</div>
                                        <div class="quickbar-total-value" id="etfSummaryTotal">&#8377;0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-wrap">
                                    <div id="etfDonutChart"></div>
                                    <div class="investment-donut-center">
                                        <div class="investment-donut-center-label">Maturity Value</div>
                                        <div class="investment-donut-center-value" id="etfDonutCenterValue">&#8377;0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-legend" aria-hidden="true">
                                    <div class="legend-item">
                                        <span class="legend-dot legend-returns"></span>
                                        <span>Returns</span>
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-dot legend-invested"></span>
                                        <span>Total Investment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="investment-summary-cta">
                        <button type="button" class="investment-cta" id="etfInvestNowBtn">INVEST NOW</button>
                    </div>
                </section>

                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                          <h3 class="calculator-info-title">ETF Calculator (Exchange-Traded Fund)</h3>
                            <div class="calculator-info-content">
                                <p>Exchange-Traded Funds (ETFs) are investment instruments that provide exposure to a basket of securities such as equities, bonds, or commodities. ETFs are traded on stock exchanges similar to individual stocks and typically track an index, sector, or asset class.</p>
                                <p>An ETF Calculator is a financial tool used to estimate the potential growth of investments made in ETFs over a specified period.</p>
                            </div>

                            <h3 class="calculator-info-title">What is an ETF Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>An ETF Calculator is an online utility that helps investors estimate the future value of their ETF investments.</p>
                                <p>By entering:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Investment amount (lumpsum or SIP)</li>
                                    <li>Expected rate of return</li>
                                    <li>Investment duration</li>
                                </ul>
                                <p>the calculator computes:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Estimated investment value over time</li>
                                    <li>Total returns generated</li>
                                </ul>
                                <p>The results are indicative and depend on assumptions related to returns and investment horizon.</p>
                            </div>


                             <h3 class="calculator-info-title">What are ETFs?</h3>
                                <div class="calculator-info-content">
                                    <p>ETFs are pooled investment vehicles that hold a diversified portfolio of assets. They are designed to track the performance of an underlying index, commodity, or sector.</p>
                                    <p>Key characteristics include:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Traded on stock exchanges like equities</li>
                                        <li>Provide diversification through a single instrument</li>
                                        <li>Prices fluctuate based on underlying asset values</li>
                                        <li>Can be bought and sold during market hours</li>
                                       
                                    </ul>
                                    
                                </div>
                            
                            <h3 class="calculator-info-title">Purpose and Use of an ETF Calculator</h3>
                                <div class="calculator-info-content">
                                    <p>The ETF calculator assists investors in evaluating the growth potential of their investments.</p>
                                    <p>It can be used to:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Estimate long-term investment growth</li>
                                        <li>Compare different return assumptions</li>
                                        <li>Plan investments for financial goals</li>
                                        <li>Evaluate lump sum and SIP-based ETF investments</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">How Does an ETF Calculator Work?</h3>
                                <div class="calculator-info-content">
                                    <p>An ETF calculator uses the concept of compound growth to project returns over time.</p>
                                    <p><strong style="margin-left: 10px;"> 1. Lump Sum Investment</strong></p>
                                    <p>For one-time investments, the future value is calculated as:</p>
                                    <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                        FV = P (1 + r)<sup>n</sup>
                                    </p>
                                    <p>Where:</p>
                                    <ul style="margin-left: 14px;">
                                        <li><strong>FV</strong> = Future value</li>
                                        <li><strong>P</strong> = Initial investment</li>
                                        <li><strong>r</strong> = Expected annual return</li>
                                        <li><strong>n</strong> = Investment duration</li>
                                    </ul>
                                    <p><strong style="margin-left: 10px;">2. SIP Investment</strong></p>
                                    <p>For periodic investments, the future value is calculated as:</p>
                                    <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                         FV = P × 
                                        <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                            <span style="display:block; border-bottom:2px solid #000; padding:0 6px;">
                                            (1 + r)<sup>n</sup> − 1
                                            </span>
                                            <span style="display:block; font-size:14px;">r</span>
                                        </span>
                                        × (1 + r)
                                    </p>
                                    <p>Where:</p>
                                    <ul style="margin-left: 14px;">
                                        <li><strong>FV</strong> = Future value</li>
                                        <li><strong>P</strong> = Periodic investment</li>
                                        <li><strong>r</strong> = Rate of return</li>
                                        <li><strong>n</strong> = Number of contributions</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">Illustrative Example</h3>
                                <div class="calculator-info-content">
                                    <h3 >Lump Sum Example</h3>
                                    <ul style="margin-left: 14px;">
                                        <li>Investment: ₹10,000</li>
                                        <li>Duration: 10 years</li>
                                        <li>Expected return: 7%</li>
                                        
                                    </ul>
                                    <p>Estimated maturity value:</p>
                                    <p><strong style="margin-left: 10px;">₹19,672 (approx.)</strong></p>

                                    <h3 >SIP Example</h3>
                                    <ul style="margin-left: 14px;">
                                        <li>Monthly investment: ₹5,000</li>
                                        <li>Duration: 5 years</li>
                                        <li>Expected return: 8%</li>
                                        
                                    </ul>
                                    <p>The calculator estimates:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Total invested amount</li>
                                        <li>Returns generated</li>
                                        <li>Final investment value</li>
                                        
                                    </ul>
                                    
                                </div>

                            <h3 class="calculator-info-title">How to Use the ETF Calculator?</h3>
                                <div class="calculator-info-content">
                                    <p>To calculate ETF returns:</p>
                                    <ol>
                                        <li>Select investment type (lump sum or SIP)</li>
                                        <li>Enter the investment amount</li>
                                        <li>Input the expected rate of return</li>
                                        <li>Specify the investment duration</li>
                                        <li>The calculator will display:
                                            <ul>
                                                <li>Total investment</li>
                                                <li>Estimated returns</li>
                                                <li>Projected value</li>
                                            </ul>
                                        </li>
                                    </ol>
                                </div>

                            <h3 class="calculator-info-title">How the Calculator Assists Investors?</h3>
                                <div class="calculator-info-content">
                                    <ul style="margin-left: 14px;">
                                        <li>Provides a structured estimate of investment growth</li>
                                        <li>Helps compare different ETFs and return scenarios</li>
                                        <li>Supports goal-based investment planning</li>
                                        <li>Simplifies complex calculations</li>
                                    </ul>
                                </div>

                             <h3 class="calculator-info-title">Factors Affecting ETF Returns</h3>
                                <div class="calculator-info-content">
                                    <p>ETF returns depend on several factors, including:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Performance of underlying assets</li>
                                        <li>Tracking error relative to the benchmark</li>
                                        <li>Expense ratios and fees</li>
                                        <li>Market conditions and volatility</li>
                                        <li>Premium or discount to Net Asset Value (NAV)</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">Key Considerations</h3>
                                <div class="calculator-info-content">
                                    <ul style="margin-left: 14px;">
                                        <li>ETF returns are market-linked and not guaranteed</li>
                                        <li>Prices may deviate from underlying NAV</li>
                                        <li>Taxation depends on holding period and asset type</li>
                                        <li>The calculator provides indicative values and does not account for:
                                            <ul style="margin-left: 14px;">
                                                <li>Brokerage</li>
                                                <li>Taxes</li>
                                                <li>Expense ratios</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">FAQs</h3>
                                <div class="stepup-faq-accordion" aria-label="ETF calculator frequently asked questions">
                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                        <span class="stepup-faq-question">What is an ETF?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                        An ETF is a market-traded investment fund that tracks an index, commodity, or asset basket.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                        <span class="stepup-faq-question">Is an ETF calculator accurate?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                        It provides estimates based on assumed inputs. Actual returns may vary.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                        <span class="stepup-faq-question">Can ETFs be invested through SIP?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                        Yes, many platforms allow SIP-based ETF investing.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                        <span class="stepup-faq-question">What affects ETF returns?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                        Returns depend on underlying asset performance, fees, and market conditions.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                        <span class="stepup-faq-question">Does the calculator include charges and taxes?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                        No, it provides pre-cost and pre-tax estimates.
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script src="../../js/calculator-functions.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        (function initEtfModernCalc() {
            const root = document.querySelector('.investment-modern-calc--etf');
            if (!root) return;

            const LIMITS = {
                sip: { min: 100, max: 1000000, step: 100, defaultVal: 5000 },
                lumpsum: { min: 500, max: 10000000, step: 500, defaultVal: 25000 }
            };

            const tabs = root.querySelectorAll('.investment-tab[data-mode]');
            const amountLabel = document.getElementById('etfAmountLabel');
            const amountRange = document.getElementById('etfAmountRange');
            const amountInput = document.getElementById('etfAmountInput');
            const amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
            const rateRange = document.getElementById('etfRateRange');
            const rateInput = document.getElementById('etfRateInput');
            const rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;
            const yearsRange = document.getElementById('etfYearsRange');
            const yearsInput = document.getElementById('etfYearsInput');
            const yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;
            const summaryInvested = document.getElementById('etfSummaryInvested');
            const summaryReturns = document.getElementById('etfSummaryReturns');
            const summaryTotal = document.getElementById('etfSummaryTotal');
            const donutCenterValue = document.getElementById('etfDonutCenterValue');
            const investNowBtn = document.getElementById('etfInvestNowBtn');

            const MIN_RATE = 1;
            const MAX_RATE = 30;
            const MIN_YEARS = 1;
            const MAX_YEARS = 40;

            let activeMode = 'sip';
            let donutChart = null;
            let lastSipAmount = LIMITS.sip.defaultVal;
            let lastLumpsumAmount = LIMITS.lumpsum.defaultVal;

            function clamp(n, min, max) {
                if (!isFinite(n)) return min;
                return Math.min(max, Math.max(min, n));
            }

            function formatINR0(num) {
                const n = Number(num);
                if (!isFinite(n)) return '₹0';
                return '₹' + Math.round(n).toLocaleString('en-IN');
            }

            function formatINRDigits(n) {
                const x = Number(n);
                if (!isFinite(x)) return '0';
                return Math.round(x).toLocaleString('en-IN');
            }

            function setFieldError(field, on) {
                if (field) field.classList.toggle('is-error', !!on);
            }

            function setRangeFill(rangeEl, value) {
                const min = Number(rangeEl.min);
                const max = Number(rangeEl.max);
                const percent = ((value - min) / (max - min)) * 100;
                rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
            }

            function getAmountLimits() {
                return LIMITS[activeMode];
            }

            function computeLumpsum(amount, rate, years) {
                const totalValue = amount * Math.pow(1 + rate / 100, years);
                const invested = amount;
                return { invested: invested, returns: totalValue - invested, totalValue: totalValue };
            }

            function computeSIP(monthlyAmount, rate, years) {
                const monthlyRate = Math.pow(1 + (rate / 100), 1 / 12) - 1;
                const totalMonths = years * 12;
                const totalValue = monthlyRate === 0
                    ? monthlyAmount * totalMonths
                    : monthlyAmount * ((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * (1 + monthlyRate);
                const invested = monthlyAmount * totalMonths;
                return { invested: invested, returns: totalValue - invested, totalValue: totalValue };
            }

            function computeActive() {
                const amount = Number(amountRange.value);
                const rate = Number(rateRange.value);
                const years = Number(yearsRange.value);
                return activeMode === 'sip' ? computeSIP(amount, rate, years) : computeLumpsum(amount, rate, years);
            }

            function ensureDonutChart() {
                if (donutChart || typeof ApexCharts === 'undefined') return;
                const donutEl = document.getElementById('etfDonutChart');
                if (!donutEl) return;

                const data = computeActive();
                donutChart = new ApexCharts(donutEl, {
                    series: [Math.max(0, data.invested), Math.max(0, data.returns)],
                    chart: {
                        type: 'donut',
                        height: 285,
                        animations: { enabled: true, easing: 'easeinout', speed: 450 }
                    },
                    labels: ['Invested amount', 'Est. returns'],
                    colors: ['#F97316', '#3B6DFF'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return formatINR0(val);
                            }
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '84%',
                                labels: { show: false }
                            }
                        }
                    }
                });

                donutChart.render();
            }

            function updateDonutChart(invested, returns, animate) {
                if (typeof ApexCharts === 'undefined') return;
                if (!donutChart) ensureDonutChart();
                if (!donutChart) return;
                donutChart.updateSeries([Math.max(0, invested), Math.max(0, returns)], !!animate);
            }

            function updateSummaryUI(animate) {
                const data = computeActive();
                if (summaryInvested) summaryInvested.textContent = formatINR0(data.invested);
                if (summaryReturns) summaryReturns.textContent = formatINR0(data.returns);
                if (summaryTotal) summaryTotal.textContent = formatINR0(data.totalValue);
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(data.totalValue);
                updateDonutChart(data.invested, data.returns, animate !== false);
            }

            function setMode(mode) {
                activeMode = mode === 'sip' ? 'sip' : 'lumpsum';

                if (amountLabel) {
                    amountLabel.textContent = activeMode === 'sip' ? 'Monthly investment (₹)' : 'Total investment (₹)';
                }

                tabs.forEach(function(btn) {
                    const isActive = btn.getAttribute('data-mode') === activeMode;
                    btn.classList.toggle('is-active', isActive);
                    btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
                });

                const limits = getAmountLimits();
                const lastValue = activeMode === 'sip' ? lastSipAmount : lastLumpsumAmount;
                const value = clamp(Math.round(lastValue / limits.step) * limits.step, limits.min, limits.max);
                amountRange.min = String(limits.min);
                amountRange.max = String(limits.max);
                amountRange.step = String(limits.step);
                amountRange.value = String(value);
                amountInput.value = formatINRDigits(value);
                setRangeFill(amountRange, value);
                updateSummaryUI(true);
            }

            amountRange.addEventListener('input', function() {
                const limits = getAmountLimits();
                const value = clamp(Math.round(Number(amountRange.value) / limits.step) * limits.step, limits.min, limits.max);
                amountRange.value = value;
                amountInput.value = formatINRDigits(value);
                if (activeMode === 'sip') lastSipAmount = value;
                else lastLumpsumAmount = value;
                setFieldError(amountField, false);
                setRangeFill(amountRange, value);
                updateSummaryUI(false);
            });

            amountInput.addEventListener('input', function() {
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                const limits = getAmountLimits();
                if (!digits) {
                    setFieldError(amountField, raw.trim() !== '');
                    return;
                }
                const parsed = Number(digits);
                const invalid = parsed < limits.min || parsed > limits.max;
                const value = clamp(Math.round(parsed / limits.step) * limits.step, limits.min, limits.max);
                setFieldError(amountField, invalid);
                amountRange.value = value;
                amountInput.value = formatINRDigits(parsed);
                setRangeFill(amountRange, value);
                if (activeMode === 'sip') lastSipAmount = value;
                else lastLumpsumAmount = value;
                if (!invalid) updateSummaryUI(false);
            });

            amountInput.addEventListener('change', function() {
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                const limits = getAmountLimits();
                const parsed = digits ? Number(digits) : limits.defaultVal;
                const value = clamp(Math.round(parsed / limits.step) * limits.step, limits.min, limits.max);
                amountRange.value = value;
                amountInput.value = formatINRDigits(value);
                setFieldError(amountField, false);
                setRangeFill(amountRange, value);
                if (activeMode === 'sip') lastSipAmount = value;
                else lastLumpsumAmount = value;
                updateSummaryUI(true);
            });

            rateRange.addEventListener('input', function() {
                const value = Math.round(clamp(Number(rateRange.value), MIN_RATE, MAX_RATE) * 10) / 10;
                rateRange.value = value;
                rateInput.value = value;
                setFieldError(rateField, false);
                setRangeFill(rateRange, value);
                updateSummaryUI(false);
            });

            rateInput.addEventListener('input', function() {
                const raw = String(rateInput.value || '');
                if (raw.trim() === '') {
                    setFieldError(rateField, true);
                    return;
                }
                const num = Number(raw);
                if (!isFinite(num)) {
                    setFieldError(rateField, true);
                    return;
                }
                const invalid = num < MIN_RATE || num > MAX_RATE;
                const value = Math.round(clamp(num, MIN_RATE, MAX_RATE) * 10) / 10;
                setFieldError(rateField, invalid);
                rateRange.value = value;
                setRangeFill(rateRange, value);
                if (!invalid) updateSummaryUI(false);
            });

            rateInput.addEventListener('change', function() {
                const value = Math.round(clamp(Number(rateInput.value), MIN_RATE, MAX_RATE) * 10) / 10;
                rateInput.value = value;
                rateRange.value = value;
                setFieldError(rateField, false);
                setRangeFill(rateRange, value);
                updateSummaryUI(true);
            });

            yearsRange.addEventListener('input', function() {
                const value = clamp(Math.round(Number(yearsRange.value)), MIN_YEARS, MAX_YEARS);
                yearsRange.value = value;
                yearsInput.value = value;
                setFieldError(yearsField, false);
                setRangeFill(yearsRange, value);
                updateSummaryUI(false);
            });

            yearsInput.addEventListener('input', function() {
                const raw = String(yearsInput.value || '');
                if (raw.trim() === '') {
                    setFieldError(yearsField, true);
                    return;
                }
                const num = Math.round(Number(raw));
                if (!isFinite(num)) {
                    setFieldError(yearsField, true);
                    return;
                }
                const invalid = num < MIN_YEARS || num > MAX_YEARS;
                const value = clamp(num, MIN_YEARS, MAX_YEARS);
                setFieldError(yearsField, invalid);
                yearsRange.value = value;
                setRangeFill(yearsRange, value);
                if (!invalid) updateSummaryUI(false);
            });

            yearsInput.addEventListener('change', function() {
                const value = clamp(Math.round(Number(yearsInput.value)), MIN_YEARS, MAX_YEARS);
                yearsInput.value = value;
                yearsRange.value = value;
                setFieldError(yearsField, false);
                setRangeFill(yearsRange, value);
                updateSummaryUI(true);
            });

            tabs.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    setMode(btn.getAttribute('data-mode'));
                });
            });

            setRangeFill(amountRange, Number(amountRange.value));
            setRangeFill(rateRange, Number(rateRange.value));
            setRangeFill(yearsRange, Number(yearsRange.value));

            (function waitForApex() {
                updateSummaryUI(false);
                if (typeof ApexCharts === 'undefined') {
                    setTimeout(waitForApex, 60);
                    return;
                }
                ensureDonutChart();
            })();

            if (investNowBtn) {
                investNowBtn.addEventListener('click', function() {
                    updateSummaryUI(true);
                    const target = document.querySelector('.calculator-wrapper');
                    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            }

            setMode('sip');
        })();
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


