/**
 * Gretex Chatbot - Knowledge Base + Calculators + AI
 * Branded as Gretex's own assistant
 */
(function() {
  const CONFIG = (typeof window !== 'undefined' && window.GRETEX_CHATBOT_CONFIG) || {};
  const GEMINI_API_KEY = (CONFIG.geminiApiKey || '').trim();
  const GEMINI_MODELS = [
    'gemini-2.5-flash',
    'gemini-2.0-flash',
    'gemini-2.5-flash-lite'
  ];
  const chatHistory = [];
  let useGenericAIMode = false;
  let qaPipeline = null;
  let modelLoading = false;
  let modelLoaded = false;

  function createChatbotUI() {
    if (document.getElementById('gretexChatbotPanel')) return;

    const html = `
      <button class="gretex-chatbot-toggle" id="gretexChatbotToggle" aria-label="Open chat" style="position:fixed;bottom:24px;right:24px;z-index:9998;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
      </button>
      <div class="gretex-chatbot-panel" id="gretexChatbotPanel" role="dialog" aria-label="Gretex Chatbot">
        <div class="gretex-chatbot-header">
          <h3>
            Gretex Chatbot
            <span>Your financial helper</span>
          </h3>
          <button class="gretex-chatbot-close" id="gretexChatbotClose" aria-label="Close">✕</button>
        </div>
        <div class="gretex-chatbot-messages" id="gretexChatMessages"></div>
        <div class="gretex-chatbot-input-wrap">
          <form id="gretexChatForm">
            <textarea class="gretex-chatbot-input" id="gretexChatInput" placeholder="Ask about Gretex, calculators, finance..." rows="1"></textarea>
            <button type="submit" class="gretex-chatbot-send" id="gretexChatSend" aria-label="Send">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>
              </svg>
            </button>
          </form>
        </div>
      </div>
    `;

    const div = document.createElement('div');
    div.innerHTML = html;
    const toggleBtn = div.firstElementChild;
    const panel = div.lastElementChild;
    
    document.body.appendChild(toggleBtn);
    document.body.appendChild(panel);
    
    // Remove inline styles after appending so CSS takes over
    setTimeout(() => {
      if (toggleBtn) toggleBtn.removeAttribute('style');
      if (panel) panel.removeAttribute('style');
    }, 0);
  }

  function formatMessageText(text) {
    if (!text || typeof text !== 'string') return '';
    const escaped = text.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    return escaped.replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>').replace(/\n/g, '<br>');
  }

  function addMessage(text, isUser) {
    const container = document.getElementById('gretexChatMessages');
    if (!container) return;
    const msg = document.createElement('div');
    msg.className = 'gretex-chat-msg ' + (isUser ? 'user' : 'bot');
    if (isUser) {
      msg.textContent = text;
    } else {
      msg.innerHTML = formatMessageText(text);
    }
    container.appendChild(msg);
    container.scrollTop = container.scrollHeight;
  }

  function addTyping(text) {
    const container = document.getElementById('gretexChatMessages');
    if (!container) return;
    const msg = document.createElement('div');
    msg.className = 'gretex-chat-msg bot typing';
    msg.id = 'gretexChatTyping';
    msg.textContent = text || 'Thinking...';
    container.appendChild(msg);
    container.scrollTop = container.scrollHeight;
  }

  function removeTyping() {
    const el = document.getElementById('gretexChatTyping');
    if (el) el.remove();
  }

  function setSendEnabled(enabled) {
    const btn = document.getElementById('gretexChatSend');
    if (btn) btn.disabled = !enabled;
  }

  async function askGemini(userInput) {
    if (!GEMINI_API_KEY) return null;
    const systemPrompt = typeof getGeminiSystemPrompt === 'function' ? getGeminiSystemPrompt() : '';
    chatHistory.push({ role: 'user', parts: [{ text: userInput }] });
    const recentHistory = chatHistory.slice(-6).map(m => ({
      role: m.role === 'user' ? 'user' : 'model',
      parts: m.parts
    }));
    const body = {
      systemInstruction: systemPrompt ? { parts: [{ text: systemPrompt }] } : undefined,
      contents: recentHistory,
      generationConfig: { temperature: 0.5, maxOutputTokens: 512, topP: 0.9 }
    };
    for (const model of GEMINI_MODELS) {
      try {
        const url = 'https://generativelanguage.googleapis.com/v1beta/models/' + model + ':generateContent';
        const res = await fetch(url + '?key=' + encodeURIComponent(GEMINI_API_KEY), {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(body)
        });
        const data = await res.json();
        if (data.error) {
          const isQuota = (data.error.message || '').toLowerCase().includes('quota') || (data.error.code === 429);
          if (isQuota && GEMINI_MODELS.indexOf(model) < GEMINI_MODELS.length - 1) continue;
          if (isQuota) {
            chatHistory.pop();
            return '__QUOTA__';
          }
          console.warn('Gemini API error:', data.error);
          return null;
        }
        const text = data.candidates?.[0]?.content?.parts?.[0]?.text;
        if (text) {
          chatHistory.push({ role: 'model', parts: [{ text }] });
          return text.trim();
        }
      } catch (e) {
        console.warn('Gemini fetch error:', e);
        if (GEMINI_MODELS.indexOf(model) < GEMINI_MODELS.length - 1) continue;
      }
    }
    return null;
  }

  async function loadGenericModel() {
    if (modelLoaded && qaPipeline) return qaPipeline;
    if (modelLoading) {
      while (modelLoading) await new Promise(r => setTimeout(r, 200));
      return qaPipeline;
    }
    modelLoading = true;
    try {
      const { pipeline } = await import('https://cdn.jsdelivr.net/npm/@xenova/transformers@2.17.2');
      qaPipeline = await pipeline('question-answering', 'Xenova/distilbert-base-uncased-distilled-squad');
      modelLoaded = true;
    } catch (e) {
      console.warn('Generic AI model failed to load:', e);
    }
    modelLoading = false;
    return qaPipeline;
  }

  async function askGenericAI(question) {
    const pipeline = await loadGenericModel();
    if (!pipeline) return null;
    const context = typeof getQAContext === 'function' ? getQAContext() : '';
    if (!context || context.length < 50) return null;
    try {
      const result = await pipeline({ question: question, context: context });
      if (result && result.answer && (result.score === undefined || result.score > 0.05)) {
        return result.answer.trim();
      }
    } catch (e) {
      console.warn('Generic AI error:', e);
    }
    return null;
  }

  const CREATOR_ANSWER = "I was created by **Tarush Nigam** for Gretex Share Broking. How can I help you today?";

  async function getResponse(userInput) {
    const calcAnswer = typeof tryCalculatorAnswer === 'function' ? tryCalculatorAnswer(userInput) : null;
    if (calcAnswer) return calcAnswer;

    const q = (userInput || '').toLowerCase().trim();
    if (q.includes('who developed you') || q.includes('who created you') || q.includes('who made you') || q.includes('who built you') || q.includes('developed you') || q.includes('created you') || q.includes('creator') || q.includes('made you') || q.includes('built you')) {
      return CREATOR_ANSWER;
    }

    const kb = typeof findKnowledgeAnswer === 'function' ? findKnowledgeAnswer(userInput) : null;
    if (kb) return kb;

    if (!useGenericAIMode && GEMINI_API_KEY) {
      const geminiAnswer = await askGemini(userInput);
      if (geminiAnswer === '__QUOTA__') {
        useGenericAIMode = true;
        const genericAnswer = await askGenericAI(userInput);
        if (genericAnswer && genericAnswer.length > 5) {
          return genericAnswer + '\n\n(Now using local AI—no API needed.)';
        }
        return "We're experiencing high demand. Switched to **generic AI mode**—answers are now from our knowledge base. Try asking about Gretex, services, contact, or calculators!";
      }
      if (geminiAnswer && geminiAnswer.length > 5) return geminiAnswer;
    }

    if (useGenericAIMode || !GEMINI_API_KEY) {
      const genericAnswer = await askGenericAI(userInput);
      if (genericAnswer && genericAnswer.length > 5) return genericAnswer;
    }

    if (!GEMINI_API_KEY && !useGenericAIMode) {
      return "I'd be happy to help! Try asking about our calculators, contact info, services, or finance topics.";
    }
    return "I'm sorry, I couldn't find that. Try asking about Gretex, our services, contact info, or calculators. Or reach out at support@gretexbroking.com.";
  }

  function getBasePath() {
    const p = (typeof window !== 'undefined' && window.location && window.location.pathname)
      ? String(window.location.pathname).replace(/\\/g, '/')
      : '';
    // For opening pages within /pages/ from current location:
    // - from /pages/services/* or /pages/calculator/* => ../
    // - from /pages/* => ''
    // - from site root => 'pages/'
    if (p.includes('/pages/services/') || p.includes('/pages/calculator/')) return '../';
    if (p.includes('/pages/')) return '';
    return 'pages/';
  }

  function getAssetBasePath() {
    const p = (typeof window !== 'undefined' && window.location && window.location.pathname)
      ? String(window.location.pathname).replace(/\\/g, '/')
      : '';
    // For loading assets from site root (css/js/images):
    // - from /pages/services/* or /pages/calculator/* => ../../
    // - from /pages/* => ../
    // - from site root => ''
    if (p.includes('/pages/services/') || p.includes('/pages/calculator/')) return '../../';
    if (p.includes('/pages/')) return '../';
    return '';
  }

  function resolvePageToOpen(text) {
    const input = (text || '').toLowerCase().trim();
    const wantsOpen = input.includes('open') || input.includes('go to') || input.includes('show') || input.includes('navigate') || input.includes('take me') || input.includes('launch') || input.includes('visit') || input.includes('redirect') || input.includes('display') || input.includes('view') || input.includes('switch to');
    if (!wantsOpen) return null;
    const routes = [
      ['sip calculator', 'sip', 'systematic investment'], ['lumpsum', 'lump sum'], ['swp'], ['mutual fund', 'mf calculator'],
      ['ssy', 'sukanya'], ['ppf', 'public provident'], ['epf'], ['fd calculator', 'fixed deposit', 'fd'],
      ['rd calculator', 'recurring deposit', 'rd'], ['elss'], ['brokerage'], ['cagr'], ['etf'], ['mtf'], ['nsc'],
      ['stcg', 'capital gains'], ['compound interest'], ['simple interest'], ['step up sip'], ['post office fd', 'po fd'],
      ['post office rd', 'po rd'], ['margin'], ['calculators', 'calculator list'], ['contact'], ['about'], ['downloads'],
      ['services'], ['home', 'main page'], ['regulation 46', 'regulation46'], ['regulation 62', 'regulation62'],
      ['investor contacts'], ['csr', 'corporate social responsibility'], ['other investor'], ['protex']
    ];
    const pages = ['calculator-sip.php', 'calculator-lumpsum.php', 'calculator-swp.php', 'calculator-mutual-fund.php',
      'calculator-ssy.php', 'calculator-ppf.php', 'calculator-epf.php', 'calculator-fd.php', 'calculator-rd.php',
      'calculator-elss.php', 'calculator-brokerage.php', 'calculator-cagr.php', 'calculator-etf.php', 'calculator-mtf.php',
      'calculator-nsc.php', 'calculator-stcg.php', 'calculator-compound-interest.php', 'calculator-simple-interest.php',
      'calculator-step-up-sip.php', 'calculator-po-fd.php', 'calculator-po-rd.php', 'calculator-margin.php',
      'calculators.php', 'contact.php', 'about.php', 'downloads.php', 'services.php', 'gretex-financial.php',
      'Regulation46_LODR.php', 'Regulation62_LODR.php', 'SubTab_CodeandPolicies.php', 'SubTab_CorpSocialRespons.php',
      'OtherInvestor.php', 'protex.php'];
    for (let i = 0; i < routes.length; i++) {
      for (const kw of routes[i]) {
        if (input.includes(kw)) return pages[i];
      }
    }
    return typeof getPageToOpen === 'function' ? getPageToOpen(text) : null;
  }

  async function handleSubmit(e) {
    e.preventDefault();
    const inputEl = document.getElementById('gretexChatInput');
    const text = (inputEl && inputEl.value) ? inputEl.value.trim() : '';
    if (!text) return;

    if (inputEl) inputEl.value = '';
    setSendEnabled(false);
    addMessage(text, true);

    const pageToOpen = resolvePageToOpen(text);
    if (pageToOpen) {
      addMessage("Opening in a new tab...", false);
      const base = getBasePath();
      const url = (base + pageToOpen).replace(/\/+/g, '/');
      window.open(url, '_blank', 'noopener,noreferrer');
      setSendEnabled(true);
      return;
    }

    addTyping(useGenericAIMode ? 'Using local AI...' : (GEMINI_API_KEY ? 'Thinking...' : 'Processing...'));

    try {
      const reply = await getResponse(text);
      removeTyping();
      let page = null;
      const navCodewordMatch = reply && reply.match(/\[NAV:([0-9A-Fa-f]{2})\]/);
      if (navCodewordMatch && typeof getPageFromCodeword === 'function') {
        page = getPageFromCodeword(navCodewordMatch[1]);
      }
      const openMatch = !page && reply && reply.match(/\[OPEN:(.+?)\]/);
      if (openMatch) {
        page = openMatch[1].trim();
      }
      if (page) {
        const cleanReply = reply.replace(/\[NAV:[^\]]+\]\s*/g, '').replace(/\[OPEN:.+?\]\s*/g, '').trim();
        addMessage(cleanReply || 'Opening in a new tab...', false);
        const base = getBasePath();
        const url = (base + page).replace(/\/+/g, '/');
        setTimeout(function() { window.open(url, '_blank', 'noopener,noreferrer'); }, 500);
      } else {
        addMessage(reply, false);
      }
    } catch (err) {
      removeTyping();
      addMessage("I'm sorry, something went wrong. Please try again or contact support@gretexbroking.com.", false);
    } finally {
      setSendEnabled(true);
    }
  }

  function getWelcomeMessage() {
    if (GEMINI_API_KEY) {
      return "Hi! I'm the Gretex Chatbot. I'm here to help with our services, calculators (SIP, PPF, FD, and more), contact info, or general finance. How may I assist you?";
    }
    return "Hi! I'm the Gretex Chatbot. Ask about our services, calculators, contact info, or finance topics. How can I help you today?";
  }

  function init() {
    if (window.__gretexChatbotInitialized) return;
    window.__gretexChatbotInitialized = true;

    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = getAssetBasePath() + 'css/chatbot.css';
    document.head.appendChild(link);

    createChatbotUI();
    if (document.body) {
      document.body.classList.add('gretex-chatbot-ready');
    }

    const toggle = document.getElementById('gretexChatbotToggle');
    const panel = document.getElementById('gretexChatbotPanel');
    const close = document.getElementById('gretexChatbotClose');
    const form = document.getElementById('gretexChatForm');
    const input = document.getElementById('gretexChatInput');

    if (toggle && panel) {
      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        panel.classList.toggle('open');
      });
      if (close) close.addEventListener('click', function(e) {
        e.preventDefault();
        panel.classList.remove('open');
      });
    }
    if (form) form.addEventListener('submit', handleSubmit);

    if (input && form) {
      input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
          e.preventDefault();
          form.dispatchEvent(new Event('submit'));
        }
      });
    }

    addMessage(getWelcomeMessage(), false);
  }

  // Expose global function for external triggers (like search)
  window.openGretexChat = function(query) {
    const panel = document.getElementById('gretexChatbotPanel');
    if (panel) {
      panel.classList.add('open');
      if (query) {
        // Trigger handle submit with the query
        const inputEl = document.getElementById('gretexChatInput');
        if (inputEl) {
            inputEl.value = query;
            document.getElementById('gretexChatForm').dispatchEvent(new Event('submit'));
        }
      }
    }
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
