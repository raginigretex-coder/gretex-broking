<?php
/**
 * Lumpsum Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Lumpsum Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Lumpsum Calculator</h1>
                    <p class="calculator-page-description">Calculate returns for lumpsum investments to achieve your financial goals</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc" aria-label="Investment calculator">
                    <div class="investment-tabs" role="tablist" aria-label="Investment type">
                        <button type="button" class="investment-tab" data-mode="sip" aria-selected="false">SIP</button>
                        <button type="button" class="investment-tab is-active" data-mode="lumpsum" aria-selected="true">Lumpsum</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="Inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" id="amountLabel" for="investmentAmountRange">Total investment</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="amountErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">â‚¹</span>
                                            <input type="text" class="pill-input" id="investmentAmountInput" value="25000" inputmode="numeric" aria-label="Total investment amount" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="investmentAmountRange" min="100" max="10000000" step="100" value="25000" aria-labelledby="amountLabel" />
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
                                        <div class="quickbar-value" id="summaryInvested">â‚¹0</div>
                                    </div>

                                    <div class="quickbar-item">
                                        <div class="quickbar-line">
                                            <span class="legend-dot legend-returns"></span>
                                            <span class="quickbar-label">Estimated returns</span>
                                        </div>
                                        <div class="quickbar-value quickbar-returns-value" id="summaryReturns">â‚¹0</div>
                                    </div>

                                    <div class="quickbar-total">
                                        <div class="quickbar-total-label">Total value</div>
                                        <div class="quickbar-total-value" id="summaryTotal">â‚¹0</div>
                                    </div>
                                </div>

                                <div class="investment-donut-wrap">
                                    <div id="investmentDonutChart"></div>
                                    <div class="investment-donut-center">
                                        <div class="investment-donut-center-label">Maturity Value</div>
                                        <div class="investment-donut-center-value" id="donutCenterValue">â‚¹0</div>
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
                             <h3 class="calculator-info-title">Lumpsum Calculator</h3>
                            <div class="calculator-info-content">
                                <p>Investments in mutual funds are generally classified into two approaches:<strong> lumpsum investment</strong> and <strong>Systematic Investment Plan (SIP)</strong>.</p>
                                <p>A lumpsum investment involves deploying a single, substantial amount into a mutual fund scheme at one point in time, whereas SIP involves periodic investments over a defined interval.</p>
                                <p>A Lumpsum Calculator is a financial tool used to estimate the future value of such a one-time investment based on assumed return rates and investment duration.</p>
                            </div>

                            <h3 class="calculator-info-title">What is a Lumpsum Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>A Lumpsum Calculator is an online utility that provides an indicative estimate of the maturity value of a single investment made today.</p>
                                <p>By entering:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Investment amount</li>
                                    <li>Investment duration</li>
                                    <li>Expected annual return</li>
                                </ul>
                                <p>the calculator computes:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Projected future value of the investment</li>
                                    <li>Estimated returns generated over the investment period</li>
                                </ul>
                                <p>The output is indicative in nature and actual returns may vary depending on market conditions and fund performance.</p>
                            </div>

                            <h3 class="calculator-info-title">Types of Returns in Lumpsum Investments</h3>
                            <div class="calculator-info-content">
                                <p>When evaluating lumpsum investments, different return measures may be considered:</p>
                                <ul style="margin-left: 14px;">
                                    <li><strong>Absolute Return</strong> - Total return over the investment period</li>
                                    <li><strong>Total Return</strong> - Includes income and capital appreciation</li>
                                    <li><strong>Annualised Return</strong> - Average yearly return over the holding period</li>
                                    <li><strong>Point-to-Point Return</strong> - Return between two specific time points</li>
                                    <li><strong>Trailing Return</strong> - Historical return over a defined period</li>
                                    <li><strong>Rolling Return</strong> - Returns calculated over overlapping time periods</li>
                                </ul>
                                <p>Understanding these return measures can assist in evaluating investment performance more effectively.</p>
                            </div>

                            <h3 class="calculator-info-title">Purpose and Use of a Lumpsum Calculator</h3>
                            <div class="calculator-info-content">
                                <p>A lumpsum calculator assists investors in assessing the potential outcome of a one-time investment.</p>
                                <p>It can be used to:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Estimate the future value of an investment over different time horizons</li>
                                    <li>Compare outcomes under varying return assumptions</li>
                                    <li>Support financial planning and goal assessment</li>
                                    <li>Evaluate whether a specific investment amount aligns with future requirements</li>
                                </ul>
                            </div>

                            <h3 class="calculator-info-title">How Does a Lumpsum Calculator Work?</h3>
                            <div class="calculator-info-content">
                                <p>A lumpsum calculator is based on the principle of compound interest, where returns generated are reinvested over time.</p>
                                <p>The future value is calculated using the following formula:</p>

                                  <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                        A = P (1 + 
                                        <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                            <span style="display:block; border-bottom:2px solid #000; padding:0 4px;">
                                            r
                                            </span>
                                            <span style="display:block; font-size:14px;">n</span>
                                        </span>
                                        )<sup>nt</sup>
                                        </p>

                                <p style="margin-top: 20px;"><strong>Where:</strong></p>

                                <ul>
                                    <li><strong>A</strong> = Future value of the investment</li>
                                    <li><strong>P</strong> = Initial investment amount</li>
                                    <li><strong>r</strong> = Expected annual rate of return</li>
                                    <li><strong>t</strong> = Investment duration (in years)</li>
                                    <li><strong>n</strong> = Number of compounding periods in a year</li>
                                </ul>
                            </div>

                           

                            <h3 class="calculator-info-title">Example</h3>
                            <div class="calculator-info-content">
                                <p>Assume:</p>
                                <ul style="margin-left:14px">
                                    <li>Investment amount: Rs. 15,00,000</li>
                                    <li>Investment duration: 5 years</li>
                                    <li>Expected annual return = 12%</li>
                                    <li>Compounding frequency: Annually</li>
                                </ul>
                                <p>The estimated future value of the investment is:</p>
                                <p><strong>Rs. 26,43,513 (approx.)</strong></p>
                                <p>This value reflects compounded growth over the investment period. Actual returns may differ based on market performance.</p>
                            </div>

                            <h3 class="calculator-info-title">How to Use the Lumpsum Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>To calculate the estimated returns:</p>
                                <ol>
                                    <li>Enter the investment amount</li>
                                    <li>Select the investment duration</li>
                                    <li>Input the expected annual rate of return</li>
                                    <li>The calculator will display:
                                        <ul>
                                            <li>Estimated future value</li>
                                            <li>Total returns generated</li>
                                        </ul>
                                    </li>
                                </ol>
                                <p>The results update dynamically when inputs are modified.</p>
                            </div>

                            <h3 class="calculator-info-title">How a Lumpsum Calculator Assists Investors</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Provides a quick estimate without manual calculations</li>
                                    <li>Helps in evaluating multiple investment scenarios</li>
                                    <li>Supports goal-based financial planning</li>
                                    <li>Assists in understanding the effect of compounding</li>
                                </ul>
                            </div>

                            <h3 class="calculator-info-title">Key Considerations</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Returns are market-linked and not guaranteed</li>
                                    <li>The calculator provides indicative values only</li>
                                    <li>It does not factor in:</li>
                                </ul>
                                <ul style="margin-left: 28px;">
                                    <li>Expense ratios</li>
                                    <li>Exit loads</li>
                                    <li>Taxes</li>
                                </ul>
                                <ul style="margin-left: 14px;">
                                    <li>Assumed return rate has a significant impact on output</li>
                                    <li>Longer investment horizons generally enhance compounding</li>
                                </ul>
                            </div>

                            <h3 class="calculator-info-title">FAQs</h3>
                            <div class="stepup-faq-accordion" aria-label="Lumpsum calculator frequently asked questions">
                                <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="lumpsum-faq-panel-0">
                                    <span class="stepup-faq-question">Are lumpsum calculator results accurate?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="lumpsum-faq-panel-0" hidden>
                                    They provide estimates based on assumed inputs. Actual returns may vary.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="lumpsum-faq-panel-1">
                                    <span class="stepup-faq-question">What return rate should be considered?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="lumpsum-faq-panel-1" hidden>
                                    The expected return depends on the asset class and market conditions.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="lumpsum-faq-panel-2">
                                    <span class="stepup-faq-question">Does the calculator include charges and taxes?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="lumpsum-faq-panel-2" hidden>
                                    No, it excludes taxes, expense ratios, and other applicable charges.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="lumpsum-faq-panel-3">
                                    <span class="stepup-faq-question">Is lumpsum investing suitable for all investors?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="lumpsum-faq-panel-3" hidden>
                                    It is generally suitable when a significant amount is available for investment, subject to individual risk tolerance and financial goals.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="lumpsum-faq-panel-4">
                                    <span class="stepup-faq-question">How is lumpsum different from SIP?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="lumpsum-faq-panel-4" hidden>
                                    Lumpsum involves a one-time investment, whereas SIP involves periodic contributions over time.
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Right Section: Calculator Form -->
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Your Lumpsum</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calculateLumpsumResult(event)">
                                <div class="calculator-field">
                                    <label for="lumpsum-amount">Total investment (&#8377;)</label>
                                    <input type="number" id="lumpsum-amount" placeholder="25000" required min="100" max="10000000" step="100" value="25000">
                                    <small class="field-hint">Min: &#8377;100 | Max: &#8377;10,00,00,000</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="lumpsum-rate">Expected Annual Return Rate (%)</label>
                                    <input type="number" id="lumpsum-rate" placeholder="12" required min="1" max="30" step="0.1" value="12">
                                    <small class="field-hint">Range: 1% to 30%</small>
                                </div>
                                
                                <div class="calculator-field">
                                    <label for="lumpsum-years">Investment Period (Years)</label>
                                    <input type="number" id="lumpsum-years" placeholder="10" required min="1" max="40" step="1" value="10">
                                    <small class="field-hint">Range: 1 to 40 years</small>
                                </div>
                                
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate">
                                        <i data-lucide="calculator"></i>
                                        Calculate
                                    </button>
                                    <button type="button" class="calculator-btn-reset" onclick="resetCalculator()">
                                        <i data-lucide="refresh-cw"></i>
                                        Reset
                                    </button>
                                </div>
                            </form>
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

        const LUMPSUM_LIMITS = {
            amount: { min: 100, max: 10000000 },
            rate: { min: 1, max: 30 },
            years: { min: 1, max: 40 }
        };

        function validateLumpsumInputs(amount, rate, years) {
            if (![amount, rate, years].every(Number.isFinite)) {
                alert('Please enter valid numeric values.');
                return false;
            }

            if (amount < LUMPSUM_LIMITS.amount.min || amount > LUMPSUM_LIMITS.amount.max) {
                alert(`Investment amount should be between â‚¹${LUMPSUM_LIMITS.amount.min.toLocaleString('en-IN')} and â‚¹${LUMPSUM_LIMITS.amount.max.toLocaleString('en-IN')}.`);
                return false;
            }

            if (rate < LUMPSUM_LIMITS.rate.min || rate > LUMPSUM_LIMITS.rate.max) {
                alert(`Expected return rate should be between ${LUMPSUM_LIMITS.rate.min}% and ${LUMPSUM_LIMITS.rate.max}%.`);
                return false;
            }

            if (years < LUMPSUM_LIMITS.years.min || years > LUMPSUM_LIMITS.years.max) {
                alert(`Time period should be between ${LUMPSUM_LIMITS.years.min} and ${LUMPSUM_LIMITS.years.max} years.`);
                return false;
            }

            return true;
        }

        function calculateLumpsumResult(event) {
            event.preventDefault();
            const amount = parseFloat(document.getElementById('lumpsum-amount').value);
            const rate = parseFloat(document.getElementById('lumpsum-rate').value);
            const years = parseFloat(document.getElementById('lumpsum-years').value);
            if (!validateLumpsumInputs(amount, rate, years)) {
                return;
            }
            document.dispatchEvent(new CustomEvent('gretex-lumpsum-sync-from-form'));
        }

        function resetCalculator() {
            document.getElementById('calculatorForm').reset();
            document.dispatchEvent(new CustomEvent('gretex-lumpsum-sync-from-form'));
        }

        (function initModernInvestmentUI() {
            const root = document.querySelector('.investment-modern-calc');
            if (!root) return;

            const tabs = root.querySelectorAll('.investment-tab[data-mode]');

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
            const RED_WARNING_AMOUNT = 500;
            const MIN_RATE = 1;
            const MAX_RATE = 30;
            const MIN_YEARS = 1;
            const MAX_YEARS = 40;

            let activeMode = 'lumpsum';
            let donutChart = null;

            function clamp(n, min, max) {
                if (!isFinite(n)) return min;
                return Math.min(max, Math.max(min, n));
            }

            function formatINR0(num) {
                const n = Number(num);
                if (!isFinite(n)) return 'â‚¹0';
                return 'â‚¹' + Math.round(n).toLocaleString('en-IN');
            }

            function formatINRDigits(n) {
                const x = Number(n);
                if (!isFinite(x)) return '0';
                return Math.round(x).toLocaleString('en-IN');
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
                // Keep SIP-tab math aligned with Groww-style SIP conversion
                const monthlyRate = Math.pow(1 + (rate / 100), 1 / 12) - 1;
                const totalMonths = years * 12;
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
                return activeMode === 'sip' ? computeSIP(amount, rate, years) : computeLumpsum(amount, rate, years);
            }

            function ensureDonutChart() {
                if (donutChart || typeof ApexCharts === 'undefined') return;
                const donutEl = document.getElementById('investmentDonutChart');
                if (!donutEl) return;

                const data = computeActive();
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

            function updateSummaryUI(animate = true) {
                const data = computeActive();
                if (summaryInvested) summaryInvested.textContent = formatINR0(data.invested);
                if (summaryReturns) summaryReturns.textContent = formatINR0(data.returns);
                if (summaryTotal) summaryTotal.textContent = formatINR0(data.totalValue);
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(data.totalValue);
                updateDonutChart(data.invested, data.returns, animate);
            }

            function syncToLumpsumForm() {
                const amountEl = document.getElementById('lumpsum-amount');
                const rateEl = document.getElementById('lumpsum-rate');
                const yearsEl = document.getElementById('lumpsum-years');
                if (amountEl) amountEl.value = Math.round(Number(amountRange.value));
                if (rateEl) rateEl.value = Number(rateRange.value);
                if (yearsEl) yearsEl.value = Math.round(Number(yearsRange.value));
            }

            function applyLumpsumFormToModernUI() {
                const amountEl = document.getElementById('lumpsum-amount');
                const rateEl = document.getElementById('lumpsum-rate');
                const yearsEl = document.getElementById('lumpsum-years');
                if (!amountRange || !amountInput || !rateRange || !rateInput || !yearsRange || !yearsInput) return;
                if (!amountEl || !rateEl || !yearsEl) return;

                let amount = parseFloat(amountEl.value);
                if (!isFinite(amount)) amount = MIN_AMOUNT;
                const amountClamped = clamp(Math.round(amount), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = amountClamped;
                amountInput.value = formatINRDigits(amountClamped);
                setAmountError(amountClamped < RED_WARNING_AMOUNT);
                setRangeFill(amountRange, amountClamped);

                let rate = parseFloat(rateEl.value);
                if (!isFinite(rate)) rate = MIN_RATE;
                const rateClamped = clamp(rate, MIN_RATE, MAX_RATE);
                const rateRounded = Math.round(rateClamped * 10) / 10;
                rateRange.value = rateRounded;
                rateInput.value = rateRounded;
                setRateError(false);
                setRangeFill(rateRange, rateRounded);

                let years = parseFloat(yearsEl.value);
                if (!isFinite(years)) years = MIN_YEARS;
                const yearsClamped = clamp(Math.round(years), MIN_YEARS, MAX_YEARS);
                yearsRange.value = yearsClamped;
                yearsInput.value = yearsClamped;
                setYearsError(false);
                setRangeFill(yearsRange, yearsClamped);

                updateSummaryUI(true);
                syncToLumpsumForm();
            }

            document.addEventListener('gretex-lumpsum-sync-from-form', applyLumpsumFormToModernUI);

            function setMode(mode) {
                activeMode = mode === 'sip' ? 'sip' : 'lumpsum';
                tabs.forEach(btn => {
                    const isActive = btn.dataset.mode === activeMode;
                    btn.classList.toggle('is-active', isActive);
                    btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
                });
                updateSummaryUI(true);
                syncToLumpsumForm();
            }

            amountRange.addEventListener('input', function() {
                const clamped = clamp(Math.round(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                amountInput.value = formatINRDigits(clamped);
                setAmountError(clamped < RED_WARNING_AMOUNT);
                setRangeFill(amountRange, clamped);
                updateSummaryUI(false);
                syncToLumpsumForm();
            });

            rateRange.addEventListener('input', function() {
                const clamped = clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
                const rounded = Math.round(clamped * 10) / 10;
                rateRange.value = rounded;
                rateInput.value = rounded;
                setRateError(false);
                setRangeFill(rateRange, rounded);
                updateSummaryUI(false);
                syncToLumpsumForm();
            });

            yearsRange.addEventListener('input', function() {
                const clamped = clamp(Math.round(Number(yearsRange.value)), MIN_YEARS, MAX_YEARS);
                yearsRange.value = clamped;
                yearsInput.value = clamped;
                setYearsError(false);
                setRangeFill(yearsRange, clamped);
                updateSummaryUI(false);
                syncToLumpsumForm();
            });

            amountInput.addEventListener('input', function() {
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                if (!digits) {
                    setAmountError(raw.trim() !== '');
                    return;
                }
                const v = Number(digits);
                const invalid = v < MIN_AMOUNT || v > MAX_AMOUNT;
                const showRed = invalid || v < RED_WARNING_AMOUNT;
                setAmountError(showRed);
                const clamped = clamp(Math.round(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                setRangeFill(amountRange, clamped);
                amountInput.value = formatINRDigits(v);
                if (!invalid) {
                    updateSummaryUI(false);
                    syncToLumpsumForm();
                }
            });

            rateInput.addEventListener('input', function() {
                const raw = String(rateInput.value || '');
                if (raw.trim() === '') {
                    setRateError(true);
                    return;
                }
                const v = Number(raw);
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
                    syncToLumpsumForm();
                }
            });

            yearsInput.addEventListener('input', function() {
                const raw = String(yearsInput.value || '');
                if (raw.trim() === '') {
                    setYearsError(true);
                    return;
                }
                const v = Math.round(Number(raw));
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
                    syncToLumpsumForm();
                }
            });

            tabs.forEach(btn => {
                btn.addEventListener('click', function() {
                    setMode(btn.dataset.mode);
                });
            });

            if (investNowBtn) {
                investNowBtn.addEventListener('click', function() {
                    syncToLumpsumForm();
                    const form = document.getElementById('calculatorForm');
                    if (form) {
                        form.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
                    }
                });
            }

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
