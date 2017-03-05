<?php

require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';

// Load theme domain
function mistiri_load_theme_textdomain() {
    load_theme_textdomain( 'mistiri', get_template_directory_uri() . '/languages/' );
}
add_action( 'after_setup_theme', 'mistiri_load_theme_textdomain' );

require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';


//Theme Set up:
function mistiri_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * standard" posts and pages.
     */
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    add_theme_support ('title-tag');
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'mistiri-post-thumb', 585, 369, true );

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // Switches default core markup for search form, comment form, and comments
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list','gallery', ) );

    //Post formats
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => 'Primary Navigation Menu (Use For All Page)',
    ) );

    // This theme uses its own gallery styles.
    add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'mistiri_theme_setup' );

if ( ! isset( $content_width ) ) $content_width = 900;

// Reqire File Style and JS
function mistiri_theme_scripts_styles(){

    /**** Theme Specific CSS ****/
    $protocol = is_ssl() ? 'https' : 'http';

    wp_enqueue_style( 'mistiri-bootstrap-style', get_template_directory_uri() .'/css/bootstrap.min.css',array(),true,false);
    wp_enqueue_style( 'mistiri-font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css',array(),true,false);
    wp_enqueue_style( 'mistiri-style' , get_stylesheet_uri(),array(),'2018-09-04');
    wp_enqueue_style( 'mistiri-animate', get_template_directory_uri() .'/css/animate.css',array(),true,false);
    wp_enqueue_style( 'mistiri-magnific-popup', get_template_directory_uri() .'/css/magnific-popup.css',array(),true,false);
    wp_enqueue_style( 'mistiri-carousel', get_template_directory_uri() .'/css/owl.carousel.css',array(),true,false);
    wp_enqueue_style( 'mistiri-main', get_template_directory_uri() .'/css/main.css',array(),true,false);
    wp_enqueue_style( 'mistiri-responsive', get_template_directory_uri() .'/css/responsive.css',array(),true,false);

    /**** Start Jquery ****/
    wp_enqueue_script("mistiri-modernizr", get_template_directory_uri()."/js/modernizr.min.js",array( 'jquery' ),false,true);
    wp_enqueue_script("mistiri-bootstrap-jquery", get_template_directory_uri()."/js/bootstrap.min.js",array( 'jquery' ),false,true);
    wp_enqueue_script("mistiri-scrollUp", get_template_directory_uri()."/js/jquery.scrollUp.min.js",array( 'jquery' ),false,true);

    wp_enqueue_script("mistiri-owl", get_template_directory_uri()."/js/owl.carousel.min.js",array( 'jquery' ),false,true);
    wp_enqueue_script("mistiri-isotope", get_template_directory_uri()."/js/isotope.pkgd.min.js",array( 'jquery' ),false,true);
    wp_enqueue_script("mistiri-magnific-jquery", get_template_directory_uri()."/js/magnific-popup.min.js",array( 'jquery' ),false,true);
    wp_enqueue_script("mistiri-inview", get_template_directory_uri()."/js/inview.min.js",array( 'jquery' ),false,true);
    wp_enqueue_script("mistiri-map-api", "http://maps.google.com/maps/api/js",array(),false,true);
    wp_enqueue_script("mistiri-gmaps", get_template_directory_uri()."/js/gmaps.min.js",array(),false,true);
    wp_enqueue_script("mistiri-custom", get_template_directory_uri()."/js/custom.js",array( 'jquery' ),'1.0',true);
}
add_action( 'wp_enqueue_scripts', 'mistiri_theme_scripts_styles' );



// Comment Form

