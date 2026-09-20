<?php
/**
 * Template Name: Industries We Serve
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('target'); ?> Industries We Serve</span>
		<h1>Domain-Expert Recruiters Across Every Major Indian Industry.</h1>
		<p>Our dedicated vertical recruiters bring deep knowledge of hiring benchmarks, salary bandwidths, and candidate expectations across six core sectors. We don't generalise — we specialise.</p>
	</div>
</section>

<section class="stats-strip">
	<div class="container stats-grid">
		<div class="stat-item"><span class="stat-num">6+</span><span class="stat-label">Industry Verticals</span></div>
		<div class="stat-item"><span class="stat-num">9+</span><span class="stat-label">Years Domain Experience</span></div>
		<div class="stat-item"><span class="stat-num">PAN</span><span class="stat-label">India Candidate Network</span></div>
		<div class="stat-item"><span class="stat-num">500+</span><span class="stat-label">Companies Served</span></div>
	</div>
</section>

<!-- Industry cards -->
<section class="section">
	<div class="container">
		<div class="section-head">
			<h2>Cross-Industry Recruitment Coverage</h2>
			<p>Click on any industry to see the specific roles and capabilities we support within that vertical.</p>
		</div>
		<div class="grid-3 focus-grid ind-grid">
			<?php
			$industries = array(
				array(
					'icon'  => 'laptop',
					'title' => 'Tech & IT Services',
					'tat'   => '15–25 Days',
					'pool'  => '42,000+ Engineers',
					'sla'   => '48h First Profiles',
					'roles' => array(
						'Full-Stack & Backend Developers (Java, Python, .NET, Node.js)',
						'Frontend Engineers (React, Angular, Vue)',
						'Cloud & DevOps (AWS, Azure, GCP, Kubernetes)',
						'QA Automation (Selenium, Cypress, Appium)',
						'Data & ML Engineers, Power BI Analysts',
						'Product Managers & Scrum Masters',
						'Cybersecurity & InfoSec Specialists',
						'IT Infrastructure & Network Admins',
					),
					'color' => '#1e40af',
					'bg'    => '#dbeafe',
				),
				array(
					'icon'  => 'wallet',
					'title' => 'Banking, Financial Services & Insurance (BFSI)',
					'tat'   => '14–21 Days',
					'pool'  => '28,000+ Specialists',
					'sla'   => '48h First Profiles',
					'roles' => array(
						'Credit Underwriters & Risk Analysts',
						'Wealth Managers & Relationship Managers',
						'Corporate & Retail Banking Sales',
						'Regulatory Compliance Officers',
						'Insurance Underwriters & Actuaries',
						'Treasury & Capital Markets Professionals',
						'Loan Processing & Collections Teams',
						'NBFC & Microfinance Specialists',
					),
					'color' => '#15803d',
					'bg'    => '#dcfce7',
				),
				array(
					'icon'  => 'target',
					'title' => 'Industrial & Manufacturing',
					'tat'   => '10–20 Days',
					'pool'  => '34,000+ Certified Leads',
					'sla'   => '72h Plant Shortlists',
					'roles' => array(
						'Plant & Production Managers',
						'QA/QC Engineers & Inspectors',
						'Maintenance & Reliability Engineers',
						'Supply Chain & Procurement Officers',
						'EHS (Environment, Health & Safety) Managers',
						'Production Supervisors & Shift Leads',
						'Industrial Automation & PLC Technicians',
						'Design & R&D Engineers',
					),
					'color' => '#b45309',
					'bg'    => '#fef3c7',
				),
				array(
					'icon'  => 'star',
					'title' => 'E-Commerce & Modern Retail',
					'tat'   => '7–15 Days',
					'pool'  => '25,000+ Candidates',
					'sla'   => '24-48h Sprints',
					'roles' => array(
						'Category & Merchandising Managers',
						'Last-Mile Logistics & Delivery Leads',
						'Warehouse & Fulfilment Centre Managers',
						'Growth Marketing & Performance Managers',
						'Customer Experience & Support Leads',
						'Inventory & Demand Planning Analysts',
						'E-Commerce Operations Managers',
						'Visual Merchandisers & Store Managers',
					),
					'color' => '#7c3aed',
					'bg'    => '#ede9fe',
				),
				array(
					'icon'  => 'users',
					'title' => 'Commercial Sales & Business Growth',
					'tat'   => '10–18 Days',
					'pool'  => '50,000+ Sales Execs',
					'sla'   => '48h First Profiles',
					'roles' => array(
						'Enterprise & B2B Account Executives',
						'Channel Development & Partnership Managers',
						'Inside Sales & SDR Teams (Volume Hiring)',
						'Business Development Managers',
						'Key Account & Strategic Alliance Managers',
						'Sales Trainers & Enablement Specialists',
						'Pre-Sales & Solutions Consultants',
						'Revenue Operations Analysts',
					),
					'color' => '#0369a1',
					'bg'    => '#e0f2fe',
				),
				array(
					'icon'  => 'briefcase',
					'title' => 'Operations & Shared Services',
					'tat'   => '7–14 Days',
					'pool'  => '38,000+ Verified Staff',
					'sla'   => '48h Delivery',
					'roles' => array(
						'Operations & Process Excellence Leads',
						'Customer Support & Service Desk Teams',
						'HR Generalists & Talent Acquisition Managers',
						'Process Trainers & L&D Specialists',
						'Admin & Facility Management Teams',
						'Legal & Compliance Executives',
						'Executive Assistants & Office Managers',
						'Finance & Accounts Back-Office Teams',
					),
					'color' => '#be123c',
					'bg'    => '#fce7f3',
				),
			);
			foreach ( $industries as $ind ) :
			?>
			<div class="focus-card ind-card" style="display:flex; flex-direction:column; justify-content:space-between; border:1px solid #E2E8F0; border-radius:16px; padding:28px; background:#fff; box-shadow:0 6px 20px rgba(0,0,0,0.03); transition:transform .2s ease, box-shadow .2s ease;">
				<div>
					<div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:16px;">
						<div class="icon-badge ind-icon-badge" style="background:<?php echo esc_attr( $ind['bg'] ); ?>; color:<?php echo esc_attr( $ind['color'] ); ?>;">
							<?php echo sam_icon( $ind['icon'] ); ?>
						</div>
						<span style="font-size:0.75rem; font-weight:700; color:#16A34A; background:#DCFCE7; padding:4px 10px; border-radius:20px;">
							⚡ <?php echo esc_html( $ind['tat'] ); ?>
						</span>
					</div>
					<h3 style="font-size:1.25rem; font-weight:700; margin-bottom:12px; color:#0F172A;"><?php echo esc_html( $ind['title'] ); ?></h3>
					
					<div style="display:flex; gap:10px; margin-bottom:14px; flex-wrap:wrap;">
						<span style="font-size:0.75rem; background:#F1F5F9; color:#475569; padding:3px 8px; border-radius:6px; font-weight:600;">👥 <?php echo esc_html( $ind['pool'] ); ?></span>
						<span style="font-size:0.75rem; background:#EFF6FF; color:#1D4ED8; padding:3px 8px; border-radius:6px; font-weight:600;">⏱️ <?php echo esc_html( $ind['sla'] ); ?></span>
					</div>

					<ul class="ind-roles-list">
						<?php foreach ( $ind['roles'] as $role ) : ?>
						<li><?php echo sam_icon('check'); ?><?php echo esc_html( $role ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary" style="margin-top:20px; text-align:center; justify-content:center; width:100%; font-size:0.88rem;">Hire in <?php echo esc_html( $ind['title'] ); ?> <?php echo sam_icon('arrow'); ?></a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Why domain expertise matters -->
<section class="section why-section">
	<div class="container">
		<div class="section-head">
			<h2>Why Domain Expertise Changes Hiring Outcomes</h2>
			<p>Generalist recruiters get you candidates. Domain-expert recruiters get you the right candidates.</p>
		</div>
		<div class="grid-4 why-grid">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('target'); ?></div>
				<h3>Accurate JD Interpretation</h3>
				<p>We know the difference between a DevOps Engineer and an SRE, or a Risk Analyst and a Credit Controller — no wrong-skill profiles wasted on your desk.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('wallet'); ?></div>
				<h3>Calibrated Salary Benchmarks</h3>
				<p>We know the market rates for every role in every city. Your offers land at the right number — not too low to attract talent, not too high to erode margins.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('users'); ?></div>
				<h3>Active Niche Pipelines</h3>
				<p>Years of domain focus means we have pre-built pipelines of passive candidates in each vertical who aren't on any job board.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h3>Industry-Specific Screening</h3>
				<p>Our vetting questions are tailored to each vertical's real job demands — not generic interview templates applied across every industry.</p>
			</div>
		</div>
	</div>
</section>

<style>
.ind-roles-list{
	display:flex; flex-direction:column; gap:7px; margin-top:14px; padding:0; list-style:none;
}
.ind-roles-list li{
	display:flex; align-items:flex-start; gap:7px; font-size:.83rem; color:var(--text-muted); line-height:1.45;
}
.ind-roles-list li svg{ width:13px; height:13px; color:var(--blue); flex-shrink:0; margin-top:2px; }
.ind-icon-badge{ width:52px; height:52px; border-radius:14px; }
</style>

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Don't see your industry listed?</h2>
		<p>We recruit across all sectors. Tell us your requirement and our team will confirm coverage within the hour.</p>
		<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Submit a Hiring Requirement</a>
	</div>
</section>

<?php get_footer(); ?>
