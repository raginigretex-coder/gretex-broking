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

<main class="calculator-page investment-modern-calc-page">
    <div class="calculator-hero">
        <div class="container">
            <div class="calculator-hero-content">
                <a href="calculators.php" class="back-link">
                    <i data-lucide="arrow-left"></i>
                    <span>Back to Calculators</span>
                </a>
                <h1 class="calculator-page-title">Mutual Fund Returns Calculator</h1>
                <p class="calculator-page-description">Estimate SIP and lumpsum mutual fund returns with a Groww-style calculator experience.</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc" aria-label="Mutual fund returns calculator">
                <div class="investment-tabs" aria-label="Calculator type">
                    <button type="button" class="investment-tab is-active" aria-current="page">Mutual Fund</button>
                </div>


                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" id="amountLabel" for="investmentAmountRange">Total investment (&#8377;)</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="amountErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">&#8377;</span>
                                        <input type="text" class="pill-input" id="investmentAmountInput" value="25000" inputmode="numeric" aria-label="Total investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="investmentAmountRange" min="500" max="10000000" step="500" value="25000" aria-labelledby="amountLabel" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="investmentRateRange">Expected return rate (p.a)</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="rateErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="investmentRateInput" min="1" max="30" step="0.1" value="12" inputmode="decimal" aria-label="Expected return rate" />
                                        <span class="pill-unit">%</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="investmentRateRange" min="1" max="30" step="0.1" value="12" aria-label="Expected return rate slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="investmentYearsRange">Time period</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="yearsErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="investmentYearsInput" min="1" max="40" step="1" value="10" inputmode="numeric" aria-label="Time period years" />
                                        <span class="pill-unit">Yr</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="investmentYearsRange" min="1" max="40" step="1" value="10" aria-label="Time period slider" />
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
                                    <div class="quickbar-value" id="summaryInvested">&#8377;0</div>
                                </div>

                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-returns"></span>
                                        <span class="quickbar-label">Est. returns</span>
                                    </div>
                                    <div class="quickbar-value quickbar-returns-value" id="summaryReturns">&#8377;0</div>
                                </div>

                                <div class="quickbar-total">
                                    <div class="quickbar-total-label">Total value</div>
                                    <div class="quickbar-total-value" id="summaryTotal">&#8377;0</div>
                                </div>
                            </div>

                            <div class="investment-donut-wrap">
                                <div id="investmentDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Maturity Value</div>
                                    <div class="investment-donut-center-value" id="donutCenterValue">&#8377;0</div>
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
                    <button type="button" class="investment-cta" id="investNowBtn">INVEST NOW</button>
                </div>
            </section>

            <div class="calculator-wrapper">
                <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                <div class="calculator-info-section">
                      <div class="calculator-info-card">
                        <h3 class="calculator-info-title">Mutual Fund Calculator</h3>
                        <div class="calculator-info-content">
                            <p>Mutual funds are investment instruments that pool money from multiple investors to invest in diversified financial assets such as equities, debt instruments, or a combination of both. Investments in mutual funds can typically be made through two approaches:<strong> lumpsum investment </strong> or <strong> Systematic Investment Plan (SIP)</strong>.</p>
                            <p>A Mutual Fund Calculator is a financial tool used to estimate the potential returns and future value of investments made through either of these approaches.</p>
                        </div>

                        <h3 class="calculator-info-title">What is a Mutual Fund Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>A Mutual Fund Calculator is an online utility that helps investors estimate the growth of their investments over a specified period.</p>
                            <p>By entering basic inputs such as:</p>
                            <ul style="margin-left: 14px;">
                                <li>Investment amount (lumpsum or periodic SIP)</li>
                                <li>Investment duration</li>
                                <li>Expected rate of return</li>
                            </ul>
                            <p>the calculator provides:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimated future value of the investment</li>
                                <li>Total returns generated over time</li>
                            </ul>
                            <p>The results are indicative and depend on market performance and other investment-related factors.</p>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of a Mutual Fund Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The calculator is designed to assist investors in planning and evaluating their investments in mutual funds.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate returns for both SIP and lumpsum investments</li>
                                <li>Compare different investment scenarios</li>
                                <li>Assess alignment with financial goals</li>
                                <li>Understand the impact of time and return assumptions on investment outcomes</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Types of Returns in Mutual Funds</h3>
                            <div class="calculator-info-content">
                                <p>Investors may evaluate mutual fund performance using different return metrics:</p>
                                <ul style="margin-left: 14px;">
                                    <li><strong>Absolute Return</strong> - Total return over a specific period</li>
                                    <li><strong>Annualised Return</strong> - Average yearly return over the investment duration</li>
                                    <li><strong>Total Return</strong> - Includes both capital gains and income</li>
                                    <li><strong>Point-to-Point Return</strong> - Return between two specific dates</li>
                                    <li><strong>Trailing Return</strong> - Historical return over a fixed timeframe</li>
                                    <li><strong>Rolling Return</strong> - Returns calculated over continuous overlapping periods</li>
                                </ul>
                                <p>Understanding these measures helps in better interpretation of investment performance.</p>
                            </div>

                            <h3 class="calculator-info-title">How Does a Mutual Fund Calculator Work?</h3>
                            <div class="calculator-info-content">
                                <p>A mutual fund calculator estimates returns using compound growth principles. The calculation method depends on the investment type:</p>

                                <p><strong>1. Lumpsum Investment</strong></p>
                                <p>For one-time investments, the future value is calculated as:</p>
                                <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                    FV = P (1 + 
                                        <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                            <span style="display:block; border-bottom:2px solid #000; padding:0 4px;">
                                            r
                                            </span>
                                            <span style="display:block; font-size:14px;">n</span>
                                        </span>
                                        )<sup>nt</sup>
                                </p>
                                <p style="margin-top: 20px;"><strong>Where:</strong></p>
                                <ul>
                                    <li><strong>FV</strong> = Future value</li>
                                    <li><strong>P</strong> = Initial investment</li>
                                    <li><strong>r</strong> = Expected rate of return</li>
                                    <li><strong>t</strong> = Investment duration</li>
                                    <li><strong>n</strong> = Compounding frequency</li>
                                </ul>

                                <p><strong>2. SIP Investment</strong></p>
                                <p>For periodic investments, the future value is calculated as:</p>
                                <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                    FV = P × 
                                    <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                        <span style="display:block; border-bottom:2px solid #000; padding:0 4px;">
                                            (1 + i)<sup>n</sup> - 1
                                        </span>
                                        <span style="display:block; font-size:14px;">i</span>
                                    </span>
                                    × (1 + i)
                                </p>
                                <p style="margin-top: 20px;"><strong>Where:</strong></p>
                                <ul>
                                    <li><strong>FV</strong> = Future value</li>
                                    <li><strong>P</strong> = Periodic investment amount</li>
                                    <li><strong>i</strong> = Periodic rate of return</li>
                                    <li><strong>n</strong> = Number of contributions</li>
                                </ul>

                                <p><strong>Example</strong></p>
                                <p><strong>Lumpsum Example</strong></p>
                                <p>Investment: Rs.5,00,000</p>
                                <p>Duration: 8 years</p>
                                <p>Expected return: 11%</p>
                                <p>Estimated future value:</p>
                                <p> <strong>Rs.11,52,269 (approx.)</strong></p>

                                <p><strong>SIP Example</strong></p>
                                <p>Monthly investment: Rs.1,000</p>
                                <p>Duration: 10 years</p>
                                <p>Expected return: 8%</p>
                                <p>Estimated future value: </p>
                                <p><strong>Rs.1,83,493  (approx.)</strong></p>
                            </div>


                        <h3 class="calculator-info-title">How to Use the Mutual Fund Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate estimated returns:</p>
                            <ol>
                                <li>Select the investment type (lumpsum or SIP)</li>
                                <li>Enter the investment amount</li>
                                <li>Specify the investment duration</li>
                                <li>Input the expected rate of return</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Total invested amount</li>
                                        <li>Estimated returns</li>
                                        <li>Projected maturity value</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides a structured estimate of investment growth</li>
                                <li>Simplifies financial planning without manual calculations</li>
                                <li>Helps evaluate different investment strategies</li>
                                <li>Enables comparison between SIP and lumpsum approaches</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Mutual fund returns are market-linked and not guaranteed</li>
                                <li>The calculator provides indicative results only</li>
                                <li>It does not account for:
                                    <ul>
                                        <li>Expense ratios</li>
                                        <li>Exit loads</li>
                                        <li>Taxes</li>
                                    </ul>
                                </li>
                                <li>Assumed rate of return has a significant impact on projections</li>
                            </ul>
                        </div>


                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="Mutual fund calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">Is a mutual fund calculator accurate?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                It provides estimates based on assumed inputs. Actual returns may vary.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">Can it be used for both SIP and lumpsum investments?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                Yes, most mutual fund calculators support both investment methods.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">What rate of return should be considered?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                The expected return depends on the type of mutual fund and market conditions.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Does the calculator include taxes and charges?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                No, it excludes taxes, expense ratios, and other applicable costs.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Can I use it for goal-based planning?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                Yes, it can help estimate the required investment to achieve a financial goal.
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../../js/gretex-financial.js"></script>
<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    (function initModernMutualFundUI() {
        var root = document.querySelector('.investment-modern-calc');
        if (!root) return;

        var tabs = root.querySelectorAll('.investment-tab[data-mode]');

        var amountLabel = document.getElementById('amountLabel');
        var amountRange = document.getElementById('investmentAmountRange');
        var amountInput = document.getElementById('investmentAmountInput');
        var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;

        var rateRange = document.getElementById('investmentRateRange');
        var rateInput = document.getElementById('investmentRateInput');
        var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;

        var yearsRange = document.getElementById('investmentYearsRange');
        var yearsInput = document.getElementById('investmentYearsInput');
        var yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;

        var summaryInvested = document.getElementById('summaryInvested');
        var summaryReturns = document.getElementById('summaryReturns');
        var summaryTotal = document.getElementById('summaryTotal');
        var donutCenterValue = document.getElementById('donutCenterValue');
        var investNowBtn = document.getElementById('investNowBtn');

        var MIN_AMOUNT = 100;
        var MAX_AMOUNT = 10000000;
        var MIN_RATE = 1;
        var MAX_RATE = 30;
        var MIN_YEARS = 1;
        var MAX_YEARS = 40;

        var activeMode = 'sip';
        var donutChart = null;

        function clamp(n, min, max) {
            if (!isFinite(n)) return min;
            return Math.min(max, Math.max(min, n));
        }

        function formatINR0(num) {
            var n = Number(num);
            if (!isFinite(n)) return '\u20B90';
            return '\u20B9' + Math.round(n).toLocaleString('en-IN');
        }

        function formatINRDigits(n) {
            var x = Number(n);
            if (!isFinite(x)) return '0';
            return Math.round(x).toLocaleString('en-IN');
        }

        function parseDigitsOnly(input) {
            if (typeof input !== 'string') return Number(input) || 0;
            var digits = input.replace(/[^\d]/g, '');
            var n = Number(digits);
            return isFinite(n) ? n : 0;
        }

        function setAmountError(hasError) {
            if (!amountField) return;
            amountField.classList.toggle('is-error', !!hasError);
        }

        function setRateError(hasError) {
            if (!rateField) return;
            rateField.classList.toggle('is-error', !!hasError);
        }

        function setYearsError(hasError) {
            if (!yearsField) return;
            yearsField.classList.toggle('is-error', !!hasError);
        }

        function setRangeFill(rangeEl, value) {
            var min = Number(rangeEl.min);
            var max = Number(rangeEl.max);
            var percent = ((value - min) / (max - min)) * 100;
            rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
        }

        function computeLumpsum(amount, rate, years) {
            var r = rate / 100;
            var totalValue = amount * Math.pow(1 + r, years);
            var invested = amount;
            var returns = totalValue - invested;
            return { invested: invested, returns: returns, totalValue: totalValue };
        }

        function computeSIP(monthlyAmount, rate, years) {
            var monthlyRate = Math.pow(1 + (rate / 100), 1 / 12) - 1;
            var totalMonths = years * 12;
            var totalValue = monthlyRate === 0
                ? monthlyAmount * totalMonths
                : monthlyAmount * ((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * (1 + monthlyRate);
            var invested = monthlyAmount * totalMonths;
            var returns = totalValue - invested;
            return { invested: invested, returns: returns, totalValue: totalValue };
        }

        function computeActive() {
            var amount = Number(amountRange.value);
            var rate = Number(rateRange.value);
            var years = Number(yearsRange.value);
            return activeMode === 'sip' ? computeSIP(amount, rate, years) : computeLumpsum(amount, rate, years);
        }

        function ensureDonutChart() {
            if (donutChart || typeof ApexCharts === 'undefined') return;

            var donutEl = document.getElementById('investmentDonutChart');
            if (!donutEl) return;

            var data = computeActive();
            donutChart = new ApexCharts(donutEl, {
                series: [Math.max(0, data.invested), Math.max(0, data.returns)],
                chart: {
                    type: 'donut',
                    height: 285,
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 450
                    }
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
            var data = computeActive();
            if (summaryInvested) summaryInvested.textContent = formatINR0(data.invested);
            if (summaryReturns) summaryReturns.textContent = formatINR0(data.returns);
            if (summaryTotal) summaryTotal.textContent = formatINR0(data.totalValue);
            if (donutCenterValue) donutCenterValue.textContent = formatINR0(data.totalValue);
            updateDonutChart(data.invested, data.returns, animate);
        }

        function setMode(mode) {
            activeMode = mode === 'sip' ? 'sip' : 'lumpsum';

            if (amountLabel) {
                amountLabel.textContent = activeMode === 'sip' ? 'Monthly investment (\u20B9)' : 'Total investment (\u20B9)';
            }

            tabs.forEach(function(btn) {
                var isActive = btn.getAttribute('data-mode') === activeMode;
                btn.classList.toggle('is-active', isActive);
                btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });

            if (activeMode === 'sip') {
                amountRange.min = '100';
                amountRange.step = '100';
                if (Number(amountRange.value) < 100) amountRange.value = 5000;
                if (parseDigitsOnly(amountInput.value) < 100) amountInput.value = formatINRDigits(5000);
            } else {
                amountRange.min = '500';
                amountRange.step = '500';
                if (Number(amountRange.value) < 500) amountRange.value = 25000;
                if (parseDigitsOnly(amountInput.value) < 500) amountInput.value = formatINRDigits(25000);
            }

            setRangeFill(amountRange, Number(amountRange.value));
            updateSummaryUI(true);
        }

        amountRange.addEventListener('input', function() {
            var minAmount = activeMode === 'sip' ? 100 : 500;
            var v = Math.round(Number(amountRange.value));
            var clamped = clamp(v, minAmount, MAX_AMOUNT);
            amountRange.value = clamped;
            amountInput.value = formatINRDigits(clamped);
            setAmountError(false);
            setRangeFill(amountRange, clamped);
            updateSummaryUI(false);
        });

        amountRange.addEventListener('change', function() {
            setAmountError(false);
            updateSummaryUI(true);
        });

        rateRange.addEventListener('input', function() {
            var v = Number(rateRange.value);
            var clamped = clamp(v, MIN_RATE, MAX_RATE);
            var rounded = Math.round(clamped * 10) / 10;
            rateRange.value = rounded;
            rateInput.value = rounded;
            setRateError(false);
            setRangeFill(rateRange, rounded);
            updateSummaryUI(false);
        });

        rateRange.addEventListener('change', function() {
            setRateError(false);
            updateSummaryUI(true);
        });

        yearsRange.addEventListener('input', function() {
            var v = Math.round(Number(yearsRange.value));
            var clamped = clamp(v, MIN_YEARS, MAX_YEARS);
            yearsRange.value = clamped;
            yearsInput.value = clamped;
            setYearsError(false);
            setRangeFill(yearsRange, clamped);
            updateSummaryUI(false);
        });

        yearsRange.addEventListener('change', function() {
            setYearsError(false);
            updateSummaryUI(true);
        });

        amountInput.addEventListener('input', function() {
            var raw = String(amountInput.value || '');
            var digits = raw.replace(/[^\d]/g, '');
            var minAmount = activeMode === 'sip' ? 100 : 500;

            if (!digits) {
                if (raw.trim() === '') {
                    setAmountError(false);
                } else {
                    amountInput.value = '';
                    setAmountError(true);
                }
                return;
            }

            var v = Number(digits);
            var invalid = v < minAmount || v > MAX_AMOUNT;
            setAmountError(invalid);

            var clamped = clamp(Math.round(v), minAmount, MAX_AMOUNT);
            amountRange.value = clamped;
            setRangeFill(amountRange, clamped);
            amountInput.value = formatINRDigits(v);

            if (!invalid) updateSummaryUI(false);
        });

        amountInput.addEventListener('change', function() {
            var raw = String(amountInput.value || '');
            var digits = raw.replace(/[^\d]/g, '');
            var minAmount = activeMode === 'sip' ? 100 : 500;
            var v = digits ? Number(digits) : minAmount;
            var clamped = clamp(Math.round(v), minAmount, MAX_AMOUNT);
            amountRange.value = clamped;
            amountInput.value = formatINRDigits(clamped);
            setAmountError(false);
            setRangeFill(amountRange, clamped);
            updateSummaryUI(true);
        });

        rateInput.addEventListener('input', function() {
            var raw = String(rateInput.value || '');
            if (raw.trim() === '') {
                setRateError(true);
                return;
            }

            var v = Number(rateInput.value);
            if (!isFinite(v)) {
                setRateError(true);
                return;
            }

            var invalid = v < MIN_RATE || v > MAX_RATE;
            setRateError(invalid);
            var clamped = clamp(v, MIN_RATE, MAX_RATE);
            var rounded = Math.round(clamped * 10) / 10;
            rateRange.value = rounded;
            setRangeFill(rateRange, rounded);

            if (!invalid) updateSummaryUI(false);
        });

        rateInput.addEventListener('change', function() {
            var raw = String(rateInput.value || '');
            var v = raw.trim() === '' ? MIN_RATE : Number(raw);
            var safe = isFinite(v) ? v : MIN_RATE;
            var clamped = clamp(safe, MIN_RATE, MAX_RATE);
            var rounded = Math.round(clamped * 10) / 10;
            rateRange.value = rounded;
            rateInput.value = rounded;
            setRateError(false);
            setRangeFill(rateRange, rounded);
            updateSummaryUI(true);
        });

        yearsInput.addEventListener('input', function() {
            var raw = String(yearsInput.value || '');
            if (raw.trim() === '') {
                setYearsError(true);
                return;
            }

            var v = Math.round(Number(yearsInput.value));
            if (!isFinite(v)) {
                setYearsError(true);
                return;
            }

            var invalid = v < MIN_YEARS || v > MAX_YEARS;
            setYearsError(invalid);
            var clamped = clamp(v, MIN_YEARS, MAX_YEARS);
            yearsRange.value = clamped;
            setRangeFill(yearsRange, clamped);

            if (!invalid) updateSummaryUI(false);
        });

        yearsInput.addEventListener('change', function() {
            var raw = String(yearsInput.value || '');
            var v = raw.trim() === '' ? MIN_YEARS : Math.round(Number(raw));
            var safe = isFinite(v) ? v : MIN_YEARS;
            var clamped = clamp(safe, MIN_YEARS, MAX_YEARS);
            yearsRange.value = clamped;
            yearsInput.value = clamped;
            setYearsError(false);
            setRangeFill(yearsRange, clamped);
            updateSummaryUI(true);
        });

        tabs.forEach(function(btn) {
            btn.addEventListener('click', function() {
                setMode(btn.getAttribute('data-mode'));
            });
        });

        setRangeFill(amountRange, Number(amountRange.value));
        amountInput.value = formatINRDigits(Number(amountRange.value));
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
                var target = document.querySelector('.calculator-wrapper');
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        }

        var faqRows = document.querySelectorAll('.stepup-faq-row[data-mf-faq]');
        faqRows.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var idx = btn.getAttribute('data-mf-faq');
                var panel = document.getElementById('mf-faq-panel-' + idx);
                var expanded = btn.getAttribute('aria-expanded') === 'true';

                faqRows.forEach(function(otherBtn) {
                    var otherIdx = otherBtn.getAttribute('data-mf-faq');
                    var otherPanel = document.getElementById('mf-faq-panel-' + otherIdx);
                    otherBtn.setAttribute('aria-expanded', 'false');
                    if (otherPanel) otherPanel.hidden = true;
                });

                if (!expanded) {
                    btn.setAttribute('aria-expanded', 'true');
                    if (panel) panel.hidden = false;
                }
            });
        });

        setMode('lumpsum');
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
