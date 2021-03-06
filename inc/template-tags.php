<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Jbyalexa
 */

if ( ! function_exists( 'jbyalexa_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function jbyalexa_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'jbyalexa' ),
		$time_string
	);
	$comments_count = wp_count_comments(get_the_ID());

	echo '<span class="meta-posted"><i class="icon-time"></i>' . $posted_on . '</span>';
	echo '<span class="meta-categories">';
	foreach((get_the_category()) as $category):
		$category_link = get_category_link( $category->cat_ID);
		echo '<a href="'.esc_url( $category_link ).'" title="'.__('Click to see post from','jbyalexa').' '.$category->cat_name.'">'. $category->cat_name.' </a>';

	endforeach;

	echo '</span>';
	echo '<span class="meta-comments">';
	echo '<a href="'.get_comments_link().'" title="'.__('Please comment !','jbyalexa').'"><i class="icon-communication"></i> ' . $comments_count->approved . '</span></a>';

}
endif;

if ( ! function_exists( 'jbyalexa_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function jbyalexa_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'jbyalexa' ) );
		if ( $categories_list && jbyalexa_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'jbyalexa' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'jbyalexa' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'jbyalexa' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'jbyalexa' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'jbyalexa' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function jbyalexa_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'jbyalexa_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'jbyalexa_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so jbyalexa_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so jbyalexa_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in jbyalexa_categorized_blog.
 */
function jbyalexa_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'jbyalexa_categories' );
}
add_action( 'edit_category', 'jbyalexa_category_transient_flusher' );
add_action( 'save_post',     'jbyalexa_category_transient_flusher' );
