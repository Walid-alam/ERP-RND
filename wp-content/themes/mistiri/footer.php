<?php $theme_option = get_option('mistiri_theme_options');?>

<?php if(isset($theme_option['switch_branding_footer_section']) && ($theme_option['switch_branding_footer_section'] == 1)) : ?>
    <?php if(isset($theme_option['switch_branding_singlepage_section']) && ($theme_option['switch_branding_singlepage_section'] == 1)) : ?>
        <?php if( is_single() ) : ?>
            <div class="clients-section image-bg">
                <div class="overlay"></div>
                <div id="footer-brand-carousel" class="brand-item">
                    <?php if(isset($theme_option['mistiri_brands']) && !empty($theme_option['mistiri_brands'])){
                             foreach($theme_option['mistiri_brands'] as $slide) {?>

                    <div class="brand-image">
                        <a href="<?php echo ( isset($slide['url']) && !empty($slide['url']) ) ? $slide['url'] : "#"; ?>" target="_blank">
                            <img class="img-responsive" src="<?php echo esc_attr($slide['image'] );?>" alt="<?php echo esc_attr( $slide['title'] );?>">
                        </a>  
                    </div>
                    <?php 
                }
                }?>
                </div>     
            </div><!-- brands -->
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<?php if(isset($theme_option['switch_purchase_section']) && ($theme_option['switch_purchase_section'] == 1)) : ?>
    <?php if(isset($theme_option['switch_purchase_footer_homepage_section']) && ($theme_option['switch_purchase_footer_homepage_section'] == 1)) : ?>
            <?php if( is_single() ): ?> 

                <div class="coll-to-action">
                    <div class="container">
                        <div class="row">
                            <div class="brand-info">
                                <h3>
                                <?php if(isset($theme_option['footer_purchase']) && !empty($theme_option['footer_purchase'])){?>
                                    <?php echo esc_attr($theme_option['footer_purchase']);}?>
                            </h3>
                                <p> <?php if(isset($theme_option['subfooter_purchase']) && !empty($theme_option['subfooter_purchase'])){?>
                                    <?php echo esc_attr($theme_option['subfooter_purchase']);}?></p>                            
                            </div>
                            <div class="brand-button">
                                <a href="<?php if(isset($theme_option['linkfooter_purchase']) && !empty($theme_option['linkfooter_purchase'])){?>
                                    <?php echo esc_url($theme_option['linkfooter_purchase']);}?>" class="btn btn-primary">
                                        <?php 
                                            if(isset($theme_option['title_purchase']) && !empty($theme_option['title_purchase'])){
                                                echo esc_attr($theme_option['title_purchase']);?> <span><i class="fa fa-arrow-right"></i></span>
                                        <?php } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

        <footer class="footer">
            <div class="contact-section">
                <div class="container">
                <?php if ( !empty( $theme_option['title_footerwidgetone'] ) || !empty( $theme_option['title_footerwidgettwo'] ) || !empty( $theme_option['title_footerwidgetthree'] ) ) : ?>
                    <div class="row">
                        <div class="col-sm-4 no-padding">
                            <div class="contact-info left-contact">
                                <div class="contact-image image-box ">
                                    <?php if(isset($theme_option['icon_widgetone']['url']) && !empty($theme_option['icon_widgetone']['url'])){?>
                                    <img class="img-responsive" src="<?php echo esc_url($theme_option['icon_widgetone']['url']);?>" alt="Image">
                                    <?php }?>
                                </div>
                                <div class="box-title">
                                    <h3>
                                        <?php if(isset($theme_option['title_footerwidgetone']) && !empty($theme_option['title_footerwidgetone'])){
                                            echo esc_attr($theme_option['title_footerwidgetone']); }?>
                                    </h3>
                                     <?php if(isset($theme_option['content_footerwidgetone']) && !empty($theme_option['content_footerwidgetone'])){
                                            echo htmlspecialchars_decode($theme_option['content_footerwidgetone']); }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <div class="contact-info opening-hour">
                                <div class="contact-image image-box">
                                    <?php if(isset($theme_option['icon_widgettwo']['url']) && !empty($theme_option['icon_widgettwo']['url'])){?>
                                    <img class="img-responsive" src="<?php echo esc_url($theme_option['icon_widgettwo']['url']);?>" alt="Image">
                                    <?php }?>
                                </div>
                                <div class="box-title">
                                    <h3><?php if(isset($theme_option['title_footerwidgettwo']) && !empty($theme_option['title_footerwidgettwo'])){
                                            echo esc_attr($theme_option['title_footerwidgettwo']); }?></h3>
                                    <?php if(isset($theme_option['content_footerwidgettwo']) && !empty($theme_option['content_footerwidgettwo'])){
                                            echo htmlspecialchars_decode($theme_option['content_footerwidgettwo']); }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <div class="contact-info right-contact">
                                <div class="contact-image image-box">
                                    <?php if(isset($theme_option['icon_widgetthree']['url']) && !empty($theme_option['icon_widgetthree']['url'])){?>
                                    <img class="img-responsive" src="<?php echo esc_url($theme_option['icon_widgetthree']['url']);?>" alt="Image">
                                    <?php }?>
                                </div>
                                <div class="box-title">
                                    <h3><?php if(isset($theme_option['title_footerwidgetthree']) && !empty($theme_option['title_footerwidgetthree'])){
                                            echo esc_attr($theme_option['title_footerwidgetthree']); }?></h3>
                                    <?php if(isset($theme_option['content_footerwidgetthree']) && !empty($theme_option['content_footerwidgetthree'])){
                                            echo htmlspecialchars_decode($theme_option['content_footerwidgetthree']); }?>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                <?php endif; ?>
                    <div class="row">
                        <div class="footer-logo text-center">
                            
                            <?php if(isset($theme_option['logo_footer']) && !empty($theme_option['logo_footer'])){?>
                                           
                            <a href="<?php echo get_home_url(); ?>"><img class="img-responsive" src="<?php echo esc_url($theme_option['logo_footer']['url']);?>" alt="Logo"></a>
                                  <?php }?>

                        </div>
                    </div>                        
                </div><!-- container -->
            </div><!-- contact informetion -->

            <div class="footer-bottom">
                <div class="container">
                    <div class="col-sm-6 copyright-text">
                        <?php 
                        if(isset($theme_option['html_copyright']) && !empty($theme_option['html_copyright'])){
                            echo htmlspecialchars_decode($theme_option['html_copyright']); 
                        }
                        ?>
                    </div>

                    <div class="col-sm-6">
                        <ul class="footer-social list-inline">
                        <?php if(isset($theme_option['twitter_footer']) && !empty($theme_option['twitter_footer'])) : ?>
                            <li><a href="<?php echo esc_url($theme_option['twitter_footer']); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if(isset($theme_option['linkedin_footer']) && !empty($theme_option['linkedin_footer'])) : ?>
                            <li><a href="<?php echo esc_url($theme_option['linkedin_footer']); ?>"><i class="fa fa-linkedin-square"></i></a></li>
                        <?php endif; ?>
                        <?php if(isset($theme_option['fb_footer']) && !empty($theme_option['fb_footer'])) : ?>
                            <li><a href="<?php echo esc_url($theme_option['fb_footer']); ?>"><i class="fa fa-facebook-square"></i></a></li>
                        <?php endif; ?>
                        <?php if(isset($theme_option['fb_footer']) && !empty($theme_option['fb_footer'])) : ?>
                            <li><a href="<?php echo esc_url($theme_option['skype_footer']); ?>"><i class="fa fa-skype"></i></a></li>
                        <?php endif; ?>
                        <?php if(isset($theme_option['pinterest_footer']) && !empty($theme_option['pinterest_footer'])) : ?>
                            <li><a href="<?php echo esc_url($theme_option['pinterest_footer']); ?>"><i class="fa fa-pinterest-square"></i></a></li>
                        <?php endif; ?>
                        <?php if(isset($theme_option['apple_footer']) && !empty($theme_option['apple_footer'])) : ?>
                            <li><a href="<?php echo esc_url($theme_option['apple_footer']); ?>"><i class="fa fa-apple"></i></a></li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div><!-- footer bottom -->
        </footer><!-- footer --> 

		<?php if(isset($theme_option['select_showmwnu']) && !empty($theme_option['select_showmwnu'])){ 

                    if($theme_option['select_showmwnu']=='show'){
            ?>
                                            
		<!--/Preset Style Chooser--> 
		<div class="demo-chooser">
			<div class="demo-chooser-inner">
				<a href="#" class="toggler"><i class="fa fa-life-ring fa-spin"></i></a>
				<h4><?php echo esc_html__( "Other's Pages", 'mistiri' );?></h4>
                <?php   

                $second = array(

                    'theme_location'  => 'second',

                    'menu'            => '',

                    'menu_class'      => 'demo-list clearfix',

                    'container'       => '',

                    'container_class' => '',

                    );

                if ( has_nav_menu( 'second' ) ) {

                        wp_nav_menu( $second );

                    }

                    

                ?>
				
			</div>
		</div>
		<!--/End:Preset Style Chooser-->
    <?php  }else{}
	 }?>
		
        <!-- script -->
      <?php wp_footer();?>
    </body>
</html>    