<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<section class="page-hero page-hero-simple">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<h1><?php the_title(); ?></h1>
	</div>
</section>
<section class="section container container-narrow">
	<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
</section>
<?php get_footer(); ?>
