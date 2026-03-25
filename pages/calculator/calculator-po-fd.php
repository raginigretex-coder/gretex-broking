<?php
/**
 * Post Office FD Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Post Office FD Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Post Office FD Calculator</h1>
                    <p class="calculator-page-description">Government-backed fixed deposit with quarterly compounding</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Post Office FD</h2>
                            <div class="calculator-info-content">
                                <p>100% safe, government-backed. Tenures: 1yr (6.9%), 2yr (7%), 3yr (7.1%), 5yr (7.5%). Quarterly compounding.</p>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Post Office FD</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcPOFDResult(event)">
                                <div class="calculator-field">
                                    <label for="pofd-amount">Deposit Amount (&#8377;)</label>
                                    <input type="number" id="pofd-amount" required min="1000" max="900000" value="100000">
                                </div>
                                <div class="calculator-field">
                                    <label for="pofd-tenure">Tenure</label>
                                    <select id="pofd-tenure">
                                        <option value="1">1 Year (6.9%)</option>
                                        <option value="2">2 Years (7.0%)</option>
                                        <option value="3">3 Years (7.1%)</option>
                                        <option value="5" selected>5 Years (7.5%)</option>
                                    </select>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();document.getElementById('pofdResults').style.display='none';document.getElementById('pofdResults').setAttribute('aria-hidden','true')"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="calculator-results-section results-only" id="pofdResults" aria-hidden="true">
                    <div class="calculator-results-wrapper">
                        <h2 class="calculator-section-title">Post Office FD Results</h2>
                        <div id="pofdResultsContent"></div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        function calcPOFDResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const pofdResultsContent = document.getElementById('pofdResultsContent');
            if (pofdResultsContent) pofdResultsContent.innerHTML = '';
            
            const amt=parseFloat(document.getElementById('pofd-amount').value);
            const tenure=parseInt(document.getElementById('pofd-tenure').value);
            const r=calcPOFD(amt,tenure);
            document.getElementById('pofdResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Principal:</span><span class="result-value">${formatCurrency(r.principal)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Rate:</span><span class="result-value">${r.interestRate}%</span></div>
                    <div class="result-item"><span class="result-label">Interest Earned:</span><span class="result-value">${formatCurrency(r.interestEarned)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Maturity Amount:</span><span class="result-value">${formatCurrency(r.maturityAmount)}</span></div>
                </div>
            </div>`;
            document.getElementById('pofdResults').style.display='block';document.getElementById('pofdResults').setAttribute('aria-hidden','false');document.getElementById('pofdResults').scrollIntoView({behavior:'smooth',block:'start'});
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

