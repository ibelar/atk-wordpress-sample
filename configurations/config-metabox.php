<?php
/**
 * MetaBox Configuration
 *
 * $config['metabox']['id']  => [ $options ]  (array)(Required) An array containining the metabox options. $options explain below.
 * 		Id must be unique within your namespace.
 *		Ex: $config['metabox']['mb1'] => [$mb1_options];
 *			$config['metabox']['mb2'] => [$mb2_options];
 *
 *	Array $options :
 *  'uses'            => (string)(Required) The metabox class to use. The class must extends  Wp_WpMetaBox.
 *						 					Ex: 'uses' =>  __NAMESPACE__ . '\MetaBox\Event'
 *
 *  'title'           => (string)(Required) A string holding the title of the metabox as it appear in the post type edit screen.
 *  'type'            => (string)(Required) A string holding the post type (or screen) the metabox belong too.
 *											Could be an existing WP type like post, page or a custom post type.
 *  'context'         => (string)(Required) A string holdgin the Wordpress context option. The part of the page where the meta box should be shown.
 *  'priority'        => (string)(Required) A string holding the Wordpress priority option. The priority in which it shoud be shown.
 *  'args'            => (array)(Optional)  An array holding the arguments pass to your metabox class.
 *  'js'              => (array)(Optional)  An array of javascript file path (without the extension) to load with this metabox.
 *											File path value is relative to your plugin public/js directory.
 *                                          Ex: test.js file is located under public/js/vendor/test.js then the path value should be 'vendor/test'
 *  'js-inc'          => (array)(Optional)  An array of already registered WordPress javascript files to load with the metabox.
 *
 *  'css'             => (array)(Optional)  An array of css file path (without the extension) to load with this metabox.
 *											File path value is relative to your plugin public/css directory.
 *                                          Ex: test.css file is located under public/css/test.css then the path value should be 'test'
 *
 *	Note on Metabox form. Form can be setup via the addForm() function.
 *	addForm() will return a form specially configure for metabox uses and where you can add fields to it; as you would do for a normal atk4 form.
 *	Field value added to the form will be automatically save on post Publish/Update in WordPress.
 *	Ex: $f = $this->addForm();
 *		$f->addField('line','test);
 *
 */

namespace atksample;

$config['metabox']['meta1'] = [
    'uses'         =>  __NAMESPACE__.'\metaboxes\PostExtraData',
    'title'         => _('Extra Information'),
    'type'          => 'post',
    'context'       => 'normal',
    'priority'      => 'high',
    'args'        => ['arg1' => 1, 'arg2' => 2 ],
//    'js'   => ['atkwp-js', 'vendor/test'],
//    'css'   => ['at4wp-style']
];

$config['metabox']['meta2'] = [
    'uses'         =>  __NAMESPACE__.'\metaboxes\PostEventInfo',
    'title'         => _('Last Event'),
    'type'          => 'post',
    'context'       => 'normal',
    'priority'      => 'high',
];