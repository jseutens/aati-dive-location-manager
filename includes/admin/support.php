    <div class="wrap">
        <h1><?php _e('Dive Location Manager Support', AATIDLM_TEXTDOMAIN); ?></h1>
        <h2><?php _e('How to use the Dive Location Manager shortcode', AATIDLM_TEXTDOMAIN); ?></h2>
        <p><?php _e('To display a location, use the following shortcode:', AATIDLM_TEXTDOMAIN); ?></p>
        <pre>[AATIDLM location=ID]</pre>
        <p><?php _e('Replace "ID" with the ID of the location you want to display. If no ID is provided, the first location will be used.', AATIDLM_TEXTDOMAIN); ?></p>

        <h2><?php _e('How to contact us', AATIDLM_TEXTDOMAIN); ?></h2>
        <p><?php _e('If you need assistance or have any questions, please contact us at', AATIDLM_TEXTDOMAIN); ?> <a href="mailto:support@aati.be">support@aati.be</a>.</p>

        <h2><?php _e('Dive Locations', AATIDLM_TEXTDOMAIN); ?></h2>
        <div class="aatidlm-locations-table-container">
            <table class="aatidlm-locations-table">
                <thead>
                    <tr>
                        <th><?php _e('Shortcode', AATIDLM_TEXTDOMAIN); ?></th>
                        <th><?php _e('Dive Location Name', AATIDLM_TEXTDOMAIN); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $locations = aatidlm_get_ordered_locations();
                    foreach ($locations as $location) {
                        $shortcode = '[contact-card location=' . $location->ID . ']';
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