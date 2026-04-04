<?php
/**
 * STCG Tax Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'STCG Tax Calculator - Gretex Financial';
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
                    <h1 class="calculator-page-title">STCG Tax Calculator</h1>
                    <p class="calculator-page-description">Short Term Capital Gains - Tax on investments held &lt; 12 months (equity)</p>
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
                            <h2 class="calculator-info-title">About STCG Tax Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>STCG (Short-Term Capital Gains) Tax Calculator</strong> computes tax on profits from selling shares, mutual funds, or securities held under 12 months (equity) or 36 months (debt). STCG is taxed higher than long-term ï¿½ 20% for equity, slab rate for debt ï¿½ significantly impacting net returns.</p>
                                <p>Get a complete breakdown of capital gains, applicable tax, and net profit after taxes. Essential for deciding when to book profits, whether to hold for LTCG, and structuring trading strategy for post-tax returns.</p>
                                <h3>How STCG Works</h3>
                                <p><strong>Holding period:</strong> Equity: &lt;12mo = STCG, &gt;12mo = LTCG. Debt: &lt;36mo = STCG, &gt;36mo = LTCG. <strong>Rates:</strong> Equity STCG: flat 20%. Debt STCG: slab rate (5/20/30%). <strong>Formula:</strong> Sale - Purchase - Transaction costs = STCG. Equity tax = STCG ï¿½ 20%.</p>
                                <p><strong>Critical:</strong> Even 1 day short of 12 months = STCG. Bought 15-Jan-24, sell 15-Jan-25 = STCG; 16-Jan-25 = LTCG.</p>
                                <h3>Benefits</h3>
                                <p>Accurate tax liability; net profit after taxes; sell-now vs hold-for-LTCG decision support; transaction cost inclusion; year-end tax planning; tax loss harvesting (offset gains with losses).</p>
                                <h3>Who Should Use</h3>
                                <p>Active traders, swing traders, MF investors redeeming &lt;1yr, F&amp;O traders (all short-term), anyone selling equity within 12mo. Critical: "Should I sell at 11 months or hold 2 more for LTCG?"</p>
                                <h3>Tax Loss Harvesting</h3>
                                <p>Sell losing stocks to book loss; offset against gains; carry forward 8 years (file ITR). Example: Gain &#8377;1L, Loss &#8377;30K - net taxable &#8377;70K; tax saved &#8377;6K.</p>
                                <h3>Example</h3>
                                <p><strong>Stock:</strong> 500 shares &#8377;800 to &#8377;1,050 in 8mo. STCG &#8377;1.24L, tax &#8377;24.9K, net &#8377;99.6K. <strong>STCG vs LTCG:</strong> &#8377;75K gain at 11mo-sell now tax &#8377;15K; hold 2mo tax &#8377;0 (under &#8377;1.25L). Hold if outlook positive. <strong>F&amp;O:</strong> Treated as business income (slab), not capital gains.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">STCG vs income tax?</p><p>Income tax on salary/business at slab. Equity STCG: flat 20% separate. Salary &#8377;10L + STCG &#8377;2L: salary as slab + &#8377;40K STCG tax.</p></div>
                                <div class="faq-item"><p class="faq-q">Prove holding period?</p><p>Contract notes, bank statements, demat statements, broker P&amp;L. Date of purchase to date of sale.</p></div>
                                <div class="faq-item"><p class="faq-q">Set off STCG loss?</p><p>Equity STCG loss: offset against equity LTCG/STCG only, not salary. Debt STCG loss: offset any capital gains. Carry forward 8yr.</p></div>
                                <div class="faq-item"><p class="faq-q">Intraday tax?</p><p>Business income (slab), not capital gains. Different rules. May be preferable in lower bracket.</p></div>
                                <div class="faq-item"><p class="faq-q">Sell before 1yr or hold for LTCG?</p><p>Calculate tax difference. &#8377;50K gain: sell now = &#8377;10K tax; hold 2mo = &#8377;0. Hold if confident; don't let tax tail wag dog.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-brokerage.php">Brokerage Calculator</a> - transaction costs reduce gains</li>
                                    <li><a href="calculator-cagr.php">CAGR Calculator</a> - returns vs STCG tax</li>
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - lump sum vs SIP for LTCG</li>
                                    <li><a href="calculator-mutual-fund.php">Mutual Fund Calculator</a> - fund returns</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate STCG Tax</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcSTCGResult(event)">
                                <div class="calculator-field">
                                    <label for="stcg-asset">Asset Type</label>
                                    <select id="stcg-asset">
                                        <option value="equity">Equity</option>
                                        <option value="debt">Debt</option>
                                    </select>
                                </div>
                                <div class="calculator-field">
                                    <label for="stcg-buy">Purchase Price (&#8377;)</label>
                                    <input type="number" id="stcg-buy" required min="10000" value="100000">
                                </div>
                                <div class="calculator-field">
                                    <label for="stcg-sell">Selling Price (&#8377;)</label>
                                    <input type="number" id="stcg-sell" required min="10000" value="120000">
                                </div>
                                <div class="calculator-field">
                                    <label for="stcg-months">Holding Period (Months)</label>
                                    <input type="number" id="stcg-months" value="6" min="1" max="36">
                                    <small class="field-hint">Equity: &lt;12 = STCG. Debt: &lt;36 = STCG</small>
                                </div>
                                <div class="calculator-field">
                                    <label for="stcg-cost">Transaction Costs (&#8377;)</label>
                                    <input type="number" id="stcg-cost" value="0" min="0">
                                </div>
                                <div class="calculator-field">
                                    <label for="stcg-slab">Tax Slab % (for debt)</label>
                                    <select id="stcg-slab">
                                        <option value="5">5%</option>
                                        <option value="20">20%</option>
                                        <option value="30" selected>30%</option>
                                    </select>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();var w=document.getElementById('stcgInlineWrap');if(w)w.classList.add('is-hidden');var c=document.getElementById('stcgResultsContent');if(c)c.innerHTML='';"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                            <div id="stcgInlineWrap" class="calculator-inline-results is-hidden" aria-live="polite">
                                <div id="stcgResultsContent"></div>
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
        function calcSTCGResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const stcgResultsContent = document.getElementById('stcgResultsContent');
            if (stcgResultsContent) stcgResultsContent.innerHTML = '';
            
            const asset=document.getElementById('stcg-asset').value;
            const buy=parseFloat(document.getElementById('stcg-buy').value);
            const sell=parseFloat(document.getElementById('stcg-sell').value);
            const months=parseFloat(document.getElementById('stcg-months').value)||6;
            const cost=parseFloat(document.getElementById('stcg-cost').value)||0;
            const slab=parseFloat(document.getElementById('stcg-slab').value)||30;
            const r=calcSTCG(asset,buy,sell,months,null,cost,slab);
            document.getElementById('stcgResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Capital Gains (Gross):</span><span class="result-value">${formatCurrency(r.capitalGains)}</span></div>
                    <div class="result-item"><span class="result-label">STCG Tax:</span><span class="result-value">${formatCurrency(r.stcgTax)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Net Gain:</span><span class="result-value">${formatCurrency(r.netGain)}</span></div>
                    <div class="result-item"><span class="result-label">Effective Return:</span><span class="result-value">${r.effectiveReturn.toFixed(2)}%</span></div>
                </div>
            </div>`;
            document.getElementById('stcgInlineWrap').classList.remove('is-hidden');
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



