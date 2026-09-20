<?php
/**
 * Template Name: Contract-to-Hire
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('shield'); ?> Contract-to-Hire (C2H)</span>
		<h1>Evaluate on the Job. <span class="text-accent-light">Hire with Confidence.</span></h1>
		<p>Contract-to-Hire bridges the gap between trial and tenure. Bring in high-potential talent on a defined contract, observe their real-world performance, and convert the best fits into permanent employees — without the risk of a mis-hire.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Start a C2H Engagement</a>
			<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>" class="btn btn-outline-light"><?php echo sam_icon('star'); ?> Learn About SAM Assured</a>
		</div>
	</div>
</section>

<section class="stats-strip">
	<div class="container stats-grid">
		<div class="stat-item"><span class="stat-num">3–6</span><span class="stat-label">Month Trial Period</span></div>
		<div class="stat-item"><span class="stat-num">90%</span><span class="stat-label">Avg. Conversion Rate</span></div>
		<div class="stat-item"><span class="stat-num">0</span><span class="stat-label">Severance if Not Converted</span></div>
		<div class="stat-item"><span class="stat-num">100%</span><span class="stat-label">Compliance Managed</span></div>
	</div>
</section>

<!-- How C2H works -->
<section class="section">
	<div class="container">
		<div class="section-head">
			<h2>How Contract-to-Hire Works</h2>
			<p>A structured four-phase approach that eliminates mis-hire risk while keeping your team productive from day one.</p>
		</div>
		<div class="grid-4 why-grid">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('users'); ?></div>
				<h3>01. Source &amp; Screen</h3>
				<p>SAM identifies candidates matching your technical requirements and cultural expectations. Every profile is vetted before presentation.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('briefcase'); ?></div>
				<h3>02. Contract Deployment</h3>
				<p>The selected candidate joins your team on a fixed-duration contract. SAM manages employment, payroll, and compliance throughout.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('star'); ?></div>
				<h3>03. Performance Review</h3>
				<p>You evaluate actual output — technical execution, team fit, ownership, and reliability — under real working conditions over the trial period.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge" style="background:var(--blue); color:#fff;"><?php echo sam_icon('download'); ?></div>
				<h3>04. Permanent Conversion</h3>
				<p>Confident in the fit? Convert to a permanent, full-time hire. SAM handles the transition paperwork and handover seamlessly.</p>
			</div>
		</div>
	</div>
</section>

<!-- Benefits -->
<section class="section focus-section">
	<div class="container">
		<div class="section-head">
			<h2>Why Companies Choose C2H with SAM</h2>
			<p>Reduce risk without slowing down your team's delivery.</p>
		</div>
		<div class="grid-3 focus-grid">
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h3>Zero Severance Liability</h3>
				<p>If the trial doesn't convert, there's no severance obligation. The contract simply ends without legal or financial exposure on your side.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('check'); ?></div>
				<h3>Real Performance Data</h3>
				<p>Make a permanent hire decision based on months of actual output — not a one-hour interview and a polished CV.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h3>Immediate Productivity</h3>
				<p>The candidate joins and contributes from Day 1. No time lost to extended interview cycles while your team operates short-staffed.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('wallet'); ?></div>
				<h3>Flexible Headcount Planning</h3>
				<p>Keep permanent headcount lean during uncertainty while still moving key business deliverables forward with contracted resources.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('bell'); ?></div>
				<h3>Culture-Fit Validation</h3>
				<p>Observe how the candidate interacts with your team, adapts to your processes, and handles pressure — things no interview can predict.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('target'); ?></div>
				<h3>Compliant Throughout</h3>
				<p>SAM manages all statutory filings, PF/ESI, payslips, and employment documentation during the trial period — zero HR overhead for you.</p>
			</div>
		</div>
	</div>
</section>

<section class="section assured-section">
	<div class="container assured-inner">
		<div class="assured-copy">
			<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('shield'); ?> SAM Assured</span>
			<h2>Take C2H Further with SAM Assured</h2>
			<p>SAM Assured is our premium Contract-to-Hire programme with enhanced candidate monitoring, dedicated account management, and guaranteed conversion support — built for high-stakes permanent placements.</p>
			<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>" class="btn btn-primary">Explore SAM Assured</a>
		</div>
		<div class="assured-steps">
			<div class="assured-step"><?php echo sam_icon('check'); ?><span>01. Select<br><small>Curated Talent</small></span></div>
			<div class="assured-step"><?php echo sam_icon('briefcase'); ?><span>02. Deploy<br><small>Contract Phase</small></span></div>
			<div class="assured-step"><?php echo sam_icon('star'); ?><span>03. Evaluate<br><small>Real Performance</small></span></div>
			<div class="assured-step is-active"><?php echo sam_icon('download'); ?><span>04. Convert<br><small>Permanent Hire</small></span></div>
		</div>
	</div>
</section>

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Ready to try before you hire permanently?</h2>
		<p>Submit your requirement and we'll propose a tailored C2H engagement within 24 hours.</p>
		<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Start a C2H Engagement</a>
	</div>
</section>

<?php get_footer(); ?>
