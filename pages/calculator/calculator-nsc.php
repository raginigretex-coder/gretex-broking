<?php
/**
 * NSC Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'NSC Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">NSC Calculator</h1>
                    <p class="calculator-page-description">National Savings Certificate - 5-year tax-saving scheme</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc investment-modern-calc--nsc" aria-label="NSC calculator">
                    <div class="investment-tabs" aria-label="Calculator type">
                        <button type="button" class="investment-tab is-active" aria-current="page">NSC</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="NSC inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="nscAmountRange">Amount invested</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="nscAmountErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                            <input type="text" class="pill-input" id="nscAmountInput" value="100000" inputmode="numeric" autocomplete="off" aria-label="NSC investment amount" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="nscAmountRange" min="1000" max="10000000" step="1000" value="100000" aria-label="Investment amount slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="nscRateRange">Rate of interest (p.a)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="nscRateErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="nscRateInput" min="1" max="15" step="0.1" value="6" inputmode="decimal" aria-label="Rate of interest percentage" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="nscRateRange" min="1" max="15" step="0.1" value="6" aria-label="Rate of interest slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label">Time Period</label>
                                    <div class="investment-input-wrap">
                                        <div class="investment-value-pill investment-value-pill--readonly" title="NSC tenure is fixed at 5 years.">
                                            <span class="pill-readonly">5 Yr</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="nsc-compounding-row" aria-label="Compounding frequency">
                                <span class="nsc-compounding-label">Compounding frequency</span>
                                <label class="sr-only" for="nscCompoundingSelect">Compounding frequency</label>
                                <select id="nscCompoundingSelect" class="nsc-compounding-select" aria-label="Compounding frequency">
                                    <option value="1" selected>Yearly</option>
                                    <option value="2">Half Yearly</option>
                                </select>
                            </div>
                        </div>

                        <div class="investment-visual" aria-label="NSC result visualization">
                            <div class="investment-donut-card">
                                <div class="investment-graph-quickbar">
                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-invested"></span>
                                            <span class="quickbar-label">Invested amount</span>
                                        </div>
                                        <div class="quickbar-value" id="nscSummaryInvested">₹0</div>
                                    </div>
                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-returns"></span>
                                            <span class="quickbar-label">Interest earned</span>
                                        </div>
                                        <div class="quickbar-value quickbar-returns-value" id="nscSummaryInterest">₹0</div>
                                    </div>
                                    <div class="quickbar-total">
                                        <div class="quickbar-total-label">Total amount</div>
                                        <div class="quickbar-total-value" id="nscSummaryMaturity">₹0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-wrap">
                                    <div id="nscModernDonutChart"></div>
                                    <div class="investment-donut-center">
                                        <div class="investment-donut-center-label">Total amount</div>
                                        <div class="investment-donut-center-value" id="nscDonutCenterValue">₹0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-legend" aria-hidden="true">
                                    <div class="legend-item">
                                        <span class="legend-dot legend-returns"></span>
                                        <span>Interest earned</span>
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-dot legend-invested"></span>
                                        <span>Total investment</span>
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
                            <h2 class="calculator-info-title">About NSC Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>National Savings Certificate (NSC) Calculator</strong> helps you estimate returns from one of India's most trusted, government-backed tax-saving options. It is ideal for conservative investors who want capital safety, predictable growth, and Section 80C tax benefits.</p>
                                <p>Use this calculator to view your maturity value, annual interest buildup, and overall tax impact. It also highlights NSC's key <strong>deemed reinvestment</strong> advantage, where interest earned in Years 1 to 4 can be claimed under Section 80C in the following year, helping improve effective post-tax returns.</p>
                                <h3>How NSC Works</h3>
                                <p><strong>Investment structure:</strong> NSC is available through post offices with a fixed 5-year tenure, annual compounding, and a minimum investment of &#8377;1,000 (no upper investment limit). It is a lump-sum product, so you invest once and hold till maturity.</p>
                                <p><strong>Interest and tax treatment:</strong> The notified NSC rate (currently 7.7% p.a., revised by the government periodically) is compounded every year. Interest accrued in Years 1 to 4 is treated as <strong>deemed reinvested</strong> and can be claimed under Section 80C in the following year, while interest for Year 5 is taxable at maturity. Premature withdrawal is generally not allowed except in specific cases like the holder's death or a court order.</p>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>Sovereign-backed safety with fixed, predictable returns and assured maturity value</li>
                                    <li>Dual Section 80C benefit: deduction on principal plus deemed reinvestment claims for Years 1 to 4</li>
                                    <li>Useful alternative to taxable fixed deposits for conservative, tax-aware investors</li>
                                    <li>Easy access through a wide post-office network across India</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>Risk-averse, senior citizens, first-time investors, those maximizing 80C with zero risk. Perfect if: want predictability, don't need money 5 years, prefer government schemes. NOT if: need liquidity, want higher returns (equity), want SIP option.</p>
                                <h3>Algorithm & Formula</h3>
                                <div class="formula-box">
                                    A = P &times; (1 + r / n)<sup>n &times; t</sup><br>
                                    Where: A = Maturity amount, P = Principal invested, r = Annual interest rate (decimal), n = Compounding frequency (1 for Yearly, 2 for Half-Yearly), t = Time in years (NSC: 5)
                                </div>
                                <h3>Important Considerations</h3>
                                <p><strong>Limitations:</strong> 5-year lock-in; 7.7% may not beat inflation; last year interest taxable. <strong>Tips:</strong> Claim deemed reinvestment 80C; compare with PPF; ladder strategy (buy yearly for staggered maturity). Buy only from post office.</p>
                                <h3>Example</h3>
                                <p><strong>Example (Yearly compounding):</strong> If you invest <strong>&#8377;1,00,000</strong> at <strong>7.7% p.a.</strong> for <strong>5 years</strong>, the maturity value is calculated as:<br>
                                <strong>A = 1,00,000 &times; (1 + 0.077/1)<sup>1 &times; 5</sup> = &#8377;1,44,900 (approx.)</strong><br>
                                So, total interest earned is approximately <strong>&#8377;44,900</strong>.</p>
                                <h3>FAQs</h3>
                                <div class="stepup-faq-accordion" aria-label="NSC Frequently Asked Questions">
                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-nsc-faq="0">
                                        <span class="stepup-faq-question">What is the current interest rate on NSC?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="nsc-faq-panel-0" hidden>
                                        The NSC rate is notified by the Government of India and revised periodically. The calculator currently uses 7.7% p.a. as an illustrative rate.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-nsc-faq="1">
                                        <span class="stepup-faq-question">How can I obtain money once my NSC matures?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="nsc-faq-panel-1" hidden>
                                        On maturity, visit the issuing post office with your NSC details and valid KYC documents. The maturity amount is paid as per post-office payout process.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-nsc-faq="2">
                                        <span class="stepup-faq-question">Is it possible for NSC to withdraw before reaching maturity?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="nsc-faq-panel-2" hidden>
                                        Premature withdrawal is generally not allowed. It is permitted only in specific cases such as the holder's death or by court order.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-nsc-faq="3">
                                        <span class="stepup-faq-question">Is it possible to break the NSC?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="nsc-faq-panel-3" hidden>
                                        NSC cannot be broken like a regular deposit. Early closure is restricted and allowed only under the exceptions defined in NSC rules.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-nsc-faq="4">
                                        <span class="stepup-faq-question">Is the interest rate on NSC fixed?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="nsc-faq-panel-4" hidden>
                                        The applicable rate is fixed for your certificate at the time of purchase for its full tenure, even if rates change later for new issues.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-nsc-faq="5">
                                        <span class="stepup-faq-question">Are premature withdrawals allowed in NSC?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="nsc-faq-panel-5" hidden>
                                        As a rule, no. NSC is a 5-year lock-in instrument, with limited exceptions such as death of holder or direction of a competent court.
                                    </div>
                                </div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-ppf.php">PPF Calculator</a> - compare long-term tax-free alternative</li>
                                    <li><a href="calculator-fd.php">Fixed Deposit Calculator</a> - compare with bank FD</li>
                                    <li><a href="calculator-ssy.php">SSY Calculator</a> - girl child government scheme</li>
                                    <li><a href="calculator-elss.php">ELSS Calculator</a> - market-linked tax-saving</li>
                                    <li><a href="calculator-po-fd.php">Post Office FD</a> - other post office schemes</li>
                                    <li><a href="calculator-compound-interest.php">Compound Interest</a> - understand compounding</li>
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
            var MIN_RATE = 1;
            var MAX_RATE = 15;
            var FIXED_YEARS = 5;

            var amountRange = document.getElementById('nscAmountRange');
            var amountInput = document.getElementById('nscAmountInput');
            var rateRange = document.getElementById('nscRateRange');
            var rateInput = document.getElementById('nscRateInput');
            var compoundingSelect = document.getElementById('nscCompoundingSelect');
            var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
            var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;

            var summaryInvested = document.getElementById('nscSummaryInvested');
            var summaryInterest = document.getElementById('nscSummaryInterest');
            var summaryMaturity = document.getElementById('nscSummaryMaturity');
            var donutCenterValue = document.getElementById('nscDonutCenterValue');

            var nscModernDonutChart = null;

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

            function computeNSC() {
                var principal = readAmount();
                var rate = readRate() / 100;
                var frequency = compoundingSelect ? Number(compoundingSelect.value) : 1;
                var n = (frequency === 2) ? 2 : 1;
                var maturityValue = principal * Math.pow(1 + (rate / n), n * FIXED_YEARS);
                var interestEarned = maturityValue - principal;
                return { investmentAmount: principal, interestEarned: interestEarned, maturityValue: maturityValue };
            }

            function ensureModernDonut() {
                if (nscModernDonutChart || typeof ApexCharts === 'undefined') return;
                var el = document.getElementById('nscModernDonutChart');
                if (!el) return;
                var r = computeNSC();
                nscModernDonutChart = new ApexCharts(el, {
                    series: [Math.max(0, r.investmentAmount), Math.max(0, r.interestEarned)],
                    chart: { type: 'donut', height: 285, animations: { enabled: true, easing: 'easeinout', speed: 450 } },
                    labels: ['Total investment', 'Interest earned'],
                    colors: ['#F97316', '#3B6DFF'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    tooltip: { y: { formatter: function (val) { return formatINR0(val); } } },
                    plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
                });
                nscModernDonutChart.render();
            }

            function updateModernSummary(animateChart) {
                var r = computeNSC();
                if (summaryInvested) summaryInvested.textContent = formatINR0(r.investmentAmount);
                if (summaryInterest) summaryInterest.textContent = formatINR0(r.interestEarned);
                if (summaryMaturity) summaryMaturity.textContent = formatINR0(r.maturityValue);
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(r.maturityValue);
                ensureModernDonut();
                if (nscModernDonutChart) {
                    nscModernDonutChart.updateSeries([Math.max(0, r.investmentAmount), Math.max(0, r.interestEarned)], animateChart !== false);
                }
            }

            function bindWhenReady() {
                if (document.body.dataset.nscModernBound === '1') {
                    return true;
                }
                if (!amountRange || !amountInput || !rateRange || !rateInput || !compoundingSelect) {
                    return false;
                }
                document.body.dataset.nscModernBound = '1';

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
                    rateInput.value = Number(v).toFixed(1).replace(/\.0$/, '');
                    setRateError(false);
                    setRangeFill(rateRange, v);
                    updateModernSummary(false);
                });
                rateRange.addEventListener('change', function () {
                    setRateError(false);
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
                    rateInput.value = Number(clamped).toFixed(1).replace(/\.0$/, '');
                    setRateError(false);
                    setRangeFill(rateRange, clamped);
                    updateModernSummary(true);
                });

                compoundingSelect.addEventListener('change', function () {
                    updateModernSummary(true);
                });

                var faqRows = document.querySelectorAll('.stepup-faq-row[data-nsc-faq]');
                faqRows.forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        var idx = btn.getAttribute('data-nsc-faq');
                        var panel = document.getElementById('nsc-faq-panel-' + idx);
                        if (!panel) return;
                        var expanded = btn.getAttribute('aria-expanded') === 'true';
                        btn.setAttribute('aria-expanded', String(!expanded));
                        panel.hidden = expanded;
                    });
                });

                setRangeFill(amountRange, readAmount());
                amountInput.value = formatINRDigits(readAmount());
                setRangeFill(rateRange, readRate());
                rateInput.value = Number(readRate()).toFixed(1).replace(/\.0$/, '');

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



