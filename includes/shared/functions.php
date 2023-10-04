<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {exit; }// Exit if accessed directly}
//
function aatidlm_register_location_post_type() {
    $labels = array(
        'name' => __('Dive Locations', 'aati-dive-location-manager'),
        'singular_name' => __('Dive Location', 'aati-dive-location-manager'),
        'add_new'            => __('Add New', 'aati-dive-location-manager'),
        'add_new_item'       => __('Add New Dive Location', 'aati-dive-location-manager'),
        'edit_item'          => __('Edit Dive Location', 'aati-dive-location-manager'),
        'new_item'           => __('New Dive Location', 'aati-dive-location-manager'),
        'all_items'          => __('All Dive Locations', 'aati-dive-location-manager'),
        'view_item'          => __('View Dive Location', 'aati-dive-location-manager'),
        'search_items'       => __('Search Events', 'aati-dive-location-manager'),
        'not_found'          => __('No Dive Location found', 'aati-dive-location-manager'),
        'not_found_in_trash' => __('No Dive Location found in Trash', 'aati-dive-location-manager'),
        'menu_name'          => __('Dive Locations', 'aati-dive-location-manager')
    );

    $permalink_slug = get_option('aatidlm_permalink', 'dive-sites');

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite' => array('slug' => $permalink_slug),
		'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','revisions','thumbnail','author','page-attributes',)
    );

    register_post_type('aatidlm_location', $args);
}
add_action('init', 'aatidlm_register_location_post_type',21);

function aatidlm_get_ordered_locations() {
    $args = array(
    	'post_type' => 'aatidlm_location',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );

    return get_posts($args);
}

// Add custom columns to the locations list table
function aatidlm_location_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        if ($key == 'date') {
            $new_columns['menu_order'] = __('Order', 'aati-dive-location-manager');
        }
        $new_columns[$key] = $value;
    }
    return $new_columns;
}
add_filter('manage_aatidlm_location_posts_columns', 'aatidlm_location_columns');

// Fill custom columns with data
function aatidlm_location_custom_column($column, $post_id) {
    if ($column == 'menu_order') {
        $post = get_post($post_id);
        echo $post->menu_order;
    }
}
add_action('manage_aatidlm_location_posts_custom_column', 'aatidlm_location_custom_column', 10, 2);

// Make the custom columns sortable
function aatidlm_location_sortable_columns($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter('manage_edit-aatidlm_location_sortable_columns', 'aatidlm_location_sortable_columns');

// display a input field with : field_id (the name of the variable), field_name (the name of the variable), field_label (visual name before the input field), field_value (the actual value of the field), size (25 or 5)
// echo aatidlm_text_field('aatidlm_address', 'aatidlm_address', 'Address', $address_value , 25);
function aatidlm_text_field($field_id, $field_name, $field_label, $field_value, $size) {
    $label_html = !empty($field_label) ? '<label for="' . esc_attr($field_id) . '">' . esc_html($field_label) . ' </label>' : '';
    return $label_html . '<input type="text" id="' . esc_attr($field_id) . '" name="' . esc_attr($field_name) . '" value="' . esc_attr($field_value) . '" size="' . esc_attr($size) . '" />';
}

// display a input field with : field_id (the name of the variable), field_name (the name of the variable), field_label (visual name before the input field), field_value (the actual value of the field), size (25 or 5)
// echo aatidlm_number_field('aatidlm_address', 'aatidlm_address', 'Address', $address_value , 5);
function aatidlm_number_field($field_id, $field_name, $field_label, $field_value, $size) {
    $label_html = !empty($field_label) ? '<label for="' . esc_attr($field_id) . '">' . esc_html($field_label) . ' </label>' : '';
    return $label_html . '<input type="number" id="' . esc_attr($field_id) . '" name="' . esc_attr($field_name) . '" value="' . esc_attr($field_value) . '" size="' . esc_attr($size) . '" />';
}

// display a input field with : field_id (the name of the variable), field_name (the name of the variable), field_label (visual name before the input field), field_value (the actual value of the field), rows (5) , cols (40)
// echo aatidlm_textarea_field('aatidlm_textarea_field_id', 'aatidlm_textarea_field_name', 'AATILPI Textarea Field', $field_value, 5, 40);
function aatidlm_textarea_field($field_id, $field_name, $field_label, $field_value, $rows, $cols) {
    $label_html = !empty($field_label) ? '<label for="' . esc_attr($field_id) . '">' . esc_html($field_label) . ' </label>' : '';
    return $label_html . '<textarea id="' . esc_attr($field_id) . '" name="' . esc_attr($field_name) . '" rows="' . esc_attr($rows) . '" cols="' . esc_attr($cols) . '">' . esc_textarea($field_value) . '</textarea>';
}


// display a select field with : field_id (the name of the variable), field_name (the name of the variable), field_label (visual name before the input field), field_value (the actual value of the field), options (array with the values to select)
function aatidlm_select_field($field_id, $field_name, $field_label, $field_value, $options) {
    $html = '<select id="' . esc_attr($field_id) . '" name="' . esc_attr($field_name) . '">';
    foreach ($options as $key => $value) {
        $selected = $field_value === $key ? ' selected' : '';
        $html .= '<option value="' . esc_attr($key) . '"' . $selected . '>' . esc_html($value) . '</option>';
    }
    $html .= '</select>';
    return $html;
}
