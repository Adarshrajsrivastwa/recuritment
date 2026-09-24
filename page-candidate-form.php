<?php
/**
 * Template Name: Candidate Registration Form
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$status = isset( $_GET['form_status'] ) ? sanitize_key( wp_unslash( $_GET['form_status'] ) ) : '';
$phone  = get_theme_mod( 'sam_phone', '+91 98765 43210' );
$email  = function_exists( 'sam_get_company_email' ) ? sam_get_company_email() : 'sales@samcareer.com';
$prefill_role = isset( $_GET['role'] ) ? sanitize_text_field( wp_unslash( $_GET['role'] ) ) : '';
?>

<!-- ===================================================================
     HERO SECTION — Modern Dark Gradient with Glowing Orbs
     =================================================================== -->
<section class="fp-hero-v2 hire-page-hero" id="candidate-hero">
	<div class="fp-glow-orb fp-glow-orb-1" aria-hidden="true"></div>
	<div class="fp-glow-orb fp-glow-orb-2" aria-hidden="true"></div>
	<div class="fp-hero-grid-bg" aria-hidden="true"></div>

	<div class="container fp-hero-container">
		<div class="hire-hero-header">
			
			<div class="fp-live-status-pill">
				<span class="fp-pulse-wrapper">
					<span class="fp-pulse-beacon"></span>
					<span class="fp-pulse-center"></span>
				</span>
				<span><strong>100% Free for Job Seekers</strong> &bull; Zero Fees &bull; 48h Direct Shortlist</span>
			</div>

			<h1 class="fp-hero-h1" style="max-width:920px; margin:0 auto 18px; text-align:center;">
				Fast-Track Your Next Career Move: <span class="fp-text-gradient">Get Placed in 0–30 Days</span>
			</h1>

			<p class="fp-hero-lead" style="max-width:760px; margin:0 auto 28px; text-align:center;">
				Serving notice or ready for immediate start? Connect directly with hiring managers at India's top tech startups, global enterprises, and manufacturing MNCs. Zero ghosting guarantee.
			</p>

			<div class="hero-stats-row" style="justify-content:center; margin-top:0;">
				<div class="hero-stat-pill">💼 <strong>1,200+</strong> Immediate Placements</div>
				<div class="hero-stat-pill">⏱ <strong>48–72h</strong> First Shortlist</div>
				<div class="hero-stat-pill">🚫 <strong>Zero Fees</strong> Always Free for Candidates</div>
				<div class="hero-stat-pill">🔒 <strong>100%</strong> Confidential Search</div>
			</div>

		</div>
	</div>
</section>

<!-- ===================================================================
     MAIN SECTION: 2-COLUMN SPLIT (FORM + TRUST SIDEBAR)
     =================================================================== -->
<section class="section hire-main-section">
	<div class="container">
		
		<div class="hire-split-grid">

			<!-- LEFT COLUMN: Candidate Registration Card -->
			<div class="hire-form-col">

				<!-- Status Notices -->
				<?php if ( 'success' === $status ) : ?>
					<div class="form-notice form-notice-success" role="status" style="margin-bottom:24px;">
						<span style="font-size:1.4rem;">🎉</span>
						<div>
							<strong>Profile Submitted Successfully!</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Your candidate profile and resume have been securely received. An industry placement specialist will review your background and contact you within 24 hours.</p>
						</div>
					</div>
				<?php elseif ( 'error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Incomplete Form Submission</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Please ensure all required fields are filled and attach a valid resume document (PDF, DOC, or DOCX).</p>
						</div>
					</div>
				<?php elseif ( 'upload-error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>File Upload Issue</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">There was an error uploading your file. Please ensure your resume is in PDF or DOCX format under 10MB.</p>
						</div>
					</div>
				<?php elseif ( 'mail-error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Profile Saved in Database</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Your profile is securely stored in our recruiter portal. Our recruitment desk is notified and will evaluate your application shortly.</p>
						</div>
					</div>
				<?php elseif ( 'invalid' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Session Expired</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Please refresh the page and submit your profile again.</p>
						</div>
					</div>
				<?php endif; ?>

				<div class="hire-mandate-card">
					<div class="hire-card-header">
						<h2>Register Your Candidate Profile</h2>
						<p>Join our priority candidate pool to receive direct interview calls for unadvertised fast-track roles.</p>
					</div>

					<form class="hire-mandate-form hiring-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="action" value="sam_submit_candidate_profile">
						<?php wp_nonce_field( 'sam_submit_candidate_profile', 'sam_candidate_nonce' ); ?>
						
						<div class="form-honeypot" aria-hidden="true">
							<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
						</div>

						<!-- Section 1: Personal & Contact Coordinates -->
						<div class="form-subheading">
							<span>01</span> Personal &amp; Contact Information
						</div>

						<div class="form-grid">
							<div class="form-field">
								<label for="full_name">Full Name <span>*</span></label>
								<input id="full_name" name="full_name" type="text" required placeholder="e.g. Rahul Sharma">
							</div>

							<div class="form-field">
								<label for="phone">Phone / WhatsApp Number <span>*</span></label>
								<input id="phone" name="phone" type="tel" required placeholder="e.g. +91 98765 43210">
							</div>

							<div class="form-field">
								<label for="email">Email Address <span>*</span></label>
								<input id="email" name="email" type="email" required placeholder="e.g. rahul.sharma@example.com">
							</div>

							<div class="form-field">
								<label for="current_location">Current Location <span>*</span></label>
								<input id="current_location" name="current_location" type="text" required placeholder="e.g. Noida / Bengaluru / Mumbai / Remote">
							</div>
						</div>

						<!-- Section 2: Professional Profile -->
						<div class="form-subheading" style="margin-top:28px;">
							<span>02</span> Professional Profile
						</div>

						<div class="form-grid">
							<div class="form-field">
								<label for="current_role">Current Role / Designation <span>*</span></label>
								<input id="current_role" name="current_role" type="text" required placeholder="e.g. Senior Frontend Engineer" value="<?php echo esc_attr( $prefill_role ); ?>">
							</div>

							<div class="form-field">
								<label for="total_experience">Total Experience <span>*</span></label>
								<select id="total_experience" name="total_experience" required>
									<option value="">Choose Experience</option>
									<option value="0-1 years">0 &ndash; 1 Years (Fresher / Junior)</option>
									<option value="1-3 years">1 &ndash; 3 Years (Early Lateral)</option>
									<option value="3-5 years">3 &ndash; 5 Years (Mid-Level)</option>
									<option value="5-8 years">5 &ndash; 8 Years (Senior)</option>
									<option value="8-12 years">8 &ndash; 12 Years (Lead / Specialist)</option>
									<option value="12+ years">12+ Years (Architect / Management)</option>
								</select>
							</div>
						</div>

						<div class="form-field full-width" style="margin-top:4px;">
							<label for="primary_skill">Primary Core Skills <span>*</span></label>
							<input id="primary_skill" name="primary_skill" type="text" required placeholder="e.g. React.js, Node.js, AWS, Kubernetes">
						</div>

						<div class="form-field full-width" style="margin-top:4px;">
							<label for="skills">All Technical Skills &amp; Competencies <span>*</span></label>
							<textarea id="skills" name="skills" rows="3" required placeholder="e.g. React, JavaScript, HTML5, CSS3, Redux, Node.js, PostgreSQL, Docker, Git, CI/CD"></textarea>
						</div>

						<!-- Section 3: Notice Period & Availability -->
						<div class="form-subheading" style="margin-top:28px;">
							<span>03</span> Notice Period &amp; Joining Availability
						</div>

						<div class="form-field full-width">
							<label style="margin-bottom:10px;">Are you currently serving notice period or available to join immediately? <span>*</span></label>
							<div class="candidate-radio-pills">
								<label class="cand-radio-pill">
									<input type="radio" name="serving_notice" value="Yes" required class="cand-notice-radio">
									<span class="cand-radio-btn">⚡ Yes, Serving Notice / Immediate</span>
								</label>
								<label class="cand-radio-pill">
									<input type="radio" name="serving_notice" value="No" required class="cand-notice-radio">
									<span class="cand-radio-btn">📅 No, Not Yet Resigned</span>
								</label>
							</div>
						</div>

						<!-- Conditional Upload Box for Notice Verification -->
						<div id="notice_doc_container" class="candidate-conditional-box" style="display:none;">
							<div class="conditional-head">
								<span class="cond-icon">📄</span>
								<div>
									<strong>Upload Availability Proof (Optional &bull; Fast-Tracks Shortlist)</strong>
									<p>Attach resignation confirmation email, buyout approval, or relieving letter to get prioritized for immediate client interviews.</p>
								</div>
							</div>
							<div class="cand-file-box">
								<input id="notice_doc" name="notice_doc" type="file" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
								<div class="cand-file-label">
									<span class="cand-file-icon"><?php echo sam_icon( 'download' ); ?></span>
									<span class="cand-file-prompt">Click or drag resignation email / notice letter</span>
									<span class="cand-file-name" id="notice_doc_preview"></span>
								</div>
							</div>
						</div>

						<div class="form-grid" style="margin-top:14px;">
							<div class="form-field">
								<label for="joining_timeline">How soon can you join? <span>*</span></label>
								<select id="joining_timeline" name="joining_timeline" required>
									<option value="">Select Timeline</option>
									<option value="Immediate" selected>⚡ Immediate (0 &ndash; 7 Days)</option>
									<option value="Within 15 days">⏱ Within 15 Days</option>
									<option value="Within 30 days">📅 Within 30 Days</option>
									<option value="45 days">45 Days</option>
									<option value="60 days or more">60+ Days</option>
								</select>
							</div>

							<div class="form-field">
								<label for="offer_in_hand">Any offers in hand? <span>*</span></label>
								<select id="offer_in_hand" name="offer_in_hand" required>
									<option value="">Select Offer Status</option>
									<option value="No">No active offer</option>
									<option value="Yes">Yes, holding 1 offer</option>
									<option value="Multiple Offers">Holding multiple offers</option>
								</select>
							</div>

							<div class="form-field full-width">
								<label for="contract_role_ready">Are you open to contract &amp; contract-to-hire roles? <span>*</span></label>
								<select id="contract_role_ready" name="contract_role_ready" required>
									<option value="">Select Preference</option>
									<option value="Open to both" selected>Open to both (Permanent &amp; Contract-to-Hire)</option>
									<option value="Yes">Yes, comfortable with Contract / C2H</option>
									<option value="No">No, only Permanent roles</option>
								</select>
							</div>
						</div>

						<!-- Section 4: Compensation & Resume Upload -->
						<div class="form-subheading" style="margin-top:28px;">
							<span>04</span> Compensation &amp; Resume
						</div>

						<div class="form-grid">
							<div class="form-field">
								<label for="current_ctc">Current CTC (Per Annum) <span>*</span></label>
								<input id="current_ctc" name="current_ctc" type="text" required placeholder="e.g. ₹12.5 LPA">
							</div>

							<div class="form-field">
								<label for="expected_ctc">Expected CTC (Per Annum) <span>*</span></label>
								<input id="expected_ctc" name="expected_ctc" type="text" required placeholder="e.g. ₹16 LPA">
							</div>
						</div>

						<!-- Resume Upload UI -->
						<div class="form-field full-width" style="margin-top:8px;">
							<label for="resume_file">
								Upload Resume <span>*</span>
								<small style="color:var(--text-muted); font-weight:normal; margin-left:6px;">Supported: PDF, DOC, DOCX (Max 10 MB)</small>
							</label>
							<div class="cand-file-box cand-resume-box">
								<input id="resume_file" name="resume_file" type="file" required accept=".pdf,.doc,.docx">
								<div class="cand-file-label">
									<span class="cand-file-icon" style="background:#EFF6FF; color:#2563EB;"><?php echo sam_icon( 'download' ); ?></span>
									<span class="cand-file-prompt" style="font-weight:600; color:#0F172A;">Click or drag &amp; drop your resume here</span>
									<small style="color:var(--text-muted); font-size:.8rem;">PDF, DOC, or DOCX format</small>
									<span class="cand-file-name" id="resume_file_preview"></span>
								</div>
							</div>
						</div>

						<!-- Submit Button -->
						<div class="form-submit-row" style="margin-top:26px;">
							<button type="submit" class="btn fp-btn-primary btn-block" style="padding:16px 28px; font-size:1.05rem; justify-content:center; width:100%;">
								<?php echo sam_icon('upload'); ?> Submit Candidate Profile &mdash; Connect with Top Employers &rarr;
							</button>
							<p class="mandate-disclaimer">
								🔒 <strong>100% Confidential:</strong> We never share your profile with any employer without your explicit prior permission. Your current employer will never know you are exploring.
							</p>
						</div>

					</form>
				</div>

			</div>

			<!-- RIGHT COLUMN: Candidate Perks & Priority Recruiter Hotline -->
			<div class="hire-sidebar-col">

				<!-- Card 1: Why Candidates Choose SAM -->
				<div class="hire-sidebar-card">
					<div class="sidebar-card-badge">🌟 Candidate First</div>
					<h4>Why Top Talent Trusts SAM</h4>
					<p class="sidebar-sub">We treat you as a valued professional, not an item in an inbox.</p>

					<div class="cand-perks-stack">
						<div class="cand-perk-item">
							<span class="cand-perk-icon">🚫</span>
							<div>
								<strong>Zero Ghosting Guarantee</strong>
								<p>You will always know your exact status with verified interview feedback within 48 hours.</p>
							</div>
						</div>

						<div class="cand-perk-item">
							<span class="cand-perk-icon">👔</span>
							<div>
								<strong>Direct Decision-Maker Access</strong>
								<p>Bypass generic resume filters. Your profile is presented directly to hiring VPs, Directors, and CTOs.</p>
							</div>
						</div>

						<div class="cand-perk-item">
							<span class="cand-perk-icon">💰</span>
							<div>
								<strong>Notice Buyout &amp; CTC Advocacy</strong>
								<p>We negotiate transparently to secure joining bonuses, fair salary hikes, and notice buyout support.</p>
							</div>
						</div>

						<div class="cand-perk-item">
							<span class="cand-perk-icon">🆓</span>
							<div>
								<strong>Always 100% Free</strong>
								<p>Job seekers are never charged any registration or placement fees. Ever.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Card 2: Priority Candidate Hotline -->
				<div class="hire-sidebar-card hotline-card">
					<div class="sidebar-card-badge" style="background:#FEF3C7; color:#B45309; border-color:#FDE68A;">📞 Candidate Desk</div>
					<h4>Have Questions About Open Roles?</h4>
					<p>Speak directly with our career advisory team about active mandates in your domain.</p>
					
					<div class="hotline-contact-list">
						<a href="tel:<?php echo esc_attr( str_replace( ' ', '', $phone ) ); ?>" class="hotline-btn hotline-call">
							<?php echo sam_icon('chat'); ?>
							<div>
								<small>Direct Phone Line</small>
								<strong><?php echo esc_html( $phone ); ?></strong>
							</div>
						</a>

						<a href="https://wa.me/<?php echo esc_attr( preg_replace('/[^0-9]/', '', $phone) ); ?>?text=Hello%20SAM%20Manpower,%20I%20am%20looking%20for%20a%20job%20change" target="_blank" rel="noopener noreferrer" class="hotline-btn hotline-wa">
							<span style="font-size:1.4rem;">💬</span>
							<div>
								<small>WhatsApp Career Desk</small>
								<strong>Chat With Recruiter</strong>
							</div>
						</a>

						<a href="mailto:<?php echo esc_attr( $email ); ?>?subject=Candidate%20Job%20Inquiry" class="hotline-btn hotline-email">
							<?php echo sam_icon('bell'); ?>
							<div>
								<small>Careers Email</small>
								<strong><?php echo esc_html( $email ); ?></strong>
							</div>
						</a>
					</div>
					<small class="hotline-hours">Operating Hours: Mon &ndash; Sat &bull; 9:30 AM &ndash; 7:00 PM IST</small>
				</div>

				<!-- Card 3: In-Demand Roles -->
				<div class="hire-sidebar-card shield-card">
					<div class="shield-card-header">
						<div class="shield-icon-badge" style="background:#EFF6FF; color:#2563EB;"><?php echo sam_icon('briefcase'); ?></div>
						<div>
							<h4>High-Demand Roles</h4>
							<small>Hiring Immediately</small>
						</div>
					</div>
					<ul class="shield-perks-list">
						<li>
							<span>⚡</span>
							<div><strong>Full Stack &amp; Cloud Leads:</strong> React, Node, Python, AWS, Kubernetes (15-30 day notice).</div>
						</li>
						<li>
							<span>⚡</span>
							<div><strong>Plant &amp; Quality Leads:</strong> IATF 16949, Tool Room, Six Sigma (Immediate to 15 days).</div>
						</li>
						<li>
							<span>⚡</span>
							<div><strong>Corporate Finance &amp; Tax:</strong> CA Inter/Final, GST, FP&amp;A (30-day notice).</div>
						</li>
						<li>
							<span>⚡</span>
							<div><strong>Enterprise Sales:</strong> B2B SaaS, BFSI solutions, Industrial sales.</div>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</div>
</section>

<!-- Interactive Script for Notice Radio Toggle and File Previews -->
<script>
document.addEventListener('DOMContentLoaded', function() {
	const noticeRadios = document.querySelectorAll('.cand-notice-radio');
	const noticeDocContainer = document.getElementById('notice_doc_container');
	const resumeInput = document.getElementById('resume_file');
	const resumePreview = document.getElementById('resume_file_preview');
	const noticeInput = document.getElementById('notice_doc');
	const noticePreview = document.getElementById('notice_doc_preview');

	noticeRadios.forEach(radio => {
		radio.addEventListener('change', function() {
			if (this.value === 'Yes' && this.checked) {
				if (noticeDocContainer) noticeDocContainer.style.display = 'block';
			} else {
				if (noticeDocContainer) noticeDocContainer.style.display = 'none';
			}
		});
	});

	if (resumeInput) {
		resumeInput.addEventListener('change', function() {
			if (this.files && this.files[0]) {
				resumePreview.textContent = '✓ Selected: ' + this.files[0].name;
				resumePreview.style.display = 'inline-block';
			} else {
				resumePreview.textContent = '';
				resumePreview.style.display = 'none';
			}
		});
	}

	if (noticeInput) {
		noticeInput.addEventListener('change', function() {
			if (this.files && this.files[0]) {
				noticePreview.textContent = '✓ Selected: ' + this.files[0].name;
				noticePreview.style.display = 'inline-block';
			} else {
				noticePreview.textContent = '';
				noticePreview.style.display = 'none';
			}
		});
	}
});
</script>

<?php get_footer(); ?>
