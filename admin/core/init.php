<?php 
require_once 'classes/DB.php';
require_once 'classes/Functions.php';
require_once 'classes/Session.php';
require_once 'classes/Injection.php';


	/*
	*kết nối db
	*/
	$db = new DB();
	$db->connect();
	$db->set_char();
	/*
	*kiểm tra dữ liệu injection
	*/
	$injection = new Injection();
	/*
	*domain
	*/
	$_DOMAIN = 'http://localhost/sell-project/admin/';
	/*
	*thiết lập múi giờ
	*/
	date_default_timezone_set('Asia/Ho_Chi_Minh'); 
	$date_current = '';
	$date_current = date("Y-m-d H:i:sa");
	/*
	*session
	*/
	$session = new Session();
	$session->start();

	
	/*

	*kiểm tra session check đăng nhập 
	*/
	if($session->get() != ''){
		$user = $session->get();
		// lay thong tin cua user
		$sql_account = "SELECT * FROM account_employee WHERE username = '$user'";
		if($db->num_rows($sql_account)){
			$account = $db->fetch_assoc($sql_account,1);
			$account_id = $account["account_id"];
			$sql = "SELECT * FROM account_employee a INNER JOIN employees e ON a.account_id = '$account_id' AND a.account_id = e.account_id INNER JOIN role r ON r.role_id= e.role_id";
			$data_user = $db->fetch_assoc($sql,1);
		}
	}else{
		$user = '';
	}
	/*
	*bien $GLOBALS['current-sidebar']
	*/
	$current_sidebar = "manager";
	$GLOBALS['current_sidebar'];
 ?>