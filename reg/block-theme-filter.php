<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: block-theme-filter.php
 * Description: Use "filter" to modify or filter specific values in WordPress.
 * 
 * Reference: 
 * @link: https://developer.wordpress.org/reference/functions/add_filter/
 * 
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */

// Ensures uploaded filenames are lowercase.
add_filter( 'sanitize_file_name', 'mb_strtolower' );

// Using a filter to control the number of revisions.
add_filter( 'wp_revisions_to_keep', function ( $num, $post ) {
    $num = ( 'seo-project' === $post->post_type ) ? 20 : 15;
    return $num ?? 15;
}, 10, 2 );

# Filter End