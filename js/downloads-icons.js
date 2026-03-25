// Update all PDF icons to match the design
document.addEventListener('DOMContentLoaded', function() {
    const pdfIcons = document.querySelectorAll('.doc-pdf-icon');
    
    const simpleFileIcon = `
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
            <polyline points="10 9 9 9 8 9"></polyline>
        </svg>
    `;
    
    pdfIcons.forEach(icon => {
        icon.innerHTML = simpleFileIcon;
    });
    
    // Do not override .doc-size content; it is populated dynamically with type and size
    
    // Update download button icons
    const downloadButtons = document.querySelectorAll('.doc-download-btn');
    const downloadIcon = `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="7 10 12 15 17 10"></polyline>
            <line x1="12" y1="15" x2="12" y2="3"></line>
        </svg>
    `;
    
    downloadButtons.forEach(btn => {
        // Keep the span but hide it, replace SVG
        const span = btn.querySelector('span');
        const svg = btn.querySelector('svg');
        if (svg) {
            svg.outerHTML = downloadIcon;
        }
    });
});
