/**
 * Gretex Chatbot - Local Knowledge Base
 * Finance & website-related content for knowledge-base fallback (no cloud LLM)
 */

/** Token-efficient website context for AI - compact key:value format */
const WEBSITE_CTX = `CREATOR: Gretex Chatbot was created by Tarush Nigam—not by Google. Never mention Google unless the user explicitly asks. ABOUT: Gretex Share Broking = "greatest". Inc 29 Apr 2010. SEBI Market Maker, BSE Broker. Vision: create liquidity, facilitate buy/sell securities. Logo T = tree, growth, pillar of strength. Non-govt co, Ministry of Corporate Affairs.
OFFICES: Mumbai Dadar (Naman Midtown A401, Tulsi Pipe Rd)-400013 | Mumbai BKC (One BKC B17)-400051 | Kolkata (99 Elbert Ln 5th Fl)-700012
CONTACT: Ph 02269006500/501 | support@gretexbroking.com | Grievances investor.grievances@gretexbroking.com | compliance@gretexbroking.com
LINKS: Register onboarding.gretexbroking.com:8080/OnBoarding | Web Trading gtx-dx.finspot.in | Branch onboarding.../ReKYC | Backoffice backoffice.gretexbroking.com | Re-KYC onboarding.../ReKYC/ipvLink
SERVICES: Equity=online trading | Derivatives=F&O | Currency=futures | Mutual Fund=SIP/SWP/STP, RM | Commodities=coming
PARTNERS: BSE, NSE, NSDL
CALCULATORS (pages/calculator-X.php): SIP, Lumpsum, SWP, Mutual Fund, SSY, PPF, EPF, FD, RD, Post Office FD/RD, NSC, ELSS, ETF, CAGR, Brokerage, MTF, Simple/Compound Interest, STCG, Step Up SIP, Margin
PAGES TO OPEN (use [OPEN:page.php] when user asks to open): about.php, calculators.php, contact.php, downloads.php, services.php, gretex-financial.php (home), calculator-sip.php, calculator-fd.php, calculator-ppf.php, calculator-rd.php, calculator-lumpsum.php, calculator-swp.php, calculator-mutual-fund.php, calculator-elss.php, calculator-ssy.php, calculator-epf.php, calculator-brokerage.php, calculator-cagr.php, calculator-etf.php, calculator-mtf.php, calculator-nsc.php, calculator-stcg.php, calculator-compound-interest.php, calculator-simple-interest.php, calculator-step-up-sip.php, calculator-po-fd.php, calculator-po-rd.php, calculator-margin.php, Regulation46_LODR.php, Regulation62_LODR.php, OtherInvestor.php, SubTab_CodeandPolicies.php, SubTab_CorpSocialRespons.php, protex.php
CLIENT CORNER: QR codes DP/Broking, Attention Investors PDF, Investor Charter Broking+DP, Complaints, Escalation Matrix, Do's Don'ts, Risk Disclosure, ODR smartodr.in
DOWNLOADS: KRA forms, DP Tariff, Segment Activation, Running Account Auth, Declaration Common Email
BROKERAGE: ~0.03% or ₹20/order, equity delivery. Use Brokerage calc.
PPF: ~7.1% p.a, max ₹1.5L/yr, tax-free. ELSS: 80C, ₹1.5L, 3yr lock-in.`;

