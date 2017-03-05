<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "mistiri_theme_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'mistiri_theme_options/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Mistiri Options', 'mistiri' ),
        'page_title'           => __( 'Mistiri Options', 'mistiri' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off'  => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'mistiri-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    // $args['admin_bar_links'][] = array(
    //     'id'    => 'redux-docs',
    //     'href'  => 'http://docs.reduxframework.com/',
    //     'title' => __( 'Documentation', 'redux-framework-demo' ),
    // );

    // $args['admin_bar_links'][] = array(
    //     //'id'    => 'redux-support',
    //     'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
    //     'title' => __( 'Support', 'redux-framework-demo' ),
    // );

    // $args['admin_bar_links'][] = array(
    //     'id'    => 'redux-extensions',
    //     'href'  => 'reduxframework.com/extensions',
    //     'title' => __( 'Extensions', 'redux-framework-demo' ),
    // );

    // // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    // $args['share_icons'][] = array(
    //     'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
    //     'title' => 'Visit us on GitHub',
    //     'icon'  => 'el el-github'
    //     //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
    //     'title' => 'Like us on Facebook',
    //     'icon'  => 'el el-facebook'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://twitter.com/reduxframework',
    //     'title' => 'Follow us on Twitter',
    //     'icon'  => 'el el-twitter'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://www.linkedin.com/company/redux-framework',
    //     'title' => 'Find us on LinkedIn',
    //     'icon'  => 'el el-linkedin'
    // );

    // Panel Intro text -> before the form
    // if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    //     if ( ! empty( $args['global_variable'] ) ) {
    //         $v = $args['global_variable'];
    //     } else {
    //         $v = str_replace( '-', '_', $args['opt_name'] );
    //     }
    //     $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    // } else {
    //     $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    // }

    // Add content after the form.
    //$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'mistiri' ),
        'id'               => 'basic',
        'desc'             => __( 'Setting for header!', 'mistiri' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-arrow-up'
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Logo', 'mistiri' ),
        'id'               => 'logo_header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Upload image logo ', 'mistiri' ),
        'fields'           => array(
            array(
                'id'       => 'logo_head',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload', 'mistiri' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload image size: 226x63', 'mistiri' ),
                'subtitle' => __( 'Upload image size: 226x63 ', 'mistiri' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/logo.png' ),
            ),
            array(
                'id'       => 'favicon',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload', 'mistiri' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload image size: 16x16', 'mistiri' ),
                'subtitle' => __( 'Upload image size: 16x16 ', 'mistiri' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/ico/favicon.ico' ),
            ),
            array(
                'id'       => 'email_mistiri',
                'type'     => 'text',
                'title'    => __( 'Email', 'mistiri' ),
                'subtitle' => __( 'Enter email', 'mistiri' ),
                'default'  => 'info@mistiricom'
            ),
                array(
                'id'       => 'phone_mistiri',
                'type'     => 'text',
                'title'    => __( 'Number phone', 'mistiri' ),
                'subtitle' => __( 'Enter number phone', 'mistiri' ),
                'default'  => '0880 123 45 56 89'
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Post Settings', 'mistiri' ),
        'id'               => 'post_settings',
        'desc'             => __( 'Settings for Post!', 'mistiri' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-th'
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Single Post', 'mistiri' ),
        'id'               => 'single_post_setting',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Single Post Settings', 'mistiri' ),
        'fields'           => array(
            // array(
            //     'id'       => 'placeholder_img',
            //     'type'     => 'media',
            //     'url'      => true,
            //     'title'    => __( 'Upload Placeholder Image', 'mistiri' ),
            //     'compiler' => 'true',
            //     //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            //     'desc'     => __( 'Upload image size: 1172x455', 'mistiri' ),
            //     'default'  => array( 'url' => get_template_directory_uri().'/images/blog/post-placeholder.png' ),
            // ),
            // array(
            //     'id'       => 'blog_placeholder_img',
            //     'type'     => 'media',
            //     'url'      => true,
            //     'title'    => __( 'Upload Blog Placeholder Image', 'mistiri' ),
            //     'compiler' => 'true',
            //     //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            //     'desc'     => __( 'Upload image size: 585x369', 'mistiri' ),
            //     'default'  => array( 'url' => get_template_directory_uri().'/images/blog/blog-placeholder.png' ),
            // ),
            array(
                'id'       => 'single_sidebar_position',
                'type'     => 'select',
                'title'    => 'Sidebar Position',
                'subtitle' => 'Select Sidebar Position for your single post',
                'options'  => array(
                    'no-sidebar'    => 'No Sidebars',
                    'left-sidebar'  => 'Left Sidebar',
                    'right-sidebar' => 'Right Sidebar',
                ),
                'default'  => 'no-sidebar',
                'select2'  => array( 'allowClear' => false )
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog Post', 'mistiri' ),
        'id'               => 'blog_post_setting',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Blog Settings', 'mistiri' ),
        'fields'           => array(
            array(
                'id'       => 'blog_page_title',
                'type'     => 'text',
                'title'    => __( 'Blog Page Banner Title', 'mistiri' ),
                'default'  => __('Blog & News', 'mistiri'),
            ),
            array(
                'id'       => 'blog_page_subtitle',
                'type'     => 'text',
                'title'    => __( 'Blog Page Banner Subtitle', 'mistiri' ),
                'default'  => __('The buildings we create inspire us, reflect who we are as a society.', 'mistiri'),
            ),
            array(
                'id'       => 'blog_page_bg_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload Banner Image', 'mistiri' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Preferred image size: 1915x1278', 'mistiri' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/bg/4.jpg' ),
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Project Settings', 'mistiri' ),
        'id'               => 'project_settings',
        'desc'             => __( 'Settings for Post!', 'mistiri' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-pencil'
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Single Project', 'mistiri' ),
        'id'               => 'single_project_setting',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Single Project Settings', 'mistiri' ),
        'fields'           => array(
            array(
                'id'       => 'project_banner_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload Default Banner Image', 'mistiri' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload image size: 1172x455', 'mistiri' ),
                //'default'  => array( 'url' => get_template_directory_uri().'/images/blog/post-placeholder.png' ),
            ),
            array(
                'id'       => 'project_banner_bgcolor',
                'type'     => 'color',
                'url'      => true,
                'title'    => __( 'Upload Default Banner Color', 'mistiri' ),
                'compiler' => 'true',
                'default'  => '#283949',
                'validate' => 'color',
            ),

        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Contact form', 'mistiri' ),
        'id'               => 'contact_setting',
        'desc'             => __( 'Setting for footer!', 'mistiri' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-envelope'
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Contact form', 'mistiri' ),
        'id'               => 'choose_form',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Contact form ', 'mistiri' ),
        'fields'           => array(             
            array(
                'id'       => 'contact_mistiri',
                'type'     => 'text',
                'title'    => __( 'Shortcode', 'mistiri' ),
                'subtitle' => __( 'Shortcode contact form', 'mistiri' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer', 'mistiri' ),
        'id'               => 'footer_setting',
        'desc'             => __( 'Setting for footer!', 'mistiri' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-arrow-down'
    ) );


   /*Redux::setSection( $opt_name, array(
        'title'      => __( 'Menu vertical', 'mistiri' ),
        'id'         => 'menu_select',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'select_showmwnu',
                'type'    => 'select',
                'title'   => __( 'Choose show menu vertical ', 'mistiri' ),
                'desc'    => __( 'Choose show menu vertical ', 'mistiri' ),
                //Must provide key => value pairs for multi checkbox options
                'options' => array(
                    'show' => 'Show',
                    'notshow' => 'Not show',
                ),
                'default' => 'notshow',
            ),
        )
    ));*/

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Branding', 'mistiri' ),
        'id'               => 'logobrand_footer',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Upload image brands', 'mistiri' ),
        'fields'           => array(
            array(
                'id'       => 'switch_branding_footer_section',
                'type'     => 'button_set',
                'title'    => __( 'Show/Hide Carousel on Footer ', 'mistiri' ),
                'desc'     => __( 'Switch to show/hide this branding section in footer.', 'mistiri' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '0' => 'No',
                    '1' => 'Yes'
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'switch_branding_singlepage_section',
                'type'     => 'button_set',
                'title'    => __( 'Show Carousel Only for Single Post', 'mistiri' ),
                'desc'     => __( 'Switch to show/hide this branding section only for Single Post', 'mistiri' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '0' => 'No',
                    '1' => 'Yes'
                ),
                'default'  => '0'
            ),
            array(
                'id'          => 'mistiri_brands',
                'type'        => 'slides',
                'title'       => __( 'Branding Carousel', 'mistiri' ),
                'subtitle'    => __( 'Unlimited images with drag and drop sortings.', 'mistiri' ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'mistiri' ),
                    'url'         => __( 'Give us a link!', 'mistiri' ),
                ),
            ),
            array(
                'id'       => 'logo_footer',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload', 'mistiri' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload image size: 226x63', 'mistiri' ),
                'subtitle' => __( 'Upload image size: 226x63 ', 'mistiri' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/logo.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Purchase Section', 'mistiri' ),
        'id'               => 'purchase_footer',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Purchase Section in footer', 'mistiri' ),
        'fields'           => array(
            array(
                'id'       => 'switch_purchase_section',
                'type'     => 'button_set',
                'title'    => __( 'Show/Hide Section', 'mistiri' ),
                'desc'     => __( 'Switch to show/hide this purchase section in footer.', 'mistiri' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '0' => 'No',
                    '1' => 'Yes'
                ),
                'default'  => '1'
            ),
             array(
                'id'       => 'switch_purchase_footer_homepage_section',
                'type'     => 'button_set',
                'title'    => __( 'Show purchase Only for Single Post', 'mistiri' ),
                'desc'     => __( 'Switch to show/hide this purchase section only for Single Post', 'mistiri' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '0' => 'No',
                    '1' => 'Yes'
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'footer_purchase',
                'type'     => 'text',
                'title'    => __( 'Title', 'mistiri' ),
                'subtitle' => __( 'Title Purchase' ),
                'default'  => 'Creative & Unique Architecture Building Agency Template'
            ),
           
            array(
                'id'          => 'subfooter_purchase',
                'type'     => 'text',
                'title'    => __( 'Subtitle', 'mistiri' ),
                'subtitle' => __( 'Subtitle Purchase' ),
                'default'  => 'Mistiri can be used for any type of construction website. complete package of mistiri. we hope that you will enjoy mistiri'
            ),
            array(
                'id'          => 'title_purchase',
                'type'     => 'text',
                'title'    => __( 'Purchase Button Text', 'mistiri' ),
                'subtitle' => __( 'Purchase button text' ),
                'default'  => 'PURCHASE NOW'
            ),
            array(
                'id'       => 'linkfooter_purchase',
                'type'     => 'text',
                'title'    => __( 'Purchase Button Link', 'mistiri' ),
                'default'  => '#'
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Callout #1', 'mistiri' ),
        'id'               => 'widget_footer_one',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Callout #1 Setting ', 'mistiri' ),
        'fields'           => array(
              array(
                'id'       => 'icon_widgetone',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload icon', 'mistiri' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload icon size: 56x56 .png', 'mistiri' ),
                'subtitle' => __( 'Upload image size: 56x56 ', 'mistiri' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/footer/1.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
                array(
                'id'       => 'title_footerwidgetone',
                'type'     => 'text',
                'title'    => __( 'Title', 'mistiri' ),
                'subtitle' => __( 'Title footerwidgetone' ),
                'default'  => 'Our location'
            ),
                array(
                'id'       => 'content_footerwidgetone',
                'title'    => __( 'Content footer widget one', 'mistiri' ),
                'type'       => 'editor',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                    ),
 
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Callout #2', 'mistiri' ),
        'id'               => 'widget_footer_two',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Callout #2 Setting', 'mistiri' ),
        'fields'           => array(
              array(
                'id'       => 'icon_widgettwo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload icon', 'mistiri' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload icon size: 56x56 .png', 'mistiri' ),
                'subtitle' => __( 'Upload image size: 56x56 ', 'mistiri' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/footer/2.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
                array(
                'id'       => 'title_footerwidgettwo',
                'type'     => 'text',
                'title'    => __( 'Title', 'mistiri' ),
                'subtitle' => __( 'Title footerwidgettwo' ),
                'default'  => 'Opening Hour'
            ),
                array(
                'id'       => 'content_footerwidgettwo',
                'title'    => __( 'Content footer widget two', 'mistiri' ),
                'type'       => 'editor',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                    ),
 
            ),
        )
    ));


    
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Callout #3', 'mistiri' ),
        'id'               => 'widget_footer_three',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Callout #3 Setting', 'mistiri' ),
        'fields'           => array(
              array(
                'id'       => 'icon_widgetthree',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload icon', 'mistiri' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload icon size: 56x56 .png', 'mistiri' ),
                'subtitle' => __( 'Upload image size: 56x56 ', 'mistiri' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/footer/3.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
                array(
                'id'       => 'title_footerwidgetthree',
                'type'     => 'text',
                'title'    => __( 'Title', 'mistiri' ),
                'subtitle' => __( 'Title footerwidgetthree' ),
                'default'  => 'Call Us Today'
            ),
                array(
                'id'       => 'content_footerwidgetthree',
                'title'    => __( 'Content footer widget three', 'mistiri' ),
                'type'       => 'editor',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                    ),
 
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Copyright', 'mistiri' ),
        'id'               => 'copy_right',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Upload image brands', 'mistiri' ),
        'fields'           => array(
              array(
                'id'       => 'html_copyright',
                'title'    => __( 'Enter copyright by default or html', 'mistiri' ),
                'type'       => 'editor',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                    ),
 
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social', 'mistiri' ),
        'id'               => 'social_footer',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Setting Social', 'mistiri' ),
        'fields'           => array(
                array(
                'id'       => 'twitter_footer',
                'type'     => 'text',
                'title'    => __( 'Twitter', 'mistiri' ),
                'subtitle' => __( 'Link to twitter' ),
                'default'  => '#'
            ),
               
                array(
                'id'       => 'linkedin_footer',
                'type'     => 'text',
                'title'    => __( 'LinkedIn', 'mistiri' ),
                'subtitle' => __( 'Link linkedin' ),
                'default'  => '#'
            ),
                 array(
                'id'       => 'fb_footer',
                'type'     => 'text',
                'title'    => __( 'Facebook', 'mistiri' ),
                'subtitle' => __( 'Link to facebook' ),
                'default'  => '#'
            ),
              array(
                'id'       => 'skype_footer',
                'type'     => 'text',
                'title'    => __( 'Skype', 'mistiri' ),
                'subtitle' => __( 'Link to skype' ),
                'default'  => '#'
            ),
              array(
                'id'       => 'pinterest_footer',
                'type'     => 'text',
                'title'    => __( 'Pinterest', 'mistiri' ),
                'subtitle' => __( 'Link to pinterest' ),
                'default'  => '#'
            ),
               array(
                'id'       => 'apple_footer',
                'type'     => 'text',
                'title'    => __( 'Apple', 'mistiri' ),
                'subtitle' => __( 'Link to apple' ),
                'default'  => '#'
            ),

        )
    )); 

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

