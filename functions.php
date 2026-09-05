<?php
/**
 * SAM Manpower Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SAM_THEME_VERSION', '1.0.3' );

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
 * Helper to get proper page URL dynamically using standard WordPress get_permalink()
 */
function sam_get_page_url_by_slug( $slug ) {
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	if ( ! $page ) {
		$pages = get_posts( array(
			'name'        => $slug,
			'post_type'   => 'page',
			'post_status' => 'publish',
			'numberposts' => 1,
		) );
		if ( ! empty( $pages ) ) {
			$page = $pages[0];
		}
	}

	if ( $page ) {
		return get_permalink( $page->ID );
	}

	return home_url( '/' . $slug . '/' );
}

/**
 * Fallback menu if no menu assigned to a location
 */
function sam_fallback_primary_menu() {
	$about_url     = sam_get_page_url_by_slug( 'about-us' );
	$employers_url = sam_get_page_url_by_slug( 'for-employers' );
	$payroll_url   = sam_get_page_url_by_slug( 'payroll' );
	$assured_url   = sam_get_page_url_by_slug( 'sam-assured' );

	$about_page     = get_page_by_path( 'about-us', OBJECT, 'page' );
	$employers_page = get_page_by_path( 'for-employers', OBJECT, 'page' );
	$payroll_page   = get_page_by_path( 'payroll', OBJECT, 'page' );
	$assured_page   = get_page_by_path( 'sam-assured', OBJECT, 'page' );

	$is_home = ( is_front_page() && ! is_page() );

	echo '<ul id="primary-menu" class="nav-menu">';
	echo '<li class="' . ( $is_home ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li class="' . ( ( $about_page && is_page( $about_page->ID ) ) ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( $about_url ) . '">About Us</a></li>';
	echo '<li class="' . ( ( $employers_page && is_page( $employers_page->ID ) ) ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( $employers_url ) . '">For Employers</a></li>';
	echo '<li class="' . ( ( $payroll_page && is_page( $payroll_page->ID ) ) ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( $payroll_url ) . '">Payroll</a></li>';
	echo '<li class="' . ( ( $assured_page && is_page( $assured_page->ID ) ) ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( $assured_url ) . '">SAM Assured</a></li>';
	echo '</ul>';
}

/**
 * Primary navigation for the single-page site. Keep links absolute so they
 * also return visitors to the correct section from any legacy page URL.
 */
function sam_one_page_primary_menu() {
	$home_url = home_url( '/' );
	$items    = array(
		'Home'          => '',
		'For Employers' => '#employers',
		'SAM Assured'   => '#sam-assured',
		'Payroll'       => '#payroll',
		'About Us'      => '#about',
	);

	echo '<ul id="primary-menu" class="nav-menu">';
	foreach ( $items as $label => $anchor ) {
		echo '<li><a href="' . esc_url( $home_url . $anchor ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}

/**
 * Return the destination used by all hiring call-to-action buttons.
 */
function sam_hire_form_url() {
	$custom_url = get_theme_mod( 'sam_hire_form_url' );
	if ( ! empty( $custom_url ) && $custom_url !== home_url( '/hire-talent/' ) ) {
		return $custom_url;
	}
	return sam_get_page_url_by_slug( 'hire-talent' );
}

/**
 * Return the destination used by candidate registration call-to-action buttons.
 */
function sam_candidate_form_url() {
	return sam_get_page_url_by_slug( 'candidate-form' );
}

/**
 * Create the pages used by the primary navigation automatically if missing without duplicating.
 */
function sam_create_default_pages_and_menu() {
	$pages = array(
		'home' => array(
			'title'    => 'Home',
			'slug'     => 'home',
			'template' => 'default',
		),
		'about' => array(
			'title'    => 'About Us',
			'slug'     => 'about-us',
			'template' => 'page-about.php',
		),
		'employers' => array(
			'title'    => 'For Employers',
			'slug'     => 'for-employers',
			'template' => 'page-for-employers.php',
		),
		'payroll' => array(
			'title'    => 'Payroll',
			'slug'     => 'payroll',
			'template' => 'page-payroll.php',
		),
		'assured' => array(
			'title'    => 'SAM Assured',
			'slug'     => 'sam-assured',
			'template' => 'page-sam-assured.php',
		),
		'hire' => array(
			'title'    => 'Hire Talent',
			'slug'     => 'hire-talent',
			'template' => 'page-hire-talent.php',
		),
		'candidate' => array(
			'title'    => 'Candidate Registration',
			'slug'     => 'candidate-form',
			'template' => 'page-candidate-form.php',
		),
	);

	$page_ids = array();
	foreach ( $pages as $key => $page_data ) {
		$existing_page = get_page_by_path( $page_data['slug'], OBJECT, 'page' );
		if ( ! $existing_page ) {
			$pages_query = get_posts( array(
				'name'        => $page_data['slug'],
				'post_type'   => 'page',
				'post_status' => array( 'publish', 'draft', 'pending', 'private' ),
				'numberposts' => 1,
			) );
			if ( ! empty( $pages_query ) ) {
				$existing_page = $pages_query[0];
			}
		}

		if ( $existing_page ) {
			$page_id = $existing_page->ID;
			if ( 'publish' !== $existing_page->post_status ) {
				wp_update_post( array(
					'ID'          => $page_id,
					'post_status' => 'publish',
				) );
			}
		} else {
			$page_id = wp_insert_post( array(
				'post_title'   => $page_data['title'],
				'post_name'    => $page_data['slug'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			) );
		}

		if ( ! is_wp_error( $page_id ) && $page_id ) {
			$page_ids[ $key ] = (int) $page_id;
			if ( 'default' !== $page_data['template'] ) {
				update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
			}
		}
	}

	// Standard WordPress front page setting so front-page.php is only used for root home
	update_option( 'show_on_front', 'posts' );
	update_option( 'page_on_front', 0 );

	// Create or assign Primary Menu
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	$menu_id   = ! empty( $locations['primary'] ) ? (int) $locations['primary'] : 0;

	if ( ! $menu_id ) {
		$menu_name = 'Primary Menu';
		$menu      = wp_get_nav_menu_object( $menu_name );
		$menu_id   = $menu ? $menu->term_id : wp_create_nav_menu( $menu_name );

		if ( ! is_wp_error( $menu_id ) && $menu_id ) {
			$locations['primary'] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	if ( $menu_id && ! is_wp_error( $menu_id ) ) {
		$existing_items = wp_get_nav_menu_items( $menu_id );
		$has_page_items  = false;
		if ( ! empty( $existing_items ) ) {
			foreach ( $existing_items as $item ) {
				if ( 'post_type' === $item->type && 'page' === $item->object && in_array( (int) $item->object_id, $page_ids, true ) ) {
					$has_page_items = true;
					break;
				}
			}
		}

		if ( ! $has_page_items ) {
			if ( ! empty( $existing_items ) ) {
				foreach ( $existing_items as $item ) {
					wp_delete_post( $item->ID, true );
				}
			}

			foreach ( $page_ids as $key => $page_id ) {
				if ( 'hire' === $key || 'candidate' === $key ) {
					continue;
				}
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-object-id' => $page_id,
					'menu-item-object'    => 'page',
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
					'menu-item-title'     => $pages[ $key ]['title'],
				) );
			}
		}
	}
}
add_action( 'after_switch_theme', 'sam_create_default_pages_and_menu' );

/**
 * Ensure default pages exist on init if missing
 */
function sam_ensure_default_pages_and_menu_on_init() {
	// Pretty page URLs such as /about-us/ require a permalink structure.
	// A fresh local WordPress install can have this option empty, which makes
	// every rewritten page request fall back to the blog home query.
	if ( ! get_option( 'permalink_structure' ) ) {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
		$wp_rewrite->flush_rules();
	}

	if ( 'page' === get_option( 'show_on_front' ) && ! get_option( 'page_on_front' ) ) {
		update_option( 'show_on_front', 'posts' );
		update_option( 'page_on_front', 0 );
	}

	if ( ! is_admin() ) {
		$about_page = get_page_by_path( 'about-us', OBJECT, 'page' );
		if ( ! $about_page || 'publish' !== $about_page->post_status ) {
			sam_create_default_pages_and_menu();
		}
	}
}
add_action( 'init', 'sam_ensure_default_pages_and_menu_on_init', 1 );

/**
 * Filter option_show_on_front to return 'posts' when page_on_front is unassigned, preventing WP query parser from marking inner pages as front page
 */
function sam_prevent_invalid_front_page_matching( $val ) {
	if ( 'page' === $val && ! get_option( 'page_on_front' ) ) {
		return 'posts';
	}
	return $val;
}
add_filter( 'option_show_on_front', 'sam_prevent_invalid_front_page_matching' );

/**
 * Template Filter: Ensure front-page.php is ONLY used for Home, and each inner page loads its dedicated template file
 */
function sam_custom_template_include( $template ) {
	if ( is_admin() ) {
		return $template;
	}

	if ( is_front_page() && ! is_page() ) {
		$front_file = get_template_directory() . '/front-page.php';
		if ( file_exists( $front_file ) ) {
			return $front_file;
		}
		return $template;
	}

	if ( is_page() ) {
		global $post;
		if ( $post ) {
			$slug = $post->post_name;
			$mapping = array(
				'about-us'      => 'page-about.php',
				'about'         => 'page-about.php',
				'for-employers' => 'page-for-employers.php',
				'payroll'       => 'page-payroll.php',
				'sam-assured'   => 'page-sam-assured.php',
				'hire-talent'   => 'page-hire-talent.php',
				'candidate-form'=> 'page-candidate-form.php',
				'candidate'     => 'page-candidate-form.php',
				'apply'         => 'page-candidate-form.php',
			);

			if ( isset( $mapping[ $slug ] ) ) {
				$file = get_template_directory() . '/' . $mapping[ $slug ];
				if ( file_exists( $file ) ) {
					return $file;
				}
			}

			$template_meta = get_post_meta( $post->ID, '_wp_page_template', true );
			if ( ! empty( $template_meta ) && 'default' !== $template_meta ) {
				$file = get_template_directory() . '/' . $template_meta;
				if ( file_exists( $file ) ) {
					return $file;
				}
			}
		}
	}

	return $template;
}
add_filter( 'template_include', 'sam_custom_template_include', 99 );

/**
 * Safe query diagnostics helper (active when ?sam_debug=1 is appended to URL)
 */
function sam_debug_routing_header() {
	if ( isset( $_GET['sam_debug'] ) && '1' === $_GET['sam_debug'] ) {
		global $post;
		echo '<div style="background:#111;color:#0f0;padding:15px;font-family:monospace;font-size:13px;z-index:99999;position:relative;">';
		echo '<strong>SAM Route Debugger:</strong><br>';
		echo 'Requested URL: ' . esc_html( $_SERVER['REQUEST_URI'] ?? '' ) . '<br>';
		echo 'is_404: ' . ( is_404() ? 'YES' : 'NO' ) . '<br>';
		echo 'is_page: ' . ( is_page() ? 'YES' : 'NO' ) . '<br>';
		echo 'is_front_page: ' . ( is_front_page() ? 'YES' : 'NO' ) . '<br>';
		echo 'queried_object_id: ' . esc_html( get_queried_object_id() ) . '<br>';
		echo 'post_title: ' . esc_html( $post ? $post->post_title : 'None' ) . '<br>';
		echo 'post_status: ' . esc_html( $post ? $post->post_status : 'None' ) . '<br>';
		echo 'post_name (slug): ' . esc_html( $post ? $post->post_name : 'None' ) . '<br>';
		echo 'page_template_meta: ' . esc_html( $post ? get_post_meta( $post->ID, '_wp_page_template', true ) : 'None' ) . '<br>';
		echo '</div>';
	}
}
add_action( 'wp_head', 'sam_debug_routing_header' );

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

	register_post_type( 'sam_candidate', array(
		'labels' => array(
			'name'          => 'Candidate Submissions',
			'singular_name' => 'Candidate Profile',
			'add_new_item'  => 'Add New Candidate Profile',
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-id-alt',
		'supports'     => array( 'title', 'custom-fields' ),
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

	$wp_customize->add_setting( 'sam_hire_form_url', array( 'default' => home_url( '/hire-talent/' ), 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'sam_hire_form_url', array( 'label' => 'Hire Talent CTA URL', 'description' => 'Defaults to the built-in requirement form. Enter an external URL only if you prefer another form.', 'section' => 'sam_contact', 'type' => 'url' ) );

	$wp_customize->add_setting( 'sam_hiring_form_recipient', array( 'default' => 'srivastwaadarsh@gmail.com', 'sanitize_callback' => 'sanitize_email' ) );
	$wp_customize->add_control( 'sam_hiring_form_recipient', array( 'label' => 'Hiring Form Recipient Email', 'section' => 'sam_contact', 'type' => 'email' ) );

	$wp_customize->add_setting( 'sam_address', array( 'default' => 'A-701, Tower T2, IT City Center, Trichardra-2, Noida West, Uttar Pradesh' ) );
	$wp_customize->add_control( 'sam_address', array( 'label' => 'Office Address', 'section' => 'sam_contact', 'type' => 'textarea' ) );
}
add_action( 'customize_register', 'sam_customize_register' );

/**
 * Process the hiring requirement form. WP Mail SMTP automatically handles
 * delivery when it is installed and configured in WordPress.
 */
function sam_handle_hiring_form() {
	$redirect_url = wp_get_referer() ? wp_get_referer() : home_url( '/hire-talent/' );

	if ( ! isset( $_POST['sam_hiring_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sam_hiring_nonce'] ) ), 'sam_submit_hiring_requirement' ) ) {
		wp_safe_redirect( add_query_arg( 'form_status', 'invalid', $redirect_url ) );
		exit;
	}

	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'form_status', 'success', $redirect_url ) );
		exit;
	}

	$fields = array(
		'name'     => sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) ),
		'company'  => sanitize_text_field( wp_unslash( $_POST['company'] ?? '' ) ),
		'email'    => sanitize_email( wp_unslash( $_POST['email'] ?? '' ) ),
		'phone'    => sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) ),
		'roles'    => sanitize_textarea_field( wp_unslash( $_POST['roles'] ?? '' ) ),
		'headcount'=> absint( $_POST['headcount'] ?? 0 ),
		'timeline' => sanitize_text_field( wp_unslash( $_POST['timeline'] ?? '' ) ),
		'message'  => sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) ),
	);

	if ( ! $fields['name'] || ! $fields['company'] || ! is_email( $fields['email'] ) || ! $fields['phone'] || ! $fields['roles'] || ! $fields['timeline'] ) {
		wp_safe_redirect( add_query_arg( 'form_status', 'error', $redirect_url ) );
		exit;
	}

	$body = "New hiring requirement received:\n\n";
	$labels = array( 'name' => 'Name', 'company' => 'Company', 'email' => 'Email', 'phone' => 'Phone', 'roles' => 'Roles required', 'headcount' => 'Headcount', 'timeline' => 'Joining timeline', 'message' => 'Additional details' );
	foreach ( $labels as $key => $label ) {
		$body .= $label . ': ' . ( $fields[ $key ] ? $fields[ $key ] : 'Not provided' ) . "\n";
	}

	$recipient = get_theme_mod( 'sam_hiring_form_recipient', 'srivastwaadarsh@gmail.com' );
	$sent      = wp_mail( $recipient, 'New hiring requirement from ' . $fields['company'], $body, array( 'Reply-To: ' . $fields['name'] . ' <' . $fields['email'] . '>' ) );
	wp_safe_redirect( add_query_arg( 'form_status', $sent ? 'success' : 'mail-error', $redirect_url ) );
	exit;
}
add_action( 'admin_post_nopriv_sam_submit_hiring_requirement', 'sam_handle_hiring_form' );
add_action( 'admin_post_sam_submit_hiring_requirement', 'sam_handle_hiring_form' );

