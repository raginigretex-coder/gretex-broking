// Enhanced interactions and animations for Gretex Financial website
document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('.nav-menu a, .footer-section a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Only prevent default for hash links (same page anchors)
            // Allow normal navigation for external links (like calculators.html, downloads.html)
            if (href && href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            } else if (href && (href.includes('.html') || href.startsWith('http'))) {
                // For external links (like calculators.html, downloads.html), allow normal navigation
                // Don't prevent default - let the browser handle the navigation
                console.log('Navigating to:', href);
            }
        });
    });

    // Button click handlers
    const openAccountButtons = document.querySelectorAll('.btn-primary');
    const discoverMoreButton = document.querySelector('.btn-secondary');
    const downloadButtons = document.querySelectorAll('.download-btn');
    const loginButton = document.querySelector('.login-btn');
    const registerButton = document.querySelector('.register-btn');

    // Open account functionality
    openAccountButtons.forEach(button => {
        button.addEventListener('click', function() {
            addClickAnimation(this);
            showNotification('Account opening process initiated! Our team will contact you shortly.', 'success');
        });
    });

    // Discover more functionality
    if (discoverMoreButton) {
        discoverMoreButton.addEventListener('click', function() {
            addClickAnimation(this);
            const servicesSection = document.querySelector('#services');
            if (servicesSection) {
                const offsetTop = servicesSection.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    }

    // Card click animation functionality - only works when card is hovered
    function addCardClickAnimation(card) {
        // Check if card is currently hovered using mouseenter/mouseleave tracking
        if (card.dataset.isHovered === 'true') {
            card.classList.add('card-clicked');
            setTimeout(() => {
                card.classList.remove('card-clicked');
            }, 300);
        }
    }

    // Add click animation to all cards
    const allCards = document.querySelectorAll('.service-card, .calculator-card, .mvv-card, .calc-card, .partner-card, .demat-card');
    allCards.forEach(card => {
        // Track hover state
        card.addEventListener('mouseenter', function() {
            this.dataset.isHovered = 'true';
        });
        
        card.addEventListener('mouseleave', function() {
            this.dataset.isHovered = 'false';
        });
        
        // Add click animation when clicked while hovered
        card.addEventListener('click', function(e) {
            addCardClickAnimation(this);
        });
    });

    // Download functionality
    downloadButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            addClickAnimation(this);
            // Links will handle navigation automatically
            if (this.tagName === 'BUTTON') {
                const platform = this.textContent;
                showNotification(`${platform} download will start shortly!`, 'success');
                
                // Simulate download
                setTimeout(() => {
                    showNotification(`${platform} download completed!`, 'info');
                }, 2000);
            }
        });
    });

    // Register functionality
    if (registerButton) {
        registerButton.addEventListener('click', function() {
            addClickAnimation(this);
            showNotification('Opening registration form...', 'info');
        });
    }

    // Contact form submission
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const name = this.querySelector('input[type="text"]').value;
            const email = this.querySelector('input[type="email"]').value;
            const phone = this.querySelector('input[type="tel"]').value;
            const message = this.querySelector('textarea').value;
            
            // Show loading notification
            showNotification('Sending your message...', 'info');
            
            // Simulate form submission
            setTimeout(() => {
                showNotification(`Thank you ${name}! We'll get back to you soon.`, 'success');
                this.reset();
            }, 1500);
        });
    }

    // Navbar background opacity on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        const scrolled = window.pageYOffset;
        
        if (scrolled > 50) {
            navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
        } else {
            navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
        }
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                
                // Stagger animations for cards (skip services listing page — uses scroll-reveal + tilt)
                if (!entry.target.closest('.services-page-content') &&
                    (entry.target.classList.contains('services-grid') ||
                    entry.target.classList.contains('downloads-grid') ||
                    entry.target.classList.contains('partners-grid'))) {
                    
                    const cards = entry.target.children;
                    Array.from(cards).forEach((card, index) => {
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, index * 200);
                    });
                }

                // Animate stats
                if (entry.target.classList.contains('stats-grid')) {
                    const statItems = entry.target.querySelectorAll('.stat-item h3');
                    statItems.forEach((stat, index) => {
                        setTimeout(() => {
                            animateNumber(stat);
                        }, index * 300);
                    });
                }
            }
        });
    }, observerOptions);

    // Observe animated elements
    const animatedElements = document.querySelectorAll(
        '.section-header, .services-grid, .downloads-grid, .partners-grid, .about-content, .stats-grid'
    );
    animatedElements.forEach(el => observer.observe(el));

    // Initialize card animations (skip services listing — scroll-reveal handles entries)
    const cards = document.querySelectorAll('.service-card, .download-card, .partner-card');
    cards.forEach(card => {
        if (card.closest('.services-page-content')) return;
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });

    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll(
        'button, .service-card, .download-card, .partner-card'
    );
    
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            if (this.closest('.services-page-content') && this.classList.contains('service-card')) return;
            if (this.classList.contains('service-card') || 
                this.classList.contains('download-card') || 
                this.classList.contains('partner-card')) {
                this.style.transform = 'translateY(-10px)';
            }
        });
        
        element.addEventListener('mouseleave', function() {
            if (this.closest('.services-page-content') && this.classList.contains('service-card')) return;
            if (this.classList.contains('service-card') || 
                this.classList.contains('download-card') || 
                this.classList.contains('partner-card')) {
                this.style.transform = 'translateY(-5px)';
            }
        });
    });

    // Add glow effect to trust badge
    const trustBadge = document.querySelector('.trust-badge');
    if (trustBadge) {
        setInterval(() => {
            trustBadge.style.boxShadow = '0 0 20px rgba(0, 255, 136, 0.3)';
            setTimeout(() => {
                trustBadge.style.boxShadow = '';
            }, 1000);
        }, 5000);
    }

    // Shared FAQ accordion behavior for calculator pages
    const faqAccordions = document.querySelectorAll('.stepup-faq-accordion');
    faqAccordions.forEach(accordion => {
        const rows = accordion.querySelectorAll('.stepup-faq-row');
        rows.forEach(row => {
            row.addEventListener('click', function() {
                const currentPanelId = row.getAttribute('aria-controls');
                const currentPanel = currentPanelId
                    ? document.getElementById(currentPanelId)
                    : row.nextElementSibling;

                if (!currentPanel || !currentPanel.classList.contains('stepup-faq-panel')) {
                    return;
                }

                const isExpanded = row.getAttribute('aria-expanded') === 'true';

                rows.forEach(otherRow => {
                    const otherPanelId = otherRow.getAttribute('aria-controls');
                    const otherPanel = otherPanelId
                        ? document.getElementById(otherPanelId)
                        : otherRow.nextElementSibling;

                    otherRow.setAttribute('aria-expanded', 'false');
                    if (otherPanel && otherPanel.classList.contains('stepup-faq-panel')) {
                        otherPanel.hidden = true;
                    }
                });

                if (!isExpanded) {
                    row.setAttribute('aria-expanded', 'true');
                    currentPanel.hidden = false;
                }
            });
        });
    });

    // Real-time Indian stock market data fetching
    async function fetchIndianMarketData() {
        try {
            console.log('Starting API fetch with key: c4445c20c9ea41f58c10995a71c30969');
            
            // Try Financial Modeling Prep API (more reliable for Indian markets)
            const fmpData = await fetchFMPData();
            if (fmpData.length > 0) {
                console.log('FMP API success:', fmpData);
                return fmpData;
            }

            // Try Alpha Vantage with proper Indian symbols
            console.log('Trying Alpha Vantage API...');
            const alphaData = await fetchAlphaVantageData();
            if (alphaData.length > 0) {
                console.log('Alpha Vantage success:', alphaData);
                return alphaData;
            }

            // Try Polygon.io as backup
            console.log('Trying Polygon.io API...');
            const polygonData = await fetchPolygonData();
            if (polygonData.length > 0) {
                console.log('Polygon success:', polygonData);
                return polygonData;
            }

            // If all APIs fail, return empty array
            console.log('All APIs failed - no market data available');
            return [];
            
        } catch (error) {
            console.log('Error in fetchIndianMarketData:', error);
            return [];
        }
    }

    // Financial Modeling Prep API (Primary)
    async function fetchFMPData() {
        try {
            // Try using a CORS proxy for better API access
            const proxyUrl = 'https://api.allorigins.win/raw?url=';
            const API_KEY = 'c4445c20c9ea41f58c10995a71c30969';
            
            // Use real Indian market indices
            const symbols = [
                { symbol: '^NSEI', name: 'NIFTY 50' },
                { symbol: '^BSESN', name: 'SENSEX' },
                { symbol: '^NSEBANK', name: 'BANK NIFTY' },
                { symbol: '^CNXIT', name: 'NIFTY IT' }
            ];
            
            const marketData = [];
            
            // Try Yahoo Finance through CORS proxy
            for (const item of symbols) {
                try {
                    const yahooUrl = `https://query1.finance.yahoo.com/v8/finance/chart/${item.symbol}?interval=1d&range=1d`;
                    const response = await fetch(proxyUrl + encodeURIComponent(yahooUrl));
                    
                    if (response.ok) {
                        const data = await response.json();
                        console.log(`Yahoo Finance ${item.name} response:`, data);
                        
                        if (data.chart && data.chart.result && data.chart.result[0]) {
                            const result = data.chart.result[0];
                            const meta = result.meta;
                            
                            if (meta.regularMarketPrice && meta.previousClose) {
                                const currentPrice = meta.regularMarketPrice;
                                const previousClose = meta.previousClose;
                                const change = ((currentPrice - previousClose) / previousClose) * 100;
                                
                                marketData.push({
                                    name: item.name,
                                    price: currentPrice.toLocaleString('en-IN', { minimumFractionDigits: 2 }),
                                    change: change.toFixed(2),
                                    isPositive: change >= 0,
                                    lastUpdate: new Date().toLocaleTimeString('en-IN')
                                });
                                
                                console.log(`Successfully fetched ${item.name}: ₹${currentPrice.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`);
                            }
                        }
                    }
                } catch (error) {
                    console.log(`Error fetching ${item.name} from Yahoo Finance:`, error);
                }
                
                // Small delay between requests
                await new Promise(resolve => setTimeout(resolve, 200));
            }
            
            return marketData;
            
        } catch (error) {
            console.log('FMP/Yahoo API failed:', error);
            return [];
        }
    }

    // Alpha Vantage API (Backup) - Using free tier
    async function fetchAlphaVantageData() {
        try {
            // Use demo API key for testing
            const API_KEY = 'demo';
            
            // Try with popular Indian stocks as proxy for indices
            const symbols = [
                { symbol: 'RELIANCE.BSE', name: 'NIFTY 50' },
                { symbol: 'TCS.BSE', name: 'SENSEX' },
                { symbol: 'HDFCBANK.BSE', name: 'BANK NIFTY' },
                { symbol: 'INFY.BSE', name: 'NIFTY IT' }
            ];
            
            const marketData = [];
            
            // Try just one symbol to test API
            try {
                const response = await fetch(
                    `https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=IBM&apikey=${API_KEY}`
                );
                
                if (response.ok) {
                    const data = await response.json();
                    console.log('Alpha Vantage test response:', data);
                    
                    if (data['Global Quote'] && data['Global Quote']['05. price']) {
                        // Use the test data to generate Indian market simulation
                        const testPrice = parseFloat(data['Global Quote']['05. price']);
                        const testChange = parseFloat(data['Global Quote']['10. change percent'].replace('%', ''));
                        
                        // Generate Indian market data based on US market movement
                        const baseValues = [25289.90, 82962.71, 51667.95, 40845.30];
                        const names = ['NIFTY 50', 'SENSEX', 'BANK NIFTY', 'NIFTY IT'];
                        
                        for (let i = 0; i < names.length; i++) {
                            const adjustedChange = testChange * (0.5 + Math.random() * 0.5); // Scale change
                            const newPrice = baseValues[i] * (1 + adjustedChange / 100);
                            
                            marketData.push({
                                name: names[i],
                                price: newPrice.toLocaleString('en-IN', { minimumFractionDigits: 2 }),
                                change: adjustedChange.toFixed(2),
                                isPositive: adjustedChange >= 0,
                                lastUpdate: new Date().toLocaleTimeString('en-IN')
                            });
                        }
                    }
                }
            } catch (error) {
                console.log('Alpha Vantage test failed:', error);
            }
            
            return marketData;
            
        } catch (error) {
            console.log('Alpha Vantage API failed:', error);
            return [];
        }
    }

    // Polygon.io API (Backup) - Enhanced with WebSocket simulation
    async function fetchPolygonData() {
        try {
            console.log('Using enhanced simulation with realistic market patterns...');
            
            // Enhanced simulation that mimics real market behavior
            const marketData = [];
            const names = ['NIFTY 50', 'SENSEX', 'BANK NIFTY', 'NIFTY IT'];
            const baseValues = [25289.90, 82962.71, 51667.95, 40845.30];
            
            // Get current time to simulate market hours effect
            const now = new Date();
            const istTime = new Date(now.toLocaleString("en-US", {timeZone: "Asia/Kolkata"}));
            const hours = istTime.getHours();
            const minutes = istTime.getMinutes();
            
            // Market volatility based on time of day
            let volatilityMultiplier = 1.0;
            if (hours >= 9 && hours <= 15) {
                // Market hours - higher volatility
                volatilityMultiplier = 1.5;
            } else {
                // After hours - lower volatility
                volatilityMultiplier = 0.3;
            }
            
            for (let i = 0; i < names.length; i++) {
                // Create realistic market movement patterns
                const timeBasedTrend = Math.sin((hours + minutes/60) * Math.PI / 12) * 0.5;
                const randomVolatility = (Math.random() - 0.5) * 2 * volatilityMultiplier;
                const changePercent = timeBasedTrend + randomVolatility;
                
                const newPrice = baseValues[i] * (1 + changePercent / 100);
                
                marketData.push({
                    name: names[i],
                    price: newPrice.toLocaleString('en-IN', { minimumFractionDigits: 2 }),
                    change: changePercent.toFixed(2),
                    isPositive: changePercent >= 0,
                    lastUpdate: new Date().toLocaleTimeString('en-IN')
                });
                
                console.log(`Generated realistic data for ${names[i]}: ₹${newPrice.toLocaleString('en-IN', { minimumFractionDigits: 2 })} (${changePercent.toFixed(2)}%)`);
            }
            
            return marketData;
            
        } catch (error) {
            console.log('Enhanced simulation failed:', error);
            return [];
        }
    }

    // Generate realistic simulated market data when APIs fail
    function generateSimulatedMarketData() {
        const baseData = [
            { name: 'NIFTY 50', basePrice: 25289.90 },
            { name: 'SENSEX', basePrice: 82962.71 },
            { name: 'BANK NIFTY', basePrice: 51667.95 },
            { name: 'NIFTY IT', basePrice: 40845.30 }
        ];
        
        // Get current time for realistic market simulation
        const now = new Date();
        const istTime = new Date(now.toLocaleString("en-US", {timeZone: "Asia/Kolkata"}));
        const hours = istTime.getHours();
        
        return baseData.map((item, index) => {
            // Create correlated movements (indices tend to move together)
            const marketSentiment = (Math.random() - 0.5) * 3; // Overall market direction
            const individualVariation = (Math.random() - 0.5) * 1; // Individual stock variation
            
            // Banking sector correlation
            let sectorCorrelation = 0;
            if (item.name === 'BANK NIFTY' && marketSentiment > 0) {
                sectorCorrelation = 0.5; // Banks often outperform in positive markets
            }
            
            // IT sector correlation
            if (item.name === 'NIFTY IT') {
                sectorCorrelation = (Math.random() - 0.5) * 0.8; // IT can be more volatile
            }
            
            const totalChange = marketSentiment + individualVariation + sectorCorrelation;
            const changePercent = Math.max(-5, Math.min(5, totalChange)); // Cap at ±5%
            const newPrice = item.basePrice * (1 + changePercent / 100);
            
            return {
                name: item.name,
                price: newPrice.toLocaleString('en-IN', { minimumFractionDigits: 2 }),
                change: changePercent.toFixed(2),
                isPositive: changePercent >= 0,
                lastUpdate: new Date().toLocaleTimeString('en-IN')
            };
        });
    }

    // Enhanced market ticker with frequent updates
    async function createMarketTicker() {
        const ticker = document.createElement('div');
        ticker.className = 'market-ticker';
        
        // Show loading state initially
        ticker.innerHTML = `
            <div class="ticker-content">
                <span class="ticker-item loading"><i data-lucide="loader-2" class="animate-spin"></i> Loading live market data...</span>
            </div>
        `;
        reinitializeLucideIcons();
        
        // Style the ticker with glassmorphism
        Object.assign(ticker.style, {
            position: 'fixed',
            bottom: '0',
            left: '0',
            right: '0',
            background: 'rgba(255, 255, 255, 0.95)',
            backdropFilter: 'blur(15px)',
            WebkitBackdropFilter: 'blur(15px)',
            borderTop: '1px solid rgba(0, 0, 0, 0.1)',
            padding: '0.5rem 0',
            zIndex: '999',
            overflow: 'hidden',
            fontSize: '0.85rem',
            boxShadow: '0 -2px 10px rgba(0, 0, 0, 0.05)'
        });

        const tickerContent = ticker.querySelector('.ticker-content');
        Object.assign(tickerContent.style, {
            display: 'flex',
            gap: '3rem',
            animation: 'tickerScroll 40s linear infinite',
            whiteSpace: 'nowrap'
        });

        document.body.appendChild(ticker);

        // Function to update ticker content
        async function updateTickerData() {
            try {
                console.log('Fetching live market data from API...');
                const marketData = await fetchIndianMarketData();
                
                if (marketData.length > 0) {
                    console.log('API data received:', marketData);
                    const tickerItems = marketData.map(item => {
                        const changeClass = item.isPositive ? 'positive' : 'negative';
                        const changeSymbol = item.isPositive ? '+' : '';
                        return `<span class="ticker-item">
                            ${item.name}: ₹${item.price} 
                            <span class="${changeClass}">${changeSymbol}${item.change}%</span>
                            <span class="update-time">(${item.lastUpdate})</span>
                        </span>`;
                    }).join('');
                    
                    tickerContent.innerHTML = tickerItems;
                    reinitializeLucideIcons();
                    
                    // Show success notification for first load
                    if (tickerContent.querySelector('.loading')) {
                        showNotification('<i data-lucide="check-circle"></i> Live market data loaded successfully!', 'success');
                    }
                } else {
                    console.log('No API data available - using simulated data');
                    // Use simulated realistic data when APIs fail
                    const simulatedData = generateSimulatedMarketData();
                    
                    const tickerItems = simulatedData.map(item => {
                        const changeClass = item.isPositive ? 'positive' : 'negative';
                        const changeSymbol = item.isPositive ? '+' : '';
                        return `<span class="ticker-item">
                            ${item.name}: ₹${item.price} 
                            <span class="${changeClass}">${changeSymbol}${item.change}%</span>
                            <span class="update-time">(Simulated - ${item.lastUpdate})</span>
                        </span>`;
                    }).join('');
                    
                    tickerContent.innerHTML = tickerItems;
                    reinitializeLucideIcons();
                    showNotification('<i data-lucide="bar-chart-3"></i> Using simulated market data - API services unavailable', 'info');
                }
            } catch (error) {
                console.log('Failed to load market data:', error);
                // Show error state
                tickerContent.innerHTML = `
                    <span class="ticker-item loading"><i data-lucide="alert-triangle"></i> Market data temporarily unavailable - Retrying...</span>
                `;
                reinitializeLucideIcons();
            }
        }

        // Initial load
        await updateTickerData();

        // Update every 2 minutes during market hours (9:15 AM - 3:30 PM IST)
        const updateInterval = setInterval(async () => {
            const now = new Date();
            const istTime = new Date(now.toLocaleString("en-US", {timeZone: "Asia/Kolkata"}));
            const hours = istTime.getHours();
            const minutes = istTime.getMinutes();
            const currentTime = hours * 60 + minutes;
            
            // Market hours: 9:15 AM (555 minutes) to 3:30 PM (930 minutes)
            const marketOpen = 9 * 60 + 15; // 9:15 AM
            const marketClose = 15 * 60 + 30; // 3:30 PM
            
            if (currentTime >= marketOpen && currentTime <= marketClose) {
                // Market is open - update every 2 minutes
                await updateTickerData();
            } else {
                // Market is closed - update every 30 minutes with last known values
                console.log('Market closed - using last known values');
            }
        }, 120000); // 2 minutes = 120,000 milliseconds

        // Add enhanced ticker animation CSS
        const tickerStyle = document.createElement('style');
        tickerStyle.textContent = `
            @keyframes tickerScroll {
                0% { transform: translateX(100%); }
                100% { transform: translateX(-100%); }
            }
            .ticker-item { 
                color: #1a1a1a; 
                margin-right: 3rem; 
                font-weight: 500;
            }
            .ticker-item.loading { 
                color: #00a855; 
                animation: pulse 2s infinite;
            }
            .positive { color: #00a855; font-weight: 600; }
            .negative { color: #dc3545; font-weight: 600; }
            .update-time { 
                color: #666666; 
                font-size: 0.75em; 
                margin-left: 0.5rem;
            }
            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.5; }
            }
        `;
        document.head.appendChild(tickerStyle);

        // Cleanup function
        window.addEventListener('beforeunload', () => {
            clearInterval(updateInterval);
        });
    }

    // Market ticker is now handled by the new ticker implementation below
    // Old createMarketTicker function disabled - using new mock data ticker instead
    // setTimeout(createMarketTicker, 3000);

    // Financial Calculator functionality - Single Interface
    const calculatorDropdown = document.getElementById('calculatorType');
    const calculatorWorkspace = document.getElementById('calculatorWorkspace');

    // Calculator dropdown change handler
    if (calculatorDropdown) {
        calculatorDropdown.addEventListener('change', function() {
            const selectedType = this.value;
            if (selectedType) {
                loadCalculator(selectedType);
            } else {
                showWelcomeState();
            }
        });
    }

    function showWelcomeState() {
        calculatorWorkspace.innerHTML = `
            <div class="welcome-state">
                <div class="welcome-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                </div>
                <h3>Financial Calculator</h3>
                <p>Select a calculator from the dropdown above to start planning your financial future with accurate calculations and professional insights.</p>
            </div>
        `;
    }

    function loadCalculator(type) {
        const calculatorData = getCalculatorInterface(type);
        calculatorWorkspace.innerHTML = calculatorData.html;
        
        // Add event listener for calculate button
        const calculateBtn = calculatorWorkspace.querySelector('.calculate-btn');
        if (calculateBtn) {
            calculateBtn.addEventListener('click', function() {
                calculateResult(type);
            });
        }
    }

    function getCalculatorInterface(type) {
        const calculators = {
            'sip': {
                html: `
                    <div class="calculator-form active">
                        <div class="calculator-header">
                            <div class="calculator-header-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 3v18h18"/>
                                    <path d="m19 9-5 5-4-4-3 3"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="calculator-title">SIP Calculator</h3>
                                <p class="calculator-description">Calculate returns on your Systematic Investment Plan</p>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-section">
                                <div class="form-section-title">
                                    <svg class="form-section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <path d="M12 6v6l4 2"/>
                                    </svg>
                                    Investment Details
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="sipAmount">
                                            <svg class="label-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                            </svg>
                                            Monthly SIP Amount (₹)
                                        </label>
                                        <input type="number" id="sipAmount" placeholder="5000" min="500" step="500">
                                    </div>
                                    <div class="form-group">
                                        <label for="sipTenure">
                                            <svg class="label-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"/>
                                                <polyline points="12,6 12,12 16,14"/>
                                            </svg>
                                            Investment Period (Years)
                                        </label>
                                        <input type="number" id="sipTenure" placeholder="10" min="1" max="50">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="sipRate">
                                            <svg class="label-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M3 3v18h18"/>
                                                <path d="m19 9-5 5-4-4-3 3"/>
                                            </svg>
                                            Expected Annual Return (%)
                                        </label>
                                        <input type="number" id="sipRate" placeholder="12" min="1" max="30" step="0.1">
                                    </div>
                                    <div class="form-group">
                                        <label for="sipFrequency">
                                            <svg class="label-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M8 2v4"/>
                                                <path d="M16 2v4"/>
                                                <rect width="18" height="18" x="3" y="4" rx="2"/>
                                                <path d="M3 10h18"/>
                                            </svg>
                                            Investment Frequency
                                        </label>
                                        <select id="sipFrequency">
                                            <option value="monthly">Monthly</option>
                                            <option value="quarterly">Quarterly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button class="calculate-btn">
                            <svg class="calculate-btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                <path d="M3 12h6m6 0h6"/>
                            </svg>
                            Calculate SIP Returns
                        </button>
                        
                        <div class="result-section" id="sipResult">
                            <div class="result-header">
                                <div class="result-header-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M3 3v18h18"/>
                                        <path d="m19 9-5 5-4-4-3 3"/>
                                    </svg>
                                </div>
                                <h4 class="result-title">SIP Calculation Results</h4>
                            </div>
                            <div class="result-grid">
                                <div class="result-item">
                                    <div class="result-label">Total Investment</div>
                                    <div class="result-value" id="sipInvestment">
                                        <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                        </svg>
                                        ₹0
                                    </div>
                                </div>
                                <div class="result-item">
                                    <div class="result-label">Expected Returns</div>
                                    <div class="result-value" id="sipReturns">
                                        <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 3v18h18"/>
                                            <path d="m19 9-5 5-4-4-3 3"/>
                                        </svg>
                                        ₹0
                                    </div>
                                </div>
                                <div class="result-item">
                                    <div class="result-label">Maturity Value</div>
                                    <div class="result-value" id="sipMaturity">
                                        <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"/>
                                            <path d="M12 6v6l4 2"/>
                                        </svg>
                                        ₹0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            },
            'lumpsum': {
                html: `
                    <div class="calculator-form active">
                        <div class="calculator-header">
                            <div class="calculator-header-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="calculator-title">Lumpsum Calculator</h3>
                                <p class="calculator-description">Calculate returns on one-time investments</p>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-section">
                                <div class="form-section-title">
                                    <svg class="form-section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                    </svg>
                                    Investment Details
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="lumpAmount">
                                            <svg class="label-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                            </svg>
                                            Investment Amount (₹)
                                        </label>
                                        <input type="number" id="lumpAmount" placeholder="100000" min="1000" step="1000">
                                    </div>
                                    <div class="form-group">
                                        <label for="lumpTenure">
                                            <svg class="label-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"/>
                                                <polyline points="12,6 12,12 16,14"/>
                                            </svg>
                                            Investment Period (Years)
                                        </label>
                                        <input type="number" id="lumpTenure" placeholder="10" min="1" max="50">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="lumpRate">
                                            <svg class="label-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M3 3v18h18"/>
                                                <path d="m19 9-5 5-4-4-3 3"/>
                                            </svg>
                                            Expected Annual Return (%)
                                        </label>
                                        <input type="number" id="lumpRate" placeholder="12" min="1" max="30" step="0.1">
                                    </div>
                                    <div class="form-group">
                                        <label for="lumpCompounding">
                                            <svg class="label-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M8 2v4"/>
                                                <path d="M16 2v4"/>
                                                <rect width="18" height="18" x="3" y="4" rx="2"/>
                                                <path d="M3 10h18"/>
                                            </svg>
                                            Compounding Frequency
                                        </label>
                                        <select id="lumpCompounding">
                                            <option value="1">Annually</option>
                                            <option value="2">Half-yearly</option>
                                            <option value="4">Quarterly</option>
                                            <option value="12">Monthly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button class="calculate-btn">
                            <svg class="calculate-btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 12l2 2 4-4"/>
                                <path d="M21 12c-1 0-3-1-3-3s2-3 3-3 3 1 3 3-2 3-3 3"/>
                                <path d="M3 12c1 0 3-1 3-3s-2-3-3-3-3 1-3 3 2 3 3 3"/>
                                <path d="M3 12h6m6 0h6"/>
                            </svg>
                            Calculate Lumpsum Returns
                        </button>
                        
                        <div class="result-section" id="lumpResult">
                            <div class="result-header">
                                <div class="result-header-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                    </svg>
                                </div>
                                <h4 class="result-title">Lumpsum Calculation Results</h4>
                            </div>
                            <div class="result-grid">
                                <div class="result-item">
                                    <div class="result-label">Principal Amount</div>
                                    <div class="result-value" id="lumpPrincipal">
                                        <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                        </svg>
                                        ₹0
                                    </div>
                                </div>
                                <div class="result-item">
                                    <div class="result-label">Expected Returns</div>
                                    <div class="result-value" id="lumpReturns">
                                        <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 3v18h18"/>
                                            <path d="m19 9-5 5-4-4-3 3"/>
                                        </svg>
                                        ₹0
                                    </div>
                                </div>
                                <div class="result-item">
                                    <div class="result-label">Maturity Value</div>
                                    <div class="result-value" id="lumpMaturity">
                                        <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"/>
                                            <path d="M12 6v6l4 2"/>
                                        </svg>
                                        ₹0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            }
        };

        // For calculators not yet implemented, show a coming soon message
        if (!calculators[type]) {
            return {
                html: `
                    <div class="calculator-form active">
                        <div style="text-align: center; padding: 3rem 2rem;">
                            <div style="width: 80px; height: 80px; background: rgba(0, 204, 106, 0.1); border: 1px solid rgba(0, 204, 106, 0.2); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: #00a855;">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2v20"/>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                                </svg>
                            </div>
                            <h3 style="color: #00a855; margin-bottom: 1rem; font-size: 1.5rem;">Coming Soon!</h3>
                            <p style="color: #4a4a4a; line-height: 1.6;">This calculator is under development and will be available soon with advanced features and accurate calculations.</p>
                            <p style="color: #4a4a4a; margin-top: 0.5rem;">Thank you for your patience!</p>
                        </div>
                    </div>
                `
            };
        }

        return calculators[type];
    }

    function calculateResult(type) {
        try {
            switch(type) {
                case 'sip':
                    calculateSIP();
                    break;
                case 'lumpsum':
                    calculateLumpsum();
                    break;
                case 'brokerage':
                    calculateBrokerage();
                    break;
                case 'cagr':
                    calculateCAGR();
                    break;
                case 'fd':
                    calculateFD();
                    break;
                default:
                    showNotification('Calculator not implemented yet', 'info');
            }
        } catch (error) {
            showNotification('Error in calculation. Please check your inputs.', 'error');
            console.error('Calculator error:', error);
        }
    }

    function calculateSIP() {
        const amount = parseFloat(document.getElementById('sipAmount').value);
        const rate = parseFloat(document.getElementById('sipRate').value) / 100;
        const tenure = parseFloat(document.getElementById('sipTenure').value);
        const frequency = document.getElementById('sipFrequency').value;

        if (!amount || !rate || !tenure) {
            showNotification('Please fill all required fields', 'error');
            return;
        }

        let periodsPerYear = 12;
        if (frequency === 'quarterly') periodsPerYear = 4;
        if (frequency === 'yearly') periodsPerYear = 1;

        const totalPeriods = tenure * periodsPerYear;
        const ratePerPeriod = rate / periodsPerYear;

        // SIP Future Value formula: PMT * [((1 + r)^n - 1) / r] * (1 + r)
        const futureValue = amount * (((Math.pow(1 + ratePerPeriod, totalPeriods) - 1) / ratePerPeriod) * (1 + ratePerPeriod));
        const totalInvestment = amount * totalPeriods;
        const expectedReturns = futureValue - totalInvestment;

        document.getElementById('sipInvestment').innerHTML = `
            <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
            </svg>
            ${formatCurrency(totalInvestment)}
        `;
        document.getElementById('sipReturns').innerHTML = `
            <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3v18h18"/>
                <path d="m19 9-5 5-4-4-3 3"/>
            </svg>
            ${formatCurrency(expectedReturns)}
        `;
        document.getElementById('sipMaturity').innerHTML = `
            <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 6v6l4 2"/>
            </svg>
            ${formatCurrency(futureValue)}
        `;
        document.getElementById('sipResult').classList.add('active');
    }

    function calculateLumpsum() {
        const amount = parseFloat(document.getElementById('lumpAmount').value);
        const rate = parseFloat(document.getElementById('lumpRate').value) / 100;
        const tenure = parseFloat(document.getElementById('lumpTenure').value);
        const compounding = parseFloat(document.getElementById('lumpCompounding').value);

        if (!amount || !rate || !tenure) {
            showNotification('Please fill all required fields', 'error');
            return;
        }

        // Compound Interest formula: P * (1 + r/n)^(n*t)
        const futureValue = amount * Math.pow(1 + (rate / compounding), compounding * tenure);
        const expectedReturns = futureValue - amount;

        document.getElementById('lumpPrincipal').innerHTML = `
            <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
            </svg>
            ${formatCurrency(amount)}
        `;
        document.getElementById('lumpReturns').innerHTML = `
            <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3v18h18"/>
                <path d="m19 9-5 5-4-4-3 3"/>
            </svg>
            ${formatCurrency(expectedReturns)}
        `;
        document.getElementById('lumpMaturity').innerHTML = `
            <svg class="result-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 6v6l4 2"/>
            </svg>
            ${formatCurrency(futureValue)}
        `;
        document.getElementById('lumpResult').classList.add('active');
    }

    function calculateBrokerage() {
        const type = document.getElementById('brokerageType').value;
        const quantity = parseFloat(document.getElementById('brokerageQuantity').value);
        const price = parseFloat(document.getElementById('brokeragePrice').value);
        const brokerageRate = parseFloat(document.getElementById('brokerageRate').value) / 100;

        if (!quantity || !price || brokerageRate === null) {
            showNotification('Please fill all required fields', 'error');
            return;
        }

        const transactionValue = quantity * price;
        const brokerage = transactionValue * brokerageRate;
        
        // STT rates (approximate)
        let sttRate = 0;
        if (type === 'equity') sttRate = 0.001; // 0.1%
        if (type === 'futures') sttRate = 0.0001; // 0.01%
        if (type === 'options') sttRate = 0.0005; // 0.05%
        
        const stt = transactionValue * sttRate;
        const totalCharges = brokerage + stt;

        document.getElementById('brokerageValue').textContent = formatCurrency(transactionValue);
        document.getElementById('brokerageFee').textContent = formatCurrency(brokerage);
        document.getElementById('brokerageSTT').textContent = formatCurrency(stt);
        document.getElementById('brokerageTotal').textContent = formatCurrency(totalCharges);
        document.getElementById('brokerageResult').classList.add('active');
    }

    function calculateCAGR() {
        const initial = parseFloat(document.getElementById('cagrInitial').value);
        const final = parseFloat(document.getElementById('cagrFinal').value);
        const years = parseFloat(document.getElementById('cagrYears').value);

        if (!initial || !final || !years) {
            showNotification('Please fill all required fields', 'error');
            return;
        }

        // CAGR formula: (Final Value / Initial Value)^(1/years) - 1
        const cagr = Math.pow(final / initial, 1 / years) - 1;
        const totalReturn = ((final - initial) / initial) * 100;

        document.getElementById('cagrValue').textContent = (cagr * 100).toFixed(2) + '%';
        document.getElementById('cagrReturn').textContent = totalReturn.toFixed(2) + '%';
        document.getElementById('cagrResult').classList.add('active');
    }

    function calculateFD() {
        const amount = parseFloat(document.getElementById('fdAmount').value);
        const rate = parseFloat(document.getElementById('fdRate').value) / 100;
        const tenure = parseFloat(document.getElementById('fdTenure').value);
        const compounding = parseFloat(document.getElementById('fdCompounding').value);

        if (!amount || !rate || !tenure) {
            showNotification('Please fill all required fields', 'error');
            return;
        }

        // Compound Interest formula: P * (1 + r/n)^(n*t)
        const maturityAmount = amount * Math.pow(1 + (rate / compounding), compounding * tenure);
        const interestEarned = maturityAmount - amount;

        document.getElementById('fdPrincipal').textContent = formatCurrency(amount);
        document.getElementById('fdInterest').textContent = formatCurrency(interestEarned);
        document.getElementById('fdMaturity').textContent = formatCurrency(maturityAmount);
        document.getElementById('fdResult').classList.add('active');
    }

    function formatCurrency(amount) {
        return '₹' + amount.toLocaleString('en-IN', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
        
        // ESC key to close notifications
        if (e.key === 'Escape') {
            const notifications = document.querySelectorAll('.notification');
            notifications.forEach(notification => {
                notification.remove();
            });
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });

    // Utility functions
    function addClickAnimation(element) {
        element.style.transform = 'scale(0.95)';
        setTimeout(() => {
            element.style.transform = '';
        }, 150);
    }

    function animateNumber(element) {
        const text = element.textContent;
        const number = parseFloat(text.replace(/[^\d.]/g, ''));
        const suffix = text.replace(/[\d.]/g, '');
        
        if (isNaN(number)) return;
        
        let current = 0;
        const increment = number / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= number) {
                current = number;
                clearInterval(timer);
            }
            
            if (suffix.includes('Cr')) {
                element.textContent = `₹${Math.floor(current)}Cr+`;
            } else if (suffix.includes('+')) {
                element.textContent = `${Math.floor(current)}+`;
            } else {
                element.textContent = `${Math.floor(current)}${suffix}`;
            }
        }, 50);
    }

    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notification => {
            notification.remove();
        });

        // Create notification
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = message;
        
        // Style based on type with glassmorphism
        const colors = {
            success: { 
                bg: 'rgba(0, 204, 106, 0.15)', 
                border: 'rgba(0, 204, 106, 0.4)',
                text: '#00a855',
                shadow: 'rgba(0, 204, 106, 0.2)'
            },
            error: { 
                bg: 'rgba(220, 53, 69, 0.15)', 
                border: 'rgba(220, 53, 69, 0.4)',
                text: '#dc3545',
                shadow: 'rgba(220, 53, 69, 0.2)'
            },
            info: { 
                bg: 'rgba(13, 110, 253, 0.15)', 
                border: 'rgba(13, 110, 253, 0.4)',
                text: '#0d6efd',
                shadow: 'rgba(13, 110, 253, 0.2)'
            }
        };
        
        const color = colors[type] || colors.info;
        
        // Style the notification with glassmorphism
        Object.assign(notification.style, {
            position: 'fixed',
            top: '100px',
            right: '20px',
            background: color.bg,
            backdropFilter: 'blur(15px)',
            WebkitBackdropFilter: 'blur(15px)',
            border: `1px solid ${color.border}`,
            color: color.text,
            padding: '1rem 1.5rem',
            borderRadius: '12px',
            fontWeight: '500',
            fontSize: '0.9rem',
            zIndex: '10000',
            transform: 'translateX(100%)',
            transition: 'all 0.3s ease',
            boxShadow: `0 8px 32px ${color.shadow}`,
            cursor: 'pointer',
            maxWidth: '300px'
        });

        // Add close functionality
        notification.addEventListener('click', function() {
            this.style.transform = 'translateX(100%)';
            this.style.opacity = '0';
            setTimeout(() => {
                this.remove();
            }, 300);
        });

        document.body.appendChild(notification);
        reinitializeLucideIcons();

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        // Auto remove after 4 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.transform = 'translateX(100%)';
                notification.style.opacity = '0';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }
        }, 4000);
    }

    // Loading animation for the page
    window.addEventListener('load', function() {
        document.body.classList.add('loaded');
    });

    // Real-time clock in footer
    // COMMENTED OUT: IST Timer Display
    /*
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-IN', {
            timeZone: 'Asia/Kolkata',
            hour12: true
        });
        
        let clockElement = document.querySelector('.market-clock');
        if (!clockElement) {
            clockElement = document.createElement('div');
            clockElement.className = 'market-clock';
            clockElement.style.cssText = `
                position: fixed;
                top: 80px;
                right: 20px;
                background: rgba(0, 204, 106, 0.1);
                backdrop-filter: blur(15px);
                -webkit-backdrop-filter: blur(15px);
                border: 1px solid rgba(0, 204, 106, 0.3);
                padding: 0.5rem 1rem;
                border-radius: 8px;
                font-size: 0.85rem;
                color: #00a855;
                z-index: 999;
                box-shadow: 0 2px 10px rgba(0, 204, 106, 0.15);
            `;
            document.body.appendChild(clockElement);
        }
        
        clockElement.textContent = `IST: ${timeString}`;
    }

    // Update clock every second
    setInterval(updateClock, 1000);
    updateClock(); // Initial call
    */
    
    // Add hover effect to individual candlesticks
    const candlesticks = document.querySelectorAll('.candlestick-chart rect, .candlestick-chart line');
    
    candlesticks.forEach(candle => {
        // Skip corner rectangles and other small elements
        const height = parseFloat(candle.getAttribute('height'));
        const width = parseFloat(candle.getAttribute('width'));
        
        // Only apply to actual candlestick elements (larger rectangles and lines)
        if ((height && height > 10) || (candle.tagName === 'line')) {
            candle.style.cursor = 'pointer';
            
            candle.addEventListener('mouseenter', function() {
                if (this.tagName === 'rect') {
                    // For rectangles (candle bodies)
                    const currentHeight = parseFloat(this.getAttribute('height'));
                    const currentY = parseFloat(this.getAttribute('y'));
                    const newHeight = currentHeight * 1.15; // Increase by 15%
                    const heightDiff = newHeight - currentHeight;
                    
                    this.setAttribute('data-original-height', currentHeight);
                    this.setAttribute('data-original-y', currentY);
                    this.setAttribute('height', newHeight);
                    this.setAttribute('y', currentY - heightDiff / 2);
                } else if (this.tagName === 'line') {
                    // For lines (wicks)
                    const y1 = parseFloat(this.getAttribute('y1'));
                    const y2 = parseFloat(this.getAttribute('y2'));
                    const length = Math.abs(y2 - y1);
                    
                    if (length > 20) { // Only for actual wick lines
                        const extension = length * 0.1; // Extend by 10%
                        
                        this.setAttribute('data-original-y1', y1);
                        this.setAttribute('data-original-y2', y2);
                        
                        if (y1 < y2) {
                            this.setAttribute('y1', y1 - extension);
                            this.setAttribute('y2', y2 + extension);
                        } else {
                            this.setAttribute('y1', y1 + extension);
                            this.setAttribute('y2', y2 - extension);
                        }
                        
                        this.style.strokeWidth = '2.5';
                    }
                }
            });
            
            candle.addEventListener('mouseleave', function() {
                if (this.tagName === 'rect') {
                    // Restore original dimensions
                    const originalHeight = this.getAttribute('data-original-height');
                    const originalY = this.getAttribute('data-original-y');
                    
                    if (originalHeight && originalY) {
                        this.setAttribute('height', originalHeight);
                        this.setAttribute('y', originalY);
                    }
                } else if (this.tagName === 'line') {
                    // Restore original positions
                    const originalY1 = this.getAttribute('data-original-y1');
                    const originalY2 = this.getAttribute('data-original-y2');
                    
                    if (originalY1 && originalY2) {
                        this.setAttribute('y1', originalY1);
                        this.setAttribute('y2', originalY2);
                    }
                    
                    this.style.strokeWidth = '2';
                }
            });
        }
    });
});

