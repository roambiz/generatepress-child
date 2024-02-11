<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: gp-theme-cust-block.php
 * Author: Singa
 * Description: Customize the panel and settings options of the Gutenberg editor's core blocks.
 * Note: The configuration of this file needs to be tailored for each website.
 * 
 * Reference: 
 * @link: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
 * @link: https://developer.wordpress.org/reference/hooks/allowed_block_types_all/
 * 
 * === Customized For ===
 * @domain: ---
 * 
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */
namespace GeneratePressChild;

class Block {
    public static function inst() {
        add_filter( 'allowed_block_types_all', array( __CLASS__, 'core_block_types' ), 10, 2 );
    }

    public static function core_block_types( $allowed_block_types, $editor_context ) {
        // Define an empty array by default
        $generateblocks_block_types = array();

        // Define an array for post
        $cust_core_block_types_for_all = array(
            // PATTERN
            'core/block',
            // TEXT
            'core/paragraph',
            'core/list',
            'core/list-item',
            'core/code',
            'core/preformatted',
            'core/table',
            'core/footnotes',
            // DESIGN
            'core/nextpage',
            'core/spacer',
            // WIDGETS
            'core/html',
            'core/search',
            'core/shortcode',
        );

        // Check if GenerateBlocks plugin is active
        if ( function_exists('is_plugin_active') && is_plugin_active('generateblocks/plugin.php') ) {
            // GenerateBlocks plugin is active, allow GenerateBlocks block types
            $generateblocks_block_types = array(
                'generateblocks/container',
                'generateblocks/grid',
                'generateblocks/query-loop',
                'generateblocks/button-container',
                'generateblocks/headline',
                'generateblocks/button',
                'generateblocks/image',
                'generatepress/dynamic-content',
                'generatepress/dynamic-image',
            );
        }

        // If the post type is the default post type ('post')
        if ( isset( $editor_context->post ) && 'post' === $editor_context->post->post_type ) {
            // Allow specified block types
            return array_merge(
                // GENERATEBLOCKS
                $generateblocks_block_types,
                // POST
                $cust_core_block_types_for_all,
                // GUTENBERG
                [
                'core/social-link',
                'core/social-links',
                'core/tag-cloud',
                'core/latest-posts',
                ]
            );
        }

        // If the post type is the default page type ('page')
        if ( isset( $editor_context->post ) && 'page' === $editor_context->post->post_type )  {
            // Allow specified block types
            return array_merge(
                // GENERATEBLOCKS
                $generateblocks_block_types,
                // PAGE
                $cust_core_block_types_for_all,
            );
        }

        // If the post type is the custom post type 'seo-project'
        if ( isset( $editor_context->post ) && 'seo-project' === $editor_context->post->post_type ) {
            // Allow specified block types
            return array_merge(
                // GENERATEBLOCKS
                $generateblocks_block_types,
                // SEO-PROJECT
                $cust_core_block_types_for_all,
                // GUTENBERG
                [
                'core/social-link',
                'core/social-links',
                'core/tag-cloud',
                ]
            );
        }

        // If none of the above conditions match, return the original list of allowed block types
        return $allowed_block_types;
    }
}

// Cust End //