<?php
/**
 * The main template file / Blog archive
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<section class="page-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php echo sam_icon('book'); ?> Knowledge &amp; Insights</span>
		<h1>Talent Intelligence &amp; Recruitment Insights</h1>
		<p>Expert articles, statutory compliance updates, and market intelligence for modern Indian enterprises.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="blog-cards-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'blog-card' ); ?>>
						<div class="blog-card-meta">
							<span class="blog-topic-tag"><?php echo esc_html( get_the_category_list( ', ' ) ?: 'Recruitment' ); ?></span>
							<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
						</div>
						<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="blog-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<div class="blog-card-bottom">
							<span class="blog-author-sm"><?php the_author(); ?></span>
							<a href="<?php the_permalink(); ?>" class="text-link">Read Full Article <?php echo sam_icon('arrow'); ?></a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<div class="pagination-wrapper" style="margin-top:40px; text-align:center;">
				<?php the_posts_pagination(); ?>
			</div>
		<?php else : ?>
			<!-- Fallback to our rich knowledge hub if no posts published yet -->
			<div class="no-posts-banner" style="text-align:center; padding:60px 20px; background:var(--bg-soft); border-radius:var(--radius-lg);">
				<div class="icon-badge" style="margin:0 auto 16px;"><?php echo sam_icon('book'); ?></div>
				<h2>Explore Our Talent Playbooks &amp; Reports</h2>
				<p style="max-width:600px; margin:0 auto 24px; color:var(--text-muted);">Access our comprehensive 2026 hiring guides, notice period strategies, and compliance frameworks.</p>
				<div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'blog' ) ); ?>" class="btn btn-primary">Go to Full Resources Hub</a>
					<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-secondary">Submit Hiring Requirement</a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
