<?php
/*
KL Error settings
Author: b.cunningham@ucl.ac.uk
Author URI: https://educate.london
License: GPL2
*/

// create custom plugin settings menu
add_action('admin_menu', 'kl_error_create_menu');

function kl_error_create_menu() {
	//create options page
	add_options_page('KL Error', 'KL Error', 'manage_options', __FILE__, 'kl_error_plugin_settings_page' , __FILE__ );
	//call register settings function
	add_action( 'admin_init', 'register_kl_error_plugin_settings' );
}

function register_kl_error_plugin_settings() {
	//register our settings
	register_setting( 'kl-error-plugin-settings-group', 'kl_error_table' );
//	register_setting( 'kl-error-plugin-settings-group', 'kl_error_level' );	//// problem converting option string to PHP constant
}

function kl_error_plugin_settings_page() {
?>
<div class="wrap">
<h1>KL Error Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'kl-error-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'kl-error-plugin-settings-group' ); ?>
    <table class="form-table" id="kl-error-options">
        	
        <tr valign="top">
        <th scope="row">Error log table</th>
        <td>
        	<input type="text" name="kl_error_table" value="<?php echo esc_attr( get_option('kl_error_table') ); ?>"  size = "80" />
        	<p><small>Table to use (leave out wp_ prefix).</small></p>
        </td>
        </tr>    
        
        <!--
        <tr valign="top">
        <th scope="row">Error log table</th>
        <td>
        	<input type="text" name="kl_error_level" value="<?php echo esc_attr( get_option('kl_error_level') ); ?>"  size = "80" />
        	<p><small>PHP error logging level eg. E_ALL.</small></p>
        </td>
        </tr>            
        -->                       
    </table>
    
    <?php submit_button(); ?>    
            
</form>
</div>
<?php } ?>