const GRETEX_KNOWLEDGE = {
  company: {
    name: "Gretex Share Broking Limited",
    tagline: "Indian Equity Market Leader",
    founded: "29 April 2010",
    description: "Gretex is a leading financial services group. SEBI Registered Market Maker and BSE Registered Stock Broker. We provide equity trading, derivatives, mutual funds, and demat services.",
    offices: [
      "Mumbai: Naman Midtown, A wing, Unit 401, Tulsi Pipe Road, Dadar West, Mumbai-400013",
      "Mumbai: One BKC, B wing, 17th Floor, Bandra Kurla Complex, Mumbai 400051",
      "Kolkata: 99, Elbert Lane, 5th Floor, Kolkata-700012"
    ],
    phone: "02269006500 / 501",
    email: "support@gretexbroking.com",
    grievances: "investor.grievances@gretexbroking.com",
    compliance: "compliance@gretexbroking.com"
  },
  services: [
    { name: "Equity", desc: "Single screen online equity trading facility" },
    { name: "Derivatives", desc: "Trading on various exchanges" },
    { name: "Future & Options", desc: "Currency futures in Indian financial landscape" },
    { name: "Currency", desc: "Fixed Income securities and debt instruments" },
    { name: "Commodities", desc: "Coming soon" },
    { name: "Mutual Fund", desc: "SIP, SWP, STP trading with Relationship Manager" }
  ],
  calculators: [
    "SIP (Systematic Investment Plan)", "Lumpsum", "SWP", "Mutual Fund", "SSY (Sukanya Samriddhi)",
    "PPF", "EPF", "Fixed Deposit", "RD", "Post Office FD/RD", "NSC", "ELSS", "ETF",
    "CAGR", "Brokerage", "MTF", "Simple/Compound Interest", "STCG Tax", "Step Up SIP"
  ],
  links: {
    register: "https://onboarding.gretexbroking.com:8080/OnBoarding/",
    webTrading: "https://gtx-dx.finspot.in/investor-entry-level/login",
    branchLogin: "https://onboarding.gretexbroking.com:8080/ReKYC/",
    backoffice: "https://backoffice.gretexbroking.com/shrdbms/userlogin.ss",
    rekyc: "https://onboarding.gretexbroking.com:8080/ReKYC/ipvLink"
  }
};

