<?php
/**
 * Margin Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Margin Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">Margin Calculator</h1>
                    <p class="calculator-page-description">Determine margin requirements for equity and derivative trading</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Margin Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Margin Calculator</strong> determines exact margin requirements for leveraged positions in equity, futures, and options. You don't need full capital � margin allows leverage � but understanding SPAN, exposure margin, and requirements is crucial.</p>
                                <p>This tool will integrate real-time exchange data for accurate SPAN margin, exposure margin, and total requirements based on volatility and exchange guidelines � helping optimize capital, avoid margin calls, and plan position sizing.</p>
                                <h3>How Margin Works</h3>
                                <ul>
                                    <li><strong>SPAN:</strong> Risk-based margin from exchange; worst-case scenario; varies with volatility and time to expiry.</li>
                                    <li><strong>Exposure:</strong> 3�5% buffer beyond SPAN for extreme price moves.</li>
                                    <li><strong>By segment:</strong> Delivery 20�100%; Intraday (MIS) 10�20% (5�10x leverage); Futures 10�30%; Options sell SPAN+Exposure; Options buy = full premium.</li>
                                    <li><strong>Leverage example:</strong> &#8377;1L margin: Delivery &#8377;1L shares; Intraday 5x &#8377;5L positions; Futures 5x &#8377;5L notional.</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>F&amp;O traders, intraday traders, swing traders, portfolio margin users, risk managers. Critical for understanding capital requirements and avoiding forced liquidations.</p>
                                <h3>Margin Risks &amp; Safety</h3>
                                <p>Leverage amplifies profits AND losses. Margin calls can force liquidation at unfavorable prices. Volatility spikes increase requirements. Never use 100% margin; keep 30�40% buffer. Understand peak margin rules.</p>
                                <div class="callout-box">
                                    <strong>Coming Soon:</strong> This calculator requires real-time integration with NSE SPAN Margin API, BSE Margin Calculator, and live volatility data. We're working on secure API integration for accurate calculations. Meanwhile, check your broker's margin calculator.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Margin Calculator</h2>
                            <div class="results-primary-card" style="text-align:center;padding:3rem;">
                                <span class="coming-soon-icon"><i data-lucide="wrench"></i></span>
                                <h3 style="color:var(--calc-primary-blue);margin:1rem 0;">Coming Soon</h3>
                                <p style="color:var(--calc-text-medium);">We're building real-time margin calculations. Check back soon or use our <a href="calculator-brokerage.php">Brokerage Calculator</a> for trading cost estimates.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>lucide.createIcons();</script>

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

