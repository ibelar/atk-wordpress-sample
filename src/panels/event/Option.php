<?php
/**
 * Created by abelair.
 * Date: 2017-06-08
 * Time: 4:20 PM
 */

namespace atksample\panels\event;

use atk4\ui\jsNotify;
use atkwp\models\Options;
use atkwp\components\PanelComponent;

class Option extends PanelComponent
{
	public function init()
    {
		parent::init();
        $optionModel = new Options($this->app->getDbConnection());
        $options = $optionModel->getOptionValue('atk4wp-event-options', null);

        $form = $this->add('Form');
        $form->addField('category', null, ['enum' =>['Weekly', 'Monthly', 'Yearly']]);
        $form->model['category'] = $options['event-default'];

        $form->onSubmit(function($form) use ($optionModel) {
            $options['event-default'] = $form->model['category'];
            //$options['event-color']   = $f->get('color');
            $optionModel->saveOptionValue('atk4wp-event-options', $options);
            return new jsNotify('Options are saved', $this);
        });

    }
}

/*
 * TODO remove this
Another question about dropdown
When using the format below, the category value is not set in form?
```
$form->addField('category', ['DropDown', 'values' =>['Weekly', 'Monthly', 'Annually']]);
$form->model['category'] = 'Monthly'; //Always default to Weekly no matter what value is set.
```

but when using this format, the category value is set correctly
```
$form->addField('category', null, ['enum' =>['Weekly', 'Monthly', 'Annually']]);
$form->model['category'] = 'Monthly';
```
Just trying to understand if this is the correct behavior and if this is normal that the first format is not setting value.

*/