<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package HelloAcademy
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$sidebar = HelloAcademy\get_customizer_settings( 'blog_sidebar_position', 'none' );
?>

<main class="hello-academy-content" role="main" id="content">
	<div class="academy-container">
		<div class="academy-row">
			<?php if ( ( 'sidebar-left' === $sidebar ) ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
			<div class="<?php echo apply_filters( 'helloacademy/template/entry_content_wrap_classname', 'academy-col-lg-12', $sidebar ); ?>">
				<div class="entry-content">
					<div class="academy-row">
						<?php
						do_action( 'helloacademy/template/before_loop' );
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content' );
							endwhile;
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						do_action( 'helloacademy/template/after_loop' );
						?>
					</div>
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
