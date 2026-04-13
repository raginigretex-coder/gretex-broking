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


            <div class="calculator-wrapper">
                <aside class="calculator-sidebar" id="calculatorSidebar"></aside>
                <div class="calculator-info-section">
                    <div class="calculator-info-card">

                        <h3 class="calculator-info-title">Brokerage Calculator</h3>
                        <div class="calculator-info-content">
                            <p>A Brokerage Calculator is an essential financial tool that helps investors and traders estimate the total cost of executing a trade in the stock market.</p>
                            <p>It provides a complete breakdown of brokerage fees, government taxes, and exchange charges, enabling users to understand the actual profit or loss before placing a trade.</p>
                        </div>

                        <h3 class="calculator-info-title">What is a Brokerage Calculator?</h3>
                        <div class="calculator-info-content">
                            <p>A Brokerage Calculator is an online utility designed to calculate all charges associated with buying and selling securities such as stocks, derivatives, or commodities.</p>
                            <p>By entering:</p>
                            <ul style="margin-left: 14px;">
                                <li>Buy price and sell price</li>
                                <li>Quantity of shares or contracts</li>
                                <li>Trade type (Intraday, Delivery, Futures, Options)</li>
                            </ul>
                            <p>the calculator automatically computes:</p>
                            <ul style="margin-left: 14px;">
                                <li>Brokerage fees</li>
                                <li>Securities Transaction Tax (STT)</li>
                                <li>Exchange transaction charges</li>
                                <li>Goods and Services Tax (GST)</li>
                                <li>Stamp duty</li>
                                <li>SEBI charges</li>
                                <li>Net profit or loss</li>
                            </ul>
                            <p>This ensures complete transparency in trading costs.</p>
                        </div>

                        <h3 class="calculator-info-title">Purpose and Use of a Brokerage Calculator</h3>
                        <div class="calculator-info-content">
                            <p>The primary purpose of a brokerage calculator is to help traders make informed financial decisions by understanding the exact cost of a trade.</p>
                            <p>It can be used to:</p>
                            <ul style="margin-left: 14px;">
                                <li>Estimate total transaction charges before executing a trade</li>
                                <li>Calculate net profit or loss accurately</li>
                                <li>Compare brokerage structures across different brokers</li>
                                <li>Optimize trading strategies by reducing unnecessary costs</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">How Does a Brokerage Calculator Work?</h3>
                        <div class="calculator-info-content">
                            <p>The calculator applies predefined brokerage rates and statutory charges based on the selected trade type and market segment.</p>
                            <p>It calculates the total turnover (buy + sell value) and applies all applicable fees. These charges are then deducted from the gross profit to determine the final net result.</p>
                            <p>This automated approach eliminates manual errors and ensures precise calculations within seconds.</p>
                        </div>

                        <h3 class="calculator-info-title">Brokerage Calculation Formula</h3>
                        <div class="calculator-info-content">
                            <p>The brokerage is generally calculated as:</p>
                            <p style="font-family:'Times New Roman', serif; font-size:20px; font-weight:bold; color:black; margin-left: 20px;">
                                Brokerage = Trade Value × Brokerage Rate
                            </p>

                            <p style="margin-top: 20px;"><strong>Where:</strong></p>
                            <ul style="margin-left: 14px;">
                                <li><strong>Trade Value</strong> = Price × Quantity</li>
                                <li><strong>Brokerage Rate</strong> = Percentage or fixed fee charged by the broker</li>
                            </ul>

                            <p><strong>Example</strong></p>
                            <ul style="margin-left: 14px;">
                                <li>Buy Price: &#8377;100</li>
                                <li>Sell Price: &#8377;120</li>
                                <li>Quantity: 100 shares</li>
                                <li>Brokerage: 0.5%</li>
                            </ul>
                            <p>The calculator evaluates total turnover, applies all charges, and provides the final net profit after deductions.</p>
                        </div>

                        <h3 class="calculator-info-title">How to Use the Brokerage Calculator</h3>
                        <div class="calculator-info-content">
                            <p>Follow these simple steps to calculate brokerage and returns:</p>
                            <ol>
                                <li>Enter the buy price and sell price</li>
                                <li>Enter the quantity of shares or contracts</li>
                                <li>Select the appropriate trade type</li>
                                <li>View the results, including:
                                    <ul>
                                        <li>Total brokerage and charges</li>
                                        <li>Net profit or loss</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <h3 class="calculator-info-title">How the Calculator Assists Traders</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Provides complete transparency in trading costs</li>
                                <li>Helps avoid hidden or unexpected charges</li>
                                <li>Supports better decision-making and trade planning</li>
                                <li>Improves profitability by highlighting cost impact</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Characteristics</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Includes all statutory and regulatory charges</li>
                                <li>Supports multiple trading segments (Equity, F&O, Intraday)</li>
                                <li>Delivers instant and accurate results</li>
                                <li>Suitable for both beginners and experienced traders</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">Key Considerations</h3>
                        <div class="calculator-info-content">
                            <ul style="margin-left: 14px;">
                                <li>Brokerage rates vary across brokers and plans</li>
                                <li>Charges differ based on trade type and segment</li>
                                <li>Taxes and regulatory fees are subject to change</li>
                                <li>Results are indicative and may slightly vary in actual trades</li>
                            </ul>
                        </div>

                        <h3 class="calculator-info-title">FAQs</h3>
                        <div class="stepup-faq-accordion" aria-label="Brokerage calculator frequently asked questions">

                            <button type="button" class="stepup-faq-row" aria-expanded="false">
                                <span class="stepup-faq-question">What is brokerage in trading?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon"></i>
                            </button>
                            <div class="stepup-faq-panel" hidden>
                                Brokerage is the fee charged by a broker for executing buy and sell orders in the market.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false">
                                <span class="stepup-faq-question">Does brokerage differ by trade type?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon"></i>
                            </button>
                            <div class="stepup-faq-panel" hidden>
                                Yes, brokerage and charges vary for Intraday, Delivery, Futures, and Options trades.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false">
                                <span class="stepup-faq-question">Can I calculate profit using this calculator?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon"></i>
                            </button>
                            <div class="stepup-faq-panel" hidden>
                                Yes, it calculates net profit or loss after deducting all applicable charges.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false">
                                <span class="stepup-faq-question">Are taxes included in the calculation?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon"></i>
                            </button>
                            <div class="stepup-faq-panel" hidden>
                                Yes, it includes STT, GST, SEBI charges, stamp duty, and exchange charges.
                            </div>

                            <button type="button" class="stepup-faq-row" aria-expanded="false">
                                <span class="stepup-faq-question">Is the brokerage calculator accurate?</span>
                                <i data-lucide="chevron-down" class="stepup-faq-icon"></i>
                            </button>
                            <div class="stepup-faq-panel" hidden>
                                It provides highly accurate estimates based on current rates, but actual charges may vary slightly.
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
    let brChart = null;

    function resetBrokerageForm() {
        document.getElementById('calculatorForm').reset();
        const w = document.getElementById('brInlineWrap');
        if (w) w.classList.add('is-hidden');
        const c = document.getElementById('brResultsContent');
        if (c) c.innerHTML = '';
        if (brChart) {
            brChart.destroy();
            brChart = null;
        }
    }

    function calcBrokerageResult(e) {
        e.preventDefault();
        // Reset previous reading first - clear results and destroy chart before calculating
        const brResultsContent = document.getElementById('brResultsContent');
        if (brResultsContent) brResultsContent.innerHTML = '';
        if (brChart) {
            brChart.destroy();
            brChart = null;
        }

        const buy = parseFloat(document.getElementById('br-buy').value);
        const sell = parseFloat(document.getElementById('br-sell').value);
        const qty = parseFloat(document.getElementById('br-qty').value);
        const type = document.getElementById('br-type').value;
        const r = calcBrokerage(buy, sell, qty, type, 'NSE', 'equity');
        document.getElementById('brResultsContent').innerHTML = `<div class="results-primary-card">
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
        document.getElementById('brBreakevenVal').textContent = Number(r.breakevenPrice).toFixed(2);
        document.getElementById('brSellVal').textContent = Number(sell).toLocaleString('en-IN');
        const diff = r.breakevenPrice ? ((sell - r.breakevenPrice) / r.breakevenPrice * 100) : 0;
        document.getElementById('brDiffText').textContent = diff >= 0 ? `+${diff.toFixed(2)}% above breakeven` : `${diff.toFixed(2)}% below breakeven`;
        if (brChart) brChart.destroy();
        const chargeLabels = [],
            chargeVals = [],
            chargeColors = [];
        if (r.brokerage > 0) {
            chargeLabels.push('Brokerage');
            chargeVals.push(r.brokerage);
            chargeColors.push('#1e5a7d');
        }
        if (r.stt > 0) {
            chargeLabels.push('STT');
            chargeVals.push(r.stt);
            chargeColors.push('#e74c3c');
        }
        if (r.transactionCharges > 0) {
            chargeLabels.push('Tx Charges');
            chargeVals.push(r.transactionCharges);
            chargeColors.push('#f4b942');
        }
        if (r.gst > 0) {
            chargeLabels.push('GST');
            chargeVals.push(r.gst);
            chargeColors.push('#9c27b0');
        }
        if (r.stampDuty > 0) {
            chargeLabels.push('Stamp Duty');
            chargeVals.push(r.stampDuty);
            chargeColors.push('#ff9800');
        }
        if (chargeVals.length === 0) chargeVals.push(1);
        setTimeout(() => {
            brChart = new ApexCharts(document.querySelector('#brChart'), {
                series: chargeVals,
                chart: {
                    type: 'donut',
                    height: 220
                },
                labels: chargeLabels.length ? chargeLabels : ['Charges'],
                colors: chargeColors.length ? chargeColors : ['#1e5a7d'],
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                value: {
                                    formatter: v => formatCurrency(v)
                                }
                            }
                        }
                    }
                }
            });
            brChart.render();
        }, 50);
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