<?php
/**
 * Template Name: Hire Talent Form
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$status  = isset( $_GET['form_status'] ) ? sanitize_key( wp_unslash( $_GET['form_status'] ) ) : '';
$email   = function_exists( 'sam_get_company_email' ) ? sam_get_company_email() : 'sales@samcareer.com';
$prefill_role = isset( $_GET['role'] ) ? sanitize_text_field( wp_unslash( $_GET['role'] ) ) : '';
?>

<!-- ===================================================================
     HERO SECTION
     =================================================================== -->
<section class="fp-hero-v2 hire-page-hero" id="hire-hero">
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
				<span><strong>48–72h Turnaround SLA</strong> &bull; Zero Upfront Retainer &bull; 90-Day Guarantee</span>
			</div>

			<h1 class="fp-hero-h1" style="max-width:900px; margin:0 auto 18px; text-align:center;">
				Share Your Hiring Requirement: <span class="fp-text-gradient">Get Pre-Vetted Talent</span> Ready in <span class="fp-tag-days">0–30 Days</span>
			</h1>

			<p class="fp-hero-lead" style="max-width:760px; margin:0 auto 28px; text-align:center;">
				Stop losing momentum to 90-day waiting periods and offer dropouts. Submit your open positions below and our specialized recruiters will deliver an interview-ready shortlist within 48 to 72 hours.
			</p>

			<div class="hero-stats-row" style="justify-content:center; margin-top:0;">
				<div class="hero-stat-pill">⚡ <strong>48–72h</strong> First Shortlist SLA</div>
				<div class="hero-stat-pill">🛡️ <strong>90-Day</strong> Free Replacement Shield</div>
				<div class="hero-stat-pill">🚫 <strong>Zero</strong> Resume Spam</div>
				<div class="hero-stat-pill">👥 <strong>500+</strong> Active Corporate Clients</div>
			</div>

		</div>
	</div>
</section>

<!-- ===================================================================
     MAIN SECTION: CLEAN STREAMLINED FORM + SIDEBAR ROADMAP
     =================================================================== -->
<section class="section hire-main-section">
	<div class="container">
		
		<div class="hire-split-grid">

			<!-- LEFT COLUMN: Clean, Direct Requirement Submission Form -->
			<div class="hire-form-col">

				<!-- Status Notices -->
				<?php if ( 'success' === $status ) : ?>
					<div class="form-notice form-notice-success" role="status" style="margin-bottom:24px;">
						<span style="font-size:1.4rem;">🎉</span>
						<div>
							<strong>Requirement Submitted Successfully!</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Our industry practice lead will review your mandate and contact you within 2 to 4 business hours with candidate availability.</p>
						</div>
					</div>
				<?php elseif ( 'error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Please Fill Required Fields</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Please ensure Name, Company, Work Email, Phone, Roles Required, and Joining Timeline are completed.</p>
						</div>
					</div>
				<?php elseif ( 'mail-error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Requirement Saved Successfully</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Your requirement is securely saved in our system. Our team is already notified and will contact you shortly.</p>
						</div>
					</div>
				<?php elseif ( 'invalid' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Session Expired</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Please refresh the page and submit your requirement again.</p>
						</div>
					</div>
				<?php endif; ?>

				<div class="hire-mandate-card">
					<div class="hire-card-header">
						<h2>Submit Your Hiring Requirement</h2>
						<p>Fill out the details below to receive pre-screened candidate profiles matched to your exact role requirements.</p>
					</div>

					<form class="hire-mandate-form hiring-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
						<input type="hidden" name="action" value="sam_submit_hiring_requirement">
						<?php wp_nonce_field( 'sam_submit_hiring_requirement', 'sam_hiring_nonce' ); ?>

						<div class="form-honeypot" aria-hidden="true">
							<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
						</div>

						<!-- Section A: Contact Details -->
						<div class="form-subheading">
							<span>01</span> Contact Details
						</div>

						<div class="form-grid">
							<div class="form-field">
								<label for="name">Your Name <span>*</span></label>
								<input id="name" name="name" type="text" required placeholder="e.g. Rahul Sharma">
							</div>

							<div class="form-field">
								<label for="company">Company Name <span>*</span></label>
								<input id="company" name="company" type="text" required placeholder="e.g. ABC Technologies Pvt Ltd">
							</div>

							<div class="form-field">
								<label for="email">Work Email <span>*</span></label>
								<input id="email" name="email" type="email" required placeholder="e.g. hr@company.com">
							</div>

							<div class="form-field">
								<label for="phone">Phone / WhatsApp <span>*</span></label>
								<input id="phone" name="phone" type="tel" required placeholder="e.g. +91 98765 43210">
							</div>
						</div>

						<!-- Section B: Requirement Details -->
						<div class="form-subheading" style="margin-top:28px;">
							<span>02</span> Requirement Details
						</div>

						<div class="form-field full-width">
							<label for="roles">Roles Required <span>*</span></label>
							<textarea id="roles" name="roles" rows="3" required placeholder="e.g. 2 Senior React Developers, 1 DevOps Engineer, 1 Plant Quality Manager"><?php echo esc_textarea( $prefill_role ); ?></textarea>
						</div>

						<div class="form-grid">
							<div class="form-field">
								<label for="headcount">Total Headcount</label>
								<input id="headcount" name="headcount" type="number" min="1" placeholder="e.g. 3">
							</div>

							<div class="form-field">
								<label for="timeline">Joining Timeline <span>*</span></label>
								<select id="timeline" name="timeline" required>
									<option value="">Select joining timeline</option>
									<option value="Immediate (0–7 Days)" selected>Immediate (0–7 Days) &mdash; Urgent</option>
									<option value="Within 15 Days">Within 15 Days</option>
									<option value="Within 30 Days">Within 30 Days (Serving Notice)</option>
									<option value="30–60 Days">30–60 Days</option>
									<option value="Flexible">Flexible</option>
								</select>
							</div>

							<div class="form-field">
								<label for="location">Location &amp; Work Model</label>
								<input id="location" name="location" type="text" placeholder="e.g. Noida / Onsite OR Hybrid">
							</div>

							<div class="form-field">
								<label for="budget">Budget / CTC Band</label>
								<input id="budget" name="budget" type="text" placeholder="e.g. ₹18 &ndash; ₹24 LPA or Flexible">
							</div>
						</div>

						<div class="form-field full-width" style="margin-top:4px;">
							<label for="message">Additional Details / Must-Have Skills</label>
							<textarea id="message" name="message" rows="4" placeholder="Brief notes on must-have technologies, experience band, interview rounds, or any specific preferences..."></textarea>
						</div>

						<div class="form-submit-row" style="margin-top:24px;">
							<button type="submit" class="btn fp-btn-primary btn-block" style="padding:16px 28px; font-size:1.05rem; justify-content:center; width:100%;">
								<?php echo sam_icon('users'); ?> Submit Requirement &mdash; Get Shortlist in 48h &rarr;
							</button>
							<p class="mandate-disclaimer">
								🛡️ <strong>100% Confidential &amp; Zero Risk:</strong> Your requirements are kept confidential. Zero upfront retainer fee &bull; Pay only upon successful candidate onboarding.
							</p>
						</div>

					</form>
				</div>

			</div>

			<!-- RIGHT COLUMN: SLA Roadmap, Escalation Hotline, Trust Badges -->
			<div class="hire-sidebar-col">

				<!-- Card 1: 48-Hour SLA Journey -->
				<div class="hire-sidebar-card">
					<div class="sidebar-card-badge">⚡ Turnaround SLA</div>
					<h4>What Happens Next</h4>
					<p class="sidebar-sub">Our strict delivery SLA ensures your open requisition gets immediate recruiter action.</p>

					<div class="sla-steps-track">
						<div class="sla-step">
							<div class="sla-step-num">01</div>
							<div class="sla-step-content">
								<strong>Within 2 Hours &bull; Calibration</strong>
								<p>A specialized recruiter calls to confirm your exact job specs, compensation &amp; culture fit.</p>
							</div>
						</div>

						<div class="sla-step">
							<div class="sla-step-num">02</div>
							<div class="sla-step-content">
								<strong>Within 24–48 Hours &bull; Screening</strong>
								<p>Sourcing directly from our verified 0–30 day talent bench with technical pre-screening.</p>
							</div>
						</div>

						<div class="sla-step is-final">
							<div class="sla-step-num">03</div>
							<div class="sla-step-content">
								<strong>Within 48–72 Hours &bull; Presentation</strong>
								<p>Receive 3–5 interview-ready candidate profiles straight to your interview schedule.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Card 2: Urgent Recruiter Hotline -->
				<div class="hire-sidebar-card hotline-card">
					<div class="sidebar-card-badge" style="background:#FEF3C7; color:#B45309; border-color:#FDE68A;">📞 Priority Hotline</div>
					<h4>Have an Urgent Role Today?</h4>
					<p>Speak directly with an executive recruiter managing active candidates ready to join immediately.</p>
					
					<div class="hotline-contact-list">
						<a href="tel:<?php echo esc_attr( str_replace( ' ', '', $phone ) ); ?>" class="hotline-btn hotline-call">
							<?php echo sam_icon('chat'); ?>
							<div>
								<small>Direct Phone Desk</small>
								<strong><?php echo esc_html( $phone ); ?></strong>
							</div>
						</a>

						<a href="https://wa.me/<?php echo esc_attr( preg_replace('/[^0-9]/', '', $phone) ); ?>?text=Hello%20SAM%20Manpower,%20I%20have%20an%20urgent%20hiring%20requirement" target="_blank" rel="noopener noreferrer" class="hotline-btn hotline-wa">
							<span style="font-size:1.4rem;">💬</span>
							<div>
								<small>Instant WhatsApp</small>
								<strong>Chat With Recruiter Lead</strong>
							</div>
						</a>

						<a href="mailto:<?php echo esc_attr( $email ); ?>?subject=Urgent%20Hiring%20Requirement" class="hotline-btn hotline-email">
							<?php echo sam_icon('bell'); ?>
							<div>
								<small>Direct Email</small>
								<strong><?php echo esc_html( $email ); ?></strong>
							</div>
						</a>
					</div>
					<small class="hotline-hours">Operating Hours: Mon &ndash; Sat &bull; 9:30 AM &ndash; 7:00 PM IST</small>
				</div>

				<!-- Card 3: SAM Assured Guarantee Card -->
				<div class="hire-sidebar-card shield-card">
					<div class="shield-card-header">
						<div class="shield-icon-badge"><?php echo sam_icon('shield'); ?></div>
						<div>
							<h4>The SAM Assured Shield</h4>
							<small>Client Protection Framework</small>
						</div>
					</div>
					<ul class="shield-perks-list">
						<li>
							<span>✓</span>
							<div><strong>90-Day Free Replacement:</strong> If a candidate departs or fails trial, we provide an immediate replacement at zero cost.</div>
						</li>
						<li>
							<span>✓</span>
							<div><strong>Verified Notice Periods:</strong> Real resignation documentation check to eliminate counter-offer dropouts.</div>
						</li>
						<li>
							<span>✓</span>
							<div><strong>Zero Upfront Retainer:</strong> Pay solely upon successful onboarding of your selected candidate.</div>
						</li>
						<li>
							<span>✓</span>
							<div><strong>ISO 9001:2015 Certified:</strong> Standardized quality workflows ensure regulatory and process compliance.</div>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</div>
</section>

<!-- ===================================================================
     EMPLOYER FAQ ACCORDION
     =================================================================== -->
<section class="section bg-soft">
	<div class="container container-narrow">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('target'); ?> Transparency</span>
			<h2>Frequently Asked Questions by Employers</h2>
			<p>Everything you need to know about our sourcing methodology, timelines, and commercial terms.</p>
		</div>

		<div class="faq-stack">
			<div class="faq-item-card">
				<h4>How can SAM deliver candidate shortlists within 48 to 72 hours?</h4>
				<p>Unlike conventional agencies that begin searching external job portals only after you post a requisition, we maintain dedicated, pre-vetted talent pipelines of candidates who are actively serving notice periods (15–30 days) or available immediately across Tier-1 IT, manufacturing, and corporate domains.</p>
			</div>

			<div class="faq-item-card">
				<h4>What is your fee structure and commercial terms?</h4>
				<p>For permanent direct placements, we work on a contingency model with zero upfront retainer fees. You are invoiced only after the candidate successfully joins your organization, typically with 30-day payment terms. Contract staffing is billed on approved monthly timesheets.</p>
			</div>

			<div class="faq-item-card">
				<h4>How does the 90-day replacement guarantee work?</h4>
				<p>If any placed candidate resigns or does not meet performance expectations within 90 days of joining, our recruitment team initiates a priority replacement sprint at absolutely zero additional fee.</p>
			</div>

			<div class="faq-item-card">
				<h4>Can you assist with notice period buyouts?</h4>
				<p>Yes. Many high-demand candidates have 60 to 90-day contractual notice periods but are eligible for official company buyouts. We help calculate buyout dues, verify employer policies, and structure buyout bonuses to bring candidate start dates down to 10–15 days.</p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
