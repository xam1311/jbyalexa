<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jbyalexa
 */

?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<picture>
				<?php //twentysixteen_post_thumbnail(); ?>
					<?php
					if ( has_post_thumbnail() ) {
			    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			    if ( ! empty( $large_image_url[0] ) ) {
			        echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
			        echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
			        echo '</a>';
			    }
			} ?>
				</picture>
				<header class="entry-header">
					<?php
						if ( is_single() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}

					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php jbyalexa_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</header><!-- .entry-header -->

				<?php //twentysixteen_excerpt(); ?>



				<div class="entry-content">
					<?php
						/* translators: %s: Name of current post */
					/*	the_content( sprintf(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
							get_the_title()
						) );

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );*/
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php jbyalexa_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->
