<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jbyalexa
 */
$count = get_query_var('count');
$imgSize = get_query_var('img-size');
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post-inner <?php echo isset($count)? 'post-inside':'post-'.$count;?>">
					<div class="post-thumbnail">
					<?php
					if ( has_post_thumbnail() ) :
						 if( is_home() or is_front_page() or is_category()): ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<img src="<?php the_post_thumbnail_url('post-'.$imgSize.'') ?>" class="attachment-post-<?php echo $imgSize; ?> wp-post-image img-fluid"/>
								</a>
							<?php else:
									the_post_thumbnail('post-'.$imgSize.'', array('class' => 'attachment-post-'.$imgSize.' wp-post-image img-fluid', 'title' => get_the_title()));
							 endif; ?>
			<?php	else: ?>
						<?php if( is_home() or is_front_page() or is_category()): ?>
							<figure>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<img src="https://placehold.it/930x593" class="attachment-post-<?php echo $imgSize; ?> wp-post-image img-fluid" alt="<?php _e('no picture','jbyalexa')?>"/>
								</a>
							</figure>
						<?php else: ?>
							<figure>
								<img src="https://placehold.it/930x593" class="attachment-post-<?php echo $imgSize; ?> wp-post-image img-fluid" alt="<?php _e('no picture','jbyalexa')?>"/>
							</figure>
				 		<?php	endif; ?>
			<?php endif; ?>

					<div class="post-meta group">
							<?php jbyalexa_posted_on(); ?>
					</div><!-- .entry-meta -->
				</div><!--/.post-thumbnail-->


					<div class="post-content entry-content">
					<h1 class="post-title entry-title">
						<?php if( is_home() or is_front_page() or is_category()): ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						<?php else:?>
							<?php the_title(); ?>
						<?php endif; ?>
					</h1><!--/.post-title-->

						<?php if( is_home() or is_front_page() or is_category()): ?>
						<div class="post-entry entry-excerpt">
							<?php    if( strpos( $post->post_content, '<!--more-->' ) ):
												        the_content();
												    else:
												        the_excerpt();
														endif;?>
						<?php else: ?>
							<div class="entry entry-fullcontent">
								<?php the_content(); ?>
						<?php endif; ?>
					</div><!--/.post-entry-->
			</div>
			</article>
