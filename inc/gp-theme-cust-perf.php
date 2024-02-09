<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: gp-theme-cust-perf.php
 * Author: Singa
 * Description: Website Performance Optimization.
 * Note: The configuration of this file needs to be tailored for each website.
 * 
 * Reference: 
 * @link: 
 * @link: https://fullsiteediting.com/lessons/how-to-remove-default-block-styles/
 * 
 * === Customized For ===
 * @domain: ---
 * 
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */
namespace GeneratePressChild;

class Html {
    public static function inst() {
        $html = new self();
        add_action( 'wp_enqueue_scripts', array( $html, 'add_tags' ) );
    }

    public static function add_tags() {
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
}

class Wordpress {
    // Hook the function to the 'wp_enqueue_scripts' action
    public static function inst() {
        $wordpress = new self();
        add_action( 'wp_enqueue_scripts', array( $wordpress, 'remove_non_critical_css' ) );
    }

    public function remove_non_critical_css() {
        global $wp_styles;

        $excluded_handles = array( 
            'wp-paragraph',
            'wp-list',
            'wp-code',
            'wp-preformatted',
            'wp-table',
            'wp-footnotes',
            // MEDIA
            'wp-gallery',
            'wp-file',
            // DESIGN
            'wp-nextpage',
            'wp-spacer',
            // WIDGETS
            'wp-html',
            'wp-latest-posts',
            'wp-search',
            'wp-shortcode',
            'wp-social-link',
            'wp-social-links',
            'wp-tag-cloud',
        );

        // Loop through the style queue
        foreach ( $wp_styles->queue as $key => $handle ) {
            // Check if the handle starts with 'wp-block-'
            if ( strpos( $handle, 'wp-block-' )  === 0 && ! in_array( $handle, $excluded_handles ) )  {
            // Dequeue the style if it is a core block style
                wp_dequeue_style( $handle );
            }
        }
    }
}

// Cust End //