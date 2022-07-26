<?php
namespace HelloAcademy\Customizer\Control;

class RadioImageControl extends \WP_Customize_Control {

	public function enqueue() {
		wp_enqueue_script( 'academy-theme-customize-radio-control', HELLO_ACADEMY_THEME_URI . 'assets/js/academy-radio-control.js', array( 'jquery', 'jquery-ui-sortable', 'customize-controls' ),
		HELLO_ACADEMY_THEME_VERSION, true );
		wp_enqueue_style( 'academy-theme-customize-radio-control', HELLO_ACADEMY_THEME_URI . 'assets/css/academy-radio-control.css', [], HELLO_ACADEMY_THEME_VERSION );
	}

	public function render_content() {

		if ( empty( $this->choices ) ) {
			return; }

		if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
		if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif;

		$html = array();
		$tpl  = '<label class="asw-image-select"><img src="%s"><input type="%s" class="hidden" name="%s" value="%s" %s%s></label>';
		$field = $this->input_attrs;
		foreach ( $this->choices as $value => $image ) {
			$html[] = sprintf(
				$tpl,
				$image,
				$field['multiple'] ? 'checkbox' : 'radio',
				$this->id,
				esc_attr( $value ),
				$this->get_link(),
				checked( $this->value(), $value, false )
			);
		}
		echo implode( ' ', $html );
	}
}
