<?php
namespace HelloAcademy\Customizer\Style;

use HelloAcademy\Interfaces\DynamicStyleInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Header extends Base implements DynamicStyleInterface {
	public static function get_css() {
		$css = '';
		$settings = self::get_settings();

		// Header Color Options.
		$header_bg_color = ( isset( $settings['header_bg_color'] ) ? $settings['header_bg_color'] : '' );
		$header_menu_link_color = ( isset( $settings['header_menu_link_color'] ) ? $settings['header_menu_link_color'] : '' );
		$header_menu_active_link_color = ( isset( $settings['header_menu_active_link_color'] ) ? $settings['header_menu_active_link_color'] : '' );
		$header_menu_icon_color = ( isset( $settings['header_menu_icon_color'] ) ? $settings['header_menu_icon_color'] : '' );

		if ( $header_bg_color ) {
			$css .= ".hello-academy-header {
                background-color: $header_bg_color;
            }";
		}

		if ( $header_menu_link_color ) {
			$css .= ".primary-navigation ul li a {
                color: $header_menu_link_color;
            }";
		}

		if ( $header_menu_active_link_color ) {
			$css .= ".primary-navigation ul .current-menu-item a {
                color: $header_menu_active_link_color;
            }";
		}

		if ( $header_menu_icon_color ) {
			$css .= ".primary-navigation ul li.menu-item-has-children > a:after {
                border-color: $header_menu_icon_color;
            }";
		}

		return $css;
	}
}
