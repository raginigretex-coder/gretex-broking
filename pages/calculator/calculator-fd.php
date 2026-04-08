<?php

/**
 * Fixed Deposit Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Fixed Deposit Calculator - Gretex Financial';
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
                <h1 class="calculator-page-title">Fixed Deposit Calculator</h1>
                <p class="calculator-page-description">Estimate maturity on fixed deposits in seconds. Choose <strong>years</strong>, <strong>months</strong>, or <strong>days</strong> for tenure; amounts from &#8377;5,000 up to &#8377;1 crore on the slider. See below for how totals are calculated.</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc investment-modern-calc--fd" aria-label="Fixed deposit calculator">
                <div class="investment-tabs" aria-label="Current calculator">
                    <button type="button" class="investment-tab is-active" aria-current="page">FD</button>
                </div>

                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="fdAmountRange">Total investment</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="fdAmountErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">₹</span>
                                        <input type="text" class="pill-input" id="fdAmountInput" value="1,00,000" inputmode="numeric" aria-label="Total investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="fdAmountRange" min="5000" max="10000000" step="500" value="100000" aria-label="Total investment slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="fdRateRange">Rate of interest (p.a)</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="fdRateErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="fdRateInput" min="1" max="15" step="0.1" value="6.5" inputmode="decimal" aria-label="Interest rate per annum" />
                                        <span class="pill-unit">%</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="fdRateRange" min="1" max="15" step="0.1" value="6.5" aria-label="Interest rate slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <div class="investment-label-with-unit">
                                    <label class="investment-slider-label" for="fdTimeRange">Time period</label>
                                    <select id="fdTimeUnit" class="investment-period-unit-select" aria-label="Time period unit">
                                        <option value="years" selected>Years</option>
                                        <option value="months">Months</option>
                                        <option value="days">Days</option>
                                    </select>
                                </div>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="fdTimeErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="fdTimeInput" min="1" max="10" step="1" value="5" inputmode="numeric" aria-label="Time period value" />
                                        <span class="pill-unit" id="fdTimePillUnit">Yr</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="fdTimeRange" min="1" max="10" step="1" value="5" aria-label="Time period slider" />
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
                                    <div class="quickbar-value" id="fdSummaryInvested">₹0</div>
                                </div>
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-returns"></span>
                                        <span class="quickbar-label">Est. returns</span>
                                    </div>
                                    <div class="quickbar-value quickbar-returns-value" id="fdSummaryReturns">₹0</div>
                                </div>
                                <div class="quickbar-total">
                                    <div class="quickbar-total-label">Total value</div>
                                    <div class="quickbar-total-value" id="fdSummaryTotal">₹0</div>
                                </div>
                            </div>
                            <div class="investment-donut-wrap">
                                <div id="fdPreviewDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Maturity Value</div>
                                    <div class="investment-donut-center-value" id="fdDonutCenterValue">₹0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="investment-summary-cta">
                    <button type="button" class="investment-cta" id="fdInvestNowBtn">INVEST NOW</button>
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

                        <h3 class="calculator-info-title">Purpose and Use of an FD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The FD calculator assists investors in understanding the potential returns from a fixed deposit investment.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate maturity value for different tenures</li>
                                <li>Compare interest rates across institutions</li>
                                <li>Assess the impact of compounding frequency</li>
                                <li>Support short-term and medium-term financial planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Types of Fixed Deposits</h3>
                        <div class="calculator-info-content">
                            <p>Fixed deposits are generally classified based on how interest is calculated and paid:</p>
                            <ul style="margin-left: 14px;">
                                <li><strong>Simple Interest FD</strong> - Interest is calculated only on the principal amount</li>
                                <li><strong>Compound Interest FD (Cumulative FD)</strong> - Interest is compounded periodically and added to the principal</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does an FD Calculator Work?</h3>
                        <div class="calculator-info-content">
                            <p>The calculation of FD returns depends on whether interest is applied on a simple or compound basis.</p>

                            <p><strong>1. Simple Interest FD</strong></p>
                            <p>For simple interest, the maturity value is calculated as:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                <span style="font-style:italic;">M</span> =
                                <span style="font-style:italic;">P</span>
                                +
                                <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                    <span style="display:block; border-bottom:2px solid #000000; padding:0 6px;">
                                        <span style="font-style:italic;">P</span> ×
                                        <span style="font-style:italic;">r</span> ×
                                        <span style="font-style:italic;">t</span>
                                    </span>
                                    <span style="display:block; font-size:16px;">100</span>
                                </span>
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul>
                                <li><strong>M</strong> = Maturity amount</li>
                                <li><strong>P</strong> = Principal amount</li>
                                <li><strong>r</strong> = Rate of interest</li>
                                <li><strong>t</strong> = Tenure (in years)</li>
                            </ul>

                            <p><strong>2. Compound Interest FD</strong></p>
                            <p>For compound interest, the maturity value is calculated as:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                M = P (1 +
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
                                <li><strong>M</strong> = Maturity amount</li>
                                <li><strong>P</strong> = Principal amount</li>
                                <li><strong>r</strong> = Annual interest rate</li>
                                <li><strong>n</strong> = Compounding frequency</li>
                                <li><strong>t</strong> = Tenure (in years)</li>
                            </ul>

                            <p><strong>Examples</strong></p>
                            <p><strong>Simple Interest Example</strong></p>
                            <p>Investment: Rs.1,00,000</p>
                            <p>Tenure: 5 years</p>
                            <p>Interest rate: 10%</p>
                            <p>Estimated maturity value:</p>
                            <p><strong>Rs.1,50,000</strong></p>

                            <p><strong>Compound Interest Example</strong></p>
                            <p>Investment: Rs.1,00,000</p>
                            <p>Tenure: 5 years</p>
                            <p>Interest rate: 10%</p>
                            <p>Compounding: Annual</p>
                            <p>Estimated maturity value:</p>
                            <p><strong>Rs.1,61,051 (approx.)</strong></p>
                        </div>


                        <h3 class="calculator-info-title">How to Use the FD Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate FD returns:</p>
                            <ol>
                                <li>Enter the deposit amount</li>
                                <li>Select the investment tenure</li>
                                <li>Input the interest rate</li>
                                <li>Choose compounding frequency (if applicable)</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Interest earned</li>
                                        <li>Total maturity value</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the FD Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides quick estimates without manual calculations</li>
                                <li>Helps compare different investment scenarios</li>
                                <li>Assists in planning for fixed-income requirements</li>
                                <li>Offers clarity on expected returns</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Interest rates vary across banks and NBFCs</li>
                                <li>Premature withdrawal may attract penalties</li>
                                <li>Higher compounding frequency generally increases returns</li>
                                <li>Interest earned on FDs is taxable as per applicable laws</li>
                                <li>The calculator provides indicative values and does not account for taxes or penalties</li>
                            </ul>
                        </div>


                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="FD calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">Is the FD calculator accurate?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                It provides estimates based on the inputs provided. Actual returns depend on the institution's terms.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">What is the difference between simple and compound FD?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                Simple interest is calculated only on the principal, while compound interest includes interest on accumulated interest.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Can I withdraw FD before maturity?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                Yes, but it may involve a penalty or reduced interest rate.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Is FD interest taxable?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                Yes, interest earned is generally taxable as per applicable income tax rules.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Does compounding frequency affect returns?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                Yes, more frequent compounding results in higher maturity value.
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

    /** Years/months: quarterly growwFdBreakdown. Days handled separately via growwFdBreakdownDays. */
    function fdBreakdownForPreview(principal, ratePct, yearsDecimal) {
        if (typeof window.growwFdBreakdown === 'function') {
            return window.growwFdBreakdown(principal, ratePct, yearsDecimal);
        }
        const p = Math.round(Number(principal));
        const raw = p * Math.pow(1 + (Number(ratePct) / 100) / 4, 4 * Number(yearsDecimal));
        const totalValue = Math.round(raw);
        return {
            invested: p,
            returns: totalValue - p,
            totalValue
        };
    }

    function fdBreakdownDaysPreview(principal, ratePct, daysCount) {
        if (typeof window.growwFdBreakdownDays === 'function') {
            return window.growwFdBreakdownDays(principal, ratePct, daysCount);
        }
        const p = Math.round(Number(principal));
        const R = Number(ratePct);
        const d = Number(daysCount);
        const num = typeof window.FD_DAY_INTEREST_NUM === 'number' ? window.FD_DAY_INTEREST_NUM : 7;
        const den = typeof window.FD_DAY_INTEREST_DEN === 'number' ? window.FD_DAY_INTEREST_DEN : 250000;
        const returns = Math.round((p * R * d * num) / den);
        return {
            invested: p,
            returns,
            totalValue: p + returns
        };
    }

    let fdPreviewDonut = null;

    (function initFdModernUi() {
        const root = document.querySelector('.investment-modern-calc--fd');
        if (!root) return;

        const amountRange = document.getElementById('fdAmountRange');
        const amountInput = document.getElementById('fdAmountInput');
        const rateRange = document.getElementById('fdRateRange');
        const rateInput = document.getElementById('fdRateInput');
        const timeRange = document.getElementById('fdTimeRange');
        const timeInput = document.getElementById('fdTimeInput');
        const timeUnit = document.getElementById('fdTimeUnit');
        const timePillUnit = document.getElementById('fdTimePillUnit');
        const amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
        const rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;
        const timeField = timeRange ? timeRange.closest('.investment-slider-field') : null;

        const summaryInvested = document.getElementById('fdSummaryInvested');
        const summaryReturns = document.getElementById('fdSummaryReturns');
        const summaryTotal = document.getElementById('fdSummaryTotal');
        const donutCenterValue = document.getElementById('fdDonutCenterValue');
        const investNowBtn = document.getElementById('fdInvestNowBtn');

        const MIN_AMOUNT = 5000;
        const MAX_AMOUNT = 10000000;
        const AMOUNT_STEP = 500;
        const MIN_RATE = 1;
        const MAX_RATE = 15;
        const MIN_YEARS = 1;
        const MAX_YEARS = 10;
        const MIN_MONTHS = 1;
        const MAX_MONTHS = 120;
        const MIN_DAYS = 1;
        const MAX_DAYS = 3650;
        const DAYS_PER_YEAR = 365;

        function clamp(n, min, max) {
            if (!Number.isFinite(n)) return min;
            return Math.min(max, Math.max(min, n));
        }

        function formatINR0(num) {
            const n = Number(num);
            if (!Number.isFinite(n)) return '₹0';
            return '₹' + Math.round(n).toLocaleString('en-IN');
        }

        function formatINRDigits(n) {
            const x = Number(n);
            if (!Number.isFinite(x)) return '0';
            return Math.round(x).toLocaleString('en-IN');
        }

        function snapAmount(v) {
            return Math.round(Number(v) / AMOUNT_STEP) * AMOUNT_STEP;
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
            const min = Number(rangeEl.min);
            const max = Number(rangeEl.max);
            const percent = ((value - min) / (max - min)) * 100;
            rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
        }

        function getTimeMode() {
            const u = timeUnit && timeUnit.value;
            if (u === 'months') return 'months';
            if (u === 'days') return 'days';
            return 'years';
        }

        function getYearsDecimal() {
            const t = Math.round(Number(timeInput.value));
            const mode = getTimeMode();
            if (!Number.isFinite(t)) {
                if (mode === 'months') return MIN_MONTHS / 12;
                if (mode === 'days') return MIN_DAYS / DAYS_PER_YEAR;
                return MIN_YEARS;
            }
            if (typeof window.fdTenureToGrowwYears === 'function') {
                return window.fdTenureToGrowwYears(t, mode);
            }
            if (mode === 'months') return t / 12;
            if (mode === 'days') return t / DAYS_PER_YEAR;
            return t;
        }

        function computePreview() {
            const amount = clamp(snapAmount(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
            const rate = clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
            const mode = getTimeMode();
            const tRaw = Math.round(Number(timeInput.value));
            const t = Number.isFinite(tRaw) ? tRaw : (mode === 'days' ? MIN_DAYS : mode === 'months' ? MIN_MONTHS : MIN_YEARS);
            let g;
            let years;
            if (mode === 'days') {
                const d = clamp(t, MIN_DAYS, MAX_DAYS);
                g = fdBreakdownDaysPreview(amount, rate, d);
                years = d / DAYS_PER_YEAR;
            } else {
                years = getYearsDecimal();
                g = fdBreakdownForPreview(amount, rate, years);
            }
            return {
                amount,
                rate,
                years,
                invested: g.invested,
                returns: g.returns,
                totalValue: g.totalValue
            };
        }

        function ensurePreviewDonut() {
            if (fdPreviewDonut || typeof ApexCharts === 'undefined') return;
            const el = document.getElementById('fdPreviewDonutChart');
            if (!el) return;
            const d = computePreview();
            fdPreviewDonut = new ApexCharts(el, {
                series: [Math.max(0, d.invested), Math.max(0, d.returns)],
                chart: {
                    type: 'donut',
                    height: 285
                },
                labels: ['Invested amount', 'Est. returns'],
                colors: ['#F97316', '#3B6DFF'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                stroke: {
                    show: false
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
            fdPreviewDonut.render();
        }

        function updatePreview(animate) {
            const d = computePreview();
            if (summaryInvested) summaryInvested.textContent = formatINR0(d.invested);
            if (summaryReturns) summaryReturns.textContent = formatINR0(d.returns);
            if (summaryTotal) summaryTotal.textContent = formatINR0(d.totalValue);
            if (donutCenterValue) donutCenterValue.textContent = formatINR0(d.totalValue);
            ensurePreviewDonut();
            if (fdPreviewDonut) {
                fdPreviewDonut.updateSeries([Math.max(0, d.invested), Math.max(0, d.returns)], animate !== false);
            }
        }

        function applyTimeUnitUi() {
            const mode = getTimeMode();
            if (mode === 'months') {
                timeRange.min = MIN_MONTHS;
                timeRange.max = MAX_MONTHS;
                timeRange.step = 1;
                timeInput.min = MIN_MONTHS;
                timeInput.max = MAX_MONTHS;
                if (timePillUnit) timePillUnit.textContent = 'Mo';
                let m = Math.round(Number(timeInput.value));
                if (!Number.isFinite(m)) m = MIN_MONTHS;
                m = clamp(m, MIN_MONTHS, MAX_MONTHS);
                timeRange.value = m;
                timeInput.value = m;
            } else if (mode === 'days') {
                timeRange.min = MIN_DAYS;
                timeRange.max = MAX_DAYS;
                timeRange.step = 1;
                timeInput.min = MIN_DAYS;
                timeInput.max = MAX_DAYS;
                if (timePillUnit) timePillUnit.textContent = 'D';
                let d = Math.round(Number(timeInput.value));
                if (!Number.isFinite(d)) d = MIN_DAYS;
                d = clamp(d, MIN_DAYS, MAX_DAYS);
                timeRange.value = d;
                timeInput.value = d;
            } else {
                timeRange.min = MIN_YEARS;
                timeRange.max = MAX_YEARS;
                timeRange.step = 1;
                timeInput.min = MIN_YEARS;
                timeInput.max = MAX_YEARS;
                if (timePillUnit) timePillUnit.textContent = 'Yr';
                let y = Math.round(Number(timeInput.value));
                if (!Number.isFinite(y)) y = MIN_YEARS;
                y = clamp(y, MIN_YEARS, MAX_YEARS);
                timeRange.value = y;
                timeInput.value = y;
            }
            setRangeFill(timeRange, Number(timeRange.value));
        }

        /**
         * Groww-style: changing Years / Months / Days keeps the same numeral when it fits
         * the new range (e.g. 5 → 5 → 5), only clamping if out of bounds — no ×12 / ×365 conversion.
         */
        function timeBoundsForMode(mode) {
            if (mode === 'months') return {
                min: MIN_MONTHS,
                max: MAX_MONTHS,
                def: MIN_MONTHS
            };
            if (mode === 'days') return {
                min: MIN_DAYS,
                max: MAX_DAYS,
                def: MIN_DAYS
            };
            return {
                min: MIN_YEARS,
                max: MAX_YEARS,
                def: MIN_YEARS
            };
        }

        function onTimeUnitChange() {
            if (!timeUnit || !timeRange || !timeInput) return;
            const mode = getTimeMode();
            const {
                min,
                max,
                def
            } = timeBoundsForMode(mode);
            let v = Math.round(Number(timeInput.value));
            if (!Number.isFinite(v)) v = def;
            v = clamp(v, min, max);
            timeInput.value = v;
            timeUnit.dataset.prevUnit = mode;
            applyTimeUnitUi();
            setTimeError(false);
            updatePreview(true);
        }

        amountRange.addEventListener('input', function() {
            let v = clamp(snapAmount(amountRange.value), MIN_AMOUNT, MAX_AMOUNT);
            amountRange.value = v;
            amountInput.value = formatINRDigits(v);
            setAmountError(false);
            setRangeFill(amountRange, v);
            updatePreview(false);
        });
        amountRange.addEventListener('change', function() {
            updatePreview(true);
        });

        rateRange.addEventListener('input', function() {
            const v = clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
            const rounded = Math.round(v * 10) / 10;
            rateRange.value = rounded;
            rateInput.value = rounded;
            setRateError(false);
            setRangeFill(rateRange, rounded);
            updatePreview(false);
        });
        rateRange.addEventListener('change', function() {
            updatePreview(true);
        });

        timeRange.addEventListener('input', function() {
            const maxT = Number(timeRange.max);
            const minT = Number(timeRange.min);
            let v = Math.round(Number(timeRange.value));
            v = clamp(v, minT, maxT);
            timeRange.value = v;
            timeInput.value = v;
            setTimeError(false);
            setRangeFill(timeRange, v);
            updatePreview(false);
        });
        timeRange.addEventListener('change', function() {
            updatePreview(true);
        });

        amountInput.addEventListener('input', function() {
            const raw = String(amountInput.value || '');
            const digits = raw.replace(/[^\d]/g, '');
            if (!digits) {
                setAmountError(raw.trim() !== '');
                return;
            }
            const v = Number(digits);
            const invalid = v < MIN_AMOUNT || v > MAX_AMOUNT;
            setAmountError(invalid);
            const clamped = clamp(snapAmount(v), MIN_AMOUNT, MAX_AMOUNT);
            amountRange.value = clamped;
            setRangeFill(amountRange, clamped);
            amountInput.value = formatINRDigits(v);
            if (!invalid) updatePreview(false);
        });
        amountInput.addEventListener('change', function() {
            const raw = String(amountInput.value || '');
            const digits = raw.replace(/[^\d]/g, '');
            const v = digits ? Number(digits) : MIN_AMOUNT;
            const clamped = clamp(snapAmount(v), MIN_AMOUNT, MAX_AMOUNT);
            amountRange.value = clamped;
            amountInput.value = formatINRDigits(clamped);
            setAmountError(false);
            setRangeFill(amountRange, clamped);
            updatePreview(true);
        });

        rateInput.addEventListener('input', function() {
            const raw = String(rateInput.value || '');
            if (raw.trim() === '') {
                setRateError(true);
                return;
            }
            const v = Number(rateInput.value);
            if (!Number.isFinite(v)) {
                setRateError(true);
                return;
            }
            const invalid = v < MIN_RATE || v > MAX_RATE;
            setRateError(invalid);
            const rounded = Math.round(clamp(v, MIN_RATE, MAX_RATE) * 10) / 10;
            rateRange.value = rounded;
            setRangeFill(rateRange, rounded);
            if (!invalid) updatePreview(false);
        });
        rateInput.addEventListener('change', function() {
            const raw = String(rateInput.value || '');
            const v = raw.trim() === '' ? MIN_RATE : Number(raw);
            const safe = Number.isFinite(v) ? v : MIN_RATE;
            const rounded = Math.round(clamp(safe, MIN_RATE, MAX_RATE) * 10) / 10;
            rateRange.value = rounded;
            rateInput.value = rounded;
            setRateError(false);
            setRangeFill(rateRange, rounded);
            updatePreview(true);
        });

        timeInput.addEventListener('input', function() {
            const raw = String(timeInput.value || '');
            if (raw.trim() === '') {
                setTimeError(true);
                return;
            }
            const v = Math.round(Number(timeInput.value));
            if (!Number.isFinite(v)) {
                setTimeError(true);
                return;
            }
            const minT = Number(timeInput.min);
            const maxT = Number(timeInput.max);
            const invalid = v < minT || v > maxT;
            setTimeError(invalid);
            const clamped = clamp(v, minT, maxT);
            timeRange.value = clamped;
            setRangeFill(timeRange, clamped);
            if (!invalid) updatePreview(false);
        });
        timeInput.addEventListener('change', function() {
            const raw = String(timeInput.value || '');
            const minT = Number(timeInput.min);
            const maxT = Number(timeInput.max);
            const v = raw.trim() === '' ? minT : Math.round(Number(raw));
            const safe = Number.isFinite(v) ? v : minT;
            const clamped = clamp(safe, minT, maxT);
            timeRange.value = clamped;
            timeInput.value = clamped;
            setTimeError(false);
            setRangeFill(timeRange, clamped);
            updatePreview(true);
        });

        if (timeUnit) {
            timeUnit.dataset.prevUnit = 'years';
            timeUnit.addEventListener('change', onTimeUnitChange);
        }

        if (investNowBtn) {
            investNowBtn.addEventListener('click', function() {
                updatePreview(true);
                const target = document.querySelector('.calculator-wrapper') ||
                    document.querySelector('.calculator-info-section');
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        }

        setRangeFill(amountRange, Number(amountRange.value));
        amountInput.value = formatINRDigits(Number(amountRange.value));
        setRangeFill(rateRange, Number(rateRange.value));
        applyTimeUnitUi();

        let apexWait = 0;
        (function waitForApex() {
            updatePreview(false);
            if (typeof ApexCharts === 'undefined') {
                apexWait += 1;
                if (apexWait < 80) setTimeout(waitForApex, 60);
                return;
            }
            ensurePreviewDonut();
        })();
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