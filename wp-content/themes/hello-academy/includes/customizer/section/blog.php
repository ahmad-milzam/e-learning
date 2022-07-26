<?php
namespace HelloAcademy\Customizer\Section;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


use HelloAcademy\Customizer\Control\ToggleControl;
use HelloAcademy\Customizer\Control\RadioImageControl;
use HelloAcademy\Customizer\SectionBase;
use HelloAcademy\Interfaces\CustomizerSectionInterface;

class Blog extends SectionBase implements CustomizerSectionInterface {

	public function __construct( $wp_customize ) {
		$this->regsiter_section( $wp_customize );
		$this->dispatch_settings( $wp_customize );
	}

	public function regsiter_section( $wp_customize ) {
		$wp_customize->add_section(
			'hello_academy_blog_section',
			array(
				'title'    => __( 'Blog', 'hello-academy' ),
				'priority' => 10,
				'panel'    => 'helloacademy',
			)
		);
	}

	public function dispatch_settings( $wp_customize ) {
		// Blog Post Toggle Post Title.

		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_title' ),
			array(
				'title'             => esc_html__( 'Toggle Post Title', 'hello-academy' ),
				'default'           => true,
				'type'              => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_settings_id( 'enable_post_title' ),
			array(
				'selector'            => '.entry-title',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_title' ),
				array(
					'label'       => esc_html__( 'Show Post Title?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_title' ),
					'type'        => 'light',

				)
			)
		);

		// Blog Post Toggle Post Meta.
		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_meta' ),
			array(
				'title'             => esc_html__( 'Toggle Post Meta', 'hello-academy' ),
				'default'           => true,
				'type'         => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_settings_id( 'enable_post_meta' ),
			array(
				'selector'            => '.entry-meta',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_meta' ),
				array(
					'label'       => esc_html__( 'Show Post Meta?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_meta' ),
					'type'        => 'light', // light, ios, flat.
				)
			)
		);

		// Blog Post Toggle Post Author.

		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_author' ),
			array(
				'title'             => esc_html__( 'Toggle Post Author', 'hello-academy' ),
				'default'           => true,
				'type'         => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_author' ),
				array(
					'label'       => esc_html__( 'Show Author?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_author' ),
					'type'        => 'light', // light, ios, flat.
					'active_callback' => '\HelloAcademy\Helper::get_post_meta_status',
				)
			)
		);

