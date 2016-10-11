<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jbyalexa
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div class="col-xl-3 col-md-3 hidden-sm-down" id="sidebar">
		<aside id="secondary" class="" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary -->
</div>
<?php else:

		return;?>
<?php endif;?>
