<?php
/**
 * Template Name: Permanent Hiring & Direct Placement
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('users'); ?> Permanent Hiring &amp; Direct Placement</span>
		<h1>Zero-Compromise Permanent Talent. Delivered in 0–30 Days.</h1>
		<p>Cut out the agonizing 90-day waiting periods and offer dropout anxiety. SAM Manpower matches your business with pre-evaluated, top-tier permanent professionals ready to build long-term value from day one.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Submit Your Hiring Mandate</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-secondary">Speak to an Industry Specialist</a>
		</div>
		<div class="hero-stats-row">
			<div class="hero-stat-pill"><strong>48–72h</strong> Curated First Shortlist</div>
			<div class="hero-stat-pill"><strong>90-Day</strong> Free Replacement Guarantee</div>
			<div class="hero-stat-pill"><strong>98%</strong> 1-Year Candidate Retention</div>
			<div class="hero-stat-pill"><strong>PAN-India</strong> Executive &amp; Lateral Reach</div>
		</div>
	</div>
</section>

<!-- PILLARS SECTION -->
<section class="section">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('check'); ?> Why Permanent Hiring With SAM</span>
			<h2>Engineered for Long-Term Fit, Built for Speed</h2>
			<p>Traditional recruiters throw resumes at the wall. We operate as your dedicated talent partner with rigorous domain vetting and guaranteed timelines.</p>
		</div>

		<div class="grid-4">
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('target'); ?></div>
				<h4>Deep Competency Alignment</h4>
				<p>We dissect your technical stack, cultural fabric, and performance milestones before reaching out to candidates. Zero resume dumping.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h4>Active-Serving Notice Pool</h4>
				<p>Exclusive access to candidates currently serving their notice period (15–30 days) or ready for immediate rollout with buyout support.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h4>Dual-Layer Technical Vetting</h4>
				<p>Every candidate undergoes peer-level screening on architecture, domain aptitude, past deliverables, and workplace temperament.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('check'); ?></div>
				<h4>90-Day Replacement Shield</h4>
				<p>If a placed permanent hire leaves or proves incompatible within 90 days, we source a qualified replacement on top priority at zero cost.</p>
			</div>
		</div>
	</div>
</section>

<!-- COMPARISON MATRIX: TRADITIONAL VS SAM -->
<section class="section bg-soft">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('trophy'); ?> Measurable Difference</span>
			<h2>How SAM Outperforms Standard Recruitment Firms</h2>
			<p>A side-by-side comparison of what working with SAM Manpower means for your talent acquisition metrics.</p>
		</div>

		<div class="comparison-table-wrapper">
			<table class="comparison-table">
				<thead>
					<tr>
						<th>Hiring Dimension</th>
						<th>Conventional Agency</th>
						<th class="table-highlight">SAM Manpower &amp; Services</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Time-to-First-Shortlist</strong></td>
						<td>10–14 business days</td>
						<td class="table-highlight"><span class="table-badge badge-green">48–72 Hours</span></td>
					</tr>
					<tr>
						<td><strong>Candidate Joining Window</strong></td>
						<td>60–90 days (standard notice)</td>
						<td class="table-highlight"><span class="table-badge badge-green">0–30 Days (Fast-Track)</span></td>
					</tr>
					<tr>
						<td><strong>Offer Dropout Rate</strong></td>
						<td>35%–45% counter-offer dropouts</td>
						<td class="table-highlight"><span class="table-badge badge-green">&lt; 5% Dropouts</span></td>
					</tr>
					<tr>
						<td><strong>Screening Depth</strong></td>
						<td>Keyword match on resume search</td>
						<td class="table-highlight"><span class="table-badge badge-green">Dual-Layer Domain &amp; Culture Vetting</span></td>
					</tr>
					<tr>
						<td><strong>Replacement Assurance</strong></td>
						<td>30–60 days with caveats</td>
						<td class="table-highlight"><span class="table-badge badge-green">Comprehensive 90-Day Guarantee</span></td>
					</tr>
					<tr>
						<td><strong>Dedicated Recruiter</strong></td>
						<td>Generic account manager</td>
						<td class="table-highlight"><span class="table-badge badge-green">Domain-Specialized Recruiter Lead</span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>

<!-- ROLES WE PLACE -->
<section class="section">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('briefcase'); ?> Practice Disciplines</span>
			<h2>Permanent Roles We Source Across India</h2>
			<p>From individual contributors to VP and Director-level appointments.</p>
		</div>

		<div class="grid-3">
			<div class="domain-card">
				<div class="domain-card-icon"><?php echo sam_icon('laptop'); ?></div>
				<h3>Technology &amp; Engineering</h3>
				<ul class="domain-roles-list">
					<li>Full Stack, Backend &amp; Frontend Leads</li>
					<li>DevOps, Cloud Architects &amp; SREs</li>
					<li>Data Engineers, AI/ML &amp; BI Analysts</li>
					<li>Engineering Managers, VP &amp; CTO</li>
					<li>Cybersecurity &amp; SOC Specialists</li>
				</ul>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>?domain=tech" class="text-link">Hire Tech Permanent <?php echo sam_icon('arrow'); ?></a>
			</div>

			<div class="domain-card">
				<div class="domain-card-icon"><?php echo sam_icon('shield'); ?></div>
				<h3>Manufacturing &amp; Plant Ops</h3>
				<ul class="domain-roles-list">
					<li>Plant Heads, General Managers &amp; VP Ops</li>
					<li>Quality Heads (IATF 16949 / Six Sigma)</li>
					<li>Tool Room &amp; Production Supervisors</li>
					<li>Maintenance, Electrical &amp; PLC Leads</li>
					<li>EHS &amp; Industrial Safety Managers</li>
				</ul>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>?domain=mfg" class="text-link">Hire Plant Talent <?php echo sam_icon('arrow'); ?></a>
			</div>

			<div class="domain-card">
				<div class="domain-card-icon"><?php echo sam_icon('wallet'); ?></div>
				<h3>Corporate Finance &amp; Leadership</h3>
				<ul class="domain-roles-list">
					<li>CFO, Financial Controllers &amp; VP Finance</li>
					<li>Direct / Indirect Tax &amp; GST Specialists</li>
					<li>FP&amp;A Leads &amp; Internal Audit Managers</li>
					<li>Enterprise Sales Directors &amp; BD Heads</li>
					<li>CHRO, HR Head &amp; Talent Acquisition Leads</li>
				</ul>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>?domain=corporate" class="text-link">Hire Leadership Talent <?php echo sam_icon('arrow'); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- 5-STEP PERMANENT HIRING JOURNEY -->
<section class="section journey-section">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('target'); ?> Workflow</span>
			<h2>Our 5-Stage Direct Placement Process</h2>
			<p>A rigorous, transparent journey designed to eliminate wasted interview rounds.</p>
		</div>

		<div class="journey-track">
			<div class="journey-step">
				<div class="journey-icon"><?php echo sam_icon('chat'); ?></div>
				<span class="journey-step-num">Stage 01</span>
				<strong>Mandate Calibration</strong>
				<p>In-depth requirement briefing with hiring managers on technical &amp; culture traits.</p>
			</div>
			<div class="journey-step">
				<div class="journey-icon"><?php echo sam_icon('search'); ?></div>
				<span class="journey-step-num">Stage 02</span>
				<strong>Precision Sourcing</strong>
				<p>Direct headhunting from our 0–30 day talent network and competitor mapping.</p>
			</div>
			<div class="journey-step">
				<div class="journey-icon"><?php echo sam_icon('shield'); ?></div>
				<span class="journey-step-num">Stage 03</span>
				<strong>Rigorous Screening</strong>
				<p>Domain assessment, compensation verification, and joining intent validation.</p>
			</div>
			<div class="journey-step">
				<div class="journey-icon"><?php echo sam_icon('check'); ?></div>
				<span class="journey-step-num">Stage 04</span>
				<strong>Curated Shortlist</strong>
				<p>3 to 5 high-fit candidates presented within 48 to 72 hours for client interviews.</p>
			</div>
			<div class="journey-step is-active">
				<div class="journey-icon"><?php echo sam_icon('download'); ?></div>
				<span class="journey-step-num">Stage 05</span>
				<strong>Offer &amp; Onboarding</strong>
				<p>Notice buyout support, counter-offer defense, and 90-day post-joining tracking.</p>
			</div>
		</div>
	</div>
</section>

<!-- SAM ASSURED PROMO -->
<section class="section bg-soft">
	<div class="container assured-inner">
		<div class="assured-copy">
			<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('shield'); ?> Zero Hiring Risk</span>
			<h2>Want to Evaluate on the Job First? Try SAM Assured</h2>
			<p>Not ready to commit immediately to a full-time hire? With our Contract-to-Hire model (SAM Assured), evaluate candidate performance live on your projects for 3 to 6 months before making a permanent offer.</p>
			<div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:20px;">
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>" class="btn btn-primary">Learn About SAM Assured</a>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'contract-to-hire' ) ); ?>" class="btn btn-secondary">Contract-to-Hire Details</a>
			</div>
		</div>
		<div class="assured-steps">
			<div class="assured-step"><?php echo sam_icon('check'); ?><span>01. Sourced<br><small>Curated for permanent</small></span></div>
			<div class="assured-step"><?php echo sam_icon('clock'); ?><span>02. Trial Period<br><small>3–6 months contract</small></span></div>
			<div class="assured-step"><?php echo sam_icon('star'); ?><span>03. Evaluate<br><small>Real output review</small></span></div>
			<div class="assured-step is-active"><?php echo sam_icon('download'); ?><span>04. Convert<br><small>Zero-friction rollout</small></span></div>
		</div>
	</div>
</section>

<!-- CTA BAND -->
<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Have an urgent permanent mandate to close?</h2>
		<p>Share your job description and receive pre-screened candidate profiles within 48 hours.</p>
		<div class="hero-actions" style="justify-content:center;">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Submit Your Requirement</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-secondary">Speak With a Lead Recruiter</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
