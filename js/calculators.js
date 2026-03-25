// Calculators Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Create calculator modal container if it doesn't exist
    // Modal disabled - calculator cards now navigate directly to calculator pages
    /*
    if (!document.getElementById('calculatorModal')) {
        createCalculatorModal();
    }
    */

    // Handle calculator card clicks (both .calc-card and .calculator-card for home page)
    
    const calcCards = document.querySelectorAll('.calc-card, .calculator-card');
    
    calcCards.forEach(card => {
        // Track hover state for click animation
        card.addEventListener('mouseenter', function() {
            this.style.cursor = 'pointer';
            this.dataset.isHovered = 'true';
        });
        
        card.addEventListener('mouseleave', function() {
            this.dataset.isHovered = 'false';
        });
        
        card.addEventListener('click', function() {
            const calculatorType = this.getAttribute('data-type');
            
            // Add click animation only if card is hovered
            if (this.dataset.isHovered === 'true') {
                this.classList.add('card-clicked');
                setTimeout(() => {
                    this.classList.remove('card-clicked');
                }, 300);
            }
            
            // Navigate to calculator page
            if (calculatorType) {
                // Detect if we're in calculator subdirectory
                const isInCalculatorDir = window.location.pathname.includes('/calculator/') || window.location.pathname.includes('\\calculator\\');
                const basePath = isInCalculatorDir ? '' : 'calculator/';
                
                const calculatorPages = {
                    'sip': basePath + 'calculator-sip.php',
                    'lumpsum': basePath + 'calculator-lumpsum.php',
                    'fd': basePath + 'calculator-fd.php',
                    'rd': basePath + 'calculator-rd.php',
                    'brokerage': basePath + 'calculator-brokerage.php',
                    'cagr': basePath + 'calculator-cagr.php',
                    'simple-interest': basePath + 'calculator-simple-interest.php',
                    'compound-interest': basePath + 'calculator-compound-interest.php',
                    'swp': basePath + 'calculator-swp.php',
                    'mutual-fund': basePath + 'calculator-mutual-fund.php',
                    'ssy': basePath + 'calculator-ssy.php',
                    'po-ppf': basePath + 'calculator-ppf.php',
                    'ppf': basePath + 'calculator-ppf.php',
                    'epf': basePath + 'calculator-epf.php',
                    'mtf': basePath + 'calculator-mtf.php',
                    'elss': basePath + 'calculator-elss.php',
                    'step-up-sip': basePath + 'calculator-step-up-sip.php',
                    'po-fd': basePath + 'calculator-po-fd.php',
                    'po-rd': basePath + 'calculator-po-rd.php',
                    'nsc': basePath + 'calculator-nsc.php',
                    'etf': basePath + 'calculator-etf.php',
                    'stcg': basePath + 'calculator-stcg.php',
                    'margin': basePath + 'calculator-margin.php'
                };
                
                const page = calculatorPages[calculatorType];
                if (page) {
                    window.location.href = page;
                } else {
                    // Fallback to modal for calculators not yet created
                    openCalculatorModal(calculatorType);
                }
            }
        });
    });
});

