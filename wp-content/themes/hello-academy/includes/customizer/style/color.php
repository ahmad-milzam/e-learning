<?php
namespace HelloAcademy\Customizer\Style;

use HelloAcademy\Interfaces\DynamicStyleInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Color extends Base implements DynamicStyleInterface {
	public static function get_css() {
		$css = '';
		$settings = self::get_settings();

		// Header Color Options.
		$body_bg_color = ( isset( $settings['body_bg_color'] ) ? $settings['body_bg_color'] : '' );
		$body_text_color = ( isset( $settings['body_text_color'] ) ? $settings['body_text_color'] : '' );
		$content_wrap_bg_color = ( isset( $settings['content_wrap_bg_color'] ) ? $settings['content_wrap_bg_color'] : '' );
		$heading_color = ( isset( $settings['heading_color'] ) ? $settings['heading_color'] : '' );
		$link_color = ( isset( $settings['link_color'] ) ? $settings['link_color'] : '' );
		$post_title_color = ( isset( $settings['post_title_color'] ) ? $settings['post_title_color'] : '' );
		$post_meta_color = ( isset( $settings['post_meta_color'] ) ? $settings['post_meta_color'] : '' );
		$post_readmore_bg_color = ( isset( $settings['post_readmore_bg_color'] ) ? $settings['post_readmore_bg_color'] : '' );
		$post_readmore_hover_bg_color = ( isset( $settings['post_readmore_hover_bg_color'] ) ? $settings['post_readmore_hover_bg_color'] : '' );
		$post_readmore_text_color = ( isset( $settings['post_readmore_text_color'] ) ? $settings['post_readmore_text_color'] : '' );
		$post_readmore_hover_text_color = ( isset( $settings['post_readmore_hover_text_color'] ) ? $settings['post_readmore_hover_text_color'] : '' );

		if ( $body_bg_color || $body_text_color ) {
			$css .= "body {
                background-color: $body_bg_color;
				color: $body_text_color;
            }";
		}

		if ( $content_wrap_bg_color ) {
			$css .= ".hello-academy-content {
				background-color: $content_wrap_bg_color;
			}";
		}

		if ( $heading_color ) {
			$css .= "h1,h2,h3,h4,h5,h6 {
				color: $heading_color;
			}";
		}

		if ( $link_color ) {
			$css .= "a {
				color: $link_color;
			}";
		}

		if ( $post_title_color ) {
			$css .= ".hello-academy-blog-item-list .entry-title a {
				color: $post_title_color;
			}";
		}

		if ( $post_meta_color ) {
			$css .= ".hello-academy-blog-item-list .entry-meta .post-author a,
			.hello-academy-blog-item-list .entry-meta .post-date,
			.hello-academy-blog-item-list .entry-meta .post-category a,
			.hello-academy-blog-item-list .entry-meta .dashicons {
				color: $post_meta_color;
			}";
		}

		if ( $post_readmore_bg_color || $post_readmore_text_color ) {
			$css .= ".hello-academy-blog-item-list .hello-academy-btn--readme {
				background-color: $post_readmore_bg_color;
				color: $post_readmore_text_color;
			}";
		}

		if ( $post_readmore_hover_bg_color || $post_readmore_hover_text_color ) {
			$css .= ".hello-academy-blog-item-list .hello-academy-btn--readme:hover {
				background-color: $post_readmore_hover_bg_color;
				color: $post_readmore_hover_text_color;
			}";
		}

		return $css;
	}
}
