<?php
global $CONFIG;

$subject_label = elgg_echo('adminshout:subject:label');
$subject_control = elgg_view('input/text', array('internalname' => 'subject'));
$message_label = elgg_echo('adminshout:message:label');
$message_control = elgg_view('input/longtext', array('internalname' => 'message'));
$send_button = elgg_view('input/submit', array('value' => elgg_echo('adminshout:send'),
						'internalname' => 'send_message',
						'js' => "onclick=\"$('#message_sending').show();$('.submit_button').hide();\""
						));
// loader to show admin something is happening
$loader = "<div id='message_sending' class='ajax_loader left hidden'></div>";

$form = <<< END
	<p><label>$subject_label $subject_control</label></p>
	<p><label>$message_label $message_control</label></p>
	$loader
	$send_button
END;

echo elgg_view('input/form', array('body' => $form, 'action' => $CONFIG->wwwroot . "action/adminshout/shout"));
