<?php
/**
 * The footer for our theme
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
</main><!-- #main -->

<footer class="site-footer">
	<div class="container footer-inner">
		<div class="footer-col footer-brand">
			<div class="site-logo-text footer-logo">SAM</div>
			<p><?php echo nl2br( esc_html( get_theme_mod( 'sam_address', 'A-701, Tower T2, IT City Center, Trichardra-2, Noida West, Uttar Pradesh' ) ) ); ?></p>
			<p><a href="tel:<?php echo esc_attr( str_replace( ' ', '', get_theme_mod( 'sam_phone', '+919876543210' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'sam_phone', '+91 98765 43210' ) ); ?></a></p>
		</div>

		<div class="footer-col">
			<h4 class="footer-widget-title">Company</h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a></li>
				<li><a href="<?php echo esc_url( home_url( '/for-employers/' ) ); ?>">For Employers</a></li>
				<li><a href="<?php echo esc_url( home_url( '/payroll/' ) ); ?>">Payroll</a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
			</ul>
		</div>

		<div class="footer-col">
			<h4 class="footer-widget-title">Legal</h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a></li>
				<li><a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>">Terms of Service</a></li>
				<li><a href="<?php echo esc_url( home_url( '/cookie-policy/' ) ); ?>">Cookie Policy</a></li>
			</ul>
		</div>

		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-col">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> SAM Manpower &amp; Career Services LLP. All Rights Reserved.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
