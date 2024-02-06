<?php
/* 
 * File: cust_perf_optimize.php
 * Author: Singa
 * Description: Website Performance Optimization.
 * Note: The configuration of this file needs to be tailored for each website.
 * Site: https://www.balford.net/
 */

// Preload the LCP image with a high fetchpriority so it starts loading with the stylesheet. 
function add_preload_tags_for_lcp_resources() {
    $lcp_link_tags = array(
        //"<link rel='preload' fetchpriority='high' as='image' href='#' type='image/webp'>",
        //"<link rel='preload' fetchpriority='high' as='font' href='#' type='font/woff2' crossorigin='anonymous'>",
        //"<link rel='preload' fetchpriority='low' as='video' href='#' type='video/mp4'>",
    );

    // Output preload link tags
    foreach ($lcp_link_tags as $tag) {
        echo $tag;
    }
}

// Remove core block styles from the front-end
function critical_remove_core_block_styles() {
    global $wp_styles;

    // Loop through the style queue
    foreach ( $wp_styles->queue as $key => $handle ) {
        // Check if the handle starts with 'wp-block-'
        if ( strpos( $handle, 'wp-block-' ) === 0 ) {
            // Dequeue the style if it is a core block style
            wp_dequeue_style( $handle );
        }
    }
}
// Hook the function to the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'critical_remove_core_block_styles' );


// END //
?>