<?php
/**
 * Shortcode Configuration
 *
 * $config['shortcode']['id']  => [ $options ]  (array)(Required) An array containining the shortcode options. $options explain below.
 * 		Id must be unique within your namespace.
 *		Ex: $config['shortcode']['sc1'] => [$sc1_options];
 *			$config['shortcode']['sc2'] => [$sc2_options];
 *
 *	Array $options :
 *  'uses'            => (string)(Required) The shortcode class to use. The class must extends Wp_WpShortcode.
 *						 					Ex: 'uses' =>  __NAMESPACE__ . '\Shortcode\Event'
 *
 *  'name'            => (string)(Required) A sting holding the name of your shortcode. This is the name Wp user will need to display the shortcode in front end.
 *                                      	Ex: I have create a shortcode using the name 'my-plugin-sc', then in order to display my shortcode in a post or page
 *                                          I will use this syntax: [my-plugin-sc] where I want my shortcode to be display.
 *
 *  'atkjs'           => (bool) (Optional)  A boolean value to indicate whether you want your shortcode class to use atk js and css file. When set to true, it will load atk js and css file.
 *										    False is the default.
 *                                          Ex: If you use an atk form using ajax submit in your shortcode display, this value need to be true.
 *  'js'              => (array)(Optional)  An array of javascript file path (without the extension) to load with this shortcode.
 *											File path value is relative to your plugin public/js directory.
 *                                          Ex: test.js file is located under public/js/vendor/test.js then the path value should be 'vendor/test'
 *  'js-inc'          => (array)(Optional)  An array of already registered WordPress javascript files to load with the shortcode.
 *
 *  'css'             => (array)(Optional)  An array of css file path (without the extension) to load with this shortcode.
 *											File path value is relative to your plugin public/css directory.
 *                                          Ex: test.css file is located under public/css/test.css then the path value should be 'test'
 *
 * Note: Any attribute name=value pair type when displaying your shortcode will be passed as an args value in your shortcode class.
 *		 You will be able to use them using array $this->args inside your shortcode class.
 *		 Ex: When using this to display your shortcode: [my-plugin-sc option1='value' option2='value' ]
 *		 	 then you can access option1 and option2 value using $this->args['option1'] or  $this->args['option2'] in your shortcode class.
 */

namespace atksample;

$config['shortcode']['atksample-clickme'] =    ['name' => 'atksample-clickme',
                                             'uses' => __NAMESPACE__.'\shortcodes\ClickMe',
                                             'atk'=> true,
                                             'js'   => [],
                                             'css'   => [],
                                             'shortcake' => [
                                                 'label'         => 'AtkSample Click Me',
                                                 'listItemImage' => 'dashicons-admin-links',
                                                 'attrs'         => [
                                                     [
                                                         'label'    => 'Maximum number of click',
                                                         'attr'   => 'max_count',
                                                         'type'   => 'number',
                                                         'multiple' => true,
                                                     ]
                                                 ]
                                             ]
];

//$config['shortcode']['atk4wp-form'] =   ['name' => 'atk4wp-form',
//                                         'uses' => 'atk4wp\Shortcode\Form',
//                                         'atkjs'=> true,
//                                         'shortcake' => [
//                                             'label'         => 'Atk4Wp Form',
//                                             'listItemImage' => 'dashicons-admin-links',
//                                         ]
//];