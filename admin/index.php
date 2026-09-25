<?php
/**
 * SAM Manpower — Standalone Custom Executive Admin Panel
 * 
 * 100% Custom Built Admin Dashboard (Independent from default WP-Admin)
 * Manages Candidates (CVs), Employer Mandates, and Contact Inquiries.
 */
session_start();

// Locate and load WordPress core database functions without WP Admin UI
$wp_load_path = '';
$check_dir = __DIR__;
for ( $i = 0; $i < 6; $i++ ) {
	if ( file_exists( $check_dir . '/wp-load.php' ) ) {
		$wp_load_path = $check_dir . '/wp-load.php';
		break;
	}
	$check_dir = dirname( $check_dir );
}
if ( $wp_load_path ) {
	require_once $wp_load_path;
}

// Credentials
$DEFAULT_EMAIL = 'sales@samcareer.com';
$DEFAULT_PASS  = 'sam@admin';

// Handle Logout
if ( isset( $_GET['action'] ) && 'logout' === $_GET['action'] ) {
	unset( $_SESSION['sam_custom_admin_auth'] );
	session_destroy();
	header( 'Location: index.php' );
	exit;
}

// Handle Login Form Submission
$login_error = '';
if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['sam_custom_login'] ) ) {
	$input_email = trim( $_POST['admin_email'] ?? '' );
	$input_pass  = $_POST['admin_password'] ?? '';

	if ( ( $input_email === $DEFAULT_EMAIL || $input_email === 'sam_admin' ) && $input_pass === $DEFAULT_PASS ) {
		$_SESSION['sam_custom_admin_auth'] = true;
		$_SESSION['sam_admin_email']       = $DEFAULT_EMAIL;
		header( 'Location: index.php' );
		exit;
	} else {
		// Also check WordPress users if matched
		if ( function_exists( 'wp_authenticate' ) ) {
			$wp_user = wp_authenticate( $input_email, $input_pass );
			if ( ! is_wp_error( $wp_user ) && in_array( 'administrator', (array) $wp_user->roles ) ) {
				$_SESSION['sam_custom_admin_auth'] = true;
				$_SESSION['sam_admin_email']       = $wp_user->user_email ?: $DEFAULT_EMAIL;
				header( 'Location: index.php' );
				exit;
			}
		}
		$login_error = 'Invalid email address or password. Please check your credentials.';
	}
}

// Check Authentication
$is_authenticated = ! empty( $_SESSION['sam_custom_admin_auth'] );

