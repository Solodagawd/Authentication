<?php
require '../assets/functions.php';
$key = $_GET['key'];
$hwid = $_GET['hwid'];
$session = $_GET['session'];
$inputs = array($key, $hwid, $session);
foreach($inputs as $input){
	if($input == ""){
		AccessDeny("One or more paramaters was empty!");
	}
}


InitLogin($key, $hwid, $session);
?>