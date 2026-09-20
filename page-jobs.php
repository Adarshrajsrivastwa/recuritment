<?php
/**
 * Template Name: Jobs & Career
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('briefcase'); ?> Career Opportunities</span>
		<h1>Fast-Track Your Career With India's Top Employers</h1>
		<p>Connect with high-growth startups, Fortune 500 enterprises, and market leaders. Special focus on immediate starters and candidates serving notice periods.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('upload'); ?> Upload Your CV</a>
			<a href="#open-roles" class="btn btn-secondary">Explore Open Roles</a>
		</div>
		<div class="hero-stats-row">
			<div class="hero-stat-pill"><strong>0 Candidates Charged</strong> — 100% Free For Job Seekers</div>
			<div class="hero-stat-pill"><strong>48-72h</strong> Average Shortlist Turnaround</div>
			<div class="hero-stat-pill"><strong>PAN-India</strong> Onsite, Hybrid & Remote Roles</div>
		</div>
	</div>
</section>

<!-- SEARCH & FILTER BAR -->
<section class="section jobs-filter-section" id="open-roles">
	<div class="container">
		<div class="jobs-search-box">
			<div class="jobs-search-row">
				<div class="jobs-search-input-wrap">
					<span class="search-icon"><?php echo sam_icon('search'); ?></span>
					<input type="text" id="jobSearchInput" placeholder="Search by role, skill, or keyword (e.g. React, DevOps, Plant Head)..." />
				</div>
				<div class="jobs-filter-group">
					<select id="filterDepartment" class="jobs-select">
						<option value="">All Departments</option>
						<option value="tech">Technology &amp; Engineering</option>
						<option value="manufacturing">Manufacturing &amp; Plant Ops</option>
						<option value="finance">Finance &amp; Accounts</option>
						<option value="sales">Sales &amp; Business Development</option>
						<option value="hr">HR &amp; Operations</option>
						<option value="supply-chain">Logistics &amp; Supply Chain</option>
					</select>
					<select id="filterLocation" class="jobs-select">
						<option value="">All Locations</option>
						<option value="delhi-ncr">Delhi NCR / Noida / Gurgaon</option>
						<option value="bengaluru">Bengaluru</option>
						<option value="mumbai">Mumbai / Navi Mumbai</option>
						<option value="pune">Pune</option>
						<option value="hyderabad">Hyderabad</option>
						<option value="remote">Remote / Hybrid</option>
					</select>
					<select id="filterNotice" class="jobs-select">
						<option value="">All Notice Periods</option>
						<option value="immediate">Immediate (0-15 Days)</option>
						<option value="serving">Serving 30-Day Notice</option>
						<option value="standard">Up to 60 Days</option>
					</select>
				</div>
			</div>
			<div class="jobs-quick-tags">
				<span class="quick-tag-label">Popular Searches:</span>
				<button type="button" class="quick-tag-btn" data-search="React">React / Node.js</button>
				<button type="button" class="quick-tag-btn" data-search="DevOps">DevOps / Cloud</button>
				<button type="button" class="quick-tag-btn" data-search="Plant">Plant Operations</button>
				<button type="button" class="quick-tag-btn" data-search="Finance">Financial Controller</button>
				<button type="button" class="quick-tag-btn" data-search="Sales">Enterprise Sales</button>
			</div>
		</div>

		<!-- JOB LISTINGS -->
		<div class="jobs-grid" id="jobsContainer">

			<!-- Role 1 -->
			<div class="job-card" data-dept="tech" data-location="delhi-ncr" data-notice="immediate">
				<div class="job-card-header">
					<div>
						<span class="job-badge badge-urgent">⚡ Immediate / 0-15 Days</span>
						<span class="job-type-badge">Full-Time Direct Hire</span>
					</div>
					<span class="job-salary">₹18 - ₹26 LPA</span>
				</div>
				<h3 class="job-title">Senior Full Stack Engineer (React + Node.js)</h3>
				<p class="job-company">FinTech Unicorn &bull; Noida / Hybrid</p>
				<p class="job-desc">Lead the architecture and implementation of scalable payment rails and microservices. Fast-track evaluation with interviews scheduled within 48 hours of CV submission.</p>
				<div class="job-meta-row">
					<span><strong>Exp:</strong> 4-7 Years</span>
					<span><strong>Location:</strong> Noida / Delhi NCR</span>
					<span><strong>Notice:</strong> Immediate to 15 Days</span>
				</div>
				<div class="job-tags">
					<span>React.js</span><span>Node.js</span><span>PostgreSQL</span><span>AWS</span><span>Docker</span>
				</div>
				<div class="job-card-actions">
					<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>?role=Senior+Full+Stack+Engineer" class="btn btn-primary btn-sm">Apply with CV <?php echo sam_icon('arrow'); ?></a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>?inquiry=Job+Ref+TECH-882" class="btn btn-outline btn-sm">Talk to Recruiter</a>
				</div>
			</div>

			<!-- Role 2 -->
			<div class="job-card" data-dept="tech" data-location="bengaluru" data-notice="serving">
				<div class="job-card-header">
					<div>
						<span class="job-badge badge-serving">⏱ Serving 30-Day Notice</span>
						<span class="job-type-badge">Full-Time Direct Hire</span>
					</div>
					<span class="job-salary">₹24 - ₹35 LPA</span>
				</div>
				<h3 class="job-title">Lead Cloud &amp; DevOps Architect</h3>
				<p class="job-company">Global Cloud Consulting Major &bull; Bengaluru (Hybrid)</p>
				<p class="job-desc">Design resilient Kubernetes infrastructure and CI/CD automation pipelines for tier-1 enterprise banking clients. Notice buy-out support available for top candidates.</p>
				<div class="job-meta-row">
					<span><strong>Exp:</strong> 7-11 Years</span>
					<span><strong>Location:</strong> Bengaluru</span>
					<span><strong>Notice:</strong> Max 30 Days</span>
				</div>
				<div class="job-tags">
					<span>Kubernetes</span><span>Terraform</span><span>AWS</span><span>CI/CD</span><span>Go</span>
				</div>
				<div class="job-card-actions">
					<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>?role=Lead+DevOps+Architect" class="btn btn-primary btn-sm">Apply with CV <?php echo sam_icon('arrow'); ?></a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>?inquiry=Job+Ref+TECH-889" class="btn btn-outline btn-sm">Talk to Recruiter</a>
				</div>
			</div>

			<!-- Role 3 -->
			<div class="job-card" data-dept="manufacturing" data-location="pune" data-notice="immediate">
				<div class="job-card-header">
					<div>
						<span class="job-badge badge-urgent">⚡ Immediate Joiner Needed</span>
						<span class="job-type-badge">Permanent Placement</span>
					</div>
					<span class="job-salary">₹14 - ₹20 LPA</span>
				</div>
				<h3 class="job-title">Deputy Manager &mdash; Plant Quality &amp; Six Sigma</h3>
				<p class="job-company">Tier-1 EV Auto Component MNC &bull; Chakan, Pune</p>
				<p class="job-desc">Oversee incoming, in-process, and final quality control for precision machining and battery enclosure manufacturing lines. ISO/TS 16949 &amp; Six Sigma Black Belt preferred.</p>
				<div class="job-meta-row">
					<span><strong>Exp:</strong> 6-10 Years</span>
					<span><strong>Location:</strong> Pune (Chakan)</span>
					<span><strong>Notice:</strong> 0-15 Days</span>
				</div>
				<div class="job-tags">
					<span>IATF 16949</span><span>Six Sigma</span><span>PPAP/APQP</span><span>Quality Audits</span><span>Kaizen</span>
				</div>
				<div class="job-card-actions">
					<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>?role=Plant+Quality+Manager" class="btn btn-primary btn-sm">Apply with CV <?php echo sam_icon('arrow'); ?></a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>?inquiry=Job+Ref+MFG-412" class="btn btn-outline btn-sm">Talk to Recruiter</a>
				</div>
			</div>

			<!-- Role 4 -->
			<div class="job-card" data-dept="finance" data-location="delhi-ncr" data-notice="serving">
				<div class="job-card-header">
					<div>
						<span class="job-badge badge-serving">⏱ 30-Day Notice</span>
						<span class="job-type-badge">Full-Time</span>
					</div>
					<span class="job-salary">₹16 - ₹22 LPA</span>
				</div>
				<h3 class="job-title">Manager &mdash; Corporate Finance &amp; Statutory Taxation</h3>
				<p class="job-company">Diversified Industrial Conglomerate &bull; Gurgaon</p>
				<p class="job-desc">Lead GST filings, advance tax planning, direct/indirect tax litigations, and assist in monthly statutory reporting and audit sign-offs with Big 4 auditing firms.</p>
				<div class="job-meta-row">
					<span><strong>Exp:</strong> 5-8 Years</span>
					<span><strong>Location:</strong> Gurgaon</span>
					<span><strong>Notice:</strong> 15-30 Days</span>
				</div>
				<div class="job-tags">
					<span>CA Inter / CA</span><span>GST / TDS</span><span>SAP FICO</span><span>Statutory Audit</span><span>IFRS</span>
				</div>
				<div class="job-card-actions">
					<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>?role=Corporate+Finance+Manager" class="btn btn-primary btn-sm">Apply with CV <?php echo sam_icon('arrow'); ?></a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>?inquiry=Job+Ref+FIN-204" class="btn btn-outline btn-sm">Talk to Recruiter</a>
				</div>
			</div>

			<!-- Role 5 -->
			<div class="job-card" data-dept="sales" data-location="mumbai" data-notice="immediate">
				<div class="job-card-header">
					<div>
						<span class="job-badge badge-urgent">⚡ Immediate Joiner</span>
						<span class="job-type-badge">Full-Time</span>
					</div>
					<span class="job-salary">₹15 - ₹25 LPA + Uncapped Incentive</span>
				</div>
				<h3 class="job-title">Enterprise Account Director &mdash; BFSI Solutions</h3>
				<p class="job-company">Enterprise SaaS Solution Provider &bull; Mumbai (BKC)</p>
				<p class="job-desc">Drive high-ticket enterprise contracts across top private banks, NBFCs, and insurance firms in Western India. High-visibility role reporting to Chief Revenue Officer.</p>
				<div class="job-meta-row">
					<span><strong>Exp:</strong> 5-9 Years</span>
					<span><strong>Location:</strong> Mumbai</span>
					<span><strong>Notice:</strong> 0-15 Days</span>
				</div>
				<div class="job-tags">
					<span>B2B Enterprise</span><span>BFSI Sales</span><span>Deal Structuring</span><span>C-Level Pitching</span>
				</div>
				<div class="job-card-actions">
					<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>?role=Enterprise+Account+Director" class="btn btn-primary btn-sm">Apply with CV <?php echo sam_icon('arrow'); ?></a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>?inquiry=Job+Ref+SALES-502" class="btn btn-outline btn-sm">Talk to Recruiter</a>
				</div>
			</div>

			<!-- Role 6 -->
			<div class="job-card" data-dept="supply-chain" data-location="hyderabad" data-notice="serving">
				<div class="job-card-header">
					<div>
						<span class="job-badge badge-serving">⏱ Serving Notice</span>
						<span class="job-type-badge">Full-Time</span>
					</div>
					<span class="job-salary">₹12 - ₹18 LPA</span>
				</div>
				<h3 class="job-title">Regional Supply Chain &amp; Logistics Hub Manager</h3>
				<p class="job-company">Omnichannel Retail &amp; Quick-Commerce Giant &bull; Hyderabad</p>
				<p class="job-desc">Manage regional mother-hub operations, third-party logistics (3PL) SLAs, fleet dispatch schedules, and dark store replenishment workflows.</p>
				<div class="job-meta-row">
					<span><strong>Exp:</strong> 4-8 Years</span>
					<span><strong>Location:</strong> Hyderabad</span>
					<span><strong>Notice:</strong> 15-30 Days</span>
				</div>
				<div class="job-tags">
					<span>WMS</span><span>3PL Management</span><span>Last-Mile</span><span>Inventory Control</span><span>Supply Chain</span>
				</div>
				<div class="job-card-actions">
					<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>?role=Supply+Chain+Hub+Manager" class="btn btn-primary btn-sm">Apply with CV <?php echo sam_icon('arrow'); ?></a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>?inquiry=Job+Ref+SCM-319" class="btn btn-outline btn-sm">Talk to Recruiter</a>
				</div>
			</div>

		</div>

		<!-- NO RESULTS FALLBACK -->
		<div id="noResultsNotice" class="no-results-box" style="display:none;">
			<p>No open roles match your current filter selections. However, <strong>over 70% of our roles are filled via confidential direct reachouts</strong> before being listed publicly.</p>
			<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>" class="btn btn-primary">Drop Your CV In Our Pool</a>
		</div>

	</div>
</section>

<!-- CANDIDATE VALUE PROP -->
<section class="section bg-soft">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('check'); ?> Why Work With SAM</span>
			<h2>How SAM Manpower Champions Your Career</h2>
			<p>We work differently from generic recruitment agencies. You are a valued professional, not an item in an inbox.</p>
		</div>

		<div class="grid-4">
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h4>Zero Ghosting Guarantee</h4>
				<p>You will always know your application status. Our recruiters provide transparent feedback after every client interview round.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h4>100% Confidential</h4>
				<p>Your CV is never forwarded to employers without your explicit prior permission. Your current employer will never know you are exploring.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('wallet'); ?></div>
				<h4>Fair Compensation Advocacy</h4>
				<p>We negotiate transparently to ensure you get market-leading compensation, joining bonuses, and notice period buyout support.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('users'); ?></div>
				<h4>Direct Hiring Manager Access</h4>
				<p>Bypass generic resume filters (ATS black holes). Our candidates are presented directly to VP, Director, and C-Suite hiring decision makers.</p>
			</div>
		</div>
	</div>
</section>

<!-- FAST UPLOAD BANNER -->
<section class="section">
	<div class="container">
		<div class="upload-cta-card">
			<div class="upload-cta-content">
				<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('upload'); ?> Fast-Track Registration</span>
				<h2>Don't See Your Exact Role? Drop Your CV Directly</h2>
				<p>Our executive recruiters handle over 150+ confidential mandates each month that are never published publicly. Upload your resume and an industry specialist will connect with you within 24 hours.</p>
				<ul class="upload-perks-list">
					<li><?php echo sam_icon('check'); ?> Free CV review and interview briefing</li>
					<li><?php echo sam_icon('check'); ?> Dedicated placement specialist assigned to your domain</li>
					<li><?php echo sam_icon('check'); ?> First access to unadvertised leadership roles</li>
				</ul>
				<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>" class="btn btn-primary btn-lg"><?php echo sam_icon('upload'); ?> Upload Resume (PDF / DOCX)</a>
			</div>
			<div class="upload-cta-badge-col">
				<div class="candidate-trust-box">
					<div class="trust-stat">94%</div>
					<p class="trust-label">Of our placed candidates receive interview calls within 72 hours</p>
					<div class="trust-divider"></div>
					<div class="trust-stat">0 Fees</div>
					<p class="trust-label">We never charge candidates. All services are completely free for job seekers.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const searchInput = document.getElementById('jobSearchInput');
	const deptFilter = document.getElementById('filterDepartment');
	const locFilter = document.getElementById('filterLocation');
	const noticeFilter = document.getElementById('filterNotice');
	const cards = document.querySelectorAll('.job-card');
	const noResults = document.getElementById('noResultsNotice');
	const quickTags = document.querySelectorAll('.quick-tag-btn');

	function filterJobs() {
		const searchVal = (searchInput.value || '').toLowerCase().trim();
		const deptVal = (deptFilter.value || '').toLowerCase();
		const locVal = (locFilter.value || '').toLowerCase();
		const noticeVal = (noticeFilter.value || '').toLowerCase();

		let visibleCount = 0;

		cards.forEach(card => {
			const cardText = card.textContent.toLowerCase();
			const cardDept = (card.getAttribute('data-dept') || '').toLowerCase();
			const cardLoc = (card.getAttribute('data-location') || '').toLowerCase();
			const cardNotice = (card.getAttribute('data-notice') || '').toLowerCase();

			const matchesSearch = !searchVal || cardText.includes(searchVal);
			const matchesDept = !deptVal || cardDept === deptVal;
			const matchesLoc = !locVal || cardLoc === locVal;
			const matchesNotice = !noticeVal || cardNotice === noticeVal;

			if (matchesSearch && matchesDept && matchesLoc && matchesNotice) {
				card.style.display = '';
				visibleCount++;
			} else {
				card.style.display = 'none';
			}
		});

		if (noResults) {
			noResults.style.display = visibleCount === 0 ? 'block' : 'none';
		}
	}

	if (searchInput) searchInput.addEventListener('input', filterJobs);
	if (deptFilter) deptFilter.addEventListener('change', filterJobs);
	if (locFilter) locFilter.addEventListener('change', filterJobs);
	if (noticeFilter) noticeFilter.addEventListener('change', filterJobs);

	quickTags.forEach(btn => {
		btn.addEventListener('click', function() {
			searchInput.value = this.getAttribute('data-search');
			filterJobs();
		});
	});
});
</script>

<?php get_footer(); ?>
