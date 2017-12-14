<?php
/**
 * Shortcode Configuration
 *
 * $config['shortcode']['id']  => $options  (array)(Required) An array containining the shortcode options. $options explain below.
 * 		Id must be unique within your namespace.
 *
 *		Ex: $config['shortcode']['sc1'] => $sc1_options;
 *			$config['shortcode']['sc2'] => $sc2_options;
 *
 *	array $options :
 *
 *  'uses'            => (string)(Required) The shortcode class to use. The class must extends atkwp\components\ShortcodeComponent class.
 *						 					Ex: 'uses' =>  __NAMESPACE__ . '\shortcodes\EventShortcode'
 *
 *  'name'            => (string)(Required) A sting holding the name of your shortcode. This is the name a Wp user will need to enter in a post or page in order to display the shortcode in front end.
 *                                      	Ex: I have create a shortcode using the name 'my-plugin-sc', then in order to display the shortcode in a post or page
 *                                          I will use this shortcode syntax: [my-plugin-sc].
 *
 *  'atk'             => (bool)(Optional)   A boolean value to indicate whether you want your shortcode class to use atk js and css file. When set to true, it will load atk js and css file.
 *										    False is the default.
 *                                          Ex: If you use an atk form using ajax submit in your shortcode display, this value need to be true.
 *
 *  'js'              => (array)(Optional)  An array of javascript file path (without the extension) to load with this shortcode.
 *											File path value is relative to your plugin assets/js directory.
 *                                          Ex: test.js file is located under assets/js/vendor/test.js then the path value should be 'vendor/test'
 *
 *  'js-inc'          => (array)(Optional)  An array of already registered WordPress javascript files to load with the shortcode.
 *
 *  'css'             => (array)(Optional)  An array of css file path (without the extension) to load with this shortcode.
 *											File path value is relative to your plugin assets/css directory.
 *                                          Ex: test.css file is located under assets/css/test.css then the path value should be 'test'
 *
 * Note: Any attribute name = value pair added to the shortcode code will be passed as args array in your shortcode class.
 *
 *		 Ex: When using this code to display a shortcode: [my-plugin-sc option1='value' option2='value' ]
 *		 	 option1 and option2 value are accessible using $this->args['option1'] or  $this->args['option2'] in your shortcode class.
 *
 *========================================================================================================================*/

namespace atksample;

$config['shortcode']['atksample-clickme'] =    ['name' => 'atksample-clickme',
                                             'uses' => __NAMESPACE__.'\shortcodes\ClickMe',
                                             'atk'=> true,
                                             'js'   => [],
                                             'css'   => [],
];
