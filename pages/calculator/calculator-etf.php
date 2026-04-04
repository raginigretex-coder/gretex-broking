<?php
/**
 * ETF Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'ETF Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">ETF Calculator</h1>
                    <p class="calculator-page-description">Exchange Traded Fund - Index investing with low expense ratios</p>
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
                            <h2 class="calculator-info-title">About ETF Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>ETF (Exchange Traded Fund) Calculator</strong> evaluates returns from passive index investingï¿½a low-cost, transparent alternative to mutual funds. ETFs combine diversification with stock-like flexibility, tracking Nifty 50, Sensex, Gold, or international indices.</p>
                                <p>This calculator factors in ultra-low expense ratios (0.05ï¿½0.5%), trading charges, and tax treatment for accurate net returns. Essential for index investors and cost-conscious long-term wealth builders.</p>
                                <h3>How ETFs Work</h3>
                                <p><strong>Basics:</strong> Tracks index; trades like stocks on exchange; need demat; real-time pricing. <strong>Types:</strong> Equity (Nifty, Sensex), Gold, International, Debt, Sectoral. <strong>Costs:</strong> Expense ratio 0.05ï¿½0.5%; brokerage + STT like stocks; no entry/exit load. Net return = Market return - Expense - Trading costs - Tracking error.</p>
                                <h3>Benefits</h3>
                                <ul>
                                    <li>Ultra-low costs: 5ï¿½10x lower than active MFs; transparency; liquidity (buy/sell anytime)</li>
                                    <li>No fund manager risk; tax-efficient; diverse access (indices, gold, international)</li>
                                    <li>Cost comparison: Over 20yr on &#8377;10L ETF saves ~&#8377;45L vs Active MF, ~&#8377;15L vs Index MF</li>
                                </ul>
                                <p><strong>Tax:</strong> Equity ETFs: &lt;12mo STCG 20%; &gt;12mo LTCG 12.5% (above &#8377;1.25L).</p>
                                <h3>Who Should Use</h3>
                                <p>Index enthusiasts, cost-conscious investors, long-term builders (15+yr), DIY investors with demat. Perfect if: believe market is hard to beat, want minimal cost. NOT if: no demat, want hands-off (MF SIP easier), seeking to beat market.</p>
                                <h3>Important Considerations</h3>
                                <p>Requires demat; trading charges each buy/sell; no auto-SIP; bid-ask spread; tracking error (choose &lt;0.15%). Use limit orders; focus on liquid ETFs (high AUM, &gt;10K daily volume). <strong>Optimal:</strong> Large amounts -> ETF; small SIP (&lt;&#8377;5K) -> Index MF.</p>
                                <h3>Example</h3>
                                <p>&#8377;10L Nifty ETF, 0.1% expense, 12% index return, 10yr: Value ~&#8377;30.8L. Post LTCG tax (~&#8377;2.4L): ~&#8377;28.2L. vs Active MF (14% gross, 2% expense): barely better; 70% of active funds fail to beat index.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">ETF vs Index MF?</p><p>ETF: exchange-traded, real-time, lower expense, demat, brokerage. Index MF: AMC direct, single NAV, no demat, auto-SIP. Small SIP ? MF; large lump sum ? ETF.</p></div>
                                <div class="faq-item"><p class="faq-q">SIP in ETFs?</p><p>No automaticï¿½manually buy monthly (self-discipline SIP) or invest quarterly to reduce brokerage.</p></div>
                                <div class="faq-item"><p class="faq-q">Which ETF for beginners?</p><p>Nifty 50 (large-cap), Nifty Next 50 (mid-cap), Gold. Avoid sectoral, low-liquidity, newly launched.</p></div>
                                <div class="faq-item"><p class="faq-q">Tracking error?</p><p>Difference between ETF and index return. Good: &lt;0.15%. Caused by expense, cash drag, rebalancing.</p></div>
                                <div class="faq-item"><p class="faq-q">ETFs safe?</p><p>Yesï¿½SEBI regulated, actual underlying stocks, transparent. Market risk (index falls); liquidity risk in some ETFs.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - Manual SIP strategy for ETF</li>
                                    <li><a href="calculator-lumpsum.php">Lumpsum Calculator</a> - One-time ETF investment</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - Track ETF vs index performance</li>
                                    <li><a href="calculator-brokerage.php">Brokerage Calculator</a> - ETF trading costs</li>
                                    <li><a href="calculator-stcg.php">STCG/LTCG Tax Calculator</a> - Tax on ETF redemption</li>
                                    <li><a href="calculator-mutual-fund.php">Mutual Fund Calculator</a> - Compare ETF vs active funds</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate ETF Returns</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcETFResult(event)">
                                <div class="calculator-field">
                                    <label for="etf-type">Investment Type</label>
                                    <select id="etf-type">
                                        <option value="lumpsum">Lumpsum</option>
                                        <option value="sip">SIP</option>
                                    </select>
                                </div>
                                <div class="calculator-field">
                                    <label for="etf-amount">Amount (&#8377;)</label>
                                    <input type="number" id="etf-amount" required min="1000" value="100000">
                                </div>
                                <div class="calculator-field">
                                    <label for="etf-period">Period (Years)</label>
                                    <input type="number" id="etf-period" required min="1" max="30" value="10">
                                </div>
                                <div class="calculator-field">
                                    <label for="etf-rate">Expected Return (%)</label>
                                    <input type="number" id="etf-rate" value="11" min="8" max="15">
                                </div>
                                <div class="calculator-field">
                                    <label for="etf-er">Expense Ratio (%)</label>
                                    <input type="number" id="etf-er" value="0.1" min="0.05" max="0.5" step="0.05">
                                </div>
                                <div class="calculator-field">
                                    <label><input type="checkbox" id="etf-trading" checked> Include Trading Costs</label>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();var w=document.getElementById('etfInlineWrap');if(w)w.classList.add('is-hidden');var c=document.getElementById('etfResultsContent');if(c)c.innerHTML='';"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                            <div id="etfInlineWrap" class="calculator-inline-results is-hidden" aria-live="polite">
                                <div id="etfResultsContent"></div>
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
        function calcETFResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const etfResultsContent = document.getElementById('etfResultsContent');
            if (etfResultsContent) etfResultsContent.innerHTML = '';
            
            const type=document.getElementById('etf-type').value;
            const amt=parseFloat(document.getElementById('etf-amount').value);
            const period=parseFloat(document.getElementById('etf-period').value);
            const rate=parseFloat(document.getElementById('etf-rate').value)||11;
            const er=parseFloat(document.getElementById('etf-er').value)||0.1;
            const trading=document.getElementById('etf-trading').checked;
            const r=calcETF(type,amt,period,rate,er,trading);
            document.getElementById('etfResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Total Investment:</span><span class="result-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="result-item"><span class="result-label">Gross Returns:</span><span class="result-value">${formatCurrency(r.grossReturns)}</span></div>
                    <div class="result-item"><span class="result-label">Expense Impact:</span><span class="result-value">${formatCurrency(r.expenseImpact)}</span></div>
                    <div class="result-item"><span class="result-label">Trading Costs:</span><span class="result-value">${formatCurrency(r.tradingCosts)}</span></div>
                    <div class="result-item"><span class="result-label">LTCG Tax:</span><span class="result-value">${formatCurrency(r.ltcgTax)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Net Returns:</span><span class="result-value">${formatCurrency(r.netReturns)}</span></div>
                    <div class="result-item"><span class="result-label">Effective CAGR:</span><span class="result-value">${r.effectiveCAGR.toFixed(2)}%</span></div>
                </div>
            </div>`;
            document.getElementById('etfInlineWrap').classList.remove('is-hidden');
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



