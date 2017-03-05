<?php 

get_header();
$theme_option=get_option('mistiri_theme_options');

if(have_posts()) : the_post();
$image_title = get_post_meta(get_the_ID(), '_cmb_image_title', true);
$title_post = get_post_meta(get_the_ID(), '_cmb_title_post', true);
$subtitle_post = get_post_meta(get_the_ID(), '_cmb_subtitle_post', true);
$share_posts = get_post_meta(get_the_ID(), '_cmb_share_post', true);
$user_job = get_post_meta(get_the_ID(), '_cmb_user_job', true);
?>
<?php if(isset($title_post) && $title_post != '') : ?>
<div class="breadcrumb-section image-bg" <?php if(!empty($image_title)){?> style="background:url(<?php echo esc_url($image_title);?>)" <?php }else{}?> >
    <div class="overlay"></div>
    <div class="breadcrumb-content">
        <div class="container text-center">
            <h1><?php if(isset($title_post) && $title_post != '') echo htmlspecialchars_decode($title_post); else ''; ?></h1>
            <p><?php echo esc_attr($subtitle_post);?></p>
        </div>
    </div><!-- breadcrumb content -->
</div><!-- breadcrumb section -->
<?php endif; ?>

<div class="blog-details">
    <div class="container">
        <?php if( isset($theme_option['single_sidebar_position']) && ($theme_option['single_sidebar_position'] == "left-sidebar") ) :  ?>
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'single_sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'single_sidebar' ); ?>
                <?php endif; ?>                                    
            </div>
        <?php endif; ?>

        <?php if( isset($theme_option['single_sidebar_position']) && ($theme_option['single_sidebar_position'] == "no-sidebar") ) : ?>
        <div class="col-md-12">
        <?php else : ?>
        <div class="col-md-9">
        <?php endif;?>
        <div class="blog-content">
			<div class="blog-image">
				<div class="entry-thumbnail">
                    <?php $url_thumpost = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                    <?php if(isset($url_thumpost) && $url_thumpost != '') : ?>
					   <img class="img-responsive" src="<?php echo esc_url($url_thumpost);?>" alt="">
                    <?php endif; ?>
				</div>
				<div class="time">
                    <?php 
                        $date_post =  get_the_date();
                        $date = date_create($date_post);
                        $date_event = date_format($date, 'M-d-Y');
                        $arr = explode("-", $date_event);

                        list($month, $day, $year) = $arr;
                        $y = substr($year, -2);
                    ?>
					<h2><?php echo esc_attr($day);?> <span><?php echo esc_attr($month);?></span></h2>
				</div>
			</div> <!-- blog-image -->

            <div class="entry-title">
			   <h3><?php the_title();?></h3>
			</div> 

			<div class="entry-meta">
				<ul>
				   <li><?php echo esc_html__('By','mistiri');?> <?php the_author_posts_link(); ?></li>
				   <li><a href="#"><?php echo esc_html__('@','mistiri');?> <?php echo esc_attr($day );?> <?php echo esc_attr($month );?>&#39;<?php echo esc_attr($y);?></a></li>
				   <li><?php echo esc_html__('Category:','mistiri');?><?php 
                         $categories =  get_the_category( get_the_ID(), 'mistiri' );
                         foreach ($categories as $cat){?>
                        <a  href="<?php echo get_category_link($cat->cat_ID); ?> ">
                            <?php echo esc_attr($cat->cat_name); ?> </a>
                            <?php }?>
                    </li>
                    <li><?php echo esc_html__('Tags:','mistiri');?> <?php 
                         $tags =  get_the_tags( get_the_ID(), 'mistiri' );
                         if(!empty($tags)){
                         foreach ($tags as $tag){?>
                            <a href="<?php echo get_tag_link($tag->term_id); ?> ">
                                <?php echo esc_attr($tag->name); ?> </a>
                            <?php }
                        }?>
                    </li>
			   </ul>
			</div>	

			<div class="post-content">
                <?php the_content();
                wp_link_pages();?>
            </div>

            <div class="share-social">
                <div class="row">
                    <div class="post-tags">
						<span><i class="fa fa-tag"></i></span>
                            <?php 
                            $tags_array = get_tags(get_the_ID(), 'mistiri' ); 
                            $separator = ', ';
                            $tag_list  = '';
                            if ($tags_array) {
                                foreach($tags_array as $tag) { 
                                    $tag_list .= '<span><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a></span>'.$separator;
                                }
                                echo trim($tag_list, $separator);
                            }
                            ?>                  						
                    </div>

                    <ul class="social pull-right">
                         <?php if($share_posts){?>
                        <li><?php echo esc_html__('Share:', 'mistiri' );?></li>
                        <?php                       

                            foreach ($share_posts as $share_post) {
                                if(isset($share_post) && $share_post=='googleplus'){
                                    echo "<li><a href='https://plus.google.com/share?url=".get_permalink()."'><i class='fa fa-google-plus'></i></a></li>";
                                }else{}
                                if(isset($share_post) && $share_post=='fb_post'){
                                    echo "<li><a href='https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>'><i class='fa fa-facebook'></i></a></li>";
                                }else{}
                                if(isset($share_post) && $share_post=='twitter'){
                                    echo "<li><a href='https://twitter.com/home?status=<?php the_permalink();?>'><i class='fa fa-twitter'></i></a></li>";
                                }else{}
                                if(isset($share_post) && $share_post=='pinterest'){
                                    echo "<li><a href='https://pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink();?>'><i class='fa fa-pinterest-p'></i></a></li>";
                                }else{}
                                 if(isset($share_post) && $share_post=='linkedIn'){
                                    echo "<li><a href='https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=<?php the_permalink();?>'><i class='fa fa-linkedin'></i></a></li>";
                                }else{}
                                if(isset($share_post) && $share_post=='vimeo'){
                                    echo "<li><a href='<?php the_permalink();?>'><i class='fa fa-vimeo'></i></a></li>";
                                }else{}                             
                            }
                        }
                        ?>                       
                    </ul>                              
                </div>
            </div><!-- share social -->

            <div class="prev-next">
                <?php 
                    $next_post = get_next_post();
                    $prev_post = get_previous_post();
                if (!empty( $prev_post )): 
                ?>

                <div class="prev">
                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="fa fa-chevron-left"></i><?php echo esc_html__('previous post', 'mistiri' );?></a>
                </div>
                <?php endif;
                     if (!empty( $next_post )): 
                ?>
                <div class="next">
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo esc_html__('next post', 'mistiri');?><i class="fa fa-chevron-right"></i></a>
                </div>
                <?php endif;?>
            </div><!-- prev next -->  
            
            <?php if(get_the_author_meta('description') != '') { ?>
            <div class="post-author">
                <div class="author-image">
                    <?php 
                        $email  = get_the_author_meta( 'user_email' );
                        $default = "http://www.gravatar.com/avatar/279aa12c3326f87c460aa4f31d18a065";
                        $size = 122;
                        $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
                    ?>
                    <img class="img-responsive" src="<?php echo esc_url($grav_url );?>" alt="Image">
                </div>

                <div class="post-author-info">
                    
                    <?php if($user_info){?>
                    <h4><?php echo esc_attr($user_info->nickname); ?></h4>
                    <h5><?php echo esc_attr($user_job );?></h5>
                    <p><?php echo esc_attr($user_info->description);?></p>
                    <?php }else{}?>
                </div>
            </div>          
            <?php } ?>
            <div class="comments-area"> 
                  <?php comments_template(); ?>
            </div>
        </div> 

        <?php if( isset($theme_option['single_sidebar_position']) && ($theme_option['single_sidebar_position'] == "no-sidebar") ) : ?>

                </div>

                <?php else : ?>

                </div>

            <?php endif;?>



        <?php if( isset($theme_option['single_sidebar_position']) && ($theme_option['single_sidebar_position'] == "right-sidebar") ) : ?>
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'single_sidebar' ) ) : ?>
                     <?php dynamic_sidebar( 'single_sidebar' ); ?>
                <?php  endif; ?>                        
            </div>
        <?php endif; ?> 
    </div><!-- container -->
</div><!-- blog post -->                                 



<?php endif;?>

<?php get_footer();?>