<?php
if(!class_exists('kvn_ydwh_Settings'))
{
	class kvn_ydwh_Settings
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register actions
            add_action('admin_init', array(&$this, 'admin_init'));
        } // END public function __construct
		
        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
        	
			// register settings
        	register_setting('general', 'greeting', 'wp_filter_nohtml_kses');
 		       

        	// add settings section
        	add_settings_section(
        	    'kvn_ydwh-section', 
        	    'Admin Bar Greeting', 
        	    array(&$this, 'settings_section_kvn_ydwh'), 
        	    'general'
        	);
        	
        	// add setting's fields
            add_settings_field(
                'kvn_ydwh-greeting', 
			  'Replacement Text:', 
                array(&$this, 'settings_field_input_text'), 
                'general', 
                'kvn_ydwh-section',
                array(
                    'field' => 'greeting'
                )
            );
	
	  
        } // END public static function activate
        
        public function settings_section_kvn_ydwh()
        {
            // Think of this as help text for the section.
		  echo '<em>Change the greeting in the admin bar. Default: <strong>Howdy</strong> <br>
Suggestions:</em> <strong>Logged in as</strong>, or <strong>Hello</strong>, or <strong>Ill-met by Moon-light, proud</strong>.';
        }
        
        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        } // END public function settings_field_input_text($args)
        
    } // END class kvn_ydwh_Settings
} // END if(!class_exists('kvn_ydwh_Settings'))
