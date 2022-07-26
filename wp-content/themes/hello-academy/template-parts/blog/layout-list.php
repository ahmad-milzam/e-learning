<div class="academy-col-lg-12">
	<article <?php post_class(); ?>>
		<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_title', true ) ) : ?>
		<h2 class="entry-title">
			<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
		</h2>
		<?php endif;

		if ( true === HelloAcademy\get_customizer_settings( 'enable_post_meta', true ) ) : ?>
		<div class="entry-meta">
				<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_author', true ) ) : ?>
			<div class="post-author">
				<span class="dashicons dashicons-admin-users"></span>
				<a class="author-url"
					href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
			</div>
			<?php endif;
				if ( true === HelloAcademy\get_customizer_settings( 'enable_post_date', true ) ) : ?>
			<div class="post-date">
				<span class="dashicons dashicons-clock"></span>
					<?php echo get_the_date( 'F j, Y' ); ?>
			</div>
				<?php endif;
				if ( true === HelloAcademy\get_customizer_settings( 'enable_post_cat', true ) ) : ?>
			<div class="post-category">
				<span class="dashicons dashicons-category"></span>
					<?php echo get_the_category_list( ', ' ); ?>
			</div>
				<?php endif; ?>
		</div>
			<?php endif;

		if ( true === HelloAcademy\get_customizer_settings( 'enable_post_featured_image', true ) ) : ?>
		<div class="post-thumbnail">
				<?php the_post_thumbnail( 'large' ); ?>
		</div>
			<?php endif;

		if ( true === HelloAcademy\get_customizer_settings( 'enable_post_excerpt', true ) ) : ?>
		<div class="post-excerpt">
				<?php the_excerpt(); ?>
		</div>
			<?php endif;

		if ( true === HelloAcademy\get_customizer_settings( 'enable_read_more', true ) ) : ?>
		<a class="hello-academy-btn hello-academy-btn--readme"
			href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Continue Reading', 'hello-academy' ); ?></a>
			<?php endif; ?>
	</article>
</div>
