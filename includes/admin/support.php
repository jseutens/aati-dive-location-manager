<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {exit; // Exit if accessed directly}
//
?>
    <div class="wrap">
        <h1><?php _e('Dive Location Manager Support', 'aati-dive-location-manager'); ?></h1>
        <h2><?php _e('How to use the Dive Location Manager shortcode', 'aati-dive-location-manager'); ?></h2>
        <p><?php _e('To display a location, use the following shortcode:', 'aati-dive-location-manager'); ?></p>
        <pre>[AATIDLM location=ID]</pre>
        <p><?php _e('Replace "ID" with the ID of the location you want to display. If no ID is provided, the first location will be used.', 'aati-dive-location-manager'); ?></p>

        <h2><?php _e('How to contact us', 'aati-dive-location-manager'); ?></h2>
        <p><?php _e('If you need assistance or have any questions, please contact us at', 'aati-dive-location-manager'); ?> <a href="mailto:support@aati.be">support@aati.be</a>.</p>

        <h2><?php _e('Dive Locations', 'aati-dive-location-manager'); ?></h2>
        <div class="aatidlm-locations-table-container">
            <table class="aatidlm-locations-table">
                <thead>
                    <tr>
                        <th><?php _e('Shortcode', 'aati-dive-location-manager'); ?></th>
                        <th><?php _e('Dive Location Name', 'aati-dive-location-manager'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $locations = aatidlm_get_ordered_locations();
                    foreach ($locations as $location) {
                        $shortcode = '[AATIDLM location=' . $location->ID . ']';
                        $name = get_the_title($location->ID);
                        ?>
                        <tr>
                            <td><?php echo $shortcode; ?></td>
                            <td><?php echo $name; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>