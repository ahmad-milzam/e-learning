<?php
namespace HelloAcademy;

function theme_setup() {
	if ( is_admin() ) {
		Helper::maybe_update_theme_version_in_db();
	}

	load_theme_textdomain( 'hello-academy', HELLO_ACADEMY_THEME_DIR . 'languages' );

	register_nav_menus( [ 'primary' => __( 'Header', 'hello-academy' ) ] );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);
	add_theme_support(
		'custom-logo',
		[
			'height'      => 100,
			'width'       => 350,
			'flex-height' => true,
			'flex-width'  => true,
		]
	);

	/*
	 * Add theme support for selective refresh for widgets.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Editor Style.
	 */
	add_editor_style( 'assets/css/classic-editor.css' );

	/*
	 * Gutenberg wide images.
	 */
	add_theme_support( 'align-wide' );

	/*
	 * WooCommerce.
	 */
	add_theme_support( 'woocommerce' );
}

/**
 * Enqueue style and scripts
 */
function theme_scripts_styles() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'hello-academy-web-fonts', Helper::theme_web_fonts_url( 'Inter:wght@300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500;1,600;1,700;1,800;1,900&display=swap' ), array(), HELLO_ACADEMY_THEME_VERSION );
	wp_enqueue_style(
		'hello-academy',
		HELLO_ACADEMY_THEME_URI . 'style.css',
		[],
		HELLO_ACADEMY_THEME_VERSION
	);

	wp_enqueue_style(
		'hello-academy-theme-style',
		HELLO_ACADEMY_THEME_URI . 'assets/css/theme.css',
		[],
		HELLO_ACADEMY_THEME_VERSION
	);

	wp_enqueue_script( 'hell-academy-scripts', HELLO_ACADEMY_THEME_URI . 'assets/js/hello-academy-scripts.js', [ 'jquery' ], HELLO_ACADEMY_THEME_VERSION, true );
	wp_enqueue_script( 'hello-academy-socialshare', HELLO_ACADEMY_THEME_URI . 'assets/js/SocialShare.min.js', array( 'jquery' ), HELLO_ACADEMY_THEME_VERSION, false );

}


