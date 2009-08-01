<?php

	global $CONFIG;
	
	$subject_label = elgg_echo('adminshout:subject:label');
	$subject_control = elgg_view('input/text', array('internalname' => 'subject'));
	$message_label = elgg_echo('adminshout:message:label');
	$message_control = elgg_view('input/longtext', array('internalname' => 'message'));
	$send_button = elgg_view('input/submit', array('value' => elgg_echo('adminshout:send'), 'internalname' => 'send_message', 'js' => "onclick=\"$('#message_send').show();$('.submit_button').hide();\""));
	//loader to show the user something it happening
	$loader = "<div id=\"message_send\" style=\"margin:5px;display:none;\">";
	$url = $vars['url'] . "_graphics/ajax_loader.gif";
	$loader .= "<img src=\"". $url . "\" /></div>";
	
	$form = <<< END
		<div id="actionshout_form">
			<br />
			<p><b>$subject_label $subject_control</b></p>
			<p><b>$message_label</b></p>
			$message_control
			$loader
			$send_button
		</div>
END;
	
	echo elgg_view('input/form', array('body' => $form, 'action' => $CONFIG->wwwroot . "action/adminshout/shout"));
?>