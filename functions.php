<?php
/**
 * Plugin Name: Basic WP Portfolio
 * Plugin URI:  https://github.com/cod3rShea/wordpress-portfolio-plugin
 * Description: This will create a basic portfolio section.
 * Version:     1.0
 * Author:      Sean Shea
 * Author URI:  seansheadev.com
 * Text Domain: wporg
 * Domain Path: /languages
 */

// Register Custom post type
include( plugin_dir_path( __FILE__ ) . 'register/register-portfolio.php');

// // include single and archive page for portfolio

add_filter( 'template_include', 'add_portfolio_template', 99 );

function add_portfolio_template( $template ) {
   
    if ( is_archive( 'portfolio' ) ) {
    	 $file_name = 'archive-portfolio.php';

        if ( locate_template( $file_name ) ) {
            $template = locate_template( $file_name );
        } else {
            // Template not found in theme's folder, use plugin's template as a fallback
            $template = dirname( __FILE__ ) . '/templates/' . $file_name;
        }
    }

    if ( is_singular( 'portfolio' ) ) {
    	 $file_name = 'single-portfolio.php';

        if ( locate_template( $file_name ) ) {
            $template = locate_template( $file_name );
        } else {
            // Template not found in theme's folder, use plugin's template as a fallback
            $template = dirname( __FILE__ ) . '/templates/' . $file_name;
        }
	}


    return $template;
}


// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', plugin_dir_path( __FILE__ ) . 'vendors/advanced-custom-fields/' );
// define( 'MY_ACF_URL', plugin_dir_path( __FILE__ ) . 'vendors/advanced-custom-fields/');
define( 'MY_ACF_URL',  '/wp-content/plugins/basic-wp-portfolio/vendors/advanced-custom-fields/' );


// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return true;
}

// Register acf fields
include( plugin_dir_path( __FILE__ ) . 'register/register-acf-fields.php');



?>