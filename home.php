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
	<?php  if ( have_posts() ) :
			/* Start the Loop */
			$count = 0;
			$imgSize = 'big';
			/** on mets les tailles imgs à big **/
			?>
	<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
	<?php	while ( have_posts() ) : the_post();
			$count++; ?>
			<?php if( $count == 2 ): ?>

			<div class="row frontpage-vertical">

			<?php endif;


			if( $count == 2 or $count == 3): ?>
				<?php $imgSize= 'medium'; ?>

				<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">

				<?php endif;
				 /* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.*/
				set_query_var( 'count', $count );
				set_query_var( 'img-size', $imgSize );
				get_template_part( 'template-parts/content', get_post_format() );
				?>
					<?php if( $count == 2 ): ?>

					</div>

					<?php endif;
				if( $count == 3): ?>

				 </div></div>
				 <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 frontpage-vertical">
				  <?php endif;

		endwhile; ?>

		</div>
	 	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
		<?php

		the_posts_navigation(array('prev_text'=>'<i class="icon-arrow-left"></i> '.__('Previous','jbyalexa'),'next_text'=>__('Next','jbyalexa').' <i class="icon-arrow-right"></i>','screen_reader_text'=>' '));

		else : ?>

		<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">

		<?php	get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div> <!-- fin de .row principal-->
		</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
