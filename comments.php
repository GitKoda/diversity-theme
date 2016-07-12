<?php

/*
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
*/

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/

if(post_password_required()){
	return;
}

//comment form $args
$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = ($reqEmail ? " aria-required='true'" : '');

$commentFormArgs = array(
	'class_submit' => 'submit btn btn-primary',
	'comment_notes_before' =>
		'<p class="comment-notes">' . __( 'Your email address will not be published. ' ) . ( $req ? 'Required fields are marked<span class="form-required"> *</span>' : '' ) . '</p>',
	'comment_field' =>
		'<div class="form-group comment-form-comment">
			<label for="comment">'. _x( 'Comment', 'noun' ) .'</label>
			<textarea id="comment" class="form-control" name="comment" placeholder="Write your comment..." cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea>
		</div>',
		'cancel_reply_before' => '<div>',
		'cancel_reply_after' => '</div>',
	    'cancel_reply_link' => '<i class="fa fa-close"></i> Cancel reply',
  	'fields' => array(
		'author' =>
			'<div class="form-group comment-form-author">
		  		<label for="author">' . __( 'Name', 'domainreference' ) . ( $req ? '<span class="form-required"> *</span>' : '' ) . '</label>
				<input class="form-control" id="author" name="author" placeholder="Your name" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' required/>
			</div>',
		'email' =>
			'<div class="form-group comment-form-email">
		  		<label for="email">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="form-required"> *</span>' : '' ) . '</label>
				<input class="form-control" id="email" name="email" placeholder="Your email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . $aria_req . ' required/>
			</div>',
		'url' =>
			'<div class="form-group comment-form-url">
				<label for="url">' . __( 'Website', 'domainreference' ) . '</label>' . 
				'<input class="form-control" id="url" name="url" type="text" placeholder="Your website" value="' . esc_attr( $commenter['comment_author_url'] ) . '"/>
			</div>',
		'comment_notes_after' =>
			''
		)
);

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

?>
     
<div id="comments" class="comments-area">
	
	<?php if (have_comments()) : ?>
		<h3 class="text-center">Comments</h3>
		<ul class="comment-list">
		<?php wp_list_comments(array(
    		'callback' => 'custom_comments',
			'format' => 'html5',
    		'style' => 'ul',
			'avatar_size' => 96
		));
		?>
       </ul>
       <?php dspc_comment_nav(); ?>
	<?php endif; // have_comments() ?>
     
    <?php //If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
     	<p class="no-comments"><?php _e( 'Comments are closed.', 'dspc' ); ?></p>
	<?php endif; ?>
      
    <?php comment_form($commentFormArgs); ?>
</div>