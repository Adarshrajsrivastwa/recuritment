<?php
/**
 * Template Name: SAM Executive Admin Portal
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$login_error = '';
if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['sam_portal_login'] ) ) {
	if ( ! isset( $_POST['sam_portal_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sam_portal_nonce'] ) ), 'sam_portal_login_action' ) ) {
		$login_error = 'Security check failed. Please refresh and try again.';
	} else {
		$login_user = sanitize_text_field( wp_unslash( $_POST['portal_username'] ?? '' ) );
		$login_pass = $_POST['portal_password'] ?? '';
		$remember   = ! empty( $_POST['remember_me'] );
		$creds = array( 'user_login' => $login_user, 'user_password' => $login_pass, 'remember' => $remember );
		$user = wp_signon( $creds, is_ssl() );
		if ( is_wp_error( $user ) ) {
			$login_error = $user->get_error_message();
		} else {
			wp_set_current_user( $user->ID );
			wp_set_auth_cookie( $user->ID, $remember );
			wp_safe_redirect( get_permalink() );
			exit;
		}
	}
}
if ( isset( $_GET['sam_logout'] ) && '1' === $_GET['sam_logout'] ) {
	wp_logout();
	wp_safe_redirect( get_permalink() );
	exit;
}

$add_admin_success = '';
$add_admin_error   = '';
if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['sam_add_admin'] ) ) {
	if ( ! isset( $_POST['sam_add_admin_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sam_add_admin_nonce'] ) ), 'sam_add_admin_action' ) ) {
		$add_admin_error = 'Security check failed.';
	} elseif ( ! current_user_can( 'manage_options' ) ) {
		$add_admin_error = 'Permission denied.';
	} else {
		$new_email    = sanitize_email( wp_unslash( $_POST['new_admin_email'] ?? '' ) );
		$new_username = sanitize_user( wp_unslash( $_POST['new_admin_username'] ?? '' ) );
		$new_pass     = wp_unslash( $_POST['new_admin_password'] ?? '' );
		if ( ! $new_email || ! $new_username || ! $new_pass ) {
			$add_admin_error = 'All fields are required.';
		} elseif ( username_exists( $new_username ) ) {
			$add_admin_error = 'Username already exists.';
		} elseif ( email_exists( $new_email ) ) {
			$add_admin_error = 'Email already registered.';
		} else {
			$new_user_id = wp_create_user( $new_username, $new_pass, $new_email );
			if ( is_wp_error( $new_user_id ) ) {
				$add_admin_error = $new_user_id->get_error_message();
			} else {
				$new_user = new WP_User( $new_user_id );
				$new_user->set_role( 'administrator' );
				$add_admin_success = 'Admin user <strong>' . esc_html( $new_username ) . '</strong> created successfully!';
			}
		}
	}
}

$is_admin_logged_in = current_user_can( 'manage_options' );
$current_tab        = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'overview';

// Output standalone HTML (no theme header/footer)
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>SAM Admin Portal &mdash; <?php bloginfo( 'name' ); ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<style>body{margin:0;padding:0;background:#080E1C;font-family:'Inter',sans-serif;} *{box-sizing:border-box;}</style>
</head>
<body>
<div class="sam-portal-wrapper">
<?php if ( ! $is_admin_logged_in ) : ?>
<section class="portal-login-section">
	<div class="portal-login-container">
		<div class="portal-login-card">
			<div class="portal-login-head">
				<div class="portal-badge-logo">SAM</div>
				<h2>SAM Admin Portal</h2>
				<p>Sign in with your corporate administrator credentials to manage candidate CVs, employer mandates, and inquiries.</p>
			</div>
			<?php if ( ! empty( $login_error ) ) : ?>
				<div class="portal-alert portal-alert-error" role="alert"><span>&#9888;&#65039;</span><div><?php echo wp_kses_post( $login_error ); ?></div></div>
			<?php endif; ?>
			<form method="post" class="portal-login-form" action="<?php echo esc_url( get_permalink() ); ?>">
				<?php wp_nonce_field( 'sam_portal_login_action', 'sam_portal_nonce' ); ?>
				<input type="hidden" name="sam_portal_login" value="1">
				<div class="portal-form-group">
					<label for="portal_username">Admin Email / Username</label>
					<div class="portal-input-wrap">
						<input type="text" id="portal_username" name="portal_username" required placeholder="sales@samcareer.com" value="<?php echo esc_attr( isset( $_POST['portal_username'] ) ? $_POST['portal_username'] : 'sales@samcareer.com' ); ?>">
					</div>
				</div>
				<div class="portal-form-group">
					<label for="portal_password">Password</label>
					<div class="portal-input-wrap">
						<input type="password" id="portal_password" name="portal_password" required placeholder="Enter password" value="">
					</div>
				</div>
				<div class="portal-form-options">
					<label class="portal-remember"><input type="checkbox" name="remember_me" value="1" checked> Remember this session</label>
					<span class="portal-hint">Default: <code>sales@samcareer.com</code> / <code>sam@admin</code></span>
				</div>
				<button type="submit" class="portal-submit-btn">&#128274; Access SAM Admin Portal</button>
				<div class="portal-card-footer">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="portal-back-link">&larr; Return to Website</a>
				</div>
			</form>
		</div>
	</div>
</section>
<?php else :
	$candidate_count = wp_count_posts( 'sam_candidate' )->publish ?? 0;
	$hiring_posts  = get_posts( array( 'post_type' => 'sam_inquiry', 'posts_per_page' => -1, 'fields' => 'ids', 'meta_key' => '_sam_inquiry_type', 'meta_value' => 'hiring' ) );
	$hiring_count  = count( $hiring_posts );
	$contact_posts = get_posts( array( 'post_type' => 'sam_inquiry', 'posts_per_page' => -1, 'fields' => 'ids', 'meta_key' => '_sam_inquiry_type', 'meta_value' => 'contact' ) );
	$contact_count = count( $contact_posts );
	$total_leads   = $candidate_count + $hiring_count + $contact_count;
	$current_user_obj = wp_get_current_user();
	$portal_base_url  = get_permalink();
	$tab_titles = array(
		'overview'   => 'Dashboard Overview',
		'candidates' => 'Candidate CV Applications',
		'hiring'     => 'Employer Hiring Mandates',
		'contact'    => 'Contact Form Messages',
		'add_admin'  => 'Add New Administrator',
	);
?>
<div class="portal-layout">
<aside class="portal-sidebar" id="portalSidebar">
	<div class="portal-sidebar-inner">
		<div class="portal-sidebar-brand">
			<div class="portal-badge-logo">SAM</div>
			<div class="portal-sidebar-brand-text">
				<span class="portal-sidebar-brand-title">Admin Portal</span>
				<span class="portal-sidebar-brand-sub">Executive Desk</span>
			</div>
		</div>
		<div class="portal-sidebar-user">
			<div class="portal-sidebar-avatar"><?php echo esc_html( strtoupper( substr( $current_user_obj->user_login, 0, 2 ) ) ); ?></div>
			<div>
				<div class="portal-sidebar-uname"><?php echo esc_html( $current_user_obj->display_name ?: $current_user_obj->user_login ); ?></div>
				<div class="portal-sidebar-urole"><span class="portal-online-dot"></span> Administrator</div>
			</div>
		</div>
		<nav class="portal-sidebar-nav">
			<div class="portal-sidebar-nav-label">Main Menu</div>
			<a href="<?php echo esc_url( add_query_arg( 'tab', 'overview', $portal_base_url ) ); ?>" class="portal-sidebar-link <?php echo 'overview' === $current_tab ? 'active' : ''; ?>">
				<span class="portal-sidebar-icon">&#128202;</span><span>Overview</span><span class="portal-sidebar-badge"><?php echo esc_html( $total_leads ); ?></span>
			</a>
			<a href="<?php echo esc_url( add_query_arg( 'tab', 'candidates', $portal_base_url ) ); ?>" class="portal-sidebar-link <?php echo 'candidates' === $current_tab ? 'active' : ''; ?>">
				<span class="portal-sidebar-icon">&#129489;</span><span>Candidate CVs</span><span class="portal-sidebar-badge"><?php echo esc_html( $candidate_count ); ?></span>
			</a>
			<a href="<?php echo esc_url( add_query_arg( 'tab', 'hiring', $portal_base_url ) ); ?>" class="portal-sidebar-link <?php echo 'hiring' === $current_tab ? 'active' : ''; ?>">
				<span class="portal-sidebar-icon">&#127970;</span><span>Employer Mandates</span><span class="portal-sidebar-badge badge-amber"><?php echo esc_html( $hiring_count ); ?></span>
			</a>
			<a href="<?php echo esc_url( add_query_arg( 'tab', 'contact', $portal_base_url ) ); ?>" class="portal-sidebar-link <?php echo 'contact' === $current_tab ? 'active' : ''; ?>">
				<span class="portal-sidebar-icon">&#9993;&#65039;</span><span>Contact Messages</span><span class="portal-sidebar-badge badge-purple"><?php echo esc_html( $contact_count ); ?></span>
			</a>
			<div class="portal-sidebar-divider"></div>
			<div class="portal-sidebar-nav-label">Administration</div>
			<a href="<?php echo esc_url( add_query_arg( 'tab', 'add_admin', $portal_base_url ) ); ?>" class="portal-sidebar-link <?php echo 'add_admin' === $current_tab ? 'active' : ''; ?>">
				<span class="portal-sidebar-icon">&#128100;</span><span>Add New Admin</span>
			</a>
			<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=all' ) ); ?>" class="portal-sidebar-link">
				<span class="portal-sidebar-icon">&#128229;</span><span>Export All CSV</span>
			</a>
			<div class="portal-sidebar-divider"></div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="portal-sidebar-link" target="_blank">
				<span class="portal-sidebar-icon">&#127760;</span><span>View Website</span>
			</a>
			<a href="<?php echo esc_url( add_query_arg( 'sam_logout', '1', $portal_base_url ) ); ?>" class="portal-sidebar-link portal-sidebar-logout">
				<span class="portal-sidebar-icon">&#128682;</span><span>Log Out</span>
			</a>
		</nav>
	</div>
</aside>
<main class="portal-main">
	<div class="portal-topbar">
		<div class="portal-topbar-left">
			<button class="portal-sidebar-toggle" id="sidebarToggle" onclick="toggleSidebar()" title="Toggle sidebar">&#9776;</button>
			<div>
				<h1 class="portal-topbar-title"><?php echo esc_html( $tab_titles[ $current_tab ] ?? 'Dashboard' ); ?></h1>
				<p class="portal-topbar-sub">SAM Manpower &amp; Career Services &bull; Executive Portal</p>
			</div>
		</div>
		<div class="portal-topbar-right">
			<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=' . ( in_array( $current_tab, array( 'overview', 'add_admin' ) ) ? 'all' : $current_tab ) ) ); ?>" class="portal-btn portal-btn-export">&#128229; Export CSV</a>
		</div>
	</div>

	<?php if ( 'add_admin' !== $current_tab ) : ?>
	<div class="portal-kpi-grid">
		<div class="portal-kpi-card <?php echo 'overview' === $current_tab ? 'is-active' : ''; ?>">
			<div class="portal-kpi-icon icon-blue">&#128202;</div>
			<div><span class="portal-kpi-title">Total Submissions</span><strong class="portal-kpi-val"><?php echo esc_html( $total_leads ); ?></strong></div>
		</div>
		<div class="portal-kpi-card <?php echo 'candidates' === $current_tab ? 'is-active' : ''; ?>">
			<div class="portal-kpi-icon icon-green">&#129489;</div>
			<div><span class="portal-kpi-title">Candidate Profiles</span><strong class="portal-kpi-val"><?php echo esc_html( $candidate_count ); ?></strong></div>
		</div>
		<div class="portal-kpi-card <?php echo 'hiring' === $current_tab ? 'is-active' : ''; ?>">
			<div class="portal-kpi-icon icon-amber">&#127970;</div>
			<div><span class="portal-kpi-title">Employer Mandates</span><strong class="portal-kpi-val"><?php echo esc_html( $hiring_count ); ?></strong></div>
		</div>
		<div class="portal-kpi-card <?php echo 'contact' === $current_tab ? 'is-active' : ''; ?>">
			<div class="portal-kpi-icon icon-purple">&#9993;&#65039;</div>
			<div><span class="portal-kpi-title">Contact Inquiries</span><strong class="portal-kpi-val"><?php echo esc_html( $contact_count ); ?></strong></div>
		</div>
	</div>
	<?php endif; ?>

	<div class="portal-tab-body">

	<?php if ( 'overview' === $current_tab ) : ?>
		<div class="portal-panel">
			<div class="portal-panel-head">
				<h3>Recent Candidate CV Applications</h3>
				<a href="<?php echo esc_url( add_query_arg( 'tab', 'candidates', $portal_base_url ) ); ?>" class="portal-link-accent">View All &rarr;</a>
			</div>
			<?php sam_portal_render_candidates( 5 ); ?>
		</div>
		<div class="portal-panel" style="margin-top:24px;">
			<div class="portal-panel-head">
				<h3>Recent Employer Hiring Mandates</h3>
				<a href="<?php echo esc_url( add_query_arg( 'tab', 'hiring', $portal_base_url ) ); ?>" class="portal-link-accent">View All &rarr;</a>
			</div>
			<?php sam_portal_render_hiring( 5 ); ?>
		</div>

	<?php elseif ( 'candidates' === $current_tab ) : ?>
		<div class="portal-panel">
			<div class="portal-panel-head">
				<div><h3>All Candidate Applications &amp; Resumes</h3><p style="color:#64748B;font-size:.88rem;margin:3px 0 0;">View candidate experience, CTC, notice status, and resumes.</p></div>
				<div class="portal-panel-actions">
					<input type="text" id="portalCandSearch" placeholder="Search by name, skill, role..." class="portal-search-input" onkeyup="filterPortalTable('portalCandTable', this.value)">
					<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=candidates' ) ); ?>" class="portal-btn portal-btn-export">&#128229; CSV</a>
				</div>
			</div>
			<?php sam_portal_render_candidates( -1, 'portalCandTable' ); ?>
		</div>

	<?php elseif ( 'hiring' === $current_tab ) : ?>
		<div class="portal-panel">
			<div class="portal-panel-head">
				<div><h3>All Employer Hiring Mandates</h3><p style="color:#64748B;font-size:.88rem;margin:3px 0 0;">Submitted hiring requirements, headcount, timeline, and CTC bands.</p></div>
				<div class="portal-panel-actions">
					<input type="text" id="portalHiringSearch" placeholder="Search company, role, location..." class="portal-search-input" onkeyup="filterPortalTable('portalHiringTable', this.value)">
					<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=hiring' ) ); ?>" class="portal-btn portal-btn-export">&#128229; CSV</a>
				</div>
			</div>
			<?php sam_portal_render_hiring( -1, 'portalHiringTable' ); ?>
		</div>

	<?php elseif ( 'contact' === $current_tab ) : ?>
		<div class="portal-panel">
			<div class="portal-panel-head">
				<div><h3>General Inquiries &amp; Contact Messages</h3><p style="color:#64748B;font-size:.88rem;margin:3px 0 0;">General inquiries, vendor messages, and support messages.</p></div>
				<div class="portal-panel-actions">
					<input type="text" id="portalContactSearch" placeholder="Search name, email, subject..." class="portal-search-input" onkeyup="filterPortalTable('portalContactTable', this.value)">
					<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=contact' ) ); ?>" class="portal-btn portal-btn-export">&#128229; CSV</a>
				</div>
			</div>
			<?php sam_portal_render_contact( -1, 'portalContactTable' ); ?>
		</div>

	<?php elseif ( 'add_admin' === $current_tab ) : ?>
		<div class="portal-two-col">
			<div class="portal-panel">
				<div class="portal-panel-head"><div><h3>Add New Administrator</h3><p style="color:#64748B;font-size:.88rem;margin:3px 0 0;">Create a new admin user who can access this portal.</p></div></div>
				<?php if ( $add_admin_success ) : ?>
					<div class="portal-alert portal-alert-success"><span>&#9989;</span><div><?php echo wp_kses_post( $add_admin_success ); ?></div></div>
				<?php endif; ?>
				<?php if ( $add_admin_error ) : ?>
					<div class="portal-alert portal-alert-error"><span>&#9888;&#65039;</span><div><?php echo esc_html( $add_admin_error ); ?></div></div>
				<?php endif; ?>
				<form method="post" action="<?php echo esc_url( add_query_arg( 'tab', 'add_admin', get_permalink() ) ); ?>">
					<?php wp_nonce_field( 'sam_add_admin_action', 'sam_add_admin_nonce' ); ?>
					<input type="hidden" name="sam_add_admin" value="1">
					<div class="portal-form-group">
						<label for="new_admin_username">Username <span style="color:#F87171;">*</span></label>
						<div class="portal-input-wrap"><input type="text" id="new_admin_username" name="new_admin_username" required placeholder="e.g. admin_john" autocomplete="off"></div>
					</div>
					<div class="portal-form-group">
						<label for="new_admin_email">Email Address <span style="color:#F87171;">*</span></label>
						<div class="portal-input-wrap"><input type="email" id="new_admin_email" name="new_admin_email" required placeholder="e.g. john@samcareer.com" autocomplete="off"></div>
					</div>
					<div class="portal-form-group">
						<label for="new_admin_password">Password <span style="color:#F87171;">*</span></label>
						<div class="portal-input-wrap" style="position:relative;">
							<input type="password" id="new_admin_password" name="new_admin_password" required placeholder="Set a strong password" autocomplete="new-password">
							<button type="button" class="portal-pass-toggle" onclick="togglePassVisibility()" title="Show/Hide">&#128065;&#65039;</button>
						</div>
						<small style="color:#64748B;display:block;margin-top:6px;">Min 8 characters. Use letters, numbers &amp; symbols.</small>
					</div>
					<button type="submit" class="portal-submit-btn" style="margin-top:8px;">&#10133; Create Admin User</button>
				</form>
			</div>
			<div class="portal-panel">
				<div class="portal-panel-head"><h3>Current Administrators</h3></div>
				<div class="portal-admin-list">
				<?php $admins = get_users( array( 'role' => 'administrator' ) );
				foreach ( $admins as $au ) : ?>
					<div class="portal-admin-list-item">
						<div class="portal-admin-avatar"><?php echo esc_html( strtoupper( substr( $au->user_login, 0, 2 ) ) ); ?></div>
						<div class="portal-admin-info">
							<strong><?php echo esc_html( $au->display_name ?: $au->user_login ); ?></strong>
							<span><?php echo esc_html( $au->user_email ); ?></span>
						</div>
						<?php if ( $au->ID === get_current_user_id() ) : ?><span class="portal-badge badge-green" style="font-size:.65rem;">You</span><?php endif; ?>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>

	<?php endif; ?>

	</div>
</main>
</div>

<!-- DETAIL MODAL -->
<div id="portalModal" class="portal-modal-backdrop" style="display:none;" onclick="if(event.target===this)closePortalModal();">
	<div class="portal-modal-content">
		<div class="portal-modal-head"><h3 id="portalModalTitle">Submission Details</h3><button type="button" class="portal-modal-close" onclick="closePortalModal()">&times;</button></div>
		<div class="portal-modal-body" id="portalModalBody"></div>
	</div>
</div>
<!-- CV VIEWER MODAL -->
<div id="portalDocViewerModal" class="portal-modal-backdrop" style="display:none;" onclick="if(event.target===this)closePortalDocViewer();">
	<div class="portal-modal-content" style="max-width:1050px;width:95%;height:90vh;">
		<div class="portal-modal-head">
			<div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
				<h3 id="portalDocViewerTitle" style="font-size:1.05rem;">Document Viewer</h3>
				<a id="portalDocViewerDownloadBtn" href="#" target="_blank" class="portal-doc-btn btn-blue" style="padding:4px 10px;font-size:.78rem;" download>&#128229; Download</a>
				<a id="portalDocViewerNewTabBtn" href="#" target="_blank" class="portal-doc-btn btn-gray" style="padding:4px 10px;font-size:.78rem;">&#8599;&#65039; New Tab</a>
			</div>
			<button type="button" class="portal-modal-close" onclick="closePortalDocViewer()">&times;</button>
		</div>
		<div class="portal-modal-body" style="padding:0;height:calc(100% - 65px);background:#0F172A;display:flex;flex-direction:column;overflow:hidden;">
			<iframe id="portalDocViewerFrame" src="" style="width:100%;height:100%;border:none;background:#fff;"></iframe>
		</div>
	</div>
</div>

<?php endif; ?>
</div>
<?php
function sam_portal_render_candidates( $limit = -1, $table_id = '' ) {
	$posts = get_posts( array( 'post_type' => 'sam_candidate', 'posts_per_page' => $limit, 'post_status' => 'any', 'orderby' => 'date', 'order' => 'DESC' ) );
	if ( empty( $posts ) ) { echo '<p class="portal-empty-notice">No candidate applications received yet.</p>'; return; }
	?>
	<div class="portal-table-wrap">
	<table class="portal-table" id="<?php echo esc_attr( $table_id ); ?>">
	<thead><tr>
		<th>Candidate Name</th><th>Role &amp; Exp</th><th>Skill</th>
		<th>Location</th><th>CTC</th><th>Notice</th><th>Resume / CV</th><th>Date</th><th>Action</th>
	</tr></thead>
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
			'Candidate Name' => $name, 'Email' => $email, 'Contact' => $phone,
			'Designation' => $role, 'Experience' => $exp, 'Primary Skill' => $skill,
			'All Skills' => $all_skills, 'Location' => $location,
			'Serving Notice?' => $serving, 'Joining Timeline' => $timeline,
			'Offer in Hand?' => $offer, 'Contract Role?' => $contract,
			'Current CTC' => $curr_ctc, 'Expected CTC' => $exp_ctc,
		) ), ENT_QUOTES, 'UTF-8' );
	?>
	<tr>
		<td><strong class="portal-main-title"><?php echo esc_html( $name ); ?></strong><br>
			<a href="mailto:<?php echo esc_attr( $email ); ?>" class="portal-sub-link"><?php echo esc_html( $email ); ?></a>
			<?php if ( $phone ) : ?><br><span class="portal-text-dim"><?php echo esc_html( $phone ); ?></span><?php endif; ?>
		</td>
		<td><strong><?php echo esc_html( $role ); ?></strong><br><span class="portal-badge badge-gray"><?php echo esc_html( $exp ); ?></span></td>
		<td><span class="portal-badge badge-blue"><?php echo esc_html( $skill ); ?></span></td>
		<td><?php echo esc_html( $location ); ?></td>
		<td><small>Cur: <strong><?php echo esc_html( $curr_ctc ); ?></strong></small><br>
			<small>Exp: <strong style="color:#059669;"><?php echo esc_html( $exp_ctc ); ?></strong></small></td>
		<td><?php if ( 'Yes' === $serving ) : ?><span class="portal-badge badge-green">Serving</span><?php else : ?><span class="portal-badge badge-gray">Not Serving</span><?php endif; ?><br>
			<small class="portal-text-dim"><?php echo esc_html( $timeline ); ?></small></td>
		<td>
			<?php if ( $resume ) : ?>
				<div style="display:flex;align-items:center;gap:5px;flex-wrap:wrap;">
					<button type="button" class="portal-doc-btn btn-blue" onclick="openPortalDocViewer('<?php echo esc_url( $resume ); ?>','Resume - <?php echo esc_js( $name ); ?>')" style="cursor:pointer;border:none;">&#128065; View CV</button>
					<a href="<?php echo esc_url( $resume ); ?>" target="_blank" download class="portal-doc-btn btn-gray" style="padding:4px 7px;">&#128229;</a>
				</div>
			<?php else : ?><span class="portal-text-dim">No CV</span><?php endif; ?>
			<?php if ( $notice_doc ) : ?>
				<div style="display:flex;align-items:center;gap:5px;margin-top:5px;flex-wrap:wrap;">
					<button type="button" class="portal-doc-btn btn-gray" onclick="openPortalDocViewer('<?php echo esc_url( $notice_doc ); ?>','Notice - <?php echo esc_js( $name ); ?>')" style="cursor:pointer;border:none;font-size:.72rem;">&#128065; Notice</button>
					<a href="<?php echo esc_url( $notice_doc ); ?>" target="_blank" download class="portal-doc-btn btn-gray" style="padding:2px 5px;font-size:.72rem;">&#128229;</a>
				</div>
			<?php endif; ?>
		</td>
		<td><small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small></td>
		<td><button type="button" class="portal-btn-view" onclick="openPortalModalData('Candidate: <?php echo esc_js( $name ); ?>',<?php echo esc_attr( $details_json ); ?>,'<?php echo esc_url( $resume ); ?>','<?php echo esc_url( $notice_doc ); ?>')">Full Profile &rarr;</button></td>
	</tr>
	<?php endforeach; ?>
	</tbody></table></div>
	<?php
}

function sam_portal_render_hiring( $limit = -1, $table_id = '' ) {
	$posts = get_posts( array( 'post_type' => 'sam_inquiry', 'posts_per_page' => $limit, 'post_status' => 'any', 'meta_key' => '_sam_inquiry_type', 'meta_value' => 'hiring', 'orderby' => 'date', 'order' => 'DESC' ) );
	if ( empty( $posts ) ) { echo '<p class="portal-empty-notice">No employer mandates submitted yet.</p>'; return; }
	?>
	<div class="portal-table-wrap">
	<table class="portal-table" id="<?php echo esc_attr( $table_id ); ?>">
	<thead><tr>
		<th>Company &amp; Contact</th><th>Roles</th><th>Headcount</th>
		<th>Timeline</th><th>Budget</th><th>Model &amp; Loc</th><th>Date</th><th>Details</th>
	</tr></thead>
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
			'Company' => $company, 'Contact Person' => $name, 'Email' => $email, 'Phone' => $phone,
			'Model' => $model, 'Domain' => $domain, 'Roles' => $roles,
			'Headcount' => $headcount, 'Timeline' => $timeline, 'Location' => $location,
			'Experience Band' => $experience, 'Budget/CTC' => $budget, 'Notes' => $message,
		) ), ENT_QUOTES, 'UTF-8' );
	?>
	<tr>
		<td><strong class="portal-main-title"><?php echo esc_html( $company ); ?></strong><br>
			<span><?php echo esc_html( $name ); ?></span><br>
			<a href="mailto:<?php echo esc_attr( $email ); ?>" class="portal-sub-link"><?php echo esc_html( $email ); ?></a>
			<?php if ( $phone ) : ?>&bull;<span class="portal-text-dim"><?php echo esc_html( $phone ); ?></span><?php endif; ?></td>
		<td><div style="max-width:220px;word-break:break-word;"><strong><?php echo esc_html( $roles ); ?></strong></div></td>
		<td><span class="portal-badge badge-blue"><?php echo esc_html( $headcount ? $headcount . ' Pos' : 'N/A' ); ?></span></td>
		<td><span class="portal-badge badge-amber"><?php echo esc_html( $timeline ); ?></span></td>
		<td><strong><?php echo esc_html( $budget ?: 'Flexible' ); ?></strong></td>
		<td><span class="portal-badge badge-gray"><?php echo esc_html( $model ?: 'Direct' ); ?></span><br>
			<small class="portal-text-dim"><?php echo esc_html( $location ); ?></small></td>
		<td><small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small></td>
		<td><button type="button" class="portal-btn-view" onclick="openPortalModalData('Mandate: <?php echo esc_js( $company ); ?>',<?php echo esc_attr( $details_json ); ?>)">View Details &rarr;</button></td>
	</tr>
	<?php endforeach; ?>
	</tbody></table></div>
	<?php
}

function sam_portal_render_contact( $limit = -1, $table_id = '' ) {
	$posts = get_posts( array( 'post_type' => 'sam_inquiry', 'posts_per_page' => $limit, 'post_status' => 'any', 'meta_key' => '_sam_inquiry_type', 'meta_value' => 'contact', 'orderby' => 'date', 'order' => 'DESC' ) );
	if ( empty( $posts ) ) { echo '<p class="portal-empty-notice">No contact messages received yet.</p>'; return; }
	?>
	<div class="portal-table-wrap">
	<table class="portal-table" id="<?php echo esc_attr( $table_id ); ?>">
	<thead><tr><th>Sender</th><th>Subject</th><th>Message</th><th>Date</th><th>Action</th></tr></thead>
	<tbody>
	<?php foreach ( $posts as $p ) :
		$name    = get_post_meta( $p->ID, '_name', true );
		$email   = get_post_meta( $p->ID, '_email', true );
		$phone   = get_post_meta( $p->ID, '_phone', true );
		$subject = get_post_meta( $p->ID, '_subject', true );
		$message = $p->post_content;
		$details_json = htmlspecialchars( json_encode( array(
			'Name' => $name, 'Email' => $email, 'Phone' => $phone,
			'Subject' => $subject, 'Message' => $message,
		) ), ENT_QUOTES, 'UTF-8' );
	?>
	<tr>
		<td><strong class="portal-main-title"><?php echo esc_html( $name ); ?></strong><br>
			<a href="mailto:<?php echo esc_attr( $email ); ?>" class="portal-sub-link"><?php echo esc_html( $email ); ?></a>
			<?php if ( $phone ) : ?>&bull;<span class="portal-text-dim"><?php echo esc_html( $phone ); ?></span><?php endif; ?></td>
		<td><span class="portal-badge badge-blue"><?php echo esc_html( $subject ); ?></span></td>
		<td><div style="max-width:340px;word-break:break-word;color:#475569;"><?php echo esc_html( wp_trim_words( $message, 18 ) ); ?></div></td>
		<td><small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small></td>
		<td><button type="button" class="portal-btn-view" onclick="openPortalModalData('Inquiry: <?php echo esc_js( $name ); ?>',<?php echo esc_attr( $details_json ); ?>)">Read Message &rarr;</button></td>
	</tr>
	<?php endforeach; ?>
	</tbody></table></div>
	<?php
}
?>
<style>
.sam-portal-wrapper{background:#080E1C;min-height:100vh;color:#F8FAFC;font-family:'Inter',sans-serif;}
.portal-layout{display:flex;min-height:100vh;}
.portal-sidebar{width:260px;flex-shrink:0;background:#0B1120;border-right:1px solid #1E293B;position:sticky;top:0;height:100vh;overflow-y:auto;overflow-x:hidden;transition:width .25s;z-index:100;scrollbar-width:none;-ms-overflow-style:none;}
.portal-sidebar::-webkit-scrollbar{display:none;}
.portal-sidebar.collapsed{width:0;overflow:hidden;}
.portal-sidebar-inner{padding:22px 14px 40px;min-width:260px;}
.portal-sidebar-brand{display:flex;align-items:center;gap:12px;margin-bottom:22px;padding-bottom:18px;border-bottom:1px solid #1E293B;}
.portal-sidebar-brand-text{display:flex;flex-direction:column;}
.portal-sidebar-brand-title{font-size:.95rem;font-weight:700;color:#F8FAFC;}
.portal-sidebar-brand-sub{font-size:.7rem;color:#64748B;text-transform:uppercase;letter-spacing:.06em;}
.portal-badge-logo{display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#0284C7,#2563EB);color:#fff;font-weight:800;font-size:1.1rem;padding:7px 14px;border-radius:9px;letter-spacing:.05em;box-shadow:0 4px 15px rgba(2,132,199,.35);flex-shrink:0;}
.portal-sidebar-user{display:flex;align-items:center;gap:10px;background:#0F172A;border:1px solid #1E293B;border-radius:10px;padding:11px 13px;margin-bottom:22px;}
.portal-sidebar-avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#0284C7,#2563EB);color:#fff;font-weight:800;font-size:.78rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.portal-sidebar-uname{font-size:.88rem;font-weight:700;color:#F8FAFC;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:150px;}
.portal-sidebar-urole{font-size:.7rem;color:#94A3B8;display:flex;align-items:center;gap:5px;margin-top:2px;}
.portal-online-dot{width:7px;height:7px;background:#10B981;border-radius:50%;display:inline-block;box-shadow:0 0 7px #10B981;}
.portal-sidebar-nav{display:flex;flex-direction:column;gap:3px;}
.portal-sidebar-nav-label{font-size:.67rem;text-transform:uppercase;letter-spacing:.08em;color:#475569;font-weight:700;padding:0 8px;margin:8px 0 5px;}
.portal-sidebar-link{display:flex;align-items:center;gap:10px;padding:10px 11px;border-radius:8px;color:#94A3B8;text-decoration:none;font-size:.88rem;font-weight:500;transition:all .18s;border-left:3px solid transparent;}
.portal-sidebar-link:hover{background:#1E293B;color:#F8FAFC;}
.portal-sidebar-link.active{background:rgba(2,132,199,.15);color:#38BDF8;font-weight:700;border-left-color:#0284C7;}
.portal-sidebar-icon{font-size:.95rem;flex-shrink:0;width:20px;text-align:center;}
.portal-sidebar-link span:not(.portal-sidebar-icon):not(.portal-sidebar-badge){flex:1;}
.portal-sidebar-badge{background:#1E293B;color:#94A3B8;border-radius:20px;font-size:.67rem;font-weight:700;padding:2px 7px;min-width:20px;text-align:center;}
.portal-sidebar-badge.badge-amber{background:rgba(245,158,11,.2);color:#FBBF24;}
.portal-sidebar-badge.badge-purple{background:rgba(139,92,246,.2);color:#A78BFA;}
.portal-sidebar-divider{height:1px;background:#1E293B;margin:10px 0;}
.portal-sidebar-logout{color:#F87171;}
.portal-sidebar-logout:hover{background:rgba(239,68,68,.1);color:#FCA5A5;}
.portal-main{flex:1;min-width:0;padding:28px 32px 60px;}
.portal-topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;gap:16px;flex-wrap:wrap;}
.portal-topbar-left{display:flex;align-items:center;gap:16px;}
.portal-topbar-title{font-size:1.4rem;font-weight:800;color:#F8FAFC;margin:0 0 2px;}
.portal-topbar-sub{font-size:.78rem;color:#64748B;margin:0;}
.portal-topbar-right{display:flex;gap:10px;}
.portal-sidebar-toggle{background:#1E293B;border:1px solid #334155;color:#94A3B8;font-size:1.2rem;padding:6px 12px;border-radius:8px;cursor:pointer;transition:all .2s;}
.portal-sidebar-toggle:hover{background:#334155;color:#fff;}
.portal-kpi-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:22px;}
.portal-kpi-card{background:#0F172A;border:1px solid #1E293B;border-radius:12px;padding:18px 20px;display:flex;align-items:center;gap:14px;box-shadow:0 4px 20px rgba(0,0,0,.2);transition:all .2s;}
.portal-kpi-card:hover{border-color:#334155;transform:translateY(-2px);}
.portal-kpi-card.is-active{border-color:#0284C7;border-left-width:4px;}
.portal-kpi-icon{width:46px;height:46px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;}
.icon-blue{background:rgba(2,132,199,.15);border:1px solid rgba(2,132,199,.3);}
.icon-green{background:rgba(16,185,129,.15);border:1px solid rgba(16,185,129,.3);}
.icon-amber{background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3);}
.icon-purple{background:rgba(139,92,246,.15);border:1px solid rgba(139,92,246,.3);}
.portal-kpi-title{display:block;font-size:.75rem;text-transform:uppercase;letter-spacing:.05em;color:#94A3B8;font-weight:600;margin-bottom:2px;}
.portal-kpi-val{font-size:1.6rem;font-weight:800;color:#F8FAFC;}
.portal-panel{background:#0F172A;border:1px solid #1E293B;border-radius:14px;padding:24px;box-shadow:0 4px 25px rgba(0,0,0,.25);}
.portal-panel-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid #1E293B;flex-wrap:wrap;gap:12px;}
.portal-panel-head h3{margin:0;font-size:1.15rem;color:#F8FAFC;font-weight:700;}
.portal-panel-actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap;}
.portal-search-input{background:#1E293B;border:1px solid #334155;padding:8px 13px;border-radius:8px;color:#F8FAFC;font-size:.85rem;width:230px;outline:none;}
.portal-search-input:focus{border-color:#0284C7;}
.portal-link-accent{color:#38BDF8;text-decoration:none;font-size:.88rem;font-weight:600;}
.portal-link-accent:hover{text-decoration:underline;}
.portal-two-col{display:grid;grid-template-columns:1fr 1fr;gap:24px;align-items:start;}
.portal-table-wrap{overflow-x:auto;}
.portal-table{width:100%;border-collapse:collapse;font-size:.87rem;}
.portal-table th{background:#1E293B;color:#94A3B8;font-weight:700;text-align:left;padding:11px 13px;font-size:.75rem;text-transform:uppercase;letter-spacing:.05em;border-bottom:1px solid #334155;}
.portal-table td{padding:13px 14px;border-bottom:1px solid #1E293B;color:#E2E8F0;vertical-align:middle;}
.portal-table tr:hover td{background:rgba(30,41,59,.5);}
.portal-main-title{font-size:.93rem;color:#F8FAFC;}
.portal-sub-link{color:#38BDF8;text-decoration:none;font-size:.82rem;}
.portal-sub-link:hover{text-decoration:underline;}
.portal-text-dim{color:#94A3B8;font-size:.8rem;}
.portal-badge{display:inline-block;padding:3px 8px;border-radius:20px;font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.03em;}
.badge-blue{background:rgba(2,132,199,.2);color:#38BDF8;border:1px solid rgba(2,132,199,.4);}
.badge-green{background:rgba(16,185,129,.2);color:#34D399;border:1px solid rgba(16,185,129,.4);}
.badge-amber{background:rgba(245,158,11,.2);color:#FBBF24;border:1px solid rgba(245,158,11,.4);}
.badge-gray{background:#1E293B;color:#94A3B8;border:1px solid #334155;}
.portal-doc-btn{display:inline-block;padding:4px 10px;border-radius:6px;font-size:.76rem;font-weight:600;text-decoration:none;transition:opacity .2s;}
.btn-blue{background:#0284C7;color:#fff !important;}
.btn-blue:hover{opacity:.9;}
.btn-gray{background:#334155;color:#E2E8F0 !important;}
.btn-gray:hover{opacity:.9;}
.portal-btn-view{background:none;border:0;color:#38BDF8;font-size:.85rem;font-weight:600;cursor:pointer;padding:0;}
.portal-btn-view:hover{text-decoration:underline;}
.portal-empty-notice{color:#64748B;padding:22px 0;margin:0;font-style:italic;}
.portal-login-section{display:flex;align-items:center;justify-content:center;padding:60px 20px;}
.portal-login-container{max-width:520px;margin:0 auto;width:100%;}
.portal-login-card{background:#0F172A;border:1px solid #1E293B;border-radius:16px;padding:36px 32px;box-shadow:0 20px 50px rgba(0,0,0,.5);}
.portal-login-head{text-align:center;margin-bottom:26px;}
.portal-login-head h2{color:#F8FAFC;font-size:1.5rem;font-weight:700;margin:0 0 8px;}
.portal-login-head p{color:#94A3B8;font-size:.87rem;line-height:1.5;margin:0;}
.portal-alert{display:flex;align-items:center;gap:12px;padding:12px 16px;border-radius:8px;margin-bottom:18px;font-size:.87rem;}
.portal-alert-error{background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.3);color:#FCA5A5;}
.portal-alert-success{background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.3);color:#6EE7B7;}
.portal-form-group{margin-bottom:16px;}
.portal-form-group label{display:block;font-size:.82rem;font-weight:600;color:#CBD5E1;margin-bottom:6px;}
.portal-input-wrap input{width:100%;background:#1E293B;border:1px solid #334155;border-radius:8px;padding:11px 15px;color:#F8FAFC;font-size:.93rem;transition:all .2s;box-sizing:border-box;}
.portal-input-wrap input:focus{outline:none;border-color:#0284C7;box-shadow:0 0 0 3px rgba(2,132,199,.25);}
.portal-pass-toggle{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;font-size:1rem;opacity:.6;}
.portal-pass-toggle:hover{opacity:1;}
.portal-form-options{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;font-size:.8rem;color:#94A3B8;}
.portal-remember{display:flex;align-items:center;gap:6px;cursor:pointer;}
.portal-hint code{background:#1E293B;padding:2px 6px;border-radius:4px;color:#38BDF8;font-size:.76rem;}
.portal-submit-btn{width:100%;padding:12px;font-size:.98rem;font-weight:700;border-radius:8px;background:linear-gradient(135deg,#0284C7,#2563EB);border:none;cursor:pointer;color:#fff;box-shadow:0 4px 15px rgba(2,132,199,.3);transition:opacity .2s;}
.portal-submit-btn:hover{opacity:.92;}
.portal-card-footer{text-align:center;margin-top:18px;}
.portal-back-link{color:#64748B;text-decoration:none;font-size:.84rem;}
.portal-back-link:hover{color:#94A3B8;}
.portal-btn{display:inline-flex;align-items:center;gap:6px;padding:8px 15px;border-radius:8px;font-weight:600;font-size:.85rem;text-decoration:none;transition:all .2s;cursor:pointer;border:none;}
.portal-btn-export{background:#0284C7;color:#fff;}
.portal-btn-export:hover{background:#0369A1;}
.portal-admin-list{display:flex;flex-direction:column;gap:10px;}
.portal-admin-list-item{display:flex;align-items:center;gap:12px;background:#1E293B;border:1px solid #334155;border-radius:10px;padding:11px 14px;}
.portal-admin-avatar{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#0284C7,#2563EB);color:#fff;font-weight:800;font-size:.76rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.portal-admin-info{flex:1;display:flex;flex-direction:column;}
.portal-admin-info strong{color:#F8FAFC;font-size:.88rem;}
.portal-admin-info span{color:#64748B;font-size:.78rem;}
.portal-modal-backdrop{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(11,17,32,.87);backdrop-filter:blur(5px);z-index:999999;display:flex;align-items:center;justify-content:center;}
.portal-modal-content{background:#0F172A;border:1px solid #334155;border-radius:16px;width:90%;max-width:680px;max-height:85vh;display:flex;flex-direction:column;overflow:hidden;box-shadow:0 25px 60px rgba(0,0,0,.6);}
.portal-modal-head{background:#1E293B;padding:17px 22px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid #334155;}
.portal-modal-head h3{margin:0;color:#F8FAFC;font-size:1.1rem;}
.portal-modal-close{background:none;border:0;color:#94A3B8;font-size:1.8rem;cursor:pointer;line-height:1;}
.portal-modal-close:hover{color:#fff;}
.portal-modal-body{padding:22px;overflow-y:auto;}
.portal-detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
.portal-detail-item{background:#1E293B;padding:11px 14px;border-radius:8px;border:1px solid #334155;}
.portal-detail-item strong{display:block;font-size:.72rem;text-transform:uppercase;letter-spacing:.05em;color:#94A3B8;margin-bottom:3px;}
.portal-detail-item span{color:#F8FAFC;font-weight:600;font-size:.9rem;word-break:break-word;}
@media(max-width:1100px){.portal-two-col{grid-template-columns:1fr;}}
@media(max-width:900px){
.portal-sidebar{position:fixed;top:0;left:0;height:100vh;z-index:9000;transform:translateX(-100%);transition:transform .25s;}
.portal-sidebar.mobile-open{transform:translateX(0);width:260px;}
.portal-main{padding:18px 16px 40px;}
.portal-topbar-title{font-size:1.1rem;}
.portal-detail-grid{grid-template-columns:1fr;}
.portal-search-input{width:150px;}
}
@media(max-width:600px){
.portal-login-card{padding:26px 16px;}
.portal-kpi-grid{grid-template-columns:1fr 1fr;}
}
</style>
<script>
var sidebarCollapsed=false;
function toggleSidebar(){
	var sb=document.getElementById('portalSidebar');
	if(!sb)return;
	if(window.innerWidth<=900){sb.classList.toggle('mobile-open');}
	else{sidebarCollapsed=!sidebarCollapsed;sb.classList.toggle('collapsed',sidebarCollapsed);}
}
function openPortalDocViewer(url, title) {
	if (!url) return;
	document.getElementById('portalDocViewerTitle').innerText = title || 'Document Preview';
	document.getElementById('portalDocViewerDownloadBtn').href = url;
	document.getElementById('portalDocViewerNewTabBtn').href = url;

	var isPdf  = url.match(/\.pdf$/i);
	var frame  = document.getElementById('portalDocViewerFrame');
	var wrap   = frame.parentNode;

	// Clear previous
	var old = document.getElementById('portalDocFallback');
	if (old) old.remove();
	frame.style.display = 'none';
	frame.src = '';

	if (isPdf) {
		// PDF: render natively in iframe
		frame.style.display = 'block';
		frame.src = url;
	} else {
		// Word / other: show instant action panel
		var ext = (url.split('.').pop() || 'DOC').toUpperCase();
		var fb = document.createElement('div');
		fb.id = 'portalDocFallback';
		fb.style.cssText = 'display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;gap:22px;padding:40px;text-align:center;background:#0F172A;';
		fb.innerHTML =
			'<div style="width:72px;height:72px;border-radius:16px;background:linear-gradient(135deg,rgba(2,132,199,.2),rgba(37,99,235,.2));border:1px solid rgba(2,132,199,.35);display:flex;align-items:center;justify-content:center;font-size:2.4rem;">&#128196;</div>'
			+ '<div>'
			+   '<p style="color:#F8FAFC;font-size:1.15rem;font-weight:800;margin:0 0 8px;">' + ext + ' — ' + (title || 'Document') + '</p>'
			+   '<p style="color:#94A3B8;font-size:.9rem;margin:0 0 4px;">Word documents cannot be previewed directly in the browser.</p>'
			+   '<p style="color:#64748B;font-size:.82rem;margin:0;">Open in a new tab or download to view the full resume.</p>'
			+ '</div>'
			+ '<div style="display:flex;gap:14px;flex-wrap:wrap;justify-content:center;">'
			+   '<a href="' + url + '" target="_blank" class="portal-doc-btn btn-blue" style="padding:11px 26px;font-size:.95rem;border-radius:8px;">&#8599;&#65039;&nbsp; Open in New Tab</a>'
			+   '<a href="' + url + '" download class="portal-doc-btn btn-gray" style="padding:11px 24px;font-size:.95rem;border-radius:8px;">&#128229;&nbsp; Download</a>'
			+ '</div>';
		wrap.appendChild(fb);
	}
	document.getElementById('portalDocViewerModal').style.display = 'flex';
}

function closePortalDocViewer() {
	var frame = document.getElementById('portalDocViewerFrame');
	frame.src = '';
	frame.style.display = 'block';
	var old = document.getElementById('portalDocFallback');
	if (old) old.remove();
	document.getElementById('portalDocViewerModal').style.display = 'none';
}
function openPortalModalData(title,details,resumeUrl,noticeDocUrl){
	document.getElementById('portalModalTitle').innerText=title;
	var html='<div class="portal-detail-grid">';
	for(var k in details){if(details[k]){html+='<div class="portal-detail-item"><strong>'+k+'</strong><span>'+details[k]+'</span></div>';}}
	html+='</div>';
	if(resumeUrl||noticeDocUrl){
		html+='<div style="margin-top:18px;display:flex;gap:10px;border-top:1px solid #334155;padding-top:14px;flex-wrap:wrap;">';
		if(resumeUrl){
			html+='<button type="button" onclick="openPortalDocViewer(\''+resumeUrl+'\',\'Resume - '+encodeURIComponent(title)+'\')" class="portal-doc-btn btn-blue" style="padding:8px 14px;font-size:.86rem;border:none;cursor:pointer;">&#128065; View Resume</button>';
			html+='<a href="'+resumeUrl+'" target="_blank" download class="portal-doc-btn btn-gray" style="padding:8px 13px;font-size:.86rem;">&#128229; Download CV</a>';
		}
		if(noticeDocUrl){
			html+='<button type="button" onclick="openPortalDocViewer(\''+noticeDocUrl+'\',\'Notice - '+encodeURIComponent(title)+'\')" class="portal-doc-btn btn-gray" style="padding:8px 13px;font-size:.86rem;border:none;cursor:pointer;">&#128065; Notice Doc</button>';
		}
		html+='</div>';
	}
	document.getElementById('portalModalBody').innerHTML=html;
	document.getElementById('portalModal').style.display='flex';
}
function closePortalModal(){document.getElementById('portalModal').style.display='none';}
document.addEventListener('keydown',function(e){
	if(e.key==='Escape'){closePortalModal();closePortalDocViewer();var sb=document.getElementById('portalSidebar');if(sb)sb.classList.remove('mobile-open');}
});
function filterPortalTable(tableId,query){
	var table=document.getElementById(tableId);if(!table)return;
	var rows=table.getElementsByTagName('tr');var filter=query.toLowerCase();
	for(var i=1;i<rows.length;i++){var text=rows[i].textContent||rows[i].innerText;rows[i].style.display=text.toLowerCase().indexOf(filter)>-1?'':'none';}
}
function togglePassVisibility(){
	var inp=document.getElementById('new_admin_password');if(!inp)return;
	inp.type=inp.type==='password'?'text':'password';
}
document.addEventListener('click',function(e){
	var sb=document.getElementById('portalSidebar');var toggle=document.getElementById('sidebarToggle');
	if(sb&&toggle&&window.innerWidth<=900&&!sb.contains(e.target)&&!toggle.contains(e.target)){sb.classList.remove('mobile-open');}
});
</script>

<?php wp_footer(); ?>
</body>
</html>
