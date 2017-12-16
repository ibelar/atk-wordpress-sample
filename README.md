# Atk-wordpress sample plugin

This Wordpress plugin is done using Agile Toolkit and the Agile Toolkit integration for Wordpress.

## Require

The project require [composer](https://getcomposer.org/) in order to install all it's dependencies.

## Install

 - Download or clone this repository inside the plugins folder of your Wordpress installation;
 - Run composer install;
 - Visit you Wordpress plugin page in admin section and activate it.
 
 For more information visit [atk-wordpress](https://github.com/ibelar/atk-wordpress).
 
 ## Wordpress components
 
 Here are the components add by this plugin:
 
 #### Panel and sub panel
 
An new admin section panel, called Event that display a simple CRUD in order to add new event entry in the database.
An Option sub panel, accessible via the Event panel sub menu item, that display a simple form where you can save the event default 
category. The option are saved within Wordpress options table.

Note: On plugin activation, this plugin create a new event table in the database.

#### Dashboard widget

This plugin add a dashboard widget "Latest Event" that display latest x numbers of events enter in the event table. 
You can configure the number of events to be displayed via the "configure" option of the widget.
This dashboard widget will show in admin home page.

#### Widget

This plugin create a "Monthly Event" widget that display current month Event, define in event table, when add to a widget sidebar. 
The widget title and number of event to be display can also be customize. 

#### Post meta boxes

This plugin create two meta boxes attached to post type. When editing new post in Wordpress, you will see these two meta boxes.
One that add an extra field to the post and another that simply display the last event enter in the event table.

#### Shortcode

A shortcode that you can use to display a simple registration form within your Wordpress site. 
Simply enter the shortcode code [atksample-form] in your page or post in order to display the form.

## Conclusion

This sample plugin for Wordpress will show how you can easily build UI element and query db data using the [Agile Toolkit framework](http://agiletoolkit.org).

