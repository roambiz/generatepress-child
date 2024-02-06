<?php
/* 
 * File: block_theme_support.php
 * Description:  Customizes the default features supported by WordPress.
 * Author: Singa
 */

// Add block theme support START  ——
add_theme_support( 'custom-spacing' );
add_theme_support( 'editor-styles' );

/*
 * If needed, add editor styles.
 * add_editor_style( 'features-style.css' );
 */

// Ensures uploaded filenames are lowercase.
add_filter( 'sanitize_file_name', 'mb_strtolower' );

// Enable shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');

// Using a filter to control the number of revisions.
add_filter( 'wp_revisions_to_keep', 'cust_wp_revisions_limit', 10, 2 );
/**
 * Alternatively, add the following code to the [wp-config.php] file.
 * // if (!defined('WP_POST_REVISIONS')) {define('WP_POST_REVISIONS', 15);}
 *
 * @param int
 * @param WP_Post
 * @return int
 **/
function cust_wp_revisions_limit( $num, $post ) {
    $num = ( 'seo-project' === $post->post_type ) ? 20 : 15;
    return $num ?? 15;
}

// Turns off the WordPress admin bar for everyone except administrators.
add_action( 'wp', function () {
	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}
} );

// Theme Admin Menu
function block_theme_support_admin_menu() {
    // Add a menu page for Reusable Blocks
    add_menu_page( 'R-Block', 'R-Block', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-excerpt-view', 6 );
    // Add a menu page for Other
    remove_submenu_page( 'themes.php', 'widgets.php' );
}
add_action( 'admin_menu', 'block_theme_support_admin_menu', 99 );

// Theme Toolbar Navigation
function block_theme_support_admin_bar( $wp_admin_bar ) {
    // Remove widgets menu from the toolbar
    $wp_admin_bar->remove_menu( 'widgets' );
}
add_action( 'admin_bar_menu', 'block_theme_support_admin_bar', 99 );

// Theme Customizer
function block_theme_support_customize( $wp_customize ) {
    // Remove widgets panel from the Customizer
    $wp_customize->remove_panel( 'widgets' );
}
add_action( 'customize_register', 'block_theme_support_customize', 99 );

?>