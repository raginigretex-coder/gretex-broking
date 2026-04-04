<?php
/**
 * Brokerage Calculator - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Brokerage Calculator - Gretex Financial';
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



    <main class="calculator-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="calculators.php" class="back-link"><i data-lucide="arrow-left"></i><span>Back to Calculators</span></a>
                    <h1 class="calculator-page-title">Brokerage Calculator</h1>
                    <p class="calculator-page-description">Calculate trading charges including brokerage, STT, GST and other fees</p>
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
                            <h2 class="calculator-info-title">About Brokerage Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Brokerage Calculator</strong> shows the full cost of buying and selling sharesï¿½brokerage, STT, exchange charges, GST, SEBI charges, stamp dutyï¿½and how they affect your net P&amp;L. Many traders overlook these charges, which can take a large share of gains.</p>
                                <p>Get a breakdown for NSE and BSE, breakeven price, and net profit/loss after all costs. Essential for day traders, swing traders, and long-term investors.</p>
                                <h3>How Brokerage Works</h3>
                                <ul>
                                    <li><strong>Brokerage:</strong> Discount brokers &#8377;10-&#8377;20 flat or 0.01-0.03%; full-service 0.25-0.50%. Charged on buy &amp; sell.</li>
                                    <li><strong>STT:</strong> Delivery 0.1% buy+sell; Intraday 0.025% sell only; Futures 0.01%; Options 0.05% on premium.</li>
                                    <li><strong>Exchange:</strong> NSE 0.00325%, BSE 0.003% of turnover.</li>
                                    <li><strong>GST:</strong> 18% on (Brokerage + Transaction Charges). SEBI: &#8377;10/crore. Stamp duty: 0.015% buy, 0.003% sell.</li>
                                </ul>
                                <h3>Benefits</h3>
                                <p>Full transparency, accurate breakeven, compare discount vs full-service. <strong>Cost-saving:</strong> Intraday has lower STT; large volumes reduce % impact of flat brokerage; delivery more cost-efficient for long-term; frequent trading multiplies costsï¿½trade selectively.</p>
                                <h3>Who Should Use</h3>
                                <p>Day traders, swing traders, delivery investors, broker comparison, F&amp;O traders, beginners. Critical for small capital, high-frequency traders, options buyers. <strong>Key insight:</strong> 1% price gain may become 0.5% profit after costs for delivery.</p>
                                <h3>Example</h3>
                                <p>Buy 100 @&#8377;500, sell @&#8377;520 (NSE, delivery, discount): Buy-side &#8377;83, sell-side &#8377;79, total &#8377;162. Gross &#8377;2,000 -> Net &#8377;1,838. Breakeven &#8377;501.62. Charges consumed 8.1% of profit. Intraday same trade: charges ~&#8377;124, net &#8377;1,876.</p>
                                <h3>FAQs</h3>
                                <div class="faq-item"><p class="faq-q">Why is profit less than price difference?</p><p>Trading charges (brokerage, STT, taxes) reduce gross profit. Always calculate net after all costs.</p></div>
                                <div class="faq-item"><p class="faq-q">Intraday or delivery cheaper?</p><p>Intraday has lower STT (0.025% vs 0.1%) but must close same day. For holdings &gt;1 day, delivery is more cost-effective.</p></div>
                                <div class="faq-item"><p class="faq-q">Charges on losing trades?</p><p>Yesï¿½all charges apply regardless of profit or loss. Even a losing trade incurs full brokerage, STT, and other costs.</p></div>
                                <div class="faq-item"><p class="faq-q">Minimum profit to breakeven?</p><p>Typically 0.3ï¿½0.5% for delivery, 0.5ï¿½0.8% for intraday (varies by broker and trade size). Use calculator for exact breakeven.</p></div>
                                <div class="faq-item"><p class="faq-q">Charges same for all stocks?</p><p>Percentage charges are same, but impact varies with stock price and liquidity. Low-priced stocks (&lt;&#8377;50) have higher % impact of fixed costs.</p></div>
                                <h3>Related Calculators</h3>
                                <ul class="related-calc-list">
                                    <li><a href="calculator-margin.php">Margin Calculator</a> - Margin for leveraged trading</li>
                                    <li><a href="calculator-mtf.php">MTF Calculator</a> - Margin trading facility costs</li>
                                    <li><a href="calculator-sip.php">SIP Calculator</a> - Compare trading returns with systematic investing</li>
                                    <li><a href="calculator-stcg.php">STCG Tax Calculator</a> - Tax on short-term trading profits</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Brokerage</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcBrokerageResult(event)">
                                <div class="calculator-field">
                                    <label for="br-buy">Buy Price (&#8377;)</label>
                                    <input type="number" id="br-buy" required min="1" value="100">
                                </div>
                                <div class="calculator-field">
                                    <label for="br-sell">Sell Price (&#8377;)</label>
                                    <input type="number" id="br-sell" required min="1" value="105">
                                </div>
                                <div class="calculator-field">
                                    <label for="br-qty">Quantity</label>
                                    <input type="number" id="br-qty" required min="1" value="100">
                                </div>
                                <div class="calculator-field">
                                    <label for="br-type">Brokerage Type</label>
                                    <select id="br-type">
                                        <option value="flat">Flat &#8377;20</option>
                                        <option value="percentage">0.03%</option>
                                    </select>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="resetBrokerageForm()"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                            <div id="brInlineWrap" class="calculator-inline-results is-hidden" aria-live="polite">
                                <div class="calculator-results-grid">
                                    <div id="brResultsContent"></div>
                                    <div class="calculator-results-chart">
                                        <h3 class="chart-section-title">Charge Breakdown</h3>
                                        <div id="brChart" style="height:220px"></div>
                                        <div class="breakeven-visual" id="brBreakeven">
                                            <strong>Breakeven Price: ?<span id="brBreakevenVal">0</span></strong>
                                            <p style="margin:0.5rem 0 0 0;font-size:0.875rem;color:#5a6c7d">Your Sell: ?<span id="brSellVal">0</span> ï¿½ <span id="brDiffText"></span></p>
                                        </div>
                                    </div>
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
        lucide.createIcons();
        let brChart=null;
        function resetBrokerageForm() {
            document.getElementById('calculatorForm').reset();
            const w = document.getElementById('brInlineWrap');
            if (w) w.classList.add('is-hidden');
            const c = document.getElementById('brResultsContent');
            if (c) c.innerHTML = '';
            if (brChart) { brChart.destroy(); brChart = null; }
        }
        function calcBrokerageResult(e){e.preventDefault();
            // Reset previous reading first - clear results and destroy chart before calculating
            const brResultsContent = document.getElementById('brResultsContent');
            if (brResultsContent) brResultsContent.innerHTML = '';
            if (brChart) { brChart.destroy(); brChart = null; }
            
            const buy=parseFloat(document.getElementById('br-buy').value);
            const sell=parseFloat(document.getElementById('br-sell').value);
            const qty=parseFloat(document.getElementById('br-qty').value);
            const type=document.getElementById('br-type').value;
            const r=calcBrokerage(buy,sell,qty,type,'NSE','equity');
            document.getElementById('brResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Turnover:</span><span class="result-value">${formatCurrency(r.turnover)}</span></div>
                    <div class="result-item"><span class="result-label">Brokerage:</span><span class="result-value">${formatCurrency(r.brokerage)}</span></div>
                    <div class="result-item"><span class="result-label">STT:</span><span class="result-value">${formatCurrency(r.stt)}</span></div>
                    <div class="result-item"><span class="result-label">GST:</span><span class="result-value">${formatCurrency(r.gst)}</span></div>
                    <div class="result-item"><span class="result-label">Stamp Duty:</span><span class="result-value">${formatCurrency(r.stampDuty)}</span></div>
                    <div class="result-item"><span class="result-label">Total Charges:</span><span class="result-value">${formatCurrency(r.totalCharges)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Net P&L:</span><span class="result-value">${formatCurrency(r.netPL)}</span></div>
                    <div class="result-item"><span class="result-label">Breakeven Price:</span><span class="result-value">${formatCurrency(r.breakevenPrice)}</span></div>
                </div>
            </div>`;
            document.getElementById('brBreakevenVal').textContent=Number(r.breakevenPrice).toFixed(2);
            document.getElementById('brSellVal').textContent=Number(sell).toLocaleString('en-IN');
            const diff=r.breakevenPrice?((sell-r.breakevenPrice)/r.breakevenPrice*100):0;
            document.getElementById('brDiffText').textContent=diff>=0?`+${diff.toFixed(2)}% above breakeven`:`${diff.toFixed(2)}% below breakeven`;
            if(brChart)brChart.destroy();
            const chargeLabels=[], chargeVals=[], chargeColors=[];
            if(r.brokerage>0){chargeLabels.push('Brokerage');chargeVals.push(r.brokerage);chargeColors.push('#1e5a7d');}
            if(r.stt>0){chargeLabels.push('STT');chargeVals.push(r.stt);chargeColors.push('#e74c3c');}
            if(r.transactionCharges>0){chargeLabels.push('Tx Charges');chargeVals.push(r.transactionCharges);chargeColors.push('#f4b942');}
            if(r.gst>0){chargeLabels.push('GST');chargeVals.push(r.gst);chargeColors.push('#9c27b0');}
            if(r.stampDuty>0){chargeLabels.push('Stamp Duty');chargeVals.push(r.stampDuty);chargeColors.push('#ff9800');}
            if(chargeVals.length===0) chargeVals.push(1);
            setTimeout(()=>{
                brChart=new ApexCharts(document.querySelector('#brChart'),{series:chargeVals,chart:{type:'donut',height:220},labels:chargeLabels.length?chargeLabels:['Charges'],colors:chargeColors.length?chargeColors:['#1e5a7d'],plotOptions:{pie:{donut:{labels:{show:true,value:{formatter:v=>formatCurrency(v)}}}}}});brChart.render();
            },50);
            document.getElementById('brInlineWrap').classList.remove('is-hidden');
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



