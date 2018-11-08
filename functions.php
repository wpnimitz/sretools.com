<?php
add_action('wp_enqueue_scripts', 'sretools_assets');
function sretools_assets() {
	$version = "1.0.0." . strtotime("now");
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('memberdev-style', get_bloginfo('stylesheet_directory') . '/memberdev.css', false, $version);
} 


function register_my_menu() {
  register_nav_menu('member-dashboard-menu',__( 'Member Dashboard Menu' ));
}
add_action( 'init', 'register_my_menu' );