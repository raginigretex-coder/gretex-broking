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
                        <h2 class="calculator-info-title">About Compound Interest Calculator</h2>
                        <div class="calculator-info-content">
                            <p>The <strong>Compound Interest Calculator</strong> shows how your money grows when interest is earned not only on the principal but also on previously accumulated interest. This is why compounding plays a major role in long-term investing.</p>
                            <p>Use this calculator to compare the effect of yearly, half-yearly, quarterly, and monthly compounding on your investment value over time.</p>

                            <h3>Formula</h3>
                            <div class="formula-box">
                                <strong>A = P (1 + r / n)<sup>nt</sup></strong><br>
                                <strong>CI = A - P</strong><br><br>
                                <strong>Where:</strong><br>
                                <strong>A</strong> = Total amount at maturity<br>
                                <strong>CI</strong> = Compound interest earned<br>
                                <strong>P</strong> = Principal amount<br>
                                <strong>r</strong> = Annual rate of interest (decimal form)<br>
                                <strong>n</strong> = Number of times interest is compounded in a year<br>
                                <strong>t</strong> = Time period in years
                            </div>

                            <h3>Example</h3>
                            <p><strong>Example:</strong> For a principal amount of &#8377;1,00,000 at 6% annual interest for 5 years with quarterly compounding, the maturity amount is approximately &#8377;1,34,686. Using the formula, A = 1,00,000 (1 + 0.06 / 4)<sup>4 × 5</sup> = &#8377;1,34,686. Therefore, the compound interest earned is approximately &#8377;34,686, which matches the calculator result shown above.</p>

                            <h3>Why Compound Interest Matters</h3>
                            <p>Compound interest creates faster growth than simple interest because every compounding period adds new interest on top of the earlier balance. The longer the investment period, the stronger this compounding effect becomes.</p>

                            <h3>Simple vs Compound</h3>
                            <p><strong>Same &#8377;1,00,000 at 10% for 5 years:</strong> Simple interest gives a total of &#8377;1,50,000, while compound interest gives a higher maturity value because interest is earned on interest as well. This makes compound interest more effective for long-term wealth creation.</p>

                            <h3>FAQs</h3>
                            <div class="stepup-faq-accordion" aria-label="Compound Interest Frequently Asked Questions">
                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ci-faq="0">
                                    <span class="stepup-faq-question">What is compound interest?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ci-faq-panel-0" hidden>
                                    Compound interest is interest calculated on the principal plus previously earned interest. Because of this, your amount grows faster than in simple interest.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ci-faq="1">
                                    <span class="stepup-faq-question">Which compounding frequency gives higher returns?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ci-faq-panel-1" hidden>
                                    More frequent compounding usually gives slightly higher returns. Monthly compounding generally earns more than quarterly, and quarterly usually earns more than yearly, for the same principal, rate, and time.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ci-faq="2">
                                    <span class="stepup-faq-question">What is the difference between simple and compound interest?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ci-faq-panel-2" hidden>
                                    Simple interest is calculated only on the principal, while compound interest is calculated on the principal plus accumulated interest. That is why compound interest produces a larger final amount over longer periods.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ci-faq="3">
                                    <span class="stepup-faq-question">Is compound interest good for investors?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ci-faq-panel-3" hidden>
                                    Yes. Compound interest is highly beneficial for investors because it accelerates long-term growth, especially when investments are left untouched for many years.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ci-faq="4">
                                    <span class="stepup-faq-question">Can compound interest work against borrowers?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ci-faq-panel-4" hidden>
                                    Yes. On loans and credit cards, compound interest can increase the outstanding balance quickly if payments are delayed, which is why high-interest debt can become expensive.
                                </div>
                            </div>

                            <h3>Related Calculators</h3>
                            <ul class="related-calc-list">
                                <li><a href="calculator-simple-interest.php">Simple Interest</a> - compare with non-compounding growth</li>
                                <li><a href="calculator-sip.php">SIP Calculator</a> - monthly investment compounding</li>
                                <li><a href="calculator-fd.php">FD Calculator</a> - compare fixed deposit growth</li>
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
