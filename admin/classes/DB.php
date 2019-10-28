<?php 
class DB{
	// biến cấu hình db
	private $hostname = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'my_pham_k57';
	// biến connect duy trì trạng thái kết nối đến db
	public $cn = null;

	// hàm kết nối db
	public function connect(){
		$this->cn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname)
					or die("Cannot connect to db");
		// mysqli_set_charset($cn, "utf8");

	}

	// hàm đóng kết nối db
	public function close(){
		if($this->cn){
			mysqli_close($this->cn);
		}
	}

	/*
	*hàm này sẽ nhận command select | insert | delete 
	*nhận tham số đầu vào là 1 trong 3 câu lệnh
	*sau đó truyền qua hàm mysqli_query thực hiện truy vấn 
	*/
	public function query($sql = null){
		if($this->cn){
			mysqli_query($this->cn,$sql);
			if(mysqli_error($conn) > 0) {
				die("Error execute query: " . mysqli_error($conn));
			}
		}
	}

	/*
	*hàm đếm số bản ghi của kết quả trả về
	*nhận tham số đầu vào là câu lệnh select
	*/
	public function num_rows($sql = null){
		if($this->cn){
			$query = mysqli_query($this->cn, $sql);
			if($query){
				$row = mysqli_num_rows($query);
				return $row;
			}
			return false;
		}
	}

	/*
	*hàm lấy dữ liệu getList or getSingle
	*sẽ nhận tham số đầu vào là câu lệnh select
	*và type | type = 0 thì trả về 1 mảng
	*type = 1 thì trả về 1 bản ghi suy nhất, thường dùng cho câu lệnh where id = '?'
	*hàm này sử dụng hàm mysqli_fetch_assoc để đọc result.
	*lưu ý: type default = 0 => trả về [] ngược lại trả về 1 bản ghi
	*/
	public function fetch_assoc($sql = null, $type = 0){
		if($this->cn){
			$query = mysqli_query($this->cn,$sql);
			if($query){
				if($type == 0){
					while($row = mysqli_fetch_assoc($query)){
						$data[] = $row;
					}
					return $data;
				}else if ($type == 1){
					$data = mysqli_fetch_assoc($query);
					return $data;
				}
			}
			return false;

		}
	}

	/*
	*hàm này sẽ trả về id của bản ghi mới nhất vừa được thêm vào bảng, 
	*với điều kiện id của bản ghi phải trang thái tự động tăng | AUTO_INCREMENT
	*return 0 | nghĩa là không có bản cập nhật or id không được set AUTO_INCREMENT
	*ngược lại trả về id của bản ghi
	*/
	public function insert_id(){
		if($this->cn){
			$count = mysqli_insert_id($this->cn);
			if($count == '0'){
				$count = '1';
			}else{
				$count = $count;
			}
			return $count;

		}
	}

	/*
	*hàm set chữ unikey 
	*mặc định là "utf8"
	*/
	public function set_char(){
		if($this->cn){
			mysqli_set_charset($this->cn, "utf8");
		}
	}


}


 ?>