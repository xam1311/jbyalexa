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

															<p>Fan des bijoux d'Alexa <br>
																ALORS SUIVEZ-MOI !

																	<?php  wp_nav_menu([
										                    'menu'            => 'social',
										                    'theme_location'  => 'social',
										                ]); ?>
																</p>
														</div>
														<div class="col-lg-6 col-md-6 site-info">
															<?php printf( esc_html__( '%1$s par %2$s', 'jbyalexa' ), 'jbyalexa', 'Copyright © 2016 JbyAlexa <br/> Design by <a href="https://anne-b.fr" target="_blank">Anne-b</a> / Dev by <a href="https://twitter.com/Xam1311" target="_blank" rel="dev">@Xam1311</a>' ); ?>
														</div><!-- .site-info -->

										</div>
								</div><!-- fin de container -->
				</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>
