<?php 
if (isset($_GET["session"])) {
	require_once '../classes/Session.php';
	$session = new Session();
	$session->start();
	$session->destroy();
	header('location:../index.php');	
}
?>