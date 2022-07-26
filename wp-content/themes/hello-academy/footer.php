<?php
/**
 * The template for displaying the footer
 *
 * @package HelloAcademy
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_copyright     = HelloAcademy\get_customizer_settings( 'footer_copyright_text', 'Copyright &copy; 2022 Academy LMS. All Rights Reserved.' );

?>
<footer id="hello-academy-footer" class="hello-academy-footer" role="contentinfo">
	<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
	<div id="footer-sidebar" class="academy-widgets academy-widgets--footer">
		<div class="academy-container">
			<div class="academy-row">
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="footer-copyright">
		<span class="copyright-text"><?php echo wp_kses_post( $footer_copyright ); ?></span>
	</div>
</footer>

<?php
	wp_footer();
?>
</body>

</html>
