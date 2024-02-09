<?php
/* * *
 * File name:           functions.php
 * File description:    This file primarily includes references and definitions.
 * Template:            generatepress
 * Theme URI:           https://github.com/roambiz/generatepress_child
 * Author:              Singa
 * Author URI:          https://roambiz.com/
 * License:             GNU General Public License v3.0 or later
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.html
 * 
 * Note: 
 * @link https://github.com/tomusborne/generatepress
 * @package GeneratePressChild
 * @since GeneratePress 3.3.1
 * * *-------------------------------------------------------------------------------------------------------------- */


 # ===================================
 # Main Functionality and Definitions
 # ===================================
 
// Referencing a file stored within the child theme directory
require_once get_stylesheet_directory() . '/reg/block-theme-action.php';
require_once get_stylesheet_directory() . '/reg/block-theme-filter.php';
require_once get_stylesheet_directory() . '/reg/block-theme-support.php';

// Referencing a file stored within the child theme directory
require_once get_stylesheet_directory() . '/inc/gp-theme-func-action.php';
require_once get_stylesheet_directory() . '/inc/gp-theme-func-filter.php';

// Referencing a file stored within the child theme directory
require get_stylesheet_directory() . '/inc/gp-theme-cust-block.php';
require get_stylesheet_directory() . '/inc/gp-theme-cust-perf.php';