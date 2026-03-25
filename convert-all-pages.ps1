# PowerShell Script to Convert All HTML Pages to PHP
# Gretex Share Broking Limited

$pagesDir = "pages"
$htmlFiles = Get-ChildItem -Path $pagesDir -Filter "*.html" -Recurse

foreach ($file in $htmlFiles) {
    $htmlPath = $file.FullName
    $relativePath = $file.FullName.Replace((Get-Location).Path + "\", "")
    $phpPath = $htmlPath -replace '\.html$', '.php'
    $filename = $file.BaseName
    
    Write-Host "Converting: $($file.Name)..." -ForegroundColor Cyan
    
    $content = Get-Content -Path $htmlPath -Raw -Encoding UTF8
    
    # Extract title
    if ($content -match '<title>(.*?)</title>') {
        $title = $matches[1].Trim()
    } else {
        $title = ($filename -replace '-', ' ' | ForEach-Object { $_.Substring(0,1).ToUpper() + $_.Substring(1) }) -join ' '
        $title = "$title - Gretex | Indian Equity Market Leader"
    }
    
    # Extract CSS files (excluding main ones)
    $cssFiles = @()
    $cssMatches = [regex]::Matches($content, '<link[^>]*href=["'']([^"'']*\.css[^"'']*)["''][^>]*>', [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
    foreach ($match in $cssMatches) {
        $css = $match.Groups[1].Value
        if ($css -notmatch 'gretex-financial\.css' -and 
            $css -notmatch 'scroll-animations\.css' -and
            $css -notmatch '^https?://') {
            $cssFiles += $css
        }
    }
    
    # Extract additional scripts (CDN only)
    $additionalScripts = @()
    $scriptMatches = [regex]::Matches($content, '<script[^>]*src=["'']([^"'']*)["''][^>]*></script>', [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
    foreach ($match in $scriptMatches) {
        $script = $match.Groups[1].Value
        if ($script -match '^https?://' -and 
            $script -notmatch 'lucide' -and
            $script -notmatch 'accessible-web-widget') {
            $additionalScripts += $script
        }
    }
    
    # Extract inline styles
    $pageStyles = ""
    $styleMatches = [regex]::Matches($content, '<style>(.*?)</style>', [System.Text.RegularExpressions.RegexOptions]::Singleline -bor [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
    if ($styleMatches.Count -gt 0) {
        $pageStyles = ($styleMatches | ForEach-Object { $_.Groups[1].Value.Trim() }) -join "`n"
    }
    
    # Extract body content
    $bodyContent = ""
    $bodyMatch = [regex]::Match($content, '<body[^>]*>(.*?)</body>', [System.Text.RegularExpressions.RegexOptions]::Singleline -bor [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
    if ($bodyMatch.Success) {
        $bodyContent = $bodyMatch.Groups[1].Value
        
        # Remove navbar
        $bodyContent = [regex]::Replace($bodyContent, '<nav[^>]*>.*?</nav>', '', [System.Text.RegularExpressions.RegexOptions]::Singleline -bor [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
        
        # Remove footer
        $bodyContent = [regex]::Replace($bodyContent, '<footer[^>]*>.*?</footer>', '', [System.Text.RegularExpressions.RegexOptions]::Singleline -bor [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
        
        # Remove AccessibleWeb Widget divs
        $bodyContent = [regex]::Replace($bodyContent, '<!-- AccessibleWeb Widget -->.*?<div[^>]*data-acc-icon[^>]*></div>', '', [System.Text.RegularExpressions.RegexOptions]::Singleline -bor [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
        
        # Clean up extra whitespace
        $bodyContent = $bodyContent -replace '\n\s*\n\s*\n', "`n`n"
    }
    
    # Extract page-specific scripts (before </body>)
    $pageScripts = ""
    $inlineScriptMatches = [regex]::Matches($content, '<script[^>]*>(.*?)</script>', [System.Text.RegularExpressions.RegexOptions]::Singleline -bor [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
    foreach ($match in $inlineScriptMatches) {
        $scriptContent = $match.Groups[1].Value.Trim()
        if ($scriptContent -and 
            $scriptContent -notmatch 'lucide\.createIcons' -and
            $scriptContent -notmatch 'AccessibleWebWidgetOptions') {
            $pageScripts += $scriptContent + "`n"
        }
    }
    
    # Determine relative path for includes
    $depth = ($relativePath -split '\\').Count - 2
    $includePath = '../' * $depth
    
    # Build PHP content
    $phpContent = @"
<?php
/**
 * $title
 * Gretex Share Broking Limited
 */

// Page configuration
`$pageTitle = '$($title -replace "'", "''")';
"@
    
    if ($cssFiles.Count -gt 0) {
        $phpContent += "`n`$additionalCSS = [`n"
        foreach ($css in $cssFiles) {
            $phpContent += "    '$css',`n"
        }
        $phpContent += "];`n"
    } else {
        $phpContent += "`$additionalCSS = [];`n"
    }
    
    if ($additionalScripts.Count -gt 0) {
        $phpContent += "`n`$additionalScripts = [`n"
        foreach ($script in $additionalScripts) {
            $phpContent += "    '$script',`n"
        }
        $phpContent += "];`n"
    }
    
    if ($pageStyles) {
        $pageStylesEscaped = $pageStyles -replace '\$', '\$' -replace "`"", '\"' -replace "'", "''"
        $phpContent += "`n`$pageStyles = `"$pageStylesEscaped`";`n"
    }
    
    if ($pageScripts) {
        $pageScriptsEscaped = $pageScripts -replace '\$', '\$' -replace "`"", '\"' -replace "'", "''"
        $phpContent += "`n`$pageScripts = `"$pageScriptsEscaped`";`n"
    }
    
    $phpContent += @"

// Include header
require_once '$($includePath)includes/header.php';
require_once '$($includePath)includes/navbar.php';
?>

$bodyContent

<?php
// Include footer
require_once '$($includePath)includes/footer.php';
?>
"@
    
    # Write PHP file
    Set-Content -Path $phpPath -Value $phpContent -Encoding UTF8
    Write-Host "  Created: $($file.BaseName).php" -ForegroundColor Green
}

Write-Host "`nConversion complete!" -ForegroundColor Yellow
Write-Host "Total files converted: $($htmlFiles.Count)" -ForegroundColor Yellow
