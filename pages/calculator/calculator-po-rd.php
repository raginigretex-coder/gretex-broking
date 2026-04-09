<?php
/**
 * Post Office RD Calculator - Gretex Financial
 * Groww-like functionality with Gretex layout.
 */

$pageTitle = 'Post Office RD Calculator - Gretex Financial';
$additionalCSS = [
    '../../css/calculator-page.css',
    '../../css/chatbot.css',
];

$additionalScripts = [
    'https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js',
];

require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>

<main class="calculator-page investment-modern-calc-page">
    <div class="calculator-hero">
        <div class="container">
            <div class="calculator-hero-content">
                <a href="calculators.php" class="back-link"><i data-lucide="arrow-left"></i><span>Back to Calculators</span></a>
                <h1 class="calculator-page-title">Post Office RD Calculator</h1>
                <p class="calculator-page-description">Estimate recurring deposit maturity with monthly deposits, quarterly compounding, and live Groww-style inputs in the Gretex calculator layout.</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc investment-modern-calc--pord" aria-label="Post Office RD calculator">
                <div class="investment-tabs" aria-label="Calculator type">
                    <button type="button" class="investment-tab is-active" aria-current="page">Post Office RD</button>
                </div>

                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Post Office RD inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="pordAmountRange">Monthly investment</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="pordAmountErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">&#8377;</span>
                                        <input type="text" class="pill-input" id="pordAmountInput" value="50000" inputmode="numeric" autocomplete="off" aria-label="Monthly investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="pordAmountRange" min="500" max="1000000" step="100" value="50000" aria-label="Monthly investment slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="pordRateRange">Rate of interest (p.a)</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="pordRateErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input pill-input--narrow" id="pordRateInput" min="1" max="15" step="0.1" value="6.5" inputmode="decimal" aria-label="Rate of interest percentage" />
                                        <span class="pill-unit">%</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="pordRateRange" min="1" max="15" step="0.1" value="6.5" aria-label="Rate of interest slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <div class="investment-label-with-unit">
                                    <label class="investment-slider-label" for="pordPeriodRange">Time period</label>
                                    <label class="sr-only" for="pordPeriodUnit">Time period unit</label>
                                    <select id="pordPeriodUnit" class="investment-period-unit-select" aria-label="Time period unit">
                                        <option value="years" selected>Years</option>
                                        <option value="months">Months</option>
                                    </select>
                                </div>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="pordPeriodErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input pill-input--narrow" id="pordPeriodInput" min="1" max="10" step="1" value="3" inputmode="numeric" aria-label="Time period value" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="pordPeriodRange" min="1" max="10" step="1" value="3" aria-label="Time period slider" />
                        </div>
                    </div>

                    <div class="investment-visual" aria-label="Post Office RD result visualization">
                        <div class="investment-donut-card investment-donut-card--pord">
                            <div class="ssy-groww-results investment-ssy-summary-top" aria-label="Post Office RD maturity summary">
                                <div class="ssy-summary-list">
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">Invested amount</span>
                                        <span class="ssy-summary-value" id="pordSummaryInvested">&#8377;0</span>
                                    </div>
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">Est. returns</span>
                                        <span class="ssy-summary-value ssy-summary-value--interest" id="pordSummaryInterest">&#8377;0</span>
                                    </div>
                                    <div class="ssy-summary-row ssy-summary-row--maturity">
                                        <span class="ssy-summary-label">Total value</span>
                                        <span class="ssy-summary-value" id="pordSummaryMaturity">&#8377;0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="investment-donut-wrap">
                                <div id="pordDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Total value</div>
                                    <div class="investment-donut-center-value" id="pordDonutCenterValue">&#8377;0</div>
                                </div>
                            </div>

                            <div class="investment-donut-legend" aria-hidden="true">
                                <div class="legend-item">
                                    <span class="legend-dot legend-returns"></span>
                                    <span>Est. returns</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot legend-invested"></span>
                                    <span>Invested amount</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="calculator-wrapper">
                <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                <div class="calculator-info-section">
                    <div class="calculator-info-card">
                        <h3 class="calculator-info-title">Post Office RD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>Post Office Recurring Deposit (RD) is a government-backed savings scheme that lets investors deposit a fixed amount regularly and earn interest with quarterly compounding.</p>
                            <p>This calculator helps estimate the maturity amount, total invested amount, and expected returns for recurring deposits using live inputs.</p>
                        </div>

                        <h3 class="calculator-info-title">What is a Post Office RD Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>A Post Office RD Calculator is an online utility that helps investors estimate the maturity value of recurring monthly deposits.</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Monthly deposit amount</li>
                                <li>Interest rate</li>
                                <li>Investment period</li>
                            </ul>
                            <p>the calculator computes:</p>
                            <ul style="margin-left: 14px;">
                                <li>Total amount invested</li>
                                <li>Estimated returns</li>
                                <li>Maturity value</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does a Post Office RD Calculator Work?</h3>
                        <div class="calculator-info-content">
                            <p>The calculator uses a recurring deposit formula with quarterly compounding to estimate the maturity value:</p>
                            <p style="font-family: 'Times New Roman', serif; font-size: 20px; font-weight: bold; color: #000; margin-left: 20px;">
                                M = R x
                                <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                    <span style="display:block; border-bottom:2px solid #000; padding:0 6px;">
                                        (1 + i)<sup>n</sup> - 1
                                    </span>
                                    <span style="display:block; font-size:14px;">1 - (1 + i)<sup>-1/3</sup></span>
                                </span>
                            </p>
                            <p style="margin-top: 20px;"><strong>In the above formula -</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong> R </strong> = is the amount deposited per month.</li>
                                <li><strong> n </strong> = is the number of quarters in the tenure.</li>
                                <li><strong> i </strong> = is the rate of interest divided by 400 (for 4 quarters in a year).</li>
                                <li><strong> M </strong> = is the maturity amount.</li>
                            </ul>
                            <p>The following example can explain the above formula better.</p>

                            <p><strong>Example</strong></p>
                            <p>Assume:</p>
                            <ul style="margin-left: 14px;">
                                <li>Monthly investment (R): &#8377;50,000</li>
                                <li>Rate of interest: 6.5% p.a.</li>
                                <li>Time period: 3 years</li>
                                <li>Quarterly interest rate (i): 6.5 / 400 = 0.01625</li>
                                <li>Number of quarters (n): 3 x 4 = 12</li>
                            </ul>
                            <p>Total invested amount: &#8377;18,00,000</p>
                            <p>Estimated returns: &#8377;1,91,214</p>
                            <p><strong>Total maturity value: &#8377;19,91,214</strong></p>
                        </div>

                        <h3 class="calculator-info-title">How to Use the Post Office RD Calculator</h3>
                        <div class="calculator-info-content">
                            <ol>
                                <li>Enter the monthly investment amount</li>
                                <li>Adjust the annual rate of interest</li>
                                <li>Select the time period in years or months</li>
                                <li>View the invested amount, estimated returns, and total value instantly</li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides quick and clear maturity estimates for recurring deposits</li>
                                <li>Helps compare different monthly investment amounts and tenures</li>
                                <li>Shows invested amount, estimated returns, and total value instantly</li>
                                <li>Reduces the need for manual recurring deposit calculations</li>
                                <li>Supports better savings and goal-based planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Features of Post Office RD</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Backed by the Government of India</li>
                                <li>Fixed monthly investment structure</li>
                                <li>Quarterly compounding of interest</li>
                                <li>Suitable for disciplined and long-term savings</li>
                                <li>Low minimum monthly deposit requirement</li>
                                <li>Predictable maturity value based on tenure and rate</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Interest rates may be revised periodically by the Government of India</li>
                                <li>Actual maturity values may vary slightly depending on rounding methodology</li>
                                <li>Premature closure rules and penalties may apply as per scheme conditions</li>
                                <li>Interest earned may be taxable based on applicable income tax rules</li>
                                <li>The calculator provides indicative estimates and does not account for tax impact or penalties</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="Post Office RD calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="pord-faq-panel-0">
                                <span class="stepup-faq-question">Is Post Office RD a safe investment?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="pord-faq-panel-0" hidden>
                                Yes, it is backed by the Government of India and is considered a low-risk savings option.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="pord-faq-panel-1">
                                <span class="stepup-faq-question">What inputs does this calculator need?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="pord-faq-panel-1" hidden>
                                It uses monthly investment amount, annual interest rate, and time period to estimate the maturity value.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="pord-faq-panel-2">
                                <span class="stepup-faq-question">Does the calculator show estimated returns separately?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="pord-faq-panel-2" hidden>
                                Yes, it separately shows total invested amount, estimated returns, and total maturity value.
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
    (function () {
        'use strict';

        var MIN_AMOUNT = 500;
        var MAX_AMOUNT = 1000000;
        var AMOUNT_STEP = 100;
        var MIN_RATE = 1;
        var MAX_RATE = 15;
        var YEAR_MIN = 1;
        var YEAR_MAX = 10;
        var MONTH_MIN = 3;
        var MONTH_MAX = 9;

        var amountRange = document.getElementById('pordAmountRange');
        var amountInput = document.getElementById('pordAmountInput');
        var rateRange = document.getElementById('pordRateRange');
        var rateInput = document.getElementById('pordRateInput');
        var periodRange = document.getElementById('pordPeriodRange');
        var periodInput = document.getElementById('pordPeriodInput');
        var periodUnit = document.getElementById('pordPeriodUnit');

        var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
        var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;
        var periodField = periodRange ? periodRange.closest('.investment-slider-field') : null;

        var summaryInvested = document.getElementById('pordSummaryInvested');
        var summaryInterest = document.getElementById('pordSummaryInterest');
        var summaryRate = document.getElementById('pordSummaryRate');
        var summaryMaturity = document.getElementById('pordSummaryMaturity');
        var donutCenterValue = document.getElementById('pordDonutCenterValue');

        var pordDonutChart = null;

        function clamp(value, min, max) {
            if (!isFinite(value)) return min;
            return Math.min(max, Math.max(min, value));
        }

        function formatINR(value) {
            var amount = Number(value);
            if (!isFinite(amount)) return '\u20B90';
            return '\u20B9' + Math.round(amount).toLocaleString('en-IN');
        }

        function formatDigits(value) {
            var amount = Number(value);
            if (!isFinite(amount)) return '0';
            return Math.round(amount).toLocaleString('en-IN');
        }

        function snapAmount(value) {
            return Math.round(Number(value) / AMOUNT_STEP) * AMOUNT_STEP;
        }

        function readAmount() {
            return clamp(snapAmount(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
        }

        function readRate() {
            return clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
        }

        function getPeriodBounds() {
            return periodUnit && periodUnit.value === 'months'
                ? { min: MONTH_MIN, max: MONTH_MAX, step: 1 }
                : { min: YEAR_MIN, max: YEAR_MAX, step: 1 };
        }

        function readPeriodValue() {
            var bounds = getPeriodBounds();
            return clamp(Math.round(Number(periodRange.value)), bounds.min, bounds.max);
        }

        function getMonths() {
            var value = readPeriodValue();
            return periodUnit && periodUnit.value === 'months' ? value : value * 12;
        }

        function setFieldError(field, enabled) {
            if (field) field.classList.toggle('is-error', !!enabled);
        }

        function setRangeFill(rangeEl, value) {
            if (!rangeEl) return;
            var min = Number(rangeEl.min);
            var max = Number(rangeEl.max);
            var percent = max === min ? 100 : ((value - min) / (max - min)) * 100;
            rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
        }

        function computePORD() {
            var monthlyInvestment = readAmount();
            var annualRate = readRate();
            var months = getMonths();
            var quarterlyRate = annualRate / 100 / 4;
            var maturityValue = 0;
            var monthIndex;

            /*
             * Groww's RD calculator explains maturity as the sum of each monthly
             * instalment compounded quarterly for its remaining tenure.
             * Rounding each instalment to the nearest rupee before summing
             * matches their displayed output more closely than rounding only once.
             */
            for (monthIndex = 0; monthIndex < months; monthIndex += 1) {
                var remainingYears = (months - monthIndex) / 12;
                var instalmentFutureValue = monthlyInvestment * Math.pow(1 + quarterlyRate, 4 * remainingYears);
                maturityValue += Math.round(instalmentFutureValue);
            }

            var investedAmount = monthlyInvestment * months;
            var estimatedReturns = maturityValue - investedAmount;

            return {
                investedAmount: investedAmount,
                estimatedReturns: estimatedReturns,
                maturityValue: maturityValue,
                annualRate: annualRate
            };
        }

        function ensureChart() {
            if (pordDonutChart || typeof ApexCharts === 'undefined') return;
            var chartElement = document.getElementById('pordDonutChart');
            if (!chartElement) return;

            var result = computePORD();

            pordDonutChart = new ApexCharts(chartElement, {
                series: [Math.max(0, result.estimatedReturns), Math.max(0, result.investedAmount)],
                chart: {
                    type: 'donut',
                    height: 285,
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 450
                    }
                },
                labels: ['Est. returns', 'Invested amount'],
                colors: ['#3B6DFF', '#F97316'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                stroke: {
                    show: false
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return formatINR(val);
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '84%',
                            labels: {
                                show: false
                            }
                        }
                    }
                }
            });

            pordDonutChart.render();
        }

        function updateSummary(animateChart) {
            var result = computePORD();

            if (summaryInvested) summaryInvested.textContent = formatINR(result.investedAmount);
            if (summaryInterest) summaryInterest.textContent = formatINR(result.estimatedReturns);
            if (summaryRate) summaryRate.textContent = result.annualRate.toFixed(1).replace(/\.0$/, '') + '%';
            if (summaryMaturity) summaryMaturity.textContent = formatINR(result.maturityValue);
            if (donutCenterValue) donutCenterValue.textContent = formatINR(result.maturityValue);

            ensureChart();
            if (pordDonutChart) {
                pordDonutChart.updateSeries(
                    [Math.max(0, result.estimatedReturns), Math.max(0, result.investedAmount)],
                    animateChart !== false
                );
            }
        }

        function syncPeriodBounds() {
            var bounds = getPeriodBounds();
            var current = clamp(Number(periodInput.value || periodRange.value), bounds.min, bounds.max);

            periodRange.min = String(bounds.min);
            periodRange.max = String(bounds.max);
            periodRange.step = String(bounds.step);
            periodInput.min = String(bounds.min);
            periodInput.max = String(bounds.max);
            periodInput.step = String(bounds.step);

            periodRange.value = String(current);
            periodInput.value = String(current);
            setRangeFill(periodRange, current);
        }

        function bindFaq() {
            var faqRows = document.querySelectorAll('.stepup-faq-row[aria-controls]');
            faqRows.forEach(function (button) {
                button.addEventListener('click', function () {
                    var panelId = button.getAttribute('aria-controls');
                    var panel = panelId ? document.getElementById(panelId) : null;
                    if (!panel) return;

                    var expanded = button.getAttribute('aria-expanded') === 'true';
                    button.setAttribute('aria-expanded', String(!expanded));
                    panel.hidden = expanded;
                });
            });
        }

        function bindWhenReady() {
            if (document.body.dataset.pordModernBound === '1') return true;
            if (!amountRange || !amountInput || !rateRange || !rateInput || !periodRange || !periodInput || !periodUnit) return false;

            document.body.dataset.pordModernBound = '1';

            amountRange.addEventListener('input', function () {
                var value = clamp(snapAmount(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = value;
                amountInput.value = formatDigits(value);
                setFieldError(amountField, false);
                setRangeFill(amountRange, value);
                updateSummary(false);
            });

            amountRange.addEventListener('change', function () {
                updateSummary(true);
            });

            amountInput.addEventListener('input', function () {
                var raw = String(amountInput.value || '');
                var digits = raw.replace(/[^\d]/g, '');
                if (!digits) {
                    setFieldError(amountField, raw.trim() !== '');
                    return;
                }

                var value = Number(digits);
                var invalid = value < MIN_AMOUNT || value > MAX_AMOUNT;
                var clamped = clamp(snapAmount(value), MIN_AMOUNT, MAX_AMOUNT);

                amountRange.value = clamped;
                amountInput.value = formatDigits(value);
                setFieldError(amountField, invalid);
                setRangeFill(amountRange, clamped);

                if (!invalid) updateSummary(false);
            });

            amountInput.addEventListener('change', function () {
                var digits = String(amountInput.value || '').replace(/[^\d]/g, '');
                var value = digits ? Number(digits) : MIN_AMOUNT;
                var clamped = clamp(snapAmount(value), MIN_AMOUNT, MAX_AMOUNT);

                amountRange.value = clamped;
                amountInput.value = formatDigits(clamped);
                setFieldError(amountField, false);
                setRangeFill(amountRange, clamped);
                updateSummary(true);
            });

            rateRange.addEventListener('input', function () {
                var value = clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
                rateRange.value = value;
                rateInput.value = Number(value).toFixed(1).replace(/\.0$/, '');
                setFieldError(rateField, false);
                setRangeFill(rateRange, value);
                updateSummary(false);
            });

            rateRange.addEventListener('change', function () {
                updateSummary(true);
            });

            rateInput.addEventListener('input', function () {
                var raw = String(rateInput.value || '');
                if (raw.trim() === '') {
                    setFieldError(rateField, true);
                    return;
                }

                var value = Number(raw);
                if (!isFinite(value)) {
                    setFieldError(rateField, true);
                    return;
                }

                var invalid = value < MIN_RATE || value > MAX_RATE;
                var clamped = clamp(value, MIN_RATE, MAX_RATE);

                rateRange.value = clamped;
                setFieldError(rateField, invalid);
                setRangeFill(rateRange, clamped);

                if (!invalid) updateSummary(false);
            });

            rateInput.addEventListener('change', function () {
                var value = Number(rateInput.value);
                var clamped = clamp(isFinite(value) ? value : MIN_RATE, MIN_RATE, MAX_RATE);

                rateRange.value = clamped;
                rateInput.value = Number(clamped).toFixed(1).replace(/\.0$/, '');
                setFieldError(rateField, false);
                setRangeFill(rateRange, clamped);
                updateSummary(true);
            });

            periodRange.addEventListener('input', function () {
                var bounds = getPeriodBounds();
                var value = clamp(Math.round(Number(periodRange.value)), bounds.min, bounds.max);
                periodRange.value = value;
                periodInput.value = value;
                setFieldError(periodField, false);
                setRangeFill(periodRange, value);
                updateSummary(false);
            });

            periodRange.addEventListener('change', function () {
                updateSummary(true);
            });

            periodInput.addEventListener('input', function () {
                var bounds = getPeriodBounds();
                var raw = String(periodInput.value || '');
                if (raw.trim() === '') {
                    setFieldError(periodField, true);
                    return;
                }

                var value = Math.round(Number(raw));
                if (!isFinite(value)) {
                    setFieldError(periodField, true);
                    return;
                }

                var invalid = value < bounds.min || value > bounds.max;
                var clamped = clamp(value, bounds.min, bounds.max);

                periodRange.value = clamped;
                setFieldError(periodField, invalid);
                setRangeFill(periodRange, clamped);

                if (!invalid) updateSummary(false);
            });

            periodInput.addEventListener('change', function () {
                var bounds = getPeriodBounds();
                var value = Math.round(Number(periodInput.value));
                var clamped = clamp(isFinite(value) ? value : bounds.min, bounds.min, bounds.max);

                periodRange.value = clamped;
                periodInput.value = clamped;
                setFieldError(periodField, false);
                setRangeFill(periodRange, clamped);
                updateSummary(true);
            });

            periodUnit.addEventListener('change', function () {
                syncPeriodBounds();
                setFieldError(periodField, false);
                updateSummary(true);
            });

            bindFaq();

            amountInput.value = formatDigits(readAmount());
            rateInput.value = Number(readRate()).toFixed(1).replace(/\.0$/, '');
            syncPeriodBounds();
            setRangeFill(amountRange, readAmount());
            setRangeFill(rateRange, readRate());

            var apexAttempts = 0;
            function waitForApex() {
                updateSummary(false);
                if (typeof ApexCharts === 'undefined') {
                    apexAttempts += 1;
                    if (apexAttempts < 80) setTimeout(waitForApex, 80);
                } else {
                    ensureChart();
                    updateSummary(false);
                }
            }
            waitForApex();

            return true;
        }

        function kickoff() {
            if (bindWhenReady()) return;
            var attempts = 0;
            var timer = setInterval(function () {
                attempts += 1;
                if (bindWhenReady() || attempts > 120) clearInterval(timer);
            }, 50);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', kickoff);
        } else {
            kickoff();
        }

        window.addEventListener('load', kickoff);
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
require_once '../../includes/footer.php';
?>
