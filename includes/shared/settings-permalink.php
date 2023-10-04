<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {exit; // Exit if accessed directly}
//
// Register settings
function aatidlm_register_settings() {
    register_setting('aatidlm_general_settings', 'aatidlm_permalink');
    add_settings_section(
        'aatidlm_general_settings_section',
        __('General Settings', 'aati-dive-location-manager'),
        'aatidlm_render_general_settings',
        'aatidlm_settings'
    );
    add_settings_field(
        'aatidlm_permalink',
        __('Custom Permalink', 'aati-dive-location-manager'),
        'aatidlm_permalink_callback',
        'aatidlm_settings',
        'aatidlm_general_settings_section'
    );
}

add_action('admin_init', 'aatidlm_register_settings');

// Render settings page
function aatidlm_settings_page() {
?>
    <div class="wrap">
        <h1><?php _e('Dive Location Manager Settings', 'aati-dive-location-manager'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('aatidlm_general_settings');
            do_settings_sections('aatidlm_settings');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

// Render General Settings section
function aatidlm_render_general_settings() {
    echo '<p>' . __('General settings for the Dive Location Manager plugin.', 'aati-dive-location-manager') . '</p>';
}

// Permalink input field callback
function aatidlm_permalink_callback() {
?>
    <input type="text" name="aatidlm_permalink" value="<?php echo esc_attr(get_option('aatidlm_permalink', 'dive-sites')); ?>">
    <p class="description"><?php _e('Enter a custom permalink structure for dive location entries. Make sure this does not conflict with any existing page or post slug.', 'aati-dive-location-manager'); ?></p>
<?php
}
