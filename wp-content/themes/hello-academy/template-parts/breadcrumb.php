<?php
/**
 * Hello Academy Breadcrumb.
 *
 * @package HelloAcademy
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$breadcrumb_status = get_theme_mod( 'hello_academy_toggle_breadcrumb' );

?>
<section id="hello-academy-breadcrumb" class="hello-academy-breadcrumb">
	<div class="academy-container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-text text-center">
					<h1 class="hello-academy-breadcrumb__title"><?php ( is_home() && is_front_page() ) ? esc_html_e( 'Latest Articles', 'hello-academy' ) : wp_title( '' ); ?></h1>
					<?php
					if ( true === $breadcrumb_status ) :
						?>
						<ul class="hello-academy-breadcrumb__inner">
							<?php
								do_action( 'helloacademy/template/breadcrumbs' );
							?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
