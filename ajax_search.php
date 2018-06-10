<?php 
/*
Plugin Name: Ajax Search
Description: Inserts a widget that performs an Ajax search
Author: Greg
*/

include('includes/ajax_search_functions.php');

add_action('init','add_ajax_search_js');
add_action('init','add_ajax_search_style');
add_action('init','check_min_php_version');

function add_ajax_search_js(){
	wp_enqueue_script('ajax_search_js',get_site_url() . '/wp-content/plugins/ajax_search/js/ajax_search.js',array('jquery'));
	$info = array( 'url' => plugins_url('',dirname( __FILE__)),'webroot'=>get_site_url());
    wp_localize_script( 'ajax_search_js', 'info', $info );
}

function add_ajax_search_style(){
	wp_enqueue_style('ajax_search_styles',get_site_url() . '/wp-content/plugins/ajax_search/css/ajax_search_styles.css');
}


































