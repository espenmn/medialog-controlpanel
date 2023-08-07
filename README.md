# medialog-controlpanel
 Simple wordpress plugin: Add pluggable control panel

In your own add on, add something similar to:

    <?php
    /**
     * Plugin Name:       Medialog Controlpanel settings
     * Description:       Settings for control panel
     * Requires at least: 6.1
     * Requires PHP:      7.0
     * Version:           0.1.0
     * Author:            Espen Moe-Nilssen
     * License:           GPL-2.0-or-later
     * Author URI:        https://medialog.no
     * Text Domain:       medialog-settings
     *
     * @package           medialog-settings
     *
     */


     // Step 1: Use add_settings_section and add_settings_field to create sections and fields
     function medialog_settings_settings_init() {

         // Register 'another_setting' setting to the 'medialog_settings_group' group
         register_setting('medialog_settings_group', 'a_setting', 'sanitize_callback');
         // Add the 'another_setting' field to your custom settings section
         add_settings_field(
             'a_setting',
             'A Setting',
             'render_input_field',
             'my_own_settings_page',
             'my_own_settings_section', // Section ID where to display the field
             array(
                 'label_for' => 'a_setting',
                 'type'      => 'text',
                 'option'    => 'a_setting',
             )
         );
     }

     // Step 2: Hook the functions into the appropriate actions
     add_action('admin_init', 'medialog_settings_settings_init');

    ?>