function theme_register_sidebar() {
	// Blog Sidebar.
	register_sidebar(
		[
			'name' => esc_html__( 'Blog Sidebar', 'hello-academy' ),
			'id' => 'blog-sidebar',
			'description' => esc_html__( 'Blog Sidebar', 'hello-academy' ),
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		]
	);
	// Footer Sidebar.
	register_sidebar(
		[
			'name' => esc_html__( 'Footer Sidebar', 'hello-academy' ),
			'id' => 'footer-sidebar',
			'description' => esc_html__( 'Add widgets here.', 'hello-academy' ),
			'before_widget' => '<div class="academy-col-lg-3 academy-col-sm-6"><div class="hello-academy-widget %2$s" id="%1$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		]
	);

}


function theme_gutenberg_enqueue_assets() {
	wp_enqueue_style( 'hello-academy-web-fonts', Helper::theme_web_fonts_url( 'Inter:wght@300;400;500;600;700;800;900|Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ), array(), HELLO_ACADEMY_THEME_VERSION );
	wp_enqueue_style( 'hello-academy-gutenberg-editor', HELLO_ACADEMY_THEME_URI . 'assets/css/editor.css', array(), HELLO_ACADEMY_THEME_VERSION );
}


function theme_skip_link_focus_fix() {
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include HELLO_ACADEMY_THEME_DIR . 'assets/js/skip-link-focus-fix.js';
		echo '</script>';
	} ?>
<script>
/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window
	.addEventListener("hashchange", (function() {
		var t, e = location.hash.substring(1);
		/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (
			/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
	}), !1);
</script>
	<?php
}


function custom_excerpt_length( $length ) {
	$custom_excerpt_length = get_customizer_settings( 'post_excerpt_length', 30 );
	$length = $custom_excerpt_length;
	return $length;
}


function posts_navigation() {
	global $wp_query;
	$big = 999999999;
	?>
	<div class="hello-academy-pagination">				
		<?php
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total' => $wp_query->max_num_pages,
				'prev_text' => '<span class="dashicons dashicons-arrow-left-alt2"></span>',
				'next_text' => '<span class="dashicons dashicons-arrow-right-alt2"></span>',
			) );
		?>
	</div>
	<?php
}



/**
 * Hello Academy breadcrumbs
 */
function breadcrumbs() {
	$home = '<li class="breadcrumb-item"><a href="' . esc_url( home_url() ) . '" title="' . esc_attr__( 'Home', 'hello-academy' ) . '">' . esc_html__( 'Home', 'hello-academy' ) . '</a></li>';
	$show_current = 1;

	global $post;
	$home_link = esc_url( home_url() );
	if ( is_front_page() ) {
		return;
	}    // don't display breadcrumbs on the homepage (yet).

	printf( '%s', $home );

	if ( is_category() ) {
		// category section.
		$this_cat = get_category( get_query_var( 'cat' ), false );
		if ( ! empty( $this_cat->parent ) ) {
			echo get_category_parents( $this_cat->parent, true, ' / ' );
		}
		echo '<li class="breadcrumb-item">' . esc_html__( 'Archive for category', 'hello-academy' ) . ' "' . single_cat_title( '', false ) . '"</li>';
	} elseif ( is_search() ) {
		// search section.
		echo '<li class="breadcrumb-item">' . esc_html__( 'Search results for', 'hello-academy' ) . ' "' . get_search_query() . '"</li>';
	} elseif ( is_day() ) {
		echo '<li class="breadcrumb-item"><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
		echo '<li class="breadcrumb-item"><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li>';
		echo '<li class="breadcrumb-item">' . get_the_time( 'd' ) . '</li>';
	} elseif ( is_month() ) {
		// monthly archive.
		echo '<li class="breadcrumb-item"><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
		echo '<li class="breadcrumb-item">' . get_the_time( 'F' ) . '</li>';
	} elseif ( is_year() ) {
		// yearly archive.
		echo '<li class="breadcrumb-item">' . get_the_time( 'Y' ) . '</li>';
	} elseif ( is_single() && ! is_attachment() ) {
		// single post or page.
		if ( get_post_type() !== 'post' ) {
			$post_type = get_post_type_object( get_post_type() );
			$slug = $post_type->rewrite;
			echo '<li class="breadcrumb-item"><a href="' . $home_link . '/?post_type=' . $slug['slug'] . '">' . $post_type->labels->singular_name . '</a></li>';
			if ( $show_current ) {
				echo '<li class="breadcrumb-item">' . get_the_title() . '</li>';
			}
		} else {
			$cat = get_the_category();
			if ( isset( $cat[0] ) ) {
				$cat = $cat[0];
			} else {
				$cat = false;
			}
			if ( $cat ) {
				$cats = get_category_parents( $cat, true, '   ' );
			} else {
				$cats = false;
			}
			if ( ! $show_current && $cats ) {
				$cats = preg_replace( '#^(.+)\s\s$#', '$1', $cats );
			}
			echo '<li class="breadcrumb-item">' . $cats . '</li>';
			if ( $show_current ) {
				echo '<li class="breadcrumb-item">' . get_the_title() . '</li>';
			}
		}
	} elseif ( ! is_single() && ! is_page() && get_post_type() !== 'post' && ! is_404() ) {
		// some other single item.
		$post_type = get_post_type_object( get_post_type() );
		if ( ! empty( $post_type ) ) {
			echo '<li class="breadcrumb-item">' . $post_type->labels->singular_name . '</li>';
		}
	} elseif ( is_attachment() ) {
		// attachment section.
		$parent = get_post( $post->post_parent );
		$cat = get_the_category( $parent->ID );
		if ( isset( $cat[0] ) ) {
			$cat = $cat[0];
		} else {
			$cat = false;
		}
		if ( $cat ) {
			echo get_category_parents( $cat, true, '   ' );
		}
		echo '<li class="breadcrumb-item"><a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a></li>';
		if ( $show_current ) {
			echo '<li class="breadcrumb-item">' . get_the_title() . '</li>';
		}
	} elseif ( is_page() && ! $post->post_parent ) {
		if ( $show_current ) {
			echo '<li class="breadcrumb-item">' . get_the_title() . '</li>';
		}
	} elseif ( is_page() && $post->post_parent ) {
		// child page.
		$parent_id = $post->post_parent;
		$breadcrumbs = array();
		while ( $parent_id ) {
			$page = get_page( $parent_id );
			$breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>';
			$parent_id = $page->post_parent;
		}
		$breadcrumbs = array_reverse( $breadcrumbs );
		$breadcrumbs_count = count( $breadcrumbs );
		for ( $i = 0; $i < $breadcrumbs_count; $i++ ) {
			printf( '%s', $breadcrumbs[ $i ] );
			if ( $i !== $breadcrumbs_count - 1 ) {
				;
			}
		}
		if ( $show_current ) {
			echo '<li class="breadcrumb-item">' . get_the_title() . '</li>';
		}
	} elseif ( is_tag() ) {
		// tags archive.
		echo '<li class="breadcrumb-item">' . esc_html__( 'Posts tagged', 'hello-academy' ) . ' "' . single_tag_title( '', false ) . '"</li>';
	} elseif ( is_author() ) {
		// author archive.
		global $author;
		$userdata = get_userdata( $author );
		echo '<li class="breadcrumb-item">' . esc_html__( 'Articles posted by', 'hello-academy' ) . ' ' . $userdata->display_name . '</li>';
	} elseif ( is_404() ) {
		// 404.
		echo '<li class="breadcrumb-item">' . esc_html__( 'Not Found', 'hello-academy' ) . '</li>';
	}

	if ( get_query_var( 'paged' ) ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
			echo '<li class="paged-page breadcrumb-item">(';
		}
		echo esc_html__( 'Page', 'hello-academy' ) . ' ' . get_query_var( 'paged' );
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
			echo ')</li>';
		}
	}
}


