<?php
namespace HelloAcademy\Customizer\Section;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


use HelloAcademy\Customizer\Control\ToggleControl;
use HelloAcademy\Customizer\Control\RadioImageControl;
use HelloAcademy\Customizer\SectionBase;
use HelloAcademy\Interfaces\CustomizerSectionInterface;

class Header extends SectionBase implements CustomizerSectionInterface {

	public function __construct( $wp_customize ) {
		$this->regsiter_section( $wp_customize );
		$this->dispatch_settings( $wp_customize );
	}

	public function regsiter_section( $wp_customize ) {
		$wp_customize->add_section(
			'hello_academy_header_section',
			array(
				'title'    => __( 'Header', 'hello-academy' ),
				'priority' => 10,
				'panel'    => 'helloacademy',
			)
		);
	}

	public function dispatch_settings( $wp_customize ) {
		$wp_customize->selective_refresh->add_partial(
			'custom_logo',
			array(
				'selector'            => '.site-branding',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return the_custom_logo();
				},
			)
		);
		// Overriding default controls.
		$wp_customize->get_control( 'custom_logo' )->section   = 'hello_academy_header_section';
		$wp_customize->get_control( 'custom_logo' )->transport = 'postMessage';

		// Header Background Color.

		$wp_customize->add_setting(
			$this->get_style_settings_id( 'header_bg_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'header_bg_color' ),
			array(
				'selector'            => '.hello-academy-header',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'header_bg_color' ),
				array(
					'label'   => esc_html__( 'Header BG Color', 'hello-academy' ),
					'section' => 'hello_academy_header_section',
					'settings' => $this->get_style_settings_id( 'header_bg_color' ),
				)
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'header_bg_color' ),
			array(
				'selector'            => '.hello-academy-header',
				'container_inclusive' => true,
			)
		);

		// Header Menu Link Color.

		$wp_customize->add_setting(
			$this->get_style_settings_id( 'header_menu_link_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'header_menu_link_color' ),
			array(
				'selector'            => '.primary-navigation',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'header_menu_link_color' ),
				array(
					'label'   => esc_html__( 'Menu Link Color', 'hello-academy' ),
					'section' => 'hello_academy_header_section',
					'settings' => $this->get_style_settings_id( 'header_menu_link_color' ),
				)
			)
		);

		// Header Menu Link Active Color.

		$wp_customize->add_setting(
			$this->get_style_settings_id( 'header_menu_active_link_color' ),
			array(
				'title'             => esc_html__( 'Menu Link Active Color', 'hello-academy' ),
				'type'         => 'option',
				'default'           => '#7B68EE',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'header_menu_active_link_color' ),
				array(
					'label'   => esc_html__( 'Menu Link Active Color', 'hello-academy' ),
					'section' => 'hello_academy_header_section',
					'settings' => $this->get_style_settings_id( 'header_menu_active_link_color' ),
				)
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'header_menu_active_link_color' ),
			array(
				'selector'            => '.primary-navigation',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		// Header Menu Plus Icon Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'header_menu_icon_color' ),
			array(
				'title'             => esc_html__( 'Menu Plus Icon Color', 'hello-academy' ),
				'type'         => 'option',
				'default'           => '#7B68EE',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'header_menu_icon_color' ),
			array(
				'selector'            => '.primary-navigation',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'header_menu_icon_color' ),
				array(
					'label'   => esc_html__( 'Menu Icon Color', 'hello-academy' ),
					'section' => 'hello_academy_header_section',
					'settings' => $this->get_style_settings_id( 'header_menu_icon_color' ),
				)
			)
		);
	}

}
