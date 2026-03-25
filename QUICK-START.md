# Quick Start Guide - PHP Contact Page

## ✅ What's Been Done

1. ✅ **Database Setup**
   - Created `config/database.php` for database connection
   - Created `database/schema.sql` for table creation

2. ✅ **PHP Structure**
   - Created reusable includes: `header.php`, `navbar.php`, `footer.php`
   - Converted `contact.html` to `contact.php` with database integration
   - Created `process-enquiry.php` for form handling

3. ✅ **CSS Organization**
   - Moved contact-specific styles to `css/contact.css`
   - Maintained separation of concerns

4. ✅ **Documentation**
   - `PHP-SETUP-GUIDE.md` - Complete setup instructions
   - `FOLDER-STRUCTURE.md` - Directory organization
   - `QUICK-START.md` - This file

## 🚀 Quick Setup (3 Steps)

### Step 1: Create Database
1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Click "Import"
3. Select file: `database/schema.sql`
4. Click "Go"

### Step 2: Configure Database
Edit `config/database.php`:
```php
define('DB_USER', 'root');     // Your MySQL username
define('DB_PASS', '');          // Your MySQL password
```

### Step 3: Test
1. Start XAMPP (Apache + MySQL)
2. Visit: `http://localhost/GretexShare/pages/contact.php`
3. Submit the form
4. Check database: phpMyAdmin → `gretex_db` → `enquiries`

## 📁 New Files Created

```
config/
  └── database.php

database/
  └── schema.sql

includes/
  ├── header.php
  ├── navbar.php
  └── footer.php

pages/
  ├── contact.php (NEW - PHP version)
  └── process-enquiry.php (NEW)

css/
  └── contact.css (NEW - extracted from contact.html)

Documentation:
  ├── PHP-SETUP-GUIDE.md
  ├── FOLDER-STRUCTURE.md
  └── QUICK-START.md
```

## 🔄 What Changed

### Before (HTML)
- ❌ Form data not saved
- ❌ No database connection
- ❌ Just showed alert message
- ❌ No server-side validation

### After (PHP)
- ✅ Form data saved to database
- ✅ Full database integration
- ✅ AJAX submission (no page reload)
- ✅ Server-side validation
- ✅ Success/error messages
- ✅ Reusable components

## 🎯 Next Steps

1. **Test the contact form** - Make sure it saves to database
2. **Convert other pages** - Follow the pattern in `contact.php`
3. **Create admin panel** (optional) - To view enquiries
4. **Add email notifications** (optional) - Uncomment in `process-enquiry.php`

## 📞 Need Help?

- Check `PHP-SETUP-GUIDE.md` for detailed instructions
- Check `FOLDER-STRUCTURE.md` for file organization
- Check PHP error logs if something doesn't work

---

**Ready to use!** 🎉
