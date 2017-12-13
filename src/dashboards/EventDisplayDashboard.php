<?php
/**
 * Display a certain number of event in dashboard.
 */

namespace atksample\dashboards;

use atk4\ui\View;
use atksample\models;
use atkwp\components\DashboardComponent;
use atkwp\models\Options;

class EventDisplayDashboard extends DashboardComponent
{
    public $fieldName = 'atksample-dash-eventNum';
    public $eventNumberField;
    public $optionModel;
    public $options;

    public function init()
    {
        parent::init();

        $this->optionModel = new Options($this->app->getDbConnection());
        $this->options = $this->optionModel->getOptionValue('atk4wp-event-options', null);

        $this->eventNumberField = new \atkwp\ui\Input(
            [
                'fieldName'       => $this->fieldName,
                'id'              => $this->fieldName,
                'value'           => ($this->options[$this->fieldName]) ? $this->options[$this->fieldName] : 2,
                'content'         => 'How many events to display:',
                'inputType'       => 'number',
                'inputCssClass'   => 'tiny-text',
            ]
        );

        if ($this->configureMode) {
            $this->doConfigureMode();
        } else {
            $this->doDisplayMode();
        }
    }

    public function doDisplayMode()
    {
        $m = new models\Event($this->app->plugin->getDbConnection(), ['table' => $this->app->plugin->getDbTableName('event')]);
        $r = $m->tryLoadAny()->setLimit($this->options[$this->fieldName]);

        $ul = $this->add(new View(['element' => 'ul']));
        foreach ($r as $key => $event) {
            $ul->add(new View(['element' => 'li', 'content' => $event['name']]));
        }
    }

    public function doConfigureMode()
    {
        $value = $_POST[$this->fieldName];
        if (isset($value)) {
            $this->eventNumberField->setValue($value);
            $this->options[$this->fieldName] = $value;
            $this->optionModel->saveOptionValue('atk4wp-event-options', $this->options);
        }
        $this->add($this->eventNumberField);
    }
}