<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jbyalexa
 */

get_header(); ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div id="primary" class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-xs-12">
<?php else: ?>
<div id="primary" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php endif; ?>
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && !is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif;

					/* Start the Loop */
					$count = 0;
					$imgSize = 'big';
					while ( have_posts() ) : the_post();
					$count++;
					set_query_var( 'count_loop', $count );
					set_query_var( 'img-size', $imgSize );
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

					get_template_part( 'template-parts/content', get_post_format() );

					endwhile; ?>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<?php

						the_posts_navigation(array('prev_text'=>'<i class="icon-arrow-left"></i> '.__('Previous','jbyalexa'),'next_text'=>__('Next','jbyalexa').' <i class="icon-arrow-right"></i>','screen_reader_text'=>' '));

			else : ?>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<?php	get_template_part( 'template-parts/content', 'none' );?>

		</main><!-- #main -->
</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
