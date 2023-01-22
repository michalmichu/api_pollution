<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
include('../class/Rest.php');
$api = new Rest();
switch($requestMethod) {
	case 'GET':
		$pollId = '';	
		if($_GET['id']) {
			$pollId = $_GET['id'];
		}
		$api->getPollution($pollId);
		break;
	default:
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}
?>