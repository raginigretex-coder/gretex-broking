<?php

/**
 * NSC Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'NSC Calculator - Gretex Financial';
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
                <h1 class="calculator-page-title">NSC Calculator</h1>
                <p class="calculator-page-description">National Savings Certificate - 5-year tax-saving scheme</p>
            </div>
        </div>
    </div>

    <div class="calculator-main-section">
        <div class="container">
            <section class="investment-modern-calc investment-modern-calc--nsc" aria-label="NSC calculator">
                <div class="investment-tabs" aria-label="Calculator type">
                    <button type="button" class="investment-tab is-active" aria-current="page">NSC</button>
                </div>

                <div class="investment-modern-calc-grid">
                    <div class="investment-controls" aria-label="NSC inputs">
                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="nscAmountRange">Amount invested</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="nscAmountErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <span class="pill-unit">₹</span>
                                        <input type="text" class="pill-input" id="nscAmountInput" value="100000" inputmode="numeric" autocomplete="off" aria-label="NSC investment amount" />
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="nscAmountRange" min="1000" max="10000000" step="1000" value="100000" aria-label="Investment amount slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label" for="nscRateRange">Rate of interest (p.a)</label>
                                <div class="investment-input-wrap">
                                    <span class="investment-error-icon" id="nscRateErrorIcon" aria-hidden="true">i</span>
                                    <div class="investment-value-pill">
                                        <input type="number" class="pill-input" id="nscRateInput" min="1" max="15" step="0.1" value="6" inputmode="decimal" aria-label="Rate of interest percentage" />
                                        <span class="pill-unit">%</span>
                                    </div>
                                </div>
                            </div>
                            <input type="range" class="investment-range" id="nscRateRange" min="1" max="15" step="0.1" value="6" aria-label="Rate of interest slider" />
                        </div>

                        <div class="investment-slider-field">
                            <div class="investment-slider-header">
                                <label class="investment-slider-label">Time Period</label>
                                <div class="investment-input-wrap">
                                    <div class="investment-value-pill investment-value-pill--readonly" title="NSC tenure is fixed at 5 years.">
                                        <span class="pill-readonly">5 Yr</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nsc-compounding-row" aria-label="Compounding frequency">
                            <span class="nsc-compounding-label">Compounding frequency</span>
                            <label class="sr-only" for="nscCompoundingSelect">Compounding frequency</label>
                            <select id="nscCompoundingSelect" class="nsc-compounding-select" aria-label="Compounding frequency">
                                <option value="1" selected>Yearly</option>
                                <option value="2">Half Yearly</option>
                            </select>
                        </div>
                    </div>

                    <div class="investment-visual" aria-label="NSC result visualization">
                        <div class="investment-donut-card">
                            <div class="investment-graph-quickbar">
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-invested"></span>
                                        <span class="quickbar-label">Invested amount</span>
                                    </div>
                                    <div class="quickbar-value" id="nscSummaryInvested">₹0</div>
                                </div>
                                <div class="quickbar-item">
                                    <div class="quickbar-line">
                                        <span class="legend-dot legend-returns"></span>
                                        <span class="quickbar-label">Interest earned</span>
                                    </div>
                                    <div class="quickbar-value quickbar-returns-value" id="nscSummaryInterest">₹0</div>
                                </div>
                                <div class="quickbar-total">
                                    <div class="quickbar-total-label">Total amount</div>
                                    <div class="quickbar-total-value" id="nscSummaryMaturity">₹0</div>
                                </div>
                            </div>

                            <div class="investment-donut-wrap">
                                <div id="nscModernDonutChart"></div>
                                <div class="investment-donut-center">
                                    <div class="investment-donut-center-label">Total amount</div>
                                    <div class="investment-donut-center-value" id="nscDonutCenterValue">₹0</div>
                                </div>
                            </div>

                            <div class="investment-donut-legend" aria-hidden="true">
                                <div class="legend-item">
                                    <span class="legend-dot legend-returns"></span>
                                    <span>Interest earned</span>
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
                        <h3 class="calculator-info-title">NSC Calculator (National Savings Certificate)</h3>
                        <div class="calculator-info-content">
                            <p>National Savings Certificate (NSC) is a government-backed fixed-income savings scheme available through post offices in India. It is designed to encourage savings among individuals while offering assured returns and tax benefits under applicable provisions.</p>
                            <p>An NSC Calculator is a financial tool used to estimate the maturity value and interest earned on investments made under this scheme.</p>
                        </div>

                        <h3 class="calculator-info-title">What is an NSC Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>An NSC Calculator is an online utility that helps investors estimate the total value of their investment at maturity.</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Investment amount</li>
                                <li>Applicable interest rate</li>
                            </ul>
                            <p>the calculator computes:</p>
                            <ul style="margin-left: 14px;">
                                <li>Total interest earned</li>
                                <li>Maturity value at the end of the tenure</li>
                            </ul>
                            <p>The tenure for NSC is fixed, and interest is compounded periodically and paid at maturity. The results are indicative in nature.</p>

                        </div>

                        <h3 class="calculator-info-title">What is National Savings Certificate (NSC)?</h3>
                        <div class="calculator-info-content">
                            <p>NSC is a government-initiated savings instrument with the following characteristics:</p>
                            <ul style="margin-left: 14px;">
                                <li>Fixed tenure (generally 5 years)</li>
                                <li>Assured returns as notified periodically</li>
                                <li>Available through post offices</li>
                                <li>Suitable for low to moderate risk investors</li>
                                <li>Eligible for tax deduction under Section 80C (subject to applicable limits)</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of an NSC Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The NSC calculator assists investors in evaluating the growth of their investment over the tenure of the scheme.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate maturity value of NSC investments</li>
                                <li>Understand the effect of compounding on returns</li>
                                <li>Plan savings aligned with financial goals</li>
                                <li>Evaluate tax-saving investments under Section 80C</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does an NSC Calculator Work?</h3>
                        <div class="calculator-info-content">
                            <p>The NSC calculator uses a compound interest approach, where interest earned each year is reinvested into the principal.</p>
                            <p>The maturity value is calculated using the following formula:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                M = P(1 + r)<sup>n</sup>
                            </p>
                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>M</strong> = Maturity value</li>
                                <li><strong>P</strong> = Principal investment</li>
                                <li><strong>r</strong> = Interest rate</li>
                                <li><strong>n</strong> = Investment tenure (in years)</li>
                            </ul>
                            <p>Interest is compounded periodically and accumulated until maturity.</p>

                            <p><strong>Example</strong></p>
                            <p>Assume:</p>
                            <ul style="margin-left: 14px;">
                                <li>Investment amount: &#8377;1,00,000</li>
                                <li>Interest rate: 7.7%</li>
                                <li>Tenure: 5 years</li>
                            </ul>
                            <p>Estimated maturity value:</p>
                            <p><strong>&#8377;1,44,903 (approx.)</strong></p>
                            <p>Interest earned:</p>
                            <p><strong>&#8377;44,903 (approx.)</strong></p>
                        </div>

                        <h3 class="calculator-info-title">How to Use the NSC Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>To calculate returns:</p>
                            <ol>
                                <li>Enter the investment amount</li>
                                <li>Input the applicable interest rate</li>
                                <li>The tenure is predefined (typically 5 years)</li>
                                <li>The calculator will display:
                                    <ul>
                                        <li>Total investment</li>
                                        <li>Interest earned</li>
                                        <li>Maturity value</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Investors</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides quick and accurate estimates</li>
                                <li>Eliminates manual calculation complexity</li>
                                <li>Helps in planning fixed-income investments</li>
                                <li>Supports tax-efficient investment decisions</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Features of NSC</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Government-backed savings instrument</li>
                                <li>Fixed interest rate notified periodically</li>
                                <li>Interest compounded and reinvested</li>
                                <li>No upper limit on investment amount</li>
                                <li>Eligible for tax deduction under Section 80C (subject to limits)</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Interest earned is taxable as per applicable income tax slab</li>
                                <li>No Tax Deducted at Source (TDS) is applied</li>
                                <li>Premature withdrawal is restricted except under specified conditions</li>
                                <li>Interest rates may change for new investments</li>
                                <li>The calculator provides indicative values and does not account for tax impact</li>
                            </ul>
                        </div>


                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="NSC calculator frequently asked questions">
                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-0">
                                <span class="stepup-faq-question">What is the tenure of NSC?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-0" hidden>
                                NSC typically has a fixed tenure of 5 years.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-1">
                                <span class="stepup-faq-question">Is NSC a safe investment?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-1" hidden>
                                Yes, it is backed by the Government of India.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-2">
                                <span class="stepup-faq-question">Is the interest rate fixed?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-2" hidden>
                                The rate is fixed at the time of investment but may change for new issues.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-3">
                                <span class="stepup-faq-question">Does NSC offer tax benefits?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-3" hidden>
                                Yes, investments qualify for deduction under Section 80C, subject to limits.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false" aria-controls="swp-faq-panel-4">
                                <span class="stepup-faq-question">Does the calculator include tax calculations?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                            </button>
                            <div class="stepup-faq-panel" id="swp-faq-panel-4" hidden>
                                No, it provides pre-tax estimates only.
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
        'use strict';

        var MIN_AMOUNT = 1000;
        var MAX_AMOUNT = 10000000;
        var AMOUNT_STEP = 1000;
        var MIN_RATE = 1;
        var MAX_RATE = 15;
        var FIXED_YEARS = 5;

        var amountRange = document.getElementById('nscAmountRange');
        var amountInput = document.getElementById('nscAmountInput');
        var rateRange = document.getElementById('nscRateRange');
        var rateInput = document.getElementById('nscRateInput');
        var compoundingSelect = document.getElementById('nscCompoundingSelect');
        var amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;
        var rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;

        var summaryInvested = document.getElementById('nscSummaryInvested');
        var summaryInterest = document.getElementById('nscSummaryInterest');
        var summaryMaturity = document.getElementById('nscSummaryMaturity');
        var donutCenterValue = document.getElementById('nscDonutCenterValue');

        var nscModernDonutChart = null;

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

        function snapAmount(v) {
            var step = AMOUNT_STEP > 0 ? AMOUNT_STEP : 1000;
            return Math.round(Number(v) / step) * step;
        }

        function setAmountError(on) {
            if (amountField) amountField.classList.toggle('is-error', !!on);
        }

        function setRateError(on) {
            if (rateField) rateField.classList.toggle('is-error', !!on);
        }

        function setRangeFill(rangeEl, value) {
            var min = Number(rangeEl.min);
            var max = Number(rangeEl.max);
            var percent = ((value - min) / (max - min)) * 100;
            rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
        }

        function readAmount() {
            return clamp(snapAmount(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
        }

        function readRate() {
            return clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
        }

        function computeNSC() {
            var principal = readAmount();
            var rate = readRate() / 100;
            var frequency = compoundingSelect ? Number(compoundingSelect.value) : 1;
            var n = (frequency === 2) ? 2 : 1;
            var maturityValue = principal * Math.pow(1 + (rate / n), n * FIXED_YEARS);
            var interestEarned = maturityValue - principal;
            return {
                investmentAmount: principal,
                interestEarned: interestEarned,
                maturityValue: maturityValue
            };
        }

        function ensureModernDonut() {
            if (nscModernDonutChart || typeof ApexCharts === 'undefined') return;
            var el = document.getElementById('nscModernDonutChart');
            if (!el) return;
            var r = computeNSC();
            nscModernDonutChart = new ApexCharts(el, {
                series: [Math.max(0, r.investmentAmount), Math.max(0, r.interestEarned)],
                chart: {
                    type: 'donut',
                    height: 285,
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 450
                    }
                },
                labels: ['Total investment', 'Interest earned'],
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
                            labels: {
                                show: false
                            }
                        }
                    }
                }
            });
            nscModernDonutChart.render();
        }

        function updateModernSummary(animateChart) {
            var r = computeNSC();
            if (summaryInvested) summaryInvested.textContent = formatINR0(r.investmentAmount);
            if (summaryInterest) summaryInterest.textContent = formatINR0(r.interestEarned);
            if (summaryMaturity) summaryMaturity.textContent = formatINR0(r.maturityValue);
            if (donutCenterValue) donutCenterValue.textContent = formatINR0(r.maturityValue);
            ensureModernDonut();
            if (nscModernDonutChart) {
                nscModernDonutChart.updateSeries([Math.max(0, r.investmentAmount), Math.max(0, r.interestEarned)], animateChart !== false);
            }
        }

        function bindWhenReady() {
            if (document.body.dataset.nscModernBound === '1') {
                return true;
            }
            if (!amountRange || !amountInput || !rateRange || !rateInput || !compoundingSelect) {
                return false;
            }
            document.body.dataset.nscModernBound = '1';

            amountRange.addEventListener('input', function() {
                var v = clamp(snapAmount(Number(amountRange.value)), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = v;
                amountInput.value = formatINRDigits(v);
                setAmountError(false);
                setRangeFill(amountRange, v);
                updateModernSummary(false);
            });
            amountRange.addEventListener('change', function() {
                setAmountError(false);
                updateModernSummary(true);
            });

            rateRange.addEventListener('input', function() {
                var v = clamp(Number(rateRange.value), MIN_RATE, MAX_RATE);
                rateRange.value = v;
                rateInput.value = Number(v).toFixed(1).replace(/\.0$/, '');
                setRateError(false);
                setRangeFill(rateRange, v);
                updateModernSummary(false);
            });
            rateRange.addEventListener('change', function() {
                setRateError(false);
                updateModernSummary(true);
            });

            amountInput.addEventListener('input', function() {
                var raw = String(amountInput.value || '');
                var digits = raw.replace(/[^\d]/g, '');
                if (!digits) {
                    setAmountError(raw.trim() !== '');
                    return;
                }
                var v = Number(digits);
                var invalid = v < MIN_AMOUNT || v > MAX_AMOUNT;
                setAmountError(invalid);
                var clamped = clamp(snapAmount(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                setRangeFill(amountRange, clamped);
                amountInput.value = formatINRDigits(v);
                if (!invalid) updateModernSummary(false);
            });
            amountInput.addEventListener('change', function() {
                var raw = String(amountInput.value || '');
                var digits = raw.replace(/[^\d]/g, '');
                var v = digits ? Number(digits) : MIN_AMOUNT;
                var clamped = clamp(snapAmount(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                amountInput.value = formatINRDigits(clamped);
                setAmountError(false);
                setRangeFill(amountRange, clamped);
                updateModernSummary(true);
            });

            rateInput.addEventListener('input', function() {
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
                var clamped = clamp(v, MIN_RATE, MAX_RATE);
                rateRange.value = clamped;
                setRangeFill(rateRange, clamped);
                if (!invalid) updateModernSummary(false);
            });
            rateInput.addEventListener('change', function() {
                var raw = String(rateInput.value || '');
                var v = raw.trim() === '' ? MIN_RATE : Number(raw);
                var safe = isFinite(v) ? v : MIN_RATE;
                var clamped = clamp(safe, MIN_RATE, MAX_RATE);
                rateRange.value = clamped;
                rateInput.value = Number(clamped).toFixed(1).replace(/\.0$/, '');
                setRateError(false);
                setRangeFill(rateRange, clamped);
                updateModernSummary(true);
            });

            compoundingSelect.addEventListener('change', function() {
                updateModernSummary(true);
            });

            var faqRows = document.querySelectorAll('.stepup-faq-row[data-nsc-faq]');
            faqRows.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var idx = btn.getAttribute('data-nsc-faq');
                    var panel = document.getElementById('nsc-faq-panel-' + idx);
                    if (!panel) return;
                    var expanded = btn.getAttribute('aria-expanded') === 'true';
                    btn.setAttribute('aria-expanded', String(!expanded));
                    panel.hidden = expanded;
                });
            });

            setRangeFill(amountRange, readAmount());
            amountInput.value = formatINRDigits(readAmount());
            setRangeFill(rateRange, readRate());
            rateInput.value = Number(readRate()).toFixed(1).replace(/\.0$/, '');

            var apexAttempts = 0;

            function waitApex() {
                updateModernSummary(false);
                if (typeof ApexCharts === 'undefined') {
                    apexAttempts += 1;
                    if (apexAttempts < 80) setTimeout(waitApex, 80);
                } else {
                    ensureModernDonut();
                    updateModernSummary(false);
                }
            }
            waitApex();

            return true;
        }

        function kickoff() {
            if (bindWhenReady()) return;
            var n = 0;
            var t = setInterval(function() {
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
// Include footer
require_once '../../includes/footer.php';
?>
