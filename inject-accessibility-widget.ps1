# PowerShell script to inject AccessibleWeb Widget to all HTML pages
$pagesDir = "C:\xampp\htdocs\GretexShare\pages"
$files = Get-ChildItem -Path $pagesDir -Filter "*.html" -Recurse

$headScript = @"
    
    <!-- AccessibleWeb Widget -->
    <script>
        window.AccessibleWebWidgetOptions = {
            primaryColor: "#1976d2",
            ttsNativeVoiceName: "",
            ttsRate: 1.0,
            ttsPitch: 1.0,
            ...(window.AccessibleWebWidgetOptions || {})
        };
    </script>
    <script
        src="https://cdn.jsdelivr.net/gh/ifrederico/accessible-web-widget@latest/dist/accessible-web-widget.min.js"></script>
"@

$bodyWidget = @"
    <!-- AccessibleWeb Widget -->
    <div data-acc-position="bottom-right"></div>
    <div data-acc-offset="24,24"></div>
    <div data-acc-size="52"></div>
    <div data-acc-icon="default"></div>
"@

foreach ($file in $files) {
    $content = Get-Content -Path $file.FullName -Raw -Encoding UTF8
    
    # Skip if already has the widget
    if ($content -match "AccessibleWeb Widget" -or $content -match "data-acc-position") {
        Write-Host "Skipping $($file.Name) - already has widget" -ForegroundColor Yellow
        continue
    }
    
    # 1. Add script to head (before </head>)
    if ($content -match '</head>') {
        # Check if there's a style tag or script tag before </head>
        if ($content -match '(?s)(<style>.*?</style>\s*</head>)') {
            $content = $content -replace '(?s)(<style>.*?</style>\s*)(</head>)', "`$1$headScript`$2"
        } elseif ($content -match '(?s)(<link[^>]*scroll-animations\.css[^>]*>\s*)(</head>)') {
            $content = $content -replace '(?s)(<link[^>]*scroll-animations\.css[^>]*>\s*)(</head>)', "`$1$headScript`$2"
        } elseif ($content -match '(?s)(<script[^>]*lucide[^>]*></script>\s*)(</head>)') {
            $content = $content -replace '(?s)(<script[^>]*lucide[^>]*></script>\s*)(</head>)', "`$1$headScript`$2"
        } else {
            $content = $content -replace '</head>', "$headScript`n</head>"
        }
    }
    
    # 2. Add widget divs to body (after <body> or <body data-...>)
    if ($content -match '<body[^>]*>') {
        if ($content -match '(?s)(<body[^>]*>\s*)(<!-- Navigation|<!-- Scroll|<!-- AccessibleWeb)') {
            # Already has something right after body, check if widget is there
            if (-not ($content -match 'data-acc-position')) {
                $content = $content -replace '(?s)(<body[^>]*>\s*)', "`$1$bodyWidget`n`n"
            }
        } else {
            $content = $content -replace '(?s)(<body[^>]*>\s*)', "`$1$bodyWidget`n`n"
        }
    }
    
    Set-Content -Path $file.FullName -Value $content -Encoding UTF8
    Write-Host "Added widget to $($file.Name)" -ForegroundColor Green
}

Write-Host "`nDone! AccessibleWeb Widget has been added to all pages." -ForegroundColor Cyan
