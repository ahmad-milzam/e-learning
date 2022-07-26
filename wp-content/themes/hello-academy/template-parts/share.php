<?php
/**
 * Hello Academy Post Share.
 *
 * @package HelloAcademy
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$share_config = array(
	'title' => get_the_title(),
	'text'  => get_the_excerpt(),
	'image' => get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ),
);

?>

<div class="hello-academy-post-share">
	<button class="academy-btn academy-btn--bg-white-border academy-share-button"><i class="academy-icon academy-icon--share"></i><?php esc_html_e( 'Share', 'hello-academy' ); ?></button>
	<div class="academy-share-wrap" data-social-share-config="<?php echo esc_attr( wp_json_encode( $share_config ) ); ?>">
		<button class="academy-social-share academy_facebook"><span class="dashicons dashicons-facebook"></span></button>
		<button class="academy-social-share academy_linkedin"><span class="dashicons dashicons-linkedin"></span></button>
		<button class="academy-social-share academy_twitter"><span class="dashicons dashicons-twitter"></span></button>
		<button class="academy-social-share academy_pinterest"><span class="dashicons dashicons-pinterest"></span></button>
		<button class="academy-social-share academy_gmail"><span class="dashicons dashicons-email"></span></button>
	</div>
</div>
