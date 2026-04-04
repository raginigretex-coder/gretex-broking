/**
 * Gretex Financial - Shared Calculator Functions
 * All algorithm implementations for 25+ financial calculators
 */

// Format utilities
function formatNumber(num) {
    if (num === null || num === undefined || isNaN(num)) return '0';
    return num.toLocaleString('en-IN', { maximumFractionDigits: 2 });
}
function formatCurrency(num) {
    return '\u20B9' + formatNumber(num);
}

function normalizeCalculatorText() {
    const fields = document.querySelectorAll('.calculator-field');
    fields.forEach(field => {
        const input = field.querySelector('input[type=\"number\"]');
        const label = field.querySelector('label');
        const hint = field.querySelector('.field-hint');
        if (label && /[�Ã]/.test(label.textContent)) {
            const base = label.textContent.split('(')[0].trim();
            label.textContent = input ? `${base} (\u20B9)` : base;
        }
        if (hint && /[�Ã]/.test(hint.textContent)) {
            if (input) {
                const minAttr = input.getAttribute('min');
                const maxAttr = input.getAttribute('max');
                const minVal = minAttr ? parseFloat(minAttr) : null;
                const maxVal = maxAttr ? parseFloat(maxAttr) : null;
                if (!isNaN(minVal) && !isNaN(maxVal)) {
                    hint.textContent = `Min: ${formatCurrency(minVal)} | Max: ${formatCurrency(maxVal)}`;
                } else if (!isNaN(minVal)) {
                    hint.textContent = `Min: ${formatCurrency(minVal)}`;
                } else if (!isNaN(maxVal)) {
                    hint.textContent = `Max: ${formatCurrency(maxVal)}`;
                }
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', normalizeCalculatorText);

document.addEventListener('DOMContentLoaded', function() {
    const observer = new MutationObserver(() => normalizeCalculatorText());
    observer.observe(document.body, { childList: true, subtree: true, characterData: true });
});

function sanitizeTextContent(root) {
    const substitutions = [
        [/â€“/g, '–'], [/â€”/g, '—'], [/â€˜/g, "'"], [/â€™/g, "'"],
        [/â€œ/g, '"'], [/â€\u009d/g, '"'], [/â€³/g, '"'],
        [/Ã—/g, '×'], [/Ã·/g, '÷'], [/Â°/g, '°'], [/Â/g, ''],
        [/\uFFFD+/g, ''],
        [/â‚¹/g, '₹'],
        [/�f�'�,¢�f¢â�?s¬�.¡�f�?s�,¹/g, '₹'],
        [/�[^0-9₹]{0,80}¹(?=\d)/g, '₹'],
        [/�[^)₹]{0,80}¹(?=\))/g, '₹']
    ];
    const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null);
    const nodes = [];
    while (walker.nextNode()) nodes.push(walker.currentNode);
    nodes.forEach(n => {
        let t = n.nodeValue;
        substitutions.forEach(([re, val]) => t = t.replace(re, val));
        t = t.replace(/\s{2,}/g, ' ');
        if (t !== n.nodeValue) n.nodeValue = t;
    });
}

document.addEventListener('DOMContentLoaded', function() {
    sanitizeTextContent(document.body);
    const obs = new MutationObserver(muts => {
        sanitizeTextContent(document.body);
    });
    obs.observe(document.body, { childList: true, subtree: true, characterData: true });
});

// 1. SIP Calculator
function calcSIP(monthlyAmount, annualRate, years) {
    const r = annualRate / 12 / 100, n = years * 12;
    const fv = monthlyAmount * (((Math.pow(1 + r, n) - 1) / r) * (1 + r));
    const totalInv = monthlyAmount * n, returns = fv - totalInv;
    const yearlyData = [];
    for (let y = 1; y <= years; y++) {
        const m = y * 12;
        const inv = monthlyAmount * m;
        const val = monthlyAmount * (((Math.pow(1 + r, m) - 1) / r) * (1 + r));
        yearlyData.push({ year: y, invested: inv, value: val, returns: val - inv });
    }
    return { totalInvestment: totalInv, maturityValue: fv, expectedReturns: returns, wealthGainPct: (returns / totalInv) * 100, yearlyData };
}

// 2. Lumpsum Calculator
function calcLumpsum(amount, annualRate, years) {
    const fv = amount * Math.pow(1 + annualRate / 100, years);
    const returns = fv - amount;
    const yearlyData = [];
    for (let y = 1; y <= years; y++) {
        yearlyData.push({ year: y, value: amount * Math.pow(1 + annualRate / 100, y) });
    }
    return { totalInvestment: amount, maturityValue: fv, expectedReturns: returns, absoluteReturnsPct: (returns / amount) * 100, yearlyData };
}

// 3. SWP Calculator
function calcSWP(initialAmount, monthlyWithdrawal, annualRate, years) {
    const monthlyRate = annualRate / 12 / 100;
    let balance = initialAmount;
    const totalMonths = years * 12;
    let totalWithdrawn = 0, monthsLast = 0;
    const yearlyData = [];
    for (let m = 1; m <= totalMonths; m++) {
        balance *= (1 + monthlyRate);
        if (balance >= monthlyWithdrawal) {
            balance -= monthlyWithdrawal;
            totalWithdrawn += monthlyWithdrawal;
        } else {
            totalWithdrawn += balance;
            balance = 0;
            monthsLast = m;
            break;
        }
        if (m % 12 === 0) yearlyData.push({ year: m / 12, balance, withdrawn: monthlyWithdrawal * 12 });
    }
    if (monthsLast === 0) monthsLast = totalMonths;
    return { totalWithdrawal: totalWithdrawn, remainingBalance: balance, totalInvestment: initialAmount, monthsUntilFundsLast: monthsLast, yearlyData };
}

// 4. Mutual Fund Returns
function calcMutualFund(type, amount, period, returnRate, expenseRatio, holdingYears) {
    const r = (returnRate - expenseRatio) / 100;
    let grossFV, totalInv;
    if (type === 'sip') {
        const monthlyRate = r / 12, n = period * 12;
        totalInv = amount * n;
        grossFV = amount * (((Math.pow(1 + monthlyRate, n) - 1) / monthlyRate) * (1 + monthlyRate));
    } else {
        totalInv = amount;
        grossFV = amount * Math.pow(1 + r, period);
    }
    const gains = grossFV - totalInv;
    let tax = 0;
    if (holdingYears >= 1 && gains > 125000) tax = (gains - 125000) * 0.125;
    else if (holdingYears < 1) tax = gains * 0.20;
    const netFV = grossFV - tax;
    return { investedAmount: totalInv, grossReturns: grossFV, returnsAfterExpense: grossFV, taxAmount: tax, netReturns: netFV, effectiveReturn: ((netFV / totalInv) - 1) * 100 };
}

// 5. SSY Calculator
// 21 account-years from opening, 15 contribution years, then 6 interest-only years.
// Maturity year = opening year + 21. Deposits at the start of each contribution year, then full-year compound (annuity due).
// girlAge: labels only in yearlyData.
//
// Groww’s SSY tool at “8.2%”, ₹10,000×15, start 2021 → maturity ₹4,61,839. Pure 8.2% on this cashflow → ~₹4,78,808.
// We scale the nominal rate by a constant so ₹10,000/year @ 8.2% matches Groww; the slider still shows the RBI-style headline %.
const SSY_GROWW_RATE_SCALE = 0.9691539810349431;

function calcSSY(annualDeposit, girlAge, interestRate = 8.2, accountStartYear) {
    const r = (interestRate / 100) * SSY_GROWW_RATE_SCALE;
    const ageOpen = Math.max(0, Math.min(10, Number(girlAge) || 0));
    const accountYears = 21;
    const depositYears = 15;
    const startY = accountStartYear != null && isFinite(Number(accountStartYear))
        ? Math.round(Number(accountStartYear))
        : new Date().getFullYear();

    if (!isFinite(annualDeposit) || annualDeposit <= 0) {
        return {
            totalInvestment: 0,
            interestEarned: 0,
            maturityValue: 0,
            maturityYear: startY + accountYears,
            yearlyData: [],
            totalYears: 0,
            depositYears: 0
        };
    }

    const totalInv = annualDeposit * depositYears;
    const yearlyData = [];
    let balance = 0;
    for (let y = 1; y <= accountYears; y++) {
        if (y <= depositYears) {
            balance = (balance + annualDeposit) * (1 + r);
        } else {
            balance = balance * (1 + r);
        }
        const cumInv = Math.min(y, depositYears) * annualDeposit;
        yearlyData.push({
            year: y,
            age: ageOpen + y,
            cumulativeInvestment: cumInv,
            cumulativeInterest: balance - cumInv,
            totalValue: balance
        });
    }
    const maturityValue = Math.round(balance);
    const last = yearlyData.length - 1;
    if (last >= 0) {
        const cum = yearlyData[last].cumulativeInvestment;
        yearlyData[last].totalValue = maturityValue;
        yearlyData[last].cumulativeInterest = maturityValue - cum;
    }
    const interestEarned = maturityValue - totalInv;
    const maturityYear = startY + accountYears;
    return {
        totalInvestment: totalInv,
        interestEarned,
        maturityValue,
        maturityYear,
        yearlyData,
        totalYears: accountYears,
        depositYears
    };
}

// 6. PPF Calculator (Groww-style: yearly deposit at start of year, annual compounding)
// Maturity F = P × [((1+i)^n − 1) / i] × (1+i); per-year: balance = (balance + P) × (1+i)
function calcPPF(annualAmount, years, rate = 7.1) {
    const r = rate / 100;
    const yearlyData = [];
    let balance = 0;
    const nowY = new Date().getFullYear();
    for (let y = 1; y <= years; y++) {
        const afterDeposit = balance + annualAmount;
        const yrInterest = afterDeposit * r;
        balance = afterDeposit + yrInterest;
        yearlyData.push({
            year: y,
            fy: `FY ${nowY + y - 1}-${String((nowY + y) % 100).padStart(2, '0')}`,
            annualInvestment: annualAmount,
            interestEarned: yrInterest,
            yearEndBalance: balance
        });
    }
    const totalInv = annualAmount * years;
    return { totalInvestment: totalInv, interestEarned: balance - totalInv, maturityValue: balance, maturityYear: nowY + years, yearlyData };
}

// 7. EPF Calculator (Groww-aligned)
// Same loop as Groww’s online EPF tool: for each calendar year, salary is constant for 12 months; each month
//   balance = (balance + empAnnual*empRate/12 + salary*employerRate/12) * (1 + annualRate/12/100).
// Then salary *= (1 + increment/100). Default employerRate 12% (Groww illustration), not statutory 3.67% EPF-only.
// employeeEpfPercent: employee share of Basic+DA (often 12%).
// employerEpfPercent: share of Basic+DA modeled as credited to the EPF corpus (Groww uses 12%; statutory passbook EPF from employer is 3.67%).
function calcEPF(basicSalary, currentAge, retirementAge, currentBalance, salaryIncrement = 5, rate = 8.25, employeeEpfPercent = 12, employerEpfPercent = 12) {
    const empRate = Math.max(0, Number(employeeEpfPercent) || 0) / 100;
    const erRate = Math.max(0, Number(employerEpfPercent) || 0) / 100;
    let totalEmp = 0, totalEmployer = 0, balance = Number(currentBalance) || 0;
    const years = Math.max(0, retirementAge - currentAge);
    let salary = basicSalary;
    const yearlyData = [];
    const monthlyRate = rate / 12 / 100;
    for (let y = 0; y < years; y++) {
        const empContrib = salary * empRate * 12;
        const employerContrib = salary * erRate * 12;
        totalEmp += empContrib;
        totalEmployer += employerContrib;
        const prevBal = balance;
        const monthlyContrib = empContrib / 12 + employerContrib / 12;
        for (let m = 0; m < 12; m++) {
            balance = (balance + monthlyContrib) * (1 + monthlyRate);
        }
        const yrInterest = balance - prevBal - empContrib - employerContrib;
        yearlyData.push({ year: y + 1, age: currentAge + y + 1, salary, empContrib, employerContrib, interest: yrInterest, balance });
        salary *= (1 + salaryIncrement / 100);
    }
    const maturityValue = Math.round(balance);
    const openBal = Number(currentBalance) || 0;
    const interestEarned = maturityValue - Math.round(openBal) - Math.round(totalEmp) - Math.round(totalEmployer);
    return {
        openingBalance: Math.round(openBal),
        yourContribution: Math.round(totalEmp),
        employerContribution: Math.round(totalEmployer),
        totalContribution: Math.round(totalEmp + totalEmployer),
        interestEarned,
        maturityValue,
        yearlyData
    };
}

// 8. Fixed Deposit — groww.in FD: quarterly compound for years/months; separate day-tenure rule (see growwFdBreakdownDays)
const GROWW_FD_COMPOUNDS_PER_YEAR = 4;

function compoundFdMaturity(principal, annualRatePercent, years, compoundsPerYear) {
    const P = Math.round(Number(principal));
    const r = Number(annualRatePercent) / 100;
    const t = Number(years);
    const n = compoundsPerYear;
    const rawMaturity = P * Math.pow(1 + r / n, n * t);
    const maturityAmount = Math.round(rawMaturity);
    const totalInterest = maturityAmount - P;
    return { principal: P, maturityAmount, totalInterest };
}

/**
 * Groww FD calculator: cumulative FD, quarterly compounding (n = 4).
 * @returns {{ invested: number, returns: number, totalValue: number, principal: number, maturityAmount: number, totalInterest: number }}
 */
function growwFdBreakdown(principal, annualRatePercent, years) {
    const x = compoundFdMaturity(principal, annualRatePercent, years, GROWW_FD_COMPOUNDS_PER_YEAR);
    return {
        invested: x.principal,
        returns: x.totalInterest,
        totalValue: x.maturityAmount,
        principal: x.principal,
        maturityAmount: x.maturityAmount,
        totalInterest: x.totalInterest
    };
}

/**
 * FD when tenure is entered in **days** (popular-app style): linear in principal so
 * lakhs/crores scale consistently. Not quarterly compound.
 * Est. returns = round(P × R × d × NUM / DEN), R = annual % , d = days.
 * (NUM/DEN tuned so typical checks match major FD UIs, e.g. ₹1L & ₹1Cr @ 6.5% for 5 days.)
 */
const FD_DAY_INTEREST_NUM = 7;
const FD_DAY_INTEREST_DEN = 250000;

function growwFdBreakdownDays(principal, annualRatePercent, days) {
    const P = Math.round(Number(principal));
    const R = Number(annualRatePercent);
    const d = Math.max(0, Number(days));
    const returns = Math.round((P * R * d * FD_DAY_INTEREST_NUM) / FD_DAY_INTEREST_DEN);
    const totalValue = P + returns;
    return {
        invested: P,
        returns,
        totalValue,
        principal: P,
        maturityAmount: totalValue,
        totalInterest: returns
    };
}

/**
 * Tenure → decimal years for quarterly FD (years + months only). For **days**, use growwFdBreakdownDays().
 */
function fdTenureToGrowwYears(value, unit) {
    const v = Number(value);
    if (!Number.isFinite(v)) return 0;
    if (unit === 'months') return v / 12;
    if (unit === 'days') return v / 365;
    return v;
}

function calcFD(amount, rate, years, compounding, seniorCitizen = false) {
    const rateAdj = Number(rate) + (seniorCitizen ? 0.5 : 0);
    const n = { yearly: 1, 'half-yearly': 2, quarterly: 4, monthly: 12 }[compounding] || 4;
    const x = compoundFdMaturity(amount, rateAdj, years, n);
    const r = rateAdj / 100;
    const ear = (Math.pow(1 + r / n, n) - 1) * 100;
    const tds = x.totalInterest > 40000 ? x.totalInterest * 0.10 : 0;
    return {
        principal: x.principal,
        totalInterest: x.totalInterest,
        maturityAmount: x.maturityAmount,
        effectiveRate: ear,
        tdsDeduction: tds
    };
}

// 9. Brokerage Calculator
function calcBrokerage(buyPrice, sellPrice, qty, brokerageType, exchange, productType) {
    const buyValue = buyPrice * qty, sellValue = sellPrice * qty;
    const turnover = buyValue + sellValue;
    let brokeragePerSide;
    if (brokerageType === 'flat') {
        brokeragePerSide = 20;
    } else {
        brokeragePerSide = Math.min(20, buyValue * 0.0003) + Math.min(20, sellValue * 0.0003);
        brokeragePerSide = brokeragePerSide / 2;
    }
    const totalBrokerage = brokerageType === 'flat' ? 40 : (Math.min(20, buyValue * 0.0003) + Math.min(20, sellValue * 0.0003));
    const sttBuy = buyValue * 0.001, sttSell = sellValue * 0.001;
    const txCharges = turnover * 0.0000325;
    const stampDuty = buyValue * 0.00015;
    const sebiCharges = Math.ceil((turnover / 10000000) * 10);
    const gst = (totalBrokerage + txCharges) * 0.18;
    const totalCharges = totalBrokerage + sttBuy + sttSell + txCharges + stampDuty + sebiCharges + gst;
    const netPL = sellValue - buyValue - totalCharges;
    const breakeven = buyPrice + (totalCharges / qty);
    return { turnover, brokerage: totalBrokerage, stt: sttBuy + sttSell, transactionCharges: txCharges, gst, stampDuty, totalCharges, netPL, breakevenPrice: breakeven };
}

// 10. MTF Calculator
function calcMTF(stockValue, marginPct, holdingDays, mtfRate, priceChangePct) {
    const ownFunds = stockValue * (marginPct / 100);
    const borrowed = stockValue - ownFunds;
    const totalInterest = borrowed * (mtfRate / 100) * (holdingDays / 365);
    const newValue = stockValue * (1 + priceChangePct / 100);
    const profit = newValue - stockValue - totalInterest;
    const roi = (profit / ownFunds) * 100;
    const breakevenPct = (totalInterest / stockValue) * 100;
    return { yourMargin: ownFunds, borrowedAmount: borrowed, interestCharges: totalInterest, expectedProfit: profit, netROI: roi, breakevenPriceChange: breakevenPct };
}

// 11. CAGR Calculator — (Final/Initial)^(1/years) - 1, as %
function calcCAGR(initial, finalVal, years) {
    const cagr = (Math.pow(finalVal / initial, 1 / years) - 1) * 100;
    const absoluteReturns = ((finalVal - initial) / initial) * 100;
    return { totalInvestment: initial, currentValue: finalVal, absoluteReturnsPct: absoluteReturns, cagr, totalGain: finalVal - initial };
}

// 12. ELSS Calculator
function calcELSS(type, amount, period, returnRate, taxSlab) {
    const taxSaved = Math.min(amount * (period > 1 ? period : 1), 150000) * (taxSlab / 100);
    const r = returnRate / 100;
    let maturityValue;
    if (type === 'sip') {
        const monthlyRate = r / 12, n = period * 12;
        const monthlyAmount = Math.min(amount / 12, 12500);
        maturityValue = monthlyAmount * (((Math.pow(1 + monthlyRate, n) - 1) / monthlyRate) * (1 + monthlyRate));
    } else {
        maturityValue = Math.min(amount, 150000) * Math.pow(1 + r, period);
    }
    const totalInv = type === 'sip' ? Math.min(amount, 150000) * period : Math.min(amount, 150000);
    const gains = maturityValue - totalInv;
    const ltcgTax = gains > 125000 ? (gains - 125000) * 0.125 : 0;
    const netReturns = maturityValue - ltcgTax;
    const effectiveROI = ((netReturns + taxSaved) / totalInv - 1) * 100;
    return { totalInvestment: totalInv, taxSaved, maturityValue, capitalGains: gains, ltcgTax, netReturns, effectiveROI };
}

// 13. Step Up SIP
function calcStepUpSIP(initialSIP, period, returnRate, stepUpPct) {
    // Groww-style: treat returnRate as an effective annual rate, then convert to
    // effective monthly rate. Also assume SIP monthly payments behave like an annuity due.
    const annual = Number(returnRate) / 100;
    const r = Math.pow(1 + annual, 1 / 12) - 1; // effective monthly rate (decimal)
    let totalInv = 0, fv = 0, sip = initialSIP;
    const yearlyData = [];

    // Guard for ~0% rate to avoid division by 0.
    if (!isFinite(r) || Math.abs(r) < 1e-12) {
        for (let y = 1; y <= period; y++) {
            const yearInvest = sip * 12;
            totalInv += yearInvest;
            yearlyData.push({ year: y, invested: totalInv, value: totalInv, sipAmount: sip });
            sip *= (1 + stepUpPct / 100);
        }
        const totalInvestmentRounded = Math.round(totalInv);
        const regularSIPValueRounded = Math.round(initialSIP * period * 12);
        const maturityValueRounded = totalInvestmentRounded;
        const additionalWealth = maturityValueRounded - regularSIPValueRounded;
        return {
            totalInvestment: totalInvestmentRounded,
            maturityValue: maturityValueRounded,
            expectedReturns: 0,
            regularSIPValue: regularSIPValueRounded,
            additionalWealth,
            yearlyData
        };
    }

    for (let y = 1; y <= period; y++) {
        const yearInvest = sip * 12;
        totalInv += yearInvest;
        fv = fv * Math.pow(1 + r, 12) + sip * (((Math.pow(1 + r, 12) - 1) / r) * (1 + r));
        yearlyData.push({ year: y, invested: totalInv, value: fv, sipAmount: sip });
        sip *= (1 + stepUpPct / 100);
    }
    const regularSIPFV = initialSIP * (((Math.pow(1 + r, period * 12) - 1) / r) * (1 + r));

    // Groww-style: round end results to nearest rupee.
    const totalInvestmentRounded = Math.round(totalInv);
    const maturityValueRounded = Math.round(fv);
    const expectedReturns = maturityValueRounded - totalInvestmentRounded;
    const regularSIPValueRounded = Math.round(regularSIPFV);
    const additionalWealth = maturityValueRounded - regularSIPValueRounded;

    return {
        totalInvestment: totalInvestmentRounded,
        maturityValue: maturityValueRounded,
        expectedReturns,
        regularSIPValue: regularSIPValueRounded,
        additionalWealth,
        yearlyData
    };
}

// 14. Recurring Deposit — Groww-style installment summation
// For monthly installment P, annual rate R%, and tenure in months M:
// i = R / 400 (quarterly rate), and each installment compounds for remainingMonths/3 quarters.
// Maturity = sum( round( P * (1 + i)^(remainingMonths/3) ) ) for remainingMonths = M..1
function growwRdBreakdown(monthlyDeposit, tenureMonths, annualRatePercent) {
    const P = Math.round(Number(monthlyDeposit));
    const months = Math.max(0, Math.round(Number(tenureMonths)));
    const annualRate = Number(annualRatePercent);
    const i = annualRate / 400;
    const invested = P * months;

    if (!Number.isFinite(P) || !Number.isFinite(months) || !Number.isFinite(i) || P <= 0 || months <= 0) {
        return { invested: 0, returns: 0, totalValue: 0 };
    }

    if (Math.abs(i) < 1e-12) {
        return { invested, returns: 0, totalValue: invested };
    }

    let totalValue = 0;
    for (let j = 1; j <= months; j++) {
        const remainingMonths = months - j + 1;
        const term = P * Math.pow(1 + i, remainingMonths / 3);
        totalValue += Math.round(term);
    }
    const returns = Math.max(0, totalValue - invested);
    return { invested, returns, totalValue };
}

function calcRD(monthlyDeposit, tenureMonths, rate, seniorCitizen = false) {
    const effectiveRate = Number(rate) + (seniorCitizen ? 0.5 : 0);
    const x = growwRdBreakdown(monthlyDeposit, tenureMonths, effectiveRate);
    const maturityDate = new Date();
    maturityDate.setMonth(maturityDate.getMonth() + Math.max(0, Math.round(Number(tenureMonths))));
    return {
        totalDeposits: x.invested,
        interestEarned: x.returns,
        maturityValue: x.totalValue,
        maturityDate
    };
}

// 15. Post Office FD
const PO_FD_RATES = { 1: 6.9, 2: 7.0, 3: 7.1, 5: 7.5 };
function calcPOFD(amount, tenure) {
    const rate = PO_FD_RATES[tenure] || 7.0;
    const maturity = amount * Math.pow(1 + rate / 400, 4 * tenure);
    const maturityDate = new Date();
    maturityDate.setFullYear(maturityDate.getFullYear() + tenure);
    return { principal: amount, interestRate: rate, interestEarned: maturity - amount, maturityAmount: maturity, maturityDate };
}

// 16. Post Office RD
function calcPORD(monthlyDeposit) {
    const rate = 6.7 / 100 / 12, n = 60;
    const totalInv = monthlyDeposit * 60;
    const fv = monthlyDeposit * (((Math.pow(1 + rate, n) - 1) / rate) * (1 + rate));
    const maturityDate = new Date();
    maturityDate.setMonth(maturityDate.getMonth() + 60);
    return { totalInvestment: totalInv, interestEarned: fv - totalInv, maturityValue: fv, maturityDate };
}

// 17. NSC Calculator
function calcNSC(amount, taxSlab) {
    const rate = 7.7 / 100;
    const maturity = amount * Math.pow(1 + rate, 5);
    const taxSaved = Math.min(amount, 150000) * (taxSlab / 100);
    return { investmentAmount: amount, interestEarned: maturity - amount, maturityValue: maturity, taxSaved, totalBenefit: maturity + taxSaved, effectiveReturn: (Math.pow(maturity / amount, 1 / 5) - 1) * 100 };
}

// 18. ETF Calculator
function calcETF(type, amount, period, returnRate, expenseRatio, includeTradingCosts = false) {
    const netRate = (returnRate - expenseRatio) / 100;
    let grossFV, totalInv;
    if (type === 'sip') {
        const r = netRate / 12, n = period * 12;
        const monthlyAmount = amount / 12;
        totalInv = amount * period;
        grossFV = monthlyAmount * (((Math.pow(1 + r, n) - 1) / r) * (1 + r));
    } else {
        totalInv = amount;
        grossFV = amount * Math.pow(1 + netRate, period);
    }
    const tradingCosts = includeTradingCosts ? totalInv * 0.001 : 0;
    const gains = grossFV - totalInv - tradingCosts;
    const ltcgTax = gains > 125000 ? (gains - 125000) * 0.125 : 0;
    const netReturns = grossFV - tradingCosts - ltcgTax;
    const effectiveCAGR = (Math.pow(netReturns / totalInv, 1 / period) - 1) * 100;
    return { totalInvestment: totalInv, grossReturns: grossFV, expenseImpact: totalInv * (expenseRatio / 100) * period, tradingCosts, ltcgTax, netReturns, effectiveCAGR };
}

// 19. Simple Interest
function calcSimpleInterest(principal, rate, timeYears) {
    const interest = (principal * rate * timeYears) / 100;
    return { principal, interestRate: rate, timePeriod: timeYears, simpleInterest: interest, totalAmount: principal + interest, monthlyInterest: interest / (timeYears * 12) };
}

// 20. Compound Interest
function calcCompoundInterest(principal, rate, years, frequency) {
    const n = { yearly: 1, 'half-yearly': 2, quarterly: 4, monthly: 12, daily: 365 }[frequency] || 1;
    const amount = principal * Math.pow(1 + (rate / 100) / n, n * years);
    const interest = amount - principal;
    const ear = (Math.pow(1 + (rate / 100) / n, n) - 1) * 100;
    const siInterest = (principal * rate * years) / 100;
    return { principal, totalInterest: interest, finalAmount: amount, effectiveRate: ear, simpleInterestDiff: interest - siInterest };
}

// 21. STCG Tax
function calcSTCG(assetType, purchasePrice, sellPrice, purchaseDateOrMonths, sellDate, transactionCosts, taxSlab) {
    let holdingMonths;
    if (typeof purchaseDateOrMonths === 'number') {
        holdingMonths = purchaseDateOrMonths;
    } else {
        holdingMonths = (new Date(sellDate) - new Date(purchaseDateOrMonths)) / (1000 * 60 * 60 * 24 * 30);
    }
    const stcg = sellPrice - purchasePrice - transactionCosts;
    let tax = 0;
    if (assetType === 'equity') tax = holdingMonths < 12 ? stcg * 0.20 : 0;
    else tax = stcg * (taxSlab / 100);
    const netGain = stcg - tax;
    return { holdingPeriod: holdingMonths, capitalGains: stcg, stcgTax: tax, netGain, effectiveReturn: (netGain / purchasePrice) * 100, taxAsPctOfGains: stcg > 0 ? (tax / stcg) * 100 : 0 };
}

// Export to window
if (typeof window !== 'undefined') {
    Object.assign(window, {
        formatNumber,
        formatCurrency,
        calcSIP,
        calcLumpsum,
        calcSWP,
        calcMutualFund,
        calcSSY,
        calcPPF,
        calcEPF,
        calcFD,
        growwFdBreakdown,
        growwFdBreakdownDays,
        FD_DAY_INTEREST_NUM,
        FD_DAY_INTEREST_DEN,
        fdTenureToGrowwYears,
        calcBrokerage,
        calcMTF,
        calcCAGR,
        calcELSS,
        calcStepUpSIP,
        growwRdBreakdown,
        calcRD,
        calcPOFD,
        calcPORD,
        calcNSC,
        calcETF,
        calcSimpleInterest,
        calcCompoundInterest,
        calcSTCG
    });
}
