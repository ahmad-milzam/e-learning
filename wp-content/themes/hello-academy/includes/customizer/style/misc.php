<?php
namespace HelloAcademy\Customizer\Style;

use HelloAcademy\Interfaces\DynamicStyleInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Misc extends Base implements DynamicStyleInterface {
	public static function get_css() {
		$css = '';
		$settings = self::get_settings();

		// Container Width
		$content_width = ( isset( $settings['content_width'] ) ? $settings['content_width'] . 'px' : '' );

		if ( $content_width ) {
			$css .= ".hello-academy-content .academy-container {
                width: $content_width;
            }";
		}

		return $css;
	}
}
