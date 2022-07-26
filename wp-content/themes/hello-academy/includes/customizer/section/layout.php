<?php
namespace HelloAcademy\Customizer\Section;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use HelloAcademy\Customizer\SectionBase;
use HelloAcademy\Interfaces\CustomizerSectionInterface;

class Layout extends SectionBase implements CustomizerSectionInterface {

	public function __construct( $wp_customize ) {
		$this->regsiter_section( $wp_customize );
		$this->dispatch_settings( $wp_customize );
	}

	public function regsiter_section( $wp_customize ) {
		$wp_customize->add_section(
			'hello_academy_layout_section',
			array(
				'title'    => __( 'Layout', 'hello-academy' ),
				'priority' => 10,
				'panel'    => 'helloacademy',
			)
		);
	}

	public function dispatch_settings( $wp_customize ) {
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'content_width' ),
			array(
				'title'             => esc_html__( 'Content Width (px)', 'hello-academy' ),
				'type'         => 'option',
				'default'           => 1140,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'content_width' ),
			array(
				'selector'            => '.academy-container',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				$this->get_style_settings_id( 'content_width' ),
				array(
					'label'   => esc_html__( 'Content Width (px)', 'hello-academy' ),
					'type'    => 'number',
					'section' => 'hello_academy_layout_section',
				)
			)
		);
	}

}
