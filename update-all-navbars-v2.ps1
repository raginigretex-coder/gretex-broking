# PowerShell script to update navbar on all pages
$ErrorActionPreference = "Stop"

$pagesDir = "c:\Users\Gretex\OneDrive\Desktop\GretexShare\pages"
$sourceFile = Join-Path $pagesDir "gretex-financial.html"

# 1. Get Source Navbar
$sourceContent = Get-Content -Path $sourceFile -Raw -Encoding UTF8
if ($sourceContent -match '(?s)(<nav class="navbar.*?<\/nav>)') {
    $navbarContent = $matches[1]
} else {
    Write-Error "Could not extract navbar from source file."
    exit 1
}

# Function to set active link
function Set-ActiveLink {
    param (
        [string]$navbar,
        [string]$filename
    )
    
    # Remove existing active classes
    $navbar = $navbar -replace ' class="active"', ''
    
    # Add active class based on filename
    if ($filename -eq "about.html") {
        $navbar = $navbar.Replace('<a href="about.html">', '<a href="about.html" class="active">')
    } elseif ($filename -eq "services.html") {
        $navbar = $navbar.Replace('<a href="services.html">', '<a href="services.html" class="active">')
    } elseif ($filename -eq "downloads.html") {
        $navbar = $navbar.Replace('<a href="downloads.html">', '<a href="downloads.html" class="active">')
    } elseif ($filename -eq "contact.html") {
        $navbar = $navbar.Replace('<a href="contact.html">', '<a href="contact.html" class="active">')
    } elseif ($filename -like "*calculator*") {
        $navbar = $navbar.Replace('<a href="calculators.html">', '<a href="calculators.html" class="active">')
    }
    
    return $navbar
}

# 2. Iterate and Update
$files = Get-ChildItem -Path $pagesDir -Filter "*.html"

foreach ($file in $files) {
    if ($file.FullName -eq $sourceFile) { continue }
    
    Write-Host "Updating $($file.Name)..."
    
    $content = Get-Content -Path $file.FullName -Raw -Encoding UTF8
    
    # Prepare new navbar
    $newNavbar = Set-ActiveLink -navbar $navbarContent -filename $file.Name
    
    # Replace Navbar
    # Using regex to find existing navbar
    if ($content -match '(?s)<nav.*?</nav>') {
        $content = $content -replace '(?s)<nav.*?</nav>', $newNavbar
    } else {
        Write-Warning "  No navbar found in $($file.Name) to replace."
        # Optionally checking for <body> to insert if missing, but risking structure break
        # assuming all pages have nav or at least body
    }
    
    # Inject CSS
    $cssLink = '<link rel="stylesheet" href="../css/scroll-animations.css">'
    if ($content -notmatch 'scroll-animations.css') {
        $content = $content -replace '</head>', "    $cssLink`n</head>"
    }

    # Inject JS
    $scripts = @"
    <script src="../js/search.js"></script>
    <script src="../js/mobile-menu.js"></script>
    <script src="../js/chatbot-knowledge.js"></script>
    <script src="../js/chatbot-config.js"></script>
    <script src="../js/chatbot.js"></script>
    <script>
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
"@
    
    # Check for search.js to identify if we should update scripts block
    if ($content -notmatch 'chatbot.js') {
        # If chatbot not present, either replace existing script block or append before </body>
        if ($content -match '(s?)<script src="\.\./js/search\.js">.*?</script>') {
             # Update existing script block if possible, or just append
             $content = $content -replace '</body>', "$scripts`n</body>"
        } else {
             $content = $content -replace '</body>', "$scripts`n</body>"
        }
    }
    
    # Save file
    Set-Content -Path $file.FullName -Value $content -Encoding UTF8
}

Write-Host "Update Complete."
