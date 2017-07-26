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

		//load WordPress option for our plugin
		$options = get_option('atk4wp-event-options', null);

		$name = $this->addField('name', ['type'=> 'string', 'caption'=>'Name']);

		$desc = $this->addField('description', ['type'=>'string', 'caption'=>'Description']);
		$date = $this->addField('date', ['type'=>'date']);

//		$cat = $this->addField('category')
//		            ->setValueList(['weekly' => _('Weekly'), 'monthly' => _('Monthly'), 'annually' => _('Annually')])
//		            ->display(array('grid'=>'text'))
//		            ->caption('Type');
//		if (isset($options)) {
//			$cat->defaultValue($options['event-default']);
//		}
//
//		$this->addField('date')
//		     ->type('date')
//		     ->caption(_('Date'))
//		     ->mandatory(true);
	}
}