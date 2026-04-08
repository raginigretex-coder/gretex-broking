<?php
/**
 * Compound Interest Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Compound Interest Calculator - Gretex Financial';
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
                <h1 class="calculator-page-title">Compound Interest Calculator</h1>
                <p class="calculator-page-description">Calculate compound interest with different compounding frequencies</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc investment-modern-calc--simple-interest investment-modern-calc--compound-interest" aria-label="Compound interest calculator">
                <div class="investment-tabs" aria-label="Calculator type">
                    <button type="button" class="investment-tab is-active" aria-current="page">Compound Interest</button>
                </div>

                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Compound interest inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="ciAmountRange">Principal amount</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="ciAmountErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">&#8377;</span>
                                        <input type="text" class="pill-input" id="ciAmountInput" value="100000" inputmode="numeric" autocomplete="off" aria-label="Principal amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="ciAmountRange" min="1000" max="10000000" step="1000" value="100000" aria-label="Principal amount slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="ciRateRange">Rate of interest (p.a)</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="ciRateErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="ciRateInput" min="0.1" max="50" step="0.1" value="6" inputmode="decimal" aria-label="Rate of interest percentage" />
                                        <span class="pill-unit">%</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="ciRateRange" min="0.1" max="50" step="0.1" value="6" aria-label="Rate of interest slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="ciTimeRange">Time period</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="ciTimeErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="ciTimeInput" min="1" max="30" step="1" value="5" inputmode="numeric" aria-label="Time period in years" />
                                        <span class="pill-unit">Yr</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="ciTimeRange" min="1" max="30" step="1" value="5" aria-label="Time period slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="ciFrequencySelect">Compounding frequency</label>
                                <div class="investment-input-wrap">
                                    <div class="investment-value-pill">
                                        <select id="ciFrequencySelect" class="pill-input pill-input--select" aria-label="Compounding frequency">
                                            <option value="yearly" selected>Yearly</option>
                                            <option value="half-yearly">Half-Yearly</option>
                                            <option value="quarterly">Quarterly</option>
                                            <!-- <option value="monthly">Monthly</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="investment-visual" aria-label="Compound interest result visualization">
                        <div class="investment-donut-card">
                            <div class="investment-graph-quickbar">
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-invested"></span>
                                        <span class="quickbar-label">Principal amount</span>
                                    </div>
                                    <div class="quickbar-value" id="ciSummaryPrincipal">&#8377;0</div>
                                </div>
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-returns"></span>
                                        <span class="quickbar-label">Total interest</span>
                                    </div>
                                    <div class="quickbar-value quickbar-returns-value" id="ciSummaryInterest">&#8377;0</div>
                                </div>
                                <div class="quickbar-total">
                                    <div class="quickbar-total-label">Total amount</div>
                                    <div class="quickbar-total-value" id="ciSummaryTotal">&#8377;0</div>
                                </div>
                            </div>

                            <div class="investment-donut-wrap">
                                <div id="ciModernDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Total amount</div>
                                    <div class="investment-donut-center-value" id="ciDonutCenterValue">&#8377;0</div>
                                </div>
                            </div>

                            <div class="investment-donut-legend" aria-hidden="true">
                                <div class="legend-item">
                                    <span class="legend-dot legend-returns"></span>
                                    <span>Total interest</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot legend-invested"></span>
                                    <span>Principal amount</span>
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
                        <h3 class="calculator-info-title">Compound Interest Calculator</h3>
                        <div class="calculator-info-content">
                            <p>Compound interest is the method of calculating interest where the returns earned are reinvested, allowing interest to be generated on both the principal and previously accumulated interest.</p>
                            <p>A Compound Interest Calculator is a financial tool used to estimate the future value of an investment or loan by accounting for this compounding effect over time.</p>
                        </div>

                        <h3 class="calculator-info-title">What is a Compound Interest Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>A Compound Interest Calculator is an online utility that helps estimate the total value of an investment after a specified period, considering compounding.</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Initial investment amount</li>
                                <li>Rate of interest</li>
                                <li>Investment duration</li>
                                <li>Compounding frequency</li>
                            </ul>
                            <p>the calculator computes:</p>
                            <ul style="margin-left: 14px;">
                                <li>Total interest earned</li>
                                <li>Final maturity value</li>
                            </ul>
                            <p>The results are indicative and depend on the compounding frequency and rate of return applied.</p>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of a Compound Interest Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The calculator is designed to assist in evaluating long-term investment growth where compounding plays a significant role.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate future value of investments</li>
                                <li>Compare returns across different compounding frequencies</li>
                                <li>Understand the impact of time on investment growth</li>
                                <li>Support long-term financial planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does Compound Interest Work?</h3>
                        <div class="calculator-info-content">
                            <p>In compound interest, interest is calculated on:</p>
                            <ul style="margin-left: 14px;">
                                <li>The original principal amount</li>
                                <li>The accumulated interest from previous periods</li>
                            </ul>
                            <p>This results in exponential growth of the investment value over time. The frequency of compounding (monthly, quarterly, annually, etc.) influences the total returns.</p>
                        </div>

                        <h3 class="calculator-info-title">Compound Interest Formula</h3>
                        <div class="calculator-info-content">
                            <p>The future value of an investment under compound interest is calculated using the following formula:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                  A = P (1 + 
                                <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                    <span style="display:block; border-bottom:2px solid #000; padding:0 4px;">
                                    r
                                    </span>
                                    <span style="display:block; font-size:14px;">n</span>
                                </span>
                                )<sup>nt</sup>

                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>A</strong> = Future value (principal + interest)</li>
                                <li><strong>P</strong> = Principal amount</li>
                                <li><strong>r</strong> = Annual interest rate</li>
                                <li><strong>n</strong> = Number of times interest is compounded per year</li>
                                <li><strong>t</strong> = Investment duration</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Illustrative Example</h3>
                        <div class="calculator-info-content">
                            <p>Assume:</p>
                            <p>Investment amount: ₹50,000</p>
                            <p>Interest rate: 8% per annum</p>
                            <p>Tenure: 5 years</p>
                            <p>Compounding frequency: Annual</p>
                            <p>The estimated maturity value is:</p>
                            <p><strong>₹73,466 (approx.)</strong></p>
                            <p>The total interest earned is approximately ₹23,466.</p>
                        </div>


                        <h3 class="calculator-info-title">How to Use the Compound Interest Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate compound interest:</p>
                            <ol>
                                <li>Enter the principal amount</li>
                                <li>Input the interest rate</li>
                                <li>Select the investment duration</li>
                                <li>Choose compounding frequency (monthly, quarterly, annually, etc.)</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Total interest earned</li>
                                        <li>Final maturity value</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Users</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides quick and accurate projections</li>
                                <li>Eliminates manual calculation complexity</li>
                                <li>Helps compare multiple investment scenarios</li>
                                <li>Assists in long-term financial planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Characteristics of Compound Interest</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Interest is calculated on both principal and accumulated interest</li>
                                <li>Returns grow at an increasing rate over time</li>
                                <li>Higher compounding frequency generally leads to higher returns</li>
                                <li>Particularly relevant for long-term investments</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Difference Between Simple and Compound Interest</h3>
                        <div class="calculator-info-content">
                            <table style="width:100%; border-collapse:collapse; margin-top:10px;">
                                <thead>
                                    <tr>
                                        <th style="border:1px solid #000; padding:12px; text-align:left;">Parameter</th>
                                        <th style="border:1px solid #000; padding:12px; text-align:left;">Simple Interest</th>
                                        <th style="border:1px solid #000; padding:12px; text-align:left;">Compound Interest</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="border:1px solid #000; padding:12px;">Interest calculation</td>
                                        <td style="border:1px solid #000; padding:12px;">On principle only</td>
                                        <td style="border:1px solid #000; padding:12px;">On principle + accumulated interest</td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid #000; padding:12px;">Growth pattern</td>
                                        <td style="border:1px solid #000; padding:12px;">Linear</td>
                                        <td style="border:1px solid #000; padding:12px;">Exponential</td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid #000; padding:12px;">Returns</td>
                                        <td style="border:1px solid #000; padding:12px;">Lower</td>
                                        <td style="border:1px solid #000; padding:12px;">Higher over long term</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Returns depend on compounding frequency and rate</li>
                                <li>Market-linked investments may not provide fixed returns</li>
                                <li>Longer investment horizons enhance compounding benefits</li>
                                <li>The calculator provides indicative values only</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="Compound interest calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">What is compound interest?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                It is interest calculated on both the principal and previously earned interest.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">Why is compound interest important?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                It enables faster growth of investments over time due to reinvestment of returns.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Does compounding frequency affect returns?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                Yes, more frequent compounding generally results in higher returns.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Is the calculator accurate?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                It provides estimates based on given inputs and assumptions.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Where is compound interest commonly used?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                It is used in investments, loans, fixed deposits, and savings instruments.
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

        var MIN_AMOUNT = 1000;
        var MAX_AMOUNT = 10000000;
        var AMOUNT_STEP = 1000;
        var MIN_RATE = 0.1;
        var MAX_RATE = 50;
        var MIN_TIME = 1;
        var MAX_TIME = 30;

        var amountRange = document.getElementById('ciAmountRange');
        var amountInput = document.getElementById('ciAmountInput');
        var rateRange = document.getElementById('ciRateRange');
        var rateInput = document.getElementById('ciRateInput');
        var timeRange = document.getElementById('ciTimeRange');
        var timeInput = document.getElementById('ciTimeInput');
        var frequencySelect = document.getElementById('ciFrequencySelect');

        var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
        var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;
        var timeField = timeRange ? timeRange.closest('.investment-slider-field') : null;

        var summaryPrincipal = document.getElementById('ciSummaryPrincipal');
        var summaryInterest = document.getElementById('ciSummaryInterest');
        var summaryTotal = document.getElementById('ciSummaryTotal');
        var donutCenterValue = document.getElementById('ciDonutCenterValue');
        var formulaComputation = document.getElementById('ciFormulaComputation');
        var formulaTotalLine = document.getElementById('ciFormulaTotalLine');

        var ciModernDonutChart = null;

        function clamp(n, min, max) {
            if (!isFinite(n)) return min;
            return Math.min(max, Math.max(min, n));
        }

        function formatINR0(num) {
            var n = Number(num);
            if (!isFinite(n)) return '\u20B90';
            return '\u20B9' + Math.round(n).toLocaleString('en-IN');
        }

        function formatINRDigits(num) {
            var n = Number(num);
            if (!isFinite(n)) return '0';
            return Math.round(n).toLocaleString('en-IN');
        }

        function snapAmount(v) {
            return Math.round(Number(v) / AMOUNT_STEP) * AMOUNT_STEP;
        }

        function rateDisplay(r) {
            var s = Number(r).toFixed(1);
            return s.replace(/\.0$/, '');
        }

        function setAmountError(on) {
            if (amountField) amountField.classList.toggle('is-error', !!on);
        }

        function setRateError(on) {
            if (rateField) rateField.classList.toggle('is-error', !!on);
        }

        function setTimeError(on) {
            if (timeField) timeField.classList.toggle('is-error', !!on);
        }

        function setRangeFill(rangeEl, value) {
            var min = Number(rangeEl.min);
            var max = Number(rangeEl.max);
            var percent = ((value - min) / (max - min)) * 100;
            rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
        }

        function getCompoundingCount() {
            var value = frequencySelect ? frequencySelect.value : 'yearly';
            if (value === 'yearly') return 1;
            if (value === 'half-yearly') return 2;
            if (value === 'monthly') return 12;
            return 4;
        }

        function readAmount() {
            return clamp(snapAmount(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
        }

        function readRate() {
            return clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
        }

        function readTime() {
            return clamp(Math.round(Number(timeRange.value)), MIN_TIME, MAX_TIME);
        }

        function computeCI() {
            var principal = readAmount();
            var rate = readRate();
            var years = readTime();
            var n = getCompoundingCount();
            var amount = principal * Math.pow(1 + ((rate / 100) / n), n * years);
            var interest = amount - principal;
            return {
                principal: principal,
                rate: rate,
                years: years,
                frequency: n,
                amount: amount,
                interest: interest
            };
        }

        function updateFormulaLines(result) {
            if (!formulaComputation || !formulaTotalLine) return;
            var principalStr = formatINRDigits(result.principal);
            var amountStr = formatINRDigits(result.amount);
            formulaComputation.innerHTML =
                '= (' + '&#8377;' + principalStr + ' × (1 + ' + rateDisplay(result.rate) + '% / ' + result.frequency + ')<sup>' + (result.frequency * result.years) + '</sup>) = <strong>' + formatINR0(result.amount) + '</strong>';
            formulaTotalLine.innerHTML =
                'Compound interest = ' + '&#8377;' + amountStr + ' - ' + '&#8377;' + principalStr + ' = <strong>' + formatINR0(result.interest) + '</strong>';
        }

        function ensureModernDonut() {
            if (ciModernDonutChart || typeof ApexCharts === 'undefined') return;
            var el = document.getElementById('ciModernDonutChart');
            if (!el) return;
            var r = computeCI();
            ciModernDonutChart = new ApexCharts(el, {
                series: [Math.max(0, r.principal), Math.max(0, r.interest)],
                chart: { type: 'donut', height: 285, animations: { enabled: true, easing: 'easeinout', speed: 450 } },
                labels: ['Principal amount', 'Total interest'],
                colors: ['#ff7a14', '#3b6dff'],
                dataLabels: { enabled: false },
                legend: { show: false },
                stroke: { show: false },
                tooltip: { y: { formatter: function (val) { return formatINR0(val); } } },
                plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
            });
            ciModernDonutChart.render();
        }

        function updateModernSummary(animateChart) {
            var r = computeCI();
            if (summaryPrincipal) summaryPrincipal.textContent = formatINR0(r.principal);
            if (summaryInterest) summaryInterest.textContent = formatINR0(r.interest);
            if (summaryTotal) summaryTotal.textContent = formatINR0(r.amount);
            if (donutCenterValue) donutCenterValue.textContent = formatINR0(r.amount);
            updateFormulaLines(r);
            ensureModernDonut();
            if (ciModernDonutChart) {
                ciModernDonutChart.updateSeries([Math.max(0, r.principal), Math.max(0, r.interest)], animateChart !== false);
            }
        }

        function bindWhenReady() {
            if (document.body.dataset.ciModernBound === '1') return true;
            if (!amountRange || !amountInput || !rateRange || !rateInput || !timeRange || !timeInput || !frequencySelect) return false;

            document.body.dataset.ciModernBound = '1';

            amountRange.addEventListener('input', function () {
                var v = clamp(snapAmount(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = v;
                amountInput.value = formatINRDigits(v);
                setAmountError(false);
                setRangeFill(amountRange, v);
                updateModernSummary(false);
            });
            amountRange.addEventListener('change', function () {
                setAmountError(false);
                updateModernSummary(true);
            });

            rateRange.addEventListener('input', function () {
                var v = clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
                rateRange.value = v;
                rateInput.value = rateDisplay(v);
                setRateError(false);
                setRangeFill(rateRange, v);
                updateModernSummary(false);
            });
            rateRange.addEventListener('change', function () {
                setRateError(false);
                updateModernSummary(true);
            });

            timeRange.addEventListener('input', function () {
                var v = clamp(Math.round(Number(timeRange.value)), MIN_TIME, MAX_TIME);
                timeRange.value = v;
                timeInput.value = String(v);
                setTimeError(false);
                setRangeFill(timeRange, v);
                updateModernSummary(false);
            });
            timeRange.addEventListener('change', function () {
                setTimeError(false);
                updateModernSummary(true);
            });

            amountInput.addEventListener('input', function () {
                var raw = String(amountInput.value || '');
                var digits = raw.replace(/[^\d]/g, '');
                if (!digits) {
                    setAmountError(raw.trim() !== '');
                    return;
                }
                var v = Number(digits);
                var invalid = v < MIN_AMOUNT || v > MAX_AMOUNT;
                setAmountError(invalid);
                var clamped = clamp(snapAmount(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                setRangeFill(amountRange, clamped);
                amountInput.value = formatINRDigits(v);
                if (!invalid) updateModernSummary(false);
            });
            amountInput.addEventListener('change', function () {
                var raw = String(amountInput.value || '');
                var digits = raw.replace(/[^\d]/g, '');
                var v = digits ? Number(digits) : MIN_AMOUNT;
                var clamped = clamp(snapAmount(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                amountInput.value = formatINRDigits(clamped);
                setAmountError(false);
                setRangeFill(amountRange, clamped);
                updateModernSummary(true);
            });

            rateInput.addEventListener('input', function () {
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
                rateRange.value = clamped;
                setRangeFill(rateRange, clamped);
                if (!invalid) updateModernSummary(false);
            });
            rateInput.addEventListener('change', function () {
                var raw = String(rateInput.value || '');
                var v = raw.trim() === '' ? MIN_RATE : Number(raw);
                var safe = isFinite(v) ? v : MIN_RATE;
                var clamped = clamp(safe, MIN_RATE, MAX_RATE);
                rateRange.value = clamped;
                rateInput.value = rateDisplay(clamped);
                setRateError(false);
                setRangeFill(rateRange, clamped);
                updateModernSummary(true);
            });

            timeInput.addEventListener('input', function () {
                var raw = String(timeInput.value || '');
                if (raw.trim() === '') {
                    setTimeError(true);
                    return;
                }
                var v = Math.round(Number(timeInput.value));
                if (!isFinite(v)) {
                    setTimeError(true);
                    return;
                }
                var invalid = v < MIN_TIME || v > MAX_TIME;
                setTimeError(invalid);
                var clamped = clamp(v, MIN_TIME, MAX_TIME);
                timeRange.value = clamped;
                setRangeFill(timeRange, clamped);
                if (!invalid) updateModernSummary(false);
            });
            timeInput.addEventListener('change', function () {
                var raw = String(timeInput.value || '');
                var v = raw.trim() === '' ? MIN_TIME : Math.round(Number(raw));
                var safe = isFinite(v) ? v : MIN_TIME;
                var clamped = clamp(safe, MIN_TIME, MAX_TIME);
                timeRange.value = clamped;
                timeInput.value = String(clamped);
                setTimeError(false);
                setRangeFill(timeRange, clamped);
                updateModernSummary(true);
            });

            frequencySelect.addEventListener('change', function () {
                updateModernSummary(true);
            });

            setRangeFill(amountRange, readAmount());
            amountInput.value = formatINRDigits(readAmount());
            setRangeFill(rateRange, readRate());
            rateInput.value = rateDisplay(readRate());
            setRangeFill(timeRange, readTime());
            timeInput.value = String(readTime());

            var apexAttempts = 0;
            function waitApex() {
                updateModernSummary(false);
                if (typeof ApexCharts === 'undefined') {
                    apexAttempts += 1;
                    if (apexAttempts < 80) setTimeout(waitApex, 80);
                } else {
                    ensureModernDonut();
                    updateModernSummary(false);
                }
            }
            waitApex();

            var faqRows = document.querySelectorAll('.stepup-faq-row[data-ci-faq]');
            faqRows.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var idx = btn.getAttribute('data-ci-faq');
                    var panel = document.getElementById('ci-faq-panel-' + idx);
                    var expanded = btn.getAttribute('aria-expanded') === 'true';

                    faqRows.forEach(function (otherBtn) {
                        var otherIdx = otherBtn.getAttribute('data-ci-faq');
                        var otherPanel = document.getElementById('ci-faq-panel-' + otherIdx);
                        otherBtn.setAttribute('aria-expanded', 'false');
                        if (otherPanel) otherPanel.hidden = true;
                    });

                    if (!expanded) {
                        btn.setAttribute('aria-expanded', 'true');
                        if (panel) panel.hidden = false;
                    }
                });
            });

            return true;
        }

        function kickoff() {
            if (bindWhenReady()) return;
            var n = 0;
            var t = setInterval(function () {
                n += 1;
                if (bindWhenReady() || n > 120) clearInterval(t);
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
// Include footer
require_once '../../includes/footer.php';
?>
