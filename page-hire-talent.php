<?php
/**
 * Template Name: Hire Talent Form
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$status = isset( $_GET['form_status'] ) ? sanitize_key( wp_unslash( $_GET['form_status'] ) ) : '';
?>

<section class="page-hero page-hero-simple">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon( 'users' ); ?> Employer enquiry</span>
		<h1>Tell us who you need to hire.</h1>
		<p>Share your requirement and our recruitment team will contact you within one business day.</p>
	</div>
</section>

<section class="section">
	<div class="container container-narrow">
		<?php if ( 'success' === $status ) : ?>
			<div class="form-notice form-notice-success" role="status">Thank you. Your hiring requirement has been sent successfully.</div>
		<?php elseif ( 'error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">Please complete all required fields with a valid email address.</div>
		<?php elseif ( 'mail-error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">We could not send your request right now. Please call us or try again shortly.</div>
		<?php elseif ( 'invalid' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">Your session expired. Please submit the form again.</div>
		<?php endif; ?>

		<form class="hiring-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<input type="hidden" name="action" value="sam_submit_hiring_requirement">
			<?php wp_nonce_field( 'sam_submit_hiring_requirement', 'sam_hiring_nonce' ); ?>
			<div class="form-honeypot" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
			<div class="form-grid">
				<p><label for="name">Your name <span>*</span></label><input id="name" name="name" type="text" required></p>
				<p><label for="company">Company name <span>*</span></label><input id="company" name="company" type="text" required></p>
				<p><label for="email">Work email <span>*</span></label><input id="email" name="email" type="email" required></p>
				<p><label for="phone">Phone number <span>*</span></label><input id="phone" name="phone" type="tel" required></p>
				<p><label for="headcount">Number of hires</label><input id="headcount" name="headcount" type="number" min="1"></p>
				<p><label for="timeline">Expected joining timeline <span>*</span></label><select id="timeline" name="timeline" required><option value="">Select timeline</option><option>Immediate</option><option>Within 30 days</option><option>1–3 months</option><option>More than 3 months</option></select></p>
			</div>
			<p><label for="roles">Roles / skills required <span>*</span></label><textarea id="roles" name="roles" rows="4" required placeholder="Example: 3 Java developers, 4–6 years experience, Noida"></textarea></p>
			<p><label for="message">Anything else we should know?</label><textarea id="message" name="message" rows="4"></textarea></p>
			<p class="form-submit"><button type="submit" class="btn btn-primary">Submit Hiring Requirement</button></p>
		</form>
	</div>
</section>

<?php get_footer(); ?>
