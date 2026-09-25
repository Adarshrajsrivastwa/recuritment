<?php
/**
 * Template Name: SAM Executive Admin Portal
 * 
 * Custom Frontend Website-style Admin Portal & Leads Management Hub
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// Handle Frontend Login Action
$login_error = '';
if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['sam_portal_login'] ) ) {
	if ( ! isset( $_POST['sam_portal_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sam_portal_nonce'] ) ), 'sam_portal_login_action' ) ) {
		$login_error = 'Security check failed. Please refresh and try again.';
	} else {
		$login_user = sanitize_text_field( wp_unslash( $_POST['portal_username'] ?? '' ) );
		$login_pass = $_POST['portal_password'] ?? '';
		$remember   = ! empty( $_POST['remember_me'] );

		$creds = array(
			'user_login'    => $login_user,
			'user_password' => $login_pass,
			'remember'      => $remember,
		);

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

// Handle Frontend Logout Action
if ( isset( $_GET['sam_logout'] ) && '1' === $_GET['sam_logout'] ) {
	wp_logout();
	wp_safe_redirect( get_permalink() );
	exit;
}

$is_admin_logged_in = current_user_can( 'manage_options' );

get_header();
?>

<div class="sam-portal-wrapper">

<?php if ( ! $is_admin_logged_in ) : ?>

	<!-- ===================================================================
	     FRONTEND ADMIN LOGIN SCREEN
	     =================================================================== -->
	<section class="portal-login-section">
		<div class="container portal-login-container">
			<div class="portal-login-card">
				
				<div class="portal-login-head">
					<div class="portal-badge-logo">SAM</div>
					<h2>SAM Admin Portal</h2>
					<p>Sign in with your corporate administrator credentials to manage candidate CVs, employer mandates, and inquiries.</p>
				</div>

				<?php if ( ! empty( $login_error ) ) : ?>
					<div class="portal-alert portal-alert-error" role="alert">
						<span class="portal-alert-icon">⚠️</span>
						<div><?php echo wp_kses_post( $login_error ); ?></div>
					</div>
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
						<label class="portal-remember">
							<input type="checkbox" name="remember_me" value="1" checked> Remember this session
						</label>
						<span class="portal-hint">Default: <code>sales@samcareer.com</code> / <code>sam@admin</code></span>
					</div>

					<button type="submit" class="btn btn-primary portal-submit-btn">
						🔒 Access SAM Admin Portal
					</button>

					<div class="portal-card-footer">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="portal-back-link">&larr; Return to Website Home</a>
					</div>
				</form>

			</div>
		</div>
	</section>

<?php else : ?>

	<!-- ===================================================================
	     FRONTEND EXECUTIVE DASHBOARD (AUTHENTICATED)
	     =================================================================== -->
	<?php
	$current_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'overview';

	// Query Counts
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

	<section class="portal-dashboard-section">
		<div class="container portal-dash-container">

			<!-- Portal Top Navigation Bar -->
			<div class="portal-top-bar">
				<div class="portal-brand-flex">
					<div class="portal-badge-logo">SAM</div>
					<div>
						<h1>Executive Portal &bull; Form Submissions Desk</h1>
						<p class="portal-user-meta">
							<span class="portal-online-dot"></span> Logged in as <strong>sales@samcareer.com</strong> (Administrator)
						</p>
					</div>
				</div>

				<div class="portal-top-actions">
					<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=' . ( 'overview' === $current_tab ? 'all' : $current_tab ) ) ); ?>" class="portal-btn portal-btn-export">
						📥 Export <?php echo esc_html( ucfirst( $current_tab ) ); ?> to CSV
					</a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="portal-btn portal-btn-outline" target="_blank">
						🌐 View Site
					</a>
					<a href="<?php echo esc_url( add_query_arg( 'sam_logout', '1', get_permalink() ) ); ?>" class="portal-btn portal-btn-logout">
						🚪 Log Out
					</a>
				</div>
			</div>

			<!-- Live KPI Cards -->
			<div class="portal-kpi-grid">
				<div class="portal-kpi-card <?php echo 'overview' === $current_tab ? 'is-active' : ''; ?>">
					<div class="portal-kpi-icon icon-blue">📊</div>
					<div>
						<span class="portal-kpi-title">Total Submissions</span>
						<strong class="portal-kpi-val"><?php echo esc_html( $total_leads ); ?></strong>
					</div>
				</div>

				<div class="portal-kpi-card <?php echo 'candidates' === $current_tab ? 'is-active' : ''; ?>">
					<div class="portal-kpi-icon icon-green">🧑‍💼</div>
					<div>
						<span class="portal-kpi-title">Candidate Profiles (CVs)</span>
						<strong class="portal-kpi-val"><?php echo esc_html( $candidate_count ); ?></strong>
					</div>
				</div>

				<div class="portal-kpi-card <?php echo 'hiring' === $current_tab ? 'is-active' : ''; ?>">
					<div class="portal-kpi-icon icon-amber">🏢</div>
					<div>
						<span class="portal-kpi-title">Employer Mandates</span>
						<strong class="portal-kpi-val"><?php echo esc_html( $hiring_count ); ?></strong>
					</div>
				</div>

				<div class="portal-kpi-card <?php echo 'contact' === $current_tab ? 'is-active' : ''; ?>">
					<div class="portal-kpi-icon icon-purple">✉️</div>
					<div>
						<span class="portal-kpi-title">Contact Inquiries</span>
						<strong class="portal-kpi-val"><?php echo esc_html( $contact_count ); ?></strong>
					</div>
				</div>
			</div>

			<!-- Dashboard Tabs -->
			<div class="portal-tabs-nav">
				<a href="<?php echo esc_url( add_query_arg( 'tab', 'overview', get_permalink() ) ); ?>" class="portal-tab-link <?php echo 'overview' === $current_tab ? 'active' : ''; ?>">
					📊 Overview
				</a>
				<a href="<?php echo esc_url( add_query_arg( 'tab', 'candidates', get_permalink() ) ); ?>" class="portal-tab-link <?php echo 'candidates' === $current_tab ? 'active' : ''; ?>">
					🧑‍💼 Candidate CVs (<?php echo esc_html( $candidate_count ); ?>)
				</a>
				<a href="<?php echo esc_url( add_query_arg( 'tab', 'hiring', get_permalink() ) ); ?>" class="portal-tab-link <?php echo 'hiring' === $current_tab ? 'active' : ''; ?>">
					🏢 Employer Mandates (<?php echo esc_html( $hiring_count ); ?>)
				</a>
				<a href="<?php echo esc_url( add_query_arg( 'tab', 'contact', get_permalink() ) ); ?>" class="portal-tab-link <?php echo 'contact' === $current_tab ? 'active' : ''; ?>">
					✉️ Contact Messages (<?php echo esc_html( $contact_count ); ?>)
				</a>
			</div>

			<!-- TAB CONTENT BODIES -->
			<div class="portal-tab-body">

				<?php if ( 'overview' === $current_tab ) : ?>
					
					<!-- Overview Panels -->
					<div class="portal-panel">
						<div class="portal-panel-head">
							<h3>🧑‍💼 Recent Candidate CV Applications</h3>
							<a href="<?php echo esc_url( add_query_arg( 'tab', 'candidates', get_permalink() ) ); ?>" class="portal-link-accent">View All Candidates &rarr;</a>
						</div>
						<?php sam_portal_render_candidates( 5 ); ?>
					</div>

					<div class="portal-panel" style="margin-top:28px;">
						<div class="portal-panel-head">
							<h3>🏢 Recent Employer Hiring Mandates</h3>
							<a href="<?php echo esc_url( add_query_arg( 'tab', 'hiring', get_permalink() ) ); ?>" class="portal-link-accent">View All Mandates &rarr;</a>
						</div>
						<?php sam_portal_render_hiring( 5 ); ?>
					</div>

				<?php elseif ( 'candidates' === $current_tab ) : ?>

					<div class="portal-panel">
						<div class="portal-panel-head">
							<div>
								<h3>🧑‍💼 All Candidate Applications &amp; Resumes</h3>
								<p style="color:#64748B; font-size:.88rem; margin:3px 0 0;">View candidate experience, CTC requirements, notice status, and download original resumes.</p>
							</div>
							<div class="portal-panel-actions">
								<input type="text" id="portalCandSearch" placeholder="🔍 Search by name, skill, role..." class="portal-search-input" onkeyup="filterPortalTable('portalCandTable', this.value)">
								<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=candidates' ) ); ?>" class="portal-btn portal-btn-export">
									📥 Download CSV
								</a>
							</div>
						</div>
						<?php sam_portal_render_candidates( -1, 'portalCandTable' ); ?>
					</div>

				<?php elseif ( 'hiring' === $current_tab ) : ?>

					<div class="portal-panel">
						<div class="portal-panel-head">
							<div>
								<h3>🏢 All Employer Hiring Mandates (Hire Talent)</h3>
								<p style="color:#64748B; font-size:.88rem; margin:3px 0 0;">Submitted hiring requirements, roles requested, headcount, timeline, and CTC bands.</p>
							</div>
							<div class="portal-panel-actions">
								<input type="text" id="portalHiringSearch" placeholder="🔍 Search company, role, location..." class="portal-search-input" onkeyup="filterPortalTable('portalHiringTable', this.value)">
								<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=hiring' ) ); ?>" class="portal-btn portal-btn-export">
									📥 Download CSV
								</a>
							</div>
						</div>
						<?php sam_portal_render_hiring( -1, 'portalHiringTable' ); ?>
					</div>

				<?php elseif ( 'contact' === $current_tab ) : ?>

					<div class="portal-panel">
						<div class="portal-panel-head">
							<div>
								<h3>✉️ General Inquiries &amp; Contact Form Submissions</h3>
								<p style="color:#64748B; font-size:.88rem; margin:3px 0 0;">General inquiries, vendor empanelment messages, and support messages.</p>
							</div>
							<div class="portal-panel-actions">
								<input type="text" id="portalContactSearch" placeholder="🔍 Search name, email, subject..." class="portal-search-input" onkeyup="filterPortalTable('portalContactTable', this.value)">
								<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=sam_export_leads_csv&export=contact' ) ); ?>" class="portal-btn portal-btn-export">
									📥 Download CSV
								</a>
							</div>
						</div>
						<?php sam_portal_render_contact( -1, 'portalContactTable' ); ?>
					</div>

				<?php endif; ?>

			</div>

		</div>
	</section>

	<!-- POPUP DETAIL MODAL -->
	<div id="portalModal" class="portal-modal-backdrop" style="display:none;" onclick="if(event.target===this)closePortalModal();">
		<div class="portal-modal-content">
			<div class="portal-modal-head">
				<h3 id="portalModalTitle">Submission Details</h3>
				<button type="button" class="portal-modal-close" onclick="closePortalModal()">&times;</button>
			</div>
			<div class="portal-modal-body" id="portalModalBody">
				<!-- Injected by JavaScript -->
			</div>
		</div>
	</div>

	<!-- LIVE DOCUMENT / CV VIEWER MODAL -->
	<div id="portalDocViewerModal" class="portal-modal-backdrop" style="display:none;" onclick="if(event.target===this)closePortalDocViewer();">
		<div class="portal-modal-content" style="max-width:1050px; width:95%; height:90vh;">
			<div class="portal-modal-head">
				<div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
					<h3 id="portalDocViewerTitle" style="font-size:1.05rem;">Document Viewer</h3>
					<a id="portalDocViewerDownloadBtn" href="#" target="_blank" class="portal-doc-btn btn-blue" style="padding:4px 10px; font-size:.78rem;" download>📥 Download</a>
					<a id="portalDocViewerNewTabBtn" href="#" target="_blank" class="portal-doc-btn btn-gray" style="padding:4px 10px; font-size:.78rem;">↗️ Open in New Tab</a>
				</div>
				<button type="button" class="portal-modal-close" onclick="closePortalDocViewer()">&times;</button>
			</div>
			<div class="portal-modal-body" style="padding:0; height:calc(100% - 65px); background:#0F172A; display:flex; flex-direction:column; overflow:hidden;">
				<iframe id="portalDocViewerFrame" src="" style="width:100%; height:100%; border:none; background:#ffffff;"></iframe>
			</div>
		</div>
	</div>

<?php endif; ?>

</div>

<!-- ===================================================================
     PORTAL DATA RENDERING FUNCTIONS
     =================================================================== -->
<?php
function sam_portal_render_candidates( $limit = -1, $table_id = '' ) {
	$posts = get_posts( array(
		'post_type'      => 'sam_candidate',
		'posts_per_page' => $limit,
		'post_status'    => 'any',
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	if ( empty( $posts ) ) {
		echo '<p class="portal-empty-notice">No candidate applications received yet.</p>';
		return;
	}
	?>
	<div class="portal-table-wrap">
		<table class="portal-table" id="<?php echo esc_attr( $table_id ); ?>">
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
						<strong class="portal-main-title"><?php echo esc_html( $name ); ?></strong><br>
						<a href="mailto:<?php echo esc_attr( $email ); ?>" class="portal-sub-link"><?php echo esc_html( $email ); ?></a>
						<?php if ( $phone ) : ?>
							<br><span class="portal-text-dim"><?php echo esc_html( $phone ); ?></span>
						<?php endif; ?>
					</td>
					<td>
						<strong><?php echo esc_html( $role ); ?></strong><br>
						<span class="portal-badge badge-gray"><?php echo esc_html( $exp ); ?></span>
					</td>
					<td>
						<span class="portal-badge badge-blue"><?php echo esc_html( $skill ); ?></span>
					</td>
					<td><?php echo esc_html( $location ); ?></td>
					<td>
						<small>Cur: <strong><?php echo esc_html( $curr_ctc ); ?></strong></small><br>
						<small>Exp: <strong style="color:#059669;"><?php echo esc_html( $exp_ctc ); ?></strong></small>
					</td>
					<td>
						<?php if ( 'Yes' === $serving ) : ?>
							<span class="portal-badge badge-green">Serving Notice</span><br>
						<?php else : ?>
							<span class="portal-badge badge-gray">Not Serving</span><br>
						<?php endif; ?>
						<small class="portal-text-dim"><?php echo esc_html( $timeline ); ?></small>
					</td>
					<td>
						<?php if ( $resume ) : ?>
							<div style="display:flex; align-items:center; gap:6px;">
								<button type="button" class="portal-doc-btn btn-blue" onclick="openPortalDocViewer('<?php echo esc_url( $resume ); ?>', 'Resume - <?php echo esc_js( $name ); ?>')" style="cursor:pointer; border:none;">
									👁️ View CV
								</button>
								<a href="<?php echo esc_url( $resume ); ?>" target="_blank" download class="portal-doc-btn btn-gray" title="Download Resume" style="padding:4px 7px;">
									📥
								</a>
							</div>
						<?php else : ?>
							<span class="portal-text-dim">No CV</span>
						<?php endif; ?>

						<?php if ( $notice_doc ) : ?>
							<div style="display:flex; align-items:center; gap:6px; margin-top:6px;">
								<button type="button" class="portal-doc-btn btn-gray" onclick="openPortalDocViewer('<?php echo esc_url( $notice_doc ); ?>', 'Notice Letter - <?php echo esc_js( $name ); ?>')" style="cursor:pointer; border:none; font-size:.72rem;">
									👁️ Notice Doc
								</button>
								<a href="<?php echo esc_url( $notice_doc ); ?>" target="_blank" download class="portal-doc-btn btn-gray" title="Download Notice Doc" style="padding:2px 5px; font-size:.72rem;">
									📥
								</a>
							</div>
						<?php endif; ?>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="portal-btn-view" onclick="openPortalModalData('Candidate: <?php echo esc_js( $name ); ?>', <?php echo esc_attr( $details_json ); ?>, '<?php echo esc_url( $resume ); ?>', '<?php echo esc_url( $notice_doc ); ?>')">
							Full Profile &rarr;
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
}

function sam_portal_render_hiring( $limit = -1, $table_id = '' ) {
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
		echo '<p class="portal-empty-notice">No employer mandates submitted yet.</p>';
		return;
	}
	?>
	<div class="portal-table-wrap">
		<table class="portal-table" id="<?php echo esc_attr( $table_id ); ?>">
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
						'Requirement Notes'=> $message,
					) ), ENT_QUOTES, 'UTF-8' );
				?>
				<tr>
					<td>
						<strong class="portal-main-title"><?php echo esc_html( $company ); ?></strong><br>
						<span><?php echo esc_html( $name ); ?></span><br>
						<a href="mailto:<?php echo esc_attr( $email ); ?>" class="portal-sub-link"><?php echo esc_html( $email ); ?></a>
						<?php if ( $phone ) : ?> &bull; <span class="portal-text-dim"><?php echo esc_html( $phone ); ?></span><?php endif; ?>
					</td>
					<td>
						<div style="max-width:260px; word-break:break-word;">
							<strong><?php echo esc_html( $roles ); ?></strong>
						</div>
					</td>
					<td>
						<span class="portal-badge badge-blue"><?php echo esc_html( $headcount ? $headcount . ' Pos' : 'N/A' ); ?></span>
					</td>
					<td>
						<span class="portal-badge badge-amber"><?php echo esc_html( $timeline ); ?></span>
					</td>
					<td>
						<strong><?php echo esc_html( $budget ?: 'Flexible' ); ?></strong>
					</td>
					<td>
						<span class="portal-badge badge-gray"><?php echo esc_html( $model ?: 'Direct Hiring' ); ?></span><br>
						<small class="portal-text-dim"><?php echo esc_html( $location ); ?></small>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="portal-btn-view" onclick="openPortalModalData('Mandate: <?php echo esc_js( $company ); ?>', <?php echo esc_attr( $details_json ); ?>)">
							View Details &rarr;
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
}

function sam_portal_render_contact( $limit = -1, $table_id = '' ) {
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
		echo '<p class="portal-empty-notice">No contact messages received yet.</p>';
		return;
	}
	?>
	<div class="portal-table-wrap">
		<table class="portal-table" id="<?php echo esc_attr( $table_id ); ?>">
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
						'Sender Name'      => $name,
						'Email Address'    => $email,
						'Contact Phone'    => $phone,
						'Inquiry Category' => $subject,
						'Full Message'     => $message,
					) ), ENT_QUOTES, 'UTF-8' );
				?>
				<tr>
					<td>
						<strong class="portal-main-title"><?php echo esc_html( $name ); ?></strong><br>
						<a href="mailto:<?php echo esc_attr( $email ); ?>" class="portal-sub-link"><?php echo esc_html( $email ); ?></a>
						<?php if ( $phone ) : ?> &bull; <span class="portal-text-dim"><?php echo esc_html( $phone ); ?></span><?php endif; ?>
					</td>
					<td>
						<span class="portal-badge badge-blue"><?php echo esc_html( $subject ); ?></span>
					</td>
					<td>
						<div style="max-width:360px; word-break:break-word; color:#475569;">
							<?php echo esc_html( wp_trim_words( $message, 18 ) ); ?>
						</div>
					</td>
					<td>
						<small><?php echo esc_html( get_the_date( 'M j, Y', $p ) ); ?></small>
					</td>
					<td>
						<button type="button" class="portal-btn-view" onclick="openPortalModalData('Inquiry: <?php echo esc_js( $name ); ?>', <?php echo esc_attr( $details_json ); ?>)">
							Read Message &rarr;
						</button>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php
}
?>

<!-- ===================================================================
     PORTAL STYLING & JAVASCRIPT
     =================================================================== -->
<style>
/* Portal Global Wrapper */
.sam-portal-wrapper {
	background: #0B1120;
	min-height: calc(100vh - 120px);
	padding: 40px 0 80px;
	color: #F8FAFC;
	font-family: var(--font-body, 'Inter', sans-serif);
}

