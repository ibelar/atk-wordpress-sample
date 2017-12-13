<?php
/**
 * Create a Widget that display Event.
 */

namespace atksample\widgets;

use atk4\ui\View;
use atkwp\components\WidgetComponent;
use atkwp\interfaces\WidgetInterface;
use atkwp\ui\Input;

class Event extends WidgetComponent implements WidgetInterface
{

    /**
     * Create view to display inside widget in WP frontend.
     *
     * @param View $view
     * @param array $instance
     *
     * @return View
     *
     * @throws \atk4\data\Exception
     * @throws \atk4\ui\Exception
     */
    public function onWidget(View $view, $instance)
    {
        $m = new \atksample\models\Event($view->app->plugin->getDbConnection(), ['table' => $view->app->plugin->getDbTableName('event')]);
        if ($instance['has_chk']) {
            $m->setOrder('name');
        }
        $r = $m->tryLoadAny()->setLimit($instance['event_number']);

        $ul = $view->add(new View(['element' => 'ul']));
        foreach ($r as $key => $event) {
            $ul->add(new View(['element' => 'li', 'content' => $event['name']]));
        }

        return $view;
    }


    /**
     * Create input to add to the widget form.
     *
     * @param View $view
     * @param array $instance
     *
     * @return View|\atkwp\AtkWpView
     * @throws \atk4\ui\Exception
     */
    public function onForm(View $view, $instance)
    {
        $defaults = array( 'title' => 'My Event', 'event_number' => 2, 'has_chk' => true);
        $instance = wp_parse_args( (array) $instance, $defaults );

        $title = !empty( $instance['title']) ? $instance['title'] : esc_html__('New title', 'text_domain');
        $event = $instance['event_number'];
        $chk = $instance['has_chk'];

        $view->add(
            new Input(
                [
                    'fieldName' => $this->get_field_name('title'),
                    'id'        => $this->get_field_id('title'),
                    'value'     => $title,
                    'content'   => 'Title:',
                ]
            )
        );

        $view->add(
            new Input(
                [
                    'fieldName'       => $this->get_field_name('event_number'),
                    'id'              => $this->get_field_id('event_number'),
                    'inputType'       => 'number',
                    'value'           => $event,
                    'content'         => 'Number of Event:',
                    'inputCssClass'   => 'tiny-text',
                ]
            )
        );

        $view->add(
            new Input(
                [
                    'fieldName'       => $this->get_field_name('has_chk'),
                    'id'              => $this->get_field_id('has_chk'),
                    'inputType'       => 'checkbox',
                    'value'           => $chk,
                    'content'         => 'Sort by Name',
                    'inputCssClass'   => 'checkbox',
                ]
            )
        );

        return $view;
    }

    /**
     * Update new value to db.
     *
     * @param array $newInstance
     * @param array $oldInstance
     *
     * @return array
     */
    public function onUpdate($newInstance, $oldInstance)
    {
        $instance = $oldInstance;
        $instance['title'] = strip_tags($newInstance['title']);
        $instance['event_number'] = ($newInstance['event_number']  <= 0) ? 1 : $newInstance['event_number'];
        $instance['has_chk'] = array_key_exists('has_chk' , $newInstance);

        return $instance;
    }
}
