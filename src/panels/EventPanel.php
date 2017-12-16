<?php
/**
 * Panel to display an Event CRUD.
 */

namespace atksample\panels;

use atk4\ui\View;
use atksample\models;
use atkwp\components\PanelComponent;

class EventPanel extends PanelComponent
{
	public function init()
	{
		parent::init();

        $msg = $this->add([
            'Message',
            'Agile Toolkit for Wordpress!',
        ]);

		$m = new models\Event($this->getDbConnection(), ['table' => $this->getPluginInstance()->getDbTableName('event')]);
		$v = $this->add(new View(['ui' => 'segment']));
		$c = $v->add(['CRUD', 'notify' => new \atk4\ui\jsNotify(['content'=>'Data saved'], $this)]);
		$c->setModel($m);
		$c->itemCreate->set('Event');
	}
}
