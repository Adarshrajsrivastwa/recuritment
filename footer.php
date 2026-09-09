<?php
/**
 * The footer for our theme
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$phone   = get_theme_mod( 'sam_phone', '+91 98765 43210' );
$email   = get_theme_mod( 'sam_hiring_form_recipient', 'srivastwaadarsh@gmail.com' );
$address = get_theme_mod( 'sam_address', 'A-701, Tower T2, IT City Center, Trichardra-2, Noida West, Uttar Pradesh' );
?>
</main><!-- #main -->

<footer class="site-footer">
	<div class="container footer-inner">
		<div class="footer-brand-col">
			<?php sam_render_logo( 'footer-logo-link' ); ?>
			<p class="footer-tagline">Immediate &amp; 30-Day Hiring Experts across India.</p>
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
		</div>

		<div class="footer-links-grid">
			<div class="footer-col">
				<h4 class="footer-widget-title">Company</h4>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'about-us' ) ); ?>">About Us</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'for-employers' ) ); ?>">For Employers</a></li>
					<li><a href="<?php echo esc_url( sam_candidate_form_url() ); ?>">Candidate Registration</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'payroll' ) ); ?>">Payroll</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>">SAM Assured</a></li>
					<li><a href="<?php echo esc_url( sam_contact_url() ); ?>">Contact Us</a></li>
				</ul>
			</div>

			<div class="footer-col">
				<h4 class="footer-widget-title">Legal</h4>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'privacy-policy' ) ); ?>">Privacy Policy</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'terms-of-service' ) ); ?>">Terms of Service</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'cookie-policy' ) ); ?>">Cookie Policy</a></li>
				</ul>
			</div>

			<div class="footer-col footer-social-col">
				<h4 class="footer-widget-title">Follow Us</h4>
				<p class="footer-social-text">Connect with SAM Manpower on Instagram, Facebook and LinkedIn.</p>
				<?php sam_render_social_links( 'footer-social footer-social-inline', false ); ?>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container footer-bottom-inner">
			<p class="footer-copyright">&copy; <?php echo esc_html( date( 'Y' ) ); ?> SAM Manpower &amp; Career Services LLP. All Rights Reserved.</p>
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
