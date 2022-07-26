<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$sidebar = HelloAcademy\get_customizer_settings( 'single_sidebar_position', 'none' );
?>

<main class="hello-academy-content" role="main" id="content">
	<div class="academy-container">
		<div class="academy-row">
			<?php if ( ( 'sidebar-left' === $sidebar ) ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
			<div class="<?php echo apply_filters( 'helloacademy/template/entry_content_wrap_classname', 'academy-col-lg-12', $sidebar ); ?>">
				<div class="entry-content">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content' );
						endwhile;

					get_template_part( 'template-parts/share' );

					the_post_navigation(
						array(
							'next_text'          => __( 'Next post: %title', 'hello-academy' ),
							'prev_text'          => __( 'Previous post: %title', 'hello-academy' ),
							'screen_reader_text' => __( 'Continue Reading', 'hello-academy' ),
						)
					);
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
				</div>
			</div>
			<?php if ( ( 'sidebar-right' === $sidebar ) ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php

get_footer();