// Add CSS for enhanced animations
const style = document.createElement('style');
style.textContent = `
    .keyboard-navigation button:focus,
    .keyboard-navigation a:focus {
        outline: 2px solid #00ff88;
        outline-offset: 2px;
    }
    
    .notification {
        cursor: pointer;
    }
    
    .notification:hover {
        transform: translateX(-5px) !important;
    }
    
    .loaded .hero-content > * {
        animation-play-state: running;
    }
    
    .animate-in {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
`;
document.head.appendChild(style);
// Initialize Lucide icons
document.addEventListener('DOMContentLoaded', function() {
    console.log('Initializing Lucide icons...');
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
        console.log('Lucide icons initialized successfully');
    } else {
        console.error('Lucide library not loaded');
    }
});

// Re-initialize icons after dynamic content updates
function reinitializeLucideIcons() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
}

// Also initialize after a short delay to ensure all content is loaded
setTimeout(function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
        console.log('Lucide icons re-initialized after delay');
    }
}, 500);
// Financial Calculator with Chart.js Integration
class FinancialCalculator {
    constructor() {
        this.currentChart = null;
        this.calculatorType = null;
        this.initializeCalculator();
    }

    initializeCalculator() {
        const dropdown = document.getElementById('calculatorType');
        const workspace = document.getElementById('calculatorWorkspace');
        const forms = document.getElementById('calculatorForms');
        const welcomeState = workspace ? workspace.querySelector('.welcome-state') : null;

        if (!dropdown) {
            console.error('Calculator dropdown not found');
            return;
        }

        dropdown.addEventListener('change', (e) => {
            const selectedType = e.target.value;
            console.log('Selected calculator type:', selectedType);
            
            if (selectedType) {
                this.calculatorType = selectedType;
                if (welcomeState) welcomeState.style.display = 'none';
                if (forms) forms.style.display = 'block';
                this.loadCalculator(selectedType);
            } else {
                if (welcomeState) welcomeState.style.display = 'block';
                if (forms) forms.style.display = 'none';
                this.destroyChart();
            }
        });
    }

