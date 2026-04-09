<?php
/**
 * Post Office FD Calculator - Gretex Financial
 * Groww-like functionality with Gretex layout.
 */

$pageTitle = 'Post Office FD Calculator - Gretex Financial';
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
                <h1 class="calculator-page-title">Post Office FD Calculator</h1>
                <p class="calculator-page-description">Estimate maturity with quarterly compounding using Groww-style live inputs in the Gretex calculator layout.</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc investment-modern-calc--pofd" aria-label="Post Office FD calculator">
                <div class="investment-tabs" aria-label="Calculator type">
                    <button type="button" class="investment-tab is-active" aria-current="page">Post Office FD</button>
                </div>

                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Post Office FD inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="pofdAmountRange">Total investment</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="pofdAmountErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">&#8377;</span>
                                        <input type="text" class="pill-input" id="pofdAmountInput" value="100000" inputmode="numeric" autocomplete="off" aria-label="Total investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="pofdAmountRange" min="5000" max="10000000" step="1000" value="100000" aria-label="Total investment slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="pofdRateRange">Rate of interest (p.a)</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="pofdRateErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input pill-input--narrow" id="pofdRateInput" min="1" max="15" step="0.1" value="6.5" inputmode="decimal" aria-label="Interest rate percentage" />
                                        <span class="pill-unit">%</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="pofdRateRange" min="1" max="15" step="0.1" value="6.5" aria-label="Interest rate slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <div class="investment-label-with-unit">
                                    <label class="investment-slider-label" for="pofdPeriodRange">Time period</label>
                                    <label class="sr-only" for="pofdPeriodUnit">Time period unit</label>
                                    <select id="pofdPeriodUnit" class="investment-period-unit-select" aria-label="Time period unit">
                                        <option value="years" selected>Years</option>
                                        <option value="months">Months</option>
                                        <option value="days">Days</option>
                                    </select>
                                </div>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="pofdPeriodErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input pill-input--narrow" id="pofdPeriodInput" min="1" max="25" step="1" value="5" inputmode="numeric" aria-label="Time period value" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="pofdPeriodRange" min="1" max="25" step="1" value="5" aria-label="Time period slider" />
                        </div>
                    </div>

                    <div class="investment-visual" aria-label="Post Office FD result visualization">
                        <div class="investment-donut-card investment-donut-card--pofd">
                            <div class="ssy-groww-results investment-ssy-summary-top" aria-label="Post Office FD summary">
                                <div class="ssy-summary-list">
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">Invested amount</span>
                                        <span class="ssy-summary-value" id="pofdSummaryInvested">&#8377;0</span>
                                    </div>
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">Est. returns</span>
                                        <span class="ssy-summary-value ssy-summary-value--interest" id="pofdSummaryInterest">&#8377;0</span>
                                    </div>
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">Rate used</span>
                                        <span class="ssy-summary-value" id="pofdSummaryRate">0%</span>
                                    </div>
                                    <div class="ssy-summary-row ssy-summary-row--maturity">
                                        <span class="ssy-summary-label">Total value</span>
                                        <span class="ssy-summary-value" id="pofdSummaryMaturity">&#8377;0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="investment-donut-wrap">
                                <div id="pofdDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Total value</div>
                                    <div class="investment-donut-center-value" id="pofdDonutCenterValue">&#8377;0</div>
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
                        <h3 class="calculator-info-title">Post Office FD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>Post Office Fixed Deposit (FD), also known as Post Office Time Deposit, is a government-backed savings instrument that offers fixed returns over a specified tenure. It is considered a low-risk investment option suitable for capital preservation and stable income generation.</p>
                            <p>A Post Office FD Calculator is a financial tool used to estimate the maturity value and interest earned on deposits made under this scheme.</p>
                        </div>

                        <h3 class="calculator-info-title">What is a Post Office FD Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>A Post Office FD Calculator is an online utility that helps investors estimate the returns on their fixed deposit investments with India Post.</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Deposit amount</li>
                                <li>Investment tenure</li>
                                <li>Applicable interest rate</li>
                            </ul>
                            <p>the calculator computes:</p>
                            <ul style="margin-left: 14px;">
                                <li>Total interest earned</li>
                                <li>Maturity value at the end of the tenure</li>
                            </ul>
                            <p>The results are indicative and based on the prevailing interest rates notified periodically.</p>

                        </div>

                        <h3 class="calculator-info-title">What is a Post Office FD?</h3>
                        <div class="calculator-info-content">
                            <p>A Post Office Fixed Deposit is a government-supported term deposit scheme with predefined tenure options and fixed interest rates.</p>
                            <p>Key characteristics include:</p>
                            <ul style="margin-left: 14px;">
                                <li>Backed by the Government of India</li>
                                <li>Fixed tenure options (typically 1, 2, 3, and 5 years)</li>
                                <li>Interest rates revised periodically</li>
                                <li>Interest compounded at regular intervals</li>
                                <li>Suitable for low-risk investors</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of a Post Office FD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The calculator assists investors in understanding the potential returns from their fixed deposit investments.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate maturity value for different tenures</li>
                                <li>Compare returns under varying interest rates</li>
                                <li>Plan fixed-income investments</li>
                                <li>Support goal-based financial planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does a Post Office FD Calculator Work?</h3>
                        <div class="calculator-info-content">
                            <p>The Post Office FD calculator uses the compound interest formula to estimate the maturity value of the investment:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                
                                A = P 
                                <span style="font-size:28px; vertical-align:middle;">(</span>
                                
                                1 + 
                                <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                    <span style="display:block; border-bottom:2px solid #000; padding:0 4px;">
                                    r
                                    </span>
                                    <span style="display:block; font-size:14px;">n</span>
                                </span>
                                
                                <span style="font-size:28px; vertical-align:middle;">)</span>
                                <sup>nt</sup>
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>A</strong> = Maturity amount</li>
                                <li><strong>P</strong> = Principal amount</li>
                                <li><strong>r</strong> = Annual rate of interest</li>
                                <li><strong>n</strong> = Compounding frequency</li>
                                <li><strong>t</strong> = Investment tenure</li>
                            </ul>
                            <p>In Post Office FDs, interest is typically compounded periodically (e.g., quarterly), which enhances the effective return.</p>

                            <p><strong>Example</strong></p>
                            <p>Assume:</p>
                            <ul style="margin-left: 14px;">
                                <li>Investment amount: &#8377;1,00,000</li>
                                <li>Tenure: 3 years</li>
                                <li>Interest rate: 6.9%</li>
                                <li>Compounding: Annual</li>
                            </ul>
                            <p>Estimated maturity value:</p>
                            <p><strong>&#8377;1,22,781 (approx.)</strong></p>
                            <p>This includes both the principal and accumulated interest.</p>
                        </div>

                        <h3 class="calculator-info-title">How to Use the Post Office FD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate returns:</p>
                            <ol>
                                <li>Enter the deposit amount</li>
                                <li>Select the investment tenure</li>
                                <li>Input the applicable interest rate</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Total interest earned</li>
                                        <li>Maturity value</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides quick and accurate estimates</li>
                                <li>Eliminates manual calculation complexity</li>
                                <li>Helps compare different tenure options</li>
                                <li>Supports structured financial planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Features of Post Office FD</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Government-backed investment</li>
                                <li>Fixed and predictable returns</li>
                                <li>Flexible tenure options</li>
                                <li>Quarterly compounding of interest</li>
                                <li>Minimum investment requirement (typically &#8377;1,000)</li>
                                <li>Tax benefits available for 5-year deposits under Section 80C (subject to applicable provisions)</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Factors Affecting Returns</h3>
                        <div class="calculator-info-content">
                            <p>The maturity value of a Post Office FD depends on:</p>
                            <ul style="margin-left: 14px;">
                                <li>Investment amount</li>
                                <li>Tenure</li>
                                <li>Interest rate applicable at the time of investment</li>
                                <li>Compounding frequency</li>
                                <li>Premature withdrawal conditions</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Interest rates are revised periodically</li>
                                <li>Premature withdrawal may attract penalties</li>
                                <li>Interest earned is taxable as per applicable laws</li>
                                <li>The calculator provides indicative values and does not account for:
                                    <ul style="margin-left: 20px;">
                                        <li>Taxes</li>
                                        <li>Penalties</li>
                                        <li>Changes in interest rates</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="Post Office FD calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">Is Post Office FD a safe investment?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                Yes, it is backed by the Government of India.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">What is the tenure of Post Office FD?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                Typically available for 1, 2, 3, and 5 years.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Is interest compounded?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                Yes, interest is compounded periodically.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Are there tax benefits?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                5-year Post Office FD may qualify for deduction under Section 80C, subject to applicable limits.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Does the calculator include tax calculations?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                No, it provides pre-tax estimates only.
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

        var MIN_AMOUNT = 5000;
        var MAX_AMOUNT = 10000000;
        var AMOUNT_STEP = 1000;
        var MIN_RATE = 1;
        var MAX_RATE = 15;
        var YEAR_MIN = 1;
        var YEAR_MAX = 25;
        var MONTH_MIN = 1;
        var MONTH_MAX = 11;
        var DAY_MIN = 1;
        var DAY_MAX = 31;
        var COMPOUNDING = 4;

        var amountRange = document.getElementById('pofdAmountRange');
        var amountInput = document.getElementById('pofdAmountInput');
        var rateRange = document.getElementById('pofdRateRange');
        var rateInput = document.getElementById('pofdRateInput');
        var periodRange = document.getElementById('pofdPeriodRange');
        var periodInput = document.getElementById('pofdPeriodInput');
        var periodUnit = document.getElementById('pofdPeriodUnit');

        var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
        var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;
        var periodField = periodRange ? periodRange.closest('.investment-slider-field') : null;

        var summaryInvested = document.getElementById('pofdSummaryInvested');
        var summaryInterest = document.getElementById('pofdSummaryInterest');
        var summaryRate = document.getElementById('pofdSummaryRate');
        var summaryMaturity = document.getElementById('pofdSummaryMaturity');
        var donutCenterValue = document.getElementById('pofdDonutCenterValue');

        var pofdDonutChart = null;

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
            if (periodUnit && periodUnit.value === 'months') {
                return { min: MONTH_MIN, max: MONTH_MAX, step: 1 };
            }
            if (periodUnit && periodUnit.value === 'days') {
                return { min: DAY_MIN, max: DAY_MAX, step: 1 };
            }
            return { min: YEAR_MIN, max: YEAR_MAX, step: 1 };
        }

        function readPeriodValue() {
            var bounds = getPeriodBounds();
            return clamp(Math.round(Number(periodRange.value)), bounds.min, bounds.max);
        }

        function getYears() {
            var value = readPeriodValue();
            if (periodUnit && periodUnit.value === 'months') return value / 12;
            if (periodUnit && periodUnit.value === 'days') return value / 365;
            return value;
        }

        function computePOFD() {
            var principal = Math.round(readAmount());
            var annualRate = readRate();
            var maturityValue;
            var estimatedReturns;

            if (periodUnit && periodUnit.value === 'days') {
                estimatedReturns = Math.round((principal * annualRate * readPeriodValue() * 7) / 250000);
                maturityValue = principal + estimatedReturns;
            } else if (periodUnit && periodUnit.value === 'months') {
                var months = readPeriodValue();
                var averageDaysPerMonth = 30.66;
                estimatedReturns = Math.round((principal * annualRate * months * averageDaysPerMonth) / 36500);
                maturityValue = principal + estimatedReturns;
            } else {
                var years = getYears();
                var rawMaturityValue = principal * Math.pow(1 + (annualRate / 100 / COMPOUNDING), COMPOUNDING * years);
                maturityValue = Math.round(rawMaturityValue);
                estimatedReturns = maturityValue - principal;
            }

            return {
                investedAmount: principal,
                estimatedReturns: estimatedReturns,
                maturityValue: maturityValue,
                annualRate: annualRate
            };
        }

        function ensureChart() {
            if (pofdDonutChart || typeof ApexCharts === 'undefined') return;
            var chartElement = document.getElementById('pofdDonutChart');
            if (!chartElement) return;

            var result = computePOFD();

            pofdDonutChart = new ApexCharts(chartElement, {
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
                dataLabels: { enabled: false },
                legend: { show: false },
                stroke: { show: false },
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
                            labels: { show: false }
                        }
                    }
                }
            });

            pofdDonutChart.render();
        }

        function updateSummary(animateChart) {
            var result = computePOFD();

            if (summaryInvested) summaryInvested.textContent = formatINR(result.investedAmount);
            if (summaryInterest) summaryInterest.textContent = formatINR(result.estimatedReturns);
            if (summaryRate) summaryRate.textContent = result.annualRate.toFixed(1).replace(/\.0$/, '') + '%';
            if (summaryMaturity) summaryMaturity.textContent = formatINR(result.maturityValue);
            if (donutCenterValue) donutCenterValue.textContent = formatINR(result.maturityValue);

            ensureChart();
            if (pofdDonutChart) {
                pofdDonutChart.updateSeries(
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
            if (document.body.dataset.pofdModernBound === '1') return true;
            if (!amountRange || !amountInput || !rateRange || !rateInput || !periodRange || !periodInput || !periodUnit) return false;

            document.body.dataset.pofdModernBound = '1';

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
