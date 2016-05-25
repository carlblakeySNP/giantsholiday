Giants Theme
============

## Synopsis

Based on a theme called `_s`, or `underscores`.

## Getting Started

This theme follows some of the `_s` conventions but mostly abandoned due to heavier customizations. Some notable customizations are:

	* Node.js to compile LESS and JS
	* Custom Post Types incuded in functions.php file
	* Custom Shortcodes /inc/shortcodes.php
	* Advanced Custom Fields (ACF) plugin included in the theme. 

The template files all start with `template-...php` and may include a get_template_part function and including another file. An example is the `template-events.php` which includes a tempalte part called `events.php`.

## Development (Node)

We are using Node for the development process for compiling scripts and LESS and moving images into the build directory. You can start with:

`npm install`

and then

`gulp build`

if you like to watch your files as they are updated use the gulp defaut.

`gulp`

## Custom Post Types

We use Custom Post Types to store unique data across the site. Please see the functions.php file for more info.

	* Slides
	* Events
	* Venues
	* Services


## Advanced Custom Fields

`/inc/advanced-custom-fields.php` is included along with the plugin to define the addition inputs on various pages. If you look in the functions.php file we ask if the current hosts is production in that case we include the plugin into the them. Otherwise we use the plugin locally so we have a visual interface for building custom fields. The end user does not need to see this plugin so we decided to have it included. 

To regenerate the custom fields into a new development please look into [ACF recovery plugin](https://github.com/seamusleahy/ACF-PHP-Recovery).

# giants
