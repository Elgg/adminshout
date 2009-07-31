<?php
	function adminshout_init()
	{
		global $CONFIG;
		
		register_page_handler('adminshout','adminshout_page_handler');
		
		register_action("adminshout/shout",false, $CONFIG->pluginspath . "adminshout/actions/shout.php");
		
	}
	
	function adminshout_pagesetup()
	{
		if (get_context() == 'admin' && isadminloggedin()) {
			global $CONFIG;
			add_submenu_item(elgg_echo('adminshout'), $CONFIG->wwwroot . 'pg/adminshout/');
		}
	}
	
	function adminshout_page_handler($page) 
	{
		global $CONFIG;
		
		
			// only interested in one page for now
			include($CONFIG->pluginspath . "adminshout/index.php");
		 
	}
	
	register_elgg_event_handler('init','system','adminshout_init');
	register_elgg_event_handler('pagesetup','system','adminshout_pagesetup');
?>