<?php

/**

* Main activity stream list page

*/


//if (elgg_is_admin_logged_in()) {

$options = array();


$page_type = preg_replace('[\W]', '', get_input('page_type', 'all'));
$type = preg_replace('[\W]', '', get_input('type', 'all'));
$active_section =
$subtype = preg_replace('[\W]', '', get_input('subtype', ''));


$selector = "type=$type";

$title = elgg_echo('river:all');

$page_filter = 'all';

$vetorName = array("functions", "spaces");
$vetorFuntions = array("functions1");

$options = array(
		'metadata_name' => $vetorName,
		'metadata_value' => $vetorFuntions,
		'type' => 'object',
		'subtype' => 'home',
		'limit' => '10',
		'owner_guid' => get_input("owner_guid", ELGG_ENTITIES_ANY_VALUE),
		'full_view' => FALSE,
		'metadata_case_sensitive' => FALSE,
		
		
);
// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "";

// start building the main column of the page
$content = elgg_view_title($title);

// add the form to this section
$content .= elgg_view_form("home/save");

// optionally, add the content for the sidebar
$sidebar = "";


$action = 'create';


$activity = elgg_list_home_filter($options);


$params = array(
		'content' =>  $content . $activity,
		'filter_context' => $page_filter,
		'class' => 'elgg-river-layout',
		'categories' => $vetorFuntions,		
);



$body = elgg_view_layout('two_sidebar', $params);

echo elgg_view_page($title, $body);