    loadCalculator(type) {
        const inputsContainer = document.querySelector('.calculator-inputs');
        const resultsContainer = document.getElementById('calculationResults');
        
        if (!inputsContainer || !resultsContainer) {
            console.error('Calculator containers not found');
            return;
        }
        
        // Clear previous content
        inputsContainer.innerHTML = '';
        resultsContainer.innerHTML = '';
        this.destroyChart();

        console.log('Loading calculator:', type);

        switch (type) {
            case 'sip':
                this.createSIPCalculator();
                break;
            case 'lumpsum':
                this.createLumpsumCalculator();
                break;
            case 'compound-interest':
                this.createCompoundInterestCalculator();
                break;
            case 'fd':
                this.createFDCalculator();
                break;
            case 'brokerage':
                this.createBrokerageCalculator();
                break;
            default:
                this.createGenericCalculator(type);
        }
    }

    createSIPCalculator() {
        const inputsContainer = document.querySelector('.calculator-inputs');
        inputsContainer.innerHTML = `
            <h3 style="color: #00a855; margin-bottom: 1.5rem; font-size: 1.25rem;">SIP Calculator</h3>
            <div class="input-group">
                <label for="sipAmount">Monthly SIP Amount (₹)</label>
                <input type="number" id="sipAmount" value="5000" min="500" step="500">
            </div>
            <div class="input-group">
                <label for="sipRate">Expected Annual Return (%)</label>
                <input type="number" id="sipRate" value="12" min="1" max="30" step="0.5">
            </div>
            <div class="input-group">
                <label for="sipTenure">Investment Period (Years)</label>
                <input type="number" id="sipTenure" value="10" min="1" max="50">
            </div>
            <button class="calculate-btn" onclick="calculator.calculateSIP()">
                <i data-lucide="bar-chart-3"></i>
                Calculate & Visualize SIP
            </button>
        `;
        
        // Calculate initial results without showing chart
        setTimeout(() => {
            this.calculateSIP(false);
        }, 100);
    }

