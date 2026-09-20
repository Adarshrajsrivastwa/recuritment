<?php
/**
 * Template Name: About Us
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('shield'); ?> About SAM Manpower &amp; Career Services</span>
		<h1>Redefining Recruitment Velocity Across India Since 2017</h1>
		<p>Built on a singular premise: business momentum shouldn't stall for 90 days. We pair high-growth enterprises and industrial leaders with pre-vetted professionals ready to join within 0 to 30 days.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Partner With Us</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-secondary">Contact Our Leadership</a>
		</div>
		<div class="hero-stats-row">
			<div class="hero-stat-pill"><strong>Founded 2017</strong> Greater Noida HQ</div>
			<div class="hero-stat-pill"><strong>500+</strong> Enterprise &amp; Startup Clients</div>
			<div class="hero-stat-pill"><strong>1,200+</strong> Placements in 0–30 Days</div>
			<div class="hero-stat-pill"><strong>ISO 9001:2015</strong> Certified Quality Processes</div>
		</div>
	</div>
</section>

<!-- STORY & FOUNDING PURPOSE -->
<section class="section">
	<div class="container">
		<div class="about-split-grid">
			<div class="about-story-copy">
				<span class="eyebrow-badge"><?php echo sam_icon('target'); ?> Our Genesis</span>
				<h2>The 90-Day Dilemma That Started It All</h2>
				<p class="lead-paragraph">In 2017, SAM Manpower &amp; Career Services was founded in Greater Noida with an urgent mission: fix the broken hiring timeline in India.</p>
				<p>We saw firsthand how enterprise project kickoffs were crippled by the Indian IT and corporate notice period norm &mdash; 60 to 90 days. Worse, four out of ten candidates dropped out on day 89 after holding counter-offers, resetting hiring teams back to square one.</p>
				<p>Traditional staffing firms were complicit in this cycle, relying on automated resume databases and forwarding hundreds of unverified CVs without confirming real candidate availability. We took a radically different path:</p>
				<ul class="about-check-list">
					<li><strong>Zero Resume Spam:</strong> Only candidates who have been personally interviewed and vetted for skill match and cultural fit are presented.</li>
					<li><strong>Verified 0–30 Day Availability:</strong> Every profile on our shortlist has a confirmed, active resignation date or immediate joining readiness.</li>
					<li><strong>Accountability Over Volume:</strong> We back our placements with our industry-leading 90-day free replacement guarantee.</li>
				</ul>
			</div>
			<div class="about-highlight-box">
				<div class="about-card-badge">
					<div class="cert-icon-large"><?php echo sam_icon('shield'); ?></div>
					<h3>ISO 9001:2015 Certified</h3>
					<p>Our talent sourcing, background screening, candidate evaluation, and payroll compliance workflows are certified under international quality management standards.</p>
				</div>
				<div class="about-metrics-stack">
					<div class="about-metric-item">
						<span class="metric-num">98%</span>
						<span class="metric-text">First-year retention rate across executive and lateral placements</span>
					</div>
					<div class="about-metric-item">
						<span class="metric-num">48–72h</span>
						<span class="metric-text">Average turnaround time from mandate brief to first qualified shortlist</span>
					</div>
					<div class="about-metric-item">
						<span class="metric-num">100%</span>
						<span class="metric-text">Statutory compliance across all payroll and contract workforce engagements</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- CORE VALUES -->
<section class="section bg-soft">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('check'); ?> Core Principles</span>
			<h2>What Drives Every Mandate We Take</h2>
			<p>Our operational values guide how we treat our clients, our candidates, and each other.</p>
		</div>

		<div class="grid-4">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h3>Velocity as a Discipline</h3>
				<p>Unfilled seats are a silent tax on corporate growth. We treat time-to-hire with urgency, eliminating bureaucratic agency delays.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h3>Uncompromising Ethics</h3>
				<p>We never misrepresent candidate notice periods or skills. Total transparency on counter-offer risks and salary expectations.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('users'); ?></div>
				<h3>Candidate Dignity</h3>
				<p>We never treat candidates as transactional inventory. Guaranteed interview feedback, prompt communication, and zero fees.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('trophy'); ?></div>
				<h3>Outcome Accountability</h3>
				<p>Our job doesn't end on offer acceptance. We actively manage onboarding, notice transitions, and post-joining check-ins.</p>
			</div>
		</div>
	</div>
</section>

<!-- PAN-INDIA OPERATIONAL HUBS -->
<section class="section">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('target'); ?> Geographical Reach</span>
			<h2>PAN-India Presence &amp; Regional Desks</h2>
			<p>Headquartered in Delhi NCR with dedicated regional recruiters active across India's key economic hubs.</p>
		</div>

		<div class="grid-4">
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('briefcase'); ?></div>
				<h4>Delhi NCR (HQ)</h4>
				<p><strong>Noida &amp; Gurgaon</strong></p>
				<p>Corporate headquarters, executive search team, and central candidate screening facility covering IT, BFSI, and logistics.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('laptop'); ?></div>
				<h4>Bengaluru Hub</h4>
				<p><strong>Karnataka Tech Corridor</strong></p>
				<p>Dedicated tech engineering pod specializing in Cloud, Full-Stack, AI/ML, DevOps, and SaaS leadership placements.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('wallet'); ?></div>
				<h4>Mumbai Desk</h4>
				<p><strong>BKC &amp; Navi Mumbai</strong></p>
				<p>Specialized BFSI, Investment Banking, Fintech, and Corporate Finance talent practice serving India's financial capital.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h4>Pune &amp; West Desk</h4>
				<p><strong>Chakan &amp; Hinjawadi</strong></p>
				<p>Precision automotive, EV components, industrial manufacturing, and engineering services staffing specialists.</p>
			</div>
		</div>
	</div>
</section>

<!-- SERVICE SUITE OVERVIEW -->
<section class="section bg-soft">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('check'); ?> Complete Ecosystem</span>
			<h2>Our Full Suite of Workforce Solutions</h2>
			<p>Flexible engagement models tailored to your immediate project needs and long-term organizational goals.</p>
		</div>

		<div class="grid-3">
			<div class="service-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon('users'); ?></div>
				<h3>Permanent Hiring</h3>
				<p>End-to-end recruitment for critical lateral and leadership positions backed by a 90-day replacement guarantee.</p>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'for-employers' ) ); ?>" class="text-link">Explore Permanent <?php echo sam_icon('arrow'); ?></a>
			</div>
			<div class="service-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon('clock'); ?></div>
				<h3>Immediate &amp; 30-Day Hiring</h3>
				<p>Fast-track candidate matching for critical vacancies requiring personnel ready to deploy in 0–15 or 30 days.</p>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'immediate-hiring' ) ); ?>" class="text-link">Explore Immediate <?php echo sam_icon('arrow'); ?></a>
			</div>
			<div class="service-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon('laptop'); ?></div>
				<h3>Contract Staffing</h3>
				<p>Scalable IT and general workforce deployment on SAM's compliant payroll to handle surges and project delivery.</p>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'contract-staffing' ) ); ?>" class="text-link">Explore Contract <?php echo sam_icon('arrow'); ?></a>
			</div>
			<div class="service-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon('star'); ?></div>
				<h3>Contract-to-Hire (SAM Assured)</h3>
				<p>Evaluate talent live on your projects for 3–6 months with zero permanent commitment before making an offer.</p>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'contract-to-hire' ) ); ?>" class="text-link">Explore C2H <?php echo sam_icon('arrow'); ?></a>
			</div>
			<div class="service-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon('briefcase'); ?></div>
				<h3>Managed Workforce</h3>
				<p>Turnkey contingent workforce operations with on-site coordinators, attendance management, and SLA reporting.</p>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'managed-workforce' ) ); ?>" class="text-link">Explore Managed <?php echo sam_icon('arrow'); ?></a>
			</div>
			<div class="service-card">
				<div class="icon-badge icon-badge-sm"><?php echo sam_icon('wallet'); ?></div>
				<h3>Payroll Services</h3>
				<p>100% compliant monthly payroll execution, PF/ESIC/PT statutory filings, TDS deductions, and digital payslips.</p>
				<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'payroll' ) ); ?>" class="text-link">Explore Payroll <?php echo sam_icon('arrow'); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- BOTTOM CTA -->
<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Ready to experience recruitment with real velocity?</h2>
		<p>Join 500+ Indian employers who rely on SAM Manpower for their most critical hiring needs.</p>
		<div class="hero-actions" style="justify-content:center;">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Drop Your Hiring Requirement</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-secondary">Contact Our Team</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
