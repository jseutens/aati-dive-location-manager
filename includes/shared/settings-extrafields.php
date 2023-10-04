<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {exit; // Exit if accessed directly}
//
// add custom field group 
function aatidlm_custom_field_meta_box() {
    add_meta_box(
        'aatidlm_custom_field_meta_box_id', // Unique ID
        'Dive location data ', // Title
        'aatidlm_custom_field_meta_box_callback', // Callback function
        'aatidlm_location', // Custom post type
        'normal', // Context (normal, side, advanced)
        'high' // Priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'aatidlm_custom_field_meta_box');



// this is the header for each group
function aatidlm_display_table_header($title) {
    ?>
    <thead>
        <tr>
            <th colspan="4"><h2 class="aatidlm-table-h2"><?php echo $title; ?></h2></th>
        </tr>
        <tr>
            <th><h3><?php _e('Field', 'aati-dive-location-manager'); ?></h3></th>
            <th><h3><?php _e('Display', 'aati-dive-location-manager'); ?></h3></th>
            <th><h3><?php _e('Order', 'aati-dive-location-manager'); ?></h3></th>
            <th><h3><?php _e('Visual', 'aati-dive-location-manager'); ?></h3></th>
        </tr>
    </thead>
    <?php
}
// this is to display all the fields in the group
function aatidlm_display_fields($title, $aatidlm_display_array ,$post_id_location ) {
    // call back to the header display
    aatidlm_display_table_header($title); 
 //array display
 foreach ($aatidlm_display_array as $field) {
	// empty all fields that can contain custom data 
    $visual_options = array('yes' => 'Yes', 'no' => 'No');	
	$custom_field_value='';
	$custom_fieldname_value='';
	// get the fixed field values from the array 
	// ARRAY [NAME,FIELD,TYPE,ORDER,VISUAL,DESCRIPTION]
	$custom_field_name=$field[0];
	$custom_field_valuename=$field[1]; //value of the field
	$custom_field_type=$field[2]; // type of the field
    $order_field_default = $field[3];
    $yes_no_field_default = $field[4];
    $description_default = $field[5];
	// get values from the db
	$custom_field_value=get_post_meta($post_id_location, $custom_field_valuename, true);
	$custom_fieldname_value=get_post_meta($post_id_location, $custom_field_valuename.'_name', true);
	$order_field_value=get_post_meta($post_id_location,$custom_field_valuename.'_order', true);
	$yes_no_field_value=get_post_meta($post_id_location, $custom_field_valuename.'_visual', true);
    if (empty($custom_field_value)) {
        $custom_field_value = $custom_field_name;
    }
    if (empty($custom_fieldname_value)) {
      // $custom_fieldname_value = '';
    }
    if (empty($order_field_value)) {
        $order_field_value = $order_field_default;
    }
    if (empty($yes_no_field_value)) {
        $yes_no_field_value = $yes_no_field_default;
    }
 ?>
          <tr>
            <td>
			<?php 
			if ($custom_field_type == "text") {
				echo aatidlm_text_field($custom_field_valuename, $custom_field_valuename,$custom_field_name, $custom_field_value , 40); 

			}
			if ($custom_field_type == "textarea") {
				echo aatidlm_textarea_field($custom_field_valuename, $custom_field_valuename, $custom_field_name, $custom_field_value, 4, 40);		
			}
			if ($custom_field_type == "number") {
				echo aatidlm_number_field($custom_field_valuename, $custom_field_valuename, $custom_field_name, $custom_field_value , 40);
			}
            echo "<div class=\"aatidlm-description\">".$description_default."</div>";
			?>
			</td>
            <td>
            <?php
            echo aatidlm_text_field($custom_field_valuename.'_name', $custom_field_valuename.'_name', '', $custom_fieldname_value , 25);
            ?>
            </td>

            <td>
			<?php
			// Order
				echo aatidlm_number_field($custom_field_valuename.'_order',$custom_field_valuename.'_order', '', $order_field_value , 5);
			?>
			</td>

            <td>	
			<?php
			// Visual
				echo aatidlm_select_field($custom_field_valuename.'_visual',$custom_field_valuename.'_visual', '', $yes_no_field_value, $visual_options);
			?>
			</td>
        </tr>
 <?php
//array diplay end
}
 ?>  
  
<?php
 // end loop of fields 
}
function aatidlm_custom_field_meta_box_callback($post) {
	$aatidlm_fields_array = AATIDLM_FIELDS_ARRAY;
	wp_nonce_field('aatidlm_custom_field_meta_box', 'aatidlm_custom_field_meta_box_nonce');

	
?>
<div class="aatidlm-description"><?php _e('The first field is the display text explanation, the second field is the value that is applicable.', 'aati-dive-location-manager'); ?></div>
<table class="aatidlm-table">
<tbody>
<?php
// display all the fields per group
aatidlm_display_fields(__('Dive Location Data', 'aati-dive-location-manager'), AATIDLM_DIVELOCATION_DATA,$post->ID);
?>
</tbody>
</table>
<?php
}

//saving the stuff
function aatidlm_custom_field_save_postdata($post_id, $post) {
    if (!isset($_POST['aatidlm_custom_field_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['aatidlm_custom_field_meta_box_nonce'], 'aatidlm_custom_field_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $aatidlm_fields_array = AATIDLM_FIELDS_ARRAY;

    foreach ($aatidlm_fields_array as $field) {
        $custom_field_valuename = $field[1];
		$custom_field_type=$field[2];
        // Save custom field data

		if (isset($_POST[$custom_field_valuename])) {
			if ($custom_field_type == "textarea") {
            	$custom_field_data = sanitize_textarea_field($_POST[$custom_field_valuename]);
			} else {
           		$custom_field_data = sanitize_text_field($_POST[$custom_field_valuename]);
			}	
            update_post_meta($post_id, $custom_field_valuename , $custom_field_data);
        }

        // Save custom field name data
        if (isset($_POST[$custom_field_valuename . '_name'])) {
            $custom_fieldname_data = sanitize_text_field($_POST[$custom_field_valuename . '_name']);
            update_post_meta($post_id, $custom_field_valuename . '_name', $custom_fieldname_data);
        }

        // Save order field data
        if (isset($_POST[$custom_field_valuename . '_order'])) {
            $order_field_data = intval($_POST[$custom_field_valuename . '_order']);
            update_post_meta($post_id, $custom_field_valuename . '_order', $order_field_data);
        }

        // Save visual field data
        if (isset($_POST[$custom_field_valuename . '_visual'])) {
            $visual_field_data = sanitize_key($_POST[$custom_field_valuename . '_visual']);
            update_post_meta($post_id, $custom_field_valuename . '_visual', $visual_field_data);
        }
    }
}
add_action('save_post_aatidlm_location', 'aatidlm_custom_field_save_postdata', 10, 2);
