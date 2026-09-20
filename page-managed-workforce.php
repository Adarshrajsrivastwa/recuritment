<?php
/**
 * Template Name: Managed Workforce
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('briefcase'); ?> Managed Workforce</span>
		<h1>End-to-End Workforce Management — So You Focus on Your Core Business.</h1>
		<p>From sourcing and onboarding to payroll and offboarding, SAM's Managed Workforce model handles the complete employee lifecycle for your contract and contingent workforce. One partner. Zero operational overhead.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Discuss Your Requirement</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-outline-light"><?php echo sam_icon('chat'); ?> Speak to an Expert</a>
		</div>
	</div>
</section>

<section class="stats-strip">
	<div class="container stats-grid">
		<div class="stat-item"><span class="stat-num">End-to-End</span><span class="stat-label">Lifecycle Management</span></div>
		<div class="stat-item"><span class="stat-num">100%</span><span class="stat-label">Statutory Compliance</span></div>
		<div class="stat-item"><span class="stat-num">PAN</span><span class="stat-label">India Operations</span></div>
		<div class="stat-item"><span class="stat-num">ISO</span><span class="stat-label">9001:2015 Certified</span></div>
	</div>
</section>

<!-- What's included -->
<section class="section">
	<div class="container">
		<div class="section-head section-head-left">
			<h2>What Our Managed Workforce Service Covers</h2>
			<p>A complete stack from first hire to final exit — delivered by one accountable partner.</p>
		</div>
		<div class="grid-3 focus-grid">
			<?php
			$services = array(
				array( 'icon' => 'search',   'title' => 'Talent Acquisition',        'desc' => 'End-to-end sourcing, screening, and onboarding of contract and project-based workforce tailored to your operating requirements.' ),
				array( 'icon' => 'shield',   'title' => 'Statutory Compliance',      'desc' => 'PF, ESI, PT, labour law, and regulatory compliance managed across all states and employment categories.' ),
				array( 'icon' => 'wallet',   'title' => 'Payroll Administration',    'desc' => 'Salary processing, payslip generation, reimbursements, and statutory filings handled with zero delays.' ),
				array( 'icon' => 'check',    'title' => 'Performance Monitoring',    'desc' => 'Structured reviews and reporting cadences that give you real-time visibility on contractor productivity and attendance.' ),
				array( 'icon' => 'briefcase','title' => 'Vendor Consolidation',      'desc' => 'Replace multiple staffing vendors with one managed partner for cleaner oversight, simpler invoicing, and better SLA control.' ),
				array( 'icon' => 'download', 'title' => 'Smooth Exit Management',    'desc' => 'Full-and-final settlements, relieving letters, and exit documentation managed by SAM for a compliant, clean separation.' ),
			);
			foreach ( $services as $s ) :
			?>
			<div class="focus-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon( $s['icon'] ); ?></div>
				<h3><?php echo esc_html( $s['title'] ); ?></h3>
				<p><?php echo esc_html( $s['desc'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Who is this for -->
<section class="section why-section">
	<div class="container">
		<div class="section-head">
			<h2>Who Benefits Most from Managed Workforce</h2>
			<p>Our model is purpose-built for businesses with significant contingent workforce complexity.</p>
		</div>
		<div class="grid-4 why-grid">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('target'); ?></div>
				<h3>Manufacturing & Industrial</h3>
				<p>Large plant workforces requiring shift-based management, certifications tracking, and multi-location compliance.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('laptop'); ?></div>
				<h3>IT Service Companies</h3>
				<p>Project-driven teams where headcount fluctuates by engagement — staff augmentation managed under one commercial agreement.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('star'); ?></div>
				<h3>E-Commerce & Logistics</h3>
				<p>Seasonal workforce surges requiring rapid onboarding of warehouse, delivery, and operations staff at scale.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('briefcase'); ?></div>
				<h3>BPO & Shared Services</h3>
				<p>High-volume contract employee bases requiring process-driven payroll, attendance, and grievance management.</p>
			</div>
		</div>
	</div>
</section>

<!-- Process -->
<section class="section journey-section">
	<div class="container">
		<div class="section-head">
			<h2>Our Managed Workforce Delivery Model</h2>
			<p>A structured engagement that replaces ad-hoc vendor management with a single, accountable partnership.</p>
		</div>
		<div class="journey-track">
			<?php
			$steps = array(
				array( 'icon' => 'chat',      'label' => 'Needs Assessment', 'desc' => 'Headcount, compliance, and process mapping' ),
				array( 'icon' => 'search',    'label' => 'Sourcing Sprint',  'desc' => 'Targeted hiring across all required roles' ),
				array( 'icon' => 'check',     'label' => 'Onboarding',       'desc' => 'Induction, documentation, system access' ),
				array( 'icon' => 'wallet',    'label' => 'Payroll Ops',      'desc' => 'Monthly salary, PF/ESI, payslips' ),
				array( 'icon' => 'star',      'label' => 'Performance',      'desc' => 'Attendance, reviews, MIS reporting' ),
				array( 'icon' => 'download',  'label' => 'Exit & Refresh',   'desc' => 'F&F, backfill sourcing, continuity' ),
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

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Ready to hand off your contingent workforce operations?</h2>
		<p>Let SAM become the single partner managing your entire flexible workforce — from sourcing to payroll to exit.</p>
		<div class="hero-actions" style="justify-content:center; margin-top:20px;">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Discuss Your Requirement</a>
			<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'payroll' ) ); ?>" class="btn btn-outline">Explore Payroll Services</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