// Handle CSV Export
if ( $is_authenticated && isset( $_GET['export'] ) ) {
	$export_type = preg_replace( '/[^a-z_]/', '', $_GET['export'] );
	$filename    = 'sam_' . $export_type . '_export_' . date( 'Y-m-d_H-i' ) . '.csv';

	header( 'Content-Type: text/csv; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=' . $filename );

	$output = fopen( 'php://output', 'w' );
	fputs( $output, "\xEF\xBB\xBF" ); // UTF-8 BOM for Excel

	if ( 'candidates' === $export_type || 'all' === $export_type ) {
		fputcsv( $output, array( '--- CANDIDATE PROFILES ---' ) );
		fputcsv( $output, array(
			'ID', 'Date', 'Full Name', 'Email', 'Contact No.', 'Current Role',
			'Total Experience', 'Primary Skill', 'All Skills', 'Current Location',
			'Serving Notice?', 'Joining Timeline', 'Offer in Hand?', 'Contract Ready?',
			'Current CTC', 'Expected CTC', 'Resume URL', 'Notice Doc URL'
		) );

		if ( function_exists( 'get_posts' ) ) {
			$candidates = get_posts( array( 'post_type' => 'sam_candidate', 'posts_per_page' => -1, 'post_status' => 'any', 'orderby' => 'date', 'order' => 'DESC' ) );
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
		}
		fputcsv( $output, array() );
	}

	if ( 'hiring' === $export_type || 'all' === $export_type ) {
		fputcsv( $output, array( '--- EMPLOYER HIRING MANDATES ---' ) );
		fputcsv( $output, array(
			'ID', 'Date', 'Company Name', 'Contact Person', 'Work Email',
			'Phone', 'Engagement Model', 'Domain', 'Roles Required',
			'Headcount', 'Joining Timeline', 'Location', 'Experience', 'Budget', 'Notes'
		) );

		if ( function_exists( 'get_posts' ) ) {
			$mandates = get_posts( array( 'post_type' => 'sam_inquiry', 'posts_per_page' => -1, 'post_status' => 'any', 'meta_key' => '_sam_inquiry_type', 'meta_value' => 'hiring', 'orderby' => 'date', 'order' => 'DESC' ) );
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
		}
		fputcsv( $output, array() );
	}

	if ( 'contact' === $export_type || 'all' === $export_type ) {
		fputcsv( $output, array( '--- CONTACT INQUIRIES ---' ) );
		fputcsv( $output, array(
			'ID', 'Date', 'Full Name', 'Email', 'Phone', 'Subject', 'Message'
		) );

		if ( function_exists( 'get_posts' ) ) {
			$contacts = get_posts( array( 'post_type' => 'sam_inquiry', 'posts_per_page' => -1, 'post_status' => 'any', 'meta_key' => '_sam_inquiry_type', 'meta_value' => 'contact', 'orderby' => 'date', 'order' => 'DESC' ) );
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
	}

	fclose( $output );
	exit;
}

// Handle Delete Action
if ( $is_authenticated && isset( $_GET['action'] ) && 'delete' === $_GET['action'] && isset( $_GET['id'] ) ) {
	$del_id = intval( $_GET['id'] );
	if ( $del_id > 0 && function_exists( 'wp_delete_post' ) ) {
		wp_delete_post( $del_id, true );
	}
	$tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'overview';
	header( 'Location: index.php?tab=' . $tab );
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SAM Manpower — Executive Admin Panel</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

	<style>
		:root {
			--bg-dark: #0A0F1D;
			--bg-sidebar: #0F172A;
			--bg-card: #131E36;
			--bg-card-hover: #172440;
			--border: rgba(255, 255, 255, 0.08);
			--border-focus: #0284C7;
			--primary: #0284C7;
			--primary-hover: #0369A1;
			--accent: #38BDF8;
			--text-main: #F8FAFC;
			--text-muted: #94A3B8;
			--text-dim: #64748B;
			--badge-green-bg: rgba(16, 185, 129, 0.15);
			--badge-green-text: #34D399;
			--badge-amber-bg: rgba(245, 158, 11, 0.15);
			--badge-amber-text: #FBBF24;
			--badge-blue-bg: rgba(2, 132, 199, 0.15);
			--badge-blue-text: #38BDF8;
			--radius: 12px;
		}

		* { margin:0; padding:0; box-sizing:border-box; }
		body {
			background: var(--bg-dark);
			color: var(--text-main);
			font-family: 'Inter', -apple-system, sans-serif;
			min-height: 100vh;
			display: flex;
			flex-direction: column;
		}

		/* ===================================================================
		   STANDALONE LOGIN SCREEN
		   =================================================================== */
		.login-wrapper {
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 24px;
			background: radial-gradient(circle at top, #1E293B 0%, #0A0F1D 100%);
		}
		.login-card {
			width: 100%;
			max-width: 440px;
			background: rgba(15, 23, 42, 0.85);
			border: 1px solid rgba(255,255,255,0.1);
			backdrop-filter: blur(16px);
			border-radius: 20px;
			padding: 40px 36px;
			box-shadow: 0 25px 60px rgba(0,0,0,0.6);
		}
		.login-brand-logo {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			background: linear-gradient(135deg, #0284C7, #2563EB);
			color: #fff;
			font-weight: 800;
			font-size: 1.3rem;
			padding: 8px 16px;
			border-radius: 10px;
			letter-spacing: .05em;
			margin-bottom: 20px;
			box-shadow: 0 4px 15px rgba(2,132,199,0.4);
		}
		.login-title {
			font-family: 'Plus Jakarta Sans', sans-serif;
			font-size: 1.55rem;
			font-weight: 700;
			color: #fff;
			margin-bottom: 8px;
		}
		.login-subtitle {
			color: var(--text-muted);
			font-size: .88rem;
			line-height: 1.5;
			margin-bottom: 28px;
		}
		.login-alert {
			background: rgba(239, 68, 68, 0.12);
			border: 1px solid rgba(239, 68, 68, 0.3);
			color: #FCA5A5;
			padding: 12px 16px;
			border-radius: 10px;
			font-size: .86rem;
			margin-bottom: 20px;
		}
		.login-form-group {
			margin-bottom: 20px;
		}
		.login-form-group label {
			display: block;
			font-size: .82rem;
			font-weight: 600;
			color: #CBD5E1;
			margin-bottom: 8px;
			text-transform: uppercase;
			letter-spacing: .04em;
		}
		.login-form-group input {
			width: 100%;
			background: rgba(30, 41, 59, 0.7);
			border: 1px solid rgba(255,255,255,0.12);
			border-radius: 10px;
			padding: 13px 16px;
			color: #fff;
			font-size: .95rem;
			outline: none;
			transition: all .2s;
		}
		.login-form-group input:focus {
			border-color: var(--primary);
			box-shadow: 0 0 0 3px rgba(2,132,199,0.25);
			background: rgba(30, 41, 59, 0.95);
		}
		.login-btn {
			width: 100%;
			background: linear-gradient(135deg, #0284C7, #2563EB);
			color: #fff;
			border: none;
			padding: 14px;
			border-radius: 10px;
			font-size: .98rem;
			font-weight: 700;
			cursor: pointer;
			box-shadow: 0 4px 15px rgba(2,132,199,0.35);
			transition: opacity .2s;
			margin-top: 10px;
		}
		.login-btn:hover { opacity: .92; }
		.login-footer-info {
			text-align: center;
			margin-top: 24px;
			font-size: .82rem;
			color: var(--text-dim);
		}
		.login-footer-info a { color: var(--accent); text-decoration: none; }

		/* ===================================================================
		   STANDALONE DASHBOARD LAYOUT
		   =================================================================== */
		.dash-layout {
			display: flex;
			min-height: 100vh;
		}

		/* Left Sidebar */
		.dash-sidebar {
			width: 270px;
			background: var(--bg-sidebar);
			border-right: 1px solid var(--border);
			display: flex;
			flex-direction: column;
			flex-shrink: 0;
		}
		.sidebar-brand {
			padding: 24px 20px;
			display: flex;
			align-items: center;
			gap: 12px;
			border-bottom: 1px solid var(--border);
		}
		.sidebar-brand-text h2 {
			font-family: 'Plus Jakarta Sans', sans-serif;
			font-size: 1.05rem;
			font-weight: 800;
			color: #fff;
			line-height: 1.2;
		}
		.sidebar-brand-text small {
			font-size: .74rem;
			color: var(--accent);
			text-transform: uppercase;
			letter-spacing: .05em;
		}
		.sidebar-menu {
			padding: 20px 12px;
			list-style: none;
			flex: 1;
		}
		.sidebar-menu-item {
			margin-bottom: 6px;
		}
		.sidebar-link {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 12px 16px;
			border-radius: 10px;
			color: var(--text-muted);
			text-decoration: none;
			font-size: .9rem;
			font-weight: 600;
			transition: all .2s;
		}
		.sidebar-link:hover {
			color: #fff;
			background: rgba(255,255,255,0.04);
		}
		.sidebar-link.active {
			color: #fff;
			background: var(--primary);
			box-shadow: 0 4px 15px rgba(2,132,199,0.3);
		}
		.sidebar-link-inner {
			display: flex;
			align-items: center;
			gap: 10px;
		}
		.sidebar-badge {
			background: rgba(255,255,255,0.15);
			color: #fff;
			font-size: .74rem;
			padding: 2px 7px;
			border-radius: 20px;
			font-weight: 700;
		}
		.sidebar-footer {
			padding: 18px 20px;
			border-top: 1px solid var(--border);
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.sidebar-user-pill {
			display: flex;
			align-items: center;
			gap: 10px;
		}
		.sidebar-user-avatar {
			width: 36px;
			height: 36px;
			border-radius: 50%;
			background: #1E293B;
			border: 1px solid var(--border);
			display: flex;
			align-items: center;
			justify-content: center;
			font-weight: 700;
			color: var(--accent);
		}
		.sidebar-user-info strong { display:block; font-size:.82rem; color:#fff; }
		.sidebar-user-info small { font-size:.74rem; color:var(--text-dim); }

		/* Main Content Area */
		.dash-main {
			flex: 1;
			display: flex;
			flex-direction: column;
			background: var(--bg-dark);
			overflow-x: hidden;
		}

		/* Top Navigation */
		.dash-topbar {
			height: 72px;
			background: rgba(15, 23, 42, 0.7);
			backdrop-filter: blur(12px);
			border-bottom: 1px solid var(--border);
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 32px;
			position: sticky;
			top: 0;
			z-index: 10;
		}
		.dash-topbar-title {
			font-family: 'Plus Jakarta Sans', sans-serif;
			font-size: 1.2rem;
			font-weight: 700;
			color: #fff;
		}
		.dash-topbar-actions {
			display: flex;
			align-items: center;
			gap: 14px;
		}
		.action-btn {
			display: inline-flex;
			align-items: center;
			gap: 6px;
			padding: 9px 16px;
			border-radius: 9px;
			font-size: .85rem;
			font-weight: 600;
			text-decoration: none;
			cursor: pointer;
			transition: all .2s;
			border: 1px solid transparent;
		}
		.btn-export {
			background: var(--primary);
			color: #fff;
		}
		.btn-export:hover { background: var(--primary-hover); }
		.btn-site {
			background: #1E293B;
			color: var(--text-muted);
			border-color: var(--border);
		}
		.btn-site:hover { color: #fff; background: #334155; }
		.btn-logout {
			background: rgba(239, 68, 68, 0.12);
			color: #F87171;
			border-color: rgba(239, 68, 68, 0.25);
		}
		.btn-logout:hover { background: rgba(239, 68, 68, 0.22); }

		/* Dash Body Container */
		.dash-content {
			padding: 32px;
			flex: 1;
		}

		/* KPI Metric Cards */
		.kpi-row {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
			gap: 20px;
			margin-bottom: 30px;
		}
		.kpi-card {
			background: var(--bg-card);
			border: 1px solid var(--border);
			border-radius: var(--radius);
			padding: 22px 24px;
			display: flex;
			align-items: center;
			gap: 18px;
			box-shadow: 0 4px 20px rgba(0,0,0,0.2);
			transition: all .2s;
		}
		.kpi-card:hover {
			border-color: rgba(255,255,255,0.18);
			transform: translateY(-2px);
		}
		.kpi-icon-box {
			width: 52px;
			height: 52px;
			border-radius: 14px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 1.5rem;
			flex-shrink: 0;
		}
		.kpi-val {
			font-family: 'Plus Jakarta Sans', sans-serif;
			font-size: 1.75rem;
			font-weight: 800;
			color: #fff;
			line-height: 1.1;
		}
		.kpi-label {
			display: block;
			font-size: .8rem;
			color: var(--text-muted);
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: .04em;
			margin-bottom: 3px;
		}

		/* Panels & Data Tables */
		.data-panel {
			background: var(--bg-card);
			border: 1px solid var(--border);
			border-radius: var(--radius);
			padding: 26px;
			box-shadow: 0 4px 25px rgba(0,0,0,0.25);
			margin-bottom: 28px;
		}
		.panel-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 22px;
			padding-bottom: 16px;
			border-bottom: 1px solid var(--border);
			flex-wrap: wrap;
			gap: 14px;
		}
		.panel-header h3 {
			font-family: 'Plus Jakarta Sans', sans-serif;
			font-size: 1.2rem;
			font-weight: 700;
			color: #fff;
		}
		.panel-controls {
			display: flex;
			align-items: center;
			gap: 12px;
		}
		.table-search {
			background: #0F172A;
			border: 1px solid var(--border);
			padding: 9px 16px;
			border-radius: 8px;
			color: #fff;
			font-size: .88rem;
			width: 260px;
			outline: none;
		}
		.table-search:focus { border-color: var(--primary); }

		.custom-table {
			width: 100%;
			border-collapse: collapse;
			font-size: .88rem;
		}
		.custom-table th {
			background: #0F172A;
			color: var(--text-muted);
			text-align: left;
			padding: 13px 16px;
			font-size: .78rem;
			text-transform: uppercase;
			letter-spacing: .05em;
			font-weight: 700;
			border-bottom: 1px solid var(--border);
		}
		.custom-table td {
			padding: 15px 16px;
			border-bottom: 1px solid rgba(255,255,255,0.04);
			color: #E2E8F0;
			vertical-align: middle;
		}
		.custom-table tr:hover td {
			background: rgba(255,255,255,0.02);
		}

		/* Badges */
		.tag {
			display: inline-block;
			padding: 3px 10px;
			border-radius: 20px;
			font-size: .74rem;
			font-weight: 700;
			text-transform: uppercase;
			letter-spacing: .03em;
		}
		.tag-green { background: var(--badge-green-bg); color: var(--badge-green-text); }
		.tag-amber { background: var(--badge-amber-bg); color: var(--badge-amber-text); }
		.tag-blue { background: var(--badge-blue-bg); color: var(--badge-blue-text); }
		.tag-gray { background: rgba(255,255,255,0.08); color: var(--text-muted); }

		.btn-doc {
			display: inline-flex;
			align-items: center;
			gap: 4px;
			padding: 5px 11px;
			border-radius: 6px;
			font-size: .78rem;
			font-weight: 600;
			text-decoration: none;
			color: #fff;
			background: var(--primary);
			transition: opacity .2s;
		}
		.btn-doc:hover { opacity: .9; }
		.btn-doc-sec { background: #334155; }

		.btn-view-modal {
			background: none;
			border: 0;
			color: var(--accent);
			font-weight: 600;
			cursor: pointer;
			font-size: .86rem;
		}
		.btn-view-modal:hover { text-decoration: underline; }

		.btn-del {
			color: #EF4444;
			text-decoration: none;
			font-size: .82rem;
			margin-left: 10px;
		}
		.btn-del:hover { text-decoration: underline; }

		/* Modal Popup */
		.modal-backdrop {
			position: fixed;
			top:0; left:0; width:100%; height:100%;
			background: rgba(5, 10, 20, 0.85);
			backdrop-filter: blur(8px);
			z-index: 9999;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.modal-card {
			background: var(--bg-card);
			border: 1px solid var(--border);
			border-radius: 18px;
			width: 90%;
			max-width: 680px;
			max-height: 85vh;
			display: flex;
			flex-direction: column;
			overflow: hidden;
			box-shadow: 0 25px 60px rgba(0,0,0,0.7);
		}
		.modal-head {
			background: var(--bg-sidebar);
			padding: 20px 26px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			border-bottom: 1px solid var(--border);
		}
		.modal-head h3 { font-size: 1.15rem; color: #fff; }
		.modal-close {
			background: none;
			border: 0;
			color: var(--text-muted);
			font-size: 1.8rem;
			cursor: pointer;
		}
		.modal-close:hover { color: #fff; }
		.modal-body {
			padding: 26px;
			overflow-y: auto;
		}
		.detail-grid {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 14px;
		}
		.detail-cell {
			background: var(--bg-sidebar);
			padding: 12px 16px;
			border-radius: 10px;
			border: 1px solid var(--border);
		}
		.detail-cell strong {
			display: block;
			font-size: .74rem;
			text-transform: uppercase;
			color: var(--text-muted);
			margin-bottom: 4px;
		}
		.detail-cell span {
			color: #fff;
			font-weight: 600;
			font-size: .94rem;
		}
	</style>
</head>
<body>

<?php if ( ! $is_authenticated ) : ?>

	<!-- ===================================================================
	     CUSTOM STANDALONE LOGIN SCREEN
	     =================================================================== -->
	<div class="login-wrapper">
		<div class="login-card">
			<div style="text-align:center;">
				<div class="login-brand-logo">SAM</div>
				<h1 class="login-title">SAM Admin Panel</h1>
				<p class="login-subtitle">Sign in to manage active candidate CVs, employer mandates, and corporate inquiries.</p>
			</div>

			<?php if ( ! empty( $login_error ) ) : ?>
				<div class="login-alert"><?php echo esc_html( $login_error ); ?></div>
			<?php endif; ?>

			<form method="post" action="index.php">
				<input type="hidden" name="sam_custom_login" value="1">

				<div class="login-form-group">
					<label for="admin_email">Email / Username</label>
					<input type="text" id="admin_email" name="admin_email" required value="sales@samcareer.com" placeholder="sales@samcareer.com">
				</div>

				<div class="login-form-group">
					<label for="admin_password">Password</label>
					<input type="password" id="admin_password" name="admin_password" required placeholder="Enter password">
				</div>

				<button type="submit" class="login-btn">
					🔒 Sign In to Admin Panel
				</button>
			</form>

			<div class="login-footer-info">
				<p style="margin-top:12px;"><a href="../">&larr; Back to Website</a></p>
			</div>
		</div>
	</div>

<?php else : ?>

	<!-- ===================================================================
	     CUSTOM STANDALONE EXECUTIVE DASHBOARD
	     =================================================================== -->
	<?php
	$current_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'overview';

	// Stats
	$candidate_count = 0;
	$hiring_count    = 0;
	$contact_count   = 0;

	if ( function_exists( 'wp_count_posts' ) ) {
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
	}
	$total_count = $candidate_count + $hiring_count + $contact_count;
	?>

	<div class="dash-layout">
		
		<!-- Left Sidebar -->
		<aside class="dash-sidebar">
			<div class="sidebar-brand">
				<div class="login-brand-logo" style="margin:0; padding:6px 12px; font-size:1.1rem;">SAM</div>
				<div class="sidebar-brand-text">
					<h2>SAM Manpower</h2>
					<small>Executive Leads Hub</small>
				</div>
			</div>

			<ul class="sidebar-menu">
				<li class="sidebar-menu-item">
					<a href="index.php?tab=overview" class="sidebar-link <?php echo 'overview' === $current_tab ? 'active' : ''; ?>">
						<span class="sidebar-link-inner">📊 Dashboard</span>
						<span class="sidebar-badge"><?php echo esc_html( $total_count ); ?></span>
					</a>
				</li>
				<li class="sidebar-menu-item">
					<a href="index.php?tab=candidates" class="sidebar-link <?php echo 'candidates' === $current_tab ? 'active' : ''; ?>">
						<span class="sidebar-link-inner">🧑‍💼 Candidate CVs</span>
						<span class="sidebar-badge"><?php echo esc_html( $candidate_count ); ?></span>
					</a>
				</li>
				<li class="sidebar-menu-item">
					<a href="index.php?tab=hiring" class="sidebar-link <?php echo 'hiring' === $current_tab ? 'active' : ''; ?>">
						<span class="sidebar-link-inner">🏢 Employer Mandates</span>
						<span class="sidebar-badge"><?php echo esc_html( $hiring_count ); ?></span>
					</a>
				</li>
				<li class="sidebar-menu-item">
					<a href="index.php?tab=contact" class="sidebar-link <?php echo 'contact' === $current_tab ? 'active' : ''; ?>">
						<span class="sidebar-link-inner">✉️ Contact Messages</span>
						<span class="sidebar-badge"><?php echo esc_html( $contact_count ); ?></span>
					</a>
				</li>
			</ul>

			<div class="sidebar-footer">
				<div class="sidebar-user-pill">
					<div class="sidebar-user-avatar">SA</div>
					<div class="sidebar-user-info">
						<strong>SAM Admin</strong>
						<small><?php echo esc_html( $_SESSION['sam_admin_email'] ?? $DEFAULT_EMAIL ); ?></small>
					</div>
				</div>
			</div>
		</aside>

		<!-- Main Section -->
		<main class="dash-main">
			
			<!-- Topbar -->
			<header class="dash-topbar">
				<div class="dash-topbar-title">
					<?php 
					if ( 'candidates' === $current_tab ) echo 'Candidate Profiles &amp; CV Resumes';
					elseif ( 'hiring' === $current_tab ) echo 'Employer Hiring Mandates';
					elseif ( 'contact' === $current_tab ) echo 'Contact &amp; Corporate Inquiries';
					else echo 'Executive Overview Dashboard';
					?>
				</div>

				<div class="dash-topbar-actions">
					<a href="index.php?export=<?php echo 'overview' === $current_tab ? 'all' : $current_tab; ?>" class="action-btn btn-export">
						📥 Export <?php echo esc_html( ucfirst( $current_tab ) ); ?> CSV
					</a>
					<a href="../" class="action-btn btn-site" target="_blank">
						🌐 Open Website
					</a>
					<a href="index.php?action=logout" class="action-btn btn-logout">
						🚪 Logout
					</a>
				</div>
			</header>

			<!-- Content Area -->
			<div class="dash-content">
				
				<!-- KPI Cards -->
				<div class="kpi-row">
					<div class="kpi-card">
						<div class="kpi-icon-box" style="background:rgba(2,132,199,0.15); color:#38BDF8;">📊</div>
						<div>
							<span class="kpi-label">Total Submissions</span>
							<strong class="kpi-val"><?php echo esc_html( $total_count ); ?></strong>
						</div>
					</div>

					<div class="kpi-card">
						<div class="kpi-icon-box" style="background:rgba(16,185,129,0.15); color:#34D399;">🧑‍💼</div>
						<div>
							<span class="kpi-label">Candidate CVs</span>
							<strong class="kpi-val"><?php echo esc_html( $candidate_count ); ?></strong>
						</div>
					</div>

					<div class="kpi-card">
						<div class="kpi-icon-box" style="background:rgba(245,158,11,0.15); color:#FBBF24;">🏢</div>
						<div>
							<span class="kpi-label">Employer Mandates</span>
							<strong class="kpi-val"><?php echo esc_html( $hiring_count ); ?></strong>
						</div>
					</div>

					<div class="kpi-card">
						<div class="kpi-icon-box" style="background:rgba(139,92,246,0.15); color:#A78BFA;">✉️</div>
						<div>
							<span class="kpi-label">Contact Messages</span>
							<strong class="kpi-val"><?php echo esc_html( $contact_count ); ?></strong>
						</div>
					</div>
				</div>

				<!-- TAB BODIES -->
				<?php if ( 'overview' === $current_tab ) : ?>
					
					<!-- Overview Panels -->
					<div class="data-panel">
						<div class="panel-header">
							<h3>🧑‍💼 Recent Candidate CV Submissions</h3>
							<a href="index.php?tab=candidates" style="color:var(--accent); font-size:.9rem; text-decoration:none; font-weight:600;">View All &rarr;</a>
						</div>
						<?php render_standalone_candidates( 5 ); ?>
					</div>

					<div class="data-panel">
						<div class="panel-header">
							<h3>🏢 Recent Employer Hiring Mandates</h3>
							<a href="index.php?tab=hiring" style="color:var(--accent); font-size:.9rem; text-decoration:none; font-weight:600;">View All &rarr;</a>
						</div>
						<?php render_standalone_hiring( 5 ); ?>
					</div>

				<?php elseif ( 'candidates' === $current_tab ) : ?>

					<div class="data-panel">
						<div class="panel-header">
							<h3>🧑‍💼 All Candidate Applications &amp; Resumes</h3>
							<div class="panel-controls">
								<input type="text" placeholder="🔍 Search name, skill, location..." class="table-search" onkeyup="filterTable('candTable', this.value)">
								<a href="index.php?export=candidates" class="action-btn btn-export" style="padding:7px 14px; font-size:.82rem;">📥 Export CSV</a>
							</div>
						</div>
						<?php render_standalone_candidates( -1, 'candTable' ); ?>
					</div>

				<?php elseif ( 'hiring' === $current_tab ) : ?>

					<div class="data-panel">
						<div class="panel-header">
							<h3>🏢 All Employer Hiring Requirements</h3>
							<div class="panel-controls">
								<input type="text" placeholder="🔍 Search company, role..." class="table-search" onkeyup="filterTable('hiringTable', this.value)">
								<a href="index.php?export=hiring" class="action-btn btn-export" style="padding:7px 14px; font-size:.82rem;">📥 Export CSV</a>
							</div>
						</div>
						<?php render_standalone_hiring( -1, 'hiringTable' ); ?>
					</div>

				<?php elseif ( 'contact' === $current_tab ) : ?>

					<div class="data-panel">
						<div class="panel-header">
							<h3>✉️ General Inquiries &amp; Messages</h3>
							<div class="panel-controls">
								<input type="text" placeholder="🔍 Search name, email, subject..." class="table-search" onkeyup="filterTable('contactTable', this.value)">
								<a href="index.php?export=contact" class="action-btn btn-export" style="padding:7px 14px; font-size:.82rem;">📥 Export CSV</a>
							</div>
						</div>
						<?php render_standalone_contact( -1, 'contactTable' ); ?>
					</div>

				<?php endif; ?>

			</div>
		</main>

	</div>

	<!-- Popup Modal -->
	<div id="samAdminModal" class="modal-backdrop" style="display:none;" onclick="if(event.target===this)closeModal();">
		<div class="modal-card">
			<div class="modal-head">
				<h3 id="modalTitle">Details</h3>
				<button type="button" class="modal-close" onclick="closeModal()">&times;</button>
			</div>
			<div class="modal-body" id="modalBody"></div>
		</div>
	</div>

	<!-- Document / CV Live Viewer Modal -->
	<div id="docViewerModal" class="modal-backdrop" style="display:none;" onclick="if(event.target===this)closeDocViewer();">
		<div class="modal-card" style="max-width:1050px; width:95%; height:90vh;">
			<div class="modal-head">
				<div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
					<h3 id="docViewerTitle" style="font-size:1.05rem;">Document Viewer</h3>
					<a id="docViewerDownloadBtn" href="#" target="_blank" class="btn-doc" style="padding:4px 10px; font-size:.78rem;" download>📥 Download</a>
					<a id="docViewerNewTabBtn" href="#" target="_blank" class="btn-doc btn-doc-sec" style="padding:4px 10px; font-size:.78rem;">↗️ Open in New Tab</a>
				</div>
				<button type="button" class="modal-close" onclick="closeDocViewer()">&times;</button>
			</div>
			<div class="modal-body" style="padding:0; height:calc(100% - 65px); background:#0F172A; display:flex; flex-direction:column; overflow:hidden;">
				<iframe id="docViewerFrame" src="" style="width:100%; height:100%; border:none; background:#ffffff;"></iframe>
			</div>
		</div>
	</div>

	<script>
		function openDocViewer(url, title) {
			if (!url) return;
			document.getElementById('docViewerTitle').innerText = title || 'Document Preview';
			document.getElementById('docViewerDownloadBtn').href = url;
			document.getElementById('docViewerNewTabBtn').href = url;
			
			var isDocx = url.match(/\.(docx?|rtf)$/i);
			if (isDocx && !url.includes('localhost') && !url.includes('127.0.0.1')) {
				document.getElementById('docViewerFrame').src = 'https://docs.google.com/viewer?url=' + encodeURIComponent(url) + '&embedded=true';
			} else {
				document.getElementById('docViewerFrame').src = url;
			}
			document.getElementById('docViewerModal').style.display = 'flex';
		}

		function closeDocViewer() {
			document.getElementById('docViewerFrame').src = '';
			document.getElementById('docViewerModal').style.display = 'none';
		}

		function openModalData(title, details, resumeUrl, noticeDocUrl) {
			document.getElementById('modalTitle').innerText = title;
			var html = '<div class="detail-grid">';
			for (var k in details) {
				if (details[k]) {
					html += '<div class="detail-cell"><strong>' + k + '</strong><span>' + details[k] + '</span></div>';
				}
			}
			html += '</div>';

			if (resumeUrl || noticeDocUrl) {
				html += '<div style="margin-top:20px; display:flex; gap:10px; border-top:1px solid rgba(255,255,255,0.08); padding-top:16px; flex-wrap:wrap;">';
				if (resumeUrl) {
					html += '<button type="button" onclick="openDocViewer(\'' + resumeUrl + '\', \'Resume - ' + encodeURIComponent(title) + '\')" class="btn-doc" style="padding:8px 16px; font-size:.88rem; border:none; cursor:pointer;">👁️ View Resume Online</button>';
					html += '<a href="' + resumeUrl + '" target="_blank" download class="btn-doc btn-doc-sec" style="padding:8px 14px; font-size:.88rem;">📥 Download CV</a>';
				}
				if (noticeDocUrl) {
					html += '<button type="button" onclick="openDocViewer(\'' + noticeDocUrl + '\', \'Notice Letter - ' + encodeURIComponent(title) + '\')" class="btn-doc btn-doc-sec" style="padding:8px 14px; font-size:.88rem; border:none; cursor:pointer;">👁️ View Notice Doc</button>';
				}
				html += '</div>';
			}

			document.getElementById('modalBody').innerHTML = html;
			document.getElementById('samAdminModal').style.display = 'flex';
		}

		function closeModal() {
			document.getElementById('samAdminModal').style.display = 'none';
		}

		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') {
				closeModal();
				closeDocViewer();
			}
		});

		function filterTable(tableId, query) {
			var table = document.getElementById(tableId);
			if (!table) return;
			var rows = table.getElementsByTagName('tr');
			var q = query.toLowerCase();

			for (var i = 1; i < rows.length; i++) {
				var text = rows[i].textContent || rows[i].innerText;
				rows[i].style.display = (text.toLowerCase().indexOf(q) > -1) ? '' : 'none';
			}
		}
	</script>

<?php endif; ?>

</body>
</html>

<?php
// Standalone rendering functions
function render_standalone_candidates( $limit = -1, $table_id = '' ) {
	if ( ! function_exists( 'get_posts' ) ) return;

	$posts = get_posts( array(
		'post_type'      => 'sam_candidate',
		'posts_per_page' => $limit,
		'post_status'    => 'any',
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	if ( empty( $posts ) ) {
		echo '<p style="color:var(--text-dim); padding:20px 0;">No candidate applications received yet.</p>';
		return;
	}
	?>
	<div style="overflow-x:auto;">
		<table class="custom-table" id="<?php echo esc_attr( $table_id ); ?>">
			<thead>
				<tr>
					<th>Candidate Name</th>
					<th>Role &amp; Experience</th>
					<th>Primary Skill</th>
					<th>Location</th>
					<th>CTC (Cur &rarr; Exp)</th>
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

					$details_json = htmlspecialchars( json_encode( array(
						'Candidate Name'         => $name,
						'Email Address'          => $email,
						'Contact Number'         => $phone,
						'Current Designation'    => $role,
						'Total Experience'       => $exp,
						'Primary Expertise'      => $skill,
						'All Technical Skills'   => $all_skills,
						'Current Location'       => $location,
						'Serving Notice Period?' => $serving,
						'Joining Timeline'       => $timeline,
						'Has Offer in Hand?'     => $offer,
						'Open to Contract Role?' => $contract,
						'Current Salary / CTC'   => $curr_ctc,
						'Expected Salary / CTC'  => $exp_ctc,
					) ), ENT_QUOTES, 'UTF-8' );
				?>
				<tr>
					<td>
						<strong style="color:#fff; font-size:.92rem;"><?php echo esc_html( $name ); ?></strong><br>
						<small><a href="mailto:<?php echo esc_attr( $email ); ?>" style="color:var(--accent); text-decoration:none;"><?php echo esc_html( $email ); ?></a></small>
						<?php if ( $phone ) : ?>
							<br><small style="color:var(--text-dim);"><?php echo esc_html( $phone ); ?></small>
						<?php endif; ?>
					</td>
					<td>
						<strong><?php echo esc_html( $role ); ?></strong><br>
						<span class="tag tag-gray"><?php echo esc_html( $exp ); ?></span>
					</td>
					<td>
						<span class="tag tag-blue"><?php echo esc_html( $skill ); ?></span>
					</td>
					<td><?php echo esc_html( $location ); ?></td>
					<td>
						<small>Cur: <strong><?php echo esc_html( $curr_ctc ); ?></strong></small><br>
						<small>Exp: <strong style="color:#34D399;"><?php echo esc_html( $exp_ctc ); ?></strong></small>
					</td>
					<td>
						<?php if ( 'Yes' === $serving ) : ?>
							<span class="tag tag-green">Serving Notice</span><br>
						<?php else : ?>
							<span class="tag tag-gray">Not Serving</span><br>
						<?php endif; ?>
						<small style="color:var(--text-muted);"><?php echo esc_html( $timeline ); ?></small>
					</td>
					<td>
						<?php if ( $resume ) : ?>
							<div style="display:flex; align-items:center; gap:6px;">
								<button type="button" class="btn-doc" onclick="openDocViewer('<?php echo esc_url( $resume ); ?>', 'Resume - <?php echo esc_js( $name ); ?>')" style="cursor:pointer; border:none;">
									👁️ View CV
								</button>
								<a href="<?php echo esc_url( $resume ); ?>" target="_blank" download class="btn-doc btn-doc-sec" title="Download Resume" style="padding:5px 8px;">
									📥
								</a>
							</div>
						<?php else : ?>
							<span style="color:var(--text-dim);">No CV</span>
						<?php endif; ?>

						<?php if ( $notice_doc ) : ?>
							<div style="display:flex; align-items:center; gap:6px; margin-top:6px;">
								<button type="button" class="btn-doc btn-doc-sec" onclick="openDocViewer('<?php echo esc_url( $notice_doc ); ?>', 'Notice Letter - <?php echo esc_js( $name ); ?>')" style="cursor:pointer; border:none; font-size:.74rem;">
									👁️ Notice Doc
								</button>
								<a href="<?php echo esc_url( $notice_doc ); ?>" target="_blank" download class="btn-doc btn-doc-sec" title="Download Notice Doc" style="padding:3px 6px; font-size:.74rem;">
									📥
								</a>
							</div>
						<?php endif; ?>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="btn-view-modal" onclick="openModalData('Candidate: <?php echo esc_js( $name ); ?>', <?php echo esc_attr( $details_json ); ?>, '<?php echo esc_url( $resume ); ?>', '<?php echo esc_url( $notice_doc ); ?>')">
							Full Profile &rarr;
						</button>
						<a href="index.php?tab=candidates&action=delete&id=<?php echo esc_attr( $p->ID ); ?>" class="btn-del" onclick="return confirm('Are you sure you want to delete this candidate?');" title="Delete">🗑️</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
}

function render_standalone_hiring( $limit = -1, $table_id = '' ) {
	if ( ! function_exists( 'get_posts' ) ) return;

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
		echo '<p style="color:var(--text-dim); padding:20px 0;">No employer mandates submitted yet.</p>';
		return;
	}
	?>
	<div style="overflow-x:auto;">
		<table class="custom-table" id="<?php echo esc_attr( $table_id ); ?>">
			<thead>
				<tr>
					<th>Company &amp; Contact</th>
					<th>Roles Required</th>
					<th>Headcount</th>
					<th>Timeline</th>
					<th>Budget / CTC</th>
					<th>Model &amp; Location</th>
					<th>Date</th>
					<th>Action</th>
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
						'Requirement Notes'=> $message,
					) ), ENT_QUOTES, 'UTF-8' );
				?>
				<tr>
					<td>
						<strong style="color:#fff; font-size:.92rem;"><?php echo esc_html( $company ); ?></strong><br>
						<span><?php echo esc_html( $name ); ?></span><br>
						<small><a href="mailto:<?php echo esc_attr( $email ); ?>" style="color:var(--accent); text-decoration:none;"><?php echo esc_html( $email ); ?></a></small>
						<?php if ( $phone ) : ?> &bull; <small style="color:var(--text-dim);"><?php echo esc_html( $phone ); ?></small><?php endif; ?>
					</td>
					<td>
						<div style="max-width:240px; word-break:break-word;">
							<strong><?php echo esc_html( $roles ); ?></strong>
						</div>
					</td>
					<td>
						<span class="tag tag-blue"><?php echo esc_html( $headcount ? $headcount . ' Pos' : 'N/A' ); ?></span>
					</td>
					<td>
						<span class="tag tag-amber"><?php echo esc_html( $timeline ); ?></span>
					</td>
					<td>
						<strong><?php echo esc_html( $budget ?: 'Flexible' ); ?></strong>
					</td>
					<td>
						<span class="tag tag-gray"><?php echo esc_html( $model ?: 'Direct Hiring' ); ?></span><br>
						<small style="color:var(--text-muted);"><?php echo esc_html( $location ); ?></small>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="btn-view-modal" onclick="openModalData('Mandate: <?php echo esc_js( $company ); ?>', <?php echo esc_attr( $details_json ); ?>)">
							Details &rarr;
						</button>
						<a href="index.php?tab=hiring&action=delete&id=<?php echo esc_attr( $p->ID ); ?>" class="btn-del" onclick="return confirm('Are you sure you want to delete this mandate?');" title="Delete">🗑️</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
}

function render_standalone_contact( $limit = -1, $table_id = '' ) {
	if ( ! function_exists( 'get_posts' ) ) return;

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
		echo '<p style="color:var(--text-dim); padding:20px 0;">No contact messages received yet.</p>';
		return;
	}
	?>
	<div style="overflow-x:auto;">
		<table class="custom-table" id="<?php echo esc_attr( $table_id ); ?>">
			<thead>
				<tr>
					<th>Sender</th>
					<th>Inquiry Category</th>
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
						'Sender Name'      => $name,
						'Email Address'    => $email,
						'Contact Phone'    => $phone,
						'Inquiry Category' => $subject,
						'Full Message'     => $message,
					) ), ENT_QUOTES, 'UTF-8' );
				?>
				<tr>
					<td>
						<strong style="color:#fff; font-size:.92rem;"><?php echo esc_html( $name ); ?></strong><br>
						<small><a href="mailto:<?php echo esc_attr( $email ); ?>" style="color:var(--accent); text-decoration:none;"><?php echo esc_html( $email ); ?></a></small>
						<?php if ( $phone ) : ?> &bull; <small style="color:var(--text-dim);"><?php echo esc_html( $phone ); ?></small><?php endif; ?>
					</td>
					<td>
						<span class="tag tag-blue"><?php echo esc_html( $subject ); ?></span>
					</td>
					<td>
						<div style="max-width:360px; word-break:break-word; color:var(--text-muted);">
							<?php echo esc_html( wp_trim_words( $message, 18 ) ); ?>
						</div>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="btn-view-modal" onclick="openModalData('Inquiry: <?php echo esc_js( $name ); ?>', <?php echo esc_attr( $details_json ); ?>)">
							Read &rarr;
						</button>
						<a href="index.php?tab=contact&action=delete&id=<?php echo esc_attr( $p->ID ); ?>" class="btn-del" onclick="return confirm('Are you sure you want to delete this message?');" title="Delete">🗑️</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
}
?>
