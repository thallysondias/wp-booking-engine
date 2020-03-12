<?php
ob_start();
/*
    Plugin name: Booking Engine
    Plugin uri: widgets.omnibees.com/manual
    Description: Easy Booking Engine Omnibees for Wordpress
    Version: 1.1.4
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

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');

//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');


add_action('admin_menu', 'omnibees');

function omnibees() {
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
function load_scripts(){    
    if(get_option('omnibees_idioma') === "pt-PT") || get_option('omnibees_idioma') === "pt-BR")  : $local = "pt" ; endif;
    if(get_option('omnibees_idioma') === "es-ES") : $local = "es" ; endif;
    if(get_option('omnibees_idioma') === "en-US") : $local = "en" ; endif;
    
    wp_enqueue_style(
        'jquery-flatpickr-style',
        plugins_url('views/'. get_option('omnibees_template') .'/css/flatpickr.min.css', __FILE__)
    );
     wp_enqueue_style(
        'omnibees-style-be',
        plugins_url('views/'. get_option('omnibees_template') .'/css/style.css', __FILE__)
    );    
    wp_enqueue_script(
        'jquery-flatpickr-script',
        plugins_url() . '/wp-booking-engine/views/'. get_option('omnibees_template') .'/js/flatpickr.min.js', 
        array('jquery')
    );
    wp_enqueue_script(
        'location-flatpickr-script',
        plugins_url() . '/wp-booking-engine/views/'. get_option('omnibees_template') .'/js/location/'. $local .'.js',
        array('jquery','jquery-flatpickr-script')                     
    );    
}
add_action('wp_enqueue_scripts','load_scripts');
add_action('wp_footer','show_widget');
