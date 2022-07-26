<?php
namespace HelloAcademy\Customizer\Section;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use HelloAcademy\Customizer\SectionBase;
use HelloAcademy\Interfaces\CustomizerSectionInterface;

class Color extends SectionBase implements CustomizerSectionInterface {

	public function __construct( $wp_customize ) {
		$this->regsiter_section( $wp_customize );
		$this->dispatch_settings( $wp_customize );
	}

	public function regsiter_section( $wp_customize ) {
		$wp_customize->add_section(
			'hello_academy_color_section',
			array(
				'title'    => __( 'Color', 'hello-academy' ),
				'priority' => 10,
				'panel'    => 'helloacademy',
			)
		);
	}

	public function dispatch_settings( $wp_customize ) {

		// Body Background Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'body_bg_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'body_bg_color' ),
			array(
				'selector'            => '.hello-academy-content',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'body_bg_color' ),
				array(
					'label'   => esc_html__( 'Body Background Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'body_bg_color' ),
				)
			)
		);

		// Body Text Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'body_text_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'body_text_color' ),
			array(
				'selector'            => '.hello-academy-content',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'body_text_color' ),
				array(
					'label'   => esc_html__( 'Body Text Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'body_text_color' ),
				)
			)
		);

		// Main Content Wrap Background Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'content_wrap_bg_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'content_wrap_bg_color' ),
			array(
				'selector'            => '.hello-academy-content',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'content_wrap_bg_color' ),
				array(
					'label'   => esc_html__( 'Content Background Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'content_wrap_bg_color' ),
				)
			)
		);

		// Heading Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'heading_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'heading_color' ),
			array(
				'selector'            => '.hello-academy-content',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'heading_color' ),
				array(
					'label'   => esc_html__( 'Heading Text Color (h1, h2, h3, h4, h5, h6 tag)', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'heading_color' ),
				)
			)
		);

		// Article Link Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'link_color' ),
			array(
				'title'             => esc_html__( 'Link Color', 'hello-academy' ),
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'link_color' ),
			array(
				'selector'            => '.hello-academy-content',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'link_color' ),
				array(
					'label'   => esc_html__( 'Link Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
				)
			)
		);

		// Blog Title Color.

		$wp_customize->add_setting(
			$this->get_style_settings_id( 'post_title_color' ),
			array(
				'type'              => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'post_title_color' ),
			array(
				'selector'            => '.entry-content',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'post_title_color' ),
				array(
					'label'   => esc_html__( 'Blog Title Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'post_title_color' ),
				)
			)
		);

		// Blog Meta Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'post_meta_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'post_meta_color' ),
			array(
				'selector'            => '.entry-meta',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'post_meta_color' ),
				array(
					'label'   => esc_html__( 'Blog Meta Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'post_meta_color' ),
				)
			)
		);

		// Readmore Button Background Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'post_readmore_bg_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'post_readmore_bg_color' ),
			array(
				'selector'            => '.hello-academy-post .read-more',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'post_readmore_bg_color' ),
				array(
					'label'   => esc_html__( 'Readmore BG Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'post_readmore_bg_color' ),
				)
			)
		);

		// Readmore Button Hover Background Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'post_readmore_hover_bg_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'post_readmore_hover_bg_color' ),
			array(
				'selector'            => '.hello-academy-post .read-more',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'post_readmore_hover_bg_color' ),
				array(
					'label'   => esc_html__( 'Readmore BG Hover Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'post_readmore_hover_bg_color' ),
				)
			)
		);

		// Readmore Button Text Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'post_readmore_text_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'post_readmore_text_color' ),
			array(
				'selector'            => '.hello-academy-post .read-more',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'post_readmore_text_color' ),
				array(
					'label'   => esc_html__( 'Readmore Text Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'post_readmore_text_color' ),
				)
			)
		);

		// Readmore Button Hover Text Color.
		$wp_customize->add_setting(
			$this->get_style_settings_id( 'post_readmore_hover_text_color' ),
			array(
				'type'         => 'option',
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_style_settings_id( 'post_readmore_hover_text_color' ),
			array(
				'selector'            => '.hello-academy-post .read-more',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				$this->get_style_settings_id( 'post_readmore_hover_text_color' ),
				array(
					'label'   => esc_html__( 'Readmore Text Hover Color', 'hello-academy' ),
					'section' => 'hello_academy_color_section',
					'settings'      => $this->get_style_settings_id( 'post_readmore_hover_text_color' ),
				)
			)
		);
	}

}
