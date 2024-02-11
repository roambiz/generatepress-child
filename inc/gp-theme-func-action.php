<?php
/* ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ————
 * File: gp-theme-func-action.php
 * Description: Customizes the features supported by the GP theme.
 * 
 * Reference: 
 * @link: 
 * 
 * ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— ———— */

/* ============================================
 * Element Editor Optimization
 * ============================================*/ 

// Remove comments template from element editor
add_action( 'wp', function() {
    remove_action( 'generate_after_do_template_part', 'generate_do_comments_template', 15 );
} );

/* ============================================
 * Add Default Assets for Child Theme
 * ============================================*/ 
add_action( 'wp_enqueue_scripts', function() {
    
    // Default style
    wp_enqueue_style( 
        'prel-features-style', 
        get_stylesheet_directory_uri() . '/assets/css/prel-features-style.css', 
        array(), 
        '1.0.0', 
        'all'
    );
    
    // Default script
    wp_enqueue_script( 
        'popup-form-script', 
        get_stylesheet_directory_uri() . '/assets/js/popup-form-script.js', 
        array(), 
        '1.0.0',
        array(
		'strategy' => 'async',
        'in_footer' => true  
	    ) 
    );
    
    // DEBUG
    // wp_enqueue_script( 'perf-viz-chart', get_stylesheet_directory_uri() . '/assets/js/perf-viz-chart.js', array(), 1.0.0, array( 'strategy' => 'async' )  );

});


// Func End //