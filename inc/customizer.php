<?php
/**
 * Jbyalexa Theme Customizer.
 *
 * @package Jbyalexa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jbyalexa_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'jbyalexa_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jbyalexa_customize_preview_js() {
	wp_enqueue_script( 'jbyalexa_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'jbyalexa_customize_preview_js' );


function new_excerpt_more($more) {
	global $post;
	return '<p>
	<a href="'.get_permalink().'" class="read-more" title="'.__('Read next','jbyalexa').' '.get_the_title().' "><i class="icon-plus-button"></i><span>'.__('Read next','jbyalexa').'</span></a></p>';

}
add_filter('excerpt_more', 'new_excerpt_more');

function modify_read_more_link() {
    return '<p><a href="'.get_permalink().'" class="read-more" title="'.__('Read next','jbyalexa').' '.get_the_title().' "><i class="icon-plus-button"></i><span>'.__('Read next','jbyalexa').'</span></a></p>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

function wpb_move_comment_field_to_bottom( $fields ) {

		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
		}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );
