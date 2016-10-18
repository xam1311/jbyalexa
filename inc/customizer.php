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
	<a href="'.get_permalink($post->ID).'" class="read-more" title="'.__('Read next','jbyalexa').' '.get_the_title($post->ID).' "><i class="icon-plus-button"></i><span>'.__('Read next','jbyalexa').'</span></a></p>';

}
add_filter('excerpt_more', 'new_excerpt_more');
