<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: block_theme_action.php
 * Description: Use "add_action" to attach a custom function to a specific action in WordPress.
 * 
 * ref: https://developer.wordpress.org/reference/functions/add_action/
 * 
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */

// Disables the WordPress admin toolbar for all users except administrators.
add_action( 'wp', function () {
	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}
} );

// Modify admin toolbar menu
add_action('admin_bar_menu', function ($wp_admin_bar) {
    // Remove widgets menu from the toolbar
    $wp_admin_bar->remove_menu('widgets');
}, 99);

// Modify customizer panel
add_action('customize_register', function ($wp_customize) {
    // Remove widgets panel from customizer
    $wp_customize->remove_panel('widgets');
}, 99);

// Modify dashboard admin menu selection
add_action('admin_menu', function () {
    
    // Add reusable blocks nav menu
    add_menu_page(
        'R-Block', 
        'R-Block', 
        'edit_posts', 
        'edit.php?post_type=wp_block', 
        '', 
        'dashicons-excerpt-view'
    );
    
    // Remove widgets nav menu
    remove_submenu_page(
        'themes.php', 
        'widgets.php'
    );

}, 99);

# Action End