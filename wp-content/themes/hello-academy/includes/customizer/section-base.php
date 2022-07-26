<?php
namespace HelloAcademy\Customizer;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SectionBase {

	protected function get_settings_id( $id ) {
		if ( empty( $id ) ) {
			return;
		}
		return sprintf( 'hello_academy_customizer_settings[%s]', $id );
	}
	protected function get_style_settings_id( $id ) {
		if ( empty( $id ) ) {
			return;
		}
		return sprintf( 'hello_academy_customizer_style_settings[%s]', $id );
	}
}