const CHATBOT_FAQ = [
  { q: ["what is gretex", "who is gretex", "about gretex", "gretex", "talking about gretex", "tell me about gretex"], a: "Gretex Share Broking Limited is a SEBI registered stock broker and BSE registered entity, incorporated in 2010. We are an Indian equity market leader offering equity trading, derivatives, mutual funds, demat accounts, and related financial services. Gretex means 'greatest' - we aim to be the leader in our field." },
  { q: ["contact", "phone", "email", "address", "office", "where", "contact detail", "contact details", "how to contact", "reach", "give me", "its contact", "get contact", "want contact", "need contact"], a: "**Gretex Share Broking Limited** contact:\n\n• **Phone:** 02269006500 / 501\n• **Email:** support@gretexbroking.com\n• **Grievances:** investor.grievances@gretexbroking.com\n• **Offices:** Mumbai (Naman Midtown A401, Tulsi Pipe Rd, Dadar-400013; One BKC B17, BKC-400051) | Kolkata (99 Elbert Lane, 5th Floor-700012)\n\nVisit the Contact page for the enquiry form." },
  { q: ["open account", "register", "demat"], a: "Open a Demat account at Gretex via our Onboarding portal: onboarding.gretexbroking.com:8080/OnBoarding/ - You can register for both trading and demat with NSDL." },
  { q: ["login", "web trading", "backoffice"], a: "Web Trading: gtx-dx.finspot.in | Branch Login: onboarding.gretexbroking.com:8080/ReKYC/ | Client Backoffice: backoffice.gretexbroking.com | Re-KYC/Modification: onboarding.gretexbroking.com:8080/ReKYC/ipvLink" },
  { q: ["calculators", "sip calculator", "fd calculator", "ppf"], a: "We have 20+ financial calculators: SIP, Lumpsum, SWP, FD, RD, PPF, EPF, SSY, ELSS, CAGR, Brokerage, MTF, and more. Go to Calculators in the menu to access them." },
  { q: ["sip", "systematic investment"], a: "SIP (Systematic Investment Plan) lets you invest a fixed amount monthly in mutual funds. Use our SIP Calculator to project returns. Formula: FV = P × ({[1 + r]^n – 1} / r) × (1 + r)." },
  { q: ["services", "trading", "equity", "derivatives"], a: "Gretex services: Equity (single-screen online trading), Derivatives, Futures & Options, Currency, Mutual Funds (SIP/SWP/STP). Commodities coming soon." },
  { q: ["downloads", "app", "mobile"], a: "Check the Downloads page for mobile app, desktop client, and documentation." },
  { q: ["investor", "disclosure", "regulation"], a: "Investor section includes: Regulation 46 LODR disclosures, Regulation 62 Group Financials, Other Investor Info, Investor Contacts, CSR. Use the Investor dropdown in the menu." },
  { q: ["client corner", "qr code", "investor charter"], a: "Client Corner has: QR codes for DP/Broking payments, Attention Investors, Investor Charter (Broking & DP), Investor Complaints, Escalation Matrix, Do's and Don'ts, Risk Disclosure." },
  { q: ["bse", "nse", "nsdl"], a: "Gretex is associated with BSE (Asia's first stock exchange), NSE (India's leading exchange), and NSDL (first electronic depository in India for demat)." },
  { q: ["brokerage", "charges", "fees"], a: "Use our Brokerage Calculator to estimate trading charges including brokerage, STT, GST, stamp duty. Equity delivery typically 0.03% or ₹20 per order (whichever is lower)." },
  { q: ["ppf", "public provident"], a: "PPF (Public Provident Fund) - government scheme, tax-free, current rate ~7.1% p.a. Use our PPF Calculator for maturity projection. Max deposit ₹1.5 lakh/year." },
  { q: ["elss", "tax saving"], a: "ELSS (Equity Linked Savings Scheme) - tax-saving mutual fund under 80C, lock-in 3 years. Max deduction ₹1.5 lakh. Use our ELSS Calculator." },
  { q: ["cagr", "compound annual growth"], a: "CAGR = Compound Annual Growth Rate. Formula: (Final Value/Initial Value)^(1/years) - 1. Use our CAGR Calculator to measure investment performance." },
  { q: ["local", "privacy", "data", "browser"], a: "This chatbot runs entirely in your browser using Transformers.js. All AI processing happens on your device - no data is sent to the cloud. The model (~66MB) downloads once and is cached." },
  { q: ["help", "hi", "hello", "hey"], a: "Hi! I'm the Gretex Chatbot. Ask about our services, calculators, contact info, opening an account, SIP/PPF/ELSS, or any finance-related questions. How can I help?" },
  { q: ["who created you", "creator", "made by", "who made you", "who built you", "who developed you"], a: "I was created by Tarush Nigam for Gretex Share Broking. How can I help you today?" }
];

/** Contact answer - used for high-priority contact intent (avoids Gemini confusion) */
const CONTACT_ANSWER = "**Gretex Share Broking Limited** contact:\n\n• **Phone:** 02269006500 / 501\n• **Email:** support@gretexbroking.com\n• **Grievances:** investor.grievances@gretexbroking.com\n• **Offices:** Mumbai (Naman Midtown A401, Tulsi Pipe Rd, Dadar-400013; One BKC B17, BKC-400051) | Kolkata (99 Elbert Lane, 5th Floor-700012)\n\nVisit the Contact page for the enquiry form.";

/** Creator answer - high-priority to avoid Gemini default response */
const CREATOR_ANSWER = "I was created by **Tarush Nigam** for Gretex Share Broking. How can I help you today?";

