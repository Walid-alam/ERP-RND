<?php

if ( post_password_required() )

    return;

?>

<?php if ( have_comments() ) : ?>



			

				 <h4><?php comments_popup_link(__('0 Comment:','mistiri'),__('1 Comment:','mistiri'),__('% Comments','mistiri')); ?></h4>

				



			<?php wp_list_comments('callback=mistiri_theme_comment'); ?>

			

		<?php

			// Are there comments to navigate through?

			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

		?>

			<nav class="navigation comment-navigation" role="navigation">		   

				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'mistiri' ) ); ?></div>

				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'mistiri' ) ); ?></div>

			</nav><!-- .comment-navigation -->

		<?php endif; // Check for comment navigation ?>



		<?php if ( ! comments_open() && get_comments_number() ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'mistiri' ); ?></p>

		<?php endif; ?>			

<?php endif; ?>		

		<!-- //COMMENTS -->



<!-- LEAVE A COMMENT -->

<div class="replay-box">

<?php

    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

        $aria_req = ( $req ? " aria-required='true'" : '' );

        $comment_args = array(

        		'id_form' => 'contact-form',

        		'class_form' => 'contact-form',                              

                'title_reply'=> '<h4>'.__('Leave a Replay','mistiri').'</h4>',

                'fields' => apply_filters( 'comment_form_default_fields', array(  

				'author' => '<div class="col-sm-4 custom-row"><div class="form-group"><i class="fa fa-user" aria-hidden="true"></i><input class="form-control" required="required" placeholder="'.__('Your Name','mistiri').'" type="text" value="" id="author" name="author"></div></div>',

                'email' => '<div class="col-sm-4 custom-row"><div class="form-group"><i class="fa fa-envelope-o" aria-hidden="true"></i><input class="form-control" required="required" placeholder="'.__('Enter email','mistiri').'" type="text" value="" id="email" name="email"></div></div>',      

                'url' => '<div class="col-sm-4 custom-row"><div class="form-group"><i class="fa fa-phone" aria-hidden="true"></i><input id="url" class="form-control" name="url" type="text" value="" required="required" placeholder="'.__('Web Address','mistiri').'"/></div></div>',                                                                  

                ) ),                                

                 'comment_field' => '<div class="col-sm-12 custom-row"><div class="form-group"><i class="fa fa-comments" aria-hidden="true"></i><textarea name="comment"'.$aria_req.' id="comment"  class="form-control" style="height:150px;" placeholder="'.__('Comment','mistiri').'"></textarea></div></div>',                                                   

                 

                 'label_submit' => __('Comment','mistiri'),

                 'class_submit' => 'fa fa-arrow-right',

                 'comment_notes_before' => '',

                 'comment_notes_after' => '',               

        )

    ?>

    <?php comment_form($comment_args); ?>   

    </div>