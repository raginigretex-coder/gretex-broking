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
                            <h2 class="calculator-info-title">About SWP Calculator</h2>
                            <div class="calculator-info-content">
                                <p>A Systematic Withdrawal Plan (SWP) allows you to withdraw a fixed amount regularly from your mutual fund investment. This calculator helps you understand how your corpus will deplete over time with regular withdrawals.</p>
                                
                                <h3>How SWP Works</h3>
                                <ul>
                                    <li><strong>Regular Withdrawals:</strong> You withdraw a fixed amount every month</li>
                                    <li><strong>Passive Income:</strong> Generate regular income from your investments</li>
                                    <li><strong>Corpus Management:</strong> Balance between withdrawals and growth</li>
                                    <li><strong>Tax Efficiency:</strong> Only capital gains are taxed, not the principal</li>
                                </ul>
                                
                                <h3>Benefits of SWP</h3>
                                <ul>
                                    <li>Regular income stream during retirement</li>
                                    <li>Flexible withdrawal amounts</li>
                                    <li>Tax-efficient compared to fixed deposits</li>
                                    <li>Potential for corpus growth if returns exceed withdrawals</li>
                                </ul>
                                
                                <h3>Key Factors</h3>
                                <p><strong>Total Investment:</strong> The corpus you start with</p>
                                <p><strong>Monthly Withdrawal:</strong> The fixed amount you withdraw every month</p>
                                <p><strong>Expected Return:</strong> The annualized return you expect (typically 8-12% for balanced funds)</p>
                                <p><strong>Time Period:</strong> The duration for which you plan to withdraw</p>
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
                    chart: { type: 'donut', height: 285 },
                    labels: ['Invested amount', 'Estimated returns'],
                    colors: ['#F97316', '#3B6DFF'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
                });
                swpPreviewDonutChart.render();
                return;
            }

            swpPreviewDonutChart.updateSeries([investedForChart, returnsForChart], true);
        }

        function calculateSWPResult() {
            const { totalInvestment, monthlyWithdrawal, annualRate, years } = getSWPInputs();

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

