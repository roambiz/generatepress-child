<?php
/* *
 * File: gp-theme-supp-filter.php
 * Description: 
 * Author: Singa
 * 
 * */

// Add own schema
add_filter( 'generate_schema_type', '__return_false' );

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

// END //
?>