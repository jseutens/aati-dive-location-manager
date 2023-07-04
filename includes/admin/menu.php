<?php
function aatidlm_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=aatidlm_location',
        __('Dive Location settings', AATIDLM_TEXTDOMAIN),
        __('Settings', AATIDLM_TEXTDOMAIN),
        'manage_options',
        'aatidlm_settings',
        'aatidlm_settings_page'
    );
    add_submenu_page(
        'edit.php?post_type=aatidlm_location',
        __('Dive Location support', AATIDLM_TEXTDOMAIN),
        __('Support', AATIDLM_TEXTDOMAIN),
        'manage_options',
        'aatidlm_support',
        'aatidlm_support_page'
    );
}
add_action('admin_menu', 'aatidlm_admin_menu');

