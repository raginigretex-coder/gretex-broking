# Robust script to inject chatbot dependencies
$pagesDir = "c:\Users\Gretex\OneDrive\Desktop\GretexShare\pages"
$files = Get-ChildItem -Path $pagesDir -Filter "*.html"

$scriptsToRemove = @(
    '<script src="../js/search.js"></script>',
    '<script src="../js/mobile-menu.js"></script>',
    '<script src="../js/chatbot-knowledge.js"></script>',
    '<script src="../js/chatbot-config.js"></script>',
    '<script src="../js/chatbot.js"></script>'
)

$newScripts = @"
    <script src="../js/search.js"></script>
    <script src="../js/mobile-menu.js"></script>
    <script src="../js/chatbot-knowledge.js"></script>
    <script src="../js/chatbot-config.js"></script>
    <script src="../js/chatbot.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
"@

foreach ($file in $files) {
    $content = Get-Content -Path $file.FullName -Raw -Encoding UTF8
    
    # 1. Clean up old versions of our specific scripts to avoid duplicates
    foreach ($s in $scriptsToRemove) {
        $content = $content.Replace($s, "")
    }
    # Clean up the old lucide init block too if it matches exactly
    $oldLucide = '    <script>
        // Initialize Lucide icons
        if (typeof lucide !== "undefined") {
            lucide.createIcons();
        }
    </script>'
    # Simple replace for common variations
    $content = $content -replace '(?s)<script>\s*// Initialize Lucide icons.*?lucide\.createIcons\(\);\s*\}\s*</script>', ''

    # 2. Inject fresh block at the end
    if ($content -match '</body>') {
        $content = $content -replace '</body>', "$newScripts`n</body>"
    }
    
    Set-Content -Path $file.FullName -Value $content -Encoding UTF8
    Write-Host "Injected into $($file.Name)"
}
