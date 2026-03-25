# PowerShell Script to Delete HTML Pages After PHP Conversion
# Gretex Share Broking Limited

$pagesDir = "pages"
$htmlFiles = Get-ChildItem -Path $pagesDir -Filter "*.html" -Recurse

Write-Host "`n=== HTML to PHP Conversion Cleanup ===" -ForegroundColor Cyan
Write-Host "Checking for corresponding PHP files..." -ForegroundColor Yellow

$filesToDelete = @()
$missingPhp = @()

foreach ($file in $htmlFiles) {
    $htmlPath = $file.FullName
    $phpPath = $htmlPath -replace '\.html$', '.php'
    
    if (Test-Path $phpPath) {
        $filesToDelete += $file
        Write-Host "  Found PHP version: $($file.Name)" -ForegroundColor Green
    } else {
        $missingPhp += $file
        Write-Host "  Missing PHP version: $($file.Name)" -ForegroundColor Red
    }
}

Write-Host "`n=== Summary ===" -ForegroundColor Cyan
Write-Host "Total HTML files found: $($htmlFiles.Count)" -ForegroundColor White
Write-Host "PHP versions found: $($filesToDelete.Count)" -ForegroundColor Green
Write-Host "Missing PHP versions: $($missingPhp.Count)" -ForegroundColor $(if ($missingPhp.Count -eq 0) { "Green" } else { "Red" })

if ($missingPhp.Count -gt 0) {
    Write-Host "`nWARNING: Some HTML files don't have PHP versions!" -ForegroundColor Yellow
    Write-Host "These files will NOT be deleted:" -ForegroundColor Yellow
    foreach ($file in $missingPhp) {
        Write-Host "  - $($file.Name)" -ForegroundColor Yellow
    }
    Write-Host "`nProceeding with deletion of files that have PHP versions..." -ForegroundColor Yellow
} else {
    Write-Host "`nAll HTML files have corresponding PHP versions!" -ForegroundColor Green
}

if ($filesToDelete.Count -gt 0) {
    Write-Host "`n=== Files to be deleted ===" -ForegroundColor Cyan
    foreach ($file in $filesToDelete) {
        Write-Host "  - $($file.FullName)" -ForegroundColor White
    }
    
    $confirmation = Read-Host "`nDo you want to delete these $($filesToDelete.Count) HTML files? (yes/no)"
    
    if ($confirmation -eq "yes" -or $confirmation -eq "y") {
        $deletedCount = 0
        foreach ($file in $filesToDelete) {
            try {
                Remove-Item -Path $file.FullName -Force
                Write-Host "  Deleted: $($file.Name)" -ForegroundColor Green
                $deletedCount++
            } catch {
                Write-Host "  Error deleting $($file.Name): $_" -ForegroundColor Red
            }
        }
        Write-Host "`n=== Deletion Complete ===" -ForegroundColor Cyan
        Write-Host "Successfully deleted: $deletedCount files" -ForegroundColor Green
    } else {
        Write-Host "`nDeletion cancelled." -ForegroundColor Yellow
    }
} else {
    Write-Host "`nNo files to delete." -ForegroundColor Yellow
}

Write-Host "`nDone!" -ForegroundColor Cyan
