<?php
/*
Plugin Name: KL Error
Plugin URI: https://github.com/educate-sysadmin/kl-error
Description: Wordpress plugin to log PHP errors in database
Version: 0.1
Author: b.cunningham@ucl.ac.uk
Author URI: https://educate.london
License: GPL2
*/

//thanks https://www.w3schools.com/php/php_error.asp

require_once('kl-error-options.php');

/* install */
function kl_error_install() {
	/* database - see database.sql */

	/* default options */
	update_option('kl_error_table','kl_error');    
	//update_option('kl_error_level','E_ALL');  // problem converting option string to PHP constant
}

/* setup error handling */
function kl_error_init() { 	   	
	//set error handler
	// skip if handled // todo //??
	if (null == WP_DEBUG) {
		set_error_handler("kl_error", E_ALL);   	
	}
}

//error handler function
function kl_error($errno, $errstr) {
   	global $wpdb;	  
	$error = "<b>Error:</b> [$errno] $errstr";
	//echo $error;
	$table = $wpdb->prefix.get_option('kl_error_table');
	
	$wpdb->show_errors(); // debug only not production		
	$result = $wpdb->insert( 
		$table, 
		array( 
			'error' => $error,
		),	
		array('%s')
	);	
	
}

function kl_error_test() { 	   	
	//trigger error
	//echo'error test';
	echo($test);
}

register_activation_hook( __FILE__, 'kl_error_install' );
add_action( 'init', 'kl_error_init' );
add_action( 'admin_init', 'kl_error_init' );
kl_error_test();