// Create calculator modal structure
function createCalculatorModal() {
    const modal = document.createElement('div');
    modal.id = 'calculatorModal';
    modal.className = 'calculator-modal';
    modal.innerHTML = `
        <div class="calculator-modal-overlay"></div>
        <div class="calculator-modal-content">
            <button class="calculator-modal-close" onclick="closeCalculatorModal()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="calculator-modal-body" id="calculatorModalBody">
                <!-- Calculator content will be inserted here -->
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    
    // Close modal when clicking overlay
    modal.querySelector('.calculator-modal-overlay').addEventListener('click', closeCalculatorModal);
    
    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeCalculatorModal();
        }
    });
}

// Open calculator modal with specific calculator
function openCalculatorModal(type) {
    const modal = document.getElementById('calculatorModal');
    const modalBody = document.getElementById('calculatorModalBody');
    
    if (!modal || !modalBody) return;
    
    // Generate calculator content based on type
    modalBody.innerHTML = generateCalculatorContent(type);
    
    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Initialize calculator
    initializeCalculator(type);
    
    // Re-initialize Lucide icons for new content
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
}

// Close calculator modal
function closeCalculatorModal() {
    const modal = document.getElementById('calculatorModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// Generate calculator content HTML
function generateCalculatorContent(type) {
    const calculators = {
        'sip': {
            title: 'SIP Calculator',
            description: 'Calculate how much you need to save or how much you will accumulate with your SIP',
            fields: [
                { id: 'sip-amount', label: 'Monthly SIP Amount (₹)', type: 'number', placeholder: '5000', required: true },
                { id: 'sip-rate', label: 'Expected Annual Return (%)', type: 'number', placeholder: '12', required: true },
                { id: 'sip-years', label: 'Investment Period (Years)', type: 'number', placeholder: '10', required: true }
            ]
        },
        'lumpsum': {
            title: 'Lumpsum Calculator',
            description: 'Calculate returns for lumpsum investments to achieve your financial goals',
            fields: [
                { id: 'lumpsum-amount', label: 'Investment Amount (₹)', type: 'number', placeholder: '100000', required: true },
                { id: 'lumpsum-rate', label: 'Expected Annual Return (%)', type: 'number', placeholder: '12', required: true },
                { id: 'lumpsum-years', label: 'Investment Period (Years)', type: 'number', placeholder: '10', required: true }
            ]
        },
        'fd': {
            title: 'Fixed Deposit Calculator',
            description: 'Check returns on your fixed deposits (FDs) without any hassle',
            fields: [
                { id: 'fd-amount', label: 'Principal Amount (₹)', type: 'number', placeholder: '100000', required: true },
                { id: 'fd-rate', label: 'Interest Rate (% p.a.)', type: 'number', placeholder: '6.5', required: true },
                { id: 'fd-years', label: 'Tenure (Years)', type: 'number', placeholder: '5', required: true },
                { id: 'fd-compounding', label: 'Compounding Frequency', type: 'select', options: [
                    { value: 'yearly', text: 'Yearly' },
                    { value: 'half-yearly', text: 'Half-Yearly' },
                    { value: 'quarterly', text: 'Quarterly' },
                    { value: 'monthly', text: 'Monthly' }
                ], required: true }
            ]
        },
        'rd': {
            title: 'Recurring Deposit Calculator',
            description: 'Calculate Recurring Deposit maturity value with monthly contributions',
            fields: [
                { id: 'rd-amount', label: 'Monthly Deposit (₹)', type: 'number', placeholder: '5000', required: true },
                { id: 'rd-rate', label: 'Interest Rate (% p.a.)', type: 'number', placeholder: '6.5', required: true },
                { id: 'rd-years', label: 'Tenure (Years)', type: 'number', placeholder: '5', required: true }
            ]
        },
        'brokerage': {
            title: 'Brokerage Calculator',
            description: 'Calculate trading charges including brokerage, STT, and other fees',
            fields: [
                { id: 'brokerage-price', label: 'Price per Share (₹)', type: 'number', placeholder: '100', required: true },
                { id: 'brokerage-quantity', label: 'Quantity', type: 'number', placeholder: '100', required: true },
                { id: 'brokerage-type', label: 'Transaction Type', type: 'select', options: [
                    { value: 'equity', text: 'Equity Delivery' },
                    { value: 'intraday', text: 'Intraday' },
                    { value: 'futures', text: 'Futures' },
                    { value: 'options', text: 'Options' }
                ], required: true }
            ]
        },
        'cagr': {
            title: 'CAGR Calculator',
            description: 'Calculate Compound Annual Growth Rate for your investment performance analysis',
            fields: [
                { id: 'cagr-initial', label: 'Initial Investment (₹)', type: 'number', placeholder: '100000', required: true },
                { id: 'cagr-final', label: 'Final Value (₹)', type: 'number', placeholder: '200000', required: true },
                { id: 'cagr-years', label: 'Investment Period (Years)', type: 'number', placeholder: '5', required: true }
            ]
        },
        'simple-interest': {
            title: 'Simple Interest Calculator',
            description: 'Calculate simple interest on loans and deposits with straightforward calculations',
            fields: [
                { id: 'si-principal', label: 'Principal Amount (₹)', type: 'number', placeholder: '100000', required: true },
                { id: 'si-rate', label: 'Interest Rate (% p.a.)', type: 'number', placeholder: '8', required: true },
                { id: 'si-years', label: 'Time Period (Years)', type: 'number', placeholder: '5', required: true }
            ]
        },
        'compound-interest': {
            title: 'Compound Interest Calculator',
            description: 'Calculate compound interest with different compounding frequencies and time periods',
            fields: [
                { id: 'ci-principal', label: 'Principal Amount (₹)', type: 'number', placeholder: '100000', required: true },
                { id: 'ci-rate', label: 'Interest Rate (% p.a.)', type: 'number', placeholder: '8', required: true },
                { id: 'ci-years', label: 'Time Period (Years)', type: 'number', placeholder: '5', required: true },
                { id: 'ci-compounding', label: 'Compounding Frequency', type: 'select', options: [
                    { value: 'yearly', text: 'Yearly' },
                    { value: 'half-yearly', text: 'Half-Yearly' },
                    { value: 'quarterly', text: 'Quarterly' },
                    { value: 'monthly', text: 'Monthly' },
                    { value: 'daily', text: 'Daily' }
                ], required: true }
            ]
        }
    };
    
    const calc = calculators[type];
    if (!calc) {
        return '<div class="calculator-error"><p>Calculator not available yet. Coming soon!</p></div>';
    }
    
    let fieldsHTML = '';
    calc.fields.forEach(field => {
        if (field.type === 'select') {
            let optionsHTML = '';
            field.options.forEach(opt => {
                optionsHTML += `<option value="${opt.value}">${opt.text}</option>`;
            });
            fieldsHTML += `
                <div class="calculator-field">
                    <label for="${field.id}">${field.label}</label>
                    <select id="${field.id}" ${field.required ? 'required' : ''}>
                        <option value="">Select...</option>
                        ${optionsHTML}
                    </select>
                </div>
            `;
        } else {
            fieldsHTML += `
                <div class="calculator-field">
                    <label for="${field.id}">${field.label}</label>
                    <input type="${field.type}" id="${field.id}" placeholder="${field.placeholder}" ${field.required ? 'required' : ''}>
                </div>
            `;
        }
    });
    
    return `
        <div class="calculator-header">
            <h2>${calc.title}</h2>
            <p>${calc.description}</p>
        </div>
        <form class="calculator-form" id="calculatorForm" onsubmit="calculateResult(event, '${type}')">
            ${fieldsHTML}
            <div class="calculator-actions">
                <button type="submit" class="calculator-btn-calculate">Calculate</button>
                <button type="button" class="calculator-btn-reset" onclick="resetCalculator('${type}')">Reset</button>
            </div>
        </form>
        <div class="calculator-results" id="calculatorResults"></div>
    `;
}

// Initialize calculator with event listeners
function initializeCalculator(type) {
    // Add input validation
    const inputs = document.querySelectorAll('#calculatorModal input[type="number"]');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
        });
    });
}

// Calculate results based on calculator type
function calculateResult(event, type) {
    event.preventDefault();
    
    const resultsDiv = document.getElementById('calculatorResults');
    if (!resultsDiv) return;
    
    // Reset previous reading first - clear results before calculating
    resultsDiv.innerHTML = '';
    
    let result;
    
    switch(type) {
        case 'sip':
            result = calculateSIP();
            break;
        case 'lumpsum':
            result = calculateLumpsum();
            break;
        case 'fd':
            result = calculateFD();
            break;
        case 'rd':
            result = calculateRD();
            break;
        case 'brokerage':
            result = calculateBrokerage();
            break;
        case 'cagr':
            result = calculateCAGR();
            break;
        case 'simple-interest':
            result = calculateSimpleInterest();
            break;
        case 'compound-interest':
            result = calculateCompoundInterest();
            break;
        default:
            result = { error: 'Calculator not implemented yet' };
    }
    
    if (result.error) {
        resultsDiv.innerHTML = `<div class="calculator-error">${result.error}</div>`;
    } else {
        displayResults(result, type);
    }
}

// SIP Calculator
function calculateSIP() {
    const amount = parseFloat(document.getElementById('sip-amount').value);
    const rate = parseFloat(document.getElementById('sip-rate').value);
    const years = parseFloat(document.getElementById('sip-years').value);
    
    if (!amount || !rate || !years) {
        return { error: 'Please fill all fields' };
    }
    
    const monthlyRate = rate / 100 / 12;
    const months = years * 12;
    const totalInvested = amount * months;
    const futureValue = amount * (((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate));
    const returns = futureValue - totalInvested;
    
    return {
        totalInvested: totalInvested,
        futureValue: futureValue,
        returns: returns,
        returnPercentage: (returns / totalInvested) * 100
    };
}

// Lumpsum Calculator
function calculateLumpsum() {
    const amount = parseFloat(document.getElementById('lumpsum-amount').value);
    const rate = parseFloat(document.getElementById('lumpsum-rate').value);
    const years = parseFloat(document.getElementById('lumpsum-years').value);
    
    if (!amount || !rate || !years) {
        return { error: 'Please fill all fields' };
    }
    
    const futureValue = amount * Math.pow(1 + rate / 100, years);
    const returns = futureValue - amount;
    
    return {
        principal: amount,
        futureValue: futureValue,
        returns: returns,
        returnPercentage: (returns / amount) * 100
    };
}

// FD Calculator
function calculateFD() {
    const amount = parseFloat(document.getElementById('fd-amount').value);
    const rate = parseFloat(document.getElementById('fd-rate').value);
    const years = parseFloat(document.getElementById('fd-years').value);
    const compounding = document.getElementById('fd-compounding').value;
    
    if (!amount || !rate || !years || !compounding) {
        return { error: 'Please fill all fields' };
    }
    
    const compoundingFreq = {
        'yearly': 1,
        'half-yearly': 2,
        'quarterly': 4,
        'monthly': 12
    };
    
    const n = compoundingFreq[compounding];
    const futureValue = amount * Math.pow(1 + (rate / 100) / n, n * years);
    const returns = futureValue - amount;
    
    return {
        principal: amount,
        futureValue: futureValue,
        returns: returns,
        returnPercentage: (returns / amount) * 100,
        compounding: compounding
    };
}

// RD Calculator
function calculateRD() {
    const amount = parseFloat(document.getElementById('rd-amount').value);
    const rate = parseFloat(document.getElementById('rd-rate').value);
    const years = parseFloat(document.getElementById('rd-years').value);
    
    if (!amount || !rate || !years) {
        return { error: 'Please fill all fields' };
    }
    
    const months = years * 12;
    const monthlyRate = rate / 100 / 12;
    const totalInvested = amount * months;
    const futureValue = amount * (((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate));
    const returns = futureValue - totalInvested;
    
    return {
        totalInvested: totalInvested,
        futureValue: futureValue,
        returns: returns,
        returnPercentage: (returns / totalInvested) * 100
    };
}

// Brokerage Calculator
function calculateBrokerage() {
    const price = parseFloat(document.getElementById('brokerage-price').value);
    const quantity = parseFloat(document.getElementById('brokerage-quantity').value);
    const type = document.getElementById('brokerage-type').value;
    
    if (!price || !quantity || !type) {
        return { error: 'Please fill all fields' };
    }
    
    const turnover = price * quantity;
    let brokerage = 0;
    let stt = 0;
    let stampDuty = 0;
    let transactionCharges = 0;
    let sebiCharges = 0;
    let gst = 0;
    
    // Brokerage rates (example rates, adjust as per your broker)
    const brokerageRates = {
        'equity': 0.03, // 0.03% or ₹20 per executed order (whichever is lower)
        'intraday': 0.03,
        'futures': 0.03,
        'options': 0.03
    };
    
    brokerage = Math.min(turnover * brokerageRates[type] / 100, 20);
    
    // STT (Securities Transaction Tax)
    if (type === 'equity') {
        stt = turnover * 0.1 / 100; // 0.1% on buy
    } else if (type === 'intraday') {
        stt = turnover * 0.025 / 100; // 0.025% on sell
    } else if (type === 'futures') {
        stt = turnover * 0.01 / 100; // 0.01%
    } else if (type === 'options') {
        stt = turnover * 0.05 / 100; // 0.05%
    }
    
    // Other charges (approximate)
    stampDuty = turnover * 0.003 / 100; // 0.003%
    transactionCharges = turnover * 0.00325 / 100; // 0.00325%
    sebiCharges = turnover * 0.0001 / 100; // 0.0001%
    
    // GST on brokerage and transaction charges
    gst = (brokerage + transactionCharges) * 18 / 100;
    
    const totalCharges = brokerage + stt + stampDuty + transactionCharges + sebiCharges + gst;
    const netAmount = turnover + totalCharges;
    
    return {
        turnover: turnover,
        brokerage: brokerage,
        stt: stt,
        stampDuty: stampDuty,
        transactionCharges: transactionCharges,
        sebiCharges: sebiCharges,
        gst: gst,
        totalCharges: totalCharges,
        netAmount: netAmount
    };
}

// CAGR Calculator
function calculateCAGR() {
    const initial = parseFloat(document.getElementById('cagr-initial').value);
    const final = parseFloat(document.getElementById('cagr-final').value);
    const years = parseFloat(document.getElementById('cagr-years').value);
    
    if (!initial || !final || !years || initial <= 0) {
        return { error: 'Please fill all fields with valid values' };
    }
    
    const cagr = (Math.pow(final / initial, 1 / years) - 1) * 100;
    
    return {
        initial: initial,
        final: final,
        years: years,
        cagr: cagr
    };
}

// Simple Interest Calculator
function calculateSimpleInterest() {
    const principal = parseFloat(document.getElementById('si-principal').value);
    const rate = parseFloat(document.getElementById('si-rate').value);
    const years = parseFloat(document.getElementById('si-years').value);
    
    if (!principal || !rate || !years) {
        return { error: 'Please fill all fields' };
    }
    
    const interest = (principal * rate * years) / 100;
    const totalAmount = principal + interest;
    
    return {
        principal: principal,
        interest: interest,
        totalAmount: totalAmount,
        rate: rate,
        years: years
    };
}

// Compound Interest Calculator
function calculateCompoundInterest() {
    const principal = parseFloat(document.getElementById('ci-principal').value);
    const rate = parseFloat(document.getElementById('ci-rate').value);
    const years = parseFloat(document.getElementById('ci-years').value);
    const compounding = document.getElementById('ci-compounding').value;
    
    if (!principal || !rate || !years || !compounding) {
        return { error: 'Please fill all fields' };
    }
    
    const compoundingFreq = {
        'yearly': 1,
        'half-yearly': 2,
        'quarterly': 4,
        'monthly': 12,
        'daily': 365
    };
    
    const n = compoundingFreq[compounding];
    const amount = principal * Math.pow(1 + (rate / 100) / n, n * years);
    const interest = amount - principal;
    
    return {
        principal: principal,
        interest: interest,
        totalAmount: amount,
        rate: rate,
        years: years,
        compounding: compounding
    };
}

// Display results
function displayResults(result, type) {
    const resultsDiv = document.getElementById('calculatorResults');
    if (!resultsDiv) return;
    
    let html = '<div class="calculator-results-content"><h3>Results</h3>';
    
    switch(type) {
        case 'sip':
            html += `
                <div class="result-item">
                    <span class="result-label">Total Invested:</span>
                    <span class="result-value">₹${formatNumber(result.totalInvested)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Maturity Value:</span>
                    <span class="result-value">₹${formatNumber(result.futureValue)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Estimated Returns:</span>
                    <span class="result-value">₹${formatNumber(result.returns)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Return Percentage:</span>
                    <span class="result-value">${result.returnPercentage.toFixed(2)}%</span>
                </div>
            `;
            break;
        case 'lumpsum':
            html += `
                <div class="result-item">
                    <span class="result-label">Principal Amount:</span>
                    <span class="result-value">₹${formatNumber(result.principal)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Maturity Value:</span>
                    <span class="result-value">₹${formatNumber(result.futureValue)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Estimated Returns:</span>
                    <span class="result-value">₹${formatNumber(result.returns)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Return Percentage:</span>
                    <span class="result-value">${result.returnPercentage.toFixed(2)}%</span>
                </div>
            `;
            break;
        case 'fd':
            html += `
                <div class="result-item">
                    <span class="result-label">Principal Amount:</span>
                    <span class="result-value">₹${formatNumber(result.principal)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Maturity Value:</span>
                    <span class="result-value">₹${formatNumber(result.futureValue)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Interest Earned:</span>
                    <span class="result-value">₹${formatNumber(result.returns)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Return Percentage:</span>
                    <span class="result-value">${result.returnPercentage.toFixed(2)}%</span>
                </div>
            `;
            break;
        case 'rd':
            html += `
                <div class="result-item">
                    <span class="result-label">Total Invested:</span>
                    <span class="result-value">₹${formatNumber(result.totalInvested)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Maturity Value:</span>
                    <span class="result-value">₹${formatNumber(result.futureValue)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Interest Earned:</span>
                    <span class="result-value">₹${formatNumber(result.returns)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Return Percentage:</span>
                    <span class="result-value">${result.returnPercentage.toFixed(2)}%</span>
                </div>
            `;
            break;
        case 'brokerage':
            html += `
                <div class="result-item">
                    <span class="result-label">Turnover:</span>
                    <span class="result-value">₹${formatNumber(result.turnover)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Brokerage:</span>
                    <span class="result-value">₹${formatNumber(result.brokerage)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">STT:</span>
                    <span class="result-value">₹${formatNumber(result.stt)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Stamp Duty:</span>
                    <span class="result-value">₹${formatNumber(result.stampDuty)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Transaction Charges:</span>
                    <span class="result-value">₹${formatNumber(result.transactionCharges)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">SEBI Charges:</span>
                    <span class="result-value">₹${formatNumber(result.sebiCharges)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">GST:</span>
                    <span class="result-value">₹${formatNumber(result.gst)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Total Charges:</span>
                    <span class="result-value">₹${formatNumber(result.totalCharges)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Net Amount:</span>
                    <span class="result-value">₹${formatNumber(result.netAmount)}</span>
                </div>
            `;
            break;
        case 'cagr':
            html += `
                <div class="result-item">
                    <span class="result-label">Initial Investment:</span>
                    <span class="result-value">₹${formatNumber(result.initial)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Final Value:</span>
                    <span class="result-value">₹${formatNumber(result.final)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Investment Period:</span>
                    <span class="result-value">${result.years} years</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">CAGR:</span>
                    <span class="result-value">${result.cagr.toFixed(2)}%</span>
                </div>
            `;
            break;
        case 'simple-interest':
            html += `
                <div class="result-item">
                    <span class="result-label">Principal Amount:</span>
                    <span class="result-value">₹${formatNumber(result.principal)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Interest Rate:</span>
                    <span class="result-value">${result.rate}% p.a.</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Time Period:</span>
                    <span class="result-value">${result.years} years</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Interest Earned:</span>
                    <span class="result-value">₹${formatNumber(result.interest)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Total Amount:</span>
                    <span class="result-value">₹${formatNumber(result.totalAmount)}</span>
                </div>
            `;
            break;
        case 'compound-interest':
            html += `
                <div class="result-item">
                    <span class="result-label">Principal Amount:</span>
                    <span class="result-value">₹${formatNumber(result.principal)}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Interest Rate:</span>
                    <span class="result-value">${result.rate}% p.a.</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Time Period:</span>
                    <span class="result-value">${result.years} years</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Compounding:</span>
                    <span class="result-value">${result.compounding}</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Interest Earned:</span>
                    <span class="result-value">₹${formatNumber(result.interest)}</span>
                </div>
                <div class="result-item highlight">
                    <span class="result-label">Total Amount:</span>
                    <span class="result-value">₹${formatNumber(result.totalAmount)}</span>
                </div>
            `;
            break;
    }
    
    html += '</div>';
    resultsDiv.innerHTML = html;
}

// Reset calculator
function resetCalculator(type) {
    const form = document.getElementById('calculatorForm');
    if (form) {
        form.reset();
    }
    const resultsDiv = document.getElementById('calculatorResults');
    if (resultsDiv) {
        resultsDiv.innerHTML = '';
    }
}

// Format number with Indian numbering system
function formatNumber(num) {
    return num.toLocaleString('en-IN', { maximumFractionDigits: 2 });
}
