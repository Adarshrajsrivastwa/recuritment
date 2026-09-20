<?php
/**
 * Template Name: Blog & Resources
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('book'); ?> Knowledge Hub</span>
		<h1>Hiring Playbooks, Salary Benchmarks &amp; Talent Intelligence</h1>
		<p>Practical guides, compliance updates, and tactical hiring strategies written for founders, CHROs, talent acquisition heads, and hiring managers across India.</p>
		<div class="hero-actions">
			<a href="#featured-resources" class="btn btn-primary">Featured Playbook</a>
			<a href="#latest-articles" class="btn btn-secondary">Explore Articles</a>
		</div>
	</div>
</section>

<!-- FEATURED ARTICLE BANNER -->
<section class="section" id="featured-resources">
	<div class="container">
		<div class="featured-blog-card">
			<div class="featured-blog-badge-col">
				<span class="blog-cat-badge">Featured Strategy Guide</span>
				<span class="blog-read-time">8 Min Read &bull; Updated Q1 2026</span>
			</div>
			<div class="featured-blog-content">
				<h2>The 2026 Notice Period Playbook: How Forward-Thinking CHROs Cut Time-to-Hire by 60%</h2>
				<p>The standard 90-day notice period in India has turned typical recruitment cycles into a slow-motion gamble with a 40%+ offer drop-out rate. This exhaustive guide analyzes proprietary hiring data from over 1,200 mid-to-senior placements to reveal how top firms identify active-serving talent, structure zero-risk buyouts, and maintain 94%+ joining predictability.</p>
				<div class="featured-blog-footer">
					<div class="blog-author-meta">
						<strong>By SAM Executive Research Group</strong>
						<span>Talent Intelligence Unit &bull; Greater Noida</span>
					</div>
					<a href="<?php echo esc_url( sam_hire_form_url() ); ?>?source=playbook" class="btn btn-primary">Request Full Playbook &amp; Templates <?php echo sam_icon('arrow'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- LATEST ARTICLES GRID -->
<section class="section bg-soft" id="latest-articles">
	<div class="container">
		<div class="section-head section-head-left">
			<span class="eyebrow-badge"><?php echo sam_icon('check'); ?> Talent Insights</span>
			<h2>Latest Articles &amp; Tactical Insights</h2>
			<p>Actionable guidance from recruiters who close immediate and 30-day roles every day.</p>
		</div>

		<!-- Topic Filter Pills -->
		<div class="blog-filter-pills">
			<button type="button" class="blog-pill active" data-filter="all">All Topics</button>
			<button type="button" class="blog-pill" data-filter="notice">Notice Period Tactics</button>
			<button type="button" class="blog-pill" data-filter="compliance">Labour Law &amp; Compliance</button>
			<button type="button" class="blog-pill" data-filter="models">Hiring Models (C2H / Contract)</button>
			<button type="button" class="blog-pill" data-filter="market">Salary &amp; Market Trends</button>
		</div>

		<div class="blog-cards-grid">

			<!-- Post 1 -->
			<article class="blog-card" data-topic="notice">
				<div class="blog-card-meta">
					<span class="blog-topic-tag tag-notice">Notice Period Tactics</span>
					<span class="blog-date">March 2026 &bull; 6 min read</span>
				</div>
				<h3 class="blog-title">The Counter-Offer Pandemic: 5 Proven Steps to Stop Offer Dropouts on Day 85</h3>
				<p class="blog-excerpt">When candidates wait 90 days, counter-offers from current employers or competing recruiters are almost guaranteed. Discover our dual-touch check-in cadence that drives offer-to-joining ratios above 94%.</p>
				<div class="blog-card-bottom">
					<span class="blog-author-sm">SAM Talent Team</span>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>?inquiry=Article-CounterOffers" class="text-link">Read Full Analysis <?php echo sam_icon('arrow'); ?></a>
				</div>
			</article>

			<!-- Post 2 -->
			<article class="blog-card" data-topic="models">
				<div class="blog-card-meta">
					<span class="blog-topic-tag tag-models">Contract-to-Hire</span>
					<span class="blog-date">February 2026 &bull; 5 min read</span>
				</div>
				<h3 class="blog-title">Permanent vs. Contract-to-Hire: A CFO's Blueprint for Engineering Agility</h3>
				<p class="blog-excerpt">Permanent headcount locks in fixed operational burn. Learn how high-performing tech organizations use 3 to 6-month trial deployments before converting to payroll to mitigate hiring downside risk.</p>
				<div class="blog-card-bottom">
					<span class="blog-author-sm">Advisory Services</span>
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'contract-to-hire' ) ); ?>" class="text-link">Read Blueprint <?php echo sam_icon('arrow'); ?></a>
				</div>
			</article>

			<!-- Post 3 -->
			<article class="blog-card" data-topic="compliance">
				<div class="blog-card-meta">
					<span class="blog-topic-tag tag-compliance">Labour Law &amp; Payroll</span>
					<span class="blog-date">February 2026 &bull; 7 min read</span>
				</div>
				<h3 class="blog-title">India's 4 New Labour Codes: 2026 Statutory Compliance Checklist for Employers</h3>
				<p class="blog-excerpt">Key changes in wage definitions, overtime calculation, gratuity vesting, and contractor registration rules under the Code on Wages and OSH Code. Are your workforce agreements aligned?</p>
				<div class="blog-card-bottom">
					<span class="blog-author-sm">Payroll &amp; Legal Desk</span>
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'payroll' ) ); ?>" class="text-link">Review Checklist <?php echo sam_icon('arrow'); ?></a>
				</div>
			</article>

			<!-- Post 4 -->
			<article class="blog-card" data-topic="market">
				<div class="blog-card-meta">
					<span class="blog-topic-tag tag-market">Market Trends</span>
					<span class="blog-date">January 2026 &bull; 5 min read</span>
				</div>
				<h3 class="blog-title">Why 90-Day Notice Periods Cost India's Tech Industry Billions in Lost Velocity</h3>
				<p class="blog-excerpt">A mathematical simulation of enterprise project delays caused by notice friction, with data comparing Indian turnaround timelines to the 2-week norms of the US, UK, and Singapore.</p>
				<div class="blog-card-bottom">
					<span class="blog-author-sm">Research Bureau</span>
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'immediate-hiring' ) ); ?>" class="text-link">Explore Data <?php echo sam_icon('arrow'); ?></a>
				</div>
			</article>

			<!-- Post 5 -->
			<article class="blog-card" data-topic="notice">
				<div class="blog-card-meta">
					<span class="blog-topic-tag tag-notice">Notice Period Tactics</span>
					<span class="blog-date">January 2026 &bull; 6 min read</span>
				</div>
				<h3 class="blog-title">How to Legally Structure Notice Period Buyouts: Agreement Templates &amp; Traps</h3>
				<p class="blog-excerpt">Buying out a critical candidate's notice can secure immediate project kickoffs, but tax implications and service bonds require precision. Here is how leading enterprise HR teams structure them cleanly.</p>
				<div class="blog-card-bottom">
					<span class="blog-author-sm">SAM Advisory</span>
					<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="text-link">Download Templates <?php echo sam_icon('arrow'); ?></a>
				</div>
			</article>

			<!-- Post 6 -->
			<article class="blog-card" data-topic="market">
				<div class="blog-card-meta">
					<span class="blog-topic-tag tag-market">Manufacturing &amp; Auto</span>
					<span class="blog-date">December 2025 &bull; 4 min read</span>
				</div>
				<h3 class="blog-title">The EV &amp; Electronics Manufacturing Surge: Where to Find Shop-Floor Supervisors</h3>
				<p class="blog-excerpt">With aggressive PLI investments flowing into electronics and EV clusters in Tamil Nadu, Maharashtra, and Noida, the war for experienced line managers has peaked. Here is where the talent is moving.</p>
				<div class="blog-card-bottom">
					<span class="blog-author-sm">Manufacturing Practice</span>
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'industries' ) ); ?>" class="text-link">Read Industry Deep-Dive <?php echo sam_icon('arrow'); ?></a>
				</div>
			</article>

		</div>
	</div>
</section>

<!-- FREE DOWNLOADABLE RESOURCES -->
<section class="section">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge"><?php echo sam_icon('download'); ?> Free Tools &amp; Reports</span>
			<h2>Executive Toolkits &amp; Benchmarks</h2>
			<p>Free recruitment frameworks, salary grids, and calculation templates used by 500+ Indian employers.</p>
		</div>

		<div class="grid-3">
			<div class="resource-download-card">
				<div class="resource-icon-badge"><?php echo sam_icon('briefcase'); ?></div>
				<h4>2026 Tech &amp; Engineering Salary Benchmark</h4>
				<p>Compensation percentiles (25th, 50th, 90th) across Full-Stack, Cloud, AI/ML, and DevOps in Bengaluru, NCR, Pune &amp; Hyderabad.</p>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>?download=salary-guide" class="btn btn-primary btn-sm">Download Free PDF (2.4 MB)</a>
			</div>
			<div class="resource-download-card">
				<div class="resource-icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h4>Statutory Compliance Checklist 2026</h4>
				<p>Comprehensive employer audit guide covering PF, ESI, Gratuity, Bonus Act, and monthly reporting calendar under the New Labour Codes.</p>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>?download=compliance-checklist" class="btn btn-primary btn-sm">Download Free PDF (1.8 MB)</a>
			</div>
			<div class="resource-download-card">
				<div class="resource-icon-badge"><?php echo sam_icon('users'); ?></div>
				<h4>Contract-to-Hire Cost Comparison Matrix</h4>
				<p>Excel-based ROI model comparing total employee acquisition cost (direct vs. C2H vs. bench contingent) across 12-month cycles.</p>
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>?download=c2h-calculator" class="btn btn-primary btn-sm">Download Excel Tool (XLSX)</a>
			</div>
		</div>
	</div>
</section>

<!-- TALENT PULSE NEWSLETTER -->
<section class="section bg-soft">
	<div class="container">
		<div class="newsletter-box">
			<div class="newsletter-copy">
				<span class="eyebrow-badge"><?php echo sam_icon('bell'); ?> Weekly Talent Pulse</span>
				<h2>Stay Ahead of India's Workforce Trends</h2>
				<p>Join 3,500+ CHROs, Founders, and Talent Leaders. Every Thursday morning: immediate-start candidate trends, regulatory compliance shifts, and salary movement insights.</p>
			</div>
			<div class="newsletter-form-col">
				<form class="newsletter-form" onsubmit="alert('Thank you for subscribing to SAM Talent Pulse!'); return false;">
					<div class="newsletter-input-group">
						<input type="email" required placeholder="Enter your business email address..." class="newsletter-input" />
						<button type="submit" class="btn btn-primary">Subscribe Free</button>
					</div>
					<small class="newsletter-disclaimer">Zero spam. Unsubscribe anytime in 1 click.</small>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- MANDATE CTA -->
<section class="section cta-band">
	<div class="container cta-band-inner">
		<h2>Need customized talent intelligence for your domain?</h2>
		<p>Our sector research teams can prepare tailored candidate availability maps and compensation benchmarks for your critical hiring mandates.</p>
		<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Talk to a Talent Advisor</a>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const pills = document.querySelectorAll('.blog-pill');
	const cards = document.querySelectorAll('.blog-card');

	pills.forEach(pill => {
		pill.addEventListener('click', function() {
			pills.forEach(p => p.classList.remove('active'));
			this.classList.add('active');

			const filter = this.getAttribute('data-filter');

			cards.forEach(card => {
				const topic = card.getAttribute('data-topic');
				if (filter === 'all' || topic === filter) {
					card.style.display = 'flex';
				} else {
					card.style.display = 'none';
				}
			});
		});
	});
});
</script>

<?php get_footer(); ?>
