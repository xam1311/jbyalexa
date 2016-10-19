<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'jbyalexa' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
