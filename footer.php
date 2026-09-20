<?php
/**
 * The footer for our theme — 4-column layout with all site links
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$phone   = get_theme_mod( 'sam_phone', '+91 98765 43210' );
$email   = get_theme_mod( 'sam_hiring_form_recipient', 'srivastwaadarsh@gmail.com' );
$address = get_theme_mod( 'sam_address', 'A-701, Tower T2, IT City Center, Trichardra-2, Noida West, Uttar Pradesh' );
?>
</main><!-- #main -->

<footer class="site-footer">
	<div class="container footer-inner footer-inner-5col">

		<!-- Brand column -->
		<div class="footer-brand-col">
			<?php sam_render_logo( 'footer-logo-link' ); ?>
			<p class="footer-tagline">Immediate &amp; 30-Day Hiring Experts across India. Connecting talent with opportunity since 2017.</p>
			<ul class="footer-contact-list">
				<li>
					<span class="footer-contact-icon" aria-hidden="true"><?php echo sam_icon( 'target' ); ?></span>
					<span><?php echo esc_html( $address ); ?></span>
				</li>
				<li>
					<span class="footer-contact-icon" aria-hidden="true"><?php echo sam_icon( 'chat' ); ?></span>
					<a href="tel:<?php echo esc_attr( str_replace( ' ', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
				</li>
				<li>
					<span class="footer-contact-icon" aria-hidden="true"><?php echo sam_icon( 'bell' ); ?></span>
					<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</li>
			</ul>
			<?php sam_render_social_links( 'footer-social footer-social-inline', false ); ?>
		</div>

		<!-- Links grid — 4 columns -->
		<div class="footer-links-grid footer-links-grid-4">

			<!-- Column 1: Company -->
			<div class="footer-col">
				<h4 class="footer-widget-title">Company</h4>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'about-us' ) ); ?>">About Us</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'industries' ) ); ?>">Industries We Serve</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'case-studies' ) ); ?>">Case Studies</a></li>
					<li><a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/blog/' ) ); ?>">Blog &amp; Resources</a></li>
					<li><a href="<?php echo esc_url( sam_contact_url() ); ?>">Contact Us</a></li>
				</ul>
			</div>

			<!-- Column 2: Our Services -->
			<div class="footer-col">
				<h4 class="footer-widget-title">Our Services</h4>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'for-employers' ) ); ?>">Permanent Hiring</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'immediate-hiring' ) ); ?>">Immediate &amp; 30-Day Hiring</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'contract-staffing' ) ); ?>">Contract Staffing</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'contract-to-hire' ) ); ?>">Contract-to-Hire</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'managed-workforce' ) ); ?>">Managed Workforce</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'payroll' ) ); ?>">Payroll Services</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>">SAM Assured</a></li>
				</ul>
			</div>

			<!-- Column 3: For Candidates -->
			<div class="footer-col">
				<h4 class="footer-widget-title">For Candidates</h4>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'jobs' ) ); ?>">Jobs &amp; Career</a></li>
					<li><a href="<?php echo esc_url( sam_candidate_form_url() ); ?>">Send Your CV</a></li>
					<li><a href="<?php echo esc_url( sam_employee_login_url() ); ?>">Employee Login</a></li>
				</ul>
				<h4 class="footer-widget-title" style="margin-top:28px;">Quick Actions</h4>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="footer-link-cta">📋 Request a Requirement</a></li>
					<li><a href="<?php echo esc_url( sam_contact_url() ); ?>" class="footer-link-cta">📞 Speak to a Recruiter</a></li>
				</ul>
			</div>

			<!-- Column 4: Legal -->
			<div class="footer-col">
				<h4 class="footer-widget-title">Legal</h4>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'privacy-policy' ) ); ?>">Privacy Policy</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'terms-of-service' ) ); ?>">Terms of Service</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'cookie-policy' ) ); ?>">Cookie Policy</a></li>
				</ul>
				<div class="footer-cert-badge" aria-label="ISO 9001:2015 Certified">
					<span class="footer-cert-icon"><?php echo sam_icon('shield'); ?></span>
					<div>
						<strong>ISO 9001:2015</strong>
						<small>Certified Recruitment Partner</small>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="footer-bottom">
		<div class="container footer-bottom-inner">
			<p class="footer-copyright">&copy; <?php echo esc_html( date( 'Y' ) ); ?> SAM Manpower &amp; Career Services LLP. All Rights Reserved. Headquartered in Greater Noida, India.</p>
			<div class="footer-bottom-links">
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'privacy-policy' ) ); ?>">Privacy</a>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'terms-of-service' ) ); ?>">Terms</a>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'cookie-policy' ) ); ?>">Cookies</a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
