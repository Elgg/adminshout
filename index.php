<?php
/**
 * AdminShout - send an email message to all site users
 *
 * @package AdminShout
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2010
 * @link http://elgg.org/
*/ 

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

admin_gatekeeper();
set_context('admin');
// Set admin user for user block
set_page_owner($_SESSION['guid']);

$title = elgg_view_title(elgg_echo('adminshout'));

$body = "<p class='margin_top'>".elgg_echo('adminshout:description')."</p>".elgg_view('adminshout/forms/send');

page_draw(elgg_echo('diagnostics'),elgg_view_layout("one_column_with_sidebar", $title . $body));
?>