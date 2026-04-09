<?php
/**
 * ELSS Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'ELSS Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">ELSS Calculator</h1>
                    <p class="calculator-page-description">Equity Linked Savings Scheme — tax-saving growth with SIP or lumpsum, with real-time estimates and an investment breakdown.</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">

                <section class="investment-modern-calc investment-modern-calc--elss" aria-label="ELSS calculator">
                    <div class="investment-tabs" role="tablist" aria-label="Investment type">
                        <button type="button" class="investment-tab is-active" data-mode="sip" aria-selected="true">SIP</button>
                        <button type="button" class="investment-tab" data-mode="lumpsum" aria-selected="false">Lumpsum</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="Inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" id="elssAmountLabel" for="elssInvestmentAmountRange">SIP Investment (₹)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="elssAmountErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                            <input type="text" class="pill-input" id="elssInvestmentAmountInput" value="50,000" inputmode="numeric" aria-label="Monthly ELSS investment amount" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="elssInvestmentAmountRange" min="100" max="100000" step="100" value="50000" aria-labelledby="elssAmountLabel" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="elssRateRange">Expected return rate (p.a)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="elssRateErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="elssRateInput" min="1" max="30" step="0.1" value="12" inputmode="decimal" aria-label="Expected return rate" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="elssRateRange" min="1" max="30" step="0.1" value="12" aria-label="Expected return rate slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="elssYearsRange">Time period</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="elssYearsErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="elssYearsInput" min="1" max="30" step="1" value="15" inputmode="numeric" aria-label="Time period years" />
                                            <span class="pill-unit">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="elssYearsRange" min="1" max="30" step="1" value="15" aria-label="Time period slider" />
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
                                        <div class="quickbar-value" id="elssSummaryInvested">₹0</div>
                                    </div>

                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-returns"></span>
                                            <span class="quickbar-label">Estimated returns</span>
                                        </div>
                                        <div class="quickbar-value quickbar-returns-value" id="elssSummaryReturns">₹0</div>
                                    </div>

                                    <div class="quickbar-total">
                                        <div class="quickbar-total-label">Total value</div>
                                        <div class="quickbar-total-value" id="elssSummaryTotal">₹0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-wrap">
                                    <div id="elssDonutChart"></div>
                                    <div class="investment-donut-center">
                                        <div class="investment-donut-center-label">Maturity Value</div>
                                        <div class="investment-donut-center-value" id="elssDonutCenterValue">₹0</div>
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
                        <button type="button" class="investment-cta" id="elssInvestNowBtn">INVEST NOW</button>
                    </div>
                </section>

                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                        <h3 class="calculator-info-title">ELSS Calculator (Equity Linked Savings Scheme)</h3>
                        <div class="calculator-info-content">
                            <p>Equity Linked Savings Scheme (ELSS) is a category of mutual funds that primarily invests in equity markets while offering tax benefits under applicable income tax provisions. ELSS investments qualify for deductions under Section 80C of the Income Tax Act, subject to prescribed limits, and are subject to a lock-in period of three years.</p>
                            <p>An ELSS Calculator is a financial tool used to estimate the potential returns and tax savings associated with investments in ELSS funds.</p>
                        </div>

                        <h3 class="calculator-info-title">What is an ELSS Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>An ELSS Calculator is an online utility that helps investors estimate the future value of their investments made through either lump sum or SIP mode.</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Investment amount</li>
                                <li>Investment duration</li>
                                <li>Expected rate of return</li>
                                <li>Investment type (SIP or lump sum)</li>
                            </ul>
                            <p>the calculator provides:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimated maturity value</li>
                                <li>Total returns generated</li>
                                <li>Indicative tax savings under Section 80C</li>
                            </ul>
                            <p>The results are indicative and depend on market performance and applicable tax provisions.</p>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of an ELSS Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The ELSS calculator assists investors in evaluating both investment growth and tax-saving benefits.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate returns from ELSS investments</li>
                                <li>Compare SIP and lump sum investment approaches</li>
                                <li>Evaluate tax savings under Section 80C</li>
                                <li>Support goal-based and tax-efficient financial planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does an ELSS Calculator Work?</h3>
                        <div class="calculator-info-content">
                            <p>The calculation method depends on the mode of investment:</p>

                            <p><strong>1. Lump Sum Investment</strong></p>
                            <p>For one-time investments, the future value is calculated using:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                <span style="font-style:italic;">FV</span> = <span style="font-style:italic;">P</span> (1 + <span style="font-style:italic;">r</span>)<sup><span style="font-style:italic;">n</span></sup>
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul>
                                <li><strong>FV</strong> = Future value</li>
                                <li><strong>P</strong> = Initial investment</li>
                                <li><strong>r</strong> = Expected annual return</li>
                                <li><strong>n</strong> = Investment duration</li>
                            </ul>

                            <p><strong>2. SIP Investment</strong></p>
                            <p>For periodic investments, the future value is calculated using:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                M = P × 
                                    <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                        <span style="display:block; border-bottom:2px solid #000; padding:0 4px;">
                                        (1 + r)<sup>n</sup> − 1
                                        </span>
                                        <span style="display:block; font-size:14px;">r</span>
                                    </span>
                                    × (1 + r)
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul>
                                <li><strong>M</strong> = Maturity value</li>
                                <li><strong>P</strong> = Periodic investment amount</li>
                                <li><strong>r</strong> = Rate of return</li>
                                <li><strong>n</strong> = Investment duration</li>
                            </ul>

                        </div>

                        <h3 class="calculator-info-title">Examples</h3>
                        <div class="calculator-info-content">
                            <p><strong>Lump Sum Example</strong></p>
                            <p>Investment: ₹1,00,000</p>
                            <p>Duration: 3 years</p>
                            <p>Expected return: 12%</p>
                            <p>Estimated maturity value:</p>
                            <p><strong>₹1,40,493 (approx.)</strong></p>

                            <p><strong>SIP Example</strong></p>
                            <p>Monthly investment: ₹5,000</p>
                            <p>Duration: 3 years</p>
                            <p>Expected return: 12%</p>
                            <p>Estimated maturity value:</p>
                            <p><strong>₹2,17,538 (approx.)</strong></p>

                        </div>

                        <h3 class="calculator-info-title">Tax Benefits of ELSS</h3>
                        <div class="calculator-info-content">
                            <p>Investments in ELSS are eligible for deduction under <strong>Section 80C</strong> of the Income Tax Act, subject to the applicable limit.</p>
                            <ul style="margin-left: 14px;">
                                <li>Maximum eligible deduction: ₹1.5 lakh per financial year</li>
                                <li>Tax savings depend on the individual’s applicable tax slab</li>
                                
                            </ul>
                            <p>The calculator provides an indicative estimate of potential tax savings based on the investment amount.</p>
                        </div>

                        <h3 class="calculator-info-title">How to Use the ELSS Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate returns:</p>
                            <ol>
                                <li>Select investment type (SIP or lump sum)</li>
                                <li>Enter the investment amount</li>
                                <li>Specify the investment duration</li>
                                <li>Input the expected rate of return</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Estimated maturity value</li>
                                        <li>Total returns</li>
                                        <li>Indicative tax savings</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides a combined view of returns and tax benefits</li>
                                <li>Helps compare investment strategies</li>
                                <li>Supports tax planning decisions</li>
                                <li>Simplifies complex calculations</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Features of ELSS</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Equity-oriented mutual fund</li>
                                <li>Mandatory lock-in period of 3 years</li>
                                <li>Eligible for tax deduction under Section 80C</li>
                                <li>Market-linked returns with potential for long-term growth</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Returns are market-linked and not guaranteed</li>
                                <li>Lock-in period restricts withdrawal for 3 years</li>
                                <li>Tax benefits are subject to prevailing regulations</li>
                                <li>The calculator provides indicative values and does not account for:
                                    <ul style="margin-left: 20px;">
                                        <li>Expense ratios</li>
                                        <li>Exit loads</li>
                                        <li>Capital gains taxation</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>


                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="ELSS calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">What is ELSS?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                ELSS is an equity mutual fund that offers tax benefits under Section 80C.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">What is the lock-in period for ELSS?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                ELSS investments have a mandatory lock-in period of 3 years.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Does the ELSS calculator provide exact returns?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                No, it provides estimates based on assumed inputs.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Can I invest in ELSS through SIP?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                Yes, ELSS investments can be made via SIP or lump sum.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Are ELSS returns guaranteed?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                No, returns are market-linked and may vary.
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

        (function initElssModernCalc() {
            const root = document.querySelector('.investment-modern-calc--elss');
            if (!root) return;

            const LIMITS = {
                sip: { min: 100, max: 100000, step: 100, defaultVal: 50000 },
                // Match Dhan's lumpsum slider (approx.) so the same number stays consistent.
                lumpsum: { min: 100, max: 100000, step: 100, defaultVal: 50000 }
            };

            const tabs = root.querySelectorAll('.investment-tab[data-mode]');
            const amountLabel = document.getElementById('elssAmountLabel');
            const amountRange = document.getElementById('elssInvestmentAmountRange');
            const amountInput = document.getElementById('elssInvestmentAmountInput');
            const amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;

            const rateRange = document.getElementById('elssRateRange');
            const rateInput = document.getElementById('elssRateInput');
            const rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;

            const yearsRange = document.getElementById('elssYearsRange');
            const yearsInput = document.getElementById('elssYearsInput');
            const yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;

            const summaryInvested = document.getElementById('elssSummaryInvested');
            const summaryReturns = document.getElementById('elssSummaryReturns');
            const summaryTotal = document.getElementById('elssSummaryTotal');
            const donutCenterValue = document.getElementById('elssDonutCenterValue');
            const investNowBtn = document.getElementById('elssInvestNowBtn');

            const MIN_RATE = 1;
            const MAX_RATE = 30;
            const MIN_YEARS = 1;
            const MAX_YEARS = 30;

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

            function applyAmountLimits(mode) {
                const L = LIMITS[mode === 'sip' ? 'sip' : 'lumpsum'];
                amountRange.min = String(L.min);
                amountRange.max = String(L.max);
                amountRange.step = String(L.step);
                // Keep the current slider value when switching modes (Dhan keeps the same number),
                // just clamp it into the new mode's allowed range/step.
                const currentValue = Number(amountRange.value);
                const clamped = clamp(Math.round(currentValue / L.step) * L.step, L.min, L.max);
                amountRange.value = clamped;
                if (mode === 'sip') lastSipAmount = clamped;
                else lastLumpsumAmount = clamped;
                amountInput.value = formatINRDigits(clamped);
                setRangeFill(amountRange, clamped);
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
                const min = Number(rangeEl.min);
                const max = Number(rangeEl.max);
                const percent = ((value - min) / (max - min)) * 100;
                rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
            }

            function getAmountLimits() {
                return LIMITS[activeMode === 'sip' ? 'sip' : 'lumpsum'];
            }

            /**
             * Dhan-style mutual fund preview (uncapped illustrative SIP/lumpsum).
             * SIP: nominal monthly rate = (annual % ÷ 12), payments at start of each month (annuity due).
             * This matches Dhan’s numbers; it is NOT the 80C-capped tax helper in calcELSS().
             */
            function computeLumpsum(amount, rate, years) {
                const r = rate / 100;
                const totalValue = amount * Math.pow(1 + r, years);
                const invested = amount;
                const returns = totalValue - invested;
                return { invested: invested, returns: Math.max(0, returns), totalValue: totalValue };
            }

            function computeSIPDhan(monthlyAmount, rate, years) {
                const monthlyRate = (rate / 100) / 12;
                const totalMonths = years * 12;
                const totalValue = monthlyRate === 0
                    ? monthlyAmount * totalMonths
                    : monthlyAmount * ((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * (1 + monthlyRate);
                const invested = monthlyAmount * totalMonths;
                const returns = totalValue - invested;
                return { invested: invested, returns: Math.max(0, returns), totalValue: totalValue };
            }

            function computeActive() {
                const rawAmt = Number(amountRange.value);
                const rate = Number(rateRange.value);
                const years = Number(yearsRange.value);

                if (activeMode === 'sip') {
                    return computeSIPDhan(rawAmt, rate, years);
                }
                return computeLumpsum(rawAmt, rate, years);
            }

            function ensureDonutChart() {
                if (donutChart) return;
                if (typeof ApexCharts === 'undefined') return;

                const donutEl = document.getElementById('elssDonutChart');
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
                    // Match Dhan colors: invested = blue, returns = green
                    colors: ['#3B6DFF', '#00B35A'],
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
                const isSip = activeMode === 'sip';

                if (amountLabel) {
                    amountLabel.textContent = isSip ? 'SIP Investment (₹)' : 'Lumpsum Investment (₹)';
                }

                tabs.forEach(function(btn) {
                    const isActive = btn.dataset.mode === activeMode;
                    btn.classList.toggle('is-active', isActive);
                    btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
                });

                applyAmountLimits(activeMode);
                updateSummaryUI(true);
            }

            amountRange.addEventListener('input', function() {
                const L = getAmountLimits();
                const v = Math.round(Number(amountRange.value));
                const clamped = clamp(v, L.min, L.max);
                amountRange.value = clamped;
                amountInput.value = formatINRDigits(clamped);
                if (activeMode === 'sip') lastSipAmount = clamped;
                else lastLumpsumAmount = clamped;
                setAmountError(false);
                setRangeFill(amountRange, clamped);
                updateSummaryUI(false);
            });
            amountRange.addEventListener('change', function() {
                setAmountError(false);
                updateSummaryUI(true);
            });

            rateRange.addEventListener('input', function() {
                const v = Number(rateRange.value);
                const clamped = clamp(v, MIN_RATE, MAX_RATE);
                const rounded = Math.round(clamped * 10) / 10;
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
                const v = Math.round(Number(yearsRange.value));
                const clamped = clamp(v, MIN_YEARS, MAX_YEARS);
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
                const L = getAmountLimits();
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                if (!digits) {
                    if (raw.trim() === '') setAmountError(false);
                    else {
                        amountInput.value = '';
                        setAmountError(true);
                    }
                    return;
                }

                const v = Number(digits);
                const invalid = v < L.min || v > L.max;
                setAmountError(invalid);

                const clamped = clamp(Math.round(v / L.step) * L.step, L.min, L.max);
                amountRange.value = clamped;
                setRangeFill(amountRange, clamped);
                if (activeMode === 'sip') lastSipAmount = clamped;
                else lastLumpsumAmount = clamped;

                amountInput.value = formatINRDigits(v);

                if (!invalid) updateSummaryUI(false);
            });
            amountInput.addEventListener('change', function() {
                const L = getAmountLimits();
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                const v = digits ? Number(digits) : L.min;
                const clamped = clamp(Math.round(v / L.step) * L.step, L.min, L.max);
                amountRange.value = clamped;
                amountInput.value = formatINRDigits(clamped);
                if (activeMode === 'sip') lastSipAmount = clamped;
                else lastLumpsumAmount = clamped;
                setAmountError(false);
                setRangeFill(amountRange, clamped);
                updateSummaryUI(true);
            });

            rateInput.addEventListener('input', function() {
                const raw = String(rateInput.value || '');
                if (raw.trim() === '') {
                    setRateError(true);
                    return;
                }
                const v = Number(rateInput.value);
                if (!isFinite(v)) {
                    setRateError(true);
                    return;
                }
                const invalid = v < MIN_RATE || v > MAX_RATE;
                setRateError(invalid);
                const clamped = clamp(v, MIN_RATE, MAX_RATE);
                const rounded = Math.round(clamped * 10) / 10;
                rateRange.value = rounded;
                setRangeFill(rateRange, rounded);
                if (!invalid) updateSummaryUI(false);
            });
            rateInput.addEventListener('change', function() {
                const raw = String(rateInput.value || '');
                const v = raw.trim() === '' ? MIN_RATE : Number(raw);
                const safe = isFinite(v) ? v : MIN_RATE;
                const clamped = clamp(safe, MIN_RATE, MAX_RATE);
                const rounded = Math.round(clamped * 10) / 10;
                rateRange.value = rounded;
                rateInput.value = rounded;
                setRateError(false);
                setRangeFill(rateRange, rounded);
                updateSummaryUI(true);
            });

            yearsInput.addEventListener('input', function() {
                const raw = String(yearsInput.value || '');
                if (raw.trim() === '') {
                    setYearsError(true);
                    return;
                }
                const v = Math.round(Number(yearsInput.value));
                if (!isFinite(v)) {
                    setYearsError(true);
                    return;
                }
                const invalid = v < MIN_YEARS || v > MAX_YEARS;
                setYearsError(invalid);
                const clamped = clamp(v, MIN_YEARS, MAX_YEARS);
                yearsRange.value = clamped;
                setRangeFill(yearsRange, clamped);
                if (!invalid) updateSummaryUI(false);
            });
            yearsInput.addEventListener('change', function() {
                const raw = String(yearsInput.value || '');
                const v = raw.trim() === '' ? MIN_YEARS : Math.round(Number(raw));
                const safe = isFinite(v) ? v : MIN_YEARS;
                const clamped = clamp(safe, MIN_YEARS, MAX_YEARS);
                yearsRange.value = clamped;
                yearsInput.value = clamped;
                setYearsError(false);
                setRangeFill(yearsRange, clamped);
                updateSummaryUI(true);
            });

            tabs.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    setMode(btn.dataset.mode);
                });
            });

            setRangeFill(rateRange, Number(rateRange.value));
            setRangeFill(yearsRange, Number(yearsRange.value));

            function waitForDeps() {
                updateSummaryUI(false);
                if (typeof ApexCharts === 'undefined') {
                    setTimeout(waitForDeps, 60);
                    return;
                }
                ensureDonutChart();
                updateSummaryUI(true);
            }

            setMode('sip');

            if (investNowBtn) {
                investNowBtn.addEventListener('click', function() {
                    updateSummaryUI(true);
                    const target = document.querySelector('.calculator-wrapper');
                    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            }

            waitForDeps();
        })();
    </script>

<?php
// Include footer (loads calculator-functions.js, search, chatbot, etc.)
require_once '../../includes/footer.php';
?>
