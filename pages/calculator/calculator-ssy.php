<?php
/**
 * SSY Calculator - Gretex Financial
 * Gretex Share Broking Limited
 *
 * SSY UI and client logic live on this page; other calculators use includes/calculator-modern-ui.php only.
 */

$pageTitle = 'SSY Calculator - Gretex Financial';
$additionalCSS = [
    '../../css/calculator-page.css',
    '../../css/chatbot.css',
];
$additionalScripts = [
    'https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js',
];

require_once '../../includes/header.php';
require_once '../../includes/navbar.php';

$ssyStartYearMax = (int) date('Y');
if ($ssyStartYearMax < 2015) {
    $ssyStartYearMax = 2015;
}

$ssyAmtMin = 250;
$ssyAmtMax = 150000;
$ssyAmtDefault = 10000;
$ssyAmtStep = 250;
$ssyRateMin = 5;
$ssyRateMax = 12;
$ssyRateDefault = 8.2;
$ssyAgeMin = 0;
$ssyAgeMax = 10;
$ssyAgeDefault = 5;
$ssyStartYearMin = 2015;
$ssyStartYearMaxUi = $ssyStartYearMax;
$ssyStartYearDefault = max(2015, min(2021, $ssyStartYearMaxUi));
?>

<main class="calculator-page investment-modern-calc-page">
    <div class="calculator-hero">
        <div class="container">
            <div class="calculator-hero-content">
                <a href="calculators.php" class="back-link">
                    <i data-lucide="arrow-left"></i>
                    <span>Back to Calculators</span>
                </a>
                <h1 class="calculator-page-title">SSY Calculator</h1>
                <p class="calculator-page-description">
                    Plan Sukanya Samriddhi Yojana (SSY) with <strong>15 years of yearly deposits</strong>, then interest until <strong>21 years from opening</strong>. Below the calculator you’ll find the <strong>exact formula</strong> this tool uses and <strong>worked examples</strong> you can verify on the sliders.
                </p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc investment-modern-calc--ssy" data-modern-ui-mode="ssy" aria-label="SSY calculator">
                <div class="investment-tabs" aria-label="Current calculator">
                    <button type="button" class="investment-tab is-active" aria-current="page">SSY</button>
                </div>
                <br><br>
                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="globalInvestmentAmountRange">Yearly investment</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="globalAmountErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">₹</span>
                                        <input type="text" class="pill-input" id="globalInvestmentAmountInput" value="<?php echo (int) $ssyAmtDefault; ?>" inputmode="numeric" aria-label="Yearly investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="globalInvestmentAmountRange" min="<?php echo (int) $ssyAmtMin; ?>" max="<?php echo (int) $ssyAmtMax; ?>" step="<?php echo (int) $ssyAmtStep; ?>" value="<?php echo (int) $ssyAmtDefault; ?>" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="globalInvestmentYearsRange">Girl's age</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="globalYearsErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="globalInvestmentYearsInput" min="<?php echo (int) $ssyAgeMin; ?>" max="<?php echo (int) $ssyAgeMax; ?>" step="1" value="<?php echo (int) $ssyAgeDefault; ?>" inputmode="numeric" aria-label="Girl age at account opening" />
                                        <span class="pill-unit">Yr</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="globalInvestmentYearsRange" min="<?php echo (int) $ssyAgeMin; ?>" max="<?php echo (int) $ssyAgeMax; ?>" step="1" value="<?php echo (int) $ssyAgeDefault; ?>" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="globalSsyStartYearRange">Start period</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="globalSsyStartYearErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input pill-input--ssy-year" id="globalSsyStartYearInput" min="<?php echo (int) $ssyStartYearMin; ?>" max="<?php echo (int) $ssyStartYearMaxUi; ?>" step="1" value="<?php echo (int) $ssyStartYearDefault; ?>" inputmode="numeric" aria-label="Account start year" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="globalSsyStartYearRange" min="<?php echo (int) $ssyStartYearMin; ?>" max="<?php echo (int) $ssyStartYearMaxUi; ?>" step="1" value="<?php echo (int) $ssyStartYearDefault; ?>" />
                        </div>
                    </div>

                    <div class="investment-visual" aria-label="Visualization">
                        <div class="investment-donut-card investment-donut-card--ssy">
                            <div class="ssy-groww-results investment-ssy-summary-top" aria-label="SSY maturity summary">
                                <div class="ssy-summary-list">
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">SSY rate (notified)</span>
                                        <span class="ssy-summary-value ssy-summary-value--interest" id="ssyDisplayedRate">8.2%</span>
                                    </div>
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">Total investment</span>
                                        <span class="ssy-summary-value" id="ssySumInvestment">₹0</span>
                                    </div>
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">Total interest</span>
                                        <span class="ssy-summary-value ssy-summary-value--interest" id="ssySumInterest">₹0</span>
                                    </div>
                                    <div class="ssy-summary-row">
                                        <span class="ssy-summary-label">Maturity year</span>
                                        <span class="ssy-summary-value" id="ssySumMaturityYear">—</span>
                                    </div>
                                    <div class="ssy-summary-row ssy-summary-row--maturity">
                                        <span class="ssy-summary-label">Maturity value</span>
                                        <span class="ssy-summary-value" id="ssySumMaturityValue">₹0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="investment-donut-wrap">
                                <div id="globalInvestmentDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Maturity Value</div>
                                    <div class="investment-donut-center-value" id="globalDonutCenterValue">₹0</div>
                                </div>
                            </div>

                            <div class="investment-donut-legend" aria-hidden="true">
                                <div class="legend-item">
                                    <span class="legend-dot investment-donut-legend-dot--ssy-principal"></span>
                                    <span>Your investment</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot investment-donut-legend-dot--ssy-interest"></span>
                                    <span>Interest earned</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="investment-summary-cta">
                    <button type="button" class="investment-cta" id="globalInvestNowBtn">INVEST NOW</button>
                </div>
            </section>

            <div class="calculator-wrapper">
                <aside class="calculator-sidebar" id="calculatorSidebar" aria-label="All calculators"></aside>
                <div class="calculator-info-section">
                    <div class="calculator-info-card">
                      <h3 class="calculator-info-title">Sukanya Samriddhi Yojana (SSY) Calculator</h3>
                            <div class="calculator-info-content">
                                <p>Sukanya Samriddhi Yojana (SSY) is a government-backed savings scheme designed to support the financial needs of a girl child, particularly for education and long-term goals. The scheme allows guardians to make periodic contributions and earn interest over a defined tenure.</p>
                                <p>An SSY Calculator is a financial tool used to estimate the maturity value of investments made under this scheme, based on contribution amount, tenure, and applicable interest rates.</p>
                            </div>
                            
                        <h3 class="calculator-info-title">What is an SSY Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>An SSY Calculator is an online utility that provides an indicative estimate of the total corpus accumulated under the Sukanya Samriddhi Yojana.</p>
                                <p>By entering inputs such as:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Annual contribution amount</li>
                                    <li>Age of the girl child</li>
                                    <li>Investment start year</li>
                                </ul>
                                <p>the calculator computes:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Total amount invested</li>
                                    <li>Interest earned over the tenure</li>
                                    <li>Estimated maturity value and year</li>
                                </ul>
                                <p>The calculations are based on the prevailing interest rate notified by the Government and are indicative in nature.</p>
                            </div>
                        <h3 class="calculator-info-title">Eligibility for SSY</h3>
                            <div class="calculator-info-content">
                                <p>The scheme and corresponding calculator are applicable to:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Parents or legal guardians of a girl child</li>
                                    <li>Girl child must be below 10 years of age at the time of account opening</li>
                                </ul>
                                <p>Supporting documentation is required to open and maintain the account as per regulatory guidelines.</p>
                            </div>
                        <h3 class="calculator-info-title">Purpose and Use of an SSY Calculator</h3>
                            <div class="calculator-info-content">
                                <p>The SSY calculator assists in long-term financial planning by providing an estimate of accumulated savings under the scheme.</p>
                                <p>It can be used to:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Estimate maturity amount based on annual contributions</li>
                                    <li>Plan contributions in alignment with future financial requirements</li>
                                    <li>Assess the impact of compounding over the scheme tenure</li>
                                    <li>Support goal-based planning for education or other long-term needs</li>
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">How Does the SSY Calculator Work?</h3>
                            <div class="calculator-info-content">
                                <p>The SSY scheme operates with:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Contributions allowed for <strong>15 years</strong></li>
                                    <li>Total maturity period of <strong>21 years</strong></li>
                                    <li>Interest compounded annually</li>
                                </ul>
                                <p>The calculator estimates the future value using a compound interest approach:</p>
                                <p><strong style="margin-left: 10px;">A = P × (1 + r/n)^(n×t)</strong></p>
                                <p>Where:</p>
                                <ul style="margin-left: 14px;">
                                    <li><strong>A</strong> = Maturity value</li>
                                    <li><strong>P</strong> = Annual contribution</li>
                                    <li><strong>r</strong> = Rate of interest</li>
                                    <li><strong>t</strong> = Investment duration</li>
                                    <li><strong>n</strong> = Compounding frequency (annual)</li>
                                </ul>
                                <p>Even after contributions stop (post 15 years), the invested amount continues to earn interest until maturity.</p>
                            </div>

                        <h3 class="calculator-info-title">Example</h3>
                            <div class="calculator-info-content">
                                <p>Assume:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Annual contribution: ₹1,00,000</li>
                                    <li>Contribution period: 15 years</li>
                                    <li>Total tenure: 21 years</li>
                                    <li>Interest rate: 8.2% (assumed)</li>
                                </ul>
                                <p>The total contribution over 15 years would be ₹15,00,000.</p>
                                <p>With annual compounding, the estimated maturity value may be in the range of:</p>
                                <p><strong>₹40,00,000+ (approx.)</strong></p>
                                <p>Actual returns depend on the interest rate notified periodically by the Government.</p>
                            </div>


                        <h3 class="calculator-info-title">How to Use the SSY Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>To use the calculator:</p>
                                <ol>
                                    <li>Enter the annual investment amount</li>
                                    <li>Input the age of the girl child</li>
                                    <li>Select the investment start year</li>
                                    <li>The calculator will display:
                                        <ul>
                                            <li>Total investment</li>
                                            <li>Interest earned</li>
                                            <li>Maturity amount and year</li>
                                        </ul>
                                    </li>
                                </ol>
                                <p>The output updates dynamically based on the inputs provided.</p>
                            </div>
                        
                        <h3 class="calculator-info-title">How the SSY Calculator Assists Investors</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Provides an estimate of long-term savings under the scheme</li>
                                    <li>Helps determine appropriate annual contribution levels</li>
                                    <li>Assists in aligning investments with future financial goals</li>
                                    <li>Eliminates the need for manual calculations</li>
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">Key Features of the SSY Scheme</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Government-backed savings instrument</li>
                                    <li>Interest rate notified periodically</li>
                                    <li>Contributions eligible for tax deduction under Section 80C (subject to prevailing tax laws)</li>
                                    <li>Interest earned and maturity amount are tax-exempt under applicable provisions</li>
                                    <li>Long-term investment horizon with disciplined savings structure</li>
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Interest rates are subject to periodic revision</li>
                                    <li>Minimum annual contribution is required to keep the account active</li>
                                    <li>Withdrawals are subject to scheme rules and eligibility conditions</li>
                                    <li>The calculator provides indicative values and does not account for regulatory changes</li>
                                    
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">FAQs</h3>
                            <div class="stepup-faq-accordion" aria-label="SSY calculator frequently asked questions">
                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ssy-faq="0">
                                    <span class="stepup-faq-question">What is the maturity period of SSY?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ssy-faq-panel-0" hidden>
                                    The scheme matures after 21 years from the date of account opening.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ssy-faq="1">
                                    <span class="stepup-faq-question">For how long can contributions be made?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ssy-faq-panel-1" hidden>
                                    Contributions can be made for up to 15 years.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ssy-faq="2">
                                    <span class="stepup-faq-question">Is the interest rate fixed?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ssy-faq-panel-2" hidden>
                                    No, it is notified periodically by the Government.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ssy-faq="3">
                                    <span class="stepup-faq-question">Does the calculator provide exact returns?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ssy-faq-panel-3" hidden>
                                    No, it provides estimates based on current assumptions.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-ssy-faq="4">
                                    <span class="stepup-faq-question">Are there tax benefits under SSY?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="ssy-faq-panel-4" hidden>
                                    Yes, contributions may qualify for deduction under Section 80C, subject to applicable laws.
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
(function () {
    if (typeof ApexCharts === 'undefined' && !document.getElementById('apexcharts-cdn-script')) {
        var s = document.createElement('script');
        s.id = 'apexcharts-cdn-script';
        s.src = 'https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js';
        s.defer = true;
        document.head.appendChild(s);
    }
})();

