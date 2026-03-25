# Gretex Chatbot - In-Browser AI (Transformers.js)

The chatbot runs **fully in the visitor's browser** – no cloud LLMs (Gemini, ChatGPT, etc.), no API keys, no server cost.

## How It Works

1. **Transformers.js** – Runs a small AI model (DistilBERT, ~66MB) directly in the browser
2. **Question-Answering** – Extracts answers from the Gretex knowledge base
3. **Knowledge-base fallback** – Keyword/FAQ matching when the AI model doesn't find a good answer

## For Visitors

- **First use:** The model downloads once (~66MB) and is cached
- **After that:** Responses are fast, all processing is local
- **Privacy:** No data leaves the device; no cloud APIs

## For Deployment

- Works on any static host (GitHub Pages, Netlify, Vercel, etc.)
- No backend or API keys
- No cost

## Files

- `js/chatbot.js` – Main logic (Transformers.js + fallback)
- `js/chatbot-knowledge.js` – Knowledge base & QA context
- `css/chatbot.css` – Chatbot UI styles

## Pages with Chatbot

gretex-financial, about, calculators, contact, downloads, services

## Adding to More Pages

Before `</body>`:
```html
<script src="../js/chatbot-knowledge.js"></script>
<script src="../js/chatbot.js"></script>
```

## Technical Notes

- Uses `@xenova/transformers` via CDN (dynamic import)
- Model: `Xenova/distilbert-base-uncased-distilled-squad`
- Requires modern browsers (ES modules, Web Workers)
