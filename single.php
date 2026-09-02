<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<section class="page-hero page-hero-simple">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<span class="eyebrow-badge"><?php $cats = get_the_category(); echo esc_html( ! empty( $cats ) ? $cats[0]->name : 'Blog' ); ?></span>
		<h1><?php the_title(); ?></h1>
	</div>
</section>
<section class="section container container-narrow">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="single-thumb"><?php the_post_thumbnail( 'large' ); ?></div>
		<?php endif; ?>
		<div class="single-content"><?php the_content(); ?></div>
	<?php endwhile; ?>
</section>
<?php get_footer(); ?>
