<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {exit; }// Exit if accessed directly}
//
function aatidlm_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=aatidlm_location',
        __('Dive Location settings', 'aati-dive-location-manager'),
        __('Settings', 'aati-dive-location-manager'),
        'manage_options',
        'aatidlm_settings',
        'aatidlm_settings_page'
    );
    add_submenu_page(
        'edit.php?post_type=aatidlm_location',
        __('Dive Location support', 'aati-dive-location-manager'),
        __('Support', 'aati-dive-location-manager'),
        'manage_options',
        'aatidlm_support',
        'aatidlm_support_page'
    );
}
add_action('admin_menu', 'aatidlm_admin_menu');

