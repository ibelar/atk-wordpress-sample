<?php

/*
Plugin Name: Atk Event Sample
Description:A sample plugin done using atk-wordpress integration with Agile Toolkit (atk4).
Version: 1.0
Author: Alain Belair
Author URI: https://github.com/ibelar
License: MIT
*/

namespace atksample;
use atkwp\controllers\ComponentController;
use atkwp\helpers\Pathfinder;


$atk_plugin_name = "atkevent";
$atk_plugin_loader = $atk_plugin_name."_loader";
$atk_plugin = __NAMESPACE__."\\Plugin";


$$atk_plugin_loader = require 'vendor/ibelar/atk-wordpress/plugin-autoload.php';
$$atk_plugin_loader->setPluginLoader(plugin_dir_path(__FILE__));
$$atk_plugin_loader->enableLoader();

if (array_search(ABSPATH . 'wp-admin/includes/plugin.php', get_included_files()) === false) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

$$atk_plugin_name = new  $atk_plugin($atk_plugin_name, new Pathfinder(plugin_dir_path(__FILE__)), new ComponentController(), $$atk_plugin_loader);

if (!is_null( $$atk_plugin_name)) {
	$$atk_plugin_name->boot(__FILE__);
}

$$atk_plugin_loader->disableLoader();
