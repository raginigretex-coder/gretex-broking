# Gretex Share Broking - Folder Structure

## 📂 Complete Directory Structure

```
GretexShare/
│
├── 📁 config/                          # Configuration files
│   └── database.php                    # Database connection settings
│
├── 📁 database/                        # Database related files
│   └── schema.sql                     # SQL schema for creating tables
│
├── 📁 includes/                        # Reusable PHP components
│   ├── header.php                     # Common header (HTML head, meta tags)
│   ├── navbar.php                     # Navigation bar component
│   └── footer.php                     # Footer component
│
├── 📁 pages/                          # All website pages
│   ├── contact.php                    # Contact page (PHP - with DB)
│   ├── contact.html                   # Contact page (HTML - old version)
│   ├── process-enquiry.php           # Form submission handler
│   ├── about.html                     # About page
│   ├── calculators.html               # Calculators page
│   ├── services.html                 # Services page
│   ├── downloads.html                # Downloads page
│   └── [other HTML/PHP files...]
│
├── 📁 css/                            # Stylesheets
│   ├── gretex-financial.css          # Main stylesheet (shared)
│   ├── contact.css                   # Contact page specific styles
│   ├── scroll-animations.css         # Animation styles
│   ├── calculator-page.css           # Calculator styles
│   ├── chatbot.css                   # Chatbot styles
│   └── [other CSS files...]
│
├── 📁 js/                             # JavaScript files
│   ├── search.js                     # Search functionality
│   ├── mobile-menu.js                # Mobile menu handler
│   ├── gretex-financial.js           # Main JavaScript
│   ├── chatbot.js                    # Chatbot logic
│   └── [other JS files...]
│
├── 📁 images/                         # Image assets
│   ├── Gretex.png                    # Logo
│   ├── icon.png                      # Favicon
│   └── [other images...]
│
├── 📁 assets/                         # Other assets
│   ├── client-corner/                # Client corner documents
│   ├── documents/                     # PDF documents
│   └── downloads/                     # Downloadable files
│
└── 📄 Documentation files
    ├── PHP-SETUP-GUIDE.md            # PHP setup instructions
    ├── FOLDER-STRUCTURE.md           # This file
    └── [other docs...]
```

## 🎯 Key Directories Explained

### `/config`
Contains configuration files for the application.
- **database.php**: Database connection settings (host, user, password, database name)

### `/database`
Contains database schema and migration files.
- **schema.sql**: SQL script to create database and tables

### `/includes`
Reusable PHP components that are included in multiple pages.
- **header.php**: HTML head section, meta tags, CSS links
- **navbar.php**: Navigation menu (desktop + mobile)
- **footer.php**: Footer section with scripts

### `/pages`
All website pages (HTML and PHP files).
- **PHP files**: Dynamic pages with database integration
- **HTML files**: Static pages (can be converted to PHP later)

### `/css`
Stylesheets organized by purpose.
- **Main styles**: `gretex-financial.css` (shared across all pages)
- **Page-specific**: `contact.css`, `calculator-page.css`, etc.
- **Component styles**: `chatbot.css`, `scroll-animations.css`

### `/js`
JavaScript files for functionality.
- Organized by feature/component

## 📋 File Naming Conventions

- **PHP files**: `kebab-case.php` (e.g., `contact.php`, `process-enquiry.php`)
- **HTML files**: `kebab-case.html` (e.g., `about.html`, `calculators.html`)
- **CSS files**: `kebab-case.css` (e.g., `contact.css`, `calculator-page.css`)
- **JS files**: `kebab-case.js` (e.g., `mobile-menu.js`, `chatbot.js`)

## 🔄 Converting HTML to PHP

When converting HTML pages to PHP:

1. **Copy HTML file** to create PHP version
2. **Add PHP configuration** at the top:
   ```php
   <?php
   $pageTitle = 'Page Title';
   $additionalCSS = ['../css/page-specific.css'];
   require_once '../includes/header.php';
   require_once '../includes/navbar.php';
   ?>
   ```
3. **Replace footer section** with:
   ```php
   <?php require_once '../includes/footer.php'; ?>
   ```
4. **Move page-specific CSS** to `/css` folder
5. **Update links** from `.html` to `.php` if needed

## 🎨 CSS Organization Strategy

### Main Stylesheet (`gretex-financial.css`)
- Global styles
- Typography
- Layout components
- Common utilities
- Shared components (navbar, footer, buttons)

### Page-Specific Stylesheets
- Contact page: `contact.css`
- Calculator pages: `calculator-page.css`
- Service pages: `service-pages.css`
- Each page has its own CSS file for isolation

### Component Stylesheets
- Animations: `scroll-animations.css`
- Chatbot: `chatbot.css`
- Team section: `team-section.css`

## 📝 Best Practices

1. **Keep includes modular**: Each include should be self-contained
2. **Use relative paths**: `../` for going up one directory
3. **Organize CSS by page**: One CSS file per page for easier maintenance
4. **Separate concerns**: PHP for logic, HTML for structure, CSS for styling
5. **Document changes**: Update this file when adding new folders/files

## 🚀 Adding New Pages

1. Create PHP file in `/pages`
2. Add page-specific CSS in `/css`
3. Update navbar links in `/includes/navbar.php`
4. Test the page

## 📦 Database Files

- **Schema**: `/database/schema.sql` - Run this first to create tables
- **Config**: `/config/database.php` - Update credentials here

---

**Last Updated**: 2024
**Maintained by**: Gretex Share Broking Development Team