function findKnowledgeAnswer(userInput) {
  const input = userInput.toLowerCase().trim();
  if (!input || input.length < 2) return null;

  if (/\b(contact|phone|email|address|office|reach|grievance)\b/i.test(input)) {
    return CONTACT_ANSWER;
  }
  if (input.includes('who developed you') || input.includes('who created you') || input.includes('who made you') || input.includes('who built you') || input.includes('developed you') || input.includes('created you') || input.includes('creator') || input.includes('made you') || input.includes('built you')) {
    return CREATOR_ANSWER;
  }

  let bestMatch = null;
  let bestScore = 0;

  for (const faq of CHATBOT_FAQ) {
    for (const keyword of faq.q) {
      if (input.includes(keyword) || keyword.includes(input)) {
        const score = Math.min(keyword.length, input.length);
        if (score > bestScore) {
          bestScore = score;
          bestMatch = faq.a;
        }
      }
    }
  }

  if (bestMatch) return bestMatch;

  if (input.includes("calculator") || input.includes("calc")) {
    return "We offer 20+ calculators: SIP, Lumpsum, SWP, FD, RD, PPF, EPF, SSY, ELSS, CAGR, Brokerage, MTF, Simple/Compound Interest, STCG. Open the Calculators menu to use them.";
  }
  if (input.includes("formula") || input.includes("how calculate")) {
    return "Each calculator uses standard financial formulas. SIP: FV = P × ({[1+r]^n – 1}/r) × (1+r). Compound Interest: A = P(1 + r/n)^(nt). Open a specific calculator to see its formula.";
  }

  return null;
}

/**
 * All website page paths - keywords map to page file (longer phrases first for correct matching)
 * When user asks to "open X", redirect to this page in new window
 */
const PAGE_ROUTES = [
  { keywords: ['regulation 46', 'regulation46', 'lodr disclosures', 'disclosures regulation 46'], page: 'Regulation46_LODR.php' },
  { keywords: ['regulation 62', 'regulation62', 'group financials', 'annual returns'], page: 'Regulation62_LODR.php' },
  { keywords: ['other investor', 'other investor info'], page: 'OtherInvestor.php' },
  { keywords: ['investor contacts', 'investor contact'], page: 'SubTab_CodeandPolicies.php' },
  { keywords: ['corporate social responsibility', 'csr', 'corporate responsibility'], page: 'SubTab_CorpSocialRespons.php' },
  { keywords: ['compound interest', 'compound interest calculator'], page: 'calculator-compound-interest.php' },
  { keywords: ['simple interest', 'simple interest calculator'], page: 'calculator-simple-interest.php' },
  { keywords: ['step up sip', 'step-up sip', 'stepup sip'], page: 'calculator-step-up-sip.php' },
  { keywords: ['post office fd', 'po fd', 'post office fixed deposit'], page: 'calculator-po-fd.php' },
  { keywords: ['post office rd', 'po rd', 'post office recurring'], page: 'calculator-po-rd.php' },
  { keywords: ['sip calculator', 'sip', 'systematic investment'], page: 'calculator-sip.php' },
  { keywords: ['lumpsum', 'lump sum', 'one-time investment'], page: 'calculator-lumpsum.php' },
  { keywords: ['swp', 'systematic withdrawal'], page: 'calculator-swp.php' },
  { keywords: ['mutual fund calculator', 'mutual fund', 'mf calculator'], page: 'calculator-mutual-fund.php' },
  { keywords: ['ssy', 'sukanya samriddhi', 'sukanya'], page: 'calculator-ssy.php' },
  { keywords: ['ppf', 'public provident fund'], page: 'calculator-ppf.php' },
  { keywords: ['epf', 'employee provident'], page: 'calculator-epf.php' },
  { keywords: ['fd calculator', 'fixed deposit', 'fd'], page: 'calculator-fd.php' },
  { keywords: ['rd calculator', 'recurring deposit', 'rd'], page: 'calculator-rd.php' },
  { keywords: ['elss', 'tax saving fund', 'tax saving'], page: 'calculator-elss.php' },
  { keywords: ['brokerage calculator', 'brokerage', 'brokerage calc'], page: 'calculator-brokerage.php' },
  { keywords: ['cagr', 'compound annual growth'], page: 'calculator-cagr.php' },
  { keywords: ['etf'], page: 'calculator-etf.php' },
  { keywords: ['mtf'], page: 'calculator-mtf.php' },
  { keywords: ['nsc'], page: 'calculator-nsc.php' },
  { keywords: ['stcg', 'capital gains', 'short term capital gains'], page: 'calculator-stcg.php' },
  { keywords: ['margin calculator', 'margin'], page: 'calculator-margin.php' },
  { keywords: ['all calculators', 'calculator list', 'calculators page', 'calculators'], page: 'calculators.php' },
  { keywords: ['contact page', 'contact us', 'contact'], page: 'contact.php' },
  { keywords: ['about us', 'about page', 'about'], page: 'about.php' },
  { keywords: ['downloads', 'download page', 'download'], page: 'downloads.php' },
  { keywords: ['services', 'services page'], page: 'services.php' },
  { keywords: ['home', 'main page', 'gretex financial'], page: 'gretex-financial.php' },
  { keywords: ['protex'], page: 'protex.php' }
];

