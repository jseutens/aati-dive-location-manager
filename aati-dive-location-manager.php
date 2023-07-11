<?php
/*
Plugin Name: AATI Dive Location Manager
Plugin URI: https://github.com/jseutens/aati-dive-location-manager
Description: Manage the Dive locations of your diving center
Version: 1.0
Author: Johan Seutens
Author URI: https://www.aati.be
Text Domain: aatidlm
Domain Path: /languages/
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Define constants used throughout the plugin
define( 'AATIDLM_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'AATIDLM_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'AATIDLM_PLUGIN_FNAME', plugin_basename( __FILE__ ) );
define( 'AATIDLM_PLUGIN_DIRNAME', plugin_basename( dirname( __FILE__ ) ) );
define( 'AATIDLM_VERSION', '1.0.0' );
define( 'AATIDLM_TEXTDOMAIN', 'aatidlm');
// load languages
	function aatidlm_load_textdomain() {
		load_plugin_textdomain(AATIDLM_TEXTDOMAIN,false, AATIDLM_PLUGIN_DIRNAME. '/languages');
	}
	add_action( 'plugins_loaded', 'aatidlm_load_textdomain');
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
// check if a plugin is uploaded
function aatidlm_plugin_is_installed($plugin_folder_name) {
    $installed_plugins = get_plugins();
    foreach ($installed_plugins as $installed_plugin_file => $installed_plugin_data) {
        if (strpos($installed_plugin_file, $plugin_folder_name . '/') === 0) {
            return true;
        }
    }
    return false;
}
// check if a plugin is installed and active
function aatidlm_active_plugins_contains( $name ) {
    $active_plugins = get_option( 'active_plugins' );
    foreach ( $active_plugins as $plugin_file ) {
        // Check if the plugin directory matches the directory you're looking for
        if ( $plugin_file === $name ) {
          return true;
       }
    }
    return false;
}
// need for a warning , if aati location manager is installed use this to connect the dive site to a certain location of your office
function aatidlm_show_warning_message() {
    $dismissed_timestamp = get_option( 'aatidlm_warning_dismissed' );

    // Set the duration for the warning to reappear (in seconds)
    $expiration_duration = 2592000; // 30 days

    // Check if the warning has been dismissed or if the expiration time has passed
    if ( ! $dismissed_timestamp || ( time() - $dismissed_timestamp ) > $expiration_duration ) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><?php _e( 'You will need the Location Profile Information plugin to be able to use dive locations for multiple offices.', AATIDLM_TEXTDOMAIN ); ?></p>
        </div>
        <?php
    }
}

// Dismiss the warning message when the "Dismiss" button is clicked
function aatidlm_dismiss_warning() {
    update_option( 'aatidlm_warning_dismissed', time() );
}
add_action( 'admin_init', 'aatidlm_dismiss_warning' );

//
// Check if the Location Profile Information is  not active
$location_profile_plugin = 'aatilpi/aatilpi.php';
if (!aatidlm_active_plugins_contains($location_profile_plugin)) {
    add_action('admin_notices', 'aatidlm_show_warning_message');
    // no need to stop loading the rest of the plugin , we do not force the use of my other plugins
    // return; // Stop loading the rest of your plugin's code
}
// Activation hook
register_activation_hook( __FILE__, 'aatidlm_activate' );
function aatidlm_activate() {
  // Activation code here
}

// Deactivation hook
register_deactivation_hook( __FILE__, 'aatidlm_deactivate' );
function aatidlm_deactivate() {
  // Deactivation code here
}
// include admin css
wp_enqueue_style('aatidlm_custom_wp_admin_css', plugins_url('assets/css/admin-styles.css', __FILE__));
// Include functions.php
require_once(AATIDLM_PLUGIN_DIR . '/includes/shared/functions.php');
// Include shortcode.php
require_once(AATIDLM_PLUGIN_DIR . '/includes/shared/shortcode.php');
// Load plugin settings pages
require_once( AATIDLM_PLUGIN_DIR . '/includes/shared/settings-fields.php' );
//change permalink structure
require_once( AATIDLM_PLUGIN_DIR . '/includes/shared/settings-permalink.php' );
// add extra fileds to use
require_once( AATIDLM_PLUGIN_DIR . '/includes/shared/settings-extrafields.php' );
// add the menu
require_once( AATIDLM_PLUGIN_DIR . '/includes/admin/menu.php');
// Render support page
function aatidlm_support_page() {
    require_once(AATIDLM_PLUGIN_DIR . '/includes/admin/support.php');
}
// uninstall procedure
register_uninstall_hook( __FILE__, 'aatidlm_uninstall' );
function aatidlm_uninstall() {
    require_once plugin_dir_path( __FILE__ ) . 'uninstall.php';
}