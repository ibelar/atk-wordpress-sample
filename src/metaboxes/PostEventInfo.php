<?php
/**
 * This meta box is added to a Post type.
 * Simple meta box with information retreive from Db.
 */

namespace atksample\metaboxes;

use \atkwp\components\MetaBoxComponent;
use \atksample\models;

class PostEventInfo extends MetaBoxComponent
{
    public function init()
    {
        parent::init();
        $this->add('View')->set('The latest event:');
        $m = new models\Event($this->app->plugin->getDbConnection(), ['table' => $this->app->plugin->getDbTableName('event')]);
        $m->tryLoadAny()->setOrder('id', 'DESC')->setLimit(1);

        $this->add('Table')->setModel($m);
    }
}
