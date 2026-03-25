# Fix include paths in PHP files
# Files in pages/ should use ../includes/
# Files in pages/subfolder/ should use ../../includes/

$pagesDir = "pages"
$phpFiles = Get-ChildItem -Path $pagesDir -Filter "*.php" -Recurse

foreach ($file in $phpFiles) {
    $relativePath = $file.FullName.Replace((Get-Location).Path + "\", "")
    $depth = ($relativePath -split '\\').Count - 2
    
    # Skip files in subdirectories (they already have correct paths)
    if ($file.DirectoryName -eq (Resolve-Path $pagesDir).Path) {
        # File is in root pages/ directory
        Write-Host "Fixing: $($file.Name)" -ForegroundColor Cyan
        
        $content = Get-Content -Path $file.FullName -Raw -Encoding UTF8
        
        # Fix header and navbar includes
        $content = $content -replace "require_once 'includes/header\.php';", "require_once '../includes/header.php';"
        $content = $content -replace 'require_once "includes/header\.php";', 'require_once "../includes/header.php";'
        $content = $content -replace "require_once 'includes/navbar\.php';", "require_once '../includes/navbar.php';"
        $content = $content -replace 'require_once "includes/navbar\.php";', 'require_once "../includes/navbar.php";'
        
        # Fix footer includes
        $content = $content -replace "require_once 'includes/footer\.php';", "require_once '../includes/footer.php';"
        $content = $content -replace 'require_once "includes/footer\.php";', 'require_once "../includes/footer.php";'
        
        Set-Content -Path $file.FullName -Value $content -Encoding UTF8
        Write-Host "  Fixed: $($file.Name)" -ForegroundColor Green
    }
}

Write-Host "`nDone fixing include paths!" -ForegroundColor Yellow