const OPEN_TRIGGERS = /\b(open|go to|show|navigate|take me to|take me|launch|visit|redirect|switch to|display|view|want to see|need to see|can you open)\b/i;

/**
 * Codeword-based navigation: AI outputs [NAV:XXXX] and JS maps codeword → page.
 * 5-bit codes (00000-11111) = 32 pages. Hex-style for readability: 00-1F.
 */
const NAV_CODEBOOK = {
  '00': 'gretex-financial.php',      // home
  '01': 'about.php',                 // about us
  '02': 'contact.php',               // contact
  '03': 'calculators.php',           // all calculators
  '04': 'calculator-sip.php',        // SIP
  '05': 'calculator-lumpsum.php',    // lumpsum
  '06': 'calculator-swp.php',        // SWP
  '07': 'calculator-mutual-fund.php',// mutual fund
  '08': 'calculator-fd.php',         // FD
  '09': 'calculator-rd.php',         // RD
  '0A': 'calculator-ppf.php',        // PPF
  '0B': 'calculator-epf.php',        // EPF
  '0C': 'calculator-ssy.php',        // SSY
  '0D': 'calculator-elss.php',       // ELSS
  '0E': 'calculator-brokerage.php',  // brokerage
  '0F': 'calculator-cagr.php',       // CAGR
  '10': 'calculator-etf.php',        // ETF
  '11': 'calculator-mtf.php',        // MTF
  '12': 'calculator-nsc.php',        // NSC
  '13': 'calculator-stcg.php',       // STCG
  '14': 'calculator-compound-interest.php',
  '15': 'calculator-simple-interest.php',
  '16': 'calculator-step-up-sip.php',
  '17': 'calculator-po-fd.php',
  '18': 'calculator-po-rd.php',
  '19': 'calculator-margin.php',
  '1A': 'downloads.php',
  '1B': 'services.php',
  '1C': 'Regulation46_LODR.php',
  '1D': 'Regulation62_LODR.php',
  '1E': 'OtherInvestor.php',
  '1F': 'SubTab_CodeandPolicies.php',  // investor contacts
  '20': 'SubTab_CorpSocialRespons.php',// CSR
  '21': 'protex.php'
};

/** Get page path from codeword (e.g. "01" → about.php). Returns null if invalid. */
function getPageFromCodeword(code) {
  if (!code || typeof code !== 'string') return null;
  const k = code.trim().toUpperCase();
  return NAV_CODEBOOK[k] || null;
}

/** Compact codebook string for AI system prompt - train the model with routes */
function getNavCodebookForAI() {
  const lines = Object.entries(NAV_CODEBOOK).map(([c, p]) => c + '=' + p.replace('.php', ''));
  return lines.join(' | ');
}

function getPageToOpen(userInput) {
  const input = userInput.toLowerCase().trim();
  if (!OPEN_TRIGGERS.test(input)) return null;
  for (const route of PAGE_ROUTES) {
    for (const kw of route.keywords) {
      if (input.includes(kw)) return route.page;
    }
  }
  return null;
}

