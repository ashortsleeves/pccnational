<?php

/*
Plugin Name: Admin CSS
Plugin URI: http://yourdomain…/
Description: Custom Admin styles.
Author: Any nameVersion: 1.0
Author URI: http://example.com
*/

function my_admin_theme_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('wp-admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');

?>
