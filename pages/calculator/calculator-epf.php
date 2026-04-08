<?php
/**
 * EPF Calculator - Gretex Financial
 * Groww-style inputs: salary, age, employee EPF %, annual increment, notified interest rate.
 */

$pageTitle = 'EPF Calculator - Gretex Financial';
$additionalCSS = [
    '../../css/calculator-page.css',
    '../../css/chatbot.css',
];

$additionalScripts = [
    'https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js',
];

require_once '../../includes/header.php';
require_once '../../includes/navbar.php';

$epfRatePercent = 8.25;
$epfRetirementAge = 58;
?>

    <main class="calculator-page investment-modern-calc-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link"><i data-lucide="arrow-left"></i><span>Back to Calculators</span></a>
                    <h1 class="calculator-page-title">EPF Calculator</h1>
                    <p class="calculator-page-description">Employee Provident Fund – same projection method as Groww (monthly compounding, 12% employer-to-corpus model, retirement age <?php echo (int) $epfRetirementAge; ?>). Optional current balance to match their headline figure if needed.</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc investment-modern-calc--epf" aria-label="EPF calculator">
                    <div class="investment-tabs" aria-label="Calculator type">
                        <button type="button" class="investment-tab is-active" aria-current="page">EPF</button>
                    </div>

                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" aria-label="EPF inputs">
                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="epfSalaryRange">Monthly salary (Basic + DA)</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="epfSalaryErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                            <input type="text" class="pill-input" id="epfSalaryInput" value="50,000" inputmode="numeric" autocomplete="off" aria-label="Monthly basic and DA salary" />
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="epfSalaryRange" min="1000" max="500000" step="500" value="50000" aria-label="Monthly salary slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="epfAgeRange">Your age</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="epfAgeErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="epfAgeInput" min="18" max="58" step="1" value="30" inputmode="numeric" aria-label="Your current age" />
                                            <span class="pill-unit">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="epfAgeRange" min="18" max="58" step="1" value="30" aria-label="Age slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="epfEmpPctRange">Your contribution to EPF</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="epfEmpPctErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input pill-input--narrow" id="epfEmpPctInput" min="8" max="20" step="0.5" value="12" inputmode="decimal" aria-label="Employee EPF percentage" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="epfEmpPctRange" min="8" max="20" step="0.5" value="12" aria-label="Employee EPF percent slider" />
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" for="epfIncrementRange">Annual increase in salary</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="epfIncrementErrorIcon" aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input pill-input--narrow" id="epfIncrementInput" min="0" max="25" step="0.5" value="5" inputmode="decimal" aria-label="Annual salary increment percent" />
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="epfIncrementRange" min="0" max="25" step="0.5" value="5" aria-label="Salary increment slider" />
                            </div>

                            <div class="investment-slider-field epf-rate-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label">Rate of interest</label>
                                    <div class="investment-value-pill investment-value-pill--readonly" title="EPFO-declared rate; update when notified rate changes.">
                                        <span class="pill-readonly" id="epfRateDisplay"><?php echo htmlspecialchars((string) $epfRatePercent, ENT_QUOTES, 'UTF-8'); ?>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="investment-visual" aria-label="EPF result visualization">
                            <div class="investment-donut-card" style="padding: 2rem; text-align: center;">
                                <div class="investment-donut-center" style="position: static; transform: none; margin: 0;">
                                    <p class="epf-accumulated-copy" style="font-size: 1rem; color: #6b7280; margin-bottom: 0.5rem;">You will have accumulated</p>
                                    <div class="investment-donut-center-value" id="epfDonutCenterValue" style="font-size: 2.25rem; font-weight: 700;">₹0</div>
                                    <p class="epf-accumulated-copy" style="font-size: 1rem; color: #6b7280; margin-top: 0.5rem;">by the time you retire</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                
            <div class="calculator-wrapper">
                <aside class="calculator-sidebar" id="calculatorSidebar" aria-label="All calculators"></aside>
                <div class="calculator-info-section">
                    <div class="calculator-info-card">
                      <h3 class="calculator-info-title">EPF Calculator (Employee Provident Fund)</h3>
                            <div class="calculator-info-content">
                                <p>Employee Provident Fund (EPF) is a government-regulated retirement savings scheme for salaried employees in the organised sector. It involves monthly contributions from both the employee and employer, 
                                    which accumulate over time with interest.</p>
                                <p>An EPF Calculator is a financial tool used to estimate the total corpus that may be accumulated in an EPF account by the time of retirement.</p>
                            </div>
                            
                        <h3 class="calculator-info-title">What is an EPF Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>An EPF Calculator is an online utility that provides an indicative estimate of the total balance in an EPF account based on contributions and interest over time.</p>
                                <p>By entering inputs such as:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Basic salary and dearness allowance</li>
                                    <li>Employee contribution</li>
                                    <li>Employer contribution</li>
                                    <li>Current age and retirement age</li>
                                    <li>Existing EPF balance (if any)</li>
                                </ul>
                                <p>the calculator computes:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Total contributions made</li>
                                    <li>Interest earned</li>
                                    <li>Estimated retirement corpus</li>
                                </ul>
                                <p>The output is indicative and depends on contribution patterns and applicable interest rates.</p>
                            </div>
                        <h3 class="calculator-info-title">What is EPF?</h3>
                            <div class="calculator-info-content">
                                <p>Employee Provident Fund (EPF) is a retirement benefit scheme governed by the Employees’ Provident Fund Organisation (EPFO). Under this scheme:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Both employee and employer contribute a fixed percentage of salary</li>
                                    <li>Contributions accumulate over time with interest</li>
                                    <li>The corpus is primarily intended for post-retirement financial security</li>
                                </ul>
                                <p>It is mandatory for eligible organisations to register under the EPF framework as per applicable regulations.</p>
                            </div>

                        <h3 class="calculator-info-title">Purpose and Use of an EPF Calculator</h3>
                            <div class="calculator-info-content">
                                <p>The EPF calculator helps individuals understand the long-term growth of their retirement savings.</p>
                                <p>It can be used to:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Estimate the retirement corpus based on current contributions</li>
                                    <li>Track the impact of salary changes on EPF accumulation</li>
                                    <li>Evaluate different contribution scenarios</li>
                                    <li>Support long-term financial and retirement planning</li>
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">How Does an EPF Calculator Work?</h3>
                            <div class="calculator-info-content">
                                <p>An EPF calculator estimates the accumulated balance by considering:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Monthly contributions from employee and employer</li>
                                    <li>Applicable EPF interest rate</li>
                                    <li>Investment duration until retirement</li>
                                </ul>
                                <p>Each month:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Contributions are added to the EPF account</li>
                                    <li>Interest is applied periodically (compounded annually, calculated monthly)</li>
                                </ul>
                                <p>The total corpus grows over time due to consistent contributions and compounding.</p>
                            </div>

                        <h3 class="calculator-info-title">Example</h3>
                            <div class="calculator-info-content">
                                <p>Assume:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Basic salary + DA: ₹14,000 per month</li>
                                    <li>Employee contribution: 12% (₹1,680)</li>
                                    <li>Employer contribution to EPF: ₹514</li>
                                    <li>Total monthly EPF contribution: ₹2,194</li>
                                    <li>Interest rate: 8.1% per annum</li>
                                </ul>
                                <p>Over time, the contributions accumulate along with interest, resulting in a growing retirement corpus.</p>
                                <p>The calculator helps estimate:</p>
                                <ul style="margin-left: 14px;">
                                    <li>Total accumulated balance</li>
                                    <li>Interest earned over the investment period</li>
                                </ul>
                            </div>


                        <h3 class="calculator-info-title">How to Use the EPF Calculator?</h3>
                            <div class="calculator-info-content">
                                <p>To calculate your EPF balance:</p>
                                <ol>
                                    <li>Enter your basic salary and dearness allowance</li>
                                    <li>Input your current age and expected retirement age</li>
                                    <li>Enter contribution percentages (employee and employer)</li>
                                    <li>Add your current EPF balance (if applicable)</li>
                                    <li>The calculator will display:
                                        <ul>
                                            <li>Total contributions</li>
                                            <li>Interest earned</li>
                                            <li>Estimated retirement corpus</li>
                                        </ul>
                                    </li>
                                </ol>
                                
                            </div>
                        
                        <h3 class="calculator-info-title">How the EPF Calculator Assists Individuals</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Provides an estimate of long-term retirement savings</li>
                                    <li>Eliminates the need for manual calculations</li>
                                    <li>Helps track contribution growth over time</li>
                                    <li>Assists in planning for financial security post-retirement</li>
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">Key Features of EPF</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Mandatory savings mechanism for eligible employees</li>
                                    <li>Contributions made by both employee and employer</li>
                                    <li>Interest rate declared periodically by EPFO</li>
                                    <li>Long-term accumulation with compounding benefits</li>
                                    <li>Partial withdrawals permitted under specified conditions</li>
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                            <div class="calculator-info-content">
                                <ul style="margin-left: 14px;">
                                    <li>Interest rates are subject to periodic revision</li>
                                    <li>Contributions depend on salary structure</li>
                                    <li>Withdrawals are governed by regulatory provisions</li>
                                    <li>The calculator provides indicative values and does not account for policy changes</li>
                                    
                                </ul>
                            </div>

                        <h3 class="calculator-info-title">FAQs</h3>
                            <div class="stepup-faq-accordion" aria-label="EPF calculator frequently asked questions">
                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-epf-faq="0">
                                    <span class="stepup-faq-question">What is the contribution rate for EPF?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="epf-faq-panel-0" hidden>
                                    Typically, employees contribute 12% of basic salary and dearness allowance, with a corresponding employer contribution as per applicable rules.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-epf-faq="1">
                                    <span class="stepup-faq-question">Is EPF mandatory?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="epf-faq-panel-1" hidden>
                                    It is mandatory for eligible organisations and employees under applicable regulations.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-epf-faq="2">
                                    <span class="stepup-faq-question">Does the calculator provide exact returns?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="epf-faq-panel-2" hidden>
                                    No, it provides estimates based on current assumptions.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-epf-faq="3">
                                    <span class="stepup-faq-question">Can EPF be withdrawn before retirement?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="epf-faq-panel-3" hidden>
                                    Partial withdrawals are allowed under specific conditions such as medical needs or housing.
                                </div>

                                <button type="button" class="stepup-faq-row" aria-expanded="false" data-epf-faq="4">
                                    <span class="stepup-faq-question">Is EPF interest taxable?</span>
                                    <i data-lucide="chevron-down" class="stepup-faq-icon" aria-hidden="true"></i>
                                </button>
                                <div class="stepup-faq-panel" id="epf-faq-panel-4" hidden>
                                    Tax treatment depends on prevailing regulations and withdrawal conditions.
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
        (function () {
            'use strict';

            var EPF_RATE = <?php echo json_encode((float) $epfRatePercent); ?>;
            var RETIREMENT_AGE = <?php echo (int) $epfRetirementAge; ?>;
            var DEFAULT_OPEN_BALANCE = 0; // Groww style: no default opening balance
            var EMPLOYER_EPF_PERCENT = 12; // Groww uses employer 12%

            var MIN_SALARY = 1000;
            var MAX_SALARY = 500000;
            var SALARY_STEP = 500;
            var MIN_AGE = 18;
            var MAX_AGE = 58;
            var MIN_EMP_PCT = 8;
            var MAX_EMP_PCT = 20;
            var MIN_INCREMENT = 0;
            var MAX_INCREMENT = 25;

            var salaryRange = document.getElementById('epfSalaryRange');
            var salaryInput = document.getElementById('epfSalaryInput');
            var ageRange = document.getElementById('epfAgeRange');
            var ageInput = document.getElementById('epfAgeInput');
            var empPctRange = document.getElementById('epfEmpPctRange');
            var empPctInput = document.getElementById('epfEmpPctInput');
            var incrementRange = document.getElementById('epfIncrementRange');
            var incrementInput = document.getElementById('epfIncrementInput');
            var donutCenterValue = document.getElementById('epfDonutCenterValue');
            var epfDonutChart = null;

            var salaryField = salaryRange ? salaryRange.closest('.investment-slider-field') : null;
            var ageField = ageRange ? ageRange.closest('.investment-slider-field') : null;
            var empPctField = empPctRange ? empPctRange.closest('.investment-slider-field') : null;
            var incrementField = incrementRange ? incrementRange.closest('.investment-slider-field') : null;

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

            function snapSalary(v) {
                var step = SALARY_STEP > 0 ? SALARY_STEP : 500;
                return Math.round(Number(v) / step) * step;
            }

            function roundHalf(x) {
                return Math.round(Number(x) * 2) / 2;
            }

            function setSalaryError(on) {
                if (salaryField) salaryField.classList.toggle('is-error', !!on);
            }
            function setAgeError(on) {
                if (ageField) ageField.classList.toggle('is-error', !!on);
            }
            function setEmpPctError(on) {
                if (empPctField) empPctField.classList.toggle('is-error', !!on);
            }
            function setIncrementError(on) {
                if (incrementField) incrementField.classList.toggle('is-error', !!on);
            }

            function setRangeFill(rangeEl, value) {
                var min = Number(rangeEl.min);
                var max = Number(rangeEl.max);
                var percent = max === min ? 100 : ((value - min) / (max - min)) * 100;
                rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
            }

            function readSalary() {
                var raw = salaryInput ? String(salaryInput.value || '') : '';
                var digits = raw.replace(/[^\d]/g, '');
                if (digits) return clamp(snapSalary(Number(digits)), MIN_SALARY, MAX_SALARY);
                return clamp(snapSalary(Number(salaryRange.value)), MIN_SALARY, MAX_SALARY);
            }

            function readAge() {
                if (ageInput && String(ageInput.value || '').trim() !== '') {
                    var a = Math.round(Number(ageInput.value));
                    if (isFinite(a)) return clamp(a, MIN_AGE, MAX_AGE);
                }
                return clamp(Math.round(Number(ageRange.value)), MIN_AGE, MAX_AGE);
            }

            function readEmpPct() {
                return clamp(roundHalf(Number(empPctRange.value)), MIN_EMP_PCT, MAX_EMP_PCT);
            }

            function readIncrement() {
                return clamp(roundHalf(Number(incrementRange.value)), MIN_INCREMENT, MAX_INCREMENT);
            }

            function computeEPF() {
                if (typeof calcEPF !== 'function') {
                    return { maturityValue: 0 };
                }
                return calcEPF(
                    readSalary(),
                    readAge(),
                    RETIREMENT_AGE,
                    DEFAULT_OPEN_BALANCE,
                    readIncrement(),
                    EPF_RATE,
                    readEmpPct(),
                    EMPLOYER_EPF_PERCENT
                );
            }

            function ensureEpfDonutChart() {

                refreshAll();
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
    })();
    </script>

<?php
require_once '../../includes/footer.php';
?>
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
