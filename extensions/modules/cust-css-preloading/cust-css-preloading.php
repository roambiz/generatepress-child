<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * Module:                  cust-css-preloading.php
 * Author:                  Singa
 * Documentation:           https://manual.roambiz.com/
 * Tested up to:            7.4
 * Requires at least:       7.4
 * Requires PHP:            7.4
 * 
 * Description: 
 * Implements CSS preloading for specified stylesheets to improve website performance by 
 * loading non-critical resources after the initial page load.
 * Note: 
 * The configuration of this module needs to be customized for each website based 
 * on the specific stylesheets that should be preloaded. Ensure to update the `$styles_to_include` 
 * array as per the website's requirements.
 * 
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */


add_filter('style_loader_tag', function ($html, $handle, $href, $media) {
    if (!is_admin()) {
        
        // Add stylesheet handles for preloading ['wp-block-library','generate-style','generateblocks']
        $styles_to_include = array('wp-block-library');

        // Check if the current stylesheet handle is in the inclusion list
        if (in_array($handle, $styles_to_include)) {
            // Construct preload HTML
            $preload_html = <<<HTML
            <link 
            rel="preload" 
            fetchpriority="low"
            href="{$href}" 
            as="style" 
            id="{$handle}-preload" 
            media="{$media}" 
            onload="this.onload=null;this.rel='stylesheet'">
            HTML;

            // Construct deferred loading stylesheet HTML
            $stylesheet_html = <<<HTML
            <link rel="stylesheet" 
            href="{$href}" 
            id="{$handle}" 
            media="print" 
            onload="this.media='all'">
            HTML;

            // Construct noscript fallback HTML
            $noscript_html = <<<HTML
            <noscript>{$html}</noscript>
            HTML;

            // Combine and return new HTML
            $html = $preload_html . $stylesheet_html . $noscript_html;
        }
    }

    return $html;
}, 10, 4);
