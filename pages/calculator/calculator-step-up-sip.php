<?php
/**
 * Step Up SIP Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Step Up SIP Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Step Up SIP Calculator</h1>
                    <p class="calculator-page-description">SIP with annual increment - Match investments with salary growth</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc investment-modern-calc--stepup" data-modern-ui-mode="stepup" aria-label="Step Up SIP calculator">
                    <div class="investment-tabs" role="tablist" aria-label="Calculator type">
                        <button type="button" class="investment-tab is-active" aria-current="page" data-mode="stepup">Step Up SIP</button>
                        <button type="button" class="investment-tab" aria-current="false" data-mode="sip">SIP</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="Inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label stepup-label--monthly" for="stepup-sip-range">Monthly investment</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                                    <input type="text" class="pill-input" id="stepup-sip" value="25000" inputmode="numeric" aria-label="Starting Monthly SIP amount" />
                                        </div>
                                    </div>
                                </div>
                                        <input type="range" class="investment-range" id="stepup-sip-range" min="100" max="1000000" step="100" value="25000" aria-label="Starting SIP slider" />
                            </div>

                            <div class="investment-slider-field stepup-only-field" id="stepup-pct-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label stepup-label--stepup" for="stepup-pct-range">Annual step up</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="stepup-pct" min="0" max="50" step="1" value="10" inputmode="numeric" aria-label="Annual step-up percent" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                        <input type="range" class="investment-range" id="stepup-pct-range" min="0" max="50" step="1" value="10" aria-label="Annual step-up slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label stepup-label--rate" for="stepup-rate-range">Expected return rate (p.a)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                                    <input type="number" class="pill-input" id="stepup-rate" min="1" max="30" step="0.1" value="12" inputmode="decimal" aria-label="Expected return rate" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                        <input type="range" class="investment-range" id="stepup-rate-range" min="1" max="30" step="0.1" value="12" aria-label="Expected return slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label stepup-label--period" for="stepup-period-range">Time period</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                                    <input type="number" class="pill-input" id="stepup-period" min="1" max="30" step="1" value="10" inputmode="numeric" aria-label="Time period years" />
                                            <span class="pill-unit">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                        <input type="range" class="investment-range" id="stepup-period-range" min="1" max="30" step="1" value="10" aria-label="Period slider" />
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
                                        <span class="legend-dot legend-invested"></span>
                                        <span>Your investment</span>
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-dot legend-returns"></span>
                                        <span>Estimated returns</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="investment-summary-cta">
                        <button type="button" class="investment-cta" id="stepupInvestNowBtn"> INVEST NOW </button>                    
                    </div>
                </section>

                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                         <div class="calculator-info-card">
                        <h3 class="calculator-info-title">Step-Up SIP Calculator (Top-Up SIP)</h3>
                            <div class="calculator-info-content">
                                <p>A Step-Up SIP (Systematic Investment Plan) is a variation of a regular SIP where the investment amount is increased periodically, typically on an annual basis. This approach allows investors to align their investments with potential increases in income over time.</p>
                                <p>A Step-Up SIP Calculator is a financial tool used to estimate the future value of investments when periodic contributions are increased at a predefined rate.</p>
                            </div>

                        <h3 class="calculator-info-title">What is a Step-Up SIP Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>A Step-Up SIP Calculator is an online utility that helps estimate the growth of SIP investments when the contribution amount increases at regular intervals.</p>
                                <p>By entering:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Initial SIP amount</li>
                                    <li>Investment duration</li>
                                    <li>Expected rate of return</li>
                                    <li>Annual increment percentage</li>
                                </ul>
                                <p>the calculator computes:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Total investment made</li>
                                    <li>Estimated returns generated</li>
                                    <li>Projected maturity value</li>
                                </ul>
                                <p>The results are indicative and depend on market performance and input assumptions.</p>
                            </div>

                        <h3 class="calculator-info-title">Purpose and Use of a Step-Up SIP Calculator</h3>
                            <div class="calculator-info-content">
                                <p>The calculator is designed to assist investors in evaluating the impact of increasing contributions over time.</p>
                                <p>It can be used to:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Estimate long-term wealth accumulation with incremental investments</li>
                                    <li>Align investments with expected income growth</li>
                                    <li>Compare outcomes with a fixed SIP approach</li>
                                    <li>Support goal-based financial planning</li>
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">How Does a Step-Up SIP Work?</h3>
                            <div class="calculator-info-content">
                                <p>In a Step-Up SIP:</p>
                                <ul style="margin-left: 14px;">
                                    <li>The investor begins with a fixed SIP amount</li>
                                    <li>The contribution is increased periodically (usually annually) by a fixed percentage</li>
                                    <li>Each increased contribution continues to remain invested and earns returns</li>
                                    
                                </ul>
                                <p>This results in a higher total investment and potentially higher returns compared to a fixed SIP, particularly over longer durations.</p>
                            </div>

                        <h3 class="calculator-info-title">Working Principle of a Step-Up SIP Calculator</h3>
                            <div class="calculator-info-content">
                                <p>A Step-Up SIP calculator works by:</p>
                                
                                <ul style="margin-left: 14px;">
                                    <li>Increasing the SIP contribution at predefined intervals</li>
                                    <li>Applying compounding returns on each installment</li>
                                    <li>Aggregating the future value of all contributions</li>
                                </ul>
                                <p>Unlike a regular SIP, where contributions remain constant, Step-Up SIP calculations account for the progressive increase in investment amounts over time.</p>
                            </div>

                        <h3 class="calculator-info-title">Illustrative Example</h3>
                                <div class="calculator-info-content">
                                    <p>Assume:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Initial SIP: ₹10,000 per month</li>
                                        <li>Annual step-up: 10%</li>
                                        <li>Investment duration: 10 years</li>
                                        <li>Expected return: 8%</li>
                                    </ul>
                                    <p>Each year, the SIP amount increases by 10%, resulting in higher contributions over time.</p>
                                    <p>The calculator estimates:</p>
                                    <ul style="margin-left: 14px;">
                                        <li>Total amount invested</li>
                                        <li>Total returns generated</li>
                                        <li>Final maturity value</li>
                                    </ul>
                                    <p>This helps in understanding the impact of incremental investing on long-term wealth creation.</p>
                                </div>

                        <h3 class="calculator-info-title">How to Use the Step-Up SIP Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>To calculate returns:</p>
                                <ol>
                                    <li>Enter the initial SIP amount</li>
                                    <li>Specify the investment duration</li>
                                    <li>Input the expected rate of return</li>
                                    <li>Enter the annual step-up percentage</li>
                                    <li>The calculator will display:
                                        <ul>
                                            <li>Total investment</li>
                                            <li>Estimated returns</li>
                                            <li>Projected maturity value</li>
                                        </ul>
                                    </li>
                                </ol> 
                            </div>

                            <h3 class="calculator-info-title">How the Calculator Assists Investors?</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Provides a structured estimate of increasing investment scenarios</li>
                                    <li>Helps evaluate the impact of incremental contributions</li>
                                    <li>Enables comparison between fixed SIP and Step-Up SIP</li>
                                    <li>Assists in long-term financial planning</li>      
                                </ul>
                            </div>

                            <h3 class="calculator-info-title">Key Considerations</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Returns are market-linked and not guaranteed</li>
                                    <li>The effectiveness of a Step-Up SIP depends on consistency of contributions</li>
                                    <li>Higher step-up rates increase investment obligations over time</li>
                                    <li>The calculator does not account for:
                                        <ul>
                                            <li>Expense ratios</li>
                                            <li>Exit loads</li>
                                            <li>Taxes</li>
                                        </ul>
                                    </li>
                                    <li>Results are indicative and based on assumed inputs</li>
                                </ul>
                            </div>

                            <h3 class="calculator-info-title">Step-Up SIP vs Regular SIP</h3>
                            <div class="table-wrapper">
                                <table class="yearly-breakdown-table">
                                    <thead>
                                        <tr>
                                            <th>Parameter</th>
                                            <th>Regular SIP</th>
                                            <th>Step-Up SIP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Contribution</td>
                                            <td>Fixed</td>
                                            <td>Increases periodically</td>
                                        </tr>
                                        <tr>
                                            <td>Investment growth</td>
                                            <td>Linear contribution</td>
                                            <td>Increasing contribution</td>
                                        </tr>
                                        <tr>
                                            <td>Suitability</td>
                                            <td>Stable income</td>
                                            <td>Growing income</td>
                                        </tr>
                                        <tr>
                                            <td>Potential returns</td>
                                            <td>Lower (relative)</td>
                                            <td>Higher over long term</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3 class="calculator-info-title">FAQs</h3>
                            <div class="stepup-faq-accordion" aria-label="Step-Up SIP calculator frequently asked questions">
                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="0">
                                    <span class="stepup-faq-question">What is a Step-Up SIP?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="stepup-faq-panel-0" hidden>
                                    It is a SIP where the investment amount increases periodically, usually annually.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="1">
                                    <span class="stepup-faq-question">How is it different from a regular SIP?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="stepup-faq-panel-1" hidden>
                                    In a regular SIP, the contribution remains constant, whereas in a Step-Up SIP it increases over time.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="2">
                                    <span class="stepup-faq-question">Does Step-Up SIP guarantee higher returns?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="stepup-faq-panel-2" hidden>
                                    No, returns are market-linked. However, higher contributions may lead to higher accumulated value over time.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="3">
                                    <span class="stepup-faq-question">Can the step-up percentage be modified?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="stepup-faq-panel-3" hidden>
                                    Yes, it can be adjusted based on financial capacity and goals.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="4">
                                    <span class="stepup-faq-question">Is Step-Up SIP suitable for all investors?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="stepup-faq-panel-4" hidden>
                                    It is generally suitable for individuals expecting growth in income and aiming for long-term wealth accumulation.
                                </div>
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
        (function() {
            let activeMode = 'stepup'; // 'stepup' | 'sip'

            function clamp(n, min, max) {
                return Math.min(max, Math.max(min, n));
            }

            function toStepValue(v, min, step) {
                if (!isFinite(step) || step <= 0) return v;
                const decimals = (String(step).includes('.') ? String(step).split('.')[1].length : 0);
                const stepped = min + Math.round((v - min) / step) * step;
                return Number(stepped.toFixed(decimals));
            }

            function setRangeFill(rangeEl, min, max, v) {
                const denom = (max - min) || 1;
                const pct = ((v - min) / denom) * 100;
                rangeEl.style.setProperty('--fill', pct);
            }

            function setupRangeSync(rangeEl, inputEl, min, max, step, errorFieldEl, isTextInput) {
                if (!rangeEl || !inputEl) return;

                    function formatINR0(n) {
                        const x = Number(n);
                        if (!isFinite(x)) return '0';
                        return Math.round(x).toLocaleString('en-IN', { maximumFractionDigits: 0 });
                    }

                function parseValue() {
                    if (isTextInput) {
                        const digits = String(inputEl.value || '').replace(/[^\d]/g, '');
                        if (digits.trim() === '') return NaN;
                        return Number(digits);
                    }
                    const v = Number(inputEl.value);
                    return isFinite(v) ? v : NaN;
                }

                function setError(hasError) {
                    if (errorFieldEl) errorFieldEl.classList.toggle('is-error', !!hasError);
                }

                const syncFromRange = () => {
                    const v = Number(rangeEl.value);
                    const snapped = toStepValue(clamp(v, min, max), min, step);
                    setError(false);
                        inputEl.value = isTextInput ? formatINR0(snapped) : String(snapped);
                    rangeEl.value = String(snapped);
                    setRangeFill(rangeEl, min, max, snapped);

                    // Keep results in sync with slider changes (Groww-like behavior).
                    runCalculation();
                };

                rangeEl.addEventListener('input', function() {
                    syncFromRange();
                });

                inputEl.addEventListener('input', function() {
                    // Keep digits only for monthly amount (matches SIP calculator stability).
                    if (isTextInput) {
                        inputEl.value = String(inputEl.value || '').replace(/[^\d]/g, '');
                    }

                    const v = parseValue();
                    if (!isFinite(v)) {
                        setError(true);
                        return;
                    }

                    const invalid = v < min || v > max;
                    setError(invalid);

                    // For monthly text input, Groww behaves like "type any rupee value":
                    // clamp + round, don't snap to slider step while typing.
                    const clamped = isTextInput
                        ? clamp(Math.round(v), min, max)
                        : toStepValue(clamp(v, min, max), min, step);
                    rangeEl.value = String(clamped);
                    setRangeFill(rangeEl, min, max, clamped);

                    // While invalid, keep the user's entered value visible.
                    if (!invalid) {
                            inputEl.value = isTextInput ? formatINR0(clamped) : String(clamped);
                        runCalculation();
                    }
                });

                // Initial
                syncFromRange();
            }

            function ensureDonutChart(container) {
                if (!container) return null;
                if (window.__stepupDonutChart) return window.__stepupDonutChart;
                if (typeof ApexCharts === 'undefined') return null;

                const formatter = window.formatCurrency || function(num) {
                    const n = Number(num);
                    if (!isFinite(n)) return '₹0';
                    return '₹' + n.toLocaleString('en-IN', { maximumFractionDigits: 0 });
                };

                const chart = new ApexCharts(container, {
                    chart: { type: 'donut', height: 290 },
                    labels: ['Invested amount', 'Estimated returns'],
                    series: [0, 0],
                    colors: ['#F97316', '#3B6DFF'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return formatter(Number(val) || 0);
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

                chart.render();
                window.__stepupDonutChart = chart;
                return chart;
            }

            function runCalculation() {
                const sipRaw = document.getElementById('stepup-sip')?.value ?? '';
                const sipDigits = String(sipRaw).replace(/[^\d]/g, '');
                const sip = sipDigits.trim() === '' ? NaN : Number(sipDigits);

                const period = Number(document.getElementById('stepup-period')?.value);
                const rate = Number(document.getElementById('stepup-rate')?.value);
                const stepUp = Number(document.getElementById('stepup-pct')?.value);

                const MIN_SIP = 100, MAX_SIP = 1000000;
                const MIN_PERIOD = 1, MAX_PERIOD = 30;
                const MIN_RATE = 1, MAX_RATE = 30;
                const MIN_STEPUP = 0, MAX_STEPUP = 50;

                const sipInvalid = !isFinite(sip) || sip < MIN_SIP || sip > MAX_SIP;
                const periodInvalid = !isFinite(period) || period < MIN_PERIOD || period > MAX_PERIOD;
                const rateInvalid = !isFinite(rate) || rate < MIN_RATE || rate > MAX_RATE;
                const stepupInvalid = !isFinite(stepUp) || stepUp < MIN_STEPUP || stepUp > MAX_STEPUP;

                // Apply error styles like the SIP calculators.
                const sipField = document.getElementById('stepup-sip-range')?.closest('.investment-slider-field');
                const periodField = document.getElementById('stepup-period-range')?.closest('.investment-slider-field');
                const rateField = document.getElementById('stepup-rate-range')?.closest('.investment-slider-field');
                const stepupField = document.getElementById('stepup-pct-range')?.closest('.investment-slider-field');
                if (sipField) sipField.classList.toggle('is-error', !!sipInvalid);
                if (periodField) periodField.classList.toggle('is-error', !!periodInvalid);
                if (rateField) rateField.classList.toggle('is-error', !!rateInvalid);
                // Only show step-up errors in step-up mode.
                if (stepupField) stepupField.classList.toggle('is-error', activeMode === 'stepup' && !!stepupInvalid);

                if (sipInvalid || periodInvalid || rateInvalid) return;
                if (activeMode === 'stepup' && stepupInvalid) return;

                const safeSip = sip;
                const safePeriod = period;
                const safeRate = rate;
                const safeStepUp = stepUp;

                const stepupCalcFn = window.calcStepUpSIP || calcStepUpSIP;
                const formatter = window.formatCurrency || function(num) {
                    const n = Number(num);
                    if (!isFinite(n)) return '₹0';
                    return '₹' + n.toLocaleString('en-IN', { maximumFractionDigits: 0 });
                };

                let invested = 0;
                let returns = 0;
                let totalValue = 0;

                if (activeMode === 'stepup') {
                    const r = stepupCalcFn(safeSip, safePeriod, safeRate, safeStepUp);
                    invested = Number(r?.totalInvestment) || 0;
                    returns = Number(r?.expectedReturns) || 0;
                    totalValue = Number(r?.maturityValue) || 0;
                } else {
                    // Regular SIP:
                    // Use effective annual -> effective monthly rate and annuity-due assumption.
                    const annual = safeRate / 100;
                    const monthlyRate = Math.pow(1 + annual, 1 / 12) - 1; // effective monthly (decimal)
                    const months = safePeriod * 12;
                    invested = safeSip * months;

                    if (!isFinite(monthlyRate) || Math.abs(monthlyRate) < 1e-12) {
                        totalValue = invested;
                        returns = 0;
                    } else {
                        // FV (annuity due) = P * [((1+m)^n - 1)/m] * (1+m)
                        const fv = safeSip * ((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate);
                        totalValue = fv;
                        returns = fv - invested;
                    }

                    // Whole-rupee display like the Step-Up calculator.
                    invested = Math.round(invested);
                    totalValue = Math.round(totalValue);
                    returns = Math.round(returns);
                }

                const summaryInvested = document.getElementById('summaryInvested');
                const summaryReturns = document.getElementById('summaryReturns');
                const summaryTotal = document.getElementById('summaryTotal');
                const donutCenterValue = document.getElementById('donutCenterValue');

                if (summaryInvested) summaryInvested.textContent = formatter(invested);
                if (summaryReturns) summaryReturns.textContent = formatter(returns);
                if (summaryTotal) summaryTotal.textContent = formatter(totalValue);
                if (donutCenterValue) donutCenterValue.textContent = formatter(totalValue);

                const chartEl = document.getElementById('investmentDonutChart');
                const chart = ensureDonutChart(chartEl);
                if (chart && typeof chart.updateSeries === 'function') {
                    chart.updateSeries([Math.max(0, invested), Math.max(0, returns)]);
                }
            }

            window.addEventListener('DOMContentLoaded', function() {
                if (typeof lucide !== 'undefined') lucide.createIcons();

                const btn = document.getElementById('stepupInvestNowBtn');
                if (!btn) return;

                const sipRange = document.getElementById('stepup-sip-range');
                const sipInput = document.getElementById('stepup-sip');

                const periodRange = document.getElementById('stepup-period-range');
                const periodInput = document.getElementById('stepup-period');

                const rateRange = document.getElementById('stepup-rate-range');
                const rateInput = document.getElementById('stepup-rate');

                const pctRange = document.getElementById('stepup-pct-range');
                const pctInput = document.getElementById('stepup-pct');

                // Groww-like constraints + SIP-like error UI
                const sipField = sipRange?.closest('.investment-slider-field');
                const periodField = periodRange?.closest('.investment-slider-field');
                const rateField = rateRange?.closest('.investment-slider-field');
                const stepupField = pctRange?.closest('.investment-slider-field');

                setupRangeSync(sipRange, sipInput, 100, 1000000, 100, sipField, true);
                setupRangeSync(periodRange, periodInput, 1, 30, 1, periodField, false);
                setupRangeSync(rateRange, rateInput, 1, 30, 0.1, rateField, false);
                setupRangeSync(pctRange, pctInput, 0, 50, 1, stepupField, false);

                const root = document.querySelector('.investment-modern-calc--stepup');
                const tabs = root ? root.querySelectorAll('.investment-tab[data-mode]') : [];
                const stepupOnly = document.getElementById('stepup-pct-field');

                const setModeUI = (mode) => {
                    activeMode = mode === 'sip' ? 'sip' : 'stepup';

                    tabs.forEach(t => {
                        const isActive = t.dataset.mode === activeMode;
                        t.classList.toggle('is-active', isActive);
                        t.setAttribute('aria-current', isActive ? 'page' : 'false');
                    });

                    if (stepupOnly) stepupOnly.hidden = activeMode !== 'stepup';
                    runCalculation();
                };

                tabs.forEach(t => {
                    t.addEventListener('click', function() {
                        const mode = this.dataset.mode || 'stepup';
                        setModeUI(mode);
                    });
                });

                // Initial mode UI
                if (stepupOnly) stepupOnly.hidden = activeMode !== 'stepup';

                btn.addEventListener('click', runCalculation);

                // Initial render
                runCalculation();
            });

            // Step Up FAQ accordion (close/open) UI.
            // Keeps markup simple and doesn't require any external JS.
            window.addEventListener('DOMContentLoaded', function() {
                const accordion = document.querySelector('.stepup-faq-accordion');
                if (!accordion) return;

                const rows = accordion.querySelectorAll('.stepup-faq-row');
                rows.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const idx = btn.getAttribute('data-stepup-faq');
                        const panelId = `stepup-faq-panel-${idx}`;
                        const panel = document.getElementById(panelId);
                        if (!panel) return;

                        const expanded = btn.getAttribute('aria-expanded') === 'true';

                        rows.forEach(otherBtn => {
                            const otherIdx = otherBtn.getAttribute('data-stepup-faq');
                            const otherPanel = document.getElementById(`stepup-faq-panel-${otherIdx}`);
                            otherBtn.setAttribute('aria-expanded', 'false');
                            if (otherPanel) otherPanel.hidden = true;
                        });

                        if (!expanded) {
                            btn.setAttribute('aria-expanded', 'true');
                            panel.hidden = false;
                        }
                    });
                });
            });
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
