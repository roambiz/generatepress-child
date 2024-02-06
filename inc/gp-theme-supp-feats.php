<?php
/* *
 * File: gp_theme_feats_supp.php
 * Description: Customizes the features supported by the GP theme.
 * Author: Singa
 * 
 * */

 namespace GeneratePressChild;

// This will prevent the default comments template from being displayed in the GeneratePress theme.
add_action( 'wp', function() {
    remove_action( 'generate_after_do_template_part', 'generate_do_comments_template', 15 );
} );

// END //
?>