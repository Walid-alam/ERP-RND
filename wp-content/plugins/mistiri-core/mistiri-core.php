<?php
/**
* Plugin Name: Mistiri Core
* Plugin URI: http://themeregion.com/
* Description: Core functionalities of Mistiri theme. The theme's functionalities depends on this plugin.
* Version:  1.0
* Author: Theme Region
* Author URI: http://themeregion.com/
* License:  GPL2
*/

// Define Constants
defined( 'TR_ROOT' ) or define( 'TR_ROOT', dirname( __FILE__ ) );
defined( 'TR_VERSION' ) or define( 'TR_VERSION', '1.0' );

if ( ! class_exists( 'Mistiri_Core' ) ) {

	class Mistiri_Core {

		public function mistiri_load_theme_backbone() {
			require_once TR_ROOT . '/theme-option/ReduxCore/framework.php';
			require_once TR_ROOT . '/theme-option/options.php';
			require_once TR_ROOT . '/custom-post-type/mistiri_post_type.php';
			require_once TR_ROOT . '/metaboxes/init.php';
			require_once TR_ROOT . '/metaboxes/functions.php';
		}

		public function mistiri_load_shortcodes() {

			if ( class_exists( 'Vc_Manager' ) ) {
				require_once TR_ROOT . '/custom-visual/shortcode.php';
				require_once TR_ROOT . '/custom-visual/vc-shortcode.php';
			}

		}
	}

	$core = new Mistiri_Core;
	$core->mistiri_load_theme_backbone();
	$core->mistiri_load_shortcodes();
}