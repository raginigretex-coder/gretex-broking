# PHP Setup Guide for Gretex Share Broking Website

## 📁 Folder Structure

```
GretexShare/
├── config/
│   └── database.php          # Database configuration
├── database/
│   └── schema.sql            # Database schema (run this first)
├── includes/
│   ├── header.php            # Common header with head section
│   ├── navbar.php            # Navigation bar component
│   └── footer.php            # Footer component
├── pages/
│   ├── contact.php           # Contact page (PHP version)
│   └── process-enquiry.php  # Form processing handler
├── css/
│   ├── contact.css           # Contact page specific styles
│   └── [other CSS files]
└── [other folders...]
```

## 🚀 Setup Instructions

### Step 1: Database Setup

1. **Open phpMyAdmin** (usually at `http://localhost/phpmyadmin`)

2. **Import the database schema:**
   - Click on "Import" tab
   - Choose file: `database/schema.sql`
   - Click "Go"
   - This will create the `gretex_db` database and `enquiries` table

   **OR** manually run the SQL:
   ```sql
   CREATE DATABASE gretex_db;
   USE gretex_db;
   -- Then copy and paste the contents of database/schema.sql
   ```

### Step 2: Configure Database Connection

1. **Edit `config/database.php`:**
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');        // Your MySQL username
   define('DB_PASS', '');            // Your MySQL password (if any)
   define('DB_NAME', 'gretex_db');   // Database name
   ```

2. **Update credentials** if your XAMPP MySQL has a different password.

### Step 3: Test the Contact Page

1. **Start XAMPP:**
   - Start Apache
   - Start MySQL

2. **Access the contact page:**
   ```
   http://localhost/GretexShare/pages/contact.php
   ```

3. **Test the form:**
   - Fill out the enquiry form
   - Submit it
   - Check phpMyAdmin → `gretex_db` → `enquiries` table to see the data

## 📝 Database Schema

### Enquiries Table
- `id` - Auto increment primary key
- `name` - Visitor's name
- `email` - Visitor's email
- `mobile` - Mobile number (10 digits)
- `message` - Enquiry message
- `status` - Status (new, read, replied, archived)
- `created_at` - Timestamp when created
- `updated_at` - Timestamp when last updated

## 🔧 Features

### Contact Page (`contact.php`)
- ✅ Database integration
- ✅ AJAX form submission (no page reload)
- ✅ Form validation (client-side and server-side)
- ✅ Success/error messages
- ✅ Interactive map (Leaflet)
- ✅ Responsive design
- ✅ Reusable components (header, navbar, footer)

### Form Processing (`process-enquiry.php`)
- ✅ Input sanitization
- ✅ Validation
- ✅ SQL injection protection (prepared statements)
- ✅ JSON response for AJAX
- ✅ Error handling

## 🎨 CSS Organization

- **Main CSS:** `css/gretex-financial.css` (shared styles)
- **Page-specific CSS:** `css/contact.css` (contact page only)
- **Animations:** `css/scroll-animations.css` (shared animations)

## 📋 Converting Other Pages to PHP

To convert other HTML pages to PHP:

1. **Create the PHP file** (e.g., `about.php`)

2. **Add page configuration:**
   ```php
   <?php
   $pageTitle = 'About Us - Gretex';
   $additionalCSS = ['../css/about.css']; // if needed
   $pageScripts = "/* page-specific JS */";
   
   require_once '../includes/header.php';
   require_once '../includes/navbar.php';
   ?>
   ```

3. **Add page content** (copy from HTML)

4. **Include footer:**
   ```php
   <?php require_once '../includes/footer.php'; ?>
   ```

## 🔒 Security Features

- ✅ Prepared statements (SQL injection protection)
- ✅ Input validation and sanitization
- ✅ XSS protection (htmlspecialchars in output)
- ✅ CSRF protection (can be added if needed)

## 📧 Email Notifications (Optional)

To enable email notifications when an enquiry is submitted:

1. **Edit `pages/process-enquiry.php`**

2. **Uncomment the email section:**
   ```php
   $to = "support@gretexbroking.com";
   $subject = "New Enquiry from Gretex Website";
   // ... email code
   mail($to, $subject, $emailMessage, $headers);
   ```

3. **Configure PHP mail settings** in `php.ini` if needed.

## 🐛 Troubleshooting

### Database Connection Error
- Check MySQL is running in XAMPP
- Verify credentials in `config/database.php`
- Ensure database `gretex_db` exists

### Form Not Submitting
- Check browser console for JavaScript errors
- Verify `process-enquiry.php` path is correct
- Check Apache error logs

### Map Not Showing
- Check internet connection (Leaflet loads from CDN)
- Verify Leaflet CSS and JS are loaded
- Check browser console for errors

## 📚 Next Steps

1. Convert other HTML pages to PHP
2. Create admin panel to view enquiries (optional)
3. Add email notifications
4. Add CAPTCHA to prevent spam (optional)
5. Create API endpoints if needed

## 📞 Support

For issues or questions, check:
- PHP error logs: `C:\xampp\apache\logs\error.log`
- MySQL error logs: `C:\xampp\mysql\data\mysql_error.log`

---

**Created for Gretex Share Broking Limited**
