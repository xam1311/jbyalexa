<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jbyalexa
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="col-lg-12 col-md-12 col-xs-12" id="comments">


<div class="comments-form clearfix">
<?php

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$comment_args = array( 'title_reply'=>'<i class="icon-communication"></i>'.__('Got Something To Say','jbyalexa'),

												'fields' => apply_filters( 'comment_form_default_fields', array(

												'author' => '<div class="form-group">' . '<label for="author">' . __( 'Your Name','jbyalexa' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .

												        '<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" ' . $aria_req . '/></form>',

												    'email'  => '<p class="comment-form-email">' .

												                '<label for="email">' . __( 'Email','jbyalexa' ) . '</label> ' .

												                ( $req ? '<span>*</span>' : '' ) .

												                '<input id="email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . ' />'.'</p>',

												    'url'    => '' ) ),

														'id_form'           => 'commentform',
													  'class_form'      => 'comment-form',
														'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
												    'comment_field' => '<div class="form-group">' .

												                '<label for="comment">' . __( 'Your comment', 'jbyalexa' ) . '</label>' .

												                '<textarea id="comment" name="comment" class="form-control" cols="45" rows="8" ' . $aria_req . ' ></textarea>' .

												                '</div>',

												    'comment_notes_after' => '',
														'logged_in_as' => '<p class="logged-in-as">' .
																						    sprintf(
																						    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ,'jbyalexa' ),
																						      admin_url( 'profile.php' ),
																						      $user_identity,
																						      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
																						    ) . '</p>',
														'label_submit'=> __('Post a comment','jbyalexa'),
														'class_submit' => 'btn btn-primary',
      );


comment_form($comment_args); ?>
</div><!-- fin de div comments-form -->
<?php
if ( have_comments() ) : ?>
<div class="comments-area">


		<h2 class="comments-title"><i class="icon-communication"></i>
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'jbyalexa' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'jbyalexa' ); ?></h2>
		<div class="nav-links">

			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'jbyalexa' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'jbyalexa' ) ); ?></div>

		</div><!-- .nav-links -->
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			/*wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'reply_text'=>__('Reply','jbyalexa'),
			) );*/
		?>

		<?php wp_list_comments( 'type=comment&callback=jbyalexa_comment' ); ?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'jbyalexa' ); ?></h2>
		<div class="nav-links">

			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'jbyalexa' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'jbyalexa' ) ); ?></div>

		</div><!-- .nav-links -->
	</nav><!-- #comment-nav-below -->
	<?php
	endif; // Check for comment navigation.

endif; // Check for have_comments().

?>
</div><!-- Fin de div comments-area-->
<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'jbyalexa' ); ?></p>

<?php endif; ?>

</div><!-- fin de la div col-->
