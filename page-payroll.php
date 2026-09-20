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

<!-- STATUTORY COMPLIANCE CALENDAR & GUARANTEE -->
<section class="section compliance-calendar-section" style="background:#F8FAFC; border-top:1px solid #E2E8F0; border-bottom:1px solid #E2E8F0;">
	<div class="container">
		<div class="section-head text-center">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('shield'); ?> 100% On-Schedule Assurance</span>
			<h2>Indian Statutory Compliance Calendar Managed by SAM</h2>
			<p>We handle all statutory deductions, challan generation, and government portal filings with a 0-penalty guarantee.</p>
		</div>

		<div class="grid-4" style="margin-top:32px; gap:20px;">
			<div style="background:#fff; border-radius:14px; padding:24px; border:1px solid #E2E8F0; box-shadow:0 4px 12px rgba(0,0,0,0.03);">
				<div style="font-size:0.8rem; font-weight:700; color:#2563EB; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:8px;">By 7th of Every Month</div>
				<h3 style="font-size:1.15rem; margin-bottom:8px; color:#0F172A;">TDS Remittance</h3>
				<p style="font-size:0.88rem; color:#64748B; line-height:1.5;">Income tax withheld from employee salaries computed, audited, and deposited via NSDL challans on time.</p>
				<div style="margin-top:14px; font-size:0.82rem; font-weight:600; color:#10B981; display:flex; align-items:center; gap:6px;">
					<?php echo sam_icon('check'); ?> Section 192 compliant
				</div>
			</div>

			<div style="background:#fff; border-radius:14px; padding:24px; border:1px solid #E2E8F0; box-shadow:0 4px 12px rgba(0,0,0,0.03);">
				<div style="font-size:0.8rem; font-weight:700; color:#2563EB; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:8px;">By 15th of Every Month</div>
				<h3 style="font-size:1.15rem; margin-bottom:8px; color:#0F172A;">EPF &amp; MP Act Challan</h3>
				<p style="font-size:0.88rem; color:#64748B; line-height:1.5;">Monthly Electronic Challan cum Return (ECR) generation and EPFO payment reconciliation for all eligible staff.</p>
				<div style="margin-top:14px; font-size:0.82rem; font-weight:600; color:#10B981; display:flex; align-items:center; gap:6px;">
					<?php echo sam_icon('check'); ?> UAN mapping &amp; verification
				</div>
			</div>

			<div style="background:#fff; border-radius:14px; padding:24px; border:1px solid #E2E8F0; box-shadow:0 4px 12px rgba(0,0,0,0.03);">
				<div style="font-size:0.8rem; font-weight:700; color:#2563EB; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:8px;">By 15th of Every Month</div>
				<h3 style="font-size:1.15rem; margin-bottom:8px; color:#0F172A;">ESIC Contribution</h3>
				<p style="font-size:0.88rem; color:#64748B; line-height:1.5;">Employee State Insurance returns filed online, TIC cards issued, and dispensaries mapped for employee coverage.</p>
				<div style="margin-top:14px; font-size:0.82rem; font-weight:600; color:#10B981; display:flex; align-items:center; gap:6px;">
					<?php echo sam_icon('check'); ?> Zero default tracking
				</div>
			</div>

			<div style="background:#fff; border-radius:14px; padding:24px; border:1px solid #E2E8F0; box-shadow:0 4px 12px rgba(0,0,0,0.03);">
				<div style="font-size:0.8rem; font-weight:700; color:#2563EB; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:8px;">Monthly &amp; Quarterly</div>
				<h3 style="font-size:1.15rem; margin-bottom:8px; color:#0F172A;">PT, LWF &amp; Form 24Q</h3>
				<p style="font-size:0.88rem; color:#64748B; line-height:1.5;">State-wise Professional Tax, Labour Welfare Fund deductions, and quarterly Form 24Q TDS filing with Form 16 issuance.</p>
				<div style="margin-top:14px; font-size:0.82rem; font-weight:600; color:#10B981; display:flex; align-items:center; gap:6px;">
					<?php echo sam_icon('check'); ?> PAN-India state portal coverage
				</div>
			</div>
		</div>

		<!-- Zero-Penalty Guarantee Box -->
		<div style="margin-top:32px; background:linear-gradient(135deg, #0A1024 0%, #172554 100%); border-radius:16px; padding:28px 36px; color:#fff; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:20px;">
			<div style="max-width:700px;">
				<h3 style="color:#fff; font-size:1.25rem; margin-bottom:6px;">SAM Zero-Penalty SLA Guarantee</h3>
				<p style="color:#94A3B8; font-size:0.92rem; margin:0; line-height:1.5;">If any statutory filing is delayed due to an oversight by our payroll team, SAM covers 100% of any government penalties or interest accrued. That is our written commitment to your finance leadership.</p>
			</div>
			<div>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary" style="white-space:nowrap;"><?php echo sam_icon('wallet'); ?> Request a Payroll Proposal</a>
			</div>
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