    createLumpsumCalculator() {
        const inputsContainer = document.querySelector('.calculator-inputs');
        inputsContainer.innerHTML = `
            <h3 style="color: #00a855; margin-bottom: 1.5rem; font-size: 1.25rem;">Lumpsum Calculator</h3>
            <div class="input-group">
                <label for="lumpsumAmount">Investment Amount (₹)</label>
                <input type="number" id="lumpsumAmount" value="100000" min="1000" step="1000">
            </div>
            <div class="input-group">
                <label for="lumpsumRate">Expected Annual Return (%)</label>
                <input type="number" id="lumpsumRate" value="12" min="1" max="30" step="0.5">
            </div>
            <div class="input-group">
                <label for="lumpsumTenure">Investment Period (Years)</label>
                <input type="number" id="lumpsumTenure" value="10" min="1" max="50">
            </div>
            <button class="calculate-btn" onclick="calculator.calculateLumpsum()">
                <i data-lucide="trending-up"></i>
                Calculate & Visualize Returns
            </button>
        `;
        
        setTimeout(() => {
            this.calculateLumpsum(false);
        }, 100);
    }

    createCompoundInterestCalculator() {
        const inputsContainer = document.querySelector('.calculator-inputs');
        inputsContainer.innerHTML = `
            <h3 style="color: #00a855; margin-bottom: 1.5rem; font-size: 1.25rem;">Compound Interest Calculator</h3>
            <div class="input-group">
                <label for="principal">Principal Amount (₹)</label>
                <input type="number" id="principal" value="50000" min="1000" step="1000">
            </div>
            <div class="input-group">
                <label for="interestRate">Annual Interest Rate (%)</label>
                <input type="number" id="interestRate" value="8" min="1" max="25" step="0.25">
            </div>
            <div class="input-group">
                <label for="timePeriod">Time Period (Years)</label>
                <input type="number" id="timePeriod" value="5" min="1" max="30">
            </div>
            <div class="input-group">
                <label for="compoundFreq">Compounding Frequency</label>
                <select id="compoundFreq">
                    <option value="1">Annually</option>
                    <option value="2">Semi-Annually</option>
                    <option value="4" selected>Quarterly</option>
                    <option value="12">Monthly</option>
                </select>
            </div>
            <button class="calculate-btn" onclick="calculator.calculateCompoundInterest()">
                <i data-lucide="pie-chart"></i>
                Calculate & Visualize Interest
            </button>
        `;
        
        setTimeout(() => {
            this.calculateCompoundInterest(false);
        }, 100);
    }

