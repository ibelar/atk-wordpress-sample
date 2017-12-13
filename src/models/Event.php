<?php
/**
 * Created by abelair.
 * Date: 2017-06-14
 * Time: 1:04 PM
 */

namespace atksample\models;


use atkwp\AtkWp;

class Event extends \atk4\data\Model
{

	public function init()
	{
		parent::init();

		$cat_options = ['week' => 'Weekly', 'month'=> 'Monthly', 'year'=>'Yearly'];
		//load WordPress option for our plugin
		$options = get_option('atk4wp-event-options', null);

		$name = $this->addField('name', ['type'=> 'string', 'caption'=>'Name']);

		$desc = $this->addField('description', ['type'=>'string', 'caption'=>'Description']);
		// TODO check when this can be done i.e. show and save different value in db.
		$cat = $this->addField('category', ['enum' => ['week' => 'Weekly', 'month'=> 'Monthly', 'year'=>'Yearly']]);
		//$cat = $this->addField('category', ['type'=>'enum', 'enum' => ['weekly', 'monthly', 'yearly']]);
		//$cat = $this->hasOne('category', $cat_options);
		$date = $this->addField('date', ['type'=>'date']);
	}
}