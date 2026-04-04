<?php
/**
 * Recurring Deposit Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Recurring Deposit Calculator - Gretex Financial';
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



    <main class="calculator-page investment-modern-calc-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link">
                        <i data-lucide="arrow-left"></i>
                        <span>Back to Calculators</span>
                    </a>
                    <h1 class="calculator-page-title">Recurring Deposit Calculator</h1>
                    <p class="calculator-page-description">Calculate Recurring Deposit maturity value with monthly contributions</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc investment-modern-calc--fd" aria-label="Recurring deposit calculator">
                    <div class="investment-tabs" aria-label="Current calculator">
                        <button type="button" class="investment-tab is-active" aria-current="page">RD</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="Inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="rdAmountRange">Monthly investment</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="rdAmountErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                            <input type="text" class="pill-input" id="rdAmountInput" value="50,000" inputmode="numeric" aria-label="Monthly investment amount" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="rdAmountRange" min="500" max="1000000" step="100" value="50000" aria-label="Monthly investment slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="rdRateRange">Rate of interest (p.a)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="rdRateErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="rdRateInput" min="1" max="15" step="0.1" value="6.5" inputmode="decimal" aria-label="Interest rate per annum" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="rdRateRange" min="1" max="15" step="0.1" value="6.5" aria-label="Interest rate slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <div class="investment-label-with-unit">
                                        <label class="investment-slider-label" for="rdTimeRange">Time period</label>
                                        <select id="rdTimeUnit" class="investment-period-unit-select" aria-label="Time period unit">
                                            <option value="years" selected>Years</option>
                                            <option value="months">Months</option>
                                        </select>
                                    </div>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="rdTimeErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="rdTimeInput" min="1" max="9" step="1" value="3" inputmode="numeric" aria-label="Time period in years" />
                                            <span class="pill-unit" id="rdTimePillUnit">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="rdTimeRange" min="1" max="9" step="1" value="3" aria-label="Time period slider" />
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
                                        <div class="quickbar-value" id="rdSummaryInvested">₹0</div>
                                    </div>
                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-returns"></span>
                                            <span class="quickbar-label">Est. returns</span>
                                        </div>
                                        <div class="quickbar-value quickbar-returns-value" id="rdSummaryReturns">₹0</div>
                                    </div>
                                    <div class="quickbar-total">
                                        <div class="quickbar-total-label">Maturity value</div>
                                        <div class="quickbar-total-value" id="rdSummaryTotal">₹0</div>
                                    </div>
                                </div>
                                <div class="investment-donut-wrap">
                                    <div id="rdPreviewDonutChart"></div>
                                    <div class="investment-donut-center">
                                        <div class="investment-donut-center-label">Maturity Value</div>
                                        <div class="investment-donut-center-value" id="rdDonutCenterValue">₹0</div>
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
                            <h2 class="calculator-info-title">About Recurring Deposit Calculator</h2>
                            <div class="calculator-info-content">
                                <p>A Recurring Deposit (RD) is a term-deposit product where you invest a fixed amount every month. This calculator uses the standard RD maturity formula with quarterly compounding.</p>
                                
                                <h3>How Recurring Deposits Work</h3>
                                <ul>
                                    <li><strong>Monthly Deposits:</strong> You deposit a fixed amount every month</li>
                                    <li><strong>Fixed Tenure:</strong> Choose your tenure in years or months</li>
                                    <li><strong>Interest Compounding:</strong> Interest is applied on a quarterly basis</li>
                                    <li><strong>Guaranteed Returns:</strong> Safe investment with predictable returns</li>
                                </ul>
                                
                                <h3>Correct RD Maturity Formula</h3>
                                <p>To match Groww-style RD output, maturity is computed as the sum of each monthly installment's matured value:</p>
                                <p><strong>Maturity = Sum from j=1 to M of round( P &times; (1 + i)<sup>(M - j + 1)/3</sup> )</strong></p>
                                <p>Where:</p>
                                <ul>
                                    <li><strong>P</strong> = monthly investment</li>
                                    <li><strong>M</strong> = total tenure in months</li>
                                    <li><strong>i</strong> = quarterly interest rate (as a decimal) = <strong>R / (4 &times; 100)</strong>, with <strong>R</strong> as the annual rate in percent</li>
                                    <li><strong>j</strong> = installment index from 1 to M</li>
                                </ul>
                                <p><strong>Total Invested = P &times;</strong> number of months</p>
                                <p><strong>Estimated Returns = Maturity &minus; Total Invested</strong></p>
                                <p>This installment-wise rounding is why result may differ by a few rupees from closed-form approximations.</p>

                                <h3>Worked Example</h3>
                                <p><strong>P</strong> = &#8377;50,000 per month, <strong>R</strong> = 6.5% p.a., <strong>t</strong> = 3 years (36 months), <strong>i</strong> = 6.5 / 400.</p>
                                <p><strong>Total Invested = 50,000 &times; 36 = &#8377;18,00,000</strong></p>
                                <p>Now apply the formula term-by-term:</p>
                                <p><strong>Term<sub>1</sub> = round(50,000 &times; (1 + 0.01625)<sup>36/3</sup>) = round(50,000 &times; (1.01625)<sup>12</sup>)</strong></p>
                                <p><strong>Term<sub>36</sub> = round(50,000 &times; (1 + 0.01625)<sup>1/3</sup>)</strong></p>
                                <p>Similarly calculate <strong>Term<sub>2</sub></strong> to <strong>Term<sub>35</sub></strong>, then add all 36 rounded terms:</p>
                                <p><strong>Maturity = Term<sub>1</sub> + Term<sub>2</sub> + ... + Term<sub>36</sub></strong></p>
                                <p><strong>Maturity &asymp; &#8377;19,91,214</strong></p>
                                <p><strong>Estimated Returns &asymp; &#8377;1,91,214</strong></p>

                                <h3>Benefits of Recurring Deposits</h3>
                                <ul>
                                    <li>Start with as little as &#8377;500 per month</li>
                                    <li>Builds a habit of regular saving</li>
                                    <li>Guaranteed returns with capital protection</li>
                                    <li>Loan facility available against RD</li>
                                    <li>Premature closure option (with penalty)</li>
                                </ul>
                                
                                <h3>Key Factors</h3>
                                <p><strong>Monthly Deposit:</strong> The fixed amount you deposit every month</p>
                                <p><strong>Interest Rate:</strong> Annual interest rate offered by the bank (typically 6-7%)</p>
                                <p><strong>Tenure:</strong> The duration for which you maintain the RD (this calculator supports up to 9 years)</p>
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

        let rdPreviewDonut = null;

        (function initRdModernUi() {
            const root = document.querySelector('.investment-modern-calc--fd');
            if (!root) return;

            const amountRange = document.getElementById('rdAmountRange');
            const amountInput = document.getElementById('rdAmountInput');
            const rateRange = document.getElementById('rdRateRange');
            const rateInput = document.getElementById('rdRateInput');
            const timeRange = document.getElementById('rdTimeRange');
            const timeInput = document.getElementById('rdTimeInput');
            const timeUnit = document.getElementById('rdTimeUnit');
            const timePillUnit = document.getElementById('rdTimePillUnit');
            const amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
            const rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;
            const timeField = timeRange ? timeRange.closest('.investment-slider-field') : null;

            const summaryInvested = document.getElementById('rdSummaryInvested');
            const summaryReturns = document.getElementById('rdSummaryReturns');
            const summaryTotal = document.getElementById('rdSummaryTotal');
            const donutCenterValue = document.getElementById('rdDonutCenterValue');

            const MIN_AMOUNT = 500;
            const MAX_AMOUNT = 1000000;
            const AMOUNT_STEP = 100;
            const MIN_RATE = 1;
            const MAX_RATE = 15;
            const MIN_YEARS = 1;
            const MAX_YEARS = 9;
            const MIN_MONTHS = 1;
            const MAX_MONTHS = 108;

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
                return 'years';
            }

            function timeBoundsForMode(mode) {
                if (mode === 'months') return { min: MIN_MONTHS, max: MAX_MONTHS, def: MIN_MONTHS };
                return { min: MIN_YEARS, max: MAX_YEARS, def: MIN_YEARS };
            }

            function applyTimeUnitUi() {
                const mode = getTimeMode();
                if (mode === 'months') {
                    timeRange.min = MIN_MONTHS;
                    timeRange.max = MAX_MONTHS;
                    timeInput.min = MIN_MONTHS;
                    timeInput.max = MAX_MONTHS;
                    if (timePillUnit) timePillUnit.textContent = 'Mo';
                } else {
                    timeRange.min = MIN_YEARS;
                    timeRange.max = MAX_YEARS;
                    timeInput.min = MIN_YEARS;
                    timeInput.max = MAX_YEARS;
                    if (timePillUnit) timePillUnit.textContent = 'Yr';
                }
                const minT = Number(timeRange.min);
                const maxT = Number(timeRange.max);
                let current = Math.round(Number(timeInput.value));
                if (!Number.isFinite(current)) current = minT;
                current = clamp(current, minT, maxT);
                timeRange.value = current;
                timeInput.value = current;
                setRangeFill(timeRange, current);
            }

            function computePreview() {
                const monthlyAmount = clamp(Number(amountRange.value), MIN_AMOUNT, MAX_AMOUNT);
                const annualRate = clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
                const mode = getTimeMode();
                const months = mode === 'months'
                    ? clamp(Math.round(Number(timeRange.value)), MIN_MONTHS, MAX_MONTHS)
                    : clamp(Math.round(Number(timeRange.value)), MIN_YEARS, MAX_YEARS) * 12;

                if (typeof window.growwRdBreakdown === 'function') {
                    return window.growwRdBreakdown(monthlyAmount, months, annualRate);
                }

                const i = annualRate / 400;
                const invested = monthlyAmount * months;
                if (Math.abs(i) < 1e-12) return { invested, returns: 0, totalValue: invested };
                let totalValue = 0;
                for (let j = 1; j <= months; j++) {
                    const remainingMonths = months - j + 1;
                    const term = monthlyAmount * Math.pow(1 + i, remainingMonths / 3);
                    totalValue += Math.round(term);
                }
                const returns = Math.max(0, totalValue - invested);
                return { invested, returns, totalValue };
            }

            function ensurePreviewDonut() {
                if (rdPreviewDonut || typeof ApexCharts === 'undefined') return;
                const el = document.getElementById('rdPreviewDonutChart');
                if (!el) return;
                const d = computePreview();
                rdPreviewDonut = new ApexCharts(el, {
                    series: [Math.max(0, d.invested), Math.max(0, d.returns)],
                    chart: { type: 'donut', height: 285 },
                    labels: ['Invested amount', 'Est. returns'],
                    colors: ['#F97316', '#3B6DFF'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
                });
                rdPreviewDonut.render();
            }

            function updatePreview(animate) {
                const d = computePreview();
                if (summaryInvested) summaryInvested.textContent = formatINR0(d.invested);
                if (summaryReturns) summaryReturns.textContent = formatINR0(d.returns);
                if (summaryTotal) summaryTotal.textContent = formatINR0(d.totalValue);
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(d.totalValue);
                ensurePreviewDonut();
                if (rdPreviewDonut) {
                    rdPreviewDonut.updateSeries([Math.max(0, d.invested), Math.max(0, d.returns)], animate !== false);
                }
            }

            amountRange.addEventListener('input', function() {
                const v = clamp(Number(amountRange.value), MIN_AMOUNT, MAX_AMOUNT);
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
                const v = clamp(Math.round(Number(timeRange.value)), MIN_YEARS, MAX_YEARS);
                timeRange.value = v;
                timeInput.value = v;
                setTimeError(false);
                setRangeFill(timeRange, v);
                updatePreview(false);
            });
            timeRange.addEventListener('change', function() {
                updatePreview(true);
            });

            if (timeUnit) {
                timeUnit.addEventListener('change', function() {
                    const mode = getTimeMode();
                    const bounds = timeBoundsForMode(mode);
                    let v = Math.round(Number(timeInput.value));
                    if (!Number.isFinite(v)) v = bounds.def;
                    timeInput.value = clamp(v, bounds.min, bounds.max);
                    applyTimeUnitUi();
                    setTimeError(false);
                    updatePreview(true);
                });
            }

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
                const clamped = clamp(v, MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                setRangeFill(amountRange, clamped);
                amountInput.value = formatINRDigits(v);
                if (!invalid) updatePreview(false);
            });
            amountInput.addEventListener('change', function() {
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                const v = digits ? Number(digits) : MIN_AMOUNT;
                const clamped = clamp(v, MIN_AMOUNT, MAX_AMOUNT);
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
                const invalid = v < MIN_YEARS || v > MAX_YEARS;
                setTimeError(invalid);
                const clamped = clamp(v, MIN_YEARS, MAX_YEARS);
                timeRange.value = clamped;
                setRangeFill(timeRange, clamped);
                if (!invalid) updatePreview(false);
            });
            timeInput.addEventListener('change', function() {
                const raw = String(timeInput.value || '');
                const v = raw.trim() === '' ? MIN_YEARS : Math.round(Number(raw));
                const safe = Number.isFinite(v) ? v : MIN_YEARS;
                const clamped = clamp(safe, MIN_YEARS, MAX_YEARS);
                timeRange.value = clamped;
                timeInput.value = clamped;
                setTimeError(false);
                setRangeFill(timeRange, clamped);
                updatePreview(true);
            });

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



