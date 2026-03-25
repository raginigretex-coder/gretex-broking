<?php
/**
 * Post Office RD Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Post Office RD Calculator - Gretex Financial';
$additionalCSS = [
    '../../css/calculator-page.css',
    '../../css/chatbot.css',
];

// Include header
require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
?>



    <main class="calculator-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link"><i data-lucide="arrow-left"></i><span>Back to Calculators</span></a>
                    <h1 class="calculator-page-title">Post Office RD Calculator</h1>
                    <p class="calculator-page-description">5-year recurring deposit at 6.7% p.a. (Govt. rate)</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Post Office RD</h2>
                            <div class="calculator-info-content">
                                <p>5-year tenure, 6.7% p.a. Min &#8377;100/month. Government scheme.</p>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Post Office RD</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcPORDResult(event)">
                                <div class="calculator-field">
                                    <label for="pord-deposit">Monthly Deposit (&#8377;)</label>
                                    <input type="number" id="pord-deposit" required min="100" value="5000">
                                    <small class="field-hint">5-year tenure, 6.7% fixed</small>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('pordResults').style.display='none';document.getElementById('pordResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section results-only" id="pordResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">Post Office RD Results</h2>
                        <div id="pordResultsContent"></div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        function calcPORDResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const pordResultsContent = document.getElementById('pordResultsContent');
            if (pordResultsContent) pordResultsContent.innerHTML = '';
            
            const dep=parseFloat(document.getElementById('pord-deposit').value);
            const r=calcPORD(dep);
            document.getElementById('pordResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Total Investment (60 months):</span><span class="result-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Earned:</span><span class="result-value">${formatCurrency(r.interestEarned)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Maturity Value:</span><span class="result-value">${formatCurrency(r.maturityValue)}</span></div>
                </div>
            </div>`;
            document.getElementById('pordResults').style.display='block';document.getElementById('pordResults').setAttribute('aria-hidden','false');document.getElementById('pordResults').scrollIntoView({behavior:'smooth',block:'start'});
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

