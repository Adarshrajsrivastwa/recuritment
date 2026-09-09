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
		<span class="eyebrow-badge"><?php echo sam_icon( 'users' ); ?> Candidate Profile Registration</span>
		<h1>Submit Your Profile</h1>
		<p>Serving notice or ready for immediate placement? Share your details to connect with top hiring opportunities.</p>
	</div>
</section>

<section class="section">
	<div class="container container-narrow">
		<?php if ( 'success' === $status ) : ?>
			<div class="form-notice form-notice-success" role="status">
				<?php echo sam_icon( 'check' ); ?>
				Thank you! Your profile and documents have been submitted successfully. Our recruitment team will get in touch with you shortly.
			</div>
		<?php elseif ( 'error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				Please complete all required fields and attach a valid resume (PDF, DOC, or DOCX).
			</div>
		<?php elseif ( 'upload-error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				There was an error uploading your file. Please ensure your files are in PDF, DOC, or DOCX format under 10MB.
			</div>
		<?php elseif ( 'mail-error' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				Your details were saved, but email notification could not be delivered. Our team will still review your profile.
			</div>
		<?php elseif ( 'invalid' === $status ) : ?>
			<div class="form-notice form-notice-error" role="alert">
				Your session expired. Please submit the form again.
			</div>
		<?php endif; ?>

		<form class="candidate-form hiring-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="action" value="sam_submit_candidate_profile">
			<?php wp_nonce_field( 'sam_submit_candidate_profile', 'sam_candidate_nonce' ); ?>
			
			<div class="form-honeypot" aria-hidden="true">
				<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
			</div>

			<div class="form-section-header">
				<h3>Personal &amp; Contact Information</h3>
			</div>

			<div class="form-grid">
				<p>
					<label for="full_name">Name <span>*</span></label>
					<input id="full_name" name="full_name" type="text" required placeholder="e.g. Rahul Sharma">
				</p>
				<p>
					<label for="phone">Contact No. <span>*</span></label>
					<input id="phone" name="phone" type="tel" required placeholder="e.g. +91 9876543210">
				</p>
				<p>
					<label for="email">Email Address <span>*</span></label>
					<input id="email" name="email" type="email" required placeholder="e.g. rahul.sharma@example.com">
				</p>
				<p>
					<label for="current_location">Current Location <span>*</span></label>
					<input id="current_location" name="current_location" type="text" required placeholder="e.g. Noida / Gurgaon / Remote">
				</p>
			</div>

			<div class="form-section-header">
				<h3>Professional Profile</h3>
			</div>

			<div class="form-grid">
				<p>
					<label for="current_role">Current Role / Designation <span>*</span></label>
					<input id="current_role" name="current_role" type="text" required placeholder="e.g. Senior Frontend Engineer">
				</p>
				<p>
					<label for="total_experience">Total Experience <span>*</span></label>
					<select id="total_experience" name="total_experience" required>
						<option value="">Choose</option>
						<option value="0-1 years">0 - 1 Years (Fresher/Junior)</option>
						<option value="1-3 years">1 - 3 Years</option>
						<option value="3-5 years">3 - 5 Years</option>
						<option value="5-8 years">5 - 8 Years</option>
						<option value="8-12 years">8 - 12 Years</option>
						<option value="12+ years">12+ Years (Lead/Architect)</option>
					</select>
				</p>
				<p class="full-width">
					<label for="primary_skill">Primary Key Skills <span>*</span></label>
					<input id="primary_skill" name="primary_skill" type="text" required placeholder="e.g. React.js / Node.js / Java">
				</p>
			</div>

			<p>
				<label for="skills">Skills / Tech Stack <span>*</span></label>
				<textarea id="skills" name="skills" rows="3" required placeholder="e.g. React, JavaScript, HTML5, CSS3, Redux, REST APIs, Git"></textarea>
			</p>

			<div class="form-section-header">
				<h3>Notice Period &amp; Joining Availability</h3>
			</div>

			<div class="form-grid">
				<p class="full-width radio-group-container">
					<label class="group-label">Are you Currently Serving Notice Period or available to Join Immediately ? <span>*</span></label>
					<div class="radio-options">
						<label class="radio-card">
							<input type="radio" name="serving_notice" value="Yes" required class="toggle-notice-doc">
							<span class="radio-custom"></span>
							<span class="radio-label">Yes</span>
						</label>
						<label class="radio-card">
							<input type="radio" name="serving_notice" value="No" required class="toggle-notice-doc">
							<span class="radio-custom"></span>
							<span class="radio-label">No</span>
						</label>
					</div>
				</p>

				<div id="notice_doc_container" class="full-width conditional-upload-box hidden-field">
					<label for="notice_doc">
						If Yes can you share relevant docs (Resignation Email Screenshot or reliving letter) to verify your availability.
						<small class="field-hint">(Resignation acceptance letter, buyout email, or relieving letter screenshot)</small>
					</label>
					<div class="file-upload-wrapper">
						<input id="notice_doc" name="notice_doc" type="file" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
						<div class="file-upload-ui">
							<span class="upload-icon"><?php echo sam_icon( 'download' ); ?></span>
							<span class="upload-text">Click or drag resignation proof / notice doc here</span>
							<span class="file-name-preview" id="notice_doc_name"></span>
						</div>
					</div>
				</div>

				<p>
					<label for="joining_timeline">How soon can you join? <span>*</span></label>
					<select id="joining_timeline" name="joining_timeline" required>
						<option value="">Choose</option>
						<option value="Immediate">Immediate (0-7 Days)</option>
						<option value="Within 15 days">Within 15 Days</option>
						<option value="Within 30 days">Within 30 Days</option>
						<option value="45 days">45 Days</option>
						<option value="60 days or more">60+ Days</option>
					</select>
				</p>

				<p>
					<label for="offer_in_hand">Any offers in hand? <span>*</span></label>
					<select id="offer_in_hand" name="offer_in_hand" required>
						<option value="">Choose</option>
						<option value="Yes">Yes, holding an offer</option>
						<option value="No">No active offer</option>
						<option value="Multiple Offers">Multiple offers in hand</option>
					</select>
				</p>

				<p class="full-width">
					<label for="contract_role_ready">Comfortable with contract roles? <span>*</span></label>
					<select id="contract_role_ready" name="contract_role_ready" required>
						<option value="">Choose</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
						<option value="Open to both">Open to both</option>
					</select>
				</p>
			</div>

			<div class="form-section-header">
				<h3>Compensation &amp; Resume Upload</h3>
			</div>

			<div class="form-grid">
				<p>
					<label for="current_ctc">Current CTC <span>*</span></label>
					<input id="current_ctc" name="current_ctc" type="text" required placeholder="e.g. 10.5 LPA">
				</p>
				<p>
					<label for="expected_ctc">Expected CTC <span>*</span></label>
					<input id="expected_ctc" name="expected_ctc" type="text" required placeholder="e.g. 14 LPA">
				</p>
			</div>

			<div class="full-width file-field-group">
				<label for="resume_file">
					Upload Resume <span>*</span>
					<small class="field-hint">Upload 1 supported file: document (PDF, DOC, DOCX). Max 10 MB.</small>
				</label>
				<div class="file-upload-wrapper">
					<input id="resume_file" name="resume_file" type="file" required accept=".pdf,.doc,.docx">
					<div class="file-upload-ui">
						<span class="upload-icon"><?php echo sam_icon( 'download' ); ?></span>
						<span class="upload-text">Click or drag &amp; drop your resume here</span>
						<span class="file-name-preview" id="resume_file_name"></span>
					</div>
				</div>
			</div>

			<p class="form-submit" style="margin-top: 30px;">
				<button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
			</p>
		</form>
	</div>
</section>

<?php get_footer(); ?>
