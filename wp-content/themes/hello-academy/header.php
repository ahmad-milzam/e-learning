<?php
/**
 * The template for displaying the header
 *
 * @package HelloAcademy
 */

// Exit if accessed directly.

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $hello_academy_viewport_content = apply_filters( 'hello_academy_theme_viewport_content', 'width=device-width, initial-scale=1' ); ?>
	<meta name="viewport" content="<?php echo esc_attr( $hello_academy_viewport_content ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hello-academy' ); ?></a>

	<?php

	$site_name = get_bloginfo( 'name' );
	$tagline   = get_bloginfo( 'description', 'display' );
	?>

	<header id="hello-academy-header" class="hello-academy-header" role="banner">
		<div class="academy-container">
			<div class="academy-row">
				<div class="academy-col-lg-4 academy-col-sm-6 academy-col-9">
					<div class="site-branding">
						<?php
						if ( has_custom_logo() ) :
							the_custom_logo();
						elseif ( $site_name ) : ?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-academy' ); ?>" rel="home">
									<?php echo esc_html( $site_name ); ?>
								</a>
							</h1>
							<p class="site-description">
								<?php
								if ( $tagline ) {
									echo esc_html( $tagline );
								} ?>
							</p>
							<?php
						endif; ?>
					</div>
				</div>
				<div class="academy-col-lg-8 academy-col-sm-6 academy-col-3">
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'hello-academy' ); ?>">

							<div class="menu-button-container">
								<button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list" aria-expanded="false">
									<span class="dropdown-icon open">
										<div class="dropdown-icon-text">
											<?php esc_html_e( 'Menu', 'hello-academy' ); ?>
										</div>
										<span class="dashicons dashicons-menu"></span>
									</span>
									<span class="dropdown-icon close"><?php esc_html_e( 'Close', 'hello-academy' ); ?>
										<span class="dashicons dashicons-no-alt"></span>
									</span>
								</button><!-- #primary-mobile-menu -->
							</div><!-- .menu-button-container -->

							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'menu_class'      => 'menu-wrapper',
									'container_class' => 'primary-menu-container',
									'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
									'fallback_cb'     => false,
								)
							);
							?>
						</nav><!-- #site-navigation -->
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
