<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: block_theme_action.php
 * Description: Use "add_action" to attach a custom function to a specific action in WordPress.
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */

// Disables the WordPress admin bar for all users except administrators.
add_action( 'wp', function () {
	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}
} );

// Modify Admin Toolbar Menu
add_action('admin_bar_menu', function ($wp_admin_bar) {
    // Remove widgets menu from the toolbar
    $wp_admin_bar->remove_menu('widgets');
}, 99);

// Modify Customizer Panel
add_action('customize_register', function ($wp_customize) {
    // Remove widgets panel from the Customizer
    $wp_customize->remove_panel('widgets');
}, 99);

// Modify Dashboard Admin Menu Selection
add_action('admin_menu', function () {
    
    // Add a menu page for Reusable Blocks
    add_menu_page(
        'R-Block', 
        'R-Block', 
        'edit_posts', 
        'edit.php?post_type=wp_block', 
        '', 
        'dashicons-excerpt-view'
    );
    
    // Remove Widgets menu
    remove_submenu_page(
        'themes.php', 
        'widgets.php'
    );

}, 99);

# action end