<?php
/**
 * Template Name: Immediate & 30-Day Hiring
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('clock'); ?> Immediate &amp; 30-Day Hiring</span>
		<h1>Vetted Talent Ready in <span class="text-accent-light">0 to 30 Days</span> — Guaranteed.</h1>
		<p>Stop losing revenue to 90-day notice periods. SAM's exclusive pipeline targets professionals who are already serving notice, between jobs, or available immediately — so your critical roles are filled within this calendar month.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Submit an Urgent Role</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-outline-light"><?php echo sam_icon('chat'); ?> Speak to a Recruiter</a>
		</div>
	</div>
</section>

<!-- Stats strip -->
<section class="stats-strip">
	<div class="container stats-grid">
		<div class="stat-item"><span class="stat-num">0–15</span><span class="stat-label">Day Immediate Starters</span></div>
		<div class="stat-item"><span class="stat-num">30</span><span class="stat-label">Day Max Joining Window</span></div>
		<div class="stat-item"><span class="stat-num">48h</span><span class="stat-label">First Profiles Delivered</span></div>
		<div class="stat-item"><span class="stat-num">500+</span><span class="stat-label">Successful Placements</span></div>
	</div>
</section>

<!-- Three tiers -->
<section class="section focus-section">
	<div class="container">
		<div class="section-head">
			<h2>Three Availability Tiers We Focus On</h2>
			<p>Every candidate we present is pre-qualified for one of these three availability windows before you see their profile.</p>
		</div>
		<div class="grid-3 focus-grid">
			<div class="focus-card">
				<div class="icon-badge" style="background:#dcfce7; color:#16a34a;"><?php echo sam_icon('check'); ?></div>
				<h3>Tier 1 — Immediate Starters (0–7 Days)</h3>
				<p>Professionals with no active notice period — freelancers, professionals between jobs, or those with early relieving letters. Can onboard by next week.</p>
				<ul style="margin-top:12px; padding-left:0; list-style:none; display:flex; flex-direction:column; gap:6px;">
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> No notice period obligations</li>
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> Background-verified and ready</li>
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> Can start within 1–7 days</li>
				</ul>
			</div>
			<div class="focus-card">
				<div class="icon-badge" style="background:#dbeafe; color:#1e40af;"><?php echo sam_icon('clock'); ?></div>
				<h3>Tier 2 — Short Notice (8–15 Days)</h3>
				<p>Candidates who have formally resigned and are in their final two weeks. Relieving letters already being processed — clean and fast transitions.</p>
				<ul style="margin-top:12px; padding-left:0; list-style:none; display:flex; flex-direction:column; gap:6px;">
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> Resignation already submitted</li>
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> Last working date confirmed</li>
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> Counter-offer risk pre-assessed</li>
				</ul>
			</div>
			<div class="focus-card">
				<div class="icon-badge" style="background:#ede9fe; color:#7c3aed;"><?php echo sam_icon('calendar'); ?></div>
				<h3>Tier 3 — Verified 30-Day Joiners</h3>
				<p>Candidates with a contractual 30-day notice serving their final month. Release date documented and verified — no last-minute surprises.</p>
				<ul style="margin-top:12px; padding-left:0; list-style:none; display:flex; flex-direction:column; gap:6px;">
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> Documented release date</li>
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> Buyout option explored upfront</li>
					<li style="font-size:.88rem; color:var(--text-muted);"><?php echo sam_icon('check'); ?> Continuous engagement until joining</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- How we prevent ghosting -->
<section class="section why-section">
	<div class="container">
		<div class="section-head">
			<h2>How We Prevent Post-Offer Ghosting</h2>
			<p>The biggest failure point in 0–30 day hiring is drop-off between offer acceptance and Day 1. We solve this proactively.</p>
		</div>
		<div class="grid-4 why-grid">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('chat'); ?></div>
				<h3>Weekly Check-ins</h3>
				<p>Our team contacts every candidate weekly throughout their notice period to track engagement and flag risks early.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h3>Counter-Offer Preparation</h3>
				<p>We pre-brief candidates on how to handle counter-offers from their current employer before the offer is even extended.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('bell'); ?></div>
				<h3>Last-Working-Day Verification</h3>
				<p>We confirm the candidate's last working day with their employer directly, removing uncertainty from your planning.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('check'); ?></div>
				<h3>Day-1 Confirmation</h3>
				<p>We confirm attendance the evening before joining and follow up on the first morning to ensure a clean start.</p>
			</div>
		</div>
	</div>
</section>

<!-- Domains -->
<section class="section journey-section">
	<div class="container">
		<div class="section-head">
			<h2>Roles We Fill on an Immediate Basis</h2>
			<p>Our active 0–30 day pipeline covers every major functional area.</p>
		</div>
		<div class="grid-3 focus-grid">
			<?php
			$roles = array(
				array( 'icon' => 'laptop', 'cat' => 'Technology', 'items' => 'Java, Python, React, DevOps, QA, Cloud, Data Engineers' ),
				array( 'icon' => 'wallet', 'cat' => 'Finance & BFSI', 'items' => 'Risk Analysts, Wealth Managers, Compliance Officers, Credit Underwriters' ),
				array( 'icon' => 'target', 'cat' => 'Operations & Plant', 'items' => 'Plant Supervisors, QA/QC Engineers, Supply Chain, Production Leads' ),
				array( 'icon' => 'users', 'cat' => 'Sales & Growth', 'items' => 'Enterprise Sales, Channel Managers, Inside Sales, Key Account Managers' ),
				array( 'icon' => 'star', 'cat' => 'E-Commerce & Retail', 'items' => 'Warehouse Managers, Last-Mile Leads, Merchandisers, Growth Marketers' ),
				array( 'icon' => 'briefcase', 'cat' => 'Support & Back-Office', 'items' => 'Process Trainers, Operations Leads, Customer Success, HR Executives' ),
			);
			foreach ( $roles as $r ) :
			?>
			<div class="focus-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon( $r['icon'] ); ?></div>
				<h3><?php echo esc_html( $r['cat'] ); ?></h3>
				<p><?php echo esc_html( $r['items'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- SLA Comparison Table -->
<section class="section sla-comparison-section" style="background:#F8FAFC; border-top:1px solid #E2E8F0; border-bottom:1px solid #E2E8F0;">
	<div class="container">
		<div class="section-head text-center">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('shield'); ?> The SAM Advantage</span>
			<h2>Traditional Recruitment vs. SAM 0–30 Day Fast-Track</h2>
			<p>Why modern enterprises and high-growth scale-ups are replacing outdated 90-day recruitment cycles.</p>
		</div>

		<div class="sla-table-wrapper" style="overflow-x:auto; margin-top:32px; box-shadow:0 10px 30px rgba(0,0,0,0.06); border-radius:16px; background:#fff; border:1px solid #E2E8F0;">
			<table class="sla-comparison-table" style="width:100%; border-collapse:collapse; text-align:left; font-size:0.95rem;">
				<thead>
					<tr style="background:#0F172A; color:#fff;">
						<th style="padding:18px 24px; font-weight:700; width:28%;">Hiring Metric &amp; Parameter</th>
						<th style="padding:18px 24px; font-weight:600; color:#94A3B8; width:36%;">Traditional Recruitment Agencies</th>
						<th style="padding:18px 24px; font-weight:700; color:#38BDF8; width:36%; background:#1E293B;">SAM 0–30 Day Fast-Track Engine</th>
					</tr>
				</thead>
				<tbody>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Notice Period Focus</td>
						<td style="padding:16px 24px; color:#64748B;">Generic sourcing (60 to 90 days notice)</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> Exclusively 0–30 days &amp; immediate joiners</td>
					</tr>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">First Profile Shortlist</td>
						<td style="padding:16px 24px; color:#64748B;">7 to 14 business days</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> Within 48 to 72 hours SLA</td>
					</tr>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Offer-to-Joining Ghosting Rate</td>
						<td style="padding:16px 24px; color:#DC2626;">35% to 50% candidate reneges</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> Under 4% with weekly engagement track</td>
					</tr>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Resignation &amp; LWD Verification</td>
						<td style="padding:16px 24px; color:#64748B;">Self-declared, rarely confirmed</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> Formally verified with acceptance proof</td>
					</tr>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Replacement Guarantee</td>
						<td style="padding:16px 24px; color:#64748B;">Standard 30–60 days or credit notes</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> Up to 90 Days Free Replacement Guarantee</td>
					</tr>
					<tr>
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Notice Period Buyout Support</td>
						<td style="padding:16px 24px; color:#64748B;">Not assisted or structured</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> Buyout negotiations &amp; contract structuring</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>

<!-- Cost of Vacancy Callout -->
<section class="section" style="padding:60px 0; background:#0A1024; color:#fff;">
	<div class="container">
		<div style="display:grid; grid-template-columns:1.2fr 0.8fr; gap:40px; align-items:center;">
			<div>
				<span class="eyebrow-badge" style="background:rgba(56,189,248,0.15); color:#38BDF8; border:1px solid rgba(56,189,248,0.3);"><?php echo sam_icon('wallet'); ?> The Math Behind Speed</span>
				<h2 style="color:#fff; margin-top:16px; font-size:2rem; line-height:1.25;">The Hidden Cost of an Open Position: <span style="color:#38BDF8;">&#8377;2.5L to &#8377;8L</span> Lost Per Month</h2>
				<p style="color:#94A3B8; font-size:1.02rem; line-height:1.6; margin-top:14px;">Every 90-day delay in filling critical engineering, sales, or manufacturing leadership roles stalls sprint deliveries, creates burned-out teammates, and burns budget on overtime. Cutting your cycle to 20 days preserves momentum and saves substantial capital.</p>
				<div style="display:flex; gap:16px; margin-top:24px; flex-wrap:wrap;">
					<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Fast-Track Your Mandate</a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-outline-light"><?php echo sam_icon('mail'); ?> Contact Fast-Track Desk</a>
				</div>
			</div>
			<div style="background:#111A38; border:1px solid rgba(255,255,255,0.1); border-radius:18px; padding:32px;">
				<h3 style="color:#fff; font-size:1.2rem; margin-bottom:18px; display:flex; align-items:center; gap:10px;">
					<span style="color:#10B981;"><?php echo sam_icon('check'); ?></span> 0–30 Day Availability Pipeline
				</h3>
				<div style="display:flex; flex-direction:column; gap:14px;">
					<div style="background:rgba(255,255,255,0.04); padding:12px 16px; border-radius:10px; border-left:3px solid #10B981;">
						<div style="font-weight:700; color:#fff; font-size:0.95rem;">Software &amp; Cloud Engineers</div>
						<div style="font-size:0.82rem; color:#94A3B8;">Notice: Serving final 15–20 days &bull; Ready for technical rounds</div>
					</div>
					<div style="background:rgba(255,255,255,0.04); padding:12px 16px; border-radius:10px; border-left:3px solid #38BDF8;">
						<div style="font-weight:700; color:#fff; font-size:0.95rem;">Plant &amp; Production Supervisors</div>
						<div style="font-size:0.82rem; color:#94A3B8;">Notice: Immediate to 15 days &bull; Documented relieving letters</div>
					</div>
					<div style="background:rgba(255,255,255,0.04); padding:12px 16px; border-radius:10px; border-left:3px solid #F59E0B;">
						<div style="font-weight:700; color:#fff; font-size:0.95rem;">Corporate Sales &amp; Key Accounts</div>
						<div style="font-size:0.82rem; color:#94A3B8;">Notice: 0–30 days verified &bull; Proven track record in B2B</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Have a role that can't wait three months?</h2>
		<p>Share the requirement — we'll deliver 3–5 pre-screened profiles within 48–72 hours.</p>
		<div class="hero-actions" style="justify-content:center; margin-top:20px;">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Submit an Urgent Role</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-outline"><?php echo sam_icon('chat'); ?> Call Us Now</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
