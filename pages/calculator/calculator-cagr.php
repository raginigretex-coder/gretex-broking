<?php

/**
 * CAGR Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'CAGR Calculator - Gretex Financial';
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
                <h1 class="calculator-page-title">CAGR Calculator</h1>
                <p class="calculator-page-description">CAGR uses your <strong>actual</strong> starting and ending amounts. If <strong>final &lt; initial</strong>, the result is <strong>negative</strong> (annualized loss)—that is correct. Calculators that only apply a positive “expected return” forward usually never show a shrinking balance.</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc investment-modern-calc--cagr" aria-label="CAGR calculator">
                <div class="investment-tabs" aria-label="Current calculator">
                    <button type="button" class="investment-tab is-active" aria-current="page">CAGR</button>
                </div>

                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="Inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="cagrInitialRange">Initial investment</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="cagrInitialErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">₹</span>
                                        <input type="text" class="pill-input" id="cagrInitialInput" value="5,000" inputmode="numeric" aria-label="Initial investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="cagrInitialRange" min="5000" max="10000000" step="500" value="5000" aria-label="Initial investment slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="cagrFinalRange">Final investment</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="cagrFinalErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">₹</span>
                                        <input type="text" class="pill-input" id="cagrFinalInput" value="25,000" inputmode="numeric" aria-label="Final investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="cagrFinalRange" min="5000" max="10000000" step="500" value="25000" aria-label="Final investment slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="cagrYearsRange">Duration of investment</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="cagrYearsErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="cagrYearsInput" min="1" max="40" step="1" value="5" inputmode="numeric" aria-label="Duration in years" />
                                        <span class="pill-unit">Yr</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="cagrYearsRange" min="1" max="40" step="1" value="5" aria-label="Duration slider" />
                        </div>
                    </div>

                    <div class="investment-visual" aria-label="Visualization">
                        <div class="investment-donut-card">
                            <div class="investment-graph-quickbar" aria-hidden="false">
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-invested"></span>
                                        <span class="quickbar-label">Initial</span>
                                    </div>
                                    <div class="quickbar-value" id="cagrSummaryInitial">₹5,000</div>
                                </div>
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-returns"></span>
                                        <span class="quickbar-label" id="cagrGainLabel">Total gain</span>
                                    </div>
                                    <div class="quickbar-value quickbar-returns-value" id="cagrSummaryGain">₹20,000</div>
                                </div>
                                <div class="quickbar-total">
                                    <div class="quickbar-total-label">Final value</div>
                                    <div class="quickbar-total-value" id="cagrSummaryFinal">₹25,000</div>
                                </div>
                            </div>
                            <div class="investment-donut-wrap">
                                <div id="cagrPreviewDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">CAGR (p.a.)</div>
                                    <div class="investment-donut-center-value" id="cagrDonutCenterPct">37.97%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="investment-cagr-summary-bar">
                    <p class="investment-cagr-summary-text" id="cagrFooterLine">CAGR is <strong id="cagrFooterPct">37.97%</strong></p>
                    <button type="button" class="investment-cagr-reset-btn" id="cagrResetBtn">RESET</button>
                </div>
            </section>

            <div class="calculator-wrapper">
                <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                <div class="calculator-info-section">
                    <div class="calculator-info-card">
                        <h3 class="calculator-info-title">CAGR Calculator (Compound Annual Growth Rate)</h3>
                        <div class="calculator-info-content">
                            <p>Compound Annual Growth Rate (CAGR) is a financial metric used to measure the average annual growth of an investment over a specified period, assuming that the returns are reinvested.</p>
                            <p>A CAGR Calculator is a financial tool used to determine the annualised rate at which an investment has grown between its initial and final value.</p>
                        </div>

                        <h3 class="calculator-info-title">What is a CAGR Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>A CAGR Calculator is an online utility that helps calculate the average yearly growth rate of an investment.</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Initial investment value</li>
                                <li>Final investment value</li>
                                <li>Investment duration</li>
                            </ul>
                            <p>the calculator computes:</p>
                            <ul style="margin-left: 14px;">
                                <li>CAGR (annual growth rate)</li>
                            </ul>
                            <p>This provides a standardised way to evaluate and compare investment performance over time.</p>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of a CAGR Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The CAGR calculator is used to assess the performance of investments over a defined period.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Measure annualised returns of investments</li>
                                <li>Compare performance across different assets</li>
                                <li>Evaluate long-term growth trends</li>
                                <li>Support investment decision-making</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does CAGR Work?</h3>
                        <div class="calculator-info-content">
                            <p>CAGR represents the rate at which an investment would have grown if it had grown at a constant rate every year.</p>
                            <p>It smoothens out fluctuations and provides a single growth rate that reflects overall performance over time.</p>
                        </div>

                        <h3 class="calculator-info-title">CAGR Formula</h3>
                        <div class="calculator-info-content">
                            <p>The Compound Annual Growth Rate is calculated using the following formula:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                 CAGR = 
                                <span style="font-size:28px; vertical-align:middle;">(</span>
                                
                                <span style="display:inline-block; text-align:center; vertical-align:middle;">
                                    <span style="display:block; border-bottom:2px solid #000; padding:0 6px;">
                                    FV
                                    </span>
                                    <span style="display:block; font-size:14px;">PV</span>
                                </span>
                                
                                <span style="font-size:28px; vertical-align:middle;">)</span>
                                <sup>1/n</sup> − 1
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>FV</strong> = Final value of the investment</li>
                                <li><strong>PV</strong> = Initial value of the investment</li>
                                <li><strong>n</strong> = Number of years</li>
                            </ul>

                            <p><strong>Example</strong></p>
                            <p>Assume:</p>
                            <ul style="margin-left: 14px;">
                                <li>Initial investment: &#8377;1,00,000</li>
                                <li>Final value: &#8377;10,00,000</li>
                                <li>Duration: 5 years</li>
                            </ul>
                            <p>Applying the formula:</p>
                            <p>The CAGR is approximately:</p>
                            <p><strong>58.9%</strong></p>
                            <p>This means the investment has grown at an average annual rate of 58.9% over the period.</p>
                        </div>

                        <h3 class="calculator-info-title">How to Use the CAGR Calculator</h3>
                        <div class="calculator-info-content">
                            <p>To calculate CAGR:</p>
                            <ol>
                                <li>Enter the initial investment value</li>
                                <li>Enter the final investment value</li>
                                <li>Specify the investment duration</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Annual growth rate (CAGR)</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides a standardised measure of returns</li>
                                <li>Enables comparison between different investments</li>
                                <li>Helps evaluate long-term performance</li>
                                <li>Eliminates complexity of manual calculations</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Characteristics of CAGR</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Represents average annual growth rate</li>
                                <li>Assumes reinvestment of returns</li>
                                <li>Smoothens volatility in returns</li>
                                <li>Useful for long-term performance evaluation</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>CAGR assumes consistent growth, which may not reflect actual market fluctuations</li>
                                <li>It does not account for risk or volatility</li>
                                <li>It should be used alongside other metrics for comprehensive analysis</li>
                                <li>The calculator provides indicative values based on inputs</li>
                            </ul>
                        </div>


                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="CAGR calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">What does CAGR represent?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                It represents the average annual growth rate of an investment over a specified period.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">Is CAGR the same as actual returns?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                No, it is an average rate and does not reflect year-to-year fluctuations.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Can CAGR be used to compare investments?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                Yes, it is commonly used to compare performance across different assets.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Does CAGR account for risk?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                No, it only measures growth and does not consider volatility or risk.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Is CAGR useful for short-term investments?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                It is more meaningful for long-term investment evaluation.
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script src="../../js/gretex-financial.js"></script>
<script src="../../js/calculator-functions.js"></script>
<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    (function initCagrModernUi() {
        const root = document.querySelector('.investment-modern-calc--cagr');
        if (!root) return;

        const initialRange = document.getElementById('cagrInitialRange');
        const initialInput = document.getElementById('cagrInitialInput');
        const finalRange = document.getElementById('cagrFinalRange');
        const finalInput = document.getElementById('cagrFinalInput');
        const yearsRange = document.getElementById('cagrYearsRange');
        const yearsInput = document.getElementById('cagrYearsInput');

        const initialField = initialRange ? initialRange.closest('.investment-slider-field') : null;
        const finalField = finalRange ? finalRange.closest('.investment-slider-field') : null;
        const yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;

        const summaryInitial = document.getElementById('cagrSummaryInitial');
        const summaryGain = document.getElementById('cagrSummaryGain');
        const summaryFinal = document.getElementById('cagrSummaryFinal');
        const gainLabel = document.getElementById('cagrGainLabel');
        const donutCenterPct = document.getElementById('cagrDonutCenterPct');
        const footerPct = document.getElementById('cagrFooterPct');
        const resetBtn = document.getElementById('cagrResetBtn');

        const MIN_AMT = 5000;
        const MAX_AMT = 10000000;
        const STEP_AMT = 500;
        const MIN_YEARS = 1;
        const MAX_YEARS = 40;

        /** Default demo: ₹5k → ₹25k in 5Y ⇒ CAGR ≈ 37.97% */
        const DEFAULT_INITIAL = 5000;
        const DEFAULT_FINAL = 25000;
        const DEFAULT_YEARS = 5;

        let cagrDonut = null;
        let lastDonutLabelKey = '';

        function clamp(n, min, max) {
            if (!Number.isFinite(n)) return min;
            return Math.min(max, Math.max(min, n));
        }

        function snapAmount(v) {
            return Math.round(Number(v) / STEP_AMT) * STEP_AMT;
        }

        function formatINR0(num) {
            const n = Number(num);
            if (!Number.isFinite(n)) return '₹0';
            return '₹' + Math.round(n).toLocaleString('en-IN');
        }

        function formatINRDigits(n) {
            const x = Number(n);
            if (!Number.isFinite(x)) return '0';
            return Math.round(x).toLocaleString('en-IN');
        }

        function setInitialError(on) {
            if (initialField) initialField.classList.toggle('is-error', !!on);
        }

        function setFinalError(on) {
            if (finalField) finalField.classList.toggle('is-error', !!on);
        }

        function setYearsError(on) {
            if (yearsField) yearsField.classList.toggle('is-error', !!on);
        }

        function setRangeFill(rangeEl, value) {
            const min = Number(rangeEl.min);
            const max = Number(rangeEl.max);
            const percent = ((value - min) / (max - min)) * 100;
            rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
        }

        function readInitial() {
            return clamp(snapAmount(Number(initialRange.value)), MIN_AMT, MAX_AMT);
        }

        function readFinal() {
            return clamp(snapAmount(Number(finalRange.value)), MIN_AMT, MAX_AMT);
        }

        function readYears() {
            return clamp(Math.round(Number(yearsRange.value)), MIN_YEARS, MAX_YEARS);
        }

        function computeState() {
            const initial = readInitial();
            const finalVal = readFinal();
            const years = readYears();
            let cagrText = '—';
            let cagrNum = NaN;
            let footerStrong = '—';

            if (typeof calcCAGR === 'function' && initial > 0 && years > 0) {
                const r = calcCAGR(initial, finalVal, years);
                cagrNum = r.cagr;
                if (Number.isFinite(cagrNum)) {
                    cagrText = cagrNum.toFixed(2) + '%';
                    footerStrong = cagrNum.toFixed(2) + '%';
                }
            }

            const gain = finalVal - initial;
            const gainLabelText = gain >= 0 ? 'Total gain' : 'Total loss';

            let s1;
            let s2;
            let labels;
            if (finalVal >= initial) {
                s1 = Math.max(0, initial);
                s2 = Math.max(0, finalVal - initial);
                labels = ['Initial', 'Growth'];
            } else {
                s1 = Math.max(0, finalVal);
                s2 = Math.max(0, initial - finalVal);
                labels = ['Final value', 'Decline'];
            }

            return {
                initial,
                finalVal,
                years,
                gain,
                gainLabelText,
                cagrText,
                cagrNum,
                footerStrong,
                donutSeries: [s1, s2],
                donutLabels: labels
            };
        }

        function ensureDonut() {
            if (cagrDonut || typeof ApexCharts === 'undefined') return;
            const el = document.getElementById('cagrPreviewDonutChart');
            if (!el) return;
            const d = computeState();
            cagrDonut = new ApexCharts(el, {
                series: d.donutSeries,
                chart: {
                    type: 'donut',
                    height: 285
                },
                labels: d.donutLabels,
                colors: ['#94a3b8', '#00d09c'],
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
            cagrDonut.render();
        }

        function updateUi(animateChart) {
            const d = computeState();

            if (summaryInitial) summaryInitial.textContent = formatINR0(d.initial);
            if (summaryFinal) summaryFinal.textContent = formatINR0(d.finalVal);
            if (gainLabel) gainLabel.textContent = d.gainLabelText;
            if (summaryGain) {
                const absGain = Math.abs(d.gain);
                /* Label is “Total gain” or “Total loss”—show magnitude only (no extra minus). */
                summaryGain.textContent = formatINR0(absGain);
                summaryGain.classList.toggle('quickbar-loss', d.gain < 0);
            }
            if (donutCenterPct) donutCenterPct.textContent = d.cagrText;
            if (footerPct) footerPct.textContent = d.footerStrong;

            ensureDonut();
            if (cagrDonut) {
                const labelKey = d.donutLabels.join('|');
                if (labelKey !== lastDonutLabelKey) {
                    lastDonutLabelKey = labelKey;
                    cagrDonut.updateOptions({
                        labels: d.donutLabels
                    }, false, false);
                }
                cagrDonut.updateSeries(d.donutSeries, animateChart !== false);
            }
        }

        function onInitialSlider() {
            let v = clamp(snapAmount(initialRange.value), MIN_AMT, MAX_AMT);
            initialRange.value = v;
            initialInput.value = formatINRDigits(v);
            setInitialError(false);
            setRangeFill(initialRange, v);
            updateUi(false);
        }

        function onFinalSlider() {
            let v = clamp(snapAmount(finalRange.value), MIN_AMT, MAX_AMT);
            finalRange.value = v;
            finalInput.value = formatINRDigits(v);
            setFinalError(false);
            setRangeFill(finalRange, v);
            updateUi(false);
        }

        function onYearsSlider() {
            let v = clamp(Math.round(Number(yearsRange.value)), MIN_YEARS, MAX_YEARS);
            yearsRange.value = v;
            yearsInput.value = v;
            setYearsError(false);
            setRangeFill(yearsRange, v);
            updateUi(false);
        }

        initialRange.addEventListener('input', onInitialSlider);
        initialRange.addEventListener('change', function() {
            updateUi(true);
        });

        finalRange.addEventListener('input', onFinalSlider);
        finalRange.addEventListener('change', function() {
            updateUi(true);
        });

        yearsRange.addEventListener('input', onYearsSlider);
        yearsRange.addEventListener('change', function() {
            updateUi(true);
        });

        initialInput.addEventListener('input', function() {
            const raw = String(initialInput.value || '');
            const digits = raw.replace(/[^\d]/g, '');
            if (!digits) {
                setInitialError(raw.trim() !== '');
                return;
            }
            const v = Number(digits);
            const invalid = v < MIN_AMT || v > MAX_AMT;
            setInitialError(invalid);
            const clamped = clamp(snapAmount(v), MIN_AMT, MAX_AMT);
            initialRange.value = clamped;
            setRangeFill(initialRange, clamped);
            initialInput.value = formatINRDigits(v);
            if (!invalid) updateUi(false);
        });
        initialInput.addEventListener('change', function() {
            const raw = String(initialInput.value || '');
            const digits = raw.replace(/[^\d]/g, '');
            const v = digits ? Number(digits) : MIN_AMT;
            const clamped = clamp(snapAmount(v), MIN_AMT, MAX_AMT);
            initialRange.value = clamped;
            initialInput.value = formatINRDigits(clamped);
            setInitialError(false);
            setRangeFill(initialRange, clamped);
            updateUi(true);
        });

        finalInput.addEventListener('input', function() {
            const raw = String(finalInput.value || '');
            const digits = raw.replace(/[^\d]/g, '');
            if (!digits) {
                setFinalError(raw.trim() !== '');
                return;
            }
            const v = Number(digits);
            const invalid = v < MIN_AMT || v > MAX_AMT;
            setFinalError(invalid);
            const clamped = clamp(snapAmount(v), MIN_AMT, MAX_AMT);
            finalRange.value = clamped;
            setRangeFill(finalRange, clamped);
            finalInput.value = formatINRDigits(v);
            if (!invalid) updateUi(false);
        });
        finalInput.addEventListener('change', function() {
            const raw = String(finalInput.value || '');
            const digits = raw.replace(/[^\d]/g, '');
            const v = digits ? Number(digits) : MIN_AMT;
            const clamped = clamp(snapAmount(v), MIN_AMT, MAX_AMT);
            finalRange.value = clamped;
            finalInput.value = formatINRDigits(clamped);
            setFinalError(false);
            setRangeFill(finalRange, clamped);
            updateUi(true);
        });

        yearsInput.addEventListener('input', function() {
            const raw = String(yearsInput.value || '');
            if (raw.trim() === '') {
                setYearsError(true);
                return;
            }
            const v = Math.round(Number(yearsInput.value));
            if (!Number.isFinite(v)) {
                setYearsError(true);
                return;
            }
            const invalid = v < MIN_YEARS || v > MAX_YEARS;
            setYearsError(invalid);
            const clamped = clamp(v, MIN_YEARS, MAX_YEARS);
            yearsRange.value = clamped;
            setRangeFill(yearsRange, clamped);
            if (!invalid) updateUi(false);
        });
        yearsInput.addEventListener('change', function() {
            const raw = String(yearsInput.value || '');
            const v = raw.trim() === '' ? MIN_YEARS : Math.round(Number(raw));
            const safe = Number.isFinite(v) ? v : MIN_YEARS;
            const clamped = clamp(safe, MIN_YEARS, MAX_YEARS);
            yearsRange.value = clamped;
            yearsInput.value = clamped;
            setYearsError(false);
            setRangeFill(yearsRange, clamped);
            updateUi(true);
        });

        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                initialRange.value = DEFAULT_INITIAL;
                finalRange.value = DEFAULT_FINAL;
                yearsRange.value = DEFAULT_YEARS;
                initialInput.value = formatINRDigits(DEFAULT_INITIAL);
                finalInput.value = formatINRDigits(DEFAULT_FINAL);
                yearsInput.value = DEFAULT_YEARS;
                setInitialError(false);
                setFinalError(false);
                setYearsError(false);
                setRangeFill(initialRange, DEFAULT_INITIAL);
                setRangeFill(finalRange, DEFAULT_FINAL);
                setRangeFill(yearsRange, DEFAULT_YEARS);
                lastDonutLabelKey = '';
                updateUi(true);
            });
        }

        setRangeFill(initialRange, Number(initialRange.value));
        setRangeFill(finalRange, Number(finalRange.value));
        setRangeFill(yearsRange, Number(yearsRange.value));

        let apexWait = 0;
        (function waitForApex() {
            updateUi(false);
            if (typeof ApexCharts === 'undefined') {
                apexWait += 1;
                if (apexWait < 80) setTimeout(waitForApex, 60);
            }
        })();
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
