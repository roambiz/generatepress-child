<?php
/* * *
 * File name:               functions.php
 * File description:        This file primarily includes references and definitions.
 * Template:                generatepress
 * Theme URI:               https://github.com/roambiz/generatepress_child
 * Author:                  Singa
 * Author URI:              https://roambiz.com/
 * Tested up to:            7.4
 * Requires at least:       7.3
 * Requires PHP:            7.3
 * License:                 GNU General Public License v3.0 or later
 * License URI:             https://www.gnu.org/licenses/gpl-3.0.html
 * 
 * Note: 
 * @link https://github.com/tomusborne/generatepress
 * @package GeneratePressChild
 * @since GeneratePress 3.4.0
 * * *-------------------------------------------------------------------------------------------------------------- */


 # ===================================
 # Main Functionality and Definitions
 # ===================================
 
// Referencing function files to support customized block themes.
require_once get_stylesheet_directory() . '/reg/block-theme-action.php';
require_once get_stylesheet_directory() . '/reg/block-theme-filter.php';
require_once get_stylesheet_directory() . '/reg/block-theme-support.php';

// Referencing function files to support customized GP themes.
require_once get_stylesheet_directory() . '/inc/gp-theme-func-action.php';
require_once get_stylesheet_directory() . '/inc/gp-theme-func-filter.php';

// Referencing function files to support customized block editor.
require get_stylesheet_directory() . '/inc/gp-theme-cust-block.php';
require get_stylesheet_directory() . '/inc/gp-theme-cust-perf.php';
require get_stylesheet_directory() . '/inc/gp-theme-cust-shortcode.php';

 # ========================================
 # Function Class Instantiation Management
 # ========================================

//  Import the classes you need from the namespace.
use GeneratePressChild\Block;
use GeneratePressChild\Html;
use GeneratePressChild\wordpress;

// Initialize the functions you need.
Block::inst();
Html::inst();
wordpress::inst();

 # ========================================
 # Other Referencing Management
 # ========================================