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
                            <h2 class="calculator-info-title">About CAGR Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>CAGR (Compound Annual Growth Rate) Calculator</strong> uses the standard definition: one beginning value, one ending value, and duration in <strong>years</strong>. It answers: “What fixed yearly return, compounded once a year, would grow the initial amount to the final amount?”</p>
                                <p>CAGR ignores path and volatility—it only uses start, end, and time. That makes it easy to compare investments held for different lengths of time.</p>
                                <h3>Formula</h3>
                                <p>CAGR is defined as:</p>
                                <div class="formula-box">CAGR = ( Final Value / Initial Value )<sup>(1/n)</sup> &minus; 1</div>
                                <p>Here <strong>n</strong> is the <strong>duration of investment in years</strong>. To show CAGR as a percentage, multiply by 100:</p>
                                <div class="formula-box">CAGR % = [ ( Final Value / Initial Value )<sup>(1/n)</sup> &minus; 1 ] &times; 100</div>
                                <p>If <strong>Final Value</strong> is below <strong>Initial Value</strong>, the ratio inside the brackets is less than 1, so CAGR is <strong>negative</strong> (annualized loss). The formula does not change.</p>
                                <h3>Worked example (matches calculator defaults)</h3>
                                <p><strong>Inputs:</strong> Initial investment &#8377;5,000, Final investment &#8377;25,000, Duration <strong>5 years</strong>.</p>
                                <ol class="cagr-example-steps">
                                    <li><strong>Ratio:</strong> Final &divide; Initial = 25,000 &divide; 5,000 = <strong>5</strong>.</li>
                                    <li><strong>Raise to 1/n:</strong> 5<sup>(1/5)</sup> = 5<sup>0.2</sup> &approx; <strong>1.37973</strong>.</li>
                                    <li><strong>Subtract 1:</strong> 1.37973 &minus; 1 = <strong>0.37973</strong> (CAGR as a decimal).</li>
                                    <li><strong>Percentage:</strong> 0.37973 &times; 100 &approx; <strong>37.97%</strong> — this is what you see as “CAGR is 37.97%” on the calculator.</li>
                                </ol>
                                <p><strong>Check (meaning):</strong> Absolute return = (25,000 &minus; 5,000) &divide; 5,000 = 400% over five years; CAGR ~37.97% per year is the <em>equivalent</em> smooth yearly compounded rate, not the simple average return.</p>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>Compare investments with different time horizons</li>
                                    <li>Standardize returns; smooth volatility; evaluate fund performance</li>
                                    <li>Calculate time to reach goals; compare with benchmarks (Nifty, Sensex)</li>
                                </ul>
                                <h3>Limitations</h3>
                                <p>Doesn't show volatility; assumes reinvestment; ignores intermediate cash flows (use XIRR for SIPs); past CAGR doesn't guarantee future returns. Doesn't tell: year-by-year variation, risk taken, max drawdown, dividends, tax impact.</p>
                                <h3>More examples</h3>
                                <ul>
                                    <li><strong>&#8377;1,00,000</strong> to <strong>&#8377;1,61,051</strong> in <strong>5 years</strong> &rarr; CAGR &approx; <strong>10%</strong> (same formula: (1.61051)<sup>0.2</sup> &minus; 1).</li>
                                    <li><strong>Stock:</strong> &#8377;50K to &#8377;1.15L in 5yr &approx; 18.1% CAGR. <strong>MF:</strong> &#8377;2L to &#8377;3.2L in 7yr &approx; 6.9% CAGR.</li>
                                </ul>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">CAGR vs average return?</p><p>CAGR uses geometric mean (compounding); average uses arithmetic. +50% then -50% = 0% CAGR (actual), 0% average (misleading).</p></div>
                                <div class="faq-item"><p class="faq-q">Good CAGR by asset class?</p><p>Large-cap 10–12%; mid/small 13–16%; FD 6–8%; Gold 8–10%; Real estate 7–10%.</p></div>
                                <div class="faq-item"><p class="faq-q">Can CAGR be negative?</p><p>Yes. &#8377;1L to &#8377;81K in 3yr = -7% CAGR.</p></div>
                                <div class="faq-item"><p class="faq-q">CAGR vs XIRR?</p><p>CAGR for lump sum (single in/out). XIRR for multiple cash flows (SIPs, STPs).</p></div>
                                <div class="faq-item"><p class="faq-q">CAGR and dividends?</p><p>Only if you add dividends to ending value. Include dividends reinvested or received in total value.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - Systematic investments (different calc than CAGR)</li>
                                    <li><a href="calculator-lumpsum.php">Lumpsum Calculator</a> - Project future value at different CAGR rates</li>
                                    <li><a href="calculator-mutual-fund.php">Mutual Fund Calculator</a> - Compare fund performance using CAGR</li>
                                </ul>
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
                    chart: { type: 'donut', height: 285 },
                    labels: d.donutLabels,
                    colors: ['#94a3b8', '#00d09c'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    plotOptions: { pie: { donut: { size: '84%', labels: { show: false } } } }
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
                        cagrDonut.updateOptions({ labels: d.donutLabels }, false, false);
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
            initialRange.addEventListener('change', function() { updateUi(true); });

            finalRange.addEventListener('input', onFinalSlider);
            finalRange.addEventListener('change', function() { updateUi(true); });

            yearsRange.addEventListener('input', onYearsSlider);
            yearsRange.addEventListener('change', function() { updateUi(true); });

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

