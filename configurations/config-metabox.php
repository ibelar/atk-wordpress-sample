<?php
/**
 * MetaBox Configuration
 *
 * $config['metabox']['id']  => $options (array)(Required) An array containing the metabox options. $options explain below.
 * 		Id must be unique within your namespace.
 *
 *		Ex: $config['metabox']['mb1'] => $mb1_options;
 *			$config['metabox']['mb2'] => $mb2_options;
 *
 *	array $options :
 *
 *  'uses'            => (string)(Required) The metabox class to use. The class must extends atkwp\components\MetaBoxComponent class.
 *						 					Ex: 'uses' =>  __NAMESPACE__ . '\metaboxes\PostExtraData'
 *
 *  'title'           => (string)(Required) A string holding the title of the metabox as it appear in the post type edit screen.
 *
 *  'type'            => (string)(Required) A string holding the post type (or screen) the metabox belong too.
 *											Could be an existing WP type like post, page or a custom post type.
 *
 *  'context'         => (string)(Required) A string holdgin the Wordpress context option. The part of the page where the meta box should be shown.
 *
 *  'priority'        => (string)(Required) A string holding the Wordpress priority option. The priority in which it shoud be shown.
 *
 *  'args'            => (array)(Optional)  An array holding the arguments pass to your metabox class.
 *
 *  'js'              => (array)(Optional)  An array of javascript file path (without the extension) to load with this metabox.
 *											File path value is relative to your plugin assets/js directory.
 *                                          Ex: test.js file is located under assets/js/vendor/test.js then the path value should be 'vendor/test'.
 *
 *  'css'             => (array)(Optional)  An array of css file path (without the extension) to load with this metabox.
 *											File path value is relative to your plugin assets/css directory.
 *                                          Ex: test.css file is located under assets/css/test.css then the path value should be 'test'
 *
 *========================================================================================================================*/

namespace atksample;

$config['metabox']['meta1'] = [
    'uses'         =>  __NAMESPACE__.'\metaboxes\PostExtraData',
    'title'         => _('Extra Information'),
    'type'          => 'post',
    'context'       => 'normal',
    'priority'      => 'high',
    'args'        => ['arg1' => 1, 'arg2' => 2 ],
];

$config['metabox']['meta2'] = [
    'uses'         =>  __NAMESPACE__.'\metaboxes\PostEventInfo',
    'title'         => _('Last Event'),
    'type'          => 'post',
    'context'       => 'normal',
    'priority'      => 'high',
];