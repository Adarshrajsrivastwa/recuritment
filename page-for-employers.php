<?php
/**
 * Template Name: For Employers
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('briefcase'); ?> For Employers</span>
		<h1>Fill urgent roles without the usual notice-period drag.</h1>
		<p>Tell us the role, and we'll surface pre-screened candidates who are ready to join within 30 days &mdash; or immediately.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( get_theme_mod( 'sam_hire_form_url', '#hire' ) ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Submit a Requirement</a>
		</div>
	</div>
</section>

<section class="section services-section" id="services">
	<div class="container">
		<div class="section-head section-head-left">
			<h2>Solutions for Employers</h2>
			<p>Workforce solutions built around speed, compliance, and quality.</p>
		</div>
		<div class="grid-4 services-grid">
			<?php
			$services = array(
				array( 'icon' => 'users', 'title' => 'Permanent Hiring', 'desc' => 'Specialized in immediate and 30-day placements for critical roles.' ),
				array( 'icon' => 'laptop', 'title' => 'IT Contract Staffing', 'desc' => 'Flexible technical talent to scale projects dynamically.' ),
				array( 'icon' => 'briefcase', 'title' => 'Managed Workforce', 'desc' => 'End-to-end management of contingent workforce operations.' ),
				array( 'icon' => 'wallet', 'title' => 'Payroll Support', 'desc' => 'Compliant and timely payroll processing and management.', 'link' => '/payroll/' ),
			);
			foreach ( $services as $s ) :
				$link = isset( $s['link'] ) ? $s['link'] : '';
				?>
				<div class="service-card">
					<div class="icon-badge icon-badge-sm"><?php echo sam_icon( $s['icon'] ); ?></div>
					<h3><?php echo esc_html( $s['title'] ); ?></h3>
					<p><?php echo esc_html( $s['desc'] ); ?></p>
					<?php if ( $link ) : ?>
						<a href="<?php echo esc_url( home_url( $link ) ); ?>" class="text-link">Learn More <?php echo sam_icon('arrow'); ?></a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section journey-section">
	<div class="container">
		<div class="section-head">
			<h2>How Hiring Works With SAM</h2>
			<p>A transparent, structured process from brief to onboarding.</p>
		</div>
		<div class="journey-track">
			<?php
			$steps = array(
				array( 'icon' => 'chat', 'label' => 'Alignment', 'desc' => 'Defining position requirements' ),
				array( 'icon' => 'search', 'label' => 'Sourcing', 'desc' => 'Empanelment talent identification' ),
				array( 'icon' => 'shield', 'label' => 'Screening', 'desc' => 'Rigorous technical evaluation' ),
				array( 'icon' => 'check', 'label' => 'Shortlist', 'desc' => 'Curated & balanced presentation' ),
				array( 'icon' => 'chat', 'label' => 'Interview', 'desc' => 'Direct client interaction' ),
				array( 'icon' => 'download', 'label' => 'Joining', 'desc' => 'Seamless onboarding process' ),
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

<section class="section assured-section" id="hire">
	<div class="container assured-inner">
		<div class="assured-copy">
			<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('shield'); ?> Zero Risk Hiring</span>
			<h2>Try Before You Hire, With SAM Assured</h2>
			<p>Evaluate a candidate on the job before committing to a permanent hire. No severance, no backfill scramble if it's not the right fit.</p>
			<a href="<?php echo esc_url( home_url( '/sam-assured/' ) ); ?>" class="btn btn-primary">Learn About SAM Assured</a>
		</div>
		<div class="assured-steps">
			<div class="assured-step"><?php echo sam_icon('check'); ?><span>01. Identify<br><small>Curated Talent</small></span></div>
			<div class="assured-step"><?php echo sam_icon('clock'); ?><span>02. Trial<br><small>On-the-job</small></span></div>
			<div class="assured-step"><?php echo sam_icon('star'); ?><span>03. Evaluate<br><small>Performance Review</small></span></div>
			<div class="assured-step is-active"><?php echo sam_icon('download'); ?><span>04. Convert<br><small>Permanent Hire</small></span></div>
		</div>
	</div>
</section>

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Have an urgent role to fill?</h2>
		<p>Share your requirement and hear back within 24 hours.</p>
		<a href="<?php echo esc_url( get_theme_mod( 'sam_hire_form_url', '#hire' ) ); ?>" class="btn btn-primary">Submit a Requirement</a>
	</div>
</section>

<?php get_footer(); ?>
