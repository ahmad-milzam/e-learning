<?php
namespace HelloAcademy;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Customizer {

	public static function init() {
		$self = new self();
		$self->register_control();
		$self->enqueue_assets();
		$self->dispatch_hook();
	}

	public function register_control() {
		$register = new Customizer\Register();
		add_action( 'customize_register', array( $register, 'add_panel' ) );
		add_action( 'customize_register', array( $register, 'add_sections' ) );
	}

	public function enqueue_assets() {
		$assets = new Customizer\Assets();
		add_action( 'customize_preview_init', array( $assets, 'enqueue_customize_preview' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $assets, 'enqueue_scripts' ) );
		add_action( 'customize_controls_print_scripts', array( $assets, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'styles_loaded' ) );
	}

	public function dispatch_hook() {
		add_action( 'customize_save_after', array( $this, 'clear_cache' ) );
	}

	public function get_dynamic_css() {
		$customizer_css = '';
		$customizer_css  .= Customizer\Style\Color::get_css();
		$customizer_css  .= Customizer\Style\Misc::get_css();
		$customizer_css  .= Customizer\Style\Header::get_css();
		$customizer_css  .= Customizer\Style\Footer::get_css();
		return \HelloAcademy\Helper::minify_css( $customizer_css );
	}

	public function styles_loaded() {
		global $wp_customize;
		$customizer_css = '';
		if ( isset( $wp_customize ) ) {
			$customizer_css = $this->get_dynamic_css();
		} else {
			$customizer_css = get_theme_mod( 'hello_academy_dynamic_css', false );
			if ( false === $customizer_css ) {
				$customizer_css = $this->get_dynamic_css();
				set_theme_mod( 'hello_academy_dynamic_css', $customizer_css );
			}
		}
		wp_add_inline_style( 'hello-academy-theme-style', $customizer_css );
	}

	public function clear_cache() {
		remove_theme_mod( 'hello_academy_dynamic_css' );
	}
}
Customizer::init();