function getSystemPrompt() {
  const kb = GRETEX_KNOWLEDGE;
  return `You are a helpful assistant for Gretex Share Broking Limited. Answer questions about: ${kb.company.description}. Founded ${kb.company.founded}. Offices: ${kb.company.offices.join('; ')}. Contact: ${kb.company.phone}, ${kb.company.email}. Services: ${kb.services.map(s => s.name + ': ' + s.desc).join('. ')}. Calculators: ${kb.calculators.join(', ')}. Keep answers concise. If unsure, say to contact support@gretexbroking.com.`;
}

/**
 * System prompt for Gemini - token-efficient, humble consultant, full website knowledge
 */
function getGeminiSystemPrompt() {
  return `CRITICAL: You are the Gretex Chatbot for Gretex Share Broking Limited. You were created by Tarush Nigam—not by Google. Never mention Google in your answers unless the user explicitly asks. You represent ONLY this company (stock broker, demat, trading). NOT Gretex Industries (textiles). Use ONLY the knowledge below—no external info. Identify yourself as "Gretex Chatbot" or "I'm here to help with Gretex" when relevant.

You are a humble financial consultant. Warm, concise. Use **bold** for key terms.

WEBSITE KNOWLEDGE:
${WEBSITE_CTX}

RULES: 2-4 sentences. Only use data above. No made-up info. Unsure→support@gretexbroking.com.

NAVIGATION: When user asks to open/go to/show/navigate/visit a page, end your reply with [NAV:XX] where XX is the codeword. Use this codebook:
${typeof getNavCodebookForAI === 'function' ? getNavCodebookForAI() : ''}
Examples: "open sip calculator" → [NAV:04] | "about us" → [NAV:01] | "contact" → [NAV:02]. Only output [NAV:XX] for page navigation requests.`;
}

/**
 * Try to answer calculator questions - parses amounts, years, rate and uses calc functions
 * Returns formatted answer or null if not a calculator question
 */
