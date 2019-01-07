<?php
/*
Plugin Name: Bodybuilding calculator
Plugin URI: http://wordpress.org/extend/plugins/BBCalculator
Description: Plugin to calculate the body fat with multiple methods. To use it, just type [bb_calc] into the post or page you want to display the calculator.
Version: 1.0
Author: Jorge Chato
Author URI: https://jorgechato.com
License: GPL2
*/

add_shortcode('bb_calc', 'widget_content');

function widget_content(){
  enqueue_scripts();
	return '<div id="bb_calc"></div>';
}

/**
 * Enqueues the JS scripts when the main dashboard page is loading.
 */
function enqueue_scripts(){
  $script_handle = 'bb-calc';
  $plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
  $plugin_version = $plugin_data['Version'];

  wp_enqueue_script(
    $script_handle,
    plugin_dir_url( __FILE__ ) . '/dist/build.js',
    array(),
    $plugin_version,
    true
  );

  $data = array(
		'app_path' => $post->post_name,
    'msg' => 'hi from backend',
  );

  wp_localize_script( $script_handle, 'bbData', $data );
}

?>
