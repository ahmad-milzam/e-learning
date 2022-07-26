<?php
/**
 * Hello Academy Single Post Breadcrumb.
 *
 * @package HelloAcademy
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;
$author_id = $post->post_author;
$url = get_the_post_thumbnail_url( get_the_ID() );

$background_class = $url ? sanitize_text_field( 'has-background' ) : '';

?>

<section id="hello-academy-post-breadcrumb" class="hello-academy-post-breadcrumb <?php echo $background_class; ?>" <?php HelloAcademy\get_post_thumbnail_url( get_the_ID() ); ?>>
	<div class="academy-container">
		<div class="row">
			<div class="col-md-12">
				<div class="post-header">
					<?php if ( apply_filters( 'hello_academy_theme_page_title', true ) ) : ?>
					<div class="post-title">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					</div>
					<?php endif; ?>
					<div class="post-meta">
						<span class="user-info">
							<span class="dashicons dashicons-admin-users"></span>
							<?php the_author_meta( 'user_nicename', $author_id ); ?>
						</span>
						<span class="post-date">
							<span class="dashicons dashicons-clock"></span>
							<?php echo get_the_date( 'F j, Y' ); ?>
						</span>
					</div>
				</div>                    
			</div>
		</div>
	</div>
</section>
