<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<section class="section container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'blog-single-preview' ); ?>>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
		</article>
	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Nothing found.', 'sam-manpower' ); ?></p>
	<?php endif; ?>
</section>
<?php get_footer(); ?>