/**
 * Process candidate registration form with file uploads (Resume & Notice Document).
 */
function sam_handle_candidate_form() {
	$redirect_url = wp_get_referer() ? wp_get_referer() : home_url( '/candidate-form/' );

	if ( ! isset( $_POST['sam_candidate_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sam_candidate_nonce'] ) ), 'sam_submit_candidate_profile' ) ) {
		wp_safe_redirect( add_query_arg( 'form_status', 'invalid', $redirect_url ) );
		exit;
	}

	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'form_status', 'success', $redirect_url ) );
		exit;
	}

	$fields = array(
		'full_name'           => sanitize_text_field( wp_unslash( $_POST['full_name'] ?? '' ) ),
		'phone'               => sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) ),
		'email'               => sanitize_email( wp_unslash( $_POST['email'] ?? '' ) ),
		'current_role'        => sanitize_text_field( wp_unslash( $_POST['current_role'] ?? '' ) ),
		'total_experience'    => sanitize_text_field( wp_unslash( $_POST['total_experience'] ?? '' ) ),
		'primary_skill'       => sanitize_text_field( wp_unslash( $_POST['primary_skill'] ?? '' ) ),
		'current_location'    => sanitize_text_field( wp_unslash( $_POST['current_location'] ?? '' ) ),
		'skills'              => sanitize_textarea_field( wp_unslash( $_POST['skills'] ?? '' ) ),
		'serving_notice'      => sanitize_text_field( wp_unslash( $_POST['serving_notice'] ?? 'No' ) ),
		'joining_timeline'    => sanitize_text_field( wp_unslash( $_POST['joining_timeline'] ?? '' ) ),
		'offer_in_hand'       => sanitize_text_field( wp_unslash( $_POST['offer_in_hand'] ?? '' ) ),
		'contract_role_ready' => sanitize_text_field( wp_unslash( $_POST['contract_role_ready'] ?? '' ) ),
		'current_ctc'         => sanitize_text_field( wp_unslash( $_POST['current_ctc'] ?? '' ) ),
		'expected_ctc'        => sanitize_text_field( wp_unslash( $_POST['expected_ctc'] ?? '' ) ),
	);

	if ( ! $fields['full_name'] || ! $fields['phone'] || ! is_email( $fields['email'] ) || ! $fields['current_role'] || ! $fields['total_experience'] || ! $fields['primary_skill'] || ! $fields['current_location'] || ! $fields['joining_timeline'] || ! $fields['current_ctc'] || ! $fields['expected_ctc'] ) {
		wp_safe_redirect( add_query_arg( 'form_status', 'error', $redirect_url ) );
		exit;
	}

	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	$attachments      = array();
	$resume_url       = '';
	$notice_doc_url   = '';
	$upload_overrides = array( 'test_form' => false );

	// Resume Upload
	if ( isset( $_FILES['resume_file'] ) && ! empty( $_FILES['resume_file']['name'] ) ) {
		$resume_file = $_FILES['resume_file'];
		$movefile    = wp_handle_upload( $resume_file, $upload_overrides );
		if ( $movefile && ! isset( $movefile['error'] ) ) {
			$resume_url    = $movefile['url'];
			$attachments[] = $movefile['file'];
		} else {
			wp_safe_redirect( add_query_arg( 'form_status', 'upload-error', $redirect_url ) );
			exit;
		}
	} else {
		wp_safe_redirect( add_query_arg( 'form_status', 'error', $redirect_url ) );
		exit;
	}

	// Notice Period Document Upload (Optional / Conditional)
	if ( isset( $_FILES['notice_doc'] ) && ! empty( $_FILES['notice_doc']['name'] ) ) {
		$notice_doc_file = $_FILES['notice_doc'];
		$movefile        = wp_handle_upload( $notice_doc_file, $upload_overrides );
		if ( $movefile && ! isset( $movefile['error'] ) ) {
			$notice_doc_url = $movefile['url'];
			$attachments[]  = $movefile['file'];
		}
	}

	// Store candidate submission as Custom Post Type in WP Admin
	$post_id = wp_insert_post( array(
		'post_title'  => $fields['full_name'] . ' - ' . $fields['current_role'],
		'post_type'   => 'sam_candidate',
		'post_status' => 'publish',
	) );

	if ( $post_id && ! is_wp_error( $post_id ) ) {
		foreach ( $fields as $key => $val ) {
			update_post_meta( $post_id, '_' . $key, $val );
		}
		if ( $resume_url ) {
			update_post_meta( $post_id, '_resume_url', $resume_url );
		}
		if ( $notice_doc_url ) {
			update_post_meta( $post_id, '_notice_doc_url', $notice_doc_url );
		}
	}

	// Email Notification
	$body   = "New Candidate Profile Registration Received:\n\n";
	$labels = array(
		'full_name'           => 'Full Name',
		'phone'               => 'Contact No.',
		'email'               => 'Email',
		'current_role'        => 'Current Role',
		'total_experience'    => 'Total Experience',
		'primary_skill'       => 'Primary Skill',
		'skills'              => 'All Key Skills',
		'current_location'    => 'Current Location',
		'serving_notice'      => 'Serving Notice Period?',
		'joining_timeline'    => 'Joining Timeline',
		'offer_in_hand'       => 'Offer in Hand?',
		'contract_role_ready' => 'Comfortable with Contract Role?',
		'current_ctc'         => 'Current CTC',
		'expected_ctc'        => 'Expected CTC',
	);

	foreach ( $labels as $key => $label ) {
		$body .= $label . ': ' . ( ! empty( $fields[ $key ] ) ? $fields[ $key ] : 'N/A' ) . "\n";
	}

	if ( $resume_url ) {
		$body .= "Resume Link: " . $resume_url . "\n";
	}
	if ( $notice_doc_url ) {
		$body .= "Notice Period Document Link: " . $notice_doc_url . "\n";
	}

	$recipient = get_theme_mod( 'sam_hiring_form_recipient', 'srivastwaadarsh@gmail.com' );
	$sent      = wp_mail(
		$recipient,
		'New Candidate Submission: ' . $fields['full_name'] . ' (' . $fields['primary_skill'] . ')',
		$body,
		array( 'Reply-To: ' . $fields['full_name'] . ' <' . $fields['email'] . '>' ),
		$attachments
	);

	wp_safe_redirect( add_query_arg( 'form_status', 'success', $redirect_url ) );
	exit;
}
add_action( 'admin_post_nopriv_sam_submit_candidate_profile', 'sam_handle_candidate_form' );
add_action( 'admin_post_sam_submit_candidate_profile', 'sam_handle_candidate_form' );
