<?php
/**
 * Create a meta box component in post.
 */

namespace atksample\metaboxes;

use atk4\ui\FormField;
use atkwp\components\MetaBoxComponent;
use atkwp\interfaces\MetaBoxArgumentsInterface;
use atkwp\interfaces\MetaBoxFieldsInterface;
use atkwp\interfaces\MetaFieldInterface;

class PostExtraData extends MetaBoxComponent implements MetaBoxFieldsInterface
{

    /**
     * Init method. By using the MetaBoxFieldsInterface, the fieldCtrl property
     * become available.
     *
     * @throws \atk4\ui\Exception
     */
    public function init()
    {
        parent::init();
        $this->add(['View', 'ui' => 'segment', 'raised'])->set('Segment');

        // Field that was create onInitMetaboxFields can be retreive from fieldCtrl and add to the atk layout view.
        $this->add($this->fieldCtrl->getField('search'));
        $this->add($this->fieldCtrl->getField('test'));
    }

    /**
     * This method will be called when using MetaBoxFieldsInterface
     * receiving a Field ctrl in first parameter.
     * You then need to add you atk field to the controller so they become available
     * to be place on a layout.
     *
     * @param MetaFieldInterface $ctrl
     */
    public function onInitMetaBoxFields(MetaFieldInterface $ctrl)
    {
        $ctrl->addField('search', new FormField\Line(['placeholder' => 'Search users', 'label' => 'http://']), '_atksample_search');
        $ctrl->addField('test', new FormField\Line(), '_atksample_test');
    }

    public function onUpdateMetaFieldRawData($fieldName, $data)
    {
        return strip_tags($data);
    }
}
