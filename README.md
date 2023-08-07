# medialog-controlpanel
 Simple wordpress plugin: Add pluggable control panel

In your own add on, add something similar to:

    <?php


     // Step 1: Use add_settings_section and add_settings_field to create sections and fields

     function medialog_settings_settings_init() {

         // Register 'another_setting' setting to the 'medialog_settings_group' group
         register_setting('medialog_settings_group', 'a_setting', 'sanitize_callback');

         // Add the 'another_setting' field to your custom settings section
         // Change text 'a_setting' to your new (setting) field

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
