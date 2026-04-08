<?php
/**
 * Simple Interest Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Simple Interest Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Simple Interest Calculator</h1>
                    <p class="calculator-page-description">Calculate simple interest on loans and deposits</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc investment-modern-calc--simple-interest" aria-label="Simple interest calculator">
                    <div class="investment-tabs" aria-label="Calculator type">
                        <button type="button" class="investment-tab is-active" aria-current="page">Simple Interest</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="Simple interest inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="siAmountRange">Principal amount</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="siAmountErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                            <input type="text" class="pill-input" id="siAmountInput" value="100000" inputmode="numeric" autocomplete="off" aria-label="Principal amount" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="siAmountRange" min="1000" max="10000000" step="1000" value="100000" aria-label="Principal amount slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="siRateRange">Rate of interest (p.a)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="siRateErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="siRateInput" min="0.1" max="50" step="0.1" value="6" inputmode="decimal" aria-label="Rate of interest percentage" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="siRateRange" min="0.1" max="50" step="0.1" value="6" aria-label="Rate of interest slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="siTimeRange">Time period</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="siTimeErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="siTimeInput" min="1" max="30" step="1" value="5" inputmode="numeric" aria-label="Time period in years" />
                                            <span class="pill-unit">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="siTimeRange" min="1" max="30" step="1" value="5" aria-label="Time period slider" />
                            </div>
                        </div>

                        <div class="investment-visual" aria-label="Simple interest result visualization">
                            <div class="investment-donut-card">
                                <div class="investment-graph-quickbar">
                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-invested"></span>
                                            <span class="quickbar-label">Principal amount</span>
                                        </div>
                                        <div class="quickbar-value" id="siSummaryPrincipal">₹0</div>
                                    </div>
                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-returns"></span>
                                            <span class="quickbar-label">Total interest</span>
                                        </div>
                                        <div class="quickbar-value quickbar-returns-value" id="siSummaryInterest">₹0</div>
                                    </div>
                                    <div class="quickbar-total">
                                        <div class="quickbar-total-label">Total amount</div>
                                        <div class="quickbar-total-value" id="siSummaryTotal">₹0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-wrap">
                                    <div id="siModernDonutChart"></div>
                                    <div class="investment-donut-center">
                                        <div class="investment-donut-center-label">Total amount</div>
                                        <div class="investment-donut-center-value" id="siDonutCenterValue">₹0</div>
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
                        <h3 class="calculator-info-title">Simple Interest Calculator</h3>
                        <div class="calculator-info-content">
                            <p>Simple interest is a basic method of calculating interest on a principal amount over a specified period at a fixed rate. It is commonly used in short-term loans, basic savings instruments, and certain financial agreements.</p>
                            <p>A Simple Interest Calculator is a financial tool used to estimate the interest earned or payable on a principal amount without considering compounding.</p>
                        </div>

                        <h3 class="calculator-info-title">What is a Simple Interest Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>A Simple Interest Calculator is an online utility that helps determine the interest amount and total maturity value based on three primary inputs:</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Principal amount</li>
                                <li>Rate of interest</li>
                                <li>Time period</li>
                            </ul>
                            <p>the calculator provides:</p>
                            <ul style="margin-left: 14px;">
                                <li>Total interest accrued</li>
                                <li>Final amount (principal + interest)</li>
                            </ul>
                            <p>It simplifies calculations and reduces the possibility of manual errors.</p>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of a Simple Interest Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The calculator is designed to assist in basic financial calculations where interest is applied only on the original principal.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate interest on loans or deposits</li>
                                <li>Evaluate short-term investment returns</li>
                                <li>Compare different interest rate scenarios</li>
                                <li>Support basic financial planning and decision-making</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does a Simple Interest Calculator Work?</h3>
                        <div class="calculator-info-content">
                            <p>Simple interest is calculated only on the initial principal amount and remains constant over the investment or loan period.</p>
                            <p>The formula used is:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                SI = 
                                <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                    <span style="display:block; border-bottom:2px solid #000; padding:0 6px;">
                                    P × R × T
                                    </span>
                                    <span style="display:block; font-size:14px;">100</span>
                                </span>
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>SI</strong> = Simple Interest</li>
                                <li><strong>P</strong> = Principal amount</li>
                                <li><strong>R</strong> = Rate of interest (per annum)</li>
                                <li><strong>T</strong> = Time period</li>
                            </ul>
                            <p>The total maturity amount is calculated as:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                <span style="font-style:italic;">A</span> = <span style="font-style:italic;">P</span> (1 + <span style="font-style:italic;">r</span> × <span style="font-style:italic;">t</span>)
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>A</strong> = Total amount (principal + interest)</li>
                                <li><strong>r</strong> = Rate of interest (in decimal form)</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Illustrative Example</h3>
                        <div class="calculator-info-content">
                            <p>Assume:</p>
                            <p>Principal amount: ₹50,000</p>
                            <p>Interest rate: 8% per annum</p>
                            <p>Time period: 3 years</p>
                            <p>Simple Interest:</p>
                            <p><strong>₹12,000</strong></p>
                            <p>Maturity Amount:</p>
                            <p><strong>₹62,000</strong></p>
                            <p>This reflects the total amount after adding interest to the principal.</p>
                        </div>


                        <h3 class="calculator-info-title">How to Use the Simple Interest Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate simple interest:</p>
                            <ol>
                                <li>Enter the principal amount</li>
                                <li>Input the annual interest rate</li>
                                <li>Specify the time period</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Interest amount</li>
                                        <li>Total maturity value</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Users</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides quick and accurate results</li>
                                <li>Eliminates manual calculation errors</li>
                                <li>Helps in evaluating short-term financial decisions</li>
                                <li>Enables easy comparison of different scenarios</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Characteristics of Simple Interest</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Interest is calculated only on the principal amount</li>
                                <li>The interest amount remains constant over time</li>
                                <li>It is generally used for short-term financial arrangements</li>
                                <li>It is simpler compared to compound interest calculations</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Does not account for compounding</li>
                                <li>Suitable mainly for short-term calculations</li>
                                <li>Actual financial products may use compound interest instead</li>
                                <li>Results are indicative and depend on input assumptions</li>
                            </ul>
                        </div>


                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="Simple interest calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">What is simple interest?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                Simple interest is calculated only on the principal amount for a fixed period.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">Is simple interest used in all financial products?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                No, many financial instruments use compound interest instead.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Does the calculator provide exact values?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                It provides accurate results based on the inputs, assuming a simple interest structure.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Can this calculator be used for loans?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                Yes, it can be used to estimate interest on loans where simple interest is applicable.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">What is the difference between simple and compound interest?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                Simple interest is calculated only on the principal, whereas compound interest includes interest on accumulated interest.
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

            var amountRange = document.getElementById('siAmountRange');
            var amountInput = document.getElementById('siAmountInput');
            var rateRange = document.getElementById('siRateRange');
            var rateInput = document.getElementById('siRateInput');
            var timeRange = document.getElementById('siTimeRange');
            var timeInput = document.getElementById('siTimeInput');

            var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
            var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;
            var timeField = timeRange ? timeRange.closest('.investment-slider-field') : null;

            var summaryPrincipal = document.getElementById('siSummaryPrincipal');
            var summaryInterest = document.getElementById('siSummaryInterest');
            var summaryTotal = document.getElementById('siSummaryTotal');
            var donutCenterValue = document.getElementById('siDonutCenterValue');
            var formulaComputation = document.getElementById('siFormulaComputation');
            var formulaTotalLine = document.getElementById('siFormulaTotalLine');

            var siModernDonutChart = null;

            function clamp(n, min, max) {
                if (!isFinite(n)) return min;
                return Math.min(max, Math.max(min, n));
            }

            function formatINR0(num) {
                var n = Number(num);
                if (!isFinite(n)) return '₹0';
                return '₹' + Math.round(n).toLocaleString('en-IN');
            }

            function formatINRDigits(n) {
                var x = Number(n);
                if (!isFinite(x)) return '0';
                return Math.round(x).toLocaleString('en-IN');
            }

            function snapAmount(v) {
                var step = AMOUNT_STEP > 0 ? AMOUNT_STEP : 1000;
                return Math.round(Number(v) / step) * step;
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

            function readAmount() {
                return clamp(snapAmount(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
            }

            function readRate() {
                return clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
            }

            function readTime() {
                return clamp(Math.round(Number(timeRange.value)), MIN_TIME, MAX_TIME);
            }

            function computeSI() {
                var principal = readAmount();
                var rate = readRate();
                var years = readTime();
                var interest = (principal * rate * years) / 100;
                var total = principal + interest;
                return { principal: principal, rate: rate, years: years, interest: interest, total: total };
            }

            function rateDisplay(r) {
                var s = Number(r).toFixed(1);
                return s.replace(/\.0$/, '');
            }

            function updateFormulaLines(r) {
                if (!formulaComputation || !formulaTotalLine) return;
                var pStr = formatINRDigits(r.principal);
                var siStr = formatINRDigits(Math.round(r.interest));
                formulaComputation.innerHTML =
                    '= (₹' + pStr + ' × ' + rateDisplay(r.rate) + '% × ' + r.years + ' yr) ÷ 100 = <strong>' + formatINR0(r.interest) + '</strong>';
                formulaTotalLine.innerHTML =
                    'Total amount = ₹' + pStr + ' + ₹' + siStr + ' = <strong>' + formatINR0(r.total) + '</strong>';
            }

            function ensureModernDonut() {
                if (siModernDonutChart || typeof ApexCharts === 'undefined') return;
                var el = document.getElementById('siModernDonutChart');
                if (!el) return;
                var r = computeSI();
                siModernDonutChart = new ApexCharts(el, {
                    series: [Math.max(0, r.principal), Math.max(0, r.interest)],
                    chart: { type: 'donut', height: 285, animations: { enabled: true, easing: 'easeinout', speed: 450 } },
                    labels: ['Principal amount', 'Total interest'],
                    colors: ['#0d9488', '#5eead4'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    tooltip: { y: { formatter: function (val) { return formatINR0(val); } } },
                    plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
                });
                siModernDonutChart.render();
            }

            function updateModernSummary(animateChart) {
                var r = computeSI();
                if (summaryPrincipal) summaryPrincipal.textContent = formatINR0(r.principal);
                if (summaryInterest) summaryInterest.textContent = formatINR0(r.interest);
                if (summaryTotal) summaryTotal.textContent = formatINR0(r.total);
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(r.total);
                updateFormulaLines(r);
                ensureModernDonut();
                if (siModernDonutChart) {
                    siModernDonutChart.updateSeries([Math.max(0, r.principal), Math.max(0, r.interest)], animateChart !== false);
                }
            }

            function bindWhenReady() {
                if (document.body.dataset.siModernBound === '1') {
                    return true;
                }
                if (!amountRange || !amountInput || !rateRange || !rateInput || !timeRange || !timeInput) {
                    return false;
                }
                document.body.dataset.siModernBound = '1';

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

                var faqRows = document.querySelectorAll('.stepup-faq-row[data-si-faq]');
                faqRows.forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        var idx = btn.getAttribute('data-si-faq');
                        var panel = document.getElementById('si-faq-panel-' + idx);
                        var expanded = btn.getAttribute('aria-expanded') === 'true';

                        faqRows.forEach(function (otherBtn) {
                            var otherIdx = otherBtn.getAttribute('data-si-faq');
                            var otherPanel = document.getElementById('si-faq-panel-' + otherIdx);
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
