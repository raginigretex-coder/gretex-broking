<?php
/**
 * MTF Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'MTF Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">MTF Calculator</h1>
                    <p class="calculator-page-description">Margin Trading Facility - Leveraged investing with borrowed funds</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <?php require_once '../../includes/calculator-modern-ui.php'; ?>

                <div class="calculator-wrapper">
                    <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About MTF Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Margin Trading Facility (MTF) Calculator</strong> shows costs and returns of buying stocks with broker funding. MTF lets you leverage ï¿½ buy more than your capital ï¿½ but daily interest and amplified risk must be evaluated.</p>
                                <p>See margin required, amount borrowed, daily interest, and net returns after all costs. Essential for deciding if leveraged investing fits your situation.</p>
                                <h3>How MTF Works</h3>
                                <p>You provide 20ï¿½50% margin; broker lends 50ï¿½80%. Daily interest on borrowed amount (12ï¿½18% p.a.). Can hold days/weeks (not just intraday). Interest debited from trading account; compounds if unpaid.</p>
                                <p><strong>Example:</strong> &#8377;1L stock, 25% margin = &#8377;25K yours, &#8377;75K borrowed. At 15% p.a., daily interest ~&#8377;31. Sell: (Sale - Buy) - Interest - Charges = Net P&amp;L.</p>
                                <h3>Benefits &amp; Risks</h3>
                                <p>Leverage 2ï¿½4x; hold longer than intraday; no daily square-off; participate in medium-term moves. But interest eats profits daily; losses amplified; margin calls; forced liquidation risk.</p>
                                <h3>Who Should Use</h3>
                                <p>Suitable for experienced traders, high-conviction swing traders (5ï¿½30 days), those with insufficient capital. NOT for beginners, risk-averse investors, long-term buy-and-hold. Use only if: strong reason for trade, target achievable in 2ï¿½4 weeks, can afford to lose margin, stock liquid. Avoid speculative/penny stocks.</p>
                                <h3>Example</h3>
                                <p><strong>&#8377;2L stock, 25% margin (&#8377;50K yours), 20 days, 15% interest:</strong> Scenario A - Stock +10%: Net profit &#8377;18,367 (36.7% ROI on margin). Scenario B - Stock -5%: Net loss &#8377;11,633 (-23.3%). Scenario C - Stock flat: Net loss &#8377;1,633 (-3.3%). MTF amplifies: 3.67x profit, 4.66x loss vs no leverage.</p>
                                <div class="callout-box">
                                    <strong>Key insight:</strong> Even with no price change, you lose ~3.3% in 20 days from interest. Need ~0.8% price rise to breakeven.
                                </div>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">MTF vs intraday margin?</p><p>Intraday (MIS) must close same day; MTF holds weeks/months. MTF charges daily interest; intraday doesn't.</p></div>
                                <div class="faq-item"><p class="faq-q">Stock falls below margin?</p><p>Broker issues margin call ï¿½ add funds or positions auto-liquidated (often at loss).</p></div>
                                <div class="faq-item"><p class="faq-q">Convert MTF to delivery?</p><p>Yes ï¿½ pay borrowed amount + interest; shares transfer to demat.</p></div>
                                <div class="faq-item"><p class="faq-q">MTF interest tax deductible?</p><p>No ï¿½ not deductible from capital gains. Trading cost, doesn't reduce taxable gains.</p></div>
                                <div class="faq-item"><p class="faq-q">Which stocks for MTF?</p><p>Usually large-cap, liquid. Broker has approved list. Penny stocks, T2T generally not available.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-margin.php">Margin Calculator</a> - margin requirements</li>
                                    <li><a href="calculator-brokerage.php">Brokerage Calculator</a> - trading charges on MTF</li>
                                    <li><a href="calculator-stcg.php">STCG Calculator</a> - tax on MTF profits</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate MTF</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcMTFResult(event)">
                                <div class="calculator-field">
                                    <label for="mtf-value">Stock Purchase Value (&#8377;)</label>
                                    <input type="number" id="mtf-value" required min="10000" value="100000">
                                </div>
                                <div class="calculator-field">
                                    <label for="mtf-margin">Your Margin (%)</label>
                                    <input type="number" id="mtf-margin" required min="25" max="80" value="50">
                                    <small class="field-hint">Typically 25-50%</small>
                                </div>
                                <div class="calculator-field">
                                    <label for="mtf-days">Holding Period (Days)</label>
                                    <input type="number" id="mtf-days" required min="1" max="365" value="30">
                                </div>
                                <div class="calculator-field">
                                    <label for="mtf-rate">MTF Interest Rate (% p.a.)</label>
                                    <input type="number" id="mtf-rate" value="15" min="12" max="18" step="0.5">
                                </div>
                                <div class="calculator-field">
                                    <label for="mtf-change">Expected Price Change (%)</label>
                                    <input type="number" id="mtf-change" value="5" step="0.5" placeholder="+5 or -5">
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();var w=document.getElementById('mtfInlineWrap');if(w)w.classList.add('is-hidden');var c=document.getElementById('mtfResultsContent');if(c)c.innerHTML='';"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                            <div id="mtfInlineWrap" class="calculator-inline-results is-hidden" aria-live="polite">
                                <div id="mtfResultsContent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();
        function calcMTFResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const mtfResultsContent = document.getElementById('mtfResultsContent');
            if (mtfResultsContent) mtfResultsContent.innerHTML = '';
            
            const value=parseFloat(document.getElementById('mtf-value').value);
            const margin=parseFloat(document.getElementById('mtf-margin').value);
            const days=parseFloat(document.getElementById('mtf-days').value);
            const rate=parseFloat(document.getElementById('mtf-rate').value)||15;
            const change=parseFloat(document.getElementById('mtf-change').value)||0;
            const r=calcMTF(value,margin,days,rate,change);
            document.getElementById('mtfResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Your Margin:</span><span class="result-value">${formatCurrency(r.yourMargin)}</span></div>
                    <div class="result-item"><span class="result-label">Borrowed Amount:</span><span class="result-value">${formatCurrency(r.borrowedAmount)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Charges:</span><span class="result-value">${formatCurrency(r.interestCharges)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Expected P&L:</span><span class="result-value">${formatCurrency(r.expectedProfit)}</span></div>
                    <div class="result-item"><span class="result-label">Net ROI (on margin):</span><span class="result-value">${r.netROI.toFixed(2)}%</span></div>
                    <div class="result-item"><span class="result-label">Breakeven Price Change:</span><span class="result-value">${r.breakevenPriceChange.toFixed(2)}%</span></div>
                </div>
            </div>`;
            document.getElementById('mtfInlineWrap').classList.remove('is-hidden');
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



