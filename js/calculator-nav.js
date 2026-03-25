/**
 * Calculator Sidebar Navigation
 * Injects the sidebar with links to all calculator pages
 */
const CALCULATOR_NAV = [
    { id: 'sip', name: 'SIP', href: 'calculator-sip.php', category: 'Investment' },
    { id: 'lumpsum', name: 'Lumpsum', href: 'calculator-lumpsum.php', category: 'Investment' },
    { id: 'swp', name: 'SWP', href: 'calculator-swp.php', category: 'Retirement' },
    { id: 'mutual-fund', name: 'Mutual Fund', href: 'calculator-mutual-fund.php', category: 'Investment' },
    { id: 'ssy', name: 'SSY', href: 'calculator-ssy.php', category: 'Retirement' },
    { id: 'ppf', name: 'PPF', href: 'calculator-ppf.php', category: 'Retirement' },
    { id: 'epf', name: 'EPF', href: 'calculator-epf.php', category: 'Retirement' },
    { id: 'fd', name: 'Fixed Deposit', href: 'calculator-fd.php', category: 'Interest' },
    { id: 'brokerage', name: 'Brokerage', href: 'calculator-brokerage.php', category: 'Trading' },
    { id: 'margin', name: 'Margin', href: 'calculator-margin.php', category: 'Trading', comingSoon: true },
    { id: 'mtf', name: 'MTF', href: 'calculator-mtf.php', category: 'Trading' },
    { id: 'cagr', name: 'CAGR', href: 'calculator-cagr.php', category: 'Investment' },
    { id: 'elss', name: 'ELSS', href: 'calculator-elss.php', category: 'Tax' },
    { id: 'step-up-sip', name: 'Step Up SIP', href: 'calculator-step-up-sip.php', category: 'Investment' },
    { id: 'rd', name: 'Recurring Deposit', href: 'calculator-rd.php', category: 'Interest' },
    { id: 'po-fd', name: 'Post Office FD', href: 'calculator-po-fd.php', category: 'Interest' },
    { id: 'po-rd', name: 'Post Office RD', href: 'calculator-po-rd.php', category: 'Interest' },
    { id: 'nsc', name: 'NSC', href: 'calculator-nsc.php', category: 'Tax' },
    { id: 'etf', name: 'ETF', href: 'calculator-etf.php', category: 'Investment' },
    { id: 'simple-interest', name: 'Simple Interest', href: 'calculator-simple-interest.php', category: 'Interest' },
    { id: 'compound-interest', name: 'Compound Interest', href: 'calculator-compound-interest.php', category: 'Interest' },
    { id: 'stcg', name: 'STCG Tax', href: 'calculator-stcg.php', category: 'Tax' }
];

function renderCalculatorSidebar(currentPage) {
    const sidebar = document.getElementById('calculatorSidebar');
    if (!sidebar) return;

    const splitIndex = Math.ceil(CALCULATOR_NAV.length / 2);
    const leftColumnItems = CALCULATOR_NAV.slice(0, splitIndex);
    const rightColumnItems = CALCULATOR_NAV.slice(splitIndex);

    const renderSectionItems = (items) => {
        let sectionHtml = '<ul class="calculator-nav-list">';
        items.forEach(item => {
            const isActive = currentPage === item.id || (currentPage && (item.href.includes(currentPage) || item.id === currentPage));
            const klass = item.comingSoon ? 'coming-soon' : (isActive ? 'active' : '');
            const href = item.comingSoon ? '#' : item.href;
            sectionHtml += `<li><a href="${href}" class="${klass}" ${item.comingSoon ? 'onclick="return false"' : ''}>${item.name}${item.comingSoon ? ' (Soon)' : ''}</a></li>`;
        });
        sectionHtml += '</ul>';
        return sectionHtml;
    };

    let html = '<h2 class="calculator-sidebar-title">All Calculators</h2>';
    html += '<div class="calculator-sidebar-section">';
    html += renderSectionItems(leftColumnItems);
    html += '</div>';

    html += '<div class="calculator-sidebar-section">';
    html += renderSectionItems(rightColumnItems);
    html += '</div>';

    sidebar.innerHTML = html;
}

document.addEventListener('DOMContentLoaded', function() {
    let currentCalc = document.body.getAttribute('data-calculator');
    if (!currentCalc && window.location.pathname) {
        const match = window.location.pathname.match(/calculator-([^.]+)/);
        currentCalc = match ? match[1].replace('.php', '').replace('.html', '') : null;
    }
    if (!currentCalc && window.location.href) {
        const path = window.location.href.split('/').pop() || '';
        CALCULATOR_NAV.forEach(item => {
            if (item.href === path) currentCalc = item.id;
        });
    }
    renderCalculatorSidebar(currentCalc);
    
    // Adjust top navigation links when in /pages/calculator/ subdirectory
    try {
        const isCalculatorSection = /\/pages\/calculator\//.test(window.location.pathname.replace(/\\/g, '/'));
        if (isCalculatorSection) {
            const prefixMap = new Map([
                ['gretex-financial.php', '../gretex-financial.php'],
                ['about.php', '../about.php'],
                ['downloads.php', '../downloads.php'],
                ['contact.php', '../contact.php'],
                ['Regulation46_LODR.php', '../Regulation46_LODR.php'],
                ['Regulation62_LODR.php', '../Regulation62_LODR.php'],
                ['OtherInvestor.php', '../OtherInvestor.php'],
                ['SubTab_CodeandPolicies.php', '../SubTab_CodeandPolicies.php'],
                ['SubTab_CorpSocialRespons.php', '../SubTab_CorpSocialRespons.php'],
                ['services.php', '../services/services.php'],
            ]);
            
            const adjustHref = (href) => {
                if (!href || href.startsWith('http') || href.startsWith('#') || href.startsWith('../')) return href;
                const [base, hash = ''] = href.split('#');
                if (base === 'calculators.php') return href; // same folder
                if (prefixMap.has(base)) {
                    const newBase = prefixMap.get(base);
                    return hash ? `${newBase}#${hash}` : newBase;
                }
                return href;
            };
            
            document.querySelectorAll('a[href]').forEach(a => {
                const original = a.getAttribute('href');
                const updated = adjustHref(original);
                if (updated !== original) a.setAttribute('href', updated);
            });
        }
    } catch (e) {
        // no-op
    }
});
