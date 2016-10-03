<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jbyalexa
 */

?>
<?php if($count_loop == 2): ?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-xs-12">
<?php endif; ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<picture>
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

				<div class="entry-content">
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jbyalexa' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jbyalexa' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php jbyalexa_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

	<?php if($count_loop == 2 ): ?>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12">
	<?php endif; ?>

<?php if($count_loop == 3): ?>	
</div><!-- fin de la row de deux-->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
<?php endif; ?>
