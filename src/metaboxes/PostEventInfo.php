<?php
/**
 * Simple meta box.
 */

namespace atksample\metaboxes;

use \atkwp\components\MetaBoxComponent;

class PostEventInfo extends MetaBoxComponent
{
    public function init()
    {
        parent::init();
        $this->add('View')->set('A simple metabox info.');
    }
}
