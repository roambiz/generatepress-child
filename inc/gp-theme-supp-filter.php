<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: gp-theme-supp-filter.php
 * Description: Use "filter" to modify or filter specific values in WordPress.
 * 
 * Reference: 
 * @link: https://docs.generatepress.com/article/using-filters/
 * 
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */

// Disable default schema
add_filter( 'generate_schema_type', '__return_false' );

// Disable fontawesome library
add_filter( 'generate_fontawesome_essentials', '__return_true' );

// Remove the GP Dashboard for non super admins
add_filter( 'generate_dashboard_page_capability', function() {
    return 'manage_sites';
} );

// Convert "nofollow" to "me" under a specific class name
add_filter( 'render_block', function( $content, $block ) {
	if ( 
		'generateblocks/button' === $block['blockName'] &&
		(! empty( $block['attrs']['className'] ) && strpos( $block['attrs']['className'], 'button-rel-me' ) !== false) // class name button-rel-me
	) {
		return str_replace('nofollow', 'me', $content);
	}

	return $content;
}, 10, 2 );

// Supp End //