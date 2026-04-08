<?php
/**
 * PPF Calculator - Gretex Financial
 * Gretex Share Broking Limited
 *
 * Groww-style defaults: yearly ₹10,000, 15 years, 7.1% p.a. (government rate).
 */

$pageTitle = 'PPF Calculator - Gretex Financial';
$additionalCSS = [
    '../../css/calculator-page.css',
    '../../css/chatbot.css',
];

$additionalScripts = [
    'https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js',
];

require_once '../../includes/header.php';
require_once '../../includes/navbar.php';

/** @var float PPF rate shown as fixed (matches typical current notified rate). */
$ppfRatePercent = 7.1;
?>

    <main class="calculator-page investment-modern-calc-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link"><i data-lucide="arrow-left"></i><span>Back to Calculators</span></a>
                    <h1 class="calculator-page-title">PPF Calculator</h1>
                    <p class="calculator-page-description">Public Provident Fund – long-term, tax-free savings (Groww-style inputs and live maturity estimate).</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <!-- Self-contained PPF modern UI (correct yearly-deposit math via calcPPF; not the generic lumpsum preview). -->
                <section class="investment-modern-calc investment-modern-calc--ppf" aria-label="PPF calculator">
                    <div class="investment-tabs" aria-label="Calculator type">
                        <button type="button" class="investment-tab is-active" aria-current="page">PPF</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="PPF inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="ppfYearlyRange">Yearly investment (₹)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="ppfYearlyErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                            <input type="text" class="pill-input" id="ppfYearlyInput" value="10,000" inputmode="numeric" autocomplete="off" aria-label="Yearly PPF investment" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="ppfYearlyRange" min="500" max="150000" step="500" value="10000" aria-label="Yearly investment slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="ppfYearsRange">Time period (in years)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="ppfYearsErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="ppfYearsInput" min="15" max="50" step="1" value="15" inputmode="numeric" aria-label="PPF tenure in years" />
                                            <span class="pill-unit">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="ppfYearsRange" min="15" max="50" step="1" value="15" aria-label="Time period slider" />
                            </div>

                            <div class="investment-slider-field ppf-rate-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label">Rate of interest</label>
                                    <div class="investment-value-pill investment-value-pill--readonly" title="Notified rate; updated when government revises PPF interest.">
                                        <span class="pill-readonly" id="ppfRateDisplay"><?php echo htmlspecialchars((string) $ppfRatePercent, ENT_QUOTES, 'UTF-8'); ?>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="investment-visual" aria-label="PPF result visualization">
                            <div class="investment-donut-card">
                                <div class="investment-graph-quickbar">
                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-invested"></span>
                                            <span class="quickbar-label">Invested amount</span>
                                        </div>
                                        <div class="quickbar-value" id="ppfSummaryInvested">₹0</div>
                                    </div>
                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-returns"></span>
                                            <span class="quickbar-label">Total interest</span>
                                        </div>
                                        <div class="quickbar-value quickbar-returns-value" id="ppfSummaryInterest">₹0</div>
                                    </div>
                                    <div class="quickbar-total">
                                        <div class="quickbar-total-label">Maturity value</div>
                                        <div class="quickbar-total-value" id="ppfSummaryMaturity">₹0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-wrap">
                                    <div id="ppfModernDonutChart"></div>
                                    <div class="investment-donut-center">
                                        <div class="investment-donut-center-label">Maturity value</div>
                                        <div class="investment-donut-center-value" id="ppfDonutCenterValue">₹0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-legend" aria-hidden="true">
                                    <div class="legend-item">
                                        <span class="legend-dot legend-returns"></span>
                                        <span>Total interest</span>
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
                           <h3 class="calculator-info-title">PPF Calculator (Public Provident Fund)</h3>
                                <div class="calculator-info-content">
                                    <p>Public Provident Fund (PPF) is a government-backed long-term savings scheme designed to encourage disciplined savings with a fixed tenure and tax benefits. It is widely used for capital preservation and long-term financial planning.</p>
                                    <p>A PPF Calculator is a financial tool that helps estimate the maturity value of investments made in a PPF account based on annual contributions, tenure, and applicable interest rates.</p>
                                </div>

                            <h3 class="calculator-info-title">What is a PPF Calculator?</h3>
                                <div class="calculator-info-content">
                                    <p>A PPF Calculator is an online utility that provides an indicative estimate of the maturity amount accumulated under a Public Provident Fund account.</p>
                                    <p>By entering:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Annual investment amount</li>
                                        <li>Investment duration</li>
                                        <li>Applicable interest rate</li>
                                    </ul>
                                    <p>the calculator computes:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Total amount invested</li>
                                        <li>Interest earned over the tenure</li>
                                        <li>Estimated maturity value</li>
                                    </ul>
                                    <p>The results are indicative and depend on the prevailing interest rates notified periodically.</p>
                                </div>

                            <h3 class="calculator-info-title">What is PPF?</h3>
                                <div class="calculator-info-content">
                                    <p>Public Provident Fund (PPF) is a long-term savings scheme introduced to mobilize small savings while offering stable returns and tax benefits. It has a fixed tenure and interest is compounded annually.</p>
                                    <p>It is commonly used for:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Long-term wealth accumulation</li>
                                        <li>Retirement planning</li>
                                        <li>Tax-efficient savings</li>
                                    </ul>
                                </div>
                            <h3 class="calculator-info-title">Purpose and Use of a PPF Calculator</h3>
                                <div class="calculator-info-content">
                                    <p>The PPF calculator assists investors in understanding how their contributions may grow over time.</p>
                                    <p>It can be used to:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Estimate maturity value based on annual investments</li>
                                        <li>Plan contributions in line with financial goals</li>
                                        <li>Understand the effect of compounding over long durations</li>
                                        <li>Support tax planning under applicable provisions</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">How Does a PPF Calculator Work?</h3>
                            <div class="calculator-info-content">
                                <p>A PPF calculator uses a compound interest formula to estimate the maturity value of your yearly investments:</p>
                                <p><strong style="margin-left: 10px;">F = P × ((1 + i)^n - 1) / i</strong></p>
                                <p>Where:</p>
                                <ul style="margin-left: 14px;">
                                    <li><strong>F</strong> = Maturity amount</li>
                                    <li><strong>P</strong> = Annual investment</li>
                                    <li><strong>i</strong> = Rate of interest</li>
                                    <li><strong>n</strong> = Investment tenure (in years)</li>
                                </ul>
                                <p>Interest is compounded annually and applied to the accumulated balance each year.</p>
                            </div>

                            <h3 class="calculator-info-title">Illustrative Example</h3>
                                <div class="calculator-info-content">
                                    <p>Assume:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Annual investment: ₹1,50,000</li>
                                        <li>Investment duration: 15 years</li>
                                        <li>Interest rate: 7.1%</li>
                                    </ul>
                                    <p>The estimated maturity amount at the end of the tenure is:</p>
                                    <p><strong>₹40,68,209 (approx.)</strong></p>
                                    <p>This includes both invested capital and accumulated interest.</p>
                                </div>

                            <h3 class="calculator-info-title">How to Use the PPF Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>To calculate returns:</p>
                                <ol>
                                    <li>Enter the annual investment amount</li>
                                    <li>Select the investment tenure</li>
                                    <li>Input the applicable interest rate</li>
                                    <li>The calculator will display:
                                        <ul>
                                            <li>Total investment</li>
                                            <li>Interest earned</li>
                                            <li>Maturity amount </li>
                                        </ul>
                                    </li>
                                </ol>
                                <p>The results update dynamically based on input values.</p>
                            </div>

                            <h3 class="calculator-info-title">How the PPF Calculator Assists Investors</h3>
                                <div class="calculator-info-content">
                                    <ul style="margin-left: 14px;">
                                        <li>Provides a structured estimate of long-term savings</li>
                                        <li>Eliminates the need for manual calculations</li>
                                        <li>Helps in evaluating different contribution scenarios</li>
                                        <li>Supports planning for long-term financial goals</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">Tax Benefits of PPF</h3>
                                <div class="calculator-info-content">
                                    <p>PPF investments are generally classified under the EEE (Exempt-Exempt-Exempt) category:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Contributions are eligible for deduction under Section 80C (subject to applicable limits)</li>
                                        <li>Interest earned is tax-exempt</li>
                                        <li>Maturity amount is also tax-exempt</li>
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">Key Considerations</h3>
                                <div class="calculator-info-content">
                                    <ul style="margin-left: 14px;">
                                        <li>Interest rates are revised periodically by the Government</li>
                                        <li>The scheme has a fixed tenure (typically 15 years, extendable)</li>
                                        <li>Annual contributions are required to keep the account active</li>
                                        <li>The calculator provides indicative values and does not account for changes in interest rates over time</li>
                                        
                                    </ul>
                                </div>

                            <h3 class="calculator-info-title">FAQs</h3>
                            <div class="stepup-faq-accordion" aria-label="PPF calculator frequently asked questions">
                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ppf-faq="0">
                                    <span class="stepup-faq-question">What is the tenure of a PPF account?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ppf-faq-panel-0" hidden>
                                    The standard tenure is 15 years, which can be extended in blocks.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ppf-faq="1">
                                    <span class="stepup-faq-question">Is the interest rate fixed?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ppf-faq-panel-1" hidden>
                                    No, it is revised periodically by the Government.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ppf-faq="2">
                                    <span class="stepup-faq-question">Does the calculator provide exact returns?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ppf-faq-panel-2" hidden>
                                    No, it provides estimates based on assumed inputs.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ppf-faq="3">
                                    <span class="stepup-faq-question">Are PPF returns taxable?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ppf-faq-panel-3" hidden>
                                    No, returns are generally tax-exempt under applicable provisions.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ppf-faq="4">
                                    <span class="stepup-faq-question">Can I change my annual contribution?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ppf-faq-panel-4" hidden>
                                    Yes, contributions can be varied within the prescribed limits.
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
        (function () {
            'use strict';

            var PPF_RATE = <?php echo json_encode((float) $ppfRatePercent); ?>;
            var MIN_YEARLY = 500;
            var MAX_YEARLY = 150000;
            var YEARLY_STEP = 500;
            var MIN_YEARS = 15;
            var MAX_YEARS = 50;

            var yearlyRange = document.getElementById('ppfYearlyRange');
            var yearlyInput = document.getElementById('ppfYearlyInput');
            var yearsRange = document.getElementById('ppfYearsRange');
            var yearsInput = document.getElementById('ppfYearsInput');
            var yearlyField = yearlyRange ? yearlyRange.closest('.investment-slider-field') : null;
            var yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;

            var summaryInvested = document.getElementById('ppfSummaryInvested');
            var summaryInterest = document.getElementById('ppfSummaryInterest');
            var summaryMaturity = document.getElementById('ppfSummaryMaturity');
            var donutCenterValue = document.getElementById('ppfDonutCenterValue');

            var ppfModernDonutChart = null;

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

            function snapYearly(v) {
                var step = YEARLY_STEP > 0 ? YEARLY_STEP : 500;
                return Math.round(Number(v) / step) * step;
            }

            function setYearlyError(on) {
                if (yearlyField) yearlyField.classList.toggle('is-error', !!on);
            }

            function setYearsError(on) {
                if (yearsField) yearsField.classList.toggle('is-error', !!on);
            }

            function setRangeFill(rangeEl, value) {
                var min = Number(rangeEl.min);
                var max = Number(rangeEl.max);
                var percent = ((value - min) / (max - min)) * 100;
                rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
            }

            function readYearly() {
                return clamp(snapYearly(Number(yearlyRange.value)), MIN_YEARLY, MAX_YEARLY);
            }

            function readYears() {
                return clamp(Math.round(Number(yearsRange.value)), MIN_YEARS, MAX_YEARS);
            }

            function computePPF() {
                if (typeof calcPPF !== 'function') {
                    return { totalInvestment: 0, interestEarned: 0, maturityValue: 0, yearlyData: [] };
                }
                return calcPPF(readYearly(), readYears(), PPF_RATE);
            }

            function ensureModernDonut() {
                if (ppfModernDonutChart || typeof ApexCharts === 'undefined') return;
                var el = document.getElementById('ppfModernDonutChart');
                if (!el) return;
                var r = computePPF();
                ppfModernDonutChart = new ApexCharts(el, {
                    series: [Math.max(0, r.totalInvestment), Math.max(0, r.interestEarned)],
                    chart: { type: 'donut', height: 285, animations: { enabled: true, easing: 'easeinout', speed: 450 } },
                    labels: ['Total investment', 'Total interest'],
                    colors: ['#F97316', '#3B6DFF'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    tooltip: { y: { formatter: function (val) { return formatINR0(val); } } },
                    plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
                });
                ppfModernDonutChart.render();
            }

            function updateModernSummary(animateChart) {
                var r = computePPF();
                if (summaryInvested) summaryInvested.textContent = formatINR0(r.totalInvestment);
                if (summaryInterest) summaryInterest.textContent = formatINR0(r.interestEarned);
                if (summaryMaturity) summaryMaturity.textContent = formatINR0(r.maturityValue);
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(r.maturityValue);
                ensureModernDonut();
                if (ppfModernDonutChart) {
                    ppfModernDonutChart.updateSeries([Math.max(0, r.totalInvestment), Math.max(0, r.interestEarned)], animateChart !== false);
                }
            }

            function refreshAll(animateDonut) {
                updateModernSummary(animateDonut);
            }

            function bindWhenReady() {
                if (document.body.dataset.ppfModernBound === '1') {
                    return true;
                }
                if (typeof calcPPF !== 'function' || !yearlyRange || !yearlyInput || !yearsRange || !yearsInput) {
                    return false;
                }
                document.body.dataset.ppfModernBound = '1';

                yearlyRange.addEventListener('input', function () {
                    var v = clamp(snapYearly(Number(yearlyRange.value)), MIN_YEARLY, MAX_YEARLY);
                    yearlyRange.value = v;
                    yearlyInput.value = formatINRDigits(v);
                    setYearlyError(false);
                    setRangeFill(yearlyRange, v);
                    refreshAll(false);
                });
                yearlyRange.addEventListener('change', function () {
                    setYearlyError(false);
                    refreshAll(true);
                });

                yearsRange.addEventListener('input', function () {
                    var v = clamp(Math.round(Number(yearsRange.value)), MIN_YEARS, MAX_YEARS);
                    yearsRange.value = v;
                    yearsInput.value = v;
                    setYearsError(false);
                    setRangeFill(yearsRange, v);
                    refreshAll(false);
                });
                yearsRange.addEventListener('change', function () {
                    setYearsError(false);
                    refreshAll(true);
                });

                yearlyInput.addEventListener('input', function () {
                    var raw = String(yearlyInput.value || '');
                    var digits = raw.replace(/[^\d]/g, '');
                    if (!digits) {
                        setYearlyError(raw.trim() !== '');
                        return;
                    }
                    var v = Number(digits);
                    var invalid = v < MIN_YEARLY || v > MAX_YEARLY;
                    setYearlyError(invalid);
                    var clamped = clamp(snapYearly(v), MIN_YEARLY, MAX_YEARLY);
                    yearlyRange.value = clamped;
                    setRangeFill(yearlyRange, clamped);
                    yearlyInput.value = formatINRDigits(v);
                    if (!invalid) refreshAll(false);
                });
                yearlyInput.addEventListener('change', function () {
                    var raw = String(yearlyInput.value || '');
                    var digits = raw.replace(/[^\d]/g, '');
                    var v = digits ? Number(digits) : MIN_YEARLY;
                    var clamped = clamp(snapYearly(v), MIN_YEARLY, MAX_YEARLY);
                    yearlyRange.value = clamped;
                    yearlyInput.value = formatINRDigits(clamped);
                    setYearlyError(false);
                    setRangeFill(yearlyRange, clamped);
                    refreshAll(true);
                });

                yearsInput.addEventListener('input', function () {
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
                    if (!invalid) refreshAll(false);
                });
                yearsInput.addEventListener('change', function () {
                    var raw = String(yearsInput.value || '');
                    var v = raw.trim() === '' ? MIN_YEARS : Math.round(Number(raw));
                    var safe = isFinite(v) ? v : MIN_YEARS;
                    var clamped = clamp(safe, MIN_YEARS, MAX_YEARS);
                    yearsRange.value = clamped;
                    yearsInput.value = clamped;
                    setYearsError(false);
                    setRangeFill(yearsRange, clamped);
                    refreshAll(true);
                });

                setRangeFill(yearlyRange, readYearly());
                yearlyInput.value = formatINRDigits(readYearly());
                setRangeFill(yearsRange, readYears());

                var apexAttempts = 0;
                function waitApex() {
                    refreshAll(false);
                    if (typeof ApexCharts === 'undefined') {
                        apexAttempts += 1;
                        if (apexAttempts < 80) setTimeout(waitApex, 80);
                    } else {
                        ensureModernDonut();
                        refreshAll(false);
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
require_once '../../includes/footer.php';
?>
