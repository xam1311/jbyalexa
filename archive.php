<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jbyalexa
 */

get_header(); ?>

<div id="primary" class="col-md-9 col-xs-12 col-xl-9 col-sm-8">
	<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
		<div class="row">
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			$count = 0;
			while ( have_posts() ) : the_post();
			$count++;
			set_query_var( 'count_loop', $count );

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>

			<div class="col-lg-12 col-md-12 col-xs-12">
			<?php
			the_posts_navigation(array('prev_text'=>'<i class="icon-arrow-left"></i> '.__('Previous','jbyalexa'),'next_text'=>__('Next','jbyalexa').' <i class="icon-arrow-right"></i>','screen_reader_text'=>' '));
			else : ?>

			<div class="col-lg-12 col-md-12 col-xs-12">

			<?php get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
