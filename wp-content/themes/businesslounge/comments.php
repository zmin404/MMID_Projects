<?php /* based on twentyten comment template*/ ?>
<div id="comments" class="rtframework_comments rt_form">
<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'businesslounge' ); ?></p>
		</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
 

			<h6 id="comments-title"><?php echo (get_comments_number() == 1) ? esc_html__('One Comment' , 'businesslounge') : sprintf( esc_html__('%s Comments' , 'businesslounge') , get_comments_number() ); ?></h6>								

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use twentyten_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define twentyten_comment() and that will be used instead.
					 * See twentyten_comment() in twentyten/functions.php for more.
					 */
					wp_list_comments(  					
                                array(
                                'walker'            => null,
                                'style'             => 'ul',
                                'callback'          => "rtframework_comments", 
                                'type'              => 'all',  
                                'avatar_size'       => 68,
                                )
					); 
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation clearfix">
				<?php if( get_previous_comments_link() ):?>
					<div class="nav-previous button_border"><span class="meta-nav">&larr; </span><?php echo get_previous_comments_link( esc_html__( 'Older Comments', 'businesslounge' ) ); ?></div>
				<?php endif;?>


				<?php if( get_next_comments_link() ):?>
					<div class="nav-next button_border"><?php next_comments_link( esc_html__( 'Newer Comments ', 'businesslounge' ) ); ?><span class="meta-nav"> &rarr;</span></div>
				<?php endif;?>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>


		<?php if ( ! comments_open() ) :?>
		<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'businesslounge' ); ?></p>
		<?php endif; // end ! comments_open() ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
?> 
			
<?php endif; // end have_comments() ?>


<?php  
//text fields
$commnet_author = ( $commenter['comment_author'] ) ?  esc_attr( $commenter['comment_author'] )  : "";
$commnet_author_email = ( $commenter['comment_author_email'] ) ?  esc_attr( $commenter['comment_author_email'] )  : "";
$comment_author_url = ( $commenter['comment_author_url'] ) ?  esc_attr( $commenter['comment_author_url'] )  : "";

$aria_req = "";

$fields =  array(
	'author' => '<li class="comment-form-author">'.
	            '<input id="author" name="author" tabindex="2" type="text" placeholder="' . esc_html__('Name','businesslounge') . ( $req ? ' *' : '' ) . '" value="' . esc_attr($commnet_author) . '" size="30"' . $aria_req . ' />'.
	            '</li>',

	'email' => '<li class="comment-form-email">'.
	            '<input id="email" name="email" tabindex="3" type="email" placeholder="' . esc_html__('Email','businesslounge') . ( $req ? ' *' : '' ) . '" value="' . esc_attr($commnet_author_email) . '" size="30"' . $aria_req . ' />'.
	            '</li>',


	'url' => '<li class="comment-form-url ">'.
	            '<input id="url" name="url" tabindex="4" type="text" placeholder="' . esc_html__('Website','businesslounge') . '" value="' . esc_url($comment_author_url) . '" size="30" />'.
	            '</li>',

);
 
//comment form args

$comments_args = array( 	
	'comment_field'        => '<div class="text-boxes comment-line"><ul><li><textarea tabindex="1" class="comment_textarea" rows="4" id="comment" name="comment" placeholder="'. esc_html__('Comment','businesslounge') .' *"></textarea></li></ul></div>',
	'id_form'              => 'commentform', 
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	'id_submit'            => 'submit',
	'title_reply'          => esc_html__( 'Leave a Reply' ,'businesslounge'),
	'title_reply_to'       => esc_html__( 'Leave a Reply to %s' ,'businesslounge'),
	'cancel_reply_link'    => esc_html__( 'Cancel reply' ,'businesslounge'),
	'label_submit'         => esc_html__( 'Post Comment','businesslounge' ),
	'comment_notes_after' => ""
);
comment_form( $comments_args, $post->ID );

?> 

</div><!-- #comments -->