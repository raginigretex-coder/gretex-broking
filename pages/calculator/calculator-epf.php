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
                // Donut chart removed intentionally; no rendering required.
            }

            function updateEpfDonutChart(contributions, interest, animate) {
                // Donut chart removed intentionally; no update required.
            }

            function refreshAll() {
                var r = computeEPF();
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(r.maturityValue);
            }

            function bindPercentPair(rangeEl, inputEl, minV, maxV, setErr) {
                rangeEl.addEventListener('input', function () {
                    var v = clamp(roundHalf(Number(rangeEl.value)), minV, maxV);
                    rangeEl.value = v;
                    inputEl.value = v;
                    setErr(false);
                    setRangeFill(rangeEl, v);
                    refreshAll();
                });
                rangeEl.addEventListener('change', function () {
                    setErr(false);
                    refreshAll();
                });
                inputEl.addEventListener('input', function () {
                    var raw = String(inputEl.value || '');
                    if (raw.trim() === '') {
                        setErr(true);
                        return;
                    }
                    var v = roundHalf(Number(inputEl.value));
                    if (!isFinite(v)) {
                        setErr(true);
                        return;
                    }
                    var invalid = v < minV || v > maxV;
                    setErr(invalid);
                    var c = clamp(v, minV, maxV);
                    rangeEl.value = c;
                    setRangeFill(rangeEl, c);
                    if (!invalid) refreshAll();
                });
                inputEl.addEventListener('change', function () {
                    var raw = String(inputEl.value || '');
                    var v = raw.trim() === '' ? minV : roundHalf(Number(raw));
                    var safe = isFinite(v) ? v : minV;
                    var c = clamp(safe, minV, maxV);
                    rangeEl.value = c;
                    inputEl.value = c;
                    setErr(false);
                    setRangeFill(rangeEl, c);
                    refreshAll();
                });
            }

            function bindWhenReady() {
                if (document.body.dataset.epfModernBound === '1') return true;
                if (typeof calcEPF !== 'function' || !salaryRange || !salaryInput || !ageRange || !ageInput) return false;

                document.body.dataset.epfModernBound = '1';

                salaryRange.addEventListener('input', function () {
                    var v = clamp(snapSalary(Number(salaryRange.value)), MIN_SALARY, MAX_SALARY);
                    salaryRange.value = v;
                    salaryInput.value = formatINRDigits(v);
                    setSalaryError(false);
                    setRangeFill(salaryRange, v);
                    refreshAll();
                });
                salaryRange.addEventListener('change', function () {
                    setSalaryError(false);
                    refreshAll();
                });

                salaryInput.addEventListener('input', function () {
                    var raw = String(salaryInput.value || '');
                    var digits = raw.replace(/[^\d]/g, '');
                    if (!digits) {
                        setSalaryError(raw.trim() !== '');
                        return;
                    }
                    var v = Number(digits);
                    var invalid = v < MIN_SALARY || v > MAX_SALARY;
                    setSalaryError(invalid);
                    var clamped = clamp(snapSalary(v), MIN_SALARY, MAX_SALARY);
                    salaryRange.value = clamped;
                    setRangeFill(salaryRange, clamped);
                    salaryInput.value = formatINRDigits(v);
                    if (!invalid) refreshAll();
                });
                salaryInput.addEventListener('change', function () {
                    var raw = String(salaryInput.value || '');
                    var digits = raw.replace(/[^\d]/g, '');
                    var v = digits ? Number(digits) : MIN_SALARY;
                    var clamped = clamp(snapSalary(v), MIN_SALARY, MAX_SALARY);
                    salaryRange.value = clamped;
                    salaryInput.value = formatINRDigits(clamped);
                    setSalaryError(false);
                    setRangeFill(salaryRange, clamped);
                    refreshAll();
                });

                ageRange.addEventListener('input', function () {
                    var v = clamp(Math.round(Number(ageRange.value)), MIN_AGE, MAX_AGE);
                    ageRange.value = v;
                    ageInput.value = v;
                    setAgeError(false);
                    setRangeFill(ageRange, v);
                    refreshAll();
                });
                ageRange.addEventListener('change', function () {
                    setAgeError(false);
                    refreshAll();
                });

                ageInput.addEventListener('input', function () {
                    var raw = String(ageInput.value || '');
                    if (raw.trim() === '') {
                        setAgeError(true);
                        return;
                    }
                    var v = Math.round(Number(ageInput.value));
                    if (!isFinite(v)) {
                        setAgeError(true);
                        return;
                    }
                    var invalid = v < MIN_AGE || v > MAX_AGE;
                    setAgeError(invalid);
                    var c = clamp(v, MIN_AGE, MAX_AGE);
                    ageRange.value = c;
                    setRangeFill(ageRange, c);
                    if (!invalid) refreshAll();
                });
                ageInput.addEventListener('change', function () {
                    var raw = String(ageInput.value || '');
                    var v = raw.trim() === '' ? MIN_AGE : Math.round(Number(raw));
                    var safe = isFinite(v) ? v : MIN_AGE;
                    var c = clamp(safe, MIN_AGE, MAX_AGE);
                    ageRange.value = c;
                    ageInput.value = c;
                    setAgeError(false);
                    setRangeFill(ageRange, c);
                    refreshAll();
                });

                bindPercentPair(empPctRange, empPctInput, MIN_EMP_PCT, MAX_EMP_PCT, setEmpPctError);
                bindPercentPair(incrementRange, incrementInput, MIN_INCREMENT, MAX_INCREMENT, setIncrementError);

                setRangeFill(salaryRange, readSalary());
                salaryInput.value = formatINRDigits(readSalary());
                setRangeFill(ageRange, readAge());
                ageInput.value = readAge();
                setRangeFill(empPctRange, readEmpPct());
                empPctInput.value = readEmpPct();
                setRangeFill(incrementRange, readIncrement());
                incrementInput.value = readIncrement();

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
