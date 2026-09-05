<?php
/**
 * Template Name: About Us
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('users'); ?> About SAM</span>
		<h1>Built by recruiters who understood notice periods first-hand.</h1>
		<p>Since 2017, SAM Manpower &amp; Career Services LLP has specialized in one problem: getting the right people onboarded fast, without compromising on quality or compliance.</p>
	</div>
</section>

<section class="section">
	<div class="container stats-grid">
		<div class="stat-item"><span class="stat-num">2017</span><span class="stat-label">Founded</span></div>
		<div class="stat-item"><span class="stat-num">500+</span><span class="stat-label">Partner Companies</span></div>
		<div class="stat-item"><span class="stat-num">98%</span><span class="stat-label">Retention Rate</span></div>
		<div class="stat-item"><span class="stat-num">PAN</span><span class="stat-label">India Reach</span></div>
	</div>
</section>

<section class="section partner-section">
	<div class="container partner-inner">
		<div class="partner-media">
			<div class="partner-media-placeholder" aria-hidden="true"></div>
		</div>
		<div class="partner-copy">
			<h2>Our Story</h2>
			<p>SAM Manpower started with a simple observation: most staffing agencies optimized for volume, not speed. Businesses losing revenue to unfilled seats needed a partner who specialized in candidates who could join immediately or within 30 days.</p>
			<p>Today, we're an ISO 9001:2015 certified recruitment partner working across IT, manufacturing, retail, and BFSI &mdash; still built around that same core promise.</p>
		</div>
	</div>
</section>

<section class="section why-section">
	<div class="container">
		<div class="section-head">
			<h2>What We Stand For</h2>
			<p>The principles that guide every placement we make.</p>
		</div>
		<div class="grid-4 why-grid">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h3>Speed</h3>
				<p>We treat time-to-hire as a business metric, not an afterthought.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h3>Compliance</h3>
				<p>Every placement and payroll cycle meets statutory requirements.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('check'); ?></div>
				<h3>Transparency</h3>
				<p>Clients see exactly where every candidate stands, always.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('users'); ?></div>
				<h3>Partnership</h3>
				<p>We measure success by retention, not just placements made.</p>
			</div>
		</div>
	</div>
</section>

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Ready to hire faster?</h2>
		<p>Talk to our team about your urgent hiring needs.</p>
		<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary">Hire Immediate Talent</a>
	</div>
</section>

<?php get_footer(); ?>
