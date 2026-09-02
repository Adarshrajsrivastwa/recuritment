SAM MANPOWER — CUSTOM WORDPRESS THEME
======================================

INSTALL
-------
1. Zip the "sam-manpower" folder (if not already zipped) and go to
   WP Admin → Appearance → Themes → Add New → Upload Theme.
2. Activate "SAM Manpower".

REQUIRED SETUP AFTER ACTIVATION
--------------------------------
1. Create these Pages (Pages → Add New), leave them EMPTY of content
   (all design is in the template), and assign the matching template
   under Page Attributes → Template:
      - "Home"          → Template: Default (this becomes homepage via step 2)
      - "About Us"       → Template: About Us
      - "For Employers"  → Template: For Employers
      - "Payroll"        → Template: Payroll Services
      - "SAM Assured"    → Template: SAM Assured

2. Set the static front page:
   Settings → Reading → "A static page" → Homepage = "Home".
   (The Home page uses front-page.php automatically once set as the
   front page — no template assignment needed for it.)

3. Create a menu: Appearance → Menus → add Home, About Us,
   For Employers, Payroll, SAM Assured → assign to "Primary Menu" location.
   Optionally create a second menu for the "Footer Menu" location.

4. Upload your logo: Appearance → Customize → Site Identity → Logo.
   Falls back to a "SAM" text logo if none is set.

5. Set contact info: Appearance → Customize → "SAM Contact Info"
      - Phone Number
      - Hire Talent CTA URL (paste your Google Form link here — every
        "Hire Talent" / "Hire Immediate Talent" button on the site uses it)
      - Office Address

6. Add content (all optional — the site shows solid fallback content
   automatically if you skip these):
      - Testimonials → Add New   (title = client name, body = quote,
        "Author Details" meta box = role/company)
      - FAQs → Add New            (title = question, body = answer)
      - Posts → Add New           (regular blog posts populate the
        "Latest from our Blog" section automatically, 3 most recent)

7. Set a Featured Image on any blog post to have it show a thumbnail
   in the blog section; otherwise a placeholder is shown.

NOTES
-----
- Colors, fonts and spacing all live in style.css under the
  :root { } block at the top — change --blue, --navy etc. there to
  retheme the whole site in one place.
- The "Our Services" and "Recruitment Journey" step content on the
  Home and For Employers pages is hardcoded in front-page.php /
  page-for-employers.php (search for $services / $steps arrays) —
  edit directly there if copy changes.
- Icons are inline SVGs defined in functions.php (sam_icon()) so no
  icon font/library is loaded.
