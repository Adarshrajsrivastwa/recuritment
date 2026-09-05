<?php
/**
 * Template Name: Payroll Services
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('wallet'); ?> Payroll Services</span>
		<h1>Compliant payroll, handled end-to-end.</h1>
		<p>From salary processing to statutory filings, SAM manages your payroll cycle accurately and on time &mdash; so your team never has to chase compliance.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('wallet'); ?> Get a Payroll Quote</a>
		</div>
	</div>
</section>

<!-- WHAT'S INCLUDED -->
<section class="section services-section" id="payroll-services">
	<div class="container">
		<div class="section-head section-head-left">
			<h2>What's Included</h2>
			<p>A complete payroll stack, whether you have 10 employees or 1,000.</p>
		</div>
		<div class="grid-4 services-grid">
			<?php
			$payroll_services = array(
				array( 'icon' => 'wallet',    'title' => 'Salary Processing', 'desc' => 'Accurate, on-time disbursement every pay cycle, without fail.' ),
				array( 'icon' => 'shield',    'title' => 'Statutory Compliance', 'desc' => 'PF, ESI, PT, TDS and labour law filings handled and tracked.' ),
				array( 'icon' => 'briefcase', 'title' => 'Payslips & Reports', 'desc' => 'Digital payslips and management-ready payroll reports every month.' ),
				array( 'icon' => 'check',     'title' => 'Full & Final Settlement', 'desc' => 'Clean, timely exit settlements for departing employees.' ),
			);
			foreach ( $payroll_services as $s ) : ?>
				<div class="service-card">
					<div class="icon-badge icon-badge-sm"><?php echo sam_icon( $s['icon'] ); ?></div>
					<h3><?php echo esc_html( $s['title'] ); ?></h3>
					<p><?php echo esc_html( $s['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- WHY OUTSOURCE PAYROLL -->
<section class="section why-section">
	<div class="container">
		<div class="section-head">
			<h2>Why Outsource Your Payroll</h2>
			<p>Fewer errors, less admin overhead, zero compliance surprises.</p>
		</div>
		<div class="grid-4 why-grid">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h3>Always On Time</h3>
				<p>Salaries and filings processed to a fixed monthly schedule, every time.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h3>ISO-Certified Process</h3>
				<p>Payroll runs under our ISO 9001:2015 certified quality system.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('check'); ?></div>
				<h3>Zero Compliance Gaps</h3>
				<p>Statutory deadlines tracked so you're never caught off guard.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('users'); ?></div>
				<h3>Dedicated Payroll Manager</h3>
				<p>One point of contact for every query, adjustment, or escalation.</p>
			</div>
		</div>
	</div>
</section>

<!-- PAYROLL PROCESS -->
<section class="section journey-section">
	<div class="container">
		<div class="section-head">
			<h2>How Our Payroll Cycle Works</h2>
			<p>A predictable monthly rhythm from attendance to disbursement.</p>
		</div>
		<div class="journey-track">
			<?php
			$steps = array(
				array( 'icon' => 'calendar',  'label' => 'Attendance', 'desc' => 'Attendance & leave data collected' ),
				array( 'icon' => 'briefcase', 'label' => 'Inputs', 'desc' => 'Variable pay & reimbursement inputs' ),
				array( 'icon' => 'wallet',    'label' => 'Processing', 'desc' => 'Salary computation & validation' ),
				array( 'icon' => 'shield',    'label' => 'Compliance', 'desc' => 'PF, ESI, PT, TDS filings' ),
				array( 'icon' => 'check',     'label' => 'Disbursal', 'desc' => 'Bank transfer & digital payslips' ),
				array( 'icon' => 'download',  'label' => 'Reporting', 'desc' => 'Monthly MIS report shared' ),
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

<!-- STATS -->
<section class="stats-strip">
	<div class="container stats-grid">
		<div class="stat-item"><span class="stat-num">ISO</span><span class="stat-label">9001:2015 Certified</span></div>
		<div class="stat-item"><span class="stat-num">100%</span><span class="stat-label">On-Time Disbursal</span></div>
		<div class="stat-item"><span class="stat-num">PAN</span><span class="stat-label">India Compliance</span></div>
		<div class="stat-item"><span class="stat-num">0</span><span class="stat-label">Missed Filings</span></div>
	</div>
</section>

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Hand off your payroll headaches.</h2>
		<p>Get a custom payroll quote based on your headcount.</p>
		<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary">Get a Payroll Quote</a>
	</div>
</section>

<?php get_footer(); ?>
