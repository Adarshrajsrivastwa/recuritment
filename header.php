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
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-text">SAM</a>
			<?php endif; ?>
		</div>

		<nav class="main-navigation" id="main-navigation" aria-label="Primary">
			<?php sam_one_page_primary_menu(); ?>
		</nav>

		<div class="header-cta">
			<a href="<?php echo esc_url( sam_employee_login_url() ); ?>" class="btn btn-outline btn-sm" target="_self">Login as Employee</a>
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary btn-sm">Hire Talent</a>
		</div>

		<button class="menu-toggle" id="menu-toggle" aria-controls="main-navigation" aria-expanded="false">
			<span></span><span></span><span></span>
			<span class="screen-reader-text">Menu</span>
		</button>
	</div>
</header>

<main id="main" class="site-main">
	<?php sam_render_breadcrumbs(); ?>
