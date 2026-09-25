<?php
/**
 * The footer for our theme — High-Impact Executive 5-Column Architecture
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$email   = function_exists( 'sam_get_company_email' ) ? sam_get_company_email() : 'sales@samcareer.com';
$address = get_theme_mod( 'sam_address', 'A1109, Tower T3, NX One, Greater Noida West, Uttar Pradesh' );
?>
</main><!-- #main -->

<footer class="site-footer">


	<!-- Main Footer Columns -->
	<div class="container footer-main-wrapper">
		<div class="footer-grid-5">

			<!-- Column 1: Brand & Contact -->
			<div class="footer-col-brand">
				<div class="footer-logo-card">
					<?php sam_render_logo( 'footer-logo-link' ); ?>
				</div>
				<p class="footer-tagline">
					India’s dedicated 0–30 day talent acquisition and workforce compliance partner. Connecting enterprise momentum with pre-vetted professionals since 2017.
				</p>
				
				<div class="footer-contact-stack">
					<div class="footer-contact-row">
						<div class="footer-c-icon"><?php echo sam_icon('map-pin'); ?></div>
						<div class="footer-c-text">
							<span><?php echo esc_html( $address ); ?></span>
						</div>
					</div>
					<div class="footer-contact-row">
						<div class="footer-c-icon"><?php echo sam_icon('mail'); ?></div>
						<div class="footer-c-text">
							<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
							<small>Corporate Inquiries</small>
						</div>
					</div>
				</div>

				<!-- Social Links -->
				<div class="footer-social-wrapper">
					<span class="footer-social-title">Follow our channels:</span>
					<div class="footer-social-icons">
						<a href="<?php echo esc_url( sam_get_social_url('sam_linkedin_url', 'https://www.linkedin.com/company/sam-manpower-and-career-services-llp/?viewAsMember=true') ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="f-soc-btn f-soc-linkedin">
							<?php echo sam_icon('linkedin'); ?>
						</a>
					</div>
				</div>
			</div>

			<!-- Column 2: Talent Solutions (Services) -->
			<div class="footer-col">
				<h4 class="footer-title">Talent Solutions</h4>
				<ul class="footer-menu">
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'for-employers' ) ); ?>">Permanent Hiring</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'immediate-hiring' ) ); ?>" class="f-highlight-link">0–30 Day Fast Track <span class="f-badge-speed">Speed</span></a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'contract-staffing' ) ); ?>">IT Contract Staffing</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'contract-to-hire' ) ); ?>">Contract-to-Hire (C2H)</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'managed-workforce' ) ); ?>">Managed Workforce</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'payroll' ) ); ?>">Statutory Payroll</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>">SAM Assured Guarantee</a></li>
				</ul>
			</div>

			<!-- Column 3: Company & Insights -->
			<div class="footer-col">
				<h4 class="footer-title">Company</h4>
				<ul class="footer-menu">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'about-us' ) ); ?>">About SAM Manpower</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'industries' ) ); ?>">Industries We Serve</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'case-studies' ) ); ?>">Case Studies &amp; Results</a></li>
					<li><a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/blog/' ) ); ?>">Knowledge Hub &amp; Blog</a></li>
					<li><a href="<?php echo esc_url( sam_contact_url() ); ?>">Contact Regional Desks</a></li>
				</ul>
			</div>

			<!-- Column 4: Candidates & Portal -->
			<div class="footer-col">
				<h4 class="footer-title">For Candidates</h4>
				<ul class="footer-menu">
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'jobs' ) ); ?>">Browse Active Jobs</a></li>
					<li><a href="<?php echo esc_url( sam_candidate_form_url() ); ?>">Submit Your CV / Profile</a></li>
					<li><a href="<?php echo esc_url( sam_employee_login_url() ); ?>" target="_blank" rel="noopener noreferrer">Employee &amp; Payroll Login</a></li>
				</ul>

				<h4 class="footer-title" style="margin-top:26px;">Quick Actions</h4>
				<div class="footer-quick-action-cards">
					<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="f-action-card">
						<span class="f-act-icon"><?php echo sam_icon('users'); ?></span>
						<div class="f-act-info">
							<strong>Hire Urgent Talent</strong>
							<small>Shortlist in 48h</small>
						</div>
					</a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="f-action-card">
						<span class="f-act-icon"><?php echo sam_icon('mail'); ?></span>
						<div class="f-act-info">
							<strong>Contact Regional Desk</strong>
							<small>Direct consultation</small>
						</div>
					</a>
				</div>
			</div>

			<!-- Column 5: Trust & Compliance -->
			<div class="footer-col">
				<h4 class="footer-title">Trust &amp; Compliance</h4>
				
				<div class="footer-iso-card">
					<div class="footer-iso-header">
						<div class="footer-iso-icon"><?php echo sam_icon('shield'); ?></div>
						<div>
							<strong>ISO 9001:2015</strong>
							<span class="iso-status">Certified Partner</span>
						</div>
					</div>
					<p class="footer-iso-text">
						Sourcing, vetting, and payroll operations adhere to international Quality Management Standards.
					</p>
				</div>

				<h4 class="footer-title" style="margin-top:24px;">Legal &amp; Policy</h4>
				<ul class="footer-menu footer-menu-legal">
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'privacy-policy' ) ); ?>">Privacy Policy</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'terms-of-service' ) ); ?>">Terms of Service</a></li>
					<li><a href="<?php echo esc_url( sam_get_page_url_by_slug( 'cookie-policy' ) ); ?>">Cookie Policy</a></li>
				</ul>
			</div>

		</div>
	</div>

	<!-- Bottom Copyright Sub-Bar -->
	<div class="footer-bottom-bar">
		<div class="container">
			<div class="footer-bottom-flex">
				<div class="footer-copyright-info">
					<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> SAM Manpower &amp; Career Services LLP. All Rights Reserved.</p>
					<span class="footer-sep">&bull;</span>
					<p class="footer-reg-info">Registered LLP • Greater Noida HQ, India</p>
				</div>
				<div class="footer-bottom-right">
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'privacy-policy' ) ); ?>">Privacy</a>
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'terms-of-service' ) ); ?>">Terms</a>
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'cookie-policy' ) ); ?>">Cookies</a>
					<a href="#page" class="footer-back-to-top" id="backToTopBtn" aria-label="Back to Top" title="Back to top">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 15l-6-6-6 6"/></svg>
					</a>
				</div>
			</div>
		</div>
	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
