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
		 			endif; ?>
					<div class="post-meta group">
							<?php jbyalexa_posted_on(); ?>
					</div><!-- .entry-meta -->
				</div><!--/.post-thumbnail-->



				<h2 class="post-title entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2><!--/.post-title-->


				<div class="entry excerpt entry-summary">
					<?php the_excerpt(); ?>
					<a href="<?php echo get_permalink(); ?>" class="read-more"><span class="icon-plus-button"></span>Lire la suite</a>
				</div><!--/.entry-->

			</div>
			</article><!-- #post-## -->
