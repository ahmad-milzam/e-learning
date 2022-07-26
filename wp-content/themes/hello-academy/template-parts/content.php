<?php
if ( is_single() ) {
	get_template_part( 'template-parts/blog/single' );
} else {
	$archive_layout = \HelloAcademy\get_customizer_settings( 'blog_archive_layout', 'list' );
	get_template_part( 'template-parts/blog/layout', $archive_layout );
}
