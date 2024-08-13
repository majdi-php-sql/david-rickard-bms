<?php
/**
 * Plugin Name: David Rickard BMS
 * Description: A simple plugin to check DJ booking availability based on selected dates. Created for David Rickard
 * Version: 1.0
 * Author: Majdi M. S. Awad
 * Author URI: https://github.com/majdi-php-sql
 * License: MIT
 * Plugin URI: https://github.com/majdi-php-sql
 */

// Ensure the file is not accessed directly
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Include required files
include_once plugin_dir_path(__FILE__) . 'includes/db-functions.php'; // Include database functions
include_once plugin_dir_path(__FILE__) . 'includes/helpers.php'; // Include helper functions

// Enqueue styles and scripts
function dr_enqueue_scripts() {
    wp_enqueue_style('dr-styles', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('dr-scripts', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'dr_enqueue_scripts'); // Enqueue styles and scripts on the frontend

// Shortcode to display the booking form
function dr_booking_form_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/booking-form.php';
    return ob_get_clean();
}
add_shortcode('dr_booking_form', 'dr_booking_form_shortcode'); // Register the shortcode

// Include admin functionalities only if the user is an admin
if (is_admin()) {
    include_once plugin_dir_path(__FILE__) . 'admin/dashboard.php';
    include_once plugin_dir_path(__FILE__) . 'admin/functions.php';
}
