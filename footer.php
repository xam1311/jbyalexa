<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jbyalexa
 */

?>
	</div><!-- fin de .row global-->
</div><!-- #container-->
	<div class="container-fluid" id="footer-nav">
			<div class="container">
			<footer>
				<div class="site-info">
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'jbyalexa' ), 'jbyalexa', '<a href="" rel="designer">xam1311</a>' ); ?>
				</div><!-- .site-info -->
			</footer>
		</div>
	</div>


<?php wp_footer(); ?>

</body>
</html>
