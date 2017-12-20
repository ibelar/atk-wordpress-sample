<?php
/**
 * Panel Configuration
 *
 * $config['panel']['id']  => [ $options ]  (array)(Required) An array containining the panel options. $options explain below.
 * 		Id must be unique within your namespace.
 *		Ex: $config['panel']['panel1'] => [$panel1_options];
 *			$config['panel']['panel2'] => [$panel2_options];
 *
 *	Array $options :
 *  'uses'            => (string)(Required) The panel class to use. The class must extends Wp_WpPanel.
 *						 					Ex: 'uses' =>  __NAMESPACE__ . '\Panel\Event'
 *
 *  'type'            => (string)(Required) The panel type, Type must equal 'panel' or 'sub-panel'.
 *											A panel of type 'panel' will create an admin page accessible via an admin menu item in WP.
 *											A panel of type 'sub-panel' will create an admin page accessible via an admin sub menu item in WP.
 *												When panel are defined as 'sub-panel' type, they must indicate their 'parent' panel.
 *  'parent'          => (string)(Required when type = 'sub-panel') A string holding the parent id in order to indicate which parent this sub panel belong too.
 *																	 Ex: 'panel1'
 *  'page'            => (string)(Required) A string holding the page title. The title of the page as shown in <title> tag.
 *  'menu'            => (string)(Required) A string holding the name of the menu displayed in the admin dashboard.
 *  'slug'            => (string)(Required) A sting holdgin the slug name that refer to the menu. Must be unique.
 *  'capabilities'    => (string)(Required) A string holding the minimum capability required to view this panel.
 *  'icon'            => (string)(Optional) A string holding the image path to a custom image for menu icon in dashboard.
 *											Image path value is relative to your plugin public directory.
 *                                          Ex: icon.png file is located under public/images/icon.png then the path value should be 'images/icon.png'
 *  'position'        => (integer)(Optional) An integer holding the menu postion in dashboard.
 *											ONLY applicable for 'panel' type.
 *  'js'              => (array)(Optional)  An array of javascript file path (without the extension) to load with the panel.
 *											File path value is relative to your plugin public/js directory.
 *  'js-inc'          => (array)(Optional)  An array of already registered WordPress javascript files to load with the panel.
 *
 *                                          Ex: test.js file is located under public/js/vendor/test.js then the path value should be 'vendor/test'
 *  'css'             => (array)(Optional)  An array of css file path (without the extension) to load with this panel.
 *											File path value is relative to your plugin public/css directory.
 *                                          Ex: test.css file is located under public/css/test.css then the path value should be 'test'
 *
 */

namespace atksample;

$config['panel']['event'] =  [  'type'  => 'panel',
                                'page'  => 'Event',
                                'menu'  => 'Event',
                                'slug'  => 'event-index',
                                'uses'  => __NAMESPACE__.'\\panels\\EventPanel',
                                'capabilities' => 'manage_options',
								'position' => null,
	                            'icon'  =>  '',
	                            'js'     => ['test'], //Load test.js from assets dir.
	                            'css'    => [],
];

$config['panel']['option'] =  [  'type'  => 'sub-panel',
                                 'parent' => 'event',
                                 'page'  => 'Option',
                                 'menu'  => 'Option',
                                 'slug'  => 'option-index',
                                 'uses'  => __NAMESPACE__.'\\panels\\options\\OptionSubPanel',
                                 'capabilities' => 'manage_options',
	                             'js'   => [],
	                             'js-inc' =>[],
	                             'css-inc' => [],
	                             'css'   => [],
];
