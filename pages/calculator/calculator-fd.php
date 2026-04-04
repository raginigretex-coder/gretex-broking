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
                            <h2 class="calculator-info-title">About Fixed Deposit Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Fixed Deposit (FD) Calculator</strong> helps you project maturity value and interest on lump-sum FDs. Fixed deposits are widely used in India for predictable returns and capital safety, especially for conservative investors and senior citizens.</p>
                                <h3>How this calculator works</h3>
                                <p><strong>Years or months:</strong> We use <strong>quarterly compounding</strong> (four times per year), which is common for cumulative bank FDs:</p>
                                <p><strong>Maturity A = P &#215; (1 + r/4)<sup>4t</sup></strong>, where <em>P</em> is principal (rounded to whole rupees), <em>r</em> is annual interest as a decimal (rate % &#247; 100), and <em>t</em> is time in <strong>years</strong> (for months, <em>t = months &#247; 12</em>). Maturity is rounded to the nearest rupee; <strong>estimated returns = A &#8722; P</strong>.</p>
                                <p><strong>Days:</strong> Very short tenures use a <strong>linear</strong> estimate so results scale evenly with principal (e.g. same rate and days on &#8377;1 lakh vs &#8377;1 crore):</p>
                                <p><strong>Est. returns = round(P &#215; R &#215; d &#215; 7 &#247; 250000)</strong>, where <em>R</em> is the quoted <strong>annual rate in percent</strong> (e.g. 6.5) and <em>d</em> is the number of days. <strong>Total value = P + est. returns</strong>.</p>
                                <p><strong>Time unit switch:</strong> If you change among years, months, and days, the same number is kept when it still fits the new range; otherwise it is clamped to valid min/max.</p>
                                <p><strong>Disclaimer:</strong> Actual bank FDs may use different day-count or rounding rules. Use this tool for estimates only; confirm with your bank.</p>
                                <h3>How FDs work (general)</h3>
                                <p><strong>Deposit:</strong> Banks often allow from about &#8377;1,000&#8211;&#8377;10,000 minimum; tenures from a few days to 10 years. Rates vary by tenure and institution. Senior citizens often get a small extra rate.</p>
                                <p><strong>Interest:</strong> Banks may compound quarterly, half-yearly, or yearly on cumulative FDs. TDS may apply if interest exceeds &#8377;40,000 in a year (&#8377;50,000 for senior citizens); Form 15G/15H can help when applicable.</p>
                                <p><strong>Withdrawal:</strong> Premature withdrawal is usually allowed with a penalty. Loan against FD is often available up to a large fraction of the deposit.</p>
                                <h3>Benefits &amp; features</h3>
                                <ul>
                                    <li>Predictable returns; DICGC insurance up to &#8377;5 lakh per depositor per bank (check current rules)</li>
                                    <li>Often materially higher than savings account rates</li>
                                    <li>Flexible tenures; optional payout frequencies on non-cumulative FDs</li>
                                    <li>Interest is generally taxable; tax-saver FDs (5-year lock-in) may qualify under Section 80C within limits</li>
                                </ul>
                                <h3>Who should use</h3>
                                <p>Anyone comparing lump-sum FD options, planning short- to medium-term goals, or parking funds with low volatility tolerance.</p>
                                <h3>Important considerations</h3>
                                <p><strong>Limitations:</strong> Post-tax returns may trail inflation; interest is usually taxable; breaking FD early reduces yield; opportunity cost versus growth assets.</p>
                                <div class="callout-box">
                                    <strong>Tips:</strong> Compare rates across banks; consider FD ladders for liquidity; split large amounts across banks if you rely on deposit insurance limits; verify compounding and TDS rules on your sanction letter.
                                </div>
                                <h3>Example (quarterly, years)</h3>
                                <p><strong>&#8377;5,00,000 for 3 years at 7% p.a. (quarterly):</strong> Maturity about &#8377;6,15,562; interest about &#8377;1,15,562. Actual figures depend on bank rules and rounding.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Why quarterly for years/months on this page?</p><p>Many cumulative FDs in India compound interest quarterly. This calculator uses that single convention for year- and month-based tenures so projections are easy to compare.</p></div>
                                <div class="faq-item"><p class="faq-q">Should I break my FD if rates rise?</p><p>Only if the new rate after penalty still beats staying put. Penalties vary by bank and tenure.</p></div>
                                <div class="faq-item"><p class="faq-q">Is FD rate fixed for tenure?</p><p>Yes, locked at booking. Market rate changes don't affect existing FD.</p></div>
                                <div class="faq-item"><p class="faq-q">Monthly income from FD?</p><p>Choose non-cumulative, interest paid monthly/quarterly. Lower total returns than cumulative FD.</p></div>
                                <div class="faq-item"><p class="faq-q">FDs better than savings accounts?</p><p>For money you do not need immediately, FDs often pay noticeably more than a regular savings rate, but they come with tenure and early-withdrawal rules.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-rd.php">RD Calculator</a> - Monthly deposit savings with similar guaranteed returns</li>
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - Compare tax-free PPF (7.1%) vs taxable FD</li>
                                    <li><a href="calculator-po-fd.php">Post Office FD</a> - Government FD alternative with higher rates</li>
                                    <li><a href="calculator-nsc.php">NSC Calculator</a> - Tax-saving alternative with 5-year lock-in</li>
                                    <li><a href="calculator-compound-interest.php">Compound Interest</a> - Understand compounding mathematics</li>
                                </ul>
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
            return { invested: p, returns: totalValue - p, totalValue };
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
            return { invested: p, returns, totalValue: p + returns };
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
                    chart: { type: 'donut', height: 285 },
                    labels: ['Invested amount', 'Est. returns'],
                    colors: ['#F97316', '#3B6DFF'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
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
                if (mode === 'months') return { min: MIN_MONTHS, max: MAX_MONTHS, def: MIN_MONTHS };
                if (mode === 'days') return { min: MIN_DAYS, max: MAX_DAYS, def: MIN_DAYS };
                return { min: MIN_YEARS, max: MAX_YEARS, def: MIN_YEARS };
            }

            function onTimeUnitChange() {
                if (!timeUnit || !timeRange || !timeInput) return;
                const mode = getTimeMode();
                const { min, max, def } = timeBoundsForMode(mode);
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
                    const target = document.querySelector('.calculator-wrapper')
                        || document.querySelector('.calculator-info-section');
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
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



