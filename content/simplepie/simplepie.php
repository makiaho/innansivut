<?php

error_reporting(E_ALL ^ E_DEPRECATED);
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller'.DS.'default.php');
$controller=new SomeControllerDefault();
$controller->execute();
/****
someloader('simplepie.simplepie');

// Initialize new feed
$feed = new SimplePie();
$feed->set_feed_url('http://www.yle.fi/uutiset/rss/uutiset.rss');
$feed->set_cache_location( SOME_PATH.DS.'cache' );

$feed->init();
 
// Create a new array to hold data in
$new = array();
 
// Loop through all of the items in the feed
foreach ($feed->get_items() as $item) {
 
	// Calculate 24 hours ago
	$yesterday = time() - (24*60*60);
 
	// Compare the timestamp of the feed item with 24 hours ago.
	if ($item->get_date('U') > $yesterday) {
 
		// If the item was posted within the last 24 hours, store the item in our array we set up.
		$new[] = $item;
	}
}
 
// Loop through all of the items in the new array and display whatever we want.
foreach($new as $item) {
	echo '<h3>' . $item->get_title() . '</h3>';
	echo '<p>' . $item->get_date('j M Y, H:i:s O') . '</p>';
	echo $item->get_description();
	echo '<hr />';
}
********/
