<?php
/**
 * Front page template
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<!-- HERO -->
<section class="hero" id="hero">
	<div class="hero-overlay"></div>
	<div class="container hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('target'); ?> Specialized Recruitment</span>
		<h1 class="hero-title">Immediate &amp; <span class="text-accent">30-Day Hiring</span> Experts.</h1>
		<p class="hero-sub">Long notice periods increase offer dropouts and hit revenue. SAM works exclusively with candidates serving notice or ready to join within 30 days &mdash; filling urgent roles without delays.</p>
		<div class="hero-actions">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary"><?php echo sam_icon('users'); ?> Hire Immediate Talent</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-outline-light"><?php echo sam_icon('chat'); ?> Contact Us</a>
		</div>
	</div>
</section>

<!-- STATS STRIP -->
<section class="stats-strip">
	<div class="container stats-grid">
		<div class="stat-item">
			<span class="stat-num">2017</span>
			<span class="stat-label">Year Established</span>
		</div>
		<div class="stat-item">
			<span class="stat-num">ISO</span>
			<span class="stat-label">9001:2015 Certified</span>
		</div>
		<div class="stat-item">
			<span class="stat-num">30</span>
			<span class="stat-label">Days Max to Join</span>
		</div>
		<div class="stat-item">
			<span class="stat-num">PAN</span>
			<span class="stat-label">India Reach</span>
		</div>
	</div>
</section>

<!-- OUR HIRING FOCUS -->
<section class="section focus-section">
	<div class="container">
		<div class="section-head">
			<h2>Our Hiring Focus</h2>
			<p>We target candidates exactly when you need them, minimizing dropouts and reducing time to productivity.</p>
		</div>
		<div class="grid-3 focus-grid">
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('bell'); ?></div>
				<h3>Immediate</h3>
				<p>Candidates ready to deploy instantly for urgent project needs.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('briefcase'); ?></div>
				<h3>Serving Notice</h3>
				<p>Actively transitioning professionals with guaranteed availability.</p>
			</div>
			<div class="focus-card">
				<div class="icon-badge"><?php echo sam_icon('calendar'); ?></div>
				<h3>&lt; 30 Days</h3>
				<p>Short notice periods vetted for planned immediate hires.</p>
			</div>
		</div>
	</div>
</section>

<!-- OUR SERVICES -->
<section class="section services-section" id="employers">
	<div class="container">
		<div class="section-head section-head-left">
			<h2>Our Services</h2>
			<p>Comprehensive workforce solutions tailored for speed, compliance, and quality.</p>
		</div>
		<div class="grid-4 services-grid">
			<?php
			$services = array(
				array( 'icon' => 'users', 'title' => 'Permanent Hiring', 'desc' => 'Specialized in immediate and 30-day placements for critical roles.', 'link' => sam_get_page_url_by_slug( 'for-employers' ) ),
				array( 'icon' => 'laptop', 'title' => 'IT Contract Staffing', 'desc' => 'Flexible technical talent to scale projects dynamically.', 'link' => sam_get_page_url_by_slug( 'for-employers' ) ),
				array( 'icon' => 'briefcase', 'title' => 'Managed Workforce', 'desc' => 'End-to-end management of contingent workforce operations.', 'link' => sam_get_page_url_by_slug( 'for-employers' ) ),
				array( 'icon' => 'wallet', 'title' => 'Payroll Support', 'desc' => 'Compliant and timely payroll processing and management.', 'link' => sam_get_page_url_by_slug( 'payroll' ) ),
			);
			foreach ( $services as $s ) :
				$link = isset( $s['link'] ) ? $s['link'] : '#employers';
				?>
				<div class="service-card">
					<div class="icon-badge icon-badge-sm"><?php echo sam_icon( $s['icon'] ); ?></div>
					<h3><?php echo esc_html( $s['title'] ); ?></h3>
					<p><?php echo esc_html( $s['desc'] ); ?></p>
					<a href="<?php echo esc_url( $link ); ?>" class="text-link">Learn More <?php echo sam_icon('arrow'); ?></a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- RECRUITMENT JOURNEY -->
<section class="section journey-section">
	<div class="container">
		<div class="section-head">
			<h2>Our Seamless Recruitment Journey</h2>
			<p>A transparent, AI-driven process designed to find your perfect match in record time.</p>
		</div>
		<div class="journey-track">
			<?php
			$steps = array(
				array( 'icon' => 'chat', 'label' => 'Alignment', 'desc' => 'Defining position requirements' ),
				array( 'icon' => 'search', 'label' => 'Sourcing', 'desc' => 'Empanelment talent identification' ),
				array( 'icon' => 'shield', 'label' => 'Screening', 'desc' => 'Rigorous technical evaluation' ),
				array( 'icon' => 'check', 'label' => 'Shortlist', 'desc' => 'Curated & balanced presentation' ),
				array( 'icon' => 'chat', 'label' => 'Interview', 'desc' => 'Direct client interaction' ),
				array( 'icon' => 'download', 'label' => 'Joining', 'desc' => 'Seamless onboarding process' ),
			);
			foreach ( $steps as $i => $st ) :
				$is_last = ( $i === count( $steps ) - 1 );
				?>
				<div class="journey-step <?php echo $is_last ? 'is-active' : ''; ?>">
					<div class="journey-icon"><?php echo sam_icon( $st['icon'] ); ?></div>
					<span class="journey-step-num">Step 0<?php echo esc_html( $i + 1 ); ?></span>
					<strong><?php echo esc_html( $st['label'] ); ?></strong>
					<p><?php echo esc_html( $st['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- SAM ASSURED HIRE -->
<section class="section assured-section" id="sam-assured">
	<div class="container assured-inner">
		<div class="assured-copy">
			<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('shield'); ?> Zero Risk Hiring</span>
			<h2>SAM Assured Hire</h2>
			<p>Not sure if a hire will work out? SAM Assured lets you evaluate a candidate on the job first, so you only commit to a permanent hire once you're confident it's the right fit. No severance, no backfill scramble.</p>
			<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>" class="btn btn-primary">Explore Assured Model</a>
		</div>
		<div class="assured-steps">
			<div class="assured-step"><?php echo sam_icon('check'); ?><span>01. Identify<br><small>Curated Talent</small></span></div>
			<div class="assured-step"><?php echo sam_icon('clock'); ?><span>02. Trial<br><small>On-the-job</small></span></div>
			<div class="assured-step"><?php echo sam_icon('star'); ?><span>03. Evaluate<br><small>Performance Review</small></span></div>
			<div class="assured-step is-active"><?php echo sam_icon('download'); ?><span>04. Convert<br><small>Permanent Hire</small></span></div>
		</div>
	</div>
</section>

<!-- PAYROLL SERVICES -->
<section class="section payroll-section" id="payroll">
	<div class="container payroll-inner">
		<div class="payroll-copy">
			<span class="eyebrow-badge"><?php echo sam_icon('wallet'); ?> Payroll Services</span>
			<h2>Compliant Payroll, Handled End-to-End</h2>
			<p>From salary processing to statutory filings, SAM manages your entire payroll cycle accurately and on time &mdash; so your team never has to chase compliance.</p>
			<ul class="payroll-checklist">
				<li><?php echo sam_icon('check'); ?> Salary processing &amp; digital payslips</li>
				<li><?php echo sam_icon('check'); ?> PF, ESI, PT &amp; TDS statutory compliance</li>
				<li><?php echo sam_icon('check'); ?> Full &amp; final settlements</li>
				<li><?php echo sam_icon('check'); ?> Monthly MIS reporting</li>
			</ul>
			<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'payroll' ) ); ?>" class="btn btn-primary">Explore Payroll Services</a>
		</div>
		<div class="payroll-stats-card">
			<div class="payroll-stat"><span class="stat-num">ISO</span><span class="stat-label">9001:2015 Certified</span></div>
			<div class="payroll-stat"><span class="stat-num">100%</span><span class="stat-label">On-Time Disbursal</span></div>
			<div class="payroll-stat"><span class="stat-num">PAN</span><span class="stat-label">India Compliance</span></div>
			<div class="payroll-stat"><span class="stat-num">0</span><span class="stat-label">Missed Filings</span></div>
		</div>
	</div>
</section>

<!-- PAYROLL QUERIES FOR EXISTING EMPLOYEES -->
<section class="section employee-query-section" aria-labelledby="employee-payroll-queries">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow-badge eyebrow-badge-light"><?php echo sam_icon('chat'); ?> Employee Support</span>
			<h2 id="employee-payroll-queries">Payroll Queries from Existing Employees</h2>
			<p>Need help with your salary, payslip, statutory deduction, or final settlement? Our payroll support team is here to assist you.</p>
		</div>
		<div class="grid-3 employee-query-grid">
			<div class="employee-query-card">
				<?php echo sam_icon('wallet'); ?>
				<h3>Salary &amp; Payslips</h3>
				<p>Get support for salary credits, payslip access, reimbursements, and bank-detail updates.</p>
			</div>
			<div class="employee-query-card">
				<?php echo sam_icon('shield'); ?>
				<h3>PF, ESI &amp; Tax</h3>
				<p>Ask about statutory deductions, PF/ESI details, Form 16, and tax-related documents.</p>
			</div>
			<div class="employee-query-card">
				<?php echo sam_icon('clock'); ?>
				<h3>Exit &amp; Settlement</h3>
				<p>Get clarity on attendance corrections, full-and-final settlement, and relieving documentation.</p>
			</div>
		</div>
		<div class="employee-query-action">
			<a href="tel:<?php echo esc_attr( str_replace( ' ', '', get_theme_mod( 'sam_phone', '+919876543210' ) ) ); ?>" class="btn btn-primary"><?php echo sam_icon('chat'); ?> Contact Payroll Support</a>
			<p>Keep your employee ID ready. Please do not share sensitive identity or bank details over an unsecured channel.</p>
		</div>
	</div>
</section>

<!-- WHY CHOOSE US -->
<section class="section why-section">
	<div class="container">
		<div class="section-head">
			<h2>Why Choose Us</h2>
			<p>We prioritize speed, quality, and transparency to ensure you get the best talent.</p>
		</div>
		<div class="grid-4 why-grid">
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('clock'); ?></div>
				<h3>Speed to Hire</h3>
				<p>Our 30-day hiring model significantly reduces your time to fill metrics.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('shield'); ?></div>
				<h3>Quality Assured</h3>
				<p>Rigorous screening ensures only top-tier candidates reach your interview stage.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('check'); ?></div>
				<h3>Complete Transparency</h3>
				<p>Clear communication and real-time updates throughout the hiring process.</p>
			</div>
			<div class="why-card">
				<div class="icon-badge"><?php echo sam_icon('users'); ?></div>
				<h3>Dedicated Support</h3>
				<p>A dedicated account manager for your staffing and payroll needs.</p>
			</div>
		</div>
	</div>
</section>

<!-- TESTIMONIALS -->
<section class="section testimonials-section">
	<div class="container">
		<div class="section-head">
			<h2>Client Success Stories</h2>
			<p>Hear what our clients have to say about working with SAM.</p>
		</div>
		<div class="grid-3 testimonial-grid">
			<?php
			$testimonial_query = new WP_Query( array( 'post_type' => 'sam_testimonial', 'posts_per_page' => 3 ) );
			if ( $testimonial_query->have_posts() ) :
				while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
					<div class="testimonial-card">
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
					array( 'quote' => 'SAM helped us scale our engineering team by 40% in just two months. Their focus on immediate joiners was a game-changer for our project timelines.', 'name' => 'Rajesh Kumar', 'role' => 'CTO, TechCorp India' ),
					array( 'quote' => 'The payroll management service is excellent. No longer worry about compliance issues, allowing us to focus on our core business.', 'name' => 'Sarah Jenkins', 'role' => 'HR Director, GlobalTech' ),
					array( 'quote' => 'Their contract staffing solution provided us with the flexibility we needed during peak season, highly professional and responsive team.', 'name' => 'Amit Patel', 'role' => 'Operations Manager, RetailPro' ),
				);
				foreach ( $fallback as $t ) : ?>
					<div class="testimonial-card">
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

<!-- PARTNERING FOR SUCCESS -->
<section class="section partner-section" id="about">
	<div class="container partner-inner">
		<div class="partner-media">
			<?php
			$img = get_theme_mod( 'sam_partner_image' );
			if ( $img ) {
				echo '<img src="' . esc_url( $img ) . '" alt="SAM team collaborating with a client" loading="lazy">';
			} else {
				echo '<div class="partner-media-placeholder" aria-hidden="true"></div>';
			}
			?>
		</div>
		<div class="partner-copy">
			<h2>Partnering for Success</h2>
			<p>At SAM, we envision recruitment as more than just filling seats. It's about building the foundation for your company's future. Our collaborative approach ensures we understand your culture and deploy staff that fit right in.</p>
			<p>We are committed to long-term growth, providing candidates who don't just quickly join, but thrive within your organization.</p>
			<div class="partner-stats">
				<div><span class="stat-num">98%</span><span class="stat-label">Retention Rate</span></div>
				<div><span class="stat-num">500+</span><span class="stat-label">Partners Nationwide</span></div>
			</div>
			<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'about-us' ) ); ?>" class="btn btn-outline" style="margin-top:24px;">About SAM Manpower</a>
		</div>
	</div>
</section>

<!-- FAQ -->
<section class="section faq-section">
	<div class="container container-narrow">
		<div class="section-head">
			<h2>Frequently Asked Questions</h2>
			<p>Common questions about our recruitment and payroll services.</p>
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
					array( 'q' => 'How do you ensure candidates join within 30 days?', 'a' => 'We pre-screen candidates who are already serving notice or immediately available, so onboarding timelines stay predictable and fast.' ),
					array( 'q' => 'Do you operate outside of major metro cities?', 'a' => 'Yes, our network covers Tier 1, Tier 2, and Tier 3 cities across India with a PAN-India sourcing reach.' ),
					array( 'q' => 'What industries do you specialize in?', 'a' => 'We primarily serve IT, manufacturing, retail, and BFSI sectors, with dedicated recruiters for each vertical.' ),
					array( 'q' => 'Is your payroll service compliant with local laws?', 'a' => 'Absolutely. We are ISO 9001:2015 certified and stay current with all applicable labour law and statutory compliance requirements.' ),
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

<!-- BLOG -->
<section class="section blog-section">
	<div class="container">
		<div class="section-head">
			<h2>Latest from our Blog</h2>
			<p>Insights and updates from the world of recruitment and talent management.</p>
		</div>
		<div class="grid-3 blog-grid">
			<?php
			$blog_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
			if ( $blog_query->have_posts() ) :
				while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
					<article class="blog-card">
						<a href="<?php the_permalink(); ?>" class="blog-card-thumb">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium' ); } else { echo '<span class="blog-thumb-placeholder" aria-hidden="true"></span>'; } ?>
						</a>
						<div class="blog-card-body">
							<span class="blog-category"><?php $cats = get_the_category(); echo esc_html( ! empty( $cats ) ? $cats[0]->name : 'Recruitment' ); ?></span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<a href="<?php the_permalink(); ?>" class="text-link">Read More <?php echo sam_icon('arrow'); ?></a>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata();
			else :
				$fallback_posts = array(
					array( 'cat' => 'Recruitment Tips', 'title' => 'Reducing Time-to-Hire in 2024' ),
					array( 'cat' => 'Industry Trends', 'title' => 'The Rise of the 30-Day Notice Period' ),
					array( 'cat' => 'Company News', 'title' => 'SAM Achieves ISO 9001:2015 Recertification' ),
				);
				foreach ( $fallback_posts as $p ) : ?>
					<article class="blog-card">
						<span class="blog-card-thumb"><span class="blog-thumb-placeholder" aria-hidden="true"></span></span>
						<div class="blog-card-body">
							<span class="blog-category"><?php echo esc_html( $p['cat'] ); ?></span>
							<h3><?php echo esc_html( $p['title'] ); ?></h3>
							<a href="#" class="text-link">Read More <?php echo sam_icon('arrow'); ?></a>
						</div>
					</article>
				<?php endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
