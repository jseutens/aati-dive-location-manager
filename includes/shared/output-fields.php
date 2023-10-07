<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {exit; }// Exit if accessed directly}
//
function output_html_based_on_field($fields_array) {
    foreach ($fields_array as $field) {
        $second_field = $field[1];

        // Output different HTML based on the value of the second field
 
        function output_html_based_on_field($field_key, $field_value) {
            $output = '';
        
            switch ($field_key) {
                case 'aatidlm_address':
                    // Output for address
                    break;
                case 'aatidlm_gps_coords':
                    // Output for GPS coordinates
                    // GOOGLE https://www.google.com/maps/dir/
                    // APPLE https://maps.apple.com/?daddr=
                    // WAZE https://waze.com/ul?ll=
                    // OSM https://www.openstreetmap.org/directions?engine=fossgis_osrm_car&route=%3B

                    break;
                case 'aatidlm_dive_type':
                    // Output for phone <a href="tel:123-456-7890">123-456-7890</a>
                    break;
                case 'aatidlm_dive_depth':
                    // Output for cellphone
                    break;
                case 'aatidlm_dive_level':
                    // Output for fax
                    break;
                case 'aatidlm_dive_current':
                    // Output for WhatsApp <a href="https://api.whatsapp.com/send?phone=1234567890">Send Message on WhatsApp</a>

                    break;
                case 'aatidlm_dive_area':
                    // Output for email <a href="mailto:example@example.com">example@example.com</a>
                    // <a href="mailto: [email protected] "> [email protected] </a>
                    break;
                case 'aatidlm_dive_visibility':
                    // Output for ordering link <a href="https://www.example.com" target="_blank">Link Text</a> 
                    //    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                    //	<path fill="#36c" d="M6 1h5v5L8.86 3.85 4.7 8 4 7.3l4.15-4.16L6 1ZM2 3h2v1H2v6h6V8h1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z"/>
                      //  </svg>
                      $link = 'https://www.example.com';

                      $parsed_url = parse_url($link);
                      $domain = $parsed_url['host'];
                      
                      $current_domain = $_SERVER['HTTP_HOST'];
                      
                      if ($domain !== $current_domain) {
                          $aatidlm_link = '<a href="'.$link.'" class="external-link" target="_blank">'.$link.'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12"><title>'.__('External Link', AATILPI_TEXTDOMAIN).'</title><path fill="#36c" d="M6 1h5v5L8.86 3.85 4.7 8 4 7.3l4.15-4.16L6 1ZM2 3h2v1H2v6h6V8h1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z"/></svg></a>';
                      } else {
                          $aatidlm_link = '<a href="'.$link.'">'.$link.'</a>';
                      }
                      $output = $aatidlm_link;
                    break;
                case 'aatidlm_dive_distance':
                    // Output for Skype
                    break;
                case 'aatidlm_dive_season':
                    // Output for Viber
                    break;

                default:
                    // Output for any other case
                    break;
                }
            
                return $output;       
        }
    }
}