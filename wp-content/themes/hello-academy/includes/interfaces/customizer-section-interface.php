<?php
namespace HelloAcademy\Interfaces;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

interface CustomizerSectionInterface {

	public function regsiter_section( $wp_customize);
	public function dispatch_settings( $wp_customize);
}
