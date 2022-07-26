<?php
namespace HelloAcademy;

/**
 * Core Hooks
 */
add_action( 'after_setup_theme', 'HelloAcademy\theme_setup' );
add_action( 'wp_enqueue_scripts', 'HelloAcademy\theme_scripts_styles' );
add_action( 'widgets_init', 'HelloAcademy\theme_register_sidebar' );
add_action( 'enqueue_block_editor_assets', 'HelloAcademy\theme_gutenberg_enqueue_assets' );
add_action( 'wp_print_footer_scripts', 'HelloAcademy\theme_skip_link_focus_fix' );
add_filter( 'excerpt_length', 'HelloAcademy\custom_excerpt_length', 999 );
add_filter( 'post_class', 'HelloAcademy\post_class' );

/**
 * Notice Hooks
 */
add_action( 'admin_notices', 'HelloAcademy\admin_notice_missing_academy_starter_template_plugin' );


/**
 * Template Hooks
 */
add_action( 'helloacademy/template/after_loop', 'HelloAcademy\posts_navigation' );
add_action( 'helloacademy/template/breadcrumbs', 'HelloAcademy\breadcrumbs' );
add_filter( 'helloacademy/template/entry_content_wrap_classname', 'HelloAcademy\entry_content_wrap_classname', 10, 2 );
