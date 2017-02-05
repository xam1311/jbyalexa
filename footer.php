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

<?php if ( shortcode_exists( 'instagram-feed' ) ) :?>
<div class="container-fluid" id="instagram-responsive">
	<div class="row">
					<div class="col-lg-12 col-md-12 hidden-sm-down">
						<?php echo do_shortcode('[instagram-feed]'); ?>
					</div>
	</div>
</div>
<?php endif;?>
	<div class="container-fluid" id="footer-nav">
					<footer>
								<div class="container">
										<div class="row">
														<div class="col-lg-2 col-md-2 col-xs-5">
														<p><?php _e('Fan Alexa\'s jewelry','jbyalexa'); ?><br/><strong><?php _e('FOLLOW ME !','jbyalexa'); ?></strong></p>

														</div>

														<div class="col-lg-4 col-md-4 col-xs-7 footer-social">
																	<?php  wp_nav_menu([
										                    'menu'            => 'social',
										                    'theme_location'  => 'social',
																				'depth' => 1,
										                ]); ?>

														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 site-info">
															<p>

															<?php _e('Copyright &#xa9;','jbyalexa'); echo date('Y').' JbyAlexa'; ?> <br/> <?php _e('Design by ','jbyalexa'); ?> <a href="https://anne-b.fr" target="_blank" rel="Theme Design">Anne-b</a> / <?php _e('Dev by','jbyalexa');?> <a href="https://twitter.com/Xam1311" target="_blank" rel="Theme Dev">@Xam1311</a>
															</p>
														</div><!-- .site-info -->

										</div>
								</div><!-- fin de container -->
				</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>
