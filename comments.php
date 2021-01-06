<?php
global $sparta;
if ( post_password_required() ) {
	return;
}
?>
<div class="colorpack-<?= $sparta['comments_colorpack']; ?>">
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Response on &ldquo;%s&rdquo;', 'comments title', 'sparta' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s response on &ldquo;%2$s&rdquo;',
							'%1$s responses on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'sparta'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>
		<div class="comment_nav">
			<?php the_comments_navigation(array('screen_reader_text' => 'Comments Navigation', )); ?>
		</div>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 150,
				) );
			?>
		</ol><!-- .comment-list -->
		<div class="clearfix"></div>
		<div class="comment_nav">
			<?php the_comments_navigation(); ?>
		</div>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'sparta' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
            'class_form'        =>  'comment-form form-group',
            'class_submit'      =>  'btn btn-primary',
            'comment_field'     => "<textarea class='form-control comment_form' id='comment' name='comment' aria-required='true' placeholder='".__('Comment *', 'sparta')."'></textarea>",
            'fields'    =>  array(
            'author'    =>  "<input class='form-control' id='author' name='author' type='text' size='30' maxlength='245' aria-required='true' required='required' placeholder='".__('Name *', 'sparta')."'>",
            'email'    =>  "<input id='email' name='email' type='text' size='30' maxlength='100' aria-describedby='email-notes' aria-required='true' required='required' placeholder='".__('Email *', 'sparta')."' class='form-control'>",
            'url'    =>  "<input id='url' name='url' type='text' size='30' maxlength='200' placeholder='".__('Website', 'sparta')."' class='form-control'>"
        )
		) );
	?>

</div><!-- .comments-area -->
</div>