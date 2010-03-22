<?php
global $CONFIG;

admin_gatekeeper();

$subject = get_input('subject', $_SESSION['_adminshout:subject']);
$message = get_input('message', $_SESSION['_adminshout:message']);
$__elgg_ts = get_input('__elgg_ts');
$__elgg_token = get_input("__elgg_token");

$offset = (int)get_input('offset', 0);
$limit = 2000;

//check there is a title and message
if($subject && $message){
	$users = elgg_get_entities('user', '', 0, '', $limit, $offset);
	
	if ($users) {
		$_SESSION['_adminshout:subject'] = $subject;
		$_SESSION['_adminshout:message'] = $message;
		
		foreach ($users as $u) {
			set_time_limit(30); // ask for more time
			notify_user($u->guid, get_loggedin_userid(), $subject, $message);
		}
		
		$offset += $limit;
		
		forward($CONFIG->wwwroot . "action/adminshout/shout?offset=$offset&__elgg_ts=$__elgg_ts&__elgg_token=$__elgg_token");
	} else {
		// If there are no more users and the offset is greater than zero that means we have processed some
		// messages
		if ($offset>0) {
			system_message(elgg_echo('adminshout:success'));
		} else {
			register_error(elgg_echo('adminshout:fail'));
		}
	}
	
	// Cleanup session
	$_SESSION['_adminshout:subject'] = "";
	$_SESSION['_adminshout:message'] = "";
	unset($_SESSION['_adminshout:subject']);
	unset($_SESSION['_adminshout:message']);
	
} else {
	system_message(elgg_echo('adminshout:inputs'));
}

// Forward to shout page
forward($CONFIG->wwwroot . "pg/adminshout/");
		

?>
