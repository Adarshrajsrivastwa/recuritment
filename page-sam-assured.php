<?php
/**
 * Template Name: SAM Assured
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('shield'); ?> Zero Risk Hiring</span>
		<h1>SAM Assured Hire</h1>
		<p>Not sure if a hire will work out? Evaluate a candidate on the job first, so you only commit to a permanent hire once you're confident it's the right fit. No severance, no backfill scramble.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( get_theme_mod( 'sam_hire_form_url', '#hire' ) ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Start an Assured Hire</a>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-head">
			<h2>How SAM Assured Works</h2>
			<p>Four simple steps from shortlist to permanent placement.</p>
		</div>
		<div class="grid-4 why-grid">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('check'); ?></div>
				<h3>01. Identify</h3>
				<p>We shortlist curated, pre-screened talent matched to your requirement.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h3>02. Trial</h3>
				<p>The candidate joins on an on-the-job trial period with your team.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('star'); ?></div>
				<h3>03. Evaluate</h3>
				<p>You assess real performance, not just interview answers.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('download'); ?></div>
				<h3>04. Convert</h3>
				<p>Confident in the fit? Convert to a permanent hire, hassle-free.</p>
			</div>
		</div>
	</div>
</section>

<section class="section why-section">
	<div class="container">
		<div class="section-head">
			<h2>Why Employers Choose SAM Assured</h2>
			<p>Reduce hiring risk without slowing down your team.</p>
		</div>
		<div class="grid-3 focus-grid">
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h3>No Severance Risk</h3>
				<p>If it's not a fit during trial, there's no severance liability to manage.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h3>No Backfill Scramble</h3>
				<p>We keep a pipeline ready in case a trial doesn't convert.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('check'); ?></div>
				<h3>Confidence Before Commitment</h3>
				<p>Make the permanent hiring decision only after seeing real output.</p>
			</div>
		</div>
	</div>
</section>

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Try before you hire, permanently.</h2>
		<p>Start with a SAM Assured trial placement today.</p>
		<a href="<?php echo esc_url( get_theme_mod( 'sam_hire_form_url', '#hire' ) ); ?>" class="btn btn-primary">Start an Assured Hire</a>
	</div>
</section>

<?php get_footer(); ?>
