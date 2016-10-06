<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jbyalexa
 */
$count = get_query_var('count');
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post-inner <?php echo isset($count)? 'post-inside':'post-'.$count;?>">
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
				else: ?>

				<img src="https://placehold.it/930x593" class="attachment-post-big wp-post-image img-fluid" alt="image manquante"/>

		 		<?php	endif; ?>

					<div class="post-meta group">
							<?php jbyalexa_posted_on(); ?>
					</div><!-- .entry-meta -->
				</div><!--/.post-thumbnail-->


					<div class="post-content entry-content">
					<h2 class="post-title entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2><!--/.post-title-->

						<?php 	if ( !is_single() ) : ?>
						<div class="post-entry entry-excerpt">
							<?php the_excerpt(); ?>
							<a href="<?php echo get_permalink(); ?>" class="read-more"><i class="icon-plus-button"></i><span>Lire la suite</span></a>

						<?php else: ?>
							<div class="entry entry-fullcontent">
								<?php the_content(); ?>
						<?php endif; ?>
					</div><!--/.entry-->
			<?php 	if ( !is_single() ) : ?>
			</div>
			<?php endif; ?>

			</div>
			</article><!-- #post-## -->
