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
		<span class="eyebrow-badge"><?php echo sam_icon( 'users' ); ?> Hire Talent</span>
		<h1>Share Your Hiring Requirement</h1>
		<p>Tell us the roles you need to fill and our team will respond within 24 hours with pre-screened candidates.</p>
	</div>
</section>

<section class="section">
	<div class="container container-narrow">
		<?php if ( 'success' === $status ) : ?>
			<div class="form-notice form-notice-success" role="status">
				<?php echo sam_icon( 'check' ); ?>
				Thank you! Your hiring requirement has been submitted successfully. Our team will contact you shortly.
			</div>
		<?php elseif ( 'error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				Please complete all required fields with a valid email address.
			</div>
		<?php elseif ( 'mail-error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				Your requirement was saved, but email notification could not be sent. Our team will still review your submission.
			</div>
		<?php elseif ( 'invalid' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				Your session expired. Please submit the form again.
			</div>
		<?php endif; ?>

		<form class="hiring-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<input type="hidden" name="action" value="sam_submit_hiring_requirement">
			<?php wp_nonce_field( 'sam_submit_hiring_requirement', 'sam_hiring_nonce' ); ?>

			<div class="form-honeypot" aria-hidden="true">
				<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
			</div>

			<div class="form-section-header">
				<h3>Your Details</h3>
			</div>

			<div class="form-grid">
				<p>
					<label for="name">Your Name <span>*</span></label>
					<input id="name" name="name" type="text" required placeholder="e.g. Rahul Sharma">
				</p>
				<p>
					<label for="company">Company Name <span>*</span></label>
					<input id="company" name="company" type="text" required placeholder="e.g. ABC Technologies Pvt Ltd">
				</p>
				<p>
					<label for="email">Work Email <span>*</span></label>
					<input id="email" name="email" type="email" required placeholder="e.g. hr@company.com">
				</p>
				<p>
					<label for="phone">Phone Number <span>*</span></label>
					<input id="phone" name="phone" type="tel" required placeholder="e.g. +91 9876543210">
				</p>
			</div>

			<div class="form-section-header">
				<h3>Requirement Details</h3>
			</div>

			<p>
				<label for="roles">Roles Required <span>*</span></label>
				<textarea id="roles" name="roles" rows="3" required placeholder="e.g. 2 React Developers, 1 DevOps Engineer, 1 HR Executive"></textarea>
			</p>

			<div class="form-grid">
				<p>
					<label for="headcount">Total Headcount</label>
					<input id="headcount" name="headcount" type="number" min="1" placeholder="e.g. 3">
				</p>
				<p>
					<label for="timeline">Joining Timeline <span>*</span></label>
					<select id="timeline" name="timeline" required>
						<option value="">Select timeline</option>
						<option value="Immediate">Immediate (0-7 days)</option>
						<option value="Within 15 days">Within 15 days</option>
						<option value="Within 30 days">Within 30 days</option>
						<option value="30-60 days">30-60 days</option>
						<option value="Flexible">Flexible</option>
					</select>
				</p>
			</div>

			<p>
				<label for="message">Additional Details</label>
				<textarea id="message" name="message" rows="4" placeholder="Budget, location, skills, notice period preference, or any other notes"></textarea>
			</p>

			<p class="form-submit" style="margin-top: 24px;">
				<button type="submit" class="btn btn-primary btn-lg">Submit Requirement</button>
			</p>
		</form>
	</div>
</section>

<?php get_footer(); ?>
