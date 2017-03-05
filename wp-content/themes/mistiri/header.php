<!DOCTYPE html>

<html <?php language_attributes(); ?>>
    <?php $theme_option = get_option('mistiri_theme_options');?>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel="shortcut-icon" href="<?php if(isset($theme_option['favicon']) && !empty($theme_option['favicon'])){ echo esc_attr($theme_option['favicon']['url']);  } ?>"> 

        <!-- CSS -->
       <?php wp_head();?>
    </head>

<body <?php body_class(); ?>>
    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                    <?php if(isset($theme_option['email_mistiri']) && !empty($theme_option['email_mistiri'])) : ?>
                        <div class="info-box">
                            <span class="icon-left"><i class="fa fa-envelope"></i></span>
                            <a href="mailto:<?php echo esc_attr($theme_option['email_mistiri']); ?>"><?php echo esc_attr($theme_option['email_mistiri']); ?></a>
                        </div>
                    <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                    <?php if(isset($theme_option['phone_mistiri']) && !empty($theme_option['phone_mistiri'])) : ?>
                        <div class="info-box pull-right">
                            <span><?php echo esc_attr($theme_option['phone_mistiri']); ?></span>
                            <span class="icon-right"><i class="fa fa-phone"></i></span>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div><!-- container -->
        </div><!-- top-bar -->            

        <div class="main-menu menu-two">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php if(isset($theme_option['logo_head']['url']) && !empty($theme_option['logo_head']['url'])) : ?>
                            <a class="logo" href="<?php echo get_home_url(); ?>"><img class="img-responsive"  src="<?php echo esc_url($theme_option['logo_head']['url']);?>" alt=""></a>
                        <?php else: ?>
                            <h1 class="site-title"><a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php endif; ?>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <?php  
                            $primary = array(
                                'theme_location'  => 'primary',
                                'menu'            => '',
                                'menu_class'      => 'nav navbar-nav',
                                'container'       => '',
                                'container_class' => '',
                                'walker'          => new wp_bootstrap_navwalker()
                            );

                            if ( has_nav_menu( 'primary' ) ) {
                                wp_nav_menu( $primary );
                            }
                       ?>
                    </div>
                </div><!-- container -->
            </nav><!-- navbar -->
        </div><!-- main menu -->
    </header><!-- Header -->