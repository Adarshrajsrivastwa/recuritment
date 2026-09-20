<?php
/**
 * The header for our theme — with dropdown nav support
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?><?php // phpcs:ignore ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	// Fallback favicon — uses WordPress Site Icon if set, else the bundled logo
	if ( ! has_site_icon() ) :
	?>
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sam-logo.png' ); ?>">
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sam-logo.png' ); ?>">
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sam-logo.png' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'sam-manpower' ); ?></a>

<header class="site-header" id="site-header">
	<div class="container header-inner">
		<div class="site-branding">
			<?php sam_render_logo( 'site-logo' ); ?>
		</div>

		<nav class="main-navigation" id="main-navigation" aria-label="Primary">
			<?php sam_one_page_primary_menu(); ?>
			<div class="mobile-nav-cta">
				<a href="<?php echo esc_url( sam_employee_login_url() ); ?>" class="btn btn-outline btn-sm">Employee Login</a>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary btn-sm"><?php echo sam_icon('users'); ?> Hire Talent</a>
			</div>
		</nav>

		<div class="header-cta">
			<a href="<?php echo esc_url( sam_employee_login_url() ); ?>" class="btn btn-outline btn-sm">Employee Login</a>
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary btn-sm"><?php echo sam_icon('users'); ?> Hire Talent</a>
		</div>

		<button class="menu-toggle" id="menu-toggle" aria-controls="main-navigation" aria-expanded="false">
			<span></span><span></span><span></span>
			<span class="screen-reader-text">Menu</span>
		</button>
	</div>
</header>

<main id="main" class="site-main">

