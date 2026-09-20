<?php
/**
 * Template Name: Hire Talent Form
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$status  = isset( $_GET['form_status'] ) ? sanitize_key( wp_unslash( $_GET['form_status'] ) ) : '';
$phone   = get_theme_mod( 'sam_phone', '+91 98765 43210' );
$email   = get_theme_mod( 'sam_hiring_form_recipient', 'srivastwaadarsh@gmail.com' );
$prefill_role = isset( $_GET['role'] ) ? sanitize_text_field( wp_unslash( $_GET['role'] ) ) : '';
$prefill_domain = isset( $_GET['domain'] ) ? sanitize_text_field( wp_unslash( $_GET['domain'] ) ) : '';
?>

<!-- ===================================================================
     HERO SECTION — Modern Dark Gradient with Glow Orbs
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
				Drop Your Hiring Mandate: <span class="fp-text-gradient">Connect With Pre-Vetted Talent</span> Ready in <span class="fp-tag-days">0–30 Days</span>
			</h1>

			<p class="fp-hero-lead" style="max-width:760px; margin:0 auto 28px; text-align:center;">
				Stop losing momentum to 90-day waiting periods and offer dropouts. Share your requirements below and our specialized recruiters will deliver an interview-ready shortlist within 48 to 72 hours.
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
     MAIN TWO-COLUMN SECTION: FORM + SIDEBAR ROADMAP
     =================================================================== -->
<section class="section hire-main-section">
	<div class="container">
		
		<div class="hire-split-grid">

			<!-- LEFT COLUMN: The Rich Mandate Form -->
			<div class="hire-form-col">

				<!-- Notices -->
				<?php if ( 'success' === $status ) : ?>
					<div class="form-notice form-notice-success" role="status" style="margin-bottom:24px;">
						<span style="font-size:1.4rem;">🎉</span>
						<div>
							<strong>Hiring Mandate Received Successfully!</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Our industry practice head is reviewing your requirements and will contact you within 2 to 4 business hours to confirm your candidate calibration.</p>
						</div>
					</div>
				<?php elseif ( 'error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Incomplete Form Submission</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Please ensure all required fields (Name, Company, Work Email, Phone, Roles, and Joining Timeline) are completed.</p>
						</div>
					</div>
				<?php elseif ( 'mail-error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Mandate Saved In Our System</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Your requirement has been securely saved, though automatic email dispatch encountered a temporary delay. Our team is already notified and will contact you shortly.</p>
						</div>
					</div>
				<?php elseif ( 'invalid' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert" style="margin-bottom:24px;">
						<span>⚠️</span>
						<div>
							<strong>Session Expired</strong>
							<p style="margin:4px 0 0; font-size:.9rem; font-weight:normal;">Please refresh the page and submit your mandate again.</p>
						</div>
					</div>
				<?php endif; ?>

				<form class="hire-mandate-card" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
					<input type="hidden" name="action" value="sam_submit_hiring_requirement">
					<?php wp_nonce_field( 'sam_submit_hiring_requirement', 'sam_hiring_nonce' ); ?>

					<div class="form-honeypot" aria-hidden="true">
						<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
					</div>

					<!-- STEP 1: Employer Details -->
					<div class="mandate-step-box">
						<div class="mandate-step-head">
							<span class="step-badge">Step 01</span>
							<div>
								<h3>Your Coordinates</h3>
								<p>Tell us who to contact with the candidate shortlist.</p>
							</div>
						</div>

						<div class="form-grid">
							<p>
								<label for="name">Your Full Name <span>*</span></label>
								<input id="name" name="name" type="text" required placeholder="e.g. Vikram Malhotra (VP HR / Founder)">
							</p>
							<p>
								<label for="company">Company / Organization Name <span>*</span></label>
								<input id="company" name="company" type="text" required placeholder="e.g. Nexus Technologies Pvt Ltd">
							</p>
							<p>
								<label for="email">Work Email Address <span>*</span></label>
								<input id="email" name="email" type="email" required placeholder="e.g. vikram@company.com">
							</p>
							<p>
								<label for="phone">Phone / WhatsApp Number <span>*</span></label>
								<input id="phone" name="phone" type="tel" required placeholder="e.g. +91 98765 43210">
							</p>
						</div>
					</div>

					<!-- STEP 2: Engagement Model Selection -->
					<div class="mandate-step-box">
						<div class="mandate-step-head">
							<span class="step-badge">Step 02</span>
							<div>
								<h3>Preferred Engagement Model</h3>
								<p>Select how you want the talent to be deployed.</p>
							</div>
						</div>

						<div class="engagement-cards-grid">
							<label class="engagement-card">
								<input type="radio" name="engagement_model" value="Permanent Direct Placement" checked>
								<div class="eng-card-inner">
									<span class="eng-icon">🎯</span>
									<strong>Permanent Direct Hire</strong>
									<small>Full-time role &bull; 90-Day replacement guarantee</small>
								</div>
							</label>

							<label class="engagement-card">
								<input type="radio" name="engagement_model" value="Immediate & 30-Day Hiring">
								<div class="eng-card-inner">
									<span class="eng-icon">⚡</span>
									<strong>Immediate &amp; 30-Day</strong>
									<small>Urgent vacancies &bull; Candidates serving notice</small>
								</div>
							</label>

							<label class="engagement-card">
								<input type="radio" name="engagement_model" value="IT Contract Staffing">
								<div class="eng-card-inner">
									<span class="eng-icon">💻</span>
									<strong>IT Contract Staffing</strong>
									<small>On SAM payroll &bull; Scalable tech teams</small>
								</div>
							</label>

							<label class="engagement-card">
								<input type="radio" name="engagement_model" value="Contract-to-Hire (SAM Assured)">
								<div class="eng-card-inner">
									<span class="eng-icon">🔄</span>
									<strong>Contract-to-Hire</strong>
									<small>3–6 month trial before permanent onboard</small>
								</div>
							</label>

							<label class="engagement-card">
								<input type="radio" name="engagement_model" value="Managed Workforce & Payroll">
								<div class="eng-card-inner">
									<span class="eng-icon">💼</span>
									<strong>Managed Workforce / Payroll</strong>
									<small>Turnkey contingent teams &bull; 100% compliance</small>
								</div>
							</label>
						</div>
					</div>

					<!-- STEP 3: Mandate Specifics -->
					<div class="mandate-step-box">
						<div class="mandate-step-head">
							<span class="step-badge">Step 03</span>
							<div>
								<h3>Mandate Specifications</h3>
								<p>Define the exact role, seniority, and timeline parameters.</p>
							</div>
						</div>

						<p>
							<label for="roles">Target Role(s) &amp; Designations <span>*</span></label>
							<textarea id="roles" name="roles" rows="3" required placeholder="e.g. 2 Senior React Developers, 1 Lead DevOps Engineer, 1 Quality Head"><?php echo esc_textarea( $prefill_role ); ?></textarea>
						</p>

						<div class="form-grid">
							<p>
								<label for="domain">Primary Industry / Domain</label>
								<select id="domain" name="domain">
									<option value="">Select Domain Vertical</option>
									<option value="IT, Cloud & SaaS" <?php selected( $prefill_domain, 'tech' ); ?>>IT, Cloud, AI/ML &amp; SaaS</option>
									<option value="Manufacturing & Automotive" <?php selected( $prefill_domain, 'mfg' ); ?>>Manufacturing &amp; Automotive</option>
									<option value="BFSI, FinTech & Banking" <?php selected( $prefill_domain, 'corporate' ); ?>>BFSI, FinTech &amp; Banking</option>
									<option value="Supply Chain, Logistics & E-Commerce">Supply Chain, Logistics &amp; E-Commerce</option>
									<option value="Healthcare & Life Sciences">Healthcare &amp; Life Sciences</option>
									<option value="EPC, Real Estate & Infrastructure">EPC, Infrastructure &amp; Construction</option>
									<option value="Other Industry">Other Domain</option>
								</select>
							</p>

							<p>
								<label for="headcount">Total Positions / Headcount</label>
								<input id="headcount" name="headcount" type="number" min="1" placeholder="e.g. 3">
							</p>
						</div>

						<div class="form-grid">
							<p>
								<label for="timeline">Target Joining Timeline <span>*</span></label>
								<select id="timeline" name="timeline" required>
									<option value="">Select Joining Timeline</option>
									<option value="Immediate (0–7 Days)" selected>⚡ Immediate (0–7 Days) — Critical</option>
									<option value="Within 15 Days">⏱ Fast-Track (Within 15 Days)</option>
									<option value="Within 30 Days">📅 Standard (Within 30 Days)</option>
									<option value="30–60 Days">🔄 30–60 Days (Future Pipeline)</option>
									<option value="Flexible">Flexible Timeline</option>
								</select>
							</p>

							<p>
								<label for="location">Work Location &amp; Model</label>
								<input id="location" name="location" type="text" placeholder="e.g. Noida / Onsite OR Bengaluru / Hybrid">
							</p>
						</div>

						<div class="form-grid">
							<p>
								<label for="experience">Experience Band</label>
								<select id="experience" name="experience">
									<option value="">Select Experience Level</option>
									<option value="Early Lateral (1–3 Years)">Early Lateral (1–3 Years)</option>
									<option value="Mid-Senior (4–7 Years)">Mid-Senior (4–7 Years)</option>
									<option value="Senior / Specialist (8–12 Years)">Senior / Specialist (8–12 Years)</option>
									<option value="Leadership / Executive (12+ Years)">Leadership / Executive (12+ Years)</option>
								</select>
							</p>

							<p>
								<label for="budget">Target CTC / Budget Band (Per Annum)</label>
								<input id="budget" name="budget" type="text" placeholder="e.g. ₹18 – ₹25 LPA or Flexible">
							</p>
						</div>

						<p>
							<label for="message">Key Skills, Deliverables or JD Highlights</label>
							<textarea id="message" name="message" rows="4" placeholder="Paste must-have skills, key projects, notice buyout flexibility, or specific instructions for our search team..."></textarea>
						</p>

					</div>

					<!-- STEP 4: Submit CTA -->
					<div class="mandate-submit-box">
						<button type="submit" class="btn fp-btn-primary btn-block" style="padding:18px 30px; font-size:1.08rem; justify-content:center; width:100%;">
							<?php echo sam_icon('users'); ?> Submit Hiring Mandate &mdash; Get Shortlist in 48h &rarr;
						</button>
						<p class="mandate-disclaimer">
							🛡️ <strong>100% Confidential &amp; Zero Risk:</strong> We never publicly post your company name without explicit approval. No upfront fee &bull; Pay only upon successful candidate onboarding.
						</p>
					</div>

				</form>

			</div>

			<!-- RIGHT COLUMN: SLA Roadmap, Escalation Hotline, Trust Badges -->
			<div class="hire-sidebar-col">

				<!-- Card 1: 48-Hour SLA Journey -->
				<div class="hire-sidebar-card">
					<div class="sidebar-card-badge">⚡ Guaranteed Turnaround</div>
					<h4>What Happens Next</h4>
					<p class="sidebar-sub">Our strict 3-stage delivery SLA ensures your open requisition doesn't sit idle.</p>

					<div class="sla-steps-track">
						<div class="sla-step">
							<div class="sla-step-num">01</div>
							<div class="sla-step-content">
								<strong>Within 2 Hours &bull; Calibration</strong>
								<p>A specialized practice leader calls to review culture, tech stack &amp; compensation parameters.</p>
							</div>
						</div>

						<div class="sla-step">
							<div class="sla-step-num">02</div>
							<div class="sla-step-content">
								<strong>Within 24–48 Hours &bull; Screening</strong>
								<p>We source exclusively from our active 0–30 day talent bench with dual peer-level technical vetting.</p>
							</div>
						</div>

						<div class="sla-step is-final">
							<div class="sla-step-num">03</div>
							<div class="sla-step-content">
								<strong>Within 48–72 Hours &bull; Presentation</strong>
								<p>Receive 3–5 curated, interview-ready candidate profiles on your calendar.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Card 2: Urgent Recruiter Hotline -->
				<div class="hire-sidebar-card hotline-card">
					<div class="sidebar-card-badge" style="background:#FEF3C7; color:#B45309; border-color:#FDE68A;">📞 Priority Hotline</div>
					<h4>Need to Hire Today?</h4>
					<p>Speak directly with an executive recruiter handling active immediate-start candidate pools right now.</p>
					
					<div class="hotline-contact-list">
						<a href="tel:<?php echo esc_attr( str_replace( ' ', '', $phone ) ); ?>" class="hotline-btn hotline-call">
							<?php echo sam_icon('chat'); ?>
							<div>
								<small>Direct Phone Desk</small>
								<strong><?php echo esc_html( $phone ); ?></strong>
							</div>
						</a>

						<a href="https://wa.me/<?php echo esc_attr( preg_replace('/[^0-9]/', '', $phone) ); ?>?text=Hello%20SAM%20Manpower,%20I%20have%20an%20urgent%20hiring%20mandate" target="_blank" rel="noopener noreferrer" class="hotline-btn hotline-wa">
							<span style="font-size:1.4rem;">💬</span>
							<div>
								<small>Instant WhatsApp</small>
								<strong>Chat With Recruiter Lead</strong>
							</div>
						</a>

						<a href="mailto:<?php echo esc_attr( $email ); ?>?subject=Urgent%20Hiring%20Mandate" class="hotline-btn hotline-email">
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
							<div><strong>90-Day Free Replacement:</strong> If a candidate leaves or fails evaluation, we backfill on top priority at zero fee.</div>
						</li>
						<li>
							<span>✓</span>
							<div><strong>Verified Resignation Letters:</strong> We eliminate counter-offer dropouts by confirming official separation documents.</div>
						</li>
						<li>
							<span>✓</span>
							<div><strong>Zero Upfront Commitment:</strong> Pay solely upon successful onboarding of your chosen hire.</div>
						</li>
						<li>
							<span>✓</span>
							<div><strong>ISO 9001:2015 Certified:</strong> Standardized quality workflows ensure enterprise compliance.</div>
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
				<h4>How can SAM deliver shortlists within 48 to 72 hours?</h4>
				<p>Unlike conventional agencies that begin searching external job portals only after you post a requisition, we maintain dedicated, pre-vetted talent pipelines of candidates who are actively serving notice periods (15–30 days) or available immediately across Tier-1 IT, manufacturing, and BFSI domains.</p>
			</div>

			<div class="faq-item-card">
				<h4>What is your fee structure and payment terms?</h4>
				<p>For permanent placements, we work on a pure contingency model with zero upfront retainer fees. You are invoiced only after the candidate successfully joins your organization, typically with 30-day payment terms. Contract and C2H models are billed on approved monthly timesheets.</p>
			</div>

			<div class="faq-item-card">
				<h4>How does the 90-day replacement guarantee work?</h4>
				<p>If any placed candidate resigns or does not meet agreed performance benchmarks within 90 days of joining, our search team initiates a priority replacement sprint at absolutely zero additional fee.</p>
			</div>

			<div class="faq-item-card">
				<h4>Can you help manage notice period buyouts?</h4>
				<p>Yes. Many high-demand candidates have 60 to 90-day contractual notice periods but are eligible for official company buyouts. We help calculate buyout dues, verify employer policies, and structure buyout bonuses to bring candidate start dates down to 10–15 days.</p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
