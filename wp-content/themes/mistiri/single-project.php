<?php get_header();
$theme_option=get_option('mistiri_theme_options');
?>
<?php if(have_posts()) : the_post();
$banner_image = get_post_meta(get_the_ID(), '_cmb_project_banner_image', true);
$title_project = get_post_meta(get_the_ID(), '_cmb_title_project', true);
$subtitle_project = get_post_meta(get_the_ID(), '_cmb_subtitle_project', true);
$client_project = get_post_meta(get_the_ID(), '_cmb_client_project', true);
$duration_project = get_post_meta(get_the_ID(), '_cmb_duration_project', true);
$totalcost_project = get_post_meta(get_the_ID(), '_cmb_totalcost_project', true);
$linkdownload_project = get_post_meta(get_the_ID(), '_cmb_linkdownload_project', true);
$share_project = get_post_meta(get_the_ID(), '_cmb_share_project', true);
   $date = date_create($duration_project);
  $date_event = date_format($date, 'M-d-Y');
$arr = explode("-", $date_event);
list($month, $day, $year) = $arr;
?>
<div class="breadcrumb-section image-bg" 
    <?php if(isset($banner_image) && !empty($banner_image)){?> style="background:url(<?php echo esc_url($banner_image);?>)" 

    <?php }elseif(isset($theme_option['project_banner_img']) && !empty($theme_option['project_banner_img']) && $theme_option['project_banner_img']['url']!='' ){ ?>
        style="background:url(<?php echo esc_url($theme_option['project_banner_img']['url']);?>)"
    <?php }elseif(isset($theme_option['project_banner_bgcolor']) && $theme_option['project_banner_bgcolor'] !=''){ 
             ?>
            style="background-color:<?php echo esc_url($theme_option['project_banner_bgcolor']);?>"
    <?php }else{} ?>>
    <div class="overlay"></div>
    <div class="breadcrumb-content">
        <div class="container text-center">
            <h1><?php echo esc_attr($title_project );?></h1>
            <p><?php echo esc_attr($subtitle_project );?></p>
        </div>
    </div><!-- breadcrumb content -->
</div><!-- breadcrumb section --> 

