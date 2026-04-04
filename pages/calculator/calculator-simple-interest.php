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
                            <h2 class="calculator-info-title">About Simple Interest Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Simple Interest Calculator</strong> calculates interest on the principal only—no compounding. Interest is computed on the original amount throughout the tenure. It is common in short-term loans, certain deposits, and quick estimations.</p>
                                <p>While most modern banking uses compound interest, understanding simple interest is essential for comparing loan offers, some government schemes, and the fundamentals of interest math.</p>
                                <h3>Formula</h3>
                                <div class="formula-box">
                                    <strong>Simple Interest (SI) = (P × R × T) / 100</strong><br>
                                    <strong>Total Amount = P + SI</strong><br><br>
                                    <strong>Where:</strong><br>
                                    <strong>P</strong> = Principal amount<br>
                                    <strong>R</strong> = Rate of interest (% per annum)<br>
                                    <strong>T</strong> = Time period in years<br>
                                    <strong>SI</strong> = Simple interest earned
                                </div>
                                <h3>Example</h3>
                                <p><strong>Example:</strong> For a principal amount of &#8377;1,00,000 at 8% interest for 3 years, the simple interest is &#8377;24,000. Using the formula, SI = (1,00,000 � 8 � 3) / 100 = &#8377;24,000. Therefore, the total amount = &#8377;1,00,000 + &#8377;24,000 = &#8377;1,24,000, which matches the calculator result shown above.</p>
                                <h3>Common Uses</h3>
                                <p>Short-term personal loans (6–12 months), some auto loans, informal lending, certificates of deposit, quick estimates, educational examples.</p>
                                <h3>Simple vs Compound</h3>
                                <p><strong>Same ₹1,00,000 @10% for 5 years:</strong> Simple = ₹1,50,000 total (₹50,000 interest). Compound = ₹1,61,000 (₹61,000 interest). Compound gives ~₹11,000 more. Use SI for short tenures and quick estimates; use compound for FDs, PPF, and investments.</p>
                                
                                <h3>FAQs</h3>
                                <div class="stepup-faq-accordion" aria-label="Simple Interest Frequently Asked Questions">
                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-si-faq="0">
                                        <span class="stepup-faq-question">What is simple interest?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="si-faq-panel-0" hidden>
                                        Simple interest is calculated only on the original principal amount for the entire period. It does not add interest on previously earned interest.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-si-faq="1">
                                        <span class="stepup-faq-question">Simple interest vs compound interest?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="si-faq-panel-1" hidden>
                                        In simple interest, interest is charged only on the principal. In compound interest, interest is charged on the principal plus accumulated interest, so the total grows faster.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-si-faq="2">
                                        <span class="stepup-faq-question">Can I calculate time in months or days?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="si-faq-panel-2" hidden>
                                        Yes. Convert months or days into years before using the formula. For example, 6 months = 0.5 years and 90 days is approximately 90/365 years.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-si-faq="3">
                                        <span class="stepup-faq-question">Is simple interest better for borrowers?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="si-faq-panel-3" hidden>
                                        Usually yes. For the same principal, rate, and time, simple interest usually results in a lower total amount payable than compound interest.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-si-faq="4">
                                        <span class="stepup-faq-question">Do banks use simple interest?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="si-faq-panel-4" hidden>
                                        Some short-term loans may use simple interest, but most deposits and many modern loans use compound interest or a reducing balance method.
                                    </div>
                                </div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-compound-interest.php">Compound Interest</a> - compare compounding effect</li>
                                    <li><a href="calculator-fd.php">FD Calculator</a> - actual compounding in FDs</li>
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
