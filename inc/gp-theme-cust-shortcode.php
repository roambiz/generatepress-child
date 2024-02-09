<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: gp-theme-cust-shortcode.php
 * Author: Singa
 * Description: Shortcode Management.
 * Note: The configuration of this file needs to be tailored for each website.
 * 
 * Reference: 
 * @link: https://developer.wordpress.org/reference/functions/add_shortcode/
 * 
 * === Customized For ===
 * @domain: ---
 * 
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */

// Use: [show_registered_block_slugs]
add_shortcode( 'show_registered_block_slugs', function() {
    // Get the registered block slugs
    $show_registered_block_slugs = array_keys( WP_Block_Type_Registry::get_instance()->get_all_registered() );

    // Output the list as a pre-formatted text
    ob_start();
    echo '<pre>' . print_r( $show_registered_block_slugs, true ) . '</pre>';
    return ob_get_clean();
});