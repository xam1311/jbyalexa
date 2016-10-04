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
					<footer>
								<div class="container">
										<div class="row">

														<div class="col-lg-6 col-md-6 col-xs-12">

														</div>
														<div class="col-lg-6 col-md-6 site-info">
															<?php printf( esc_html__( '%1$s par %2$s', 'jbyalexa' ), 'jbyalexa', 'Copyright © 2016 WbyAlexa <br/> Design by anne-b / Dev by <a href="https://twitter.com/Xam1311?lang=fr" target="_blank" rel="dev">@Xam1311</a>' ); ?>
														</div><!-- .site-info -->

										</div>
								</div><!-- fin de container -->
				</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>
