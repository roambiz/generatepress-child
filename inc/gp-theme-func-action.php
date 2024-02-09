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
 * Add Default --- for Child Theme
 * ============================================*/ 



// Func End //