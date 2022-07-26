<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package HelloAcademy
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="hello-academy-content" role="main" id="content">
	<div class="academy-container">
		<div class="academy-row">
			<div class="academy-col-lg-12">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'The page can&rsquo;t be found.', 'hello-academy' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'hello-academy' ); ?></p>
				</div>
			</div>
		</div>
	</div>

</main>

<?php
get_footer();
