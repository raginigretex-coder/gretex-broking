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
                            <h2 class="calculator-info-title">About PPF Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Public Provident Fund (PPF) Calculator</strong> is a comprehensive financial planning tool for India's most trusted long-term investment scheme. Launched in 1968 by the National Savings Organization, PPF offers a unique combination of guaranteed returns, complete tax exemption, and government-backed security.</p>
                                <p>This calculator shows how your contributions grow over the 15-year mandatory period and longer tenures. Experiment with yearly deposits from &#8377;500 to &#8377;1.5 lakh and visualize the impact of consistent investing with triple tax benefit (EEE status).</p>
                                <h3>How PPF Works</h3>
                                <p><strong>Eligibility:</strong> All Indian residents. One account per person. Minor accounts allowed (convert to adult at 18). Open at post offices or authorized banks.</p>
                                <p><strong>Deposits:</strong> Min &#8377;500, max &#8377;1,50,000/year. Lump sum or up to 12 installments. Deposit before 5th of month for full-month interest. 15-year mandatory period.</p>
                                <p><strong>Interest:</strong> Calculated on lowest balance between 5th and month-end. Compounded annually. Current illustrative rate: <?php echo htmlspecialchars((string) $ppfRatePercent, ENT_QUOTES, 'UTF-8'); ?>% p.a. Completely tax-free.</p>
                                <p><strong>Maturity:</strong> After 15 years – close, extend with deposits (max &#8377;1.5L/yr), or extend without deposits. Partial withdrawal from year 7 (50% limit). Loan facility year 3–6.</p>
                                <h3>Benefits & Features</h3>
                                <ul>
                                    <li>Government-notified rate – stable, long-term savings</li>
                                    <li>EEE status: Tax-free on deposit, interest, and maturity</li>
                                    <li>100% government-backed, zero credit risk</li>
                                    <li>Partial withdrawal from year 7; loan from year 3–6</li>
                                    <li>Extension in 5-year blocks; no maximum age to open</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>Salaried employees, self-employed professionals, conservative investors, first-time investors, retirees, and parents planning children's education – anyone seeking stable, tax-efficient, risk-free long-term wealth building.</p>
                                <h3>Important Considerations</h3>
                                <div class="callout-box">
                                    <strong>Key Points:</strong> Deposit before April 5th for maximum interest. Account becomes inactive if minimum &#8377;500 is not deposited (&#8377;50 penalty to reactivate). NRIs cannot open new accounts. Premature closure reduces interest to ~4%.
                                </div>
                                <h3>Example</h3>
                                <p><strong>Scenario:</strong> Age 30, &#8377;1.5L/year for 15 years @ <?php echo htmlspecialchars((string) $ppfRatePercent, ENT_QUOTES, 'UTF-8'); ?>%. Total investment: &#8377;22.5L. Maturity at 45 depends on notified rates each year; use the calculator above for projections.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Can I open PPF at 50?</p><p>Yes, no maximum age. But 15-year lock-in applies.</p></div>
                                <div class="faq-item"><p class="faq-q">What if I miss a year's deposit?</p><p>Account becomes inactive. Pay &#8377;50 penalty per default year + &#8377;500 for each missed year to reactivate.</p></div>
                                <div class="faq-item"><p class="faq-q">Best time to deposit?</p><p>Before April 5th – deposits after 5th lose that month's interest.</p></div>
                                <div class="faq-item"><p class="faq-q">PPF vs ELSS for tax saving?</p><p>Combine both: PPF for stability, ELSS for growth (12–15% potential).</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-epf.php">EPF Calculator</a> - compare with employer provident fund</li>
                                    <li><a href="calculator-elss.php">ELSS Calculator</a> - balance safe + growth for 80C</li>
                                    <li><a href="calculator-ssy.php">SSY Calculator</a> - if you have a girl child (higher returns)</li>
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - supplement with equity for inflation-beating returns</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - track actual returns over time</li>
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
