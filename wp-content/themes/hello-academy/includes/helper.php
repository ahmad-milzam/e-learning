<?php
namespace HelloAcademy;

class Helper {

	public static function maybe_update_theme_version_in_db() {
		$hello_academy_theme_version = 'hello_academy_theme_version';
		$hello_academy_theme_db_version = get_option( $hello_academy_theme_version );
		if ( ! $hello_academy_theme_db_version || version_compare( $hello_academy_theme_db_version, HELLO_ACADEMY_THEME_VERSION, '<' ) ) {
			update_option( $hello_academy_theme_version, HELLO_ACADEMY_THEME_VERSION );
		}
	}

	public static function theme_web_fonts_url( $font ) {
		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'hello-academy' ) ) {
			$font_url = add_query_arg( 'family', $font, '//fonts.googleapis.com/css2' );
		}

		return $font_url;
	}

	public static function get_post_meta_status() {
		return (bool) get_customizer_settings( 'enable_post_meta' );
	}

	public static function minify_css( $css ) {
		$css = preg_replace( '/\/\*((?!\*\/).)*\*\//', '', $css );
		$css = preg_replace( '/\s{2,}/', ' ', $css );
		$css = preg_replace( '/\s*([:;{}])\s*/', '$1', $css );
		$css = preg_replace( '/;}/', '}', $css );
		return $css;
	}

	public static function is_plugin_installed( $basename ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			include_once ABSPATH . '/wp-admin/includes/plugin.php';
		}
		$installed_plugins = get_plugins();
		return isset( $installed_plugins[ $basename ] );
	}
}
