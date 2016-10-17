<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Jbyalexa
 */

get_header(); ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div id="primary" class="col-md-9 col-xs-12 col-xl-9 col-sm-8">
<?php else: ?>
<div id="primary" class="col-md-12 col-xs-12 col-xl-12 col-sm-12">
<?php endif; ?>
	<main id="main" class="site-main" role="main">


		<div class="row">

			<?php		while ( have_posts() ) : the_post(); ?>
			<div class="col-lg-12 col-md-12 col-xs-12">

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>


			</div>

			<div class="col-lg-12 col-md-12 col-xs-12">
			<?php	the_posts_navigation(array('prev_text'=>'<i class="icon-arrow-left"></i> '.__('Previous','jbyalexa'),'next_text'=>__('Next','jbyalexa').' <i class="icon-arrow-right"></i>','screen_reader_text'=>' ')); ?>
			</div>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
