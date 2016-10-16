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
							if( is_home() or is_front_page()): ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<img src="<?php the_post_thumbnail_url('post-big') ?>" class="attachment-post-big wp-post-image img-fluid"/>
								</a>
							<?php else:
								 the_post_thumbnail('post-big');
							 endif;
				else: ?>
						<?php if( is_home() or is_front_page()): ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<img src="https://placehold.it/930x593" class="attachment-post-big wp-post-image img-fluid" alt="<?php _e('no picture','jbyalexa')?>"/>
							</a>
						<?php else: ?>
							<img src="https://placehold.it/930x593" class="attachment-post-big wp-post-image img-fluid" alt="<?php _e('no picture','jbyalexa')?>"/>
				 		<?php	endif; ?>
			<?php endif; ?>

					<div class="post-meta group">
							<?php jbyalexa_posted_on(); ?>
					</div><!-- .entry-meta -->
				</div><!--/.post-thumbnail-->


					<div class="post-content entry-content">
					<h2 class="post-title entry-title">
							<?php if( is_home() or is_front_page()): ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						<?php else:?>
							<?php the_title(); ?>
						<?php endif; ?>
					</h2><!--/.post-title-->

						<?php 	if ( !is_single() ) : ?>
						<div class="post-entry entry-excerpt">
							<?php the_excerpt(); ?>
							<a href="<?php echo get_permalink(); ?>" class="read-more"><i class="icon-plus-button"></i><span><?php _e('Read next','jbyalexa');?></span></a>

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