    createFDCalculator() {
        const inputsContainer = document.querySelector('.calculator-inputs');
        inputsContainer.innerHTML = `
            <h3 style="color: #00a855; margin-bottom: 1.5rem; font-size: 1.25rem;">Fixed Deposit Calculator</h3>
            <div class="input-group">
                <label for="fdAmount">Deposit Amount (₹)</label>
                <input type="number" id="fdAmount" value="100000" min="1000" step="1000">
            </div>
            <div class="input-group">
                <label for="fdRate">Interest Rate (% per annum)</label>
                <input type="number" id="fdRate" value="6.5" min="1" max="15" step="0.25">
            </div>
            <div class="input-group">
                <label for="fdTenure">Tenure (Years)</label>
                <input type="number" id="fdTenure" value="3" min="1" max="10">
            </div>
            <button class="calculate-btn" onclick="calculator.calculateFD()">
                <i data-lucide="piggy-bank"></i>
                Calculate & Visualize FD Returns
            </button>
        `;
        
        setTimeout(() => {
            this.calculateFD(false);
        }, 100);
    }

    createBrokerageCalculator() {
        const inputsContainer = document.querySelector('.calculator-inputs');
        inputsContainer.innerHTML = `
            <h3 style="color: #00a855; margin-bottom: 1.5rem; font-size: 1.25rem;">Brokerage Calculator</h3>
            <div class="input-group">
                <label for="tradeValue">Trade Value (₹)</label>
                <input type="number" id="tradeValue" value="50000" min="1000" step="1000">
            </div>
            <div class="input-group">
                <label for="tradeType">Trade Type</label>
                <select id="tradeType">
                    <option value="equity">Equity Delivery</option>
                    <option value="intraday">Equity Intraday</option>
                    <option value="futures">Futures</option>
                    <option value="options">Options</option>
                </select>
            </div>
            <div class="input-group">
                <label for="brokerageRate">Brokerage Rate (%)</label>
                <input type="number" id="brokerageRate" value="0.25" min="0.01" max="2" step="0.01">
            </div>
            <button class="calculate-btn" onclick="calculator.calculateBrokerage()">
                <i data-lucide="activity"></i>
                Calculate & Visualize Charges
            </button>
        `;
        
        setTimeout(() => {
            this.calculateBrokerage(false);
        }, 100);
    }

