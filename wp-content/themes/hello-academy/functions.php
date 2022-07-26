<?php
/**
 * Hello Academy theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HelloAcademy
 * @since 1.0.0
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define Constants
 */
define( 'HELLO_ACADEMY_THEME_VERSION', '1.0.9' );
define( 'HELLO_ACADEMY_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'HELLO_ACADEMY_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Require autoload File
 */
require_once HELLO_ACADEMY_THEME_DIR . 'includes/autoload.php';

/**
 * Require Main Functions File
 */
require_once HELLO_ACADEMY_THEME_DIR . 'includes/functions.php';

/**
 * Require Main Hooks File
 */
require_once HELLO_ACADEMY_THEME_DIR . 'includes/hooks.php';

/**
 * Require Customizer Class
 */
require_once HELLO_ACADEMY_THEME_DIR . 'includes/customizer.php';

/**
 * Content width
 */
$GLOBALS['content_width'] = apply_filters( 'helloacademy/content_width', HelloAcademy\get_customizer_settings( 'content_width', 1140 ) );
