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
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						the_content();
						endwhile;
					if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
						else :
							get_template_part( 'template-parts/content', 'none' );
					endif;
						?> 
				</div>
			</div>
		</div>
	</div>
</main>

<?php

get_footer();
