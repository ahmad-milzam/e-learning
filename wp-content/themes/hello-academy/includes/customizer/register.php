<?php
namespace HelloAcademy\Customizer;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Register {

	public function add_panel( $wp_customize ) {
		$wp_customize->add_panel(
			'helloacademy',
			array(
				'priority'       => 5,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => __( 'Hello Academy Panel', 'hello-academy' ),
			)
		);
	}
	public function add_sections( $wp_customize ) {
		new Section\Header( $wp_customize );
		new Section\Layout( $wp_customize );
		new Section\Blog( $wp_customize );
		new Section\Color( $wp_customize );
		new Section\Footer( $wp_customize );
	}
}
