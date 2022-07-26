<?php
namespace HelloAcademy\Customizer\Section;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


use HelloAcademy\Customizer\SectionBase;
use HelloAcademy\Interfaces\CustomizerSectionInterface;

class Footer extends SectionBase implements CustomizerSectionInterface {

	public function __construct( $wp_customize ) {
		$this->regsiter_section( $wp_customize );
		$this->dispatch_settings( $wp_customize );
	}

	public function regsiter_section( $wp_customize ) {
		$wp_customize->add_section(
			'hello_academy_footer_section',
			array(
				'title'    => __( 'Footer', 'hello-academy' ),
				'priority' => 10,
				'panel'    => 'helloacademy',
			)
		);
	}

	public function dispatch_settings( $wp_customize ) {

		// Footer Background Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'footer_bg_color' ),
			array(
				'title'             => esc_html__( 'Footer BG Color', 'hello-academy' ),
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'footer_bg_color' ),
				array(
					'label'   => esc_html__( 'Footer BG Color', 'hello-academy' ),
					'section' => 'hello_academy_footer_section',
					'settings' => $this->get_style_settings_id( 'footer_bg_color' ),
				)
			)
		);

		// Widget Background Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'footer_widget_bg_color' ),
			array(
				'title'             => esc_html__( 'Widget BG Color', 'hello-academy' ),
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'footer_widget_bg_color' ),
				array(
					'label'   => esc_html__( 'Widget BG Color', 'hello-academy' ),
					'section' => 'hello_academy_footer_section',
					'settings' => $this->get_style_settings_id( 'footer_widget_bg_color' ),
				)
			)
		);

		// Widget Text Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'footer_widget_text_color' ),
			array(
				'title'             => esc_html__( 'Widget Text Color', 'hello-academy' ),
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'footer_widget_text_color' ),
				array(
					'label'   => esc_html__( 'Widget Text Color', 'hello-academy' ),
					'section' => 'hello_academy_footer_section',
					'settings' => $this->get_style_settings_id( 'footer_widget_text_color' ),
				)
			)
		);

		// Copyright Background Color.

		$wp_customize->add_setting(
			$this->get_style_settings_id( 'footer_copyright_bg_color' ),
			array(
				'title'             => esc_html__( 'Copyright BG Color', 'hello-academy' ),
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'footer_copyright_bg_color' ),
				array(
					'label'   => esc_html__( 'Copyright BG Color', 'hello-academy' ),
					'section' => 'hello_academy_footer_section',
					'settings' => $this->get_style_settings_id( 'footer_copyright_bg_color' ),
				)
			)
		);

		// Copyright Text Color.

		$wp_customize->add_setting(
			$this->get_style_settings_id( 'footer_copyright_text_color' ),
			array(
				'title'             => esc_html__( 'Copyright Text Color', 'hello-academy' ),
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'footer_copyright_text_color' ),
				array(
					'label'   => esc_html__( 'Copyright Text Color', 'hello-academy' ),
					'section' => 'hello_academy_footer_section',
					'settings' => $this->get_style_settings_id( 'footer_copyright_text_color' ),
				)
			)
		);

		// Copyright Text.

		$wp_customize->add_setting(
			$this->get_settings_id( 'footer_copyright_text' ),
			array(
				'default'           => esc_html__( 'Copyright 2021 Academy LMS. All Rights Reserved', 'hello-academy' ),
				'type'         => 'option',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);

		$wp_customize->add_control(
			$this->get_settings_id( 'footer_copyright_text' ),
			array(
				'section' => 'hello_academy_footer_section',
				'label'   => esc_html__( 'Footer Copyright Text', 'hello-academy' ),
				'type'     => 'textarea',
				'settings' => $this->get_settings_id( 'footer_copyright_text' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_settings_id( 'footer_copyright_text' ),
			array(
				'selector'            => '.copyright-text',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return true;
				},
			)
		);

	}

}
