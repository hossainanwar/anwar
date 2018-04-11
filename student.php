<?php include "database.php";?>

<?php

 class student{
	 private $db;
	public function __construct(){
		$this->db = new database();
	}
	
	public function getStudent(){
		$query="SELECT * FROM tbl_student";
		$result = $this-> db-> select($query);
		return $result;
	}
	
	public function insertStudent($name,$roll){
		$name=mysqli_real_escape_string($this->db->link,$name);
		$roll=mysqli_real_escape_string($this->db->link,$roll);
		if(empty($name) || empty($roll)){
			$msg="<div class='alert alert-danger'><strong>Error !</strong>field musd not be empty</div>";
			return $msg;
		}
		
		else{
		$stu_query="insert into tbl_student(name,roll) values ('$name','$roll')";
		$stu_insert=$this->db->insert($stu_query);
		
		$attendec_query="insert into attendence(roll) values ('$roll')";
		$stu_insert=$this->db->insert($attendec_query);
		
		if($stu_insert){
			$msg="<div class='alert alert-success'><strong>Error !</strong>student data inserted successfully!</div>";
			return $msg;
		}
		else{
		$msg="<div class='alert alert-danger'><strong>Error !</strong>Student data is not inserted!</div>";
			return $msg;
	}
	}
	}
	public function insertAttendance($date,$attend=array()){
		$data_insert=false;
		$query="SELECT DISTINCT att_time from attendence";
		$getdata=$this->db->select($query);
		if($getdata==true){
		while($result=$getdata->fetch_assoc()){
			$db_date=$result['att_time'];
			if($date==$db_date){
				$msg="<div class='alert alert-danger'><strong>Error !</strong>Attendence allready taken today!</div>";
			   return $msg;
			}
		}
		}
		
		foreach($attend as $atn_key => $atn_value){
			if($atn_value=="present"){
				$stu_query="INSERT INTO attendence(roll,attend,att_time)VALUES('$atn_key','present',now())";
				$data_insert=$this->db->insert($stu_query);
				
			}
			else if($atn_value=="absent"){
				$stu_query="INSERT INTO attendence(roll,attend,att_time)values('$atn_key','absent',now())";
				$data_insert=$this->db->insert($stu_query);
			}
	  	  }
          if($data_insert){
			$msg="<div class='alert alert-success'><strong>Success !</strong>Attendence data inserted successfully!</div>";
			return $msg;
		}
		else{
		$msg="<div class='alert alert-danger'><strong>Error!</strong>Attendence data is not inserted!</div>";
			return $msg;
	}
		  
		  
		  
		  }
		  
		  public function getDatelist(){
			  $query="SELECT DISTINCT att_time from attendence";
		       $result=$this->db->select($query);
			   return $result;
		  }
		  
		  public function getAlldata($dt){
			   $query="SELECT tbl_student.name,attendence.* from  tbl_student
			   INNER JOIN attendence
			   ON tbl_student.roll=attendence.roll where att_time='$dt'";
		       $result=$this->db->select($query);
			   return $result;
		  }
		  
		  
		  
		  public function updateAttendance($dt,$attend){
			  
			foreach($attend as $atn_key => $atn_value){
				if($atn_value=="present"){
					$query="UPDATE attendence
					SET attend='present' WHERE roll='".$atn_key."'AND att_time
					='".$dt."'";
					$data_update=$this->db->update($query);
					
				}
				elseif($atn_value=="absent"){
				    $query="UPDATE attendence
					SET attend='absent' WHERE roll='".$atn_key."' AND att_time
					='".$dt."'";
					$data_update=$this->db->update($query);
				}
			  }
			if($data_update){
				$msg="<div class='alert alert-success'><strong>Success !</strong>Attendence Update data  successfully!</div>";
				return $msg;
			}
			else{
			    $msg="<div class='alert alert-danger'><strong>Error!</strong>Attendence data is not Update!</div>";
				return $msg;
		}
			  
		  }
	
	
	
}
?>