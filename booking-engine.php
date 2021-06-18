<?php
ob_start();
/*
    Plugin name: Booking Engine
    Plugin uri: widgets.omnibees.com/manual
    Description: Easy Booking Engine Omnibees for Wordpress
    Version: 1.2.4
    Author: Omnibees
    Author uri: www.omnibees.com
    License: GPlv2 or Later
*/

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/thallysondias/wp-booking-engine',
  __FILE__,
  'wp-booking-engine'
);

add_action('admin_menu', 'omnibees_widget');

function omnibees_widget() {
    add_menu_page ('Motor de Reserva',
                   'Motor de Reserva',
                   'manage_options',
                   'wp-booking-engine',
                   'wp_bookinge_engine',
                   'dashicons-calendar-alt',
                   90);
}
function wp_bookinge_engine() {
    include_once ('admin/customize-be.php');
}
function show_widget() {
    include_once( WP_PLUGIN_DIR . '/wp-booking-engine/views/i18n/'. get_option('omnibees_idioma') .'.php' );
    include_once ('views/'. get_option('omnibees_template') .'/booking-widget.php');
}
function wp_booking_engine_init_style(){
    wp_enqueue_style('jquery-flatpickr-style', plugin_dir_url( __FILE__ ) . 'views/'. get_option('omnibees_template') .'/css/flatpickr.min.css?v=beomnibees');
    wp_enqueue_style('omnibees-style-be', plugin_dir_url( __FILE__ ) . 'views/'. get_option('omnibees_template') .'/css/style.css?v=beomnibees');
}
function wp_booking_engine_init_script(){
    if(get_option('omnibees_idioma') === "pt-PT" || get_option('omnibees_idioma') === "pt-BR")  : $local = "pt" ; endif;
    if(get_option('omnibees_idioma') === "es-ES") : $local = "es" ; endif;
    if(get_option('omnibees_idioma') === "en-US") : $local = "en" ; endif;

    wp_enqueue_script('flatpickr-omnibees', plugin_dir_url( __FILE__ ) . 'views/'. get_option('omnibees_template') .'/js/flatpickr.min.js' , array ( 'jquery' ), true);
    wp_enqueue_script('location-flatpickr-script', plugin_dir_url( __FILE__ ) . 'views/'. get_option('omnibees_template') .'/js/location/'. $local .'.js' , array ( 'jquery','flatpickr-omnibees' ), true);
}

add_action('wp_enqueue_scripts','wp_booking_engine_init_style', 9999);
add_action('wp_footer','show_widget');
add_action('wp_footer','wp_booking_engine_init_script');
