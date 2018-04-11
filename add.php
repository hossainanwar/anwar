<?php include "header.php";?>
<?php include "student.php";?>

 <?php
   $stu=new student();
   if($_SERVER['REQUEST_METHOD']=='POST'){
	   $name=$_POST['name'];
	   $roll=$_POST['roll'];
	   $inserdata=$stu->insertStudent($name,$roll);
   }
 ?>
	 
<?php
 if(isset($inserdata)){
	 echo $inserdata;
 }
?>	 
	   
	   <div class="panel panel-defaulat">
	   <div class="panel-heading">
	     <h2>
		 <a class="btn btn-success" href="add.php">Add Employee</a>
		 <a class="btn btn-info pull-right" href="index.php">back</a>
		 
		 </h2>
	   
	   </div>
	   <div class="panel-body">
	       
	      <form action="" method="post">
		    <div class="form-group">
			<label for="name">Employee Name:</label>
			<input type="text" class="form-control" placeholder="Plasse Type your Name..." name="name"   id="name" >
			
			</div>
			
			 <div class="form-group">
			<label for="roll">Employee ID:</label>
			<input type="text" class="form-control"  placeholder="Plasse Type your Roll..."name="roll" id="roll">
			
			</div>
			
			 <div class="form-group">
			
			<input class="btn btn-primary" type="submit" name="submit" value="Add Employee">
			
			</div>
		   
		  
		  </form>
	   
	   </div>
	 </div>
  
 <?php include "footer.php";?>