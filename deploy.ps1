# Gretex Financial - Quick Deployment Script for Vercel
# Run this script to deploy your website to Vercel

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  Gretex Financial - Vercel Deployment" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Check if Vercel CLI is installed
Write-Host "Checking for Vercel CLI..." -ForegroundColor Yellow
$vercelInstalled = Get-Command vercel -ErrorAction SilentlyContinue

if (-not $vercelInstalled) {
    Write-Host "Vercel CLI not found!" -ForegroundColor Red
    Write-Host ""
    Write-Host "Please install Vercel CLI first:" -ForegroundColor Yellow
    Write-Host "  npm install -g vercel" -ForegroundColor White
    Write-Host ""
    Write-Host "Or visit: https://vercel.com/download" -ForegroundColor Cyan
    exit 1
}

Write-Host "✓ Vercel CLI found" -ForegroundColor Green
Write-Host ""

# Ask deployment type
Write-Host "Select deployment type:" -ForegroundColor Yellow
Write-Host "  1. Preview deployment (for testing)" -ForegroundColor White
Write-Host "  2. Production deployment (live site)" -ForegroundColor White
Write-Host ""
$choice = Read-Host "Enter your choice (1 or 2)"

Write-Host ""
Write-Host "Starting deployment..." -ForegroundColor Yellow
Write-Host ""

if ($choice -eq "2") {
    Write-Host "Deploying to PRODUCTION..." -ForegroundColor Green
    vercel --prod
} else {
    Write-Host "Deploying to PREVIEW..." -ForegroundColor Cyan
    vercel
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  Deployment Complete!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Next steps:" -ForegroundColor Yellow
Write-Host "  1. Visit the URL provided above" -ForegroundColor White
Write-Host "  2. Test your website thoroughly" -ForegroundColor White
Write-Host "  3. Set up custom domain in Vercel dashboard" -ForegroundColor White
Write-Host ""
