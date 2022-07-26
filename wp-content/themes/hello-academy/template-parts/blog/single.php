<div <?php post_class(); ?>>
	<?php if ( apply_filters( 'hello_academy_theme_page_title', true ) ) : ?>
		<header class="page-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</header>
	<?php endif; ?>
	<div class="post-meta">
		<span class="user-info">
			<span class="dashicons dashicons-admin-users"></span>
			<?php the_author(); ?>
		</span>
		<span class="post-date">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/clock.svg" alt="">
			<?php echo get_the_date( get_option( 'date_format' ) ); ?>
		</span>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
		<div class="post-tags">
			<?php
			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				printf( '<span class="tags-links">%1$s</span>', $tags_list );
			} ?>
		</div>
		<?php wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'hello-academy' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		); ?>
	</div>
</div>
