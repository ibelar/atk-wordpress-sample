<?php
/**
 * Create a Widget that display Event from event table.
 */

namespace atksample\widgets;

use atk4\ui\View;
use atkwp\components\WidgetComponent;
use atkwp\interfaces\WidgetInterface;
use atkwp\ui\WpInput;

class EventWidget extends WidgetComponent implements WidgetInterface
{

    /**
     * Create view to display inside widget in WP frontend.
     *
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
        $date = new \DateTime();

        $m = new \atksample\models\Event($view->app->plugin->getDbConnection(), ['table' => $view->getPluginInstance()->getDbTableName('event')]);
        if ($instance['has_chk']) {
            $m->setOrder('date');
        } else {
            $m->setOrder('id', 'DESC');
        }

        // get current month and date event.
        $m->addCondition($m->expr('Month(date) = [current_month] AND Year(date) = [current_year]',
            [
                'current_month' => $date->format('m'),
                'current_year'  => $date->format('Y'),
            ]));


        $r = $m->tryLoadAny()->setLimit($instance['event_number']);

        $rows = 0;
        $ul = $view->add(new View(['element' => 'ul']));
        foreach ($r as $key => $event) {
            $ul->add(new View(['element' => 'li', 'content' => $event['date']->format('D M d - ').$event['name']]));
            $rows++;
        }
        if (!$rows) {
            $ul->add(new View(['element' => 'li', 'content' => 'No event for this month!']));
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
            new WpInput(
                [
                    'field_name' => $this->get_field_name('title'),
                    'field_id'   => $this->get_field_id('title'),
                    'value'      => $title,
                    'label'      => 'Title:',
                ]
            )
        );

        $view->add(
            new WpInput(
                [
                    'field_name' => $this->get_field_name('event_number'),
                    'field_id'   => $this->get_field_id('event_number'),
                    'type'       => 'number',
                    'value'      => $event,
                    'label'      => 'Number of Event:',
                    'css'        => 'tiny-text',
                ]
            )
        );

        $view->add(
            new WpInput(
                [
                    'field_name' => $this->get_field_name('has_chk'),
                    'field_id'   => $this->get_field_id('has_chk'),
                    'type'       => 'checkbox',
                    'value'      => $chk,
                    'label'      => 'Display by Date',
                    'css'        => 'checkbox',
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
