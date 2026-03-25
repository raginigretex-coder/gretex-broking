# Gretex Financial - Vercel Deployment Guide

## Prerequisites
- Git installed on your computer
- Vercel account (free at https://vercel.com)
- GitHub account (optional but recommended)

## Deployment Steps

### Option 1: Deploy via Vercel CLI (Recommended)

1. **Install Vercel CLI**
   ```bash
   npm install -g vercel
   ```

2. **Login to Vercel**
   ```bash
   vercel login
   ```

3. **Deploy from your project directory**
   ```bash
   cd C:\Users\Gretex\OneDrive\Desktop\GretexShare
   vercel
   ```

4. **Follow the prompts:**
   - Set up and deploy? `Y`
   - Which scope? Select your account
   - Link to existing project? `N`
   - Project name? `gretex-financial` (or your preferred name)
   - In which directory is your code located? `./`
   - Want to override settings? `N`

5. **Your site will be deployed!**
   - You'll get a URL like: `https://gretex-financial.vercel.app`
   - For production deployment, run: `vercel --prod`

### Option 2: Deploy via GitHub + Vercel Dashboard

1. **Create a GitHub Repository**
   - Go to https://github.com/new
   - Create a new repository (e.g., "gretex-financial")
   - Don't initialize with README

2. **Push your code to GitHub**
   ```bash
   cd C:\Users\Gretex\OneDrive\Desktop\GretexShare
   git init
   git add .
   git commit -m "Initial commit"
   git branch -M main
   git remote add origin https://github.com/YOUR_USERNAME/gretex-financial.git
   git push -u origin main
   ```

3. **Connect to Vercel**
   - Go to https://vercel.com/dashboard
   - Click "Add New Project"
   - Import your GitHub repository
   - Click "Deploy"

4. **Vercel will automatically:**
   - Detect it's a static site
   - Deploy your website
   - Give you a live URL

### Option 3: Deploy via Vercel Dashboard (Drag & Drop)

1. **Prepare your files**
   - Make sure all files are in the project folder
   - Remove any unnecessary files

2. **Go to Vercel Dashboard**
   - Visit https://vercel.com/dashboard
   - Click "Add New Project"
   - Click "Browse" or drag your project folder

3. **Deploy**
   - Vercel will upload and deploy automatically
   - You'll get a live URL instantly

## Project Structure

```
gretex-financial/
├── index.html              # Redirects to pages/gretex-financial.html
├── vercel.json            # Vercel configuration
├── .vercelignore          # Files to ignore during deployment
├── pages/                 # All HTML pages
│   ├── gretex-financial.html  # Home page
│   ├── about.html
│   ├── contact.html
│   ├── calculators.html
│   └── ...
├── css/                   # Stylesheets
│   ├── gretex-financial.css
│   ├── scroll-animations.css
│   └── ...
├── js/                    # JavaScript files
│   ├── search.js
│   ├── mobile-menu.js
│   ├── gretex-financial.js
│   └── ...
├── images/                # Images
└── assets/                # Documents and assets
```

## Configuration Files

### vercel.json
- Configures routing and caching
- Handles static file serving
- Sets up proper redirects

### .vercelignore
- Excludes unnecessary files from deployment
- Keeps deployment size small

## Custom Domain Setup

1. **In Vercel Dashboard:**
   - Go to your project
   - Click "Settings" → "Domains"
   - Add your custom domain (e.g., gretex.com)

2. **Update DNS Records:**
   - Add CNAME record: `www` → `cname.vercel-dns.com`
   - Add A record: `@` → Vercel's IP (provided in dashboard)

3. **SSL Certificate:**
   - Vercel automatically provisions SSL
   - Your site will be HTTPS enabled

## Environment Variables (if needed)

If you need to add environment variables:
1. Go to Project Settings → Environment Variables
2. Add your variables
3. Redeploy the project

## Continuous Deployment

Once connected to GitHub:
- Every push to `main` branch auto-deploys to production
- Pull requests get preview deployments
- Rollback to previous deployments anytime

## Monitoring & Analytics

Vercel provides:
- Real-time deployment logs
- Performance analytics
- Error tracking
- Traffic insights

## Troubleshooting

### Issue: 404 errors on page navigation
**Solution:** The `vercel.json` file handles routing. Make sure it's in the root directory.

### Issue: Assets not loading
**Solution:** Check file paths are relative (e.g., `../images/` not `/images/`)

### Issue: Slow loading
**Solution:** 
- Optimize images
- Enable caching (already configured in vercel.json)
- Use Vercel's CDN (automatic)

### Issue: Build fails
**Solution:**
- Check for syntax errors in HTML/CSS/JS
- Ensure all referenced files exist
- Check Vercel deployment logs

## Post-Deployment Checklist

- [ ] Test all pages load correctly
- [ ] Verify search functionality works
- [ ] Check mobile menu on different devices
- [ ] Test all calculator pages
- [ ] Verify dropdown menus work
- [ ] Check all external links
- [ ] Test form submissions
- [ ] Verify PDF downloads work
- [ ] Check responsive design on mobile/tablet
- [ ] Test on different browsers (Chrome, Firefox, Safari, Edge)

## Performance Optimization

Vercel automatically provides:
- ✅ Global CDN
- ✅ Automatic HTTPS
- ✅ Compression (Gzip/Brotli)
- ✅ Image optimization
- ✅ Edge caching
- ✅ DDoS protection

## Support

- Vercel Documentation: https://vercel.com/docs
- Vercel Support: https://vercel.com/support
- Community: https://github.com/vercel/vercel/discussions

## Quick Commands

```bash
# Deploy to preview
vercel

# Deploy to production
vercel --prod

# Check deployment status
vercel ls

# View logs
vercel logs

# Remove deployment
vercel rm [deployment-url]
```

## Your Website URLs

After deployment, you'll have:
- **Preview URL:** `https://gretex-financial-xxx.vercel.app`
- **Production URL:** `https://gretex-financial.vercel.app`
- **Custom Domain:** (after setup) `https://www.gretex.com`

---

**Ready to deploy?** Run `vercel` in your project directory!
