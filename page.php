<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
     <div class="row">

			<?php
			while ( have_posts() ) : the_post();
				$imgSize = 'big';	set_query_var( 'img-size', $imgSize ); 
				get_template_part( 'template-parts/content', 'page' );

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
