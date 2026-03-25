# Navbar Update Guide for All Pages

## Summary
The navbar has been updated with a search bar, mobile menu, and improved responsive design. This guide shows how to update all pages to have the same navbar.

## What's Been Updated
✅ **gretex-financial.html** - Home page (already updated)
✅ **contact.html** - Contact page (just updated)

## Pages That Need Updating
The following pages need their navbar updated to match:

### Main Pages
- about.html
- services.html
- downloads.html
- calculators.html

### Calculator Pages
- calculator-sip.html
- calculator-lumpsum.html
- calculator-brokerage.html
- calculator-margin.html
- calculator-mtf.html
- calculator-swp.html
- calculator-step-up-sip.html
- calculator-cagr.html
- calculator-fd.html
- calculator-rd.html
- calculator-ppf.html
- calculator-epf.html
- calculator-nsc.html
- calculator-ssy.html
- calculator-elss.html
- calculator-etf.html
- calculator-mutual-fund.html
- calculator-simple-interest.html
- calculator-compound-interest.html
- calculator-stcg.html
- calculator-po-fd.html
- calculator-po-rd.html

### Investor Pages
- Regulation46_LODR.html
- Regulation62_LODR.html
- OtherInvestor.html
- SubTab_CodeandPolicies.html
- SubTab_CorpSocialRespons.html

## How to Update Each Page

### Step 1: Replace the `<nav>` section
Replace the entire `<nav class="navbar">...</nav>` section with the updated navbar from `gretex-financial.html` (lines 36-161) or `contact.html` (lines 313-478).

The new navbar includes:
- Logo
- **Search bar** (new!)
- Navigation menu
- Investor dropdown
- Client Corner dropdown
- Login button with dropdown
- Register button
- **Mobile menu toggle** (new!)
- **Full mobile menu** (new!)

### Step 2: Update the active link
Change the `class="active"` attribute to match the current page:
- About page: `<li><a href="about.html" class="active">About</a></li>`
- Calculators: `<li><a href="calculators.html" class="active">Calculators</a></li>`
- Services: `<li><a href="services.html" class="active">Services</a></li>`
- Downloads: `<li><a href="downloads.html" class="active">Downloads</a></li>`
- Contact: `<li><a href="contact.html" class="active">Contact</a></li>`

### Step 3: Add Required CSS
Ensure these CSS files are linked in the `<head>`:
```html
<link rel="stylesheet" href="../css/gretex-financial.css">
<link rel="stylesheet" href="../css/scroll-animations.css">
```

### Step 4: Add Required JavaScript
Add these scripts before the closing `</body>` tag:
```html
<script src="../js/search.js"></script>
<script src="../js/mobile-menu.js"></script>
<script>
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>
```

### Step 5: Ensure Lucide Icons Script
Make sure Lucide icons script is in the `<head>`:
```html
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
```

## Features of the New Navbar

### Desktop (> 768px)
- Clean, compact design
- Search bar with keyboard shortcut (press `/` to focus)
- Dropdown menus for Investor and Client Corner
- Login dropdown with multiple options
- Register button
- All buttons fully visible and clickable

### Mobile (< 768px)
- Hamburger menu button
- Full-screen mobile menu
- Mobile search bar
- Expandable dropdowns
- Touch-friendly design
- Smooth animations

## Testing Checklist
After updating each page, test:
- [ ] Search bar appears and works (desktop)
- [ ] Mobile menu toggle appears (mobile)
- [ ] Investor dropdown opens on click
- [ ] Client Corner dropdown opens on click
- [ ] Login button dropdown works
- [ ] Register button is visible and clickable
- [ ] Mobile menu opens and closes
- [ ] Mobile dropdowns expand/collapse
- [ ] Search works from any page
- [ ] All links navigate correctly

## Need Help?
If you encounter issues:
1. Check browser console for JavaScript errors
2. Verify all CSS and JS files are loading
3. Clear browser cache (Ctrl+F5 or Cmd+Shift+R)
4. Ensure file paths are correct (../css/, ../js/, ../images/)
