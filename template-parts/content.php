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
				<div class="post-inner post-hover">
					<div class="post-thumbnail">
					<?php
					if ( has_post_thumbnail() ) :
							if( is_home() or is_single()): ?>

								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<img src="<?php the_post_thumbnail_url('post-big') ?>" class="attachment-post-big wp-post-image img-fluid"/>
								</a>

							<?php else:
								 the_post_thumbnail('thumbnail');
					endif;
			  /*  $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			    if ( ! empty( $large_image_url[0] ) ) {
			        echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
			        echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
			        echo '</a>';
			    }*/
		 			endif; ?>
					<?php if ( comments_open() /*&& ( hu_is_checked( 'comment-count' ) ) */): ?>
					<a class="post-comments" href="<?php comments_link(); ?>"><span></i><?php comments_number( '0', '1', '%' ); ?></span></a>
				<?php endif; ?>
				</div><!--/.post-thumbnail-->

				<div class="post-meta group">
						<?php jbyalexa_posted_on(); ?>
				</div><!-- .entry-meta -->

				<h2 class="post-title entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2><!--/.post-title-->


				<div class="entry excerpt entry-summary">
					<?php the_excerpt(); ?>
				</div><!--/.entry-->

			</div>
			</article><!-- #post-## -->
