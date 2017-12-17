<?php
/**
 * Display a simple registration form using a shortcode.
 */

/**
 * insert this code "[atksample-form]" into a page to get the register form display in Wp front end.
 */

namespace atksample\shortcodes;

use atkwp\components\ShortcodeComponent;

class FormShortcode extends ShortcodeComponent
{
    public function init()
    {
        parent::init();

        $form = $this->add('Form');
        $form->addField('email');
        $form->onSubmit(function ($form) {
            if (!$form->model['email'] || empty($form->model['email'])) {
                return $form->error('email', 'Please add valid email');
            }
            // implement subscribe here
            return $form->success('Subscribed '.$form->model['email'].' to newsletter.');
        });
    }
}
