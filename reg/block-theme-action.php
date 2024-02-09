<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: block-theme-action.php
 * Description: Use "add_action" to attach a custom function to a specific action in WordPress.
 * 
 * Reference: 
 * @link: https://developer.wordpress.org/reference/functions/add_action/
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
        'Custom Patterns', 
        'Patterns', 
        'edit_posts', 
        'edit.php?post_type=wp_block', 
        '', 
        'dashicons-excerpt-view',
        '21'
    );
    
    // Remove widgets nav menu
    remove_submenu_page(
        'themes.php', 
        'widgets.php'
    );

}, 99);

# Action End