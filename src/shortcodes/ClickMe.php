<?php
/**
 * Created by abelair.
 * Date: 2017-12-11
 * Time: 9:22 AM
 */

namespace atksample\shortcodes;

use atkwp\components\ShortcodeComponent;
use atksample\views\Counter;

class ClickMe extends ShortcodeComponent
{
    public function init()
    {
        parent::init();

        $c = $this->add(new Counter('20'));

        // Add button to reload counter
        $bar = $this->add(['View', 'ui' => 'buttons']);
        $bar->add(['Button', 'Reload counter'])->js('click', new \atk4\ui\jsReload($c));
    }
}