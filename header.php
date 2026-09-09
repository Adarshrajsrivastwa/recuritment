<?php
/**
 * The header for our theme
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
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
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary btn-sm">Hire Talent</a>
			</div>
		</nav>

		<div class="header-cta">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary btn-sm">Hire Talent</a>
		</div>

		<button class="menu-toggle" id="menu-toggle" aria-controls="main-navigation" aria-expanded="false">
			<span></span><span></span><span></span>
			<span class="screen-reader-text">Menu</span>
		</button>
	</div>
</header>

<main id="main" class="site-main">
