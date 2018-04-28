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

	public function userskill($skill){
		$query = "SELECT * FROM tbl_skill WHERE skill LIKE '%$skill%'";
		$getskill = $this->db->select($query);

		$result = '';
		$result .= '<div class = "skill"><ul>';
		if($getskill){
			while ($data = $getskill->fetch_assoc()) {
				$result.='<li>'.$data['skill'].'</li>';
			}
		}else{
			$result .= '<li>Result Not Found</li>';
		}
		echo $result;

	}

	public function autosave($data){
		$query = "INSERT INTO tbl_body(body) VALUES ('$data')";
		$userbody = $this->db->insert($query);
	}

	public function autoShow(){
		$query = "SELECT * FROM tbl_body ORDER BY id DESC";
		$getskill = $this->db->select($query);

		$result = '';
		$result .= '<div class = "skill"><ul>';
		if($getskill){
			while ($data = $getskill->fetch_assoc()) {
				$result.='<li>'.$data['body'].'</li>';
			}
		}else{
			$result .= '<li>Result Not Found</li>';
		}
		echo $result; 
	}

	public function livesearch($key){
		$query = "SELECT * FROM tbl_userlist WHERE name LIKE '%$key%'";
		$getdata = $this->db->select($query);
		$r = '';
		$r .= '<table class = "tblone"><tr>
				<th>SL</th>
				<th>Name</th>
				<th>Age</th>
				<th>Department</th>
				<th>Skil</th>
		</tr>';
		$i = 1;
		if($getdata){
			while ($data = $getdata->fetch_assoc()) {
				$r .= '<tr>
						<td>'.$i.'</td>
						<td>'.$data["name"].'</td>
						<td>'.$data["age"].'</td>
						<td>'.$data["dep"].'</td>
						<td>'.$data["skill"].'</td>
					</tr>';
				$i++;
			}
		}else{
			$r .= '<tr><td colspan = 5>No data Found!</td></tr>';
		}
		$r .= '</table>';
		echo $r;
	}

	public function autosaveDraft($mass,$massId){
		if($massId == ''){
			$query = "INSERT INTO tbl_body(body) VALUES ('$mass')";
			$userbody = $this->db->insert($query);
			$lastId = $this->db->link->insert_id;
			echo $lastId;
			exit();
		}else{
			$query = "UPDATE tbl_body SET body = '$mass' WHERE id = '$massId'";
			$update = $this->db->update($query);
		}
	}
 }

