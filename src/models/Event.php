<?php
/**
 * Model Event.
 */

namespace atksample\models;

class Event extends \atk4\data\Model
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