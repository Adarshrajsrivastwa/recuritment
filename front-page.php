<?php
/**
 * Front page template — SAM Manpower Home Page
 * Sections: Hero | Bottleneck | Difference | Capabilities | Focus | Delivery | Domains |
 *           Strategic Partner | SAM Assured | Case Studies | Stats | Testimonials |
 *           Employer Form | Candidates | FAQ | Final CTA | Footer SEO Copy
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<!-- ===================================================================
     SECTION 1 — HERO (Redesigned Modern 2-Column Split Hero)
     =================================================================== -->
<section class="fp-hero-v2" id="hero">
	<!-- Ambient glow orbs -->
	<div class="fp-glow-orb fp-glow-orb-1" aria-hidden="true"></div>
	<div class="fp-glow-orb fp-glow-orb-2" aria-hidden="true"></div>
	<div class="fp-hero-grid-bg" aria-hidden="true"></div>

	<div class="container fp-hero-container">
		<div class="fp-hero-split">

			<!-- LEFT COLUMN: Copy, Badges, CTAs, Social Proof -->
			<div class="fp-hero-left">
				
				<!-- Live Recruitment Status Pill -->
				<div class="fp-live-status-pill">
					<span class="fp-pulse-wrapper">
						<span class="fp-pulse-beacon"></span>
						<span class="fp-pulse-center"></span>
					</span>
					<span><strong>140+ Pre-Vetted Candidates</strong> Ready in 0–30 Days</span>
				</div>

				<h1 class="fp-hero-h1">
					Cut Your Time-to-Hire: Connect with <span class="fp-text-gradient">Top Qualified Talent</span> Ready in <span class="fp-tag-days">0–30 Days</span>
				</h1>

				<p class="fp-hero-lead">
					Stop losing momentum to 90-day waiting periods and offer dropouts. SAM Manpower pairs your teams with pre-vetted professionals in Tech, Operations, Finance, Sales, and Plant Operations ready to roll up their sleeves right now.
				</p>

				<!-- Capability Chips Grid (2x3) -->
				<div class="fp-caps-chips" aria-label="Key Capabilities">
					<div class="fp-chip">
						<span class="fp-chip-icon">⚡</span>
						<span>Immediate Starters (0–15 Days)</span>
					</div>
					<div class="fp-chip">
						<span class="fp-chip-icon">⏱</span>
						<span>Fast-Track (30-Day Notice)</span>
					</div>
					<div class="fp-chip">
						<span class="fp-chip-icon">🎯</span>
						<span>Direct-Hire Permanent</span>
					</div>
					<div class="fp-chip">
						<span class="fp-chip-icon">💻</span>
						<span>Scalable IT Contract Staffing</span>
					</div>
					<div class="fp-chip">
						<span class="fp-chip-icon">🔄</span>
						<span>Contract-to-Hire (SAM Assured)</span>
					</div>
					<div class="fp-chip">
						<span class="fp-chip-icon">💼</span>
						<span>Managed Payroll &amp; Operations</span>
					</div>
				</div>

				<!-- Action Buttons -->
				<div class="fp-hero-cta-group">
					<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn fp-btn-primary" id="hero-cta-mandate">
						<?php echo sam_icon('users'); ?> Drop Your Hiring Mandate
						<span class="btn-arrow-icon" aria-hidden="true">&rarr;</span>
					</a>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn fp-btn-glass" id="hero-cta-recruiter">
						<?php echo sam_icon('chat'); ?> Speak to a Recruiter
					</a>
				</div>

				<!-- Social Proof Strip -->
				<div class="fp-hero-trust-bar">
					<div class="fp-trust-avatars" aria-hidden="true">
						<span class="fp-avatar fp-av-1">RK</span>
						<span class="fp-avatar fp-av-2">AS</span>
						<span class="fp-avatar fp-av-3">PM</span>
					</div>
					<div class="fp-trust-text">
						<div class="fp-rating-stars">★★★★★ <span class="fp-rating-num">4.9/5</span></div>
						<span>Trusted by <strong>500+ Corporate Clients</strong> across India</span>
					</div>
					<div class="fp-trust-divider"></div>
					<div class="fp-trust-micro">
						<span>✓ Zero Resume Spam</span>
						<span>✓ Verified Availability</span>
						<span>✓ 48–72h Shortlists</span>
					</div>
				</div>

			</div>

			<!-- RIGHT COLUMN: Interactive Fast-Track Talent Radar Console -->
			<div class="fp-hero-right">
				
				<!-- Floating Top Badge -->
				<div class="fp-floating-badge fp-float-top-right">
					<span class="fp-float-icon">⚡</span>
					<div>
						<strong>48–72h Turnaround</strong>
						<small>Curated First Shortlist</small>
					</div>
				</div>

				<!-- Main Glass Console -->
				<div class="fp-radar-card">
					<div class="fp-radar-header">
						<div class="fp-radar-title-group">
							<span class="fp-radar-pulse-ring"></span>
							<span class="fp-radar-title">Fast-Track Talent Radar</span>
						</div>
						<span class="fp-radar-live-tag">PAN-India Active Pool</span>
					</div>

					<!-- Domain Selector Tabs -->
					<div class="fp-radar-tabs">
						<button type="button" class="fp-radar-tab active" data-domain="tech">💻 Tech &amp; Cloud</button>
						<button type="button" class="fp-radar-tab" data-domain="mfg">⚙️ Plant &amp; Ops</button>
						<button type="button" class="fp-radar-tab" data-domain="corp">💼 Finance &amp; Sales</button>
					</div>

					<!-- Console Dynamic Body -->
					<div class="fp-radar-body">
						
						<div class="fp-radar-selector-row">
							<label for="radarRoleSelect" class="fp-radar-label">Target Role Profile</label>
							<select id="radarRoleSelect" class="fp-radar-select">
								<!-- Options dynamically updated by JS -->
								<option value="react-lead" data-count="24" data-c1="Sr. Full Stack (React/Node) · 6 Yrs · Noida · 10d Notice" data-c2="Lead DevOps Architect · AWS/K8s · 8 Yrs · BLR · 15d Notice">Full Stack &amp; DevOps Leads (24 Available)</option>
								<option value="cloud-arch" data-count="18" data-c1="AWS Solutions Architect · 9 Yrs · Gurgaon · Immediate" data-c2="Backend Tech Lead (Python/Go) · 7 Yrs · HYD · 20d Notice">Cloud &amp; Data Architects (18 Available)</option>
								<option value="qa-lead" data-count="15" data-c1="SDET Lead · Automation/CI · 5 Yrs · Pune · 12d Notice" data-c2="Cybersecurity Lead · SOC · 8 Yrs · Mumbai · Immediate">Security &amp; QA Specialists (15 Available)</option>
							</select>
						</div>

						<div class="fp-radar-notice-toggle">
							<span class="fp-radar-label">Availability Window</span>
							<div class="fp-notice-pills">
								<button type="button" class="fp-notice-pill active" data-days="0-15">⚡ 0–15 Days Immediate</button>
								<button type="button" class="fp-notice-pill" data-days="30">⏱ 30-Day Notice</button>
							</div>
						</div>

						<!-- Match Stats Box -->
						<div class="fp-radar-match-box">
							<div class="fp-match-stat-row">
								<span class="fp-match-icon">🔥</span>
								<div class="fp-match-stat-info">
									<strong id="radarMatchCount">24 Pre-Vetted Candidates</strong>
									<span>Actively available for interview calls within 48h</span>
								</div>
							</div>
							<div class="fp-radar-snippets" id="radarCandidateSnippets">
								<div class="fp-candidate-snippet">
									<span class="fp-cand-dot"></span>
									<span class="fp-cand-text">Sr. Full Stack (React/Node) &bull; 6 Yrs &bull; Noida &bull; 10d Notice</span>
								</div>
								<div class="fp-candidate-snippet">
									<span class="fp-cand-dot"></span>
									<span class="fp-cand-text">Lead DevOps Architect &bull; AWS/K8s &bull; 8 Yrs &bull; BLR &bull; 15d Notice</span>
								</div>
							</div>
						</div>

						<!-- Console Action CTA -->
						<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn fp-radar-submit-btn">
							Request Matching Candidates Now &rarr;
						</a>
						
						<div class="fp-radar-footer-guarantee">
							<span>🛡️ Backed by our <strong>90-Day Free Replacement Shield</strong></span>
						</div>

					</div>
				</div>

				<!-- Floating Bottom Badge -->
				<div class="fp-floating-badge fp-float-bottom-left">
					<span class="fp-float-icon">🛡️</span>
					<div>
						<strong>ISO 9001:2015 Certified</strong>
						<small>Zero Risk Placement Guarantee</small>
					</div>
				</div>

			</div>

		</div>
	</div>
</section>

<!-- ===================================================================
     STATS STRIP (numbers at a glance)
     =================================================================== -->
<section class="stats-strip fp-stats-strip" aria-label="Key metrics">
	<div class="container stats-grid fp-stats-grid">
		<div class="stat-item">
			<span class="stat-num">500<span class="stat-plus">+</span></span>
			<span class="stat-label">Corporate Hiring Engagements</span>
		</div>
		<div class="stat-item">
			<span class="stat-num">9<span class="stat-plus">+</span></span>
			<span class="stat-label">Years of Sourcing Expertise</span>
		</div>
		<div class="stat-item">
			<span class="stat-num">0–30</span>
			<span class="stat-label">Days Avg Onboarding Target</span>
		</div>
		<div class="stat-item">
			<span class="stat-num">6<span class="stat-plus">+</span></span>
			<span class="stat-label">Specialized Domain Verticals</span>
		</div>
		<div class="stat-item">
			<span class="stat-num">PAN</span>
			<span class="stat-label">India Reach</span>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 2 — TALENT BOTTLENECK
     =================================================================== -->
<section class="section fp-bottleneck-section" id="bottleneck">
	<div class="container fp-bottleneck-inner">
		<div class="fp-bottleneck-copy">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('clock'); ?> The Talent Bottleneck</span>
			<h2>Traditional Hiring Cycles are Costing You Business</h2>
			<p>Sourcing candidates isn't the real problem—it's everything that happens after. Endless 60-to-90-day notice periods, sudden offer buyouts, interview no-shows, and ghosting leave your desks empty and your existing team burned out.</p>
			<p>We built our talent pipelines around a simple premise: <strong>your open roles shouldn't sit idle for a whole financial quarter.</strong></p>
		</div>
		<div class="fp-bottleneck-cards">
			<div class="fp-problem-card">
				<div class="fp-problem-icon"><?php echo sam_icon('clock'); ?></div>
				<h3>Bypass Notice-Period Limbo</h3>
				<p>We actively build talent pools of candidates already serving their final notice or available on Day 1.</p>
			</div>
			<div class="fp-problem-card">
				<div class="fp-problem-icon"><?php echo sam_icon('bell'); ?></div>
				<h3>Plug Urgent Productivity Drains</h3>
				<p>When a critical resignation strikes, get pre-screened, role-ready profiles on your screen within 48 to 72 hours.</p>
			</div>
			<div class="fp-problem-card">
				<div class="fp-problem-icon"><?php echo sam_icon('shield'); ?></div>
				<h3>Eliminate First-Day Dropouts</h3>
				<p>We maintain continuous touchpoints throughout the transition period to address counter-offers and secure real commitments.</p>
			</div>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 3 — THE SAM CAREER DIFFERENCE
     =================================================================== -->
<section class="section fp-difference-section" id="difference">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('star'); ?> What Sets Us Apart</span>
			<h2>What Makes Our Recruitment Engine Faster?</h2>
			<p>We don't just pull resumes from the same overused job boards and cross our fingers. We pre-vet candidates against two strict metrics: domain capability and genuine calendar availability.</p>
		</div>
		<div class="fp-difference-grid">
			<div class="fp-diff-card">
				<div class="fp-diff-num">01</div>
				<h3>Active Pipeline Validation</h3>
				<p>Every candidate we present has verified their willingness to join within your specific target timeline.</p>
			</div>
			<div class="fp-diff-card">
				<div class="fp-diff-num">02</div>
				<h3>Precision Over Volume</h3>
				<p>You won't sift through 40 average resumes; you'll review 3 to 5 sharply matched profiles tailored to your brief.</p>
			</div>
			<div class="fp-diff-card">
				<div class="fp-diff-num">03</div>
				<h3>True Availability Audits</h3>
				<p>We verify notice period buyouts, relievers, and last working dates upfront before presenting candidates for your review.</p>
			</div>
			<div class="fp-diff-card">
				<div class="fp-diff-num">04</div>
				<h3>360° Hiring Oversight</h3>
				<p>From deep technical matching to offer negotiations and Day-1 desk arrivals, we handle the friction points.</p>
			</div>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 4 — RECRUITMENT & STAFFING CAPABILITIES
     =================================================================== -->
<section class="section fp-capabilities-section" id="employers">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('briefcase'); ?> Our Solutions</span>
			<h2>Adaptive Staffing Solutions for Every Stage of Scale</h2>
			<p>Whether you are filling a single high-impact leadership vacancy or deploying 50 engineers across a project site, we adapt the hiring model to your balance sheet.</p>
		</div>
		<div class="fp-capabilities-grid">
			<?php
			$caps = array(
				array( 'icon' => 'users',     'title' => 'Permanent Recruitment',       'desc' => 'Targeted search and placement across middle to executive levels, tailored for cultural retention and long-term business impact.',         'link' => sam_get_page_url_by_slug( 'for-employers' ) ),
				array( 'icon' => 'laptop',    'title' => 'IT Contract Staffing',        'desc' => 'On-demand access to software engineers, cloud architects, DevOps leads, and QA specialists for project milestones.',                   'link' => sam_get_page_url_by_slug( 'for-employers' ) ),
				array( 'icon' => 'briefcase', 'title' => 'Contract-to-Hire (C2H)',      'desc' => 'Evaluate on-the-job execution, culture fit, and soft skills before converting talent into full-time roles.',                           'link' => sam_get_page_url_by_slug( 'sam-assured' ) ),
				array( 'icon' => 'shield',    'title' => 'Managed Workforce Models',    'desc' => 'End-to-end recruitment, team onboarding, and ongoing worker support built around your operating goals.',                               'link' => sam_get_page_url_by_slug( 'for-employers' ) ),
				array( 'icon' => 'wallet',    'title' => 'Third-Party Payroll',         'desc' => 'Offload statutory compliance, PF/ESI tracking, benefits distribution, and salary disbursements with zero payroll overhead.',           'link' => sam_get_page_url_by_slug( 'payroll' ) ),
				array( 'icon' => 'target',    'title' => 'High-Volume Turnkey Hiring',  'desc' => 'Purpose-built sourcing sprints designed to stand up entire sales teams, support floors, or manufacturing units under tight deadlines.', 'link' => sam_get_page_url_by_slug( 'for-employers' ) ),
			);
			foreach ( $caps as $cap ) :
				$link = isset( $cap['link'] ) ? $cap['link'] : '#employers';
			?>
			<div class="fp-cap-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon( $cap['icon'] ); ?></div>
				<h3><?php echo esc_html( $cap['title'] ); ?></h3>
				<p><?php echo esc_html( $cap['desc'] ); ?></p>
				<a href="<?php echo esc_url( $link ); ?>" class="text-link">Learn More <?php echo sam_icon('arrow'); ?></a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 5 — PRIMARY FOCUS (0–30 Day Playbook)
     =================================================================== -->
<section class="section fp-focus-section" id="focus">
	<div class="container fp-focus-inner">
		<div class="fp-focus-copy">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('bell'); ?> Our Primary Focus</span>
			<h2>The 0-to-30-Day Hiring Playbook</h2>
			<p>Most agencies prioritize easy resumes over available candidates. We focus heavily on availability, targeting professionals ready to step in without extensive wait times.</p>
			<div class="fp-focus-cards-stacked">
				<div class="fp-focus-item">
					<div class="fp-focus-badge fp-badge-green"><?php echo sam_icon('check'); ?></div>
					<div>
						<strong>Immediate Starters</strong>
						<p>Talent available to interview today, accept tomorrow, and report next Monday.</p>
					</div>
				</div>
				<div class="fp-focus-item">
					<div class="fp-focus-badge fp-badge-blue"><?php echo sam_icon('clock'); ?></div>
					<div>
						<strong>Active Notice-Period Professionals</strong>
						<p>Candidates who have formally resigned, negotiated their release dates, and are ready for clean transitions.</p>
					</div>
				</div>
				<div class="fp-focus-item">
					<div class="fp-focus-badge fp-badge-purple"><?php echo sam_icon('calendar'); ?></div>
					<div>
						<strong>Verified 30-Day Joiners</strong>
						<p>Candidates with contractual, documented 30-day releases who are ready to make a firm career shift.</p>
					</div>
				</div>
			</div>
			<p class="fp-focus-footer-copy">When your project delivery is on the line, you don't need promises three months out. You need people at their desks this month.</p>
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary" id="focus-cta-urgent"><?php echo sam_icon('target'); ?> Submit an Urgent Role</a>
		</div>
		<div class="fp-focus-visual" aria-hidden="true">
			<div class="fp-timeline-card">
				<div class="fp-tl-row fp-tl-active">
					<span class="fp-tl-dot"></span>
					<div>
						<strong>Day 1</strong>
						<span>Mandate intake &amp; brief alignment</span>
					</div>
				</div>
				<div class="fp-tl-row">
					<span class="fp-tl-dot"></span>
					<div>
						<strong>Day 2–3</strong>
						<span>Pipeline sourced from active database</span>
					</div>
				</div>
				<div class="fp-tl-row">
					<span class="fp-tl-dot"></span>
					<div>
						<strong>Day 4–5</strong>
						<span>Screened profiles delivered to you</span>
					</div>
				</div>
				<div class="fp-tl-row">
					<span class="fp-tl-dot"></span>
					<div>
						<strong>Day 6–10</strong>
						<span>Interviews scheduled &amp; completed</span>
					</div>
				</div>
				<div class="fp-tl-row">
					<span class="fp-tl-dot"></span>
					<div>
						<strong>Day 11–15</strong>
						<span>Offer extended &amp; accepted</span>
					</div>
				</div>
				<div class="fp-tl-row fp-tl-success">
					<span class="fp-tl-dot"></span>
					<div>
						<strong>Day 0–30</strong>
						<span>Candidate reports to desk ✓</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 6 — HOW WE DELIVER (Process)
     =================================================================== -->
<section class="section fp-process-section" id="process">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('search'); ?> Our Process</span>
			<h2>A Straightforward, No-Nonsense Delivery Process</h2>
		</div>
		<div class="fp-process-track">
			<?php
			$stages = array(
				array( 'icon' => 'chat',     'stage' => 'Stage 01', 'label' => 'The Deep Dive',              'desc' => 'We lock down the non-negotiables: specific deliverables, required tech stacks, budget caps, and hard start dates.' ),
				array( 'icon' => 'search',   'stage' => 'Stage 02', 'label' => 'Targeted Pipeline Sourcing', 'desc' => 'We query our active database of verified professionals rather than relying purely on passive job postings.' ),
				array( 'icon' => 'shield',   'stage' => 'Stage 03', 'label' => 'Technical &amp; Readiness Screening', 'desc' => 'Every profile goes through a dual-gate review: core competency verification and firm joining validation.' ),
				array( 'icon' => 'check',    'stage' => 'Stage 04', 'label' => 'Curated Candidate Delivery', 'desc' => 'You receive a streamlined roster of viable, interested candidates ready for initial evaluation.' ),
				array( 'icon' => 'calendar', 'stage' => 'Stage 05', 'label' => 'Interview Coordination',    'desc' => 'We manage the scheduling, candidate prep, and feedback loops to keep your hiring cycle moving quickly.' ),
				array( 'icon' => 'download', 'stage' => 'Stage 06', 'label' => 'Offer-to-Desk Tracking',   'desc' => 'Our work continues past the offer letter: we handle post-offer questions to ensure a seamless Day-1 arrival.' ),
			);
			foreach ( $stages as $i => $st ) :
				$is_last = ( $i === count( $stages ) - 1 );
			?>
			<div class="fp-process-step<?php echo $is_last ? ' fp-process-step-active' : ''; ?>">
				<div class="fp-process-icon"><?php echo sam_icon( $st['icon'] ); ?></div>
				<span class="fp-process-stage"><?php echo esc_html( $st['stage'] ); ?></span>
				<strong class="fp-process-label"><?php echo $st['label']; ?></strong>
				<p><?php echo esc_html( $st['desc'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 7 — DOMAIN EXPERTISE
     =================================================================== -->
<section class="section fp-domains-section" id="domains">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('briefcase'); ?> Industry Coverage</span>
			<h2>Cross-Industry Recruitment Coverage</h2>
			<p>Our dedicated domain recruiters know the hiring benchmarks, salary bandwidths, and candidate expectations across core Indian industries.</p>
		</div>
		<div class="fp-domains-grid">
			<?php
			$domains = array(
				array( 'icon' => 'laptop',    'title' => 'Tech &amp; IT Services',       'desc' => 'Full-stack developers, infrastructure specialists, cloud architects, product leads, and cybersecurity engineers.' ),
				array( 'icon' => 'wallet',    'title' => 'Banking &amp; BFSI',           'desc' => 'Underwriting specialists, risk analysts, corporate sales heads, wealth managers, and regulatory compliance teams.' ),
				array( 'icon' => 'target',    'title' => 'Industrial &amp; Manufacturing','desc' => 'Plant supervisors, production controllers, QA/QC engineers, maintenance heads, and supply chain operators.' ),
				array( 'icon' => 'star',      'title' => 'E-Commerce &amp; Retail',      'desc' => 'Merchandisers, last-mile logistics leads, warehouse managers, and growth-marketing talent.' ),
				array( 'icon' => 'users',     'title' => 'Commercial Sales &amp; Growth', 'desc' => 'Enterprise account executives, channel development leads, and inside sales teams.' ),
				array( 'icon' => 'briefcase', 'title' => 'Operations &amp; Shared Services','desc' => 'Process trainers, support reps, operational leads, and executive back-office staff.' ),
			);
			foreach ( $domains as $d ) :
			?>
			<div class="fp-domain-card">
				<div class="fp-domain-icon"><?php echo sam_icon( $d['icon'] ); ?></div>
				<h3><?php echo $d['title']; ?></h3>
				<p><?php echo esc_html( $d['desc'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 8 — STRATEGIC TALENT PARTNER
     =================================================================== -->
<section class="section fp-partner-section" id="strategic">
	<div class="container fp-partner-inner">
		<div class="fp-partner-copy">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('shield'); ?> A Strategic Talent Partner</span>
			<h2>Why Leading Companies Treat Us as an Extension of Their HR Team</h2>
			<div class="fp-partner-points">
				<div class="fp-partner-point">
					<div class="fp-pp-icon"><?php echo sam_icon('check'); ?></div>
					<div>
						<strong>High Submission-to-Interview Ratios</strong>
						<p>We respect your hiring managers' calendars. Every candidate we pass along meets your experience, skill, and budget requirements.</p>
					</div>
				</div>
				<div class="fp-partner-point">
					<div class="fp-pp-icon"><?php echo sam_icon('shield'); ?></div>
					<div>
						<strong>No Unpleasant Surprises</strong>
						<p>We address salary expectations, buyout nuances, and relocation readiness during our initial screening call.</p>
					</div>
				</div>
				<div class="fp-partner-point">
					<div class="fp-pp-icon"><?php echo sam_icon('bell'); ?></div>
					<div>
						<strong>Proactive Candidate Engagement</strong>
						<p>Candidates stay informed and engaged throughout the process, preventing unannounced drops midway through interviews.</p>
					</div>
				</div>
				<div class="fp-partner-point">
					<div class="fp-pp-icon"><?php echo sam_icon('star'); ?></div>
					<div>
						<strong>Accountability Through Onboarding</strong>
						<p>We consider our job done when the candidate checks in on their first day, not when the offer email goes out.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="fp-partner-media">
			<?php
			$img = get_theme_mod( 'sam_partner_image' );
			if ( $img ) {
				echo '<img src="' . esc_url( $img ) . '" alt="SAM Manpower team collaborating with a client" loading="lazy">';
			} else {
				echo '<div class="partner-media-placeholder fp-partner-placeholder" aria-hidden="true"></div>';
			}
			?>
			<div class="fp-partner-stat-overlay">
				<div class="fp-po-stat"><span class="stat-num">98%</span><span class="stat-label">Retention Rate</span></div>
				<div class="fp-po-stat"><span class="stat-num">500+</span><span class="stat-label">Partners Nationwide</span></div>
			</div>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 9 — SAM ASSURED ADVANTAGE
     =================================================================== -->
<section class="section assured-section fp-assured-section" id="sam-assured">
	<div class="container assured-inner fp-assured-inner">
		<div class="assured-copy">
			<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('shield'); ?> SAM Assured — Zero Risk Hiring</span>
			<h2>High-Performance Hiring with Lower Risk</h2>
			<p class="fp-assured-sub">Test Capabilities on the Job Before Making Long-Term Commitments.</p>
			<p>A traditional hour-long interview rarely reveals how a candidate performs under actual working conditions. SAM Assured lets you bring on high-caliber talent through a structured, low-risk deployment phase before transitioning them to full-time payroll.</p>
			<div class="fp-assured-flow" aria-label="SAM Assured steps">
				<span>Select Talent</span>
				<span class="fp-flow-arrow">➔</span>
				<span>Onboard to Project</span>
				<span class="fp-flow-arrow">➔</span>
				<span>Assess Performance</span>
				<span class="fp-flow-arrow">➔</span>
				<span class="fp-flow-final">Transition to Full-Time</span>
			</div>
			<div class="fp-assured-benefits">
				<div class="fp-ab-item"><?php echo sam_icon('check'); ?> <span>True On-the-Job Evaluation</span></div>
				<div class="fp-ab-item"><?php echo sam_icon('check'); ?> <span>Mitigated Hiring Risk</span></div>
				<div class="fp-ab-item"><?php echo sam_icon('check'); ?> <span>Agile Budget Allocation</span></div>
			</div>
			<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>" class="btn btn-primary" id="assured-cta">Learn About SAM Assured</a>
		</div>
		<div class="assured-steps">
			<div class="assured-step"><?php echo sam_icon('check'); ?><span>01. Select<br><small>Curated Talent</small></span></div>
			<div class="assured-step"><?php echo sam_icon('users'); ?><span>02. Onboard<br><small>To Project</small></span></div>
			<div class="assured-step"><?php echo sam_icon('star'); ?><span>03. Assess<br><small>Performance Review</small></span></div>
			<div class="assured-step is-active"><?php echo sam_icon('download'); ?><span>04. Convert<br><small>Full-Time Hire</small></span></div>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 10 — CASE STUDIES
     =================================================================== -->
<section class="section fp-cases-section" id="case-studies">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('target'); ?> Proven Results</span>
			<h2>Solving Real-World Talent Bottlenecks</h2>
		</div>
		<div class="fp-cases-grid">
			<article class="fp-case-card">
				<div class="fp-case-tag">Case Study 01 — Tech</div>
				<h3>Fast-Tracking Critical Tech Deployments</h3>
				<dl class="fp-case-dl">
					<div class="fp-case-row">
						<dt><?php echo sam_icon('target'); ?> The Brief</dt>
						<dd>A Tier-1 IT services firm needed 20+ mid-to-senior Java/Microservices developers within a strict 25-day delivery window.</dd>
					</div>
					<div class="fp-case-row">
						<dt><?php echo sam_icon('clock'); ?> The Problem</dt>
						<dd>The open market had average notice periods of 60 to 90 days, threatening an SLA penalty with their client.</dd>
					</div>
					<div class="fp-case-row">
						<dt><?php echo sam_icon('search'); ?> Our Approach</dt>
						<dd>Deployed a 3-recruiter squad dedicated entirely to candidates actively serving notice and available for immediate start.</dd>
					</div>
					<div class="fp-case-row fp-case-result">
						<dt><?php echo sam_icon('check'); ?> The Result</dt>
						<dd>20 qualified developers fully vetted, interviewed, and onboarded within the 25-day window — preventing contract penalties.</dd>
					</div>
				</dl>
			</article>
			<article class="fp-case-card">
				<div class="fp-case-tag">Case Study 02 — Industrial</div>
				<h3>Rapid Production Floor Expansion</h3>
				<dl class="fp-case-dl">
					<div class="fp-case-row">
						<dt><?php echo sam_icon('target'); ?> The Brief</dt>
						<dd>A fast-growing industrial firm needed to scale its operations team by 25 specialists via a Contract-to-Hire setup.</dd>
					</div>
					<div class="fp-case-row">
						<dt><?php echo sam_icon('search'); ?> Our Approach</dt>
						<dd>Filtered local candidate pools with verified certifications and established a flexible 6-month performance evaluation framework.</dd>
					</div>
					<div class="fp-case-row fp-case-result">
						<dt><?php echo sam_icon('check'); ?> The Result</dt>
						<dd>Reached full team capacity in 18 days, with 90% of contract placements converting into permanent roles by month six.</dd>
					</div>
				</dl>
			</article>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 11 — SCALE & IMPACT (Numbers)
     =================================================================== -->
<section class="section fp-impact-section" id="impact" aria-label="Scale and impact metrics">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('star'); ?> Scale &amp; Impact</span>
			<h2>The Numbers Behind Our Hiring Success</h2>
		</div>
		<div class="fp-impact-grid">
			<div class="fp-impact-card">
				<span class="fp-impact-num">500+</span>
				<span class="fp-impact-label">Corporate Hiring Engagements Managed</span>
			</div>
			<div class="fp-impact-card">
				<span class="fp-impact-num">9+</span>
				<span class="fp-impact-label">Years of Sourcing &amp; Staffing Expertise</span>
			</div>
			<div class="fp-impact-card">
				<span class="fp-impact-num">PAN-India</span>
				<span class="fp-impact-label">Reach Across Primary Metros &amp; Tier-2 Hubs</span>
			</div>
			<div class="fp-impact-card">
				<span class="fp-impact-num">6+</span>
				<span class="fp-impact-label">Specialized Domain Verticals</span>
			</div>
			<div class="fp-impact-card fp-impact-card-wide">
				<span class="fp-impact-num">0–30 Days</span>
				<span class="fp-impact-label">Average Onboarding Target — Our Core Promise</span>
			</div>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 12 — CLIENT TESTIMONIALS
     =================================================================== -->
<section class="section testimonials-section fp-testimonials-section" id="testimonials">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('star'); ?> Direct Client Feedback</span>
			<h2>What Hiring Leaders Value About SAM Career</h2>
			<p>Hear what our clients have to say about working with SAM.</p>
		</div>
		<div class="grid-3 testimonial-grid">
			<?php
			$testimonial_query = new WP_Query( array( 'post_type' => 'sam_testimonial', 'posts_per_page' => 3 ) );
			if ( $testimonial_query->have_posts() ) :
				while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
					<div class="testimonial-card fp-testimonial-card">
						<div class="fp-tc-stars" aria-label="5 stars">★★★★★</div>
						<p>&ldquo;<?php echo esc_html( wp_strip_all_tags( get_the_content() ) ); ?>&rdquo;</p>
						<div class="testimonial-author">
							<div class="author-avatar"><?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?></div>
							<div>
								<strong><?php the_title(); ?></strong>
								<span><?php echo esc_html( get_post_meta( get_the_ID(), '_sam_author_role', true ) ); ?></span>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata();
			else :
				$fallback = array(
					array(
						'quote' => 'SAM Career cut through the resume clutter. They understood our requirement on the first intake call and brought us candidates who were genuinely available within our 3-week window.',
						'name'  => 'Head of Talent Acquisition',
						'role'  => 'Cloud Services Firm, Noida',
					),
					array(
						'quote' => 'Finding production personnel with verified technical backgrounds used to stall our line launches. SAM\'s local sourcing cut our recruiting lead times significantly.',
						'name'  => 'Senior HR Director',
						'role'  => 'Auto Component Manufacturer, NCR',
					),
					array(
						'quote' => 'Their contract staffing solution provided us with the flexibility we needed during peak season. Highly professional, responsive team — they genuinely understand urgency.',
						'name'  => 'Operations Manager',
						'role'  => 'E-Commerce Distribution, Mumbai',
					),
				);
				foreach ( $fallback as $t ) : ?>
				<div class="testimonial-card fp-testimonial-card">
					<div class="fp-tc-stars" aria-label="5 stars">★★★★★</div>
					<p>&ldquo;<?php echo esc_html( $t['quote'] ); ?>&rdquo;</p>
					<div class="testimonial-author">
						<div class="author-avatar"><?php echo esc_html( mb_substr( $t['name'], 0, 1 ) ); ?></div>
						<div>
							<strong><?php echo esc_html( $t['name'] ); ?></strong>
							<span><?php echo esc_html( $t['role'] ); ?></span>
						</div>
					</div>
				</div>
				<?php endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 13 — EMPLOYER REGISTRATION FORM
     =================================================================== -->
<section class="section fp-employer-form-section" id="hire-form">
	<div class="container fp-employer-form-inner">
		<div class="fp-ef-copy">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('users'); ?> Employer Registration</span>
			<h2>Need Qualified Candidates Fast? Share Your Job Brief.</h2>
			<p>Whether you are looking for one niche specialist or planning a high-volume staffing drive, connect directly with our recruitment team to launch your search.</p>
			<ul class="fp-ef-trust">
				<li><?php echo sam_icon('check'); ?> Response within 24 hours</li>
				<li><?php echo sam_icon('check'); ?> No commitment required</li>
				<li><?php echo sam_icon('check'); ?> PAN-India sourcing capability</li>
			</ul>
			<div class="fp-ef-contact">
				<p>Prefer to email directly?</p>
				<a href="mailto:<?php echo esc_attr( function_exists( 'sam_get_company_email' ) ? sam_get_company_email() : 'sales@samcareer.com' ); ?>" class="fp-ef-phone" style="font-size:1.05rem; word-break:break-all;"><?php echo esc_html( function_exists( 'sam_get_company_email' ) ? sam_get_company_email() : 'sales@samcareer.com' ); ?></a>
			</div>
		</div>

		<div class="fp-ef-form-wrap">
			<?php
			$status = isset( $_GET['form_status'] ) ? sanitize_key( wp_unslash( $_GET['form_status'] ) ) : '';
			if ( 'success' === $status ) : ?>
				<div class="form-notice form-notice-success" role="status">
					<?php echo sam_icon('check'); ?>
					Thank you! Your hiring requirement has been submitted. Our team will reach out within 24 hours.
				</div>
			<?php elseif ( 'error' === $status ) : ?>
				<div class="form-notice form-notice-error" role="alert">
					Please complete all required fields with a valid email address.
				</div>
			<?php endif; ?>

			<form class="hiring-form fp-inline-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="home-hire-form">
				<input type="hidden" name="action" value="sam_submit_hiring_requirement">
				<?php wp_nonce_field( 'sam_submit_hiring_requirement', 'sam_hiring_nonce' ); ?>
				<div class="form-honeypot" aria-hidden="true">
					<label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
				</div>

				<div class="form-grid">
					<p>
						<label for="hf-name">Full Name <span>*</span></label>
						<input id="hf-name" name="name" type="text" required placeholder="e.g. Rahul Sharma">
					</p>
					<p>
						<label for="hf-company">Business / Organization Name <span>*</span></label>
						<input id="hf-company" name="company" type="text" required placeholder="e.g. ABC Technologies Pvt Ltd">
					</p>
					<p>
						<label for="hf-email">Professional Email <span>*</span></label>
						<input id="hf-email" name="email" type="email" required placeholder="e.g. hr@company.com">
					</p>
					<p>
						<label for="hf-phone">Direct Phone Number <span>*</span></label>
						<input id="hf-phone" name="phone" type="tel" required placeholder="e.g. +91 9876543210">
					</p>
					<p>
						<label for="hf-roles">Target Job Title / Role <span>*</span></label>
						<input id="hf-roles" name="roles" type="text" required placeholder="e.g. Senior Java Developer">
					</p>
					<p>
						<label for="hf-headcount">Number of Vacancies</label>
						<input id="hf-headcount" name="headcount" type="number" min="1" placeholder="e.g. 3">
					</p>
					<p>
						<label for="hf-location">Work Location</label>
						<select id="hf-location" name="location">
							<option value="">Onsite / Remote / Hybrid</option>
							<option value="Onsite">Onsite</option>
							<option value="Remote">Remote</option>
							<option value="Hybrid">Hybrid</option>
						</select>
					</p>
					<p>
						<label for="hf-experience">Experience Band</label>
						<input id="hf-experience" name="experience" type="text" placeholder="e.g. 3–5 Years">
					</p>
					<p>
						<label for="hf-timeline">Expected Start Date / Timeline <span>*</span></label>
						<select id="hf-timeline" name="timeline" required>
							<option value="">Select timeline</option>
							<option value="Immediate">Immediate (0–7 days)</option>
							<option value="Within 15 days">Within 15 days</option>
							<option value="Within 30 days">Within 30 days</option>
							<option value="30-60 days">30–60 days</option>
							<option value="Flexible">Flexible</option>
						</select>
					</p>
				</div>

				<p class="full-width">
					<label for="hf-message">Brief Notes / Key Deliverables</label>
					<textarea id="hf-message" name="message" rows="4" placeholder="Budget range, must-have skills, notice period preference, or any other context helpful for our team."></textarea>
				</p>

				<p class="form-submit">
					<button type="submit" class="btn btn-primary btn-lg" id="home-hire-submit"><?php echo sam_icon('users'); ?> Request Candidate Profiles</button>
				</p>
			</form>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 14 — FOR CANDIDATES
     =================================================================== -->
<section class="section fp-candidates-section" id="candidates">
	<div class="container fp-candidates-inner">
		<div class="fp-cand-copy">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('briefcase'); ?> For Candidates</span>
			<h2>Ready to Step Into Your Next Career Move?</h2>
			<p>Take the friction out of your job search. Connect with hiring managers across major enterprises, high-growth startups, and mid-market firms actively seeking your skill set.</p>
			<p>Whether you are a seasoned specialist, serving out your notice period, or ready to pivot your career, share your profile with SAM Career for direct access to unadvertised opportunities.</p>
			<div class="fp-cand-actions">
				<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>" class="btn btn-primary" id="cand-cta-cv"><?php echo sam_icon('download'); ?> Send Your Updated CV</a>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'for-employers' ) ); ?>" class="btn btn-outline" id="cand-cta-browse"><?php echo sam_icon('search'); ?> Browse Open Positions</a>
			</div>
		</div>
		<div class="fp-cand-highlights">
			<div class="fp-cand-hl">
				<div class="fp-cand-icon"><?php echo sam_icon('clock'); ?></div>
				<div><strong>Serving Notice?</strong><p>We have active mandates ready for your exact joining timeline.</p></div>
			</div>
			<div class="fp-cand-hl">
				<div class="fp-cand-icon"><?php echo sam_icon('star'); ?></div>
				<div><strong>Experienced Specialist?</strong><p>Direct introductions to senior leadership hiring teams.</p></div>
			</div>
			<div class="fp-cand-hl">
				<div class="fp-cand-icon"><?php echo sam_icon('target'); ?></div>
				<div><strong>Looking to Pivot?</strong><p>Cross-industry transfer guidance from our domain recruiters.</p></div>
			</div>
			<div class="fp-cand-hl">
				<div class="fp-cand-icon"><?php echo sam_icon('shield'); ?></div>
				<div><strong>Confidential Search</strong><p>Your profile is never shared without your explicit consent.</p></div>
			</div>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 15 — FAQ
     =================================================================== -->
<section class="section faq-section fp-faq-section" id="faq">
	<div class="container container-narrow">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('chat'); ?> Frequently Asked Questions</span>
			<h2>Common Questions About Our Hiring Models</h2>
			<p>Answers to the questions hiring managers most often ask before engaging with SAM.</p>
		</div>
		<div class="faq-accordion">
			<?php
			$faq_query = new WP_Query( array( 'post_type' => 'sam_faq', 'posts_per_page' => -1 ) );
			if ( $faq_query->have_posts() ) :
				while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
					<div class="faq-item">
						<button class="faq-question" aria-expanded="false">
							<span><?php the_title(); ?></span>
							<span class="faq-toggle-icon">+</span>
						</button>
						<div class="faq-answer"><p><?php echo wp_kses_post( get_the_content() ); ?></p></div>
					</div>
				<?php endwhile; wp_reset_postdata();
			else :
				$faqs = array(
					array(
						'q' => 'What qualifies a candidate as an "immediate joiner"?',
						'a' => 'An immediate joiner is someone not currently bound by a company notice period — such as an independent contractor, an actively looking professional between roles, or an individual whose release has already been signed. They can typically onboard within 1 to 10 days.',
					),
					array(
						'q' => 'How does a 30-day hiring model work?',
						'a' => 'We focus our sourcing on professionals who have already submitted their formal resignations and have a firm, verified release date within the next calendar month. This sidesteps the typical 60-to-90-day waiting period common in conventional talent pools.',
					),
					array(
						'q' => 'How does SAM Career minimize the risk of post-offer candidate ghosting?',
						'a' => 'Candidate ghosting usually happens when recruiters fail to stay engaged during the notice period. Our team maintains regular contact throughout the resignation, exit interview, and handover stages. We address counter-offers early to ensure candidates follow through on their start dates.',
					),
					array(
						'q' => 'What models do you offer for IT contract staffing?',
						'a' => 'We support fixed-duration project contracts, long-term staff augmentation, and flexible contract-to-hire (C2H) engagements. We handle employment paperwork, client site onboarding, and ongoing payroll tasks directly.',
					),
					array(
						'q' => 'Can SAM Career help us build teams outside of Delhi NCR?',
						'a' => 'Yes. While our headquarters are in Greater Noida, we manage PAN-India recruitment searches across major hubs like Bengaluru, Hyderabad, Mumbai, and Pune, along with emerging talent centers nationwide.',
					),
				);
				foreach ( $faqs as $f ) : ?>
				<div class="faq-item">
					<button class="faq-question" aria-expanded="false">
						<span><?php echo esc_html( $f['q'] ); ?></span>
						<span class="faq-toggle-icon">+</span>
					</button>
					<div class="faq-answer"><p><?php echo esc_html( $f['a'] ); ?></p></div>
				</div>
				<?php endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<!-- ===================================================================
     SECTION 16 — FINAL CALL TO ACTION (MERGED & ENHANCED)
     =================================================================== -->
<section class="section fp-final-cta-section" id="final-cta">
	<div class="container fp-final-cta-inner">
		<div class="fp-fcta-content">
			<span class="eyebrow-badge" style="background:rgba(16,185,129,0.15); border:1px solid rgba(16,185,129,0.3); color:#34D399; margin-bottom:18px; display:inline-flex; align-items:center;">
				<span class="pulse-dot" style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#10B981; margin-right:8px; box-shadow:0 0 8px #10B981;"></span>
				Immediate &amp; Fast-Track Hiring Network
			</span>
			<h2>Ready to Eliminate the 90-Day Hiring Bottleneck?</h2>
			<p>Don’t let open requisitions stall your next milestone. SAM connects your teams with pre-vetted professionals in Tech, Operations, Sales, and Plant Management who are ready to interview this week and onboard in 0–30 days.</p>
			<div class="fp-fcta-actions">
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary" id="final-cta-mandate" style="padding:14px 28px; font-weight:700;">
					<?php echo sam_icon('users'); ?> Post a Hiring Mandate
				</a>
				<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-outline-light" id="final-cta-call" style="padding:14px 24px;">
					<?php echo sam_icon('phone'); ?> Schedule Recruiter Call
				</a>
				<a href="<?php echo esc_url( sam_candidate_form_url() ); ?>" class="btn btn-outline-light" style="background:rgba(255,255,255,0.06); border-color:rgba(255,255,255,0.2); padding:14px 22px; color:#fff;">
					<?php echo sam_icon('briefcase'); ?> Submit Resume / CV
				</a>
			</div>
		</div>
		<div class="fp-fcta-stat-strip">
			<div class="fp-fcta-stat"><span>48–72h</span><small>First profiles delivered</small></div>
			<div class="fp-fcta-stat"><span>0–30</span><small>Days to onboard</small></div>
			<div class="fp-fcta-stat"><span>500+</span><small>Placements delivered</small></div>
			<div class="fp-fcta-stat"><span style="color:#10B981;">90-Day</span><small>Free replacement warranty</small></div>
		</div>
	</div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function() {
	const domainTabs = document.querySelectorAll('.fp-radar-tab');
	const roleSelect = document.getElementById('radarRoleSelect');
	const noticePills = document.querySelectorAll('.fp-notice-pill');
	const matchCountEl = document.getElementById('radarMatchCount');
	const snippetsContainer = document.getElementById('radarCandidateSnippets');

	const domainData = {
		tech: [
			{ val: 'react-lead', text: 'Full Stack & DevOps Leads (24 Available)', count: '24 Pre-Vetted Candidates', c1: 'Sr. Full Stack (React/Node) · 6 Yrs · Noida · 10d Notice', c2: 'Lead DevOps Architect · AWS/K8s · 8 Yrs · BLR · 15d Notice' },
			{ val: 'cloud-arch', text: 'Cloud & Data Architects (18 Available)', count: '18 Pre-Vetted Candidates', c1: 'AWS Solutions Architect · 9 Yrs · Gurgaon · Immediate', c2: 'Backend Tech Lead (Python/Go) · 7 Yrs · HYD · 20d Notice' },
			{ val: 'qa-sec', text: 'Security & QA Specialists (15 Available)', count: '15 Pre-Vetted Candidates', c1: 'SDET Lead · Automation/CI · 5 Yrs · Pune · 12d Notice', c2: 'Cybersecurity Lead · SOC · 8 Yrs · Mumbai · Immediate' }
		],
		mfg: [
			{ val: 'quality-head', text: 'Quality Heads (IATF / Six Sigma) (22 Available)', count: '22 Pre-Vetted Candidates', c1: 'Quality Lead · IATF 16949 · 9 Yrs · Pune Chakan · Immediate', c2: 'Six Sigma Black Belt · 7 Yrs · Manesar · 15d Notice' },
			{ val: 'plant-head', text: 'Plant Heads & Ops GMs (12 Available)', count: '12 Pre-Vetted Candidates', c1: 'Plant Operations Head · 14 Yrs · Greater Noida · 20d Notice', c2: 'General Manager Mfg · 12 Yrs · Ahmedabad · Immediate' },
			{ val: 'maintenance', text: 'Tool Room & PLC Maintenance (19 Available)', count: '19 Pre-Vetted Candidates', c1: 'Automation & PLC Lead · 6 Yrs · Chennai · 10d Notice', c2: 'Tooling Supervisor · 8 Yrs · Aurangabad · Immediate' }
		],
		corp: [
			{ val: 'finance-ctrl', text: 'Financial Controllers & CA Leads (16 Available)', count: '16 Pre-Vetted Candidates', c1: 'CA / Financial Controller · 8 Yrs · Delhi NCR · Immediate', c2: 'Statutory Taxation Manager · 6 Yrs · Mumbai · 15d Notice' },
			{ val: 'sales-dir', text: 'Enterprise Sales Directors (20 Available)', count: '20 Pre-Vetted Candidates', c1: 'B2B Enterprise Sales Lead · 7 Yrs · BLR · 12d Notice', c2: 'BFSI Account Director · 9 Yrs · Mumbai BKC · Immediate' },
			{ val: 'hr-bp', text: 'HR Business Partners & Leads (14 Available)', count: '14 Pre-Vetted Candidates', c1: 'Senior HRBP (Tech) · 6 Yrs · Gurgaon · Immediate', c2: 'Head of Talent Acquisition · 10 Yrs · Noida · 20d Notice' }
		]
	};

	let currentDomain = 'tech';
	let currentDays = '0-15';

	function renderRoles(domain) {
		if (!roleSelect || !domainData[domain]) return;
		roleSelect.innerHTML = '';
		domainData[domain].forEach((item, idx) => {
			const opt = document.createElement('option');
			opt.value = item.val;
			opt.textContent = item.text;
			opt.setAttribute('data-count', item.count);
			opt.setAttribute('data-c1', item.c1);
			opt.setAttribute('data-c2', item.c2);
			if (idx === 0) opt.selected = true;
			roleSelect.appendChild(opt);
		});
		updatePreview();
	}

	function updatePreview() {
		if (!roleSelect) return;
		const selected = roleSelect.options[roleSelect.selectedIndex];
		if (!selected) return;

		const baseCount = selected.getAttribute('data-count') || '18 Pre-Vetted Candidates';
		const c1 = selected.getAttribute('data-c1') || '';
		const c2 = selected.getAttribute('data-c2') || '';

		if (matchCountEl) {
			const multiplier = currentDays === '0-15' ? '' : ' (+12 in 30-Day Window)';
			matchCountEl.textContent = baseCount + multiplier;
		}

		if (snippetsContainer) {
			snippetsContainer.innerHTML = `
				<div class="fp-candidate-snippet">
					<span class="fp-cand-dot"></span>
					<span class="fp-cand-text">${c1}</span>
				</div>
				<div class="fp-candidate-snippet">
					<span class="fp-cand-dot"></span>
					<span class="fp-cand-text">${c2}</span>
				</div>
			`;
		}
	}

	domainTabs.forEach(tab => {
		tab.addEventListener('click', function() {
			domainTabs.forEach(t => t.classList.remove('active'));
			this.classList.add('active');
			currentDomain = this.getAttribute('data-domain');
			renderRoles(currentDomain);
		});
	});

	if (roleSelect) {
		roleSelect.addEventListener('change', updatePreview);
	}

	noticePills.forEach(pill => {
		pill.addEventListener('click', function() {
			noticePills.forEach(p => p.classList.remove('active'));
			this.classList.add('active');
			currentDays = this.getAttribute('data-days');
			updatePreview();
		});
	});
});
</script>

<?php get_footer(); ?>
