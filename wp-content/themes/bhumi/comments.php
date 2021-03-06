<?php if ( post_password_required() ) : ?>
	<p><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'bhumi' ); ?></p>
	<?php return; endif; ?>
    <?php if ( have_comments() ) : ?>
			<div class="bhumi_comment_section">
			<div class="bhumi_comment_title"><h3><i class="fa fa-comments"></i><?php echo comments_number(__('No Comments','bhumi'), __('1 Comment','bhumi'), '% Comments'); ?></h3></div>
			<?php wp_list_comments( array( 'callback' => 'bhumi_comment' ) ); ?>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
					<nav id="comment-nav-below">
						<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'bhumi' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bhumi' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bhumi' ) ); ?></div>
					</nav>
				<?php endif;  ?>
			</div>
	<?php endif; ?>
<?php if ( comments_open() ) : ?>
		<div class="bhumi_comment_form_section">
			<?php $fields=array(
				'author' => '<div class="bhumi_form_group"><label for="exampleInputEmail1">'. __( 'Name','bhumi').'<small>*</small></label><input name="author" id="name" type="text" id="exampleInputEmail1" class="bhumi_con_input_control"></div>',
				'email' => '<div class="bhumi_form_group"><label for="exampleInputPassword1">'. __( 'Email','bhumi').'<small>*</small></label><input  name="email" id="email" type="text" class="bhumi_con_input_control"></div>',
			);

				$defaults = array(
				'fields'=> apply_filters( 'cpm_comment_form_default_fields', $fields ),
				'comment_field'=> '<div class="bhumi_form_group"><label for="message"> Message *</label>
				<textarea id="comment" name="comment" class="bhumi_con_textarea_control" rows="5"></textarea></div>',
				'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ",'bhumi' ).'<a href="'. esc_url(admin_url( 'profile.php' )).'">'.$user_identity.'</a>'. '<a href="'. esc_url(wp_logout_url( get_permalink() )).'" title="Log out of this account">'.__(" Log out?",'bhumi').'</a>' . '</p>',
				'title_reply_to' => __( 'Leave a Reply to %s','bhumi'),
				'id_submit' => 'bhumi_send_button',
				'label_submit'=>__( 'Post Comment','bhumi'),
				'comment_notes_before'=> '',
				'comment_notes_after'=>'',
				'title_reply'=> '<h2>'.__('Leave a Reply','bhumi').'</h2>',
				'role_form'=> 'form',
				);
				comment_form($defaults); ?>
		</div>
<?php endif; // If registration required and not logged in ?>