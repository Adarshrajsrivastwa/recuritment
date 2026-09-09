<?php
/**
 * Template Name: Contact Page
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$status = isset( $_GET['form_status'] ) ? sanitize_key( wp_unslash( $_GET['form_status'] ) ) : '';
$phone   = get_theme_mod( 'sam_phone', '+91 98765 43210' );
$email   = get_theme_mod( 'sam_hiring_form_recipient', 'srivastwaadarsh@gmail.com' );
$address = get_theme_mod( 'sam_address', 'A-701, Tower T2, IT City Center, Trichardra-2, Noida West, Uttar Pradesh' );
?>

<section class="page-hero page-hero-simple">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon( 'chat' ); ?> Contact Us</span>
		<h1>Let's Connect &amp; Discuss Your Needs</h1>
		<p>Have a question or looking to partner with SAM Manpower? Reach out to our team directly.</p>
	</div>
</section>

<section class="section">
	<div class="container container-narrow">
		<div class="contact-info-cards" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 40px;">
			<div class="focus-card" style="padding: 24px; text-align: center; border-radius: 12px; background: #ffffff; border: 1px solid var(--border);">
				<div class="icon-badge" style="margin: 0 auto 16px;"><?php echo sam_icon( 'chat' ); ?></div>
				<h4 style="margin: 0 0 8px; color: var(--navy);">Phone</h4>
				<p style="margin: 0;"><a href="tel:<?php echo esc_attr( str_replace(' ', '', $phone) ); ?>" style="color: var(--blue); font-weight: 600; text-decoration: none;"><?php echo esc_html( $phone ); ?></a></p>
			</div>
			<div class="focus-card" style="padding: 24px; text-align: center; border-radius: 12px; background: #ffffff; border: 1px solid var(--border);">
				<div class="icon-badge" style="margin: 0 auto 16px;"><?php echo sam_icon( 'bell' ); ?></div>
				<h4 style="margin: 0 0 8px; color: var(--navy);">Email</h4>
				<p style="margin: 0;"><a href="mailto:<?php echo esc_attr( $email ); ?>" style="color: var(--blue); font-weight: 600; text-decoration: none;"><?php echo esc_html( $email ); ?></a></p>
			</div>
			<div class="focus-card" style="padding: 24px; text-align: center; border-radius: 12px; background: #ffffff; border: 1px solid var(--border);">
				<div class="icon-badge" style="margin: 0 auto 16px;"><?php echo sam_icon( 'target' ); ?></div>
				<h4 style="margin: 0 0 8px; color: var(--navy);">Location</h4>
				<p style="margin: 0; font-size: 0.9rem; color: var(--text-muted);"><?php echo esc_html( $address ); ?></p>
			</div>
		</div>

		<?php if ( 'success' === $status ) : ?>
			<div class="form-notice form-notice-success" role="status">
				<?php echo sam_icon( 'check' ); ?>
				Thank you! Your message has been sent successfully. Our team will get back to you shortly.
			</div>
		<?php elseif ( 'error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				Please complete all required fields with a valid email address.
			</div>
		<?php elseif ( 'mail-error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				We could not send your message right now. Please reach us via phone or try again shortly.
			</div>
		<?php elseif ( 'invalid' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				Your session expired. Please submit the form again.
			</div>
		<?php endif; ?>

		<form class="candidate-form hiring-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<input type="hidden" name="action" value="sam_submit_contact_message">
			<?php wp_nonce_field( 'sam_submit_contact_message', 'sam_contact_nonce' ); ?>
			
			<div class="form-honeypot" aria-hidden="true">
				<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
			</div>

			<div class="form-section-header">
				<h3>Send Us a Message</h3>
			</div>

			<div class="form-grid">
				<p>
					<label for="contact_name">Your Name <span>*</span></label>
					<input id="contact_name" name="contact_name" type="text" required placeholder="e.g. John Doe">
				</p>
				<p>
					<label for="contact_email">Email Address <span>*</span></label>
					<input id="contact_email" name="contact_email" type="email" required placeholder="e.g. john@example.com">
				</p>
				<p>
					<label for="contact_phone">Phone Number <span>*</span></label>
					<input id="contact_phone" name="contact_phone" type="tel" required placeholder="e.g. +91 9876543210">
				</p>
				<p>
					<label for="contact_subject">Inquiry Type <span>*</span></label>
					<select id="contact_subject" name="contact_subject" required>
						<option value="">Select an Inquiry Type</option>
						<option value="Hiring Talent Requirement">Hiring Talent Requirement</option>
						<option value="Candidate Job Inquiry">Candidate Job Inquiry</option>
						<option value="Payroll & Compliance Support">Payroll &amp; Compliance Support</option>
						<option value="General Partnership">General Partnership</option>
						<option value="Other">Other</option>
					</select>
				</p>
			</div>

			<p>
				<label for="contact_message">How Can We Help You? <span>*</span></label>
				<textarea id="contact_message" name="contact_message" rows="5" required placeholder="Describe your requirement, questions, or message in detail..."></textarea>
			</p>

			<p class="form-submit" style="margin-top: 24px;">
				<button type="submit" class="btn btn-primary btn-lg">Send Message</button>
			</p>
		</form>
	</div>
</section>

<?php get_footer(); ?>
