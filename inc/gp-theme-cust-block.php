<?php
/* *
 * File: gp-theme-cust-block.php
 * Author: Singa
 * Description: Customize the panel and settings options of the Gutenberg editor's core blocks.
 * Note: The configuration of this file needs to be tailored for each website.
 * https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
 * https://developer.wordpress.org/reference/hooks/allowed_block_types_all/
 * === Customized For ===
 * @domain: ---
 * 
 * */
namespace GeneratePressChild;

class Block {
    public static function init() {
        add_filter( 'allowed_block_types_all', array( __CLASS__, 'core_block_types' ), 10, 2 );
    }

    public function core_block_types( $allowed_block_types, $editor_context ) {
        // If the post type is the default post type ('post')
        if ( 'post' === $editor_context->post->post_type ) {
            // Allow specified block types
            return array(
                // TEXT
                'core/paragraph',
                'core/list',
                'core/code',
                'core/preformatted',
                'core/table',
                'core/footnotes',
                // MEDIA
                'core/gallery',
                'core/file',
                // DESIGN
                'core/nextpage',
                'core/spacer',
                // WIDGETS
                'core/html',
                'core/latest-posts',
                'core/search',
                'core/shortcode',
                'core/social-link',
                'core/social-links',
                'core/tag-cloud',
            );
        }

        // If the post type is the default page type ('page')
        if ( 'page' === $editor_context->post->post_type ) {
            // Allow specified block types
            return array(
                // TEXT
                'core/paragraph',
                'core/list',
                'core/code',
                'core/preformatted',
                'core/table',
                'core/footnotes',
                // MEDIA
                'core/gallery',
                'core/file',
                // DESIGN
                'core/nextpage',
                'core/spacer',
                // WIDGETS
                'core/html',
                'core/search',
                'core/shortcode',

            );
        }

        // If the post type is the custom post type 'seo-project'
        if ( 'seo-project' === $editor_context->post->post_type ) {
            // Allow specified block types
            return array(
                // TEXT
                'core/paragraph',
                'core/list',
                'core/code',
                'core/preformatted',
                'core/table',
                'core/footnotes',
                // MEDIA
                'core/gallery',
                'core/file',
                // DESIGN
                'core/nextpage',
                'core/spacer',
                // WIDGETS
                'core/html',
                'core/search',
                'core/shortcode',
                'core/social-link',
                'core/social-links',
                'core/tag-cloud',
            );
        }

        // If none of the above conditions match, return the original list of allowed block types
        return $allowed_block_types;
    }
}