function mistiri_theme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
        <div class="post-comment" id="li-comment-<?php comment_ID() ?>">
            <div class="post-nfo">
                <div class="commenter-info">
                    <p>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Your comment is awaiting moderation.', 'mistiri') ?></em>
                    <?php else: ?>
                        <?php comment_text() ?>
                    <?php endif;?>
                    </p>
                    <a class="commenter-avatar" href="#">
                        <?php echo get_avatar($comment,$size='50')?>
                    </a>
                </div>
                <div class="media-body">
                    <div class="media-inner">
                        <h5><?php printf(__('%s','mistiri'), get_comment_author_link()) ?></h5>
                        <p class="date"><?php echo esc_html__( 'Posted on', 'mistiri' );?> <?php echo get_comment_date("M d, Y  g:i a"); ?></p>
                        <a href="#" class="reply">
                    <?php 
                        comment_reply_link( array_merge( $args, array( 
                            'reply_text' => 'Reply',
                            'after' => ' <span></span>', 
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'] 
                        ) ) ); 
                    ?>              
                    </a>
                    </div>
                    <?php
                        $args = array(
                            'before' => '<a href="#" class="btn btn-primary">',
                            'after' => '<i class="fa fa-arrow-right"></i></a>',
                            );
                     echo comment_reply_link($comment, $args, $depth);?>
                </div>
            </div>
        </div><!-- post-comment -->
<?php 
}

function mistiri_comment_form_submit_button($button) {
    $button =
    '<button type="submit" class="btn btn-primary">Comment<i class="fa fa-arrow-right"></i>s</button>' . //Add your html codes here
    get_comment_id_fields();
    return $button;
}
add_filter('comment_form_submit_button', 'mistiri_comment_form_submit_button');



function mistiri_widgets_init() {

    // sidebar in single blog
    register_sidebar( array(
        'name'          => esc_html__( 'Footer one', 'mistiri' ),
        'id'            => 'footer_one',
        'class'         => 'widget',
        'description'   => esc_html__( 'Main sidebar that appears on the footer.', 'mistiri' ),
        'before_widget' => '<div class="widget-wrapper %2$s">',
        'after_widget'  => '</div><div class="separator-sidebar"></div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar', 'mistiri' ),
        'id'            => 'single_sidebar',
        'description'   => __( 'Main sidebar that appears on the Single Post.', 'mistiri' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mistiri_widgets_init' );

// This theme uses its own gallery styles.
function mistiri_breadcrumbs() {
       // / === OPTIONS === /
    $text['home']     = esc_html__('Home','mistiri'); // text for the 'Home' link
    $text['category'] = esc_html__('Archive by Category "%s"','mistiri'); // text for a category page
    $text['tax']      = esc_html__('Archive for "%s"','mistiri'); // text for a taxonomy page
    $text['search']   = esc_html__('Search Results for "%s" Query','mistiri'); // text for a search results page
    $text['tag']      = esc_html__('Posts Tagged "%s"','mistiri'); // text for a tag page
    $text['author']   = esc_html__('Articles Posted by %s','mistiri'); // text for an author page
    $text['404']      = esc_html__('Error 404','mistiri'); // text for the 404 page
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = '<li class="active">'; // tag before the current crumb
    $after       = '</li>'; // tag after the current crumb
    // / === END OF OPTIONS === /

    global $post;

    $homeLink = home_url() . '/';
    $linkBefore = '<li>';
    $linkAfter = '</li>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter; 

    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<ul><li><a href="' . $homeLink . '" class="pathway">' . $text['home'] . '</a></li></ul>';
    } else {
        echo '<ul>' . sprintf($link, $homeLink, $text['home']) . $delimiter; 
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo esc_attr($cats);
            }
            echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo esc_attr($cats);
            }
            echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
        }elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo $delimiter;
            }
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
        } elseif ( is_404() ) {
            echo $before . esc_attr($text['404']) . $after;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</ul>';
    }
}

