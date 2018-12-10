<?php
// make sure to not include translations
$args['presets']['default'] = array(
	'title' => 'Default',
	'demo' => 'http://demo.mythemeshop.com/justfit/',
	'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/default/thumb.jpg',
	'menus' => array( 'primary-menu' => 'Menu' ), // menu location slug => Demo menu name
	'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 10 ),
);

$args['presets']['blog'] = array(
	'title' => 'Blog',
	'demo' => 'http://demo.mythemeshop.com/justfit/blog/',
	'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/blog/thumb.jpg',
	'menus' => array( 'primary-menu' => 'Menu' ), // menu location slug => Demo menu name
	'options' => array( 'show_on_front' => 'page', 'page_on_front' => '278'),
);

$args['presets']['personal-trainer'] = array(
	'title' => 'Personal Trainer',
	'demo' => 'http://demo.mythemeshop.com/justfit-personal-trainer/',
	'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/personal-trainer/thumb.jpg',
	'menus' => array( 'primary-menu' => 'Menu' ), // menu location slug => Demo menu name
	'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 10 ),
);

$args['presets']['yoga'] = array(
	'title' => 'Yoga',
	'demo' => 'http://demo.mythemeshop.com/justfit-yoga/',
	'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/yoga/thumb.jpg',
	'menus' => array( 'primary-menu' => 'Menu' ), // menu location slug => Demo menu name
	'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 10 ),
);

$args['presets']['nutrition'] = array(
	'title' => 'Nutrition',
	'demo' => 'http://demo.mythemeshop.com/justfit-nutrition/',
	'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/nutrition/thumb.jpg',
	'menus' => array( 'primary-menu' => 'Menu' ), // menu location slug => Demo menu name
	'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 8 ),
);

global $mts_presets;
$mts_presets = $args['presets'];
