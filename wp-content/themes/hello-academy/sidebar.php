<?php
/**
 * The template for displaying sidebar.
 *
 * @package HelloAcademy
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}

?>
<div class="academy-col-lg-3">
	<aside id="academy-blog-widget" class="academy-blog-widget-area">
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	</aside>
</div>
