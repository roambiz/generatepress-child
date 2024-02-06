<?php
/* 
 * File: gp_theme_feats_supp.php
 * Description: Customizes the features supported by the GP theme.
 * Author: Singa
 */

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

// This will prevent the default comments template from being displayed in the GeneratePress theme.
add_action( 'wp', function() {
    remove_action( 'generate_after_do_template_part', 'generate_do_comments_template', 15 );
} );

// END //
?>