<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>

<main class="hello-academy-content" role="main" id="content">
	<div class="academy-container">
		<div class="academy-row">
			<div class="academy-col-lg-12 academy-col-sm-12">
				<div class="entry-content">
					<?php woocommerce_content(); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