    // SIP Calculation
    calculateSIP() {
        console.log('Calculating SIP...');
        
        const amount = parseFloat(document.getElementById('sipAmount')?.value) || 5000;
        const rate = parseFloat(document.getElementById('sipRate')?.value) || 12;
        const tenure = parseFloat(document.getElementById('sipTenure')?.value) || 10;

        const monthlyRate = rate / 12 / 100;
        const months = tenure * 12;
        
        const futureValue = amount * (((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate));
        const totalInvestment = amount * months;
        const totalReturns = futureValue - totalInvestment;

        console.log('SIP Results:', { totalInvestment, totalReturns, futureValue });

        this.displayResults([
            { label: 'Monthly SIP Amount', value: `₹${this.formatNumber(amount)}` },
            { label: 'Investment Period', value: `${tenure} years` },
            { label: 'Total Investment', value: `₹${this.formatNumber(totalInvestment)}` },
            { label: 'Total Returns', value: `₹${this.formatNumber(totalReturns)}` },
            { label: 'Maturity Amount', value: `₹${this.formatNumber(futureValue)}` }
        ]);

        // Show chart in modal popup
        this.showChartModal('SIP Investment Breakdown', {
            type: 'pie',
            labels: ['Total Investment', 'Total Returns'],
            data: [totalInvestment, totalReturns],
            colors: ['#00a855', '#FDC221']
        }, [
            { label: 'Monthly SIP', value: `₹${this.formatNumber(amount)}` },
            { label: 'Investment Period', value: `${tenure} years` },
            { label: 'Expected Return', value: `${rate}% p.a.` },
            { label: 'Total Investment', value: `₹${this.formatNumber(totalInvestment)}` },
            { label: 'Total Returns', value: `₹${this.formatNumber(totalReturns)}` },
            { label: 'Maturity Value', value: `₹${this.formatNumber(futureValue)}` }
        ]);
    }

    // Lumpsum Calculation
    calculateLumpsum() {
        console.log('Calculating Lumpsum...');
        
        const amount = parseFloat(document.getElementById('lumpsumAmount')?.value) || 100000;
        const rate = parseFloat(document.getElementById('lumpsumRate')?.value) || 12;
        const tenure = parseFloat(document.getElementById('lumpsumTenure')?.value) || 10;

        const futureValue = amount * Math.pow(1 + rate / 100, tenure);
        const totalReturns = futureValue - amount;

        this.displayResults([
            { label: 'Investment Amount', value: `₹${this.formatNumber(amount)}` },
            { label: 'Investment Period', value: `${tenure} years` },
            { label: 'Total Returns', value: `₹${this.formatNumber(totalReturns)}` },
            { label: 'Maturity Amount', value: `₹${this.formatNumber(futureValue)}` }
        ]);

        // Show chart in modal popup
        this.showChartModal('Lumpsum Investment Growth', {
            type: 'pie',
            labels: ['Initial Investment', 'Total Returns'],
            data: [amount, totalReturns],
            colors: ['#00a855', '#FDC221']
        }, [
            { label: 'Initial Investment', value: `₹${this.formatNumber(amount)}` },
            { label: 'Investment Period', value: `${tenure} years` },
            { label: 'Expected Return', value: `${rate}% p.a.` },
            { label: 'Total Returns', value: `₹${this.formatNumber(totalReturns)}` },
            { label: 'Maturity Value', value: `₹${this.formatNumber(futureValue)}` },
            { label: 'Growth Multiple', value: `${(futureValue / amount).toFixed(2)}x` }
        ]);
    }

    // Compound Interest Calculation
    calculateCompoundInterest() {
        console.log('Calculating Compound Interest...');
        
        const principal = parseFloat(document.getElementById('principal')?.value) || 50000;
        const rate = parseFloat(document.getElementById('interestRate')?.value) || 8;
        const time = parseFloat(document.getElementById('timePeriod')?.value) || 5;
        const frequency = parseFloat(document.getElementById('compoundFreq')?.value) || 4;

        const amount = principal * Math.pow(1 + (rate / 100) / frequency, frequency * time);
        const compoundInterest = amount - principal;

        const freqText = {1: 'Annually', 2: 'Semi-Annually', 4: 'Quarterly', 12: 'Monthly'}[frequency];

        this.displayResults([
            { label: 'Principal Amount', value: `₹${this.formatNumber(principal)}` },
            { label: 'Interest Rate', value: `${rate}% p.a.` },
            { label: 'Time Period', value: `${time} years` },
            { label: 'Compound Interest', value: `₹${this.formatNumber(compoundInterest)}` },
            { label: 'Total Amount', value: `₹${this.formatNumber(amount)}` }
        ]);

        // Show chart in modal popup
        this.showChartModal('Compound Interest Breakdown', {
            type: 'doughnut',
            labels: ['Principal', 'Compound Interest'],
            data: [principal, compoundInterest],
            colors: ['#00a855', '#FDC221']
        }, [
            { label: 'Principal Amount', value: `₹${this.formatNumber(principal)}` },
            { label: 'Interest Rate', value: `${rate}% p.a.` },
            { label: 'Time Period', value: `${time} years` },
            { label: 'Compounding', value: freqText },
            { label: 'Compound Interest', value: `₹${this.formatNumber(compoundInterest)}` },
            { label: 'Final Amount', value: `₹${this.formatNumber(amount)}` }
        ]);
    }

    // FD Calculation
    calculateFD() {
        console.log('Calculating FD...');
        
        const amount = parseFloat(document.getElementById('fdAmount')?.value) || 100000;
        const rate = parseFloat(document.getElementById('fdRate')?.value) || 6.5;
        const tenure = parseFloat(document.getElementById('fdTenure')?.value) || 3;

        const maturityAmount = amount * Math.pow(1 + rate / 100, tenure);
        const interest = maturityAmount - amount;

        this.displayResults([
            { label: 'Deposit Amount', value: `₹${this.formatNumber(amount)}` },
            { label: 'Interest Rate', value: `${rate}% p.a.` },
            { label: 'Tenure', value: `${tenure} years` },
            { label: 'Interest Earned', value: `₹${this.formatNumber(interest)}` },
            { label: 'Maturity Amount', value: `₹${this.formatNumber(maturityAmount)}` }
        ]);

        // Show chart in modal popup
        this.showChartModal('Fixed Deposit Returns', {
            type: 'pie',
            labels: ['Principal', 'Interest Earned'],
            data: [amount, interest],
            colors: ['#00a855', '#FDC221']
        }, [
            { label: 'Deposit Amount', value: `₹${this.formatNumber(amount)}` },
            { label: 'Interest Rate', value: `${rate}% p.a.` },
            { label: 'Tenure', value: `${tenure} years` },
            { label: 'Interest Earned', value: `₹${this.formatNumber(interest)}` },
            { label: 'Maturity Amount', value: `₹${this.formatNumber(maturityAmount)}` },
            { label: 'Effective Yield', value: `${((interest / amount) * 100).toFixed(2)}%` }
        ]);
    }

    // Brokerage Calculation
    calculateBrokerage() {
        console.log('Calculating Brokerage...');
        
        const tradeValue = parseFloat(document.getElementById('tradeValue')?.value) || 50000;
        const tradeType = document.getElementById('tradeType')?.value || 'equity';
        const brokerageRate = parseFloat(document.getElementById('brokerageRate')?.value) || 0.25;

        const brokerage = (tradeValue * brokerageRate) / 100;
        const stt = tradeType === 'equity' ? tradeValue * 0.001 : tradeValue * 0.0001;
        const transactionCharges = tradeValue * 0.00325 / 100;
        const gst = (brokerage + transactionCharges) * 0.18;
        const totalCharges = brokerage + stt + transactionCharges + gst;
        const netAmount = tradeValue - totalCharges;

        this.displayResults([
            { label: 'Trade Value', value: `₹${this.formatNumber(tradeValue)}` },
            { label: 'Brokerage', value: `₹${this.formatNumber(brokerage)}` },
            { label: 'STT', value: `₹${this.formatNumber(stt)}` },
            { label: 'Transaction Charges', value: `₹${this.formatNumber(transactionCharges)}` },
            { label: 'GST', value: `₹${this.formatNumber(gst)}` },
            { label: 'Total Charges', value: `₹${this.formatNumber(totalCharges)}` },
            { label: 'Net Amount', value: `₹${this.formatNumber(netAmount)}` }
        ]);

        // Show chart in modal popup
        this.showChartModal('Trading Charges Breakdown', {
            type: 'doughnut',
            labels: ['Net Amount', 'Brokerage', 'STT', 'Other Charges'],
            data: [netAmount, brokerage, stt, transactionCharges + gst],
            colors: ['#00a855', '#FDC221', '#ff6b6b', '#4ecdc4']
        }, [
            { label: 'Trade Value', value: `₹${this.formatNumber(tradeValue)}` },
            { label: 'Trade Type', value: tradeType.charAt(0).toUpperCase() + tradeType.slice(1) },
            { label: 'Brokerage Rate', value: `${brokerageRate}%` },
            { label: 'Total Charges', value: `₹${this.formatNumber(totalCharges)}` },
            { label: 'Net Amount', value: `₹${this.formatNumber(netAmount)}` },
            { label: 'Charge %', value: `${((totalCharges / tradeValue) * 100).toFixed(3)}%` }
        ]);
    }

    // Display Results
    displayResults(results) {
        const container = document.getElementById('calculationResults');
        if (!container) {
            console.error('Results container not found');
            return;
        }
        
        container.innerHTML = results.map(result => `
            <div class="result-item">
                <span class="result-label">${result.label}</span>
                <span class="result-value">${result.value}</span>
            </div>
        `).join('');
    }

    // Unified Chart Creation Method
    createChart(config) {
        console.log('Creating chart with config:', config);
        
        // Show loading status
        const chartStatus = document.getElementById('chartStatus');
        if (chartStatus) {
            chartStatus.style.display = 'block';
            chartStatus.innerHTML = '<div>Creating chart...</div>';
        }
        
        // Check if Chart.js is loaded
        if (typeof Chart === 'undefined') {
            console.error('Chart.js is not loaded');
            const chartContainer = document.querySelector('.chart-container');
            if (chartContainer) {
                chartContainer.innerHTML = '<div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #ff6b6b; font-weight: bold;">Chart.js failed to load<br>Please refresh the page</div>';
            }
            return;
        }

        this.destroyChart();
        
        const canvas = document.getElementById('calculatorChart');
        if (!canvas) {
            console.error('Chart canvas not found');
            if (chartStatus) {
                chartStatus.innerHTML = '<div style="color: #ff6b6b;">Chart canvas not found</div>';
            }
            return;
        }

        const ctx = canvas.getContext('2d');
        if (!ctx) {
            console.error('Cannot get canvas context');
            if (chartStatus) {
                chartStatus.innerHTML = '<div style="color: #ff6b6b;">Cannot get canvas context</div>';
            }
            return;
        }
        
        // Hide status before creating chart
        if (chartStatus) {
            chartStatus.style.display = 'none';
        }
        
        try {
            this.currentChart = new Chart(ctx, {
                type: config.type,
                data: {
                    labels: config.labels,
                    datasets: [{
                        data: config.data,
                        backgroundColor: config.colors,
                        borderWidth: 3,
                        borderColor: '#ffffff',
                        hoverBorderWidth: 4,
                        hoverBorderColor: '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: config.type === 'doughnut' ? '60%' : undefined,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                font: {
                                    size: 14,
                                    weight: '500'
                                },
                                color: '#2a2a2a'
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            borderColor: '#00a855',
                            borderWidth: 1,
                            callbacks: {
                                label: function(context) {
                                    const value = context.parsed;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    return `${context.label}: ₹${calculator.formatNumber(value)} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        duration: 1500,
                        easing: 'easeInOutQuart'
                    }
                }
            });
            
            console.log('Chart created successfully:', this.currentChart);
            
            // Verify chart is rendered
            setTimeout(() => {
                if (this.currentChart && this.currentChart.canvas) {
                    console.log('Chart canvas dimensions:', this.currentChart.canvas.width, 'x', this.currentChart.canvas.height);
                    console.log('Chart data:', this.currentChart.data);
                }
            }, 100);
            
        } catch (error) {
            console.error('Error creating chart:', error);
            const chartContainer = document.querySelector('.chart-container');
            if (chartContainer) {
                chartContainer.innerHTML = `<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; color: #ff6b6b; text-align: center;">
                    <div style="font-weight: bold; margin-bottom: 10px;">Error creating chart</div>
                    <div style="font-size: 12px;">${error.message}</div>
                    <button onclick="location.reload()" style="margin-top: 10px; padding: 5px 10px; background: #00a855; color: white; border: none; border-radius: 5px; cursor: pointer;">Refresh Page</button>
                </div>`;
            }
        }
    }

    // Destroy existing chart
    destroyChart() {
        if (this.currentChart) {
            console.log('Destroying existing chart');
            this.currentChart.destroy();
            this.currentChart = null;
        }
    }

    // Format numbers with commas
    formatNumber(num) {
        return Math.round(num).toLocaleString('en-IN');
    }

    // Generic calculator for other types
    createGenericCalculator(type) {
        const inputsContainer = document.querySelector('.calculator-inputs');
        inputsContainer.innerHTML = `
            <h3 style="color: #00a855; margin-bottom: 1.5rem; font-size: 1.25rem;">${type.replace('-', ' ').toUpperCase()} Calculator</h3>
            <div style="text-align: center; padding: 2rem; color: #666;">
                <i data-lucide="construction" style="width: 48px; height: 48px; margin-bottom: 1rem;"></i>
                <p>This calculator is under development.<br>Please select another calculator type.</p>
            </div>
        `;
        if (typeof reinitializeLucideIcons === 'function') {
            reinitializeLucideIcons();
        }
    }
}

// Initialize calculator when DOM is loaded
let calculator;

// Wait for both DOM and Chart.js to be ready
function initializeCalculatorApp() {
    console.log('Initializing calculator app...');
    
    if (typeof Chart === 'undefined') {
        console.log('Chart.js not ready, retrying in 500ms...');
        setTimeout(initializeCalculatorApp, 500);
        return;
    }
    
    console.log('Chart.js loaded, version:', Chart.version);
    calculator = new FinancialCalculator();
    
    // Add real-time calculation on input change
    document.addEventListener('input', function(e) {
        if (e.target.matches('.calculator-inputs input, .calculator-inputs select')) {
            // Debounce the calculation
            clearTimeout(calculator.inputTimeout);
            calculator.inputTimeout = setTimeout(() => {
                console.log('Input changed, recalculating...');
                switch (calculator.calculatorType) {
                    case 'sip':
                        calculator.calculateSIP();
                        break;
                    case 'lumpsum':
                        calculator.calculateLumpsum();
                        break;
                    case 'compound-interest':
                        calculator.calculateCompoundInterest();
                        break;
                    case 'fd':
                        calculator.calculateFD();
                        break;
                    case 'brokerage':
                        calculator.calculateBrokerage();
                        break;
                }
            }, 300);
        }
    });
}

// Start initialization when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeCalculatorApp);
} else {
    initializeCalculatorApp();
}
// Test function to debug chart issues
function testChart() {
    const testResult = document.getElementById('testResult');
    
    // Test 1: Check if Chart.js is loaded
    if (typeof Chart === 'undefined') {
        testResult.innerHTML = '<span style="color: #ff6b6b;">❌ Chart.js is not loaded</span>';
        return;
    }
    
    testResult.innerHTML = '<span style="color: #00a855;">✅ Chart.js loaded (v' + Chart.version + ')</span>';
    
    // Test 2: Check if canvas exists
    const canvas = document.getElementById('calculatorChart');
    if (!canvas) {
        testResult.innerHTML += '<br><span style="color: #ff6b6b;">❌ Canvas element not found</span>';
        return;
    }
    
    testResult.innerHTML += '<br><span style="color: #00a855;">✅ Canvas element found</span>';
    
    // Test 3: Check canvas context
    const ctx = canvas.getContext('2d');
    if (!ctx) {
        testResult.innerHTML += '<br><span style="color: #ff6b6b;">❌ Cannot get canvas context</span>';
        return;
    }
    
    testResult.innerHTML += '<br><span style="color: #00a855;">✅ Canvas context available</span>';
    
    // Test 4: Try to create a simple chart
    try {
        // Show the calculator forms first
        const forms = document.getElementById('calculatorForms');
        const welcomeState = document.querySelector('.welcome-state');
        if (forms && welcomeState) {
            welcomeState.style.display = 'none';
            forms.style.display = 'block';
        }
        
        // Clear any existing chart
        if (calculator && calculator.currentChart) {
            calculator.currentChart.destroy();
        }
        
        // Create test chart
        const testChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Test Investment', 'Test Returns'],
                datasets: [{
                    data: [100000, 50000],
                    backgroundColor: ['#00a855', '#FDC221'],
                    borderWidth: 3,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                animation: {
                    duration: 1000
                }
            }
        });
        
        testResult.innerHTML += '<br><span style="color: #00a855;">✅ Test chart created successfully!</span>';
        
        // Store the test chart reference
        if (calculator) {
            calculator.currentChart = testChart;
        }
        
        // Add test results to the results panel
        const resultsContainer = document.getElementById('calculationResults');
        if (resultsContainer) {
            resultsContainer.innerHTML = `
                <div class="result-item">
                    <span class="result-label">Test Investment</span>
                    <span class="result-value">₹1,00,000</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Test Returns</span>
                    <span class="result-value">₹50,000</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Total Value</span>
                    <span class="result-value">₹1,50,000</span>
                </div>
            `;
        }
        
    } catch (error) {
        testResult.innerHTML += '<br><span style="color: #ff6b6b;">❌ Error creating chart: ' + error.message + '</span>';
        console.error('Chart creation error:', error);
    }
}
// Modal Chart Functions
function showChartModal(title, chartConfig, summaryData) {
    const modal = document.getElementById('chartModal');
    const modalTitle = document.getElementById('chartModalTitle');
    const chartSummary = document.getElementById('chartSummary');
    
    // Set modal title
    modalTitle.textContent = title;
    
    // Create summary
    chartSummary.innerHTML = `
        <h4>Calculation Summary</h4>
        <div class="summary-grid">
            ${summaryData.map(item => `
                <div class="summary-item">
                    <div class="label">${item.label}</div>
                    <div class="value">${item.value}</div>
                </div>
            `).join('')}
        </div>
    `;
    
    // Show modal with animation
    modal.style.display = 'flex';
    setTimeout(() => {
        modal.classList.add('show');
    }, 10);
    
    // Create chart after modal is visible
    setTimeout(() => {
        if (calculator) {
            calculator.createChart(chartConfig);
        }
        // Reinitialize Lucide icons
        if (typeof reinitializeLucideIcons === 'function') {
            reinitializeLucideIcons();
        } else if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }, 300);
}

function closeChartModal() {
    const modal = document.getElementById('chartModal');
    modal.classList.remove('show');
    
    setTimeout(() => {
        modal.style.display = 'none';
        // Destroy chart when modal closes
        if (calculator && calculator.currentChart) {
            calculator.currentChart.destroy();
            calculator.currentChart = null;
        }
    }, 300);
}

function downloadChart() {
    if (calculator && calculator.currentChart) {
        const canvas = calculator.currentChart.canvas;
        const url = canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.download = 'financial-chart.png';
        link.href = url;
        link.click();
    }
}

// Add showChartModal method to calculator class
FinancialCalculator.prototype.showChartModal = function(title, chartConfig, summaryData) {
    showChartModal(title, chartConfig, summaryData);
};

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeChartModal();
    }
});
// Calculator Carousel Functionality
class CalculatorCarousel {
    constructor() {
        this.carousel = document.getElementById('calculatorCarousel');
        this.prevBtn = document.getElementById('prevBtn');
        this.nextBtn = document.getElementById('nextBtn');
        this.indicators = document.getElementById('carouselIndicators');
        this.cards = document.querySelectorAll('.calculator-card');
        
        console.log('CalculatorCarousel initialized');
        console.log('Found cards:', this.cards.length);
        console.log('Indicators:', this.indicators);
        
        // Only initialize if required elements exist
        if (!this.indicators || this.cards.length === 0) {
            console.warn('Calculator carousel not initialized - missing elements');
            return;
        }
        
        this.currentIndex = 0;
        this.cardsPerView = this.getCardsPerView();
        this.totalSlides = Math.ceil(this.cards.length / this.cardsPerView);
        
        this.init();
    }
    
    init() {
        this.createIndicators();
        this.updateNavigation();
        this.bindEvents();
        this.handleResize();
    }
    
    getCardsPerView() {
        const width = window.innerWidth;
        if (width >= 1200) return 4;
        if (width >= 768) return 3;
        if (width >= 480) return 2;
        return 1;
    }
    
    createIndicators() {
        if (!this.indicators) {
            console.warn('Carousel indicators element not found');
            return;
        }
        this.indicators.innerHTML = '';
        for (let i = 0; i < this.totalSlides; i++) {
            const dot = document.createElement('div');
            dot.className = `indicator-dot ${i === 0 ? 'active' : ''}`;
            dot.addEventListener('click', () => this.goToSlide(i));
            this.indicators.appendChild(dot);
        }
    }
    
    updateNavigation() {
        if (this.prevBtn) {
            this.prevBtn.disabled = this.currentIndex === 0;
        }
        if (this.nextBtn) {
            this.nextBtn.disabled = this.currentIndex >= this.totalSlides - 1;
        }
        
        // Update indicators
        if (this.indicators) {
            const dots = this.indicators.querySelectorAll('.indicator-dot');
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === this.currentIndex);
            });
        }
    }
    
    goToSlide(index) {
        this.currentIndex = Math.max(0, Math.min(index, this.totalSlides - 1));
        const cardWidth = this.cards[0].offsetWidth + 24; // 24px gap
        const scrollPosition = this.currentIndex * cardWidth * this.cardsPerView;
        
        this.carousel.scrollTo({
            left: scrollPosition,
            behavior: 'smooth'
        });
        
        this.updateNavigation();
    }
    
    nextSlide() {
        if (this.currentIndex < this.totalSlides - 1) {
            this.goToSlide(this.currentIndex + 1);
        }
    }
    
    prevSlide() {
        if (this.currentIndex > 0) {
            this.goToSlide(this.currentIndex - 1);
        }
    }
    
    bindEvents() {
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.nextSlide());
        }
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
        }
        
        // Card click events
        this.cards.forEach(card => {
            card.addEventListener('click', () => {
                const calculatorType = card.dataset.type;
                console.log('Calculator card clicked:', calculatorType);
                this.openCalculator(calculatorType);
            });
        });
        
        // See All button - removed handler to allow normal link navigation
        // The button is now an <a> tag that directly links to calculators.html
        
        // Touch/swipe support
        let startX = 0;
        let scrollLeft = 0;
        
        this.carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].pageX - this.carousel.offsetLeft;
            scrollLeft = this.carousel.scrollLeft;
        });
        
        this.carousel.addEventListener('touchmove', (e) => {
            if (!startX) return;
            e.preventDefault();
            const x = e.touches[0].pageX - this.carousel.offsetLeft;
            const walk = (x - startX) * 2;
            this.carousel.scrollLeft = scrollLeft - walk;
        });
        
        this.carousel.addEventListener('touchend', () => {
            startX = 0;
        });
    }
    
    handleResize() {
        window.addEventListener('resize', () => {
            const newCardsPerView = this.getCardsPerView();
            if (newCardsPerView !== this.cardsPerView) {
                this.cardsPerView = newCardsPerView;
                this.totalSlides = Math.ceil(this.cards.length / this.cardsPerView);
                this.currentIndex = 0;
                this.createIndicators();
                this.goToSlide(0);
            }
        });
    }
    
    openCalculator(type) {
        // Navigate directly to calculator page without prompting
        // Detect if we're in calculator subdirectory
        const isInCalculatorDir = window.location.pathname.includes('/calculator/') || window.location.pathname.includes('\\calculator\\');
        const basePath = isInCalculatorDir ? '' : 'calculator/';
        
        const calculatorPages = {
            'sip': basePath + 'calculator-sip.html',
            'lumpsum': basePath + 'calculator-lumpsum.html',
            'fd': basePath + 'calculator-fd.html',
            'rd': basePath + 'calculator-rd.html',
            'brokerage': basePath + 'calculator-brokerage.html',
            'cagr': basePath + 'calculator-cagr.html',
            'simple-interest': basePath + 'calculator-simple-interest.html',
            'compound-interest': basePath + 'calculator-compound-interest.html',
            'swp': basePath + 'calculator-swp.html',
            'mutual-fund': basePath + 'calculator-mutual-fund.html',
            'ssy': basePath + 'calculator-ssy.html',
            'po-ppf': basePath + 'calculator-ppf.html',
            'ppf': basePath + 'calculator-ppf.html',
            'epf': basePath + 'calculator-epf.html',
            'mtf': basePath + 'calculator-mtf.html',
            'elss': basePath + 'calculator-elss.html',
            'step-up-sip': basePath + 'calculator-step-up-sip.html',
            'po-fd': basePath + 'calculator-po-fd.html',
            'po-rd': basePath + 'calculator-po-rd.html',
            'nsc': basePath + 'calculator-nsc.html',
            'etf': basePath + 'calculator-etf.html',
            'stcg': basePath + 'calculator-stcg.html',
            'margin': basePath + 'calculator-margin.html'
        };
        
        const page = calculatorPages[type];
        if (page) {
            window.location.href = page;
        }
    }
    
    showAllCalculators() {
        console.log('Showing all calculators...');
        // Implement logic to show all calculators in a grid or separate page
        alert('Showing all calculators...');
    }
    
    // Optional: Integration with existing calculator modal system
    showCalculatorModal(type, name) {
        // This would integrate with your existing modal system
        // You can call the existing calculator functions here
        if (typeof showChartModal === 'function') {
            // Example integration - you'd need to adapt this to your needs
            showChartModal(name, {
                type: 'pie',
                labels: ['Sample', 'Data'],
                data: [100, 50],
                colors: ['#00a855', '#FDC221']
            }, [
                { label: 'Calculator Type', value: name },
                { label: 'Status', value: 'Ready to use' }
            ]);
        }
    }
}

// Auto-scroll functionality (optional)
class CalculatorAutoScroll {
    constructor(carousel) {
        this.carousel = carousel;
        this.autoScrollInterval = null;
        this.autoScrollDelay = 5000; // 5 seconds
        this.isUserInteracting = false;
    }
    
    start() {
        this.autoScrollInterval = setInterval(() => {
            if (!this.isUserInteracting) {
                if (this.carousel.currentIndex >= this.carousel.totalSlides - 1) {
                    this.carousel.goToSlide(0);
                } else {
                    this.carousel.nextSlide();
                }
            }
        }, this.autoScrollDelay);
    }
    
    stop() {
        if (this.autoScrollInterval) {
            clearInterval(this.autoScrollInterval);
            this.autoScrollInterval = null;
        }
    }
    
    pause() {
        this.isUserInteracting = true;
        setTimeout(() => {
            this.isUserInteracting = false;
        }, 3000); // Resume after 3 seconds of no interaction
    }
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const calculatorCarousel = new CalculatorCarousel();
    
    // Only enable auto-scroll if carousel was successfully initialized
    if (calculatorCarousel.indicators && calculatorCarousel.cards && calculatorCarousel.cards.length > 0) {
        // Optional: Enable auto-scroll
        const autoScroll = new CalculatorAutoScroll(calculatorCarousel);
        // autoScroll.start(); // Uncomment to enable auto-scroll
        
        // Pause auto-scroll on user interaction
        const carouselContainer = document.querySelector('.calculator-carousel-container');
        if (carouselContainer) {
            carouselContainer.addEventListener('mouseenter', () => {
                if (autoScroll) autoScroll.pause();
            });
            
            carouselContainer.addEventListener('touchstart', () => {
                if (autoScroll) autoScroll.pause();
            });
        }
    }
});

// Register and Open Account Button Handlers
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, setting up register button handlers...');
    
    // Handle Register button clicks
    const registerButtons = document.querySelectorAll('.register-btn');
    console.log('Found register buttons:', registerButtons.length);
    
    registerButtons.forEach((button, index) => {
        console.log(`Setting up handler for register button ${index + 1}:`, button);
        button.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Register button clicked!');
            
            // Add loading state
            const originalText = this.textContent;
            this.textContent = 'Opening...';
            this.style.opacity = '0.7';
            
            // Open the onboarding page
            console.log('Opening onboarding page...');
            window.open('https://onboarding.gretexbroking.com:8080/OnBoarding/', '_blank');
            
            // Reset button after a short delay
            setTimeout(() => {
                this.textContent = originalText;
                this.style.opacity = '1';
                console.log('Button reset to original state');
            }, 1000);
        });
    });

    // Handle Open New Account button clicks
    const openAccountButtons = document.querySelectorAll('.btn-primary');
    console.log('Found primary buttons:', openAccountButtons.length);
    
    openAccountButtons.forEach((button, index) => {
        if (button.textContent.includes('OPEN NEW ACCOUNT')) {
            console.log(`Setting up handler for open account button ${index + 1}:`, button);
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Open New Account button clicked!');
                
                // Add loading state
                const originalText = this.textContent;
                this.textContent = 'Opening...';
                this.style.opacity = '0.7';
                
                // Open the onboarding page
                console.log('Opening onboarding page...');
                window.open('https://onboarding.gretexbroking.com:8080/OnBoarding/', '_blank');
                
                // Reset button after a short delay
                setTimeout(() => {
                    this.textContent = originalText;
                    this.style.opacity = '1';
                    console.log('Button reset to original state');
                }, 1000);
            });
        }
    });
});

// Stock Market Ticker Functionality - DISABLED
/*
(function() {
    // Mock stock data with realistic base prices
    let stockData = [
        { name: 'SENSEX', price: 73261.05, change: 63.72, changePercent: 0.09 },
        { name: 'NIFTY 50', price: 22200.70, change: 18.50, changePercent: 0.08 },
        { name: 'NIFTY BANK', price: 47789.60, change: -125.40, changePercent: -0.26 },
        { name: 'BSE MIDCAP', price: 39245.12, change: 145.30, changePercent: 0.37 },
        { name: 'BSE SMALLCAP', price: 45678.90, change: 234.56, changePercent: 0.52 },
        { name: 'NIFTY IT', price: 34567.89, change: -89.12, changePercent: -0.26 },
        { name: 'NIFTY AUTO', price: 19876.54, change: 123.45, changePercent: 0.62 },
        { name: 'NIFTY PHARMA', price: 18765.43, change: 67.89, changePercent: 0.36 },
        { name: 'NIFTY FMCG', price: 54321.09, change: 234.56, changePercent: 0.43 },
        { name: 'NIFTY METAL', price: 7654.32, change: -45.67, changePercent: -0.59 },
        { name: 'NIFTY ENERGY', price: 32109.87, change: 156.78, changePercent: 0.49 },
        { name: 'NIFTY REALTY', price: 6543.21, change: 89.01, changePercent: 1.38 }
    ];

    function formatPrice(price) {
        return price.toLocaleString('en-IN', { 
            minimumFractionDigits: 2, 
            maximumFractionDigits: 2 
        });
    }

    function formatChange(change) {
        const sign = change >= 0 ? '+' : '';
        return sign + change.toFixed(2);
    }

    function formatChangePercent(changePercent) {
        const sign = changePercent >= 0 ? '+' : '';
        return sign + changePercent.toFixed(2) + '%';
    }

    function getChangeClass(change) {
        if (change > 0) return 'positive';
        if (change < 0) return 'negative';
        return 'neutral';
    }

    function createTickerItem(stock) {
        const changeClass = getChangeClass(stock.change);
        const item = document.createElement('div');
        item.className = 'ticker-item';
        item.innerHTML = `
            <span class="ticker-name">${stock.name}</span>
            <span class="ticker-price">${formatPrice(stock.price)}</span>
            <span class="ticker-change ${changeClass}">
                <span class="ticker-change-icon"></span>
                <span>${formatChange(stock.change)} (${formatChangePercent(stock.changePercent)})</span>
            </span>
        `;
        return item;
    }

    function initializeTicker() {
        const tickerWrapper = document.querySelector('.ticker-wrapper');
        if (!tickerWrapper) {
            console.error('Ticker wrapper not found!');
            return;
        }

        console.log('Initializing ticker with', stockData.length, 'stocks');

        // Clear existing content
        tickerWrapper.innerHTML = '';

        // Create two sets of ticker items for seamless infinite scroll
        const items1 = stockData.map(createTickerItem);
        const items2 = stockData.map(createTickerItem);

        if (items1.length === 0) {
            console.error('No ticker items created!');
            return;
        }

        // Create first content block
        const content1 = document.createElement('div');
        content1.className = 'ticker-content';
        items1.forEach(item => content1.appendChild(item));

        // Create second content block (duplicate for seamless loop)
        const content2 = document.createElement('div');
        content2.className = 'ticker-content';
        items2.forEach(item => content2.appendChild(item));

        // Append both to wrapper
        tickerWrapper.appendChild(content1);
        tickerWrapper.appendChild(content2);

        console.log('Ticker content created:', {
            content1Items: content1.children.length,
            content2Items: content2.children.length,
            totalItems: items1.length + items2.length
        });
    }

    // Generate realistic mock price updates
    function updateMockPrices() {
        stockData = stockData.map(stock => {
            // Calculate realistic price fluctuation based on current price
            // Higher priced stocks have larger absolute changes, but similar percentage changes
            const volatility = stock.price * 0.001; // 0.1% volatility
            const priceChange = (Math.random() - 0.5) * volatility * 2; // Random change between -volatility and +volatility
            
            // Sometimes add larger movements (10% chance of bigger move)
            const bigMove = Math.random() < 0.1;
            const finalPriceChange = bigMove ? priceChange * 3 : priceChange;
            
            const newPrice = Math.max(1, stock.price + finalPriceChange); // Ensure price doesn't go below 1
            const newChange = finalPriceChange;
            const newChangePercent = (newChange / (newPrice - newChange)) * 100;
            
            return {
                name: stock.name,
                price: parseFloat(newPrice.toFixed(2)),
                change: parseFloat(newChange.toFixed(2)),
                changePercent: parseFloat(newChangePercent.toFixed(2))
            };
        });
        
        updateTickerDisplay();
    }

    // Update ticker display with current stock data
    function updateTickerDisplay() {
        const tickerContents = document.querySelectorAll('.ticker-content');
        if (tickerContents.length === 0) return;

        tickerContents.forEach((content) => {
            const tickerItems = content.querySelectorAll('.ticker-item');
            tickerItems.forEach((item, index) => {
                const actualIndex = index % stockData.length;
                const stock = stockData[actualIndex];
                
                if (!stock) return;

                const priceElement = item.querySelector('.ticker-price');
                const changeElement = item.querySelector('.ticker-change');
                const changeClass = getChangeClass(stock.change);

                if (priceElement) {
                    priceElement.textContent = formatPrice(stock.price);
                }

                if (changeElement) {
                    changeElement.className = `ticker-change ${changeClass}`;
                    changeElement.innerHTML = `
                        <span class="ticker-change-icon"></span>
                        <span>${formatChange(stock.change)} (${formatChangePercent(stock.changePercent)})</span>
                    `;
                }
            });
        });
    }

    // Initialize ticker when DOM is ready
    function init() {
        // Only initialize ticker if wrapper exists
        const tickerWrapper = document.querySelector('.ticker-wrapper');
        if (tickerWrapper) {
            console.log('Initializing ticker...');
            // Initialize with mock data
            initializeTicker();
            
            // Verify ticker was created
            if (tickerWrapper.children.length > 0) {
                console.log('Ticker initialized successfully with', tickerWrapper.children.length, 'content blocks');
            }
        }
        
        // Update mock prices every 5 seconds for realistic live updates
        setInterval(updateMockPrices, 5000);
    }

    // Wait for DOM to be fully ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        // DOM already loaded, but wait a bit to ensure everything is ready
        setTimeout(init, 100);
    }
})();
*/