/* Login Card Section */
.portal-login-section {
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 40px 0;
}
.portal-login-container {
	max-width: 520px;
	margin: 0 auto;
}
.portal-login-card {
	background: #0F172A;
	border: 1px solid #1E293B;
	border-radius: 16px;
	padding: 36px 32px;
	box-shadow: 0 20px 50px rgba(0,0,0,0.5);
}
.portal-login-head {
	text-align: center;
	margin-bottom: 28px;
}
.portal-badge-logo {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	background: linear-gradient(135deg, #0284C7, #2563EB);
	color: #fff;
	font-weight: 800;
	font-size: 1.3rem;
	padding: 8px 18px;
	border-radius: 10px;
	letter-spacing: .05em;
	margin-bottom: 16px;
	box-shadow: 0 4px 15px rgba(2,132,199,0.35);
}
.portal-login-head h2 {
	color: #F8FAFC;
	font-size: 1.5rem;
	font-weight: 700;
	margin: 0 0 8px;
}
.portal-login-head p {
	color: #94A3B8;
	font-size: .88rem;
	line-height: 1.5;
	margin: 0;
}
.portal-alert {
	display: flex;
	align-items: center;
	gap: 12px;
	background: rgba(239,68,68,0.12);
	border: 1px solid rgba(239,68,68,0.3);
	color: #FCA5A5;
	padding: 12px 16px;
	border-radius: 8px;
	margin-bottom: 20px;
	font-size: .88rem;
}
.portal-form-group {
	margin-bottom: 18px;
}
.portal-form-group label {
	display: block;
	font-size: .84rem;
	font-weight: 600;
	color: #CBD5E1;
	margin-bottom: 6px;
}
.portal-input-wrap input {
	width: 100%;
	background: #1E293B;
	border: 1px solid #334155;
	border-radius: 8px;
	padding: 12px 16px;
	color: #F8FAFC;
	font-size: .95rem;
	transition: all .2s;
	box-sizing: border-box;
}
.portal-input-wrap input:focus {
	outline: none;
	border-color: #0284C7;
	box-shadow: 0 0 0 3px rgba(2,132,199,0.25);
}
.portal-form-options {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-bottom: 22px;
	font-size: .82rem;
	color: #94A3B8;
}
.portal-remember {
	display: flex;
	align-items: center;
	gap: 6px;
	cursor: pointer;
}
.portal-hint code {
	background: #1E293B;
	padding: 2px 6px;
	border-radius: 4px;
	color: #38BDF8;
	font-size: .78rem;
}
.portal-submit-btn {
	width: 100%;
	padding: 13px;
	font-size: 1rem;
	font-weight: 700;
	border-radius: 8px;
	background: linear-gradient(135deg, #0284C7, #2563EB);
	border: none;
	cursor: pointer;
	color: #fff;
	box-shadow: 0 4px 15px rgba(2,132,199,0.3);
	transition: opacity .2s;
}
.portal-submit-btn:hover {
	opacity: .92;
}
.portal-card-footer {
	text-align: center;
	margin-top: 20px;
}
.portal-back-link {
	color: #64748B;
	text-decoration: none;
	font-size: .85rem;
	transition: color .2s;
}
.portal-back-link:hover {
	color: #94A3B8;
}

/* Dashboard Styles */
.portal-dash-container {
	max-width: 1360px;
	margin: 0 auto;
}
.portal-top-bar {
	display: flex;
	justify-content: space-between;
	align-items: center;
	background: #0F172A;
	border: 1px solid #1E293B;
	padding: 22px 28px;
	border-radius: 16px;
	margin-bottom: 24px;
	box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}
.portal-brand-flex {
	display: flex;
	align-items: center;
	gap: 16px;
}
.portal-top-bar h1 {
	font-size: 1.35rem;
	font-weight: 700;
	margin: 0 0 4px;
	color: #F8FAFC;
}
.portal-user-meta {
	font-size: .84rem;
	color: #94A3B8;
	margin: 0;
	display: flex;
	align-items: center;
	gap: 6px;
}
.portal-online-dot {
	width: 8px;
	height: 8px;
	background: #10B981;
	border-radius: 50%;
	display: inline-block;
	box-shadow: 0 0 8px #10B981;
}
.portal-top-actions {
	display: flex;
	align-items: center;
	gap: 12px;
}
.portal-btn {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	padding: 8px 16px;
	border-radius: 8px;
	font-weight: 600;
	font-size: .86rem;
	text-decoration: none;
	transition: all .2s;
	cursor: pointer;
}
.portal-btn-export {
	background: #0284C7;
	color: #fff;
	border: 1px solid #0284C7;
}
.portal-btn-export:hover {
	background: #0369A1;
}
.portal-btn-outline {
	background: transparent;
	color: #CBD5E1;
	border: 1px solid #334155;
}
.portal-btn-outline:hover {
	background: #1E293B;
	color: #fff;
}
.portal-btn-logout {
	background: rgba(239,68,68,0.12);
	color: #F87171;
	border: 1px solid rgba(239,68,68,0.3);
}
.portal-btn-logout:hover {
	background: rgba(239,68,68,0.22);
}

/* KPI Cards Grid */
.portal-kpi-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
	gap: 18px;
	margin-bottom: 24px;
}
.portal-kpi-card {
	background: #0F172A;
	border: 1px solid #1E293B;
	border-radius: 12px;
	padding: 20px 22px;
	display: flex;
	align-items: center;
	gap: 16px;
	box-shadow: 0 4px 20px rgba(0,0,0,0.2);
	transition: all .2s;
}
.portal-kpi-card:hover {
	border-color: #334155;
	transform: translateY(-2px);
}
.portal-kpi-card.is-active {
	border-color: #0284C7;
	border-left-width: 4px;
}
.portal-kpi-icon {
	width: 50px;
	height: 50px;
	border-radius: 12px;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 1.4rem;
	flex-shrink: 0;
}
.icon-blue { background: rgba(2,132,199,0.15); border: 1px solid rgba(2,132,199,0.3); }
.icon-green { background: rgba(16,185,129,0.15); border: 1px solid rgba(16,185,129,0.3); }
.icon-amber { background: rgba(245,158,11,0.15); border: 1px solid rgba(245,158,11,0.3); }
.icon-purple { background: rgba(139,92,246,0.15); border: 1px solid rgba(139,92,246,0.3); }

.portal-kpi-title {
	display: block;
	font-size: .78rem;
	text-transform: uppercase;
	letter-spacing: .05em;
	color: #94A3B8;
	font-weight: 600;
	margin-bottom: 2px;
}
.portal-kpi-val {
	font-size: 1.65rem;
	font-weight: 800;
	color: #F8FAFC;
}

/* Tabs Nav */
.portal-tabs-nav {
	display: flex;
	gap: 10px;
	border-bottom: 1px solid #1E293B;
	margin-bottom: 22px;
	padding-bottom: 0;
	overflow-x: auto;
}
.portal-tab-link {
	padding: 12px 20px;
	font-size: .94rem;
	font-weight: 600;
	color: #94A3B8;
	text-decoration: none;
	border-bottom: 3px solid transparent;
	transition: all .2s;
	white-space: nowrap;
}
.portal-tab-link:hover {
	color: #F8FAFC;
}
.portal-tab-link.active {
	color: #38BDF8;
	border-bottom-color: #0284C7;
	background: rgba(2,132,199,0.08);
	border-radius: 8px 8px 0 0;
}

/* Panels */
.portal-panel {
	background: #0F172A;
	border: 1px solid #1E293B;
	border-radius: 14px;
	padding: 26px;
	box-shadow: 0 4px 25px rgba(0,0,0,0.25);
}
.portal-panel-head {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-bottom: 20px;
	padding-bottom: 16px;
	border-bottom: 1px solid #1E293B;
	flex-wrap: wrap;
	gap: 14px;
}
.portal-panel-head h3 {
	margin: 0;
	font-size: 1.2rem;
	color: #F8FAFC;
	font-weight: 700;
}
.portal-panel-actions {
	display: flex;
	align-items: center;
	gap: 12px;
}
.portal-search-input {
	background: #1E293B;
	border: 1px solid #334155;
	padding: 8px 14px;
	border-radius: 8px;
	color: #F8FAFC;
	font-size: .86rem;
	width: 260px;
	outline: none;
}
.portal-search-input:focus {
	border-color: #0284C7;
}
.portal-link-accent {
	color: #38BDF8;
	text-decoration: none;
	font-size: .9rem;
	font-weight: 600;
}
.portal-link-accent:hover {
	text-decoration: underline;
}

/* Portal Tables */
.portal-table-wrap {
	overflow-x: auto;
}
.portal-table {
	width: 100%;
	border-collapse: collapse;
	font-size: .88rem;
}
.portal-table th {
	background: #1E293B;
	color: #94A3B8;
	font-weight: 700;
	text-align: left;
	padding: 12px 14px;
	font-size: .78rem;
	text-transform: uppercase;
	letter-spacing: .05em;
	border-bottom: 1px solid #334155;
}
.portal-table td {
	padding: 14px;
	border-bottom: 1px solid #1E293B;
	color: #E2E8F0;
	vertical-align: middle;
}
.portal-table tr:hover td {
	background: rgba(30,41,59,0.5);
}

.portal-main-title {
	font-size: .95rem;
	color: #F8FAFC;
}
.portal-sub-link {
	color: #38BDF8;
	text-decoration: none;
	font-size: .84rem;
}
.portal-sub-link:hover {
	text-decoration: underline;
}
.portal-text-dim {
	color: #94A3B8;
	font-size: .82rem;
}

/* Badges */
.portal-badge {
	display: inline-block;
	padding: 3px 9px;
	border-radius: 20px;
	font-size: .72rem;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: .03em;
}
.badge-blue { background: rgba(2,132,199,0.2); color: #38BDF8; border: 1px solid rgba(2,132,199,0.4); }
.badge-green { background: rgba(16,185,129,0.2); color: #34D399; border: 1px solid rgba(16,185,129,0.4); }
.badge-amber { background: rgba(245,158,11,0.2); color: #FBBF24; border: 1px solid rgba(245,158,11,0.4); }
.badge-gray { background: #1E293B; color: #94A3B8; border: 1px solid #334155; }

.portal-doc-btn {
	display: inline-block;
	padding: 4px 10px;
	border-radius: 6px;
	font-size: .78rem;
	font-weight: 600;
	text-decoration: none;
	transition: opacity .2s;
}
.btn-blue { background: #0284C7; color: #fff !important; }
.btn-blue:hover { opacity: .9; }
.btn-gray { background: #334155; color: #E2E8F0 !important; }
.btn-gray:hover { opacity: .9; }

.portal-btn-view {
	background: none;
	border: 0;
	color: #38BDF8;
	font-size: .86rem;
	font-weight: 600;
	cursor: pointer;
	padding: 0;
}
.portal-btn-view:hover {
	text-decoration: underline;
}
.portal-empty-notice {
	color: #64748B;
	padding: 24px 0;
	margin: 0;
	font-style: italic;
}

/* Modal Popup */
.portal-modal-backdrop {
	position: fixed;
	top: 0; left: 0; width: 100%; height: 100%;
	background: rgba(11,17,32,0.85);
	backdrop-filter: blur(5px);
	z-index: 999999;
	display: flex;
	align-items: center;
	justify-content: center;
}
.portal-modal-content {
	background: #0F172A;
	border: 1px solid #334155;
	border-radius: 16px;
	width: 90%;
	max-width: 680px;
	max-height: 85vh;
	display: flex;
	flex-direction: column;
	overflow: hidden;
	box-shadow: 0 25px 60px rgba(0,0,0,0.6);
}
.portal-modal-head {
	background: #1E293B;
	padding: 18px 24px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	border-bottom: 1px solid #334155;
}
.portal-modal-head h3 {
	margin: 0;
	color: #F8FAFC;
	font-size: 1.15rem;
}
.portal-modal-close {
	background: none;
	border: 0;
	color: #94A3B8;
	font-size: 1.8rem;
	cursor: pointer;
	line-height: 1;
}
.portal-modal-close:hover {
	color: #fff;
}
.portal-modal-body {
	padding: 24px;
	overflow-y: auto;
}
.portal-detail-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 14px;
}
.portal-detail-item {
	background: #1E293B;
	padding: 12px 16px;
	border-radius: 8px;
	border: 1px solid #334155;
}
.portal-detail-item strong {
	display: block;
	font-size: .74rem;
	text-transform: uppercase;
	letter-spacing: .05em;
	color: #94A3B8;
	margin-bottom: 4px;
}
.portal-detail-item span {
	color: #F8FAFC;
	font-weight: 600;
	font-size: .92rem;
	word-break: break-word;
}
</style>

<script>
function openPortalDocViewer(url, title) {
	if (!url) return;
	document.getElementById('portalDocViewerTitle').innerText = title || 'Document Preview';
	document.getElementById('portalDocViewerDownloadBtn').href = url;
	document.getElementById('portalDocViewerNewTabBtn').href = url;
	
	var isDocx = url.match(/\.(docx?|rtf)$/i);
	if (isDocx && !url.includes('localhost') && !url.includes('127.0.0.1')) {
		document.getElementById('portalDocViewerFrame').src = 'https://docs.google.com/viewer?url=' + encodeURIComponent(url) + '&embedded=true';
	} else {
		document.getElementById('portalDocViewerFrame').src = url;
	}
	document.getElementById('portalDocViewerModal').style.display = 'flex';
}

function closePortalDocViewer() {
	document.getElementById('portalDocViewerFrame').src = '';
	document.getElementById('portalDocViewerModal').style.display = 'none';
}

function openPortalModalData(title, details, resumeUrl, noticeDocUrl) {
	document.getElementById('portalModalTitle').innerText = title;
	var html = '<div class="portal-detail-grid">';
	for (var k in details) {
		if (details[k]) {
			html += '<div class="portal-detail-item"><strong>' + k + '</strong><span>' + details[k] + '</span></div>';
		}
	}
	html += '</div>';

	if (resumeUrl || noticeDocUrl) {
		html += '<div style="margin-top:20px; display:flex; gap:10px; border-top:1px solid #334155; padding-top:16px; flex-wrap:wrap;">';
		if (resumeUrl) {
			html += '<button type="button" onclick="openPortalDocViewer(\'' + resumeUrl + '\', \'Resume - ' + encodeURIComponent(title) + '\')" class="portal-doc-btn btn-blue" style="padding:8px 16px; font-size:.88rem; border:none; cursor:pointer;">👁️ View Resume Online</button>';
			html += '<a href="' + resumeUrl + '" target="_blank" download class="portal-doc-btn btn-gray" style="padding:8px 14px; font-size:.88rem;">📥 Download CV</a>';
		}
		if (noticeDocUrl) {
			html += '<button type="button" onclick="openPortalDocViewer(\'' + noticeDocUrl + '\', \'Notice Letter - ' + encodeURIComponent(title) + '\')" class="portal-doc-btn btn-gray" style="padding:8px 14px; font-size:.88rem; border:none; cursor:pointer;">👁️ View Notice Doc</button>';
		}
		html += '</div>';
	}

	document.getElementById('portalModalBody').innerHTML = html;
	document.getElementById('portalModal').style.display = 'flex';
}

function closePortalModal() {
	document.getElementById('portalModal').style.display = 'none';
}

document.addEventListener('keydown', function(e) {
	if (e.key === 'Escape') {
		closePortalModal();
		closePortalDocViewer();
	}
});

function filterPortalTable(tableId, query) {
	var table = document.getElementById(tableId);
	if (!table) return;
	var rows = table.getElementsByTagName('tr');
	var filter = query.toLowerCase();

	for (var i = 1; i < rows.length; i++) {
		var text = rows[i].textContent || rows[i].innerText;
		if (text.toLowerCase().indexOf(filter) > -1) {
			rows[i].style.display = '';
		} else {
			rows[i].style.display = 'none';
		}
	}
}
</script>

<?php get_footer(); ?>
