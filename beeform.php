<?php
/*
  Plugin Name: BeeForm
  Plugin URI: http://beevisualbuilder.com
  Description: Form.
  Author: Beecoding
  Version: 0.3
  Author URI: http://beecoding.com/
 */
$CURRENT_PLUGIN_VERSION = '0.2';

$BF_PLUGIN_URL = plugins_url().'/beeform/';


add_shortcode('price-form', function($attr){
	include('view/layout.html');
	return "";
});

add_action( 'wp_enqueue_scripts', function(){
	global $BF_PLUGIN_URL;
  wp_enqueue_script('bf_script',$BF_PLUGIN_URL.'view/bf.js');
  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_style('bf_style',$BF_PLUGIN_URL.'view/bf.css');
  wp_enqueue_style('bootstrap',$BF_PLUGIN_URL.'view/css/bootstrap.css');
  wp_enqueue_style('bootstrap-theme',$BF_PLUGIN_URL.'view/css/bootstrap-theme.css');
  wp_enqueue_style('bf-date',$BF_PLUGIN_URL.'view/css/date-time-picker.css');
});





$wp_paths = wp_upload_dir();

$PLUGIN_DATA_DIR = $wp_paths['basedir'] . '/beevisualbuilder/';
$PLUGIN_DATA_URL = $wp_paths['baseurl'] . '/beevisualbuilder/';




