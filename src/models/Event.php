<?php
/**
 * Model Event.
 * Create a model base on the event table in Db.
 */

namespace atksample\models;

use \atk4\data\Model;

class Event extends Model
{

	public function init()
	{
		parent::init();

		$this->addField('name', ['type'=> 'string', 'caption'=>'Name', 'required' => true]);

		$this->addField('description', ['type'=>'string', 'caption'=>'Description', 'required' => true]);
		$this->addField('category', ['enum' => ['week' => 'Weekly', 'month'=> 'Monthly', 'year'=>'Yearly'], 'required' => true]);
		$this->addField('date', ['type'=>'date', 'required' => true]);
	}
}
