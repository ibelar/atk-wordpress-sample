<?php
/**
 * This meta box is added to a Post type.
 * Create a meta box component in post.
 */

namespace atksample\metaboxes;

use atkwp\components\MetaBoxComponent;
use atkwp\interfaces\MetaBoxFieldsInterface;
use atkwp\interfaces\MetaFieldInterface;
use atkwp\ui\WpInput;

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

        // Retrieving a field from the controller container and layout into this view.
        $this->add($this->fieldCtrl->getField('label'));
    }

    /**
     * This method will be called when using MetaBoxFieldsInterface
     * receiving a Field ctrl in first parameter.
     * Field added to the controller container can be add
     * to this view and render when this view is executed.
     *
     * @param MetaFieldInterface $ctrl
     */
    public function onInitMetaBoxFields(MetaFieldInterface $ctrl)
    {
        $ctrl->addField('label', new WpInput(['label' => 'Extra label for this post:']), '_atksample_label');
    }

    /**
     * You can sanitize user input prior to save into Db.
     * this method will be call for each field added to the FieldCtrl container.
     *
     * @param $fieldName
     * @param $data
     *
     * @return mixed|string
     */
    public function onUpdateMetaFieldRawData($fieldName, $data)
    {
        return strip_tags($data);
    }
}
