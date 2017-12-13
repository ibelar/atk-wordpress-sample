<?php
/**
 * A simple counter input.
 */

namespace atksample\views;

use atk4\ui\FormField;

class Counter extends FormField\Line
{
    public $content = 20;

    public function init()
    {
        parent::init();

        $this->actionLeft = new \atk4\ui\Button(['icon' => 'minus']);
        $this->action = new \atk4\ui\Button(['icon' => 'plus']);

        $this->actionLeft->js('click', $this->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])-1', [$this->jsInput()->val()])));
        $this->action->js('click', $this->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])+1', [$this->jsInput()->val()])));
    }
}
