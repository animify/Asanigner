<?php
include 'core.php';
 $asana = new Asana();
if (isset($_POST['func']) && !empty($_POST['func'])) {
 switch($_POST['func']) {
	 case 'update_task':
		$asana->updateTask($_POST['uid'], $_POST['tid']);
	 break;
	 default:
		die('error');
 }
}
?>
