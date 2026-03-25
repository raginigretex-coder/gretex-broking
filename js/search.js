/**
 * Gretex Financial - Search Functionality
 * Handles navbar search with keyboard shortcuts and live results
 */

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('navSearchInput');
    const searchWrapper = document.querySelector('.search-wrapper');
    
    if (!searchInput) return;

    // Create search results container
    const searchResults = document.createElement('div');
    searchResults.className = 'search-results';
    searchWrapper.appendChild(searchResults);

    // Search data - pages and content
    const searchData = [
        {
            title: 'About Gretex',
            description: 'Learn about our company, mission, and values',
            url: 'about.php',
            keywords: ['about', 'company', 'mission', 'values', 'team']
        },
        {
            title: 'Financial Calculators',
            description: 'Access all our financial planning calculators',
            url: 'calculators.php',
            keywords: ['calculator', 'calculators', 'financial', 'planning', 'tools']
        },
        {
            title: 'SIP Calculator',
            description: 'Calculate returns on Systematic Investment Plans',
            url: 'calculator-sip.php',
            keywords: ['sip', 'systematic', 'investment', 'plan', 'mutual fund']
        },
        {
            title: 'Lumpsum Calculator',
            description: 'Estimate returns on one-time investments',
            url: 'calculator-lumpsum.php',
            keywords: ['lumpsum', 'one-time', 'investment', 'returns']
        },
        {
            title: 'Brokerage Calculator',
            description: 'Calculate trading charges and brokerage fees',
            url: 'calculator-brokerage.php',
            keywords: ['brokerage', 'trading', 'charges', 'fees', 'commission']
        },
        {
            title: 'Margin Calculator',
            description: 'Determine margin requirements for trading',
            url: 'calculator-margin.php',
            keywords: ['margin', 'trading', 'requirements', 'leverage']
        },
        {
            title: 'MTF Calculator',
            description: 'Calculate Margin Trading Facility costs',
            url: 'calculator-mtf.php',
            keywords: ['mtf', 'margin', 'trading', 'facility', 'leverage']
        },
        {
            title: 'SWP Calculator',
            description: 'Plan Systematic Withdrawal Plans',
            url: 'calculator-swp.php',
            keywords: ['swp', 'systematic', 'withdrawal', 'plan', 'income']
        },
        {
            title: 'Step-Up SIP Calculator',
            description: 'Calculate returns with increasing SIP amounts',
            url: 'calculator-step-up-sip.php',
            keywords: ['step-up', 'sip', 'increasing', 'investment']
        },
        {
            title: 'CAGR Calculator',
            description: 'Calculate Compound Annual Growth Rate',
            url: 'calculator-cagr.php',
            keywords: ['cagr', 'compound', 'annual', 'growth', 'rate']
        },
        {
            title: 'FD Calculator',
            description: 'Calculate Fixed Deposit returns',
            url: 'calculator-fd.php',
            keywords: ['fd', 'fixed', 'deposit', 'bank', 'interest']
        },
        {
            title: 'RD Calculator',
            description: 'Calculate Recurring Deposit returns',
            url: 'calculator-rd.php',
            keywords: ['rd', 'recurring', 'deposit', 'savings']
        },
        {
            title: 'PPF Calculator',
            description: 'Calculate Public Provident Fund returns',
            url: 'calculator-ppf.php',
            keywords: ['ppf', 'public', 'provident', 'fund', 'retirement']
        },
        {
            title: 'EPF Calculator',
            description: 'Calculate Employee Provident Fund returns',
            url: 'calculator-epf.php',
            keywords: ['epf', 'employee', 'provident', 'fund', 'retirement']
        },
        {
            title: 'NSC Calculator',
            description: 'Calculate National Savings Certificate returns',
            url: 'calculator-nsc.php',
            keywords: ['nsc', 'national', 'savings', 'certificate']
        },
        {
            title: 'SSY Calculator',
            description: 'Calculate Sukanya Samriddhi Yojana returns',
            url: 'calculator-ssy.php',
            keywords: ['ssy', 'sukanya', 'samriddhi', 'yojana', 'girl child']
        },
        {
            title: 'ELSS Calculator',
            description: 'Calculate Equity Linked Savings Scheme returns',
            url: 'calculator-elss.php',
            keywords: ['elss', 'equity', 'linked', 'savings', 'tax']
        },
        {
            title: 'ETF Calculator',
            description: 'Calculate Exchange Traded Fund returns',
            url: 'calculator-etf.php',
            keywords: ['etf', 'exchange', 'traded', 'fund']
        },
        {
            title: 'Mutual Fund Calculator',
            description: 'Calculate mutual fund investment returns',
            url: 'calculator-mutual-fund.php',
            keywords: ['mutual', 'fund', 'investment', 'returns']
        },
        {
            title: 'Simple Interest Calculator',
            description: 'Calculate simple interest on loans and deposits',
            url: 'calculator-simple-interest.php',
            keywords: ['simple', 'interest', 'loan', 'deposit']
        },
        {
            title: 'Compound Interest Calculator',
            description: 'Calculate compound interest on investments',
            url: 'calculator-compound-interest.php',
            keywords: ['compound', 'interest', 'investment', 'growth']
        },
        {
            title: 'STCG Calculator',
            description: 'Calculate Short Term Capital Gains tax',
            url: 'calculator-stcg.php',
            keywords: ['stcg', 'short', 'term', 'capital', 'gains', 'tax']
        },
        {
            title: 'Post Office FD Calculator',
            description: 'Calculate Post Office Fixed Deposit returns',
            url: 'calculator-po-fd.php',
            keywords: ['post', 'office', 'fd', 'fixed', 'deposit']
        },
        {
            title: 'Post Office RD Calculator',
            description: 'Calculate Post Office Recurring Deposit returns',
            url: 'calculator-po-rd.php',
            keywords: ['post', 'office', 'rd', 'recurring', 'deposit']
        },
        {
            title: 'Our Services',
            description: 'Explore our trading and investment services',
            url: 'services.php',
            keywords: ['services', 'trading', 'investment', 'equity', 'derivatives']
        },
        {
            title: 'Downloads',
            description: 'Download forms, documents, and resources',
            url: 'downloads.php',
            keywords: ['downloads', 'forms', 'documents', 'resources', 'pdf']
        },
        {
            title: 'Contact Us',
            description: 'Get in touch with our team',
            url: 'contact.php',
            keywords: ['contact', 'support', 'help', 'email', 'phone']
        },
        {
            title: 'Investor Relations - Regulation 46',
            description: 'Disclosures under Regulation 46 of the LODR',
            url: 'Regulation46_LODR.php',
            keywords: ['investor', 'relations', 'regulation', '46', 'lodr', 'disclosures']
        },
        {
            title: 'Group Companies Financials',
            description: 'Group Companies Financials and Annual Returns',
            url: 'Regulation62_LODR.php',
            keywords: ['group', 'companies', 'financials', 'annual', 'returns', 'regulation', '62']
        },
        {
            title: 'Other Investor Information',
            description: 'Additional information for investors',
            url: 'OtherInvestor.php',
            keywords: ['investor', 'information', 'other', 'details']
        },
        {
            title: 'Investor Contacts',
            description: 'Contact information for investor relations',
            url: 'SubTab_CodeandPolicies.php',
            keywords: ['investor', 'contacts', 'code', 'policies']
        },
        {
            title: 'Corporate Social Responsibility',
            description: 'Our CSR initiatives and commitments',
            url: 'SubTab_CorpSocialRespons.php',
            keywords: ['csr', 'corporate', 'social', 'responsibility', 'initiatives']
        },
        {
            title: 'Home',
            description: 'Return to homepage',
            url: 'gretex-financial.php',
            keywords: ['home', 'homepage', 'main', 'index']
        },
        // Client Corner Items
        {
            title: 'QR Code Payments for DP clients',
            description: 'Scan to pay for DP services',
            url: '../assets/client-corner/upi-qr-code-payments-for-dp-clients.png',
            keywords: ['qr', 'code', 'payment', 'dp', 'upi', 'client corner']
        },
        {
            title: 'QR Code Payments for Broking clients',
            description: 'Scan to pay for broking services',
            url: '../assets/client-corner/upi-QR-code-for-broking.png',
            keywords: ['qr', 'code', 'payment', 'broking', 'upi', 'client corner']
        },
        {
            title: 'Attention Investors',
            description: 'Important PDF notice for all investors',
            url: '../assets/client-corner/Attention Investors.pdf',
            keywords: ['attention', 'investor', 'notice', 'pdf', 'client corner']
        },
        {
            title: 'Investor Charter of Broking',
            description: 'Rights and responsibilities of broking clients',
            url: '../assets/client-corner/Investor Charter Broking SEBI 21-Feb-2025.pdf',
            keywords: ['charter', 'broking', 'investor', 'rights', 'client corner']
        },
        {
            title: 'Investor Charter of DP',
            description: 'Rights and responsibilities of DP clients',
            url: '../assets/client-corner/2024-0089-NSDL.pdf',
            keywords: ['charter', 'dp', 'depositories', 'investor', 'rights', 'client corner']
        },
        {
            title: 'Investor Complaints',
            description: 'Data on investor complaints received and resolved',
            url: '../assets/documents/2025-12-31 Annexure B& C- Investor Complaints Broking+DP.pdf',
            keywords: ['complaints', 'investor', 'grievances', 'redressal', 'client corner']
        },
        {
            title: 'Escalation Matrix',
            description: 'Contact details for escalations and grievances',
            url: '../assets/documents/2025-08-04 Escalation Matrix-3.pdf',
            keywords: ['matrix', 'escalation', 'complaint', 'grievance', 'client corner']
        },
        {
            title: 'Advice to Client in regional language',
            description: 'NSE advice to clients in various languages',
            url: 'https://www.nseindia.com/trade/members-client-registration-documents',
            keywords: ['advice', 'regional', 'language', 'nse', 'registration', 'client corner']
        },
        {
            title: 'Do\'s and Don\'ts to Safe Investing',
            description: 'Security tips for safe stock market investing',
            url: '../assets/documents/Dos-Donts.pdf',
            keywords: ['dos', 'donts', 'safe', 'investing', 'tips', 'client corner']
        },
        {
            title: 'Risk Disclosure on Derivatives',
            description: 'Understanding risks in F&O trading',
            url: '../assets/documents/Risk_Disclosure_on_Derivatives.pdf',
            keywords: ['risk', 'disclosure', 'derivatives', 'fo', 'trading', 'client corner']
        },
        {
            title: 'Online Dispute Resolution',
            description: 'SEBI SMART ODR portal for complaints',
            url: 'https://smartodr.in/intermediary/login',
            keywords: ['odr', 'online', 'dispute', 'resolution', 'sebi', 'smart', 'client corner']
        },
        {
            title: 'Policies',
            description: 'Company policies and terms of service',
            url: 'https://gretexbroking.com/policies.html',
            keywords: ['policies', 'terms', 'service', 'compliance', 'client corner']
        },
        {
            title: 'KRA validation status',
            description: 'Check your KRA (Know Your Client) status',
            url: 'https://kra.ndml.in/kra/ckyc/#/initiate',
            keywords: ['kra', 'validation', 'status', 'check', 'kyc', 'client corner']
        },
        {
            title: 'KRA Validation Process',
            description: 'Guide on how to validate your KRA status',
            url: 'https://gretexbroking.com/img/validate-KRA-status-2.2.pdf',
            keywords: ['kra', 'validation', 'process', 'guide', 'kyc', 'client corner']
        }
    ];

    // Detect if we're in pages subdirectory or root
    function getCorrectUrl(url) {
        // If it's an external link, return as is
        if (url.startsWith('http')) return url;
        
        const currentPath = window.location.pathname;
        const isInPagesDir = currentPath.includes('/pages/');
        
        if (isInPagesDir) {
            // We are already in pages/, so relative links to .php files are fine
            // But if it's an asset link starting with ../ we need to be careful
            return url;
        } else {
            // We are in root.
            // If it's a page in pages/, prefix with pages/
            // If it's an asset starting with ../assets, remove ../ and it becomes assets/
            if (url.startsWith('../')) {
                return url.substring(3);
            }
            return 'pages/' + url;
        }
    }

    // Search function
    function performSearch(query) {
        if (!query || query.trim().length < 2) {
            searchResults.classList.remove('active');
            return;
        }

        const lowerQuery = query.toLowerCase().trim();
        
        // 1. Filter Page Results
        const pageResults = searchData.filter(item => {
            const titleMatch = item.title.toLowerCase().includes(lowerQuery);
            const descMatch = item.description.toLowerCase().includes(lowerQuery);
            const keywordMatch = item.keywords.some(keyword => 
                keyword.toLowerCase().includes(lowerQuery)
            );
            return titleMatch || descMatch || keywordMatch;
        });

        // 2. Filter Content Results (from chatbot knowledge if available)
        let contentResults = [];
        if (typeof CHATBOT_FAQ !== 'undefined') {
            contentResults = CHATBOT_FAQ.filter(faq => {
                const qMatch = faq.q.some(q => q.toLowerCase().includes(lowerQuery));
                const aMatch = faq.a.toLowerCase().includes(lowerQuery);
                return qMatch || aMatch;
            }).map(faq => ({
                title: faq.q[0], // Use primary trigger as title
                description: faq.a.substring(0, 100) + (faq.a.length > 100 ? '...' : ''),
                type: 'content'
            }));
        }

        displayResults(pageResults, contentResults, query);
    }

    // Display search results
    function displayResults(pageResults, contentResults, query) {
        if (pageResults.length === 0 && contentResults.length === 0) {
            searchResults.innerHTML = `
                <div class="search-no-results">
                    <i data-lucide="search-x" style="width: 32px; height: 32px; margin-bottom: 0.5rem;"></i>
                    <p>No results found for "${query}"</p>
                </div>
            `;
            searchResults.classList.add('active');
            if (typeof lucide !== 'undefined') lucide.createIcons();
            return;
        }

        let resultsHTML = '';

        // Pages Section
        if (pageResults.length > 0) {
            resultsHTML += `<div class="search-category-title">Suggested Pages</div>`;
            resultsHTML += pageResults.slice(0, 5).map(item => `
                <div class="search-result-item" data-url="${getCorrectUrl(item.url)}">
                    <i data-lucide="file-text" class="result-type-icon"></i>
                    <div class="result-info">
                        <div class="search-result-title">${highlightMatch(item.title, query)}</div>
                        <div class="search-result-description">${item.description}</div>
                    </div>
                </div>
            `).join('');
        }

        // Content Section
        if (contentResults.length > 0) {
            resultsHTML += `<div class="search-category-title">Website Content</div>`;
            resultsHTML += contentResults.slice(0, 3).map(item => `
                <div class="search-result-item content-result" data-query="${item.title}">
                    <i data-lucide="help-circle" class="result-type-icon"></i>
                    <div class="result-info">
                        <div class="search-result-title">${highlightMatch(item.title, query)}</div>
                        <div class="search-result-description">${item.description}</div>
                    </div>
                </div>
            `).join('');
        }

        // Global Search Action
        resultsHTML += `
            <div class="search-global-action" onclick="window.location.href='${getCorrectUrl('gretex-financial.php')}?search=${encodeURIComponent(query)}'">
                <i data-lucide="globe"></i>
                <span>Search "<strong>${query}</strong>" across entire website</span>
            </div>
        `;

        searchResults.innerHTML = resultsHTML;
        searchResults.classList.add('active');
        if (typeof lucide !== 'undefined') lucide.createIcons();

        // Add click handlers
        searchResults.querySelectorAll('.search-result-item:not(.content-result)').forEach(item => {
            item.addEventListener('click', () => {
                window.location.href = item.dataset.url;
            });
        });

        // Chatbot integration for content results
        searchResults.querySelectorAll('.content-result').forEach(item => {
            item.addEventListener('click', () => {
                if (typeof window.openGretexChat === 'function') {
                    window.openGretexChat(item.dataset.query);
                } else {
                    // Fallback if chatbot not loaded
                    const chatbotBtn = document.getElementById('gretexChatbotToggle');
                    if (chatbotBtn) chatbotBtn.click();
                }
                searchResults.classList.remove('active');
                searchInput.value = '';
            });
        });
    }

    // Highlight matching text
    function highlightMatch(text, query) {
        const regex = new RegExp(`(${query})`, 'gi');
        return text.replace(regex, '<span class="highlight-text">$1</span>');
    }

    // Event listeners
    searchInput.addEventListener('input', (e) => {
        performSearch(e.target.value);
    });

    searchInput.addEventListener('focus', () => {
        if (searchInput.value.trim().length >= 2) {
            performSearch(searchInput.value);
        }
    });

    // Close results when clicking outside
    document.addEventListener('click', (e) => {
        if (!searchWrapper.contains(e.target)) {
            searchResults.classList.remove('active');
        }
    });

    // Keyboard shortcut: Press "/" to focus search
    document.addEventListener('keydown', (e) => {
        // Focus search on "/" key
        if (e.key === '/' && !['INPUT', 'TEXTAREA'].includes(document.activeElement.tagName)) {
            e.preventDefault();
            searchInput.focus();
        }

        // Clear and blur on Escape
        if (e.key === 'Escape' && document.activeElement === searchInput) {
            searchInput.value = '';
            searchInput.blur();
            searchResults.classList.remove('active');
        }

        // Navigate results with arrow keys
        if (searchResults.classList.contains('active')) {
            const items = searchResults.querySelectorAll('.search-result-item, .search-global-action');
            const activeItem = Array.from(items).find(el => el.classList.contains('active'));
            let currentIndex = Array.from(items).indexOf(activeItem);

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (activeItem) activeItem.classList.remove('active');
                currentIndex = (currentIndex + 1) % items.length;
                items[currentIndex].classList.add('active');
                items[currentIndex].scrollIntoView({ block: 'nearest' });
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (activeItem) activeItem.classList.remove('active');
                currentIndex = currentIndex <= 0 ? items.length - 1 : currentIndex - 1;
                items[currentIndex].classList.add('active');
                items[currentIndex].scrollIntoView({ block: 'nearest' });
            } else if (e.key === 'Enter' && activeItem) {
                e.preventDefault();
                activeItem.click();
            }
        }
    });

    // Enhanced Styling for Search Dropdown
    const style = document.createElement('style');
    style.textContent = `
        .search-category-title {
            padding: 0.75rem 1.25rem 0.4rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #94a3b8;
            font-weight: 700;
            background: rgba(248, 250, 252, 0.5);
        }
        .search-result-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }
        .result-type-icon {
            width: 16px;
            height: 16px;
            margin-top: 3px;
            color: #64748b;
        }
        .result-info {
            flex: 1;
        }
        .highlight-text {
            color: #1873E0;
            font-weight: 700;
            background: rgba(24, 115, 224, 0.05);
            padding: 0 2px;
            border-radius: 2px;
        }
        .search-global-action {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            background: linear-gradient(to right, rgba(24, 115, 224, 0.05), transparent);
            cursor: pointer;
            border-top: 1px solid rgba(24, 115, 224, 0.1);
            color: #1e293b;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        .search-global-action i {
            width: 18px;
            height: 18px;
            color: #1873E0;
        }
        .search-global-action:hover, .search-global-action.active {
            background: rgba(24, 115, 224, 0.1);
            color: #1873E0;
        }
        .search-result-item.active {
            background: rgba(24, 115, 224, 0.06) !important;
            border-left: 3px solid #1873E0;
            padding-left: calc(1.25rem - 3px);
        }
    `;
    document.head.appendChild(style);
});
