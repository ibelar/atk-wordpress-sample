<?php
/**
 * Widget Configuration
 *
 * $config['widget']['id']  => $options (array)(Required) An array containing the widget options. $options explain below.
 * 		Id must be unique within your namespace.
 *
 *		Ex: $config['widget']['wdg1'] => $wdg1_options;
 *			$config['widget']['wdg2'] => $wdg2_options;
 *
 *	array $options :
 *
 *  'uses'            => (string)(Required) The widget class to use. The class must extends atkWp\components\WidgetComponent
 *						    Ex: 'uses' =>  __NAMESPACE__ . '\widgets\EventWidget'
 *
 *  'title'           => (string)(Required) A string that hold the title of the widget as it appear in the admin area.
 *
 *  'widget_ops'      => (array)(Optional)  An array that hold widget option as defined in Wordpress widget options.
 *
 *========================================================================================================================*/

namespace atksample;

$config['widget']['atksample-event'] = [
    'uses'          =>  __NAMESPACE__.'\widgets\EventWidget',
    'title'         => _('Atk4wp Event'),
    'widget_ops'    => ['classname' =>'at4wp-wdg', 'description' => 'Display Atk4wp event\'s name'],
];
