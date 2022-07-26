<div class="academy-col-lg-6">
	<article <?php post_class(); ?>>
		<div class="hello-academy-blog-grid-single-item">

			<?php if ( has_post_thumbnail() ) : ?>
				<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_featured_image', true ) ) : ?>
					<div class="hello-academy-blog-grid-thumbnail">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<div class="hello-academy-blog-grid-content">
			<div>
				<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_cat', true ) ) : ?>
					<div class="hello-academy-blog-grid-category">
						<?php
						$cat_array = get_the_category();

						// print_r($cat_array)

						foreach ( $cat_array as $item ) {

							echo '<a href="' . get_term_link( $item->term_id ) . '">' . $item->name . '</a>';
						}

						?>

					</div>
				<?php endif; ?>
				<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_title', true ) ) : ?>
					<h2>
						<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
					</h2>
				<?php endif; ?>
				
				<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_excerpt', true ) ) : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>

			</div>
			<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_meta', true ) ) : ?>
				<div class="hello-academy-blog-grid-meta">

						<div class="hello-academy-blog-grid-date">                             
							<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_date', true ) ) : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/clock.svg" alt=""> 
								<?php echo get_the_date( get_option( 'date_format' ) ); ?>
							<?php endif; ?>
						</div>


						<div class="hello-academy-blog-grid-author">
							<?php if ( true === HelloAcademy\get_customizer_settings( 'enable_post_author', true ) ) : ?>
								by - 
								<a class="author-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
									<?php echo esc_html( get_the_author() ); ?>
								</a>
							<?php endif; ?>
						</div>
				</div>
			<?php endif; ?>
			</div>            
		</div>
	</article>
</div>
