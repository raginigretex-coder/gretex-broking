# Fix include paths in subdirectory PHP files
# Files in pages/calculator/ and pages/services/ should use ../../includes/

$subdirs = @("pages\calculator", "pages\services")

foreach ($subdir in $subdirs) {
    if (Test-Path $subdir) {
        $phpFiles = Get-ChildItem -Path $subdir -Filter "*.php"
        
        foreach ($file in $phpFiles) {
            Write-Host "Fixing: $($file.FullName)" -ForegroundColor Cyan
            
            $content = Get-Content -Path $file.FullName -Raw -Encoding UTF8
            
            # Fix header and navbar includes (from ../includes/ to ../../includes/)
            $content = $content -replace "require_once '../includes/header\.php';", "require_once '../../includes/header.php';"
            $content = $content -replace 'require_once "../includes/header\.php";', 'require_once "../../includes/header.php";'
            $content = $content -replace "require_once '../includes/navbar\.php';", "require_once '../../includes/navbar.php';"
            $content = $content -replace 'require_once "../includes/navbar\.php";', 'require_once "../../includes/navbar.php";'
            
            # Fix footer includes
            $content = $content -replace "require_once '../includes/footer\.php';", "require_once '../../includes/footer.php';"
            $content = $content -replace 'require_once "../includes/footer\.php";', 'require_once "../../includes/footer.php";'
            
            Set-Content -Path $file.FullName -Value $content -Encoding UTF8
            Write-Host "  Fixed: $($file.Name)" -ForegroundColor Green
        }
    }
}

Write-Host "`nDone fixing subdirectory include paths!" -ForegroundColor Yellow