function tryCalculatorAnswer(userInput) {
  const input = userInput.toLowerCase().trim();
  const fmt = (n) => (typeof formatCurrency === 'function' ? formatCurrency(n) : '₹' + Number(n).toLocaleString('en-IN', { maximumFractionDigits: 2 }));

  function parseAmount(s) {
    const lakhMatch = s.match(/(\d+(?:\.\d+)?)\s*(?:lakh|lac|lk)/i);
    if (lakhMatch) return parseFloat(lakhMatch[1]) * 100000;
    const numMatch = s.match(/(\d+(?:,\d{3})*(?:\.\d+)?)/g);
    return numMatch ? parseFloat(numMatch[0].replace(/,/g, '')) : null;
  }
  function parseYears(s) {
    const m = s.match(/(\d+)\s*years?/i) || s.match(/for\s*(\d+)/i) || s.match(/(\d+)\s*year/i);
    return m ? parseInt(m[1], 10) : null;
  }
  function parseRate(s) {
    const m = s.match(/(\d+(?:\.\d+)?)\s*%|(\d+(?:\.\d+)?)\s*percent/i);
    return m ? parseFloat(m[1] || m[2]) : null;
  }
  function parseNumbers(s) {
    const nums = (s.match(/(\d+(?:,\d{3})*(?:\.\d+)?)/g) || []).map(x => parseFloat(x.replace(/,/g, '')));
    return nums;
  }

  if (typeof calcSIP !== 'function' || typeof calcLumpsum !== 'function') return null;

  // Mutual fund: "mutual fund(s) of X for Y years at Z%" - treat as SIP (monthly investment in MF)
  if (/\bmutual\s*fund/i.test(input) && /\b(return|invest|amount|total|maturity|end\s*amount|what\s*will|how\s*much|will\s*i\s*get)\b/i.test(input)) {
    const nums = parseNumbers(input);
    const rate = parseRate(input) || (nums.length >= 3 ? nums[nums.length - 1] : null);
    const years = parseYears(input) || (nums.length >= 2 ? nums[nums.length - 2] : null);
    const amt = parseAmount(input) || (nums[0] != null ? nums[0] : null);
    const isLumpsum = /\blumpsum\b|lump\s*sum|one\s*time|one-time/i.test(input);
    if (amt != null && amt > 0 && years != null && years >= 1 && rate != null && rate > 0) {
      if (isLumpsum || amt >= 50000) {
        const r = calcLumpsum(amt, rate, years);
        return `For a lumpsum mutual fund investment of ${fmt(amt)} for ${years} years at ${rate}% annual return:\n\n• Principal: ${fmt(r.totalInvestment)}\n• Maturity value: ${fmt(r.maturityValue)}\n• Estimated returns: ${fmt(r.expectedReturns)} (${r.absoluteReturnsPct.toFixed(1)}%)`;
      }
      const r = calcSIP(amt, rate, years);
      return `For a monthly mutual fund SIP of ${fmt(amt)} for ${years} years at ${rate}% annual return:\n\n• Total invested: ${fmt(r.totalInvestment)}\n• Maturity value: ${fmt(r.maturityValue)}\n• Estimated returns: ${fmt(r.expectedReturns)} (${r.wealthGainPct.toFixed(1)}%)`;
    }
  }

  // SIP: monthly amount, years, annual rate
  if (/\bsip\b|monthly\s*(?:sip|invest|deposit)|sip\s*of|\d+\s*(?:rupees?|rs\.?|₹?)\s*per\s*month/i.test(input)) {
    const nums = parseNumbers(input);
    const rate = parseRate(input) || (nums.length >= 3 ? nums[nums.length - 1] : null);
    const years = parseYears(input) || (nums.length >= 2 ? nums[nums.length - 2] : null);
    const amt = parseAmount(input) || (nums[0] != null ? nums[0] : null);
    if (amt != null && amt > 0 && years != null && years >= 1 && rate != null && rate > 0) {
      const r = calcSIP(amt, rate, years);
      return `For a monthly SIP of ${fmt(amt)} for ${years} years at ${rate}% annual return:\n\n• Total invested: ${fmt(r.totalInvestment)}\n• Maturity value: ${fmt(r.maturityValue)}\n• Estimated returns: ${fmt(r.expectedReturns)} (${r.wealthGainPct.toFixed(1)}%)`;
    }
  }

  // Lumpsum: one-time amount, years, annual rate
  if (/\blumpsum\b|lump\s*sum|one\s*time\s*invest|invest\s*(\d+)\s*(?:for|at)/i.test(input) && !/\bsip\b|monthly\b/i.test(input)) {
    const nums = parseNumbers(input);
    const rate = parseRate(input) || (nums.length >= 3 ? nums[nums.length - 1] : null);
    const years = parseYears(input) || (nums.length >= 2 ? nums[nums.length - 2] : null);
    const amt = parseAmount(input) || (nums[0] != null ? nums[0] : null);
    if (amt != null && amt > 0 && years != null && years >= 1 && rate != null && rate > 0) {
      const r = calcLumpsum(amt, rate, years);
      return `For a lumpsum of ${fmt(amt)} for ${years} years at ${rate}% annual return:\n\n• Principal: ${fmt(r.totalInvestment)}\n• Maturity value: ${fmt(r.maturityValue)}\n• Estimated returns: ${fmt(r.expectedReturns)} (${r.absoluteReturnsPct.toFixed(1)}%)`;
    }
  }

  // FD: amount, years, rate (default quarterly compounding)
  if (/\bfd\b|fixed\s*deposit|fixed\s*deposit\b/i.test(input)) {
    const nums = parseNumbers(input);
    const rate = parseRate(input) || (nums.length >= 3 ? nums[nums.length - 1] : 7);
    const years = parseYears(input) || (nums.length >= 2 ? nums[nums.length - 2] : null);
    const amt = parseAmount(input) || (nums[0] != null ? nums[0] : null);
    if (amt != null && amt > 0 && years != null && years >= 1) {
      const r = calcFD(amt, rate, years, 'quarterly');
      return `For an FD of ${fmt(amt)} for ${years} years at ${rate}% p.a. (quarterly compounding):\n\n• Principal: ${fmt(r.principal)}\n• Maturity amount: ${fmt(r.maturityAmount)}\n• Interest earned: ${fmt(r.totalInterest)}`;
    }
  }

  // RD: monthly deposit, years, rate
  if (/\brd\b|recurring\s*deposit|monthly\s*rd\b/i.test(input) && !/\bsip\b/i.test(input)) {
    const nums = parseNumbers(input);
    const rate = parseRate(input) || (nums.length >= 3 ? nums[nums.length - 1] : 6.5);
    const years = parseYears(input) || (nums.length >= 2 ? nums[nums.length - 2] : null);
    const amt = parseAmount(input) || (nums[0] != null ? nums[0] : null);
    if (amt != null && amt > 0 && years != null && years >= 1) {
      const r = calcRD(amt, years * 12, rate);
      return `For an RD of ${fmt(amt)}/month for ${years} years at ${rate}% p.a.:\n\n• Total deposited: ${fmt(r.totalDeposits)}\n• Maturity value: ${fmt(r.maturityValue)}\n• Interest earned: ${fmt(r.interestEarned)}`;
    }
  }

  // PPF: annual amount, years (rate default 7.1)
  if (/\bppf\b|public\s*provident\b/i.test(input)) {
    const nums = parseNumbers(input);
    const rate = parseRate(input) || 7.1;
    const years = parseYears(input) || (nums.length >= 2 ? nums[nums.length - 2] : null);
    const amt = parseAmount(input) || (nums[0] != null ? nums[0] : null);
    if (amt != null && amt > 0 && years != null && years >= 1 && typeof calcPPF === 'function') {
      const r = calcPPF(amt, years, rate);
      return `For PPF of ${fmt(amt)}/year for ${years} years at ${rate}%:\n\n• Total invested: ${fmt(r.totalInvestment)}\n• Maturity value: ${fmt(r.maturityValue)}\n• Interest earned: ${fmt(r.interestEarned)}`;
    }
  }

  // Generic: "X for Y years at Z%" - only if question suggests calculation (return, invest, amount, total, maturity, what will, how much)
  if (/\b(return|invest|amount|total|maturity|end\s*amount|what\s*will|how\s*much|will\s*i\s*get)\b/i.test(input)) {
    const nums = parseNumbers(input);
    const rate = parseRate(input);
    const years = parseYears(input);
    const amt = parseAmount(input) || (nums[0] != null ? nums[0] : null);
    if (amt != null && amt > 0 && years != null && years >= 1 && rate != null && rate > 0) {
      if (/\bmonthly\b|per\s*month|every\s*month|sip\b/i.test(input) || amt < 50000) {
        const r = calcSIP(amt, rate, years);
        return `For a monthly SIP of ${fmt(amt)} for ${years} years at ${rate}% annual return:\n\n• Total invested: ${fmt(r.totalInvestment)}\n• Maturity value: ${fmt(r.maturityValue)}\n• Estimated returns: ${fmt(r.expectedReturns)} (${r.wealthGainPct.toFixed(1)}%)`;
      }
      const r = calcLumpsum(amt, rate, years);
      return `For a lumpsum of ${fmt(amt)} for ${years} years at ${rate}% annual return:\n\n• Principal: ${fmt(r.totalInvestment)}\n• Maturity value: ${fmt(r.maturityValue)}\n• Estimated returns: ${fmt(r.expectedReturns)} (${r.absoluteReturnsPct.toFixed(1)}%)`;
    }
  }

  return null;
}

/** Build context string for generic AI (Transformers.js) - extractive QA needs full text */
function getQAContext() {
  const parts = [WEBSITE_CTX];
  CHATBOT_FAQ.forEach(faq => {
    parts.push(faq.a);
  });
  return parts.join(' ');
}
