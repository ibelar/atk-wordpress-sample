<?php
/**
 * Created by abelair.
 * Date: 2017-06-08
 * Time: 2:47 PM
 */

namespace atksample\panel;

use \atkwp\components\PanelComponent;
use \atksample\models;

class Event extends PanelComponent
{
	public function init()
	{
		parent::init();

		$service = $this->app->pluginService;
		$m = new models\Event($service->getDbConnection(), ['table' => $service->getDbTableName('event'), 'title'=>'Event']);
		$c = $this->add('CRUD');
		$c->setModel($m);
		$c->itemCreate->set('Event');
	}
}