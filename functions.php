<?php
/**
 * SAM Manpower Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SAM_THEME_VERSION', '1.0.0' );

/**
 * Theme setup
 */
function sam_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sam-manpower' ),
		'footer'  => __( 'Footer Menu', 'sam-manpower' ),
	) );
}
add_action( 'after_setup_theme', 'sam_theme_setup' );

/**
 * Enqueue styles and scripts
 */
function sam_theme_scripts() {
	// Google Fonts
	wp_enqueue_style( 'sam-google-fonts', 'https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap', array(), null );

	wp_enqueue_style( 'sam-manpower-style', get_stylesheet_uri(), array(), SAM_THEME_VERSION );

	wp_enqueue_script( 'sam-manpower-main', get_template_directory_uri() . '/assets/js/main.js', array(), SAM_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'sam_theme_scripts' );

/**
 * Register widget areas (footer columns)
 */
function sam_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'sam-manpower' ),
		'id'            => 'footer-1',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'sam_theme_widgets_init' );

/**
 * Fallback menu if no menu assigned to a location
 */
function sam_fallback_primary_menu() {
	echo '<ul id="primary-menu" class="nav-menu">';
	echo '<li class="current-menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/about-us/' ) ) . '">About Us</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/for-employers/' ) ) . '">For Employers</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/payroll/' ) ) . '">Payroll</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/sam-assured/' ) ) . '">SAM Assured</a></li>';
	echo '</ul>';
}

/**
 * Custom excerpt length
 */
function sam_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'sam_excerpt_length' );

/**
 * Body classes
 */
function sam_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'is-home';
	}
	return $classes;
}
add_filter( 'body_class', 'sam_body_classes' );

/**
 * Register Testimonials & FAQ custom post types (editable from wp-admin)
 */
function sam_register_post_types() {
	register_post_type( 'sam_testimonial', array(
		'labels' => array(
			'name'          => 'Testimonials',
			'singular_name' => 'Testimonial',
			'add_new_item'  => 'Add New Testimonial',
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-format-quote',
		'supports'     => array( 'title', 'editor', 'thumbnail' ),
	) );

	register_post_type( 'sam_faq', array(
		'labels' => array(
			'name'          => 'FAQs',
			'singular_name' => 'FAQ',
			'add_new_item'  => 'Add New FAQ',
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-editor-help',
		'supports'     => array( 'title', 'editor' ),
	) );
}
add_action( 'init', 'sam_register_post_types' );

/**
 * Meta box for testimonial author role/company
 */
function sam_testimonial_meta_box() {
	add_meta_box( 'sam_testimonial_meta', 'Author Details', 'sam_testimonial_meta_callback', 'sam_testimonial', 'normal', 'default' );
}
add_action( 'add_meta_boxes', 'sam_testimonial_meta_box' );

function sam_testimonial_meta_callback( $post ) {
	$role = get_post_meta( $post->ID, '_sam_author_role', true );
	echo '<label>Author Role / Company</label><br />';
	echo '<input type="text" style="width:100%" name="sam_author_role" value="' . esc_attr( $role ) . '" placeholder="e.g. CTO, TechCorp India" />';
}

function sam_save_testimonial_meta( $post_id ) {
	if ( isset( $_POST['sam_author_role'] ) ) {
		update_post_meta( $post_id, '_sam_author_role', sanitize_text_field( $_POST['sam_author_role'] ) );
	}
}
add_action( 'save_post', 'sam_save_testimonial_meta' );

/**
 * Helper: render an inline icon (feather-style, inherits currentColor)
 */
function sam_icon( $name ) {
	$icons = array(
		'clock'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>',
		'bell'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 01-3.4 0"/></svg>',
		'calendar'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></svg>',
		'briefcase'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
		'laptop'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="12" rx="1"/><path d="M2 20h20"/></svg>',
		'users'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>',
		'wallet'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 12V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2v-3"/><path d="M17 12h4v4h-4a2 2 0 010-4z"/></svg>',
		'target'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.2" fill="currentColor"/></svg>',
		'check'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 6L9 17l-5-5"/></svg>',
		'shield'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/></svg>',
		'search'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.35-4.35"/></svg>',
		'chat'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 11.5a8.38 8.38 0 01-9 8.4A8.5 8.5 0 013 12a8.5 8.5 0 0117 -0.5z"/></svg>',
		'download'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3v12m0 0l-4-4m4 4l4-4"/><path d="M4 19h16"/></svg>',
		'arrow'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12h14M13 6l6 6-6 6"/></svg>',
		'star'       => '<svg viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.1 6.3 6.9 1-5 4.9 1.2 6.9-6.2-3.3-6.2 3.3 1.2-6.9-5-4.9 6.9-1z"/></svg>',
	);
	return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}

/**
 * Theme Customizer: quick-edit key text/contact fields without touching code
 */
function sam_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'sam_contact', array( 'title' => 'SAM Contact Info', 'priority' => 30 ) );

	$wp_customize->add_setting( 'sam_phone', array( 'default' => '+91 98765 43210' ) );
	$wp_customize->add_control( 'sam_phone', array( 'label' => 'Phone Number', 'section' => 'sam_contact', 'type' => 'text' ) );

	$wp_customize->add_setting( 'sam_hire_form_url', array( 'default' => '#hire' ) );
	$wp_customize->add_control( 'sam_hire_form_url', array( 'label' => 'Hire Talent CTA URL (Google Form etc.)', 'section' => 'sam_contact', 'type' => 'text' ) );

	$wp_customize->add_setting( 'sam_address', array( 'default' => 'A-701, Tower T2, IT City Center, Trichardra-2, Noida West, Uttar Pradesh' ) );
	$wp_customize->add_control( 'sam_address', array( 'label' => 'Office Address', 'section' => 'sam_contact', 'type' => 'textarea' ) );
}
add_action( 'customize_register', 'sam_customize_register' );
