<?php
/**
 * Template Name: Employee Login
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<section class="page-hero page-hero-simple">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon( 'users' ); ?> Employee Portal</span>
		<h1>Employee Login</h1>
		<p>Access your secure payroll portal to view payslips and employee information.</p>
		<div class="hero-actions"><a href="<?php echo esc_url( sam_employee_portal_url() ); ?>" class="btn btn-primary" rel="nofollow noopener" target="_blank">Open Employee Portal</a></div>
	</div>
</section>
<section class="section"><div class="container container-narrow"><div class="focus-card"><h2>Need payroll support?</h2><p>For help with your account, payslip, or statutory documents, contact the SAM Manpower support team.</p><a class="btn btn-outline" href="<?php echo esc_url( sam_contact_url() ); ?>">Contact Support</a></div></div></section>
<?php get_footer(); ?>
