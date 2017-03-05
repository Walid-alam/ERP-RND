<?php get_header();

$theme_option=get_option('mistiri_theme_options');

?>

	<div class="breadcrumb-section image-bg">

        <div class="overlay"></div>

        <div class="breadcrumb-content">

            <div class="container text-center">

            	<?php $category = get_query_var('cat');

		            $categories = get_category($category);

		            ?>

                <h1><span><?php echo esc_attr($categories->name);?></span></h1>

                <p><?php echo esc_attr($categories->description);?></p>

            </div>

        </div><!-- breadcrumb content -->

    </div><!-- breadcrumb section --> 

    <div class="blog-section blog">

            <div class="container">

                <div class="blogNnews">

                	<?php 

                	$wp_query = new WP_Query(

                			array(

                				'post_type' => 'post',

                				'paged' => $paged,

                				)

                		);

                		$i=0;

                	if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();

                	

                	$date_post =  get_the_date();

                    $date = date_create($date_post);

                    $date_event = date_format($date, 'M-d-Y');

                    $arr = explode("-", $date_event);

                   	list($month, $day, $year) = $arr;

                	$i++;

                	?>

                	<?php if($i%2==0){?>

                	<div class="blog-content blog-two">

						<div class="row">

							<div class="col-md-6 no-padding">

								<div class="entry-post">

								   <div class="entry-title">

									   <h4><a href="<?php the_permalink();?>"><?php the_title();?> </a></h4>

								   </div> 

								   <div class="post-content">

										<div class="entry-meta">

											<ul class="list-inline">
												<?php if (is_sticky()) : ?>
											   	<li><i class="fa fa-sticky-note"></i><?php _e('Sticky', 'mistiri'); ?></li>
												<?php endif; ?>

											   <li><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>

											   <li><i class="fa fa-folder-o"></i><?php 

							                         $categories =  get_the_category_list( __( ', ','mistiri' ,get_the_ID()) );

							                         echo esc_attr( $categories );?>

							                    </li>

											   <li><a href="<?php the_permalink();?>"><i class="fa fa-comment-o"></i><?php comments_popup_link(__(' 0 comment','mistiri'),__(' 1 comment','mistiri'),__(' % comment','mistiri')); ?></a></li>

										   </ul>

										</div>								   

									   <div class="entry-summary">

											<p><?php echo mistiri_excerpt(37);?></p>

										   <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html__( 'Read More', 'mistiri' );?> <i class="fa fa-arrow-right"></i></a>

									   </div>								   

								   </div>

								</div><!-- entry-post -->

							</div>

							<div class="col-md-6 no-padding">

								<div class="blog-image">

									<div class="entry-thumbnail">

										<?php if(has_post_thumbnail()) : ?>

				                        	<img class="img-responsive" src="<?php the_post_thumbnail_url('post-thumb'); ?>" alt="">

				                      	<?php else : ?>

				                          	<?php if(isset($theme_option['blog_placeholder_img']) && !empty($theme_option['blog_placeholder_img'])) : ?>

				                          	<img class="img-responsive" src="<?php echo esc_attr($theme_option['blog_placeholder_img']['url']); ?>" alt="">

				                          	<?php endif; ?>

				                      	<?php endif; ?>

									</div>

									<div class="time">

										

										<h2><?php echo esc_attr($day );?> <span><?php echo esc_attr($month );?></span></h2>

									</div>

								</div> <!-- blog-image -->

							</div>                    

						</div><!-- row -->

					</div><!-- blog content -->

					<?php }else{?>

                    <div class="blog-content blog-one">

						<div class="row">

							<div class="col-md-6 no-padding">

								<div class="blog-image">

									<div class="entry-thumbnail">

										<?php if(has_post_thumbnail()) : ?>

				                        	<img class="img-responsive" src="<?php the_post_thumbnail_url('post-thumb'); ?>" alt="">

				                      	<?php else : ?>

				                          	<?php if(isset($theme_option['blog_placeholder_img']) && !empty($theme_option['blog_placeholder_img'])) : ?>

				                          	<img class="img-responsive" src="<?php echo esc_attr($theme_option['blog_placeholder_img']['url']); ?>" alt="">

				                          	<?php endif; ?>

				                      	<?php endif; ?>

									</div>

									<div class="time">

										<h2><?php echo esc_attr($day );?> <span><?php echo esc_attr($month );?></span></h2>

									</div>

								</div> <!-- blog-image -->

							</div>

							<div class="col-md-6 no-padding">

								<div class="entry-post">

									<div class="entry-title">

									   <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

									</div> 

									<div class="post-content">

										<div class="entry-meta">

											<ul class="list-inline">
												<?php if (is_sticky()) : ?>
											   	<li><i class="fa fa-sticky-note"></i><?php _e('Sticky', 'mistiri'); ?></li>
												<?php endif; ?>

											   	<li><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>

											   	<li><i class="fa fa-folder-o"></i>
											   	<?php 

							                         $categories =  get_the_category_list( __( ', ','mistiri' ,get_the_ID()) );

							                         echo esc_attr( $categories );
													?>

							                    </li>

											   <li><a href="<?php the_permalink();?>"><i class="fa fa-comment-o"></i><?php comments_popup_link(__(' 0 comment','mistiri'),__(' 1 comment','mistiri'),__(' % comment','mistiri')); ?></a></li>

										   </ul>

										</div>								   

									   <div class="entry-summary">

											<p><?php echo mistiri_excerpt(37);?></p>

										   <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html__( 'Read More', 'mistiri' );?> <i class="fa fa-arrow-right"></i></a>

									   </div>								   

								   </div>

								</div><!-- entry-post -->

							</div>

						</div><!-- row -->

					</div><!-- blog content -->

                   <?php }?>

					<?php endwhile;endif;?>

					<div class="prev-next">

						<?php  mistiri_pagination();?>

					</div><!-- prev next --> 

                </div><!-- blog content -->

            </div><!-- container -->

        </div><!-- blog section --> 

<?php get_footer();?>