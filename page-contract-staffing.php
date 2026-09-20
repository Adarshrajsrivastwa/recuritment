<?php
/**
 * Template Name: Contract Staffing
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('laptop'); ?> Contract Staffing</span>
		<h1>On-Demand Technical &amp; General Contract Talent — Deployed Fast.</h1>
		<p>Scale your teams for project milestones, seasonal surges, or long-term augmentation without the overhead of permanent headcount. SAM provides pre-vetted contract professionals across IT and operations who can start within days.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Request Contract Staff</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-outline-light"><?php echo sam_icon('chat'); ?> Talk to an Expert</a>
		</div>
	</div>
</section>

<section class="stats-strip">
	<div class="container stats-grid">
		<div class="stat-item"><span class="stat-num">IT</span><span class="stat-label">Tech & General Contracts</span></div>
		<div class="stat-item"><span class="stat-num">3–30</span><span class="stat-label">Day Deployment Window</span></div>
		<div class="stat-item"><span class="stat-num">PAN</span><span class="stat-label">India Coverage</span></div>
		<div class="stat-item"><span class="stat-num">100%</span><span class="stat-label">Compliant Employment</span></div>
	</div>
</section>

<!-- Engagement models -->
<section class="section focus-section">
	<div class="container">
		<div class="section-head">
			<h2>Contract Engagement Models</h2>
			<p>Choose the model that fits your project timeline and budget structure.</p>
		</div>
		<div class="grid-3 focus-grid">
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('calendar'); ?></div>
				<h3>Fixed-Duration Project Contracts</h3>
				<p>Defined start and end dates for project-based work. Ideal for product launches, system migrations, or seasonal capacity spikes. SAM handles employment paperwork and compliance throughout.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('users'); ?></div>
				<h3>Long-Term Staff Augmentation</h3>
				<p>Embed contract professionals directly into your team for extended periods — 6 months to 2 years. Full integration with your workflows, tools, and culture, without permanent headcount liability.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('briefcase'); ?></div>
				<h3>Surge & Volume Contracts</h3>
				<p>Rapidly stand up entire teams for warehouse operations, support floors, or manufacturing lines during peak demand. Purpose-built sourcing sprints deliver 10–100 contractors in tight windows.</p>
			</div>
		</div>
	</div>
</section>

<!-- IT roles -->
<section class="section why-section">
	<div class="container">
		<div class="section-head section-head-left">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('laptop'); ?> IT Contract Staffing</span>
			<h2>Technology Roles We Deploy on Contract</h2>
		</div>
		<div class="grid-4 why-grid">
			<?php
			$it_roles = array(
				array( 'icon' => 'laptop', 'title' => 'Full-Stack Development', 'desc' => 'React, Angular, Vue, Node.js, Java, Python, .NET, PHP.' ),
				array( 'icon' => 'shield', 'title' => 'Cloud & DevOps', 'desc' => 'AWS, Azure, GCP, Kubernetes, Docker, Terraform, CI/CD pipelines.' ),
				array( 'icon' => 'check', 'title' => 'QA & Testing', 'desc' => 'Manual, automation (Selenium, Cypress), performance, and security testing.' ),
				array( 'icon' => 'target', 'title' => 'Data & Analytics', 'desc' => 'Data engineers, ML engineers, Power BI/Tableau analysts, SQL experts.' ),
			);
			foreach ( $it_roles as $r ) : ?>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon( $r['icon'] ); ?></div>
				<h3><?php echo esc_html( $r['title'] ); ?></h3>
				<p><?php echo esc_html( $r['desc'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- What SAM handles -->
<section class="section journey-section">
	<div class="container">
		<div class="section-head">
			<h2>What SAM Manages on Your Behalf</h2>
			<p>You focus on project delivery. We handle everything in between.</p>
		</div>
		<div class="journey-track">
			<?php
			$steps = array(
				array( 'icon' => 'chat',     'label' => 'Requirement', 'desc' => 'Scope, duration, skill specs' ),
				array( 'icon' => 'search',   'label' => 'Sourcing',    'desc' => 'Active database + network' ),
				array( 'icon' => 'shield',   'label' => 'Vetting',     'desc' => 'Technical + availability screen' ),
				array( 'icon' => 'check',    'label' => 'Deployment',  'desc' => 'Onboarding & site induction' ),
				array( 'icon' => 'wallet',   'label' => 'Payroll',     'desc' => 'Salary + statutory compliance' ),
				array( 'icon' => 'download', 'label' => 'Offboarding', 'desc' => 'Exit, F&F, documentation' ),
			);
			foreach ( $steps as $i => $st ) : $is_last = ( $i === count( $steps ) - 1 ); ?>
			<div class="journey-step <?php echo $is_last ? 'is-active' : ''; ?>">
				<div class="journey-icon"><?php echo sam_icon( $st['icon'] ); ?></div>
				<span class="journey-step-num">Step 0<?php echo esc_html( $i + 1 ); ?></span>
				<strong><?php echo esc_html( $st['label'] ); ?></strong>
				<p><?php echo esc_html( $st['desc'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Contract Governance & Zero-Liability Framework -->
<section class="section" style="background:#F8FAFC; border-top:1px solid #E2E8F0; border-bottom:1px solid #E2E8F0;">
	<div class="container">
		<div class="section-head text-center">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('shield'); ?> Enterprise Risk Shield</span>
			<h2>Zero Co-Employment Risk &amp; Ironclad IP Protection</h2>
			<p>SAM absorbs all statutory employer obligations so your enterprise operates with 100% compliance peace of mind.</p>
		</div>
		<div class="grid-3" style="margin-top:32px; gap:24px;">
			<div style="background:#fff; border-radius:16px; padding:28px; border:1px solid #E2E8F0; box-shadow:0 4px 14px rgba(0,0,0,0.03);">
				<div style="width:46px; height:46px; border-radius:12px; background:#EFF6FF; color:#2563EB; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
					<?php echo sam_icon('shield'); ?>
				</div>
				<h3 style="font-size:1.15rem; margin-bottom:8px; color:#0F172A;">No Co-Employment Liability</h3>
				<p style="font-size:0.9rem; color:#64748B; line-height:1.55;">Contract professionals remain on SAM's legal payroll. We manage PF, ESIC, Gratuity, Workmen Compensation, and all state labour board audits.</p>
			</div>

			<div style="background:#fff; border-radius:16px; padding:28px; border:1px solid #E2E8F0; box-shadow:0 4px 14px rgba(0,0,0,0.03);">
				<div style="width:46px; height:46px; border-radius:12px; background:#ECFDF5; color:#059669; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
					<?php echo sam_icon('check'); ?>
				</div>
				<h3 style="font-size:1.15rem; margin-bottom:8px; color:#0F172A;">Complete NDA &amp; IP Assignment</h3>
				<p style="font-size:0.9rem; color:#64748B; line-height:1.55;">Every contractor signs bilateral NDAs and comprehensive Intellectual Property assignment clauses ensuring all codebase and work belong to your company.</p>
			</div>

			<div style="background:#fff; border-radius:16px; padding:28px; border:1px solid #E2E8F0; box-shadow:0 4px 14px rgba(0,0,0,0.03);">
				<div style="width:46px; height:46px; border-radius:12px; background:#FEF3C7; color:#D97706; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
					<?php echo sam_icon('refresh'); ?>
				</div>
				<h3 style="font-size:1.15rem; margin-bottom:8px; color:#0F172A;">Seamless Permanent Conversion</h3>
				<p style="font-size:0.9rem; color:#64748B; line-height:1.55;">Love a contractor's performance? Convert them seamlessly to your permanent payroll after 3 or 6 months with pre-agreed nominal transfer terms.</p>
			</div>
		</div>
	</div>
</section>

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Need contract staff in the next 30 days?</h2>
		<p>Tell us the role and duration. We'll respond with vetted profiles within 48–72 hours.</p>
		<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Request Contract Staff</a>
	</div>
</section>

<?php get_footer(); ?>
