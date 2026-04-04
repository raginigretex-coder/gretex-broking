<?php
/**
 * Mutual Fund Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Mutual Fund Calculator - Gretex Financial';
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
                <h1 class="calculator-page-title">Mutual Fund Returns Calculator</h1>
                <p class="calculator-page-description">Estimate SIP and lumpsum mutual fund returns with a Groww-style calculator experience.</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc" aria-label="Mutual fund returns calculator">
                <div class="investment-tabs" aria-label="Calculator type">
                    <button type="button" class="investment-tab is-active" aria-current="page">Mutual Fund</button>
                </div>


                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" id="amountLabel" for="investmentAmountRange">Total investment (&#8377;)</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="amountErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">&#8377;</span>
                                        <input type="text" class="pill-input" id="investmentAmountInput" value="25000" inputmode="numeric" aria-label="Total investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="investmentAmountRange" min="500" max="10000000" step="500" value="25000" aria-labelledby="amountLabel" />
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
                                    <div class="quickbar-value" id="summaryInvested">&#8377;0</div>
                                </div>

                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-returns"></span>
                                        <span class="quickbar-label">Est. returns</span>
                                    </div>
                                    <div class="quickbar-value quickbar-returns-value" id="summaryReturns">&#8377;0</div>
                                </div>

                                <div class="quickbar-total">
                                    <div class="quickbar-total-label">Total value</div>
                                    <div class="quickbar-total-value" id="summaryTotal">&#8377;0</div>
                                </div>
                            </div>

                            <div class="investment-donut-wrap">
                                <div id="investmentDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Maturity Value</div>
                                    <div class="investment-donut-center-value" id="donutCenterValue">&#8377;0</div>
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
                <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                <div class="calculator-info-section">
                    <div class="calculator-info-card">
                        <h2 class="calculator-info-title">About Mutual Fund Returns Calculator</h2>
                        <div class="calculator-info-content">
                            <p>The <strong>Mutual Fund Returns Calculator</strong> helps you estimate how your investments may grow over time through SIP or lumpsum investing. It is useful for goal planning, comparing investment styles, and understanding the power of compounding in mutual funds.</p>

                            <h3>How It Works</h3>
                            <ul>
                                <li><strong>SIP:</strong> Invest a fixed amount every month and build wealth gradually</li>
                                <li><strong>Lumpsum:</strong> Invest one amount at the start and let it compound over time</li>
                                <li><strong>Expected return:</strong> The annual growth rate you assume for your mutual fund investment</li>
                                <li><strong>Time period:</strong> The duration for which your money stays invested</li>
                            </ul>

                            <h3>Formula</h3>
                            <div class="formula-box">
                                <strong>SIP:</strong> FV = P × [((1 + r)<sup>n</sup> - 1) / r] × (1 + r)<br>
                                <strong>Lumpsum:</strong> A = P × (1 + r)<sup>t</sup><br><br>
                                <strong>Where:</strong><br>
                                <strong>P</strong> = Investment amount<br>
                                <strong>r</strong> = Periodic rate of return<br>
                                <strong>n</strong> = Total number of monthly investments<br>
                                <strong>t</strong> = Time period in years
                            </div>

                            <h3>Example</h3>
                            <p><strong>SIP example:</strong> If you invest &#8377;5,000 every month for 10 years at an expected return of 12% per year, your total investment becomes &#8377;6,00,000 and the estimated maturity value is much higher because your returns keep compounding over time.</p>

                            <h3>Why Investors Use It</h3>
                            <p>Mutual fund calculators are helpful for retirement planning, child education goals, wealth creation, and comparing SIP vs lumpsum strategies before starting an investment.</p>

                            <h3>FAQs</h3>
                            <div class="stepup-faq-accordion" aria-label="Mutual Fund Calculator Frequently Asked Questions">
                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-mf-faq="0">
                                    <span class="stepup-faq-question">What is the difference between SIP and lumpsum?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="mf-faq-panel-0" hidden>
                                    SIP means investing a fixed amount regularly, usually every month. Lumpsum means investing one amount at a single time and letting it grow.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-mf-faq="1">
                                    <span class="stepup-faq-question">What return rate should I use?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="mf-faq-panel-1" hidden>
                                    Many investors use 10% to 15% as a long-term estimate for equity mutual funds, but actual returns can vary depending on market conditions and fund type.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-mf-faq="2">
                                    <span class="stepup-faq-question">Is SIP better than lumpsum?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="mf-faq-panel-2" hidden>
                                    SIP is often preferred for disciplined investing and reducing market timing risk, while lumpsum can work well if you have a large amount available and a long investment horizon.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-mf-faq="3">
                                    <span class="stepup-faq-question">Does this calculator guarantee returns?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="mf-faq-panel-3" hidden>
                                    No. This calculator only gives estimates based on the return rate you enter. Mutual fund returns are market-linked and are not guaranteed.
                                </div>
                            </div>

                            <h3>Related Calculators</h3>
                            <ul class="related-calc-list">
                                <li><a href="calculator-sip.php">SIP Calculator</a> - estimate monthly investment growth</li>
                                <li><a href="calculator-lumpsum.php">Lumpsum Calculator</a> - project one-time investment returns</li>
                                <li><a href="calculator-compound-interest.php">Compound Interest</a> - understand long-term growth</li>
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

    (function initModernMutualFundUI() {
        var root = document.querySelector('.investment-modern-calc');
        if (!root) return;

        var tabs = root.querySelectorAll('.investment-tab[data-mode]');

        var amountLabel = document.getElementById('amountLabel');
        var amountRange = document.getElementById('investmentAmountRange');
        var amountInput = document.getElementById('investmentAmountInput');
        var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;

        var rateRange = document.getElementById('investmentRateRange');
        var rateInput = document.getElementById('investmentRateInput');
        var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;

        var yearsRange = document.getElementById('investmentYearsRange');
        var yearsInput = document.getElementById('investmentYearsInput');
        var yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;

        var summaryInvested = document.getElementById('summaryInvested');
        var summaryReturns = document.getElementById('summaryReturns');
        var summaryTotal = document.getElementById('summaryTotal');
        var donutCenterValue = document.getElementById('donutCenterValue');
        var investNowBtn = document.getElementById('investNowBtn');

        var MIN_AMOUNT = 100;
        var MAX_AMOUNT = 10000000;
        var MIN_RATE = 1;
        var MAX_RATE = 30;
        var MIN_YEARS = 1;
        var MAX_YEARS = 40;

        var activeMode = 'sip';
        var donutChart = null;

        function clamp(n, min, max) {
            if (!isFinite(n)) return min;
            return Math.min(max, Math.max(min, n));
        }

        function formatINR0(num) {
            var n = Number(num);
            if (!isFinite(n)) return '\u20B90';
            return '\u20B9' + Math.round(n).toLocaleString('en-IN');
        }

        function formatINRDigits(n) {
            var x = Number(n);
            if (!isFinite(x)) return '0';
            return Math.round(x).toLocaleString('en-IN');
        }

        function parseDigitsOnly(input) {
            if (typeof input !== 'string') return Number(input) || 0;
            var digits = input.replace(/[^\d]/g, '');
            var n = Number(digits);
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
            var min = Number(rangeEl.min);
            var max = Number(rangeEl.max);
            var percent = ((value - min) / (max - min)) * 100;
            rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
        }

        function computeLumpsum(amount, rate, years) {
            var r = rate / 100;
            var totalValue = amount * Math.pow(1 + r, years);
            var invested = amount;
            var returns = totalValue - invested;
            return { invested: invested, returns: returns, totalValue: totalValue };
        }

        function computeSIP(monthlyAmount, rate, years) {
            var monthlyRate = Math.pow(1 + (rate / 100), 1 / 12) - 1;
            var totalMonths = years * 12;
            var totalValue = monthlyRate === 0
                ? monthlyAmount * totalMonths
                : monthlyAmount * ((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * (1 + monthlyRate);
            var invested = monthlyAmount * totalMonths;
            var returns = totalValue - invested;
            return { invested: invested, returns: returns, totalValue: totalValue };
        }

        function computeActive() {
            var amount = Number(amountRange.value);
            var rate = Number(rateRange.value);
            var years = Number(yearsRange.value);
            return activeMode === 'sip' ? computeSIP(amount, rate, years) : computeLumpsum(amount, rate, years);
        }

        function ensureDonutChart() {
            if (donutChart || typeof ApexCharts === 'undefined') return;

            var donutEl = document.getElementById('investmentDonutChart');
            if (!donutEl) return;

            var data = computeActive();
            donutChart = new ApexCharts(donutEl, {
                series: [Math.max(0, data.invested), Math.max(0, data.returns)],
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

        function updateSummaryUI(animate) {
            var data = computeActive();
            if (summaryInvested) summaryInvested.textContent = formatINR0(data.invested);
            if (summaryReturns) summaryReturns.textContent = formatINR0(data.returns);
            if (summaryTotal) summaryTotal.textContent = formatINR0(data.totalValue);
            if (donutCenterValue) donutCenterValue.textContent = formatINR0(data.totalValue);
            updateDonutChart(data.invested, data.returns, animate);
        }

        function setMode(mode) {
            activeMode = mode === 'sip' ? 'sip' : 'lumpsum';

            if (amountLabel) {
                amountLabel.textContent = activeMode === 'sip' ? 'Monthly investment (\u20B9)' : 'Total investment (\u20B9)';
            }

            tabs.forEach(function(btn) {
                var isActive = btn.getAttribute('data-mode') === activeMode;
                btn.classList.toggle('is-active', isActive);
                btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });

            if (activeMode === 'sip') {
                amountRange.min = '100';
                amountRange.step = '100';
                if (Number(amountRange.value) < 100) amountRange.value = 5000;
                if (parseDigitsOnly(amountInput.value) < 100) amountInput.value = formatINRDigits(5000);
            } else {
                amountRange.min = '500';
                amountRange.step = '500';
                if (Number(amountRange.value) < 500) amountRange.value = 25000;
                if (parseDigitsOnly(amountInput.value) < 500) amountInput.value = formatINRDigits(25000);
            }

            setRangeFill(amountRange, Number(amountRange.value));
            updateSummaryUI(true);
        }

        amountRange.addEventListener('input', function() {
            var minAmount = activeMode === 'sip' ? 100 : 500;
            var v = Math.round(Number(amountRange.value));
            var clamped = clamp(v, minAmount, MAX_AMOUNT);
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
            var v = Number(rateRange.value);
            var clamped = clamp(v, MIN_RATE, MAX_RATE);
            var rounded = Math.round(clamped * 10) / 10;
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
            var v = Math.round(Number(yearsRange.value));
            var clamped = clamp(v, MIN_YEARS, MAX_YEARS);
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
            var raw = String(amountInput.value || '');
            var digits = raw.replace(/[^\d]/g, '');
            var minAmount = activeMode === 'sip' ? 100 : 500;

            if (!digits) {
                if (raw.trim() === '') {
                    setAmountError(false);
                } else {
                    amountInput.value = '';
                    setAmountError(true);
                }
                return;
            }

            var v = Number(digits);
            var invalid = v < minAmount || v > MAX_AMOUNT;
            setAmountError(invalid);

            var clamped = clamp(Math.round(v), minAmount, MAX_AMOUNT);
            amountRange.value = clamped;
            setRangeFill(amountRange, clamped);
            amountInput.value = formatINRDigits(v);

            if (!invalid) updateSummaryUI(false);
        });

        amountInput.addEventListener('change', function() {
            var raw = String(amountInput.value || '');
            var digits = raw.replace(/[^\d]/g, '');
            var minAmount = activeMode === 'sip' ? 100 : 500;
            var v = digits ? Number(digits) : minAmount;
            var clamped = clamp(Math.round(v), minAmount, MAX_AMOUNT);
            amountRange.value = clamped;
            amountInput.value = formatINRDigits(clamped);
            setAmountError(false);
            setRangeFill(amountRange, clamped);
            updateSummaryUI(true);
        });

        rateInput.addEventListener('input', function() {
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
            var rounded = Math.round(clamped * 10) / 10;
            rateRange.value = rounded;
            setRangeFill(rateRange, rounded);

            if (!invalid) updateSummaryUI(false);
        });

        rateInput.addEventListener('change', function() {
            var raw = String(rateInput.value || '');
            var v = raw.trim() === '' ? MIN_RATE : Number(raw);
            var safe = isFinite(v) ? v : MIN_RATE;
            var clamped = clamp(safe, MIN_RATE, MAX_RATE);
            var rounded = Math.round(clamped * 10) / 10;
            rateRange.value = rounded;
            rateInput.value = rounded;
            setRateError(false);
            setRangeFill(rateRange, rounded);
            updateSummaryUI(true);
        });

        yearsInput.addEventListener('input', function() {
            var raw = String(yearsInput.value || '');
            if (raw.trim() === '') {
                setYearsError(true);
                return;
            }

            var v = Math.round(Number(yearsInput.value));
            if (!isFinite(v)) {
                setYearsError(true);
                return;
            }

            var invalid = v < MIN_YEARS || v > MAX_YEARS;
            setYearsError(invalid);
            var clamped = clamp(v, MIN_YEARS, MAX_YEARS);
            yearsRange.value = clamped;
            setRangeFill(yearsRange, clamped);

            if (!invalid) updateSummaryUI(false);
        });

        yearsInput.addEventListener('change', function() {
            var raw = String(yearsInput.value || '');
            var v = raw.trim() === '' ? MIN_YEARS : Math.round(Number(raw));
            var safe = isFinite(v) ? v : MIN_YEARS;
            var clamped = clamp(safe, MIN_YEARS, MAX_YEARS);
            yearsRange.value = clamped;
            yearsInput.value = clamped;
            setYearsError(false);
            setRangeFill(yearsRange, clamped);
            updateSummaryUI(true);
        });

        tabs.forEach(function(btn) {
            btn.addEventListener('click', function() {
                setMode(btn.getAttribute('data-mode'));
            });
        });

        setRangeFill(amountRange, Number(amountRange.value));
        amountInput.value = formatINRDigits(Number(amountRange.value));
        setRangeFill(rateRange, Number(rateRange.value));
        setRangeFill(yearsRange, Number(yearsRange.value));

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
                var target = document.querySelector('.calculator-wrapper');
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        }

        var faqRows = document.querySelectorAll('.stepup-faq-row[data-mf-faq]');
        faqRows.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var idx = btn.getAttribute('data-mf-faq');
                var panel = document.getElementById('mf-faq-panel-' + idx);
                var expanded = btn.getAttribute('aria-expanded') === 'true';

                faqRows.forEach(function(otherBtn) {
                    var otherIdx = otherBtn.getAttribute('data-mf-faq');
                    var otherPanel = document.getElementById('mf-faq-panel-' + otherIdx);
                    otherBtn.setAttribute('aria-expanded', 'false');
                    if (otherPanel) otherPanel.hidden = true;
                });

                if (!expanded) {
                    btn.setAttribute('aria-expanded', 'true');
                    if (panel) panel.hidden = false;
                }
            });
        });

        setMode('lumpsum');
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
