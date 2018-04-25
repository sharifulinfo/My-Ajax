<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');

class Project{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}

	public function usercheck($user){
		$query = "SELECT * FROM tbl_user WHERE username = '$user'";
		$getuser = $this->db->select($query);

		if(empty($user)){
			echo "<span class='error'>Field must not be empty!</span>";
			exit();
		}elseif($getuser){
			echo "<span class='success'> <b>".$user."</b> is available from database.</span>";
			exit();
		}else{
			echo "<span class='error'> <b>".$user."</b> is not available from database.</span>";
			exit();
		}
  
	}
 }

