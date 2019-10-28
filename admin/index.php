<?php
 
// Require database & thông tin chung
require_once 'core/init.php';
// kiem tra dang nhap session user
if($user){
	require_once 'includes/container.php'; 
}else{
	require_once 'templates/signin.php'; 
}
?>