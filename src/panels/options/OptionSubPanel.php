<?php
/**
 * Sub panel for event options.
 */

namespace atksample\panels\options;

use atk4\ui\jsNotify;
use atkwp\models\Options;
use atkwp\components\PanelComponent;

class OptionSubPanel extends PanelComponent
{
	public function init()
    {
		parent::init();
        $optionModel = new Options($this->getDbConnection());
        $options = $optionModel->getOptionValue('atk4wp-event-options', null);

        $form = $this->add(new \atk4\ui\Form('segment'));
        $form->addHeader('Select default category for event');
        $form->addField('category', null, ['enum' =>['Weekly', 'Monthly', 'Yearly']]);
        $form->model['category'] = (isset($options['event-default'])) ? $options['event-default'] : 'Weekly';

        $form->onSubmit(function($form) use ($optionModel, $options) {
            $options['event-default'] = $form->model['category'];
            $optionModel->saveOptionValue('atk4wp-event-options', $options);
            return new jsNotify('Options are saved', $this);
        });
    }
}
