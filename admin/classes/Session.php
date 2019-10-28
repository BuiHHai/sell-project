<?php 
class Session {
	/*	
	*hàm bắt đầu session
	*/
	public function start(){
		session_start();
	}
	/*
	*set session
	*tham số $user là giá trị của session
	*/
	public function set($user){
		$_SESSION['user'] = $user;
	}
	/*
	*get session
	*/
	public function get(){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
		}else{
			$user = '';
		}
		return $user;
	}
	/*
	*hàm hủy session
	*/
	public function destroy(){
		session_destroy();
	}
}

 ?>