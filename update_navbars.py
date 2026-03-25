import os
import re

# Configuration
PAGES_DIR = r"c:\Users\Gretex\OneDrive\Desktop\GretexShare\pages"
SOURCE_FILE = os.path.join(PAGES_DIR, "gretex-financial.html")

def get_navbar_content(file_path):
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    # Extract navbar using regex
    match = re.search(r'(<nav class="navbar.*?<\/nav>)', content, re.DOTALL)
    if match:
        return match.group(1)
    return None

def update_active_link(navbar_content, filename):
    # Remove all active classes first
    navbar_content = re.sub(r' class="active"', '', navbar_content)
    
    # Logic to add active class based on filename
    if filename == "about.html":
        navbar_content = navbar_content.replace('<a href="about.html">', '<a href="about.html" class="active">')
    elif filename == "services.html":
        navbar_content = navbar_content.replace('<a href="services.html">', '<a href="services.html" class="active">')
    elif filename == "downloads.html":
        navbar_content = navbar_content.replace('<a href="downloads.html">', '<a href="downloads.html" class="active">')
    elif filename == "contact.html":
        navbar_content = navbar_content.replace('<a href="contact.html">', '<a href="contact.html" class="active">')
    elif "calculator" in filename:
        navbar_content = navbar_content.replace('<a href="calculators.html">', '<a href="calculators.html" class="active">')
    
    return navbar_content

def update_file(file_path, new_navbar, filename):
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    # skip if it's the source file
    if file_path == SOURCE_FILE:
        return

    # Replace Navbar
    # Using regex to find existing navbar
    updated_content = re.sub(r'<nav class="navbar.*?</nav>', new_navbar, content, flags=re.DOTALL)
    
    # Check if replacement happened
    if updated_content == content:
        print(f"Warning: No navbar found in {filename} to replace.")
        # If no navbar found, we might need to insert it? 
        # For now assuming all pages have *some* navbar to be replaced.
        # But let's try a looser regex if strict one failed, just in case attributes differ
        updated_content = re.sub(r'<nav.*?</nav>', new_navbar, updated_content, flags=re.DOTALL)

    # Inject CSS
    css_link = '<link rel="stylesheet" href="../css/scroll-animations.css">'
    if css_link not in updated_content:
        updated_content = updated_content.replace('</head>', f'    {css_link}\n</head>')

    # Inject JS
    scripts = """
    <script src="../js/search.js"></script>
    <script src="../js/mobile-menu.js"></script>
    <script>
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
    """
    
    # Check if scripts already exist to avoid duplication
    if "mobile-menu.js" not in updated_content:
        updated_content = updated_content.replace('</body>', f'{scripts}\n</body>')
    
    # Write back
    with open(file_path, "w", encoding="utf-8") as f:
        f.write(updated_content)
    print(f"Updated {filename}")

def main():
    print("Starting Navbar Update...")
    
    # 1. Get Source Navbar
    navbar_content = get_navbar_content(SOURCE_FILE)
    if not navbar_content:
        print("Error: Could not extract navbar from source file.")
        return

    # 2. Iterate and Update
    for filename in os.listdir(PAGES_DIR):
        if filename.endswith(".html"):
            file_path = os.path.join(PAGES_DIR, filename)
            
            # Prepare navbar with correct active state
            current_navbar = update_active_link(navbar_content, filename)
            
            try:
                update_file(file_path, current_navbar, filename)
            except Exception as e:
                print(f"Error updating {filename}: {e}")

    print("Update Complete.")

if __name__ == "__main__":
    main()
