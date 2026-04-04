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
                            <h2 class="calculator-info-title">About ELSS Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>ELSS (Equity Linked Savings Scheme) Calculator</strong> combines Section 80C tax deductions with equity growth potential. ELSS is the only mutual fund eligible for 80C and has the shortest lock-in (3 years) among 80C options.</p>
                                <p>Understand potential returns, immediate tax savings on contributions, tax-free growth during holding, and LTCG implications at redemption. Essential for allocating your &#8377;1.5L 80C limit between ELSS, PPF, insurance, and others.</p>

                                <h3>How this calculator works (formulas)</h3>
                                <p>The chart and numbers above are an <strong>illustrative wealth projection</strong>: they use the full monthly SIP or lumpsum you enter and assume the stated return is earned every year. They do <strong>not</strong> cap your inputs at the &#8377;1.5 lakh Section 80C limit (that limit affects <em>how much</em> of your investment may qualify for a tax deduction in a given year, not the mutual fund growth math shown here).</p>

                                <h4>SIP mode</h4>
                                <ul>
                                    <li><strong>Total invested:</strong> &#8377;<em>P</em> &times; 12 &times; <em>Y</em>, where <em>P</em> is monthly investment and <em>Y</em> is years.</li>
                                    <li><strong>Monthly rate:</strong> <em>i</em> = (annual return % &divide; 100) &divide; 12 — i.e. the yearly rate is split equally across 12 months (nominal monthly rate).</li>
                                    <li><strong>Number of instalments:</strong> <em>n</em> = 12<em>Y</em> months.</li>
                                    <li><strong>Maturity value (FV):</strong> instalments are treated as at the <strong>start</strong> of each month (common for SIP calculators). Then<br>
                                    <div class="formula-box">FV = <em>P</em> &times; [((1 + <em>i</em>)<sup><em>n</em></sup> &minus; 1) / <em>i</em>] &times; (1 + <em>i</em>)</div>
                                    If <em>i</em> = 0, FV = <em>P</em> &times; <em>n</em>.</li>
                                    <li><strong>Estimated returns:</strong> FV &minus; total invested.</li>
                                    <li><strong>Total value</strong> shown is the same as maturity value (FV).</li>
                                </ul>

                                <h4>Lumpsum mode</h4>
                                <ul>
                                    <li><strong>Total invested:</strong> one-time amount <em>L</em>.</li>
                                    <li>Annual return <em>r</em> = (annual %) &divide; 100. One-time investment compounds once per year:<br>
                                    <div class="formula-box">FV = <em>L</em> &times; (1 + <em>r</em>)<sup><em>Y</em></sup></div></li>
                                    <li><strong>Estimated returns:</strong> FV &minus; <em>L</em>.</li>
                                </ul>

                                <h4>Formula letters (definitions)</h4>
                                <ul>
                                    <li><strong><em>P</em></strong> = monthly investment (₹) in SIP mode.</li>
                                    <li><strong><em>L</em></strong> = one-time lumpsum investment (₹) in lumpsum mode.</li>
                                    <li><strong><em>Y</em></strong> = time period in years (selected on the slider).</li>
                                    <li><strong><em>n</em></strong> = number of instalments/months = 12Y in SIP mode.</li>
                                    <li><strong><em>i</em></strong> = nominal monthly rate = (annual return % &divide; 100) &divide; 12.</li>
                                    <li><strong><em>r</em></strong> = annual return as a decimal = annual % &divide; 100 (used in lumpsum).</li>
                                    <li><strong><em>FV</em></strong> = Future Value / maturity value shown on the chart.</li>
                                </ul>

                                <h4>Worked example (same as default SIP inputs)</h4>
                                <p>Monthly SIP <strong>&#8377;50,000</strong>, expected return <strong>12% p.a.</strong>, horizon <strong>15 years</strong>:</p>
                                <ul>
                                    <li>Total invested = 50,000 &times; 12 &times; 15 = <strong>&#8377;90,00,000</strong>.</li>
                                    <li><em>i</em> = 12% &divide; 12 = 1% per month = 0.01; <em>n</em> = 180 months.</li>
                                    <li>Apply the SIP formula: the future value comes to about <strong>&#8377;2,52,28,800</strong> (maturity value).</li>
                                    <li>Estimated returns = 2,52,28,800 &minus; 90,00,000 &approx; <strong>&#8377;1,62,28,800</strong>.</li>
                                </ul>
                                <p>The donut splits <strong>invested</strong> vs <strong>returns</strong>; the centre shows maturity value. Results are rounded for display. Actual fund returns vary; this is not a guarantee.</p>

                                <h4>Lumpsum worked example</h4>
                                <p>Lumpsum investment <strong>&#8377;50,000</strong>, expected return <strong>12% p.a.</strong>, horizon <strong>15 years</strong>:</p>
                                <ul>
                                    <li>Total invested = <strong>&#8377;50,000</strong>.</li>
                                    <li><em>r</em> = 12% &divide; 100 = <strong>0.12</strong>. Maturity value (FV) = 50,000 &times; (1.12)<sup>15</sup> &asymp; <strong>&#8377;2,73,678</strong>.</li>
                                    <li>Estimated returns = FV &minus; L &asymp; <strong>&#8377;2,23,678</strong>.</li>
                                </ul>

                                <h3>ELSS in 60 seconds</h3>
                                <ul>
                                    <li><strong>Lock-in:</strong> ELSS has a minimum <strong>3-year</strong> lock-in (no premature withdrawal, except special circumstances as per rules).</li>
                                    <li><strong>Tax benefit:</strong> ELSS qualifies under <strong>Section 80C</strong>; deduction up to <strong>&#8377;1.5L</strong> per financial year (subject to eligibility).</li>
                                    <li><strong>What this calculator shows:</strong> The chart uses your <strong>entered return rate</strong> to estimate <strong>maturity value</strong>.
                                        <ul>
                                            <li><strong>SIP tab:</strong> assumes you invest the monthly amount for the selected years.</li>
                                            <li><strong>Lumpsum tab:</strong> assumes you invest the one-time amount for the selected years.</li>
                                        </ul>
                                        It does <strong>not</strong> compute your exact tax deduction or final LTCG tax.</li>
                                </ul>

                                <h4>Quick note on taxes (important)</h4>
                                <p>Capital-gains taxation at redemption depends on applicable tax rules (and the year of investment). Use this tool for investment growth illustration; not as tax advice.</p>

                                <div class="callout-box">
                                    <strong>Tip:</strong> If you plan to claim 80C benefit, align your ELSS contribution with your yearly &#8377;1.5L limit. For growth assumptions, use the return rate you feel is reasonable for equities.
                                </div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - Systematic investment growth</li>
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - Compare safer alternative</li>
                                    <li><a href="calculator-stcg.php">STCG/LTCG Tax Calculator</a> - Tax on redemption</li>
                                    <li><a href="calculator-nsc.php">NSC Calculator</a> - Compare fixed-return 80C</li>
                                    <li><a href="calculator-mutual-fund.php">Mutual Fund Calculator</a> - Non-ELSS equity funds</li>
                                </ul>
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
