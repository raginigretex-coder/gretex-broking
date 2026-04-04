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
                            <h2 class="calculator-info-title">About Step Up SIP Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Step-Up SIP Calculator</strong> helps you understand the impact of increasing your SIP investment by a fixed percentage every year—typically aligned with your salary growth. By gradually increasing your contributions, you can build significantly higher wealth over time compared to a regular SIP with a fixed monthly amount.</p>
                                <h3>How Step Up SIP Works</h3>
                                <p>In a <strong>Step-Up SIP</strong>, your monthly investment amount increases every year by a fixed percentage (<strong>Step-Up Rate</strong>). This helps align your investments with income growth over time.</p>
                                <p>If your starting SIP is <strong>&#8377;P</strong> per month, then your investment increases as:</p>
                                <ul>
                                    <li><strong>Year 1:</strong> &#8377;P</li>
                                    <li><strong>Year 2:</strong> &#8377;P &times; (1 + step-up%)</li>
                                    <li><strong>Year 3:</strong> &#8377;P &times; (1 + step-up%)<sup>2</sup></li>
                                    <li>and so on...</li>
                                </ul>
                                <div class="formula-box" role="region" aria-label="Step-up SIP formula">
                                    <p><strong>Monthly SIP in Year n</strong> = &#8377;P × (1 + r)<sup>(n-1)</sup></p>
                                </div>
                                <p><strong>Where</strong>:</p>
                                <ul>
                                    <li><strong>P</strong> = Initial monthly investment</li>
                                    <li><strong>r</strong> = Annual step-up rate (in decimal)</li>
                                    <li><strong>n</strong> = Year number</li>
                                </ul>
                                <p><strong>Returns Calculation:</strong> The calculator applies your <strong>Expected annual return rate (p.a.)</strong> with <strong>monthly compounding</strong>. Each SIP installment earns returns based on how long it remains invested. Since the investment amount increases every year, a Step-Up SIP generally results in a higher maturity value compared to a regular SIP with a fixed monthly contribution.</p>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>Matches your growing income by increasing investments every year</li>
                                    <li>Helps generate significantly higher wealth compared to a regular SIP</li>
                                    <li>Small yearly increases make investing more practical and manageable</li>
                                    <li>Enhances the power of long-term compounding</li>
                                    <li>Helps you achieve financial goals faster</li>
                                    <li>Reduces the need to start with a high investment amount</li>
                                    <li>Encourages disciplined and consistent investing</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <ul>
                                    <li><strong>Early-career professionals</strong> seeking to build wealth over time through disciplined investing</li>
                                    <li><strong>Salaried individuals</strong> with predictable annual income increments</li>
                                    <li><strong>Long-term investors</strong> with an investment horizon of 10–15 years or more</li>
                                    <li><strong>Goal-oriented investors</strong> planning for major financial milestones such as retirement, home ownership, or education</li>
                                    <li><strong>Disciplined investors</strong> willing to increase their contributions annually</li>
                                </ul>
                                <h3>Important Considerations</h3>
                                <p>Requires disciplineï¿½must increase annually. Step-up: Conservative 5ï¿½7%; Moderate 8ï¿½12%; Aggressive 15ï¿½20%. Can skip a year if needed; most AMCs allow. Common pitfall: too aggressive % becomes unaffordable.</p>
                                <h3>Example</h3>
                                <p>Suppose you start with a Step-Up SIP of <strong>&#8377;25,000/month</strong> and choose <strong>10% annual step-up</strong> for <strong>10 years</strong> at an <strong>expected return of 12% (p.a.)</strong>.</p>
                                <p>Your monthly SIP becomes: <strong>Year 1: &#8377;25,000</strong>, <strong>Year 2: &#8377;27,500</strong>, <strong>Year 3: &#8377;30,250</strong>, and continues with the same pattern until maturity.</p>
                                <p>Based on this calculator’s assumptions, you will invest <strong>&#8377;47,81,227</strong> in total and reach a maturity value of <strong>&#8377;81,72,246</strong> (expected returns: <strong>&#8377;33,91,019</strong>). For comparison, a regular SIP (no step-up) with the starting monthly amount would be about <strong>&#8377;56,00,897</strong>. So the Step-Up advantage is approximately <strong>&#8377;25,71,349</strong>.</p>
                                <h3>FAQs</h3>
                                <div class="stepup-faq-accordion" aria-label="Step Up SIP Frequently Asked Questions">
                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="0">
                                        <span class="stepup-faq-question">Can't increase SIP in a year?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="stepup-faq-panel-0" hidden>
                                        Most AMCs allow skip and continue with previous amount. Resume next year. One year doesn't derail plan.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="1">
                                        <span class="stepup-faq-question">Is 10% increase realistic?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="stepup-faq-panel-1" hidden>
                                        Yes for salaried. Avg increments 8ï¿½12%. Half for step-up (5ï¿½6%) is manageable. 10% needs ~20% salary growth.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="2">
                                        <span class="stepup-faq-question">Decrease SIP if needed?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="stepup-faq-panel-2" hidden>
                                        Yes but defeats purpose. In hardship (job loss, emergency) can reduce/pause. Better to have emergency fund.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="3">
                                        <span class="stepup-faq-question">Higher amount or higher step-up %?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="stepup-faq-panel-3" hidden>
                                        Start affordable with moderate step-up (10%). &#8377;3K +15% step-up &gt; &#8377;8K +5% over 20+ years.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="4">
                                        <span class="stepup-faq-question">Step Up vs Regular SIP?</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="stepup-faq-panel-4" hidden>
                                        Step Up: long horizon 15+yr, rising income, young. Regular: short horizon, stable income, can start higher.
                                    </div>

                                    <button type="button" class="stepup-faq-row" aria-expanded="false" data-stepup-faq="5">
                                        <span class="stepup-faq-question">Advantages of Using Step Up SIP Calculator</span>
                                        <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                    </button>
                                    <div class="stepup-faq-panel" id="stepup-faq-panel-5" hidden>
                                        <p>Here are some of the basic advantages of using the Step Up SIP Calculator:</p>
                                        <ul>
                                            <li>You cannot modify your Step SIP that is already availed, that is why the calculator allows you a pre-estimation before you can start your investment.</li>
                                            <li>It is easy and simple to use.</li>
                                            <li>It is free of cost, and you can access it from anywhere at any time.</li>
                                            <li>You do not need to seek assistance with the digital tool.</li>
                                        </ul>
                                    </div>
                                </div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - compare with regular SIP returns</li>
                                    <li><a href="calculator-lumpsum.php">Lumpsum Calculator</a> - lump sum vs systematic approach</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - track actual returns achieved</li>
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
                        btn.setAttribute('aria-expanded', String(!expanded));
                        panel.hidden = expanded;
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



