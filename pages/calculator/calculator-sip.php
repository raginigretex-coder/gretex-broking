<?php
/**
 * SIP Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Investment Calculator - Gretex Financial';
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


    
    <!-- Navigation -->

    <!-- Calculator Page Content -->
    <main class="calculator-page investment-modern-calc-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link">
                        <i data-lucide="arrow-left"></i>
                        <span>Back to Calculators</span>
                    </a>
                    <h1 class="calculator-page-title">Investment Calculator</h1>
                    <p class="calculator-page-description">A modern SIP / Lumpsum calculator with real-time estimates and an animated investment breakdown.</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc" aria-label="Investment calculator">
                    <div class="investment-tabs" role="tablist" aria-label="Investment type">
                        <button type="button" class="investment-tab is-active" data-mode="sip" aria-selected="true">SIP</button>
                        <button type="button" class="investment-tab" data-mode="lumpsum" aria-selected="false">Lumpsum</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="Inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" id="amountLabel" for="investmentAmountRange">Monthly investment (₹)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="amountErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                            <input type="text" class="pill-input" id="investmentAmountInput" value="5000" inputmode="numeric" aria-label="Monthly investment amount" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="investmentAmountRange" min="100" max="10000000" step="100" value="5000" aria-labelledby="amountLabel" />
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
                                        <div class="quickbar-value" id="summaryInvested">₹0</div>
                                    </div>

                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-returns"></span>
                                            <span class="quickbar-label">Estimated returns</span>
                                        </div>
                                        <div class="quickbar-value quickbar-returns-value" id="summaryReturns">₹0</div>
                                    </div>

                                    <div class="quickbar-total">
                                        <div class="quickbar-total-label">Total value</div>
                                        <div class="quickbar-total-value" id="summaryTotal">₹0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-wrap">
                                    <div id="investmentDonutChart"></div>
                                    <div class="investment-donut-center">
                                        <div class="investment-donut-center-label">Maturity Value</div>
                                        <div class="investment-donut-center-value" id="donutCenterValue">₹0</div>
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
                    <!-- Sidebar: Calculator Navigation -->
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <!-- Left Section: Calculator Information -->
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About SIP Calculator</h2>
                            <div class="calculator-info-content">
                                <p>A Systematic Investment Plan (SIP) is an investment strategy where you invest a fixed amount regularly in mutual funds. This calculator helps you understand how your SIP investments can grow over time.</p>
                                
                                <h3>How SIP Works</h3>
                                <ul>
                                    <li><strong>Regular Investment:</strong> You invest a fixed amount every month</li>
                                    <li><strong>Power of Compounding:</strong> Your returns generate more returns over time</li>
                                    <li><strong>Rupee Cost Averaging:</strong> You buy more units when prices are low and fewer when prices are high</li>
                                    <li><strong>Disciplined Saving:</strong> Helps build a habit of regular investing</li>
                                </ul>
                                
                                <h3>Benefits of SIP</h3>
                                <ul>
                                    <li>Start with as little as &#8377;500 per month</li>
                                    <li>No need to time the market</li>
                                    <li>Reduces the impact of market volatility</li>
                                    <li>Flexible - increase, decrease, or pause anytime</li>
                                    <li>Long-term wealth creation through compounding</li>
                                </ul>
                                
                                <h3>Algorithm & Formula</h3>
                                <div class="formula-box">FV = P &times; [((1 + r)<sup>n</sup> - 1) / r] &times; (1 + r)<br>Where: P = Monthly amount, r = Effective monthly return rate, n = Total months</div>
                                
                                <h3>Who Should Use?</h3>
                                <p>Long-term investors, salaried individuals, and first-time mutual fund investors seeking disciplined wealth creation through regular investments.</p>
                                
                                <h3>Key Factors</h3>
                                <p><strong>Monthly SIP Amount:</strong> The fixed amount you invest every month (&#8377;500 - &#8377;1,00,000)</p>
                                <p><strong>Expected Return:</strong> The annualized return you expect (typically 10-15% for equity funds)</p>
                                <p><strong>Investment Period:</strong> Duration for which you plan to invest (1-40 years)</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->

    <script src="../../js/gretex-financial.js"></script>
    <script>
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        /* =========================
           Modern Investment UI
           (real-time SIP/Lumpsum + donut)
        ========================= */
        (function initModernInvestmentUI() {
            const root = document.querySelector('.investment-modern-calc');
            if (!root) return;

            const tabs = root.querySelectorAll('.investment-tab[data-mode]');

            const amountLabel = document.getElementById('amountLabel');
            const amountRange = document.getElementById('investmentAmountRange');
            const amountInput = document.getElementById('investmentAmountInput');
            const amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;

            const rateRange = document.getElementById('investmentRateRange');
            const rateInput = document.getElementById('investmentRateInput');
            const rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;

            const yearsRange = document.getElementById('investmentYearsRange');
            const yearsInput = document.getElementById('investmentYearsInput');
            const yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;

            const summaryInvested = document.getElementById('summaryInvested');
            const summaryReturns = document.getElementById('summaryReturns');
            const summaryTotal = document.getElementById('summaryTotal');
            const donutCenterValue = document.getElementById('donutCenterValue');
            const investNowBtn = document.getElementById('investNowBtn');

            const MIN_AMOUNT = 100;
            const MAX_AMOUNT = 10000000;
            const MIN_RATE = 1;
            const MAX_RATE = 30;
            const MIN_YEARS = 1;
            const MAX_YEARS = 40;

            let activeMode = 'sip';
            let donutChart = null;

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

            function parseDigitsOnly(input) {
                if (typeof input !== 'string') return Number(input) || 0;
                // Keep only digits for numeric parsing (commas may exist).
                const digits = input.replace(/[^\d]/g, '');
                const n = Number(digits);
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
                const min = Number(rangeEl.min);
                const max = Number(rangeEl.max);
                const percent = ((value - min) / (max - min)) * 100;
                rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
            }

            function computeLumpsum(amount, rate, years) {
                const r = rate / 100;
                const totalValue = amount * Math.pow(1 + r, years);
                const invested = amount;
                const returns = totalValue - invested;
                return { invested, returns, totalValue };
            }

            function computeSIP(monthlyAmount, rate, years) {
                // Keep preview math aligned with the main SIP calculator
                const monthlyRate = Math.pow(1 + (rate / 100), 1 / 12) - 1;
                const totalMonths = years * 12;
                // Future value of SIP (end-of-month payments):
                // FV (annuity due) = P * [((1+m)^n - 1) / m] * (1+m)
                const totalValue = monthlyRate === 0
                    ? monthlyAmount * totalMonths
                    : monthlyAmount * ((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * (1 + monthlyRate);
                const invested = monthlyAmount * totalMonths;
                const returns = totalValue - invested;
                return { invested, returns, totalValue };
            }

            function computeActive() {
                const amount = Number(amountRange.value);
                const rate = Number(rateRange.value);
                const years = Number(yearsRange.value);

                if (activeMode === 'sip') {
                    return computeSIP(amount, rate, years);
                }
                return computeLumpsum(amount, rate, years);
            }

            function ensureDonutChart() {
                if (donutChart) return;
                if (typeof ApexCharts === 'undefined') return;

                const donutEl = document.getElementById('investmentDonutChart');
                if (!donutEl) return;

                const data = computeActive();

                donutChart = new ApexCharts(donutEl, {
                    series: [
                        Math.max(0, data.invested),
                        Math.max(0, data.returns)
                    ],
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
                    // Order matches series: [invested, returns]
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

            function updateSummaryUI(animate = true) {
                const data = computeActive();
                const invested = data.invested;
                const returns = data.returns;
                const totalValue = data.totalValue;

                if (summaryInvested) summaryInvested.textContent = formatINR0(invested);
                if (summaryReturns) summaryReturns.textContent = formatINR0(returns);
                if (summaryTotal) summaryTotal.textContent = formatINR0(totalValue);
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(totalValue);

                updateDonutChart(invested, returns, animate);
            }

            function setMode(mode) {
                activeMode = mode === 'sip' ? 'sip' : 'lumpsum';
                const isSip = activeMode === 'sip';

                if (amountLabel) {
                    amountLabel.textContent = isSip ? 'Monthly investment (₹)' : 'Investment Amount (₹)';
                }

                tabs.forEach(btn => {
                    const isActive = btn.dataset.mode === activeMode;
                    btn.classList.toggle('is-active', isActive);
                    btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
                });

                updateSummaryUI(true);
            }

            // Slider -> input
            amountRange.addEventListener('input', function() {
                const v = Math.round(Number(amountRange.value));
                const clamped = clamp(v, MIN_AMOUNT, MAX_AMOUNT);
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

            // Input -> slider
            amountInput.addEventListener('input', function() {
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                if (!digits) {
                    // Allow clear; but if user typed non-numeric characters only, still show error.
                    if (raw.trim() === '') {
                        setAmountError(false);
                    } else {
                        amountInput.value = '';
                        setAmountError(true);
                    }
                    return;
                }

                const v = Number(digits);
                const invalid = v < MIN_AMOUNT || v > MAX_AMOUNT;
                setAmountError(invalid);

                const clamped = clamp(Math.round(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                setRangeFill(amountRange, clamped);

                // Keep comma formatting in the input.
                amountInput.value = formatINRDigits(v);

                // Don't update summary while invalid.
                if (!invalid) updateSummaryUI(false);
            });
            amountInput.addEventListener('change', function() {
                // Normalize formatting on blur/change
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                const v = digits ? Number(digits) : MIN_AMOUNT;
                const clamped = clamp(Math.round(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                amountInput.value = formatINRDigits(clamped);
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
                if (!invalid) {
                    updateSummaryUI(false);
                }
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
                if (!invalid) {
                    updateSummaryUI(false);
                }
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

            // Tabs
            tabs.forEach(btn => {
                btn.addEventListener('click', function() {
                    setMode(btn.dataset.mode);
                });
            });

            // Initial fill + render
            setRangeFill(amountRange, Number(amountRange.value));
            amountInput.value = formatINRDigits(Number(amountRange.value));
            setRangeFill(rateRange, Number(rateRange.value));
            setRangeFill(yearsRange, Number(yearsRange.value));

            // Wait for ApexCharts if needed (donut chart init)
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
                    const target = document.querySelector('.calculator-wrapper');
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            }

            setMode('sip');
        })();
    </script>


<?php
// Include footer
require_once '../../includes/footer.php';
?>