function get_post_thumbnail_url( $id ) {
	$url = get_the_post_thumbnail_url( $id );
	if ( ! empty( $url ) ) {
		return 'style="background-image:linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%),url(' . $url . ')"';
	}
	return false;
}

function get_customizer_settings( $key, $default = null ) {
	$customizer_settings = get_option( 'hello_academy_customizer_settings' );
	if ( isset( $customizer_settings[ $key ] ) ) {
		return $customizer_settings[ $key ];
	}
	return $default;
}

function entry_content_wrap_classname( $classes, $sidebar_position ) {
	if ( 'sidebar-left' === $sidebar_position || 'sidebar-right' === $sidebar_position ) {
		return 'academy-col-lg-9';
	}
	return $classes;
}

function admin_notice_missing_academy_starter_template_plugin() {
	if ( class_exists( 'AcademyStarter' ) || ! current_user_can( 'activate_plugins' ) ) {
		return;
	}
	$starter_templates = 'academy-starter-templates/academy-starter-templates.php';
	if ( Helper::is_plugin_installed( $starter_templates ) ) {
		$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $starter_templates . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $starter_templates );

		$message = __( 'To take full advantages of Hello Academy theme and enabling demo importer, Please activate Core Plugin to continue.', 'hello-academy' );

		$button_text = __( 'Activate Academy Starter Templates', 'hello-academy' );
	} else {
		$activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=academy-starter-templates' ), 'install-plugin_academy-starter-templates' );

		$message = __( 'To take full advantages of Hello Academy theme and enabling demo importer, Please install Core Plugin to continue.', 'hello-academy' );
		$button_text = __( 'Install Academy Starter Templates', 'hello-academy' );
	}

	$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';

	printf( '<div class="notice notice-warning"><h2>Thanks for choosing Hello Academy</h2><p>%1$s</p>%2$s</div>', wp_kses_post( $message ), wp_kses_post( $button ) );
}

function post_class( $classes ) {
	$blog_archive_layout = \HelloAcademy\get_customizer_settings( 'blog_archive_layout', 'list' );
	if ( is_single() ) {
		$classes[] = 'grid' === $blog_archive_layout ? 'hello-academy-blog-single-grid' : 'hello-academy-blog-single-list';
	} else {
		$classes[] = 'grid' === $blog_archive_layout ? 'hello-academy-blog-item-grid' : 'hello-academy-blog-item-list';
	}
	return $classes;
}