// Custom Excerpt
function mistiri_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'.';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function mistiri_pagination() {
    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;


    /** Add the pages around the current page to the array */
    if ( $paged >= 2 ) {
        $links[] = $paged - 1;
    }

    if ( ( $paged + 1 ) <= $max ) {
        $links[] = $paged + 1;
    }

    /** Previous Post Link */
    if ( get_previous_posts_link() && $paged >= 2)
        printf( '<div class="prev">%s</div>' . "\n", get_previous_posts_link('<i class="fa fa-chevron-left"></i>previous') );

    if ( $paged == 1 )
        printf( '<div class="next">%s</div>' . "\n", get_next_posts_link('next<i class="fa fa-chevron-right"></i>') );
    //     $class = $paged == $max ? ' class="active"' : '';
    /** Next Post Link */
    if ( get_next_posts_link() && $paged >= 2)
       printf( '<div class="next">%s</div>' . "\n", get_next_posts_link('next<i class="fa fa-chevron-right"></i>') );
}



function mistiri_add_menu_icons_styles(){
?>
<style> #adminmenu .menu-icon-project div.wp-menu-image:before { content: "\f107"; } </style>
<?php
}
add_action( 'admin_head', 'mistiri_add_menu_icons_styles' );


/* Visual Composer */
function mistiri_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }

    if($tag=='vc_column' || $tag=='vc_column_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    return $class_string;
}

// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'mistiri_custom_css_classes_for_vc_row_and_vc_column', 10, 2);
if(function_exists('vc_add_param')){
    vc_add_param('vc_row',array(
        "type" => "dropdown",
        "heading" => esc_html__('Full width', 'mistiri'),
        "param_name" => "full_width",
        "value" => array(
                esc_html__('No', 'mistiri') => 'no',  
                esc_html__('Yes', 'mistiri') => 'yes',
                esc_html__('Full with overlay background', 'mistiri') => 'overlay_bg'),
        "description" => esc_html__("Full width or not", 'mistiri'),
        )
    );

    vc_add_param('vc_row',array(
        "type" => "textfield",
        "heading" => esc_html__('Id of Content ', 'mistiri'),
        "param_name" => "id_section",
        "value" => "",
        "description" => esc_html__("Set Id Content", 'mistiri'),   
        )
    );

    vc_add_param('vc_row',array(
        "type" => "textfield",
        "heading" => esc_html__('Class of Content', 'mistiri'),
        "param_name" => "class_section",
        "description" => esc_html__("Set Class Content", 'mistiri'),     
        ) 
    );

    vc_add_param('vc_row',array(
        "type" => "attach_image",
        "heading" => __('Background Image', 'mistiri'),
        "param_name" => "bg_image_custom",
        "description" => __("Image header Port", 'mistiri'),
        )
    );
}

//TGMPA activation
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'mistiri_theme_register_required_plugins' );

function mistiri_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(  
            'name'               => esc_html__('WPBakery Visual Composer','mistiri'), // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => esc_url( 'http://plugins.themeregion.com/playbit/js_composer.zip' ),
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(
            'name'               => esc_html__('Mistiri Core','mistiri'), // The plugin name.
            'slug'               => 'mistiri-core', // The plugin slug (typically the folder name).
            'source'             => esc_url( 'plugins.themeregion.com/mistiri/mistiri-core.zip' ),
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(
            'name'      => esc_html__('Contact Form 7','mistiri'),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__('Regenerate Thumbnails','mistiri'),
            'slug'      => 'regenerate-thumbnails',
            'required'  => true,
        ),
    );

    $config = array(

        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(

            'page_title'                      => esc_html__( 'Install Required Plugins', 'mistiri' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'mistiri' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'mistiri' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'mistiri' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'mistiri' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'mistiri' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'mistiri' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'mistiri' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'mistiri' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'mistiri' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'mistiri' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'mistiri' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'mistiri' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'mistiri' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'mistiri' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'mistiri' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'mistiri' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );

}

function mistiri_search_form( $form ) {

    $form = '<form id="searchform" class="search-form" method = "POST" action = "' . home_url( '/' ) .'">
        <div class="form-input">
            <input type="text" id="s" name = "s" placeholder="Search..." value= "' . get_search_query() . '">
            <input type="submit" id="searchsubmit" value="Search">
        </div>
    </form>' ;

    return $form;
}
add_filter( 'get_search_form', 'mistiri_search_form' );