<?php
/**
 * HTML to PHP Converter Script
 * Converts all HTML pages to PHP format
 * 
 * Usage: Run this script once to convert all pages
 * php convert-html-to-php.php
 */

function convertHtmlToPhp($htmlFile, $outputDir = 'pages') {
    if (!file_exists($htmlFile)) {
        echo "File not found: $htmlFile\n";
        return false;
    }
    
    $content = file_get_contents($htmlFile);
    $filename = basename($htmlFile, '.html');
    $phpFile = $outputDir . '/' . $filename . '.php';
    
    // Extract title
    preg_match('/<title>(.*?)<\/title>/i', $content, $titleMatch);
    $title = isset($titleMatch[1]) ? $titleMatch[1] : ucfirst(str_replace('-', ' ', $filename));
    
    // Extract CSS files
    preg_match_all('/<link[^>]*href=["\']([^"\']*\.css[^"\']*)["\'][^>]*>/i', $content, $cssMatches);
    $cssFiles = [];
    foreach ($cssMatches[1] as $css) {
        if (strpos($css, 'gretex-financial.css') === false && 
            strpos($css, 'scroll-animations.css') === false &&
            strpos($css, 'http') === false) {
            $cssFiles[] = $css;
        }
    }
    
    // Extract additional scripts (CDN)
    preg_match_all('/<script[^>]*src=["\']([^"\']*)["\'][^>]*><\/script>/i', $content, $scriptMatches);
    $additionalScripts = [];
    foreach ($scriptMatches[1] as $script) {
        if (strpos($script, 'http') !== false && 
            strpos($script, 'lucide') === false &&
            strpos($script, 'accessible-web-widget') === false) {
            $additionalScripts[] = $script;
        }
    }
    
    // Extract inline styles
    preg_match('/<style>(.*?)<\/style>/is', $content, $styleMatch);
    $pageStyles = isset($styleMatch[1]) ? trim($styleMatch[1]) : '';
    
    // Extract body content (between <body> and </body>)
    preg_match('/<body[^>]*>(.*?)<\/body>/is', $content, $bodyMatch);
    $bodyContent = isset($bodyMatch[1]) ? $bodyMatch[1] : '';
    
    // Remove navbar and footer from body content
    $bodyContent = preg_replace('/<nav[^>]*>.*?<\/nav>/is', '', $bodyContent);
    $bodyContent = preg_replace('/<footer[^>]*>.*?<\/footer>/is', '', $bodyContent);
    $bodyContent = preg_replace('/<!-- AccessibleWeb Widget -->.*?<div[^>]*data-acc-icon[^>]*><\/div>/is', '', $bodyContent);
    
    // Extract page-specific scripts (before </body>)
    preg_match_all('/<script[^>]*>(.*?)<\/script>/is', $content, $inlineScripts);
    $pageScripts = '';
    foreach ($inlineScripts[1] as $script) {
        $script = trim($script);
        if (!empty($script) && 
            strpos($script, 'lucide.createIcons') === false &&
            strpos($script, 'AccessibleWebWidgetOptions') === false) {
            $pageScripts .= $script . "\n";
        }
    }
    
    // Build PHP file
    $phpContent = "<?php\n";
    $phpContent .= "/**\n";
    $phpContent .= " * " . $title . "\n";
    $phpContent .= " * Gretex Share Broking Limited\n";
    $phpContent .= " */\n\n";
    $phpContent .= "// Page configuration\n";
    $phpContent .= "\$pageTitle = '" . addslashes($title) . "';\n";
    
    if (!empty($cssFiles)) {
        $phpContent .= "\$additionalCSS = [\n";
        foreach ($cssFiles as $css) {
            $phpContent .= "    '" . $css . "',\n";
        }
        $phpContent .= "];\n";
    } else {
        $phpContent .= "\$additionalCSS = [];\n";
    }
    
    if (!empty($additionalScripts)) {
        $phpContent .= "\$additionalScripts = [\n";
        foreach ($additionalScripts as $script) {
            $phpContent .= "    '" . $script . "',\n";
        }
        $phpContent .= "];\n";
    }
    
    if (!empty($pageStyles)) {
        $phpContent .= "\$pageStyles = " . var_export($pageStyles, true) . ";\n";
    }
    
    if (!empty($pageScripts)) {
        $phpContent .= "\$pageScripts = " . var_export($pageScripts, true) . ";\n";
    }
    
    $phpContent .= "\n";
    $phpContent .= "// Include header\n";
    $phpContent .= "require_once '../includes/header.php';\n";
    $phpContent .= "require_once '../includes/navbar.php';\n";
    $phpContent .= "?>\n\n";
    $phpContent .= $bodyContent . "\n\n";
    $phpContent .= "<?php\n";
    $phpContent .= "// Include footer\n";
    $phpContent .= "require_once '../includes/footer.php';\n";
    $phpContent .= "?>\n";
    
    // Write PHP file
    file_put_contents($phpFile, $phpContent);
    echo "Converted: $htmlFile -> $phpFile\n";
    
    return true;
}

// Main execution
echo "Starting HTML to PHP conversion...\n\n";

$pagesDir = 'pages';
$htmlFiles = glob($pagesDir . '/*.html');

foreach ($htmlFiles as $htmlFile) {
    // Skip contact.html as it's already converted
    if (basename($htmlFile) === 'contact.html') {
        continue;
    }
    convertHtmlToPhp($htmlFile, $pagesDir);
}

echo "\nConversion complete!\n";
?>
