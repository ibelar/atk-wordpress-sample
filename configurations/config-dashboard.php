<?php
/**
 * Dashboard Widget Configuration
 *
 * $config['dashboard']['id']  => [ $options ]  (array)(Required) An array containing the dashboard options. $options explain below.
 * 		Id must be unique within your namespace.
 *		Ex: $config['dashboard']['ds1'] => [$ds1_options];
 *			$config['dashboard']['ds2'] => [$ds2_options];
 *
 *	Array $options :
 *  'uses'            => (string)(Required) The dashboard display class to use. The class must extends  Wp_WpDashboard.
 *						 					Ex: 'uses' =>  __NAMESPACE__ . '\Dashboard\Event\Display'
 *
 *  'title'           => (string)(Required) A string holding the title of the dashboard as it appear in the dashboard page.
 *  'configureMode'   => (bool)(optional)   Whether you need configuration for this dashboard widget or not.
 *
 */
namespace atksample;

$config['dashboard']['dash-event'] = [
    'uses'          =>  __NAMESPACE__ . '\dashboards\EventDisplayDashboard',
    'title'         => _('Atk4wp Event'),
    'configureMode' =>  true,
];