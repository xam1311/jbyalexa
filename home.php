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

	<div id="primary" class="col-md-9 col-xs-12 col-xl-9 col-sm-8">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :?>
			<?php /* Start the Loop */
			$count = 0; ?>
			<div class="row">
			<?php	if( $count == 0):?>

				<div class="col-lg-12 col-md-12 col-xs-12 first-frontpage">

			<?php else: ?>

				<div class="col-lg-12 col-md-12 col-xs-12">

			<?php endif;
						while ( have_posts() ) : the_post();
						$count++;

								if( $count == 2 ): ?>
								</div>
								<div class="row other-frontpage">

								<?php endif;

								if( $count == 2 or $count == 3):
								?>
									<div class="col-lg-6 col-md-6 col-xs-12">
								<?php endif;
									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
							  set_query_var( 'count', $count );

								get_template_part( 'template-parts/content', get_post_format() );

							if( $count == 2 or $count == 3 ): ?>

										</div><!-- fin de col-loop-<?php echo $count;?>-->

							<?php endif; ?>

							<?php if( $count == 3 ): ?>

								 </div> <!-- fin de row -->

							<?php endif; ?>

						<!--	</div><!-- fin de la colonne global -->

							<?php	endwhile; ?>

	 	<div class="col-lg-12 col-md-12 col-xs-12">
		<?php

		the_posts_navigation(array('prev_text'=>'<i class="icon-arrow-left"></i> Précédent','next_text'=>'Suivant <i class="icon-arrow-right"></i>','screen_reader_text'=>' '));
		else : ?>

		<div class="col-lg-12 col-md-12 col-xs-12">

		<?php	get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div> <!-- fin de .row principal-->
		</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