(function initSsyCalculatorUi() {
    var root = document.querySelector('.investment-modern-calc--ssy');
    if (!root) return;

    function startSsyCore() {
        if (root.dataset.ssyBound === '1') return;
        root.dataset.ssyBound = '1';

        var amountRange = document.getElementById('globalInvestmentAmountRange');
        var amountInput = document.getElementById('globalInvestmentAmountInput');
        var rateRange = document.getElementById('globalInvestmentRateRange');
        var rateInput = document.getElementById('globalInvestmentRateInput');
        var yearsRange = document.getElementById('globalInvestmentYearsRange');
        var yearsInput = document.getElementById('globalInvestmentYearsInput');
        var startYearRange = document.getElementById('globalSsyStartYearRange');
        var startYearInput = document.getElementById('globalSsyStartYearInput');
        var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
        var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;
        var yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;
        var startYearField = startYearRange ? startYearRange.closest('.investment-slider-field') : null;
        var donutCenterValue = document.getElementById('globalDonutCenterValue');

        var MIN_AMOUNT = <?php echo (int) $ssyAmtMin; ?>;
        var MAX_AMOUNT = <?php echo (int) $ssyAmtMax; ?>;
        var MIN_RATE = <?php echo json_encode((float) $ssyRateMin); ?>;
        var MAX_RATE = <?php echo json_encode((float) $ssyRateMax); ?>;
        var MIN_YEARS = <?php echo (int) $ssyAgeMin; ?>;
        var MAX_YEARS = <?php echo (int) $ssyAgeMax; ?>;
        var AMOUNT_STEP = <?php echo (int) $ssyAmtStep; ?>;
        var MIN_START_YEAR = <?php echo (int) $ssyStartYearMin; ?>;
        var MAX_START_YEAR = <?php echo (int) $ssyStartYearMaxUi; ?>;
        var DEFAULT_SS_Y_RATE = <?php echo json_encode((float) $ssyRateDefault); ?>;

        var donutChart = null;

        function clamp(n, min, max) {
            if (!isFinite(n)) return min;
            return Math.min(max, Math.max(min, n));
        }

        function formatINR0(num) {
            var n = Number(num);
            if (!isFinite(n)) return '₹0';
            return '₹' + Math.round(n).toLocaleString('en-IN');
        }

        function formatTotalValueDisplay(num) {
            var n = Number(num);
            if (!isFinite(n)) return '₹0';
            if (typeof formatCurrency === 'function') return formatCurrency(n);
            return formatINR0(n);
        }

        function formatINRDigits(n) {
            var x = Number(n);
            if (!isFinite(x)) return '0';
            return Math.round(x).toLocaleString('en-IN');
        }

        function setAmountError(hasError) {
            if (amountField) amountField.classList.toggle('is-error', !!hasError);
        }
        function setRateError(hasError) {
            if (rateField) rateField.classList.toggle('is-error', !!hasError);
        }
        function setYearsError(hasError) {
            if (yearsField) yearsField.classList.toggle('is-error', !!hasError);
        }
        function setStartYearError(hasError) {
            if (startYearField) startYearField.classList.toggle('is-error', !!hasError);
        }

        function setRangeFill(rangeEl, value) {
            var min = Number(rangeEl.min);
            var max = Number(rangeEl.max);
            var percent = ((value - min) / (max - min)) * 100;
            rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
        }

        function snapAmount(v) {
            var step = AMOUNT_STEP > 0 ? AMOUNT_STEP : 100;
            return Math.round(Number(v) / step) * step;
        }

        function readRatePercent() {
            if (rateRange) return clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
            if (rateInput) {
                var v = Number(rateInput.value);
                return clamp(isFinite(v) ? v : DEFAULT_SS_Y_RATE, MIN_RATE, MAX_RATE);
            }
            return clamp(DEFAULT_SS_Y_RATE, MIN_RATE, MAX_RATE);
        }

        function computeSsy() {
            if (typeof calcSSY !== 'function') {
                return { invested: 0, returns: 0, totalValue: 0 };
            }
            var amount = Number(amountRange.value);
            var rate = readRatePercent();
            var years = Number(yearsRange.value);
            var accountStartYear;
            if (startYearRange) {
                accountStartYear = clamp(Math.round(Number(startYearRange.value)), MIN_START_YEAR, MAX_START_YEAR);
            }
            var r = calcSSY(amount, years, rate, accountStartYear);
            return { invested: r.totalInvestment, returns: r.interestEarned, totalValue: r.maturityValue };
        }

        function syncSummaryRows() {
            if (typeof calcSSY !== 'function' || typeof formatCurrency !== 'function') return;
            var amount = Number(amountRange.value);
            var rate = readRatePercent();
            var years = clamp(Math.round(Number(yearsRange.value)), MIN_YEARS, MAX_YEARS);
            var sy = startYearRange ? clamp(Math.round(Number(startYearRange.value)), MIN_START_YEAR, MAX_START_YEAR) : MIN_START_YEAR;
            var out = calcSSY(amount, years, rate, sy);
            var inv = document.getElementById('ssySumInvestment');
            var intr = document.getElementById('ssySumInterest');
            var yr = document.getElementById('ssySumMaturityYear');
            var mv = document.getElementById('ssySumMaturityValue');
            if (inv) inv.textContent = formatCurrency(out.totalInvestment);
            if (intr) intr.textContent = formatCurrency(out.interestEarned);
            if (yr) yr.textContent = String(out.maturityYear);
            if (mv) mv.textContent = formatCurrency(out.maturityValue);
            var rateDisp = document.getElementById('ssyDisplayedRate');
            if (rateDisp) {
                var rp = readRatePercent();
                rateDisp.textContent = (Math.round(rp * 10) / 10).toLocaleString('en-IN', { minimumFractionDigits: 0, maximumFractionDigits: 1 }) + '%';
            }
        }

        window.pushSsyFormFromModern = function () {
            syncSummaryRows();
        };

        function ensureDonutChart() {
            if (donutChart || typeof ApexCharts === 'undefined') return;
            var donutEl = document.getElementById('globalInvestmentDonutChart');
            if (!donutEl) return;
            var data = computeSsy();
            donutChart = new ApexCharts(donutEl, {
                series: [Math.max(0, data.invested), Math.max(0, data.returns)],
                chart: { type: 'donut', height: 260 },
                labels: ['Your investment', 'Interest earned'],
                colors: ['#1e5a7d', '#2d9c8f'],
                dataLabels: { enabled: false },
                legend: { show: false },
                stroke: { show: false },
                plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
            });
            donutChart.render();
        }

        function updateSummary(animateChart) {
            var data = computeSsy();
            if (donutCenterValue) donutCenterValue.textContent = formatTotalValueDisplay(data.totalValue);
            if (!donutChart) ensureDonutChart();
            if (donutChart) donutChart.updateSeries([Math.max(0, data.invested), Math.max(0, data.returns)], animateChart !== false);
            if (!window.__ssySyncingFromCard && typeof window.pushSsyFormFromModern === 'function') {
                window.pushSsyFormFromModern();
            }
        }

        window.refreshModernSsyDonut = function () {
            updateSummary(true);
        };

        amountRange.addEventListener('input', function () {
            var v = snapAmount(amountRange.value);
            v = clamp(v, MIN_AMOUNT, MAX_AMOUNT);
            amountRange.value = v;
            amountInput.value = formatINRDigits(v);
            setAmountError(false);
            setRangeFill(amountRange, v);
            updateSummary(false);
        });
        amountRange.addEventListener('change', function () {
            setAmountError(false);
            updateSummary(true);
        });

        if (rateRange) {
            rateRange.addEventListener('input', function () {
                var v = clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
                var rounded = Math.round(v * 10) / 10;
                rateRange.value = rounded;
                if (rateInput) rateInput.value = rounded;
                setRateError(false);
                setRangeFill(rateRange, rounded);
                updateSummary(false);
            });
            rateRange.addEventListener('change', function () {
                setRateError(false);
                updateSummary(true);
            });
        }

        yearsRange.addEventListener('input', function () {
            var v = clamp(Math.round(Number(yearsRange.value)), MIN_YEARS, MAX_YEARS);
            yearsRange.value = v;
            yearsInput.value = v;
            setYearsError(false);
            setRangeFill(yearsRange, v);
            updateSummary(false);
        });
        yearsRange.addEventListener('change', function () {
            setYearsError(false);
            updateSummary(true);
        });

        if (startYearRange && startYearInput) {
            startYearRange.addEventListener('input', function () {
                var v = clamp(Math.round(Number(startYearRange.value)), MIN_START_YEAR, MAX_START_YEAR);
                startYearRange.value = v;
                startYearInput.value = v;
                setStartYearError(false);
                setRangeFill(startYearRange, v);
                updateSummary(false);
            });
            startYearRange.addEventListener('change', function () {
                setStartYearError(false);
                updateSummary(true);
            });
            startYearInput.addEventListener('input', function () {
                var raw = String(startYearInput.value || '');
                if (raw.trim() === '') {
                    setStartYearError(true);
                    return;
                }
                var v = Math.round(Number(startYearInput.value));
                if (!isFinite(v)) {
                    setStartYearError(true);
                    return;
                }
                var invalid = v < MIN_START_YEAR || v > MAX_START_YEAR;
                setStartYearError(invalid);
                var c = clamp(v, MIN_START_YEAR, MAX_START_YEAR);
                startYearRange.value = c;
                setRangeFill(startYearRange, c);
                if (!invalid) updateSummary(false);
            });
            startYearInput.addEventListener('change', function () {
                var raw = String(startYearInput.value || '');
                var v = raw.trim() === '' ? MIN_START_YEAR : Math.round(Number(raw));
                var safe = isFinite(v) ? v : MIN_START_YEAR;
                var c = clamp(safe, MIN_START_YEAR, MAX_START_YEAR);
                startYearRange.value = c;
                startYearInput.value = c;
                setStartYearError(false);
                setRangeFill(startYearRange, c);
                updateSummary(true);
            });
        }

        amountInput.addEventListener('input', function () {
            var raw = String(amountInput.value || '');
            var digits = raw.replace(/[^\d]/g, '');
            if (!digits) {
                if (raw.trim() === '') setAmountError(false);
                else {
                    amountInput.value = '';
                    setAmountError(true);
                }
                return;
            }
            var v = Number(digits);
            var invalid = v < MIN_AMOUNT || v > MAX_AMOUNT;
            setAmountError(invalid);
            var c = clamp(snapAmount(v), MIN_AMOUNT, MAX_AMOUNT);
            amountRange.value = c;
            setRangeFill(amountRange, c);
            amountInput.value = formatINRDigits(v);
            if (!invalid) updateSummary(false);
        });
        amountInput.addEventListener('change', function () {
            var raw = String(amountInput.value || '');
            var digits = raw.replace(/[^\d]/g, '');
            var v = digits ? Number(digits) : MIN_AMOUNT;
            var c = clamp(snapAmount(v), MIN_AMOUNT, MAX_AMOUNT);
            amountRange.value = c;
            amountInput.value = formatINRDigits(c);
            setAmountError(false);
            setRangeFill(amountRange, c);
            updateSummary(true);
        });

        if (rateInput) {
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
                var c = clamp(v, MIN_RATE, MAX_RATE);
                var rounded = Math.round(c * 10) / 10;
                if (rateRange) {
                    rateRange.value = rounded;
                    setRangeFill(rateRange, rounded);
                }
                if (!invalid) updateSummary(false);
            });
            rateInput.addEventListener('change', function () {
                var raw = String(rateInput.value || '');
                var v = raw.trim() === '' ? MIN_RATE : Number(raw);
                var safe = isFinite(v) ? v : MIN_RATE;
                var c = clamp(safe, MIN_RATE, MAX_RATE);
                var rounded = Math.round(c * 10) / 10;
                if (rateRange) {
                    rateRange.value = rounded;
                    setRangeFill(rateRange, rounded);
                }
                rateInput.value = rounded;
                setRateError(false);
                updateSummary(true);
            });
        }

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
            var c = clamp(v, MIN_YEARS, MAX_YEARS);
            yearsRange.value = c;
            setRangeFill(yearsRange, c);
            if (!invalid) updateSummary(false);
        });
        yearsInput.addEventListener('change', function () {
            var raw = String(yearsInput.value || '');
            var v = raw.trim() === '' ? MIN_YEARS : Math.round(Number(raw));
            var safe = isFinite(v) ? v : MIN_YEARS;
            var c = clamp(safe, MIN_YEARS, MAX_YEARS);
            yearsRange.value = c;
            yearsInput.value = c;
            setYearsError(false);
            setRangeFill(yearsRange, c);
            updateSummary(true);
        });

        setRangeFill(amountRange, Number(amountRange.value));
        amountInput.value = formatINRDigits(Number(amountRange.value));
        if (rateRange) {
            var r0 = readRatePercent();
            rateRange.value = Math.round(r0 * 10) / 10;
            if (rateInput) rateInput.value = rateRange.value;
            setRangeFill(rateRange, Number(rateRange.value));
        }
        setRangeFill(yearsRange, Number(yearsRange.value));
        if (startYearRange && startYearInput) {
            var sy = clamp(Math.round(Number(startYearRange.value)), MIN_START_YEAR, MAX_START_YEAR);
            startYearRange.value = sy;
            startYearInput.value = sy;
            setRangeFill(startYearRange, sy);
        }

        var ssyWait = 0;
        var apexWait = 0;
        (function waitDeps() {
            if (typeof calcSSY !== 'function') {
                ssyWait += 1;
                if (ssyWait <= 100) {
                    setTimeout(waitDeps, 40);
                    return;
                }
            }
            updateSummary();
            if (typeof ApexCharts === 'undefined') {
                apexWait += 1;
                if (apexWait > 60) return;
                setTimeout(waitDeps, 80);
                return;
            }
            ensureDonutChart();
        })();

        var investNowBtn = document.getElementById('globalInvestNowBtn');
        if (investNowBtn) {
            investNowBtn.addEventListener('click', function () {
                var form = document.getElementById('calculatorForm');
                if (form) {
                    if (typeof form.requestSubmit === 'function') form.requestSubmit();
                    else form.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
                } else if (typeof window.refreshModernSsyDonut === 'function') {
                    window.refreshModernSsyDonut();
                }
                var scrollTarget = document.querySelector('.calculator-form-section')
                    || document.querySelector('.calculator-info-section')
                    || document.querySelector('.calculator-card');
                if (scrollTarget) {
                    setTimeout(function () {
                        scrollTarget.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 80);
                }
            });
        }

    }

    window.addEventListener('load', startSsyCore);
})();
</script>

<?php require_once '../../includes/footer.php'; ?>
