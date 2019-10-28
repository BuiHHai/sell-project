<?php 
class Injection {
	public function db_escape_postparam($conn, $key) {
		return mysqli_real_escape_string($conn, $_POST[$key]);
	}

	public function db_escape_getparam($conn, $key) {
		return mysqli_real_escape_string($conn, $_GET[$key]);
	}
}


 ?>