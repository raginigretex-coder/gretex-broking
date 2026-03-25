# Auto-delete HTML pages after PHP conversion
# Gretex Share Broking Limited

$pagesDir = "pages"
$htmlFiles = Get-ChildItem -Path $pagesDir -Filter "*.html" -Recurse

Write-Host "`n=== Auto-Deleting HTML Pages ===" -ForegroundColor Cyan
Write-Host "Checking for corresponding PHP files..." -ForegroundColor Yellow

$deletedCount = 0
$skippedCount = 0

foreach ($file in $htmlFiles) {
    $htmlPath = $file.FullName
    $phpPath = $htmlPath -replace '\.html$', '.php'
    
    if (Test-Path $phpPath) {
        try {
            Remove-Item -Path $htmlPath -Force
            Write-Host "  Deleted: $($file.Name)" -ForegroundColor Green
            $deletedCount++
        } catch {
            Write-Host "  Error deleting $($file.Name): $_" -ForegroundColor Red
            $skippedCount++
        }
    } else {
        Write-Host "  Skipped (no PHP version): $($file.Name)" -ForegroundColor Yellow
        $skippedCount++
    }
}

Write-Host "`n=== Deletion Complete ===" -ForegroundColor Cyan
Write-Host "Deleted: $deletedCount files" -ForegroundColor Green
Write-Host "Skipped: $skippedCount files" -ForegroundColor $(if ($skippedCount -eq 0) { "Green" } else { "Yellow" })
Write-Host "`nDone!" -ForegroundColor Cyan
