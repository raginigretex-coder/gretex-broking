<?php

/**
 * SWP Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'SWP Calculator - Gretex Financial';
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
                <h1 class="calculator-page-title">SWP Calculator</h1>
                <p class="calculator-page-description">Calculate your final amount with Systematic Withdrawal Plans (SWP)</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc" aria-label="SWP calculator">
                <div class="investment-tabs" aria-label="Current calculator">
                    <button type="button" class="investment-tab is-active" aria-current="page">SWP (Systematic Withdrawal Plan)</button>
                </div>

                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="swpInvestmentRange">Total investment</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="swpInvestmentErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">₹</span>
                                        <input type="text" class="pill-input" id="swpInvestmentInput" value="500000" inputmode="numeric" aria-label="Total investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="swpInvestmentRange" min="10000" max="10000000" step="1000" value="500000" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="swpWithdrawalRange">Withdrawal per month</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="swpWithdrawalErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">₹</span>
                                        <input type="text" class="pill-input" id="swpWithdrawalInput" value="10000" inputmode="numeric" aria-label="Monthly withdrawal amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="swpWithdrawalRange" min="500" max="1000000" step="100" value="10000" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="swpRateRange">Expected return rate (p.a)</label>
                                <div class="investment-input-wrap">
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="swpRateInput" min="1" max="30" step="0.1" value="8" inputmode="decimal" aria-label="Expected return rate" />
                                        <span class="pill-unit">%</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="swpRateRange" min="1" max="30" step="0.1" value="8" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="swpYearsRange">Time period</label>
                                <div class="investment-input-wrap">
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="swpYearsInput" min="1" max="30" step="1" value="5" inputmode="numeric" aria-label="Time period in years" />
                                        <span class="pill-unit">Yr</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="swpYearsRange" min="1" max="30" step="1" value="5" />
                        </div>
                    </div>

                    <div class="investment-visual" aria-label="Visualization">
                        <div class="investment-donut-card">
                            <div class="investment-graph-quickbar">
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-invested"></span>
                                        <span class="quickbar-label">Total investment</span>
                                    </div>
                                    <div class="quickbar-value" id="swpSummaryInvestment">₹0</div>
                                </div>
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-returns"></span>
                                        <span class="quickbar-label">Total withdrawal</span>
                                    </div>
                                    <div class="quickbar-value quickbar-returns-value" id="swpSummaryWithdrawal">₹0</div>
                                </div>
                                <div class="quickbar-total">
                                    <div class="quickbar-total-label">Final value</div>
                                    <div class="quickbar-total-value" id="swpSummaryFinal">₹0</div>
                                </div>
                            </div>
                            <div class="investment-donut-wrap">
                                <div id="swpPreviewDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Maturity Value</div>
                                    <div class="investment-donut-center-value" id="swpDonutCenterValue">₹0</div>
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
                        <h3 class="calculator-info-title">SWP Calculator (Systematic Withdrawal Plan)</h3>
                        <div class="calculator-info-content">
                            <p>A Systematic Withdrawal Plan (SWP) is a facility that allows investors to withdraw a fixed amount from their mutual fund investments at regular intervals while keeping the remaining balance invested.</p>
                            <p>An SWP Calculator is a financial tool used to estimate the sustainability of withdrawals and the remaining investment value over a defined period, based on assumed returns.</p>
                        </div>

                        <h3 class="calculator-info-title">What is an SWP Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>An SWP Calculator is an online utility that helps investors plan periodic withdrawals from a lump sum investment.</p>
                            <p>By entering key inputs such as:</p>
                            <ul style="margin-left: 14px;">
                                <li>Initial investment amount</li>
                                <li>Withdrawal amount</li>
                                <li>Investment duration</li>
                                <li>Expected rate of return</li>
                            </ul>
                            <p>the calculator provides:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimated withdrawal schedule</li>
                                <li>Remaining investment balance over time</li>
                                <li>Approximate duration for which the corpus will last</li>

                            </ul>

                            <p>The results are indicative and depend on market performance and other factors affecting investment returns.</p>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of an SWP Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The primary purpose of an SWP calculator is to assist in planning regular cash flows from an existing investment corpus.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Determine a sustainable withdrawal amount</li>
                                <li>Estimate how long the invested corpus will last</li>
                                <li>Evaluate the impact of withdrawals on investment value</li>
                                <li>Support retirement and income planning</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does an SWP Work?</h3>
                        <div class="calculator-info-content">
                            <p>Under an SWP, an investor initially invests a lump sum in a mutual fund and sets a fixed withdrawal amount at regular intervals (monthly, quarterly, etc.).</p>
                            <p>At each withdrawal:</p>
                            <ul style="margin-left: 14px;">
                                <li>A portion of mutual fund units is redeemed</li>
                                <li>The withdrawal amount is credited to the investor</li>
                                <li>The remaining balance continues to stay invested and may generate returns</li>
                            </ul>
                            <p>The number of units redeemed depends on the Net Asset Value (NAV) at the time of withdrawal. As NAV changes, the number of units withdrawn also varies.</p>
                        </div>

                        <h3 class="calculator-info-title">Working Principle of an SWP Calculator</h3>
                        <div class="calculator-info-content">
                            <p>An SWP calculator operates on the principle that:</p>
                            <ul style="margin-left: 14px;">
                                <li>Withdrawals reduce the invested corpus over time</li>
                                <li>Remaining funds continue to earn returns</li>
                                <li>The sustainability of withdrawals depends on the relationship between:
                                    <ul>

                                        <li>Withdrawal amount</li>
                                        <li>Rate of return</li>
                                        <li>Investment duration</li>
                                    </ul>
                                </li>
                            </ul>
                            <p>Unlike SIP or lumpsum calculators, SWP calculations involve iterative adjustments of the investment balance after each withdrawal.</p>
                        </div>

                        <h3 class="calculator-info-title">Illustrative Example</h3>
                        <div class="calculator-info-content">
                            <p>Assume:</p>
                            <ul style="margin-left:14px">
                                <li>Initial investment: Rs. 1,00,000</li>
                                <li>Monthly withdrawal: Rs. 10,000</li>
                                <li>Investment duration: 12 months</li>
                                <li>Expected annual return: 10%</li>
                            </ul>
                            <p>Each month:</p>
                            <ul style="margin-left:14px">
                                <li>A fixed amount is withdrawn</li>
                                <li>The remaining balance continues to earn returns</li>
                            </ul>
                            <p>Over time, the investment value reduces due to withdrawals, while returns partially offset the reduction.</p>
                            <p>The calculator helps estimate:</p>
                            <ul style="margin-left:14px">
                                <li>Total withdrawals made</li>
                                <li>Remaining balance at the end of the tenure</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How to Use the SWP Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To use the calculator:</p>
                            <ol>
                                <li>Enter the initial investment amount</li>
                                <li>Specify the withdrawal amount per interval</li>
                                <li>Select the investment duration</li>
                                <li>Input the expected rate of return</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Withdrawal schedule</li>
                                        <li>Remaining balance over time</li>
                                        <li>Estimated corpus at the end of the period</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How an SWP Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Enables planning of periodic income from investments</li>
                                <li>Helps assess the sustainability of withdrawals</li>
                                <li>Provides clarity on remaining corpus over time</li>
                                <li>Assists in comparing different withdrawal scenarios</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Returns are market-linked and not guaranteed</li>
                                <li>Higher withdrawal amounts may deplete the corpus faster</li>
                                <li>If returns exceed withdrawals, the corpus may sustain longer</li>
                                <li>The calculator does not account for:
                                    <ul>
                                        <li>Taxes on capital gains</li>
                                        <li>Exit loads</li>
                                        <li>Fund-specific expenses</li>
                                    </ul>
                                </li>
                                <li>Results are indicative and should be used for planning purposes</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Role of SWP in Financial Planning</h3>
                        <div class="calculator-info-content">
                            <p>SWP is commonly used for:</p>
                            <ul style="margin-left: 14px;">
                                <li>Generating periodic income (e.g., retirement planning)</li>
                                <li>Managing cash flows without fully redeeming investments</li>
                                <li>Maintaining partial market exposure while withdrawing funds</li>
                            </ul>
                            <p>It allows investors to balance liquidity needs with continued participation in market-linked investments.</p>
                        </div>

                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="SWP calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">Is SWP suitable for all investors?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                SWP is generally used by investors seeking regular income from existing investments. Suitability depends on individual financial needs and risk tolerance.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">Does SWP guarantee fixed income?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                No, withdrawals are fixed, but returns are market-linked and may vary.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">How is SWP different from SIP?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                SIP involves periodic investment, whereas SWP involves periodic withdrawal.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Can the withdrawal amount be changed?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                Yes, most mutual funds allow modification of withdrawal amount and frequency.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Does the SWP calculator include taxes?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                No, it does not account for taxation or other applicable charges.
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
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    let swpPreviewDonutChart = null;

    function formatCurrency(num) {
        const n = Number(num);
        if (!isFinite(n)) return '\u20B90';
        return '\u20B9' + Math.round(n).toLocaleString('en-IN');
    }

    function clamp(n, min, max) {
        if (!isFinite(n)) return min;
        return Math.min(max, Math.max(min, n));
    }

    function formatINRDigits(num) {
        const n = Number(num);
        if (!isFinite(n)) return '0';
        return Math.round(n).toLocaleString('en-IN');
    }

    function setRangeFill(rangeEl, value) {
        if (!rangeEl) return;
        const min = Number(rangeEl.min);
        const max = Number(rangeEl.max);
        const percent = ((value - min) / (max - min)) * 100;
        rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
    }

    function getSWPInputs() {
        return {
            totalInvestment: Number(document.getElementById('swpInvestmentRange').value),
            monthlyWithdrawal: Number(document.getElementById('swpWithdrawalRange').value),
            annualRate: Number(document.getElementById('swpRateRange').value),
            years: Number(document.getElementById('swpYearsRange').value)
        };
    }

    function calculateSWPData(totalInvestment, monthlyWithdrawal, annualRate, years) {
        // Match Groww-style SWP logic:
        // 1. Convert annual return to an effective monthly rate
        // 2. Apply monthly growth
        // 3. Subtract withdrawal at the end of each month
        const monthlyRate = Math.pow(1 + (annualRate / 100), 1 / 12) - 1;
        let balance = totalInvestment;
        const totalMonths = years * 12;
        const totalWithdrawn = monthlyWithdrawal * totalMonths;

        for (let month = 0; month < totalMonths; month++) {
            balance = (balance * (1 + monthlyRate)) - monthlyWithdrawal;
        }

        return {
            totalInvestment: Math.round(totalInvestment),
            totalWithdrawn: Math.round(totalWithdrawn),
            finalBalance: Math.round(balance)
        };
    }

    function updateSWPPreview(data) {
        const summaryInvestment = document.getElementById('swpSummaryInvestment');
        const summaryWithdrawal = document.getElementById('swpSummaryWithdrawal');
        const summaryFinal = document.getElementById('swpSummaryFinal');
        const donutCenterValue = document.getElementById('swpDonutCenterValue');

        if (summaryInvestment) summaryInvestment.textContent = formatCurrency(data.totalInvestment);
        if (summaryWithdrawal) summaryWithdrawal.textContent = formatCurrency(data.totalWithdrawn);
        if (summaryFinal) summaryFinal.textContent = formatCurrency(data.finalBalance);
        if (donutCenterValue) donutCenterValue.textContent = formatCurrency(data.finalBalance);

        const donutEl = document.querySelector('#swpPreviewDonutChart');
        if (!donutEl || typeof ApexCharts === 'undefined') return;

        const investedForChart = Math.max(0, data.totalInvestment);
        const returnsForChart = Math.max(0, data.finalBalance + data.totalWithdrawn - data.totalInvestment);

        if (!swpPreviewDonutChart) {
            swpPreviewDonutChart = new ApexCharts(donutEl, {
                series: [investedForChart, returnsForChart],
                chart: {
                    type: 'donut',
                    height: 285
                },
                labels: ['Invested amount', 'Estimated returns'],
                colors: ['#F97316', '#3B6DFF'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                stroke: {
                    show: false
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '84%',
                            labels: {
                                show: false
                            }
                        }
                    }
                }
            });
            swpPreviewDonutChart.render();
            return;
        }

        swpPreviewDonutChart.updateSeries([investedForChart, returnsForChart], true);
    }

    function calculateSWPResult() {
        const {
            totalInvestment,
            monthlyWithdrawal,
            annualRate,
            years
        } = getSWPInputs();

        if (!totalInvestment || !monthlyWithdrawal || !annualRate || !years) {
            return;
        }

        const swpData = calculateSWPData(totalInvestment, monthlyWithdrawal, annualRate, years);
        updateSWPPreview(swpData);
    }

    function initSWPModernUI() {
        const investmentRange = document.getElementById('swpInvestmentRange');
        const withdrawalRange = document.getElementById('swpWithdrawalRange');
        const rateRange = document.getElementById('swpRateRange');
        const yearsRange = document.getElementById('swpYearsRange');

        const investmentInput = document.getElementById('swpInvestmentInput');
        const withdrawalInput = document.getElementById('swpWithdrawalInput');
        const rateInput = document.getElementById('swpRateInput');
        const yearsInput = document.getElementById('swpYearsInput');

        if (!investmentRange || !withdrawalRange || !rateRange || !yearsRange) return;

        function bindCurrency(rangeEl, inputEl) {
            const field = inputEl.closest('.investment-slider-field');

            function setErrorState(isError) {
                if (!field) return;
                field.classList.toggle('is-error', !!isError);
            }

            rangeEl.addEventListener('input', function() {
                const v = clamp(Math.round(Number(rangeEl.value)), Number(rangeEl.min), Number(rangeEl.max));
                rangeEl.value = v;
                inputEl.value = formatINRDigits(v);
                setErrorState(false);
                setRangeFill(rangeEl, v);
                calculateSWPResult();
            });

            inputEl.addEventListener('input', function() {
                const digits = String(inputEl.value || '').replace(/[^\d]/g, '');
                if (!digits) {
                    inputEl.value = '';
                    setErrorState(false);
                    return;
                }

                const typedValue = Math.round(Number(digits));
                const min = Number(rangeEl.min);
                const max = Number(rangeEl.max);

                if (typedValue < min) {
                    inputEl.value = digits;
                    setErrorState(true);
                    return;
                }

                setErrorState(false);
                const v = clamp(typedValue, min, max);
                rangeEl.value = v;
                // Show Indian-style grouping while editing (blur still normalizes).
                inputEl.value = formatINRDigits(v);
                setRangeFill(rangeEl, v);
                calculateSWPResult();
            });

            inputEl.addEventListener('blur', function() {
                const digits = String(inputEl.value || '').replace(/[^\d]/g, '');
                const min = Number(rangeEl.min);
                const max = Number(rangeEl.max);
                const fallback = clamp(Number(rangeEl.value), min, max);

                if (!digits) {
                    inputEl.value = formatINRDigits(fallback);
                    setErrorState(false);
                    return;
                }

                const typedValue = Math.round(Number(digits));
                const v = clamp(typedValue, min, max);
                rangeEl.value = v;
                inputEl.value = formatINRDigits(v);
                setErrorState(v < min);
                setRangeFill(rangeEl, v);
                calculateSWPResult();
            });
        }

        bindCurrency(investmentRange, investmentInput);
        bindCurrency(withdrawalRange, withdrawalInput);

        rateRange.addEventListener('input', function() {
            const v = Math.round(clamp(Number(rateRange.value), Number(rateRange.min), Number(rateRange.max)) * 10) / 10;
            rateRange.value = v;
            rateInput.value = v;
            setRangeFill(rateRange, v);
            calculateSWPResult();
        });
        rateInput.addEventListener('input', function() {
            const raw = Number(rateInput.value);
            const safe = isFinite(raw) ? raw : Number(rateRange.min);
            const v = Math.round(clamp(safe, Number(rateRange.min), Number(rateRange.max)) * 10) / 10;
            rateRange.value = v;
            rateInput.value = v;
            setRangeFill(rateRange, v);
            calculateSWPResult();
        });

        yearsRange.addEventListener('input', function() {
            const v = clamp(Math.round(Number(yearsRange.value)), Number(yearsRange.min), Number(yearsRange.max));
            yearsRange.value = v;
            yearsInput.value = v;
            setRangeFill(yearsRange, v);
            calculateSWPResult();
        });
        yearsInput.addEventListener('input', function() {
            const raw = Math.round(Number(yearsInput.value));
            const safe = isFinite(raw) ? raw : Number(yearsRange.min);
            const v = clamp(safe, Number(yearsRange.min), Number(yearsRange.max));
            yearsRange.value = v;
            yearsInput.value = v;
            setRangeFill(yearsRange, v);
            calculateSWPResult();
        });

        investmentInput.value = formatINRDigits(Number(investmentRange.value));
        withdrawalInput.value = formatINRDigits(Number(withdrawalRange.value));
        setRangeFill(investmentRange, Number(investmentRange.value));
        setRangeFill(withdrawalRange, Number(withdrawalRange.value));
        setRangeFill(rateRange, Number(rateRange.value));
        setRangeFill(yearsRange, Number(yearsRange.value));

        const investNowBtn = document.getElementById('investNowBtn');
        if (investNowBtn) {
            investNowBtn.addEventListener('click', function() {
                calculateSWPResult();
            });
        }

        calculateSWPResult();
    }

    function bootstrapSWPCalculator() {
        if (typeof ApexCharts === 'undefined') {
            // ApexCharts is loaded from footer scripts, so wait briefly on first paint.
            setTimeout(bootstrapSWPCalculator, 50);
            return;
        }
        initSWPModernUI();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootstrapSWPCalculator);
    } else {
        bootstrapSWPCalculator();
    }
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