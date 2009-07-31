<?php
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	admin_gatekeeper();
	set_context('admin');
	// Set admin user for user block
		set_page_owner($_SESSION['guid']);

	$title = elgg_view_title(elgg_echo('adminshout'));
	
	$body = elgg_view('page_elements/contentwrapper', array('body' => 
		elgg_echo('adminshout:description') . elgg_view('adminshout/forms/send'))
	);
	
	
	page_draw(elgg_echo('diagnostics'),elgg_view_layout("two_column_left_sidebar", '', $title . $body));
?>