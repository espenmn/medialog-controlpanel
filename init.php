<?php
/**
 * Plugin Name:       Medialog Controlpanel
 * Description:       Pluggable Control Panel type for Wordpress
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Espen Moe-Nilssen
 * License:           GPL-2.0-or-later
 * Author URI:        https://medialog.no
 * Text Domain:       medialog-controlpanel
 *
 * @package           medialog-controlpanel
 *
 */


 //  Create a function to render your custom settings page
 function my_own_settings_page() {
     ?>
     <div class="wrap">
         <h1><?php echo esc_html__('Sitewide Settings', 'medialog-controlpanel'); ?></h1>
         <form method="post" action="options.php">
             <?php
             settings_fields('medialog_settings_group'); // Use the group name you choose
             do_settings_sections('my_own_settings_page'); // Use the page name you choose
             submit_button();
             ?>
         </form>
     </div>
     <?php
 }

 //  Hook into admin_menu to add your custom settings page as a subpage
 function add_custom_settings_page() {
     add_submenu_page(
         'options-general.php', // Parent Slug for 'Settings' page
         'Medialog Settings', // Submenu Page Title
         'Medialog Settings', // Submenu Title
         'manage_options',
         'my_own_settings_page', // Submenu Page Slug
         'my_own_settings_page' // Callback to render your custom settings page function
     );
 }
 add_action('admin_menu', 'add_custom_settings_page');

 //  Use add_settings_section and add_settings_field to create sections and fields
 function custom_settings_init() {
     // Register 'my_special_setting' setting to the 'medialog_settings_group' group
     //register_setting('medialog_settings_group', 'my_special_setting', 'sanitize_callback');

     // Add a section to the custom settings page
     add_settings_section(
         'my_own_settings_section', // Section ID
         'Medialog settings', // Section Title
         'my_settings_section_callback', // Callback to render the section description (optional)
         'my_own_settings_page' // Page Slug where to display the section
     );

 }

 //  Generic callback function to render input fields
 function render_input_field($args) {
     $option_name = $args['option'];
     $option_value = get_option($option_name, '');
     $type = $args['type'];
     $label_for = $args['label_for'];
     echo '<input type="' . esc_attr($type) . '" name="' . esc_attr($option_name) . '" value="' . esc_attr($option_value) . '" class="regular-text" id="' . esc_attr($label_for) . '" />';
 }

 // Section callback function (optional) to render section description
 function my_settings_section_callback() {
     //echo '<p>Enter your settings below:</p>';
 }

 //  Sanitize callback to validate and sanitize the user input (if needed)
 function sanitize_callback($input) {
     // Perform any validation/sanitization here if required For example, you can use sanitize_text_field() to sanitize the input:
     // $sanitized_input = sanitize_text_field($input); return $sanitized_input;
     return $input;
 }

 //  Hook the functions into the appropriate actions
 add_action('admin_init', 'custom_settings_init');


?>
