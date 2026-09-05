SAM MANPOWER — CUSTOM WORDPRESS THEME
======================================

INSTALL
-------
1. Zip the "sam-manpower" folder (if not already zipped) and go to
   WP Admin → Appearance → Themes → Add New → Upload Theme.
2. Activate "SAM Manpower".

REQUIRED SETUP AFTER ACTIVATION
--------------------------------
1. On first theme activation, Home, About Us, For Employers, Payroll and
   SAM Assured pages are created automatically, along with the Primary Menu.
   The Home page is also set as the static front page.

2. You can edit the page titles/content from Pages, and adjust the navigation
   later from Appearance → Menus. The page designs are handled by the theme.
   Optionally create a second menu for the "Footer Menu" location.

3. Upload your logo: Appearance → Customize → Site Identity → Logo.
   Falls back to a "SAM" text logo if none is set.

4. Set contact info: Appearance → Customize → "SAM Contact Info"
      - Phone Number
      - Hire Talent CTA URL (all hiring buttons open the built-in Hire Talent
        form by default; an external Google Form can be used instead)
      - Hiring Form Recipient Email
      - Office Address

5. For reliable form delivery, install and configure the WP Mail SMTP plugin
   in WP Admin → WP Mail SMTP. The built-in hiring form uses WordPress mail,
   which WP Mail SMTP sends through your configured mailer.

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
