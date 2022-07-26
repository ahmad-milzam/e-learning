<?php
namespace HelloAcademy\Customizer\Style;

use HelloAcademy\Interfaces\DynamicStyleInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Footer extends Base implements DynamicStyleInterface {
	public static function get_css() {
		$css = '';
		$settings = self::get_settings();

		// Footer Color Options.
		$footer_bg_color = ( isset( $settings['footer_bg_color'] ) ? $settings['footer_bg_color'] : '' );
		$footer_widget_bg_color = ( isset( $settings['footer_widget_bg_color'] ) ? $settings['footer_widget_bg_color'] : '' );
		$footer_widget_text_color = ( isset( $settings['footer_widget_text_color'] ) ? $settings['footer_widget_text_color'] : '' );
		$footer_copyright_bg_color = ( isset( $settings['footer_copyright_bg_color'] ) ? $settings['footer_copyright_bg_color'] : '' );
		$footer_copyright_text_color = ( isset( $settings['footer_copyright_text_color'] ) ? $settings['footer_copyright_text_color'] : '' );

		if ( $footer_bg_color ) {
			$css .= ".hello-academy-footer {
                background-color: $footer_bg_color;
            }";
		}

		if ( $footer_widget_bg_color ) {
			$css .= ".hello-academy-footer .academy-widgets {
                background-color: $footer_widget_bg_color;
            }";
		}

		if ( $footer_widget_text_color ) {
			$css .= ".hello-academy-footer .academy-widgets {
                color: $footer_widget_bg_color;
            }";
		}

		if ( $footer_copyright_bg_color ) {
			$css .= ".hello-academy-footer .footer-copyright {
                background-color: $footer_copyright_bg_color;
            }";
		}

		if ( $footer_copyright_text_color ) {
			$css .= ".hello-academy-footer .footer-copyright {
                color: $footer_copyright_text_color;
            }";
		}

		return $css;
	}
}
