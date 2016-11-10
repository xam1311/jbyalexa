<?php
/**
 * The template for displaying woocommerce.
 *
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
                    <?php woocommerce_content(); ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
