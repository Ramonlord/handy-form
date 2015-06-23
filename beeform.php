<?php
/*
  Plugin Name: BeeForm
  Plugin URI: http://beevisualbuilder.com
  Description: Form.
  Author: Beecoding
  Version: 0.4
  Author URI: http://beecoding.com/
 */
$CURRENT_PLUGIN_VERSION = '0.4';

$BF_PLUGIN_URL = plugins_url().'/beeform/';


add_shortcode('price-form', function($attr){
	include('view/layout.html');
	return "";
});

if(isset($_POST['stripeToken'])){
       include('stripe-php-2.1.3/init.php');
       \Stripe\Stripe::setApiKey("sk_test_GCi4soo76gYLW8pHjiZp1cq5");

       $token = $_POST['stripeToken'];

       $customer = \Stripe\Customer::create(array(
           "source" => $token,
           "description" => $_POST['name'])
       );
	   header('Location: '.home_url());
	   exit;
	   //echo('Thank you page!');
	   //die();
}

add_action( 'wp_enqueue_scripts', function(){
	global $BF_PLUGIN_URL;
  wp_enqueue_script('bf_script',$BF_PLUGIN_URL.'view/bf.js');
  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_style('bf_style',$BF_PLUGIN_URL.'view/bf.css');
  wp_enqueue_style('bootstrap',$BF_PLUGIN_URL.'view/css/bootstrap.css');
  wp_enqueue_style('bootstrap-theme',$BF_PLUGIN_URL.'view/css/bootstrap-theme.css');
  wp_enqueue_style('bf-date',$BF_PLUGIN_URL.'view/css/date-time-picker.css');
  wp_enqueue_style('bf-icon',$BF_PLUGIN_URL.'view/icon/style.css');
  wp_enqueue_script('bf-validate',"https://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js");
  wp_enqueue_script('stripe',"https://js.stripe.com/v1/");
});


add_action('wp_ajax_save_',function(){

});


$wp_paths = wp_upload_dir();

$PLUGIN_DATA_DIR = $wp_paths['basedir'] . '/beevisualbuilder/';
$PLUGIN_DATA_URL = $wp_paths['baseurl'] . '/beevisualbuilder/';




