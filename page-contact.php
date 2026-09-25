<?php
/**
 * Template Name: Contact Page
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$status  = isset( $_GET['form_status'] ) ? sanitize_key( wp_unslash( $_GET['form_status'] ) ) : '';
$phone   = get_theme_mod( 'sam_phone', '' );
$email   = function_exists( 'sam_get_company_email' ) ? sam_get_company_email() : 'sales@samcareer.com';
$address = get_theme_mod( 'sam_address', 'A1109, Tower T3, NX One, Greater Noida West, Uttar Pradesh' );
?>

<section class="page-hero page-hero-simple">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon( 'chat' ); ?> Get in Touch</span>
		<h1>Let's Connect &amp; Accelerate Your Hiring</h1>
		<p>Whether you have an urgent hiring mandate, require payroll outsourcing, or are exploring high-growth career moves, our specialist recruiters are here to assist.</p>
	</div>
</section>

<section class="section">
	<div class="container">

		<!-- CONTACT INFO CARDS -->
		<div class="contact-info-cards">
			<div class="focus-card contact-card">
				<div class="icon-badge"><?php echo sam_icon( 'bell' ); ?></div>
				<h4>Email Our Desk</h4>
				<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
				<small style="color:var(--text-muted); display:block; margin-top:4px;">Guaranteed reply within 4 hours</small>
			</div>
			<div class="focus-card contact-card">
				<div class="icon-badge"><?php echo sam_icon( 'target' ); ?></div>
				<h4>Corporate Headquarters</h4>
				<p><?php echo esc_html( $address ); ?></p>
				<small style="color:var(--text-muted); display:block; margin-top:4px;">Greater Noida West, Uttar Pradesh</small>
			</div>
			<div class="focus-card contact-card">
				<div class="icon-badge"><?php echo sam_icon( 'clock' ); ?></div>
				<h4>Operating Hours</h4>
				<p>Monday &ndash; Saturday</p>
				<small style="color:var(--text-muted); display:block; margin-top:4px;">9:30 AM &ndash; 7:00 PM IST</small>
			</div>
		</div>

		<!-- MAIN TWO-COLUMN: FORM + DIRECT DIRECTORY -->
		<div class="contact-layout-split" style="margin-top:40px;">

			<!-- FORM COLUMN -->
			<div class="contact-form-col">

				<?php if ( 'success' === $status ) : ?>
					<div class="form-notice form-notice-success" role="status">
						<?php echo sam_icon( 'check' ); ?>
						Thank you! Your message has been received. A senior recruitment consultant will respond to you within 2 to 4 business hours.
					</div>
				<?php elseif ( 'error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert">
						Please complete all required fields with a valid email address and phone number.
					</div>
				<?php elseif ( 'mail-error' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert">
						We could not dispatch your email message at this moment. Please call us directly or retry shortly.
					</div>
				<?php elseif ( 'invalid' === $status ) : ?>
					<div class="form-notice form-notice-error" role="alert">
						Your session timed out. Please refresh and submit the form again.
					</div>
				<?php endif; ?>

				<form class="candidate-form hiring-form contact-form-styled" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
					<input type="hidden" name="action" value="sam_submit_contact_message">
					<?php wp_nonce_field( 'sam_submit_contact_message', 'sam_contact_nonce' ); ?>
					
					<div class="form-honeypot" aria-hidden="true">
						<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
					</div>

					<div class="form-section-header">
						<h3>Send Us an Inquiry</h3>
						<p>Fill in your details and requirement overview below.</p>
					</div>

					<div class="form-grid">
						<p>
							<label for="contact_name">Your Full Name <span>*</span></label>
							<input id="contact_name" name="contact_name" type="text" required placeholder="e.g. Vikram Malhotra">
						</p>
						<p>
							<label for="contact_email">Business Email <span>*</span></label>
							<input id="contact_email" name="contact_email" type="email" required placeholder="e.g. vikram@company.com">
						</p>
						<p>
							<label for="contact_phone">Direct Phone Number <span>*</span></label>
							<input id="contact_phone" name="contact_phone" type="tel" required placeholder="e.g. +91 98765 43210">
						</p>
						<p>
							<label for="contact_subject">Inquiry Type <span>*</span></label>
							<select id="contact_subject" name="contact_subject" required>
								<option value="">Select an Inquiry Type</option>
								<option value="Hiring Talent Requirement (Employer)">Hiring Talent Requirement (Employer)</option>
								<option value="Contract Staffing / C2H">Contract Staffing / Contract-to-Hire</option>
								<option value="Managed Workforce / Off-Roll Staffing">Managed Workforce / Off-Roll Staffing</option>
								<option value="Payroll Support & Compliance">Payroll Support &amp; Compliance</option>
								<option value="Candidate Job Application">Candidate Job Application</option>
								<option value="Strategic Partnership / Vendor Empanelment">Vendor Empanelment / Partnership</option>
								<option value="Other">Other</option>
							</select>
						</p>
					</div>

					<p>
						<label for="contact_message">How Can We Help You? <span>*</span></label>
						<textarea id="contact_message" name="contact_message" rows="4" required placeholder="Provide role details, required joining timeline, headcount, or specific questions..."></textarea>
					</p>

					<button type="submit" class="btn btn-primary btn-block">
						<?php echo sam_icon( 'chat' ); ?> Send Message to SAM Team
					</button>
				</form>
			</div>

			<!-- SIDEBAR / REGIONAL DIRECTORY COLUMN -->
			<div class="contact-sidebar-col">
				
				<!-- Quick Action Box -->
				<div class="contact-sidebar-card">
					<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('users'); ?> For Employers</span>
					<h4>Need Urgent Candidates?</h4>
					<p>If you have an open vacancy that needs to be filled within 0 to 30 days, bypass the general inquiry and drop your detailed job spec directly.</p>
					<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary btn-sm" style="margin-top:10px;"><?php echo sam_icon('upload'); ?> Drop Hiring Mandate</a>
				</div>

				<!-- Candidate Box -->
				<div class="contact-sidebar-card" style="margin-top:20px;">
					<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('briefcase'); ?> For Job Seekers</span>
					<h4>Looking For Your Next Role?</h4>
					<p>Upload your resume directly into our active candidate pool for confidential evaluation by our industry placement heads.</p>
					<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>" class="btn btn-secondary btn-sm" style="margin-top:10px;"><?php echo sam_icon('upload'); ?> Upload Resume</a>
				</div>

				<!-- Regional Contact Directory -->
				<div class="contact-directory-box" style="margin-top:20px;">
					<h4>Regional Desks</h4>
					<ul class="regional-desk-list">
						<li>
							<strong>Delhi NCR Corporate Office</strong>
							<span>A1109, Tower T3, NX One, Greater Noida West, UP</span>
						</li>
						<li>
							<strong>Bengaluru Tech Practice</strong>
							<span>Koramangala 4th Block, Bengaluru, Karnataka</span>
						</li>
						<li>
							<strong>Mumbai BFSI Practice</strong>
							<span>Bandra Kurla Complex (BKC), Mumbai, MH</span>
						</li>
						<li>
							<strong>Pune Manufacturing Desk</strong>
							<span>MIDC Chakan Industrial Area, Pune, MH</span>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS -->
<section class="section bg-soft">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('target'); ?> Quick Answers</span>
			<h2>Frequently Asked Questions</h2>
			<p>Common questions from employers and job seekers looking to engage with SAM Manpower.</p>
		</div>

		<div class="faq-grid" style="max-width:860px; margin:0 auto; display:grid; gap:16px;">
			<div class="faq-item" style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:20px;">
				<h3 style="font-size:1.05rem; margin-bottom:8px; color:var(--text-dark); font-weight:600;">How quickly can you share the first candidate shortlist?</h3>
				<p style="color:var(--text-muted); margin:0; line-height:1.6;">For standard lateral roles in Tech, Finance, Sales, and Plant Operations, our average turnaround from requirement briefing to the first curated shortlist of 3–5 evaluated candidates is 48 to 72 hours.</p>
			</div>
			<div class="faq-item" style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:20px;">
				<h3 style="font-size:1.05rem; margin-bottom:8px; color:var(--text-dark); font-weight:600;">What is SAM's replacement guarantee policy?</h3>
				<p style="color:var(--text-muted); margin:0; line-height:1.6;">Every permanent direct placement comes backed by a comprehensive 90-day replacement guarantee. If a candidate departs or is found mismatched during this window, we provide a priority backfill at zero extra cost.</p>
			</div>
			<div class="faq-item" style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:20px;">
				<h3 style="font-size:1.05rem; margin-bottom:8px; color:var(--text-dark); font-weight:600;">Do job seekers pay any registration or placement fees?</h3>
				<p style="color:var(--text-muted); margin:0; line-height:1.6;">Never. All career placement, interview scheduling, and resume review services provided by SAM Manpower are 100% free of charge for candidates. We are compensated solely by our client employers.</p>
			</div>
			<div class="faq-item" style="background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:20px;">
				<h3 style="font-size:1.05rem; margin-bottom:8px; color:var(--text-dark); font-weight:600;">How do you verify candidate notice periods to prevent dropouts?</h3>
				<p style="color:var(--text-muted); margin:0; line-height:1.6;">We request official resignation acceptance letters or buyout eligibility documentation, perform direct salary slip checks, and conduct scheduled weekly alignment check-ins to monitor counter-offer developments in real time.</p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