		// Blog Post Date Toggle.

		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_date' ),
			array(
				'title'             => esc_html__( 'Toggle Post Date', 'hello-academy' ),
				'default'           => true,
				'type'         => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_date' ),
				array(
					'label'       => esc_html__( 'Show Date?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_date' ),
					'type'        => 'light', // light, ios, flat.
					'active_callback' => '\HelloAcademy\Helper::get_post_meta_status',
				)
			)
		);

		// Blog Post Toggle Post Categories.

		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_cat' ),
			array(
				'title'             => esc_html__( 'Toggle Post Categories', 'hello-academy' ),
				'default'           => true,
				'type'         => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_cat' ),
				array(
					'label'       => esc_html__( 'Show Post Categories?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_cat' ),
					'type'        => 'light', // light, ios, flat.
					'active_callback' => '\HelloAcademy\Helper::get_post_meta_status',
				)
			)
		);

		// Blog Post Toggle Post Author.

		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_author' ),
			array(
				'title'             => esc_html__( 'Toggle Post Author', 'hello-academy' ),
				'default'           => true,
				'type'         => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_author' ),
				array(
					'label'       => esc_html__( 'Show Author?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_author' ),
					'type'        => 'light', // light, ios, flat.
					'active_callback' => '\HelloAcademy\Helper::get_post_meta_status',
				)
			)
		);

		// Blog Post Toggle Featured Image.

		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_featured_image' ),
			array(
				'title'             => esc_html__( 'Toggle Featured Image', 'hello-academy' ),
				'default'           => true,
				'type'         => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_featured_image' ),
				array(
					'label'       => esc_html__( 'Show Featured Image?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_featured_image' ),
					'type'        => 'light', // light, ios, flat.
				)
			)
		);

		// Blog Post Toggle Post Excerpt.

		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_excerpt' ),
			array(
				'title'             => esc_html__( 'Toggle Post Excerpt', 'hello-academy' ),
				'default'           => true,
				'type'         => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_settings_id( 'enable_post_excerpt' ),
			array(
				'selector'            => '.post-excerpt',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_excerpt' ),
				array(
					'label'       => esc_html__( 'Show Post Excerpt in Blog Listing?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_excerpt' ),
					'type'        => 'light', // light, ios, flat.
				)
			)
		);

		// Blog Post Toggle Read More.

		$wp_customize->add_setting(
			$this->get_settings_id( 'enable_post_read_more' ),
			array(
				'title'             => esc_html__( 'Toggle Read More', 'hello-academy' ),
				'default'           => true,
				'type'         => 'option',
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				$this->get_settings_id( 'enable_post_read_more' ),
				array(
					'label'       => esc_html__( 'Show Read More Button in Blog Listing?', 'hello-academy' ),
					'section'     => 'hello_academy_blog_section',
					'settings'    => $this->get_settings_id( 'enable_post_read_more' ),
					'type'        => 'light',
				)
			)
		);

		// Post Excerpt Length.

		$wp_customize->add_setting(
			$this->get_settings_id( 'post_excerpt_length' ),
			array(
				'title'             => esc_html__( 'Custom Excerpt Length', 'hello-academy' ),
				'type'         => 'option',
				'default'           => 30,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_settings_id( 'post_excerpt_length' ),
			array(
				'selector'            => '.excerpt',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				$this->get_settings_id( 'post_excerpt_length' ),
				array(
					'label'   => esc_html__( 'Custom Excerpt Length', 'hello-academy' ),
					'section' => 'hello_academy_blog_section',
					'type'    => 'number',
				)
			)
		);

		// Blog Archive grid view.
		$wp_customize->add_setting(
			$this->get_settings_id( 'blog_archive_layout' ),
			array(
				'default'     => 'list',
				'type'   => 'option',
				'capability'        => 'manage_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			$this->get_settings_id( 'blog_archive_layout' ),
			array(
				'type' => 'radio',
				'section' => 'hello_academy_blog_section',
				'label' => esc_html__( 'Blog Archive Layout', 'hello-academy' ),
				'description' => __( 'Select blog archive layout', 'hello-academy' ),
				'choices' => array(
					'list' => __( 'List View', 'hello-academy' ),
					'grid' => __( 'Grid View', 'hello-academy' ),
				),
			)
		);

		// Select Blog Page Sidebar Position.
		$wp_customize->add_setting(
			$this->get_settings_id( 'blog_sidebar_position' ),
			array(
				'default'     => 'none',
				'type'   => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_settings_id( 'blog_sidebar_position' ),
			array(
				'selector'            => '.hello-academy-content .academy-container',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new RadioImageControl(
				$wp_customize,
				$this->get_settings_id( 'blog_sidebar_position' ),
				array(
					'label'         => esc_html__( 'Blog Sidebar Position', 'hello-academy' ),
					'description'   => esc_html__( 'Select sidebar position on blog page, or disable it.', 'hello-academy' ),
					'section'       => 'hello_academy_blog_section',
					'settings'      => $this->get_settings_id( 'blog_sidebar_position' ),
					'choices'       => array(
						'sidebar-right' => HELLO_ACADEMY_THEME_URI . 'assets/img/sr.png',
						'sidebar-left' => HELLO_ACADEMY_THEME_URI . 'assets/img/sl.png',
						'none' => HELLO_ACADEMY_THEME_URI . 'assets/img/none.png',
					),
					'input_attrs' => array(
						'multiple' => false,
					),
				)
			)
		);

		// Select Single Page Sidebar Position.
		$wp_customize->add_setting(
			$this->get_settings_id( 'single_sidebar_position' ),
			array(
				'default'     => 'sidebar-right',
				'type'   => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$this->get_settings_id( 'single_sidebar_position' ),
			array(
				'selector'            => '.hello-academy-content .academy-container',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);

		$wp_customize->add_control(
			new RadioImageControl(
				$wp_customize,
				$this->get_settings_id( 'single_sidebar_position' ),
				array(
					'label'         => esc_html__( 'Details Page Sidebar Position', 'hello-academy' ),
					'description'   => esc_html__( 'Select sidebar position on single post or page, or disable it.', 'hello-academy' ),
					'section'       => 'hello_academy_blog_section',
					'settings'      => $this->get_settings_id( 'single_sidebar_position' ),
					'choices'       => array(
						'sidebar-right' => HELLO_ACADEMY_THEME_URI . 'assets/img/sr.png',
						'sidebar-left' => HELLO_ACADEMY_THEME_URI . 'assets/img/sl.png',
						'none' => HELLO_ACADEMY_THEME_URI . 'assets/img/none.png',
					),
					'input_attrs' => array(
						'multiple' => false,
					),
				)
			)
		);

	}

}