<div class="details-section section-padding">
            <div class="container">                  
                <div class="row">
                    <div class="col-md-8 col-sm-6">
						<div id="product-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								 <?php  $sliders = get_post_meta( get_the_ID(),'_cmb_slider', true );
			                         $img_slide  =  '' ;

                            $i=1;
                                foreach ( (array) $sliders as $key=>$slider ) :
                               
                                if ( isset( $slider['image_projects'] ) )
                                $img_slide =  $slider['image_projects'] ;
                           
                            	
                            ?>
								
								<div class="item <?php if($i==1){?>active<?php }else{}?>">
									<div class="carousel-image">
										<img class="img-responsive" src="<?php echo esc_url($img_slide);?>" alt="<?php the_title_attribute();?>">
									</div>
								</div>

								<?php 
									 $i++;
								endforeach;?>
							</div>
							<div class="carousel-controls">
								<ol class="carousel-indicators">
									<?php
											$img_slidesmall = '';
											$count = count($sliders);
											 $ii=1;
									 foreach ( $sliders as $key=>$slider_small ) :
                               
                                if ( isset( $slider_small['image_projects'] ) )
                                $img_slidesmall =  $slider_small['image_projects'] ;
                        
                            ?>
									<li data-target="#product-carousel" data-slide-to="<?php echo esc_attr($ii);?>" <?php if($ii==1){?>class="active"<?php }else{}?>>
										<img class="img-responsive" src="<?php echo esc_url($img_slidesmall);?>" alt="<?php the_title_attribute();?>" class="img-responsive">
									</li>
									
									<?php 
										 $ii++;
									endforeach;?>
								</ol>
								<div class="carousel-arrow">
									<a class="left" href="#product-carousel" role="button" data-slide="prev">
										<i class="fa fa-angle-left"></i>
									</a>
									<a class="right" href="#product-carousel" role="button" data-slide="next">
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
								
							</div>								
						</div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="details-info">
                            <h1><?php the_title();?></h1>
                            <p><?php the_content();?></p>
                            <div class="details-list">
                                <ul>
                                    <li>
                                        <p><?php echo esc_html__('Client:', 'mistiri' );?> <span><?php echo esc_attr($client_project);?></span></p>
                                    </li>
                                    <li>
                                        <p><?php echo esc_html__('Duration:', 'mistiri' );?> <span><?php echo esc_attr($day);?> <?php echo esc_attr($month);?>, <?php echo esc_attr($year );?></span></p>
                                    </li>
                                    <li>
                                        <p><?php echo esc_html__('Total Cost:', 'mistiri' );?> <span><?php echo esc_attr($totalcost_project);?></span></p>
                                    </li>
                                    <li>
                                        <p><?php echo esc_html__('Tags & Category:', 'mistiri' );?> <br>
										<?php $arr_map = array(
											'post_type' => 'project',
											'taxonomy' => 'project_category'
						 				);
						 				$terms = get_terms( $arr_map);
						 				 $separator = ', ';
                                			$tag_list  = '';
						 				 foreach ($terms as $term){
						 			
										$tag_list .= '<span class="cateagory"><a href="#">'.$term->name.'</a></span>'.$separator;
										}
											echo trim($tag_list, $separator);
										?>
                                    </li>
                                    <li>
                                    	<?php if($share_project){?>
                                        <div class="share-project">
                                            <p><?php echo esc_html__('Share this Project:', 'mistiri' );?></p> 
                                        </div>
                                        <ul class="details-social list-inline">
                                        	<?php 

					                            foreach ($share_project as $share) {
					                            	if(isset($share) && $share=='fb_post'){ ?>
					                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook"></i></a></li>
					                                <?php }else{}
					                                if(isset($share) && $share=='twitter'){ ?>
					                                    <li><a href="https://twitter.com/home?status=<?php the_permalink();?>"><i class="fa fa-twitter"></i></a></li>
					                                <?php }else{}
					                                if(isset($share) && $share=='googleplus'){ ?>
					                                    <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a></li>
					                                <?php }else{}
					                                if(isset($share) && $share=='mail'){ ?>
					                                    <li><a href="mailto:?<?php the_permalink();?>"><i class="fa fa-envelope"></i></a></li>
					                                <?php }else{}
					                               
					                              
					                            }

                                        	?>
                                        </ul>  
                                        <?php }?>                                      
                                    </li>
                                </ul>
                            </div>
							<a href="<?php echo esc_url($totalcost_project);?>" class="btn btn-primary"><?php echo esc_html__('Download Project Overview', 'mistiri' );?> <span><i class="fa fa-download"></i></span></a>
                        </div>
                    </div>           
                </div><!-- row --> 
                <div style="clear: both;"></div>
                <div class="row custom-nav-project">
                    <div class="prev-next">
                        <div class="row">
                        <?php 
                            $next_post = get_next_post();
                            $prev_post = get_previous_post();
                            ?>
                            <div class="col-xs-4">
                                <?php if (!empty( $prev_post )):  ?>                        
                                    <div class="prev">
                                        <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="fa fa-chevron-left"></i><?php echo esc_html__('previous', 'mistiri' );?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-xs-4">
                                <div class="indicator-icon text-center">
                                    <i class="fa fa-th-large" aria-hidden="true"></i>
                                </div>                        
                            </div>
                            <div class="col-xs-4">
                                <?php if (!empty( $next_post )):  ?>                        
                                    <div class="next">
                                        <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo esc_html__('next', 'mistiri');?><i class="fa fa-chevron-right"></i></a>
                                    </div>                        
                                <?php endif; ?>
                            </div>
                        </div>                        
                    </div>
                </div>                                        
            </div><!-- container -->            
        </div><!-- details section -->  

<?php endif;?>
<?php get_footer();?>